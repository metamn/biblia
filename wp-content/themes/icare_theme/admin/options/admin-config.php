<?php
add_filter( 'redux-backup-description', 'admin_change_default_texts' );
function admin_change_default_texts(){
	return __('You can copy/download your current options settings. This is a backup solution in case anything goes wrong.', CORE_THEME_NAME);
}
/**
	ReduxFramework Sample Config File
	For full documentation, please visit http://reduxframework.com/docs/
**/


/** 
	Most of your editing will be done in this section.
	Here you can override default values, uncomment args and change their values.
	No $args are required, but they can be overridden if needed.
	
**/
$args = array();


// For use with a tab example below
$tabs = array();


// BEGIN Sample Config

// Default: true
$args['dev_mode'] = false;

// Set a custom option name. Don't forget to replace spaces with underscores!
$args['opt_name'] = 'core_options';

// Theme Panel Main Display Name
$args['display_name'] 	 = __('ICARE Options Panel', CORE_THEME_NAME);
$args['display_version'] = false;

// If you want to use Google Webfonts, you MUST define the api key.
$args['google_api_key']  = 'AIzaSyAX_2L_UzCDPEnAHTG7zhESRVpMPS4ssII';

// Define the starting tab for the option panel.
// Default: '0';
$args['last_tab'] = '0';

// Default: 'standard'
$args['admin_stylesheet'] = 'standard';

// Default: null
$args['import_icon_class'] = 'el-icon-large';

// Set a custom menu icon.
$args['menu_icon']  = ''; //get_template_directory_uri() .'/core/images/ico/favicon.png';

// Set a custom title for the options page.
// Default: Options
$args['menu_title'] = __('ICARE Options', CORE_THEME_NAME);

// Set a custom page title for the options page.
// Default: Options
$args['page_title'] = __('ICARE Options Panel', CORE_THEME_NAME);

// Set a custom page slug for options page (wp-admin/themes.php?page=***).
// Default: redux_options
$args['page_slug']  = 'core_options';

// Show Default
$args['default_show'] = false;

// Default Mark
$args['default_mark'] = '';

// Set a custom page icon class (used to override the page icon next to heading)
$args['page_icon'] = 'icon-themes';

// Declare sections array
$sections = array();



