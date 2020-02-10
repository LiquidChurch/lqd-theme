<?php
global $sermon;
$tags = $sermon->tags();
if (empty($tags))
    return false;
?>
<div id="lqdm-tags" class="row">
    <div class="col-sm-3">
        <b>Tag:</b>
    </div>
    <div class="col-sm-9">
        <?php
        $tag = [];
        foreach ($tags as $key => $val) {
            $tag[] = $val->name;
        }
        echo implode(', ', $tag);
        ?>
    </div>
</div>
