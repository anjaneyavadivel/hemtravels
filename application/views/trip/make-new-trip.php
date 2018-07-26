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
                                <li><a href="#">Home</a></li>
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
                                                        <select class="selectpicker show-tick form-control" title="Select placeholder">
                                                            <option value="0">Make New Trip / Own Trip</option>
                                                            <option value="1">Make New Trip from Vendor / Shared Trips</option>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="col-xs-6 col-sm-6">

                                                    <div class="form-group">
                                                        <label>Catagory:</label>
                                                        <select class="selectpicker show-tick form-control" title="Select placeholder">
                                                            <option value="0">Attraction Visit</option>
                                                            <option value="1">Boating</option>
                                                            <option value="1">Cycling</option>
                                                            <option value="1">Wildlife</option>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="col-xs-12 col-sm-12">

                                                    <div class="form-group form-group-lg">
                                                        <label>Trip Name:</label>
                                                        <input type="text" class="form-control"/>
                                                    </div>

                                                </div>

                                                <div class="col-xs-12 col-sm-4 col-md-4">
                                                    <label>Price to Adult:</label>
                                                    <div class="input-group mb-15">
                                                        <input class="form-control" type="text">
                                                        <span class="input-group-addon">Rs / person</span>
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-sm-4 col-md-4">
                                                    <label>Price to Child:</label>
                                                    <div class="input-group mb-15">
                                                        <input class="form-control" type="text" value="0">
                                                        <span class="input-group-addon">Rs / person</span>
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-sm-4 col-md-4">
                                                    <label>Price to Infan:</label>
                                                    <div class="input-group mb-15">
                                                        <input class="form-control" type="text" value="0">
                                                        <span class="input-group-addon">Rs / person</span>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-4 col-md-4">
                                                    <div class="form-group">
                                                        <label>Trip Duration:</label>
                                                        <select class="selectpicker show-tick form-control" title="Select placeholder">
                                                            <option value="1">Hours / minutes</option>
                                                            <option value="2" selected="">Day / hours</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-8 col-md-8">
                                                    <div class="row gap-20">
                                                        <div class="col-xsw-12 col-xs-6 col-sm-6 col-md-6">
                                                            <div class="form-group form-spin-group">
                                                                <label>How many days?</label>
                                                                <input type="text" class="form-control form-spin" value="1" /> 
                                                            </div>
                                                        </div>
                                                        <div class="col-xsw-12 col-xs-6 col-sm-6 col-md-6">
                                                            <div class="form-group form-spin-group">
                                                                <label>How many nights?</label>
                                                                <input type="text" class="form-control form-spin" value="1" /> 
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-xs-12 col-sm-12">

                                                    <div class="form-group">
                                                        <label>Brief Description:</label>
                                                        <textarea class="form-control" rows="5"></textarea>
                                                    </div>

                                                </div>
                                                <div class="col-xs-12 col-sm-12">

                                                    <div class="form-group">
                                                        <label>Tags:</label>
                                                        <input type="text" class="form-control" id="autocompleteTagging2" value="Lifestyle, Shopping, Backpack" placeholder="" />
                                                    </div>

                                                </div>
                                            </div>

                                           


                                            <div class="mb-30"></div>

                                            <h4 class="section-title">Trip detail</h4>

                                            <div class="row gap-20">
                                                <div class="col-xs-12 col-sm-4 col-md-4">

                                                    <div class="form-group">
                                                        <label>Trip size:</label>
                                                        <input type="text" class="form-control form-spin" value="10" /> 
                                                    </div>

                                                </div>
                                                <div class="col-xs-12 col-sm-4 col-md-4">

                                                    <div class="form-group">
                                                        <label>Minimum travellers:</label>
                                                        <input type="text" class="form-control form-spin" value="1" /> 
                                                    </div>

                                                </div>
                                                <div class="col-xs-12 col-sm-4 col-md-4">

                                                    <div class="form-group">
                                                        <label>Maximum travellers:</label>
                                                        <input type="text" class="form-control form-spin" value="0" /> 
                                                    </div>

                                                </div>

                                                
                                                <div class="col-xs-12 col-sm-4 col-md-4">

                                                    <div class="form-group">
                                                        <label>Booking cut of time type:</label>
                                                        <select class="selectpicker show-tick form-control" title="Select placeholder">
                                                            <option value="1">Days</option>
                                                            <option value="2" selected="">Hours</option>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="col-xs-12 col-sm-4 col-md-4">

                                                    <div class="form-group">
                                                        <label>Booking cut of time:</label>
                                                        <input type="text" class="form-control form-spin" value="0" /> 
                                                    </div>

                                                </div>
                                                

                                            </div>
                                            

                                            <div class="mb-40"></div>

                                            <h4 class="section-title">Pick Up Location</h4>
                                            <div class="row gap-20">
                                                <div class="col-xs-12 col-sm-5">

                                                    <div class="form-group">
                                                        <label>Meeting point</label>
                                                        <input type="text" class="form-control" />
                                                    </div>

                                                </div>

                                                <div class="col-xs-12 col-sm-3">

                                                    <div class="form-group">
                                                        <label>Meeting time</label>
                                                        <input type="text" class="oh-timepicker form-control" />
                                                    </div>

                                                </div>
                                                <div class="col-xs-12 col-sm-4">

                                                    <div class="form-group">
                                                        <label>Landmark</label>
                                                        <input type="text" class="oh-timepicker form-control" />
                                                    </div>

                                                </div>
                                                
                                                <div class="col-xs-12 col-sm-5">

                                                    <div class="form-group">
                                                        <label>Location1</label>
                                                        <input type="text" class="form-control" />
                                                    </div>

                                                </div>

                                                <div class="col-xs-12 col-sm-3">

                                                    <div class="form-group">
                                                        <label>Location1 time</label>
                                                        <input type="text" class="oh-timepicker form-control" />
                                                    </div>

                                                </div>
                                                <div class="col-xs-12 col-sm-4">

                                                    <div class="form-group">
                                                        <label>Location1 Landmark</label>
                                                        <input type="text" class="oh-timepicker form-control" />
                                                    </div>

                                                </div>
                                                
                                                <div class="col-xs-12 col-sm-5">

                                                    <div class="form-group">
                                                        <label>Location2</label>
                                                        <input type="text" class="form-control" />
                                                    </div>

                                                </div>

                                                <div class="col-xs-12 col-sm-3">

                                                    <div class="form-group">
                                                        <label>Location2 time</label>
                                                        <input type="text" class="oh-timepicker form-control" />
                                                    </div>

                                                </div>
                                                <div class="col-xs-12 col-sm-4">

                                                    <div class="form-group">
                                                        <label>Location2 Landmark</label>
                                                        <input type="text" class="oh-timepicker form-control" />
                                                    </div>

                                                </div>
                                                
                                                
                                                <div class="col-xs-12 col-sm-5">

                                                    <div class="form-group">
                                                        <label>Location3</label>
                                                        <input type="text" class="form-control" />
                                                    </div>

                                                </div>

                                                <div class="col-xs-12 col-sm-3">

                                                    <div class="form-group">
                                                        <label>Location3 time</label>
                                                        <input type="text" class="oh-timepicker form-control" />
                                                    </div>

                                                </div>
                                                <div class="col-xs-12 col-sm-4">

                                                    <div class="form-group">
                                                        <label>Location3 Landmark</label>
                                                        <input type="text" class="oh-timepicker form-control" />
                                                    </div>

                                                </div>
                                                <div class="col-xs-12 col-xs-6 col-md-4">
                                                    <div class="add-more-form">
                                                        <span>Add/remove form</span> 
                                                        <a href="#"><i class="ion-android-add-circle"></i></a> 
                                                        <a href="#"><i class="ion-android-remove-circle"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-40"></div>

                                            <h4 class="section-title">Available Days</h4>

                                            <div class="row checkbox-wrapper">
                                                <div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
                                                    <div class="checkbox-block">
                                                        <input id="filter_checkbox-1" name="filter_checkbox" type="checkbox" class="checkbox"/>
                                                        <label class="" for="filter_checkbox-1">Sunday</label>
                                                    </div>
                                                </div>
                                                <div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
                                                    <div class="checkbox-block">
                                                        <input id="filter_checkbox-2" name="filter_checkbox" type="checkbox" class="checkbox"/>
                                                        <label class="" for="filter_checkbox-2">Monday</label>
                                                    </div>
                                                </div>
                                                <div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
                                                    <div class="checkbox-block">
                                                        <input id="filter_checkbox-3" name="filter_checkbox" type="checkbox" class="checkbox"/>
                                                        <label class="" for="filter_checkbox-3">Tuesday</label>
                                                    </div>
                                                </div>
                                                <div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
                                                    <div class="checkbox-block">
                                                        <input id="filter_checkbox-4" name="filter_checkbox" type="checkbox" class="checkbox"/>
                                                        <label class="" for="filter_checkbox-4">Wednesday</label>
                                                    </div>
                                                </div>
                                                <div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
                                                    <div class="checkbox-block">
                                                        <input id="filter_checkbox-5" name="filter_checkbox" type="checkbox" class="checkbox"/>
                                                        <label class="" for="filter_checkbox-5">Thursday</label>
                                                    </div>
                                                </div>
                                                <div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
                                                    <div class="checkbox-block">
                                                        <input id="filter_checkbox-6" name="filter_checkbox" type="checkbox" class="checkbox"/>
                                                        <label class="" for="filter_checkbox-6">Friday</label>
                                                    </div>
                                                </div>
                                                <div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
                                                    <div class="checkbox-block">
                                                        <input id="filter_checkbox-7" name="filter_checkbox" type="checkbox" class="checkbox"/>
                                                        <label class="" for="filter_checkbox-7">Saturday</label>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="mb-40"></div>

                                            <h4 class="section-title">What's included?</h4>

                                            <div class="row checkbox-wrapper">
                                                <div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
                                                    <div class="checkbox-block">
                                                        <input id="filter_checkbox-1" name="filter_checkbox" type="checkbox" class="checkbox"/>
                                                        <label class="" for="filter_checkbox-1">Checkbox One</label>
                                                    </div>
                                                </div>
                                                <div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
                                                    <div class="checkbox-block">
                                                        <input id="filter_checkbox-2" name="filter_checkbox" type="checkbox" class="checkbox"/>
                                                        <label class="" for="filter_checkbox-2">Checkbox Two</label>
                                                    </div>
                                                </div>
                                                <div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
                                                    <div class="checkbox-block">
                                                        <input id="filter_checkbox-3" name="filter_checkbox" type="checkbox" class="checkbox"/>
                                                        <label class="" for="filter_checkbox-3">Checkbox Three</label>
                                                    </div>
                                                </div>
                                                <div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
                                                    <div class="checkbox-block">
                                                        <input id="filter_checkbox-4" name="filter_checkbox" type="checkbox" class="checkbox"/>
                                                        <label class="" for="filter_checkbox-4">Checkbox Four</label>
                                                    </div>
                                                </div>
                                                <div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
                                                    <div class="checkbox-block">
                                                        <input id="filter_checkbox-5" name="filter_checkbox" type="checkbox" class="checkbox"/>
                                                        <label class="" for="filter_checkbox-5">Checkbox Five</label>
                                                    </div>
                                                </div>
                                                <div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
                                                    <div class="checkbox-block">
                                                        <input id="filter_checkbox-6" name="filter_checkbox" type="checkbox" class="checkbox"/>
                                                        <label class="" for="filter_checkbox-6">Checkbox Six</label>
                                                    </div>
                                                </div>
                                                <div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
                                                    <div class="checkbox-block">
                                                        <input id="filter_checkbox-7" name="filter_checkbox" type="checkbox" class="checkbox"/>
                                                        <label class="" for="filter_checkbox-7">Checkbox Seven</label>
                                                    </div>
                                                </div>
                                                <div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
                                                    <div class="checkbox-block">
                                                        <input id="filter_checkbox-8" name="filter_checkbox" type="checkbox" class="checkbox"/>
                                                        <label class="" for="filter_checkbox-8">Checkbox Eight</label>
                                                    </div>
                                                </div>
                                                <div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
                                                    <div class="checkbox-block">
                                                        <input id="filter_checkbox-9" name="filter_checkbox" type="checkbox" class="checkbox"/>
                                                        <label class="" for="filter_checkbox-9">Checkbox Nine</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gap-20">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
												
                                                        <div class="form-group bootstrap-fileinput-style-01">
                                                                <label>Other inclusions</label>
                                                                <textarea class="bootstrap3-wysihtml5 form-control" placeholder="* Quick training session<br>
                                                                          * Boat ride of 1 hour to reach Grande Island<br>
                                                                          * Scuba diving of 20-25 minute a dive for each participant<br>
                                                                          * Equipment charges<br>
                                                                          * Photography and videography<br>
                                                                          * Safety Kit" style="height: 150px;"></textarea>
                                                        </div>

                                                </div>
                                            </div>
                                            <div class="mb-40"></div>

                                            <h4 class="section-title">What's excluded?</h4>

                                            <div class="row gap-15 mt-25">

                                                <div class="col-xs-12 col-xs-6 col-md-4">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-xs-6 col-md-4">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-xs-6 col-md-4">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-xs-6 col-md-4">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-xs-6 col-md-4">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-xs-6 col-md-4">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-xs-6 col-md-4">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-xs-6 col-md-4">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-xs-6 col-md-4">
                                                    <div class="add-more-form">
                                                        <span>Add/remove form</span> 
                                                        <a href="#"><i class="ion-android-add-circle"></i></a> 
                                                        <a href="#"><i class="ion-android-remove-circle"></i></a>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="mb-30"></div>

                                            <h4 class="section-title">Gallery</h4>

                                            <div class="submite-list-box">

                                                <div id="file-submit" class="dropzone">
                                                    <input name="file" type="file" multiple>
                                                    <div class="dz-default dz-message"><span>Click or Drop Images Here</span></div>
                                                </div>

                                            </div>	

                                            <div class="mb-40"></div>

                                            <h4 class="section-title">Itinerary</h4>
                                            <p>Compliment interested discretion estimating on stimulated apartments oh. Dear so sing when in find read of call. As distrusts behaviour abilities defective uncommonly.</p>

                                            <div class="itinerary-form-wrapper">

                                                <div class="itinerary-form-item">

                                                    <div class="content clearfix">

                                                        <div class="row gap-20">

                                                            <div class="col-xss-12 col-xs-2 col-sm-2 col-md-1">

                                                                <div class="day">
                                                                    <h6 class="text-uppercase mb-0 mt-5 text-muted">Day</h6>
                                                                    <span class="text-primary block number spacing-1">01</span>
                                                                </div>

                                                            </div>

                                                            <div class="col-xss-12 col-xs-10 col-sm-10 col-md-11">

                                                                <div class="row gap-20">

                                                                    <div class="col-xs-12 col-sm-5 col-md-3">

                                                                        <div class="form-group form-group-sm">
                                                                            <label>Time from</label>
                                                                            <input type="text" class="oh-timepicker form-control" />
                                                                        </div>

                                                                    </div>

                                                                    <div class="col-xs-12 col-sm-5 col-md-3">

                                                                        <div class="form-group form-group-sm">
                                                                            <label>Time to</label>
                                                                            <input type="text" class="oh-timepicker form-control" />
                                                                        </div>

                                                                    </div>

                                                                </div>

                                                                <div class="row gap-20">

                                                                    <div class="col-xs-12 col-sm-6">

                                                                        <div class="form-group">
                                                                            <label>Title:</label>
                                                                            <input type="text" class="form-control"/>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label>Remark:</label>
                                                                            <input type="text" class="form-control"/>
                                                                        </div>

                                                                    </div>

                                                                    <div class="col-xs-12 col-sm-6">

                                                                        <div class="form-group">
                                                                            <label>Brief Description:</label>
                                                                            <textarea class="form-control" rows="5"></textarea>
                                                                        </div>

                                                                    </div>

                                                                    

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="itinerary-form-item">

                                                    <div class="content clearfix">

                                                        <div class="row gap-20">

                                                            <div class="col-xss-12 col-xs-2 col-sm-2 col-md-1">

                                                                <div class="day">
                                                                    <h6 class="text-uppercase mb-0 mt-5 text-muted">Day</h6>
                                                                    <span class="text-primary block number spacing-1">02</span>
                                                                </div>

                                                            </div>

                                                            <div class="col-xss-12 col-xs-10 col-sm-10 col-md-11">

                                                                <div class="row gap-20">

                                                                    <div class="col-xs-12 col-sm-5 col-md-3">

                                                                        <div class="form-group form-group-sm">
                                                                            <label>Time from</label>
                                                                            <input type="text" class="oh-timepicker form-control" />
                                                                        </div>

                                                                    </div>

                                                                    <div class="col-xs-12 col-sm-5 col-md-3">

                                                                        <div class="form-group form-group-sm">
                                                                            <label>Time to</label>
                                                                            <input type="text" class="oh-timepicker form-control" />
                                                                        </div>

                                                                    </div>

                                                                </div>

                                                                <div class="row gap-20">

                                                                    <div class="col-xs-12 col-sm-6">

                                                                        <div class="form-group">
                                                                            <label>Title:</label>
                                                                            <input type="text" class="form-control"/>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label>Remark:</label>
                                                                            <input type="text" class="form-control"/>
                                                                        </div>

                                                                    </div>

                                                                    <div class="col-xs-12 col-sm-6">

                                                                        <div class="form-group">
                                                                            <label>Brief Description:</label>
                                                                            <textarea class="form-control" rows="5"></textarea>
                                                                        </div>

                                                                    </div>

                                                                    

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="itinerary-form-item">

                                                    <div class="content clearfix">

                                                        <div class="row gap-20">

                                                            <div class="col-xss-12 col-xs-2 col-sm-2 col-md-1">

                                                                <div class="day">
                                                                    <h6 class="text-uppercase mb-0 mt-5 text-muted">Day</h6>
                                                                    <span class="text-primary block number spacing-1">03</span>
                                                                </div>

                                                            </div>

                                                            <div class="col-xss-12 col-xs-10 col-sm-10 col-md-11">

                                                                <div class="row gap-20">

                                                                    <div class="col-xs-12 col-sm-5 col-md-3">

                                                                        <div class="form-group form-group-sm">
                                                                            <label>Time from</label>
                                                                            <input type="text" class="oh-timepicker form-control" />
                                                                        </div>

                                                                    </div>

                                                                    <div class="col-xs-12 col-sm-5 col-md-3">

                                                                        <div class="form-group form-group-sm">
                                                                            <label>Time to</label>
                                                                            <input type="text" class="oh-timepicker form-control" />
                                                                        </div>

                                                                    </div>

                                                                </div>

                                                                <div class="row gap-20">

                                                                    <div class="col-xs-12 col-sm-6">

                                                                        <div class="form-group">
                                                                            <label>Title:</label>
                                                                            <input type="text" class="form-control"/>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label>Remark:</label>
                                                                            <input type="text" class="form-control"/>
                                                                        </div>

                                                                    </div>

                                                                    <div class="col-xs-12 col-sm-6">

                                                                        <div class="form-group">
                                                                            <label>Brief Description:</label>
                                                                            <textarea class="form-control" rows="5"></textarea>
                                                                        </div>

                                                                    </div>

                                                                    

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="add-more-form mt-15">
                                                <span>Add/remove itinerary</span> 
                                                <a href="#"><i class="ion-android-add-circle"></i></a> 
                                                <a href="#"><i class="ion-android-remove-circle"></i></a>
                                            </div>
