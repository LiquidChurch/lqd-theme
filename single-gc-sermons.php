<?php
/**
 * Template: Single Message Template
 *
 * The template for displaying an individual message
 *
 * @package WordPress
 * @subpackage Liquid_Church
 * @since 1.0.0
 */
get_header(); ?>
    <main id="main" role="main">
        <?php
        // Start the loop.
        while ( have_posts() ) : the_post();

            // Include the single post content template.
            get_template_part( 'template-parts/content', 'single-gc-sermons' );

            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }

            if ( is_singular( 'attachment' ) ) {

                // Parent post navigation.
                the_post_navigation( array(
                    'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'liquidchurch' ),
                ) );
            }
            // End of the loop.
        endwhile;
        ?>
    </main><!-- .site-main -->
<?php get_footer(); ?>

