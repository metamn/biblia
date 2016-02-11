<?php 
/** Single Staff
 * List single staff posts.
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
					
					<?php if(have_posts()) : while (have_posts()) : the_post();
					
						$member_position = rwmb_meta('core_member_position');
						$member_twitter = rwmb_meta('core_member_twitter');
						$member_facebook = rwmb_meta('core_member_facebook');
						$member_googleplus = rwmb_meta('core_member_googleplus');
						$member_linkedin = rwmb_meta('core_member_linkedin');
						$member_pinterest = rwmb_meta('core_member_pinterest');
					
					
					?>
					<div class="member-single">
						<?php if (has_post_thumbnail()) { ?>
						<div class="member-image">
							<?php the_post_thumbnail('member-single-image'); ?>
						</div> <!-- /.member-image -->
						<?php } ?>
						<div class="member-content">
							<div class="member-header">
								<div class="pull-left">
									<h3><?php the_title(); ?></h3>
									<span class="role">
										<?php
											if (!empty($member_position)) {
												echo $member_position;
											}
										?>
									</span>
								</div>
								<ul class="social pull-right">
									<?php if (!empty($member_twitter)) { ?>
										<li><a href="<?php echo $member_twitter; ?>" class="fa fa-twitter"></a></li>
									<?php } ?>
									<?php if (!empty($member_facebook)) { ?>
										<li><a href="<?php echo $member_twitter; ?>" class="fa fa-facebook"></a></li>
									<?php } ?>
									<?php if (!empty($member_googleplus)) { ?>
										<li><a href="<?php echo $member_googleplus; ?>" class="fa fa-google-plus"></a></li>
									<?php } ?>
									<?php if (!empty($member_linkedin)) { ?>
										<li><a href="<?php echo $member_linkedin; ?>" class="fa fa-linkedin"></a></li>
									<?php } ?>
									<?php if (!empty($member_pinterest)) { ?>
										<li><a href="<?php echo $member_pinterest; ?>" class="fa fa-pinterest"></a></li>
									<?php } ?>
								</ul>
								<div class="clearfix"></div>
							</div>
							<?php the_content(); ?>
						</div>
					</div> <!-- /.member-single -->
					
					<?php icare_post_nav(); ?>
					
					<?php endwhile; else : ?>
                    		<p><?php _e( 'No posts found.', CORE_THEME_NAME ); ?></p>
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