// General -------------------------------------------------------------------------- >	
$sections[] = array(
	'title' => __('General', CORE_THEME_NAME),
	'header' => __('Welcome to the Esmeth Options Framework', CORE_THEME_NAME),
	'desc' => '',
	'icon_class' => 'el-icon-large',
	'icon' => 'el-icon-cog',
	'submenu' => true,
	'fields' => array(
	
		array(
	       'id' => 'section-start',
	       'type' => 'section',
	       'title' => __('Custom Logo & Icones Options', CORE_THEME_NAME),
	       'subtitle' => __('Choose your own logo, favicon and apple touch icons.', CORE_THEME_NAME),
	       'indent' => true 
   		),
		
		array(
			'id'=>'core_custom_logo',
			'url'=> true,
			'type' => 'media', 
			'title' => __('Logo', CORE_THEME_NAME),
			'default' => array( 'url' => get_template_directory_uri() .'/core/images/logo.png' ),
			'subtitle' => __('Upload custom logo to your website.', CORE_THEME_NAME),
		),
		
		array(
			'id'=>'core_favicon',
			'url'=> true,
			'type' => 'media', 
			'title' => __('Your Favicon', CORE_THEME_NAME),
			'default' => array( 'url' => get_template_directory_uri() .'/core/images/ico/favicon.png' ),
			'subtitle' => __('Upload a file( png, ico, jpg, gif or bmp ) from your computer (maximum size:1MB ).', CORE_THEME_NAME),
		),

		array(
			'id'=>'core_touch_icon',
			'url'=> true,
			'type' => 'media', 
			'title' => __('Apple touch icon', CORE_THEME_NAME),
			'default' => array( 'url' => get_template_directory_uri() .'/core/images/ico/favicon.png' ),
			'subtitle' => __('Upload your touch icon here.', CORE_THEME_NAME),
		),
		
		array(
			'id'=>'core_touch_icon_72',
			'url'=> true,
			'type' => 'media', 
			'title' => __('Apple touch icon 72x72', CORE_THEME_NAME),
			'default' => array( 'url' => get_template_directory_uri() .'/core/images/ico/apple-touch-icon-72x72.png' ),
			'subtitle' => __('Upload your touch icon here.', CORE_THEME_NAME),
		),
		
		array(
			'id'=>'core_touch_icon_144',
			'url'=> true,
			'type' => 'media', 
			'title' => __('Apple touch icon 144x144', CORE_THEME_NAME),
			'default' => array( 'url' => get_template_directory_uri() .'/core/images/ico/apple-touch-icon-144x144.png' ),
			'subtitle' => __('Upload your touch icon here.', CORE_THEME_NAME),
		),
		
		array(
	       'id' => 'section-start',
	       'type' => 'section',
	       'title' => __('Additional Options', CORE_THEME_NAME),
	       'subtitle' => __('Back to top button, custom search results page and category for home urgent causes button.', CORE_THEME_NAME),
	       'indent' => true 
   		),
   		
		array(
			'id'=>'core_custom_search_page',
			'type' => 'text', 
			'title' => __('Causes search results page', CORE_THEME_NAME),
			'subtitle' => __('Paste here the slug of your search results page for causes post type.', CORE_THEME_NAME),
			'default' => '#'
		),
		
		$fields = array(
		    'id'       => 'core_urgent_causes_cat',
		    'type'     => 'select',
		    'title'    => __('Homepage urgent cause section', CORE_THEME_NAME), 
		    'subtitle' => __('Choose a category for the home page urgent cause widget.', CORE_THEME_NAME),
		    'data' => 'categories',
		    'args' => array('taxonomy' => array('cause-categories')),
		    'default'  => '',
		),
		
		array(
			'id'=>'core_show_backtop_button',
			'type' => 'switch', 
			'title' => __('Show / Hide back to top button', CORE_THEME_NAME),
			'subtitle'=> __('Enable or disable the back to top button.', CORE_THEME_NAME),
			'default' => '1',
			'on' => __('On', CORE_THEME_NAME ),
			'off' => __('Off', CORE_THEME_NAME ),
		),
		
		array(
	       'id' => 'section-start',
	       'type' => 'section',
	       'title' => __('Contact Map Settings', CORE_THEME_NAME),
	       'subtitle' => __('Enter the required infos below to show a google map in your contact page.', CORE_THEME_NAME),
	       'indent' => true 
   		),
   		
		array(
			'id'=>'core_map_lat_info',
			'type' => 'text', 
			'title' => __('Google map latitude info', CORE_THEME_NAME),
			'subtitle' => __('Paste here the latitude info of your google map.', CORE_THEME_NAME),
			'default' => '-23.5568365'
		),
		
		array(
			'id'=>'core_map_lon_info',
			'type' => 'text', 
			'title' => __('Google map longetude info', CORE_THEME_NAME),
			'subtitle' => __('Paste here the longetude info of your google map.', CORE_THEME_NAME),
			'default' => '-46.6279369'
		),
		
		array(
		    'id'        => 'core_map_zoom_info',
		    'type'      => 'slider',
		    'title'     => __('Google map zoom info', CORE_THEME_NAME),
		    'subtitle'  => __('Adjust the zoom of the map to best suit your needs.', CORE_THEME_NAME),
		    "default"   => 15,
		    "min"       => 1,
		    "step"      => 1,
		    "max"       => 100,
		    'display_value' => 'label'
		),
		
	),
);

