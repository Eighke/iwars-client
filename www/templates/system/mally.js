$script.ready('app', function(){
	$script(['jquery.form'], 'mally');

	$script.ready('mally', function() {
		IWars.page.mally = {
			init: function(){
				$('form').on('submit', function(e) {
					e.preventDefault();

					$(this).ajaxSubmit({
						data: {format: 'json'},
						dataType: 'json',
						success: function(response) {

							if (response.messages) {
								IWars.parseMessages(response.messages);
							}
						}
					});
				});
			}
		}

		IWars.page.mally.init();
	});
})