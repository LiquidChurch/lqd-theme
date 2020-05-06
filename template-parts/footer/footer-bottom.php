<div class="lqd-footer-bottom container-fluid">
    <div class="row">
        <div class="col-md-2 col-xs-6 col-sm-6 lqd-footer-inner-block">
            <?php
            if(is_active_sidebar('footer-about-us')){
                dynamic_sidebar('footer-about-us');
            }else{
                echo '<div class="lqd-footer-menu-setup"><h2><a href="' . home_url('wp-admin/widgets.php') . '">Add About Us Menu </a></h2></div>';
            }
            ?>
        </div>
        <div class="col-md-2 col-xs-6 col-sm-6 lqd-footer-inner-block">
            <?php
            if(is_active_sidebar('footer-life-events')){
                dynamic_sidebar('footer-life-events');
            }else{
                echo '<div class="lqd-footer-menu-setup"><h2><a href="' . home_url('wp-admin/widgets.php') . '">Add Life Event Menu</a></h2></div>';
            }
            ?>
        </div>
        <div class="col-md-2 col-xs-6 col-sm-6 lqd-footer-inner-block">
            <?php
            if(is_active_sidebar('footer-messages')){
                dynamic_sidebar('footer-messages');
            }else{
                echo '<div class="lqd-footer-menu-setup"><h2><a href="' . home_url('wp-admin/widgets.php') . '">Add Message Menu</a></h2></div>';
            }
            ?>
        </div>
        <div class="col-md-2 col-xs-6 col-sm-6 lqd-footer-inner-block">
            <?php
            if(is_active_sidebar('footer-media')){
                dynamic_sidebar('footer-media');
            }else{
                echo '<div class="lqd-footer-menu-setup"><h2><a href="' . home_url('wp-admin/widgets.php') . '">Add Media Menu</a></h2></div>';
            } ?>
        </div>
        <div class="col-md-2 col-xs-6 col-sm-6 lqd-footer-inner-block">
            <?php
            if(is_active_sidebar('footer-give')){
                dynamic_sidebar('footer-give');
            }else{
                echo '<div class="lqd-footer-menu-setup"><h2><a href="' . home_url('wp-admin/widgets.php') . '">Add Give Menu</a></h2></div>';
            } ?>
        </div>
        <div class="col-md-2 col-xs-6 col-sm-6 lqd-footer-inner-block">
            <?php
            if(is_active_sidebar('footer-help')){
                dynamic_sidebar('footer-help');
            }else{
                echo '<div class="lqd-footer-menu-setup"><h2><a href="' . home_url('wp-admin/widgets.php') . '">Add Help Menu</a></h2></div>';
            } ?>
        </div>
    </div>
</div>