// Paypal  -------------------------------------------------------------------------- >	
$sections[] = array(
	'icon' => 'el-icon-usd',
	'icon_class' => 'el-icon-large',
    'title' => __('Paypal', CORE_THEME_NAME),
	'submenu' => true,
	'fields' => array(
	
		array(
			'id'=>'core_paypal_sandbox_mode',
			'type' => 'switch', 
			'title' => __('Paypal sandbox mode', CORE_THEME_NAME),
			'subtitle'=> __('Enable or disable sandbox mode for test purposes.', CORE_THEME_NAME),
			'default' => '1',
			'on' => __('On', CORE_THEME_NAME ),
			'off' => __('Off', CORE_THEME_NAME ),
		),
	
		array(
			'id'=>'core_paypal_email',
			'type' => 'text', 
			'title' => __('Paypal account', CORE_THEME_NAME),
			'subtitle' => __('Type the E-mail address of your Paypal account.', CORE_THEME_NAME),
			'default' => ''
		),		
		array(
			'id'=>'core_paypal_custom_logo',
			'url'=> true,
			'type' => 'media', 
			'title' => __('Paypal logo', CORE_THEME_NAME),
			'default' =>'',
			'subtitle' => __('Upload your custom logo for your paypal page.', CORE_THEME_NAME),
		),
		/*array(
			'id'=>'core_paypal_return_page',
			'type' => 'text', 
			'title' => __('Paypal return page', CORE_THEME_NAME),
			'subtitle' => __('Paste the url of your thank you page for Paypal.', CORE_THEME_NAME),
			'default' => ''
		),*/		
		array(
		    'id'       => 'core_paypal_currency_code',
		    'type'     => 'select',
		    'title'    => __('Paypal currency code', CORE_THEME_NAME), 
		    'subtitle' => __('Choose a currency code for your Paypal transactions.', CORE_THEME_NAME),
		    // Must provide key => value pairs for select options
		    'options'  => array(
		        'USD' => 'USD',
		        'AUD' => 'AUD',
		        'CAD' => 'CAD',
		        'CZK' => 'CZK',
		        'DDK' => 'DDK',
		        'EUR' => 'EUR',
		        'HKD' => 'HKD',
		        'HUF' => 'HUF',
		        'JPY' => 'JPY',
		        'NZD'=> 'NZD',
		        'PLN'=> 'PLN',
		        'GBP'=> 'GBP',
		        'SEK'=> 'SEK',
		        'CHF'=> 'CHF'
		    ),
    		'default'  => 'USD',
		),
		array(
		    'id'       => 'core_paypal_currency_sign',
		    'type'     => 'select',
		    'title'    => __('Paypal currency sign', CORE_THEME_NAME), 
		    'subtitle' => __('Choose a currency sign for your Paypal transactions.', CORE_THEME_NAME),
		    // Must provide key => value pairs for select options
		    'options'  => array(
		        '$' => '$',
		        'Kč' => 'Kč',
		        'Kr' => 'Kr',
		        '€' => '€',
		        'HK$' => 'HK$',
		        'Ft' => 'Ft',
		        '¥' => '¥',
		        'zł' => 'zł',
		        '£' => '£',
		        'CHF'=> 'CHF'
		    ),
    		'default'  => '$',
		)			
	)
	
);


// Typography -------------------------------------------------------------------------- >	
$sections[] = array(
	'title' => __('Typography', CORE_THEME_NAME),
	'header' => '',
	'desc' => '',
	'icon_class' => 'el-icon-large',
    'icon' => 'el-icon-font',
    'submenu' => true,
	'fields' => array(
			
			array(
				'id'=>'core_body_font',
				'type' => 'typography', 
				'title' => __('Body', CORE_THEME_NAME),
				'compiler'=>false,
				'google'=>true,
				'font-backup'=>false,
				'font-style'=>true,
				'subsets'=>true,
				'font-size'=>true,
				'line-height'=>false,
				'word-spacing'=>false,
				'letter-spacing'=>false,
				'color'=>true,
				'preview'=>true,
				'output' => array('body'),
				'units'=>'px',
				'subtitle'=> __('Choose custom font options to use for the main body text.', CORE_THEME_NAME),
				'default'=> array(
					'font-family'=>'Arial, Helvetica, sans-serif', 
					'font-size'=>'14px',
					'color'=>'#777777',
					'font-weight'=>'300',
				)
			),
			
			array(
				'id'=>'core_headings_font',
				'type' => 'typography', 
				'title' => __('Headings', CORE_THEME_NAME),
				'compiler'=>false,
				'google'=>true,
				'font-backup'=>false,
				'font-style'=>false,
				'subsets'=>true,
				'font-size'=>false,
				'line-height'=>false,
				'word-spacing'=>false,
				'letter-spacing'=>false,
				'color'=>false,
				'preview'=>true,
				'output' => array('h1, h2, h3, h4, h5, h6'),
				'units'=>'px',
				'subtitle'=> __('Choose custom font options to use for the headings (h1, h2, h3,...)', CORE_THEME_NAME),
				'default'=> array(
					'font-family'=>'Roboto', 
					'font-weight'=>'400',
					'color'=>'#232323'
				),
			),
			
			
		),
);


