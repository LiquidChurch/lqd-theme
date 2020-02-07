<?php
global $sermon;
$scriptures = $sermon->get_scriptures();
if (empty($scriptures))
    return false;
?>
<div id="lqdm-scripture" class="row">
    <div class="col-sm-3">
        <b>Scriptures:</b>
    </div>
    <div class="col-sm-9">
        <?php
        $scripture = [];
        foreach ($scriptures as $key => $val) {
            $scripture[] = $val->name;
        }
        echo implode(', ', $scripture);
        ?>
    </div>
</div>
