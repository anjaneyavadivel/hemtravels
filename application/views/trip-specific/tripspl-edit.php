<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title text-center">Edit Trip Specific</h4>
</div>
<?php echo form_open_multipart(base_url() . 'trip-specific/add', array('class' => 'form-horizontal margin-top-30', 'id' => 'add-tripspecific-form')); ?>

<div class="modal-body">
    <?php if(isset($details)) { ?>
    <div class="row gap-20">

        <div class="col-sm-12 col-md-12">
            <div class="form-group ">
                <label>Trip<span style=' color: #d9534f;'>*</span></label>
                <select class="form-control" name="trip_id" id="trip_id">
                    <option value="">Select a trip</option>
                    <?php 
                    if(isset($trip_list) && count($trip_list) > 0){
                        foreach($trip_list as $v){
                            $selected = "";
                            if(isset($details['trip_id']) && $details['trip_id'] == $v['id']){
                                $selected = "selected";
                            }
                            
                            echo '<option value="'.$v['id'].'" '.$selected.'>'.$v['trip_name'].'</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group ">
                <label>Trip Type:<span style='color: #d9534f;'>*</span></label>
                <select class="form-control"  id="trip_type" disabled="">
                    <option value="">Select a offer to...</option>
                    <option value="1" <?php echo isset($details['type']) && $details['type'] == 1?'selected':''?>>Set Offer Specific Day</option>
                    <option value="2" <?php echo isset($details['type']) && $details['type'] == 2?'selected':''?>>Set Trip Close </option>
                </select>
                <input name="trip_type"  type="hidden" class="form-control" placeholder="Enter the title" value="<?php echo isset($details['type'])? $details['type']:0?>"/>
            </div>
            <div class="form-group ">
                <label>Title:<span style='color: #d9534f;'>*</span></label>
                <input name="title" id="title" type="text" class="form-control" placeholder="Enter the title" value="<?php echo isset($details['title'])? $details['title']:''?>"/>
            </div>
            <div class="col-sm-12 col-md-12">
                <div class="form-group" id="rangeDatePicker">
                    <div class="col-xss-12 col-xs-6 col-sm-6">
                        <div class="form-group">
                            <label>From<span style=' color: #d9534f;'>*</span></label>
                            <input type="text" name="fromdate" id="rangeDatePickerTo" class="form-control" placeholder="M D, YYYY" value="<?php echo isset($details['from_date'])? $details['from_date']:'' ?>"/>
                        </div>
                    </div>

                    <div class="col-xss-12 col-xs-6 col-sm-6">
                        <div class="form-group">
                            <label>To<span style=' color: #d9534f;'>*</span></label>
                            <input type="text" name="todate" id="rangeDatePickerFrom" class="form-control" placeholder="M D, YYYY" value="<?php echo isset($details['to_date'])?$details['to_date']:'' ?>"/>
                        </div>
                    </div> 
                </div>
            </div>
            <?php if(isset($details['type']) && $details['type'] == 1) { ?>
                <div class="offer_specific_day" >
                    <div class="form-group ">
                        <label>No of traveller<span style=' color: #d9534f;'>*</span></label>
                        <input name="no_of_traveller" id="no_of_traveller" type="text" class="form-control" placeholder="Enter the traveller..." value="<?php echo isset($details['no_of_traveller']) ? $details['no_of_traveller']:'' ?>"/>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label>Min Book Traveller<span style=' color: #d9534f;'>*</span></label>
                                <input name="no_of_min_booktraveller" id="no_of_min_booktraveller" type="text" class="form-control" placeholder="Enter the max booktraveller..." value="<?php echo isset($details['no_of_min_booktraveller'])? $details['no_of_min_booktraveller']:'' ?>"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label>Max booktraveller<span style=' color: #d9534f;'>*</span></label>
                                <input name="no_of_max_booktraveller" id="no_of_max_booktraveller" type="text" class="form-control" placeholder="Enter the min booktraveller..." value="<?php echo isset($details['no_of_max_booktraveller'])?$details['no_of_max_booktraveller']:'' ?>"/>
                            </div>
                        </div>
                    </div>     
                    <div class="form-group ">
                        <label>Offer Type<span style=' color: #d9534f;'>*</span></label>
                        <select class="form-control" name="offer_type"  id="offer_type">
                            <option value="">Select a offer to...</option>
                            <option value="1" <?php echo isset($details['offer_type']) && $details['offer_type'] == 1?"selected":"" ?>>fixed</option>
                            <option value="2" <?php echo isset($details['offer_type']) && $details['offer_type'] == 2?"selected":"" ?>>Percentage</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label>Price To Adult<span style=' color: #d9534f;'>*</span>&nbsp;&nbsp;<small class="totAdult"></small></label>
                                <input name="price_to_adult" id="price_to_adult" type="text" class="form-control" placeholder="Enter the adult price" value="<?php echo isset($details['price_to_adult'])?$details['price_to_adult']:''?>"/>
                                <input  id="db_price_to_adult" type="hidden" class="form-control" placeholder="Enter the adult price" value="<?php echo isset($details['price_to_adult'])?$details['price_to_adult']:''?>"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label>Price To Children &nbsp;&nbsp;<small class="totChild"></small></label>
                                <input name="price_to_child" id="price_to_child" type="text" class="form-control" placeholder="Enter the children price" value="<?php echo isset($details['price_to_child'])?$details['price_to_child']:''?>"/>
                                <input  id="db_price_to_child" type="hidden" class="form-control" placeholder="Enter the children price" value="<?php echo isset($details['price_to_child'])?$details['price_to_child']:''?>"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label>Price To Infan &nbsp;&nbsp;<small class="totInfan"></small></label>
                                <input name="price_to_infan" id="price_to_infan" type="text" class="form-control" placeholder="Enter the infan price" value="<?php echo isset($details['price_to_infan'])?$details['price_to_infan']:''?>"/>
                                <input id="db_price_to_infan" type="hidden" class="form-control" placeholder="Enter the infan price" value="<?php echo isset($details['price_to_infan'])?$details['price_to_infan']:''?>"/>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>
    <?php } ?>
</div>
<div class="modal-footer text-center">
    <span class="message33"></span>
    <?php if(isset($details)) { ?>
    <button type="submit" class="submit_btn btn btn-primary" id="updateTripSpecific">Update</button>
    <?php } ?>
    <button type="button" data-dismiss="modal" class="btn btn-primary btn-border">Close</button>
</div>
 <input name="action"  type="hidden" class="form-control"  value="edit"/>
 <input name="trip_spec_id"  type="hidden" class="form-control"  value="<?php echo isset($details['id'])?$details['id']:0?>"/>
<?php echo form_close(); ?>