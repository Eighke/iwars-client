/*
 * 	Character Count Plugin - jQuery plugin
 * 	Dynamic character count for text areas and input fields
 *	Written by Alen Grakalic	
 *	http://cssglobe.com/post/7161/jquery-plugin-simplest-twitterlike-dynamic-character-count-for-textareas
 *  Adapted by Eighke
 *  http://www.multi-site.net
 *
 *	Copyright (c) 2009 Alen Grakalic (http://cssglobe.com)
 *	Dual licensed under the MIT (MIT-LICENSE.txt)
 *	and GPL (GPL-LICENSE.txt) licenses.
 *
 *	Built for jQuery library
 *	http://jquery.com
 *
 */

(function($) {

	$.fn.charCount = function(options){
	  
		// default configuration properties
		var defaults = {
			allowed: 250,
			warning: 25,
			css: 'counter',
			counterElement: 'span',
			cssWarning: 'warning',
			cssExceeded: 'error',
			counterText: 'Maximum characters: '
		}; 
			
		var options = $.extend(defaults, options); 

		var areaId	= $(this).attr('id');
		var countId	= '#'+ areaId +'_'+ options.css;

		if (!$(countId).size()) {
			$(this).after(options.counterText + '<'+ options.counterElement +'id="'+ countId +'" class="'+ options.css +'">'+ options.allowed +'</'+ options.counterElement +'>');
		} else if ($(countId).text() > 0) {
			options.allowed = $(countId).text();
		}
		
		function calculate(obj) {

			var count = $(obj).val().length;
			var available = options.allowed - count;

			if(available <= options.warning && available >= 0){
				$(countId).addClass(options.cssWarning);
			} else {
				$(countId).removeClass(options.cssWarning);
			}
			if(available < 0){
				$(countId).addClass(options.cssExceeded);
			} else {
				$(countId).removeClass(options.cssExceeded);
			}

			$(countId).text(available);
		};

		this.each(function() {
			calculate(this);
			$(this).keyup(function(){calculate(this)});
			$(this).change(function(){calculate(this)});
		});
	  
	};

})(jQuery);