// Styling -------------------------------------------------------------------------- >	
$sections[] = array(
	'icon' => 'el-icon-brush',
	'icon_class' => 'el-icon-large',
	'title' => __('Styling', CORE_THEME_NAME),
	'submenu' => true,
	'fields' => array(
		
		array(
	       'id' => 'section-start',
	       'type' => 'section',
	       'title' => __('General Styling Options', CORE_THEME_NAME),
	       'subtitle' => __('General styles for buttons and link colors.', CORE_THEME_NAME),
	       'indent' => true 
   		),
   		
		array(
			'id'=>'link_color',
			'type' => 'color',
			'title' => __('General links color', CORE_THEME_NAME),
			'subtitle' => __('Choose color for links.', CORE_THEME_NAME),
			'default' => '#63875b',
			'transparent'=>false,
			'validate' => 'color',
		),
			
		array(
			'id'=>'accent_color',
			'type' => 'color',
			'title' => __('Accent Color', CORE_THEME_NAME),
			'subtitle' => __('Choose color for link hover states and general accent color.', CORE_THEME_NAME),
			'default' => '#faca3a',
			'transparent'=>false,
			'validate' => 'color',
		),
	
		array(
			'id'=>'button_color',
			'type' => 'color',
			'title' => __('Button color', CORE_THEME_NAME),
			'subtitle' => __('Choose color.', CORE_THEME_NAME),
			'default' => '#faca3a',
			'transparent'=>false,
			'validate' => 'color',
		),
		
		array(
			'id'=>'button_hover_color',
			'type' => 'color',
			'title' => __('Button hover color', CORE_THEME_NAME),
			'subtitle' => __('Choose color.', CORE_THEME_NAME),
			'default' => '#f9c321',
			'transparent'=>false,
			'validate' => 'color',
		),
		
		array(
			'id'=>'button_text_color',
			'type' => 'color',
			'title' => __('Button text color', CORE_THEME_NAME),
			'subtitle' => __('Choose color.', CORE_THEME_NAME),
			'default' => '#232323',
			'transparent'=>false,
			'validate' => 'color',
		),
		
		array(
	       'id' => 'section-start',
	       'type' => 'section',
	       'title' => __('Header Styling Options', CORE_THEME_NAME),
	       'subtitle' => __('Header styles for background, text and lines.', CORE_THEME_NAME),
	       'indent' => true 
   		),
		
		array(
			'id'=>'header_bg_color',
			'type' => 'color',
			'title' => __('Header background color', CORE_THEME_NAME),
			'subtitle' => __('Choose color.', CORE_THEME_NAME),
			'default' => '#6b9262',
			'transparent'=>false,
			'validate' => 'color',
		),
		
		array(
			'id'=>'header_alt_color',
			'type' => 'color',
			'title' => __('Header alternate color', CORE_THEME_NAME),
			'subtitle' => __('Choose color for social icons and main navigation backgrounds.', CORE_THEME_NAME),
			'default' => '#63875b',
			'transparent'=>false,
			'validate' => 'color',
		),
		
		array(
			'id'=>'header_sep_color',
			'type' => 'color',
			'title' => __('Header lines and separator color', CORE_THEME_NAME),
			'subtitle' => __('Choose color for lines and separators.', CORE_THEME_NAME),
			'default' => '#95b38e',
			'transparent'=>false,
			'validate' => 'color',
		),
		
		array(
			'id'=>'header_link_color',
			'type' => 'color',
			'title' => __('Header links color', CORE_THEME_NAME),
			'subtitle' => __('Choose color for header links.', CORE_THEME_NAME),
			'default' => '#d4e6da',
			'transparent'=>false,
			'validate' => 'color',
		),
		
		array(
			'id'=>'header_link_hover_color',
			'type' => 'color',
			'title' => __('Header links hover color', CORE_THEME_NAME),
			'subtitle' => __('Choose color for header links hover state.', CORE_THEME_NAME),
			'default' => '#ffffff',
			'transparent'=>false,
			'validate' => 'color',
		),
		
		array(
	       'id' => 'section-start',
	       'type' => 'section',
	       'title' => __('Main Navigation Styling Options', CORE_THEME_NAME),
	       'subtitle' => __('styles for main navigation.', CORE_THEME_NAME),
	       'indent' => true 
   		),
		
		array(
			'id'=>'main_nav_bg_color',
			'type' => 'color',
			'title' => __('Main navigation background color', CORE_THEME_NAME),
			'subtitle' => __('Choose color.', CORE_THEME_NAME),
			'default' => '#363833',
			'transparent'=>false,
			'validate' => 'color',
		),
		
		array(
			'id'=>'main_nav_sep_color',
			'type' => 'color',
			'title' => __('Main navigation lines color', CORE_THEME_NAME),
			'subtitle' => __('Choose color for main navigation lines and separators.', CORE_THEME_NAME),
			'default' => '#484b44',
			'transparent'=>false,
			'validate' => 'color',
		),
		
		array(
			'id'=>'main_nav_sub_color',
			'type' => 'color',
			'title' => __('Dropdown background color', CORE_THEME_NAME),
			'subtitle' => __('Choose color for main navigation dropdown background color.', CORE_THEME_NAME),
			'default' => '#484b44',
			'transparent'=>false,
			'validate' => 'color',
		),
		
		array(
			'id'=>'main_nav_sub_sep_color',
			'type' => 'color',
			'title' => __('Dropdown lines color', CORE_THEME_NAME),
			'subtitle' => __('Choose color for main navigation dropdown lines and separators.', CORE_THEME_NAME),
			'default' => '#484b44',
			'transparent'=>false,
			'validate' => 'color',
		),
		
		array(
			'id'=>'main_nav_link_color',
			'type' => 'color',
			'title' => __('Main navigation link color', CORE_THEME_NAME),
			'subtitle' => __('Choose color for main navigation links.', CORE_THEME_NAME),
			'default' => '#aaaaaa',
			'transparent'=>false,
			'validate' => 'color',
		),
		
		array(
			'id'=>'main_nav_link_hover_color',
			'type' => 'color',
			'title' => __('Main navigation link hover color', CORE_THEME_NAME),
			'subtitle' => __('Choose color for main navigation links hover state.', CORE_THEME_NAME),
			'default' => '#ffffff',
			'transparent'=>false,
			'validate' => 'color',
		),
		
		array(
			'id'=>'main_nav_link_active_color',
			'type' => 'color',
			'title' => __('Main navigation link active color', CORE_THEME_NAME),
			'subtitle' => __('Choose color for main navigation links active state.', CORE_THEME_NAME),
			'default' => '#faca3a',
			'transparent'=>false,
			'validate' => 'color',
		),
		
		array(
	       'id' => 'section-start',
	       'type' => 'section',
	       'title' => __('Footer Styling Options', CORE_THEME_NAME),
	       'subtitle' => __('Styles for footer.', CORE_THEME_NAME),
	       'indent' => true 
   		),
		
		array(
			'id'=>'footer_primary_bg_color',
			'type' => 'color',
			'title' => __('Primary footer background color', CORE_THEME_NAME),
			'subtitle' => __('Choose a background color for top footer.', CORE_THEME_NAME),
			'default' => '#6b9262',
			'transparent'=>false,
			'validate' => 'color',
		),
		
		array(
			'id'=>'footer_primary_alt_color',
			'type' => 'color',
			'title' => __('Primary footer alternate background color', CORE_THEME_NAME),
			'subtitle' => __('Choose a background color for social icons in the footer.', CORE_THEME_NAME),
			'default' => '#5b7d54',
			'transparent'=>false,
			'validate' => 'color',
		),
		
		array(
			'id'=>'footer_primary_headings_color',
			'type' => 'color',
			'title' => __('Primary footer headings color', CORE_THEME_NAME),
			'subtitle' => __('Choose a color for footer headings.', CORE_THEME_NAME),
			'default' => '#ffffff',
			'transparent'=>false,
			'validate' => 'color',
		),
		
		array(
			'id'=>'footer_primary_text_color',
			'type' => 'color',
			'title' => __('Primary footer text color', CORE_THEME_NAME),
			'subtitle' => __('Choose a color for footer text.', CORE_THEME_NAME),
			'default' => '#c0d2bb',
			'transparent'=>false,
			'validate' => 'color',
		),
		
		array(
			'id'=>'footer_primary_link_color',
			'type' => 'color',
			'title' => __('Primary footer link color', CORE_THEME_NAME),
			'subtitle' => __('Choose a color for footer links.', CORE_THEME_NAME),
			'default' => '#ffffff',
			'transparent'=>false,
			'validate' => 'color',
		),
		
		array(
			'id'=>'footer_primary_link_hover_color',
			'type' => 'color',
			'title' => __('Primary footer link hover color', CORE_THEME_NAME),
			'subtitle' => __('Choose a color for footer links hover state.', CORE_THEME_NAME),
			'default' => '#ffffff',
			'transparent'=>false,
			'validate' => 'color',
		),
		
		array(
			'id'=>'footer_secondary_bg_color',
			'type' => 'color',
			'title' => __('Secondary footer background color', CORE_THEME_NAME),
			'subtitle' => __('Choose a background color for bottom footer.', CORE_THEME_NAME),
			'default' => '#282a27',
			'transparent'=>false,
			'validate' => 'color',
		),
		
		array(
			'id'=>'footer_secondary_headings_color',
			'type' => 'color',
			'title' => __('Secondary footer headings color', CORE_THEME_NAME),
			'subtitle' => __('Choose a color for footer bottom headings.', CORE_THEME_NAME),
			'default' => '#ffffff',
			'transparent'=>false,
			'validate' => 'color',
		),
		
		array(
			'id'=>'footer_secondary_text_color',
			'type' => 'color',
			'title' => __('Secondary footer text color', CORE_THEME_NAME),
			'subtitle' => __('Choose a color for footer bottom text.', CORE_THEME_NAME),
			'default' => '#777777',
			'transparent'=>false,
			'validate' => 'color',
		),
		
		array(
			'id'=>'footer_secondary_link_color',
			'type' => 'color',
			'title' => __('Secondary footer link color', CORE_THEME_NAME),
			'subtitle' => __('Choose a color for footer bottom links.', CORE_THEME_NAME),
			'default' => '#aaaaaa',
			'transparent'=>false,
			'validate' => 'color',
		),
		
		array(
			'id'=>'footer_secondary_link_hover_color',
			'type' => 'color',
			'title' => __('Secondary footer link hover color', CORE_THEME_NAME),
			'subtitle' => __('Choose a color for footer bottom links hover state.', CORE_THEME_NAME),
			'default' => '#ffffff',
			'transparent'=>false,
			'validate' => 'color',
		),
		
		array(
			'id'=>'footer_secondary_lines_color',
			'type' => 'color',
			'title' => __('Secondary footer lines and separators color', CORE_THEME_NAME),
			'subtitle' => __('Choose a color for footer lines and separator.', CORE_THEME_NAME),
			'default' => '#43463f',
			'transparent'=>false,
			'validate' => 'color',
		),
		
	)
);

