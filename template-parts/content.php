<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Liquid_Churchn
 * @since Liquid Church 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
			<span class="sticky-post"><?php _e( 'Featured', 'liquidchurch' ); ?></span>
		<?php endif; ?>

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- .entry-header -->

	<?php liquidchurch_excerpt(); ?>

	<?php lqdm_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'liquidchurch' ),
				get_the_title()
			) );

			wp_link_pages( [
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'liquidchurch' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'liquidchurch' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
            ] );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php //liquidchurch_entry_meta(); ?>
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'liquidchurch' ),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
