<?php
/**
 * Liquid Church Functions and Definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Liquid_Church
 * @since 1.0.0
 */

/**
 * Liquid Church only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'liquidchurch_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since 1.0.0
 */
function liquidchurch_setup() {
    /*
     * Make theme available for translation
     *
     * Translations are field in the /languages/ directory.
     */
	load_theme_textdomain( 'liquidchurch', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'    => __( 'Primary Menu', 'liquidchurch' ),
		'locations'  => __( 'Locations Menu', 'liquidchurch' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
	    'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        )
    );

	/*
	 * Enable support for Post Formats.
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );

	/*
	 * This theme DOESN'T style the visual editor to resemble the theme style, but it should,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', liquidchurch_fonts_url() ) );

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif; // liquidchurch_setup
add_action( 'after_setup_theme', 'liquidchurch_setup' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width Content width.
 *
 * @since 1.0.0
 */
function liquidchurch_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'liquidchurch_content_width', 840 );
}
add_action( 'after_setup_theme', 'liquidchurch_content_width', 0 );

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since 1.0.0
 */
require_once( get_stylesheet_directory() . '/theme-functions/theme-widget.php' );

if ( ! function_exists( 'liquidchurch_fonts_url' ) ) :
/**
 * Register Google fonts for Liquid Church.
 *
 * Create your own liquidchurch_fonts_url() function to override in a child theme.
 *
 * @since 1.0.0
 *
 * @return string Google fonts URL for the theme.
 */
function liquidchurch_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Merriweather font: on or off', 'liquidchurch' ) ) {
		$fonts[] = 'Merriweather:400,700,900,400italic,700italic,900italic';
	}

	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'liquidchurch' ) ) {
		$fonts[] = 'Montserrat:400,700';
	}

	/* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'liquidchurch' ) ) {
		$fonts[] = 'Inconsolata:400';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since 1.0.0
 */
function liquidchurch_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'liquidchurch_javascript_detection', 0 );

/**
 * Enqueues scripts and styles.
 *
 * @since 1.0.0
 */
