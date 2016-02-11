<?php 
global $wp_query;

$found_posts = $wp_query->found_posts;
$per_page = get_option('posts_per_page');
$post_count = $found_posts - $per_page;
$load_more_label = '';

if($found_posts > $per_page) :
		
?>
<div id="load-more-wrapper" class="row">
	<div class="col-md-12">
		<a id="load-more" href="javascript:void(0);" class="load-more">
			<?php 
			$load_more_label = __('No More Items To Load', CORE_THEME_NAME);
			
			if ($found_posts > $per_page)
				{
					$load_more_label = __('Load More', CORE_THEME_NAME);
				}
		
				echo $load_more_label;  ?> 
				<i class="fa fa-refresh"></i>
		</a>
	</div> <!-- /.col-md-12 -->
</div> <!-- /.row -->
<?php endif; ?>
