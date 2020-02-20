<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Liquid_Church
 * @since Liquid Church 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
<div class="page">
<div class="lqd-header container">
    <div class="lqd-header-top row">
        <div class="lqd-header-logo col-xs-12 col-sm-12 col-md-5">
            <?php
            if ( get_theme_mod( 'm1_logo' ) ) {
            ?>
                <a href="<?php echo home_url('/') ?>"><img src="<?php echo get_theme_mod( 'm1_logo' ); ?>" width="220" height="40" alt="Liquid Church Logo"></a>
            <?php
            } else {
            if ( is_front_page() && is_home() ) : ?>
            <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
            <?php else : ?>
            <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                     rel="home"><?php bloginfo('name'); ?></a></p>
            <?php endif;
            if ( 1 ) : ?>
            <?php endif;
            }
            ?>
        </div>
        <div class="lqd-header-locations col-xs-12 col-sm-6 col-md-4">
            <div class="location-block">
            <?php
            if ( has_nav_menu( 'locations' ) ) :
                wp_nav_menu( array(
                    'theme_location' => 'locations',
                    'menu'           => 'Locations Menu',
                    'walker'         => new Walker_Nav_Menu_Dropdown(),
                    'items_wrap'     => '<div class="locations"><form><select style="display: none;" name="campus_id" id="campus_id" tabindex="1" onchange="if (this.value) window.location.href=this.value">%3$s</select></form></div>',
                ) );
            else :
            ?>
                <div class="locations">
                    <form>
                        <select style="display: none;" name="campus_id" id="campus_id" tabindex="1" onchange="if (this.value) window.location.href=this.value">
                            <option value="">Location</option>
                            <option value="<?php echo home_url('wp-admin/nav-menus.php'); ?> ">Add Location Menus</option>
                        </select>
                    </form>
                </div>
            <?php endif; ?>
            </div>
        </div>
        <div class="lqd-header-church-online col-xs-12 col-sm-6 col-md-3">
           <a href="https://live.liquidchurch.com/" class="btn lqd-header-church-online-btn">Church Online</a>
        </div>
    </div>
    <div class="lqd-header-bottom row">
        <div class="lqd-header-menu col-xs-12">
            <div class="navbar navbar-default">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#lqd-header-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="lqd-header-navbar-collapse">
                    <?php
                    if ( has_nav_menu( 'primary' ) ) :
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
                    endif;
                    ?>
                    <form method="get" id="search-form" action="<?php echo home_url('/')?>" class="navbar-form navbar-right"
                          role="search">
                        <div class="form-group lqd-header-search">
                            <input type="text" class="lqd-header-search-input" placeholder="Search" name="s" onblur="if(this.value==&#39;&#39;)this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value=&#39;&#39;;" >
                            <i class="fa fa-search fa-searchicon" aria-hidden="true"></i>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="content">
