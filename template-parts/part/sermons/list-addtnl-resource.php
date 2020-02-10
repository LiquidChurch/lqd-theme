<?php
global $sermon;

$addtl_resources = do_shortcode('[lqdm_resources resource_display_name="true"]');

if (empty($addtl_resources) || ($addtl_resources == '<!-- no resources found -->'))
    return false;
?>
<div id="message-resource" class="row">
    <div class="col-sm-3">
        <b>Resources:</b>
    </div>
    <div class="col-sm-9">
        <?php
        echo $addtl_resources;
        ?>
    </div>
</div>
