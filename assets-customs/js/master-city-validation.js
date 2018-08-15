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

            var form2 = $('#add-city-form');
            form2.validate({
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    state_id: {
                        required: true,
                    },
                    city_name: {
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
                    if ($(form).valid())
                    {
                        var values = form2.serializeArray();
                        values.push({name: "csrf_test_name", value: $.cookie('csrf_cookie_name')});
                        var url = base_url + 'city-master/add';
                        $.ajax({
                            url: url,
                            type: 'post',
                            data: values,
                            success: function (res) {
                                if (res != '') {
                                    $('.message33').html(res);
                                } else {
                                    window.location.replace(base_url + "city-master");
                                }

                            }
                        });
                    }
                    return false;
                }
            });
            
            //edit
            var form30 = $('#edit-city-form');
            form30.validate({
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    state_id: {
                        required: true,
                    },
                    city_name: {
                        required: true,
                    },
                    city_id: {
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
                    if ($(form).valid())
                    {
                        var values = form30.serializeArray();
                        values.push({name: "csrf_test_name", value: $.cookie('csrf_cookie_name')});
                        var url = base_url + 'city-master/save-edit';
                        $.ajax({
                            url: url,
                            type: 'post',
                            data: values,
                            success: function (res) {
                                if (res != '') {
                                    $('.message33').html(res);
                                } else {
                                    window.location.replace(base_url + "city-master");
                                }

                            }
                        });
                    }
                    return false;
                }
            });
            // END : SUPER ADMIN - ADD

        }

    };

}();