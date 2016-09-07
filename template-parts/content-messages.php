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

    <?php liquidchurch_post_thumbnail(); ?>

    <!-- .entry-content -->
    <div class="entry-content">
        <?php if (isset($_GET['sermon-search'])) : ?>
            <a class="home-btn" href="<?php echo home_url('/messages/') ?>">Return to Messages Home</a>
        <?php else: ?>
        <?php the_content(); ?>
        <?php endif; ?>

        <?php if (!isset($_GET['sermon-search'])) : ?>
            <hr/>
            <h1>Most Recent Messages</h1>
            <p><?php do_action('gc_sermons', array('per_page' => '4', 'remove_pagination' => true, 'content' => 'excerpt', 'thumbnail_size' => 'medium', 'number_columns' => 4)); ?></p>
        <?php endif; ?>

        <hr/>
        <h1>Search for Series and Sermons</h1>
        <p><?php do_action('gc_sermons_search', array('separate_results' => false)); ?></p>

        <?php if (!isset($_GET['sermon-search'])) : ?>
            <hr/>
            <h1>Browse Message Archive</h1>
            <p><?php do_action('gc_series', array(
                    'paging_by' => "per_year",
                    'paging_init_year' => "2016,2015"
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

    <?php
    edit_post_link(
        sprintf(
        /* translators: %s: Name of current post */
            __('Edit<span class="screen-reader-text"> "%s"</span>', 'liquidchurch'),
            get_the_title()
        ),
        '<footer class="entry-footer"><span class="edit-link">',
        '</span></footer><!-- .entry-footer -->'
    );
    ?>

</article><!-- #post-## -->
