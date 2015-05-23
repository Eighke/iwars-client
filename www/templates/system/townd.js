$script.ready('app', function(){
	$script(['jquery.form'], 'townd');

	$script.ready('townd', function() {
		IWars.page.townd = {
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

		IWars.page.townd.init();
	});
})