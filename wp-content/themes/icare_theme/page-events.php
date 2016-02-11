<?php 
/**template name: Events
 * The events list template file.
 *
 * @package WordPress
 * @subpackage Core Framework
 */

get_header();
?>
		<div class="container">
			
			<?php get_template_part('page-title'); ?>

			<div class="row">
				
				<div class="col-md-8">
					<?php
					
			           	global $wp_query;
						$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
	                 	$wp_query = new WP_Query(array( 'post_type' => 'event', 'order' => 'DESC', 'orderby' => 'date', 'paged' => $paged ));
					 	
					 	if ($wp_query->have_posts()): while ($wp_query->have_posts()): $wp_query->the_post();
						
						$event_location = rwmb_meta('core_event_location');
						$event_date = rwmb_meta('core_event_date');
						
						if ($event_location =='') {
								$event_location = __('Location Not Set', CORE_THEME_NAME);
							} 
						
						if ($event_date == '') {
								$event_date = __('Date Not Set', CORE_THEME_NAME);
							
						 	}
					 	?>
					 
					<div class="event-list">
						
						<?php if (has_post_thumbnail()) { ?>
						<div class="event-thumb">
							<?php the_post_thumbnail('event-thumb'); ?>
						</div> <!-- /.event-thumb -->
						<?php } ?>
						
						<div class="event-content">
							<h4 class="event-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							<?php icare_custom_excerpt(140); ?> 
							<div class="event-location">
								<span><i class="fa fa-map-marker"></i><?php echo $event_location; ?></span>
							</div>
							<div class="event-time">
								<span><i class="fa fa-calendar"></i><?php echo $event_date; ?></span>
							</div>
							<div class="clearfix"></div>
						</div> <!-- /.event-content -->
					</div> <!-- /.event-list -->
					<?php 
						endwhile;
	                    endif;
	                    wp_reset_postdata(); 
                    ?>
					
					<?php icare_paging_nav(); ?>
					
				</div> <!-- /.col-md-8 -->

				<?php
					get_sidebar();
				?>

			</div> <!-- /.row -->

		</div> <!-- /.container -->

<?php
	get_footer();
?>		
