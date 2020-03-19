<?php
/**
<<<<<<< HEAD
 * Template Name: Single Liquid Messages App View Template
 *
=======
>>>>>>> b8292e0760874892f13b881e19f3c290e16c6461
 * The template for displaying single sermons
 *
 * @package WordPress
 * @subpackage Liquid_Church
<<<<<<< HEAD
 * @since 1.0.0
 */

=======
 * @since LiquidChurch 1.0
 */
?>

<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Liquid_Church
 * @since Liquid Church 1.0
 */


>>>>>>> b8292e0760874892f13b881e19f3c290e16c6461
?><!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<<<<<<< HEAD
=======
        <meta name="_globalsign-domain-verification" content="WwzP8bBJbcSX4CjkSpD62GbCIMbAq6JTb7tyv-mRtz" />
>>>>>>> b8292e0760874892f13b881e19f3c290e16c6461
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
<<<<<<< HEAD
=======
	<!-- faveicon -->
>>>>>>> b8292e0760874892f13b881e19f3c290e16c6461
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
<div class="page">
<!-- Header start -->
  <div class="pagetop">
    <div class="header_top">
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
        <div id="mav-single">
        <?php
        // Start the loop.
        while ( have_posts() ) : the_post();

            // Include the single post content template.
            get_template_part( 'template-parts/content', 'single-gc-sermons-app-view' );

            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }

            if ( is_singular( 'attachment' ) ) {

                // Parent post navigation.
                the_post_navigation( array(
                    'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'liquidchurch' ),
                ) );
            } elseif ( is_singular( 'post' ) ) {
            }
            // End of the loop.
        endwhile;
        ?>
        </div>
    </main><!-- .site-main -->
</div><!-- .content-area -->
<?php wp_footer(); ?>
</body>
<<<<<<< HEAD
</html>
=======
</html>
>>>>>>> b8292e0760874892f13b881e19f3c290e16c6461
