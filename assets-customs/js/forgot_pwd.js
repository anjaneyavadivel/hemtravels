var base_url = $('.base_url').attr('ID');
jQuery(function($) {

    "use strict";
    
    $('#login').validate({
        rules: {
            um_email: {
                required: true,
                remote: {
                    type: "post",
                    data: {
                        'csrf_test_name': $.cookie('csrf_cookie_name'),
                    },
                    url: base_url + "login/old_email_vaildation",
                },
            },
            um_password: {
                required: true,
                minlength: 5
            },
        },
        messages: {
            um_email: {
                required: "This field is required",
                remote: "Your email does not exist kindly register",
            },
            um_password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long",
            },
        },
        highlight: function (element) {
            var id_attr = "#" + $(element).attr("id") + "_icon";
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
            $(id_attr).removeClass('fa-check').addClass('fa-times');
        },
        unhighlight: function (element) {
            var id_attr = "#" + $(element).attr("id") + "_icon";
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
            $(id_attr).removeClass('fa-times').addClass('fa-check');
        },
        errorElement: 'span',
        errorClass: 'small help-block',
        errorPlacement: function (error, element) {
            if (element.length) {
                error.insertAfter(element.parent("div"));
            } else {
                error.insertafter(element.parent());
            }
        }
    });

    $('#sign_up').validate({
        rules: {
            new_email: {
                required: true,
                remote: {
                    type: "post",
                    data: {
                        'csrf_test_name': $.cookie('csrf_cookie_name'),
                    },
                    url: base_url + "login/new_email_vaildation",
                },
            },
            new_pasword: {
                required: true,
                minlength: 6
            },
            cnew_pasword: {
                required: true,
                minlength: 6,
                equalTo: "#new_pasword"
            },
            user_type: {
                required: true,
            },
            user_fullname: {
                required: true,
            },
            phone: {
                required: true,
                number: true,
                minlength: 10,
                maxlength: 10
            },
            register_accept_checkbox: {
                required: true,
         },
        },
        messages: {
            phone: {
                required: "Please enter the valid phone number",
            },
            register_accept_checkbox: {
                required: "Please read and accept the terms",
            },
            new_email: {
                required: "This field is required",
                remote: "Your email already exist kindly Login",
            },
            cnew_pasword: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long",
                equalTo: "Please enter the same password"
            },
        },
        highlight: function (element) {
            var id_attr = "#" + $(element).attr("id") + "_icon";
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
            $(id_attr).removeClass('fa-check').addClass('fa-times');
        },
        unhighlight: function (element) {
            var id_attr = "#" + $(element).attr("id") + "_icon";
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
            $(id_attr).removeClass('fa-times').addClass('fa-check');
        },
        errorElement: 'span',
        errorClass: 'small help-block',
        errorPlacement: function (error, element) {
            if (element.length) {
                error.insertAfter(element.parent("div"));
            } else {
                error.insertafter(element.parent());
            }
        }
    });
    $('#addbankAccount').validate({
        rules: {
            bank_name: {
                required: true,
                minlength: 6,
                maxlength: 50
            },
            account_number: {
                required: true,
                minlength: 6
            },
            account_number1: {
                required: true,
                minlength: 6,
                equalTo: "#account_number"
            },
            account_holder_name: {
                required: true,
                minlength: 3,
                maxlength: 50
            },
            ifsc_code: {
                required: true,
                minlength: 6,
                maxlength: 12
            },
            branch_name: {
                required: true,
                minlength: 6,
                maxlength: 100
            },
            address: {
                required: true,
                minlength: 6,
                maxlength: 300
         },
        },
        messages: {
            new_email: {
                required: "This field is required",
                remote: "Your email already exist kindly Login",
            },
            cnew_pasword: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long",
                equalTo: "Please enter the same password"
            },
        },
        highlight: function (element) {
            var id_attr = "#" + $(element).attr("id") + "_icon";
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
            $(id_attr).removeClass('fa-check').addClass('fa-times');
        },
        unhighlight: function (element) {
            var id_attr = "#" + $(element).attr("id") + "_icon";
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
            $(id_attr).removeClass('fa-times').addClass('fa-check');
        },
        errorElement: 'span',
        errorClass: 'small help-block',
        errorPlacement: function (error, element) {
            if (element.length) {
                error.insertAfter(element.parent("div"));
            } else {
                error.insertafter(element.parent());
            }
        }
    });


    $('#forgot-password-form').validate({        
        rules: {
            ex_email: {
                required: true,
                email:true
            },
            password:{
                required:true,
                minlength : 6,
            },
            repassword:{
                required:true,
                minlength : 6,
                equalTo : "#password"
            },
            passcode:{
                required:true
            }
        },
        highlight: function (element) {
            var id_attr = "#" + $(element).attr("id") + "_icon";
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
            $(id_attr).removeClass('fa-check').addClass('fa-times');
        },
        unhighlight: function (element) {
            var id_attr = "#" + $(element).attr("id") + "_icon";
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
            $(id_attr).removeClass('fa-times').addClass('fa-check');
        },
        errorElement: 'span',
        errorClass: 'small help-block',
        errorPlacement: function (error, element) {
            if (element.length) {
                error.insertAfter( element.parent("div"));
            } else {
                error.insertafter(element.parent());
            }
        }
    });

     //SEND VERIFICATION CODE
     $('#forgotEmailSend').on('click',function(){
         
        $('.fwd-errormsg').hide();
        $('.resetPasswordFormDiv').hide();
        if($('#forgot-password-form').valid()){

            var formData = new FormData();
            formData.append('ex_email', $('#ex_email').val());
            formData.append('csrf_test_name', $.cookie('csrf_cookie_name'));
            
            $.ajax({
                type: "POST",
                url: base_url+'login/forgotPasswordRequest',
                data: formData,
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,   
                success: function (res)
                {
                    res = $.parseJSON(res);
                    if(res.status){                       
                        $('.fwd-errormsg').removeClass('alert-danger');
                        $('.fwd-errormsg').addClass('alert-success');  
                        $('.resetPasswordFormDiv').show();
                        $('#forgotEmailSend').hide();
                        $('#passwordChange').show();
                    }else{
                        $('.fwd-errormsg').removeClass('alert-success');
                        $('.fwd-errormsg').addClass('alert-danger');
                        $('#forgotEmailSend').show();
                        $('#passwordChange').hide();
                        $('.resetPasswordFormDiv').hide();
                    }
                    $('.fwd-errormsg').show();
                    $('.fwd-errormsg').text(res.message);
                    
                    
                    //HIDE MESSAGE
                    setTimeout(function(){
                        $('.fwd-errormsg').fadeOut(400);
                    },2000);
                }
            });

           
        }
    });
    
    //RESET PASSWORD
    $('#passwordChange').on('click',function(){
         
        $('.fwd-errormsg').hide();
        $('#forgotEmailSend').hide();
        if($('#forgot-password-form').valid()){

            var formData = new FormData();
            formData.append('ex_email', $('#ex_email').val());
            formData.append('password', $('#password').val());
            formData.append('repassword', $('#repassword').val());
            formData.append('passcode', $('#passcode').val());
            formData.append('csrf_test_name', $.cookie('csrf_cookie_name'));
            
            $.ajax({
                type: "POST",
                url: base_url+'login/forgetpasswordverfication',
                data: formData,
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,   
                success: function (res)
                {
                    res = $.parseJSON(res);
                    if(res.status){                       
                        $('.fwd-errormsg').removeClass('alert-danger');
                        $('.fwd-errormsg').addClass('alert-success');  
                        location.reload();
                    }else{
                        $('.fwd-errormsg').removeClass('alert-success');
                        $('.fwd-errormsg').addClass('alert-danger');                        
                    }
                    $('.fwd-errormsg').show();
                    $('.fwd-errormsg').text(res.message);
                    
                    
                    //HIDE MESSAGE
                    setTimeout(function(){
                        $('.fwd-errormsg').fadeOut(400);
                    },2000);
                }
            });

           
        }
    });
    
   
    
	
});


