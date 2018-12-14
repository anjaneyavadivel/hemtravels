var base_url = $('.base_url').attr('ID');
jQuery(function($) {

    "use strict";
    
    
    
    $('#rangeDatePicker > div > div').dateRangePicker({
            //separator : ' to ',
            autoClose: true,
            format: 'MMM D, YYYY',
            //singleDate : true,
            showShortcuts: false,
//            minDays: 4,
//            maxDays: 4,
//            stickyMonths: true,
            //startDate: new Date(),
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
                    $('#rangeDatePickerFrom').val(s1);
                    $('#rangeDatePickerTo').val(s2);
            },
//            beforeShowDay: function(t){ //console.log(t);
//                   // var valid = !(t.getDate() == 5 || t.getDate() == 17 || t.getDate() == 18 || t.getDate() == 19  || t.getDate() == 26 );
//                    
//                    var today = moment(t).format("YYYY-MM-DD");                   
//                    var valid = $.inArray( t.getDay(), disableDays ) >= 0 || $.inArray( today, cutoff_disable_days ) >= 0?false:true;
//                    var _class = '';
//                    var _tooltip = valid ? '' : 'not available';
//                    return [valid,_class,_tooltip];
//            },
            customArrowPrevSymbol: '<i class="fa fa-arrow-circle-left"></i>',
            customArrowNextSymbol: '<i class="fa fa-arrow-circle-right"></i>'
    });
    
    
    $('#bookExportXLSX').on('click',function(){ 
        
        var search_from = $('#rangeDatePickerFrom').val() != undefined ?$('#rangeDatePickerFrom').val():'';
        var search_to   = $('#rangeDatePickerTo').val() != undefined ?$('#rangeDatePickerTo').val():'';
        var book_search_from = $('#bookedRangeDatePickerFrom').val() != undefined ?$('#bookedRangeDatePickerFrom').val():'';
        var book_search_to   = $('#bookedRangeDatePickerTo').val() != undefined ?$('#bookedRangeDatePickerTo').val():'';
        var status      = $('#bookingStatus').val() != undefined ?$('#bookingStatus').val():'';
        var bookedFrom  = $('#bookedFrom').val() != undefined ?$('#bookedFrom').val():'';
        var titleSearch = $('#bookSearchTitle').val() != undefined ?$('#bookSearchTitle').val():'';
         
        document.location = base_url+'booking-wise-reports?from='+search_from+'&to='+search_to+'&bookedonfrom='+book_search_from+'&bookedonto='+book_search_to+'&status='+status+'&bookfrom='+bookedFrom+'&title='+titleSearch+'&download=1';
       
    });
    $('#bookSearchBtn').on('click',function(e){
        e.preventDefault();
        if (location.href.indexOf('download=') > -1) {
            location.href = location.href.replace('download=1', 'download=0');
            setTimeout(function() { $('#booking-report-form').submit(); },2000);
        }else{
            $('#booking-report-form').submit();
        }
        
    });
    
});