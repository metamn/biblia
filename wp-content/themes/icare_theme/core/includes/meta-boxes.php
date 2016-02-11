<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/docs/define-meta-boxes
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = 'core_';
global $meta_boxes;
$meta_boxes = array();
global $data;

/* ----------------------------------------------------- */
// Metaboxes for Slide Post Type
/* ----------------------------------------------------- */

$meta_boxes[] = array(
	'id' => 'core_slide_options',
	'title' => __('Slide Options', CORE_THEME_NAME),
	'pages' => array( 'slide' ),
	'context' => 'normal',
	'fields' => array(
		array(
			'name'		=> __('Show Slide Caption?', CORE_THEME_NAME),
			'desc'		=> __('Check to show slide captions.', CORE_THEME_NAME),
			'id'		=> $prefix . 'show_slide_caption',
			'type'		=> 'checkbox',
			'std'		=> true
		),
		array(
			'name'		=> __('Slide URL', CORE_THEME_NAME),
			'id'		=> $prefix . 'slide_url',
			'desc'      => __('Enter the url for the slide caption (Do not forget the http://).', CORE_THEME_NAME),
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '#',
			'size'		=> '60'
		),	
		array(
			'name'		=> __('Slide Caption', CORE_THEME_NAME),
			'id'		=> $prefix . 'slide_caption',
			'desc'		=> __('Enter a brief caption for the slide.', CORE_THEME_NAME),
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> ''
		)
		
	)
);

/* ----------------------------------------------------- */
// Metaboxes for Cause Post Type
/* ----------------------------------------------------- */

$meta_boxes[] = array(
	'id' => 'core_cause_options',
	'title' => __('Causes Options', CORE_THEME_NAME),
	'pages' => array( 'cause' ),
	'context' => 'normal',
	'fields' => array(
			array(
				'name' => __('How much does this cause need?', CORE_THEME_NAME),
				'desc' => __('Enter the ammount needed for this cause.', CORE_THEME_NAME),
				'id'		=> $prefix . 'cause_goal',
				'type' => 'number',
				'std' => 0,
				'min' => 0,
				'step' => 5,
		),
		array(
				'name' => __('Donations so far', CORE_THEME_NAME),
				'desc' => __('Enter the ammount of donations collected.', CORE_THEME_NAME),
				'id'		=> $prefix . 'cause_collected',
				'type' => 'number',
				'std' => 0,
				'min' => 0,
				'step' => 5,

				// Text labels displayed before and after value
				'prefix' => __( '$', CORE_THEME_NAME ),
				'suffix' => __( ' USD', CORE_THEME_NAME ),

		),
		array(
				'name'  => __( 'Paypal account', CORE_THEME_NAME ),
				'desc' => __('Enter the Paypal account for this specific cause.<br> <strong> Leave it black to use the global Paypal account defined in theme options.</strong>', CORE_THEME_NAME),
				'id'	=> $prefix . 'cause_paypal',
				'type'  => 'text',
		),
		
	)
);

/* ----------------------------------------------------- */
// Metaboxes for Staff Post Type
/* ----------------------------------------------------- */

