<div class="lqd-header-top clearfix">
    <div class="lqd-header-logo col-xs-12 col-sm-12 col-md-4">
        <?php if (get_theme_mod( 'm1_logo' )){ ?>
            <a href="<?php echo home_url('/')?>"><img src="<?php echo get_theme_mod( 'm1_logo' ) ;?>" width="220" height="40" alt=""></a>
            <?php
        } else {
            if ( is_front_page() && is_home() ) : ?>
                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php else : ?>
                <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <?php endif;
            $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) : ?>
                <p class="site-description"><?php echo $description; ?></p>
            <?php endif;
        } ?>
    </div>
    <div class="lqd-header-church-online col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-0 col-md-3 col-md-offset-3">
        <a class="btn lqd-header-btn" href="https://liquidchurchonline.com">Church Online</a>
    </div>
    <div class="col-xs-2"></div>
    <div class="lqd-header-give col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-0 col-md-2">
        <a class="btn lqd-header-btn" href="https://liquidchurch.com/give">Give</a>
    </div>
    <div class="col-xs-2"></div>
</div>
