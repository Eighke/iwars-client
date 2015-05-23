$script.ready('app', function(){
	$script(['jquery.form'], 'm_folder');

	$script.ready('m_folder', function() {
		IWars.page.m_folder = {
			init: function(){
				$('#formMakeFolder').on('submit', function(e) {
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

		IWars.page.m_folder.init();
	});
})
