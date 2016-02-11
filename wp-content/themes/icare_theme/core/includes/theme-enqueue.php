<?php

/* ------------------------------------------------------------------------ */
/* Register and load javascripts
/* ------------------------------------------------------------------------ */

function icare_main_js() {
		
	if(!is_admin()) {
			
		// Register
		wp_register_script('modernizr', get_template_directory_uri(). '/core/js/min/modernizr.min.js', 'jquery', '2.6.2');
		wp_register_script('bootstrap-plugins', get_template_directory_uri(). '/core/js/min/bootstrap.min.js', false, false, true);
		wp_register_script('jquery-plugins', get_template_directory_uri(). '/core/js/min/plugins.min.js', 'jquery', false, true);
		wp_register_script('plugins-init', get_template_directory_uri(). '/core/js/min/custom.min.js', 'jquery', '1.0', true);

		
		// Load
		wp_enqueue_script('jquery');
		wp_enqueue_script('modernizr');
		wp_enqueue_script('bootstrap-plugins');
		wp_enqueue_script('jquery-plugins');
		wp_enqueue_script('plugins-init');
		
		
		// Conditional Enqueue
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
		}
		
	}
}

add_action('wp_enqueue_scripts', 'icare_main_js');


/* ------------------------------------------------------------------------ */
/* Register and load CSS
/* ------------------------------------------------------------------------ */

function icare_main_styles() {
	
	if(!is_admin()) {
		
		// Register
		wp_register_style('bootstrap-css', get_template_directory_uri(). '/core/css/bootstrap.min.css');
		wp_register_style('font-awesome', get_template_directory_uri(). '/core/css/font-awesome.min.css');
		wp_register_style('animate', get_template_directory_uri(). '/core/css/animate.css');
		wp_register_style('main-styles', get_stylesheet_directory_uri(). '/style.css');
		wp_register_style('custom-color-scheme', get_template_directory_uri(). '/core/css/custom-color-scheme.php');
		wp_register_style('custom-css', get_template_directory_uri(). '/core/css/custom-css.php');
		
		
		// Load
		wp_enqueue_style('bootstrap-css');
		wp_enqueue_style('font-awesome');
		wp_enqueue_style('animate');
		wp_enqueue_style('main-styles');
		wp_enqueue_style('custom-color-scheme');
		wp_enqueue_style('custom-css');
	
	}
	
}

add_action('wp_print_styles', 'icare_main_styles');

?>