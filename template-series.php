<?php
/**
 * Template Name: Series Template
 * The template for displaying series
 *
 * @package WordPress
 * @subpackage Liquid_Church
 * @since Liquid Church 1.3
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'template-parts/content', 'series' );

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

<?php get_footer(); ?>
