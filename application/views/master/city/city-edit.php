<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title text-center">Update City</h4>
</div>
 <?php echo form_open_multipart(base_url() . 'city-master/save-edit', array('class' => 'form-horizontal margin-top-30', 'id' => 'edit-city-form')); ?>

<div class="modal-body">
   <div class="row gap-20">
        <div class="col-sm-12 col-md-12">		
            <div class="form-group form-group-lg">
                <label>State Name:<span style='color: #d9534f;'>*</span></label>
                <select class="form-control" name="csid"  >
                    <option value="" selected disabled>--Select--</option>
                    <?php
                    if ($state_list->num_rows() > 0) {
                    foreach ($state_list->result_array() as $row) {
                        ?><option value="<?php echo $row['id']; ?>" <?php if ($row['id'] == $citydetail['state_id']) echo 'selected'; ?> ><?php echo $row['name']; ?></option><?php
                    }}
                    ?>
                </select>
            </div>

        </div>

    </div>
    <div class="row gap-20">
        <input name="city_id" type="hidden" class="form-control"  value="<?=$citydetail['id']?>"/>
        
        <div class="col-sm-12 col-md-12">
            <div class="form-group form-group-lg">
                <label>City Name:<span style='color: #d9534f;'>*</span></label>
                <input name="city_name" type="text" class="form-control" value="<?=$citydetail['name']?>" placeholder="Enter the city name..."/>
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
