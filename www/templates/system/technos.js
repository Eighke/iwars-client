$(document).ready(function(){
	var topHeight = $('#top').height() + 30;

	var obj = $('#sticky');
	var offset = obj.offset();
	var topOffset = offset.top-topHeight;
	var leftOffset = offset.left;
	var marginTop = obj.css("marginTop");
	var marginLeft = obj.css("marginLeft");

	$(window).scroll(function() {

		var scrollTop = $(window).scrollTop();

		if (scrollTop >= topOffset){

			obj.css({
				marginTop: -topOffset,
				position: 'fixed',
			});
		}

		if (scrollTop < topOffset){

			obj.css({
				marginTop: marginTop,
				position: 'relative',
			});
		}
	});
});

var cache = {};

$('.elem-name a').click(function(e){
	e.preventDefault();

	call = $(this).attr('href').split('=');
	call = call[1];

	contenant = $('#sticky > div');
	id = contenant.attr('id').substr(1);

	if (call == id) {
		return
	} else if (cache[call]) {
		cache[id] = contenant.detach();
		cache[call].appendTo('#sticky').fadeIn('fast');
	} else {

		$.ajax({
			url: './scripts/json/techno.php',
			data: { id: call },
			beforeSend : function() {
				contenant.css({'opacity' : '0.3'});
				loader.appendTo('#sticky');
			},
			success: function(data) {

				contenant.fadeOut('fast', function () {
					cache[id] = contenant.detach();
					cache[id].css({'opacity' : '1'});

					$('#sticky').html(data).hide().fadeToggle('fast');
				});
			},
			dataType: 'html'
		});
	}
});