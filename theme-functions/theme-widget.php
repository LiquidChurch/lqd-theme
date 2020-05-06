<?php

function liquidchurch_widgets_init() {
	register_sidebar(
	    array(
	        'name'          => __( 'Sidebar', 'lqd' ),
            'id'            => 'sidebar-1',
            'description'   => __( 'Add widgets here to appear in your sidebar.', 'lqd' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
            )
    );

	register_sidebar(
	    array(
	        'name' => 'Footer Left 1',
            'id' => 'footer-left-1',
            'description' => 'Appears in the footer area',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
            )
    );

	register_sidebar(
	    array(
	        'name' => 'Footer Left 2',
            'id' => 'footer-left-2',
            'description' => 'Appears in the footer area',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
            )
    );

	register_sidebar(
	    array(
	        'name' => 'Footer Left 3',
            'id' => 'footer-left-3',
            'description' => 'Appears in the footer area',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
            )
    );

	register_sidebar(
	    array(
	        'name' => 'Footer Right 3',
            'id' => 'footer-right-3',
            'description' => 'Appears in the footer area',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
            )
    );

	register_sidebar(
	    array(
	        'name' => 'Footer Right 2',
            'id' => 'footer-right-2',
            'description' => 'Appears in the footer area',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
            )
    );

	register_sidebar(
	    array(
	        'name' => 'Footer Right 1',
            'id' => 'footer-right-1',
            'description' => 'Appears in the footer area',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
            )
    );
}
add_action( 'widgets_init', 'liquidchurch_widgets_init' );


