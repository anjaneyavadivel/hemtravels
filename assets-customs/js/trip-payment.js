var base_url = $('.base_url').attr('ID');
jQuery(function($) {

    "use strict";
    
    //VALIDATION
    $('#trip_proceed').validate({
        rules: {
            user_name: {
                required: true,
                minlength: 4,
            },
            email: {
                required: true,
            },           
            password: {
                required: true,
                minlength:8,
                maxlength:20,
            },
            password_confirm: {
                required: true,
                minlength: 8,
                maxlength:20,
                equalTo: "#password"
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
    
     $('.confirm_user').on('click',function(){
        $('.register_confirm_msg').hide();
        if($('#trip_proceed').valid()){ //FORM VALIDATION
            
           // if($('#register_accept_checkbox').is(":checked")){ 
               
                var formData = new FormData();                
                formData.append('trip_id', $('#tripId').val());
                formData.append('user_name', $('#user_name').val());
                formData.append('email', $('#email').val());               
                formData.append('phonenumber', $('#phonenumber').val());                             
                formData.append('csrf_test_name', $.cookie('csrf_cookie_name'));
               
                $.ajax({
                    type: "POST",
                    url: base_url+'tripBookings/confirmUser',
                    data: formData,
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData:false,   
                    success: function (res)
                    {
                        if(res){
                            window.location.href = base_url+'PNR-status/'+res;
                        }else{
                            window.location.href = base_url+'trip-list';                            
                        }
                    }
                });
                
           /* }else{
                $('.register_confirm_msg').show();         
            }*/
        }
    });
   
});

