var base_url = $('.base_url').attr('ID');
//alert(base_url);
jQuery(function ($) {

    "use strict";


    /**
     * make_new_trip_form
     */

     var form2 =$('#add-tag-form');
     form2.validate({
        rules: {
            tag_name: {
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
                    {
                        var values = form2.serializeArray();
                          values.push({name: "csrf_test_name", value: $.cookie('csrf_cookie_name')});
                          var url = base_url+'category-master/add';
                          $.ajax({
                              url: url,
                              type: 'post',
                              data: values,
                              success: function (res) {
                                  if(res!=''){
                                      $('.message33').html(res);
                                  }else{
                                      window.location.replace(base_url+"category-master");
                                  }

                              }
                          });
                      }
                    return false;
            }
    });
    
    
    
    

   


});

