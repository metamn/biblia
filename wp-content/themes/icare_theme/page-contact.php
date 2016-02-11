<?php
/** template name: Contact
 * The default page template file.
 * 
 * @package WordPress
 * @subpackage Core Framework
 */

get_header(); ?>

		<div class="container">
			
			<?php get_template_part('page-title'); ?>

			<div class="row">
				
				<div class="col-md-8 contact-page">
					<div id="map-canvas" class="contact-map" style="height: 380px;"></div>
					 <?php
                    	$lat = core_option('core_map_lat_info');
						$lon = core_option('core_map_lon_info');
						$zoom = core_option('core_map_zoom_info');
						
						icare_print_map($lat, $lon, $zoom);
		    		 ?>
					<div id="contact" class="contactForm clearfix">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	                        
	                        <?php the_content(); ?>
	                    
	                </div>
                    <?php endwhile; else : ?>
                    	<p><?php _e( 'No posts found.', CORE_THEME_NAME ); ?></p>
                    <?php endif ?>
               
				</div> <!-- /.col-md-8 -->

				<?php
					get_sidebar();
				?>

			</div> <!-- /.row -->

		</div> <!-- /.container -->

<?php
	get_footer();
?>		
