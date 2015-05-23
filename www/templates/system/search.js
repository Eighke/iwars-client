$script.ready('app', function(){
	$script(['jquery.form'], 'search');

	$script.ready('search', function() {
		IWars.page.search = {
			init: function(){
				$('form').on('submit', function(e) {
					var url = $(this).attr('action');
					var fullUrl = url + '?' + $(this).serialize()

					IWars.load.cache(fullUrl);

					e.preventDefault();
				});
			}
		}

		IWars.page.search.init();
	});
})