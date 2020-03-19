<?php
/**
<<<<<<< HEAD
 * Template Name: Single Sermon Content Template
 *
=======
>>>>>>> b8292e0760874892f13b881e19f3c290e16c6461
 * The template part for displaying single sermon
 *
 * @package WordPress
 * @subpackage Liquid_Church
<<<<<<< HEAD
 * @since 1.0.0
=======
 * @since Liquid Church 1.0
>>>>>>> b8292e0760874892f13b881e19f3c290e16c6461
 */

// Get Sermon object
global $sermon;
$sermon = gc_get_sermon_post();
?>
<<<<<<< HEAD
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <!-- Social Share Modal -->
    <div class="modal fade" id="socialShare" tabindex="-1" role="dialog" aria-labelledby="socialShareLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="text-align:center">
                    <h2>Share This Message</h2>
                </div>
                <div class="modal-body" style="text-align:center">
                    <div class="row">
                        <div class="col-xs-4">
                            <?php $lqd_share_url = get_permalink() ?>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $lqd_share_url ?>"
                               target="_blank"
                               onclick="window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </div>
                        <div class="col-xs-4">
                            <a href="https://twitter.com/intent/tweet?url=<?php echo $lqd_share_url ?>&hashtags=liquidchurch"
                               target="_blank"
                               onclick="window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </div>
                        <div class="col-xs-4">
                            <a href="mailto:?subject=Watch this message from Liquid Church&body=<?php echo $lqd_share_url ?>"><i
                                    class="fa fa-envelope"></i></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label name="Link to Current Message">
                                <input id="lqdCopyLinkInput" style="margin-top: 25px;" type="text" value="<?php echo $lqd_share_url ?>">
                            </label>
                            <br>
                            <span id="lqdCopyLinkClick" style="margin-top:15px;"><button id="lqdCopyButton" class="btn">Copy Link</button></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /Social Share Modal -->
    <div class="entry-content">
        <!-- Message Video / Image -->
        <div id="top-row-single-sermon" class="row">
            <div id="single-sermon-player">
                <?php if ($video_player = gc_get_sermon_video_player($sermon)) : ?>
                    <div class="message-video">
                        <?php echo $video_player; ?>
                    </div>
                <?php
                // Enqueue fitvids for responsive video.
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
                            jQuery('.message-video').fitVids();
                        });
                    </script>
                <?php else : ?>
                    <center><?php liquidchurch_post_thumbnail(); ?></center>
                <?php endif; ?>
            </div>
        </div>
        <!--/ Message Title and Image -->
        <div class="row">
            <div id="lqd-share-message" class="row">
                <div class="col-sm-12" style="text-align:center">
                    <a href="/campus-communication-sign-up" class="btn">
                        <span style="font-size:3rem;" class="fa fa-bell"></span>
                        &nbsp;&nbsp;<span style="float:right;font-size:1.5rem;line-height:3rem;">Subscribe</span>
                    </a>

                    <a href="/give" class="btn">
                        <span style="font-size:3rem;" class="fa fa-usd"></span>
                        &nbsp;&nbsp;<span style="float:right;font-size:1.5rem;line-height:3rem;">Give</span>
                    </a>

                    <a href="#" class="btn" data-toggle="modal" data-target="#socialShare" id="lqdShareModalOpen">
                        <span style="font-size:3rem;" class="fa fa-paper-plane"></span>
                        &nbsp;&nbsp;<span style="float:right;font-size:1.5rem;line-height:3rem">Share</span>
                    </a>
                </div>
            </div>
        </div>
        <!-- Message Details -->
        <div class="lqd-message-content row">
            <?php
            $message_field_to_display = array();
            // Get Configure Options for Liquid Messages Plugin
            $plugin_option = LiquidChurch_Functionality::get_plugin_settings_options('single_message_view');
            // Get a list of the message fields to display TODO: Add documentation
            if (!empty($plugin_option))
                $message_field_to_display = !empty($plugin_option['message_field_to_display']) ? $plugin_option['message_field_to_display'] : array();
            ?>

            <div id="single-sermon-content" class="col-md-12">
                <!-- If Title Option is Selected -->
                <?php if (in_array('title', $message_field_to_display)) { ?>
                    <div class="row single-sermon-title">
                        <header class="entry-header col-sm-7" style="margin-top: 20px;">
                            <?php the_title('<h1 class="gc-sermon-title">', '</h1>'); ?>
                        </header>

                        <!-- If Sermon Image Option is Selected -->
                        <?php if (in_array('sermon_image', $message_field_to_display)) { ?>
                            <div class="col-sm-5 gc-right-col">
                                <?php echo wp_get_attachment_image($sermon->featured_image_id(), 'full', false, array(
                                    'class' => 'gc-series-list-sermons-img',
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

                <?php // If Summary Option Enabled
                if (in_array('description', $message_field_to_display)) {
                    get_template_part('template-parts/part/sermons/list', 'summary');
                } ?>

                <?php // If Date Option Enabled
                if (in_array('date', $message_field_to_display)) {
                    get_template_part('template-parts/part/sermons/list', 'date');
                } ?>

                <?php // If Additional Resources Option Enabled
                if (in_array('additional_resource', $message_field_to_display)) {
                    get_template_part('template-parts/part/sermons/list', 'addtnl-resource');
                } ?>
            </div>
            <!--/ Message Details -->

            <!-- Show Other Messages in Series -->
            <?php
            $other_msg = do_shortcode('[gc_sermons per_page="5" related_series="this" thumbnail_size="medium" number_columns="4"]');
            if (!empty($other_msg)) {
            ?>
                <div id="message-others" class="row gc-individual-sermon-list">
                    <div class="col-sm-12" style="text-align:center;">
                        <h1 class="gc-sermon-title other-msg-title">Other Messages in This Series</h1>
                    </div>
                    <div class="col-sm-12">
                        <?php echo $other_msg; ?>
                    </div>
                </div>
            <?php } ?>
            <!--/ Show Other Messages in Series -->
        </div>
    </div>
=======

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="entry-content" style="">
        <div class="row">
            <div id="top-row-single-sermon" class="row">
                <div id="single-sermon-player" class="col-sm-12">
                    <?php if ($video_player = gc_get_sermon_video_player($sermon)) : ?>
                        <div class="message-video">
                            <?php echo $video_player; ?>
                        </div>
                    <?php
                    // Enqueue fitvids for responsive video.
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
                                jQuery('.message-video').fitVids();
                            });
                        </script>
                    <?php else : ?>
                        <?php liquidchurch_post_thumbnail(); ?>
                    <?php endif; ?>
                </div>
                <div class="row" style="padding-left:55px;padding-right:55px;">

                    <?php
                    $message_field_to_display = array();
                    $plugin_option = LiquidChurch_Functionality::get_plugin_settings_options('single_message_view');
                    if (!empty($plugin_option))
                        $message_field_to_display = !empty($plugin_option['message_field_to_display']) ? $plugin_option['message_field_to_display'] : array();
                    //                    p($message_field_to_display, 0);
                    ?>

                    <div id="single-sermon-content" class="col-md-12">

                        <?php
                        if (in_array('title', $message_field_to_display)) {
                            ?>
                            <div class="row single-sermon-title">
                                <header class="entry-header col-sm-7" style="margin-top: 20px;">

                                    <?php
                                    the_title('<h1 class="gc-sermon-title">', '</h1>');
                                    ?>

                                </header><!-- .entry-header -->

                                <?php
                                if (in_array('sermon_image', $message_field_to_display)) {
                                    ?>
                                    <div class="col-sm-5 gc-right-col">
                                        <?php echo wp_get_attachment_image($sermon->featured_image_id(), 'full', false, array(
                                            'class' => 'gc-series-list-sermons-img',
                                            'style' => 'width:100%;',
                                        )); ?>
                                    </div>
                                    <?php
                                }
                                ?>

                            </div>
                            <?php
                        }
                        ?>

                        <?php
                        if (in_array('series', $message_field_to_display)) {
                            //series list template part
                            get_template_part('template-parts/part/sermons/list', 'series');
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
                        if (in_array('scripture_reference', $message_field_to_display)) {
                            //scripture list template part
                            get_template_part('template-parts/part/sermons/list', 'scripture');
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
                        if (in_array('description', $message_field_to_display)) {
                            //summary list template part
                            get_template_part('template-parts/part/sermons/list', 'summary');
                        }
                        ?>

                        <?php
                        if (in_array('date', $message_field_to_display)) {
                            //summary list template part
                            get_template_part('template-parts/part/sermons/list', 'date');
                        }
                        ?>

                        <?php
                        if (in_array('additional_resource', $message_field_to_display)) {
                            //addtnl-resource list template part
                            get_template_part('template-parts/part/sermons/list', 'addtnl-resource');
                        }
                        ?>

                        <!--<div id="message-resources">
                            <span style="padding-left:15px; font-weight:700;">Downloads and Other Resources:</span>
                            <?php /*do_action('sermon_resources', array(
                                'resource_type' => array('files', 'urls'),
                                'resource_file_type' => array('image', 'video', 'audio', 'pdf', 'zip', 'other'),
                                'resource_post_id' => get_the_id(),
                            )); */ ?>
                        </div>-->

                        <?php
                        $social_share_enable = LiquidChurch_Functionality::get_plugin_settings_options('social_option', 'social_share');
                        if ($social_share_enable == 'yes') {
                            echo '<div class="addthis_sharing_toolbox"></div>';
                        }
                        ?>

                    </div>
                </div>
            </div>
            <?php
            $other_msg = do_shortcode('[gc_sermons per_page="5" related_series="this" thumbnail_size="medium" number_columns="4"]');
            if (!empty($other_msg)) {
                ?>
                <div id="message-others" class="row gc-individual-sermon-list">
                    <h1 class="gc-sermon-title other-msg-title" style="padding-left: 8px !important;">Other Messages in
                        This
                        Series</h1>
                    <?php
                    echo $other_msg;
                    ?>
                </div>
                <?php
            }
            ?>
        </div>
    </div><!-- .entry-content -->

>>>>>>> b8292e0760874892f13b881e19f3c290e16c6461
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
<<<<<<< HEAD
</article><!-- #post-## -->
=======
</article><!-- #post-## -->
>>>>>>> b8292e0760874892f13b881e19f3c290e16c6461
