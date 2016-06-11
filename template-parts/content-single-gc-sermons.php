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
    <div class="row">
    <div class="entry-content" style="padding-left:55px;padding-right:15px;">
        <div class="row">
        <div class="col-md-7">
            <div class="videoWrapper">
                <?php
                $sermon = gc_get_sermon_post( $sermon_post_id );
                $video_player = $sermon->get_video_player();
                echo $video_player;
                ?>
            </div>
        </div>
            <div class="col-md-5">
                <header class="entry-header">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' );
                    $speaker = $sermon->get_speaker( $sermon_post_id );
                    echo $speaker;
                    $excerpt = $sermon->loop_excerpt();
                    echo $excerpt;// entry-title ?>

                </header><!-- .entry-header -->
                </header><!-- .entry-header -->
            </div>
        </div>
        <div>
            <?php

            do_action( 'gc_sermons', array(
                'per_page' => 5,
                'related_series' => 'this',
                'content' => '',
                'thumbnail_size' => 'medium',
                'number_columns' => '4',
            ) );
            ?>
        </div>
        </div>
    </div><!-- .entry-content -->
    </div>
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
