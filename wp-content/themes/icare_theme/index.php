<?php
/**
 * The main template file.
 *
 * @package WordPress
 * @subpackage Core Framework
 */

get_header(); ?>

		<div class="container">
			
			<?php get_template_part('page-title'); ?>

			<div class="row">
				
				<?php
					
					$blog_layout_grid = false;
					
					// Get the default layout for blog page
					if (core_option('core_blog_layout') == '1') {
							
						$blog_layout_grid = true;
					}
					
					if ($blog_layout_grid) {
						
						// Get blog grid layout	
						get_template_part('blog', 'grid');
						
					} else {
						
						// Get blog list layout
						get_template_part('blog', 'list');
						
						}
	
					get_sidebar();
				?>

			</div> <!-- /.row -->

		</div> <!-- /.container -->

<?php
	get_footer();
?>		
