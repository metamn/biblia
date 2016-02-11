<?php


/* 
 * Snippet from: http://wpengineer.com/1960/display-post-thumbnail-post-page-overview
 * 
 */
if ( !function_exists('fb_AddThumbColumn') && function_exists('add_theme_support') ) {
		
	add_theme_support('post-thumbnails', array( 'post', 'page' ) );
	
	function fb_AddThumbColumn($cols) {
		
		$cols['thumbnail'] = __('Thumbnail', CORE_THEME_NAME);
		
		return $cols;
	}
	
	function fb_AddThumbValue($column_name, $post_id) {
			
			$width = (int) 35;
			$height = (int) 35;
			
			if ( 'thumbnail' == $column_name ) {
				// thumbnail of WP 2.9
				$thumbnail_id = get_post_meta( $post_id, '_thumbnail_id', true );
				// image from gallery
				$attachments = get_children( array('post_parent' => $post_id, 'post_type' => 'attachment', 'post_mime_type' => 'image') );
				if ($thumbnail_id)
					$thumb = wp_get_attachment_image( $thumbnail_id, array($width, $height), true );
				elseif ($attachments) {
					foreach ( $attachments as $attachment_id => $attachment ) {
						$thumb = wp_get_attachment_image( $attachment_id, array($width, $height), true );
					}
				}
					if ( isset($thumb) && $thumb ) {
						echo $thumb;
					} else {
						echo __('None', CORE_THEME_NAME);
					}
			}
	}
	
	// for posts
	add_filter( 'manage_posts_columns', 'fb_AddThumbColumn' );
	add_action( 'manage_posts_custom_column', 'fb_AddThumbValue', 10, 2 );
	
	// for pages
	add_filter( 'manage_pages_columns', 'fb_AddThumbColumn' );
	add_action( 'manage_pages_custom_column', 'fb_AddThumbValue', 10, 2 );
}

/*///////////////////////////////////////////////////////////////////////////////////*/

/*-----------------------------------------------------------------------------------*/
/*	Outputs a Google Map Based on Paramenters Entered
/*-----------------------------------------------------------------------------------*/
if (!function_exists('icare_print_map')) {
		
	function icare_print_map($lat, $lon, $zoom) {
		$lat_info = $lat;
		$lon_info = $lon;
		$zoom_info = $zoom;
		?>
		<script>
		function initialize() {
			var myLatlng = new google.maps.LatLng(<?php echo $lat_info;?>,  <?php echo $lon_info;?>);
			var mapOptions = {
				zoom : <?php echo $zoom_info; ?>,
				center : myLatlng
			};
			
			var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
			
			var marker = new google.maps.Marker({
	      		position: myLatlng,
	      		map: map,
	      		title: ''
  			});
		}

		function loadScript() {
			var script = document.createElement('script');
			script.type = 'text/javascript';
			script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&' + 'callback=initialize';
			document.body.appendChild(script);
		}

		window.onload = loadScript; 
	</script>
	<?php }

}

/*-----------------------------------------------------------------------------------*/
/*	Advanced Search For Courses Page
/*-----------------------------------------------------------------------------------*/

if (!function_exists('icare_cause_search_args')) {
		
	function icare_cause_search_args() {
		$cause_search_url = core_option('core_custom_search_page');
		$args = array();
		$args['form'] = array('action' => home_url().'/'.$cause_search_url.'/', 
	    'method' => 'GET',
	    'id' => 'cause-search',
	    'name' => 'cause-search',
	    'class' => '');
							
		$args['wp_query'] = array('post_type' => 'cause',
		'posts_per_page' => -1,
		'order' => 'DESC',
		'orderby' => 'date');
							
		$args['fields'][] = array('type' => 'search',
		'label' => '',
		'value' => '',
		'placeholder' => __('Type your keyword, name or anything...', CORE_THEME_NAME),
		'class' => 'searchbox',
		'operator' => 'AND');
							
		$args['fields'][] = array('type' => 'taxonomy',
		'label' => '',
		'taxonomy' => 'cause-categories',
		'format' => 'select',
		'default' => '-- select --',
		'class' => 'searchbox',
		'operator' => 'AND');
			
		$args['fields'][] = array('type' => 'submit',
		'value' => __('Search Now', CORE_THEME_NAME),
		'class'=> 'main-button');
		
		return $args;
	}

}
/* ------------------------------------------------------------------------ */
/* Threaded Comments
/* ------------------------------------------------------------------------ */

