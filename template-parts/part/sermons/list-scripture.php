<?php
global $sermon;
$scriptures = $sermon->get_scriptures();
if (empty($scriptures)) {
    return false;
}
?>
<div id="message-scripture">
    <div class="col-sm-3">
        <b>Scriptures:</b>
    </div>
    <div class="col-sm-9">
        <?php
        $scripture = array();
        foreach ($scriptures as $key => $val) {
            $scripture[] = $val->name;
        }
        echo implode(', ', $scripture);
        ?>
    </div>
</div>
