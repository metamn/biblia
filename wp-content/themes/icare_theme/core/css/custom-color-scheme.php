<?php header("Content-type: text/css");

$absolute_path = __FILE__;
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0];
require_once( $path_to_wp.'/wp-load.php' );

// General Styles Values
$links_color = core_option('link_color');
$accent_color = core_option('accent_color');
$button_color = core_option('button_color');
$button_hover_color = core_option('button_hover_color');
$button_text_color = core_option('button_text_color');

// Header Styles Values
$header_bg_color = core_option('header_bg_color');
$header_alt_color = core_option('header_alt_color');
$header_sep_color = core_option('header_sep_color');
$header_links_color = core_option('header_link_color');
$header_links_hover_color = core_option('header_link_hover_color');

// Main Navigation Styles Values
$main_nav_bg_color = core_option('main_nav_bg_color');
$main_nav_sep_color = core_option('main_nav_sep_color');
$main_nav_sub_color = core_option('main_nav_sub_color');
$main_nav_sub_sep_color = core_option('main_nav_sub_sep_color');
$main_nav_link_color = core_option('main_nav_link_color');
$main_nav_link_hover_color = core_option('main_nav_link_hover_color');
$main_nav_link_active_color = core_option('main_nav_link_active_color');


// Footer Styles Values
$footer_primary_bg_color = core_option('footer_primary_bg_color');
$footer_primary_rgba = icare_hex2rgba($footer_primary_bg_color, 0.95);

$footer_primary_alt_color = core_option('footer_primary_alt_color');
$footer_primary_headings_color = core_option('footer_primary_headings_color');
$footer_primary_text_color = core_option('footer_primary_text_color');
$footer_primary_link_color = core_option('footer_primary_link_color');
$footer_primary_link_hover_color = core_option('footer_primary_link_hover_color');

$footer_secondary_bg_color = core_option('footer_secondary_bg_color');
$footer_secondary_rgba = icare_hex2rgba($footer_secondary_bg_color, 0.95);

$footer_secondary_headings_color = core_option('footer_secondary_headings_color');
$footer_secondary_text_color = core_option('footer_secondary_text_color');
$footer_secondary_link_color = core_option('footer_secondary_link_color');
$footer_secondary_link_hover_color = core_option('footer_secondary_link_hover_color');
$footer_secondary_lines_color = core_option('footer_secondary_lines_color');


// General Styles

echo '
/* CUSTOM GENERAL STYLES */
a,
a.load-more,
a.go-next, 
a.go-prev {
	color:'.$links_color.';
}

.events-sidebar ul li.event-item .event-content h5 a:hover, 
.causes-sidebar ul li.cause-item .cause-content h5 a:hover {
	color:'.$links_color.';
}

.paging-navigation .page-numbers.current,
.paging-navigation .page-numbers:hover {
	color: #fff;
	background-color:'.$links_color.';
}
a:hover,
a:active,
a:focus {
	color: '.$accent_color.';
}


.responsive-menu a.toggle-menu {
	background-color: '.$button_color.';
}

a.load-more:hover,
a.go-next:hover, 
a.go-prev:hover {
	color:'.$links_color.';
}

.flex-caption a {
	color:'.$button_color.';
}

.member-content h3 a:hover,
.event-list .event-content h4 a:hover,
.cause-grid .cause-content h4.cause-title a:hover,
.cause-list .cause-content h4.cause-title a:hover,
.post-content h4.post-title a:hover {
	color:'.$links_color.';
}

.sticky {
	border: 2px solid '.$links_color.';
}

button,
input[type="button"],
input[type="submit"],
.main-button,
a.flex-prev, 
a.flex-next,
a.main-btn {
	color:'.$button_text_color.';
	background-color:'.$button_color.';
}
a.main-btn {
	color:'.$button_text_color.'!important;
}

button:hover,
input[type="button"]:hover,
input[type="submit"]:hover,
.main-btn:hover,
a.flex-prev:hover, 
a.flex-next:hover,
a.main-btn:hover {
	background-color:'.$button_hover_color.';
}

.cause-holder .progress .progress-bar,
.cause-holder-list .progress .progress-bar {
	background-color:'.$accent_color.';
}

.su-tabs-style-default .su-tabs-nav span,
.su-spoiler-style-default .su-spoiler-title {
	background-color:'.$accent_color.'!important;
}

/* HEADER STYLES */
.site-header a {
	color:'.$header_links_color.';
}

.site-header a:hover,
.site-header .current_page_item a {
	color:'.$header_links_hover_color.';
}

.site-header {
	background-color:'.$header_bg_color.';
	color:'.$header_links_color.';
}

.top-header {
	border-bottom: 1px solid '.$header_sep_color.';
}

.top-header .header-info-right ul li:not(:last-child):after, .top-header .header-info-left ul li:not(:last-child):after {
	color:'.$header_sep_color.';
}

.menu-wrapper {
	background-color:transparent; //$header_alt_color
}

.main-header .search-form input[type="text"] {
	border-color:'.$header_sep_color.';
	color:'.$header_links_color.'!important;
	background-color:'.$header_bg_color.';
}

.main-header .social-icon-top ul li a {
	background-color:'.$header_alt_color.';
	color: #fff;
}

.main-header .social-icon-top ul li a:hover {
	color:'.$accent_color.';
}

/* MAIN NAVIGATION STYLES */

.menu-wrapper .inner-menu {
	background-color:'.$main_nav_bg_color.';
}

.menu-wrapper .main-menu ul.sf-menu > li {
	border-right: 1px solid '.$main_nav_sep_color.';
}

.menu-wrapper .main-menu ul.sf-menu > li a {
	color:'.$main_nav_link_color.';
}

.menu-wrapper .main-menu ul.sf-menu > li a:hover {
	color:'.$main_nav_link_hover_color.';
}

.menu-wrapper .main-menu ul.sf-menu > li.current-menu-item a {
	color:'.$main_nav_link_active_color.';
}

.menu-wrapper .main-menu ul.sf-menu > li ul {
	background-color:'.$main_nav_sub_color.';
}

.menu-wrapper .main-menu ul.sf-menu > li ul li {
	border-bottom: 1px solid '.$main_nav_sub_sep_color.';
}

.menu-wrapper .main-menu ul.sf-menu > li ul li.current-menu-item a {
	color:'.$main_nav_link_active_color.';
}

/* CONTENT STYLES */

.su-service-title i {
	color: '.$links_color.'!important;
}

/* FOOTER STYLES */

.top-footer {
	background-color:'.$footer_primary_rgba.';
	color:'.$footer_primary_text_color.';
}

.top-footer .footer-widget-title {
	color:'.$footer_primary_headings_color.';
}

ul.footer-social li a {
	background-color:'.$footer_primary_alt_color.';
}

.top-footer a {
	color:'.$footer_primary_link_color.';
}

.top-footer a:hover {
	color:'.$footer_primary_link_hover_color.';
}

.main-footer {
	background-color:'.$footer_secondary_rgba.';
	color:'.$footer_secondary_text_color.';
}

.main-footer .footer-widget-title {
	color:'.$footer_secondary_headings_color.';
}

.main-footer a {
	color:'.$footer_secondary_link_color.';
}

.main-footer a:hover {
	color:'.$footer_secondary_link_hover_color.';
}

.main-footer .copyright {
	border-top: 1px solid '.$footer_secondary_lines_color.';
}

';



 ?>