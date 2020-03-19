<?php
/**
 * The template for displaying 404 pages (not found)
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
			<!-- .entry-content -->
			<div class="entry-content">
				<section class="error-404 not-found">
					<header class="page-header">
<<<<<<< HEAD
=======
						<h1 class="page-title"><?php //_e( 'Oops! That page can&rsquo;t be found.', 'liquidchurch' ); ?></h1>
						<?php //$url = wp_get_attachment_url( get_post_thumbnail_id($post->'3061'), 'thumbnail' ); ?>
>>>>>>> b8292e0760874892f13b881e19f3c290e16c6461
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/image/404-page-not-found.jpg" />
					</header><!-- .page-header -->

					<div class="page-content">
						<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'liquidchurch' ); ?></p>

						<?php get_search_form(); ?>
					</div><!-- .page-content -->
				</section><!-- .error-404 -->
			</div><!-- .entry-content -->
		</main><!-- .site-main -->
<<<<<<< HEAD
	</div><!-- .content-area -->

<?php get_footer(); ?>
=======

		<?php //get_sidebar( 'content-bottom' ); ?>

	</div><!-- .content-area -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
>>>>>>> b8292e0760874892f13b881e19f3c290e16c6461
