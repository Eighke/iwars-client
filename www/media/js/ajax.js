var pageCache = {};
var loader = $('<div>', {'class': 'loader'});

$(document).ready(function() {
	if (window.history && history.pushState) {
		historyedited = false;
		$(window).bind('popstate', function(e) {
			if (historyedited) {
				loadPage(location.pathname + location.search);
			}
		});
	}
});

$(document).on('click', "a[rel='page']", function(e){
	e.preventDefault();

	loadPage($(this).attr('href'));
	historyedited = true;
	history.pushState(null, null, $(this).attr('href'));
});

function loadPage(url) {

	currentUrl	= window.location.pathname + window.location.search;
	callUrl		= url;

	if (callUrl.split("?")[1]) {
		pageUrl = callUrl+'&format=ajax';
	} else {
		pageUrl = callUrl+'?format=ajax';
	}

	contenant	= $('.main > div');
	id = 1;

	$.ajax({
		url: pageUrl,
		//data: { id: call },
		beforeSend : function() {
			contenant.css({'opacity' : '0.3'});
			loader.appendTo('.main');
		},
		success: function(data) {

			contenant.fadeOut('fast', function () {
				pageCache[id] = contenant.detach();
				pageCache[id].css({'opacity' : '1'});

				$('.main').html(data).find('> div').hide().fadeToggle('fast');
			});
		},
		dataType: 'html'
	});

	return false;
}