function liquidchurch_scripts() {
    /** FONTS **/
    $theme_path = plugin_dir_path(__FILE__);
    $lqd_style_css = filemtime($theme_path . 'css/style.css');
    $lqd_style_pages_css = filemtime($theme_path . 'css/style-pages.css');
    $lqd_messages_css = filemtime($theme_path . 'css/lqd-messages.css');
    $lqd_fonts_css = filemtime($theme_path . 'css/lqd-fonts.css');
	// Avenir Fonts
	wp_enqueue_style( 'lqd-fonts',  get_template_directory_uri() . '/css/lqd-fonts.css', array(), $lqd_fonts_css);
	// Google Fonts
	wp_enqueue_style( 'liquidchurch-fonts', liquidchurch_fonts_url(), array(), null );
    // Bootstrap
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/vendor/bootstrap/bootstrap.min.css', array(), '4.4.1' );
	// Font Awesome
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/vendor/font-awesome.min.css', array(), $lqd_style_css );
	// Main CSS
	wp_enqueue_style('style', get_template_directory_uri() . '/css/style.css', array(), $lqd_style_css );
	// Page Specific + Button CSS
	wp_enqueue_style( 'pages-style', get_template_directory_uri() . '/css/style-pages.css', array(), $lqd_style_pages_css );
	// Liquid Messages (GC-Sermons) CSS
	wp_enqueue_style( 'lqd-messages', get_template_directory_uri() . '/css/lqd-messages.css', array(), $lqd_messages_css );
    // Text2Give CSS
    if ( is_page( 'text2give' ) ) {
        wp_enqueue_style( 'text2give', get_template_directory_uri() . '/css/text2give.css', array(), '1.5' );
    }
	// Required WP CSS
    wp_enqueue_style( 'liquidchurch-style', get_stylesheet_uri() );

    /** JS **/
    // Skip Link Focus Fix
	wp_enqueue_script( 'liquidchurch-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20160412', true );
	// If Single Page with Threaded Comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	// If Single Page Where Attachment Is Image
	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'liquidchurch-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20160412' );
	}
	// Text2Give JS
    if ( is_page( array ('give', 'set-new-recurring-gift', 'cancel-old-recurring-gift', 'text2give' ) ) ) {
	    wp_enqueue_script( 'give-choose-campus-js', get_template_directory_uri() . '/js/give-choose-campus.js', array( 'jquery' ), '2017061601', false );
    }
    // Main Liquid Church JavaScript
    wp_enqueue_script( 'liquidchurch-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20200313', true );
	// Bootstrap JavaScript
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/vendor/bootstrap.min.js', array( 'jquery' ), '20190313', true );
    // Localization
	wp_localize_script( 'liquidchurch-script', 'screenReaderText', array(
		'expand'   => __( 'expand child menu', 'liquidchurch' ),
		'collapse' => __( 'collapse child menu', 'liquidchurch' ),
	) );
}
add_action( 'wp_enqueue_scripts', 'liquidchurch_scripts' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since 1.0.0
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function liquidchurch_body_classes( $classes ) {
	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}

	// Adds a class of group-blog to sites with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of no-sidebar to sites without active sidebar.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'liquidchurch_body_classes' );

/**
 * Converts a HEX value to RGB.
 *
 * @since 1.0.0
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
function liquidchurch_hex2rgb( $color ) {
    $color = trim( $color, '#' );

	if ( strlen( $color ) === 3 ) {
		$r = hexdec( substr( $color, 0, 1 ).substr( $color, 0, 1 ) );
		$g = hexdec( substr( $color, 1, 1 ).substr( $color, 1, 1 ) );
		$b = hexdec( substr( $color, 2, 1 ).substr( $color, 2, 1 ) );
	} else if ( strlen( $color ) === 6 ) {
		$r = hexdec( substr( $color, 0, 2 ) );
		$g = hexdec( substr( $color, 2, 2 ) );
		$b = hexdec( substr( $color, 4, 2 ) );
	} else {
		return array();
	}

	return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 *
 * @since 1.0.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function liquidchurch_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	840 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';

	if ( 'page' === get_post_type() ) {
		840 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
	} else {
		840 > $width && 600 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
		600 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'liquidchurch_content_image_sizes_attr', 10 , 2 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails
 *
 * @since 1.0.0
 *
 * @param array $attr Attributes for the image markup.
 * @param int $attachment Image attachment ID.
 * @param array $size Registered image size or flat array of height and width dimensions.
 *
 * @return array A source size value for use in a post thumbnail 'sizes' attribute.
 */
function liquidchurch_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( 'post-thumbnail' === $size ) {
		is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
		! is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
	}
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'liquidchurch_post_thumbnail_sizes_attr', 10 , 3 );

/**
 * Modifies tag cloud widget arguments to have all tags in the widget same font size.
 *
 * @since 1.1.0
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array A new modified arguments.
 */
function liquidchurch_widget_tag_cloud_args( $args ) {
	$args['largest'] = 1;
	$args['smallest'] = 1;
	$args['unit'] = 'em';
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'liquidchurch_widget_tag_cloud_args' );

/**
 * Handles Preformatted Text
 *
 * @since 1.0.0
 *
 * @param $obj
 */
function pr($obj){
   echo '<pre>';
    print_r($obj);
   echo '</pre>';
}

/**
 * Custom Modifications to the WP Navwalker
 *
 * @param $args
 * @return array
 */
function myplugin_custom_walker( $args ) {
    if($args['theme_location']=="")
    {
        return array_merge( $args, array(
            'menu_class'=>'',
        ) );
    } else {
        return array_merge( $args, array(
            'theme_location' => 'primary',
            'menu_class'     => 'nav navbar-nav',
        ) );
    }
}
add_filter( 'wp_nav_menu_args', 'myplugin_custom_walker' );

