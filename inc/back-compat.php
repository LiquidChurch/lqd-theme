<?php
/**
 * Liquid Church back compat functionality
 *
 * Prevents Liquid Church from running on WordPress versions prior to 4.4,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.4.
 *
 * @package WordPress
 * @subpackage Liquid_Church
 * @since Liquid Church 1.0
 */

/**
 * Prevent switching to Liquid Church on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since Liquid Church 1.0
 */
function liquidchurch_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );

	unset( $_GET['activated'] );

	add_action( 'admin_notices', 'liquidchurch_upgrade_notice' );
}
add_action( 'after_switch_theme', 'liquidchurch_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Liquid Church on WordPress versions prior to 4.4.
 *
 * @since Liquid Church 1.0
 *
 * @global string $wp_version WordPress version.
 */
function liquidchurch_upgrade_notice() {
	$message = sprintf( __( 'Liquid Church requires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'liquidchurch' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.4.
 *
 * @since Liquid Church 1.0
 *
 * @global string $wp_version WordPress version.
 */
function liquidchurch_customize() {
	wp_die( sprintf( __( 'Liquid Church requires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'liquidchurch' ), $GLOBALS['wp_version'] ), '', [
		'back_link' => true,
    ] );
}
add_action( 'load-customize.php', 'liquidchurch_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.4.
 *
 * @since Liquid Church 1.0
 *
 * @global string $wp_version WordPress version.
 */
function liquidchurch_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'Liquid Church requires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'liquidchurch' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'liquidchurch_preview' );
