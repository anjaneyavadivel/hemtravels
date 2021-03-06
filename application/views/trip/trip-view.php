<?php $this->load->view('includes/header')?>
<style>
    .single-month{
        left:920px!important;
    }
</style>
  <!-- start Main Wrapper -->
 
           <div class="main-wrapper scrollspy-container">

                <!-- start breadcrumb -->
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <!--<li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>-->
                    </ol>
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="breadcrumb-image-bg detail-breadcrumb" style="background-image:url('<?php echo base_url()?>assets/images/detail-header.jpg');">
                                <div class="container">

                                    <div class="page-title detail-header-02">

                                        <div class="row">

                                            <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">

                                                <h2 id="tripName"><?php echo isset($details['trip_name'])?$details['trip_name']:'';?></h2>
                                                <p style="margin-bottom: 0;">
                                                    <?php if(isset($pickups) && count($pickups) > 0 && isset($pickups[0]['location'])) {
                                                            echo '<i class="fa fa-map-marker text-primary"></i>  '.$pickups[0]['location'].'&nbsp;';
                                                    }?>
                                                </p>
                                                <?php if(isset($pickups) && count($pickups) > 0) {
                                                    echo '<ul class="list-with-icon list-inline-block" style="margin: 0px;">';
                                                    foreach($pickups as $k=>$v){
                                                        if($k != 0){
                                                            echo '<i class="fa fa-map-marker text-primary"></i>  '.$v['location'].'&nbsp;';
                                                        }
                                                    }
                                                    echo '</ul>';
                                                }?>
                                                <?php 
                                                    if(isset($details['trip_duration']) && $details['trip_duration'] == '2' && isset($details['how_many_days']) && isset($details['how_many_nights'])){
                                                        echo '<p style="margin-bottom: 0;"><i class="far fa-sun text-center"></i> '.$details['how_many_days'].' Days <span class="mh-5 text-muted">|</span><i class="far fa-moon text-center"></i> '.$details['how_many_nights'].' Nights</p> ';
                                                    }else if(isset($details['trip_duration']) && $details['trip_duration'] == '1' && isset($details['how_many_hours'])){
                                                         echo '<p style="margin-bottom: 0;"><i class="far fa-sun text-center"></i> '.$details['how_many_hours'].' Hours </p> ';
                                                    }
                                                ?>                                                
                                                <div class="rating-item rating-item-lg mb-25">
                                                    <input type="hidden" class="rating" data-filled="fa fa-star rating-rated" data-empty="fa fa-star-o" data-fractions="2" data-readonly value="<?php echo isset($details['total_rating'])?$details['total_rating']:0;?>"/>
                                                    <div class="rating-text"> <a href="#">(<?php echo $review_count; ?> reviews)</a></div>
                                                </div>
                                                <ul class="list-with-icon list-inline-block">
                                                    <li><i class="ion-android-done text-primary"></i>100% private</li>
                                                    <li><i class="ion-android-done text-primary"></i>Instantly confirmed</li>
                                                    <li><i class="ion-android-done text-primary"></i>Free cancellation</li>
                                                    <li><i class="ion-android-done text-primary"></i>Satisfaction guarantee</li>
                                                </ul>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="breadcrumb-wrapper text-left">

                                        <ol class="breadcrumb">
                                            <li><a href="<?php echo base_url()?>">Home</a></li>
                                            <li><a href="<?php echo base_url()?>trip-list">Trip List</a></li>
                                            <li class="active">View</li>
                                        </ol>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- end breadcrumb -->

                <div class="multiple-sticky pt-10 pb-10">

                    <div class="multiple-sticky-inner">

                        <div class="multiple-sticky-container container">

                            <div class="multiple-sticky-item clearfix">

                                <ul id="multiple-sticky-menu" class="multiple-sticky-menu clearfix">
                                    <li>
                                        <a href="#detail-content-sticky-nav-01">Overview</a>
                                    </li>                                    
                                    <li>
                                        <a href="#detail-content-sticky-nav-03">Itinerary</a>
                                    </li>
                                    <?php if(isset($galleries) && count(json_decode($galleries)) > 0) {?>
                                    <li>
                                        <a href="#detail-content-sticky-nav-02">Gallery</a>
                                    </li>
                                    <?php } ?>
                                    <li>
                                        <a href="#detail-content-sticky-nav-04">Condition</a>
                                    </li>
                                    <?php if(isset($all_reviews) && count($all_reviews) > 0) {?>
                                    <li>
                                        <a href="#detail-content-sticky-nav-05">Review</a>
                                    </li>
                                    <?php } ?>
                                    <?php if($this->session->userdata('user_type') == 'CU') {?>
                                    <span class="add_fav">
                                       <?php 
                                         $wishStyle = 'color:#bfbbb7!important';;
                                         $wishLabel = 'Add';
                                         
                                         $wishlistId = isset($wishlist->id)?$wishlist->id:0;
                                         
                                         if($wishlistId > 0){
                                            $wishStyle = '';
                                            $wishLabel = 'Remove';
                                         }
                                       ?>
                                        
                                        <a href="#" title="<?php echo $wishLabel;?> to wishlist" data-wish-id="<?php echo $wishlistId;?>" data-trip-id="<?php echo $details['id'];?>" id="addWishlist"><i class="fav_list  font22 add_fav fa fa-heart" style="<?php echo $wishStyle;?>"></i></a>
                                    </span>
                                    <?php } ?>
                                </ul>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="pt-50 pb-50">

                    <div class="container">

                        <div class="row">

                            <div class="col-xs-12 col-sm-12 col-md-8">

                                <div class="content-wrapper">

                                    <div id="detail-content-sticky-nav-01" >

                                        <div class="container">	

                                            <div class="row">

                                                <div class="col-xs-12 col-sm-8 col-md-8">

                                                    <div class="content-wrapper pr">

                                                        <h3 class="section-title">About this tour</h3>

                                                        <p class="lead"><?php echo isset($details['brief_description'])?  ucfirst(strtolower(html_entity_decode($details['brief_description']))):'';?></p>

                                                        <div class="bt mt-30 mb-30"></div>
                                                        <?php if(isset($galleries) && count(json_decode($galleries)) > 0) {?>
                                        <div id="detail-content-sticky-nav-02" >
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h3 class="section-title">Gallery</h3>

                                                    <div class="gallery-grid-equal-width-wrapper mb-50">
                                                            <div id="view_gallery"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" id="gallery_images" value='<?php echo $galleries;?>'>
                                        </div>
                                    <?php } ?>
                                                        <h3 class="font-lg mb-20">Trip detail</h3>

                                                        <ul class="featured-list-with-h mb-40">

                                                            <li>
                                                                <div class="row">
                                                                    <div class="col-xs-12 col-sm-6">
                                                                        <h5><i class="ti-location-pin text-primary mr-5"></i> Meeting point</h5>
                                                                    </div>
                                                                    <div class="col-xs-12 col-sm-6 mt-xs">
                                                                        <span class="pl-xs"><?php echo isset($details['meeting_point'])?$details['meeting_point']:'';?></span>
                                                                    </div>
                                                                </div>
                                                            </li>

                                                            <li>
                                                                <div class="row">
                                                                    <div class="col-xs-12 col-sm-6">
                                                                        <h5><i class="ti-timer text-primary mr-5"></i> Meeting time</h5>
                                                                    </div>
                                                                    <div class="col-xs-12 col-sm-6 mt-xs">
                                                                        <span class="pl-xs">
                                                                            <?php                                                                             
                                                                                if(isset($details['meeting_time']) && !empty($details['meeting_time'])){
                                                                                    echo date('h:i a', strtotime($details['meeting_time']));
                                                                                }
                                                                            ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </li>

                                                            <li>
                                                                <div class="row">
                                                                    <div class="col-xs-12 col-sm-6">
                                                                        <h5><i class="ti-user text-primary mr-5"></i> Minimum travellers</h5>
                                                                    </div>
                                                                    <div class="col-xs-12 col-sm-6 mt-xs">
                                                                        <span class="pl-xs"><?php echo isset($details['no_of_min_booktraveller'])?$details['no_of_min_booktraveller']:1;?></span>
                                                                    </div>
                                                                </div>
                                                            </li>

                                                            <li>
                                                                <div class="row">
                                                                    <div class="col-xs-12 col-sm-6">
                                                                        <h5><i class="ti-user text-primary mr-5"></i> Maximum travellers</h5>
                                                                    </div>
                                                                    <div class="col-xs-12 col-sm-6 mt-xs">
                                                                        <span class="pl-xs"><?php echo isset($details['no_of_max_booktraveller'])?$details['no_of_max_booktraveller']:'';?></span>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <?php if(isset($details['languages']) && !empty($details['languages'])) {?>
                                                            <li>
                                                                <div class="row">
                                                                    <div class="col-xs-12 col-sm-6">
                                                                        <h5><i class="ti-user text-primary mr-5"></i> Languages </h5>
                                                                    </div>
                                                                    <div class="col-xs-12 col-sm-6 mt-xs">
                                                                        <span class="pl-xs"><?php echo $details['languages']; ?></span>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <?php } ?>
                                                            <?php if(isset($details['meal']) && !empty($details['meal'])) {?>
                                                            <li>
                                                                <div class="row">
                                                                    <div class="col-xs-12 col-sm-6">
                                                                        <h5><i class="ti-user text-primary mr-5"></i> Meal </h5>
                                                                    </div>
                                                                    <div class="col-xs-12 col-sm-6 mt-xs">
                                                                        <span class="pl-xs"><?php echo $details['meal']; ?></span>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <?php } ?>                                                          

                                                        </ul>
                                                        
                                                        <?php if(isset($details['transport']) && !empty($details['transport'])) {?>                                                            
                                                            <div class="row">
                                                                <div class="col-xs-12 col-sm-12 mb-40">

                                                                    <h3 class="font-lg mb-20">Transport</h3>
                                                                    
                                                                    <span class="pl-xs"><?php echo ucfirst(strtolower(html_entity_decode($details['transport'])));?></span>                                                                    

                                                                </div>                                                                
                                                            </div>
                                                            
                                                        <?php } ?>
                                                        <?php if(isset($details['things_to_carry']) && !empty($details['things_to_carry'])) {?>                                                            
                                                                <div class="row">
                                                                    <div class="col-xs-12 col-sm-12 mb-40">

                                                                        <h3 class="font-lg mb-20">Things To Carry</h3>

                                                                        <span class="pl-xs"><?php echo ucfirst(strtolower(html_entity_decode($details['things_to_carry'])));?></span>                                                                    

                                                                    </div>                                                                
                                                                </div>                                                     
                                                        <?php } ?>
                                                        <?php if(isset($details['tour_type']) && !empty($details['tour_type'])) {?>                                                            
                                                                <div class="row">
                                                                    <div class="col-xs-12 col-sm-12 mb-40">

                                                                        <h3 class="font-lg mb-20">Tour Type</h3>

                                                                        <span class="pl-xs"><?php echo ucfirst(strtolower(html_entity_decode($details['tour_type'])));?></span>                                                                    

                                                                    </div>                                                                
                                                                </div>                                                            
                                                        <?php } ?>
                                                        
                                                        <?php if(isset($inclusions) && count($inclusions)> 0){ ?>

                                                        <div class="row">

                                                            <div class="col-xs-12 col-sm-12 mb-40">

                                                                <h3 class="font-lg mb-20">What it includes</h3>

                                                                <ul class="list-yes-no">
                                                                    <?php                                                                       
                                                                        foreach($inclusions as $v){
                                                                            echo '<li>'.$v.'</li>';
                                                                        }                                                                      
                                                                    ?>
                                                                </ul>

                                                            </div>   
                                                       
                                                        </div>
                                                        <?php } ?>
                                                        <?php if(isset($details['other_inclusions']) && !empty($details['other_inclusions'])) {?>
                                                            <div class="row">
                                                                <div class="col-xs-12 col-sm-12 mb-40">

                                                                <h3 class="font-lg mb-20">Other Inclusions</h3>

                                                                <ul class="list-yes-no">
                                                                    <?php echo ucfirst(strtolower(html_entity_decode($details['other_inclusions'])));?>
                                                                </ul>

                                                            </div>
                                                            </div>
                                                        <?php } ?>
                                                        <?php if(isset($details['exclusions']) && !empty($details['exclusions'])) {?>
                                                            <div class="row">
                                                                <div class="col-xs-12 col-sm-12 mb-40">

                                                                    <h3 class="font-lg mb-20">What it excluded</h3>

                                                                    <ul class="list-yes-no">
                                                                        <?php echo ucfirst(strtolower(html_entity_decode($details['exclusions'])));?>
                                                                    </ul>

                                                                </div>
                                                            </div>
                                                        <?php } ?>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php if(isset($itineraries) && count($itineraries) > 0){ ?>
                                    <div id="detail-content-sticky-nav-03">

                                        <h2 class="font-lg">Itinerary</h2>

                                        <div class="itinerary-toggle-wrapper mb-40">

                                            <div class="panel-group bootstrap-toggle">
                                                
                                                <?php 
                                                
                                                
                                                    $itiCnt = 1;
                                                    foreach($itineraries as $v){
                                                        echo '<div class="panel">
                                                                <div class="panel-heading">
                                                                    <div class="panel-title">
                                                                        <a data-toggle="collapse" data-parent="#" href="#bootstarp-toggle-one-'.$v['id'].'">
                                                                            <div class="itinerary-day">
                                                                                Day
                                                                                <span class="number">'.str_pad($itiCnt, 2, "0", STR_PAD_LEFT).'</span>
                                                                            </div>
                                                                            <div class="itinerary-header">
                                                                                <h4>'.$v['title'].'</h4>
                                                                                <p class="font-md">'.$v['short_description'].'</p>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div id="bootstarp-toggle-one-'.$v['id'].'" class="panel-collapse collapse">
                                                                    <div class="panel-body">
                                                                        '.$v['brief_description'].'
                                                                    </div>
                                                                </div>
                                                            </div>';
                                                        $itiCnt++;
                                                    }
                                                    
                                                ?>

                                            </div>

                                        </div>

                                        <div class="mb-25"></div>
                                        <div class="bb"></div>
                                        <div class="mb-25"></div>

                                    </div>     
                                    <?php } ?>
                                    
                                    
                                    
                                    <div id="detail-content-sticky-nav-04">

                                        <h2 class="font-lg">Condition</h2>

                                        <div class="text-box-h-bb-wrapper">
                                           
                                            <div class="text-box-h-bb">
                                                <div class="row">                                                    
                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <h4>Cancellation Policy</h4>
                                                        <p class="font-lg"><?php echo isset($details['cancellation_policy'])?ucfirst(strtolower(html_entity_decode($details['cancellation_policy']))):'';?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-box-h-bb">
                                                <div class="row">                                                    
                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <h4>Confirmation Policy</h4>
                                                        <p class="font-lg"><?php echo isset($details['confirmation_policy'])?ucfirst(strtolower(html_entity_decode($details['confirmation_policy']))):'';?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-box-h-bb">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <h4>Refund Policy</h4>
                                                        <p class="font-lg"><?php echo isset($details['refund_policy'])?ucfirst(strtolower(html_entity_decode($details['refund_policy']))):'';?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <div class="mb-25"></div>
                                        <div class="bb"></div>
                                        <div class="mb-25"></div>

                                    </div>

                                    <?php if((isset($all_reviews) && count($all_reviews) > 0) || ($this->session->userdata('user_type') == 'CU') || ($this->session->userdata('user_type') == 'GU')) {?>
                                    <div id="detail-content-sticky-nav-05">

                                        <h2 class="font-lg">Review</h2>

                                        <div class="review-wrapper">

                                            <div class="review-header">

                                                <div class="GridLex-gap-30">

                                                    <div class="GridLex-grid-noGutter-equalHeight GridLex-grid-middle">

                                                        <div class="GridLex-col-9_sm-8_xs-12_xss-12">

                                                            <div class="review-rating">
                                                                <div class="number"><?php echo $details['total_rating'];?></div>
                                                                <div class="rating-wrapper">
                                                                    <div class="rating-item rating-item-lg">
                                                                        <input type="hidden" class="rating" data-filled="fa fa-star rating-rated" data-empty="fa fa-star-o" data-fractions="2" data-readonly value="<?php echo $details['total_rating'];?>"/>
                                                                    </div>
                                                                    <?php echo $review_count; ?> reviews
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <?php if($this->session->userdata('user_type') != 'SA' && $this->session->userdata('user_type') != 'VA') {?>
                                                        <div class="GridLex-col-3_sm-4_xs-12_xss-12">

                                                            <div class="GridLex-inner">
                                                                <a href="#review-form" class="btn btn-primary btn-block anchor">Write a review</a>
                                                            </div>

                                                        </div>
                                                        <?php } ?>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="review-content">

                                                <ul class="review-list">
                                                    <?php foreach($all_reviews as $v) { ?>
                                                    <li class="clearfix">

                                                        <div class="row">

                                                            <div class="col-xs-12 col-sm-3 col-md-3">
                                                                <div class="review-header">
                                                                    <h6><?php echo $v['user_fullname']?></h6>
                                                                    <span class="review-date"><?php echo $v['review_date']?></span>

                                                                    <div class="rating-item">
                                                                        <input type="hidden" class="rating" data-filled="fa fa-star" data-empty="fa fa-star-o" data-fractions="2" data-readonly value="<?php echo $v['rating']?>"/>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-xs-12 col-sm-7 col-md-7">

                                                                <div class="review-content">

                                                                    <h4> <?php echo $v['name'];?></h4>
                                                                    <p> <?php echo $v['message'];?></p>

                                                                </div>         

                                                            </div>
                                                            <?php if($this->session->userdata('user_type') == 'SA' || $this->session->userdata('user_type') == 'VA') {?>
                                                            <div class="col-xs-12 col-sm-2 col-md-2" style="text-align: right;">
                                                                <a href="javascript:;"  class="remove_review" title="Remove this review" data-trip-id="<?php echo $details['id']; ?>" data-id="<?php echo $v['id']; ?>"><i class="fa fa-trash-o"></i></a>
                                                            </div>
                                                             <?php } ?>
                                                        </div>

                                                    </li>
                                                    <?php } ?>
                                                </ul>                

                                            </div>
                                            <?php if($this->session->userdata('user_type') != 'SA' && $this->session->userdata('user_type') != 'VA') {?>
                                            <div id="review-form" class="review-form">

                                                <h3 class="review-form-title">Leave Your Review</h3>

                                                <?php echo form_open_multipart(base_url() . 'trips/review_action', array('class' => '', 'id' => 'review_form')); ?>

                                                    <div class="row">

                                                        <div class="col-xs-12 col-sm-6 col-md-4">

                                                            <div class="form-group">
                                                                <label>Your name: </label>
                                                                <input type="text" class="form-control" name="user_name" />
                                                            </div>

                                                        </div>
                                                        <?php if($this->session->userdata('user_type') != 'CU') { ?>
                                                        <div class="col-xs-12 col-sm-6 col-md-4">

                                                            <div class="form-group">
                                                                <label>Your email address: </label>
                                                                <input type="email" class="form-control" name="email" />
                                                            </div>

                                                        </div>
                                                        <?php } ?>

                                                        <div class="col-xs-12 col-sm-6 col-md-4">

                                                            <div class="form-group">
                                                                <label>Your rating: </label>
                                                                <div class="rating-wrapper mt-5">
                                                                    <div class="rating-item">
                                                                        <input type="hidden" name="rating" class="rating-label" data-filled="fa fa-star" data-empty="fa fa-star-o" data-fractions="2" value="0" />
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="clear"></div>

                                                        <div class="col-sm-12 col-md-12">

                                                            <div class="form-group">
                                                                <label>Your Message: </label>
                                                                <textarea class="form-control form-control-sm" rows="5" name="message"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="clear mb-5"></div>

                                                        <div class="col-sm-12 col-md-8">
                                                            <input type="hidden" name="trip_id" value="<?php  echo isset($details['id'])?$details['id']:0;?>"> 
                                                            <input type="hidden" name="trip_code" value="<?php  echo isset($details['trip_code'])?$details['trip_code']:'';?>"> 
                                                            <input type="submit" class="btn btn-primary btn-lg"  value="Submit">                                                            
                                                        </div>

                                                    </div>

                                                <?php echo form_close()?>

                                            </div>
                                            <?php } ?>
                                        </div>

                                    </div>
                                    <?php } ?>
                                </div>

                            </div>
                            
                            
                                <div id="sidebar-sticky" class="col-xs-12 col-sm-12 col-md-4 sticky-mt-70 sticky-mb-0">
                                    
                                    <aside class="sidebar-wrapper with-box-shadow">
                                        
                                        <div class="sidebar-booking-box">

                                            <div class="sidebar-booking-header bg-primary clearfix">
                                                <?php echo isset($details['trip_name'])?$details['trip_name']:'';?>
