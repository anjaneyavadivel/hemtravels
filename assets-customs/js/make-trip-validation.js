var base_url = $('.base_url').attr('ID');
//alert(base_url);
jQuery(function ($) {

    "use strict";


    /**
     * make_new_trip_form
     */

    $('#make_new_trip_form').validate({
        ignore: ":hidden:not(textarea)",
        rules: {
            is_shared: {
                required: true,
            },
            trip_category_id: {
                required: true,
            },
            trip_name: {
                required: true,
		maxlength: 150
            },
            price_to_adult: {
                required: true,
                number: true
            },
            price_to_child: {
                number: true
            },
            price_to_infan: {
                number: true
            },
            trip_duration: {
                required: true,
            },
            how_many_days: {
                number: true
            },
            how_many_nights: {
                number: true
            },
            how_many_hours: {
                number: true
            },
            brief_description: {
                required: true,
		minlength: 50
            },
            tags: {
                required: true,
            },
            no_of_traveller: {
                required: true,
                number: true
            },
            no_of_min_booktraveller: {
                required: true,
                number: true
            },
            no_of_max_booktraveller: {
                required: true,
                number: true
            },
            booking_cut_of_time_type: {
                required: true,
                number: true
            },
            booking_cut_of_time: {
                required: true,
                number: true
            },
            state_id:{
                required: true,
            },
            city_id:{
                required: true,
            },
            cancellation_policy:{
                required: true,
            },
            confirmation_policy:{
                required: true,
            },
            refund_policy:{
                required: true,
            },
            "trip_from_time[]":{
                required: true,
            },
            "trip_to_time[]":{
                required: true,
            },
            "trip_from_title[]":{
                required: true,
            },
            "pickup_meeting_point[]":{
                required: true,
            },
            "pickup_meeting_time[]":{
                required: true,
            },
            "other_category":{
                required:true
            },
            "other_city":{
                required:true
            }
            /*"pickup_landmark[]":{
                required: true,
            }*/
        },
//        messages: {
//            um_email: {
//                required: "This field is required",
//                remote: "Your email does not exist kindly register",
//            },
//            um_password: {
//                required: "Please provide a password",
//                minlength: "Your password must be at least 5 characters long",
//            },
//        },
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

   


});

