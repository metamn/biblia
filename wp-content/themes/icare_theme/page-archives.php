<?php
/** template name: Archives
 * The archives template file.
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
						<h4 class="widget-title"><span><?php _e('Latest 10 Posts', CORE_THEME_NAME); ?></span></h4>
						<?php $archive_10 = get_posts('numberposts=10');
                         	foreach($archive_10 as $post) : ?>
						<ul>
							<li><a href="<?php the_permalink(); ?>"><?php the_title();?></a></li>
						</ul>
						<?php endforeach; ?>
					</div> <!-- /.box-content -->
					<div class="box-content">
						<h4 class="widget-title"><span><?php _e('Archives by Month', CORE_THEME_NAME); ?></span></h4>
						<ul>
							<?php wp_get_archives('type=monthly'); ?>
						</ul>
					</div> <!-- /.box-content -->
					<div class="box-content">
						<h4 class="widget-title"><span><?php _e('Archives by Categories', CORE_THEME_NAME); ?></span></h4>
						<ul>
							<?php wp_list_categories( 'title_li=' ); ?>
						</ul>
					</div> <!-- /.box-content -->
					<?php endwhile; endif; ?>
				</div> <!-- /.col-md-8 -->

				<?php
					get_sidebar();
				?>

			</div> <!-- /.row -->

		</div> <!-- /.container -->

<?php
	get_footer();
?>		
