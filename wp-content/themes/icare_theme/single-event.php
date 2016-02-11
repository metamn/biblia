<?php 
/** Single Envent
 * List single envent posts.
 *
 * @package WordPress
 * @subpackage Core Framework
 */

get_header();
?>
		<div class="container">
			
			<?php
			// Include a template for page headings showint title and back to home button 
			get_template_part('page-title'); ?>

			<div class="row">
				
				<div class="col-md-8">
					<?php if(have_posts()) : while (have_posts()) : the_post();
					
					// Get all the metaboxes values 
					$event_date = rwmb_meta('core_event_date');
					$event_start_time = rwmb_meta('core_event_start_time');
					$event_end_time = rwmb_meta('core_event_end_time');
					$event_phone = rwmb_meta('core_event_phone');
					$event_mail = rwmb_meta('core_event_email');
					$event_website = rwmb_meta('core_event_website');
					
					$event_date_details = explode(' ', $event_date);
					
					// Setup default arguments for google map
					$event_map_options = array(
							 'type'         => 'map',
							 'width'        => '100%', // Map width, default is 640px. You can use '%' or 'px'
							 'height'       => '100%', // Map height, default is 480px. You can use '%' or 'px'
							 'zoom'         => 14,  // Map zoom, default is the value set in admin, and if it's omitted - 14
							 'marker'       => true, // Display marker? Default is 'true',
							 'marker_title' => '', // Marker title when hover
							 'info_window'  => '', // Info window content, can be anything. HTML allowed.
						);
					?>
					<div class="event-single">
						<?php if (has_post_thumbnail()) { ?>
						<div class="event-image">
							<?php the_post_thumbnail('event-single-image'); ?>
							<?php if(!empty($event_date)) { ?>
								<div class="img-date">
									<span class="month"><?php echo substr($event_date_details[1], 0, 3); ?></span>
									<span class="day"><?php echo $event_date_details[0]; ?></span>
									<span class="year"><?php echo $event_date_details[2]; ?></span>
								</div> <!-- /.img-date -->
							<?php } ?>
						</div> <!-- /.event-image -->
						<?php } ?>
						<div class="event-content">
							<h3><?php the_title(); ?></h3>
							<?php the_content(); ?>
							<div class="space-s"></div>
							<div class="row">
								<div class="col-md-6 col-sm-6">
									<div class="event-map" style="height: 260px;">
										<?php 
											echo rwmb_meta( 'core_event_address', $event_map_options ); 
										?>
									</div> <!-- /.event-map -->
								</div> <!-- /.col-md-6 -->
								<div class="col-md-6 col-sm-6">
									<ul class="event-info">
										<li><span><?php _e('Date:', CORE_THEME_NAME); ?></span>
											<?php 
												if (!empty($event_date)) {
													 echo $event_date; 
												} 
											?>
										</li>
										<li><span><?php _e('Time:', CORE_THEME_NAME); ?></span>
											<?php 
												if(!empty($event_start_time) && !empty($event_end_time)) {
													 echo $event_start_time. ' - ' .$event_end_time; 
												}
											?>
										</li>
										<li><span><?php _e('Phone:', CORE_THEME_NAME); ?></span>
											<?php
												if(!empty($event_phone)) {
													echo $event_phone;
												}
											?>
										</li>
										<li><span><?php _e('Email:', CORE_THEME_NAME); ?></span>
											<?php
												if (!empty($event_mail)) { ?>
													<a href="mailto:<?php echo $event_mail; ?>"><?php echo $event_mail; ?></a>
											<?php } ?> 
										</li>
											
										<li><span><?php _e('Website:', CORE_THEME_NAME); ?>:</span>
											<?php 
												if (!empty($event_website)) { ?>
													<a href="<?php echo 'http://'.$event_website; ?>"><?php echo $event_website; ?></a>
											<?php } ?> 
										</li>
									</ul>
								</div> <!-- /.col-md-6 -->
							</div> <!-- /.row -->
						</div> <!-- /.event-content -->
					</div> <!-- /.event-single -->
					
					<?php icare_post_nav(); ?>
					
					<?php endwhile; else : ?>
                    		<p><?php _e( 'No posts found.', CORE_THEME_NAME ); ?></p>
                    <?php endif; ?>
					
				</div> <!-- /.col-md-8 -->

				<?php
					// Gets the default sidebar
					get_sidebar();
				?>

			</div> <!-- /.row -->

		</div> <!-- /.container -->

<?php
	get_footer();
?>		
