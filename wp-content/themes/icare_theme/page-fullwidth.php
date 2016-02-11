<?php
/** template name: Page Full Width
 * The archives template file.
 * 
 * @package WordPress
 * @subpackage Core Framework
 * TODO Sidebar Issues
 */

get_header(); ?>

		<div class="container">
			
			<?php get_template_part('page-title'); ?>

			<div class="row">
				
				<div class="col-md-12">
					
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

				</div> <!-- /.col-md-12 -->

			</div> <!-- /.row -->

		</div> <!-- /.container -->

<?php
	get_footer();
?>		
