<?php
/**
 * Template Name: Landing
 *
 * @package WordPress
 * @subpackage Liquid_Church
 * @since LiquidChurch 1.0
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
        <!-- faveicon -->
        <?php wp_head(); ?>
    </head>
    <!-- End Header -->
    <div class="content">
    <body <?php body_class(); ?> >
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