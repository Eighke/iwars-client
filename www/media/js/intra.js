/**
 * Using: jQuery, Bootstrap, jQuery.notify
 * TODO: Check for http://addyosmani.github.io/basket.js/
 * TODO: Check for $.extend like in http://api.jquery.com/jQuery.getScript/
 */
(function(intra, $, undefined) {
	// Private vs Public reminder
	var isPrivate  = true;
	intra.isPublic = true;

	this.historyedited = false;
	this.hitoryCache   = [];
	this.test = '123';

	this.DEBUG   = true;
	this.options = {
		htmlContenant:    '#contenant',
		sideBarContenant: '#sidebar'
	};

	loader = $('<div>', {'class': 'loader'});

	intra.log = function( log ) {
		if ( log && DEBUG )
			console.log( log );

		return intra;
	};

	intra.setOptions = function (extend) {
		options = $.extend(options, extend);
	};

	intra.init = {
		all: function() {
			intra.init.loader();
			intra.init.history();
			intra.init.loadCache();
			intra.init.loadHtml();
			intra.init.tooltip();
		},
		history: function() {
			if (window.history && history.pushState) {
				$(window).bind('popstate', function(e) {
					if (historyedited) {
						intra.load.html(location.pathname + location.search);
						intra.active(hitoryCache[location.pathname]);
					}
				});
			}
		},
		loadCache: function() {
			$(document).on('click', 'a[data-load="cache"]', function(e){
				historyedited = true;
				hitoryCache[location.pathname] = $(this).parent().siblings().children('.active');

				intra.load.cache($(this));
				intra.active(this);

				e.preventDefault();
			});
		},
		loadHtml: function() {
			$(document).on('click', 'a[data-load="html"]', function(e){
				var URL  = $(this).attr('href');

				historyedited = true;
				hitoryCache[location.pathname] = $(this).parent().siblings().children('.active');

				intra.load.html(URL);
				intra.active(this);

				e.preventDefault();
			});
		},
		tooltip: function() {
			$('body').popover({
				selector: '[data-toggle=tooltip]',
				trigger: 'hover',
				placement: 'auto',
				title: function() {
					parts = $( this ).attr( "content" ).split('::', 2);
					return parts.length == 1 ? $( this ).attr( "title" ) : parts[0];
				},
				content: function() {
					parts = $( this ).attr( "content" ).split('::', 2)[1];
					return parts ? parts : $( this ).attr( "content" );
				},
				container: 'body'
			});
		},
		loader: function() {
			$(document).ready(function() {
				$('body').addClass('loaded');
			});
		}
	}

	intra.active = function(that) {
		if (!that.jQuery) {
			that = $(that);
		}

		that.parent().siblings().children('.active').removeClass('active');
		that.addClass('active');

		return true;
	}

	intra.load = {
		json: function(url, data) {
			base = {format: 'json'};
			data = $.extend(base, data);

			return $.ajax({
				url: url,
				data: data,
				dataType: 'json',
				error: function() {
					intra.notification('Error loading data!', 'error', 'Error', 5000);
				}
			});
		},
		html: function(url, data, contenantName, type) {
			base = {format: 'raw'};
			data = $.extend(base, data);

			contenantName = typeof contenantName !== 'undefined' ? contenantName : options.htmlContenant;
			contenant     = $(contenantName);

			return $.ajax({
				url: url,
				data: data,
				beforeSend : function() {
					contenant.css({'opacity' : '0.6'});
					loader.appendTo(contenant);
				},
				success: function(response) {

					html = $(response).find(contenantName).children();

					contenant.fadeOut('fast', function(){
						contenant.empty().append(html).fadeIn();

						history.pushState(null, null, url);
						contenant.css({'opacity' : '1'});

						intra.log('Load, HTML: ' + url);
					});
				},
				error: function() {
					contenant.css({'opacity' : '1'});
					loader.remove();

					intra.notification('Error loading data!', 'error', 'Error', 5000);
				}
			});
		},
		script: function(url, callback){
			$('script')
				.each(function () {
					return load = (url != $(this).attr('src'));
				});

			if (load) {
				var script = document.createElement("script")

				if (typeof callback !== 'undefined') {
					if (script.readyState){  //IE
						script.onreadystatechange = function(){
							if (script.readyState == "loaded" ||
									script.readyState == "complete"){
								script.onreadystatechange = null;
								callback();
							}
						};
					} else {  //Others
						script.onload = function(){
							callback();
						};
					}
				}

				script.src = url;
				document.getElementsByTagName("head")[0].appendChild(script);

				intra.log('Load, Script:' + url);

				return true;
			}

			return false;
		},
		stylesheet: function(url){
			$('link')
				.each(function () {
					return load = (url != $(this).attr('href'));
				});

			if (load) {
				$("head").append('<link rel="stylesheet" type="text/css" href="'+url+'" />');

				intra.log('Load, Stylesheet:' + url);
				return true;
			}
			return false;
		},
		cache: function(that) {
			// TODO
			// Cache  : HTML / Data / Both / None  Default: None
			// Inside : Local / Session / DOM      Default: Local
			// Reload : Never / MD5Check           Default: MD5Check

			// Actually
			// Cache  : HTML / None                Default: None
			// Inside : Local                      Default: Local
			// Reload : Md5Check                   Default: MD5Check

			// Manage string URL used in Hitory.
			// Better just loading cache?
			if ($.type( that ) === 'object') {
				url = that.attr('href');
				type = typeof that.data('type') !== 'undefined' ? that.data('type') : 'raw';
			} else {
				url = that;
				type = 'raw';
			}

			// TODO: Override the contenant with data-contenant
			contenant = $('.main > div');

			currentUrl = window.location.pathname + window.location.search;
			currentName = document.location.pathname.match(/[^\/]+$/)[0].split(".")[0];
			callUrl = url;
			callName = callUrl.match(/[^\/]+$/)[0].split(".")[0];

			contenant.css({'opacity' : '0.3'});
			loader.appendTo('.main');

			/**
			 * @type
			 * 		stored: Store the HTML of the page in LocalStorage
			 * 		raw: Always reload the HTML, no cache (default)
			 */
			if (type == 'stored') {

				if (!Intra.cache.isCached('page_'+callName)) {

					load = Intra.load.json(url, {format: 'raw'});
					load.done(function(response) {

						Intra.cache.store('page_'+callName, response);
						Intra.cache.store('page_'+callName, { md5: response.md5 }, 'session');

						history.pushState(null, null, url);
						contenant.empty()
								.hide()
								.css({'opacity' : '1'})
								.html( $.parseHTML(response.html) )
								.fadeToggle('fast');

						console.log('loadPage, Load, Stored, No cache: ' + callName);

					}).fail(function(response){
						contenant.css({'opacity' : '1'});
						Intra.notification('Error loading the page!', 'error', null, 10000);
					}).always(function(){
						loader.remove();
					});
				}
				else {

					data = Intra.cache.load('page_'+callName);
					session = Intra.cache.load('page_'+callName, 'session');

					/**
					 * Check if the [MD5] isn't in session, reloading the page only if the MD5 has changed.
					 */
					if (!session.md5) {

						// Loading the page, send the current MD5
						load = Intra.load.json(url, {format: 'raw', md5: data.md5 });

						load.done(function(response) {

							if (response.html) {
								data.html = response.html;
								data.md5 = response.md5;
							}

							Intra.cache.store('page_'+callName, data);
							Intra.cache.store('page_'+callName, { md5: data.md5 }, 'session');
						});
						contenant.fadeOut('fast', function () {

							history.pushState(null, null, url);
							contenant.empty()
									.hide()
									.css({'opacity' : '1'})
									.html($.parseHTML(data.html))
									.fadeToggle('fast');

							loader.remove();
							console.log('loadPage, Load, Stored, NoMD5: ' + callName);
						});
					}
					else {

						contenant.fadeOut('fast', function () {

							history.pushState(null, null, url);
							contenant.empty()
									.hide()
									.css({'opacity' : '1'})
									.html($.parseHTML(data.html))
									.fadeToggle('fast');

							loader.remove();
							console.log('loadPage, Load, Stored, MD5: ' + callName);
						});
					}
					/** [/MD5] */
				}
			}
			else if (type == 'raw') {

				load = Intra.load.json(url, {format: 'raw'});
				load.done(function(response) {

					if (response.timeout != 1) {
						contenant.empty()
								.hide()
								.css({'opacity' : '1'})
								.html( response.html )
								.fadeToggle('fast');

						history.pushState(null, null, url);
						IWars.refreshRessources(response.ressources);

						console.log('loadPage, Load, Raw: ' + callName);
						if (!Intra.load.script( "templates/system/"+callName+".js" )) {
							IWars.page[callName].init()
						}
					} else {
						// TODO: Ouvrir une popup avec Login et Password
						window.location.href = './login.php';
					}

				}).fail(function(response){
					contenant.css({'opacity' : '1'});
					Intra.notification('Error loading the page!', 'error', null, 10000);
				}).always(function(){
					loader.remove();
				});
			}

			return false;
		}
	}

	/**
	 * Manage notification using jQuery.notify
	 *
	 * @param  string|object  options  Can be an object of options or a string with the notification text
	 * @param  [string]       type     (optional) The notice type [error, warning, success, info], default: info
	 * @param  [string]       title    (optional) The notice title
	 * @param  [integer]      delay    (optional) The fadeout delay in ms, default: 2000
	 * @return object                  intra
	 *
	 * @use: notification({title:'Notification', 'type':'success'})
	 * @use: notification('Notification', 'success', 'Title', 2500)
	 */
	intra.notification = function(options, type, title, delay) {
		var base = {
			type:        'info',
			delay:       2000,
			position:    'top center',
			autoHide:    true,
			clickToHide: true
		}

		if (!$.isPlainObject(options)) {
			options = {
				text:  options,
				title: title,
				type:  type,
				delay: delay
			};
		}
		options = $.extend(base, options);

		// Using fontello icon TODO: Use global configuration
		if(options.type == "error") {
			icon = "icon-alert";
		} else if(options.type == "warning") {
			icon = "icon-attention";
		} else if(options.type == "success") {
			icon = " icon-ok-circle";
		} else if(options.type == "info") {
			icon = "icon-lamp-1";
		} else {
			icon = "icon-info-1";
		}

		$.notify({
			title: options.title,
			text: options.text,
			image: '<i class="' + icon + '"></i>'
		}, {
			style: 'metro',
			className: options.type,
			globalPosition:options.position,
			showAnimation: "show",
			showDuration: 0,
			hideDuration: 0,
			autoHideDelay: options.delay,
			autoHide: options.autoHide,
			clickToHide: options.clickToHide
		});

		return intra;
	};

	/**
	 * Manage cache using localStorage
	 */
	intra.cache = {
		localStoreSupport : function() {
			try {
				return 'localStorage' in window && window['localStorage'] !== null;
			} catch (e) {
				intra.log('localStorage not avalaible!');
				return false;
			}
		},
		store: function(key, obj, type) {
			// Check: localStorage supported or not.
			if ( this.localStoreSupport() ) {
				// Default localStorage
				type = type == 'session' ? sessionStorage : localStorage;

				var data  = JSON.stringify(obj);
				type[key] = data;

				intra.log('Cache, Store: ' + key);
				return true;
			}
			return false;
		},
		load: function(key, type) {
			// Check: localStorage supported or not.
			if( this.localStoreSupport() ){
				// Default
				type = type == 'session' ? sessionStorage : localStorage;

				intra.log('Cache, Load: ' + key);

				// If we have data, lets turn it into an object, otherwise return false
				if(type[key]){
					return jQuery.parseJSON(type[key]);
				}
				return null;
			}
			return false;
		},
		isCached: function(key, type) {
			// Check: localStorage supported or not.
			if( this.localStoreSupport() ){
				// Default
				type = type == 'session' ? sessionStorage : localStorage;

				console.log('Cache, isCached: ' + key);
				return (type[key] ? true : false);
			}
			return false;
		}
	};
}( window.Intra = window.Intra || {}, jQuery ));