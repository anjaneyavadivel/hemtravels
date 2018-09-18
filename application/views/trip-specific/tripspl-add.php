<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title text-center">Add Trip Specific</h4>
</div>
<?php echo form_open_multipart(base_url() . 'trip-specific/add', array('class' => 'form-horizontal margin-top-30', 'id' => 'add-tripspecific-form')); ?>

<div class="modal-body">

    <div class="row gap-20">

        <div class="col-sm-12 col-md-12">
            <div class="form-group ">
                <label>Trip<span style=' color: #d9534f;'>*</span></label>
                <select class="form-control" name="trip_id" id="trip_id">
                    <option value="">Select a trip</option>
                    <?php 
                    if(isset($trip_list) && count($trip_list) > 0){
                        foreach($trip_list as $v){
                            echo '<option value="'.$v['id'].'">'.$v['trip_name'].'</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group ">
                <label>Trip Type:<span style='color: #d9534f;'>*</span></label>
                <select class="form-control" name="trip_type" id="trip_type" >
                    <option value="">Select a offer to...</option>
                    <option value="1">Set Offer Specific Day</option>
                    <option value="2">Set Trip Close </option>
                </select>
            </div>
            <div class="form-group ">
                <label>Title:<span style='color: #d9534f;'>*</span></label>
                <input name="title" id="title" type="text" class="form-control" placeholder="Enter the title"/>
            </div>
            <div class="col-sm-12 col-md-12">
                <div class="form-group" id="rangeDatePicker">
                    <div class="col-xss-12 col-xs-6 col-sm-6">
                        <div class="form-group">
                            <label>From<span style=' color: #d9534f;'>*</span></label>
                            <input type="text" name="fromdate" id="rangeDatePickerTo" class="form-control" placeholder="M D, YYYY" />
                        </div>
                    </div>

                    <div class="col-xss-12 col-xs-6 col-sm-6">
                        <div class="form-group">
                            <label>To<span style=' color: #d9534f;'>*</span></label>
                            <input type="text" name="todate" id="rangeDatePickerFrom" class="form-control" placeholder="M D, YYYY" />
                        </div>
                    </div> 
                </div>
            </div>
            <div class="offer_specific_day" style="display:none;">
                <div class="form-group ">
                    <label>No of traveller<span style=' color: #d9534f;'>*</span></label>
                    <input name="no_of_traveller" id="no_of_traveller" type="text" class="form-control" placeholder="Enter the traveller..."/>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label>Min Book Traveller<span style=' color: #d9534f;'>*</span></label>
                            <input name="no_of_min_booktraveller" id="no_of_min_booktraveller" type="text" class="form-control" placeholder="Enter the max booktraveller..."/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label>Max booktraveller<span style=' color: #d9534f;'>*</span></label>
                            <input name="no_of_max_booktraveller" id="no_of_max_booktraveller" type="text" class="form-control" placeholder="Enter the min booktraveller..."/>
                        </div>
                    </div>
                </div>     
                <div class="form-group ">
                    <label>Offer Type<span style=' color: #d9534f;'>*</span><span style='color: #d9534f;'>*</span></label>
                    <select class="form-control" name="offer_type"  id="offer_type">
                        <option value="">Select a offer to...</option>
                        <option value="1">fixed</option>
                        <option value="2">Percentage</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group ">
                            <label>Price To Adult<span style=' color: #d9534f;'>*</span></label>
                            <input name="price_to_adult" id="price_to_adult" type="text" class="form-control" placeholder="Enter the adult price"/>
                            <input  id="db_price_to_adult" type="hidden" class="form-control" placeholder="Enter the adult price"/>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group ">
                            <label>Price To Children<span style=' color: #d9534f;'>*</span></label>
                            <input name="price_to_children" id="price_to_children" type="text" class="form-control" placeholder="Enter the children price"/>
                            <input  id="db_price_to_children" type="hidden" class="form-control" placeholder="Enter the children price"/>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group ">
                            <label>Price To Infan<span style=' color: #d9534f;'>*</span></label>
                            <input name="price_to_infan" id="price_to_infan" type="text" class="form-control" placeholder="Enter the infan price"/>
                            <input id="db_price_to_infan" type="hidden" class="form-control" placeholder="Enter the infan price"/>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

    </div>

</div>
<div class="modal-footer text-center">
    <span class="message33"></span>
    <button type="submit" class="submit_btn btn btn-primary" id="addTripSpecific">Add</button>
    <button type="button" data-dismiss="modal" class="btn btn-primary btn-border">Close</button>
</div>
<input name="action"  type="hidden" class="form-control"  value="new"/>
<?php echo form_close(); ?>