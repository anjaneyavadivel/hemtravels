var base_url = $('.base_url').attr('ID');
jQuery(function($) {

    "use strict";
    
    $.fn.modalmanager.defaults.resize = true;
    $.fn.modalmanager.defaults.spinner = '<div class="loading-spinner fade" style="width: 200px; margin-left: -100px;"><span style="font-weight:300; color: #eee; font-size: 18px; font-family:Open Sans;">&nbsp;Loading...</div>';

    var $modal = $('#common-ajax-modal');
    
    
//    function getPnrDetails(pnr_number,phone_number){ 
//        
//        clearFields();
//
//        var formData = new FormData();        
//        formData.append('pnr_number', pnr_number);
//        formData.append('phone_number', phone_number);
//      
//        formData.append('csrf_test_name', $.cookie('csrf_cookie_name'));
//
//        $.ajax({
//                type: "POST",
//                url: base_url+'pnr_status/getPNRDetails',
//                data: formData,
//                contentType: false,       // The content type used when sending data to the server.
//                cache: false,             // To unable request pages to be cached
//                processData:false,   
//                success: function (data)
//                {
//                    $('.loading').hide();
//                    data = $.parseJSON(data); 
//                    
//                    if(data.status){
//                        var result = data.data[0];
//                        $('.pnr_number').after(result.pnr_no);
//                        $('.package_name').after(result.trip_name);
//                        $('.no_of_traveller').after(result.number_of_persons);
//                        $('.net_price').after(result.net_price);
//                        $('.package_name').after(result.trip_name);
//                        $('.billed_by').after(result.bookedby);
//                        $('.billed_add').after(result.pick_up_location);
//                        $('.billed_email').after(result.bookedby_contactemail);
//                        $('.billed_phone_number').after(result.bookedby_contactno);
//                        $('.vendor_phone').after(result.trip_contactno);
//                        $('.vendor_email').after(result.trip_contactemail);
//                        $('.pnr_details').show();
//                    }else{
//                        $('.check_error').show();
//                        $('.pnr_details').hide();
//                    }
//                    
//                }
//            });
//            
//    }
    
    
//    $('.check_status').on('click',function(){ 
//        $('.check_error').hide();
//        if($('#pnr_number').val() != '' && $('#pnr_number').val() != undefined &&
//                $('#phone_number').val() && $('#phone_number').val() != undefined){
//            getPnrDetails($('#pnr_number').val(),$('#phone_number').val());
//        }else{
//            $('.check_error').show();
//        }  
//        
//    });
    
//    function clearFields(){
//        $('.pnr_number').after('');
//        $('.package_name').after('');
//        $('.net_price').after('');
//        $('.package_name').after('');
//        $('.billed_by').after('');
//        $('.billed_add').after('');
//        $('.billed_email').after('');
//        $('.billed_phone_number').after('');
//        $('.vendor_phone').after('');
//        $('.vendor_email').after('');       
//    }
    
    $('.pnr_print').on('click',function(){
        var printContents = document.getElementById('pnrinfo').innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    });
    
    $('.cancel_trip').on('click',function(){
       var pnr_no = $(this).attr('data-pnr');
       bootbox.confirm({
            message: "Are you sure want to cancel your trip?",
            buttons: {
                confirm: {
                    label: 'Yes',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'No',
                    className: 'btn-danger'
                }
            },
            callback: function (result) {
                if(result){
                    
                    $('body').modalmanager('loading');        
                    setTimeout(function () {
                        $modal.load(base_url + 'pnr_status/addAccountmodal/'+pnr_no, '', function () {
                            $modal.modal();

                            addValidation();
                        });
                    }, 1000);
                   
                }
            }
        });
    });
    
    
    function addValidation(){
        
         $('.errorMsg').hide();

        var form2 = $('#add-account-info');
           form2.validate({               
               
               rules: {            
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
                       var url = base_url + 'pnr_status/addEditAccountAction';
                       $.ajax({
                           url: url,
                           type: 'post',
                           data: values,
                           success: function (res) {
                                if (res == 'yes') {
                                   $('.errorMsg').show();
                                } else {
                                    if($('#addAccPnr').val() != undefined && $('#addAccPnr').val() != ''){
                                       cancelTrip($('#addAccPnr').val(),res);
                                    }                                   
                                }

                           }
                       });
                   }
                   return false;
               }
           });
    }
    
    function cancelTrip(pnr_no,accountid){
         var formData = new FormData();
            formData.append('pnr_no', pnr_no);
            formData.append('accountid', accountid);
            formData.append('csrf_test_name', $.cookie('csrf_cookie_name'));

            $.ajax({
                type: "POST",
                url: base_url+'Pnr_status/cancel_trip',
                data: formData,
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,   
                success: function (data)
                {
                  window.location.href = base_url+'trip-list';
                }
            });
    }
    
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
       
	
});

