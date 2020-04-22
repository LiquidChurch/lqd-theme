<?php
/**
 * Template Name: Single Message Content Template App View
 *
 * The template part for displaying single message in mobile app
 *
 * @package WordPress
 * @subpackage Liquid_Church
 * @since 1.0.0
 */

global $sermon;
$sermon = gc_get_sermon_post();
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="entry-content" style="">
        <div class="row">
            <div id="top-row-single-msg" class="row">
                <div id="single-msg-player" class="col-sm-12">
                    <?php if ($video_player = gc_get_sermon_video_player($sermon)) : ?>
                        <div class="lqdm-video">
                            <?php echo $video_player; ?>
                        </div>
                    <?php // Enqueue fitvids for responsive video.
                    wp_enqueue_script(
                        'fitvids',
                        GC_Sermons_Plugin::$url . 'assets/js/vendor/jquery.fitvids.js',
                        array('jquery'),
                        '1.1',
                        true
                    );
                    ?>
                        <script type="text/javascript">
                            jQuery(function ($) {
                                jQuery('.lqdm-video').fitVids();
                            });
                        </script>
                    <?php else : ?>
                        <?php liquidchurch_post_thumbnail(); ?>
                    <?php endif; ?>
                </div>
                <div class="row" style="padding-left:30px;padding-right:30px;">

                    <?php
                    $message_field_to_display = array();
                    // Get Configure Options for Liquid Messages Plugin
                    $plugin_option = GC_Sermons_Plugin::get_plugin_settings_options('single_message_view');
                    // Get a list of the message fields to display TODO: Add documentation
                    if (!empty($plugin_option))
                        $message_field_to_display = !empty($plugin_option['message_field_to_display']) ? $plugin_option['message_field_to_display'] : array();
                    ?>

                    <div class="col-md-12">
                        <?php
                            $series = $sermon->get_series();
                            if (!empty($series)) {
                                echo '<div style="text-align:center;"><a href="' . $series->term_link . '" class="blue_btn">Go Back To ' . $series->name . ' Series</a></div>';
                            }
                        ?>
                    </div>

                    <div class="lqdm-msg-content col-md-12">
                        <!-- If Title Option is Selected -->
                        <?php if (in_array('title', $message_field_to_display)) { ?>
                            <div class="row">
                                <header class="entry-header col-sm-7" style="margin-top: 20px;">
                                    <?php the_title( '<h1 class="lqdm-msg-title">', '</h1>'); ?>
                                </header>

                                <!-- If Message Image Option is Selected -->
                                <?php if (in_array('sermon_image', $message_field_to_display)) { ?>
                                    <div class="col-sm-5 lqdm-right-col">
                                        <?php echo wp_get_attachment_image($sermon->featured_image_id(), 'full', false, array(
                                            'class' => 'lqdm-msg-feature-img',
                                            'style' => 'width:100%;',
                                        )); ?>
                                    </div>
                                    <?php } ?>
                            </div>
                            <?php } ?>

                        <?php // If Show Series Option Enabled
                        if (in_array('series', $message_field_to_display)) {
                            get_template_part('template-parts/part/sermons/list', 'series');
                        } ?>

                        <?php // If Show Speaker Option Enabled
                        if (in_array('speakers', $message_field_to_display)) {
                            get_template_part('template-parts/part/sermons/list', 'speaker');
                        } ?>

                        <?php // If Part of Series Option Enabled
                        $exclude_msg = $sermon->get_meta('gc_exclude_msg');
                        if (in_array('part_of_series', $message_field_to_display)
                            && ($exclude_msg != 'on')
                        ) {
                            get_template_part('template-parts/part/sermons/list', 'series-part');
                        } ?>

                        <?php // If Scripture Reference Option Enabled
                        if (in_array('scripture_reference', $message_field_to_display)) {
                            get_template_part('template-parts/part/sermons/list', 'scripture');
                        } ?>

                        <?php // If Topics Option Enabled
                        if (in_array('topics', $message_field_to_display)) {
                            get_template_part('template-parts/part/sermons/list', 'topics');
                        } ?>

                        <?php // If Tags Option Enabled
                        if (in_array('tags', $message_field_to_display)) {
                            get_template_part('template-parts/part/sermons/list', 'tags');
                        } ?>

	                    <?php // If Date Option Enabled
	                    if (in_array('date', $message_field_to_display)) {
		                    get_template_part('template-parts/part/sermons/list', 'date');
	                    } ?>

                        <?php // If Summary Option Enabled
                        if (in_array('description', $message_field_to_display)) {
                            get_template_part('template-parts/part/sermons/list', 'summary');
                        } ?>

                        <?php // If Additional Resources Option Enabled
                        if (in_array('additional_resource', $message_field_to_display)) {
                            get_template_part('template-parts/part/sermons/list', 'addtnl-resource');
                        } ?>
                    </div>
                    <!--/Message Details -->
                </div>
            </div>

            <!-- Show Other Messages in Series -->
            <?php
            $other_msg = do_shortcode('[gc_sermons per_page="5" related_series="this" thumbnail_size="medium" number_columns="4"]');
            if (!empty($other_msg)) { ?>
                <div class="row lqdm-other-msgs">
                    <div class="col-xs-12" style="text-align:center;">
                        <h1 class="lqdm-msg-title lqdm-other-msgs-title">Other Messages in This Series</h1>
                    </div>
                    <div class="col-xs-12">
                        <?php echo $other_msg; ?>
                    </div>

                </div>
                <?php } ?>
            <!--/ Show Other Messages in Series -->
        </div>
    </div>
    <footer class="entry-footer">
        <?php liquidchurch_entry_meta(); ?>
        <?php
        edit_post_link(
            sprintf(
            /* translators: %s: Name of current post */
                __('Edit<span class="screen-reader-text"> "%s"</span>', 'liquidchurch'),
                get_the_title()
            ),
            '<span class="edit-link">',
            '</span>'
        );
        ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->
