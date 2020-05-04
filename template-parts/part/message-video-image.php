<?php
global $sermon;
$sermon = gc_get_sermon_post();
?>
<div id="top-row-single-sermon" class="row">
    <div id="single-sermon-player">
        <?php if ($video_player = gc_get_sermon_video_player($sermon)) : ?>
            <div class="message-video">
                <?php echo $video_player; ?>
            </div>
        <?php else : ?>
            <div class="center-block"><?php liquidchurch_post_thumbnail(); ?></div>
        <?php endif; ?>
    </div>
</div>
