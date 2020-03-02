<?php
/**
 * Template Name: Liquid Template
 *
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Liquid_Church
 * @since Liquid Church 1.0
 */

get_header(); ?>

<div class="body_content">
	<main id="main" class="site-main" role="main">
		<?php

			echo do_shortcode( '[SHOW_HEADER_BANNER_SECTION]' );
				while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'template-parts/content', 'template' );



			// End of the loop.
		endwhile;

			echo do_shortcode( '[SHOW_PAGE_SECTION]' );

		?>

	</main><!-- .site-main -->

	<?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .Body-Content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
