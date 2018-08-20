<?php $this->load->view('includes/header')?>

  <!-- start Main Wrapper -->

           <div class="main-wrapper scrollspy-container">

                <!-- start breadcrumb -->

                <div class="breadcrumb-image-bg pb-100 no-bg" style="background-image:url('<?php echo base_url()?>assets/images/Coorg1.jpg');">
                    <div class="container">

                        <div class="page-title">

                            <div class="row">

                                <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">

                                    <h2>Update Your Trip</h2>
                                    <p>Celebrated no he decisively thoroughly.</p>

                                </div>

                            </div>

                        </div>

                        <div class="breadcrumb-wrapper">

                            <ol class="breadcrumb">
                                <li><a href="<?php echo base_url() ?>">Home</a></li>
                                <li class="active"><span>Update Your Trip</span></li>
                            </ol>

                        </div>

                    </div>

                </div>

                <!-- end breadcrumb -->

                <div class="bg-light">

                    <div class="create-tour-wrapper">

                        <div class="container">

                            <div class="row">

                                <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">

                                    <div class="form">
                                  <?php echo form_open_multipart(base_url() . 'trips/edit_action', array('class' => 'form-horizontal margin-top-30', 'id' => 'make_new_trip_form')); ?>
	      
                                        <div class="create-tour-inner">

<!--                                            <div class="promo-box-02 mb-40">

                                                <div class="icon">
                                                    <i class="ti-plus"></i>
                                                </div>

                                                <h4>No account? Please sign-up now. It's free. </h4>

                                                <a href="#" class="btn">Sign Up</a>

                                            </div>-->

