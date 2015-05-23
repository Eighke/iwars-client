$script.ready('app', function(){
	//$script(['jquery.sceditor.bbcode.min', 'jquery-charcount'], 'aally');

	//$script.ready('aally', function() {
		IWars.page.reports = {
			init: function(){

				$('[data-toggle=publish]').on('click', function(e){
					e.preventDefault();

					var that = $(this);
					var callURL = that.attr('href');

					localLoader = loader.clone();
					localLoader.appendTo(that.parents('.item'));
					that.removeClass('glyphicon-lock').addClass('glyphicon-refresh icon-refresh-animate');

					load = IWars.load.json(callURL, {format: 'json'});
					load.done(function(response) {

						if (response.messages.valid) {

							if (that.data('type') == 'publish') {
								task = 'unpublish';
								textClass= 'success';
							} else {
								task = 'publish';
								textClass= 'warning';
							}

							callId = that.attr('href').split('=')[2];
							newURL = 'reports.php?task=' + task + '&id=' + callId;
							that.attr('href', newURL);

							that.removeClass('text-warning text-success').addClass('glyphicon-lock text-' + textClass);
							that.data('type', task);
							IWars.notification(response.messages.valid, 'success');
						} else {
							IWars.notification(response.messages.warning, 'warning');
							that.addClass('glyphicon-lock');
						}
					}).fail(function(){
						that.addClass('glyphicon-remove');
						that.attr('href', '');
					}).always(function(){
						localLoader.remove();
						that.removeClass('glyphicon-refresh icon-refresh-animate');
					});
				});

				// Update remote of modal
				$('body').on('hidden.bs.modal', '.modal', function () {
					$(this).removeData('bs.modal');
				});
			}
		}

		IWars.page.reports.init();
	//});
})