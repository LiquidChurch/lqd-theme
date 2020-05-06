<?php
global $sermon;
$sermon = gc_get_sermon_post();
?>
<?php if ($video_player = gc_get_sermon_video_player($sermon)) : ?>
    <div class="lqdm-video-player embed-responsive embed-responsive-16by9">
        <?php echo $video_player; ?>
    </div>
<?php else : ?>
    <div class="center-block"><?php liquidchurch_post_thumbnail(); ?></div>
<?php endif; ?>
