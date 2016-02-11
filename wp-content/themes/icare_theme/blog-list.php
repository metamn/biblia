<?php
/**
 * The blog list template file.
 * This file shows the blog posts in a list layout
 *
 * @package WordPress
 * @subpackage Core Framework
 */

get_header(); ?>

<div id="ajax-container" class="col-md-8 blog-list-layout">
	<?php if(have_posts()) : while (have_posts()) : the_post(); ?>
	<div <?php post_class('blog-list');?> id="post-<?php the_ID(); ?>">
		<?php if (has_post_thumbnail()) { ?>
		<div class="post-thumb">
			<?php the_post_thumbnail('blog-list-thumb'); ?>
		</div> <!-- /.blog-thumb -->
		<?php } ?>
		<div class="post-content">
			<h4 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
			<p class="post-meta"><?php the_time('F j, Y'); ?><?php _e(' with ', CORE_THEME_NAME ); ?><?php comments_popup_link('No comments', '1 comment', '% comments', 'comments-link', 'Comments are closed'); ?></p>
			<?php icare_custom_excerpt(100); ?>
			<a href="<?php the_permalink(); ?>" class="read-more"><?php _e('Tovább &rarr;', CORE_THEME_NAME); ?></a>
		</div> <!-- /.blog-content -->
	</div> <!-- /.blog-list -->
	<?php endwhile; else : ?>
		<div class="row">
			<div class="col-md-12">
				<div class="box-content">
					<p><?php _e( 'No posts found.', CORE_THEME_NAME ); ?></p>
				</div> <!-- //.box-content-->
			</div><!-- //.col-md-12-->
		</div>
	<?php endif; ?>
	
	<?php get_template_part('core/includes/ajax-loadmore'); ?>

		
	<div id="ajax-container-new" class=""></div>
		
</div> <!-- /.col-md-8 -->

