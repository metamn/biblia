<?php

/**
 * ICARE functions and definitions
 *
 * @package WordPress
 * @subpackage CORE
 * @since CORE 1.1
 */



// ICARE only works in WordPress 3.6 or later.

if ( version_compare( $GLOBALS['wp_version'], '3.6', '<' ) ) {
	require get_template_directory() . '/core/includes/back-compat.php';
}

// Set the content width based on the theme's design and stylesheet.
if ( !isset( $content_width ) ) {
	$content_width = 900;
}

/* ------------------------------------------------------------------------ */
/* Theme Constants
/* ------------------------------------------------------------------------ */

define('CORE_DIRECTORY', get_template_directory(). '/core');
define('CORE_DIRECTORY_URI', get_template_directory_uri());
define('CORE_THEME_NAME', 'icare');
define('CORE_THEME_VERSION', '1.0.0');

define('TESTENVIRONMENT', FALSE);

/* ------------------------------------------------------------------------ */
/* Translation
/* ------------------------------------------------------------------------ */

add_action('after_setup_theme', 'icare_lang_setup');
function icare_lang_setup(){
	load_theme_textdomain(CORE_THEME_NAME, CORE_DIRECTORY . '/languages');
}

/*------------------------------------------------------------------------- */
# Category Rel Fix
#------------------------------------------------------------------------- */

function icare_remove_category_list_rel( $output ) {
    // Remove rel attribute from the category list
    return str_replace( ' rel="category tag"', '', $output );
}
 
add_filter( 'wp_list_categories', 'icare_remove_category_list_rel' );
add_filter( 'the_category', 'icare_remove_category_list_rel' );

/*----------------------------------------------------------------------------*/
/* ReduxFramework Admin Panel
/*----------------------------------------------------------------------------*/

if ( !class_exists( 'ReduxFramework' ) ) {
 require_once( get_template_directory() . '/admin/options/framework.php' );
}

if ( !isset( $redux_demo ) ) {
 require_once( get_template_directory() . '/admin/options/admin-config.php' );
}

/* ------------------------------------------------------------------------ */
/* Include Metabox Script
/* ------------------------------------------------------------------------ */

define( 'RWMB_URL', trailingslashit( get_template_directory_uri() . '/core/includes/meta-box' ) );
define( 'RWMB_DIR', trailingslashit( get_template_directory() . '/core/includes/meta-box' ) );
require_once RWMB_DIR . 'meta-box.php';
include 'core/includes/meta-boxes.php';

/* ------------------------------------------------------------------------ */
/* Includes
/* ------------------------------------------------------------------------ */

// Theme Advanced Search for Causes
require_once CORE_DIRECTORY. '/includes/wpas.php';

// Register and load CSS/JS
require_once(CORE_DIRECTORY. '/includes/theme-enqueue.php'); 

// Theme Initial Setup (Menus, Widgets and Custom Post Types)
require_once(CORE_DIRECTORY. '/includes/theme-init.php'); 

// Theme Functions and Utilities
require_once(CORE_DIRECTORY. '/includes/theme-functions.php');

// Theme Widgets
//include_once CORE_DIRECTORY. '/includes/widgets/core-latest-causes.php';
include_once CORE_DIRECTORY. '/includes/widgets/core-latest-events.php';
include_once CORE_DIRECTORY. '/includes/widgets/core-testimonials.php';
include_once CORE_DIRECTORY. '/includes/widgets/core-flickr.php';

//Automatic Plugin Activation
require_once CORE_DIRECTORY . '/includes/class-tgm-plugin-activation.php';
require_once CORE_DIRECTORY . '/includes/register-plugins.php';


?>