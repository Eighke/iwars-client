(function(intra, $, undefined) {
	intra.init.history = function() {
		if (window.history && history.pushState) {
			$(window).bind('popstate', function(e) {
				if (historyedited) {
					intra.load.cache(location.pathname + location.search);
					intra.active(hitoryCache[location.pathname]);
				}
			});
		}
	}
	intra.init.countdown = function() {
		var countdown = $(".countdown");

		if (countdown[0]) {
			countdown.countDown({
				dayText : ' ',
				daysText : ' ',
				displayDays : false,
				displayZeroDays : false,
				serverTime : serverTime
			});
		}
	}

	intra.refreshRessources = function(ressources) {

		contenant = $('#ress');
		contenant.find('.r1 .ress').html(ressources[1]);
		contenant.find('.r2 .ress').html(ressources[2]);
		contenant.find('.r3 .ress').html(ressources[3]);
		contenant.find('.r4 .ress').html(ressources[4]);
	}

	intra.parseMessages = function(datas) {
		if (datas.valid) {
			IWars.notification(datas.valid, 'success');
		}
		if (datas.warning) {
			IWars.notification(datas.warning, 'warning');
		}
		if (datas.error) {
			IWars.notification(datas.error, 'error');
		}
		if (datas.info) {
			IWars.notification(datas.info, 'info');
		}
	}

	intra.page = {}
}( window.IWars = window.IWars || window.Intra, jQuery ));

IWars.init.loader();
IWars.init.history();
IWars.init.tooltip();
IWars.init.loadCache();

$('#search').on('submit', function(e) {
	var url = $(this).attr('action');
	var fullUrl = url + '?' + $(this).serialize()

	IWars.load.cache(fullUrl);

	e.preventDefault();
});
