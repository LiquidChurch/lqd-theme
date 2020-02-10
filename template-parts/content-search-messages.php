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

    <?php lqdm_post_thumbnail(); ?>

    <div class="entry-content">
        <p><a class="home-btn" href="<?php echo home_url('/messages/') ?>">Return to Messages Home</a></p>

        <?php the_content(); ?>

        <hr/>
        <h1>Search for Individual Messages and Entire Series</h1>
        <p><?php do_action('lqdm_search', [ 'separate_results' => false ] ); ?></p>

        <?php if (!isset($_GET['lqdm-search'])) : ?>
            <hr/>
            <h1>Browse Message Archive</h1>
            <p><?php do_action('lqdm_series', [
                    'paging_by' => "per_year",
                    'show_num_years_first_page' => 2,
                    'paging_init_year' => date('Y', time()) . ",2016,2015" // TODO: What is this?
                ] ); ?>
            </p>
        <?php endif; ?>

        <?php wp_link_pages( [
            'before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'liquidchurch') . '</span>',
            'after' => '</div>',
            'link_before' => '<span>',
            'link_after' => '</span>',
            'pagelink' => '<span class="screen-reader-text">' . __('Page', 'liquidchurch') . ' </span>%',
            'separator' => '<span class="screen-reader-text">, </span>',
        ] ); ?>
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
