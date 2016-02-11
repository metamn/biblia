jQuery(document).ready(function($) {
	
	"use strict";

/*-----------------------------------------------------------------------------------*/
/*	Load More Button
/*-----------------------------------------------------------------------------------*/
core_getposts();
	//var dt = false;

	function core_getposts(pageNum, max, nextLink, count) {

	 	if(typeof core != 'undefined') {

		 	jQuery('#load-more.disabled').click(function() { return false; });
		 	
		 	var content = '';
		 	
		 	if(jQuery('#ajax-container').hasClass('blog-grid-layout')) {
		 		
		 		var content = '.blog-grid';
		 		
		 	} else {
		 		
		 		var content = '.hentry';
		 	}

			if(!pageNum) {
				// The number of the next page to load (/page/x/).
				var pageNum = parseInt(core.startPage) + 1;
			}

			if(!max) {
				// The maximum number of pages the current query can return.
				var max = parseInt(core.maxPages);
			}

			if(!nextLink) {
				// The link of the next page of posts.
				var nextLink = core.nextLink;
			}

			if(!count) {
				var count = parseInt(jQuery('.count').text());
			}

			/**
			 * Replace the traditional navigation with our own,
			 * but only if there is at least one page of new posts to load.
			 */
		
			
			if(pageNum <= max) {
				

				// Remove the traditional navigation.
				jQuery('.navigation').remove();

			} else {

				jQuery('#load-more').addClass('disabled');

			}

			/**
			 * Load new posts when the link is clicked.
			 */
			jQuery('#load-more').not('.disabled').click(function() {

				//debug
				//console.log('DEBUG INFO...');
				//console.log('The Next Link Number '+ nextLink);
				//console.log('The Max Number of Pages '+ max);
				//console.log('The Current Page Num '+ pageNum);
				//console.log(content);

				//jQuery(this).unbind('click', core_getposts());

				// Are there more posts to load?
				if(pageNum <= max) {
					
					if(jQuery('#ajax-container').hasClass('blog-grid-layout')) {
						jQuery('#load-more-wrapper')
							.before('<div id="ajax-container-new-'+ pageNum + '"class="row"></div>');
							console.log("content blog-grid" + content);
					}
					
					if(jQuery('#ajax-container').hasClass('blog-list-layout')) {
						jQuery('#load-more')
							.before('<div id="ajax-container-new-'+ pageNum + '"class=""></div>');
							console.log("content blog-grid" + content);
					}
					// Show that we're working.
					jQuery('#load-more i').removeClass('fa-refresh').addClass('fa-refresh fa-spin');
					
					
					jQuery('#ajax-container-new-'+pageNum).load(nextLink + " " +content,
						function() {
							$( this ).hide().fadeIn(500);

									// Update page number and nextLink.
									pageNum++;
									nextLink = nextLink.replace(/\/page\/[0-9]?/, '/page/'+ pageNum);
									
									if(jQuery('#ajax-container').hasClass('blog-grid-layout')) {
										jQuery('#load-more-wrapper')
											.before('<div id="ajax-container-new-'+ pageNum + '"class="row"></div>');
											//console.log("content blog-grid" + content);
											
									}
									
									if(jQuery('#ajax-container').hasClass('blog-list-layout')) {
										jQuery('#load-more-wrapper')
											.before('<div id="ajax-container-new-'+ pageNum + '"class=""></div>');
											//console.log("content blog-list" + content);
									}
									
	
									// Update the button message.
									if(pageNum <= max) {

										jQuery('#load-more i').removeClass('fa-refresh fa-spin').addClass('fa-refresh');

									} else {
	
										jQuery('#load-more').text('No more items to show');

									}
 
						}
					);
				}

				return false;

			});

		}

	}
});