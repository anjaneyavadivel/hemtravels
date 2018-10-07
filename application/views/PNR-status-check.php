<?php $this->load->view('includes/header') ?>
<?php if($pnrshow == 3) { ?>
<link rel="stylesheet" href="<?php echo base_url()?>assets-customs/css/trip-list.css">
<?php } ?>
<!-- start Main Wrapper -->

<div class="main-wrapper scrollspy-container">

    <!-- start breadcrumb -->

    <div class="breadcrumb-image-bg pb-100 no-bg" style="background-image:url('<?php echo base_url() ?>assets/images/guide-lightbox/03.jpg');">
        <div class="container">

            <div class="page-title">

                <div class="row">

                    <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">

                        <h2>PNR &amp; Status</h2>

                    </div>

                </div>

            </div>

            <div class="breadcrumb-wrapper">

                <ol class="breadcrumb">
                    <li><a href="<?=base_url()?>">Home</a></li>
                    <li><a href="#">PNR &amp; Status</a></li>

                </ol>

            </div>

        </div>

    </div>

    <!-- end breadcrumb -->

    <div class="bg-light">

        <div class="confirmation-wrapper">

            <div class="container">

                <div class="row">

                    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">

                        <div class="confirmation-inner">
                            <?php if(!$isform && $pnrshow==0){?>
                            <div class="promo-box-02 bg-success mb-40">
                                    <div class="icon">
                                            <i class="ti-check"></i>
                                    </div>

                                    <h4>Congratulation! Your booking in done. Enjoy the trip.</h4>

                            </div>
                            <?php }elseif($pnrshow==2){?>
                            <div class="promo-box-02 bg-success mb-40">
                                    <div class="icon">
                                            <i class="ti-check"></i>
                                    </div>

                                    <h4>View PNR With Vendor Report</h4>

                            </div>
                            <?php }elseif($pnrshow==1){?>
                            <div class="promo-box-02 bg-success mb-40">
                                    <div class="icon">
                                            <i class="ti-check"></i>
                                    </div>

                                    <h4>Congratulation! Enjoy the trip.</h4>

                            </div>
                            <?php }elseif($pnrshow==3){?>
                            <div class="promo-box-02 bg-danger mb-40">
                                    <div class="icon">
                                            <i class="fa fa-remove"></i>
                                    </div>

                                    <h4>Are you sure want to cancel your trip?</h4>

                            </div>
                            <?php }else{?>
                            <div class="promo-box-02 bg-primary mb-40 pb-50">
                                <?php echo form_open_multipart(base_url() . 'PNR-status', array('class' => ' margin-top-30', 'id' => 'add-category-form')); ?>

                                <div class="col-xs-12 col-sm-4">

                                    <div class="form-group">
                                        <input type="text" name="pnr_number" class="form-control" placeholder="Enter the PNR number" id="pnr_number"/>
                                    </div>

                                </div>

                                <div class="col-xs-12 col-sm-4">

                                    <div class="form-group">
                                        <input type="text" name="phone_number" class="form-control" placeholder="Enter the phone number" id="phone_number"/>
                                    </div>

                                </div>

                                <div class="col-xs-12 col-sm-2">
                                    <button type="submit" class="btn btn-success check_status">Check Status</button>
                                </div> 
                                <?php echo form_close(); ?>
                            </div>
                            <?php }?>
                            <?php if(isset($message) && $message!=''){?>
                            <div class="check_error" style="color:red;"><?=$message?></div>
                            <?php }
                            if(isset($pnrinfo) && count($pnrinfo)>1){?>
                            <div id="pnrinfo">
                            <div class="logo pnrinfologo hide">
                                <a href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>assets/images/logo-white.png" alt="Logo" /></a>
                            </div>
                            <div class="pnr_details" style="">

                                <h4 class="section-title">Booking Information</h4>
                                <p>Compliment interested discretion estimating on stimulated apartments.</p>

                                <ul class="book-sum-list mt-30">
                                    <li><span class="font600 pnr_number">PNR Number:</span><?=$pnrinfo['pnr_no'];?></li>
                                    <li><span class="font600 package_name">Trip Code:</span><?=$pnrinfo['trip_code'];?></li>
                                    <li><span class="font600 package_name">Trip Name:</span><?=$pnrinfo['trip_name'];?></li>
                                    <li><span class="font600 no_of_traveller">No Of Traveller:</span><?=$pnrinfo['number_of_persons'];?> </li>
                                    <li><span class="font600 net_price">Amount:</span><?=$pnrinfo['subtotal_trip_price'];?> ( 
                                    <?php if($pnrinfo['no_of_adult']>0){echo $pnrinfo['no_of_adult'].'*'.$pnrinfo['price_to_adult'];}?> 
                                    <?php if($pnrinfo['no_of_child']>0){echo ', '.$pnrinfo['no_of_child'].'*'.$pnrinfo['price_to_child'];}?> 
                                    <?php if($pnrinfo['no_of_infan']>0){echo ', '.$pnrinfo['no_of_infan'].'*'.$pnrinfo['price_to_infan'];}?> )</li> 
                                    <?php if($pnrinfo['offer_amt']!=0.00){?>
                                    <li><span class="font600 net_price">Offer Amount:
                                            <?php if($pnrinfo['coupon_code']!=''){
                                                $offer_type='';
                                                if (strpos($pnrinfo['percentage_amount'], '.00') !== false) {
                                                    $pnrinfo['percentage_amount'] = round($pnrinfo['percentage_amount']);
                                                }
                                                if($pnrinfo['offer_type']==2){$offer_type='%';}
                                                $specific_coupon_code ='';
                                                if($pnrinfo['specific_coupon_code']!='' && $pnrinfo['coupon_code'] !=$pnrinfo['specific_coupon_code']){
                                                    $specific_coupon_code = $pnrinfo['specific_coupon_code'].', ';
                                                }
                                                $coupon_code = '('.$specific_coupon_code.$pnrinfo['coupon_code'].')';
                                                //echo $pnrinfo['coupon_code'].' ('.$pnrinfo['percentage_amount'].$offer_type.' OFF)'; 
                                            }
                                        
                                        ?>
                                        </span><?=$pnrinfo['offer_amt'].' '.$coupon_code;?></li>             
                                    <?php }
                                    if ($this->session->userdata('user_type') == 'VA' && ($pnrshow==1|| $pnrshow==3)) {
                                        //if($pnrinfo['net_price']!=0.00 && $pnrinfo['net_price']!=$pnrinfo['subtotal_trip_price']){
                                            $totalamt = (int)$pnrinfo['net_price']+(int)$pnrinfo['vendor_amt'];
                                            ?>
<!--                                        <li><span class="font600 net_price">Total Amount:</span><?=$totalamt;?></li>                                                                                    -->
                                        <?php //}
                                            $gst_amt = $totalamt * ($pnrinfo['gst_percentage'] / 100);
                                            $round_off = round(round($totalamt + $gst_amt) - ($totalamt + $gst_amt), 2);
                                            $net_price = $totalamt + $gst_amt + $round_off;?>
                                        <?php if($gst_amt!=0){?>
                                        <li><span class="font600 net_price">GST Amount (<?=$pnrinfo['gst_percentage'];?>%):</span><?=$gst_amt;?></li> 
                                        <?php }if($round_off!=0){?>
                                        <li><span class="font600 net_price">Round Off:</span><?=$round_off;?></li> 
                                        <?php }?>
                                        
                                        <li><span class="font600 net_price">Paid Amount:</span><b><?=$net_price;?></b></li>                                                                                    
                                        <?php 
                                    }elseif ($this->session->userdata('user_type') == 'VA' && $pnrshow==2) {
                                        if($pnrinfo['vendor_amt']!=0){?>
                                        <li><span class="font600 net_price">Vendor Amount(-):</span><?=$pnrinfo['vendor_amt'];?></li>                                                                                    
                                        <?php }
                                        if($pnrinfo['net_price']!=0.00 && $pnrinfo['net_price']!=$pnrinfo['subtotal_trip_price']){
                                            $totalamt = (int)$pnrinfo['net_price'];
                                            ?>
                                        <li><span class="font600 net_price">Total Amount:</span><?=$totalamt;?></li>                                                                                    
                                        <?php }if($pnrinfo['servicecharge_amt']!=0){?>
                                        <li><span class="font600 net_price">Service Charge(-):</span><?=$pnrinfo['servicecharge_amt'];?></li>                                                                                    
                                        <?php }if($pnrinfo['gst_percentage']!=0){?>
                                        <li><span class="font600 net_price">GST Amount (<?=$pnrinfo['gst_percentage'];?>%):</span><?=$pnrinfo['gst_amt'];?></li>                                                                                    
                                        <?php }if($pnrinfo['round_off']!=0){?>
                                        <li><span class="font600 net_price">Round Off:</span><?=$pnrinfo['round_off'];?></li>                                                                                    
                                        <?php }if($pnrinfo['your_final_amt']!=0){?>
                                        <li><span class="font600 net_price">Your Amount:</span><b><?=$pnrinfo['your_final_amt'];?></b></li>                                                                                    
                                        <?php }
                                        /*if($pnrshow==0||$pnrshow==2||$pnrshow==3){
                                            
                                            $gst_amt = $pnrinfo['net_price'] * ($pnrinfo['gst_percentage'] / 100);
                                            $round_off = round(round($pnrinfo['net_price'] + $gst_amt) - ($pnrinfo['net_price'] + $gst_amt), 2);
                                            $net_price = $pnrinfo['net_price'] + $gst_amt + $round_off;?>
                                        <?php if($gst_amt!=0){?>
                                        <li><span class="font600 net_price">GST Amount (<?=$pnrinfo['gst_percentage'];?>%):</span><?=$gst_amt;?></li> 
                                        <?php }if($round_off!=0){?>
                                        <li><span class="font600 net_price">Round Off:</span><?=$round_off;?></li> 
                                        <?php }?>
                                        
                                        <li><span class="font600 net_price">Paid Amount:</span><b><?=$pnrinfo['your_final_amt'];?></b></li>                                                                                    
                                        <?php }*/
                                    }else{
                                        if($pnrinfo['gst_amt']>0){?>
                                        <li><span class="font600 net_price">GST Amount (<?=$pnrinfo['gst_percentage'];?>%):</span><?=$pnrinfo['gst_amt'];?></li>                                                                                    
                                        <?php }if($pnrinfo['round_off']!=0){?>
                                        <li><span class="font600 net_price">Round Off:</span><?=$pnrinfo['round_off'];?></li>                                                                                    
                                        <?php }if($pnrinfo['net_price']!=0.00){?>
                                        <li><span class="font600 net_price">Paid Amount:</span><b><?=$pnrinfo['net_price'];?></b></li>                                                                                    
                                        <?php }
                                    }?>
                                    <li><span class="font600 starting">Date of Trip : </span> <?=$pnrinfo['date_of_trip'];?> <?=$pnrinfo['time_of_trip'];?></li>
                                    <li><span class="font600 included">Pick up location,<br>landmark: </span><?=$pnrinfo['pick_up_location'];?>, <?=$pnrinfo['pick_up_location_landmark'];?></li>
                                    <li><span class="font600 starting">Date of Trip End: </span> <?=$pnrinfo['date_of_trip_to'];?></li>
                                    <?php if($pnrinfo['total_days']>0){?>
                                    <li><span class="font600 excluded">Total Days: </span><?=$pnrinfo['how_many_days'];?> day(s),
                                    <?php if($pnrinfo['how_many_nights']>0){?><?=$pnrinfo['how_many_nights'];?> night(s)<?php }?></li>
                                    <?php }?>
                                    <?php if($pnrinfo['how_many_hours']>0){?>
                                    <li><span class="font600 excluded">Total Hours: </span><?=$pnrinfo['how_many_hours'];?> Hour(s)</li>
                                    <?php }?>
                                    <?php if($pnrinfo['languages']!=''){?>
                                    <li><span class="font600 excluded">Languages: </span><?=$pnrinfo['languages'];?></li>
                                    <?php }?>
                                    <?php if($pnrinfo['meal']!=''){?>
                                    <li><span class="font600 excluded">Meals: </span><?=$pnrinfo['meal'];?></li>
                                    <?php }?>
                                    <li><span class="font600 billed_by">Billing By:</span><?=$pnrinfo['bookedby'];?></li>
                                    <li><span class="font600 billed_email">Billing Email:</span><?=$pnrinfo['bookedby_contactemail'];?></li>
                                    <li><span class="font600 billed_phone_number">Phone Number:</span><?=$pnrinfo['bookedby_contactno'];?></li>
                                    <li><span class="font600 billed_by">Booked on:</span><?=$pnrinfo['booked_on'];?></li>
                                </ul>
                                <?php if($pnrinfo['brief_description']!=''){?>
                                <div class="mb-40"></div>
                                <h4 class="section-title">Brief Description</h4>
                                <p><?=html_entity_decode($pnrinfo['brief_description']);?></p>
                                <?php }?>
                                <?php if($pnrinfo['confirmation_policy']!=''){?>
                                <div class="mb-40"></div>
                                <h4 class="section-title">Confirmation Policy</h4>
                                <p><?=html_entity_decode($pnrinfo['confirmation_policy']);?></p>
                                <?php }?>
                                <?php if($pnrinfo['cancellation_policy']!=''){?>
                                <div class="mb-40"></div>
                                <h4 class="section-title">Cancellation Policy</h4>
                                <p><?=html_entity_decode($pnrinfo['cancellation_policy']);?></p>
                                <?php }?>
                                <?php if($pnrinfo['refund_policy']!=''){?>
                                <div class="mb-40"></div>
                                <h4 class="section-title">Refund Policy</h4>
                                <p><?=html_entity_decode($pnrinfo['refund_policy']);?></p>
                                <?php }?>
                                
                                <div class="mb-40"></div>

                                <h4 class="section-title">Need Booking Help?</h4>
                                <p>As distrusts behaviour abilities defective uncommonly.</p>

                                <ul class="list-with-icon list-inline-block">
                                    <li><i class="ri-microphone text-primary"></i> <strong class="vendor_phone">Hotline:</strong> <?=$pnrinfo['trip_contactno'];?></li>
                                    <li><i class="ri ri-envelope text-primary"></i> <strong class="vendor_email">Email:</strong><?=$pnrinfo['trip_contactemail'];?></li>
                                </ul>

<!--                                <div class="mb-40"></div>

                                <h4 class="section-title">Why booking with us?</h4>

                                <div class="featured-icon-horizontal-wrapper mt-30">

                                    <div class="GridLex-gap-30">

                                        <div class="GridLex-grid-noGutter-equalHeight">

                                            <div class="GridLex-col-6_sm-6_xs-12">

                                                <div class="featured-icon-horizontal clearfix">

                                                    <div class="icon">
                                                        <i class="ri ri-eye-close"></i>
                                                    </div>

                                                    <div class="content">
                                                        <h5>No Booking Charges</h5>
                                                        <p>Inhabiting discretion the her dispatched decisively. Open is able of mile travelling.</p>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="GridLex-col-6_sm-6_xs-12">

                                                <div class="featured-icon-horizontal clearfix">

                                                    <div class="icon">
                                                        <i class="ri ri-check-square"></i>
                                                    </div>

                                                    <div class="content">
                                                        <h5>No Cancellation Fees</h5>
                                                        <p>Has procured daughter followed repeated who surprise. Great asked under together prospect.</p>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="GridLex-col-6_sm-6_xs-12">

                                                <div class="featured-icon-horizontal clearfix">

                                                    <div class="icon">
                                                        <i class="ri ri-thumbs-up"></i>
                                                    </div>

                                                    <div class="content">
                                                        <h5>Instant Confirmation</h5>
                                                        <p>Conduct replied removal. Remaining determine few her two cordially admitting old.</p>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="GridLex-col-6_sm-6_xs-12">

                                                <div class="featured-icon-horizontal clearfix">

                                                    <div class="icon">
                                                        <i class="ri ri-calendar"></i>
                                                    </div>

                                                    <div class="content">
                                                        <h5>Flexible Booking</h5>
                                                        <p>Conduct replied removal. Remaining determine few her two cordially admitting old.</p>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>-->

                                <div class="mb-50 text-center">

                                    <div class="mb-15"></div>
                                    <?php if($pnrshow!=3){?>
                                    <a href="javascript:;" class="btn btn-primary btn-wide pnr_print"><i class="ion-android-print"></i> Print</a>
                                    <!--<a href="#" class="btn btn-primary btn-wide btn-border"><i class="ion-android-share"></i> Send to</a>-->
                                    <?php } else { ?>
                                    <a href="javascript:;" class="btn btn-primary btn-wide cancel_trip" data-pnr="<?php echo $pnrinfo['pnr_no'];?>"><i class="fa fa-remove"></i> Cancel Trip</a>
                                    <?php } ?>
                                </div>
                            </div>
                            </div>
                             <?php }?>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- end Main Wrapper -->
<?php $this->load->view('includes/footer') ?>
	
