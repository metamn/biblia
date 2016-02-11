<?php

#-----------------------------------------------------------------#
# Theme Initial Setup
#-----------------------------------------------------------------#

add_action( 'after_setup_theme', 'icare_setup' );

if ( ! function_exists( 'icare_setup' ) ){

	function icare_setup() {
	
		// This theme styles the visual editor with editor-style.css to match the theme style.
		add_editor_style();
	
		// This theme uses post thumbnails
		if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
		
				add_theme_support( 'post-thumbnails' );
				set_post_thumbnail_size( 340, 236, true ); // Default blog images thumb size
				add_image_size('blog-list-thumb', 300, 242, true);
				add_image_size('blog-single-image', 770, 400, true);
				add_image_size('cause-thumb', 360, 266, true);
				add_image_size('cause-thumb-4col', 255, 200, true);
				add_image_size('cause-thumb-sidebar', 270, 200, true); 
				add_image_size('cause-single-image', 710, 410, true);
				add_image_size('member-thumb', 370, 190, true);
				add_image_size('member-thumb-sidebar', 370, 230, true);
				add_image_size('member-single-image', 770, 365, true);
				add_image_size('event-thumb', 240, 192, true);
				add_image_size('event-single-image', 770, 400, true);
				add_image_size('slider-image', 770, 455, true ); 
				add_image_size('widget-thumb', 80, 80, true);
				add_image_size('widget-thumb-alternate', 70, 70, true);
				
		}
	
		// Add RSS feed links to <head> for posts and comments.
		add_theme_support( 'automatic-feed-links' );
	
		// custom menu support
		add_theme_support( 'menus' );
		if ( function_exists( 'register_nav_menus' ) ) {
		  	register_nav_menus(
		  		array(
		  		  'header_top_menu' => 'Header Top Navigation',
		  		  'header_main_menu' => 'Header Main Navigation'
		  		)
		  	);
		}
	}
}

#-----------------------------------------------------------------#
# Setup and Register Widgets Areas
#-----------------------------------------------------------------#

add_action( 'widgets_init', 'icare_widgets_init' );


if (!function_exists('icare_widgets_init')) {
	
	function icare_widgets_init() {
		
		// Location: At the top left side of the homepage
		register_sidebar(array(
			'name'			=> __('Homepage Top Content', CORE_THEME_NAME),
			'id' 			=> 'core-home-area-1',
			'description'   => __( 'Located at the top left side of the homepage. (beside slider)', CORE_THEME_NAME),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));
		
		// Location: At the bottom of the homepage
		register_sidebar(array(
			'name'			=> __('Homepage Bottom Content', CORE_THEME_NAME),
			'id' 			=> 'core-home-area-2',
			'description'   => __( 'Located at the bottom of the homepage.', CORE_THEME_NAME),
			'before_widget' => '<div class="row"><div class="col-md-12" id="%1$s">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<div class="row"><div class="col-md-12"><h4 class="widget-title"><span>',
			'after_title'   => '</span></h4></div></div>',
		));
		
		// Sidebar Widget
		// Location: the sidebar
		register_sidebar(array(
			'name'			=> __('Sidebar', CORE_THEME_NAME ),
			'id' 			=> 'core-sidebar-widget-area',
			'description'   => __( 'Located at the left/right side of pages.', CORE_THEME_NAME ),
			'before_widget' => '<div id="%1$s" class="box-content">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title"><span>',
			'after_title'   => '</span></h4>',
		));
		
		// Footer Widget
		// Location: at the top of the footer, above the copyright
		register_sidebar(array(
			'name'			=> __('#Footer Top Area 1', CORE_THEME_NAME),
			'id' 			=> 'core-footer-area-1',
			'description'   => __( 'Located at the bottom of pages.', CORE_THEME_NAME),
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '<h4 class="footer-widget-title">',
			'after_title' => '</h4>',
		));
		
		// Footer Widget
		// Location: at the top of the footer, above the copyright
		register_sidebar(array(
			'name'			=> __('#Footer Top Area 2', CORE_THEME_NAME),
			'id' 			=> 'core-footer-area-2',
			'description'   => __( 'Located at the bottom of pages.', CORE_THEME_NAME),
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '<h4 class="footer-widget-title">',
			'after_title' => '</h4>',
		));
		
		// Footer Widget
		// Location: at the top of the footer, above the copyright
		register_sidebar(array(
			'name'			=> __('#Footer Top Area 3', CORE_THEME_NAME),
			'id' 			=> 'core-footer-area-3',
			'description'   => __( 'Located at the bottom of pages.', CORE_THEME_NAME),
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '<h4 class="footer-widget-title">',
			'after_title' => '</h4>',
		));
		
		// Footer Widget
		// Location: at the top of the footer, above the copyright
		register_sidebar(array(
			'name'			=> __('#Footer Bottom Area 1', CORE_THEME_NAME),
			'id' 			=> 'core-footer-area-4',
			'description'   => __( 'Located at the bottom of pages.', CORE_THEME_NAME),
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '<h4 class="footer-widget-title">',
			'after_title' => '</h4>',
		));
		
		// Footer Widget
		// Location: at the top of the footer, above the copyright
		register_sidebar(array(
			'name'			=> __('#Footer Bottom Area 2', CORE_THEME_NAME),
			'id' 			=> 'core-footer-area-5',
			'description'   => __( 'Located at the bottom of pages.', CORE_THEME_NAME),
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '<h4 class="footer-widget-title">',
			'after_title' => '</h4>',
		));
		
		// Footer Widget
		// Location: at the top of the footer, above the copyright
		register_sidebar(array(
			'name'			=> __('#Footer Bottom Area 3', CORE_THEME_NAME),
			'id' 			=> 'core-footer-area-6',
			'description'   => __( 'Located at the bottom of pages.', CORE_THEME_NAME),
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '<h4 class="footer-widget-title">',
			'after_title' => '</h4>',
		));
		
		// Footer Widget
		// Location: at the top of the footer, above the copyright
		register_sidebar(array(
			'name'			=> __('#Footer Bottom Area 4', CORE_THEME_NAME),
			'id' 			=> 'core-footer-area-7',
			'description'   => __( 'Located at the bottom of pages.', CORE_THEME_NAME),
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '<h4 class="footer-widget-title">',
			'after_title' => '</h4>',
		));

	}
}

