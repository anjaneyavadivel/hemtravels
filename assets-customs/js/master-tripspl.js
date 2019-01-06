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
    
    //ADD
    $('body').on('click', '.btn-add-trip-specific', function () {
        $('body').modalmanager('loading');        
        setTimeout(function () {
            $modal.load(base_url + 'trip-specific/loadmodal/new', '', function () {
                $modal.modal();
                
                calendarInit();
                
                addValidation();
            });
        }, 1000);
    });
    
    //EDIT
    $('body').on('click', '.btn-edit-trip-specific', function () {
        $('body').modalmanager('loading'); 
        var id = $(this).attr('data-val');
        setTimeout(function () {            
            $modal.load(base_url + 'trip-specific/loadmodal/'+id, '', function () {
                
                $modal.modal();
                
                calendarInit();
                
                addValidation();
                
                $('#trip_id').change();
                setTimeout(function(){
                    $('#price_to_adult').keyup();
                    $('#price_to_child').keyup();
                    $('#price_to_infan').keyup();
                },1000);
            });
        }, 1000);
    });
    
    $('body').on('change','#trip_type',function(){
       $('.offer_specific_day').hide();
       
       if($(this).val() == 1){
            $('.offer_specific_day').show();           
       }
    });
    
    $('body').on('change','#offer_type',function(){
        if($('#trip_id').valid()){
            //$('#price_to_adult').val(''); 
            //$('#price_to_child').val(''); 
            //$('#price_to_infan').val(''); 
            
             $('#price_to_adult').val($('#db_price_to_adult').val()); 
             $('#price_to_child').val($('#db_price_to_child').val()); 
             $('#price_to_infan').val($('#db_price_to_infan').val());  

             $('#price_to_adult').attr('placeholder','Enter the adult % eg:10');
             $('#price_to_child').attr('placeholder','Enter the children % eg:10');
             $('#price_to_infan').attr('placeholder','Enter the infan % eg:10');

            if($(this).val() == 1){
                 

                 $('#price_to_adult').attr('placeholder','Enter the adult price eg:1000');
                 $('#price_to_child').attr('placeholder','Enter the children price eg:800');
                 $('#price_to_infan').attr('placeholder','Enter the infan price eg:500');
            }
        }
    });
    
    $('body').on('keyup','#price_to_adult',function(){
        if($('#offer_type').val() == 2){
            var per = $(this).val();
            var res = ($('#db_price_to_adult').val() * per) / 100;
            res = (Math.round((res * 1000)/10)/100).toFixed(2);
            res = $('#db_price_to_adult').val() - res;
            res = res > 0 ? res:0;
            $('.totAdult').text(res);
        }
    });
    $('body').on('keyup','#price_to_child',function(){
        if($('#offer_type').val() == 2){
            var per = $(this).val();
            var res = ($('#db_price_to_child').val() * per) / 100;
            res = (Math.round((res * 1000)/10)/100).toFixed(2);
            res = $('#db_price_to_child').val() - res;
            res = res > 0 ? res:0;
            $('.totChild').text(res);
        }
    });
    $('body').on('keyup','#price_to_infan',function(){
        if($('#offer_type').val() == 2){
            var per = $(this).val();
            var res = ($('#db_price_to_infan').val() * per) / 100;
            res = (Math.round((res * 1000)/10)/100).toFixed(2);
            res = $('#db_price_to_infan').val() - res;
            res = res > 0 ? res:0;
            $('.totInfan').text(res);
        }
    });
    
    $('body').on('change','#trip_id',function(){
        
        if(this.value){
         var formData = new FormData();
            formData.append('trip_id', this.value);
            formData.append('csrf_test_name', $.cookie('csrf_cookie_name'));
            
            var url = base_url + 'tripspecific/getTripDetails';
            $.ajax({
                url: url,
                type: 'post',
                data: formData,
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false, 
                success: function (data) {
                    data = $.parseJSON(data);
                    data = data.data;
                    if(data.id){
                        $('#no_of_traveller').val(data.no_of_traveller);
                        $('#no_of_min_booktraveller').val(data.no_of_min_booktraveller);
                        $('#no_of_max_booktraveller').val(data.no_of_max_booktraveller);
                        $('#db_price_to_adult').val(data.price_to_adult);
                        $('#db_price_to_children').val(data.price_to_children);
                        $('#db_price_to_infan').val(data.price_to_infan);
                    }
                    
                }
            });
        }
    });
    
    
    function addValidation(){

        var form2 = $('#add-tripspecific-form');
           form2.validate({               
               
               rules: {            
                   trip_id: {
                       required: true,
                   },
                   trip_type: {
                       required: true,
                   },
                   title: {
                       required: true,
                       maxlength:250
                   },
                   fromdate: {
                       required: true,
                   },
                   todate: {
                       required: true,
                   },
                   no_of_traveller: {
                       required: true,
                   },
                   no_of_min_booktraveller: {
                       required: true,
                   },
                   no_of_max_booktraveller: {
                       required: true,
                   },
                   offer_type: {
                       required: true,
                   },
                   price_to_adult: {
                       required: true,
                       number:true
                   },
                   price_to_children: {
                       number:true
                   },
                   price_to_infan: {
                       number:true
                   }
               },              
               highlight: function (element) {
                   var id_attr = "#" + $(element).attr("id") + "_icon";
                   $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
                   $(id_attr).removeClass('fa-check').addClass('fa-times');
               },
               unhighlight: function (element) {
                   var id_attr = "#" + $(element).attr("id") + "_icon";
                   $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
                   $(id_attr).removeClass('fa-times').addClass('fa-check');
               },
               errorElement: 'span',
               errorClass: 'small help-block',
               errorPlacement: function (error, element) {
                   if (element.length) {
                error.insertAfter( element.parent("div"));
            } else {
                error.insertafter(element.parent());
            }
               },
               submitHandler: function (form)
               {
                   if ($(form).valid())
                   {
                       var values = form2.serializeArray();
                       values.push({name: "csrf_test_name", value: $.cookie('csrf_cookie_name')});
                       var url = base_url + 'tripspecific/tripSpecificAction';
                       $.ajax({
                           url: url,
                           type: 'post',
                           data: values,
                           success: function (res) {
                               if (res != '') {
                                   $('.message33').html(res);
                               } else {
                                   window.location.replace(base_url + "trip-specific");
                               }

                           }
                       });
                   }
                   return false;
               }
           });
    }
   
   function calendarInit(){
        $('#rangeDatePicker > div > div').dateRangePicker({
            separator: ' to ',
            autoClose: true,
            format: 'MMM D, YYYY',
            stickyMonths: true,
            startDate: new Date(),
            showTopbar: false,
            getValue: function ()
            {
                if ($('#rangeDatePickerTo').val() && $('#rangeDatePickerFrom').val())
                    return $('#rangeDatePickerTo').val() + ' to ' + $('#rangeDatePickerFrom').val();
                else
                    return '';
            },
            setValue: function (s, s1, s2)
            {
                $('#rangeDatePickerTo').val(s1);
                $('#rangeDatePickerFrom').val(s2);
            },
            customArrowPrevSymbol: '<i class="fa fa-arrow-circle-left"></i>',
            customArrowNextSymbol: '<i class="fa fa-arrow-circle-right"></i>'

        });
   }


});

