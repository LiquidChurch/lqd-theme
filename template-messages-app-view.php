<?php
/**
<<<<<<< HEAD
 * Template Name: Messages App View Template
 *
=======
 * Template Name: Messages for App View
>>>>>>> b8292e0760874892f13b881e19f3c290e16c6461
 * The template for displaying messages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Liquid_Church
<<<<<<< HEAD
 * @since 1.0.0
 */
=======
 * @since Liquid Church 1.0
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
<body <?php body_class( 'mav-body' ); ?> >
<div class="page">
<div class="content">

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'template-parts/content', 'messages-app-view' );

			 //If comments are open or we have at least one comment, load up the comment template.
		if (! is_front_page() ) {
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
		}

			// End of the loop.
		endwhile;
		?>

	</main><!-- .site-main -->
</div><!-- .content-area -->
<?php wp_footer(); ?>
</body>
<<<<<<< HEAD
</html>
=======
</html>
>>>>>>> b8292e0760874892f13b881e19f3c290e16c6461