<div class="mb-30"></div>


                                            <h4 class="section-title">Policy</h4>
                                            <div class="row gap-20">
                                                <div class="col-xs-12 col-sm-12 col-md-12">
												
                                                        <div class="form-group bootstrap-fileinput-style-01">
                                                                <label>Cancellation Policy</label>
                                                                <textarea class="bootstrap3-wysihtml5 form-control" placeholder="Enter text ..." style="height: 150px;"></textarea>
                                                        </div>

                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
												
                                                        <div class="form-group bootstrap-fileinput-style-01">
                                                                <label>Confirmation Policy</label>
                                                                <textarea class="bootstrap3-wysihtml5 form-control" placeholder="Enter text ..." style="height: 150px;"></textarea>
                                                        </div>

                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
												
                                                        <div class="form-group bootstrap-fileinput-style-01">
                                                                <label>Refund Policy</label>
                                                                <textarea class="bootstrap3-wysihtml5 form-control" placeholder="Enter text ..." style="height: 150px;"></textarea>
                                                        </div>

                                                </div>
                                            </div>
<div class="mb-30"></div>
                                            <h4 class="section-title">Other Setting</h4>
                                            <p>It's optional, You can set specific day offer or Close Trip</p>
                                            <div class="row gap-20">
                                                <div class="col-xs-12 col-sm-4 col-md-4">

                                                    <div class="form-group">
                                                        <label>Other Setting Type:</label>
                                                        <select class="selectpicker show-tick form-control" title="Select placeholder">
                                                            <option value="">Select a type</option>
                                                            <option value="0">Set Offer Specific Day</option>
                                                            <option value="1">Set Trip Close Specific Day</option>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="row gap-10" id="rangeDatePicker">
									
                                                                <div class="col-xss-12 col-xs-3 col-sm-3">
                                                                        <div class="form-group">
                                                                                <label>From</label>
                                                                                <input type="text" id="rangeDatePickerTo" class="form-control" placeholder="yyyy/mm/dd" />
                                                                        </div>
                                                                </div>

                                                                <div class="col-xss-12 col-xs-3 col-sm-3">
                                                                        <div class="form-group">
                                                                                <label>To</label>
                                                                                <input type="text" id="rangeDatePickerFrom" class="form-control" placeholder="yyyy/mm/dd" />
                                                                        </div>
                                                                </div>

                                                        </div>
                                            </div>
                                             <div class="row gap-20">
                                                <div class="col-xs-12 col-sm-4 col-md-4">

                                                    <div class="form-group">
                                                        <label>Trip size:</label>
                                                        <input type="text" class="form-control form-spin" value="10" /> 
                                                    </div>

                                                </div>
                                                <div class="col-xs-12 col-sm-4 col-md-4">

                                                    <div class="form-group">
                                                        <label>Minimum travellers:</label>
                                                        <input type="text" class="form-control form-spin" value="1" /> 
                                                    </div>

                                                </div>
                                                <div class="col-xs-12 col-sm-4 col-md-4">

                                                    <div class="form-group">
                                                        <label>Maximum travellers:</label>
                                                        <input type="text" class="form-control form-spin" value="0" /> 
                                                    </div>

                                                </div>

                                                
                                                <div class="col-xs-12 col-sm-4 col-md-4">
                                                    <label>Price to Adult:</label>
                                                    <div class="input-group mb-15">
                                                        <input class="form-control" type="text" value="0">
                                                        <span class="input-group-addon">Rs / person</span>
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-sm-4 col-md-4">
                                                    <label>Price to Child:</label>
                                                    <div class="input-group mb-15">
                                                        <input class="form-control" type="text" value="0">
                                                        <span class="input-group-addon">Rs / person</span>
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-sm-4 col-md-4">
                                                    <label>Price to Infan:</label>
                                                    <div class="input-group mb-15">
                                                        <input class="form-control" type="text" value="0">
                                                        <span class="input-group-addon">Rs / person</span>
                                                    </div>
                                                </div>
                                                

                                            </div>
                                        </div>

                                        <div class="mb-50">

                                            <div class="checkbox-block font-icon-checkbox">
                                                <input id="term_accept-1" name="term_accept" type="checkbox" class="checkbox" />
                                                <label class="" for="term_accept-1">Am terminated it excellence invitation projection as. She graceful shy believed distance use nay. Lively is people so basket ladies window expect. <a href="#" class="font700">Terms &amp; Conditions</a></label>
                                            </div>

                                            <div class="mb-25"></div>

                                            <a href="offered-create-done.html" class="btn btn-primary btn-wide">Submit</a>
                                            <a href="#" class="btn btn-primary btn-wide btn-border">Save as draft</a>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>
		<!-- start Footer Wrapper -->
		
		<?php $this->load->view('includes/footer')?>
		
	