/**
 * Sets TinyMCE config option
 *
 * @param $in
 * @return mixed
 */
function myformatTinyMCE( $in ) {
    $in['wordpress_adv_hidden'] = FALSE;
    return $in;
}
add_filter( 'tiny_mce_before_init', 'myformatTinyMCE' );

/**
 * Sets TinyMCE Options
 *
 * @param $init
 * @return mixed
 */
function my_mce4_options($init) {
  $default_colours = '"000000", "Black",
                      "993300", "Burnt orange",
                      "333300", "Dark olive",
                      "003300", "Dark green",
                      "003366", "Dark azure",
                      "000080", "Navy Blue",
                      "00568b","Dark Blue",
                      "333399", "Indigo",
                      "333333", "Very dark gray",
                      "800000", "Maroon",
                      "FF6600", "Orange",
                      "808000", "Olive",
                      "008000", "Green",
                      "008080", "Teal",
                      "0000FF", "Blue",
                      "666699", "Grayish blue",
                      "808080", "Gray",
                      "FF0000", "Red",
                      "FF9900", "Amber",
                      "99CC00", "Yellow green",
                      "339966", "Sea green",
                      "33CCCC", "Turquoise",
                      "3366FF", "Royal blue",
                      "800080", "Purple",
                      "999999", "Medium gray",
                      "FF00FF", "Magenta",
                      "FFCC00", "Gold",
                      "FFFF00", "Yellow",
                      "00FF00", "Lime",
                      "00FFFF", "Aqua",
                      "00CCFF", "Sky blue",
                      "993366", "Red violet",
                      "FFFFFF", "White",
                      "FF99CC", "Pink",
                      "FFCC99", "Peach",
                      "FFFF99", "Light yellow",
                      "CCFFCC", "Pale green",
                      "CCFFFF", "Pale cyan",
                      "99CCFF", "Light sky blue",
                      "CC99FF", "Plum"';

  $custom_colours =  '"E14D43", "Color 1 Name",
                      "D83131", "Color 2 Name",
                      "ED1C24", "Color 3 Name",
                      "F99B1C", "Color 4 Name",
                      "50B848", "Color 5 Name",
                      "00A859", "Color 6 Name",
                      "00AAE7", "Color 7 Name",
                      "282828", "Color 8 Name"';

  // build colour grid default+custom colors
  $init['textcolor_map'] = '['.$default_colours.','.$custom_colours.']';

  // enable 6th row for custom colours in grid
  $init['textcolor_rows'] = 6;

  return $init;
}
add_filter('tiny_mce_before_init', 'my_mce4_options');

/**
 * Add Theme Customizer Settings
 *
 * @param $wp_customize
 */
