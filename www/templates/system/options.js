$script.ready('app', function(){
	$script(['jquery.form'], 'options');

	$script.ready('options', function() {
		IWars.page.options = {
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

		IWars.page.options.init();
	});
})