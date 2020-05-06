<div class="lqd-header-menu clearfix">
    <nav class="navbar navbar-default">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
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
            endif; ?>

            <form method="get" id="search-form" action="<?php echo home_url('/')?>" class="navbar-form navbar-right" role="search">
                <div class="form-group form-group_new">
                    <label class="screen-reader-text">Search Site</label>
                    <input type="text" class="lqd-header-search-input paddings" placeholder="Search" name="s" onblur="if(this.value==&#39;&#39;)this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value=&#39;&#39;;" >
                    <i class="fa fa-search fa-searchicon" aria-hidden="true"></i>
                </div>
            </form>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
</div>