function lqd_customize_register( $wp_customize ) {
    $wp_customize->add_section( 'lqd_theme', array(
        'title' => 'Liquid Options',
        'description' => 'Settings',
        'priority' => 1,
        'sanitize_callback' == 'esc_url_raw',
    ) );

    // Add setting and control for logo uploader
    $wp_customize->add_setting( 'm1_logo', 'sanitize_callback' == 'esc_url_raw' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'm1_logo', array(
        'label'    => __( 'Header Logo', 'liquidchurch' ),
        'section'  => 'lqd_theme',
        'settings' => 'm1_logo',
        'priority' => 1,
        'sanitize_callback' == 'esc_url_raw',
    ) ) );

    // Add setting and control for Contact Us
    $wp_customize->add_setting( 'lqd_contact_us', 'sanitize_callback' == 'esc_url_raw' );
    $wp_customize->add_control( 'lqd_contact_us', array(
        'label'     => __('Contact Us Link', 'liquidchurch'),
        'section'   => 'lqd_theme',
        'type'      => 'text',
        'settings'  => 'lqd_contact_us',
        'priority'  => '3',
        'sanitize_callback' == 'esc_url_raw',
    ) );

    // Add setting and control for Phone Number
    $wp_customize->add_setting( 'lqd_phone_number', 'sanitize_callback' == 'esc_url_raw' );
    $wp_customize->add_control( 'lqd_phone_number', array(
        'label'     => __('Phone Number', 'liquidchurch'),
        'section'   => 'lqd_theme',
        'type'      => 'text',
        'settings'  => 'lqd_phone_number',
        'priority'  => '3',
        'sanitize_callback' == 'esc_url_raw',
    ) );

    // Add setting and control for Contact Us
    $wp_customize->add_setting( 'lqd_email', 'sanitize_callback' == 'esc_url_raw' );
    $wp_customize->add_control( 'lqd_email', array(
        'label'     => __('Email', 'liquidchurch'),
        'section'   => 'lqd_theme',
        'type'      => 'text',
        'settings'  => 'lqd_email',
        'priority'  => '3',
        'sanitize_callback' == 'esc_url_raw',
    ) );


    /* Social Icons */
    /* Add Setting/Control for Facebook */
    $wp_customize->add_setting( 'facebook_id_theme', 'sanitize_callback' == 'esc_url_raw' );
    $wp_customize->add_control( 'facebook_id', array(
        'label'    => __( 'Facebook Link', 'liquidchurch' ),
		'section'  => 'lqd_theme',
		'type'     => 'text',
		'settings'  => 'facebook_id_theme',
		'priority' => 3,
		'sanitize_callback' == 'esc_url_raw',
    ) );

    /* Add Setting/Control for Twitter */
    $wp_customize->add_setting( 'twitter_id_theme', 'sanitize_callback' == 'esc_url_raw' );
    $wp_customize->add_control( 'twitter_id', array(
		'label'    => __( 'Twitter Link', 'liquidchurch' ),
		'section'  => 'lqd_theme',
		'type'     => 'text',
		'settings'  => 'twitter_id_theme',
		'priority' => 4,
		'sanitize_callback' == 'esc_url_raw',
	) );

    /* Add Setting/Control for YouTube */
    $wp_customize->add_setting( 'youtube_id_theme','sanitize_callback' == 'esc_url_raw' );
    $wp_customize->add_control( 'youtube_id', array(
        'label'    => __( 'Youtube Link', 'liquidchurch' ),
        'section'  => 'lqd_theme',
        'type'     => 'text',
        'settings'  => 'youtube_id_theme',
        'priority' => 5,
        'sanitize_callback' == 'esc_url_raw',
	) );

    /* Add Setting/Control for nstagram */
    $wp_customize->add_setting( 'instagram_id_theme','sanitize_callback' == 'esc_url_raw' );
    $wp_customize->add_control( 'instagram_id', array(
        'label'    => __( 'Instagram Link', 'liquidchurch' ),
		'section'  => 'lqd_theme',
		'type'     => 'text',
		'settings'  => 'instagram_id_theme',
		'priority' => 6,
		'sanitize_callback' == 'esc_url_raw',
	) );
}
add_action( 'customize_register', 'lqd_customize_register' );

/**
 * Create a Default Menu
 */
function createDefaultMenu(){
	// Check if the menu exists
	$menu_name = 'Default Menu';
	$menu_exists = wp_get_nav_menu_object( $menu_name );

	// If it doesn't exist, let's create it.
	if( !$menu_exists){
	    $menu_id = wp_create_nav_menu($menu_name);

		// Set up default menu items
	    wp_update_nav_menu_item($menu_id, 0, array(
	        'menu-item-title' =>  ( 'Home' ),
	        'menu-item-classes' => 'home',
	        'menu-item-url' => home_url( '/' ),
	        'menu-item-status' => 'publish'));

	    wp_update_nav_menu_item($menu_id, 0, array(
	        'menu-item-title' =>  ( 'Custom Page' ),
	        'menu-item-url' => home_url( '/custom-page/' ),
	        'menu-item-status' => 'publish'));
	}
}
createDefaultMenu();

/**
 * Create a Sample Page
 */
