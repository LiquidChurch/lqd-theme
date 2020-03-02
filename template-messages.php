<?php
/**
 * Template Name: Messages
 * The template for displaying messages
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
<?php if (! is_front_page() ) { ?>
	<?php //get_sidebar( 'content-bottom' ); ?>
<?php } ?>


</div><!-- .content-area -->

<?php if (! is_front_page() ) { ?>
<?php //get_sidebar(); ?>
<?php } ?>
<?php get_footer(); ?>
