<?php
/**
 * The template used for displaying landing page content
 *
 * @package WordPress
 * @subpackage Liquid_Church
 * @since 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header ">
    </header><!-- .entry-header -->

    <?php liquidchurch_post_thumbnail(); ?>

    <!-- .entry-content -->
    <div class="entry-content py-3">
        <?php
        the_content();
        ?>
    </div><!-- .entry-content -->

</article><!-- #post-## -->
