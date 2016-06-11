<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage Liquid_Church
 * @since Liquid Church 1.0
 */

// Get Sermon object
$sermon = gc_get_sermon_post();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="row">
        <div class="entry-content" style="padding-left:55px;padding-right:15px;">
            <div class="row">
                <div class="col-md-7">
                    <?php if ( $video_player = gc_get_sermon_video_player( $sermon ) ) : ?>
                        <div class="message-video">
                            <?php echo $video_player; ?>
                        </div>
                    <?php
                    // Enqueue fitvids for responsive video.
                    wp_enqueue_script(
                        'fitvids',
                        GC_Sermons_Plugin::$url . 'assets/js/vendor/jquery.fitvids.js',
                        array( 'jquery' ),
                        '1.1',
                        true
                    );
                    ?>
                        <script type="text/javascript">
                            jQuery( function( $ ) {
                                jQuery( '.message-video' ).fitVids();
                            });
                        </script>
                    <?php else : ?>
                        <?php liquidchurch_post_thumbnail(); ?>
                    <?php endif; ?>

                </div>
                <div class="col-md-5">
                    <header class="entry-header">
                        <?php
                            the_title( '<h1 class="entry-title">', '</h1>' );
                        ?>
                    </header><!-- .entry-header -->
                    <?php
                    do_action( 'gc_recent_speaker', array( 'sermon_id' => $sermon->ID ) );
                    ?>
                    <div class="gc-summary">
                    <div class="row">
                            <div class="col-sm-3">
                                <span>Summary:</span>
                            </div>
                        <div class="col-sm-9">
                            <?php
                            add_filter('the_content', 'gc_sermon_before_after');
                            $content = the_content();
                            echo  $content;
                            ?>
                        </div>
                    </div>
                    </div>
                    <div class="message-series">
                        <?php
                             $series = $sermon->get_series();
                        ?>
                        <p>Part of the <a href="<?php $series->url; ?>"><?php echo $series->name; ?> Series</a></p>
                    </div>
                    <div class="message-related-links">
                        <?php do_action( 'gc_related_links', array( 'sermond_id' => $sermon->ID ) ); ?>
                    </div>

                    <div class="">

                    </div>
            </div>
            <div style="margin-top:40px;">
                <?php

                do_action( 'gc_sermons', array(
                    'per_page' => 5,
                    'related_series' => 'this',
                    //'content' => '',
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