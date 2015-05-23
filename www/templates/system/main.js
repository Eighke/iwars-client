$script.ready('app', function(){
	$script(['jquery.form', 'countdown'], 'main');

	$script.ready('main', function() {
		IWars.page.main = {
			init: function(){
				IWars.init.countdown();

				$('.upload a').click(function(e){
					var div = $('.upload div');

					$('.upload > span').hide();
					div.show("clip", 200);

					e.preventDefault();
				});

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

		IWars.page.main.init();
	});
})