if(!function_exists('icare_enable_threaded_comments')) {
		
	function icare_enable_threaded_comments()
	{
		if (!is_admin()) {
			if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
				wp_enqueue_script('comment-reply');
			}
		}	
	}
add_action('get_header', 'icare_enable_threaded_comments');

}


/*-----------------------------------------------------------------------------------*/
/*	Pagination
/*-----------------------------------------------------------------------------------*/
if (!function_exists('icare_paging_nav')) {
		
	function icare_paging_nav() {
	
		// Don't print empty markup if there's only one page.
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return;
		}
	
		$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		$pagenum_link = html_entity_decode( get_pagenum_link() );
		$query_args   = array();
		$url_parts    = explode( '?', $pagenum_link );
	
		if ( isset( $url_parts[1] ) ) {
			wp_parse_str( $url_parts[1], $query_args );
		}
	
		$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
		$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';
	
		$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
		$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';
	
		// Set up paginated links.
		$links = paginate_links( array(
			'base'     => $pagenum_link,
			'format'   => $format,
			'total'    => $GLOBALS['wp_query']->max_num_pages,
			'current'  => $paged,
			'mid_size' => 1,
			'add_args' => array_map( 'urlencode', $query_args ),
			'prev_text' => __( '<i class="fa fa-angle-left"></i>', 'twentyfourteen' ),
			'next_text' => __( '<i class="fa fa-angle-right"></i>', 'twentyfourteen' ),
		) );
	
		if ( $links ) :
	
		?>
		<nav class="row navigation" role="navigation">
			<div class="col-md-12">
				<div class="paging-navigation">
					<div class="row">
		
						<div class="col-md-6 page-info">
							<h6>
								<?php 
									echo __('Page', CORE_THEME_NAME).' '.$paged.' '.__('of', CORE_THEME_NAME).' '.$GLOBALS['wp_query']->max_num_pages;
								?>
							</h6>
						</div>
						<div class="col-md-6 loop-pagination">
								<?php echo $links; ?>
						</div><!-- .pagination -->
					</div>
				</div>
			</div>
		</nav><!-- .navigation -->
		<?php
		endif;
	}
}

#-----------------------------------------------------------------#
# Display Previous/Next Links
#-----------------------------------------------------------------#

if (!function_exists( 'icare_post_nav' )) {

	function icare_post_nav() {
		global $post;
	
		// Don't print empty markup if there's nowhere to navigate.
		$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
		$next     = get_adjacent_post( false, '', false );
		
		$older_post_label = '';
		$newer_post_label = '';
		
		if (is_singular('post')) {
				
			$older_post_label = __('Older Posts', CORE_THEME_NAME );
			$newer_post_label = __('Newer Posts', CORE_THEME_NAME);
			
		}
		
		if (is_singular('event')) {
			
			$older_post_label = __('Older Events', CORE_THEME_NAME );
			$newer_post_label = __('Newer Events', CORE_THEME_NAME);
		}
		
		if (is_singular('cause')) {
			
			$older_post_label = __('Older Causes', CORE_THEME_NAME );
			$newer_post_label = __('Newer Causes', CORE_THEME_NAME);
		}
	
		if ( ! $next && ! $previous )
			return;
		?>
	     
	     <div class="row">
			<nav class="col-md-12">
				<?php previous_post_link( '%link', '<i class="fa fa-long-arrow-left"></i>'.' '.$older_post_label ); ?>
				<?php next_post_link( '%link', $newer_post_label.' '.'<i class="fa fa-long-arrow-right"></i>' ); ?>
			</nav> <!-- /.col-md-12 -->
		</div> <!-- /.row -->
		
		<?php
	}
}


