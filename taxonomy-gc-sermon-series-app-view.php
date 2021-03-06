<?php
/**
 * Template Name: Single Sermon Series App View Archive Template
 *
 * The template for displaying archive pages for a single sermon series.
 *
 * @package WordPress
 * @subpackage Liquid_Church
 * @since 1.0.0
 */

 ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
<div class="page">
<!-- Header start -->
  <div class="pagetop">
    <div class="lqd-header">
      <div class="container">
        <div class="row">
        </div>
      </div>
    </div>
  </div>
<!-- Header end -->
<div class="content">
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
            <?php
            // If we just came from the series archive (/messages/), return us to the exact page we came from (e.g. /messages/page/4/).
            // If we came from elsewhere, return us to the main series archive page (/messages).
            $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
            if (!strpos($url, '-series')) {
                echo "<center><a href='$url' class='blue_btn'>Go Back To Series Archives</a></center>";
            }
            else
            {
                echo "<center><a href='https://liquidchurch.com/messages/messages-app-view/' class='blue_btn'>Go Back to Message Archives</a></center>";
            } ?>
            <div class="entry-content sermon-series-desc mav-series">
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
                get_template_part('template-parts/content-taxonomy-series-app-view', get_post_format());

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
                get_template_part('template-parts/content-taxonomy-series-app-view', get_post_format());

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
                    get_template_part('template-parts/content-taxonomy-series-app-view', get_post_format());

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
<?php wp_footer(); ?>
</body>
</html>
