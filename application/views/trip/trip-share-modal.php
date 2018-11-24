<style>
    .modal_social_share li{
        padding: 5px;
    }
</style>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title text-center">Share Link</h4>
</div>

<div class="modal-body">

    <div class="row gap-20">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#vendor" role="tab">Vendor Share</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " data-toggle="tab" href="#link" role="tab">Link Share</a>
            </li>        
        </ul>

        <!-- Tab panes {Fade}  -->
        <div class="tab-content">
            <div class="tab-pane fade in active" id="vendor" name="attributes" role="tabpanel">
                <div class="vendorShareDiv">
                    <div class="form-group" style="padding-top:20px">
                        <label>Shared Emails:</label>
                        <input type="text" class="form-control" name="shared_emails" id="shared_emails" placeholder="Enter the emails separate by comma(,)">
                    </div>

                    <div class="form-group">
                        <label>Coupon:</label>
                        <select name="coupon_history_id" id="coupon_history_id" class="selectpicker show-tick form-control" title="Select Coupon">
                            <option value="0">Select coupon</option>
                            <?php 
                               if(isset($coupon_list) && count($coupon_list) > 0){                               
                                   foreach($coupon_list as $v){
                                       echo '<option value="'.$v['id'].'">'.$v['coupon_code']." - ".$v['coupon_name'].'</option>';
                                   }
                               }
                            ?>                        
                        </select>
                    </div>
                    <input type="hidden" id="share_trip_id" value="<?php echo isset($trip_id)?$trip_id:0?>">
                    <div class="text-center shareEmailsErr" style="display:none;margin-bottom:10px;">Please enter the email(s).</div>
                   
                    <div class="text-center">
                        <a class="btn btn-primary text-center vendorShare" href="javascript:;">Share</a>
                    </div> 
                </div>
                <div class="text-center AcMsg" style="display:none;"><span class="AcMsgDis"></span></div>
            </div>
            <div class="tab-pane fade in " id="link" name="attributes" role="tabpanel">
                <textarea class="form-control show_share_url" style="margin-top:20px;"><?php echo base_url('trip-view/'.$tripCode)?></textarea>
                <textarea class="form-control show_share_html" rows="3" style="margin-top:20px;display:none;"><button onclick="window.open('<?php echo base_url('trip-view/'.$tripCode)?>','_blank')" type="button" style="background: #FE8800; border-color: #FE8800; color: #FFF !important;"> View & Book</button></textarea>
                <a class="btn btn-primary text-center shareShow"  data-id="html" href="javascript:;">Get Html Code</a>
                <hr style="margin-top:25px;">
                <ul class="modal_social_share">
                    <li>Facebook : <a  target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url('trip-view/'.$tripCode)?>">Share on Facebook</a></li>
                    <li>Twitter : <a target="_blank" href="https://twitter.com/home?status=<?php echo base_url('trip-view/'.$tripCode)?>">Share on Twitter</a></li>
                    <li>Google Plus:<a target="_blank" href="https://plus.google.com/share?url=<?php echo base_url('trip-view/'.$tripCode)?>">Share on Google+</a></li>
                    <li>LinkedIn:<a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=&title=&summary=&source=<?php echo base_url('trip-view/'.$tripCode)?>">Share on LinkedIn</a></li>
                    <li>Email:<a target="_blank" href="mailto:<?php echo base_url('trip-view/'.$tripCode)?>">Send Email</a></li>
                    <li>Whatsapp:<a target="_blank" href="https://web.whatsapp.com/send?text=<?php echo base_url('trip-view/'.$tripCode)?>">Share on Whatsapp</a></li>
                </ul>
                
            </div>
        </div>   

    </div>

</div>
<div class="modal-footer text-center">
    <input type="hidden" id="share_url" value="<?php echo base_url('trip-view/'.$tripCode)?>">
    
    <button type="button" data-dismiss="modal" class="btn btn-primary btn-border">Close</button>
</div>
<script>
$(function(){
   $('.shareShow').on('click',function(){
      var data = $(this).attr('data-id');
        $('.show_share_url').show();
        $('.show_share_html').hide();
        $(this).attr('data-id','html');
        $(this).text('Get Html Code');
      
      if(data == 'html'){
          $('.show_share_url').hide();
          $('.show_share_html').show();
          $(this).attr('data-id','url');
          $(this).text('Show Url');
      }
   }); 
});
</script>