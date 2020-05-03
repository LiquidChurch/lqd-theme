<div class="lqd-footer-top container-fluid">
    <div class="row d-flex p-4">
        <div class="col-xs-12 col-md-8 d-flex">
            <ul class="lqd-footer-top-left my-auto">
                <?php if ( get_theme_mod( 'lqd_contact_us' ) ) { ?>
                    <li>
                        <a href="<?php echo get_theme_mod( 'lqd_contact_us' ); ?>" title="Contact Us">Contact Us</a>
                    </li>
                <?php } ?>
                <?php if ( get_theme_mod( 'lqd_phone_number' ) ) { ?>
                    <li>
                        <a href="<?php echo 'tel:' . get_theme_mod( 'lqd_phone_number' ); ?>" title="Contact Phone Number">
                            <?php echo get_theme_mod( 'lqd_phone_number' ); ?>
                        </a>
                    </li>
                <?php } ?>
                <?php if ( get_theme_mod( 'lqd_email' ) ) { ?>
                    <li>
                        <a href="<?php echo 'mailto:' . get_theme_mod( 'lqd_email' ); ?>" title="Contact Email">
                            <?php echo get_theme_mod( 'lqd_email' ); ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <div class="col-xs-12 col-md-4 d-flex flex-row-reverse">
            <ul class="lqd-footer-top-right my-auto">
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
