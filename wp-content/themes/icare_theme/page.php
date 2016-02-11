<?php
/** The default page template.
 * 
 * @package WordPress
 * @subpackage Core Framework
 */

get_header(); ?>

		<div class="container">
			
			<?php get_template_part('page-title'); ?>

			<div class="row">
				
				<div class="col-md-8 archives">
					
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div class="box-content">
						<?php the_content(); ?>
						<?php wp_link_pages(); ?>
					</div> <!-- /.box-content -->
					
					<?php endwhile; else : ?>
						<div class="box-content">
							<p><?php _e( 'No posts found.', CORE_THEME_NAME ); ?></p>
						</div> <!-- /.box-content -->
                    <?php endif ?>
                    
                   
                    <?php comments_template(); ?>
                    
                    
				</div> <!-- /.col-md-8 -->

				<?php
					get_sidebar();
				?>

			</div> <!-- /.row -->

		</div> <!-- /.container -->

<?php
	get_footer();
?>		
