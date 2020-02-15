<?php
add_filter('the_content', 'gc_sermon_before_after');
$content = strip_tags(get_the_content());
if (empty($content))
    return false;
?>
<div id="message-summary" class="row">
    <div class="col-sm-3">
        <b>Summary:</b>
    </div>
    <div class="col-sm-9">
        <?php
        the_content();
        ?>
    </div>
</div>