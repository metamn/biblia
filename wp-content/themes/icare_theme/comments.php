<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Core Framework
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>



	<?php if ( have_comments() ) : ?>
		
	<div id="comments" class="comments box-content">

	<h4 class="widget-title">
		<span>
			<?php
				printf( _n( 'Comment <em>(%1$s)</em>', 'Comments <em>(%1$s)</em>', get_comments_number(), CORE_THEME_NAME ),
					number_format_i18n( get_comments_number() ));
			?>
		</span>
	</h4>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Comment navigation', CORE_THEME_NAME ); ?></h1>
		<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', CORE_THEME_NAME ) ); ?></div>
		<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', CORE_THEME_NAME ) ); ?></div>
	</nav><!-- #comment-nav-above -->
	<?php endif; // Check for comment navigation. ?>

	<ol class="comment-list">
		<?php
			wp_list_comments( array(
				'style'      => 'ol',
				'short_ping' => true,
				'avatar_size'=> 80,
			) );
		?>
	</ol><!-- .comment-list -->

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Comment navigation', CORE_THEME_NAME ); ?></h1>
		<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', CORE_THEME_NAME ) ); ?></div>
		<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', CORE_THEME_NAME ) ); ?></div>
	</nav><!-- #comment-nav-below -->
	<?php endif; // Check for comment navigation. ?>

	<?php if ( ! comments_open() ) : ?>
	<p class="no-comments"><?php _e( 'Comments are closed.', CORE_THEME_NAME ); ?></p>
	<?php endif; ?>

	</div><!-- #comments -->
	
<?php endif; // have_comments() ?>

<?php if ( comments_open() ) : ?>
	<div class="comment-form box-content">
			
			<?php
			
			// This is how to customize the comments fields and labels
			
			$commenter = wp_get_current_commenter();
			$req = get_option('require_name_email');
			$aria_req = ($req ? "aria-required='true'" : '');
			
			$comments_args = array(
			'title_reply' => '<h4 class="widget-title"><span>'.__('Leave Us A Comment', CORE_THEME_NAME).
			'</span></h4>',
			'label_submit' =>  __('Submit Comment', CORE_THEME_NAME ),
			'comment_notes_after' => '</fieldset>'.
				'<button id="submit-button" class="btn main-btn" type="submit"/>'.__('Submit Comment', CORE_THEME_NAME ).'</button></fieldset>',
			'comment_notes_before' => '',
			
			'comment_field' => '<fieldset>'.
			'<label for="comment">'.__('Your Comment:', CORE_THEME_NAME).'<span>'.__('Feel free to type', CORE_THEME_NAME).'</span></label>'.
			'<textarea id="comment" name="comment" rows="4" aria-required="true">'.'</textarea></fieldset>',
			
			'fields'=> apply_filters('comment_form_default_fields', array(
				
				'author' => 
				'<fieldset>'.
				'<label for="author">'.__('First Name:', CORE_THEME_NAME).'<span>'.__('Put your name here', CORE_THEME_NAME).'</span></label>'.
				($req ? '<span class="required"></span>' : '').
				'<input id="author" name="author" type="text" value="'.esc_attr($commenter['comment_author']).
				'" size="22"'.$aria_req. '/></fieldset>',
				
				'email' => 
				'<fieldset>'.
				'<label for="email">'.__('Email:', CORE_THEME_NAME).'<span>'.__('Put your email here', CORE_THEME_NAME).'</span></label>'.
				($req ? '<span class="required"></span>' : '').
				'<input id="email" name="email" type="text" value="'.esc_attr($commenter['comment_author_email']).
				'" size="22"'.$aria_req. '/></fieldset>',
				
				'url' => 
				'<fieldset>'.
				'<label for="url">'.__('URL:', CORE_THEME_NAME).'<span>'.__('Put your website here', CORE_THEME_NAME).'</span></label>'.
				
				'<input id="url" name="url" type="text" value="'.esc_attr($commenter['comment_author_url']).
				'" size="22" /></fieldset>',

			)));
				
			comment_form($comments_args);  ?>
			
			<?php if ( post_password_required() ) { ?>
					<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', CORE_THEME_NAME); ?></p>
			<?php
				return;
			} ?>
		
</div><!-- /. comments-form -->
<?php endif; // if you delete this the sky will fall on your head ?>
