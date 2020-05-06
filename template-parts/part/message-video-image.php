<?php
global $sermon;
$sermon = gc_get_sermon_post();
?>
<div class="lqdm-single-msg-video-image col-xs-12">
        <?php if ($video_player = gc_get_sermon_video_player($sermon)) : ?>
            <div class="videoWrapper">
                <?php echo $video_player; ?>
            </div>
        <?php else : ?>
            <div class="center-block"><?php liquidchurch_post_thumbnail(); ?></div>
        <?php endif; ?>
</div>