function createSamplePage(){
	if(the_slug_exists('custom-page')==false)
	{
		global $user_ID;
	   $new_post = array(
            'post_title' => 'Custom Page',
            'post_content' => 'Sample content here',
            'post_status' => 'publish',
            'post_date' => date('Y-m-d H:i:s'),
            'post_author' => $user_ID,
            'post_type' => 'page',
        );
        $post_id = wp_insert_post($new_post);
	}
}
createSamplePage();

/**
 * Check if Slug Exists for Sample Page
 *
 * @param $post_name
 * @return bool
 */
function the_slug_exists($post_name) {
    global $wpdb;

    if($wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_name like '%" . $post_name . "%'", 'ARRAY_A')) {
        return true;
    }

    return false;
}

/**
 * Assign Front Page
 */
function assignFrontPage_exists() {
    global $wpdb;
		$post_name="Home";

    	$homepage = get_page_by_title( $post_name );

		if ( $homepage )
		{
		    update_option( 'page_on_front', $homepage->ID );
		    update_option( 'show_on_front', 'page' );
		}
}
assignFrontPage_exists();

/**
 * Control Vimeo Embeds
 *
 * @param $html
 * @return string|string[]
 */
function modify_wp_vimeo_embeds( $html ) {
	if ( false !== strpos( $html, 'vimeo' ) ) {
		preg_match( '/src="([^"]+)"/', $html, $match );
		$src = $match[1];
		$html = str_replace( $src, add_query_arg( array(
			'title'    => 0,
			'byline'   => 0,
			'portrait' => 0,
		), $src ), $html );
	}
	return $html;
}
add_filter( 'embed_oembed_html', 'modify_wp_vimeo_embeds' );
add_filter( 'embed_handler_html', 'modify_wp_vimeo_embeds' );

/**
 * Add theme support for Responsive Videos via Jetpack.
 *
 * @link https://jetpack.com/support/responsive-videos/
 */
function jetpackme_responsive_videos_setup() {
	add_theme_support( 'jetpack-responsive-videos' );
}
add_action( 'after_setup_theme', 'jetpackme_responsive_videos_setup' );

/**
 * Filtering for sermons the_content.
 *
 * @param $content
 * @return string $content
 */
function gc_sermon_before_after($content)
{
	$content = strip_tags($content);
	$content = str_replace("\xc2\xa0", ' ', $content);
	$content = preg_replace('/<p>/', '<span class="lqdm-right-col">', $content);
	$content = preg_replace('/<\/p>/', '</span>', $content);
	return $content;
}

/**
 * Filtering for Sermons the content
 *
 * @param $content
 * @return string|string[]|null
 */
function gc_series_before_after($content)
{
	$content = strip_tags($content);
	$content = str_replace("\xc2\xa0", ' ', $content);
	$content = preg_replace('/<p>/', '<p style="padding-left:30px; padding-right:30px;">', $content);
	$content = preg_replace('/<\/p>/', '</p>', $content);
	return $content;
}

/**
 * Disable comments on media.
 *
 * @param $open
 * @param $post_id
 * @return bool
 */
function filter_media_comment_status( $open, $post_id ) {
    $post = get_post( $post_id );
    if( $post->post_type == 'attachment' ) {
        return false;
    }
    return $open;
}
add_filter( 'comments_open', 'filter_media_comment_status', 10 , 2 );

/**
 * Add messages-app-view as rewrite endpoint
 */
function lqd_app_view_rewrite_endpoint() {
	add_rewrite_endpoint( 'messages-app-view', EP_ALL);
	add_rewrite_rule('^messages/messages-app-view/page/?([0-9]{1,})/?$', 'index.php?pagename=messages&messages-app-view&paged=$matches[1]', 'top');
}
add_action( 'init', 'lqd_app_view_rewrite_endpoint' );

/**
 * When messages-app-view is present, load the messages-app-view template for pages.
 *
 * @param $template
 * @return mixed
 */
