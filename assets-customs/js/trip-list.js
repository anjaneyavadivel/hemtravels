var base_url = $('.base_url').attr('ID');
jQuery(function($) {

    "use strict";
    
     var search_price = '',search_people = '',search_category = '',search_term = '';
     
    var se_cat_param = getParameterByName("category_id"); 
    if( se_cat_param != null && se_cat_param != ''){
        search_category = se_cat_param
    }
    var se_ser_param = getParameterByName("search"); 
    if( se_ser_param != null && se_ser_param != ''){
        search_term = se_ser_param
    }
	
    //LOAD DEFAULT LISTS
    getTripLists();
    
    // Autocomplete Tagging 
	var engine = new Bloodhound({
		local: JSON.parse(group_tags),
                trimValue: true,
                freeInput: true,
		datumTokenizer: function(d) {
			return Bloodhound.tokenizers.whitespace(d.value);
		},
		queryTokenizer: Bloodhound.tokenizers.whitespace
	});
	engine.initialize();
	$('#autocompleteTagging2').tokenfield({
		typeahead: [null, { source: engine.ttAdapter() }],
		limit: '5',
	});
        
        $('#autocompleteTagging2').on('tokenfield:createtoken', function (event) {
              var existingTokens = $(this).tokenfield('getTokens');
              $.each(existingTokens, function(index, token) {
                  if (token.value === event.attrs.value)
                      event.preventDefault();
              });
        });

    function getTripLists(){ 
        
        ///$('.loading').show();

        var formData = new FormData();
        var page = $('#currentPage').val();
        formData.append('currentPage', page);
        formData.append('search_title', $('#search_title').val());
        formData.append('search_price', search_price);
        formData.append('search_people', search_people);
        formData.append('search_category', search_category);
        formData.append('search_tags', $('#autocompleteTagging2').val());
        formData.append('sort_by', $(".sortOrder option:selected").val());
        formData.append('search_term', search_term);
        formData.append('csrf_test_name', $.cookie('csrf_cookie_name'));
        
        //$('.load_more').show();

        $.ajax({
                type: "POST",
                url: base_url+'trips/getTripLists',
                data: formData,
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,   
                success: function (data)
                {
                    data = $.parseJSON(data); 
//                    console.log(data)
//                    exit;                  
                    var result = '',user_type =$('#userType').val();
                    if(data.results && data.results.length > 0){ 
                        
                        $('#currentPage').val(parseInt(page)+1); 
                        
                        if(data.last_page && data.last_page == page){
                            $('.load_more').hide();
                        }
                        
                        if(page == '1'){
                            $('.trip-list-items-wrapper').html('');
                        }
                        
                        $.each(data.results, function (i, data) { 
                            if(data){
                                
                                var trip_duration = '<p style="margin-bottom: 0;"><i class="fa fa-sun-o text-center"></i> '+data.how_many_days+' Days <span class="mh-5 text-muted">|</span><i class="fa fa-moon-o text-center"></i> '+data.how_many_nights+' Nights</p>';
                                
                                if(data.how_many_hours > 0){
                                    trip_duration = '<p style="margin-bottom: 0;"><i class="fa fa-sun-o text-center"></i> '+data.how_many_hours+' Hours </p>';                                   
                                } 
                                
                                var status = data.status == '1'?'Open':'Closed';  
                                
                                //IMAGE
                                var image = base_url+'assets-customs/img/no_image_found.png';
                                if(data.trip_img_name && data.trip_img_name != ''){
                                  image = base_url+'assets-customs/gallery_images/'+data.trip_img_name;  
                                }
                                
                                //SHARED DETAILS
                                var isShared = 'Not shared',shared_detail = '';
                                if(data.shared_email && data.shared_email != ''){
                                    isShared = 'Shared by '+data.shared_email;
                                }
                                if(data.sharedemail && data.sharedemail != ''){
                                    isShared = 'Shared by '+data.sharedemail;
                                }
                                if(user_type == 'SA' || user_type == 'VA'){
                                   shared_detail = '<p style="margin-bottom: 0;"><i class="fa fa-share text-center"></i> Shared: '+isShared+'</p>';
                                }
                                
                                //RATING
                                var rating  = '';                                
                                if(data.total_rating){
                                    
                                    var comment = 'Excellent';
                                    var rating_val = data.total_rating;
                                    if(data.total_rating < 1){comment = 'New';}else if(data.total_rating < 3){comment = 'Average';}else if(data.total_rating < 4){comment = 'Good';}
                                    
                                    rating = ' '+comment+' <span  class="stars_rate btn-primary">'+data.total_rating+'</span>';
                                }
                                
                                //EDIT OPTION ENABLE/DISABLE
                                var is_not_cut = '';
                                if(user_type == 'SA' || user_type == 'VA'){
                                    is_not_cut ='<div class="mt-10">'+
                                                    '<a href="'+base_url+'trips/update/'+data.trip_code+'" class="btn btn-info btn-sm">Edit</a>'+
                                                    '<a href="javascript:;" class="btn btn-danger btn-sm tripDelete" data-id="'+data.id+'">Delete</a>'+
                                                '</div>'+
                                                //'<div class="trip-by pt-5"><a href="'+base_url+'trip-calendar-view/'+data.trip_code+'"><span class="text-primary font22 font700 mb-1">'+data.total_booking+'</span> Booking List</a></div>';
                                                '<div class="trip-by pt-5"><a href="'+base_url+'trip-calendar-view/'+data.trip_code+'">Month View</a></div>'+
                                                '<div class="trip-by pt-5"><a class="share-link" href="javascript:void(0);" data-val="'+data.trip_code+'">Share Link</a></div>';
                                }
                                
                                //OFFER DETAILS
                                var price = data.offer_details.price_to_child > 0 ?data.offer_details.price_to_child:data.offer_details.price_to_adult;
                                
                                if(price == undefined){
                                    price = data.price_to_child > 0 ? data.price_to_child:data.price_to_adult;
                                }
                                var offer_details = '<div class="price">'+
                                                        '<span class="">'+price+'</span>'+                                        
                                                    '</div>';
                                if((data.offer_details.discount_percentage && data.offer_details.discount_percentage > 0)
                                || (data.offer_details.discount_price && data.offer_details.discount_price > 0)){
                                    var fin_price = data.offer_details.final_price_to_child > 0 ?data.offer_details.final_price_to_child:data.offer_details.final_price_to_adult;
                                    
                                    offer_details = '<div class="price_off mr-10">'+data.offer_details.discount_price+' OFF</div>';
                                    if(data.offer_details.discount_percentage && data.offer_details.discount_percentage > 0){
                                        offer_details = '<div class="price_off mr-10">'+data.offer_details.discount_percentage+'% OFF</div>';
                                    }
                                    
                                       offer_details += '<div class="price pl-50">'+
                                            '<span class="">'+fin_price+'</span>'+
                                            '<sub> <strike class="text-muted">'+price+'</strike> </sub>'+
                                        '</div>';
                                }
                                    
                                //trim the string to the maximum length
                                var trimmedDescription = data.brief_description.substr(0, 200);

                                //re-trim if we are in the middle of a word
                                trimmedDescription = trimmedDescription.substr(0, Math.min(trimmedDescription.length, trimmedDescription.lastIndexOf(" ")))
                                
                                result += '<div class="itinerary-list-item trip-list-item-data">'+
                                                '<div class="row">'+
                                                    '<div class="col-xs-12 col-sm-3 col-md-3">'+
                                                        '<div class="image">'+
                                                            '<a href="'+base_url+'trip-view/'+data.trip_code+'"><img src="'+image+'" alt="'+data.trip_name+'" /></a>'+
                                                        '</div>'+is_not_cut+
                                                    '</div>'+
                                                    '<div class="col-xs-12 col-sm-6 col-md-6">'+
                                                        '<div class="content">'+
                                                            '<h4><a href="'+base_url+'trip-view/'+data.trip_code+'">'+data.trip_name+'</a></h4>'+
                                                            '<p style="margin-bottom: 0;"><i class="fa fa-map-marker text-center"></i> '+data.meeting_point+' <span class="mh-5 text-muted">|</span>Status: '+status+'</p>'+
                                                            
                                                            shared_detail+
                                                            trip_duration+
                                                            '<p class=" font-lg trip-list-brief-description">'+trimmedDescription+'...</p>'+
                                                        '</div>'+
                                                    '</div>'+
                                                    '<div class="col-xs-12 col-sm-3 col-md-3 b_left">'+
                                                        '<div class="">'+
                                                            '<div class="trip-guide-sm-item clearfix">'+
                                                                '<div class="content">'+
                                                                    '<h4 class="text-primary">'+rating+'</h4>'+
                                                                    '<div class="rating-item">'+
                                                                        '<span style="cursor: default;"> <input type="hidden" class="rating" data-filled="fa fa-star rating-rated" data-empty="fa fa-star-o" data-fractions="2" data-readonly="" value="'+rating_val+'">'+
                                                                    '</div>'+
                                                                    '<div class="trip-by"><span class="text-primary font700 mb-1">Staring From</div>'+
                                                                        offer_details+
                                                                        '<div class="mt-20 ">'+
                                                                            '<a href="'+base_url+'trip-view/'+data.trip_code+'" class="btn btn-primary btn-sm">Book</a>'+
                                                                        '</div>'+																								
                                                                    '</div>'+
                                                                '</div>'+
                                                            '</div>'+
                                                        '</div>'+
                                                '</div>'+
                                            '</div>';
                            }
                        });
                    }
                    
                    if(result == ''){
                        $('.trip-list-items-wrapper').html('<h3>No Data Found</h3>');
                        $('.load_more').hide();
                    }else{
                        $('.trip-list-items-wrapper').append(result);
                    }
                    
                    setTimeout(function(){
                        $('.loading').hide();
                    },500);
                    
                }
            });
            
    }
    
    //PAGE INCREMENT
    $('.load_more').on('click',function(){ 
        getTripLists();
    });
    
    //TITLE
    $('#search_title').keyup( function() {
        if(this.value.length > 0 && this.value.length < 4 ) return;
        /* code to run below */
        $('#currentPage').val(1); 
        $('.trip-list-items-wrapper').html('');
        getTripLists();
    });
    
    //PRICE   
    $('.search_price').click(function(){
        search_price = '';
        $('#currentPage').val(1);
        
        $('.search_price:checked').each(function(i){
          search_price += $(this).val()+', ';
        });        
        getTripLists();
    });
    
    //PEOPLE   
    $('.search_people').click(function(){
        search_people = '';
        $('#currentPage').val(1);
        
        $('.search_people:checked').each(function(i){
          search_people += $(this).val()+', ';
        });        
        getTripLists();
    });
    
    //PEOPLE   
    $('.search_category').click(function(){ 
        
        var uri = window.location.href.toString();
        if (uri.indexOf("?") > 0) {
            var clean_uri = uri.substring(0, uri.indexOf("?"));
            window.history.replaceState({}, document.title, clean_uri);
        }
        
        search_category = '';
        $('#currentPage').val(1);
        
        $('.search_category:checked').each(function(i){
          search_category += $(this).val()+', ';
        });        
        getTripLists();
    });
    
    //SEARCH   
    $('.sortOrder').change(function(){ 
       
        $('#currentPage').val(1);              
        getTripLists();
    });
    
    //TRIP DELETE
    $(document).on('click','.tripDelete',function(){
        
        var trip_id = $(this).attr('data-id');
        bootbox.confirm({
            message: "Are you sure want to delete this trip and their child trips?",
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
                    var formData = new FormData();
                    formData.append('trip_id', trip_id);
                    formData.append('csrf_test_name', $.cookie('csrf_cookie_name'));
                    
                    $.ajax({
                        type: "POST",
                        url: base_url+'trips/delete_trip',
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
            }
        });
        
    });
    
    function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    }   
    
    
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
//                var engine = new Bloodhound({
//                    local: [],
//                    trimValue: true,
//                    freeInput: true,
//                    datumTokenizer: function(d) {
//                        return Bloodhound.tokenizers.whitespace(d.value);
//                    },
//                    queryTokenizer: Bloodhound.tokenizers.whitespace
//                });
//                engine.initialize();
//                $('#shared_emails').tokenfield({
//                    typeahead: [null, { source: engine.ttAdapter() }]
//                });

//                $('#shared_emails').on('tokenfield:createtoken', function (event) {
//                      var existingTokens = $(this).tokenfield('getTokens');
//                      $.each(existingTokens, function(index, token) {
//                          if (token.value === event.attrs.value)
//                              event.preventDefault();
//                      });
//                });
                
            });
        }, 1000);
    });
    
    $('body').on('click','.vendorShare',function(){
       var emails = $('#shared_emails').val();
       //var emails5 = $('#shared_emails-tokenfield').val();alert(emails);alert(emails5);
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

