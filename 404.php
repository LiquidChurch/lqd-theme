<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Liquid_Church
 * @since 1.0.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<!-- .entry-content -->
			<div class="entry-content">
				<section class="error-404 not-found">
					<header class="page-header">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/image/404-page-not-found.jpg" />
					</header><!-- .page-header -->

					<div class="page-content">
						<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'liquidchurch' ); ?></p>

						<?php get_search_form(); ?>
					</div><!-- .page-content -->
				</section><!-- .error-404 -->
			</div><!-- .entry-content -->
		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
