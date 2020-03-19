<?php
/**
 * The template used for displaying landing page content
 *
 * @package WordPress
 * @subpackage Liquid_Church
<<<<<<< HEAD
 * @since 1.0.0
=======
 * @since Liquid Church 1.0
>>>>>>> b8292e0760874892f13b881e19f3c290e16c6461
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header ">
    </header><!-- .entry-header -->

    <?php liquidchurch_post_thumbnail(); ?>

    <!-- .entry-content -->
    <div class="entry-content">
        <?php
        the_content();
        ?>
    </div><!-- .entry-content -->

</article><!-- #post-## -->
