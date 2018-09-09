<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title text-center">Add State</h4>
</div>
<?php echo form_open_multipart(base_url() . 'trip-specific/add', array('class' => 'form-horizontal margin-top-30', 'id' => 'add-state-form')); ?>

<div class="modal-body">

    <div class="row gap-20">

        <div class="col-sm-12 col-md-12">
            <div class="form-group form-group-lg">
                <label>trip title:</label>
                <input name="title" type="text" class="form-control" placeholder="Enter the name..."/>
            </div>
			<div class="form-group form-group-lg">
                <label>trip type:<span style=' color: #d9534f;'>*</span></label>
                <select class="form-control" name="type"  >
				<option value="">Select a offer to...</option>
                    <option value="1">Set Offer Specific Day</option>
                    <option value="2">Set Trip Close </option>
                </select>
            </div>
			<div class="col-sm-12 col-md-12">
                        <div class="form-group" id="rangeDatePicker">
                            <div class="col-xss-12 col-xs-6 col-sm-6">
                                <div class="form-group">
                                    <label>From<span class="validation">*</span></label>
                                    <input type="text" name="fromdate" id="rangeDatePickerTo" class="form-control" placeholder="M D, YYYY" />
                                </div>
                            </div>

                            <div class="col-xss-12 col-xs-6 col-sm-6">
                                <div class="form-group">
                                    <label>To<span class="validation">*</span></label>
                                    <input type="text" name="todate" id="rangeDatePickerFrom" class="form-control" placeholder="M D, YYYY" />
                                </div>
                            </div> 
                        </div>

                    </div>
					<div class="form-group form-group-lg">
                <label>no of traveller:</label>
                <input name="no_of_traveller" type="text" class="form-control" placeholder="Enter the traveller..."/>
            </div>
			<div class="form-group form-group-lg">
                <label>min booktraveller:</label>
                <input name="no_of_min_booktraveller" type="text" class="form-control" placeholder="Enter the max booktraveller..."/>
            </div>
			<div class="form-group form-group-lg">
                <label>max booktraveller:</label>
                <input name="no_of_max_booktraveller" type="text" class="form-control" placeholder="Enter the min booktraveller..."/>
            </div>
			<div class="form-group form-group-lg">
                <label>offer type:<span style=' color: #d9534f;'>*</span></label>
                <select class="form-control" name="offer_type"  >
				<option value="">Select a offer to...</option>
                    <option value="1">fixed</option>
                    <option value="2">Percentage</option>
                </select>
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