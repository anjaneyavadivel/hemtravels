var base_url = $('.base_url').attr('ID');
//alert(base_url);
jQuery(function ($) {

    "use strict";
    
    $.fn.modalmanager.defaults.resize = true;
    $.fn.modalmanager.defaults.spinner = '<div class="loading-spinner fade" style="width: 200px; margin-left: -100px;"><span style="font-weight:300; color: #eee; font-size: 18px; font-family:Open Sans;">&nbsp;Loading...</div>';

    var $modal = $('#common-ajax-modal');
    
    $('body').on('click', '.btn-add-trip', function () {
        $('body').modalmanager('loading');
        //userid = $(this).attr('id');
        setTimeout(function () {
            $modal.load(base_url + 'trip-specific/loadmodal/tripspl-add', '', function () {
                $modal.modal();
                MasterValidation.init();
            });
        }, 1000);
    });
            
    var id = 0;
    $('body').on('click', '.btn-edit-state', function () {
        $('body').modalmanager('loading');
        id = $(this).attr('data-val');
        var data = {
            csrf_test_name: $.cookie('csrf_cookie_name'),
            id: id
        };
        setTimeout(function () {
            $.ajax({
                url: base_url + 'state-master/edit',
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
    

   


});

