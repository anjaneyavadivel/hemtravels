var MasterValidation = function ()
{
    return{
        init: function () {
            var base_url = $('.base_url').attr('ID');

            $.fn.modalmanager.defaults.resize = true;
            $.fn.modalmanager.defaults.spinner = '<div class="loading-spinner fade" style="width: 200px; margin-left: -100px;"><span style="font-weight:300; color: #eee; font-size: 18px; font-family:Open Sans;">&nbsp;Loading...</div>';

            /**
             * make_new_trip_form
             */

            var form2 = $('#contact-form');
            form2.validate({
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    name: {minlength: 3, required: true},
                    email: {required: true, email: true},
                    phone_number: {required: true, number: true,minlength: 10,maxlength: 12},
                    subject: {minlength: 3, required: true},
                    message: {required: true},
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
                },
                submitHandler: function (form)
                {
                    if ($(form).valid())
                    {
                        var values = form2.serializeArray();
                        values.push({name: "csrf_test_name", value: $.cookie('csrf_cookie_name')});
                        var url = base_url + 'contact/add';
                        $.ajax({
                            url: url,
                            type: 'post',
                            data: values,
                            success: function (res) {
                                if (res) {
                                    window.location.replace(base_url + "contact-us");
                                } else {
                                    $('.message33').html(res);
                                }

                            }
                        });
                    }
                    return false;
                }
            });
        }

    };

}();

            