<?php
/**
 * The template part for displaying the series view in LQD mobile app
 *
 * @package WordPress
 * @subpackage Liquid_Church
 * @since 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-content lqdm-series-each-msg mav-series">
        <?php
        global $sermon;
        $sermon = gc_get_sermon_post(get_the_ID());

        $message_field_to_display = array();
        $plugin_option = GC_Sermons_Plugin::get_plugin_settings_options('single_series_view');
        if (!empty($plugin_option))
            $message_field_to_display = !empty($plugin_option['message_field_to_display']) ? $plugin_option['message_field_to_display'] : array();
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
                            'class' => 'lqdm-msg-feature-img',)); ?>
                    </a>
                </div>
                <?php
            }
            ?>
            <div class="<?php echo $second_col ?>">

                <?php
                if (in_array('title', $message_field_to_display)) {
                    ?>
                    <header class="entry-header">
                        <?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
                    </header><!-- .entry-header -->
                    <?php
                }
                ?>

                <?php
                if (in_array('speakers', $message_field_to_display)) {
                    //speaker list template part
                    get_template_part('template-parts/part/sermons/list', 'speaker');
                }
                ?>

                <?php
                $exclude_msg = $sermon->get_meta('gc_exclude_msg');
                if (in_array('part_of_series', $message_field_to_display)
                    && ($exclude_msg != 'on')
                ) {
                    //series part list template part
                    get_template_part('template-parts/part/sermons/list', 'series-part');
                }
                ?>

                <?php
                if (in_array('topics', $message_field_to_display)) {
                    //topics list template part
                    get_template_part('template-parts/part/sermons/list', 'topics');
                }
                ?>

                <?php
                if (in_array('tags', $message_field_to_display)) {
                    //tags list template part
                    get_template_part('template-parts/part/sermons/list', 'tags');
                }
                ?>

                <?php
                if (in_array('scripture_reference', $message_field_to_display)) {
                    //scripture list template part
                    get_template_part('template-parts/part/sermons/list', 'scripture');
                }
                ?>

                <?php
                if (in_array('description', $message_field_to_display)) {
                    //summary list template part
                    get_template_part('template-parts/part/sermons/list', 'summary');
                }
                ?>

                <?php
                if (in_array('date', $message_field_to_display)) {
                    //date template part
                    get_template_part('template-parts/part/sermons/list', 'date');
                }
                ?>
            </div>
        </div>
    </div><!-- .entry-content -->
    <footer class="entry-footer">
        <?php liquidchurch_entry_meta(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->
