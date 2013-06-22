$('.upload a').click(function(e){
	var div = $('.upload div');

	$('.upload > span').hide();
	div.show("clip", 200);

	e.preventDefault();
});