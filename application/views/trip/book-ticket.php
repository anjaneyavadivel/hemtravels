<?php $this->load->view('includes/header')?>
  <!-- start Main Wrapper -->
 <div class="main-wrapper scrollspy-container">

        <!-- start Breadcrumb -->

        <div class="breadcrumb-wrapper">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Payment</li>
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
        <div class=" col-sm-12 pt-30 pb-30 text-center">
                        <div class="col-xs-4 col-sm-4 col-lg-4 p-0 ">
                                <i class="fa fa-check active_book" aria-hidden="true"></i> 
                            <span class="progressline"> </span>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-lg-4 p-0">
                                <i class="fa fa-check inactive_book " aria-hidden="true"></i> 
                            <span class="progressline"> </span>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-lg-4 p-0">
                                <i class="fa fa-check inactive_book " aria-hidden="true"></i> 

                        </div>

                    </div>

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

                                                                        <div class="col-xss-12 col-xs-6 col-sm-6">
                                                                            <div class="form-group">
                                                                                <label>From</label>
                                                                                <input type="text" id="rangeDatePickerFrom" name="booking_from_time" class="form-control" placeholder="M D, YYYY" value="<?php echo isset($from_date)?$from_date:''?>" />
                                                                            </div>
                                                                        </div>
                                                                        <?php if(isset($details['trip_duration']) && $details['trip_duration'] == '2') { ?>
                                                                        <div class="col-xss-12 col-xs-6 col-sm-6">
                                                                            <div class="form-group">
                                                                                <label>To</label>
                                                                                <input type="text" id="rangeDatePickerTo" name="booking_to_time" class="form-control" placeholder="M D, YYYY" value="<?php echo isset($to_date)?$to_date:''?>"/>
                                                                            </div>
                                                                        </div>
                                                                        <?php } ?>
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
                                                                                <label>Location</label>
                                                                                <select class="selectpicker show-tick form-control" id="location" name="location" data-live-search="false">
                                                                                    <option value="">Select</option>
                                                                                    <?php 
                                                                                     if(isset($pickups) && count($pickups) > 0){
                                                                                        foreach ($pickups as $v){
                                                                                            $selected = '';
                                                                                            
                                                                                            if(isset($location) && $location == $v['id']){
                                                                                                $selected = 'selected';
                                                                                            }
                                                                                            
                                                                                             echo '<option value="'.$v['id'].'" '.$selected.'>'.$v['location'].'</option>';
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

                                    <?php if(isset($offer_details['availabletraveller']) && $offer_details['availabletraveller'] >= $total_traveller && $offer_details['is_open'] == 1) {?>
                                    <ul class="price-summary-list">

                                        <li>
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
                                        </li>

                                        <li>
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
                                            
                                        </li>

                                        <li class="divider"></li>

                                        <li>
                                            
                                            <?php 
                                                $adultPrice     = $no_of_adult    * $offer_details['price_to_adult'];
                                                $childrenPrice  = $no_of_children * $offer_details['price_to_child'];
                                                $infanPrice     = $no_of_infan    * $offer_details['price_to_infan'];
                                                
                                                $adultDisPrice = 0;$childDisPrice =0;$infanDisPrice=0;$disLabel='';
                                                if($offer_details['discount_price'] > 0){
                                                    $adultDisPrice = (int)$adultPrice - (int)$offer_details['discount_price'];
                                                    $childDisPrice = (int)$childrenPrice - (int)$offer_details['discount_price'];
                                                    $infanDisPrice = (int)$infanPrice - (int)$offer_details['discount_price'];
                                                    $disLabel = '(Fixed amount - '.$offer_details['discount_price'].' )';
                                                }else if($offer_details['discount_percentage'] > 0){
                                                    $adultDisPrice = (int)$adultPrice - ((int) $adultPrice * ((int) $offer_details['discount_percentage'] / 100));
                                                    $childDisPrice = (int)$childrenPrice - ((int) $childrenPrice * ((int) $offer_details['discount_percentage'] / 100));
                                                    $infanDisPrice = (int)$infanPrice - ((int) $infanPrice * ((int) $offer_details['discount_percentage'] / 100));
                                                    $disLabel = '(% '.$offer_details['discount_percentage'].' )';
                                                }
                                                
                                                $discount_price = $adultDisPrice + $childDisPrice + $infanDisPrice;
                                                
                                                
                                                $total_price = $adultPrice + $childrenPrice + $infanPrice - $discount_price;
                                                
                                                $gstPrice = 0;
                                                if($offer_details['gst_percentage'] > 0){
                                                    $gstPrice    = ((int) $total_price * ((int) $offer_details['gst_percentage'] / 100));
                                                    $total_price = (int)$total_price + $gstPrice;
                                                }
                                            
                                            ?>
                                            <!--<h6 class="heading mt-20 mb-5 text-primary uppercase">Price per person</h6>-->
                                            <?php if(isset($no_of_adult) && $no_of_adult > 0) { ?>
                                            <div class="row gap-10 mt-10">
                                                <div class="col-xs-7 col-sm-7">
                                                    Adult Price ( <?php echo $no_of_adult.' * '.$offer_details['price_to_adult']; ?> )
                                                </div>
                                                <div class="col-xs-5 col-sm-5 text-right">
                                                    &#8377; <?php echo $adultPrice; ?>
                                                </div>
                                            </div>
                                            <?php } ?>
                                            <?php if(isset($no_of_children) && $no_of_children > 0){ ?>
                                            <div class="row gap-10 mt-10">
                                                <div class="col-xs-7 col-sm-7">
                                                    Children Price ( <?php echo $no_of_children.' * '.$offer_details['price_to_child']; ?> )
                                                </div>
                                                <div class="col-xs-5 col-sm-5 text-right">
                                                    &#8377; <?php echo $childrenPrice; ?>
                                                </div>
                                            </div>
                                            <?php } ?>
                                            <?php if(isset($no_of_infan) && $no_of_infan > 0){ ?>
                                            <div class="row gap-10 mt-10">
                                                <div class="col-xs-7 col-sm-7">
                                                    Infan Price ( <?php echo $no_of_infan.' * '.$offer_details['price_to_infan']; ?> )
                                                </div>
                                                <div class="col-xs-5 col-sm-5 text-right">
                                                    &#8377; <?php echo $infanPrice; ?>
                                                </div>
                                            </div>
                                            <?php } ?>
                                            <?php if(isset($discount_price) && $discount_price > 0){ ?>
                                            <div class="row gap-10 mt-10">
                                                <div class="col-xs-7 col-sm-7">
                                                    Discount on per traveller<?php echo $disLabel;?>
                                                </div>
                                                <div class="col-xs-5 col-sm-5 text-right">
                                                    (-) &#8377; <?php echo $discount_price; ?>
                                                </div>
                                            </div>
                                            <?php } ?>
                                            <?php if(isset($offer_details['gst_percentage']) && $offer_details['gst_percentage'] > 0){ ?>
                                            <div class="row gap-10 mt-10">
                                                <div class="col-xs-7 col-sm-7">
                                                    GST (<?php echo $offer_details['gst_percentage'].'%';?>)
                                                </div>
                                                <div class="col-xs-5 col-sm-5 text-right">
                                                   (+) &#8377; <?php echo $gstPrice; ?>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </li>

                                        <li class="divider"></li>

                                        <li>
                                            <div class="row gap-10 mt-10">
                                                <div class="col-xs-7 col-sm-7">
                                                    <span class="font600">Total </span>
                                                </div>
                                                <div class="col-xs-5 col-sm-5 text-right">
                                                    
                                                    <span class="font600 font26 block text-primary mt-5"><?php echo $total_price; ?></span>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="divider"></li>
                                        <!--<li>
                                            <small><b>Extra Savings:</b> Earn Cash Back upto Rs500 on this booking</small>
                                        </li>-->
                                        <li style="text-align: center;">
                                            <input type="hidden" id="totalPrice" value="<?php echo $total_price; ?>">
                                            <a class="btn btn-primary  mt-5" id="payment_proceed" href="javascript:;">Proceed</a>
                                        </li>

                                    </ul>
                                    <?php } else { 
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
                
	