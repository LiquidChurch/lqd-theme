<?php
global $sermon;
$display_order = $sermon->get_meta('lqdm_display_order');
if (empty($display_order))
    return false;
?>
<div id="lqdm-series-part" class="row">
    <div class="col-sm-3">
        <b>Part:</b>
    </div>
    <div class="col-sm-9">
        <?php
        echo $display_order;
        ?>
    </div>
</div>
