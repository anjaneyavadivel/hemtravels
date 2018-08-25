var base_url = $('.base_url').attr('ID');
jQuery(function($) {

	"use strict";

		
	/**
	 * Input Spinner
	*/
	$(".form-spin").TouchSpin({
		buttondown_class: 'btn btn-spinner-down',
		buttonup_class: 'btn btn-spinner-up',
		buttondown_txt: '<i class="ion-minus"></i>',
		buttonup_txt: '<i class="ion-plus"></i>'
	});
		

	/**
	 * Dropzone - a custom file upload
	*/
	if( $('.dropzone').length > 0 ) {
		Dropzone.autoDiscover = false;                
		$("#file-submit").dropzone({
                    url: base_url+"trips/gallery_upload",
                    addRemoveLinks: true,
                    init: function() {
                        this.on("sending", function(file, xhr, formData){
                                formData.append("csrf_test_name", $.cookie('csrf_cookie_name'));
                        });                                              
                        
                        // Add server images
                        var myDropzone = this;

                        //$.get('/server-images', function(data) {
                            var ex_images = $('#ex_gallery_images').val();
                            
                            if(ex_images != '' && ex_images != 'undefined'){
                                ex_images = $.parseJSON(ex_images);

                                $.each(ex_images, function (key, value) {

                                    var file = {name: value.file_name,image_id:value.id};                                
                                    myDropzone.options.addedfile.call(myDropzone, file);                                
                                    myDropzone.options.thumbnail.call(myDropzone, file,base_url+'assets-customs/gallery_images/'+value.file_name);
                                    myDropzone.emit("complete", file);

                                });
                            }
                        //});


                    },
                    //autoProcessQueue:false
                    success : function(file, response){ 

                        response = $.parseJSON(response); 
                        if(response.upload_data.file_name){                            
                            var value = $('#gallery_images').val();                            
                                value = $.parseJSON(value);
                                value.push(response.upload_data.file_name);                                            
                                $('#gallery_images').val(JSON.stringify(value)); 
                          
                        }
                    },
                    removedfile: function(file) { 
                        if(file.xhr && file.xhr.response){
                            var re_file = $.parseJSON(file.xhr.response);

                            if(re_file.upload_data.file_name){
                                var ex_files = $('#gallery_images').val();
                                ex_files = $.parseJSON(ex_files);                                  
                                removeItem(ex_files,re_file.upload_data.file_name);
                                $('#gallery_images').val(JSON.stringify(ex_files)); 
                            }
                           
                        }else if(file.image_id){
                           var rm_img = $('#ex_rm_gallery_images').val();
                               rm_img = $.trim(rm_img) +file.image_id+ ',';
                               $('#ex_rm_gallery_images').val(rm_img);
                        }
                        var _ref;
                           return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                    }
		});

		$("#profile-picture").dropzone({
				url: "upload",
				addRemoveLinks: true
		});
		
		$(".itinerary-menu-image").dropzone({
				url: "upload",
				maxFiles: 10,
				addRemoveLinks: true
		});
	}
        
        
        function removeItem(array, item){
            for(var i in array){
                if(array[i]==item){
                    array.splice(i,1);
                    break;
                }
            }
        }
	
	
	/**
	 * Time Picker
	*/
	if( $('.oh-timepicker').length > 0 ) {
		$('.oh-timepicker').timepicker();
	}
	
	
	/**
	 * Tokenfield for Bootstrap
	 * http://sliptree.github.io/bootstrap-tokenfield/
	*/
	
//	// Autocomplete Tagging
//	var engine = new Bloodhound({
//		local: [{value: 'Paris'}, {value: 'London'}, {value: 'Bangkok'} , {value: 'Bali'}, {value: 'Hongkong'}, {value: 'Rome'}, {value: 'Dubai'}, {value: 'Cairo'}, {value: 'Istanbul'}],
//		datumTokenizer: function(d) {
//			return Bloodhound.tokenizers.whitespace(d.value);
//		},
//		queryTokenizer: Bloodhound.tokenizers.whitespace
//	});
//	engine.initialize();
//	$('#autocompleteTagging').tokenfield({
//		typeahead: [null, { source: engine.ttAdapter() }],
//		limit: '4',
//	});
	
//	// Autocomplete Tagging 
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
        
        // Instantiate the Bloodhound suggestion engine
//        var tags = new Bloodhound({
//            datumTokenizer: function (datum) {
//                return Bloodhound.tokenizers.whitespace(datum.value);
//            },
//            queryTokenizer: Bloodhound.tokenizers.whitespace,
//            remote: {
//                url: base_url+'getalltags',
//                filter: function (tags) {
//                    // Map the remote source JSON array to a JavaScript object array
//                    return $.map(tags.results, function (tags) {
//                        return {
//                            value: tags.name
//                        };
//                    });
//                }
//            }
//        });
//
//        // Initialize the Bloodhound suggestion engine
//        tags.initialize();
//
//        // Instantiate the Typeahead UI
//        $('.autocompleteTagging2').typeahead(null, {
//            // Use 'value' as the displayKey because the filter function 
//            // returns suggestions in a javascript object with a variable called 'value'
//            displayKey: 'value',
//            source: tags.ttAdapter()
//        });
        $('body').on('change', '#trip_duration', function (e)
            {
                e.preventDefault();
                var id = $(this).val();
                    $("#how_many_daysdiv").addClass('hide');
                    $("#how_many_hoursdiv").addClass('hide');
                if(id==2){
                    $("#how_many_daysdiv").removeClass('hide');
                } else if(id==1){
                    $("#how_many_hoursdiv").removeClass('hide');
                }
            });

     //get city
     $('#state_id').on('change',function(){
        
        $('#city_id').empty();
        $('#city_id').append($('<option>', { value:'',text : 'Select a city'}));
        
        if(this.value){
            $('#city_id').prepend($('<option selected></option>').html('Loading...'));

            var formData = new FormData();
            formData.append('state_id', this.value);
            formData.append('csrf_test_name', $.cookie('csrf_cookie_name'));
            
            $.ajax({
                type: "POST",
                url: base_url+'trips/city_list',
                data: formData,
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,   
                success: function (data)
                {
                    $('#city_id option')[0].remove();
                    data = $.parseJSON(data); 
                    console.log(data);
                    $.each(data.data, function (i, data) { 
                        if(data){
                            $('#city_id').append($('<option>', { 
                                value: data.id,
                                text : data .name
                            }));
                        }
                    });
                    $('#city_id').append($('<option>', { 
                                value: 'other',
                                text : 'Add New'
                            }));
                    $('.selectpicker').selectpicker('refresh');
                }
            });

           
        }
    });
    
    //ADD NEW PICKUP LOCATION
    $('#addNewPickupLoc').on('click',function(){
        var len = $('.pickup_location_list').length,newItem = len+1;
       
        $('#pickup_location_list_'+len).after(
                        '<div class="pickup_location_list" id="pickup_location_list_'+newItem+'">'+
                            '<div class="row">'+
                                '<div class="col-xs-12 col-sm-5">'+
                                    '<div class="form-group">'+
                                        '<label>Location'+newItem+'</label>'+
                                        '<input type="text" class="form-control" name="pickup_meeting_point[]"/>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-xs-12 col-sm-3">'+
                                    '<div class="form-group">'+
                                        '<label>Location'+newItem+' time</label>'+
                                        '<input type="text" class="oh-timepicker form-control" name="pickup_meeting_time[]"/>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-xs-12 col-sm-4">'+
                                    '<div class="form-group">'+
                                        '<label>Location'+newItem+' Landmark</label>'+
                                        '<input type="text" class="oh-timepicker1 form-control" name="pickup_landmark[]"/>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>');
                
                $('.oh-timepicker').timepicker();
    });
    
    //ADD NEW IT
    $('#addNewItinerary').on('click',function(){
         var len = $('.itinerary-form-item').length,newItem = len+1;
         
         $('.itinerary-form-wrapper').append('<div class="itinerary-form-item" id="itinerary_form_item_'+len+'">'+
                                                '<div class="content clearfix">'+
                                                    '<div class="row gap-20">'+
                                                        '<div class="col-xs-2 col-sm-2 col-md-1">'+
                                                            '<div class="day">'+
                                                                '<h6 class="text-uppercase mb-0 mt-5 text-muted">Day</h6>'+
                                                                '<span class="text-primary block number spacing-1">0'+newItem+'</span>'+
                                                            '</div>'+
                                                        '</div>'+
                                                        '<div class="col-xs-12 col-sm-3 col-md-3">'+
                                                            '<div class="form-group form-group-sm">'+
                                                                '<label>Time from</label>'+
                                                                '<input type="text" class="oh-timepicker form-control" name="trip_from_time[]"/>'+
                                                            '</div>'+
                                                        '</div>'+
                                                        '<div class="col-xs-12 col-sm-3 col-md-3">'+
                                                            '<div class="form-group form-group-sm">'+
                                                                '<label>Time to</label>'+
                                                                '<input type="text" class="oh-timepicker form-control" name="trip_to_time[]" />'+
                                                            '</div>'+
                                                        '</div>'+
                                                        '<div class="col-xs-12 col-sm-5 col-md-5">'+
                                                            '<div class="form-group form-group-sm">'+
                                                                '<label>Title:</label>'+
                                                                '<input type="text" class="form-control" name="trip_from_title[]"/>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                    '<div class="row gap-20">'+
                                                        '<div class="col-xs-12 col-sm-12">'+
                                                            '<div class="form-group">'+
                                                                '<label>Short Description:</label>'+
                                                                '<input type="text" class="form-control" name="trip_short_dec[]"/>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                    '<div class="row gap-20">'+
                                                        '<div class="col-xs-12 col-sm-12">'+
                                                            '<div class="form-group">'+
                                                                '<label>Brief Description:</label>'+
                                                                '<textarea class="bootstrap3-wysihtml5 form-control map_trip_dec_'+newItem+'" name="trip_brief_dec[]" placeholder="Excluded point out once by one..." style="height: 150px;"></textarea>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>'+
                                                '</div>');
                    $('.oh-timepicker').timepicker();
                    $('.map_trip_dec_'+newItem).wysihtml5();
    });
    
    
    //CHECK ATLEASET ONE AVAILABLE DAYS SELECTED
    $('.available_days').on('change',function(){
        if($('.available_days:checked').length <= 0){
            $(this).attr('checked','true');
        }
    });
    
    $('.tripAddSubmit').on('click',function(){
        $('.term_accept_err').hide();
        $('.field_req_err').hide();
        if($("#term_accept").prop('checked') ===false){
            $('.term_accept_err').show();
            return false;
        }else if(!$('#make_new_trip_form').valid()){
            $('.field_req_err').show();
        }else{
            $('#button_type').val($(this).attr('data-id'));
        }
    });
    
    
    //EDIT PAGE
    if($('#action').val() == 'edit'){
        var selVal = $("#trip_duration option:selected").val();
        if( selVal== '1'){
            $('#how_many_daysdiv').removeClass('hide');
        }else if(selVal == '2'){
            $('#how_many_hoursdiv').removeClass('hide');
        }
    }
    
    $('#city_id').on('change',function(){
        $('#other_city').hide();
        if(this.value == 'other'){
            $('#other_city').show();
        }
    });
    
	
});


