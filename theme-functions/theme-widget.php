<?php

function liquidchurch_widgets_init() {
	register_sidebar( [
		'name'          => __( 'Sidebar', 'liquidchurch' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'liquidchurch' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
    ] );
	register_sidebar( [
	'name' => 'Primary Footer Contact Us',
	'id' => 'footer-contact-us',
	'description' => 'Appears in upper side of secondary footer area',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h2 class="widget-title">',
	'after_title' => '</h2>',
    ] );
	register_sidebar( [
	'name' => 'Primary Footer Social Profile',
	'id' => 'footer-social-profile',
	'description' => 'Appears in upper side of secondary footer area',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h2 class="widget-title">',
	'after_title' => '</h2>',
    ] );


	register_sidebar( [
	'name' => 'Secondary Footer About Us',
	'id' => 'footer-about-us',
	'description' => 'Appears in the footer area',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h2 class="widget-title">',
	'after_title' => '</h2>',
    ] );
	register_sidebar( [
	'name' => 'Secondary Footer Life Events',
	'id' => 'footer-life-events',
	'description' => 'Appears in the footer area',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h2 class="widget-title">',
	'after_title' => '</h2>',
    ] );
	register_sidebar( [
	'name' => 'Secondary Footer Messages',
	'id' => 'footer-messages',
	'description' => 'Appears in the footer area',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h2 class="widget-title">',
	'after_title' => '</h2>',
    ] );
	register_sidebar( [
	'name' => 'Secondary Footer Media',
	'id' => 'footer-media',
	'description' => 'Appears in the footer area',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h2 class="widget-title">',
	'after_title' => '</h2>',
    ] );
	register_sidebar( [
	'name' => 'Secondary Footer Give',
	'id' => 'footer-give',
	'description' => 'Appears in the footer area',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h2 class="widget-title">',
	'after_title' => '</h2>',
    ] );
	register_sidebar( [
	'name' => 'Secondary Footer Help',
	'id' => 'footer-help',
	'description' => 'Appears in the footer area',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h2 class="widget-title">',
	'after_title' => '</h2>',
    ] );


}
add_action( 'widgets_init', 'liquidchurch_widgets_init' );


