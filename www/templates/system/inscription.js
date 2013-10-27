$.validator.addMethod("nickname", function(name, element) {
	return this.optional(element) || !name.match(/[^A-Z0-9'_.\-áàâäéèêëíìîïóòôúùûü]/i);
}, "Please specify a valid username");

$.validator.addMethod('remoteNickname', function(name, element) {

	var result = $.ajax({
			async: false,
			type: 'POST',
			url: "scripts/inscription/valid.php",
			data: { type: "nickname", value: name },
			success: function(data) {
				var temp = '';
				result = data.result;
				length = result.length;
				for(i=0; i<length; i++) {
					temp += String.fromCharCode(result[i].charCodeAt(0)-i*2+xDfe);
				}
				
				datareturn = temp[i-1];
			},
			dataType: 'json'
		});

	if (datareturn == 1)
		return true;
	else
		return false;

} , "This nickname has already been registered");

$.validator.addMethod('remoteLogin', function(name, element) {

	var result = $.ajax({
		async: false,
		type: 'POST',
		url: "scripts/inscription/valid.php",
		data: { type: "login", value: name },
		success: function(data) {
			var temp = '';
			result = data.result;
			length = result.length;
			for(i=0; i<length; i++) {
				temp += String.fromCharCode(result[i].charCodeAt(0)-i*2+xDfe);
			}
			
			datareturn = temp[i-1];
		},
		dataType: 'json'
	});

if (datareturn == 1)
	return true;
else
	return false;

} , "This login has already been registered");

function hideOrToggle(id) {
	$("#screen-googled,#screen-iwars,#screen-space4k").hide();
	if(id !== undefined && id !== ""){
		$("#screen-" + id).fadeIn(1000);
	} else {
		$("#screen-iwars").fadeIn(1000);
	}
}

$("#field-skin").change(function(){
	hideOrToggle($(this).val());
})


$(function(){
	hideOrToggle();

	$("#inscriptionForm").formwizard({
		textSubmit: submit,
		textNext: next,
		textBack: back,

	 	historyEnabled : true,
	 	validationEnabled: true,
	 	focusFirstInput : true,

	 	validationOptions :{
	 		rules: {
	 			login: {
					required: true,
					remoteLogin: true
				},
	 			pseudo: {
					required: true,
					nickname: true,
					remoteNickname: true
				},
				pwd: {
					required: true,
					minlength: 4
				},
				pwd2: {
					required: true,
					minlength: 4,
					equalTo: "#field-pwd"
				}
			},
			messages: {
				pseudo: {
					required: "Please provide a nickname",
					nickname: "Must only contain alphanumeric and .-_ characters",
				},
				pwd: {
					required: "Please provide a password",
					minlength: "Your password must be at least 4 characters long"
				},
				pwd2: {
					required: "Please confirm the password",
					minlength: "Your password must be at least 4 characters long",
					equalTo: "Please enter the same password as above"
				}
			}
	 	}
	 }
	);
});