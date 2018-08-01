<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title text-center">Update state</h4>
</div>
 <?php echo form_open_multipart(base_url() . 'state-master/save-edit', array('class' => 'form-horizontal margin-top-30', 'id' => 'edit-state-form')); ?>

<div class="modal-body">
   
    <div class="row gap-20">
        <input name="state_id" type="hidden" class="form-control"  value="<?=$statedetail['id']?>"/>

        <div class="col-sm-12 col-md-12">
            <div class="form-group form-group-lg">
                <label>state Name:</label>
                <input name="state_name" type="text" class="form-control" value="<?=$statedetail['name']?>" placeholder="Enter the state name..."/>
            </div>

        </div>

    </div>

</div>
<div class="modal-footer text-center">
    <span class="message33"></span>
    <button type="submit" class="submit_btn btn btn-primary">Update</button>
    <button type="button" data-dismiss="modal" class="btn btn-primary btn-border">Close</button>
</div>
<?php echo form_close(); ?>
