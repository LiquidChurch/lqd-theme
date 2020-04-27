<?php
global $sermon;
$topics = $sermon->topics();
if (empty($topics))
    return false;
?>
<div class="lqdt-msg-topics row">
    <div class="col-sm-3">
        <b>Topic:</b>
    </div>
    <div class="col-sm-9">
        <?php
        $topic = array();
        foreach ($topics as $key => $val) {
            $topic[] = $val->name;
        }
        echo implode(', ', $topic);
        ?>
    </div>
</div>
