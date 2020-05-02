<?php
/**
 * Template Name: Messages App View Template
 *
 * The template for displaying messages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Liquid_Church
 * @since 1.0.0
 */
?><!DOCTYPE html>
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
</html>
