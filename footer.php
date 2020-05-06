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
<!-- Footer Area start -->
<div class="lqd-footer-top">
        <div class="col-xs-12 col-md-8">
            <ul class="lqd-footer-top-left">
                <?php
                if(is_active_sidebar('footer-contact-us')){
                    echo '<li>';
                    dynamic_sidebar('footer-contact-us');
                    echo '</li>';
                }else{
                    echo ' <li><a href="'.home_url('wp-admin/customize.php').'">Add Contact Number</a></li>';
                } ?>
            </ul>
        </div>
        <div class="col-xs-12 col-md-4">
            <ul class="lqd-footer-top-right">
                <?php if( get_theme_mod( 'facebook_id_theme' ) )  { ?>
                    <li>
                        <a target="_blank" href="<?php echo get_theme_mod( 'facebook_id_theme' ) ;?>" class="ffb" title="Facebook"><i class="ffb"></i></a>
                    </li>
                <?php }?>
                <?php if( get_theme_mod( 'twitter_id_theme' ) )  { ?>
                    <li>
                        <a target="_blank" href="<?php echo get_theme_mod( 'twitter_id_theme' )  ;?>" class="ftwitter" title="Twitter"><i class="ftwitter"></i></a>
                    </li>
                <?php }?>
                <?php if( get_theme_mod( 'instagram_id_theme' ) )  { ?>
                    <li>
                        <a target="_blank" href="<?php echo get_theme_mod( 'instagram_id_theme' )  ;?>" class="finsta" title="Instagram"><i class="finsta"></i></a>
                    </li>
                <?php }?>
                <?php if( get_theme_mod( 'youtube_id_theme' ) )  { ?>
                    <li>
                        <a target="_blank" href="<?php echo get_theme_mod( 'youtube_id_theme' )  ;?>" class="fyoutube" title="Youtube"><i class="fyoutube"></i></a>
                    </li>
                <?php }?>
                <?php if( get_theme_mod( 'vimeo_id_theme' ) )  { ?>
                    <li>
                        <a target="_blank" href="<?php echo get_theme_mod( 'vimeo_id_theme' );?>" class="fvimeo" title="Vimeo"><i class="fvimeo"></i></a>
                    </li>
                <?php }?>
            </ul>
        </div>
</div>

<div class="lqd-footer-bottom">
    <div class="row">
        <div class="col-md-2 col-xs-6 col-sm-6 lqd-footer-inner-block">
            <?php
            if(is_active_sidebar('footer-about-us')){
                dynamic_sidebar('footer-about-us');
            }else{
                echo '<div class="footer_menu_widget_else"><h2><a href="'.home_url('wp-admin/widgets.php').'">Add About Us Menu </a></h2></div>';
            }
            ?>
        </div>
        <div class="col-md-2 col-xs-6 col-sm-6 lqd-footer-inner-block">
            <?php
            if(is_active_sidebar('footer-life-events')){
                dynamic_sidebar('footer-life-events');
            }else{
                echo '<div class="footer_menu_widget_else"><h2><a href="'.home_url('wp-admin/widgets.php').'">Add Life Event Menu</a></h2></div>';
            }
            ?>
        </div>
        <div class="col-md-2 col-xs-6 col-sm-6 lqd-footer-inner-block">
            <?php
            if(is_active_sidebar('footer-messages')){
                dynamic_sidebar('footer-messages');
            }else{
                echo '<div class="footer_menu_widget_else"><h2><a href="'.home_url('wp-admin/widgets.php').'">Add Message Menu</a></h2></div>';
            }
            ?>
        </div>
        <div class="col-md-2 col-xs-6 col-sm-6 lqd-footer-inner-block">
            <?php
            if(is_active_sidebar('footer-media')){
                dynamic_sidebar('footer-media');
            }else{
                echo '<div class="footer_menu_widget_else"><h2><a href="'.home_url('wp-admin/widgets.php').'">Add Media Menu</a></h2></div>';
            } ?>
        </div>
        <div class="col-md-2 col-xs-6 col-sm-6 lqd-footer-inner-block">
            <?php
            if(is_active_sidebar('footer-give')){
                dynamic_sidebar('footer-give');
            }else{
                echo '<div class="footer_menu_widget_else"><h2><a href="'.home_url('wp-admin/widgets.php').'">Add Give Menu</a></h2></div>';
            } ?>
        </div>
        <div class="col-md-2 col-xs-6 col-sm-6 lqd-footer-inner-block">
            <?php
            if(is_active_sidebar('footer-help')){
                dynamic_sidebar('footer-help');
            }else{
                echo '<div class="footer_menu_widget_else"><h2><a href="'.home_url('wp-admin/widgets.php').'">Add Help Menu</a></h2></div>';
            } ?>
        </div>
    </div>
</div>
</div>
<?php wp_footer(); ?>
</body>
</html>
  <!-- Footer Area start -->