// Add a custom class for previuous and next post link
// This is a needed step since default behavior doesn't provide this functionality


if ( ! function_exists( 'icare_add_class_next_post_link' ) ) {
	
	function icare_add_class_next_post_link($html){
	    $html = str_replace('<a','<a class="go-next"',$html);
	    return $html;
	}
}

add_filter('next_post_link','icare_add_class_next_post_link',10,1);

if ( ! function_exists( 'icare_add_class_previous_post_link' ) ) {
	
	function icare_add_class_previous_post_link($html){
	    $html = str_replace('<a','<a class="go-prev"',$html);
	    return $html;
	}
}
	
add_filter('previous_post_link','icare_add_class_previous_post_link',10,1);

#-----------------------------------------------------------------#
# Excerpt Related & Utilities Functions
#-----------------------------------------------------------------#

if (!function_exists('icare_custom_excerpt')) {
	
	function icare_custom_excerpt($charlength) {
		$excerpt = get_the_excerpt();
		$charlength++;
	
		if ( mb_strlen( $excerpt ) > $charlength ) {
			$subex = mb_substr( $excerpt, 0, $charlength - 5 );
			$exwords = explode( ' ', $subex );
			$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
			if ( $excut < 0 ) {
				echo mb_substr( $subex, 0, $excut );
			} else {
				echo $subex;
			}
			echo '';
		} else {
			echo '<p>'.$excerpt.'</p>';
		}
	}
}

if (!function_exists('icare_content')) {
	function icare_content($limit) {
	  $content = explode(' ', get_the_content(), $limit);
	  if (count($content)>=$limit) {
	    array_pop($content);
	    $content = implode(" ",$content).'';
	  } else {
	    $content = implode(" ",$content);
	  }	
	  $content = preg_replace('/\[.+\]/','', $content);
	  $content = apply_filters('the_content', $content); 
	  $content = str_replace(']]>', ']]&gt;', $content);
	  return $content;
	}
}
// Custom excerpt length
if (!function_exists('icare_excerpt_length')) {
	function icare_excerpt_length( $length ) {
		return 14;
	}
}
add_filter( 'excerpt_length', 'icare_excerpt_length', 999 );

//custom excerpt ending
if (!function_exists('icare_excerpt_more')) {
	function icare_excerpt_more( $more ) {
		return '';
	}
}

add_filter('excerpt_more', 'icare_excerpt_more');

/* Convert hexdec color string to rgb(a) string */

function icare_hex2rgba($color, $opacity = false) {

	$default = 'rgb(0,0,0)';

	//Return default if no color provided
	if(empty($color))
          return $default; 

	//Sanitize $color if "#" is provided 
        if ($color[0] == '#' ) {
        	$color = substr( $color, 1 );
        }

        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return $default;
        }

        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);

        //Check if opacity is set(rgba or rgb)
        if($opacity){
        	if(abs($opacity) > 1)
        		$opacity = 1.0;
        	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
        	$output = 'rgb('.implode(",",$rgb).')';
        }

        //Return rgb(a) color string
        return $output;
}

/*-----------------------------------------------------------------------------------*/
/*	Ajax Load Posts New
/*-----------------------------------------------------------------------------------*/

function icare_ajax_init() {
 		
 	global $wp_query;

 	// Add code to index pages.
 	if( !is_admin() ) { //!is_singular()
 		
		// Enqueue jQuery Script to Process Ajax
		wp_enqueue_script(
			'icare_custom',
			get_template_directory_uri(). '/core/js/ajax-loadmore.js',
			array('jquery'),
			'1.0',
			true
		);

 		// What page are we on? And what is the pages limit?
 		$max = $wp_query->max_num_pages;
 		$paged = ( get_query_var('paged') > 1 ) ? get_query_var('paged') : 1;
		//echo $max;

 		// Add some parameters for the JS.
 		wp_localize_script(
 			'icare_custom',
 			'core',
 			array(
 				'startPage' => $paged,
 				'maxPages' => $max,
 				'nextLink' => next_posts($max, false)
 			)
 		);
 	}
 }

