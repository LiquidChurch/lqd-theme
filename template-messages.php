<?php
/**
 * Template Name: Main Messages Page Template
 *
 * The template for displaying the main messages page, e.g. /messages.
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

			// Include the page content template.
			get_template_part( 'template-parts/content', 'messages' );

		// End of the loop.
		endwhile; ?>
	</main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>
