<?php $this->load->view('includes/header') ?>
<!-- start Main Wrapper -->

<div class="main-wrapper scrollspy-container filter_res">

    <!-- start breadcrumb -->

    <div class="breadcrumb-image-bg" style="background-image:url('<?php echo base_url()?>assets/images/ws.jpg');">
        <div class="container">

            <div class="page-title">

                <div class="row">

                    <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">

                        <h2>Tour offer results</h2>
                        <p>Yet remarkably appearance get him his projection. Diverted endeavor bed peculiar men the not desirous.</p>

                    </div>

                </div>

            </div>

            <div class="breadcrumb-wrapper">

                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url()?>">Home</a></li>

                    <li class="active">Trip List</li>
                </ol>

            </div>

        </div>

    </div>

    <!-- end breadcrumb -->

    <div class="filter-full-width-wrapper">

        <form class="">

            <div class="filter-full-primary">

                <div class="container">

                    <div class="filter-full-primary-inner">

                        <div class="form-holder">

                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-6">

                                    <div class="filter-item bb-sm no-bb-xss">
                                        <label class="block-xs hidden-xs">Filter</label>

                                        <!--												<div class="input-group input-group-addon-icon no-border no-br-sm">
                                                                                                                                                <span class="input-group-addon input-group-addon-icon bg-white"><label><i class="fa fa-map-marker"></i> Filters</label></span>
                                                                                                                                                <input type="text" class="form-control" id="autocompleteTagging" value="Goa" placeholder="" />
                                                                                                                                        </div>-->

                                    </div>

                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-6">

                                    <div class="filter-item-wrapper">

                                        <div class="row">

                                            <div class="col-xss-12 col-xs-6 col-sm-5">

                                                <div class="filter-item mmr">

                                                    <div class="input-group input-group-addon-icon no-border no-br-xs">
                                                        <span class="input-group-addon input-group-addon-icon bg-white">
                                                            <label class="block-xs"><i class="fa fa-sort-amount-asc"></i> Sort by:</label></span>
                                                        <select class="selectpicker form-control block-xs">
                                                            <option value="0"> Price</option>
                                                            <option value="3"> Location</option>
                                                            <option value="7"> Category</option>
                                                            <option value="7"> New Post</option>
                                                            <option value="4"> User Rating</option>
                                                        </select>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-xss-12 col-xs-6 col-sm-7">

                                                <div class="filter-item mmr">

                                                    <div class="input-group input-group-addon-icon no-border no-br-xs">
                                                        <span class="input-group-addon input-group-addon-icon bg-white"><label><i class="fa fa-sort-amount-asc"></i> Category:</label></span>
                                                        <select class="selectpicker form-control" data-live-search="false" data-selected-text-format="count > 2" data-done-button="true" data-done-button-text="OK" data-none-selected-text="All Types" multiple>
                                                            <option value="0"> Attraction Visit</option>
                                                            <option value="1"> Boating</option>
                                                            <option value="2"> Cycling</option>
                                                            <option value="3"> Wildlife</option>
                                                        </select>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="btn-holder filter_mbl">
                            <span class="btn btn-toggle btn-refine collapsed" data-toggle="collapse" data-target="#refine-result">Filter</span>
                        </div>

                    </div>

                </div>

            </div>



        </form>

    </div>

    <div class="pt-30 pb-50">

        <div class="">

            <div class="trip-guide-wrapper">
                <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="filter-full-secondary">

                        <div id="refine-result" class="collapse">

                            <div class=""> 

                                <div class="collapse-inner clearfix">

                                    <div class="row">

                                        <div class="col-xs-12 col-sm-12 col-md-12">

                                            <div class="row">

                                                <div class="col-xss-12 col-xs-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Search</label>
                                                        <input type="text" class="form-control" placeholder="Enter the title, catagory, etc...">
                                                    </div>
                                                </div>

                                                <div class="col-xss-12 col-xs-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label>No. of traveller</label>
                                                        <div class="form-group form-spin-group">
                                                            <input type="text" class="form-control form-spin" value="1" /> 
                                                        </div>
                                                    </div>
                                                </div>

                                                <!--												<div class="col-xss-12 col-xs-12 col-sm-12">
                                                                                                                                                        <div class="form-group">
                                                                                                                                                                <label>Select</label>
                                                                                                                                                                <select class="selectpicker show-tick form-control" title="Select placeholder">
                                                                                                                                                                        <option value="0">Select Option 1</option>
                                                                                                                                                                        <option value="1">Select Option 2</option>
                                                                                                                                                                        <option value="2">Select Option 3</option>
                                                                                                                                                                        <option value="3">Select Option 4</option>
                                                                                                                                                                </select>
                                                                                                                                                        </div>
                                                                                                                                                </div>
                                                                                                                                                
                                                                                                                                                <div class="col-xss-12 col-xs-12 col-sm-12">
                                                                                                                                                
                                                                                                                                                        <div class="form-group">
                                                                                                                                                                <label>Select Multiply</label>
                                                                                                                                                                <select id="filter_image_type" class="selectpicker show-tick form-control" title="Select placeholder" data-selected-text-format="count > 3" data-done-button="true" data-done-button-text="OK" multiple>
                                                                                                                                                                        <option value="0">Select Option 1</option>
                                                                                                                                                                        <option value="1">Select Option 2</option>
                                                                                                                                                                        <option value="2">Select Option 3</option>
                                                                                                                                                                        <option value="3">Select Option 4</option>
                                                                                                                                                                </select>
                                                                                                                                                        </div>
                                                
                                                                                                                                                </div>-->
                                                <div class="col-xss-12 col-xs-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Price Range</label>
                                                        <div class="row checkbox-wrapper">
                                                            <div class="col-xss-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                <div class="checkbox-block">
                                                                    <input id="filter_checkbox-1" name="filter_checkbox" type="checkbox" class="checkbox"/>
                                                                    <label class="" for="filter_checkbox-1">Rs 0 - 999</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-xss-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                <div class="checkbox-block">
                                                                    <input id="filter_checkbox-1" name="filter_checkbox" type="checkbox" class="checkbox"/>
                                                                    <label class="" for="filter_checkbox-1">Rs 1000 - 2499</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-xss-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                <div class="checkbox-block">
                                                                    <input id="filter_checkbox-1" name="filter_checkbox" type="checkbox" class="checkbox"/>
                                                                    <label class="" for="filter_checkbox-1">Rs 2,500 - 10000</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-xss-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                <div class="checkbox-block">
                                                                    <input id="filter_checkbox-1" name="filter_checkbox" type="checkbox" class="checkbox"/>
                                                                    <label class="" for="filter_checkbox-1">Rs 10000 - 50K</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-xss-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                <div class="checkbox-block">
                                                                    <input id="filter_checkbox-1" name="filter_checkbox" type="checkbox" class="checkbox"/>
                                                                    <label class="" for="filter_checkbox-1">INR 50K+</label>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xss-12 col-xs-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Number of people</label>
                                                        <div class="row checkbox-wrapper">
                                                            <div class="col-xss-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                <div class="checkbox-block">
                                                                    <input id="filter_checkbox-1" name="filter_checkbox" type="checkbox" class="checkbox"/>
                                                                    <label class="" for="filter_checkbox-1">1 - 5</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-xss-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                <div class="checkbox-block">
                                                                    <input id="filter_checkbox-1" name="filter_checkbox" type="checkbox" class="checkbox"/>
                                                                    <label class="" for="filter_checkbox-1">6 - 10</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-xss-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                <div class="checkbox-block">
                                                                    <input id="filter_checkbox-1" name="filter_checkbox" type="checkbox" class="checkbox"/>
                                                                    <label class="" for="filter_checkbox-1">11 - 20</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-xss-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                <div class="checkbox-block">
                                                                    <input id="filter_checkbox-1" name="filter_checkbox" type="checkbox" class="checkbox"/>
                                                                    <label class="" for="filter_checkbox-1">20 +</label>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xss-12 col-xs-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Tags</label>
                                                        <div class="row checkbox-wrapper">
                                                            <div class="col-xss-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                <div class="checkbox-block">
                                                                    <input id="filter_checkbox-1" name="filter_checkbox" type="checkbox" class="checkbox"/>
                                                                    <label class="" for="filter_checkbox-1">Cruises & Sailing</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-xss-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                <div class="checkbox-block">
                                                                    <input id="filter_checkbox-1" name="filter_checkbox" type="checkbox" class="checkbox"/>
                                                                    <label class="" for="filter_checkbox-1">Adventure</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-xss-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                <div class="checkbox-block">
                                                                    <input id="filter_checkbox-1" name="filter_checkbox" type="checkbox" class="checkbox"/>
                                                                    <label class="" for="filter_checkbox-1">Sports & Games</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-xss-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                <div class="checkbox-block">
                                                                    <input id="filter_checkbox-1" name="filter_checkbox" type="checkbox" class="checkbox"/>
                                                                    <label class="" for="filter_checkbox-1">Sightseeing </label>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-xs-12 col-sm-12 mb-10">


                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-8 col-lg-8">

                    <div class="GridLex-gap-20 GridLex-gap-15-mdd GridLex-gap-10-xs">

                        <div class="itinerary-list-wrapper">

                            <div class="itinerary-list-item">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="image">
                                            <a href="<?php echo base_url()?>trip-view"><img src="<?php echo base_url()?>assets/images/itinerary/02.jpg" alt="images" /></a>
                                        </div><div class="mt-10">
                                            <a href="#" class="btn btn-info btn-sm">Edit</a>
                                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                        </div>
                                        <div class="trip-by pt-5"><a href="<?php echo base_url()?>trip-calendar-view"><span class="text-primary font22 font700 mb-1">15</span> Booking List</a></div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="content">
                                            <!--															<div class="labeling"><span>Date</span> <span>12/2/2018 To 18/2/2018</span></div>-->
                                            <h4><a href="<?php echo base_url()?>trip-view">Stil touring in Bangkok for one more day</a></h4>
                                            <p style="margin-bottom: 0;"><i class="fa fa-map-marker text-center"></i> Goa <span class="mh-5 text-muted">|</span>Status: Open</p>
                                            <p style="margin-bottom: 0;"><i class="fa fa-share text-center"></i> Shared: Shared by abc@gmail.com</p>
                                            <p style="margin-bottom: 0;"><i class="far fa-sun text-center"></i> 14 Days <span class="mh-5 text-muted">|</span><i class="far fa-moon text-center"></i> 14 Nights</p>
                                            <p class=" font-lg">Warmly little before cousin sussex entire men set. Blessing it ladyship on sensible judgment settling outweigh. Worse linen an of civil jokes leave offer. Parties all clothes removal cheered calling prudent her. And residence for met the estimable disposing...</p>

                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3 b_left">

                                        <div class="">

                                            <div class="trip-guide-sm-item clearfix">


                                                <div class="content">
                                                    <h4 class="text-primary">Excellent <span  class="stars_rate btn-primary">5.0</span> </h4>
                                                    <div class="rating-item">
                                                        <span style="cursor: default;"> <input type="hidden" class="rating" data-filled="fa fa-star rating-rated" data-empty="fa fa-star-o" data-fractions="2" data-readonly="" value="4.5">
                                                            </div>



                                                            <div class="trip-by"><span class="text-primary font700 mb-1">Staring From</div>
                                                            <div class="price_off mr-10">5% OFF</div>
                                                            <div class="price pl-50">
                                                                <span class="">39000</span>
                                                                <sub> <strike class="text-muted">40000</strike> </sub> 
                                                            </div>
                                                            <div class="mt-20 ">
                                                                <a href="<?php echo base_url()?>trip-view" class="btn btn-primary btn-sm">Book</a>
