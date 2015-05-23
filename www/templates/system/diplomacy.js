$script.ready('app', function(){
	$script(['jquery.form'], 'diplomacy');

	$script.ready('diplomacy', function() {
		IWars.page.diplomacy = {
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

		IWars.page.diplomacy.init();
	});
})