// Blog -------------------------------------------------------------------------- >	
$sections[] = array(
	'icon' => 'el-icon-blogger',
	'icon_class' => 'el-icon-large',
	'title' => __('Blog Setting', CORE_THEME_NAME),
	'submenu' => true,
	'fields' => array(

		
		array(
		    'id'       => 'core_blog_layout',
		    'type'     => 'image_select',
		    'title'    => __('Blog layout', CORE_THEME_NAME), 
		    'subtitle' => __('Select list or grid for the default blog layout.', CORE_THEME_NAME),
		    'options'  => array(
			        '1'      => array(
			            'alt'   => 'Grid layout', 
			            'img'   => ReduxFramework::$_url.'assets/img/blog-grid.png'
			        ),
			        '2'      => array(
			            'alt'   => 'List layout', 
			            'img'   => ReduxFramework::$_url.'assets/img/blog-list.png'
			        ),
   				 ),
    		'default' => '2'
		),
		
		array(
			'id'=>'core_blog_meta',
			'type' => 'switch', 
			'title' => __('Blog meta info', CORE_THEME_NAME),
			'subtitle'=> __('Enable or disable the meta information for blog posts (date, author, comments).', CORE_THEME_NAME),
			'default' => '1',
			'on' => __('On', CORE_THEME_NAME ),
			'off' => __('Off', CORE_THEME_NAME ),
		),
		
		
	)
);

