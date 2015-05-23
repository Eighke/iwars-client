$script.ready('app', function(){
	$script(['jquery.form', 'jquery.sceditor.bbcode.min', 'jquery-charcount'], 'aally');
	IWars.load.stylesheet('media/css/sceditor/buttons.min.css');

	$script.ready('aally', function() {
		IWars.page.aally = {
			init: function(){
				$("textarea").sceditor({
					plugins: 'bbcode',
					toolbarExclude: 'rtl,ltr,youtube,unlink,link,email,image,quote,code,table,orderedlist,font,superscript,subscript',
					emoticonsEnabled: false,
					style: "./media/css/jquery.sceditor.default.min.css",
					autoUpdate: true
				})

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

		IWars.page.aally.init();
	});
})