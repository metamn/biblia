<?php 
/**template name: Staff 3 Cols
 * The staff 3cols template file.
 *
 * @package WordPress
 * @subpackage Core Framework
 */

get_header();
?>
		<div class="container">
			
			<?php get_template_part('page-title'); ?>

			<div class="row">
				<?php
					global $wp_query;
					$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		            $wp_query = new WP_Query(array( 'post_type' => 'staff', 'order' => 'DESC', 'orderby' => 'date', 'posts_per_page' => -1, 'paged' => $paged ));
					if ($wp_query->have_posts()): while ($wp_query->have_posts()): $wp_query->the_post();
					
					$member_position = rwmb_meta('core_member_position');
					$member_twitter = rwmb_meta('core_member_twitter');
					$member_facebook = rwmb_meta('core_member_facebook');
					$member_googleplus = rwmb_meta('core_member_googleplus');
				?>
				<div class="col-md-4 col-sm-6">
					<div class="member-grid fix-box-height">
						<?php
							if (has_post_thumbnail()) { ?>
						<div class="member-thumb">
							<?php the_post_thumbnail('member-thumb'); ?>
						</div> <!-- /.member-thumb -->
						<?php } ?>
						<div class="member-content">
							<div class="pull-left">
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
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
								
							</ul>
							<div class="clearfix"></div>
							<?php icare_custom_excerpt(140); ?> 
							<a href="<?php the_permalink(); ?>"><?php _e('Read More &rarr;', CORE_THEME_NAME); ?></a>
						</div> <!-- /.member-content -->
					</div> <!-- /.member-grid -->
				</div> <!-- /.col-md-4 -->
				<?php 
					endwhile;
	                endif;
	                wp_reset_postdata(); 
                ?>
				
			</div> <!-- /.row -->
		</div> <!-- /.container -->
<?php
	get_footer();
?>		