<?php
/**
 * The default searchform template file.
 *
 * @package WordPress
 * @subpackage Core Framework
 */
?>

<div class="search-form">
	<form method="get" name="SearchForm" action="<?php echo home_url(); ?>">
		<fieldset>
			<input type="text" name="s" id="s" placeholder="<?php _e('Keresés...', CORE_THEME_NAME); ?>">
		</fieldset>
	</form>
</div> <!-- /.search-form -->