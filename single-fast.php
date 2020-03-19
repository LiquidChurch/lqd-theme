<?php
/**
<<<<<<< HEAD
 * Template Name: Single Fast Post Template
=======
 * Template Name: Fast Blog
>>>>>>> b8292e0760874892f13b881e19f3c290e16c6461
 * Template Post Type: post
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

			// Include the single post content template.
			get_template_part( 'template-parts/content', 'fast' );

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
				// Previous/next post navigation.
				/*the_post_navigation( array(
					'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'liquidchurch' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Next post:', 'liquidchurch' ) . '</span> ' .
						'<span class="post-title">%title</span>',
					'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'liquidchurch' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Previous post:', 'liquidchurch' ) . '</span> ' .
						'<span class="post-title">%title</span>',
				) );*/
			}

			// End of the loop.
		endwhile;
		?>

	</main><!-- .site-main -->

	<?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->

<<<<<<< HEAD
=======
<?php // get_sidebar(); ?>
>>>>>>> b8292e0760874892f13b881e19f3c290e16c6461
<?php get_footer(); ?>
