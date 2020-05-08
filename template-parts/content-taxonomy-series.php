<?php
/**
 * The template part for displaying the series view
 *
 * @package WordPress
 * @subpackage Liquid_Church
 * @since 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="lqdm-series-individual-msg">
        <?php
        global $sermon;
        $sermon = gc_get_sermon_post(get_the_ID());

        $message_field_to_display = array();
        $plugin_option = LQDM_Plugin::get_plugin_settings_options('single_series_view');
        if (!empty($plugin_option)) {
            {
                $message_field_to_display = ! empty( $plugin_option['message_field_to_display'] ) ? $plugin_option['message_field_to_display'] : array();
            }
        }
        ?>
        <div class="row">
            <?php
            $second_col = 'col-md-12';
            if (in_array('sermon_image', $message_field_to_display)) {
                $second_col = 'col-md-7';
            ?>
                <div class="col-md-5">
                    <a href="<?php echo $sermon->permalink(); ?>">
                        <?php echo wp_get_attachment_image($sermon->featured_image_id(), 'full', false, array(
                            'class' => 'lqd-series-list-msgs-img',)); ?>
                    </a>
                </div>
            <?php } ?>
            <div class="<?php echo $second_col ?>">

                <?php if (in_array('title', $message_field_to_display)) { ?>
                    <header class="entry-header">
                        <?php the_title(sprintf('<h2><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
                    </header><!-- .entry-header -->
                <?php } ?>

                <?php // If Speaker Option Enabled
                if (in_array('speakers', $message_field_to_display)) {
                    get_template_part('template-parts/part/sermons/list', 'speaker');
                } ?>

                <?php // If Series Part Option Enabled
                $exclude_msg = $sermon->get_meta('gc_exclude_msg');
                if (in_array('part_of_series', $message_field_to_display)
                    && ($exclude_msg != 'on')
                ) {
                    get_template_part('template-parts/part/sermons/list', 'series-part');
                } ?>

                <?php // If Topic Option is Enabled
                if (in_array('topics', $message_field_to_display)) {
                    get_template_part('template-parts/part/sermons/list', 'topics');
                } ?>

                <?php // If Tags Option is Enabled
                if (in_array('tags', $message_field_to_display)) {
                    get_template_part('template-parts/part/sermons/list', 'tags');
                } ?>

                <?php // If Scripture Option is Enabled
                if (in_array('scripture_reference', $message_field_to_display)) {
                    get_template_part('template-parts/part/sermons/list', 'scripture');
                } ?>

                <?php // If Summary Option is Enabled
                if (in_array('description', $message_field_to_display)) {
                    get_template_part('template-parts/part/sermons/list', 'summary');
                } ?>

                <?php // If Date Option is Enabled
                if (in_array('date', $message_field_to_display)) {
                    get_template_part('template-parts/part/sermons/list', 'date');
                } ?>
            </div>
        </div>
    </div><!-- .entry-content -->
    <footer class="entry-footer">
        <?php liquidchurch_entry_meta(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->
