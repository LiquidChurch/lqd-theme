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
        <meta name="_globalsign-domain-verification" content="WwzP8bBJbcSX4CjkSpD62GbCIMbAq6JTb7tyv-mRtz" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<!-- faveicon -->
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
<div class="page">
<!-- Header start -->
  <div class="pagetop">
    <div class="header_top">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 col-md-8">
	            <div class="logo"> 
	                <?php 
	                  if (get_theme_mod( 'm1_logo' )){
	                    ?>
	                        <a href="<?php echo home_url('/')?>"><img src="<?php echo get_theme_mod( 'm1_logo' ) ;?>" width="220" height="40" alt=""></a> 
	                  <?php
	                  }else{
	                    ?>
	                  <?php if ( is_front_page() && is_home() ) : ?>
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
                  
                  
                    <div class="location-block">
                    <?php if ( has_nav_menu( 'locations' ) ) : ?>
                            <?php
                             wp_nav_menu( array(
                                   'theme_location' => 'locations',
                                  'menu'           => 'Locations Menu',
                                  'walker'         => new Walker_Nav_Menu_Dropdown(),
                                  'items_wrap'     => '<div class="locations"><form><select style="display: none;" name="country_id" id="country_id" tabindex="1" onchange="if (this.value) window.location.href=this.value">%3$s</select></form></div>',
                                ) );
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
          <div class="col-xs-12 col-sm-4 col-md-4 posit">
            <div class="social-area clearfix">
             <ul class="social-icon clearfix">
                <?php if( get_theme_mod( 'facebook_id_theme' ) )  { ?>
                <li><a title="Facebook" class="hfb" href="<?php echo get_theme_mod( 'facebook_id_theme' ) ;?>" target="_blank"></a></li>
                <?php }?>
                <?php if( get_theme_mod( 'twitter_id_theme' ) )  { ?>
                <li><a title="Twitter" class="htwitter" href="<?php echo get_theme_mod( 'twitter_id_theme' ) ;?>" target="_blank"></a></li>
                <?php }?>
                <?php if( get_theme_mod( 'instagram_id_theme' ) )  { ?>
                <li><a title="Instagram" class="hinsta " href="<?php echo get_theme_mod( 'instagram_id_theme' ) ;?>" target="_blank"></a></li>
                <?php }?>
	             <?php if( get_theme_mod( 'youtube_id_theme' ) )  { ?>
		             <li><a title="Youtube" class="hyoutube" href="<?php echo get_theme_mod( 'youtube_id_theme' ) ;?>" target="_blank"></a></li>
	             <?php }?>
              </ul>

              <a target="_self" href="https://liquidchurch.ccbchurch.com/" class="login">Log In</a> 
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="menublock">
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
  <!-- Header end -->
  <div class="content">