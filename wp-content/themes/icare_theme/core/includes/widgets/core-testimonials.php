<?php

/*
Plugin Name: Core Testimonials
Plugin URI: http://www.esmeth.com
Description: A simple widget to displays testimonials with thumbs.
Version: 1.1
Author: plugthemes
Author URI: http://www.plugtheme.co
*/

class icare_testimonials_widget extends WP_Widget {
	
	public function __construct() {
		parent::__construct(
		'icare_testimonials_widget',
		__('Core Testimonials', CORE_THEME_NAME),
		array('description' => __('Displays testimonials with thumbs.', CORE_THEME_NAME))
		);
	}
	
	public function form($instance) {
		// Outputs the Options Form on Admin
		$defaults = array('title' => __('Testimonials', CORE_THEME_NAME ), 'number' => 4);
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
		
		// Get the widget ID for multiples instances
		$widget_class = $args['widget_id'];

		echo $before_widget;
		
		?>
		<div class="testimonials-wrapper">
		
		<?php if($title) {
			echo $before_title . $title . $after_title;
		} ?>

		<?php
			$args = array(
			'post_type' => 'testimonial',
			'post_per_page' => $number,
			'showposts' => $number,
		    'order'   => 'DESC'
		    //'orderby' => 'meta_value'
		 );
			
		$testi_query = new WP_Query($args);
		global $post; ?>
			
			<ul class="testi-tabs clearfix">
				
				<?php while($testi_query -> have_posts()): $testi_query -> the_post();
				$class_active = ''; 
				$tab_number = $testi_query->current_post + 1; 
				if ($tab_number < 2) {
					$class_active = 'active';
				} else {
					$class_active = '';
				}?>
				<li class="<?php echo $class_active; ?>">
					<a href="#testi-content-<?php echo $tab_number.'_'.$widget_class; ?>">
						<?php if (has_post_thumbnail()) {
							the_post_thumbnail('widget-thumb-alternate');
						} ?>
					</a>
				</li>
				<?php endwhile;?>
								
			</ul>
			
			<div class="testi-wrapper">
				<?php while($testi_query -> have_posts()): $testi_query -> the_post(); 
					$class_active = ''; 
					$tab_number = $testi_query->current_post + 1; 
					if ($tab_number < 2) {
						$class_active = 'active';
					} else {
						$class_active = '';
					}
					$icare_testi_author = rwmb_meta('core_testi_author');
					$icare_testi_position = rwmb_meta('core_testi_position');  ?>
					<div id="testi-content-<?php echo $tab_number.'_'.$widget_class; ?>" class="testi-content <?php echo $class_active; ?>">
						<div class="testi-author">
							<h6><?php if (!empty($icare_testi_author)) echo $icare_testi_author.' '; ?><span><?php if (!empty($icare_testi_position)) echo ' '.$icare_testi_position; ?></span></h6>
						</div>
						<?php the_content(); ?>
					</div>
				<?php endwhile;?>
			</div>
			</div>
			
		<?php
		wp_reset_postdata(); 
		echo $after_widget;
	}
}

// Add Widget
if (!function_exists('icare_testimonials_widget_init')) {
	function icare_testimonials_widget_init() {
		register_widget('icare_testimonials_widget');
	}
}

add_action('widgets_init', 'icare_testimonials_widget_init');
?>