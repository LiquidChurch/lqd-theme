<div id="top-row-single-msg" class="row">
    <div id="single-msg-player" class="col-sm-12">
        <?php if ($video_player = gc_get_sermon_video_player($sermon)) : ?>
            <div class="lqdt-video videoWrapper">
                <?php echo $video_player; ?>
            </div>
        <?php // Add fitvids for responsive video.
        wp_enqueue_script(
            'fitvids',
            GC_Sermons_Plugin::$url . 'assets/js/vendor/jquery/fitvids.js',
            array('jquery'),
            '1.1',
            true
        );
        ?>
            <script type="text/javascript">
                jQuery(function ($) {
                    jQuery('.lqdt-video').fitVids();
                });
            </script>
        <?php else : ?>
            <div style="text-align:center;" class="lqdt-post-thumbnail"><?php liquidchurch_post_thumbnail(); ?></div>
        <?php endif; ?>
    </div>
</div>
