<?php
/**
 * @package WordPress
 * @subpackage Core Framework
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes();?>> 
<![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8" <?php language_attributes();?>> 
<![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9" <?php language_attributes();?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes();?>> <!--<![endif]-->
    <head>
        <title><?php bloginfo('name'); ?> <?php wp_title("|",true); ?></title>
        
        <meta name="description" content="<?php echo core_option( 'core_meta_description' );?>">
        <meta name="keywords" content="<?php echo core_option( 'core_meta_keyword' ); ?>">
        <meta name="author" content="<?php echo core_option( 'core_meta_author' ); ?>">
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    	<link rel="profile" href="http://gmpg.org/xfn/11" />
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">

        
       
        <!-- Favicons -->
        <link rel="shortcut icon" href="<?php echo core_option('core_favicon', false, 'url'); ?>">
    	<link rel="icon" type="image/png" href="<?php echo core_option('core_favicon', false, 'url'); ?>" />
		<link rel="apple-touch-icon" href="<?php echo core_option('core_touch_icon', false, 'url'); ?>">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo core_option('core_touch_icon_72', false, 'url'); ?>">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo core_option('core_touch_icon_144', false, 'url'); ?>">
    
       
        <!--[if lt IE 8]>
	    <div style=' clear: both; text-align:center; position: relative;'>
            <a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" alt="" /></a>
        </div>
        <![endif]-->
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
	
	
		<div class="responsive-menu visible-sm visible-xs">
			<a href="#" class="toggle-menu"><i class="fa fa-bars"></i></a>
			<div class="menu-open">
				<nav>
					<?php wp_nav_menu( array(
								'container'       => 'ul', 
								'menu_class'      => '', 
								'menu_id'         => '',
								'depth'           => 0,
								'theme_location'  => 'header_main_menu'
								)); 
					?>
				</nav>
				
				<?php if (core_option('core_show_header_donate')) { ?>
					<a href="<?php echo core_option('core_header_donate'); ?>" class="btn main-btn"><?php _e('Donate Now', CORE_THEME_NAME); ?></a>
				<?php } ?>
			</div> <!-- /.menu-open -->
		</div> <!-- /.responsive-menu -->

		<header class="site-header">
			<?php if(core_option('core_show_header_top') == '1') { ?>
			<div class="top-header">
				<div class="container">
					<div class="inner-top">
					<div class="row">
						<div class="col-md-6 col-sm-6 col-xs-12 header-info-left">
							<ul>
								<li><a href="tel:<?php echo str_replace(' ', '', core_option('core_header_phone')); ?>"><i class="fa fa-phone"></i><?php echo core_option('core_header_phone'); ?></a></li>
								<li><a href="mailto:<?php echo core_option('core_header_mail'); ?>"><i class="fa fa-envelope-o"></i><?php echo core_option('core_header_mail'); ?></a></li>
							</ul>
						</div> <!-- /.col-md-6 -->
						<div class="col-md-6 col-sm-6 col-xs-12 header-info-right visible-md visible-lg">
							<?php wp_nav_menu( array(
								'container'       => 'ul', 
								'menu_class'      => '', 
								'menu_id'         => '',
								'depth'           => 0,
								'theme_location'  => 'header_top_menu'
								)); 
							?>
						</div> <!-- /.col-md-6 -->
					</div> <!-- /.row -->
					</div>
				</div> <!-- /.container -->
			</div> <!-- /.top-header -->
			<?php } ?>
			<div class="container">
			
				<div class="main-header">
	<div style="float:right;">
			<a href="http://bibliatarsulat.ro/"><img width="29" src="http://bibliatarsulat.ro/wp-content/uploads/2015/11/hu.png"></a>
<a href="http://bibliatarsulat.ro/ro/"><img width="29" src="http://bibliatarsulat.ro/wp-content/uploads/2015/11/ro.png"></a>
<a href="http://bibliatarsulat.ro/en/"><img width="29" src="http://bibliatarsulat.ro/wp-content/uploads/2015/11/en.png"></a>
<a href="http://bibliatarsulat.ro/de/"><img width="29" src="http://bibliatarsulat.ro/wp-content/uploads/2015/11/ger.png"></a>
</div>			
				
				
					<div class="row">
						<div class="col-md-4 col-sm-5 logo">
							<a href="<?php echo home_url(); ?>"><img src="<?php echo core_option('core_custom_logo', false, 'url') ?>" alt="<?php echo get_bloginfo( 'name' ); ?>"></a>
						</div> <!-- /this -->
						<div class="col-md-8 col-sm-7 main-header-right">
							<div class="social-search clearfix">
								
								<?php
								if (core_option('core_show_header_search') == '1') {
									get_search_form(); 
								} ?>
								<?php if (core_option('core_show_header_social') == '1') { ?>
								<div class="social-icon-top">
									<ul>
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
										<?php if (core_option('core_rss') == '1') { ?>
										<li><a href="<?php bloginfo('rss2_url'); ?>" data-toggle="tooltip" title="RSS" class="fa fa-rss"></a></li>
										<?php } ?>
									</ul>
								</div> <!-- /.social-icon-top -->
								<?php } ?>
							</div> <!-- /.social-search -->
						</div> <!-- /.col-md-8 -->
					</div> <!-- /.row -->
				</div> <!-- /.main-header -->
			</div> <!-- /.container -->
			<div class="menu-wrapper visible-md visible-lg">
				<div class="container">
					<div class="inner-menu">
						<div class="row">
							<div class="col-md-10 main-menu">
								<nav>
									<?php wp_nav_menu( array(
										'container'       => 'ul', 
										'menu_class'      => 'sf-menu', 
										'menu_id'         => '',
										'depth'           => 0,
										'theme_location'  => 'header_main_menu'
										)); 
									?>
								</nav>
							</div> <!-- /.main-menu -->
							<?php if (core_option('core_show_header_donate')) { ?>
							<div class="col-md-2 button-holder">
								<a href="<?php echo core_option('core_header_donate'); ?>" class="btn main-btn"><?php _e('Donate Now', CORE_THEME_NAME); ?></a>
							</div> <!-- /.col-md-2 -->
							<?php } ?>
						</div> <!-- /.row -->
					</div> <!-- /.inner-menu -->
				</div> <!-- /.container -->
			</div> <!-- /.menu-wrapper -->
		</header> <!-- /.site-header -->