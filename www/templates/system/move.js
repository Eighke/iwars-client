// Désactivation des liens
$('#main a').click(function(e){

	e.preventDefault();
});


var IWMove = {
	select: function(id, nb) {

		$('#unit_'+id).val(nb);
	},
	allselect: function() {

		$('#units .form-group').each(function(element) {
			var value = $(this).find('label span').text();
			$(this).find('input').val( value );
		});
	}
};
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