<?php
global $sermon;
$speakers = $sermon->get_speakers();
if (empty($speakers))
    return false;
?>
<div id="lqdm-speaker" class="row">
    <div class="col-sm-3">
        <b>Speaker:</b>
    </div>
    <div class="col-sm-9">
        <?php
        $speaker = [];
        foreach ($speakers as $key => $val) {
            $speaker[] = $val->name;
        }
        echo implode(', ', $speaker);

        /* TODO: Link the name of the speaker.
        echo $speaker_url->slug; */
        ?>
    </div>
</div>
