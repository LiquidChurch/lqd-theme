<div class="lqd-header-top row">
    <div class="lqd-header-logo col-xs-12 col-md-8">
        <?php if (get_theme_mod( 'm1_logo' )){ ?>
            <a href="<?php echo home_url('/')?>"><img src="<?php echo get_theme_mod( 'm1_logo' ) ;?>" width="220" height="40" alt=""></a>
        <?php } else if ( is_front_page() && is_home() ) : ?>
            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        <?php else : ?>
            <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
        <?php endif; ?>
    </div>
    <div class="lqd-header-church-online col-xs-8 mb-2 col-md-3 mb-md-0">
        <a class="lqd-header-btn btn btn-primary btn-lg" href="https://liquidchurchonline.com/">Church Online</a>
    </div>
    <div class="lqd-header-give col-xs-4 mb-2 col-md-1 mb-md-0">
        <a class="lqd-header-btn btn btn-primary btn-lg" href="/give">Give</a>
    </div>
</div>
