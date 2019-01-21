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

                        <h2>PNR STATUS</h2>

                    </div>

                </div>

            </div>

            <div class="breadcrumb-wrapper">

                <ol class="breadcrumb">
                    <li><a href="<?=base_url()?>">Home</a></li>
                    <li><a href="#">PNR Status</a></li>

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
                            <?php if($pnrshow==5||$pnrshow==6){?>
                            <div class="promo-box-02 bg-danger mb-40">
                                    <div class="icon">
                                            <i class="fa fa-remove"></i>
                                    </div>
                                    <?php if($pnrshow==5){?>
                                    <h4>Payment Aborted</h4>
                                    <?php }else{?>
                                    <h4>Payment Failure</h4>
                                    <?php }?>

                            </div>
                            <?php }elseif($pnrshow==3 || (isset($pnrinfo['status']) && $pnrinfo['status']==3)){?>
                            <div class="promo-box-02 bg-danger mb-40">
                                    <div class="icon">
                                            <i class="fa fa-remove"></i>
                                    </div>
                                    <?php if(isset($pnrinfo) && $pnrinfo['status']==3){?>
                                    <h4>This is cancelled trip</h4>
                                    <?php }else{?>
                                    <h4>Are you sure want to cancel your trip?</h4>
                                    <?php }?>

                            </div>
                            <?php }elseif(!$isform && $pnrshow==0){?>
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
                             <?php if($pnrshow==5){?>
                            <div class="check_error mb-30" style="color:red;">Thank you for shopping with us. We will keep you posted regarding the status of your order through e-mail. <a href="<?php echo base_url() ?>payment">Try again to pay</a></div>
                            <?php }if($pnrshow==6){?>
                            <div class="check_error mb-30" style="color:red;">Thank you for shopping with us. However,the transaction has been declined. <a href="<?php echo base_url() ?>payment">Try again to pay</a></div>
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
                                <p>Please check bellow your Booking Information.<small>Booked on: <?=$pnrinfo['booked_on'];?></small></p>
                                <table class="table" >
                                        <tr>
                                            <td colspan="2"><b>Trip Name:</b> <?=$pnrinfo['trip_code'];?> - <?=$pnrinfo['trip_name'];?></td>
                                            <td><b>PNR Number:</b> <?=$pnrinfo['pnr_no'];?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><b>Customer Name:</b> <?=$pnrinfo['booked_to'];?></td>
                                            <td><b>No Of Traveller:</b> <?=$pnrinfo['number_of_persons'];?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><b>Contact Email:</b><br> <?=$pnrinfo['booked_email'];?></td>
                                            <td><b>Phone Number:</b><br> <?=$pnrinfo['booked_phone_no'];?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Pick up location, landmark: </b><br> <?=$pnrinfo['pick_up_location'];?></td>
                                            <?php if($pnrinfo['total_days']>0){?>
                                   <td><b>Total Days: </b> <?=$pnrinfo['how_many_days'];?> day(s),
                                    <?php if($pnrinfo['how_many_nights']>0){?><?=$pnrinfo['how_many_nights'];?> night(s)<?php }?></td>
                                    <?php }?>
                                    <?php if($pnrinfo['how_many_hours']>0){?>
                                            <td><b>Total Hours:</b> <br><?=$pnrinfo['how_many_hours'];?> Hour(s)</td>
                                    <?php }?>
                                            <td><b>Date of Trip:</b> <br><?=$pnrinfo['date_of_trip'];?> <?php if($pnrinfo['date_of_trip']!=$pnrinfo['date_of_trip_to']){echo $pnrinfo['date_of_trip_to'];};?></td>
                                        </tr>
                                        <?php if($pnrinfo['bookedby_contactemail']!=$pnrinfo['booked_email']){?>
                                        <tr>
                                            <td><b>Booked by Name: </b><br> <?=$pnrinfo['bookedby'];?></td>
                                            <td colspan="2"><b>Booked by Email: </b> <?=$pnrinfo['bookedby_contactemail'];?></td>
                                 
                                        </tr>
                                        <?php }?>
                                    </table>
                                <ul class="book-sum-list mt-30">
                                    <?php if($pnrinfo['brief_description']!=''){?>
                                <div class="mb-40"></div>
                                <h4 class="section-title">Brief Description</h4>
                                <p><?=html_entity_decode($pnrinfo['brief_description']);?></p>
                                <?php }?>
                                    <li></li>
                                    <li><span class="font600 net_price">Amount:</span><?=$pnrinfo['subtotal_trip_price'];?> ( 
                                    <?php if($pnrinfo['no_of_adult']>0){echo $pnrinfo['no_of_adult'].'*'.$pnrinfo['price_to_adult'];}?> 
                                    <?php if($pnrinfo['no_of_child']>0){echo ', '.$pnrinfo['no_of_child'].'*'.$pnrinfo['price_to_child'];}?> 
                                    <?php if($pnrinfo['no_of_infan']>0){echo ', '.$pnrinfo['no_of_infan'].'*'.$pnrinfo['price_to_infan'];}?> )</li> 
                                    <?php 
                                        $totalamt = (int)$pnrinfo['total_trip_price'];
                                        if($pnrinfo['offer_amt']!=0.00){?>
                                    <li><span class="font600 net_price">Offer Amount(-):
                                            <?php $coupon_code ='';
                                            if($pnrinfo['coupon_code']!=''){
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
                                        $totalamt = (int)$totalamt-(int)$pnrinfo['offer_amt'];
                                        ?>
                                        </span><?=$pnrinfo['offer_amt'].' '.$coupon_code;?></li>             
                                    <?php }
                                    /*if ($this->session->userdata('user_type') == 'VA' && ($pnrshow==0|| $pnrshow==1|| $pnrshow==3)) {
                                        //if($pnrinfo['net_price']!=0.00 && $pnrinfo['net_price']!=$pnrinfo['subtotal_trip_price']){
                                            $vendor_amt= isset($pnrinfo['vendor_amt'])?$pnrinfo['vendor_amt']:0;
                                            $totalamt = (int)$pnrinfo['net_price']+(int)$vendor_amt;
                                            ?>
<!--                                        <li><span class="font600 net_price">Total Amount:</span><?=$totalamt;?></li>                                                                                    -->
                                        <?php //}
                                        if($pnrinfo['discount_your_price']>0){
                                            $totalamt = (int)$totalamt-(int)$pnrinfo['discount_your_price'];?>
                                    <li><span class="font600 net_price">Discount Your Trip<br> Amount(Cash)(-):</span><?=$pnrinfo['discount_your_price'];?></li> 
                                        <?php }
                                            $gst_amt = $totalamt * ($pnrinfo['gst_percentage'] / 100);
                                            $round_off = round(round($totalamt + $gst_amt) - ($totalamt + $gst_amt), 2);
                                            $net_price = $totalamt + $gst_amt + $round_off;?>
                                        <?php if($gst_amt!=0){?>
                                        <li><span class="font600 net_price">GST Amount (<?=$pnrinfo['gst_percentage'];?>%)(+):</span><?=$gst_amt;?></li> 
                                        <?php }if($round_off!=0){?>
                                        <li><span class="font600 net_price">Round Off:</span><?=$round_off;?></li> 
                                        <?php }?>
                                        
                                        <li><span class="font600 net_price">Paid Amount:</span><b><?=$net_price;?></b></li>                                                                                    
                                        <?php 
                                    }elseif ($this->session->userdata('user_type') == 'VA' && $pnrshow==2) {*/
                                    if ($this->session->userdata('user_type') == 'VA' && ($pnrshow==0|| $pnrshow==1|| $pnrshow==3|| $pnrshow==5|| $pnrshow==6)) {
                                        //$totalamt = (int)$pnrinfo['total_trip_price'];
                                        //if($pnrinfo['net_price']!=0.00 && $pnrinfo['net_price']!=$pnrinfo['subtotal_trip_price']){
                                            ?>
<!--                                        <li><span class="font600 net_price">Total Amount:</span><?=$totalamt;?></li>                                                                                    -->
                                        <?php //}
                                        if($pnrinfo['discount_your_price']>0){
                                            $totalamt = (int)$totalamt-(int)$pnrinfo['discount_your_price'];?>
                                    <li><span class="font600 net_price">Discount Your Trip<br> Amount(Cash)(-):</span><?=$pnrinfo['discount_your_price'];?></li> 
                                        <?php }
                                            $gst_amt = $totalamt * ($pnrinfo['gst_percentage'] / 100);
                                            $round_off = round(round($totalamt + $gst_amt) - ($totalamt + $gst_amt), 2);
                                            $net_price = $totalamt + $gst_amt + $round_off;?>
                                        <?php if($gst_amt!=0){?>
                                        <li><span class="font600 net_price">GST Amount (<?=$pnrinfo['gst_percentage'];?>%)(+):</span><?=$gst_amt;?></li> 
                                        <?php }if($round_off!=0){?>
                                        <li><span class="font600 net_price">Round Off:</span><?=$round_off;?></li> 
                                        <?php }?>
                                        
                                        <li><span class="font600 net_price">Paid Amount:</span><b><?=$net_price;?></b></li>                                                                                    
                                        <?php 
                                    }elseif ($this->session->userdata('user_type') == 'VA' && $pnrshow==2) {
                                        $totalamt = (int)$pnrinfo['total_trip_price'];
                                        if(isset($pnrinfo['vendor_amt']) && $pnrinfo['vendor_amt']!=0){
                                            $totalamt = (int)$pnrinfo['total_trip_price']-$pnrinfo['vendor_amt'];?>
                                        <li><span class="font600 net_price">Vendor Amount(-):</span><?=$pnrinfo['vendor_amt'];?></li>                                                                                    
                                        <?php }
                                        if($pnrinfo['net_price']!=0.00 && $pnrinfo['net_price']!=$pnrinfo['subtotal_trip_price']){
                                            //$totalamt = (int)$pnrinfo['net_price'];
                                            
                                        if($pnrinfo['discount_your_price']>0){
                                            $totalamt = (int)$totalamt-(int)$pnrinfo['discount_your_price'];?>
                                        <li><span class="font600 net_price">Discount Your Trip<br> Amount(Cash)(-):</span><?=$pnrinfo['discount_your_price'];?></li> 
                                        <?php }?>
                                        <li><span class="font600 net_price">Total Amount:</span><?=$totalamt;?></li>                                                                                    
                                        <?php }if($pnrinfo['servicecharge_amt']!=0){?>
                                        <li><span class="font600 net_price">Service Charge(-):</span><?=$pnrinfo['servicecharge_amt'];?></li>                                                                                    
                                        <?php }if($pnrinfo['gst_percentage']!=0){?>
                                        <li><span class="font600 net_price">GST Amount (<?=$pnrinfo['gst_percentage'];?>%):</span><?=$pnrinfo['gst_amt'];?></li>                                                                                    
                                        <?php }if($pnrinfo['round_off']!=0){?>
                                        <li><span class="font600 net_price">Round Off:</span><?=$pnrinfo['round_off'];?></li>                                                                                    
                                        <?php }?>
                                        <li><span class="font600 net_price">Your Amount:</span><b><?=$pnrinfo['your_final_amt'];?></b></li>                                                                                    
                                        <?php 
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
                                    } if(isset($pnrinfo) && $pnrinfo['status']==3){?>
                                        <li class=" text-danger"><span class="font600 starting">Trip Cancelled On:</span><?=date("M d, Y", strtotime($pnrinfo['cancelled_on']));?></li>                                                                                    
                                        <li class=" text-info"><span class="font600 starting">Refund Status:</span><?php 
                                        $return_status=array('','New','InProgress','Paid');
                                        echo $return_status[$pnrinfo['return_paid_status']];?></li>                                                                                    
                                        <?php if($pnrinfo['refund_percentage']>0){?>
                                        <li><span class="font600 starting">Refund Percentage:</span><?=$pnrinfo['refund_percentage'];?>%</li>                                                                                    
                                        <?php }if($pnrinfo['return_paid_amt']>0){?>
                                        <li><span class="font600 starting">Refund Amount:</span><b><?=$pnrinfo['return_paid_amt'];?></b></li>                                                                                    
                                        <?php }
                                     }?>
<!--                                    <li><span class="font600 starting">Date of Trip : </span> <?=$pnrinfo['date_of_trip'];?> <?=$pnrinfo['time_of_trip'];?></li>
                                    <li><span class="font600 included">Pick up location,<br>landmark: </span><?=$pnrinfo['pick_up_location'];?>, <?=$pnrinfo['pick_up_location_landmark'];?></li>
                                    <li><span class="font600 starting">Date of Trip End: </span> <?=$pnrinfo['date_of_trip_to'];?></li>-->
                                    <?php /*if($pnrinfo['total_days']>0){?>
                                    <li><span class="font600 excluded">Total Days: </span><?=$pnrinfo['how_many_days'];?> day(s),
                                    <?php if($pnrinfo['how_many_nights']>0){?><?=$pnrinfo['how_many_nights'];?> night(s)<?php }?></li>
                                    <?php }?>
                                    <?php if($pnrinfo['how_many_hours']>0){?>
                                    <li><span class="font600 excluded">Total Hours: </span><?=$pnrinfo['how_many_hours'];?> Hour(s)</li>
                                    <?php }*/?>
                                    <?php if($pnrinfo['languages']!=''){?>
                                    <li><span class="font600 excluded">Languages: </span><?=$pnrinfo['languages'];?></li>
                                    <?php }?>
                                    <?php if($pnrinfo['meal']!=''){?>
                                    <li><span class="font600 excluded">Meals: </span><?=$pnrinfo['meal'];?></li>
                                    <?php }?>
<!--                                    <li><span class="font600 billed_by">Customer Name:</span><?=$pnrinfo['booked_to'];?></li>
                                    <li><span class="font600 billed_email">Contact Email:</span><?=$pnrinfo['booked_email'];?></li>
                                    <li><span class="font600 billed_phone_number">Phone Number:</span><?=$pnrinfo['booked_phone_no'];?></li>
                                    <li><span class="font600 billed_by">Booked on:</span><?=$pnrinfo['booked_on'];?></li>-->
                                </ul>
                                
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
                                    <?php } else  if(isset($pnrinfo)  && ($pnrinfo['status']==2||$pnrinfo['status']==4)){?> 
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
	
