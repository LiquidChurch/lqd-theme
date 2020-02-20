<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Liquid_Church
 * @since Liquid Church 1.0
 */

?>
  </div>
  <!-- Footer Area start -->
  	<div class="footer_section">
	    <div class="container lqd-footer">
	      <div class="row">
	        <div class="footer_sectionmid">
	          <div class="col-md-8">
	             <ul class="sectionleftul">
	           <!-- <li><a href="<?php echo get_permalink( get_page_by_path( 'contact-us' ) ) ?>">Contact Us</a></li> -->


	              	  <?php
							if(is_active_sidebar('footer-contact-us')){
								echo '<li>';
									dynamic_sidebar('footer-contact-us');
									echo '</li>';
							}else{

								echo ' <li><a href="'.home_url('wp-admin/customize.php').'">Add Contact Number</a></li>';
							}
						?>

	             </ul>
	          </div>
	          <div class="col-md-4">
	          		<ul class="lqd-footer-social">
	          				<?php if( get_theme_mod( 'facebook_id_theme' ) )  { ?>
				          			<li>
				                   		<a target="_blank" href="<?php echo get_theme_mod( 'facebook_id_theme' ) ;?>" class="ffb" title="Facebook"><i class="ffb"></i></a>
				                   	</li>
	                   		<?php }?>
	                   		<?php if( get_theme_mod( 'twitter_id_theme' ) )  { ?>
									<li>
										<a target="_blank" href="<?php echo get_theme_mod( 'twitter_id_theme' )  ;?>" class="ftwitter" title="Twitter"><i class="ftwitter"></i></a>
									</li>
							<?php }?>
							<?php if( get_theme_mod( 'instagram_id_theme' ) )  { ?>
									<li>
										<a target="_blank" href="<?php echo get_theme_mod( 'instagram_id_theme' )  ;?>" class="finsta" title="Instagram"><i class="finsta"></i></a>
									</li>
							<?php }?>
							<?php if( get_theme_mod( 'youtube_id_theme' ) )  { ?>
									<li>
				                   		<a target="_blank" href="<?php echo get_theme_mod( 'youtube_id_theme' )  ;?>" class="fyoutube" title="Youtube"><i class="fyoutube"></i></a>
				                   	</li>
				            <?php }?>
				            <?php if( get_theme_mod( 'vimeo_id_theme' ) )  { ?>
				                   	<li>
				                   		<a target="_blank" href="<?php echo get_theme_mod( 'vimeo_id_theme' );?>" class="fvimeo" title="Vimeo"><i class="fvimeo"></i></a>
				                   	</li>
				            <?php }?>

	                </ul>
	          </div>
	          <div class="clear"></div>
	        </div>
	      </div>
	    </div>
  	</div>

	<div class="lqd-footer-container">
 		<div class="container">
        	<div class="row">
            		<div class="futr_menublock">
                    	<div class="col-md-2 col-xs-6 col-sm-6">
                        	<div class="inner_block">

                              	  <?php
										if(is_active_sidebar('footer-about-us')){
												dynamic_sidebar('footer-about-us');
										}else{

											echo '<div class="lqd-footer-menu-not-selected"><h2><a href="' .home_url('wp-admin/widgets.php').'">Add About Us Menu </a></h2></div>';
										}
									?>

                            </div>
                        </div>
                        <div class="col-md-2 col-xs-6 col-sm-6">
                        	<div class="inner_block">
			                  <?php
									if(is_active_sidebar('footer-life-events')){
									dynamic_sidebar('footer-life-events');
									}else{

											echo '<div class="lqd-footer-menu-not-selected"><h2><a href="' .home_url('wp-admin/widgets.php').'">Add Life Event Menu</a></h2></div>';
										}
								?>
                            </div>
                        </div>
                         <div class="col-md-2 col-xs-6 col-sm-6">
                        	<div class="inner_block">
		                	<?php
									if(is_active_sidebar('footer-messages')){
									dynamic_sidebar('footer-messages');
								}else{

											echo '<div class="lqd-footer-menu-not-selected"><h2><a href="' .home_url('wp-admin/widgets.php').'">Add Message Menu</a></h2></div>';
										}
								?>
                            </div>
                        </div>
                 <div class="col-md-2 col-xs-6 col-sm-6">
                        	<div class="inner_block">
			        			<?php
									if(is_active_sidebar('footer-media')){
									dynamic_sidebar('footer-media');
									}
									else{

											echo '<div class="lqd-footer-menu-not-selected"><h2><a href="' .home_url('wp-admin/widgets.php').'">Add Media Menu</a></h2></div>';
										}
								?>
                            </div>
                        </div>
                         <div class="col-md-2 col-xs-6 col-sm-6">
                        	<div class="inner_block">
							<?php
									if(is_active_sidebar('footer-give')){
									dynamic_sidebar('footer-give');
									}
									else{

											echo '<div class="lqd-footer-menu-not-selected"><h2><a href="' .home_url('wp-admin/widgets.php').'">Add Give Menu</a></h2></div>';
										}
								?>
                            </div>
                        </div>
                       <div class="col-md-2 col-xs-6 col-sm-6">
                        	<div class="inner_block">
				          		<?php
										if(is_active_sidebar('footer-help')){
										dynamic_sidebar('footer-help');
										}
										else{

											echo '<div class="lqd-footer-menu-not-selected"><h2><a href="' .home_url('wp-admin/widgets.php').'">Add Help Menu</a></h2></div>';
										}
									?>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
 	</div>

</div>
<script>
jQuery(function ($) {
	$("#country_id").selectric({disableOnMobile: false});
		 // bind change event to select
	      $('#country_id').on('change', function () {
	          var url = $(this).val(); // get selected value
	          if (url) { // require a URL
	              window.location = url; // redirect
	          }
	          return false;
	      });
	});
</script>
<?php wp_footer(); ?>
</body>
</html>
  <!-- Footer Area start -->
