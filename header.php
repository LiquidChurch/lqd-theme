<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Liquid_Church
 * @since 1.0.0
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="page">
    <!-- Header start -->
    <div class="lqd-header container">
        <div class="lqd-header-covid row">
            <div class="col-xs-12 col-lg-7 col-lg-offset-1 display-flex">
                <p class="lqd-header-covid-text"><strong>Hope Is On The Way!</strong> Get Help - Receive A Free Emergency Relief Kit.</p>
            </div>
            <div class="col-xs-12 col-lg-2 col-lg-offset-2 display-flex">
                <a class="btn lqd-header-covid-btn" href="https://liquidchurch.com/relief">COVID-19 RELIEF</a>
            </div>
        </div>
        <div class="lqd-header-top row display-flex">
            <div class="lqd-header-logo col-xs-12 col-sm-12 col-md-4 display-flex">
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
            <div class="lqd-header-church-online col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-0 col-md-3 col-md-offset-3 display-flex">
                <a class="btn lqd-header-church-online-btn" href="https://liquidchurchonline.com">Church Online</a>
            </div>
            <div class="lqd-header-give col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-0 col-md-2 display-flex">
                <a class="btn lqd-header-church-online-btn" href="https://liquidchurch.com/give">Give</a>
            </div>
        </div>
        <div class="lqd-header-menu row">
            <div class="header-bottom-menu">
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
                            ?>
                            <?php endif; ?>

                        <form method="get" id="search-form" action="<?php echo home_url('/')?>" class="navbar-form navbar-right" role="search">
                            <div class="form-group form-group_new">
                                <input type="text" class="form-controlinput paddings" placeholder="Search" name="s" onblur="if(this.value==&#39;&#39;)this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value=&#39;&#39;;" >
                                <i class="fa fa-search fa-searchicon" aria-hidden="true"></i>
                            </div>
                        </form>
                    </div>
                    <!-- /.navbar-collapse -->
                </nav>
            </div>
        </div>
    </div>

    <!-- Header end -->
    <div class="content">
        <div class="container">
            <div class="row">
