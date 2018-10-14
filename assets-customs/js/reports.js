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
    
    
    //PAYMENT FROM B2C
    $('#b2cExportXLSX').on('click',function(){ 
        
        var search_from = $('#rangeDatePickerFrom').val() != undefined ?$('#rangeDatePickerFrom').val():'';
        var search_to   = $('#rangeDatePickerTo').val() != undefined ?$('#rangeDatePickerTo').val():'';
        var status      = $('#status').val() != undefined ?$('#status').val():'';
        var titleSearch = $('#searchTitle').val() != undefined ?$('#searchTitle').val():'';
         
        document.location = base_url+'payment-from-B2C-reports?from='+search_from+'&to='+search_to+'&status='+status+'&title='+titleSearch+'&download=1';
       
    });
    $('#b2cSearchBtn').on('click',function(e){
        e.preventDefault();
        if (location.href.indexOf('download=') > -1) {
            location.href = location.href.replace('download=1', 'download=0');
            setTimeout(function() { $('#payment-b2c-report-form').submit(); },2000);
        }else{
            $('#payment-b2c-report-form').submit();
        }
        
    });
    //PAYMENT FROM B2B
    $('#b2bFromExportXLSX').on('click',function(){ 
        
        var search_from = $('#rangeDatePickerFrom').val() != undefined ?$('#rangeDatePickerFrom').val():'';
        var search_to   = $('#rangeDatePickerTo').val() != undefined ?$('#rangeDatePickerTo').val():'';
        var status      = $('#status').val() != undefined ?$('#status').val():'';
        var titleSearch = $('#searchTitle').val() != undefined ?$('#searchTitle').val():'';
         
        document.location = base_url+'payment-from-B2B-reports?from='+search_from+'&to='+search_to+'&status='+status+'&title='+titleSearch+'&download=1';
       
    });
    $('#b2bFromSearchBtn').on('click',function(e){
        e.preventDefault();
        if (location.href.indexOf('download=') > -1) {
            location.href = location.href.replace('download=1', 'download=0');
            setTimeout(function() { $('#payment-from-b2b-report-form').submit(); },2000);
        }else{
            $('#payment-from-b2b-report-form').submit();
        }
        
    });
    //PAYMENT TO B2B
    $('#b2bToExportXLSX').on('click',function(){ 
        
        var search_from = $('#rangeDatePickerFrom').val() != undefined ?$('#rangeDatePickerFrom').val():'';
        var search_to   = $('#rangeDatePickerTo').val() != undefined ?$('#rangeDatePickerTo').val():'';
        var status      = $('#status').val() != undefined ?$('#status').val():'';
        var titleSearch = $('#searchTitle').val() != undefined ?$('#searchTitle').val():'';
         
        document.location = base_url+'payment-to-B2B-reports?from='+search_from+'&to='+search_to+'&status='+status+'&title='+titleSearch+'&download=1';
       
    });
    $('#b2bToSearchBtn').on('click',function(e){
        e.preventDefault();
        if (location.href.indexOf('download=') > -1) {
            location.href = location.href.replace('download=1', 'download=0');
            setTimeout(function() { $('#payment-to-b2b-report-form').submit(); },2000);
        }else{
            $('#payment-to-b2b-report-form').submit();
        }
        
    });
    
    //TRANSACTION REPORT
    $('#transactionExportXLSX').on('click',function(){ 
        
        var search_from = $('#rangeDatePickerFrom').val() != undefined ?$('#rangeDatePickerFrom').val():'';
        var search_to   = $('#rangeDatePickerTo').val() != undefined ?$('#rangeDatePickerTo').val():'';
        var status      = $('#status').val() != undefined ?$('#status').val():'';
        var titleSearch = $('#searchTitle').val() != undefined ?$('#searchTitle').val():'';
         
        document.location = base_url+'my-transaction-reports?from='+search_from+'&to='+search_to+'&status='+status+'&title='+titleSearch+'&download=1';
       
    });
    $('#transactionSearchBtn').on('click',function(e){
        e.preventDefault();
        if (location.href.indexOf('download=') > -1) {
            location.href = location.href.replace('download=1', 'download=0');
            setTimeout(function() { $('#my-transaction-report-form').submit(); },2000);
        }else{
            $('#my-transaction-report-form').submit();
        }
        
    });
    
    //TOMORROW TRIP(BOOKING) REPORT
    $('#tomorrowTripReport').on('click',function(){ 
        
        var search_from = $('#rangeDatePickerFrom').val() != undefined ?$('#rangeDatePickerFrom').val():'';
        var search_to   = $('#rangeDatePickerTo').val() != undefined ?$('#rangeDatePickerTo').val():'';       
        var titleSearch = $('#titleSearch').val() != undefined ?$('#titleSearch').val():'';
         
        document.location = base_url+'tomorrows-trip-reports?from='+search_from+'&to='+search_to+'&title='+titleSearch+'&download=1';
       
    });
    $('#tomorrowTripSearchTrip').on('click',function(e){
        e.preventDefault();
        if (location.href.indexOf('download=') > -1) {
            location.href = location.href.replace('download=1', 'download=0');
            setTimeout(function() { $('#tomorrow-reports-form').submit(); },2000);
        }else{
            $('#tomorrow-reports-form').submit();
        }
        
    });
    
    //USER REPORT
    $('#userReport').on('click',function(){ 
        
        var search_from = $('#rangeDatePickerFrom').val() != undefined ?$('#rangeDatePickerFrom').val():'';
        var search_to   = $('#rangeDatePickerTo').val() != undefined ?$('#rangeDatePickerTo').val():'';       
        var type        = $('#userType').val() != undefined ?$('#userType').val():'';
        var title       = $('#title').val() != undefined ?$('#title').val():'';
         
        document.location = base_url+'user-reports?title='+title+'&from='+search_from+'&to='+search_to+'&type='+type+'&download=1';
       
    });
    $('#searchUser').on('click',function(e){
        e.preventDefault();
        if (location.href.indexOf('download=') > -1) {
            location.href = location.href.replace('download=1', 'download=0');
            setTimeout(function() { $('#user-report-form').submit(); },2000);
        }else{
            $('#user-report-form').submit();
        }
        
    });
    
});

