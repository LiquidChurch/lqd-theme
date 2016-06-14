<?php
/**
 * The template for displaying archive pages for a single sermon series.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Liquid_Church
 * @since Liquid Church 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>
				<?php

				$series = gc_sermons()->taxonomies->series->get( get_queried_object_id() );
			if ( $series->image_id ) {
				echo wp_get_attachment_image( $series->image_id, 'full', false, array(
					'class' => 'gc-single-series-sermons-img',
				) );
			}
			echo '<p style="font-size:2.5rem; text-align:center; padding-bottom:20px;">' . $series->description . '</p>';
			?>
			<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();
				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content-taxonomy-series', get_post_format() );

				// End the loop.
			endwhile;

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'liquidchurch' ),
				'next_text'          => __( 'Next page', 'liquidchurch' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'liquidchurch' ) . ' </span>',
			) );

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>
