<?php
/**
 * The template for displaying archive pages for a single sermon series.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Liquid_Church
 * @since Liquid Church 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <?php if (have_posts()) : ?>
            <?php

            $series = gc_sermons()->taxonomies->series->get(get_queried_object_id());
            $post__not_in = array();

            if ($series->image_id) {
                echo wp_get_attachment_image($series->image_id, 'full', false, array(
                    'class' => 'gc-single-series-sermons-img',
                ));
            }
            ?>
            <div class="entry-content sermon-series-desc">
                <p><?php echo $series->description ?></p>
            </div>
            <?php

            /**
             * for video messages
             */
            global $wp_query;
            $video_query_args = array_merge($wp_query->query_vars, array(
                'posts_per_page' => '99',
                'meta_key' => 'gc_display_order',
                'orderby' => 'meta_value_num',
                'order' => 'ASC',
                'meta_query' => array(
                    array(
                        'key' => 'gc_exclude_msg',
                        'value' => 'on',
                    )
                ),
            ));
            $bottom_count = 0;

            // The Query
            $the_query = new WP_Query($video_query_args);

            // Start the Loop.
            while ($the_query->have_posts()) : $the_query->the_post();
                $post__not_in[] = get_the_ID();
                $pos = get_post_meta(get_the_ID(), 'gc_video_msg_pos', true);
                if($pos == 'bottom') {
                    $bottom_count++;
                    continue;
                }

                /*
                 * Include the Post-Format-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                 */
                get_template_part('template-parts/content-taxonomy-series', get_post_format());

                // End the loop.
            endwhile;

            /* Restore original Post Data */
            wp_reset_postdata();

            /**
             * for normal messages
             */
            global $wp_query;
            $query_args = array_merge($wp_query->query_vars, array(
                'meta_key' => 'gc_display_order',
                'orderby' => 'meta_value_num',
                'order' => 'ASC',
                'post__not_in' => $post__not_in,
            ));

            // The Query
            $the_query = new WP_Query($query_args);

            // Start the Loop.
            while ($the_query->have_posts()) : $the_query->the_post();
                /*
                 * Include the Post-Format-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                 */
                get_template_part('template-parts/content-taxonomy-series', get_post_format());

                // End the loop.
            endwhile;

            /* Restore original Post Data */
            wp_reset_postdata();

            // Previous/next page navigation.
            the_posts_pagination(array(
                'prev_text' => __('Previous page', 'liquidchurch'),
                'next_text' => __('Next page', 'liquidchurch'),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page', 'liquidchurch') . ' </span>',
            ));

            if(!empty($bottom_count)) {
                // The Query
                $the_query = new WP_Query($video_query_args);

                // Start the Loop.
                while ($the_query->have_posts()) : $the_query->the_post();
                    $pos = get_post_meta(get_the_ID(), 'gc_video_msg_pos', true);
                    if ($pos != 'bottom') {
                        continue;
                    }

                    /*
                     * Include the Post-Format-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                     */
                    get_template_part('template-parts/content-taxonomy-series', get_post_format());

                    // End the loop.
                endwhile;

                /* Restore original Post Data */
                wp_reset_postdata();
            }

            $sermon_resources = do_shortcode('[sermon_resources data_type="series" resource_display_name="true" resource_post_id="' . $series->term_id . '"]');
            if (!preg_match('<!-- no resources found -->', $sermon_resources)):
                ?>
                <article>
                    <div class="entry-content sermon-series-resource">
                        <div class="row">
                            <div class="col-md-12">
                                <header class="entry-header">
                                    <h2 class="entry-title">
                                        Resources
                                    </h2>
                                </header>
                                <?php
                                echo $sermon_resources;
                                ?>
                            </div>
                        </div>
                    </div>
                </article>
                <?php
            endif;

        // If no content, include the "No posts found" template.
        else :
            get_template_part('template-parts/content', 'none');

        endif;
        ?>

    </main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>
