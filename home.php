<?php
/**
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
<<<<<<< HEAD
 * @since 1.0.0
=======
 * @since Liquid Church 1.0
>>>>>>> b8292e0760874892f13b881e19f3c290e16c6461
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

<<<<<<< HEAD
			<header style="padding-left: 20px; padding-right: 20px; padding-top: 20px;">
				<?php
=======
			<header style="padding-left: 20px; padding-right: 20px; padding-botton: 0px; padding-top: 20px;">
				<?php				
>>>>>>> b8292e0760874892f13b881e19f3c290e16c6461
				// removed class "page-header from header GC 10/12/2018 <header class="page-header" style="padding-left: 10px; padding-right: 10px; padding-botton: 1px;">
				//  Next 2 lines commented out 10/11/2018 to use blog slider - GC
				//	the_archive_title( '<h1 class="page-title">', '</h1>' );
				//	the_archive_description( '<div class="taxonomy-description">', '</div>' );
				//  Div below this section added to insert text for header area for blog  10/11/2018 GC
				echo do_shortcode('[rev_slider alias="elixir-blog"]');
				?>
<<<<<<< HEAD
				<div class="entry-content"><i><p>Thanks for checking out our blog!
=======
				<div class="entry-content"><i><p>Thanks for checking out our blog! 
>>>>>>> b8292e0760874892f13b881e19f3c290e16c6461
				We welcome you to click on the articles below to stay up-to-date on what's happening right here at Liquid, catch up on summaries of our latest messages, and get a sneak-peak of what's coming up in Small Groups this week!</p></i></div>
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

				//'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'liquidchurch' ) . ' </span>',
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
