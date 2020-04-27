<?php
/**
 * The template used for displaying the main message page content
 *
 * @package WordPress
 * @subpackage Liquid_Church
 * @since 1.0.0
 */
?>
<?php echo do_shortcode("[rev_slider alias=\"messages-header\"]"); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <!-- .entry-content -->
    <div class="mav-entry entry-content">
        <?php if (isset($_GET['sermon-search'])) : ?>
            <a class="lqdt-home-btn" href="<?php echo home_url('/messages/') ?>">Return to Messages Home</a>
        <?php else: ?>
        <?php endif; ?>

        <?php if (!isset($_GET['sermon-search'])) : ?>
            <p><?php do_action('gc_series', array(
                    'paging_by' => "per_year",
                    'show_num_years_first_page' => 2,
                    'paging_init_year' => date('Y', time()) . ",2016,2015"
                )); ?>
            </p>
        <?php endif; ?>

        <?php wp_link_pages(array(
            'before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'liquidchurch') . '</span>',
            'after' => '</div>',
            'link_before' => '<span>',
            'link_after' => '</span>',
            'pagelink' => '<span class="screen-reader-text">' . __('Page', 'liquidchurch') . ' </span>%',
            'separator' => '<span class="screen-reader-text">, </span>',
        )); ?>
    </div><!-- .entry-content -->
</article><!-- #post-## -->
