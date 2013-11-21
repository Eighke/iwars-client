$(document).ready(function(){
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
});

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

$('.elem-name a').click(function(e){
	e.preventDefault();

	call = $(this);
	callId = call.attr('href').split('=')[1];

	contenant = $('#sticky > div');

	// Create the template if not already cached
	if (!localCache.isCached('tpl_build', 'session')) {
		localCache.store('tpl_build', { 'html' : contenant.clone().html()}, 'session');
	}

	id = contenant.attr('id').substr(1);

	if (callId == id) {
		return
	}
	// If the HTML is in cache we display it
	else if (localCache.isCached('build_'+callId, 'session')) {

		pageCached = localCache.load('build_'+callId, 'session');
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
			if (!localCache.isCached('data_build_'+callId)) {

				advInfo.find('div').css({'opacity' : '0.3'});
				loader.appendTo(advInfo);

				load = loadPage.loadJSON('./build.php', {id: callId, format: 'json'});
				load.done(function(response) {
					localCache.store('data_build_'+callId, response);

					renderInfos(response);

					loader.remove();
				});
			} else {
				json = localCache.load('data_build_'+callId);
				renderInfos(json);
			}
		}
	} else {

		// If the JSON data isn't load
		if (!localCache.isCached('data_build_'+callId)) {

			contenant.css({'opacity' : '0.3'});
			loader.appendTo('#sticky');

			load = loadPage.loadJSON('./build.php', {id: callId, format: 'json'});
			load.done(function(response) {
				localCache.store('data_build_'+callId, response);
				renderBuild(response);
			});
		} else {
			json = localCache.load('data_build_'+callId);
			renderBuild(json);
		}
	}
});

function renderBuild(json) {

	pageCached = localCache.load('tpl_build', 'session');
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
		renderInfos(json);
	} else {
		pageDOM.find('#advInfo').remove();
	}

	$('#sticky > div').remove();
	pageDOM.hide().appendTo('#sticky').fadeIn('fast');

	localCache.store('build_'+callId, { 'html' : pageDOM.html()}, 'session');
}

function renderInfos(json) {

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

// Building countdown
$(".countdown").countDown({
	dayText : ' ',
	daysText : ' ',
	displayDays : false,
	displayZeroDays : false,
	serverTime : serverTime
});