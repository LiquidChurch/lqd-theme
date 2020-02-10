<?php
/* Template Name: Archive Page Custom */
?>
<?php
/**
 *
 * The template for displaying archive pages
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

        <header class="page-header">
            <img src="https://liquidchurch.com/wp-content/uploads/2017/10/PH_love_week_blog.jpg" style="margin:auto; text-align:center;" />
			<?php
			// the_archive_title( '<h1 class="page-title">', '</h1>' );
			// the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>
        </header><!-- .page-header -->
        <div class="lqd-blog">
			<?php
			// Start the Loop.
			$my_post_array = [];
			while ( have_posts() ) : the_post();
				$my_post_array[] = $post->ID;
				// End the loop.
			endwhile;

			echo do_shortcode('[ess_grid alias="blog_post_grid" posts='.implode(',', $my_post_array). ']' );
			// Previous/next page navigation.
			the_posts_pagination( [
				'prev_text'          => __( 'Previous page', 'liquidchurch' ),
				'next_text'          => __( 'Next page', 'liquidchurch' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'liquidchurch' ) . ' </span>',
            ] );

			// If no content, include the "No posts found" template.
			else :
				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>
        </div>
    </main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
