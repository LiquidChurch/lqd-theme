<?php
/**
 * Template Name: Blank Page Template
 *
 * Provides a minimal template that allows the content of a post to be the entire post. This is used for landing pages.
 *
 * @package WordPress
 * @subpackage Liquid_Church
 * @since 1.0.0
 */
?>
<!DOCTYPE html>
    <!-- Begin Header -->
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
    <!-- End Header -->
    <body <?php body_class(); ?> >
    <div class="content">
    <div class="page">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
                <?php
                // Start the loop.
                while ( have_posts() ) : the_post();

                // Include the page content template.
                get_template_part( 'template-parts/content', 'blank' );

                endwhile;
                ?>
            </main><!-- .site-main -->

        </div><!-- .content-area -->
     </div>
    </body>
</html>
