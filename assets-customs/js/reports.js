var base_url = $('.base_url').attr('ID');
jQuery(function($) {

    "use strict";
    
     $.fn.modalmanager.defaults.resize = true;
    $.fn.modalmanager.defaults.spinner = '<div class="loading-spinner fade" style="width: 200px; margin-left: -100px;"><span style="font-weight:300; color: #eee; font-size: 18px; font-family:Open Sans;">&nbsp;Loading...</div>';

    var $modal = $('#common-ajax-modal');
    $('.withdraw-request-btn').on('click',function(){
       
        $('body').modalmanager('loading');        
        setTimeout(function () {
            $modal.load(base_url + 'withdraw-request-add', '', function () {
                $modal.modal();
                addwithdrawValidation();
            });
        }, 1000);
    });
    $('body').on('change','#account',function(){
        var val = $(this).val();
        
        if(val != undefined && val != '' && val != 'new' ){
            var formData = new FormData();
            formData.append('id', val);
            formData.append('csrf_test_name', $.cookie('csrf_cookie_name'));
            $.ajax({
                type: "post",
                url: base_url+'Pnr_status/getAccountDetails',
                data: formData,
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,   
                success: function (data)
                {
                    data = $.parseJSON(data);
                    if(data.id){
                        $('#bank_name').val(data.bank_name);
                        $('#account_holder_name').val(data.account_holder_name);
                        $('#account_number').val(data.account_number);
                        $('#ifsc_code').val(data.ifsc_code);
                        $('#branch').val(data.branch);
                        $('#address').val(data.address);
                        
                        if(data.is_primary == 1){
                            $('#is_primary').attr("checked",true);
                        }
                    }
                  
                }
            });
            
            
        }
    });
    function addwithdrawValidation(){
        
         $('.errorMsg').hide();
         $('.sucMsg').hide();

        var form2 = $('#add-withdraw-request');
           form2.validate({               
               
               rules: {            
                   withdrawalamount: {
                       required: true,
                       number: true,
                       range: [$('#min_withdrawal').val(), $('#max_withdrawal').val()]
                   },
                   account: {
                       required: true,
                   },
                   bank_name: {
                       required: true,
                       maxlength:150
                   },
                   account_holder_name: {
                       required: true,
                       maxlength:150
                   },
                   account_number: {
                       required: true,
                       maxlength:150
                   },
                   ifsc_code: {
                       required: true,
                       maxlength:50
                   },
                   branch: {
                       required: true,
                       maxlength:150
                   },
                   address: {
                       required: true,
                       maxlength:150
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
                error.insertAfter( element.parent("div"));
            } else {
                error.insertafter(element.parent());
            }
               },
               submitHandler: function (form)
               {
                   $('.errorMsg').hide();
                   if ($(form).valid())
                   {
                       var values = form2.serializeArray();
                       values.push({name: "csrf_test_name", value: $.cookie('csrf_cookie_name')});
                       var url = base_url + 'withdraw-request-save';
                       $.ajax({
                           url: url,
                           type: 'post',
                           data: values,
                           success: function (res) {
                                if (res == 'yes') {
                                   $('.errorMsg').show();
                                } else {
                                    $('.sucMsg').show();
                                    setTimeout(function () {
                                    window.location.href = base_url+'my-transaction-reports';   
                                    }, 1000);
                                }

                           }
                       });
                   }
                   return false;
               }
           });
    }
     var requestid =0;
    $('.withdraw-request-pay-btn').on('click',function(){
        requestid = $(this).attr('data-id');
        $('body').modalmanager('loading');  
        var formData = new FormData();
            formData.append('requestid', requestid);
            formData.append('csrf_test_name', $.cookie('csrf_cookie_name'));

            $.ajax({
                type: "POST",
                url: base_url+'withdraw-request-pay',
                data: formData,
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,   
                success: function (res)
                { setTimeout(function () {
                   $modal.html(res);     
                   $modal.modal();
                   paywithdrawValidation();
                  }, 1000);
                }
            });
    });
    function paywithdrawValidation(){
        
         $('.errorMsg').hide();
         $('.sucMsg').hide();

        var form2 = $('#pay-withdraw-request');
           form2.validate({               
               
               rules: {            
                   payamount: {
                       required: true,
                       number: true
                   },      
                   paynotes: {
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
                error.insertAfter( element.parent("div"));
            } else {
                error.insertafter(element.parent());
            }
               },
               submitHandler: function (form)
               {
                   $('.errorMsg').hide();
                   if ($(form).valid())
                   {
                       var values = form2.serializeArray();
                       values.push({name: "csrf_test_name", value: $.cookie('csrf_cookie_name')});
                       var url = base_url + 'withdraw-request-paid';
                       $.ajax({
                           url: url,
                           type: 'post',
                           data: values,
                           success: function (res) {
                                if (res == 'yes') {
                                   $('.errorMsg').show();
                                } else {
                                    $('.sucMsg').show();
                                    setTimeout(function () {
                                    window.location.href = base_url+'withdrawals-request';   
                                    }, 1000);
                                }

                           }
                       });
                   }
                   return false;
               }
           });
    }
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
    
    //CANCEL REPORT - PAY REFUND MODAL
    $('body').on('click','.payRefundModal',function(){
        var id = $(this).attr('data-id');
         $('body').modalmanager('loading');        
        setTimeout(function () {
            $modal.load(base_url + 'report/addRefundmodal/'+id, '', function () {
                $modal.modal();

                refundValidation();
            });
        }, 1000);
    });
    
    function refundValidation(){
        
         $('.errorMsg').hide();

        var form2 = $('#add-refund');
           form2.validate({               
               
               rules: {            
                   ref_per: {
                       required: true,
                       number: true,
                       range: [0, 100]
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
                       values.push({name: "pnr_no", value: $('#re_pnr_no').val()});
                       values.push({name: "ret_per", value: $('#ref_per').val()});
                       values.push({name: "notes", value: $('#notes').val()});
                       var url = base_url + 'report/addRefundAction';
                       $.ajax({
                           url: url,
                           type: 'post',
                           data: values,
                           success: function (res) {
                                window.location.reload();
                           }
                       });
                   }
                   return false;
               }
           });
    }
   
   $('#canReport').on('click',function(){ 
        
        var search_from = $('#rangeDatePickerFrom').val() != undefined ?$('#rangeDatePickerFrom').val():'';
        var search_to   = $('#rangeDatePickerTo').val() != undefined ?$('#rangeDatePickerTo').val():'';
        var status      = $('#ca_status').val() != undefined ?$('#ca_status').val():'';
        var bookfrom      = $('#bookfrom').val() != undefined ?$('#bookfrom').val():'';
        var titleSearch = $('#ca_titleSearch').val() != undefined ?$('#ca_titleSearch').val():'';
         
        document.location = base_url+'cancellation-reports?from='+search_from+'&to='+search_to+'&status='+status+'&bookfrom='+bookfrom+'&title='+titleSearch+'&download=1';
       
    });
    $('#canSearch').on('click',function(e){
        e.preventDefault();
        if (location.href.indexOf('download=') > -1) {
            location.href = location.href.replace('download=1', 'download=0');
            setTimeout(function() { $('#cancel-report-form').submit(); },2000);
        }else{
            $('#cancel-report-form').submit();
        }
        
    });
    
    //TRIP SHARED REPORT
    $('#tripSharedReport').on('click',function(){
       
        var status      = $('#status').val() != undefined ?$('#status').val():'';
        var title       = $('#titleSearch').val() != undefined ?$('#titleSearch').val():'';
         
        document.location = base_url+'trip-shared-reports?title='+title+'&status='+status+'&download=1';
       
    });
    $('#searchSharedTrip').on('click',function(e){ 
        e.preventDefault();
        if (location.href.indexOf('download=') > -1) {
            location.href = location.href.replace('download=1', 'download=0');
            setTimeout(function() { $('#trip-shared-report-form').submit(); },2000);
        }else{
            $('#trip-shared-report-form').submit();
        }
        
    });
    
    //PAY HISTORY REPORT
    $('#payHistoryExportXLSX').on('click',function(){ 
        
        var search_from = $('#rangeDatePickerFrom').val() != undefined ?$('#rangeDatePickerFrom').val():'';
        var search_to   = $('#rangeDatePickerTo').val() != undefined ?$('#rangeDatePickerTo').val():'';       
        var titleSearch = $('#searchTitle').val() != undefined ?$('#searchTitle').val():'';
         
        document.location = base_url+'pay-history-reports?from='+search_from+'&to='+search_to+'&title='+titleSearch+'&download=1';
       
    });
    $('#payHistorySearchBtn').on('click',function(e){
        e.preventDefault();
        if (location.href.indexOf('download=') > -1) {
            location.href = location.href.replace('download=1', 'download=0');
            setTimeout(function() { $('#pay-history-report-form').submit(); },2000);
        }else{
            $('#pay-history-report-form').submit();
        }
        
    });
    
     //PAYMENT SUMMARY REPORT
    $('#paymentSummaryExportXLSX').on('click',function(){ 
        
        var search_from = $('#rangeDatePickerFrom').val() != undefined ?$('#rangeDatePickerFrom').val():'';
        var search_to   = $('#rangeDatePickerTo').val() != undefined ?$('#rangeDatePickerTo').val():'';       
        var titleSearch = $('#searchTitle').val() != undefined ?$('#searchTitle').val():'';
         
        document.location = base_url+'payment-summary-reports?from='+search_from+'&to='+search_to+'&title='+titleSearch+'&download=1';
       
    });
    $('#paySummarySearchBtn').on('click',function(e){
        e.preventDefault();
        if (location.href.indexOf('download=') > -1) {
            location.href = location.href.replace('download=1', 'download=0');
            setTimeout(function() { $('#payment-summary-report-form').submit(); },2000);
        }else{
            $('#payment-summary-report-form').submit();
        }
        
    });
});

