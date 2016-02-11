<?php
/**
 * The template for displaying the footer.
 * 
 * @package WordPress
 * @subpackage Core Framework
 * 
 */
?>		

	<footer class="site-footer">
			<?php if (core_option('core_footer_layout') == '1') { ?>
			<div class="top-footer">
				<div class="container">
					<div class="row">
						<?php if ( is_active_sidebar( 'core-footer-area-1' ) ) : ?>
						<div class="col-md-3 col-sm-4 col-xs-12 contact-info footer-widget">
							<?php dynamic_sidebar( 'core-footer-area-1' ); ?>
						</div> <!-- /.col-md-3 -->
						<?php endif; ?>
						<?php if ( is_active_sidebar( 'core-footer-area-2' ) ) : ?>
						<div class="col-md-5 col-sm-8 col-xs-12 footer-widget">
							<?php dynamic_sidebar( 'core-footer-area-2' ); ?>
						</div> <!-- /.col-md-5 -->
						<?php else : ?>
						<div class="col-md-5 col-sm-8 col-xs-12 footer-widget">
							<h4 class="footer-widget-title"><?php _e('Média', CORE_THEME_NAME); ?></h4>
							<ul class="footer-social">
								<?php if (core_option('core_facebook')) { ?>
									<li><a href="<?php echo core_option('core_facebook'); ?>" data-toggle="tooltip" title="Facebook" class="fa fa-facebook"></a></li>
								<?php } ?>
								<?php if (core_option('core_twitter')) { ?>
									<li><a href="<?php echo core_option('core_twitter'); ?>" data-toggle="tooltip" title="Twitter" class="fa fa-twitter"></a></li>
								<?php } ?>
								<?php if (core_option('core_linkedin')) { ?>
									<li><a href="<?php echo core_option('core_linkedin'); ?>" data-toggle="tooltip" title="Linkedin" class="fa fa-linkedin"></a></li>
								<?php } ?>
								<?php if (core_option('core_flickr')) { ?>
									<li><a href="<?php echo core_option('core_flickr'); ?>" data-toggle="tooltip" title="Flickr" class="fa fa-flickr"></a></li>
								<?php } ?>
								<?php if (core_option('core_youtube')) { ?>
									<li><a href="<?php echo core_option('core_youtube'); ?>" data-toggle="tooltip" title="YouTube" class="fa fa-youtube"></a></li>
								<?php } ?>
								<?php if (core_option('core_rss') == '1') { ?>
									<li><a href="<?php bloginfo('rss2_url'); ?>" data-toggle="tooltip" title="RSS" class="fa fa-rss"></a></li>
								<?php } ?>
							</ul>
						</div> <!-- /.col-md-5 -->
						<?php endif; ?>
						<?php if ( is_active_sidebar( 'core-footer-area-3' ) ) : ?>
						<div class="col-md-4 col-sm-12 col-xs-12 footer-widget">
							<?php dynamic_sidebar( 'core-footer-area-3' ); ?>
						</div> <!-- /.col-md-4 -->
						<?php endif; ?>
					</div> <!-- /.row -->
				</div> <!-- /.container -->
			</div> <!-- /.top-footer -->
			<?php } ?>
			<div class="main-footer">
				<div class="container">
					<div class="row">
						<?php if ( is_active_sidebar( 'core-footer-area-4' ) ) : ?>
						<div class="col-md-3 col-sm-6 footer-widget">
							<?php dynamic_sidebar( 'core-footer-area-4' ); ?>
						</div> <!-- /.col-md-3 -->
						<?php endif; ?>
						<?php if ( is_active_sidebar( 'core-footer-area-5' ) ) : ?>
						<div class="col-md-3 col-sm-6 footer-widget">
							<?php dynamic_sidebar( 'core-footer-area-5' ); ?>
						</div> <!-- /.col-md-3 -->
						<?php endif; ?>
						<?php if ( is_active_sidebar( 'core-footer-area-6' ) ) : ?>
						<div class="col-md-2 col-sm-6 footer-widget">
							<?php dynamic_sidebar( 'core-footer-area-6' ); ?>
						</div> <!-- /.col-md-2 -->
						<?php endif; ?>
						<?php if ( is_active_sidebar( 'core-footer-area-7' ) ) : ?>
						<div class="col-md-4 col-sm-6 footer-widget">
							<?php dynamic_sidebar( 'core-footer-area-7' ); ?>
						</div> <!-- /.col-md-4 -->
						<?php endif; ?>
					</div> <!-- /.row -->
					<div class="copyright">
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<p class="small-text"><?php echo core_option('core_footer_copyright'); ?></p>
							</div> <!-- /.col-md-6 -->
							<div class="col-md-6 col-sm-6">
								<div class="credits">
									<p class="small-text"><?php echo core_option('core_footer_owner'); ?></p>
								</div>
							</div> <!-- /.col-md-6 -->
						</div> <!-- /.row -->
					</div> <!-- /.copyright -->
				</div> <!-- /.container -->
			</div> <!-- /.main-footer -->
		</footer> <!-- /.site-footer -->
		
		<?php if (core_option('core_show_backtop_button') == '1') { ?>
			<a href="#top" id="top-link" class="fa fa-angle-up"></a>
		<?php } ?>

	<?php
	
	if (core_option('core_google_analytics') != '') {
		echo core_option('core_google_analytics');
		}
	
	// Get the default footer template file 
	wp_footer(); ?>
    </body>
</html>