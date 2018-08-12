<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title text-center">Add City</h4>
</div>
<div class="modal-body">
<?php echo form_open_multipart(base_url() . 'city-master/add', array('class' => 'form-horizontal margin-top-30', 'id' => 'add-city-form')); ?>
    <div class="row gap-20">
	        <div class="col-sm-12 col-md-12">
                <label class="col-xs-3 control-label">State Name <span style=' color: #d9534f;'>*</span></label>
						<select class="form-control" name="csid"  >
							<option value="" selected disabled>--Select--</option>
							<?php foreach($stateselect as $row)
							{ 
								?><option value="<?php echo $row['state_id'];?>" <?php if ($row['state_id'] == $state_id) echo 'selected' ; ?> ><?php echo $row['state_name']; ?></option><?php 
							} 
							?>
						</select>			
            <div class="form-group form-group-lg">
                <label>City Name:</label>
                <input name="city_name" type="text" class="form-control" placeholder="Enter the city name..."/>
            </div>

        </div>

    </div>

</div>
<div class="modal-footer text-center">
    <span class="message33"></span>
    <button type="submit" class="submit_btn btn btn-primary">Add</button>
    <button type="button" data-dismiss="modal" class="btn btn-primary btn-border">Close</button>
</div>
<?php echo form_close(); ?>
