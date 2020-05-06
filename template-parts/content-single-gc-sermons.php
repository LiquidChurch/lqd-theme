<?php
/**
 * Template Name: Single Message Content Template
 *
 * The template part for displaying single message
 *
 * @package WordPress
 * @subpackage Liquid_Church
 * @since 1.0.0
 */

global $sermon;
$sermon = gc_get_sermon_post();
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php get_template_part('template-parts/part/social', 'share-modal'); ?>
    <div class="entry-content">
        <div class="lqdm-single-msg-content">
            <div class="col-xs-12 visible-xs visible-sm center-block">
                <?php
                $series = $sermon->get_series();
                if (!empty($series)) {
                    echo '<a href="' . $series->term_link . '" class="blue_btn">Go Back To ' . $series->name . ' Series</a>';
                }
                ?>
            </div>
                <?php get_template_part('template-parts/part/message', 'video-image'); ?>
                <?php get_template_part( 'template-parts/part/message', 'details'); ?>
                <?php get_template_part( 'template-parts/part/message', 'others-in-series') ?>

        </div>
    </div>
    <?php get_template_part( 'template-parts/part/message', 'edit-footer'); ?>
</article><!-- #post-## -->
