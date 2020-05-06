<?php
global $sermon;
$series = $sermon->get_series();
if (empty($series)) {
    return false;
}
?>
<div class="lqdm-single-msg-series">
    <div class="col-sm-3">
        <b>Series:</b>
    </div>
    <div class="col-sm-9">
        <?php
        echo '<a href="' . $series->term_link . '">' . $series->name . '</a>';
        ?>
    </div>
</div>