function lqd_app_view_message_page_template( $template ) {
	global $wp_query;
	if( isset( $wp_query->query_vars['messages-app-view'] ) ) {
		$template = locate_template( array( 'template-messages-app-view.php' ) );
	}
	return $template;
}
add_filter( 'page_template', 'lqd_app_view_message_page_template' );

/**
 * When messages-app-view is present, load the messages-app-view template for series taxonomy.
 *
 * @param $template
 * @return mixed
 */
function lqd_app_view_taxonomy_series_template( $template ) {
	global $wp_query;
	if( isset( $wp_query->query_vars['messages-app-view'], $wp_query->query_vars['gc-sermon-series'] ) ) {
		$template = locate_template( array( 'taxonomy-gc-sermon-series-app-view.php' ) );
	}
	return $template;
}
add_filter( 'taxonomy_template', 'lqd_app_view_taxonomy_series_template' );

/**
 * When messages-app-view is present, load the messages-app-view template for individual messages.
 *
 * @param $template
 * @return mixed
 */
function lqd_app_view_message_template( $template ) {
	global $wp_query;
	if( isset( $wp_query->query_vars['messages-app-view'], $wp_query->query_vars['gc-sermons'] ) ) {
		$template = locate_template( array( 'single-gc-sermons-app-view.php' ) );
	}
	return $template;
}
add_filter( 'single_template', 'lqd_app_view_message_template' );

/**
 * When messages-app-view is present, modify links to add messages-app-view to permalink on pages.
 *
 * @param $link
 * @param $post_id
 * @return string
 */
function lqd_page_link( $link, $post_id ) {
	global $wp_query;
	if( isset( $wp_query->query_vars['messages-app-view'] ) ) {
		return $link . 'messages-app-view/';
	}
	return $link;
}
add_filter( 'page_link', 'lqd_page_link', 1000, 2 );

/**
 * When messages-app-view is present, modify links to add messages-app-view to permalink on sermon series taxonomy.
 *
 * @param $url
 * @param $term
 * @param $taxonomy
 * @return string
 */
function lqd_series_link( $url, $term, $taxonomy ) {
	global $wp_query;
	if ( $taxonomy == 'gc-sermon-series' && isset( $wp_query->query_vars['messages-app-view'] ) ) {
		return $url . '/messages-app-view/';
	}
	return $url;
}
add_filter( 'term_link', 'lqd_series_link', 1000, 3 );

/**
 * When messages-app-view is present, modify links to add messages-app-view to permalink on individual messages.
 *
 * @param $url
 * @param $post
 * @return string
 */
function lqd_message_link( $url, $post ) {
	global $wp_query;
	if ( get_post_type( $post ) == 'gc-sermons' && isset( $wp_query->query_vars['messages-app-view'] ) ) {
		return $url . '/messages-app-view/';
	}
	return $url;
}
add_filter( 'post_type_link', 'lqd_message_link', 1000, 2);

// Force permalink manager pro not to force lowercase urls.
add_filter('permalink-manager-force-lowercase-uris', '__return_false');

// Disable submit button on Campus Groups Serve page.
add_filter( 'gform_submit_button_17', '__return_false' );

/*
* Yoast SEO Disable Automatic Redirects for Posts And Pages
* Credit: Yoast Development Team
* Last Tested: May 09 2017 using Yoast SEO Premium 4.7.1 on WordPress 4.7.4
*/
add_filter('wpseo_premium_post_redirect_slug_change', '__return_true' );

/*
* Yoast SEO Disable Automatic Redirects for Taxonomies (Category, Tags, Etc)
* Credit: Yoast Development Team
* Last Tested: May 09 2017 using Yoast SEO Premium 4.7.1 on WordPress 4.7.4
*/
add_filter('wpseo_premium_term_redirect_slug_change', '__return_true' );

// Disable JPEG compression
add_filter( 'jpeg_quality', function() { return 100; } );

// Enable Field Label Visibility Settings in Gravity Forms
add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );
