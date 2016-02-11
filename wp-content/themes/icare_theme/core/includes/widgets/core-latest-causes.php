<?php

/*
Plugin Name: Core Recent Causes
Plugin URI: http://www.esmeth.com
Description: A simple but powerful widget to display recent causes.
Version: 1.0
Author: plugthemes
Author URI: http://www.plugtheme.co
*/

class icare_recent_causes_widget extends WP_Widget {
	
	public function __construct() {
		parent::__construct(
		'icare_recent_causes',
		__('Core Recent Causes', CORE_THEME_NAME),
		array('description' => __('Displays recent causes.', CORE_THEME_NAME))
		);
	}
	
	public function form($instance) {
		// Outputs the Options Form on Admin
		$defaults = array('title' => __('Recent Causes', CORE_THEME_NAME ), 'number' => 3);
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
		<div class="causes-sidebar">
			
		<ul>
			<?php
				$args = array(
				'post_type' => 'cause',
				'posts_per_page' => $number,
				'showposts' => $number,
		        'order'   => 'DESC'
		 	);
			
			$latest_causes = new WP_Query($args);
			
			if ($latest_causes->have_posts()):
				
			global $post;
			 	
			while($latest_causes->have_posts()): $latest_causes->the_post();
				 
			?>
			<li class="cause-item">
				<?php if (has_post_thumbnail()) { ?>
				<div class="cause-thumb">
					<?php the_post_thumbnail('widget-thumb'); ?>
				</div>
				<?php } ?>
				<div class="cause-content">
					<h5 class="cause-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
					<p
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
if (!function_exists('icare_recent_causes_widget_init')) {
	function icare_recent_causes_widget_init() {
		register_widget('icare_recent_causes_widget');
	}
}

add_action('widgets_init', 'icare_recent_causes_widget_init');
?>