// Header -------------------------------------------------------------------------- >	
$sections[] = array(
	'icon' => 'el-icon-bookmark-empty',
	'icon_class' => 'el-icon-large',
	'title' => __('Header', CORE_THEME_NAME),
	'submenu' => true,
	'fields' => array(
	
		array(
			'id'=>'core_show_header_top',
			'type' => 'switch', 
			'title' => __('Show / Hide top header info', CORE_THEME_NAME),
			'subtitle'=> __('Enable or disable the info located on top of the header site (mail, telephone and top menu).', CORE_THEME_NAME),
			'default' => '1',
			'on' => __('On', CORE_THEME_NAME ),
			'off' => __('Off', CORE_THEME_NAME ),
		),
		array(
			'id'=>'core_show_header_search',
			'type' => 'switch', 
			'title' => __('Show / Hide header search box', CORE_THEME_NAME),
			'subtitle'=> __('Enable or disable the header search box.', CORE_THEME_NAME),
			'default' => '1',
			'on' => __('On', CORE_THEME_NAME ),
			'off' => __('Off', CORE_THEME_NAME ),
		),
		array(
			'id'=>'core_show_header_social',
			'type' => 'switch', 
			'title' => __('Show / Hide header social icons', CORE_THEME_NAME),
			'subtitle'=> __('Enable or disable the header social icons.', CORE_THEME_NAME),
			'default' => '1',
			'on' => __('On', CORE_THEME_NAME ),
			'off' => __('Off', CORE_THEME_NAME ),
		),
		
		array(
			'id'=>'core_show_header_donate',
			'type' => 'switch', 
			'title' => __('Show / Hide header Donate Now button', CORE_THEME_NAME),
			'subtitle'=> __('Enable or disable the header Donate Now button.', CORE_THEME_NAME),
			'default' => '1',
			'on' => __('On', CORE_THEME_NAME ),
			'off' => __('Off', CORE_THEME_NAME ),
		),
		array(
			'id'=>'core_header_donate',
			'type' => 'text', 
			'title' => __('Donate Now button', CORE_THEME_NAME),
			'subtitle' => __('The URL to the header Donate Now button.', CORE_THEME_NAME),
			'default' => '#'
		),
		
		array(
			'id'=>'core_header_phone',
			'type' => 'text', 
			'default' => '+34 234 2353 22',
			'title' => __('Type your phone', CORE_THEME_NAME),
		),
		array(
			'id'=>'core_header_mail',
			'type' => 'text', 
			'default' => 'youremail@info.com',
			'title' => __('Type your email', CORE_THEME_NAME),
		)
		
	)
);