<!--                                            <h4 class="section-title">About this tour</h4>
                                            <p>Compliment interested discretion estimating on stimulated apartments oh. Dear so sing when in find read of call. As distrusts behaviour abilities defective uncommonly.</p>-->

                                            <div class="row">

                                                <div class="col-xs-6 col-sm-6">

                                                    <div class="form-group">
                                                        <label>Trip Type:</label>
                                                        <select name="is_shared" class="selectpicker show-tick form-control" title="Select placeholder">
                                                            <option value="0" <?php if(isset($trip_details['details']['isshared']) && $trip_details['details']['isshared'] ==0){echo 'selected';}?> >Make New Trip / Own Trip</option>
                                                            <option value="1" <?php if(isset($trip_details['details']['isshared']) && $trip_details['details']['isshared'] ==1){echo 'selected';}?>>Make New Trip from Vendor / Shared Trips</option>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="col-xs-6 col-sm-6">

                                                    <div class="form-group">
                                                        <label>Catagory:</label>
                                                        <select name="trip_category_id"  id="trip_category_id" class="selectpicker show-tick form-control" title="Select placeholder">
                                                            <option value="">Select a catagory...</option>
                                                            <?php 
                                                                if(isset($category_list) && count($category_list) > 0){
                                                                    foreach($category_list as $v){
                                                                        $isSelected = '';
                                                                        if(isset($trip_details['details']['trip_category_id']) && $trip_details['details']['trip_category_id'] == $v['id']){
                                                                            $isSelected = 'selected';
                                                                        }
                                                                        echo '<option value="'.$v['id'].'" '.$isSelected.'>'.$v['name'].'</option>';
                                                                    }
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="col-xs-12 col-sm-12">

                                                    <div class="form-group form-group-lg">
                                                        <label>Trip Name:</label>
                                                        <input name="trip_name" type="text" class="form-control" placeholder="Enter the trip name..." value="<?php echo isset($trip_details['details']['trip_name'])?$trip_details['details']['trip_name']:''?>"/>
                                                    </div>

                                                </div>
                                                
                                                <div class="col-xs-12 col-sm-4 col-md-4">
                                                    <div class="row gap-20">
                                                    <label>Price to Adult:</label>
                                                    <div class="input-group mb-15">
                                                        <input name="price_to_adult" class="form-control" type="text" placeholder="0" value="<?php echo isset($trip_details['details']['price_to_adult'])?$trip_details['details']['price_to_adult']:''?>">
                                                        <span class="input-group-addon">Rs / person</span>
                                                    </div>
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-sm-4 col-md-4">
                                                    <div class="row gap-20">
                                                    <label>Price to Child:</label>
                                                    <div class="input-group mb-15">
                                                        <input name="price_to_child" class="form-control" type="text" placeholder="0" value="<?php echo isset($trip_details['details']['price_to_child'])?$trip_details['details']['price_to_child']:''?>">
                                                        <span class="input-group-addon">Rs / person</span>
                                                    </div>
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-sm-4 col-md-4">
                                                    <div class="row gap-20">
                                                    <label>Price to Infan:</label>
                                                    <div class="input-group mb-15">
                                                        <input name="price_to_infan" class="form-control" type="text" placeholder="0" value="<?php echo isset($trip_details['details']['price_to_infan'])?$trip_details['details']['price_to_infan']:''?>">
                                                        <span class="input-group-addon">Rs / person</span>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-4 col-md-4">
                                                    <div class="form-group">
                                                        <label>Trip Duration:</label>
                                                        <select name="trip_duration" id="trip_duration" class="selectpicker show-tick form-control" title="Select a trip duration type">                                                            
                                                            <option value="">Select a trip duration type...</option>
                                                            <option value="1" <?php echo isset($trip_details['details']['trip_duration']) && $trip_details['details']['trip_duration'] ==1?'selected':'';?>>Hours / minutes</option>
                                                            <option value="2" <?php echo isset($trip_details['details']['trip_duration']) && $trip_details['details']['trip_duration'] ==2?'selected':'';?>>Day / hours</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-8 col-md-8 hide" id="how_many_daysdiv">
                                                    <div class="row gap-20">
                                                        <div class="col-xsw-12 col-xs-6 col-sm-6 col-md-6">
                                                            <div class="form-group form-spin-group">
                                                                <label>How many days?</label>
                                                                <input name="how_many_days" type="text" class="form-control form-spin" value="<?php echo isset($trip_details['details']['how_many_days']) ? $trip_details['details']['how_many_days']:0?>" /> 
                                                            </div>
                                                        </div>
                                                        <div class="col-xsw-12 col-xs-6 col-sm-6 col-md-6">
                                                            <div class="form-group form-spin-group">
                                                                <label>How many nights?</label>
                                                                <input name="how_many_nights" type="text" class="form-control form-spin" value="<?php echo isset($trip_details['details']['how_many_nights']) ? $trip_details['details']['how_many_nights']:0?>" /> 
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-xs-12 col-sm-8 col-md-8 hide" id="how_many_hoursdiv">
                                                    <div class="row gap-20">
                                                        <div class="col-xsw-12 col-xs-6 col-sm-6 col-md-6">
                                                            <div class="form-group form-spin-group">
                                                                <label>How many hours?(1 Hour)</label>
                                                                <input name="how_many_hours" type="text" class="form-control form-spin" value="<?php echo isset($trip_details['details']['how_many_hours']) ? $trip_details['details']['how_many_hours']:0?>" /> 
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-xs-12 col-sm-12">

                                                    <div class="form-group">
                                                        <label>Brief Description:</label>
                                                        <textarea name="brief_description" class="bootstrap3-wysihtml5 form-control" rows="5"><?php echo isset($trip_details['details']['brief_description']) ? $trip_details['details']['brief_description']:''?></textarea>
                                                    </div>

                                                </div>
                                                
                                                <div class="col-xs-12 col-sm-12">

                                                    <div class="form-group">
                                                        <label>Languages:</label>
                                                        <input name="languages" type="text" class="form-control" placeholder="Enter the languages" value="<?php echo isset($trip_details['details']['languages'])?$trip_details['details']['languages']:''?>"/>                                                        
                                                    </div>

                                                </div>
                                                
                                                <div class="col-xs-12 col-sm-12">

                                                    <div class="form-group">
                                                        <label>Meal:</label>
                                                        <input name="meal" type="text" class="form-control" placeholder="Enter the meals" value="<?php echo isset($trip_details['details']['meal'])?$trip_details['details']['meal']:''?>"/>                                                       
                                                    </div>

                                                </div>
                                                
                                                <div class="col-xs-12 col-sm-12">

                                                    <div class="form-group">
                                                        <label>Transport:</label>
                                                        <textarea name="transport" class="bootstrap3-wysihtml5 form-control" rows="5"><?php echo isset($trip_details['details']['transport']) ? $trip_details['details']['transport']:''?></textarea>
                                                    </div>

                                                </div>
                                                
                                                <div class="col-xs-12 col-sm-12">

                                                    <div class="form-group">
                                                        <label>Things To Carry:</label>
                                                        <textarea name="things_to_carry" class="bootstrap3-wysihtml5 form-control" rows="5"><?php echo isset($trip_details['details']['things_to_carry']) ? $trip_details['details']['things_to_carry']:''?></textarea>
                                                    </div>

                                                </div>
                                                
                                                <div class="col-xs-12 col-sm-12">

                                                    <div class="form-group">
                                                        <label>Tour Type:</label>
                                                        <textarea name="tour_type" class="bootstrap3-wysihtml5 form-control" rows="5"><?php echo isset($trip_details['details']['tour_type']) ? $trip_details['details']['tour_type']:''?></textarea>
                                                    </div>

                                                </div>
                                                
                                                <div class="col-xs-12 col-sm-12">

                                                    <div class="form-group">
                                                        <label>Tags:</label>
                                                        <input name="tags" type="text" class="form-control" id="autocompleteTagging2" value="<?php echo isset($trip_details['tags']) ? $trip_details['tags']:''?>" placeholder="" />
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="mb-30"></div>

                                            <h4 class="section-title">Trip detail</h4>

                                            <div class="row gap-20">
                                                <div class="col-xs-12 col-sm-4 col-md-4">

                                                    <div class="form-group">
                                                        <label>Trip size:</label>
                                                        <input name="no_of_traveller" type="text" class="form-control form-spin" placeholder="" value="<?php echo isset($trip_details['details']['no_of_traveller']) ? $trip_details['details']['no_of_traveller']:''?>"/> 
                                                    </div>

                                                </div>
                                                <div class="col-xs-12 col-sm-4 col-md-4">

                                                    <div class="form-group">
                                                        <label>Book minimum travellers:</label>
                                                        <input name="no_of_min_booktraveller" type="text" class="form-control form-spin" placeholder="1" value="<?php echo isset($trip_details['details']['no_of_min_booktraveller']) ? $trip_details['details']['no_of_min_booktraveller']:''?>" /> 
                                                    </div>

                                                </div>
                                                <div class="col-xs-12 col-sm-4 col-md-4">

                                                    <div class="form-group">
                                                        <label>Book maximum travellers:</label>
                                                        <input name="no_of_max_booktraveller" type="text" class="form-control form-spin" placeholder="0" value="<?php echo isset($trip_details['details']['no_of_max_booktraveller']) ? $trip_details['details']['no_of_max_booktraveller']:''?>" /> 
                                                    </div>

                                                </div>

                                                
                                                <div class="col-xs-12 col-sm-4 col-md-4">

                                                    <div class="form-group">
                                                        <label>Booking cut of time type:</label>
                                                        <select name="booking_cut_of_time_type" class="selectpicker show-tick form-control" title="Select a booking cut of time type">
                                                            <option value="">Select a booking cut of time type...</option>
                                                            <option value="1" <?php echo isset($trip_details['details']['booking_cut_of_time_type']) && $trip_details['details']['booking_cut_of_time_type'] == 1?'selected':''?>>Days</option>
                                                            <option value="2"<?php echo isset($trip_details['details']['booking_cut_of_time_type']) && $trip_details['details']['booking_cut_of_time_type'] == 2?'selected':''?>>Hours</option>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="col-xs-12 col-sm-4 col-md-4">

                                                    <div class="form-group">
                                                        <label>Booking cut of time/day:</label>
                                                        <input name="booking_cut_of_time" type="text" class="form-control form-spin" value="<?php echo isset($trip_details['details']['booking_cut_of_time']) ? $trip_details['details']['booking_cut_of_time']:''?>" /> 
                                                    </div>

                                                </div>
                                                

                                            </div>
                                            

                                            <div class="mb-40"></div>

                                            <h4 class="section-title">Pick Up Location</h4>
                                            <div class="row gap-20">
                                                <div class="col-xs-12 col-sm-6">

                                                    <div class="form-group">
                                                        <label>State</label>
                                                        <select name="state_id" id="state_id" class="selectpicker show-tick form-control" title="Select a state">
                                                            <option value="">Select a state</option>
                                                            <?php if(isset($state_list) && $state_list->num_rows()>0) {
                                                                foreach($state_list->result() as $st) { 
                                                                    $issSelected = '';
                                                                     if(isset($trip_details['details']['state_id']) && $trip_details['details']['state_id'] == $st->id){
                                                                         $issSelected = 'selected';
                                                                     }
                                                                    ?>
                                                                    <option value="<?=  ucfirst($st->id)?>" <?= $issSelected ?>><?=ucfirst($st->name)?></option>
                                                            <?php }} ?>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="col-xs-12 col-sm-6">

                                                    <div class="form-group">
                                                        <label>City</label>
                                                        <select name="city_id" id="city_id" class="selectpicker show-tick form-control" title="Select a city">
                                                            <option value="">Select a city</option>   
                                                             <?php if(isset($city_list) && $city_list->num_rows()>0) {
                                                                foreach($city_list->result() as $ct) { 
                                                                    $iscSelected = '';
                                                                     if(isset($trip_details['details']['city_id']) && $trip_details['details']['city_id'] == $ct->id){
                                                                         $iscSelected = 'selected';
                                                                     }
                                                                    ?>
                                                                    <option value="<?= $ct->id?>" <?= $iscSelected ?>><?=ucfirst($ct->name)?></option>
                                                            <?php }} ?>
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                                
                                                <div class="pickup_location_list_div">
                                                    <div class="pickup_location_list_default" id="pickup_location_list_0">
                                                        <div class="row">
                                                            <div class="col-xs-12 col-sm-5">

                                                                <div class="form-group">
                                                                    <label>Meeting point</label>
                                                                    <input  type="text" class="form-control" name="ex_pickup_meeting_point[<?php echo isset($trip_details['pickups'][0]['id'])?$trip_details['pickups'][0]['id']:0?>]" value="<?php echo isset($trip_details['pickups'][0]['location']) ? $trip_details['pickups'][0]['location']:'';?>"/>
                                                                </div>

                                                            </div>

                                                            <div class="col-xs-12 col-sm-3">

                                                                <div class="form-group">
                                                                    <label>Meeting time</label>
                                                                    <input type="text" class="oh-timepicker form-control" name="ex_pickup_meeting_time[<?php echo isset($trip_details['pickups'][0]['id'])?$trip_details['pickups'][0]['id']:0?>]" value="<?php echo isset($trip_details['pickups'][0]['time']) ? $trip_details['pickups'][0]['time']:'';?>"/>
                                                                </div>

                                                            </div>
                                                            <div class="col-xs-12 col-sm-4">

                                                                <div class="form-group">
                                                                    <label>Landmark</label>
                                                                    <input type="text" class="oh-timepicker1 form-control" name="ex_pickup_landmark[<?php echo isset($trip_details['pickups'][0]['id'])?$trip_details['pickups'][0]['id']:0?>]" value="<?php echo isset($trip_details['pickups'][0]['landmark']) ? $trip_details['pickups'][0]['landmark']:'';?>"/>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php 
                                                  if(isset($trip_details['pickups']) && count($trip_details['pickups']) > 1){
                                                      foreach($trip_details['pickups'] as $k=>$v) {
                                                          if( $k != 0){
                                                              echo '<div class="pickup_location_list" id="pickup_location_list_'.$k.'">
                                                                        <div class="row">
                                                                            <div class="col-xs-12 col-sm-5">
                                                                                <div class="form-group">
                                                                                    <label>Location'.$k.'</label>
                                                                                    <input type="text" class="form-control" name="ex_pickup_meeting_point['.$v['id'].']" value="'.$v['location'].'"/>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xs-12 col-sm-3">
                                                                                <div class="form-group">
                                                                                    <label>Location'.$k.' time</label>
                                                                                    <input type="text" class="oh-timepicker form-control" name="ex_pickup_meeting_time['.$v['id'].']" value="'.$v['time'].'"/>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xs-12 col-sm-4">
                                                                                <div class="form-group">
                                                                                    <label>Location'.$k.' Landmark</label>
                                                                                    <input type="text" class="oh-timepicker1 form-control" name="ex_pickup_landmark['.$v['id'].']" value="'.$v['landmark'].'"/>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>';
                                                          }
                                                      }
                                                  }?>                                                
                                                
                                            <div class="row">
                                                <div class="col-xs-12 col-xs-6 col-md-4">
                                                    <div class="add-more-form">
                                                        <!--<span>Add/remove form</span> -->
                                                        <span>Add form</span> 
                                                        <a href="javascript:;" id="addNewPickupLoc"><i class="ion-android-add-circle"></i></a> 
                                                        <!--<a href="#"><i class="ion-android-remove-circle"></i></a>-->
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-40"></div>

                                            <h4 class="section-title">Available Days</h4>

                                            <div class="row checkbox-wrapper">
                                                <div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
                                                    <div class="checkbox-block">
                                                        <input class="available_days" id="filter_checkbox-1" name="trip_ava_sun" type="checkbox" class="checkbox" <?php echo isset($trip_details['available_days']['sunday']) && $trip_details['available_days']['sunday'] == 1?'checked':'';?>/>
                                                        <label class="" for="filter_checkbox-1">Sunday</label>
                                                    </div>
                                                </div>
                                                <div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
                                                    <div class="checkbox-block">
                                                        <input class="available_days" id="filter_checkbox-2" name="trip_ava_mon" type="checkbox" class="checkbox" <?php echo isset($trip_details['available_days']['monday']) && $trip_details['available_days']['monday'] == 1?'checked':'';?>/>
                                                        <label class="" for="filter_checkbox-2">Monday</label>
                                                    </div>
                                                </div>
                                                <div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
                                                    <div class="checkbox-block">
                                                        <input class="available_days" id="filter_checkbox-3" name="trip_ava_tue" type="checkbox" class="checkbox" <?php echo isset($trip_details['available_days']['tuesday']) && $trip_details['available_days']['tuesday'] == 1?'checked':'';?>/>
                                                        <label class="" for="filter_checkbox-3">Tuesday</label>
                                                    </div>
                                                </div>
                                                <div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
                                                    <div class="checkbox-block">
                                                        <input class="available_days" id="filter_checkbox-4" name="trip_ava_wed" type="checkbox" class="checkbox" <?php echo isset($trip_details['available_days']['wednesday']) && $trip_details['available_days']['wednesday'] == 1?'checked':'';?>/>
                                                        <label class="" for="filter_checkbox-4">Wednesday</label>
                                                    </div>
                                                </div>
                                                <div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
                                                    <div class="checkbox-block">
                                                        <input class="available_days" id="filter_checkbox-5" name="trip_ava_thu" type="checkbox" class="checkbox" <?php echo isset($trip_details['available_days']['thursday']) && $trip_details['available_days']['thursday'] == 1?'checked':'';?>/>
                                                        <label class="" for="filter_checkbox-5">Thursday</label>
                                                    </div>
                                                </div>
                                                <div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
                                                    <div class="checkbox-block">
                                                        <input class="available_days" id="filter_checkbox-6" name="trip_ava_fri" type="checkbox" class="checkbox" <?php echo isset($trip_details['available_days']['friday']) && $trip_details['available_days']['friday'] == 1?'checked':'';?>/>
                                                        <label class="" for="filter_checkbox-6">Friday</label>
                                                    </div>
                                                </div>
                                                <div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
                                                    <div class="checkbox-block">
                                                        <input class="available_days" id="filter_checkbox-7" name="trip_ava_sat" type="checkbox" class="checkbox" <?php echo isset($trip_details['available_days']['saturday']) && $trip_details['available_days']['saturday'] == 1?'checked':'';?>/>
                                                        <label class="" for="filter_checkbox-7">Saturday</label>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="mb-40"></div>

                                            <h4 class="section-title">What's included?</h4>

                                            <div class="row checkbox-wrapper">
                                                <?php 
                                                    if(isset($inclusion_list) && count($inclusion_list) > 0){ 
                                                        foreach($inclusion_list as $k=>$v){
                                                            $isChecked = '';
                                                            if(isset($trip_details['inclusions'])&& count($trip_details['inclusions']) > 0 && in_array($v['id'], $trip_details['inclusions'])){
                                                                $isChecked = 'checked';
                                                            }
                                                            echo '<div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
                                                                        <div class="checkbox-block">
                                                                            <input id="inclusion_'.$k.'" name="trip_inclusions[]" type="checkbox" class="checkbox" value="'.$v["id"].'" '.$isChecked.'/>
                                                                            <label class="" for="inclusion_'.$k.'">'.$v["name"].'</label>
                                                                        </div>
                                                                   </div>';
                                                        }
                                                    }
                                                ?>                                                
                                            </div>
                                            <div class="row gap-20">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
												
                                                        <div class="form-group bootstrap-fileinput-style-01">
                                                                <label>Other inclusions</label>
                                                                <textarea class="bootstrap3-wysihtml5 form-control" name="other_inclusions" placeholder="Other inclusions point out once by one..." style="height: 150px;"><?php echo isset($trip_details['details']['other_inclusions']) ? $trip_details['details']['other_inclusions']:''?></textarea>
                                                        </div>

                                                </div>
                                            </div>
                                            <div class="mb-40"></div>

                                            <h4 class="section-title">What's excluded?</h4>

                                            <div class="row gap-20">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
												
                                                        <div class="form-group bootstrap-fileinput-style-01">
<!--                                                                <label>Other inclusions</label>-->
                                                                <textarea class="bootstrap3-wysihtml5 form-control" name="exclusions" placeholder="Excluded point out once by one..." style="height: 150px;"><?php echo isset($trip_details['details']['exclusions']) ? $trip_details['details']['exclusions']:''?></textarea>
                                                        </div>

                                                </div>
                                            </div>

                                            <div class="mb-30"></div>

                                            <h4 class="section-title">Gallery</h4>

                                            <div class="submite-list-box">

                                                <div id="file-submit" class="dropzone">
                                                    <input name="file" id="gallery_uploads" type="file" multiple>
                                                    <div class="dz-default dz-message"><span>Click or Drop Images Here</span></div>
                                                </div>
                                                
                                                <input type="hidden" name="gallery_images" id="gallery_images" value="[]">
                                                <input type="hidden"  id="ex_gallery_images" value='<?php echo isset($trip_details['galleries'])?$trip_details['galleries']:"[]" ?>'>
                                                <input type="hidden"  id="ex_rm_gallery_images" value=''>

                                            </div>	

                                            <div class="mb-40"></div>

                                            <h4 class="section-title">Itinerary</h4>
                                            <p>Compliment interested discretion estimating on stimulated apartments oh. Dear so sing when in find read of call. As distrusts behaviour abilities defective uncommonly.</p>

                                            <div class="itinerary-form-wrapper">
                                                
                                                <?php 
                                                 if(isset($trip_details['itineraries']) && count($trip_details['itineraries']) > 0) {
                                                     foreach($trip_details['itineraries'] as $k=>$v) { 
                                                         $key = $k+1;
                                                         $day = str_pad($key,2,"0",STR_PAD_LEFT);
                                                        echo '<div class="itinerary-form-item" id="itinerary_form_item_'.$key.'">

                                                            <div class="content clearfix">

                                                                <div class="row gap-20">

                                                                    <div class="col-xs-2 col-sm-2 col-md-1">

                                                                        <div class="day">
                                                                            <h6 class="text-uppercase mb-0 mt-5 text-muted">Day</h6>
                                                                            <span class="text-primary block number spacing-1">'.$day.'</span>
                                                                        </div>

                                                                    </div>

                                                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                                                        <div class="form-group form-group-sm">
                                                                            <label>Time from</label>
                                                                            <input type="text" class="oh-timepicker form-control"  name="ex_trip_from_time['.$v['id'].']" value="'.$v['from_time'].'"/>
                                                                        </div>

                                                                    </div>

                                                                    <div class="col-xs-12 col-sm-3 col-md-3">

                                                                        <div class="form-group form-group-sm">
                                                                            <label>Time to</label>
                                                                            <input type="text" class="oh-timepicker form-control" name="ex_trip_to_time['.$v['id'].']" value="'.$v['to_time'].'"/>
                                                                        </div>

                                                                    </div>

                                                                    <div class="col-xs-12 col-sm-5 col-md-5">
                                                                        <div class="form-group form-group-sm">
                                                                            <label>Title:</label>
                                                                            <input type="text" class="form-control" name="ex_trip_from_title['.$v['id'].']" value="'.$v['title'].'"/>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <div class="row gap-20">

                                                                    <div class="col-xs-12 col-sm-12">

                                                                        <div class="form-group">
                                                                            <label>Short Description:</label>
                                                                            <input type="text" class="form-control" name="ex_trip_short_dec['.$v['id'].']" value="'.$v['short_description'].'"/>
                                                                        </div>

                                                                    </div>
                                                                </div>

                                                                <div class="row gap-20">
                                                                    <div class="col-xs-12 col-sm-12">
                                                                        <div class="form-group">
                                                                            <label>Brief Description:</label>
                                                                            <textarea class="bootstrap3-wysihtml5 form-control" name="ex_trip_brief_dec['.$v['id'].']" placeholder="Excluded point out once by one..." style="height: 150px;">'.$v['brief_description'].'</textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>                                                        
                                                            </div>
                                                        
                                                    </div>'; 
                                                 }} ?>
                                            </div>
                                            <div class="add-more-form mt-15">
                                                <!-- <span>Add/remove itinerary</span> -->
                                                 <span>Add itinerary</span> 
                                                 <a href="javascript:;"><i class="ion-android-add-circle" id="addNewItinerary"></i></a> 
                                                 <!--<a href="#"><i class="ion-android-remove-circle"></i></a>-->
                                             </div>
                                            
                                             <div class="mb-30"></div>
                                            <h4 class="section-title">Policy</h4>
                                            <div class="row gap-20">
                                                <div class="col-xs-12 col-sm-12 col-md-12">

                                                        <div class="form-group bootstrap-fileinput-style-01">
                                                                <label>Cancellation Policy</label>
                                                                <textarea class="bootstrap3-wysihtml5 form-control" name="cancellation_policy" id="cancellation_policy" placeholder="Enter text ..." style="height: 150px;"><?php echo isset($trip_details['details']['cancellation_policy']) ? $trip_details['details']['cancellation_policy']:''?></textarea>
                                                        </div>

                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">

                                                        <div class="form-group bootstrap-fileinput-style-01">
                                                                <label>Confirmation Policy</label>
                                                                <textarea class="bootstrap3-wysihtml5 form-control" name="confirmation_policy" id="confirmation_policy" placeholder="Enter text ..." style="height: 150px;"><?php echo isset($trip_details['details']['confirmation_policy']) ? $trip_details['details']['confirmation_policy']:''?></textarea>
                                                        </div>

                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">

                                                        <div class="form-group bootstrap-fileinput-style-01">
                                                                <label>Refund Policy</label>
                                                                <textarea class="bootstrap3-wysihtml5 form-control" name="refund_policy" id="refund_policy" placeholder="Enter text ..." style="height: 150px;"><?php echo isset($trip_details['details']['refund_policy']) ? $trip_details['details']['refund_policy']:''?></textarea>
                                                        </div>

                                                </div>
                                            </div>
                                            <div class="mb-30"></div>
                                            
                                            <div class="row gap-20">
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <label>Trip View to</label>
                                                    <div class="radio-block">
                                                        <input  id="view_type_1" name="view_to" type="radio" class="radio" value="1" checked/>
                                                        <label class="" for="view_type_1">Vendor and Customer</label>
                                                    </div>				
                                                    <div class="radio-block">
                                                        <input  id="view_type_2" name="view_to" type="radio" class="radio" value="2" <?php echo isset($trip_details['details']['view_to']) && $trip_details['details']['view_to']==2?'checked':''?>/>
                                                        <label class="" for="view_type_2">Vendor Only</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-50 ">

                                            <div class="checkbox-block font-icon-checkbox" style="display:none;">
                                                <input id="term_accept" name="term_accept"  type="checkbox" class="checkbox"  checked=""/>
                                                <label class="" for="term_accept">Am terminated it excellence invitation projection as. She graceful shy believed distance use nay. Lively is people so basket ladies window expect. <a href="#" class="font700">Terms &amp; Conditions</a></label>
                                            </div>
                                            <div class="term_accept_err" style="color:red;display:none;"><p>Please accept terms&conditions</p></div>

                                            <div class="mb-25"></div>                                            
                                            <input type="submit" class="btn btn-primary btn-wide tripAddSubmit" data-id="submit" value="Submit">
                                            
                                        </div>
                                            <input type="hidden" name="trip_id"  id="trip_id" value="<?php echo isset($trip_details['details']['id'])?$trip_details['details']['id']:0;?>">
                                            <input type="hidden"  id="action" value="edit">
                                        
<?php echo form_close()?>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>
		<!-- start Footer Wrapper -->
		 <script>
                    var group_tags = '<?=json_encode($tags);?>';</script>
		<?php $this->load->view('includes/footer')?>
                <script>
                 
            </script>
	