$meta_boxes[] = array(
	'id' => 'core_staff_options',
	'title' => __('Members Options', CORE_THEME_NAME),
	'pages' => array( 'staff' ),
	'context' => 'normal',
	'fields' => array(
		array(
			'name'		=> __('Member Position', CORE_THEME_NAME),
			'id'		=> $prefix . 'member_position',
			'desc'      => __('Enter the member role <strong>(e.g CEO).</strong>', CORE_THEME_NAME),
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		array(
			'name'		=> __('Twitter Profile', CORE_THEME_NAME),
			'id'		=> $prefix . 'member_twitter',
			'desc'      => __('Enter the member twitter profile URL. <strong>Leave it blank to hide icon on front-end.</strong>', CORE_THEME_NAME),
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'size' 		=> '60'
		),
		array(
			'name'		=> __('Facebook Profile', CORE_THEME_NAME),
			'id'		=> $prefix . 'member_facebook',
			'desc'      => __('Enter the member facebook profile URL. <strong>Leave it blank to hide icon on front-end.</strong>', CORE_THEME_NAME),
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'size' 		=> '60'
		),
		array(
			'name'		=> __('Google+ Profile', CORE_THEME_NAME),
			'id'		=> $prefix . 'member_googleplus',
			'desc'      => __('Enter the member google+ profile URL. <strong>Leave it blank to hide icon on front-end.</strong>', CORE_THEME_NAME),
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'size' 		=> '60',
		),
		array(
			'name'		=> __('Linkedin Profile', CORE_THEME_NAME),
			'id'		=> $prefix . 'member_linkedin',
			'desc'      => __('Enter the member linkedin profile URL. <strong>Leave it blank to hide icon on front-end.</strong>', CORE_THEME_NAME),
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'size' 		=> '60',
		),
		array(
			'name'		=> __('Pinterest Profile', CORE_THEME_NAME),
			'id'		=> $prefix . 'member_pinterest',
			'desc'      => __('Enter the member pinterest profile URL. <strong>Leave it blank to hide icon on front-end.</strong>', CORE_THEME_NAME),
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'size' 		=> '60',
		)
			
		
	)
);

/* ----------------------------------------------------- */
// Metaboxes for Testimonial Post Type
/* ----------------------------------------------------- */

$meta_boxes[] = array(
	'id' => 'core_testi_options',
	'title' => __('Testimonials Options', CORE_THEME_NAME),
	'pages' => array( 'testimonial' ),
	'context' => 'normal',
	'fields' => array(
		array(
			'name'		=> __('Author', CORE_THEME_NAME),
			'id'		=> $prefix . 'testi_author',
			'desc'      => '',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'size'      => '60'
		),
		array(
			'name'		=> __('Position', CORE_THEME_NAME),
			'id'		=> $prefix . 'testi_position',
			'desc'      => __('Enter the author position <strong>(e.g CEO).</strong>', CORE_THEME_NAME),
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
		)
		
	)
);

/* ----------------------------------------------------- */
// Metaboxes for Event Post Type
/* ----------------------------------------------------- */

$meta_boxes[] = array(
	'id' => 'core_event_options',
	'title' => __('Events Options', CORE_THEME_NAME),
	'pages' => array( 'event' ),
	'context' => 'normal',
	'priority' => 'high',

	// List of meta fields
	'fields' => array(
		array(
				'name'		=> __('Event Location', CORE_THEME_NAME),
				'id'		=> $prefix . 'event_location',
				'desc'		=> __('Enter the event location <strong>(e.g Wheaton, MD)</strong>.', CORE_THEME_NAME),
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> ''
		),
		
		array(
				'name'		=> __('Event Phone', CORE_THEME_NAME),
				'id'		=> $prefix . 'event_phone',
				'desc'		=> __('Enter the event phone.', CORE_THEME_NAME),
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> ''
		),
		
		array(
				'name'		=> __('Event Email', CORE_THEME_NAME),
				'id'		=> $prefix . 'event_email',
				'desc'		=> __('Enter the event E-mail address.', CORE_THEME_NAME),
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> ''
		),
		
		array(
				'name'		=> __('Event Website', CORE_THEME_NAME),
				'id'		=> $prefix . 'event_website',
				'desc'		=> __('Enter the event website.', CORE_THEME_NAME),
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> ''
		),
		
		array(
				'name' => __( 'Event Date', CORE_THEME_NAME),
				'id'		=> $prefix . 'event_date',
				'desc' => __('Click to choose a date for the event.', CORE_THEME_NAME),
				'type' => 'date',

				// jQuery date picker options. See here http://api.jqueryui.com/datepicker
				'js_options' => array(
					'dateFormat'      => __( 'dd MM yy', CORE_THEME_NAME),
					'changeMonth'     => true,
					'changeYear'      => true,
					'showButtonPanel' => true,
				),
		),
	
		array(
				'name' => __( 'Event Start Time', CORE_THEME_NAME),
				'id'   => $prefix . 'event_start_time',
				'desc' => __('Click to choose the event start time.', CORE_THEME_NAME),
				'type' => 'time',

				// jQuery datetime picker options.
				// For date options, see here http://api.jqueryui.com/datepicker
				// For time options, see here http://trentrichardson.com/examples/timepicker/
				'js_options' => array(
					'stepMinute' => 5,
					'showSecond' => true,
					'stepSecond' => 10,
				),
		),

		array(
				'name' => __( 'Event End Time', CORE_THEME_NAME),
				'id'   => $prefix . 'event_end_time',
				'desc' => __('Click to choose the event end time.', CORE_THEME_NAME),
				'type' => 'time',

				// jQuery datetime picker options.
				// For date options, see here http://api.jqueryui.com/datepicker
				// For time options, see here http://trentrichardson.com/examples/timepicker/
				'js_options' => array(
					'stepMinute' => 5,
					'showSecond' => true,
					'stepSecond' => 10,
				),
		),
		
		array(
            'id' => $prefix . 'reference_loc',
            'name' => _x('Event Address', 'google map', CORE_THEME_NAME),
            'desc' => __('Enter the event full address. <strong>Notice: This will be the address showed in the map.</strong>', CORE_THEME_NAME),
            'type' => 'text',
            'std' => _x('Salvador - BA, República Federativa do Brasil', 'google map', CORE_THEME_NAME),
            'size' => '60'
        ),
			array(
            'id' => $prefix . 'event_address',
            'name' => _x('Event Address Map', 'google map', CORE_THEME_NAME),
            'type' => 'map',
            'std' => '-12.8809348,-38.4175336,12', // 'latitude,longitude[,zoom]' (zoom is optional)
            'style' => 'width: 100%; height: 200px',
            'address_field' => $prefix . 'reference_loc', // Name of text field where address is entered. Can be list of text fields, separated by commas (for ex. city, state)
            'desc' => ''

        ),
	)
);

/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function icare_register_meta_boxes()
{
	global $meta_boxes;

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( class_exists( 'RW_Meta_Box' ) )
	{
		foreach ( $meta_boxes as $meta_box )
		{
			new RW_Meta_Box( $meta_box );
		}
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'icare_register_meta_boxes' );