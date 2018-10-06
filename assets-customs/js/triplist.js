 var base_url = $('.base_url').attr('ID');
jQuery(function($) {

    "use strict";
 
 $.fn.modalmanager.defaults.resize = true;
    $.fn.modalmanager.defaults.spinner = '<div class="loading-spinner fade" style="width: 200px; margin-left: -100px;"><span style="font-weight:300; color: #eee; font-size: 18px; font-family:Open Sans;">&nbsp;Loading...</div>';

    var $modal = $('#common-ajax-modal');
    
    $('body').on('click', '.share-link', function () {
        $('body').modalmanager('loading'); 
        var id = $(this).attr('data-val');
        setTimeout(function () {            
            $modal.load(base_url + 'trips/tripLinkShareModal/'+id, '', function () {
                
                $modal.modal();
                
                // Autocomplete Tagging 
                var engine = new Bloodhound({
                    local: [],
                    trimValue: true,
                    freeInput: true,
                    datumTokenizer: function(d) {
                        return Bloodhound.tokenizers.whitespace(d.value);
                    },
                    queryTokenizer: Bloodhound.tokenizers.whitespace
                });
                engine.initialize();
                $('#shared_emails').tokenfield({
                    typeahead: [null, { source: engine.ttAdapter() }]
                });

                $('#shared_emails').on('tokenfield:createtoken', function (event) {
                      var existingTokens = $(this).tokenfield('getTokens');
                      $.each(existingTokens, function(index, token) {
                          if (token.value === event.attrs.value)
                              event.preventDefault();
                      });
                });
                
            });
        }, 1000);
    });
    
    $('body').on('click','.vendorShare',function(){
       var emails = $('#shared_emails').val();
       //var emails = $('#shared_emails-tokenfield').val();
       $('.shareEmailsErr').show();
       
       if(emails != '' && emails != undefined){
           $('.shareEmailsErr').hide();
           
            var formData = new FormData();
                formData.append('emails', emails);
                formData.append('coupon_history_id', $('#coupon_history_id').val());
                formData.append('share_trip_id', $('#share_trip_id').val());
                formData.append('csrf_test_name', $.cookie('csrf_cookie_name'));

                $.ajax({
                    type: "POST",
                    url: base_url+'trips/vendorShare',
                    data: formData,
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData:false,   
                    success: function (data)
                    {
                        $('.vendorShareDiv').hide();
                        $('.AcMsg').show();
                        data = $.parseJSON(data);
                        if(data.status == 'suc'){
                            var msg = 'Successfully shared,the link is: '+base_url+'make-shared-trip/'+data.code;
                            $('.AcMsgDis').text(msg);
                        }else{
                            $('.AcMsgDis').text('Shared not done,please try again');
                        }
                        
                    }
                });
       }
        
    });
});