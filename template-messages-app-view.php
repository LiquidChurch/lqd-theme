<?php
/**
 * Template Name: Messages App View Template
 *
 * The template for displaying the main messages page, e.g. /messages.
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

			// End of the loop.
		endwhile;
		?>

	</main><!-- .site-main -->
</div><!-- .content-area -->
<?php wp_footer(); ?>
</body>
</html>
