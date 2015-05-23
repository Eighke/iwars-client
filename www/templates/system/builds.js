$script.ready('app', function(){
	$script(['countdown'], 'builds');

	$script.ready('builds', function() {
		IWars.page.builds = {
			init: function(){
				IWars.init.countdown();

				var that = this;

				/* [Scroll] */
				var topHeight = $('#top').height() + 30;

				var obj = $('#sticky');
				var offset = obj.offset();
				var topOffset = offset.top-topHeight;
				var leftOffset = offset.left;
				var marginTop = obj.css("marginTop");
				var marginLeft = obj.css("marginLeft");

				$(window).scroll(function() {
					var scrollTop = $(window).scrollTop();

					if (scrollTop >= topOffset){
						obj.css({
							marginTop: -topOffset,
							position: 'fixed',
						});
					}

					if (scrollTop < topOffset){
						obj.css({
							marginTop: marginTop,
							position: 'relative',
						});
					}
				});
				/* End [Scroll] */


				/* TODO
				 * Refonte à faire :
				 * - Vérification si la template HTML existe
				 * 		- Si non, la créer à partir de l'élément existant
				 * 		(TODO: Il faudra par la suite récupérer un vrai template du server)
				 * - Vérification si la page est en cache (sessionStorage)
				 * 		- Si oui, on l'affiche puis on relance l'affichage des Avancé et TODO Informations
				 * - Vérification si les données JSON du bâtiments sont en caches
				 * 		- Si non, lancement de l'Ajax pour les récupérer
				 * 		- Ensuite on crée la page via le template + les données
				 * 		- On stocke enfin le résultat dans le cache (sessionStorage)
				 * /TODO
				 */
				$('.elem-name a').on('click', function(e){
					e.preventDefault();

					call = $(this);
					callId = call.attr('href').split('=')[1];

					contenant = $('#sticky > div');

					// Create the template if not already cached
					if (!IWars.cache.isCached('tpl_build', 'session')) {
						IWars.cache.store('tpl_build', { 'html' : contenant.clone().html()}, 'session');
					}

					id = contenant.attr('id').substr(1);

					if (callId == id) {
						return
					}
					// If the HTML is in cache we display it
					else if (IWars.cache.isCached('build_'+callId, 'session')) {

						pageCached = IWars.cache.load('build_'+callId, 'session');
						pageDOM = $('<div/>', {id: 'b'+callId}).append( $.parseHTML(pageCached.html) );

						contenant.remove();
						pageDOM.hide().appendTo('#sticky').fadeIn('fast');

						/*// Refresh Information block if exist
						normInfo = pageDOM.find('#normInfo');

						if (normInfo.length != 0) {
							normInfo.find('div').css({'opacity' : '0.3'});
							loader.appendTo('#normInfo');
						}*/

						// Refresh Advanced block if exist
						// TODO: Si on est déjà sur le dernier niveau ça sert a rien de refresh
						advInfo = pageDOM.find('#advInfo');

						if (advInfo.length != 0) {

							table = $('#advInfo tbody');

							// If the JSON data isn't load
							if (!IWars.cache.isCached('data_build_'+callId)) {

								advInfo.find('div').css({'opacity' : '0.3'});
								loader.appendTo(advInfo);

								load = IWars.load.json('./build.php', {id: callId, format: 'json'});
								load.done(function(response) {
									IWars.cache.store('data_build_'+callId, response.datas);

									that.renderInfos(response.datas);

									loader.remove();
								});
							} else {
								json = IWars.cache.load('data_build_'+callId);
								that.renderInfos(json);
							}
						}
					} else {

						// If the JSON data isn't load
						if (!IWars.cache.isCached('data_build_'+callId)) {

							contenant.css({'opacity' : '0.3'});
							loader.appendTo('#sticky');

							load = IWars.load.json('./build.php', {id: callId, format: 'json'});
							load.done(function(response) {
								IWars.cache.store('data_build_'+callId, response.datas);
								that.renderBuild(response.datas);
							});
						} else {
							json = IWars.cache.load('data_build_'+callId);
							that.renderBuild(json);
						}
					}
				});
			},
			renderBuild: function(json) {
				var that = this;

				pageCached = IWars.cache.load('tpl_build', 'session');
				pageDOM = $('<div/>', {id: 'b'+callId}).append( $.parseHTML(pageCached.html) );

				pageDOM.find('a').attr('href', 'build.php?id='+callId);
				pageDOM.children('h2').text(json.build.name);
				pageDOM.find('img').attr('src', skin+'build/b'+callId+'k10.jpg');
				pageDOM.find('.time > span').text(json.build.time);
				pageDOM.find('.r1 > span').text(json.build.ress[1]);
				pageDOM.find('.r2 > span').text(json.build.ress[2]);
				pageDOM.find('.r3 > span').text(json.build.ress[3]);
				pageDOM.find('.points').text(json.build.points);
				pageDOM.find('.desc').text(json.build.desc);

				if (json.build.advanced) {
					table = pageDOM.find('#advInfo tbody');
					that.renderInfos(json);
				} else {
					pageDOM.find('#advInfo').remove();
				}

				$('#sticky > div').remove();
				pageDOM.hide().appendTo('#sticky').fadeIn('fast');

				IWars.cache.store('build_'+callId, { 'html' : pageDOM.html()}, 'session');
			},
			renderInfos: function(json) {

				table.empty();

				var length = json.build.advanced.length, element = null;
				for (var i = 0; i < length; i++) {
					element = json.build.advanced[i];

					level = $('<td/>').addClass('text-center').text(element.level);
					text = $('<td/>').text(element.text);
					tr = $('<tr/>').append(level).append(text)

					if (call.data('level') < element.level) {
						tr.addClass('danger').appendTo(table);
						break;
					} else {
						tr.appendTo(table);
					}
				}
			}
		}

		IWars.page.builds.init();
	});
})