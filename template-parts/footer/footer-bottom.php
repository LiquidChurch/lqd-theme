<div class="lqd-footer-bottom container-fluid">
    <div class="row">
        <div class="col-md-2 col-xs-6 col-sm-6 lqd-footer-inner-block">
            <?php
            if(is_active_sidebar('footer-left-1')){
                dynamic_sidebar('footer-left-1');
            }else{
                echo '<div class="lqd-footer-menu-setup"><h2><a href="' . home_url('wp-admin/widgets.php') . '">Add About Us Menu </a></h2></div>';
            }
            ?>
        </div>
        <div class="col-md-2 col-xs-6 col-sm-6 lqd-footer-inner-block">
            <?php
            if(is_active_sidebar('footer-left-2')){
                dynamic_sidebar('footer-left-2');
            }else{
                echo '<div class="lqd-footer-menu-setup"><h2><a href="' . home_url('wp-admin/widgets.php') . '">Add Life Event Menu</a></h2></div>';
            }
            ?>
        </div>
        <div class="col-md-2 col-xs-6 col-sm-6 lqd-footer-inner-block">
            <?php
            if(is_active_sidebar('footer-left-3')){
                dynamic_sidebar('footer-left-3');
            }else{
                echo '<div class="lqd-footer-menu-setup"><h2><a href="' . home_url('wp-admin/widgets.php') . '">Add Message Menu</a></h2></div>';
            }
            ?>
        </div>
        <div class="col-md-2 col-xs-6 col-sm-6 lqd-footer-inner-block">
            <?php
            if(is_active_sidebar('footer-right-3')){
                dynamic_sidebar('footer-right-3');
            }else{
                echo '<div class="lqd-footer-menu-setup"><h2><a href="' . home_url('wp-admin/widgets.php') . '">Add Media Menu</a></h2></div>';
            } ?>
        </div>
        <div class="col-md-2 col-xs-6 col-sm-6 lqd-footer-inner-block">
            <?php
            if(is_active_sidebar('footer-right-2')){
                dynamic_sidebar('footer-right-2');
            }else{
                echo '<div class="lqd-footer-menu-setup"><h2><a href="' . home_url('wp-admin/widgets.php') . '">Add Give Menu</a></h2></div>';
            } ?>
        </div>
        <div class="col-md-2 col-xs-6 col-sm-6 lqd-footer-inner-block">
            <?php
            if(is_active_sidebar('footer-right-1')){
                dynamic_sidebar('footer-right-1');
            }else{
                echo '<div class="lqd-footer-menu-setup"><h2><a href="' . home_url('wp-admin/widgets.php') . '">Add Help Menu</a></h2></div>';
            } ?>
        </div>
    </div>
</div>
