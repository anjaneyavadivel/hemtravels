var base_url = $('.base_url').attr('ID');
jQuery(function($) {

    "use strict";
    
    $('#pick_loc_auto_suggestion').typeahead({
        source: function (query, result) {
            
            var formData = new FormData();
                formData.append('query', query);                
                formData.append('csrf_test_name', $.cookie('csrf_cookie_name'));
            $.ajax({
                url: base_url+"welcome/searchAutoSuggestion",
                data: formData,            
                dataType: "json",
                type: "POST",
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false, 
                success: function (data) {
                    result($.map(data, function (item) {
                        return item;
                    }));
                }
            });
        }, 
        afterSelect: function (item) {
            if(item){
                $('#b2c-auto-suggestion-form').submit();
            }
        }
    });
	
});

