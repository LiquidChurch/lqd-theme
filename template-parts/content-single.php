<?php
/**
 * The template part for displaying single posts
 *
 *
 * @package WordPress
<<<<<<< HEAD
 * @subpackage Liquid_Church
 * @since 1.0.0
=======
 * @subpackage Liquid_Churchn
 * @since Liquid Church 1.0
>>>>>>> b8292e0760874892f13b881e19f3c290e16c6461
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div style="margin:auto; text-align:center; padding-top:10px;">
	<?php liquidchurch_post_thumbnail(); ?>
    </div>

    <header class="entry-header" style="margin:auto; max-width:1000px;">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </header><!-- .entry-header -->

	<div class="entry-content" style="margin:auto; max-width:1000px;">
		<?php
			the_content();

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'liquidchurch' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'liquidchurch' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer" style="max-width:800px;margin:auto;">
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
