<?php
/**
 * The template used for displaying landing page content
 *
 * @package WordPress
 * @subpackage Liquid_Church
 * @since Liquid Church 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header ">
    </header><!-- .entry-header -->

    <?php lqdm_post_thumbnail(); ?>

    <!-- .entry-content -->
    <div class="entry-content">
        <?php
        the_content();
        ?>
    </div><!-- .entry-content -->

</article><!-- #post-## -->
