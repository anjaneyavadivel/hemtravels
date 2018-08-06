var base_url = $('.base_url').attr('ID');
//alert(base_url);
jQuery(function ($) {

    "use strict";
    
    $.fn.modalmanager.defaults.resize = true;
    $.fn.modalmanager.defaults.spinner = '<div class="loading-spinner fade" style="width: 200px; margin-left: -100px;"><span style="font-weight:300; color: #eee; font-size: 18px; font-family:Open Sans;">&nbsp;Loading...</div>';

    var $modal = $('#common-ajax-modal');
    
    $('body').on('click', '.btn-add-coupon-code', function () {
        $('body').modalmanager('loading');
        //userid = $(this).attr('id');
        setTimeout(function () {
            $modal.load(base_url + 'couponcodeaddmaster', '', function () {
                $modal.modal();
               
                $('#rangeDatePicker > div > div').dateRangePicker({
		separator : ' to ',
		autoClose: true,
		format: 'MMM D, YYYY',
		stickyMonths: true,
		startDate: new Date(),
		showTopbar: false,
		getValue: function()
		{
			if ($('#rangeDatePickerTo').val() && $('#rangeDatePickerFrom').val() )
				return $('#rangeDatePickerTo').val() + ' to ' + $('#rangeDatePickerFrom').val();
			else
				return '';
		},
		setValue: function(s,s1,s2)
		{
			$('#rangeDatePickerTo').val(s1);
			$('#rangeDatePickerFrom').val(s2);
		},
		customArrowPrevSymbol: '<i class="fa fa-arrow-circle-left"></i>',
		customArrowNextSymbol: '<i class="fa fa-arrow-circle-right"></i>'
		
	});

                MasterValidation.init();
            });
        }, 1000);
    });
            
    var id = 0;
    $('body').on('click', '.btn-edit-coupon-code', function () {
        $('body').modalmanager('loading');
        id = $(this).attr('data-val');
        var data = {
            csrf_test_name: $.cookie('csrf_cookie_name'),
            id: id
        };
        setTimeout(function () {
            $.ajax({
                url: base_url + 'coupon-code-master/edit',
                type: 'POST',
                data: data,
                success: function (result) {
                    $modal.html(result);
                    $modal.modal('show');
                    MasterValidation.init();
                    //$modal.modal();
                }
            });
        }, 1000);
    });
    
    $('body').on('change', '#coupontype', function () {
            $( ".adminalter" ).addClass( "hide" );
            var coupontype = $(this).val();
            if(coupontype==3){
                $( ".adminalter" ).removeClass( "hide" );
            }

    });

});

