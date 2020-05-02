<div class="lqd-header-menu row">
    <nav class="navbar navbar-expand-lg">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
            aria-expanded="false" aria-label="Toggle Navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php if ( has_nav_menu( 'primary' ) ) : ?>
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'menu_class'     => 'nav navbar-nav',
                ) );
            else :
                wp_nav_menu( array(
                    'theme_location' => 'default',
                    'menu'  =>  'Default Menu',
                    'menu_class'     => 'nav navbar-nav',
                ) );
                ?>
            <?php endif; ?>

            <form method="get" id="search-form" action="<?php echo home_url('/')?>" class="navbar-form navbar-right" role="search">
                <div class="form-group form-group_new">
                    <label class="screen-reader-text">Search</label>
                    <input type="text" class="form-controlinput paddings" placeholder="Search" name="s" placeholder="Search" >
                    <i class="fa fa-search fa-searchicon" aria-hidden="true"></i>
                </div>
            </form>
        </div>
    </nav>
</div>
