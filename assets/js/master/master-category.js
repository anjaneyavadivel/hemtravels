	var FormValidation = function () 
	{
		return {
			init: function () 
			{
				
			// for usertype add validation
			var form = $('#add-category');
			var error = $('.alert-error', form);
			var success = $('.alert-success', form);
			form.validate({
			errorElement: 'span', //default input error message container
			errorClass: 'help-inline', // default input error message class
			focusInvalid: false, // do not focus the last invalid input
			ignore: "",
			rules:
			{
				name: {minlength:3,required: true},
				
			},
			invalidHandler: function (event, validator) 
			{ //display error alert on form submit              
				success.hide();
				error.show();
				// App.scrollTo(error, -200);
			},
			highlight: function (element)
			{ // hightlight error inputs
				$(element)
				.closest('.help-inline').removeClass('ok'); // display OK icon
				$(element)
				.closest('.control-group').removeClass('success').addClass('error'); // set error class to the control group
			},
			unhighlight: function (element) 
			{ // revert the change dony by hightlight
				$(element)
				.closest('.control-group').removeClass('error'); // set error class to the control group
			},
			success: function (label) 
			{
				label
				.addClass('valid').addClass('help-inline ok') // mark the current input as valid and display OK icon
				.closest('.control-group').removeClass('error').addClass('success'); // set success class to the control group
			},
			submitHandler: function (form) 
			{
				if($(form).valid()) 
				form.submit(); 
				return false;
			}
			});
		}
	};
}();