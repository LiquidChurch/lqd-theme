<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Liquid_Church
<<<<<<< HEAD
 * @since 1.0.0
=======
 * @since Liquid Church 1.0
>>>>>>> b8292e0760874892f13b881e19f3c290e16c6461
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'template-parts/content', 'page' );

			 //If comments are open or we have at least one comment, load up the comment template.
<<<<<<< HEAD
		if (! is_front_page() ) {
=======
		if (! is_front_page() ) {	
>>>>>>> b8292e0760874892f13b881e19f3c290e16c6461
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
		}

			// End of the loop.
		endwhile;
		?>

	</main><!-- .site-main -->
<<<<<<< HEAD
</div><!-- .content-area -->

=======
<?php if (! is_front_page() ) { ?>
	<?php //get_sidebar( 'content-bottom' ); ?>
<?php } ?>


</div><!-- .content-area -->

<?php if (! is_front_page() ) { ?>
<?php //get_sidebar(); ?>
<?php } ?>
>>>>>>> b8292e0760874892f13b881e19f3c290e16c6461
<?php get_footer(); ?>
