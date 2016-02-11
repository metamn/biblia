<?php 
/**template name: Causes Sidebar
 * The causes sidebar template file.
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
			
			<?php get_template_part('page-title'); ?>

			<div class="row">
				
				<div class="col-md-8">
					
					<?php 
						
						get_template_part('cause-search');
					
				
						global $wp_query;
						$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
				        $wp_query = new WP_Query(array( 'post_type' => 'cause', 'order' => 'DESC', 'orderby' => 'date', 'paged' => $paged ));
						if ($wp_query->have_posts()): while ($wp_query->have_posts()): $wp_query->the_post();
							
						// Get donations value from custom fields
						$percents = 0;
						$cause_donation_goal = rwmb_meta('core_cause_goal');
						$cause_current_donations = (get_post_meta( get_the_id(), 'core_cause_collected', true )) ? get_post_meta( get_the_id(), 'core_cause_collected', true ) : 0;
						//$cause_current_donations = (float)rwmb_meta('core_cause_collected') ? (float)rwmb_meta('core_cause_collected') : 0;           
						$custom_paypal_email = rwmb_meta('core_cause_paypal');
						
						
						      
						// If not empty cause specific paypal email then use it instead
						if ( !empty($custom_paypal_email) ) {
							$icare_paypal_email = $custom_paypal_email;
						}
						
						// If not paypal return page specified we'll use the current page instead
						//if (empty($paypal_thankyou)) {
							//$paypal_thankyou = get_the_permalink(get_the_ID());
						//}
						
						if ( $cause_donation_goal > 0 ) {
							// Let's do a simple math to discover correct percentage value
							$percents = number_format( ( $cause_current_donations / $cause_donation_goal ) * 100, 0 );
						}
						
					?>
					
					<div class="cause-list">
						<?php
							if (has_post_thumbnail()) { ?>
						<div class="cause-thumb">
							<?php the_post_thumbnail('cause-thumb-sidebar'); ?>
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
									<input type="submit" class="main-btn" value="<?php _e('Donate Now', CORE_THEME_NAME); ?>">
								</div>
							</form>
						</div> <!-- /.cause-thumb -->
						<?php } ?>
						<div class="cause-content">
							<div class="cause-holder-list clearfix">
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $percents; ?>" aria-valuemin="0" aria-valuemax="100" style="<?php echo 'width:'.$percents.'%';?>"></div>
								</div>
								<span class="raised pull-left"><?php echo __('Raised: ', CORE_THEME_NAME).$icare_currency_sign.number_format($cause_current_donations, 2, ',', '.'); ?></span>
										<span class="goal pull-right"><?php echo __('Goal: ', CORE_THEME_NAME).$icare_currency_sign.number_format($cause_donation_goal, 2, ',', '.'); ?></span>
							</div>
							<h4 class="cause-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							<p><?php icare_custom_excerpt(50); ?></p> 
							<a href="<?php the_permalink(); ?>" class="read-more"><?php _e('Read More &rarr;', CORE_THEME_NAME); ?></a>
						</div> <!-- /.cause-content -->
					</div> <!-- /.cause-list -->
					
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
