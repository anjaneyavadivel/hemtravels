var base_url = $('.base_url').attr('ID');
jQuery(function($) {

    "use strict";
    
    
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
                error.insertAfter(element);
            } else {
                error.insertAfter(element);
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


