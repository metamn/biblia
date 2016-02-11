<?php
/**
 * The default single template file.
 *
 * @package WordPress
 * @subpackage Core Framework
 */

get_header(); ?>

		<div class="container">
			
			<?php get_template_part('page-title'); ?>

			<div class="row">
				
				<div class="col-md-8">
					<?php while (have_posts()) : the_post(); ?>
					<div id="<?php the_ID(); ?>" <?php post_class('blog-single'); ?>>
						<?php if (has_post_thumbnail()) { ?>
						<div class="post-image">
							<?php the_post_thumbnail('blog-single-image'); ?>
							<?php if (core_option('core_blog_meta') == '1') { ?>
							<div class="image-over">
								<span class="meta-author"><i class="fa fa-user"></i><?php the_author_posts_link(); ?></span>
								<span><i class="fa fa-comments-o"></i><?php comments_number( __('No Comments', CORE_THEME_NAME), __('One Comment ', CORE_THEME_NAME), __('% Comments', CORE_THEME_NAME) ); ?></span>
								<span><i class="fa fa-calendar-o"></i><?php the_time('F j, Y'); ?></span>
							</div>
							<?php } ?>
						</div> <!-- /.blog-thumb -->
						<?php } ?>
						<div class="post-content">
							<h3 class="post-title"><?php the_title(); ?></h3>
							<?php the_content();
								  wp_link_pages(); 
							?>
							
							<?php if(get_the_tag_list()) { ?>
							<div class="tags">
								<span><i class="fa fa-tags"></i></span>
								<?php echo get_the_tag_list('',' ',''); ?>
							</div> <!-- /.tags -->
							 <?php } ?>
						</div> <!-- /.blog-content -->
					</div> <!-- /.blog-single -->
					
					<?php icare_post_nav(); ?>
					
					<?php endwhile; ?>
					
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
