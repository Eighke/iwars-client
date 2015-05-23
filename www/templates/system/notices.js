$script.ready('app', function(){
	$script(['jquery.icheck.min'], 'notices');
	IWars.load.stylesheet('media/css/icheck/polaris/polaris.css');

	$script.ready('notices', function() {
		IWars.page.notices = {
			init: function(){
				$('input').iCheck({
					checkboxClass: 'icheckbox_polaris',
					radioClass: 'iradio_polaris',
					increaseArea: '-10%' // optional
				});

				$('#reverse').on('ifToggled', function(event){
					$('.notice input').iCheck('toggle');
				});

				$('.msg-title > a').click(function(e){
					e.preventDefault();

					call = $(this);
					callId = call.attr('href').split('=')[1];

					load = call.data('load');

					if (load == '1') {
						call.parent().parent().find('.msg-body').fadeToggle('fast');
					} else {

						loader.appendTo(call);

						load = IWars.load.json('./notices.php', {id: callId, view: 'item', format: 'json'});
						load.done(function(response) {
							pageDOM = $('<div/>', {class: 'msg-body'}).html(response.datas.item.text).hide();
							pageDOM.appendTo(call.parent().parent()).fadeIn('fast');

							call.removeClass();
							call.data('load', '1');
							loader.remove();
						});
					}
				});

				$('.msg-title .button a').click(function(e){
					e.preventDefault();

					call = $(this);
					callId = call.attr('href').split('=')[2];

					localLoader = loader.clone();
					localLoader.appendTo(call.parent().parent());
					call.css({'opacity' : '0.3'});

					load = IWars.load.json('./notices.php', {id: callId, view: 'item', task: 'delete', format: 'json'});
					load.done(function(response) {

						if (response.messages.valid) {
							call.parent().parent().parent().fadeOut('slow');
							IWars.notification(response.messages.valid, 'success');
						} else {
							IWars.notification(response.messages.error, 'error');
						}
					});
				});
			}
		}

		IWars.page.notices.init();
	});
})