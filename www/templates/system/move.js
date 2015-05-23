$script.ready('app', function(){
	$script(['jquery.form'], 'move');

	$script.ready('move', function() {
		IWars.page.move = {
			init: function(){
				that = this;

				$('#main a').click(function(e){
					e.preventDefault();
				});
				$('.select').on('click', function(e){
					e.preventDefault();

					var id = $(this).data('id');
					var nb = $(this).data('number');

					that.select(id, nb);
				})
				$('#selectAll').on('click', function(e){
					e.preventDefault();

					that.allselect();
				})

				$('[name="act"]').on('click', function(e) {
					var form = $(this).parents('form');

					form.ajaxSubmit({
						data: {format: 'json', act: '1'},
						dataType: 'json',
						success: function(response) {

							if (response.messages) {
								IWars.parseMessages(response.messages);
							}
						}
					});

					e.preventDefault();
				});

				$('[name="vis"]').on('click', function(e) {
					var form    = $(this).parents('form');
					var url     = form.attr('action');
					var fullUrl = url + '?' + form.serialize() + '&vis=1'

					IWars.load.cache(fullUrl);

					e.preventDefault();
				});
			},
			select: function(id, nb) {

				$('#unit_'+id).val(nb);
			},
			allselect: function() {

				$('#units .form-group').each(function(element) {
					var value = $(this).find('label span').text();
					$(this).find('input').val( value );
				});
			}
		}

		IWars.page.move.init();
		/*
		// Changement de la visibilité des ressources au chargement
		var res = $('resources').getElements('input');
		var select = $$('#main select').get('value');
		if (select != 'Port' && select != 'Base' && select != 'Colon') {
			res.set('disabled', 'disabled');
		}
		$$('#main select').addEvent('change', function(e){

			if ($$('#main select').get('value') == 'Port' || $$('#main select').get('value') == 'Base' || $$('#main select').get('value') == 'Colon') {
				res.removeProperty('disabled');
			} else {
				res.set('disabled', 'disabled');
			}
		});*/
	});
})