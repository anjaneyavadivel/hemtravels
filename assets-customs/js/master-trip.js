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
				url: "upload",
				addRemoveLinks: true
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

	
});

