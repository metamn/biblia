<?php
/**
 * The blog grid template file.
 * This file shows the blog posts in a grid layout
 *
 * @package WordPress
 * @subpackage Core Framework
 */

get_header(); ?>

<div id="ajax-container" class="col-md-8 blog-grid-layout">
	<div class="row">
		<?php if(have_posts()) : while (have_posts()) : the_post(); ?>
			<!--<div class="col-md-6">-->
				<div <?php post_class('col-md-6 blog-grid');?> id="post-<?php the_ID(); ?>">
					<div class="post-thumb">
						<a href="<?php the_permalink(); ?>">
							<?php if (has_post_thumbnail()) {
											
	                             the_post_thumbnail();
											 
							} else { ?>
											
								<img src="http://placehold.it/340x236" alt="">
	                                	
	                       <?php } ?>
										
						</a>
					</div> <!-- /.post-thumb -->
						<div class="post-content fix-box-height">
							<p class="post-meta"><?php the_time('F j, Y'); ?><?php _e(' with ', CORE_THEME_NAME ); ?><?php comments_popup_link('No comments', '1 comment', '% comments', 'comments-link', 'Comments are closed'); ?></p>
							<h4 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							<a href="<?php the_permalink(); ?>" class="read-more"><?php _e('Tovább &rarr;', CORE_THEME_NAME); ?></a>
						</div> <!-- /.post-content -->
				</div> <!-- /.post-grid -->
			<!--</div> <!-- /.col-md-6 -->
			<?php endwhile; else : ?>
				<div class="row">
					<div class="col-md-12">
						<div class="box-content">
							<p><?php _e( 'Nincs találat.', CORE_THEME_NAME ); ?></p>
						</div> <!-- //.box-content-->
					</div><!-- //.col-md-12-->
				</div>
			<?php endif; ?>
	</div> <!-- /.row -->
					
	<?php get_template_part('core/includes/ajax-loadmore'); ?>
	
	<div id="ajax-container-new" class=""></div>
	
	
</div> <!-- /.col-md-8 -->