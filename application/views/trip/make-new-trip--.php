<?php $this->load->view('includes/header')?>
  <!-- start Main Wrapper -->

           <div class="main-wrapper scrollspy-container">

                <!-- start breadcrumb -->

                <div class="breadcrumb-image-bg pb-100 no-bg" style="background-image:url('<?php echo base_url()?>assets/images/Coorg1.jpg');">
                    <div class="container">

                        <div class="page-title">

                            <div class="row">

                                <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">

                                    <h2>Make Your New Trip</h2>
                                    <p>Celebrated no he decisively thoroughly.</p>

                                </div>

                            </div>

                        </div>

                        <div class="breadcrumb-wrapper">

                            <ol class="breadcrumb">
                                <li><a href="<?php echo base_url() ?>">Home</a></li>
                                <li class="active"><span>Make New Trip</span></li>
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
                                  <?php echo form_open_multipart(base_url() . 'trips/add_action', array('class' => 'form-horizontal margin-top-30', 'id' => 'make_new_trip_form')); ?>
	      
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

                                                <div class="col-xs-6 col-sm-6" style="display:none;">

                                                    <div class="form-group">
                                                        <label>Trip Type:<span style=' color: #d9534f;'>*</span></label>
                                                        <select name="is_shared" class="selectpicker show-tick form-control" title="Select trip type">
                                                            <option value="0" <?php if($isshared==0){echo 'selected';}?> >Make New Trip / Own Trip</option>
                                                            <option value="1" <?php if($isshared>0){echo 'selected';}?>>Make New Trip from Vendor / Shared Trips</option>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="col-xs-6 col-sm-6">

                                                    <div class="form-group">
                                                        <label>Catagory:<span style=' color: #d9534f;'>*</span></label>
                                                        <select name="trip_category_id"  id="trip_category_id" class="selectpicker show-tick form-control" title="Select category">
                                                            <option value="">Select a catagory...</option>
                                                            <?php 
                                                                if(isset($category_list) && count($category_list) > 0){
                                                                    foreach($category_list as $v){
                                                                        echo '<option value="'.$v['id'].'">'.$v['name'].'</option>';
                                                                    }
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="col-xs-12 col-sm-12">

                                                    <div class="form-group form-group-lg">
                                                        <label>Trip Name:<span style=' color: #d9534f;'>*</span></label>
                                                        <input name="trip_name" type="text" class="form-control" placeholder="Enter the trip name..."/>
                                                    </div>

                                                </div>
                                                
                                                <div class="col-xs-12 col-sm-4 col-md-4">
                                                    <div class="row gap-20">
                                                    <label>Price to Adult:<span style=' color: #d9534f;'>*</span></label>
                                                    <div class="input-group mb-15">
                                                        <input name="price_to_adult" class="form-control" type="text" placeholder="1200">
                                                        <span class="input-group-addon">Rs / person</span>
                                                    </div>
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-sm-4 col-md-4">
                                                    <div class="row gap-20">
                                                    <label>Price to Child:</label>
                                                    <div class="input-group mb-15">
                                                        <input name="price_to_child" class="form-control" type="text" placeholder="800">
                                                        <span class="input-group-addon">Rs / person</span>
                                                    </div>
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-sm-4 col-md-4">
                                                    <div class="row gap-20">
                                                    <label>Price to Infan:</label>
                                                    <div class="input-group mb-15">
                                                        <input name="price_to_infan" class="form-control" type="text" placeholder="0">
                                                        <span class="input-group-addon">Rs / person</span>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-4 col-md-4">
                                                    <div class="form-group">
                                                        <label>Trip Duration:<span style=' color: #d9534f;'>*</span></label>
                                                        <select name="trip_duration" id="trip_duration" class="selectpicker show-tick form-control" title="Select a trip duration type">
                                                            <option value="">Select a trip duration type...</option>
                                                            <option value="1">Hours / minutes</option>
                                                            <option value="2">Day / hours</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-8 col-md-8 hide" id="how_many_daysdiv">
                                                    <div class="row gap-20">
                                                        <div class="col-xsw-12 col-xs-6 col-sm-6 col-md-6">
                                                            <div class="form-group form-spin-group">
                                                                <label>How many days?</label>
                                                                <input name="how_many_days" type="text" class="form-control form-spin" value="2" /> 
                                                            </div>
                                                        </div>
                                                        <div class="col-xsw-12 col-xs-6 col-sm-6 col-md-6">
                                                            <div class="form-group form-spin-group">
                                                                <label>How many nights?</label>
                                                                <input name="how_many_nights" type="text" class="form-control form-spin" value="1" /> 
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-xs-12 col-sm-8 col-md-8 hide" id="how_many_hoursdiv">
                                                    <div class="row gap-20">
                                                        <div class="col-xsw-12 col-xs-6 col-sm-6 col-md-6">
                                                            <div class="form-group form-spin-group">
                                                                <label>How many hours?(1 Hour)</label>
                                                                <input name="how_many_hours" type="text" class="form-control form-spin" value="1" /> 
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-xs-12 col-sm-12">

                                                    <div class="form-group">
                                                        <label>Brief Description:<span style=' color: #d9534f;'>*</span></label>
                                                        <textarea name="brief_description" class="bootstrap3-wysihtml5 form-control" placeholder="Enter the brief description about trip..." rows="5"></textarea>
                                                    </div>

                                                </div>
                                                <div class="col-xs-12 col-sm-12">
                                                    <div class="form-group form-group-lg">
                                                        <label>Languages:</label>
                                                        <input name="languages" type="text" class="form-control" placeholder="eg: English, Thai, Malay"/>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-xs-12 col-sm-12">
                                                    <div class="form-group form-group-lg">
                                                        <label>Meal:</label>
                                                        <input name="meal" type="text" class="form-control" placeholder="eg: Vegetarian, Non-Vegetarian"/>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12">

                                                    <div class="form-group">
                                                        <label>Transport:</label>
                                                        <textarea name="transport" class="bootstrap3-wysihtml5 form-control" placeholder="eg: Pick up and drop from hotel in an A/C bus." rows="5"></textarea>
                                                    </div>

                                                </div>
                                                
                                                <div class="col-xs-12 col-sm-12">

                                                    <div class="form-group">
                                                        <label>Things To Carry:</label>
                                                        <textarea name="things_to_carry" class="bootstrap3-wysihtml5 form-control" placeholder="eg: Sunglasses,Camera,Sunscreen" rows="5"></textarea>
                                                    </div>

                                                </div>
                                                
                                                <div class="col-xs-12 col-sm-12">

                                                    <div class="form-group">
                                                        <label>Tour Type:</label>
                                                        <textarea name="tour_type" class="bootstrap3-wysihtml5 form-control" placeholder="eg: This is a group tour" rows="5"></textarea>
                                                    </div>

                                                </div>
                                                
                                                <div class="col-xs-12 col-sm-12">

                                                    <div class="form-group">
                                                        <label>Tags:<span style=' color: #d9534f;'>*</span></label>
                                                        <input name="tags" type="text" class="form-control" id="autocompleteTagging2" value="" placeholder="" />
                                                    </div>

                                                </div>
                                            </div>

                                           


                                            <div class="mb-30"></div>

                                            <h4 class="section-title">Trip detail</h4>

                                            <div class="row gap-20">
                                                <div class="col-xs-12 col-sm-4 col-md-4">

                                                    <div class="form-group">
                                                        <label>Trip size:<span style=' color: #d9534f;'>*</span></label>
                                                        <input name="no_of_traveller" type="text" class="form-control form-spin" placeholder="20" /> 
                                                    </div>

                                                </div>
                                                <div class="col-xs-12 col-sm-4 col-md-4">

                                                    <div class="form-group">
                                                        <label>Book minimum travellers:</label>
                                                        <input name="no_of_min_booktraveller" type="text" class="form-control form-spin" placeholder="1" value="1" /> 
                                                    </div>

                                                </div>
                                                <div class="col-xs-12 col-sm-4 col-md-4">

                                                    <div class="form-group">
                                                        <label>Book maximum travellers:</label>
                                                        <input name="no_of_max_booktraveller" type="text" class="form-control form-spin" placeholder="0" value="5" /> 
                                                    </div>

                                                </div>

                                                
                                                <div class="col-xs-12 col-sm-4 col-md-4">

                                                    <div class="form-group">
                                                        <label>Booking cut of time type:<span style=' color: #d9534f;'>*</span></label>
                                                        <select name="booking_cut_of_time_type" class="selectpicker show-tick form-control" title="Select a booking cut of time type">
                                                            <option value="">Select a booking cut of time type...</option>
                                                            <option value="1">Days</option>
                                                            <option value="2">Hours</option>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="col-xs-12 col-sm-4 col-md-4">

                                                    <div class="form-group">
                                                        <label>Booking cut of time/day:</label>
                                                        <input name="booking_cut_of_time" type="text" class="form-control form-spin" value="1" /> 
                                                    </div>

                                                </div>
                                                

                                            </div>
                                            

                                            <div class="mb-40"></div>

                                            <h4 class="section-title">Pick Up Location</h4>
                                            <div class="row gap-20">
                                                <div class="col-xs-12 col-sm-6">

                                                    <div class="form-group">
                                                        <label>State:<span style=' color: #d9534f;'>*</span></label>
                                                        <select name="state_id" id="state_id" class="selectpicker show-tick form-control" title="Select a state">
                                                            <option value="">Select a state</option>
                                                            <?php if(isset($state_list) && $state_list->num_rows()>0) {foreach($state_list->result() as $st) {?>
                                                            <option value="<?=  ucfirst($st->id)?>"><?=ucfirst($st->name)?></option>
                                                            <?php }} ?>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="col-xs-12 col-sm-6">

                                                    <div class="form-group">
                                                        <label>City:<span style=' color: #d9534f;'>*</span></label>
                                                        <select name="city_id" id="city_id" class="selectpicker show-tick form-control" title="Select a city">
                                                            <option value="">Select a city</option>                                                            
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="row gap-20" id="other_city" style="display:none;">
                                                <div class="col-xs-12 col-sm-6"></div>
                                                <div class="col-xs-12 col-sm-6">
                                                    <div class="form-group">                                                        
                                                        <input  type="text" class="form-control" name="other_city" />
                                                    </div>
                                                </div>
                                            </div>
                                            
                                                
                                                <div class="pickup_location_list_div">
                                                    <div class="pickup_location_list_default" id="pickup_location_list_0">
                                                        <div class="row">
                                                            <div class="col-xs-12 col-sm-5">

                                                                <div class="form-group">
                                                                    <label>Meeting point:<span style=' color: #d9534f;'>*</span></label>
                                                                    <input  type="text" class="form-control" name="pickup_meeting_point[]" />
                                                                </div>

                                                            </div>

                                                            <div class="col-xs-12 col-sm-3">

                                                                <div class="form-group">
                                                                    <label>Meeting time:<span style=' color: #d9534f;'>*</span></label>
                                                                    <input type="text" class="oh-timepicker form-control" name="pickup_meeting_time[]"/>
                                                                </div>

                                                            </div>
                                                            <div class="col-xs-12 col-sm-4">

                                                                <div class="form-group">
                                                                    <label>Landmark:</label>
                                                                    <input type="text" class="oh-timepicker1 form-control" name="pickup_landmark[]" />
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="pickup_location_list" id="pickup_location_list_1">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-5">
                                                            <div class="form-group">
                                                                <label>Location1</label>
                                                                <input type="text" class="form-control" name="pickup_meeting_point[]"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-3">
                                                            <div class="form-group">
                                                                <label>Location1 time</label>
                                                                <input type="text" class="oh-timepicker form-control" name="pickup_meeting_time[]"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-4">
                                                            <div class="form-group">
                                                                <label>Location1 Landmark</label>
                                                                <input type="text" class="oh-timepicker1 form-control" name="pickup_landmark[]"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="pickup_location_list" id="pickup_location_list_2">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-5">
                                                            <div class="form-group">
                                                                <label>Location2</label>
                                                                <input type="text" class="form-control" name="pickup_meeting_point[]"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-3">
                                                            <div class="form-group">
                                                                <label>Location2 time</label>
                                                                <input type="text" class="oh-timepicker form-control" name="pickup_meeting_time[]"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-4">
                                                            <div class="form-group">
                                                                <label>Location2 Landmark</label>
                                                                <input type="text" class="oh-timepicker1 form-control" name="pickup_landmark[]"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="pickup_location_list" id="pickup_location_list_3">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-5">
                                                            <div class="form-group">
                                                                <label>Location3</label>
                                                                <input type="text" class="form-control" name="pickup_meeting_point[]"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-3">
                                                            <div class="form-group">
                                                                <label>Location3 time</label>
                                                                <input type="text" class="oh-timepicker form-control" name="pickup_meeting_time[]"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-4">
                                                            <div class="form-group">
                                                                <label>Location3 Landmark</label>
                                                                <input type="text" class="oh-timepicker1 form-control" name="pickup_landmark[]"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
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
                                                        <input class="available_days" id="filter_checkbox-1" name="trip_ava_sun" type="checkbox" class="checkbox" checked/>
                                                        <label class="" for="filter_checkbox-1">Sunday</label>
                                                    </div>
                                                </div>
                                                <div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
                                                    <div class="checkbox-block">
                                                        <input class="available_days" id="filter_checkbox-2" name="trip_ava_mon" type="checkbox" class="checkbox" checked/>
                                                        <label class="" for="filter_checkbox-2">Monday</label>
                                                    </div>
                                                </div>
                                                <div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
                                                    <div class="checkbox-block">
                                                        <input class="available_days" id="filter_checkbox-3" name="trip_ava_tue" type="checkbox" class="checkbox" checked/>
                                                        <label class="" for="filter_checkbox-3">Tuesday</label>
                                                    </div>
                                                </div>
                                                <div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
                                                    <div class="checkbox-block">
                                                        <input class="available_days" id="filter_checkbox-4" name="trip_ava_wed" type="checkbox" class="checkbox" checked/>
                                                        <label class="" for="filter_checkbox-4">Wednesday</label>
                                                    </div>
                                                </div>
                                                <div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
                                                    <div class="checkbox-block">
                                                        <input class="available_days" id="filter_checkbox-5" name="trip_ava_thu" type="checkbox" class="checkbox" checked/>
                                                        <label class="" for="filter_checkbox-5">Thursday</label>
                                                    </div>
                                                </div>
                                                <div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
                                                    <div class="checkbox-block">
                                                        <input class="available_days" id="filter_checkbox-6" name="trip_ava_fri" type="checkbox" class="checkbox" checked/>
                                                        <label class="" for="filter_checkbox-6">Friday</label>
                                                    </div>
                                                </div>
                                                <div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
                                                    <div class="checkbox-block">
                                                        <input class="available_days" id="filter_checkbox-7" name="trip_ava_sat" type="checkbox" class="checkbox" checked/>
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
                                                            echo '<div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
                                                                        <div class="checkbox-block">
                                                                            <input id="inclusion_'.$k.'" name="trip_inclusions[]" type="checkbox" class="checkbox" value="'.$v["id"].'"/>
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
                                                                <textarea class="bootstrap3-wysihtml5 form-control" name="other_inclusions" placeholder="Other inclusions point out once by one..." style="height: 150px;"></textarea>
                                                        </div>

                                                </div>
                                            </div>
                                            <div class="mb-40"></div>

                                            <h4 class="section-title">What's excluded?</h4>

                                            <div class="row gap-20">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
												
                                                        <div class="form-group bootstrap-fileinput-style-01">
<!--                                                                <label>Other inclusions</label>-->
                                                                <textarea class="bootstrap3-wysihtml5 form-control" name="exclusions" placeholder="Excluded point out once by one..." style="height: 150px;"></textarea>
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

                                            </div>	

                                            <div class="mb-40"></div>

                                            <h4 class="section-title">Itinerary</h4>
                                            <p>Compliment interested discretion estimating on stimulated apartments oh. Dear so sing when in find read of call. As distrusts behaviour abilities defective uncommonly.</p>

                                            <div class="itinerary-form-wrapper">

                                                <div class="itinerary-form-item" id="itinerary_form_item_1">

                                                    <div class="content clearfix">

                                                        <div class="row gap-20">

                                                            <div class="col-xs-2 col-sm-2 col-md-1">

                                                                <div class="day">
                                                                    <h6 class="text-uppercase mb-0 mt-5 text-muted">Day</h6>
                                                                    <span class="text-primary block number spacing-1">01</span>
                                                                </div>

                                                            </div>
                                                            
                                                            <div class="col-xs-12 col-sm-3 col-md-3">
                                                                <div class="form-group form-group-sm">
                                                                    <label>Time from:<span style=' color: #d9534f;'>*</span></label>
                                                                    <input type="text" class="oh-timepicker form-control"  name="trip_from_time[]"/>
                                                                </div>

                                                            </div>

                                                            <div class="col-xs-12 col-sm-3 col-md-3">

                                                                <div class="form-group form-group-sm">
                                                                    <label>Time to:<span style=' color: #d9534f;'>*</span></label>
                                                                    <input type="text" class="oh-timepicker form-control" name="trip_to_time[]" />
                                                                </div>

                                                            </div>
                                                            
                                                            <div class="col-xs-12 col-sm-5 col-md-5">
                                                                <div class="form-group form-group-sm">
                                                                    <label>Title:<span style=' color: #d9534f;'>*</span></label>
                                                                    <input type="text" class="form-control" name="trip_from_title[]" placeholder="eg: Day1: First day trip"/>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>

                                                        <div class="row gap-20">

                                                            <div class="col-xs-12 col-sm-12">

                                                                <div class="form-group">
                                                                    <label>Short Description:</label>
                                                                    <input type="text" class="form-control" name="trip_short_dec[]"/>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row gap-20">
                                                            <div class="col-xs-12 col-sm-12">

                                                                <div class="form-group">
                                                                    <label>Brief Description:</label>
                                                                    <textarea class="bootstrap3-wysihtml5 form-control" name="trip_brief_dec[]" placeholder="Excluded point out once by one..." style="height: 150px;"></textarea>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        
                                                    </div>

                                                </div>

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
                                                                <label>Cancellation Policy:<span style=' color: #d9534f;'>*</span></label>
                                                                <textarea class="bootstrap3-wysihtml5 form-control" name="cancellation_policy" id="cancellation_policy" placeholder="eg: If cancellations are made 15 days before the start date of the trip, 25% of total tour cost will be charged as cancellation fees" style="height: 150px;"></textarea>
                                                        </div>

                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
												
                                                        <div class="form-group bootstrap-fileinput-style-01">
                                                                <label>Confirmation Policy:<span style=' color: #d9534f;'>*</span></label>
                                                                <textarea class="bootstrap3-wysihtml5 form-control" name="confirmation_policy" id="confirmation_policy" placeholder="eg: The customer receives a confirmation voucher via email within 24 hours of successful booking" style="height: 150px;"></textarea>
                                                        </div>

                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
												
                                                        <div class="form-group bootstrap-fileinput-style-01">
                                                                <label>Refund Policy:<span style=' color: #d9534f;'>*</span></label>
                                                                <textarea class="bootstrap3-wysihtml5 form-control" name="refund_policy" id="refund_policy" placeholder="eg: The applicable refund amount will be processed within 10 business days" style="height: 150px;"></textarea>
                                                        </div>

                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <label>Trip View to:<span style=' color: #d9534f;'>*</span></label>
                                                    <div class="radio-block">
                                                        <input  id="view_type_1" name="view_to" type="radio" class="radio" value="1" checked/>
                                                        <label class="" for="view_type_1">Vendor and Customer</label>
                                                    </div>				
                                                    <div class="radio-block">
                                                        <input  id="view_type_2" name="view_to" type="radio" class="radio" value="2"/>
                                                        <label class="" for="view_type_2">Vendor Only (share trip to other vendor)</label>
                                                    </div>
                                                </div>
                                            </div>
<div class="mb-30"></div>
                                            
                                        </div>

                                        <div class="mb-50 ">

                                            <div class="checkbox-block font-icon-checkbox">
                                                <input id="term_accept" name="term_accept"  type="checkbox" class="checkbox" />
                                                <label class="" for="term_accept">Am terminated it excellence invitation projection as. She graceful shy believed distance use nay. Lively is people so basket ladies window expect. <a href="#" class="font700">Terms &amp; Conditions</a></label>
                                            </div>
                                            <div class="term_accept_err" style="color:red;display:none;"><p>Please accept terms&conditions</p></div>
                                            <div class="field_req_err" style="color:red;display:none;"><p>Please fill the all required fields(*).</p></div>

                                            <div class="mb-25"></div>
                                            <input type="hidden" name="button_type" id="button_type" value="submit">
                                            <input type="submit" class="btn btn-primary btn-wide tripAddSubmit" data-id="submit" value="Submit">
                                            <input type="submit" class="btn btn-primary btn-wide btn-wide btn-border tripAddSubmit"  data-id="draft"value="Save as draft">
<!--                                            <a href="offered-create-done.html" class="btn btn-primary btn-wide">Submit</a>-->
                                            <!--<a href="#" class="btn btn-primary btn-wide btn-border">Save as draft</a>-->

                                        </div>
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
                    //var group_tags = '<?=json_encode($tags);?>';alert(JSON.parse(group_tags));
                    // Autocomplete Tagging 
//	var engine = new Bloodhound({
//		local: [{value: 'Romantic'}, {value: 'Adventure'}, {value: 'Lifestyle'} , {value: 'Shopping'}, {value: 'Backpack'}, {value: 'One day trip'}, {value: 'City tour'}, {value: 'Cruise'}, {value: 'Business'}],
//		datumTokenizer: function(d) {
//			return Bloodhound.tokenizers.whitespace(d.value);
//		},
//		queryTokenizer: Bloodhound.tokenizers.whitespace
//	});
//	engine.initialize();
//	$('#autocompleteTagging2').tokenfield({
//		typeahead: [null, { source: engine.ttAdapter() }],
//		//limit: '5',
//	});
            </script>
	