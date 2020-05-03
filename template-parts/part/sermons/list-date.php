<?php
global $sermon;
global $post;
if (empty($post->post_date)) {
    {
        return false;
    }
}
?>
<div id="message-date" class="row">
    <div class="col-sm-3">
        <b>Date:</b>
    </div>
    <div class="col-sm-9">
        <?php
        echo date('M d, Y', strtotime($post->post_date));
        ?>
    </div>
</div>
