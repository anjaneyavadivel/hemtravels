var base_path=$('body').data('path');
//Function-1 : Edit popup for user type
$('.faq_edit').click(function()
{
	 var id=$(this).attr('data-id');
	 var url = base_path+'faq/edit/'+id;
	 $.post(url,function(rpres1){$('#faq_model').html(rpres1); $('#faq_model').modal('show');});
 });
 
//Function-1 : add popup for user type
$('#faq_add').click(function()
{
	 var urladd = base_path+'faq/add/';
	 $.post(urladd,function(rpres2){$('#faq_model').html(rpres2); $('#faq_model').modal('show');});
 }); 
 