<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title text-center">Pay to Withdrawal Request </h4>
</div>
<?php echo form_open_multipart(base_url() . 'withdraw-request-paid', array('class' => 'form-horizontal margin-top-30', 'id' => 'pay-withdraw-request')); ?>

<div class="modal-body"><?php $balanceamt = checkbal_mypayment($loginuserid, 2);?>
    <div class="row gap-20">

        <div class="col-sm-12 col-md-12">
            <div class="form-group ">
                <label>Your UnClear Amount(INR):</label>
                <span class="text-primary"><?=checkbal_mypayment($loginuserid, 1)?></span>
            </div>
            <div class="form-group ">
                <label>Your Balance(INR):</label>
                <span class="text-primary"><?php echo $balanceamt;?></span>
            </div>
        </div>

    </div>
    <div class="row gap-20">
        <?php if($transaction_view->num_rows()<1){?>
        <p>Sorry! try again...</p>
        <?php }else{
            $transaction = $transaction_view->row();
            ?>
        <input type="hidden" name="requestid" value="<?=$transaction->id?>">
        <div class="col-sm-12 col-md-12">
            <div class="form-group ">
            <h4>Customer Bank Info</h4>
                Bank Name:<span class="text-primary"> <?=$transaction->bank_name?></span><br>
                Account Holder Name:<span class="text-primary"> <?=$transaction->account_holder_name?></span><br>
                Account Number:<span class="text-primary"> <?=$transaction->account_number?></span><br>
                IFSC Code:<span class="text-primary"> <?=$transaction->ifsc_code?></span><br>
                Branch:<span class="text-primary"> <?=$transaction->branch?></span><br>
                Address:<span class="text-primary"> <?=$transaction->address?></span>
            </div>
            <div class="form-group ">
                Withdrawal Request Amount: <span class="text-primary"> <?=$transaction->withdrawal_request_amt?>
            </div>
            <div class="form-group ">
                Withdrawal Requester Balance(INR): <span class="text-primary"> <?php echo checkbal_mypayment($transaction->userid, 0);?>
            </div>
           
            <div class="form-group ">
                <label>Pay Amount<span style='color: #d9534f;'>*</span></label>
                <input name="payamount" id="payamount" type="text" class="form-control" placeholder="Enter the pay amount <?=$transaction->withdrawal_request_amt?>"/>
            </div>
           
            <div class="form-group ">
                <label>Pay Notes<span style='color: #d9534f;'>*</span></label>
                <textarea  name="paynotes" id="paynotes" class="form-control"></textarea>
             </div>
            <span style="color:red;display: none;" class="errorMsg">Your details not added/updated,please try again!...</span>
            <span style="color:blue;display: none;" class="sucMsg">Amount has been successfully paid</span>
        </div>
        <?php }?>
    </div>
</div>
<div class="modal-footer text-center"> 
    <?php if($transaction_view->num_rows()>0){?>
    <button type="submit" class="submit_btn btn btn-primary" id="addWithdrawal">Pay</button>
     <?php }?>
    <button type="button" data-dismiss="modal" class="btn btn-primary btn-border">Close</button>
</div>
<?php echo form_close(); ?>