<!--                                                                            <i class="fav_list pl-20 font22 far fa-heart"></i>-->

                                                            </div>																								
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="itinerary-list-item">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-3 col-md-3">
                                            <div class="image">
                                                <a href="<?php echo base_url()?>trip-view"><img src="<?php echo base_url()?>assets/images/itinerary/02.jpg" alt="images" /></a>
                                            </div><div class="mt-10">
                                                <a href="#" class="btn btn-info btn-sm">Edit</a>
                                                <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                            </div>
                                            <div class="trip-by pt-5"><a href="<?php echo base_url()?>trip-calendar-view"><span class="text-primary font22 font700 mb-1">15</span> Booking List</a></div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class="content">
                                                <!--															<div class="labeling"><span>Date</span> <span>12/2/2018 To 18/2/2018</span></div>-->
                                                <h4><a href="<?php echo base_url()?>trip-view">Stil touring in Bangkok for one more day</a></h4>
                                                <p style="margin-bottom: 0;"><i class="fa fa-map-marker text-center"></i> Goa <span class="mh-5 text-muted">|</span>Status: Closed</p>
                                                <p style="margin-bottom: 0;"><i class="fa fa-share text-center"></i> Shared: Not shared</p>
                                                <p style="margin-bottom: 0;"><i class="far fa-sun text-center"></i>  2 Hours</p>
                                                <p class=" font-lg">Warmly little before cousin sussex entire men set. Blessing it ladyship on sensible judgment settling outweigh. Worse linen an of civil jokes leave offer. Parties all clothes removal cheered calling prudent her. And residence for met the estimable disposing...</p>

                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-3 col-md-3 b_left">

                                            <div class="">

                                                <div class="trip-guide-sm-item clearfix">


                                                    <div class="content">
                                                        <h4 class="text-primary">Excellent <span  class="stars_rate btn-primary">5.0</span> </h4>
                                                        <div class="rating-item">
                                                            <span style="cursor: default;"> <input type="hidden" class="rating" data-filled="fa fa-star rating-rated" data-empty="fa fa-star-o" data-fractions="2" data-readonly="" value="4.5">
                                                                </div>



                                                                <div class="trip-by"><span class="text-primary font700 mb-1">Staring From</div>
                                                                <div class="price_off mr-10">5% OFF</div>
                                                                <div class="price pl-50">
                                                                    <span class="">39000</span>
                                                                    <sub> <strike class="text-muted">40000</strike> </sub> 
                                                                </div>
                                                                <div class="mt-20 ">
                                                                    <!--                                                                                <a href="view.html" class="btn btn-primary btn-sm">Book</a>-->
                                                                    <!--                                                                                <i class="fav_list active pl-20 font22 far fa-heart"></i>-->

                                                                </div>																							
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="itinerary-list-item">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-3 col-md-3">
                                                <div class="image">
                                                    <a href="<?php echo base_url()?>trip-view"><img src="<?php echo base_url()?>assets/images/itinerary/02.jpg" alt="images" /></a>
                                                </div><div class="mt-10">
                                                    <a href="#" class="btn btn-info btn-sm">Edit</a>
                                                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                                </div>
                                                <div class="trip-by pt-5"><a href="<?php echo base_url()?>trip-calendar-view"><span class="text-primary font22 font700 mb-1">15</span> Booking List</a></div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="content">
                                                    <!--															<div class="labeling"><span>Date</span> <span>12/2/2018 To 18/2/2018</span></div>-->
                                                    <h4><a href="<?php echo base_url()?>trip-view">Stil touring in Bangkok for one more day</a></h4>
                                                    <p style="margin-bottom: 0;"><i class="fa fa-map-marker text-center"></i> Goa <span class="mh-5 text-muted">|</span>Status: Open</p>
                                                    <p style="margin-bottom: 0;"><i class="fa fa-share text-center"></i> Shared: Not shared</p>
                                                    <p style="margin-bottom: 0;"><i class="far fa-sun text-center"></i> 2 Hours <span class="mh-5 text-muted">|</span><i class="far fa-moon text-center"></i> 14 Nights</p>
                                                    <p class=" font-lg">Warmly little before cousin sussex entire men set. Blessing it ladyship on sensible judgment settling outweigh. Worse linen an of civil jokes leave offer. Parties all clothes removal cheered calling prudent her. And residence for met the estimable disposing...</p>

                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-3 col-md-3 b_left">

                                                <div class="">

                                                    <div class="trip-guide-sm-item clearfix">


                                                        <div class="content">
                                                            <h4 class="text-primary">Excellent <span  class="stars_rate btn-primary">5.0</span> </h4>
                                                            <div class="rating-item">
                                                                <span style="cursor: default;"> <input type="hidden" class="rating" data-filled="fa fa-star rating-rated" data-empty="fa fa-star-o" data-fractions="2" data-readonly="" value="4.5">
                                                                    </div>



                                                                    <div class="trip-by"><span class="text-primary font700 mb-1">Staring From</div>
                                                                    <div class="price_off mr-10">5% OFF</div>
                                                                    <div class="price pl-50">
                                                                        <span class="">39000</span>
                                                                        <sub> <strike class="text-muted">40000</strike> </sub> 
                                                                    </div>
                                                                    <div class="mt-20 ">
                                                                        <a href="<?php echo base_url()?>trip-view" class="btn btn-primary btn-sm">Book</a>
