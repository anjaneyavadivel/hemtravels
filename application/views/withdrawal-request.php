<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title text-center">Request to Withdrawal</h4>
</div>
<?php echo form_open_multipart(base_url() . 'withdraw-request-save', array('class' => 'form-horizontal margin-top-30', 'id' => 'add-withdraw-request')); ?>

<div class="modal-body"><?php $balanceamt = checkbal_mypayment($loginuserid, 2);?>
    <input name="min_withdrawal" id="min_withdrawal" type="hidden" value="<?php echo MIN_WITHDRAWAL?>">
    <input name="max_withdrawal" id="max_withdrawal" type="hidden" value="<?php echo $balanceamt?>">
    <div class="row gap-20">

        <div class="col-sm-12 col-md-12">
            <div class="form-group ">
                <label>UnClear Amount(INR):</label>
                <span class="text-primary"><?=checkbal_mypayment($loginuserid, 1)?></span>
            </div>
            <div class="form-group ">
                <label>Your Balance(INR):</label>
                <span class="text-primary"><?php echo $balanceamt;?></span>
            </div>
           
            <div class="form-group ">
                <label>Withdrawal Amount:<span style='color: #d9534f;'>*</span></label>
                <input name="withdrawalamount" id="withdrawalamount" type="text" class="form-control" placeholder="Enter the withdrawal amount min <?php echo MIN_WITHDRAWAL?> to max <?=$balanceamt?>"/>
            </div>
        </div>

    </div>
    <div class="row gap-20">

        <div class="col-sm-12 col-md-12">
            <div class="form-group ">
                <label>Account<span style=' color: #d9534f;'>*</span></label>
                <select class="form-control" name="account" id="account">
                    <option value="">Select an account</option>
                    <?php 
                    if(isset($account_info_list) && count($account_info_list) > 0){
                        foreach($account_info_list as $v){
                            echo '<option value="'.$v['id'].'">'.$v['account_holder_name'].'-'.$v['account_number'].'</option>';
                        }
                    }
                    ?>
                    <option value="new">Add Account</option>
                </select>
            </div>
           
            <div class="form-group ">
                <label>Bank Name:<span style='color: #d9534f;'>*</span></label>
                <input name="bank_name" id="bank_name" type="text" class="form-control" placeholder="Enter the bank name"/>
            </div>
            <div class="form-group ">
                <label>Account Holder Name:<span style='color: #d9534f;'>*</span></label>
                <input name="account_holder_name" id="account_holder_name" type="text" class="form-control" placeholder="Enter the account holder name"/>
            </div>
            <div class="form-group ">
                <label>Account Number:<span style='color: #d9534f;'>*</span></label>
                <input name="account_number" id="account_number" type="text" class="form-control" placeholder="Enter the account number"/>
            </div>
            <div class="form-group ">
                <label>IFSC Code:<span style='color: #d9534f;'>*</span></label>
                <input name="ifsc_code" id="ifsc_code" type="text" class="form-control" placeholder="Enter the ifsc code"/>
            </div>
            <div class="form-group ">
                <label>Branch:<span style='color: #d9534f;'>*</span></label>
                <input name="branch" id="branch" type="text" class="form-control" placeholder="Enter the branch"/>
            </div>
            <div class="form-group ">
                <label>Address:<span style='color: #d9534f;'>*</span></label>
                <input name="address" id="address" type="text" class="form-control" placeholder="Enter the address"/>
            </div>            
            
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="is_primary" id="is_primary">
                <label class="custom-control-label" for="is_primary">Is your default account?</label>
            </div>
            <span style="color:red;display: none;" class="errorMsg">Your details not added/updated,please try again!...</span>
            <span style="color:blue;display: none;" class="sucMsg">Withdrawal Request has been successfully send</span>
        </div>

    </div>
</div>
<div class="modal-footer text-center"> 
    <button type="submit" class="submit_btn btn btn-primary" id="addWithdrawal">Withdrawal</button>
    <button type="button" data-dismiss="modal" class="btn btn-primary btn-border">Close</button>
</div>
<?php echo form_close(); ?>