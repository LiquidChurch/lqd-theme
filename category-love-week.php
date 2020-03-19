<?php
/**
 * Template Name: Love Week Archive Template
 *
 * The template for displaying archive pages
 *
 * @package WordPress
 * @subpackage Liquid_Church
 * @since 1.0.0
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

        <header class="page-header">
            <img src="https://liquidchurch.com/wp-content/uploads/2017/10/PH_love_week_blog.jpg" style="margin:auto; text-align:center;" />
        </header><!-- .page-header -->
        <div class="lqd-blog">
			<?php
			// Start the Loop.
			$my_post_array = array();
			while ( have_posts() ) : the_post();
				$my_post_array[] = $post->ID;
				// End the loop.
			endwhile;

			echo do_shortcode('[ess_grid alias="blog_post_grid" posts='.implode(',', $my_post_array). ']' );
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
        </div>
    </main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
