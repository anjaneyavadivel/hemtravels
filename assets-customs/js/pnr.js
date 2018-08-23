var base_url = $('.base_url').attr('ID');
jQuery(function($) {

    "use strict";
    
    
    function getPnrDetails(pnr_number,phone_number){ 
        
        clearFields();

        var formData = new FormData();        
        formData.append('pnr_number', pnr_number);
        formData.append('phone_number', phone_number);
      
        formData.append('csrf_test_name', $.cookie('csrf_cookie_name'));

        $.ajax({
                type: "POST",
                url: base_url+'pnr_status/getPNRDetails',
                data: formData,
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,   
                success: function (data)
                {
                    $('.loading').hide();
                    data = $.parseJSON(data); 
                    
                    if(data.status){
                        var result = data.data[0];
                        $('.pnr_number').after(result.pnr_no);
                        $('.package_name').after(result.trip_name);
                        $('.no_of_traveller').after(result.number_of_persons);
                        $('.net_price').after(result.net_price);
                        $('.package_name').after(result.trip_name);
                        $('.billed_by').after(result.bookedby);
                        $('.billed_add').after(result.pick_up_location);
                        $('.billed_email').after(result.bookedby_contactemail);
                        $('.billed_phone_number').after(result.bookedby_contactno);
                        $('.vendor_phone').after(result.trip_contactno);
                        $('.vendor_email').after(result.trip_contactemail);
                        $('.pnr_details').show();
                    }else{
                        $('.check_error').show();
                        $('.pnr_details').hide();
                    }
                    
                }
            });
            
    }
    
    
    $('.check_status').on('click',function(){ 
        $('.check_error').hide();
        if($('#pnr_number').val() != '' && $('#pnr_number').val() != undefined &&
                $('#phone_number').val() && $('#phone_number').val() != undefined){
            getPnrDetails($('#pnr_number').val(),$('#phone_number').val());
        }else{
            $('.check_error').show();
        }  
        
    });
    
    function clearFields(){
        $('.pnr_number').after('');
        $('.package_name').after('');
        $('.net_price').after('');
        $('.package_name').after('');
        $('.billed_by').after('');
        $('.billed_add').after('');
        $('.billed_email').after('');
        $('.billed_phone_number').after('');
        $('.vendor_phone').after('');
        $('.vendor_email').after('');       
    }
    
    $('.pnr_print').on('click',function(){
        window.print();
    });
       
	
});