// Footer -------------------------------------------------------------------------- >	
$sections[] = array(
	'icon' => 'el-icon-bookmark',
	'icon_class' => 'el-icon-large',
    'title' => __('Footer', CORE_THEME_NAME),
	'submenu' => true,
	'fields' => array(
		
		array(
			'id'=>'core_footer_copyright',
			'type' => 'textarea', 
			'title' => __('Copyright', CORE_THEME_NAME),
			'subtitle' => __('Type your website copyright.', CORE_THEME_NAME),
			'default' => "Copyright 2014 ©. iCare Template."
		),
		array(
			'id'=>'core_footer_owner',
			'type' => 'text', 
			'default' => 'WordPress theme by Esmet',
			'title' => __('Type additional info for footer (e.g website developed by your company)', CORE_THEME_NAME),
		),
		
		array(
			'id'=>'core_footer_layout',
			'type' => 'switch', 
			'title' => __('Footer layout', CORE_THEME_NAME),
			'subtitle'=> __('Enable or disable the extended footer layout.', CORE_THEME_NAME),
			'default' => '1',
			'on' => __('On', CORE_THEME_NAME ),
			'off' => __('Off', CORE_THEME_NAME ),
		)
			
		
	)
);
// Custom CSS -------------------------------------------------------------------------- >
$sections[] = array(
	'icon' => 'el-icon-css',
	'icon_class' => 'el-icon-large',
    'title' => __('Custom CSS', CORE_THEME_NAME),
	'submenu' => true,
	'fields' => array(
		array(
			'id'=>'core_custom_css',
			'type' => 'ace_editor',
			'title' => __('CSS Code', CORE_THEME_NAME), 
			'subtitle' => __('Paste your custom CSS code here.', CORE_THEME_NAME),
			'mode' => 'css',
            'theme' => 'monokai',
			'desc' => '',
            'default' => "#test{\nmargin: 0 auto;\n}"
		),
	)
);
// SEO -------------------------------------------------------------------------- >	
$sections[] = array(
	'icon' => 'el-icon-bullhorn',
	'icon_class' => 'el-icon-large',
    'title' => __('SEO', CORE_THEME_NAME),
	'submenu' => true,
	'fields' => array(
	
		array(
			'id'=>'core_meta_author',
			'type' => 'textarea',      
			'title' => __('Meta Author', CORE_THEME_NAME), 
			'subtitle' => __('Type your meta author.', CORE_THEME_NAME),
			'desc' => "",
			'default' => ""
		),		
		array(
			'id'=>'core_meta_description',
			'type' => 'textarea',      
			'title' => __('Meta Description', CORE_THEME_NAME), 
			'subtitle' => __('Type your meta description.', CORE_THEME_NAME),
			'desc' => "",
			'default' => ""
		),		
		array(
			'id'=>'core_meta_keyword',
			'type' => 'textarea',      
			'title' => __('Meta Keyword', CORE_THEME_NAME), 
			'subtitle' => __('Type your meta keyword.', CORE_THEME_NAME),
			'desc' => "",
			'default' => ""
		),
		array(
			'id'=>'core_google_analytics',
			'type' => 'textarea',      
			'title' => __('Google Analytics Code', CORE_THEME_NAME), 
			'subtitle' => __('Paste your Google Analytics javascript or other tracking code here. This code will be added before the closing <head> tag.', CORE_THEME_NAME),
			'desc' => "",
			'default' => ""
		)				
	)
	
);


