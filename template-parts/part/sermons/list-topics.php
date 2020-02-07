<?php
global $sermon;
$topics = $sermon->topics();
if (empty($topics))
    return false;
?>
<div id="lqdm-topics" class="row">
    <div class="col-sm-3">
        <b>Topic:</b>
    </div>
    <div class="col-sm-9">
        <?php
        $topic = [];
        foreach ($topics as $key => $val) {
            $topic[] = $val->name;
        }
        echo implode(', ', $topic);
        ?>
    </div>
</div>
