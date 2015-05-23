$script.ready('app', function(){
	$script(['jquery.validate', 'jquery.form.wizard'], 'login');

	$script.ready('login', function() {
		(function($){
			$("#loginForm").formwizard({
				textSubmit: submit,
				textNext: next,

				validationEnabled: true,
				focusFirstInput : true,

				validationOptions :{
					errorPlacement: function(error, element) {
						error.appendTo( element.parent("div").parent("div") );
					},
					success: function(label) {
						label.parent("div").addClass("has-success");
						label.parent("div").find('i.glyphicon').removeClass().addClass("glyphicon glyphicon-ok-sign");
						label.remove();
					},
					highlight: function(element, errorClass) {
						$(element).parent("div").parent("div").addClass('has-error').removeClass('has-success');
						$(element).parent("div").find('i.glyphicon').removeClass().addClass("glyphicon glyphicon-remove-sign");
					},
					unhighlight: function(element, errorClass) {
						$(element).parent("div").parent("div").removeClass('has-error');
					},
				}
			});
		}(jQuery));
	});
})
