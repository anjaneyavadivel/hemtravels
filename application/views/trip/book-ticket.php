<?php $this->load->view('includes/header')?>
  <!-- start Main Wrapper -->
 <div class="main-wrapper scrollspy-container">
     <style>input[type='checkbox'] {
     opacity: 1; 
     display: inline; 
    float: left;
    width: 18px;
}</style>
        <!-- start Breadcrumb -->

        <div class="breadcrumb-wrapper">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url()?>">Home</a></li>
                    <li><a href="<?php echo base_url()?>trip-list">Trip List</a></li>
                    <li><a href="<?php echo base_url().'trip-view/'.$details['trip_code']?>">Trip View</a></li>
                    <li class="active">Payment Summary</li>
                </ol>
            </div>
        </div>

        <!-- end Breadcrumb -->

        <div class="user-profile-wrapper">

            <div class="payment-header">

                <div class="container">

                    <div class="content">

                        <div class="trip-list-item no-border">
                            <div class="image-absolute">
                                <div class="image image-object-fit image-object-fit-cover">
                                    <?php 
                                        $image = base_url().'assets-customs/img/no_image_found.png';
                                        if(isset($details['trip_img_name']) && !empty($details['trip_img_name'])){
                                          $image =  base_url().'assets-customs/gallery_images/'.$details['trip_img_name'];  
                                        }
                                        echo '<img src="'.$image.'" alt="'.$details['trip_name'].'" >';
                                    ?>
                                    
                                    
                                </div>
                            </div>
                            <div class="content">

                                <div class="GridLex-gap-20 mb-5">

                                    <div class="GridLex-grid-noGutter-equalHeight GridLex-grid-middle">

                                        <div class="GridLex-col-6_sm-12_xs-12_xss-12">

                                            <div class="GridLex-inner">
                                                <h6><a href="javascript:;"><?php echo isset($details['trip_name'])?$details['trip_name']:'';?></a></h6>
                                                <?php 
                                                    if(isset($details['trip_duration']) && $details['trip_duration'] == '2' && isset($details['how_many_days']) && isset($details['how_many_nights'])){
                                                        echo '<span class="font-italic font14">'.$details['how_many_days'].' days '.$details['how_many_nights'].' nights</span>';
                                                    }else if(isset($details['trip_duration']) && $details['trip_duration'] == '1' && isset($details['how_many_hours'])){
                                                        echo '<span class="font-italic font14">'.$details['how_many_hours'].' hours </span>';                                                         
                                                    }
                                                ?> 
                                            </div>

                                        </div>

                                        <div class="GridLex-col-3_sm-6_xs-7_xss-12">
                                            <div class="GridLex-inner line-1 font14 text-center text-left-sm text-muted spacing-1">
                                                <div class="rating-item rating-item-lg  mt-10-xs">
                                                    <input type="hidden" class="rating" data-filled="fa fa-star rating-rated" data-empty="fa fa-star-o" data-fractions="2" data-readonly value="<?php echo isset($details['total_rating'])?$details['total_rating']:0;?>"/>
                                                    <div class="rating-text">Based on <a href="#"><?php echo $review_count; ?> reviews</a></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="GridLex-col-3_sm-6_xs-5_xss-12">
                                            <div class="GridLex-inner text-right text-left-xss">
                                                <a href="<?php echo base_url().'trip-view/'.$details['trip_code']?>" class="btn btn-primary btn-sm btn-block mt-15-xs"><i class="ion-arrow-left-c"></i> Back to detail</a>
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
<!--        <div class=" col-sm-12 pt-30 pb-30 text-center">
                        <div class="col-xs-4 col-sm-4 col-lg-4 p-0 ">
                                <i class="fa fa-check active_book" aria-hidden="true"></i> 
                            <span class="progressline"> </span>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-lg-4 p-0">
                                <i class="fa fa-check active_book " aria-hidden="true"></i> 
                            <span class="progressline"> </span>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-lg-4 p-0">
                                <i class="fa fa-check inactive_book " aria-hidden="true"></i> 

                        </div>

                    </div>-->

        <div class="pt-30 pb-50">

            <div class="container">

                <div class="row">

                    <div  class="col-xs-12 col-sm-12 col-md-4 sticky-mt-70 sticky-mb-0">

                                                <aside class="sidebar-wrapper with-box-shadow">

                                                        <div class="sidebar-booking-box">

                                                            <div class="sidebar-booking-header bg-primary pt-20  clearfix">

                                                                <h3 class="text-white text-uppercase spacing-3 mb-0 line-1"><?php echo isset($details['meeting_point'])?$details['meeting_point']:'';?></h3>

                                                            </div>
                                                            
                                                            <div class="sidebar-booking-inner">
                                                                <?php echo form_open_multipart('#', array('class' => 'trip-book', 'id' => 'trip_booking')); ?>
                                                                    <div class="row gap-10" id="rangeDatePicker">

                                                                        <div class="col-xss-12 col-xs-12 col-sm-12">
                                                                        <div class="form-group">
                                                                            <label>Choose your date</label>
                                                                                <input type="text" id="rangeDatePickerFrom" name="booking_from_time" class="form-control" placeholder="M D, YYYY" value="<?php echo isset($from_date)?$from_date:''?>" />
                                                                            </div>
                                                                        </div>
                                                                        <?php /*if(isset($details['trip_duration']) && $details['trip_duration'] == '2') { ?>
                                                                        <div class="col-xss-12 col-xs-6 col-sm-6">
                                                                            <div class="form-group">
                                                                                <label>To</label>
                                                                                <input type="text" id="rangeDatePickerTo" name="booking_to_time" class="form-control" placeholder="M D, YYYY" value="<?php echo isset($to_date)?$to_date:''?>"/>
                                                                            </div>
                                                                        </div>
                                                                        <?php }*/ ?>
                                                                    </div>

                                                                    <div class="row gap-20">

                                                                        <div class="col-xss-12 col-xs-12 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label>No. of Adult</label>
                                                                                <div class="form-group form-spin-group">
                                                                                    <input type="text" class="form-control form-spin no_of_adult" name="no_of_adult" value="<?php echo isset($no_of_adult)?$no_of_adult:0?>" /> 
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-xss-12 col-xs-12 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label>No. of Children</label>
                                                                                <div class="form-group form-spin-group">
                                                                                    <input type="text" class="form-control form-spin no_of_children" name="no_of_children" value="<?php echo isset($no_of_children)?$no_of_children:0?>"/> 
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-xss-12 col-xs-12 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label>No. of Infan</label>
                                                                                <div class="form-group form-spin-group">
                                                                                    <input type="text" class="form-control form-spin no_of_infan" name="no_of_infan" value="<?php echo isset($no_of_infan)?$no_of_infan:0?>" /> 
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
                                                                                            $selected = '';
                                                                                            $time = date("g:i a", strtotime($v['time'].':00'));
                                                                                            
                                                                                            if(isset($location) && $location == $v['id']){
                                                                                                $selected = 'selected';
                                                                                            }
                                                                                            
                                                                                             echo '<option value="'.$v['id'].'" '.$selected.'>'.$v['location'].' at '.$time.'</option>';
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
                                                                                <a href="javascript:;" class="btn btn-primary btn-block request_book">Update Change</a>
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                    <div class="mt-10 text-center">
                                                                        <p class="font-md text-muted font500 spacing-2">You won't yet be charged</p>
                                                                    </div>
                                                                    <input type="hidden" id="availableDays" value='<?php echo isset($available_days)?json_encode($available_days):"";?>'>
                                                                    <input type="hidden" id="cutoff_disable_days" value='<?php echo isset($cutoff_disable_days)?$cutoff_disable_days:"";?>'>
                                                                    <input type="hidden" id="cutoff_max_month" value='<?php echo isset($cutoff_max_month)?$cutoff_max_month:"";?>'>
                                                                    <input type="hidden" id="tripCode" value='<?php echo isset($details['trip_code']) ?$details['trip_code']:''; ;?>'>
                                                                <?php echo form_close()?>
                                                            </div>
                                                                
                                                        </div>


                                                </aside>

                                        </div>

                    <div class="col-xs-12 col-sm-6 col-md-8  sticky-mt-30 mt-50-sm">

                        <aside class="sidebar-wrapper with-box-shadow">

                            <div class="sidebar-booking-box">

                                <div class="sidebar-booking-header pt-20 pb-15 clearfix">

                                    <h3 class="text-white text-uppercase spacing-3 mb-0 line-1">Trip Summary</h3>

                                </div>

                                <div class="sidebar-booking-inner"> 

                                    <?php  
                                    if(isset($offer_details['is_open']) && $offer_details['is_open'] == 1 && ($offer_details['availabletraveller'] < $total_traveller || $offer_details['no_of_min_booktraveller'] > $total_traveller || $offer_details['no_of_max_booktraveller'] < $total_traveller)){
                                        echo "<div style='text-align:center'>Sorry! You can book total number of traveller Min ".$offer_details['no_of_min_booktraveller']." to Max ".$offer_details['no_of_max_booktraveller']. "  and available booking ".$offer_details['availabletraveller']."</div>";
                                    }else if(isset($offer_details['availabletraveller']) && $offer_details['availabletraveller'] >= $total_traveller && $offer_details['is_open'] == 1) {?>
                                    <ul class="price-summary-list">                                      
                                        
                                        <li>
                                            <div class="col-xs-6 col-sm-6 col-md-6 no-padding mb-5">
                                                <p><strong>Meeting Point:</strong> <span class="text-muted"><?php echo isset($details['meeting_point'])?$details['meeting_point']:'';?></span></p>
                                            </div>
                                              <div class="col-xs-6 col-sm-6 col-md-6 no-padding mb-5">
                                                <p><strong>Meeting Time:</strong> <span class="text-muted"><?php if(isset($details['meeting_time']) && !empty($details['meeting_time'])){
                                                    echo date('h:i a', strtotime($details['meeting_time']));
                                                }?></span></p>
                                            </div>
                                          
                                        </li>
                                        <li>
                                            <div class="col-xs-6 col-sm-6 col-md-6 no-padding mb-5">
                                                <p><strong>From Date:</strong> <span class="text-muted"><?php echo isset($from_date)?$from_date:''?></span></p>
                                            </div>
                                              <div class="col-xs-6 col-sm-6 col-md-6 no-padding mb-5">
                                                  <?php $add_days = isset($details['how_many_days'])?$details['how_many_days']:0;
                                                  $to_date = date("M d, Y", strtotime("+".$add_days." days", strtotime($from_date)));
                                                  ?>
                                                <p><strong>To Date:</strong> <span class="text-muted"><?php echo isset($to_date)?$to_date:''?></span></p>
                                            </div>
                                          
                                        </li>
                                        <li>
                                            <div class="col-xs-12 col-sm-12 col-md-12 no-padding mb-5">
                                                <p><strong>Travellers:</strong> <span class="text-muted"><?php
                                                $travellers = '';
                                                if(isset($no_of_adult)) {
                                                    $travellers = $no_of_adult.' adults, '; 
                                                }
                                                if(isset($no_of_children)) {
                                                    $travellers .= $no_of_children.' childrens, '; 
                                                }
                                                if(isset($no_of_infan)) {
                                                    $travellers .= $no_of_infan.' infans '; 
                                                }
                                                echo $travellers;
                                            ?></span></p>
                                            </div>
                                          
                                        </li>
<!--                                        <li>
                                            <h6>Meeting point</h6>
                                            <p class="text-muted"><?php echo isset($details['meeting_point'])?$details['meeting_point']:'';?></p>
                                        </li>

                                        <li>
                                            <h6>Meeting time</h6>
                                            <p class="text-muted"><?php                                                                             
                                                if(isset($details['meeting_time']) && !empty($details['meeting_time'])){
                                                    echo date('h:i a', strtotime($details['meeting_time']));
                                                }
                                            ?></p>
                                        </li>-->

<!--                                        <li>
                                            <h6>Travellers</h6>
                                            <?php
                                                $travellers = '';
                                                if(isset($no_of_adult)) {
                                                    $travellers = $no_of_adult.' adults, '; 
                                                }
                                                if(isset($no_of_children)) {
                                                    $travellers .= $no_of_children.' childrens, '; 
                                                }
                                                if(isset($no_of_infan)) {
                                                    $travellers .= $no_of_infan.' infans '; 
                                                }
                                                echo '<p class="text-muted">'.$travellers.'</p>';
                                            ?>
                                            
                                        </li>-->

                                        <li class="divider"></li>

                                        <li>
                                            
                                            <?php 
                                                $adultPrice     = $no_of_adult    * $offer_details['price_to_adult'];
                                                $childrenPrice  = $no_of_children * $offer_details['price_to_child'];
                                                $infanPrice     = $no_of_infan    * $offer_details['price_to_infan'];
                                                $number_of_persons = (int)$no_of_adult + (int)$no_of_children + (int)$no_of_infan;
                                                $subtotal = (int)$adultPrice + (int)$childrenPrice + (int)$infanPrice;
                                                $adultDisPrice = 0;$childDisPrice =0;$infanDisPrice=0;$disLabel='';
                                                $discount_price = 0;
                                                if($offer_details['discount_price'] > 0){
                                                    $discount_price = (int)$offer_details['discount_price'] * (int)$number_of_persons;
                                                    $disLabel = '('.$offer_details['coupon_code'].' - '.$offer_details['coupon_name'].')';
                                                }else if($offer_details['discount_percentage'] > 0){
                                                    $discount_price = ((int)$offer_details['discount_percentage']/100) * (int)$subtotal;
                                                    $disLabel = '('.$offer_details['coupon_code'].' - '.$offer_details['coupon_name'].')';
                                                }
                                                $total_price1 = $subtotal - $discount_price;
                                                
                                                $gstPrice = 0;
                                                if($offer_details['gst_percentage'] > 0){
                                                    $gstPrice    = ((int) $total_price1 * ((int) $offer_details['gst_percentage'] / 100));
                                                }
                                                $total_price = (int)$total_price1 + $gstPrice;
                                               
                                                $roundoff = 0;
                                                $roundoff = round($total_price) - $total_price;
                                                $total_price = round($total_price);
                                            ?>
                                            <!--<h6 class="heading mt-20 mb-5 text-primary uppercase">Price per person</h6>-->
                                            <?php if(isset($no_of_adult) && $no_of_adult > 0) { ?>
                                            <div class="row gap-10 mt-10">
                                                <div class="col-xs-7 col-sm-7">
                                                    Adult Price ( <?php echo $no_of_adult.' * '.$offer_details['price_to_adult']; ?> )
                                                </div>
                                                <div class="col-xs-5 col-sm-5 text-right">
                                                    &#8377; <?php echo number_format($adultPrice,2); ?>
                                                </div>
                                            </div>
                                            <?php } ?>
                                            <?php if(isset($no_of_children) && $no_of_children > 0){ ?>
                                            <div class="row gap-10 mt-10">
                                                <div class="col-xs-7 col-sm-7">
                                                    Children Price ( <?php echo $no_of_children.' * '.$offer_details['price_to_child']; ?> )
                                                </div>
                                                <div class="col-xs-5 col-sm-5 text-right">
                                                    &#8377; <?php echo number_format($childrenPrice,2); ?>
                                                </div>
                                            </div>
                                            <?php } ?>
                                            <?php if(isset($no_of_infan) && $no_of_infan > 0){ ?>
                                            <div class="row gap-10 mt-10">
                                                <div class="col-xs-7 col-sm-7">
                                                    Infan Price ( <?php echo $no_of_infan.' * '.$offer_details['price_to_infan']; ?> )
                                                </div>
                                                <div class="col-xs-5 col-sm-5 text-right">
                                                    &#8377; <?php echo number_format($infanPrice,2); ?>
                                                </div>
                                            </div>
                                            <?php } ?>
                                            <?php if(isset($discount_price) && $discount_price > 0){ ?>
                                            <div class="row gap-10 mt-10">
                                                <div class="col-xs-7 col-sm-7">
                                                    Discount <?php echo $disLabel;?>
                                                </div>
                                                <div class="col-xs-5 col-sm-5 text-right">
                                                    (-) &#8377; <?php echo number_format($discount_price,2); ?>
                                                </div>
                                            </div>
                                            <?php } ?>
                                            <?php if(isset($offer_details['gst_percentage']) && $offer_details['gst_percentage'] > 0){ ?>
                                            <div class="row gap-10 mt-10">
                                                <div class="col-xs-7 col-sm-7">
                                                    GST (<?php echo $offer_details['gst_percentage'].'%';?>)
                                                </div>
                                                <div class="col-xs-5 col-sm-5 text-right">
                                                   (+) &#8377; <?php echo number_format($gstPrice,2); ?>
                                                </div>
                                            </div>
                                            <?php } ?>
                                            <?php if(isset($roundoff) && $roundoff > 0){ ?>
                                            <div class="row gap-10 mt-10">
                                                <div class="col-xs-7 col-sm-7">
                                                    Round off 
                                                </div>
                                                <div class="col-xs-5 col-sm-5 text-right">
                                                   (+) &#8377; <?php echo number_format($roundoff,2); ?>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </li>

                                        <li class="divider"></li>

                                        <li>
                                            <div class="row gap-10 mt-10">
                                                <div class="col-xs-7 col-sm-7">
                                                    <span class="font600">Total Price </span>
                                                </div>
                                                <div class="col-xs-5 col-sm-5 text-right">
                                                    
                                                    <span class="font600 font26 block text-primary mt-5"><?php echo number_format($total_price,2); ?></span>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="divider"></li>
                                        
                                        <li>
                                            <div class="row gap-20">
                                                         <?php if ($this->session->userdata('user_id') == '') {?>
                                    <div class="col-sm-6 col-md-6">
                                        <button class="btn btn-facebook btn-block mb-5-xs">Register with Facebook</button>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <a  href="<?php echo base_url('gmail'); ?>" class="btn btn-google-plus btn-block">Register with Google+</a>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="login-modal-or">
                                            <div><span>or</span></div>
                                        </div>
                                                         </div> <?php }?>
                                    <?php echo form_open_multipart('#', array('class' => 'trip-proceed', 'id' => 'trip_proceed')); 
                                    if($this->session->userdata('user_type')=='VA'){ $user_fullname=''; }
                                    if($this->session->userdata('user_type')=='VA'){ $user_email=''; }
                                    if($this->session->userdata('user_type')=='VA'){ $user_phone=''; }
                                    
                                    $user_name_label = 'Your Name';
                                    $user_email_label = 'Your Email';
                                    $user_phone_label = 'Your Phoneno';
                                    if($this->session->userdata('user_type')=='SA' || $this->session->userdata('user_type')=='VA'){ $user_name_label='Customer Name'; }
                                    if($this->session->userdata('user_type')=='SA' || $this->session->userdata('user_type')=='VA'){ $user_email_label='Customer Email'; }
                                    if($this->session->userdata('user_type')=='SA' || $this->session->userdata('user_type')=='VA'){ $user_phone_label='Customer Phoneno'; }
                                    
                                    
                                    ?>
                                                        
                                    <div class="col-sm-12 col-md-4">

                                        <div class="form-group"> 
                                            <label><?php echo $user_name_label; ?></label>
                                            <input class="form-control" placeholder="Enter <?php echo $user_name_label; ?>" name="user_name" id="user_name" type="text" value="<?php echo isset($user_fullname)?$user_fullname:'';?>"> 
                                        </div>

                                    </div>

                                    <div class="col-sm-12 col-md-4">

                                        <div class="form-group"> 
                                            <label><?php echo $user_email_label; ?></label>
                                            <input class="form-control" placeholder="Enter <?php echo $user_email_label; ?>" name="email" id="email" type="text" value="<?php echo isset($user_email)?$user_email:'';?>"> 
                                        </div>

                                    </div>

                                    <div class="col-sm-12 col-md-4">

                                        <div class="form-group"> 
                                            <label><?php echo $user_phone_label; ?></label>
                                            <input class="form-control" placeholder="Enter <?php echo $user_phone_label; ?>" name="phonenumber" id="phonenumber" type="text" value="<?php echo isset($user_phone)?$user_phone:'';?>"> 
                                        </div>

                                    </div>

                                   <input type="hidden" id="tripId" value="<?php echo isset($details['id'])?$details['id']:0?>">                  
                                    <?php echo form_close()?>                    
                                   <?php if ($this->session->userdata('user_id') == '') {?>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="login-box-box-action">
                                            Already have account? <a data-toggle="modal" href="#loginModal">Log-in</a>
                                        </div>
                                    </div>                  
                                   <?php }?>

                                </div>
                                        </li>
                                        <li>
                                        <?php $topay = $total_price;$balance =0;
                                        if ($this->session->userdata('user_type') == 'VA') {
                                            $loginuser_id = $this->session->userdata('user_id');
                                            $mypayment = checkbal_mypayment($loginuser_id, 2);
                                            if ($mypayment>0) {
                                        ?>
                                            <div class="col-sm-12 col-md-6">
                                                <input disabled class="checkbox" id="usewalletamount" name="usewalletamount" type="checkbox" class="checkbox" checked/><b> Use Your Wallet Amount:</b><span class="text-primary"> Rs: <?=number_format($mypayment,2)  ?></span>
                                                <small><br>After Pay Wallet Balance <b>Rs:
                                                <?php $balance = (int)$mypayment - (int)$total_price;
                                                $topay = (int)$total_price - (int)$mypayment;?>
                                                        <span id="walletbalancespan"><?php echo $balance>0?number_format($balance,2):0.00;?></span>
                                                    </b></small>
                                            </div><?php
                                        
                                        }}?>
                                        <div class="col-sm-12 col-md-6">
                                            <input class="form-control usecouponcode" placeholder="Enter the coupon code" type="text" id="usecouponcode" value="">
                                            <a class="btn btn-primary checkcouponcode" id="checkcouponcode" href="javascript:;">Check</a>
                                            <span id="couponcodemsg" class=" text-primary"></span>
                                        </div>
                                    </li>
                                        <!--<li>
                                            <small><b>Extra Savings:</b> Earn Cash Back upto Rs500 on this booking</small>
                                        </li>-->
                                        
                                        <li style="text-align: center;"><br><br>
                                        <input type="hidden" id="walletbalance" value="<?php echo $balance>0?$balance:0.00;?>">
                                        <input type="hidden" id="wallettopay" value="<?php echo $topay>0?$topay:0.00; ?>">
                                            <input type="hidden" id="totalPrice" value="<?php echo $total_price; ?>">
                                            <a class="btn btn-primary  mt-20" id="payment_proceed" href="javascript:;">Continue to Pay Rs: <span id="wallettopayspan"><?=$topay>0?number_format($topay,2):0.00?></span></a>
                                        </li>

                                    </ul>
                                    <?php } 
                                    else if(isset($offer_details['message']) && !empty($offer_details['message'])) { 
                                        echo "<div style='text-align:center'>".$offer_details['message']."</div>";
                                    }
                                    else { 
                                        echo "<div style='text-align:center'> Sorry, we could not proceed your request.please try again later!...</div>";
                                    }
                                    ?>
                                </div>

                           </div>

                        </aside>

                    </div>

                </div>

            </div>

        </div>

</div>
<?php $this->load->view('includes/footer')?>
                
	