<?php
/**
 * The template for displaying the sidebar
 *
 * @package WordPress
 * @subpackage Core Framework
 */
?>
<?php if ( is_active_sidebar( 'core-sidebar-widget-area' ) ) : ?>
	<div class="col-md-4 sidebar">
		<?php dynamic_sidebar( 'core-sidebar-widget-area' ); ?>
	</div>
<?php else : ?>
	<div class="col-md-4">
		<div class="box-content">
			<p><?php _e('No widgets assigned. Go to <strong>Dashboard > Appearance > Widgets</strong> to assign a widget to this area', CORE_THEME_NAME); ?></p>
		</div>
	</div>
<?php endif; ?>