add_action('template_redirect', 'icare_ajax_init');


/*-----------------------------------------------------------------------------------*/
/*	Breadcrumbs
/*-----------------------------------------------------------------------------------*/

if (!function_exists('icare_breadcrumbs()')) {
	
	function icare_breadcrumbs() {
	  	
	  $showOnHome = 0; // 1 - show "breadcrumbs" on home page, 0 - hide
	  $delimiter = ''; // divider
	  $home = __('Home', CORE_THEME_NAME); // text for link "Home"
	  $showCurrent = 1; // 1 - show title current post/page, 0 - hide
	  $before = '<h2 class="page-title">'; // open tag for active breadcrumb
	  $after = '</h2>'; // close tag for active breadcrumb
	
	  global $post;
	  $homeLink = home_url();
	
	  if (is_front_page()) {
	
	    if ($showOnHome == 1) echo '<h2><a href="' . $homeLink . '">' . $home . '</a></h2>';
	
	  } else {
	
	    echo '';
		
		if ( is_home() ) {
			echo $before . __('Blog', CORE_THEME_NAME) . $after;
		} elseif ( is_category() ) {
	      $thisCat = get_category(get_query_var('cat'), false);
	      if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
	      echo $before . __('Categories Archives: "', CORE_THEME_NAME) . single_cat_title('', false) . '"' . $after;
	
	    } elseif ( is_search() ) {
	      echo $before . __('Search for: "', CORE_THEME_NAME) . get_search_query() . '"' . $after;
	
	    } elseif ( is_day() ) {
	      echo $before . get_the_time('d') . $after;
	
	    } elseif ( is_month() ) {
	      echo $before . get_the_time('F') . $after;
	
	    } elseif ( is_year() ) {
	      echo $before . get_the_time('Y') . $after;
	
	    } elseif ( is_single() && !is_attachment() ) {
	      if ( get_post_type() != 'post' ) {
	      	$post_name = get_post_type();
	        $post_type = get_post_type_object(get_post_type());
	        $slug = $post_type->rewrite;
	        echo $before . $post_type->labels->menu_name . $after;
	        //if ($showCurrent == 1) echo ' ';
	      } else {
	      
	        if ($showCurrent == 1) echo $before . __('Blog', CORE_THEME_NAME). $after;;
	      }
	
	    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
	      $post_type = get_post_type_object(get_post_type());
	      echo $before . $post_type->labels->singular_name . $after;
	
	    } elseif ( is_attachment() ) {
	      $parent = get_post($post->post_parent);
	      $cat = get_the_category($parent->ID); $cat = $cat[0];
	      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
	      echo $before . $parent->post_title . $after;
	      if ($showCurrent == 1) echo ' ';
	
	    } elseif ( is_page() && !$post->post_parent ) {
	      if ($showCurrent == 1) echo $before . get_the_title() . $after;
	
	    } elseif ( is_page() && $post->post_parent ) {
	      $parent_id  = $post->post_parent;
	      $breadcrumbs = array();
	      while ($parent_id) {
	        $page = get_page($parent_id);
	        $breadcrumbs[] = get_the_title($page->ID);
	        $parent_id  = $page->post_parent;
	      }
	      $breadcrumbs = array_reverse($breadcrumbs);
	      for ($i = 0; $i < count($breadcrumbs); $i++) {
	        //echo $breadcrumbs[$i];
	        if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
	      }
	      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
	
	    } elseif ( is_tag() ) {
	      echo $before . __('Tag Archives: "', CORE_THEME_NAME ) . single_tag_title('', false) . '"' . $after;
	
	    } elseif ( is_author() ) {
	      global $author;
	      $userdata = get_userdata($author);
	      echo $before . __('by ', CORE_THEME_NAME) . $userdata->display_name . $after;
	
	    } elseif ( is_404() ) {
	      echo $before . __('404', CORE_THEME_NAME) . $after;
	    }
	
	    echo '';
	
	  }
		
	}
}



?>