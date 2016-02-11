<?php
/** The default 404 page template.
 * 
 * @package WordPress
 * @subpackage Core Framework
 */

get_header(); ?>

		<div class="container">
			
			<?php get_template_part('page-title'); ?>

			<div class="row">
				
				<div class="col-md-8 archives">
					
					<div class="box-content">
						<h4 class="widget-title"><span><?php echo __('Oooops', CORE_THEME_NAME); ?></span></h4>
						<p class="page-404"><?php echo __('There is Nothing Here.', CORE_THEME_NAME ); ?></p>
					</div> <!-- /.box-content -->

				</div> <!-- /.col-md-8 -->

				<?php
					get_sidebar();
				?>

			</div> <!-- /.row -->

		</div> <!-- /.container -->

<?php
	get_footer();
?>		