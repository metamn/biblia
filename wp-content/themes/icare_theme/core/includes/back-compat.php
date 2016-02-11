<?php
/**
 * ICARE back compat functionality
 *
 * Prevents ICARE from running on WordPress versions prior to 3.6,
 * since this theme is not meant to be backward compatible beyond that
 * and relies on many newer functions and markup changes introduced in 3.6.
 *
 * @package WordPress
 * @subpackage core
 * @since ICARE 1.0
 */


function icare_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'icare_upgrade_notice' );
}
add_action( 'after_switch_theme', 'icare_switch_theme' );

/**
 * Add message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Twenty Fourteen on WordPress versions prior to 3.6.
 */
 
function icare_upgrade_notice() {
	$message = sprintf( __( 'ICARE requires at least WordPress version 3.6. You are running version %s. Please upgrade and try again.', CORE_THEME_NAME), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}


function icare_customize() {
	wp_die( sprintf( __( 'ICARE requires at least WordPress version 3.6. You are running version %s. Please upgrade and try again.', CORE_THEME_NAME ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'icare_customize' );

/**
 * Prevent the Theme Preview from being loaded on WordPress versions prior to 3.4.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return void
 */
function icare_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'Universe requires at least WordPress version 3.6. You are running version %s. Please upgrade and try again.', CORE_THEME_NAME ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'icare_preview' );
