var pageCache = {};
var loader = $('<div>', {'class': 'loader'});

$(document).ready(function() {
	if (window.history && history.pushState) {
		historyedited = false;
		$(window).bind('popstate', function(e) {
			if (historyedited) {
				loadPageOld(location.pathname + location.search);
			}
		});
	}
});

$(document).on('click', "a[rel='page']", function(e){
	e.preventDefault();

	loadPageOld($(this).attr('href'));
	historyedited = true;
	history.pushState(null, null, $(this).attr('href'));
});

var localCache = {
	localStoreSupport : function() {
		try {
			return 'localStorage' in window && window['localStorage'] !== null;
		} catch (e) {
			return false;
		}
	},
	store: function(key, obj, type) {
		// Default localStorage
		type = type == 'session' ? sessionStorage : localStorage;

		var data = JSON.stringify(obj);

		// Check: localStorage supported or not.
		if ( this.localStoreSupport() ) {
			type[key] = data;
			console.log('localCache, Store, localStorage: ' + key);
		}
		// Fallback: Store data in the DOM using jQuery.data().
		else {
			jQuery.data(key, data);
			console.log('localCache, Store, jQueryData: ' + key);
		}
	},
	load: function(key, type) {
		// Default
		type = type == 'session' ? sessionStorage : localStorage;

		var data;

		// Check: localStorage supported or not.
		if( this.localStoreSupport() ){
			data = type[key];
			console.log('localCache, Load, localStorage: ' + key);
		}
		// Fallback: Load data from the DOM using jQuery.data().
		else {
			data = jQuery.data(key);
			console.log('localCache, Load, jQueryData: ' + key);
		}

		// If we have data, lets turn it into an object, otherwise return false
		if(data){
			return jQuery.parseJSON(data);
		}
		return false;
	},
	isCached: function(key, type) {
		// Default
		type = type == 'session' ? sessionStorage : localStorage;

		// Check: localStorage supported or not.
		if( this.localStoreSupport() ){
			console.log('localCache, isCached, localStorage: ' + key);
			return (type[key] ? true : false);
		}
		// Fallback: Check data from the DOM using jQuery.data().
		else {
			console.log('localCache, isCached, jQueryData: ' + key);
			return (jQuery.data(key) ? true : false);
		}
	}
};

var loadPage = {

	loadJSON: function(url, data) {

		return $.ajax({
			url: url,
			data: data,
			dataType: 'json'
		});
	},
	loadHTML: function(url, data, contenant, type) {

		// Added format
		if (url.split("?")[1]) {
			pageUrl = url+'&format=raw';
		} else {
			pageUrl = url+'?format=raw';
		}

		contenant = $(contenant);

		$.ajax({
			url: url,
			data: data,
			beforeSend : function() {
				contenant.css({'opacity' : '0.3'});
				loader.appendTo('#sticky');
			},
			success: function(response) {

				contenant.fadeOut('fast', function () {
					cache = contenant.detach();
					cache.css({'opacity' : '1'});

					localCache.store('build_'+id, { 'html' : cache.html(), 'md5' : 'asd'});

					$('#sticky').html(response.html).hide().fadeToggle('fast');
				});
			},
			error: function() {

				//TODO: Restorer le précédant + afficher une erreur
			},
			complete: function() {

			},
			dataType: 'json'
		});
	},
};

var gameAlert = {
	send: function(type, msg, delay) {
		delay = typeof delay !== 'undefined' ? delay : 2000;

		contenant = $('#messages');

		alert = $('<div/>').addClass('alert alert-'+ type +' alert-dismissable fade in').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + msg).hide();
		alert.appendTo(contenant).fadeIn('fast').delay(delay).fadeOut('fast');
	}
};

function loadPageOld(url) {

	currentUrl	= window.location.pathname + window.location.search;
	callUrl		= url;

	if (callUrl.split("?")[1]) {
		pageUrl = callUrl+'&format=raw';
	} else {
		pageUrl = callUrl+'?format=raw';
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
};