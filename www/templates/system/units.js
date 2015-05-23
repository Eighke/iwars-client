$script.ready('app', function(){
	$script(['jquery.form'], 'units');

	$script.ready('units', function() {
		IWars.page.units = {
			init: function(){
				$('form').on('submit', function(e) {
					e.preventDefault();

					$(this).ajaxSubmit({
						data: {format: 'json'},
						dataType: 'json',
						success: function(response) {

							if (response.messages.valid) {
								IWars.notification(response.messages.valid, 'success');
							} else {
								IWars.notification(response.messages.warning, 'warning');
							}
						}
					});
				});
			}
		}

		IWars.page.units.init();
	});
})