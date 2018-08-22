//var base_path=$('body').data('path');
var base_path = $('.base_url').attr('ID');
//alert(base_url);
jQuery(function ($) {

    "use strict";

    $.fn.modalmanager.defaults.resize = true;
    $.fn.modalmanager.defaults.spinner = '<div class="loading-spinner fade" style="width: 200px; margin-left: -100px;"><span style="font-weight:300; color: #eee; font-size: 18px; font-family:Open Sans;">&nbsp;Loading...</div>';

    var $modal = $('#common-ajax-modal');
//Function-1 : Edit popup for user type
    $('.faq_edit').click(function ()
    {
        var id = $(this).attr('data-id');
       var data = {
            csrf_test_name: $.cookie('csrf_cookie_name'),
            id: id
        };
        $.ajax({
                url: base_path + 'faq/edit/' + id,
                type: 'POST',
                data: data,
                success: function (result) {
                    $modal.html(result);
                    $modal.modal('show');
                    $('.bootstrap3-wysihtml5').wysihtml5({});
                }
            });
    });

//Function-1 : add popup for user type
    $('#faq_add').click(function ()
    {
        var data = {
            csrf_test_name: $.cookie('csrf_cookie_name')
        };
        $.ajax({
                url: base_path + 'faq/add',
                type: 'POST',
                data: data,
                success: function (result) {
                    $modal.html(result);
                    $modal.modal('show');
                    $('.bootstrap3-wysihtml5').wysihtml5({});
                }
            });
    });


});
 