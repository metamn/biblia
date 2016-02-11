<?php 
/**template name: Home Page
 * The default template homepage file.
 *
 * @package WordPress
 * @subpackage Core Framework
 */

get_header();


// Get paypal parameters
if (core_option('core_paypal_sandbox_mode') == '1') {
	$icare_paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
	} else {
	$icare_paypal_url = 'https://www.paypal.com/cgi-bin/webscr';
}
$icare_paypal_email         = core_option('core_paypal_email');
//$paypal_thankyou      = core_option('core_paypal_return_page'); 
$icare_paypallogo           = core_option('core_paypal_custom_logo'); 
$icare_paypal_currency_code = core_option('core_paypal_currency_code');
$icare_currency_sign        = core_option('core_paypal_currency_sign');

?>
		<div class="container">
			
			<div class="top-content">
				<div class="row">
					<div class="col-md-12">
			            <div class="u-cause-wrapper hidden-xs">
			               
			                <div class="u-cause clearfix">                        
			                    <dl class="inner-carousel clearfix">
			                    	
			                    	<?php
			                    	
			                    	$cause_category_id = core_option('core_urgent_causes_cat');
									
			                    	$wp_query = new WP_Query(array( 'post_type' => 'cause', 'order' => 'DESC', 'orderby' => 'date', 'posts_per_page' => 4, 'tax_query' => array ( array('taxonomy' => 'cause-categories','field' => 'id','terms' => $cause_category_id))));
									if ($wp_query->have_posts()): while ($wp_query->have_posts()): $wp_query->the_post(); ?>
				                    	
				                    	<dt></dt>
				                        <dd><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> - <?php icare_custom_excerpt(50); ?></dd>
				                    
				                    <?php 
										endwhile;
						                endif;
						                wp_reset_postdata(); 
               		 				?>
               		 				
			                    </dl> <!-- /.inner-carousel -->
			                </div> <!-- /.u-cause -->
			            </div> <!-- /.u-cause-wrapper -->
					</div> <!-- /.col-md-12 -->
				</div> <!-- /.row -->

				<div class="slider-wrapper">
					<div class="row">
						<?php if ( is_active_sidebar( 'core-home-area-1' ) ) : ?>
						<div class="col-md-4">
							<div class="subscribe-form home-top-widget">
								<?php dynamic_sidebar( 'core-home-area-1' ); ?>
							</div>
						</div> <!-- /.col-md-4 -->
						<?php endif; ?>
						<div class="col-md-8">
							<?php get_template_part('slider'); ?>
						</div> <!-- /.col-md-8 -->
					</div> <!-- /.row -->
				</div> <!-- /.slider-wrapper -->
			</div> <!-- /.top-content -->

			<div class="services box-content">
				
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
				
					<?php the_content(); ?>
					
				
				
				 <?php endwhile; else : ?>
                    <p><?php _e( 'No posts found.', CORE_THEME_NAME ); ?></p>
                 <?php endif ?>
			</div> <!-- /.services -->

			<div class="last-causes box-content" style="display:none;">
				<div class="row">
					<div class="col-md-12">
						<h4 class="widget-title"><span><?php _e('Last Cause List', CORE_THEME_NAME); ?></span></h4>
					</div> <!-- /.col-md-12 -->
				</div> <!-- /.row -->
				<div class="row">
					<?php
				
				        $wp_query = new WP_Query(array( 'post_type' => 'cause', 'order' => 'DESC', 'orderby' => 'date', 'posts_per_page' => 4 ));
						if ($wp_query->have_posts()): while ($wp_query->have_posts()): $wp_query->the_post();
							
						// Get donations value from custom fields
						$percents = 0;
						$cause_donation_goal = rwmb_meta('core_cause_goal');
						$cause_current_donations = (get_post_meta( get_the_id(), 'core_cause_collected', true )) ? get_post_meta( get_the_id(), 'core_cause_collected', true ) : 0;          
						$custom_paypal_email = rwmb_meta('core_cause_paypal');
						
						// If not empty cause specific paypal email then use it instead
						if ( !empty($custom_paypal_email) ) {
							$paypal_email = $custom_paypal_email;
						}
						
						// If not paypal return page specified we'll use the current page instead
						//if (empty($paypal_thankyou)) {
							//$paypal_thankyou = get_the_ID();
						//}
						
						if ( $cause_donation_goal > 0 ) {
							// Let's do a simple math to discover correct percentage value
							$percents = number_format( ( $cause_current_donations / $cause_donation_goal ) * 100, 0 );
						}
						
					?>
					<div class="col-md-3 col-sm-6 cause-grid">
						<?php 
						if (has_post_thumbnail()) { ?>
							<div class="cause-thumb">
								<?php the_post_thumbnail('cause-thumb-4col'); ?>
								<div class="cause-hover">
									<div class="cause-holder clearfix">
										<div class="progress">
											<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $percents; ?>" aria-valuemin="0" aria-valuemax="100" style="<?php echo 'width:'.$percents.'%';?>"></div>
										</div>
										<span class="raised pull-left"><?php echo __('Raised: ', CORE_THEME_NAME).$icare_currency_sign.number_format($cause_current_donations, 2, ',', '.'); ?></span>
										<span class="goal pull-right"><?php echo __('Goal: ', CORE_THEME_NAME).$icare_currency_sign.number_format($cause_donation_goal, 2, ',', '.'); ?></span>
									</div>
								</div>
							</div> <!-- /.cause-thumb -->
						<?php } ?>
						<div class="cause-content fix-box-height">
						<h4 class="cause-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						<p><?php icare_custom_excerpt(60); ?></p>
							<div class="donation-button">
								<form action="<?php echo $icare_paypal_url; ?>" method="post">
									<input type="hidden" name="cmd" value="_donations">
									<input type="hidden" name="business" value="<?php echo $icare_paypal_email; ?>">
									<input type="hidden" name="item_name" value="<?php echo __('Donate to the '.get_the_title(). ' cause', CORE_THEME_NAME); ?>">
									<input type="hidden" name="no_shipping" value="0">
									<input type="hidden" name="no_note" value="1">
									<input type="hidden" name="currency_code" value="<?php echo $icare_paypal_currency_code; ?>">
									<input type="hidden" name="return" value="<?php echo get_the_permalink(get_the_ID()); ?>">
									<input type="hidden" name="notify_url" value="<?php echo get_stylesheet_directory_uri(); ?>/paypal_ipn.php">
									<input type="hidden" name="image_url" value="<?php echo $icare_paypallogo; ?>">
									<input type="hidden" name="custom" value="<?php echo get_the_ID(); ?>">
									
									<div class="input-append">
										<input type="submit" class="btn main-btn" value="<?php _e('Donate Now', CORE_THEME_NAME); ?>">
									</div>
								</form>
							</div>
						</div> <!-- /.cause-content -->
					</div> <!-- /.col-md-3 -->
					
					<?php 
						endwhile;
		                endif;
		                wp_reset_postdata(); 
               		 ?>

				</div> <!-- /.row -->
			</div> <!-- /.last-causes -->
			
			<div class="row">
				<div class="col-md-8">
					<div class="box-content">
						<div class="row">
							<div class="col-md-12">
								<h4 class="widget-title"><span><?php _e('Latest News', CORE_THEME_NAME); ?></span></h4>
							</div>
						</div>
						<div class="row">
							<?php
								$wp_query = new WP_Query(array( 'post_type' => 'post', 'order' => 'DESC', 'orderby' => 'date', 'posts_per_page' => 2 ));
								if ($wp_query->have_posts()): while ($wp_query->have_posts()): $wp_query->the_post(); ?>
							<div class="col-md-6 col-sm-6 post-grid">
								<?php if (has_post_thumbnail()) { ?>
								<div class="post-thumb">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail(); ?>
									</a>
								</div> <!-- /.post-thumb -->
								<?php } ?>
								<div class="post-content">
									<p class="post-meta"><?php the_time('F j, Y'); ?><?php _e(' with ', CORE_THEME_NAME ); ?><?php comments_popup_link('No comments', '1 comment', '% comments', 'comments-link', 'Comments are closed'); ?></p>
									<h4 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
									<a href="<?php the_permalink(); ?>" class="read-more"><?php _e('Continue Reading &rarr;', CORE_THEME_NAME); ?></a>
								</div> <!-- /.post-content -->
							</div> <!-- /.post-grid -->
							
							<?php 
								endwhile;
				                endif;
				                wp_reset_postdata(); 
               		 		?>
							
						</div> <!-- /.row -->
					</div> <!-- /.box-content -->
					<?php if ( is_active_sidebar( 'core-home-area-2' ) ) : ?>
					<div class="box-content">
						<?php dynamic_sidebar( 'core-home-area-2' ); ?>
					</div> <!-- /.box-content -->
					<?php endif; ?>
				</div> <!-- /.col-md-8 -->
				<?php
					get_sidebar();
				?>
			</div> <!-- /.row -->

		</div> <!-- /.container -->

<?php
	get_footer();
?>		