// Social -------------------------------------------------------------------------- >	
$sections[] = array(
	'icon' => 'el-icon-twitter',
	'icon_class' => 'el-icon-large',
    'title' => __('Social Networks', CORE_THEME_NAME),
	'submenu' => true,
	'fields' => array(
		
		array(
			'id'=>'core_facebook',
			'type' => 'text',      
			'title' => __('Facebook', CORE_THEME_NAME), 
			'subtitle' => __('Insert your Facebook fanpage here.', CORE_THEME_NAME),
			'desc' => "",
			'default' => "#"
		),
		array(
			'id'=>'core_twitter',
			'type' => 'text',      
			'title' => __('Twitter', CORE_THEME_NAME), 
			'subtitle' => __('Insert your Twitter URL here.', CORE_THEME_NAME),
			'desc' => "",
			'default' => "#"
		),
		
		array(
			'id'=>'core_linkedin',
			'type' => 'text',      
			'title' => __('Linkedin', CORE_THEME_NAME), 
			'subtitle' => __('Insert your Linkedin URL here.', CORE_THEME_NAME),
			'desc' => "",
			'default' => "#"
		),
		
		array(
			'id'=>'core_flickr',
			'type' => 'text',      
			'title' => __('Flickr', CORE_THEME_NAME), 
			'subtitle' => __('Insert your Flickr URL here.', CORE_THEME_NAME),
			'desc' => "",
			'default' => "#"
		),
		
		array(
			'id'=>'core_youtube',
			'type' => 'text',      
			'title' => __('Youtube', CORE_THEME_NAME), 
			'subtitle' => __('Insert your Youtube URL here.', CORE_THEME_NAME),
			'desc' => "",
			'default' => "#"
		),
		
		array(
			'id'=>'core_rss',
			'type' => 'switch', 
			'title' => __('RSS Icon', CORE_THEME_NAME),
			'subtitle'=> __('Show / Hide RSS icon.', CORE_THEME_NAME),
			'default' => '1',
			'on' => __('On', CORE_THEME_NAME ),
			'off' => __('Off', CORE_THEME_NAME ),
		)			
		
	)
	
);


global $ReduxFramework;
$ReduxFramework = new ReduxFramework($sections, $args, $tabs);

// Function used to retrieve theme option values
if ( ! function_exists('core_option') ) {
	function core_option($id, $fallback = false, $param = false ) {
		global $core_options;
		if ( $fallback == false ) $fallback = '';
		$output = ( isset($core_options[$id]) && $core_options[$id] !== '' ) ? $core_options[$id] : $fallback;
		if ( !empty($core_options[$id]) && $param ) {
			$output = $core_options[$id][$param];
		}
		return $output;
	}
}