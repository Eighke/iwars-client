$script.ready('app', function(){
	$script(['jquery.form', 'jquery-charcount'], 'ally');

	$script.ready('ally', function() {
		IWars.page.ally = {
			init: function(){
				$("#msg").charCount();

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

		IWars.page.ally.init();
	});
})