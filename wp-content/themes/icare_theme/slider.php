<div class="flexslider">
	<ul class="slides">						
		<?php
			query_posts("post_type=slide&posts_per_page=-1&post_status=publish&orderby=name&order=ASC");
	        while ( have_posts() ) : the_post();
										
			$icare_show_slide_caption = rwmb_meta('core_show_slide_caption');
			$icare_slide_url = rwmb_meta('core_slide_url');
			$icare_slide_caption = rwmb_meta('core_slide_caption');
										
			if (has_post_thumbnail()) { ?>
			<li>
				<?php the_post_thumbnail('slide-image'); 
					if ($icare_show_slide_caption == true) { ?>			
						<div class="flex-caption">
							<p><?php echo $icare_slide_caption.' ...';?><a href="<?php echo $icare_slide_url; ?>"><?php _e('Read More', CORE_THEME_NAME); ?></a></p>
					</div>
				<?php } ?>
			</li>
			<?php }
				endwhile;
				wp_reset_query();  
			?>	
	</ul>
</div> <!-- /.flexslider -->