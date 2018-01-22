<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Liquid_Churchn
 * @since Liquid Church 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header ">
        <?php //the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </header><!-- .entry-header -->

    <!-- .entry-content -->
    <div class="entry-content">
        <?php if (isset($_GET['sermon-search'])) : ?>
            <a class="home-btn" href="<?php echo home_url('/messages/') ?>">Return to Messages Home</a>
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