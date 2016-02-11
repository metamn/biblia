<?php
/*
Plugin Name: Core Flickr Widget
Plugin URI: http://www.esmeth.com
Description: A simple widget to display flickr feeds.
Version: 1.1
Author: plugthemes
Author URI: http://www.plugtheme.co
*/

class icare_flickr_widget extends WP_Widget { 
	
	public function __construct() {
		parent::__construct(
		'icare_flickr_widget',
		__('Core Flickr Widget', CORE_THEME_NAME),
		array('description' => __('Displays a flickr feed.', CORE_THEME_NAME))
		);
	}
	
	// Widget Output
	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$username = $instance['username'];
		$pics = $instance['pics'];
		
		// ------
		echo $before_widget;
		echo $before_title . $title . $after_title;
		
		echo '<div class="gallery-wrapper clearfix">';
		echo '<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count='.$pics.'&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user='.$username.'"></script>';
		echo '</div>';

		echo $after_widget;
		// ------
	}
	
	// Update
	function update( $new_instance, $old_instance ) {  
		$instance = $old_instance; 
		
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['username'] = strip_tags( $new_instance['username'] );
		$instance['pics'] = strip_tags( $new_instance['pics'] );

		return $instance;
	}
	
	// Backend Form
	function form($instance) {
		
		$defaults = array( 'title' => 'Flickr Widget', 'pics' => '6', 'username' => '52617155@N08' ); // Default Values
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
        
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Widget Title:</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
        <p>
			<label for="<?php echo $this->get_field_id( 'username' ); ?>">Flickr ID:</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'username' ); ?>" name="<?php echo $this->get_field_name( 'username' ); ?>" value="<?php echo $instance['username']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'pics' ); ?>">Number of Photos:</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'pics' ); ?>" name="<?php echo $this->get_field_name( 'pics' ); ?>" value="<?php echo $instance['pics']; ?>" />
		</p>
		
    <?php }
}


if (!function_exists('icare_flickr_widget_init')) {
	function icare_flickr_widget_init() {
		register_widget('icare_flickr_widget');
	}
}
add_action('widgets_init', 'icare_flickr_widget_init');

?>
