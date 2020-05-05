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

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php
        // Start the loop.
        while ( have_posts() ) : the_post();

            // Include the single message content template.
            get_template_part( 'template-parts/content', 'single-gc-sermons' );

        endwhile;
        ?>
    </main><!-- .site-main -->
</div><!-- .content-area -->
<?php get_footer(); ?>

