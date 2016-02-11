<div class="box-content search-cause">
	<h5><?php _e('Find and donate now!', CORE_THEME_NAME); ?></h5>
		<div class="row">
			<?php
				$args = icare_cause_search_args();
				$cause_search_object = new WP_Advanced_Search($args);
				$cause_search_object->the_form();
			?>
	</div> <!-- /.row -->
</div> <!-- /.box-content -->