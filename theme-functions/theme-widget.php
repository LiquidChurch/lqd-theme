<?php

function liquidchurch_widgets_init() {
	register_sidebar(
	    array(
	        'name'          => __( 'Sidebar', 'liquidchurch' ),
            'id'            => 'sidebar-1',
            'description'   => __( 'Add widgets here to appear in your sidebar.', 'liquidchurch' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
            )
    );

	register_sidebar(
	    array(
	        'name' => 'Footer Top Left',
            'id' => 'footer-contact-us',
            'description' => 'Appears in upper left side of footer area',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
            )
    );

	register_sidebar(
	    array(
	        'name' => 'Footer Bottom Inner 1',
            'id' => 'footer-about-us',
            'description' => 'Appears in the footer area',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
            )
    );

	register_sidebar(
	    array(
	        'name' => 'Footer Bottom Inner 2',
            'id' => 'footer-life-events',
            'description' => 'Appears in the footer area',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
            )
    );

	register_sidebar(
	    array(
	        'name' => 'Footer Bottom Inner 3',
            'id' => 'footer-messages',
            'description' => 'Appears in the footer area',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
            )
    );

	register_sidebar(
	    array(
	        'name' => 'Footer Bottom Inner 4',
            'id' => 'footer-media',
            'description' => 'Appears in the footer area',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
            )
    );

	register_sidebar(
	    array(
	        'name' => 'Footer Bottom Inner 5',
            'id' => 'footer-give',
            'description' => 'Appears in the footer area',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
            )
    );

	register_sidebar(
	    array(
	        'name' => 'Footer Bottom Inner 6',
            'id' => 'footer-help',
            'description' => 'Appears in the footer area',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
            )
    );
}
add_action( 'widgets_init', 'liquidchurch_widgets_init' );


