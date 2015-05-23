$script.ready('app', function(){
	//$script(['jquery.sceditor.bbcode.min', 'jquery-charcount'], 'msgs');
	//TODO: Problem avec IWMsg

	//$script.ready('msgs', function() {
		IWars.page.msgs = {
			init: function(){
				that = this;

				$('.message').on('click', function(e){
					var msgId = $(this).data('id');

					that.show(msgId);
					e.preventDefault();
				})

				$('form').on('submit', function(e) {
					var url = $(this).attr('action');
					var fullUrl = url + '?' + $(this).serialize()

					IWars.load.cache(fullUrl);

					e.preventDefault();
				});
			},
			show: function(mid) {
				$.getJSON('./scripts/json/msg.php', { info: mid }, function(msg) {

					contenant = $('#msg');
					if (contenant.size()) {
						loader.appendTo(contenant);

						contenant.fadeToggle("fast", function () {

							contenant.find('#msg_name').text(msg.usr_name);
							contenant.find('#msg_date').text(msg.msg_date);
							if (msg.usr_name != 'AutoMessage') {
								contenant.find('#msg_url').attr('href', 'm_msg.php?id='+msg.usr_id);
							} else {
								contenant.find('#msg_url').attr('href', null);
							}
							contenant.find('#msg_title').text(msg.msg_title);
							contenant.find('#msg_text').html(msg.msg_text.replace(/\n/g, "<br />") + '<br /><br />');
							contenant.fadeToggle("fast");
							contenant.find('.loader').remove();
						});
					} else {

						contenant = $('#nomsg');
						loader.appendTo(contenant);

						var el		= $('<div>', {'id': 'msg'});
						var div1	= $('<div>').append('De : ').appendTo(el);
						var usr		= $('<span>', {'id': 'msg_name', 'text': msg.usr_name}).appendTo(div1);
							div1.append(' le ');
						var date	= $('<span>', {'id': 'msg_date', 'text': msg.msg_date}).appendTo(div1);
							div1.append(' - ');
						var rep		= $('<span>', {'id': 'msg_rep'}).appendTo(div1);
						if (msg.usr_name != 'AutoMessage') {
							var link = $('<a>', {'id': 'msg_url', 'href': 'm_msg.php?id='+msg.usr_id , 'text': 'Répondre'}).appendTo(rep);
						} else {
							var link = $('<a>', {'id': 'msg_url', 'text': 'Répondre'}).appendTo(rep);
						}

						var div2	= $('<div>').appendTo(el);
							div2.append('Titre : ');
						var title	= $('<span>', {'id': 'msg_title', 'text': msg.msg_title}).appendTo(div2);
						var br		= $('<br/>').appendTo(div2);
						var br		= $('<br/>').appendTo(div2);

						var div3	= $('<div>', {'id': 'msg_text', 'html': msg.msg_text.replace(/\n/g, "<br />") + '<br /><br />'}).appendTo(el);

						var div4	= $('<div>', {'class': 'center'}).appendTo(el);
						var inp1	= $('<input>', {'type': 'hidden', 'name': 'id', 'value': msg.msg_id}).appendTo(div4);
						var inp2	= $('<input>', {'type': 'submit', 'name': 'arch', 'value': 'Archiver'}).appendTo(div4);
						var inp3	= $('<input>', {'type': 'submit', 'name': 'del', 'value': 'Supprimer'}).appendTo(div4);

						contenant.fadeToggle('fast', function () {

							el.hide().insertBefore(contenant).fadeToggle("slow", function () {
								contenant.remove();
							});
						});
					}
				});
			}
		}

		IWars.page.msgs.init();
	//});
})