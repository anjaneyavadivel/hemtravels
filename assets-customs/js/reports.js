var base_url = $('.base_url').attr('ID');
jQuery(function($) {

    "use strict";
    
    $('#tripReport').on('click',function(){ 
        
        var search_from = $('#rangeDatePickerFrom').val() != undefined ?$('#rangeDatePickerFrom').val():'';
        var search_to   = $('#rangeDatePickerTo').val() != undefined ?$('#rangeDatePickerTo').val():'';
        var status      = $('#status').val() != undefined ?$('#status').val():'';
        var titleSearch = $('#titleSearch').val() != undefined ?$('#titleSearch').val():'';
         
        document.location = base_url+'Trip-wise-reports?from='+search_from+'&to='+search_to+'&status='+status+'&title='+titleSearch+'&download=1';
       
    });
    $('#searchTrip').on('click',function(e){
        e.preventDefault();
        if (location.href.indexOf('download=') > -1) {
            location.href = location.href.replace('download=1', 'download=0');
            setTimeout(function() { $('#trip-report-form').submit(); },2000);
        }else{
            $('#trip-report-form').submit();
        }
        
    });
    
});

