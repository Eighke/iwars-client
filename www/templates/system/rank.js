$script.ready('app', function(){
	$script(['jquery.form'], 'rank');

	$script.ready('rank', function() {
		IWars.page.rank = {
			init: function(){
				$('form select').on('change', function(e) {
					$(this).parents('form').submit();
				});

				$('form').on('submit', function(e) {
					var url = $(this).attr('action');
					var fullUrl = url + '?' + $(this).serialize()

					IWars.load.cache(fullUrl);

					e.preventDefault();
				});
			}
		}

		IWars.page.rank.init();
	});
})
