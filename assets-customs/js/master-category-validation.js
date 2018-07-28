var base_url = $('.base_url').attr('ID');
//alert(base_url);
jQuery(function ($) {

    "use strict";


    /**
     * make_new_trip_form
     */

    $('#add-category-form').validate({
        rules: {
            category_name: {
                required: true,
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
                error.insertAfter(element);
            } else {
                error.insertAfter(element);
            }
        },
            submitHandler: function (form) 
            {
                    if($(form).valid()) 
                    form.submit(); 
                    return false;
            }
    });

   


});

