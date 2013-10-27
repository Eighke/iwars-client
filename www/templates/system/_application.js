(function($) {
	$('body').popover({
	    selector: '[data-toggle=tooltip]',
	    trigger: 'hover',
	    placement: 'auto',
	    title: function() {
	    	parts = $( this ).attr( "content" ).split('::', 2);
	    	return parts.length == 1 ? '' : parts[0];
	    },
	    content: function() {
	    	parts = $( this ).attr( "content" ).split('::', 2)[1];
	    	return parts ? parts : $( this ).attr( "content" );
	    },
	    container: 'body'
	});
})(jQuery);