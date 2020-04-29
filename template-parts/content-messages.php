<?php
/**
 * Template Name: Main Message Page Content
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
        <?php if (isset($_GET['sermon-search'])) : ?>
            <a class="lqdt-home-btn" href="<?php echo home_url('/messages/') ?>">Return to Messages Home</a>
        <?php else: ?>
        <?php the_content(); ?>
        <?php endif; ?>

        <?php get_template_part( 'template-parts/part/messages', 'recent' ); ?>

        <?php get_template_part ( 'template-parts/part/messages', 'search-prompt' ); ?>

        <?php get_template_part ( 'template-parts/part/messages', 'browse' ); ?>

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
