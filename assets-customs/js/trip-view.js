var base_url = $('.base_url').attr('ID');
jQuery(function($) {

    "use strict";
    
    var gallery_images = $('#gallery_images').val();
    
    if(gallery_images != undefined && gallery_images != ''){
        var gallJSON = $.parseJSON(gallery_images);console.log(gallJSON);
        var res = [];
        if(gallJSON.length > 0){
            for(var i=0;i<gallJSON.length;i++){
                var res1 = {};
                res1.src     = base_url+'assets-customs/gallery_images/'+gallJSON[i].file_name;
                res1.alt     = $('#tripName').text();
                res1.title   = gallJSON[i].file_name;
                res1.caption = $('#tripName').text();
                
                console.log(res1);
                
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
    
    $('#rangeDatePicker > div > div').dateRangePicker({
            separator : ' to ',
            autoClose: true,
            format: 'MMM D, YYYY',
            minDays: 4,
            maxDays: 4,
            stickyMonths: true,
            startDate: new Date(),
            showTopbar: false,
            getValue: function()
            {
                    if ($('#rangeDatePickerTo').val() && $('#rangeDatePickerFrom').val() )
                            return $('#rangeDatePickerTo').val() + ' to ' + $('#rangeDatePickerFrom').val();
                    else
                            return '';
            },
            setValue: function(s,s1,s2)
            {
                    $('#rangeDatePickerTo').val(s1);
                    $('#rangeDatePickerFrom').val(s2);
            },
            beforeShowDay: function(t){
                   // var valid = !(t.getDate() == 5 || t.getDate() == 17 || t.getDate() == 18 || t.getDate() == 19  || t.getDate() == 26 );
                    var valid = $.inArray( t.getDay(), disableDays ) >= 0?false:true;
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
            no_of_adult: {
                required: {
                    function(e) {
                        /*return (!$('.no_of_adult').val() || $('.no_of_adult').val() == 0) &&
                               (!$('.no_of_children').val() || $('.no_of_children').val() == 0) &&
                               (!$('.no_of_infan').val() || $('.no_of_infan').val() == 0);*/
                    }
                }
            },
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
            }
        }
    })
});