#-----------------------------------------------------------------#
# Register Slider Post Type
#-----------------------------------------------------------------#

if ( ! function_exists('icare_slide_post_register') ) {

	function icare_slides_post_register() {
	
		$labels = array(
			'name'                => _x( 'Slides', 'Post Type General Name', CORE_THEME_NAME ),
			'singular_name'       => _x( 'Slide', 'Post Type Singular Name', CORE_THEME_NAME ),
			'menu_name'           => __( 'Home Slides', CORE_THEME_NAME ),
			'parent_item_colon'   => __( 'Parent Slide:', CORE_THEME_NAME ),
			'all_items'           => __( 'All Slides', CORE_THEME_NAME ),
			'view_item'           => __( 'View Slide', CORE_THEME_NAME ),
			'add_new_item'        => __( 'Add New Slide', CORE_THEME_NAME ),
			'add_new'             => __( 'Add New Slide', CORE_THEME_NAME ),
			'edit_item'           => __( 'Edit Slide', CORE_THEME_NAME ),
			'update_item'         => __( 'Update Slide', CORE_THEME_NAME ),
			'search_items'        => __( 'Search Slide', CORE_THEME_NAME ),
			'not_found'           => __( 'Not found', CORE_THEME_NAME ),
			'not_found_in_trash'  => __( 'Not found in Trash', CORE_THEME_NAME ),
		);
		$rewrite = array(
			'slug'                => __('slide', CORE_THEME_NAME ),
			'with_front'          => false,
			'pages'               => false,
			'feeds'               => false,
		);
		$args = array(
			'label'               => __( 'slide', CORE_THEME_NAME ),
			'description'         => __( 'Slide Post Type', CORE_THEME_NAME ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'thumbnail', ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => false,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => true,
			'publicly_queryable'  => true,
			'query_var'           => 'slide',
			'rewrite'             => $rewrite,
			'menu_icon' 		  => 'dashicons-desktop',
			'capability_type'     => 'post',
		);
		register_post_type( 'slide', $args );
	
	}
	
	// Hook into the 'init' action
	add_action( 'init', 'icare_slides_post_register', 0 );

}


#-----------------------------------------------------------------#
# Register Causes Post Type
#-----------------------------------------------------------------#

if ( ! function_exists('icare_causes_post_register') ) {

	function icare_causes_post_register() {
	
		$labels = array(
			'name'                => _x( 'Causes', 'Post Type General Name', CORE_THEME_NAME ),
			'singular_name'       => _x( 'Cause', 'Post Type Singular Name', CORE_THEME_NAME ),
			'menu_name'           => __( 'Causes', CORE_THEME_NAME ),
			'parent_item_colon'   => __( 'Parent Cause:', CORE_THEME_NAME ),
			'all_items'           => __( 'All Causes', CORE_THEME_NAME ),
			'view_item'           => __( 'View Cause', CORE_THEME_NAME ),
			'add_new_item'        => __( 'Add New Cause', CORE_THEME_NAME ),
			'add_new'             => __( 'Add New Cause', CORE_THEME_NAME ),
			'edit_item'           => __( 'Edit Cause', CORE_THEME_NAME ),
			'update_item'         => __( 'Update Cause', CORE_THEME_NAME ),
			'search_items'        => __( 'Search Cause', CORE_THEME_NAME ),
			'not_found'           => __( 'Not found', CORE_THEME_NAME ),
			'not_found_in_trash'  => __( 'Not found in Trash', CORE_THEME_NAME ),
		);
		$rewrite = array(
			'slug'                => __('cause', CORE_THEME_NAME ),
			'with_front'          => false,
			'pages'               => true,
			'feeds'               => true,
		);
		$args = array(
			'label'               => __( 'cause', CORE_THEME_NAME ),
			'description'         => __( 'Cause Post Type', CORE_THEME_NAME ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'thumbnail', ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => false,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'query_var'           => 'cause',
			'rewrite'             => $rewrite,
			'menu_icon' 		  => 'dashicons-admin-site',
			'capability_type'     => 'post',
		);
		register_post_type( 'cause', $args );
		
		// Add Taxonomies Attached to Courses Post Type
	
		$disciplines_labels = array(
			'name' => __( 'Causes Categories', CORE_THEME_NAME),
			'singular_name' => __( 'Causes Category', CORE_THEME_NAME),
			'search_items' =>  __( 'Search Causes Categories', CORE_THEME_NAME),
			'all_items' => __( 'All Causes Categories', CORE_THEME_NAME),
			'parent_item' => __( 'Parent Cause Category', CORE_THEME_NAME),
			'edit_item' => __( 'Edit Cause Category', CORE_THEME_NAME),
			'update_item' => __( 'Update Cause Category', CORE_THEME_NAME),
			'add_new_item' => __( 'Add New Cause Category', CORE_THEME_NAME),
		    'menu_name' => __( 'Causes Categories', CORE_THEME_NAME)
		); 	
	
		register_taxonomy("cause-categories", 
			array("cause"), 
			array("hierarchical" => true, 
					'labels' => $disciplines_labels,
					'show_ui' => true,
	    			'query_var' => true,
					'rewrite' => array( 'slug' => __('cause-category', CORE_THEME_NAME) )
		));
	
	}
	
	// Hook into the 'init' action
	add_action( 'init', 'icare_causes_post_register', 0 );

}

#-----------------------------------------------------------------#
# Register Staff Post Type
#-----------------------------------------------------------------#

if ( ! function_exists('icare_staff_post_register') ) {

	function icare_staff_post_register() {
	
		$labels = array(
			'name'                => _x( 'Staff', 'Post Type General Name', CORE_THEME_NAME ),
			'singular_name'       => _x( 'Staff', 'Post Type Singular Name', CORE_THEME_NAME ),
			'menu_name'           => __( 'Staff', CORE_THEME_NAME ),
			'parent_item_colon'   => __( 'Parent Staff:', CORE_THEME_NAME ),
			'all_items'           => __( 'All Staff', CORE_THEME_NAME ),
			'view_item'           => __( 'View Staff', CORE_THEME_NAME ),
			'add_new_item'        => __( 'Add New Staff', CORE_THEME_NAME ),
			'add_new'             => __( 'Add New Staff', CORE_THEME_NAME ),
			'edit_item'           => __( 'Edit Staff', CORE_THEME_NAME ),
			'update_item'         => __( 'Update Staff', CORE_THEME_NAME ),
			'search_items'        => __( 'Search Staff', CORE_THEME_NAME ),
			'not_found'           => __( 'Not found', CORE_THEME_NAME ),
			'not_found_in_trash'  => __( 'Not found in Trash', CORE_THEME_NAME ),
		);
		$rewrite = array(
			'slug'                => __('staff', CORE_THEME_NAME ),
			'with_front'          => false,
			'pages'               => true,
			'feeds'               => true,
		);
		$args = array(
			'label'               => __( 'staff', CORE_THEME_NAME ),
			'description'         => __( 'Staff Post Type', CORE_THEME_NAME ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'thumbnail', ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => false,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'query_var'           => 'staff',
			'rewrite'             => $rewrite,
			'menu_icon' 		  => 'dashicons-businessman',
			'capability_type'     => 'post',
		);
		register_post_type( 'staff', $args );
	
	}
	
	// Hook into the 'init' action
	add_action( 'init', 'icare_staff_post_register', 0 );

}

#-----------------------------------------------------------------#
# Register Testimonials Post Type
#-----------------------------------------------------------------#

if ( ! function_exists('icare_testi_post_register') ) {

	function icare_testi_post_register() {
	
		$labels = array(
			'name'                => _x( 'Testimonials', 'Post Type General Name', CORE_THEME_NAME ),
			'singular_name'       => _x( 'Testimonial', 'Post Type Singular Name', CORE_THEME_NAME ),
			'menu_name'           => __( 'Testimonials', CORE_THEME_NAME ),
			'parent_item_colon'   => __( 'Parent Testimonial:', CORE_THEME_NAME ),
			'all_items'           => __( 'All Testimonials', CORE_THEME_NAME ),
			'view_item'           => __( 'View Testimonial', CORE_THEME_NAME ),
			'add_new_item'        => __( 'Add New Testimonial', CORE_THEME_NAME ),
			'add_new'             => __( 'Add New Testimonial', CORE_THEME_NAME ),
			'edit_item'           => __( 'Edit Testimonial', CORE_THEME_NAME ),
			'update_item'         => __( 'Update Testimonial', CORE_THEME_NAME ),
			'search_items'        => __( 'Search Testimonials', CORE_THEME_NAME ),
			'not_found'           => __( 'Not found', CORE_THEME_NAME ),
			'not_found_in_trash'  => __( 'Not found in Trash', CORE_THEME_NAME ),
		);
		$rewrite = array(
			'slug'                => __('testimonial', CORE_THEME_NAME ),
			'with_front'          => false,
			'pages'               => true,
			'feeds'               => true,
		);
		$args = array(
			'label'               => __( 'testimonial', CORE_THEME_NAME ),
			'description'         => __( 'Testimonial Post Type', CORE_THEME_NAME ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'thumbnail', ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => false,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'query_var'           => 'testimonial',
			'rewrite'             => $rewrite,
			'menu_icon' 		  => 'dashicons-format-chat',
			'capability_type'     => 'post',
		);
		register_post_type( 'testimonial', $args );
	
	}
	
	// Hook into the 'init' action
	add_action( 'init', 'icare_testi_post_register', 0 );

}

#-----------------------------------------------------------------#
# Register Events Post Type
#-----------------------------------------------------------------#

if ( ! function_exists('icare_events_post_register') ) {

	function icare_events_post_register() {
	
		$labels = array(
			'name'                => _x( 'Events', 'Post Type General Name', CORE_THEME_NAME ),
			'singular_name'       => _x( 'Event', 'Post Type Singular Name', CORE_THEME_NAME ),
			'menu_name'           => __( 'Events', CORE_THEME_NAME ),
			'parent_item_colon'   => __( 'Parent Event:', CORE_THEME_NAME ),
			'all_items'           => __( 'All Events', CORE_THEME_NAME ),
			'view_item'           => __( 'View Event', CORE_THEME_NAME ),
			'add_new_item'        => __( 'Add New Event', CORE_THEME_NAME ),
			'add_new'             => __( 'Add New Event', CORE_THEME_NAME ),
			'edit_item'           => __( 'Edit Event', CORE_THEME_NAME ),
			'update_item'         => __( 'Update Event', CORE_THEME_NAME ),
			'search_items'        => __( 'Search Event', CORE_THEME_NAME ),
			'not_found'           => __( 'Not found', CORE_THEME_NAME ),
			'not_found_in_trash'  => __( 'Not found in Trash', CORE_THEME_NAME ),
		);
		$rewrite = array(
			'slug'                => __('event', CORE_THEME_NAME ),
			'with_front'          => false,
			'pages'               => true,
			'feeds'               => true,
		);
		$args = array(
			'label'               => __( 'event', CORE_THEME_NAME ),
			'description'         => __( 'Event Post Type', CORE_THEME_NAME ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'thumbnail', ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => false,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'query_var'           => 'event',
			'rewrite'             => $rewrite,
			'menu_icon' 		  => 'dashicons-calendar',
			'capability_type'     => 'post',
		);
		register_post_type( 'event', $args );
	
	}
	
	// Hook into the 'init' action
	add_action( 'init', 'icare_events_post_register', 0 );

}


?>