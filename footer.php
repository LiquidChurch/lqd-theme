<?php
/**
 * Template Name: Footer
 *
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Liquid_Church
 * @since 1.0.0
 */

?>
</div>
</div>

<?php get_template_part( 'template-parts/footer/footer', 'top' ); ?>
<?php get_template_part( 'template-parts/footer/footer', 'bottom'); ?>
</div>
<?php wp_footer(); ?>
</body>
</html>
