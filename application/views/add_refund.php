<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title text-center">Refund</h4>
</div>
<?php echo form_open_multipart(base_url() . 'pnr_status/add', array('class' => 'form-horizontal margin-top-30', 'id' => 'add-refund')); ?>

<div class="modal-body">

    <div class="row gap-20">

        <div class="col-sm-12 col-md-12">
           
            <div class="form-group ">
                <h4>Trip Name:</h4>
                <a href="<?= base_url('trip-view/'.$details['trip_code']) ?>" target="_blank"><?= $details['trip_name']?></a>
            </div>
             <div class="form-group">
                <h4>Cancellation Policy:</h4>
                <p class="font-lg"><?php echo isset($details['cancellation_policy'])?html_entity_decode($details['cancellation_policy']):'';?></p>
            </div>
            <div class="form-group">
                <h4>Refund Policy:</h4>
                <p class="font-lg"><?php echo isset($details['refund_policy'])?html_entity_decode($details['refund_policy']):'';?></p>
            </div>
            <div class="form-group">
                <h4>Customer Bank Info</h4>
                Bank Name:<span class="text-primary"> <?=$details['bank_name']?></span><br>
                Account Holder Name:<span class="text-primary"> <?=$details['account_holder_name']?></span><br>
                Account Number:<span class="text-primary"> <?=$details['account_number']?></span><br>
                IFSC Code:<span class="text-primary"> <?=$details['ifsc_code']?></span><br>
                Branch:<span class="text-primary"> <?=$details['branch']?></span><br>
                Address:<span class="text-primary"> <?=$details['address']?></span>
            </div>
            <div class="form-group ">
                Trip Amount:<span class="text-primary"> <?=$details['net_price']?></span>
            </div>
            <div class="form-group ">
                <label>Refund Percentage:<span style='color: #d9534f;'>*</span></label>
                <input name="ref_per" id="ref_per" type="text" class="form-control" placeholder="Enter the refund percentage"/>
            </div>
            <div class="form-group ">
                <label>Notes:</label>
                <textarea class="form-control" id="notes" name="notes" placeholder="Enter the refund notes"></textarea>
            </div>      
        </div>

    </div>

</div>
<div class="modal-footer text-center">
    <input type="hidden" name="pnr_no" id="re_pnr_no" value="<?php echo isset($details['pnr_no'])?$details['pnr_no']:'';?>">
    <button type="submit" class="submit_btn btn btn-primary" id="addEditAccountInfo">Submit</button>
    <button type="button" data-dismiss="modal" class="btn btn-primary btn-border">Close</button>
</div>
<?php echo form_close(); ?>