<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Liquid_Church
 * @since 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php liquidchurch_post_thumbnail(); ?>

    <!-- .entry-content -->
    <div class="entry-content">
        <?php if (isset($_GET['sermon_search'])) : ?>
            <p><a href="/messages/">Return to Messages Home</a></p>
        <?php endif; ?>

        <?php the_content(); ?>

        <hr/>
        <p><?php echo do_shortcode('[gc_series paging_by="per_year" show_num_years_first_page="2" paging_init_year=' .
                                   date('Y') .
                                   '",2016,2015" per_page="12" remove_dates=false remove_thumbnail=false thumbnail_size="medium" number_columns="3" list_offset="1" wrap_classes="other-series" remove_pagination=false]'); ?></p>

        <?php wp_link_pages(array(
            'before'      => '<div class="page-links"><span class="page-links-title">' .
                             __('Pages:', 'liquidchurch') . '</span>',
            'after' => '</div>',
            'link_before' => '<span>',
            'link_after' => '</span>',
            'pagelink'    => '<span class="screen-reader-text">' . __('Page', 'liquidchurch') .
                             ' </span>%',
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
