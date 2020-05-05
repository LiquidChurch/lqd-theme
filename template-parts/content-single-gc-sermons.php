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
    <?php get_template_part('/template-parts/part/social'. 'share-modal' ); ?>
    <div class="entry-content py-3">
        <?php get_template_part( 'template-parts/part/message', 'video-image'); ?>
        <?php get_template_part( 'template-parts/part/message', 'details'); ?>
        <?php get_template_part( 'template-parts/part/message', 'others-in-series'); ?>
    </div>
    <?php get_template_part( 'template-parts/part/message', 'edit-footer.php'); ?>
</article><!-- #post-## -->
