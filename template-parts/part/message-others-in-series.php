<?php
/**
 * Show Other Messages in Series
 */
$other_msg = do_shortcode('[gc_sermons per_page="5" related_series="this" thumbnail_size="medium" number_columns="4"]');
if (!empty($other_msg)) { ?>
    <div class="lqdm-other-msgs">
        <div class="col-sm-12">
            <h1 class="lqdm-other-msgs-header">Other Messages in This Series</h1>
        </div>
        <div class="col-sm-12">
            <?php echo $other_msg; ?>
        </div>
    </div>
<?php } ?> <!--/ Show Other Messages in Series -->
