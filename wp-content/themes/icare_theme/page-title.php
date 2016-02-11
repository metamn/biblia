<?php if (!is_front_page()) { ?>
	<div class="page-header">
		 <div class="row">
			<div class="col-md-6 col-sm-6">
				<?php icare_breadcrumbs(); ?>
			</div> <!-- /.col-md-6 -->
			<div class="col-md-6 col-sm-6 hidden-xs back-home">
				<a href="<?php echo home_url(); ?>"><?php _e('&larr; Go back Home', CORE_THEME_NAME); ?></a>
			</div> <!-- /.col-md-6 -->
		</div> <!-- /.row -->
	</div> <!-- /.page-header -->
<?php } ?>