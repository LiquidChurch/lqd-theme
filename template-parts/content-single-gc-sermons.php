<?php
/**
 * The template part for displaying single sermon
 *
 * @package WordPress
 * @subpackage Liquid_Church
 * @since Liquid Church 1.0
 */

// Get Sermon object
$sermon = gc_get_sermon_post();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content" style="padding-left:55px;padding-right:55px;">
		<div class="row">
			<div id="top-row-single-sermon" class="row">
				<div id="single-sermon-player" class="col-sm-12">
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
                <div class="row" style="padding-left:55px;padding-right:55px;">
                <div id="single-sermon-content" class="col-md-12 gc-lg-rt-col">
                    <header class="entry-header">
                        <?php
                            the_title( '<h1 class="gc-sermon-title">', '</h1>' );
                        ?>
                    </header><!-- .entry-header -->
	                <div id="message-series" class="row">
		                <div class="col-sm-3 gc-left-col">
                                <span>Series:</span>
                            </div>
		                <div class="col-sm-9 gc-right-col">
                                <?php
                                $series = $sermon->get_series();
                                echo '<a href="' . $series->term_link . '">' . $series->name . '</a>';
                                ?>
                            </div>
	                </div>
                    <div id="message-speaker" class="row">
                        <div class="col-sm-3 gc-left-col">
                            <span>Speaker:</span>
                        </div>
                        <div class="col-sm-9 gc-right-col">
                            <?php
                            $speaker = $sermon->get_speaker();
                            echo $speaker->name;
                            $speaker_url = $sermon->get_speaker();
                            /* TODO: Link the name of the speaker.
                            echo $speaker_url->slug; */
                            ?>
                        </div>
                    </div>
                    <div id="message-summary" class="row">
                            <div class="col-sm-3 gc-left-col">
                                <span>Summary:</span>
                            </div>
                        <div class="col-sm-9 gc-right-col">
                            <?php
                            add_filter('the_content', 'gc_sermon_before_after');
                            $content = the_content();
                            echo  $content;
                            ?>
                        </div>
                    </div>
                   <!-- <div id="message-resources">
                        <span style="padding-left:15px; font-weight:700;">Downloads and Other Resources:</span>
                        <?php /* do_action( 'sermon_resources', array(
                            'resource_type'      => array( 'files', 'urls' ),
                            'resource_file_type' => array( 'image', 'video', 'audio', 'pdf', 'zip', 'other' ),
                            'resource_post_id'   => get_the_id(),
                        ) ); */?>
                    </div>
                    -->
                </div>
                </div>
            </div>
			<div id="message-others" class="row gc-individual-sermon-list">
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