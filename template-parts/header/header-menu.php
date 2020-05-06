<div class="lqd-header-menu" style="margin-left:-15px; margin-right:-15px;">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navBarSupportedContent" aria-expanded="false" aria-label="Toggle Navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php if ( has_nav_menu( 'primary' ) ) :
                wp_nav_menu( array(
                  'theme_location'      => 'primary',
                  'menu_class'          => 'navbar-nav mr-auto',
                  'fallback_cb'         => 'WP_Bootstrap_Navwalker::fallback',
                  'walker'              => new WP_Bootstrap_Navwalker(),
                ) );
            else :
                wp_nav_menu( array(
                    'theme_location' => 'default',
                    'menu'  =>  'Default Menu',
                    'menu_class'     => 'nav mr-auto',
                ) );
            endif; ?>

            <form class="form-inline my-2 my-lg-0 ml-auto" method="get" id="search-form" action="<?php echo home_url('/')?>" role="search">
                    <label class="sr-only">Search</label>
                    <input class="form-control mr-sm-2" type="text"  placeholder="Search" name="s">
            </form>
        </div>
    </nav>
</div>
