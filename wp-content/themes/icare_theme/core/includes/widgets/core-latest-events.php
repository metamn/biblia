<?php

/*
Plugin Name: Core Latest Events
Plugin URI: http://www.esmeth.com
Description: A simple but powerful widget to display latest events.
Version: 1.1
Author: plugthemes
Author URI: http://www.plugtheme.co
*/

class icare_latest_events_widget extends WP_Widget {
	
	public function __construct() {
		parent::__construct(
		'icare_latest_events',
		__('Core Latest Events', CORE_THEME_NAME),
		array('description' => __('Displays latest events.', CORE_THEME_NAME))
		);
	}
	
	public function form($instance) {
		// Outputs the Options Form on Admin
		$defaults = array('title' => __('Upcoming Events', CORE_THEME_NAME ), 'number' => 3);
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		
		
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', CORE_THEME_NAME ); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Numbers of item to show:', CORE_THEME_NAME ); ?></label>
			<input type="text"  class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" value="<?php echo $instance['number']; ?>" />
		</p>
		
	<?php
	}

	public function update($new_instance, $old_instance) {
		// Process Widget Options to be Saved
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		
		
		return $instance;
	}
	public function widget($args, $instance) {
		// Outputs Content of the Widget
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$number = $instance['number'];

		echo $before_widget;
		
		if($title) {
			echo $before_title . $title . $after_title;
		} ?>
		<div class="events-sidebar">
			
		<ul>
			<?php
				$args = array(
				'post_type' => 'event',
				'posts_per_page' => $number,
		        'order'   => 'ASC',
		        'orderby' => 'meta_value_num',
		        'meta_key' => 'core_event_date'
		 	);
			
			$latest_events = new WP_Query($args);
			
			if ($latest_events->have_posts()):
				
			global $post;
			 	
			while($latest_events->have_posts()): $latest_events->the_post();
				
			$icare_event_date = rwmb_meta('core_event_date');
				 
			?>
			<li class="event-item">
				<?php if (has_post_thumbnail()) { ?>
				<div class="event-thumb">
					<?php the_post_thumbnail('widget-thumb'); ?>
				</div>
				<?php } ?>
				<div class="event-content">
					<h5 class="event-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
					<p class="event-meta"><?php echo $icare_event_date; ?></p>
				</div>
			</li>
			<?php endwhile; endif; ?>
		</ul>
		</div>
		
		<?php
		wp_reset_postdata(); 
		echo $after_widget;
	}
}

// Add Widget
if (!function_exists('icare_latest_events_widget_init')) {
	function icare_latest_events_widget_init() {
		register_widget('icare_latest_events_widget');
	}
}

add_action('widgets_init', 'icare_latest_events_widget_init');
?>