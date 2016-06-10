<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php
        $sermon = gc_get_sermon_post( $sermon_post_id );
        $video_player = $sermon->get_video_player();
        echo $video_player;
        $excerpt = $sermon->loop_excerpt();
        echo $excerpt;
        do_action( 'gc_sermons', array(
            'per_page' => 5,
            'related_series' => 'this',
            'content' => '',
            'thumbnail_size' => 'medium',
            'number_columns' => '4',
        ) );
        ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php liquidchurch_entry_meta(); ?>
        <?php
        edit_post_link(
            sprintf(
            /* translators: %s: Name of current post */
                __( 'Edit<span class="screen-reader-text"> "%s"</span>', 'liquidchurch' ),
                get_the_title()
            ),
            '<span class="edit-link">',
            '</span>'
        );
        ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->
