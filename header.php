<?php
/**
 * The template for displaying the header
 *
 * Displays all of the <head> element and everything up until the "site-content" div.
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
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<!-- favicon -->
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
<div class="page">
<!-- Header start -->
    <!-- Logo, Locations Dropdown, Church Online Button -->
    <div class="pagetop">
        <div class="header_top">
            <div class="container">
                <div class="row">
                    <!-- Logo -->
                    <div class="col-sm-12 col-md-4">
                        <div class="logo">
                            <?php
                            if (get_theme_mod( 'm1_logo' )){
                                ?>
                                <a href="<?php echo home_url('/')?>"><img src="<?php echo get_theme_mod( 'm1_logo' ) ;?>" width="220" height="40" alt=""></a>
                            <?php
                            }else{
                            if ( is_front_page() && is_home() ) : ?>
                                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                            <?php else : ?>
                                <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                            <?php endif;
                            $description = get_bloginfo( 'description', 'display' );
                            if ( $description || is_customize_preview() ) : ?>
                                <p class="site-description"><?php echo $description; ?></p>
                            <?php endif; ?>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <!-- End Logo -->
                    <!-- Location Block -->
                    <div class="col-sm-6 col-md-3 col-md-offset-1">
                        <div class="location-block" style="width:75%">
                            <?php if ( has_nav_menu( 'locations' ) ) :
                             wp_nav_menu( [
                                   'theme_location' => 'locations',
                                  'menu'           => 'Locations Menu',
                                  'walker'         => new Walker_Nav_Menu_Dropdown(),
                                  'items_wrap'     => '<div class="locations"><form><select style="display: none;" name="country_id" id="country_id" tabindex="1" onchange="if (this.value) window.location.href=this.value">%3$s</select></form></div>',
                             ] );
                            else :
                            ?>
                            <div class="locations">
                                <form>
                                    <select style="display: none;" name="country_id" id="country_id" tabindex="1" onchange="if (this.value) window.location.href=this.value">
                                        <option value="">Location</option>
                                        <option value="<?php echo home_url('wp-admin/nav-menus.php'); ?> ">Add Location Menus</option>
                                    </select>
                                </form>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- End of Location Block -->
                    <!-- Church Online Block -->
                    <div class="col-sm-6 col-md-3 col-md-offset-1">
                        <div class="church-online" style="width:75%; float:right;">
                            <a href="https://live.liquidchurch.com/" class="church-online-link">Church Online</a>
                        </div>
                    </div>
                    <!-- End of Church Online Block -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Logo, Locations Dropdown, Church Online Button -->
    <!-- Liquid Navigation Menu -->
    <div class="menublock">
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target=".lqd-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse lqd-collapse">
                <?php
                if ( has_nav_menu( 'primary' ) ) :
                    wp_nav_menu( [
                        'theme_location'     => 'primary',
                        'container'          => 'false',
                        'menu_class'         => 'nav navbar-nav',
                        'fallback_cb'        => 'WP_Bootstrap_Navwalker::fallback',
                        'walker'             => new WP_Bootstrap_Navwalker(),
            ]);
                else :
                    wp_nav_menu( [
                        'theme_location' => 'default',
                        'menu'  =>  'Default Menu',
                        'menu_class'     => 'nav navbar-nav',
                        ] );
                endif;
                ?>
                <form method="get" id="search-form" action="<?php echo home_url('/')?>" class="navbar-form navbar-right"
                      role="search">
                    <div class="form-group form-group_new">
                        <input type="text" class="form-controlinput form-control paddings" placeholder="Search" name="s"
                               onblur="if(this.value===&#39;&#39;)this.value=this.defaultValue;"
                               onfocus="if(this.value===this.defaultValue)this.value=&#39;&#39;;" >
                        <i class="fa fa-search fa-searchicon" aria-hidden="true"></i>
                    </div>
                </form>
            </div>
        </div>
    </nav>
    </div>
    <!-- End Navigation Menu -->
</div>
<!-- Header end -->
<div class="content">