<!--                                                <div class="price">
                                                    <?php //echo isset($details['meeting_point'])?$details['meeting_point']:'';?>
                                                </div>-->

                                                <div>
                                                </div>

                                            </div>

                                            <div class="sidebar-booking-inner">
                                                <?php echo form_open_multipart('#', array('class' => 'trip-view', 'id' => 'trip_booking')); ?>
                                                    <div class="row gap-10" id="rangeDatePicker">

                                                        <div class="col-xss-12 col-xs-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label>Choose your date</label>
                                                                <input autocomplete="off" type="text" id="rangeDatePickerFrom" name="booking_from_time" class="form-control" placeholder="M D, YYYY" />
                                                            </div>
                                                        </div>
                                                        <?php /*if(isset($details['trip_duration']) && $details['trip_duration'] == '2') { ?>
                                                        <div class="col-xss-12 col-xs-6 col-sm-6">
                                                            <div class="form-group">
                                                                <label>To</label>
                                                                <input type="text" id="rangeDatePickerTo" name="booking_to_time" class="form-control" placeholder="M D, YYYY" />
                                                            </div>
                                                        </div>
                                                        <?php }*/ ?>
                                                    </div>

                                                    <div class="row gap-20">

                                                        <div class="col-xss-12 col-xs-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label>No. of Adult (Rs: <?php echo $details['price_to_adult'];?>)</label>
                                                                <div class="form-group form-spin-group">
                                                                    <input type="text" class="form-control form-spin no_of_adult" name="no_of_adult" value="0" /> 
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-xss-12 col-xs-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label>No. of Children (Rs: <?php echo $details['price_to_child'];?>)</label>
                                                                <div class="form-group form-spin-group">
                                                                    <input type="text" class="form-control form-spin no_of_children" name="no_of_children" value="0"/> 
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-xss-12 col-xs-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label>No. of Infan (Rs: <?php echo $details['price_to_infan'];?>)</label>
                                                                <div class="form-group form-spin-group">
                                                                    <input type="text" class="form-control form-spin no_of_infan" name="no_of_infan" value="0" /> 
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12 col-md-12">

                                                            <div class="form-group">
                                                                <label>Choose your Location</label>
                                                                <select class="selectpicker show-tick form-control" id="location" name="location" data-live-search="false">
                                                                    <option value="">Select</option>
                                                                    <?php 
                                                                     if(isset($pickups) && count($pickups) > 0){
                                                                        foreach ($pickups as $v){
                                                                            $time = date("g:i a", strtotime($v['time'].':00'));
                                                                            echo '<option value="'.$v['id'].'">'.$v['location'].' at '.$time.'</option>';
                                                                        }
                                                                     }

                                                                    ?>
                                                                </select>
                                                            </div>

                                                        </div>

                                                        <div class="col-xss-12 col-xs-12 col-sm-12">
                                                            <div class="book_traveller_missing" style="display:none;">
                                                                <p style="text-align:center;color:red">No of Adult | No of Children | No of Infan should be greater than zero</p>
                                                            </div>
                                                            <div class="mt-5">
                                                                <a href="javascript:;" class="btn btn-primary btn-block request_book">Request to Book</a>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="mt-10 text-center">
                                                        <p class="font-md text-muted font500 spacing-2">You won't yet be charged</p>
                                                    </div>
                                                    <input type="hidden" id="availableDays" value='<?php echo isset($available_days)?json_encode($available_days):"";?>'>
                                                    <input type="hidden" id="cutoff_disable_days" value='<?php echo isset($cutoff_disable_days)?$cutoff_disable_days:"";?>'>
                                                    <input type="hidden" id="disable_enable_days" value='<?php echo isset($disable_date_enable)?$disable_date_enable:"";?>'>
                                                    <input type="hidden" id="cutoff_max_month" value='<?php echo isset($cutoff_max_month)?$cutoff_max_month:"";?>'>
                                                    <input type="hidden" id="tripCode" value='<?php echo isset($details['trip_code']) ?$details['trip_code']:''; ;?>'>
                                                <?php echo form_close()?>
                                            </div>

                                        </div>
                                        
                                        <?php if($this->session->userdata('user_type') == 'VA' && isset($details['trip_shared_id']) && $details['trip_shared_id'] >0 && isset($shared_details) && count($shared_details) > 0) { ?>
                                        <div class="list-yes-no-box">
                                            <ul>
                                                <li><b>Shared Status:</b> Shared</li>
                                                <li><b>Shared Trip:</b> <?php echo isset($shared_details['trip_name'])?$shared_details['trip_name']:'';?></li>
                                                <li><b>Shared by:</b> <?php echo isset($shared_details['user_fullname'])?$shared_details['user_fullname']:'';?></li>
                                                <?php if(isset($shared_details['to_user_mail']) && !empty($shared_details['to_user_mail'])) { ?>
                                                <li><b>Shared Email:</b> <?php echo $shared_details['to_user_mail'];?></li>
                                                <?php } ?><!--<li><b>Shared Phone:</b> 999999999</li>-->
                                            </ul>
                                        </div>
                                        <?php } ?>
                                    </aside>

                                </div>
                            
                        </div>

                    </div>

                </div>

                <div class="multiple-sticky no-border hidden-sm hidden-xs">&#032;</div> <!-- is used to stop the above stick menu -->

                <?php if(isset($related_tours) && count($related_tours) > 0) { ?>
                <div class="bg-light pt-50 pb-70">

                    <div class="container">

                        <h2 class="font-lg">Related tours</h2>

                        <div class="trip-guide-wrapper">

                            <div class="GridLex-gap-20 GridLex-gap-10-mdd GridLex-gap-5-xs">

                                <div class="GridLex-grid-noGutter-equalHeight GridLex-grid-center">
                                    
                                    <?php 
                                        foreach($related_tours as $v) {
                                            
                                             $image = base_url().'assets-customs/img/no_image_found.png';
                                            if(isset($v['trip_img_name']) && !empty($v['trip_img_name'])){
                                              $image =  base_url().'assets-customs/gallery_images/'.$v['trip_img_name'];  
                                            }
                                        
                                            $duration = '<p style=""><i class="far fa-sun text-center"></i> '.$v['how_many_days'].' Days <span class="mh-5 text-muted">|</span><i class="far fa-moon text-center"></i> '.$v['how_many_nights'].' Nights</p>';
                                            if(isset($details['trip_duration']) && $details['trip_duration'] == '1' && isset($details['how_many_hours'])){
                                                $duration = '<p style=""><i class="far fa-sun text-center"></i> '.$v['how_many_hours'].' Days</p>';
                                            }
                                            
                                            
                                            //OFFER DETAILS
                                            $price = $v['offer_details']['price_to_child'] > 0 ?$v['offer_details']['price_to_child']:$v['offer_details']['price_to_adult'];
                                            $offer_details = '<div class="col-xs-6 col-sm-6"><div class="price">'.$price.'</div></div>';
                                                                  
                                            if((isset($v['offer_details']['discount_percentage']) && $v['offer_details']['discount_percentage'] > 0)
                                            || (isset($v['offer_details']['discount_price']) && $v['offer_details']['discount_price'] > 0)){
                                                $fin_price = $v['offer_details']['final_price_to_child'] > 0 ?$v['offer_details']['final_price_to_child']:$v['offer_details']['final_price_to_adult'];

                                                $offer_details = '<div class="col-xs-6 col-sm-6"><div class="price_off mr-10">'.$v['offer_details']['discount_price'].' OFF</div>';
                                                if(isset($v['offer_details']['discount_percentage']) && $v['offer_details']['discount_percentage'] > 0){
                                                    $offer_details = '<div class="col-xs-6 col-sm-6"><div class="price_off mr-10">'.$v['offer_details']['discount_percentage'].'% OFF</div>';
                                                }

                                                $offer_details .= '<div class="price pl-50">'.
                                                     '<span class="">'.$fin_price.'</span>'.
                                                     '<sub> <strike class="text-muted">'.$price.'</strike> </sub>'.
                                                 '</div></div>';
                                            }                                           
                                            
                                            
                                         echo '<div class="GridLex-col-3_mdd-4_sm-6_xs-6_xss-12 listview">

                                            <div class="trip-guide-item no-person">

                                                <div class="trip-guide-image">
                                                    <img src="'.$image.'" alt="'.$v['trip_name'].'" />
                                                </div>

                                                <div class="trip-guide-content">
                                                    <h3>'.$v['trip_name'].'</h3>
                                                    <p style="margin-bottom: 0;"><i class="fa fa-map-marker text-center"></i> '.$v['meeting_point'].'</p>
                                                    '.$duration.'
                                                    <!--<p style="margin-bottom: 0;overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 4;-webkit-box-orient: vertical;">'.html_entity_decode($v['brief_description']).'</p>-->
                                                </div>

                                                <div class="trip-guide-bottom bg-light-primary bt">

                                                    <div class="trip-guide-meta row gap-10">
                                                        '.$offer_details.'
                                                        <div class="col-xs-6 col-sm-6 text-right">
                                                            <a href="'.base_url('trip-view/'.$v['trip_code']).'" class="btn btn-primary btn-sm">Book</a>

                                                        </div>

                                                    </div>



                                                </div>

                                            </div>

                                        </div>';
                                        }
                                    ?>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>
                <?php } ?>
            </div>
		<!-- start Footer Wrapper -->
		
		<?php $this->load->view('includes/footer')?>
                
	