<!--                                                                                    <i class="fav_list pl-20 font22 far fa-heart"></i>-->

                                                                    </div>																							
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="itinerary-list-item">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-3 col-md-3">
                                                    <div class="image">
                                                        <a href="<?php echo base_url()?>trip-view"><img src="<?php echo base_url()?>assets/images/itinerary/02.jpg" alt="images" /></a>
                                                    </div><div class="mt-10">
                                                        <a href="#" class="btn btn-info btn-sm">Edit</a>
                                                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                                    </div>
                                                    <div class="trip-by pt-5"><a href="<?php echo base_url()?>trip-calendar-view"><span class="text-primary font22 font700 mb-1">15</span> Booking List</a></div>
                                                </div>
                                                <div class="col-xs-12 col-sm-6 col-md-6">
                                                    <div class="content">
                                                        <!--															<div class="labeling"><span>Date</span> <span>12/2/2018 To 18/2/2018</span></div>-->
                                                        <h4><a href="<?php echo base_url()?>trip-view">Stil touring in Bangkok for one more day</a></h4>
                                                        <p style="margin-bottom: 0;"><i class="fa fa-map-marker text-center"></i> Goa <span class="mh-5 text-muted">|</span>Status: Open</p>
                                                        <p style="margin-bottom: 0;"><i class="fa fa-share text-center"></i> Shared: Not shared</p>
                                                        <p style="margin-bottom: 0;"><i class="far fa-sun text-center"></i> 14 Days <span class="mh-5 text-muted">|</span><i class="far fa-moon text-center"></i> 14 Nights</p>
                                                        <p class=" font-lg">Warmly little before cousin sussex entire men set. Blessing it ladyship on sensible judgment settling outweigh. Worse linen an of civil jokes leave offer. Parties all clothes removal cheered calling prudent her. And residence for met the estimable disposing...</p>

                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-3 col-md-3 b_left">

                                                    <div class="">

                                                        <div class="trip-guide-sm-item clearfix">


                                                            <div class="content">
                                                                <h4 class="text-primary">Excellent <span  class="stars_rate btn-primary">5.0</span> </h4>
                                                                <div class="rating-item">
                                                                    <span style="cursor: default;"> <input type="hidden" class="rating" data-filled="fa fa-star rating-rated" data-empty="fa fa-star-o" data-fractions="2" data-readonly="" value="4.5">
                                                                        </div>



                                                                        <div class="trip-by"><span class="text-primary font700 mb-1">Staring From</div>
                                                                        <div class="price_off mr-10">5% OFF</div>
                                                                        <div class="price pl-50">
                                                                            <span class="">39000</span>
                                                                            <sub> <strike class="text-muted">40000</strike> </sub> 
                                                                        </div>
                                                                        <div class="mt-20 ">
                                                                            <a href="<?php echo base_url()?>trip-view" class="btn btn-primary btn-sm">Book</a>
