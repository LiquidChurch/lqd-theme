<div class="lqd-footer-top container">
    <div class="row">
        <div class="col-xs-12 col-md-8">
            <ul class="lqd-footer-top-left">
                <?php
                if(is_active_sidebar('footer-contact-us')){
                    echo '<li>';
                    dynamic_sidebar('footer-contact-us');
                    echo '</li>';
                } else {
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
</div>
