<?php
global $sermon;
$tags = $sermon->tags();
if (empty($tags))
    return false;
?>
<div id="message-tags" class="row">
    <div class="col-sm-3">
        <b>Tag:</b>
    </div>
    <div class="col-sm-9">
        <?php
        $tag = array();
        foreach ($tags as $key => $val) {
            $tag[] = $val->name;
        }
        echo implode(', ', $tag);
        ?>
    </div>
</div>