<!--                                                                                        <i class="fav_list pl-20 font22 far fa-heart"></i>-->

                                                                        </div>																							
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="itinerary-list-item">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                                        <div class="image">
                                                            <a href="<?php echo base_url()?>trip-view"><img src="<?php echo base_url()?>assets/images/itinerary/02.jpg" alt="images" /></a>
                                                        </div><div class="mt-10">
                                                            <a href="#" class="btn btn-info btn-sm">Edit</a>
                                                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                                        </div>
                                                        <div class="trip-by pt-5"><a href="<?php echo base_url()?>trip-calendar-view"><span class="text-primary font22 font700 mb-1">15</span> Booking List</a></div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                                        <div class="content">
                                                            <div class="labeling"><span>Date</span> <span>12/2/2018 To 18/2/2018</span></div>
                                                            <h4>Stil touring in Bangkok for one more day</h4>
                                                            <p style="margin-bottom: 0;"><i class="fa fa-map-marker text-center"></i> Goa <span class="mh-5 text-muted">|</span>Status: Open</p>
                                                            <p style="margin-bottom: 0;"><i class="fa fa-share text-center"></i> Shared: Not shared</p>
                                                            <p style="margin-bottom: 0;"><i class="far fa-sun text-center"></i> 14 Days <span class="mh-5 text-muted">|</span><i class="far fa-moon text-center"></i> 14 Nights</p>
                                                            <p class=" font-lg">Warmly little before cousin sussex entire men set. Blessing it ladyship on sensible judgment settling outweigh. Worse linen an of civil jokes leave offer. Parties all clothes removal cheered calling prudent her. And residence for met the estimable disposing...</p>

                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-3 col-md-3 b_left">

                                                        <div class="">

                                                            <div class="trip-guide-sm-item clearfix">


                                                                <div class="content">
                                                                    <h4 class="text-primary">Excellent <span  class="stars_rate btn-primary">5.0</span> </h4>
                                                                    <div class="rating-item">
                                                                        <span style="cursor: default;"> <input type="hidden" class="rating" data-filled="fa fa-star rating-rated" data-empty="fa fa-star-o" data-fractions="2" data-readonly="" value="4.5">
                                                                            </div>



                                                                            <div class="trip-by"><span class="text-primary font700 mb-1">Staring From</div>
                                                                            <!--													<div class="price_off mr-10">5% OFF</div>-->
                                                                            <div class="price pl-50">
                                                                                <span class="">39000</span>
                                                                                <sub> <strike class="text-muted"></strike> </sub> 
                                                                            </div>
                                                                            <div class="mt-20 ">
                                                                                <a href="<?php echo base_url()?>trip-view" class="btn btn-primary btn-sm">Book</a>
<!--                                                                                            <i class="fav_list pl-20 font22 far fa-heart"></i>-->

                                                                            </div>																								
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="pager-wrappper clearfix">

                                    <div class="pager-innner">

                                        <!-- <div class="clearfix">
                                                Showing reslut 1 to 15 from 248 
                                        </div> -->

                                        <div class="clearfix">
                                            <nav class="pager-center col-lg-12 text-right">
                                                <ul class="pagination ">
                                                    <li>
                                                        <a href="#" aria-label="Previous">
                                                            <span aria-hidden="true">&laquo;</span>
                                                        </a>
                                                    </li>
                                                    <li class="active"><a href="#">1</a></li>
                                                    <li><a href="#">2</a></li>
                                                    <li><a href="#">3</a></li>
                                                    <li><span>...</span></li>
                                                    <li><a href="#">11</a></li>
                                                    <li><a href="#">12</a></li>
                                                    <li><a href="#">13</a></li>
                                                    <li>
                                                        <a href="#" aria-label="Next">
                                                            <span aria-hidden="true">&raquo;</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- start Footer Wrapper -->

                    <?php $this->load->view('includes/footer') ?>
                
