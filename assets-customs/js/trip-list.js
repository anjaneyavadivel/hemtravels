var base_url = $('.base_url').attr('ID');
jQuery(function($) {

    "use strict";
    
     var search_price = '',search_people = '',search_category = '';
	
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
    
    function getTripLists(){ 
        
        $('.loading').show();

        var formData = new FormData();
        var page = $('#currentPage').val();
        formData.append('currentPage', page);
        formData.append('search_title', $('#search_title').val());
        formData.append('search_price', search_price);
        formData.append('search_people', search_people);
        formData.append('search_category', search_category);
        formData.append('search_tags', $('#autocompleteTagging2').val());
        formData.append('sort_by', $(".sortOrder option:selected").val());
        formData.append('csrf_test_name', $.cookie('csrf_cookie_name'));
        
        $('.load_more').show();

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
                                
                                var isShared = 'Not shared';
                                if(data.shared_email && data.shared_email != ''){
                                    isShared = 'Shared by '+data.shared_email;
                                }
                                
                                var rating  = '';
                                
                                if(data.total_rating){
                                    
                                    var comment = 'Excellent';
                                    var rating_val = data.total_rating;
                                    if(data.total_rating < 1){comment = 'Low';}else if(data.total_rating < 3){comment = 'Average';}else if(data.total_rating < 4){comment = 'Good';}
                                    
                                    rating = ' '+comment+' <span  class="stars_rate btn-primary">'+data.total_rating+'</span>';
                                }
                                
                                //EDIT OPTION ENABLE/DISABLE
                                var is_not_cut = '';
                                if(user_type != 'CU'){
                                    is_not_cut ='<div class="mt-10">'+
                                                    '<a href="'+base_url+'trips/update/'+data.trip_code+'" class="btn btn-info btn-sm">Edit</a>'+
                                                    '<a href="javascript:;" class="btn btn-danger btn-sm tripDelete" data-id="'+data.id+'">Delete</a>'+
                                                '</div>'+
                                                '<div class="trip-by pt-5"><a href="'+base_url+'trip-calendar-view"><span class="text-primary font22 font700 mb-1">'+data.total_booking+'</span> Booking List</a></div>';
                                }
                                
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
                                                            
                                                            '<p style="margin-bottom: 0;"><i class="fa fa-share text-center"></i> Shared: '+isShared+'</p>'+
                                                            trip_duration+
                                                            '<p class=" font-lg trip-list-brief-description">'+data.brief_description+'</p>'+
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
                                                                        '<div class="price_off mr-10">5% OFF</div>'+
                                                                        '<div class="price pl-50">'+
                                                                            '<span class="">'+data.price_to_adult+'</span>'+
                                                                            '<sub> <strike class="text-muted">40000</strike> </sub>'+
                                                                        '</div>'+
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
            message: "Are you sure want to delete this trip?",
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
    
       
	
});

