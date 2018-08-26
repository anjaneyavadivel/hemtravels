var base_url = $('.base_url').attr('ID');
jQuery(function($) {

    "use strict";
    
    var gallery_images = $('#gallery_images').val();
    
    if(gallery_images != undefined && gallery_images != ''){
        var gallJSON = $.parseJSON(gallery_images);
        var res = [];
        if(gallJSON.length > 0){
            for(var i=0;i<gallJSON.length;i++){
                var res1 = {};
                res1.src     = base_url+'assets-customs/gallery_images/'+gallJSON[i].file_name;
                res1.alt     = $('#tripName').text();
                res1.title   = gallJSON[i].file_name;
                res1.caption = $('#tripName').text();
                
                res[i] = res1;
            }
        }
        
        if(res.length > 0){
            $('#view_gallery').imagesGrid({
                images: res,
                cells: 5,
                align: true
            });
        }
        
    }
    
    //AVAILABLE DAYS
    var available_days = $('#availableDays').val(),disableDays = [];
            
    if(available_days != '' && available_days != undefined){
        available_days = $.parseJSON(available_days);
        if(available_days.sunday && available_days.sunday != 1){disableDays.push(0)}
        if(available_days.monday && available_days.monday != 1){disableDays.push(1)}
        if(available_days.tuesday && available_days.tuesday != 1){disableDays.push(2)}
        if(available_days.wednesday && available_days.wednesday != 1){disableDays.push(3)}
        if(available_days.thursday && available_days.thursday != 1){disableDays.push(4)}
        if(available_days.friday && available_days.friday != 1){disableDays.push(5)}
        if(available_days.saturday && available_days.saturday != 1){disableDays.push(6)}
        console.log(disableDays);
        
    }
    
    //CUT OFF DAYS/HOURS DISABLE CALENDAR
    var cutoff_disable_days = $('#cutoff_disable_days').val();
    
    if(cutoff_disable_days != undefined && cutoff_disable_days != ''){
        cutoff_disable_days = $.parseJSON(cutoff_disable_days);
    }
    
    $('#rangeDatePicker > div > div').dateRangePicker({
            //separator : ' to ',
            autoClose: true,
            format: 'MMM D, YYYY',
            singleDate : true,
            showShortcuts: false,
            singleMonth: true,
//            minDays: 4,
//            maxDays: 4,
//            stickyMonths: true,
            startDate: new Date(),
//            showTopbar: false,
//            getValue: function()
//            {
//                    if ($('#rangeDatePickerTo').val() && $('#rangeDatePickerFrom').val() )
//                            return $('#rangeDatePickerTo').val() + ' to ' + $('#rangeDatePickerFrom').val();
//                    else
//                            return '';
//            },
            setValue: function(s,s1,s2)
            {
                    $('#rangeDatePickerFrom').val(s1);
                    //$('#rangeDatePickerTo').val(s2);
            },
            beforeShowDay: function(t){ //console.log(t);
                   // var valid = !(t.getDate() == 5 || t.getDate() == 17 || t.getDate() == 18 || t.getDate() == 19  || t.getDate() == 26 );
                    
                    var today = moment(t).format("YYYY-MM-DD");                   
                    var valid = $.inArray( t.getDay(), disableDays ) >= 0 || $.inArray( today, cutoff_disable_days ) >= 0?false:true;
                    var _class = '';
                    var _tooltip = valid ? '' : 'not available';
                    return [valid,_class,_tooltip];
            },
            customArrowPrevSymbol: '<i class="fa fa-arrow-circle-left"></i>',
            customArrowNextSymbol: '<i class="fa fa-arrow-circle-right"></i>'
    });
    
    
    //VALIDATION
    $('#trip_booking').validate({
        rules: {
            booking_from_time: {
                required: true,
            },
            booking_to_time: {
                required: true,
            },
//            no_of_adult: {
//                required: {
//                    function(e) {
//                        /*return (!$('.no_of_adult').val() || $('.no_of_adult').val() == 0) &&
//                               (!$('.no_of_children').val() || $('.no_of_children').val() == 0) &&
//                               (!$('.no_of_infan').val() || $('.no_of_infan').val() == 0);*/
//                    }
//                }
//            },
            location: {
                required: true                
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
	
    //
    $('.request_book').on('click',function(){
        $('.book_traveller_missing').hide();
        if($('#trip_booking').valid()){ //FORM VALIDATION
            if((!$('.no_of_adult').val() || $('.no_of_adult').val() == 0) &&
                (!$('.no_of_children').val() || $('.no_of_children').val() == 0) &&
                (!$('.no_of_infan').val() || $('.no_of_infan').val() == 0)){ //IF ANY ONE OF THE FILED SHOULD BE GREATER THAN ZERO
                  $('.book_traveller_missing').show();         
            }else{
                var trip_code = $('#tripCode').val();
                var formData = new FormData();                
                formData.append('from_date', $('#rangeDatePickerFrom').val());
                formData.append('to_date', $('#rangeDatePickerTo').val());               
                formData.append('no_of_adult', $('.no_of_adult').val());
                formData.append('no_of_children', $('.no_of_children').val());
                formData.append('no_of_infan', $('.no_of_infan').val());
                formData.append('location', $('#location').val());                
                formData.append('csrf_test_name', $.cookie('csrf_cookie_name'));
               
                $.ajax({
                    type: "POST",
                    url: base_url+'tripBookings/setBookingDetails',
                    data: formData,
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData:false,   
                    success: function (data)
                    {
                        if(data){
                            window.location.href = base_url+'trip-book/'+trip_code;
                        }else{
                            location.reload();
                        }
                    }
                });
            }
        }
    })
    
    
    //VALIDATE USER INFO    
    $('#trip_proceed').validate({
        rules: {
            user_name: {
                required: true,
                minlength: 4,
                maxlength:10,
            },
            email:{
                required:true,
                email:true
            },
            phonenumber:{
                required:true,
                number:true,
                minlength: 10,
                maxlength:10,
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
    
    $('#payment_proceed').on('click',function(){
        
        $('.book_traveller_missing').hide();
        if($('#trip_booking').valid() && $('#trip_proceed').valid() && $('#totalPrice').val() != ''&& $('#totalPrice').val() != undefined){ //FORM VALIDATION
                
            if((!$('.no_of_adult').val() || $('.no_of_adult').val() == 0) &&
            (!$('.no_of_children').val() || $('.no_of_children').val() == 0) &&
            (!$('.no_of_infan').val() || $('.no_of_infan').val() == 0)){ //IF ANY ONE OF THE FILED SHOULD BE GREATER THAN ZERO
                  $('.book_traveller_missing').show();         
            }else{
                
                var formData = new FormData();                
                formData.append('trip_id', $('#tripId').val());
                formData.append('user_name', $('#user_name').val());
                formData.append('email', $('#email').val());               
                formData.append('phonenumber', $('#phonenumber').val());                             
                formData.append('csrf_test_name', $.cookie('csrf_cookie_name'));
               
                $.ajax({
                    type: "POST",
                    url: base_url+'tripBookings/paymentProceed',
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
                
                
            }
        }
    });
    
    $('#addWishlist').on('click',function(){
        var trip_id = $(this).attr('data-trip-id');
        var wish_id = $(this).attr('data-wish-id');
        
        if(trip_id != '' && trip_id != undefined){
            var formData = new FormData();
            formData.append('trip_id', trip_id);                           
            formData.append('wish_id', wish_id);                           
            formData.append('csrf_test_name', $.cookie('csrf_cookie_name'));

            $.ajax({
                type: "POST",
                url: base_url+'trips/addRemoveWishlistAction',
                data: formData,
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,   
                success: function (data)
                {                    
                    location.reload();                    
                }
            });
        }
    });
    
    
    $('#review_form').validate({        
        rules: {
            user_name: {
                required: true,
                minlength:3,
                maxlength:150
            },
            email: {
                required: true,
                email:true
            },
            message: {
                required: true
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
        }
    });
    
    $('.remove_review').on('click',function(){
        var trip_id = $(this).attr('data-trip-id');
        var review_id = $(this).attr('data-id');
        
        if(trip_id != '' && trip_id != undefined){
            var formData = new FormData();
            formData.append('trip_id', trip_id);                           
            formData.append('review_id', review_id);                           
            formData.append('csrf_test_name', $.cookie('csrf_cookie_name'));

            $.ajax({
                type: "POST",
                url: base_url+'trips/reviewDeleteAction',
                data: formData,
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,   
                success: function (data)
                {                    
                    location.reload();                    
                }
            });
        }
    });
});

