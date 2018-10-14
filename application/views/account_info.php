<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title text-center">Add/Edit Account Info</h4>
</div>
<?php echo form_open_multipart(base_url() . 'pnr_status/add', array('class' => 'form-horizontal margin-top-30', 'id' => 'add-account-info')); ?>

<div class="modal-body">

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
        </div>

    </div>

</div>
<div class="modal-footer text-center"> 
    <input type="hidden" name="pnr_no" id="addAccPnr" value="<?php echo isset($pnr)?$pnr:''?>">
    <button type="submit" class="submit_btn btn btn-primary" id="addEditAccountInfo">Submit</button>
    <button type="button" data-dismiss="modal" class="btn btn-primary btn-border">Close</button>
</div>
<?php echo form_close(); ?>