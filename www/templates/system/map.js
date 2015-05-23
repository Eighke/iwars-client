$script.ready('app', function(){
	//$script(['jquery.form'], 'map');

	//$script.ready('map', function() {
		IWars.page.map = {
			init: function(){
				$('form').on('submit', function(e) {
					var url = $(this).attr('action');
					var fullUrl = url + '?' + $(this).serialize()

					IWars.load.cache(fullUrl);

					e.preventDefault();
				});
			}
		}

		IWars.page.map.init();
	//});
})