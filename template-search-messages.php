<?php
/**
 * Template Name: Search Messages
 * The template for displaying search messages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package lqd-theme
 * @since 1.4.0
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <?php
            // Start the loop.
            while ( have_posts() ) : the_post();

                // Include the page content template.
                get_template_part( 'template-parts/content', 'search-messages' );

                // End of the loop.
            endwhile; ?>
        </main><!-- .site-main -->
    </div><!-- .content-area -->

<?php get_footer(); ?>
