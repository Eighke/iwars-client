$script.ready('app', function(){
	$script(['jquery.form'], 'm_msg');

	$script.ready('m_msg', function() {
		IWars.page.m_msg = {
			init: function(){
				$('.step0, .step1').on('submit', function(e) {
					var url = $(this).attr('action');
					var fullUrl = url + '?' + $(this).serialize()

					IWars.load.cache(fullUrl);

					e.preventDefault();
				});

				$('.step3').on('submit', function(e) {
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

		IWars.page.m_msg.init();
	});
})