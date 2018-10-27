<?php $this->load->view('includes/header') ?>
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
                    <li><a href="<?= base_url() ?>">Home</a></li>
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
                            <div class="promo-box-02 bg-success mb-40">
                                <div class="icon">
                                    <i class="ti-check"></i>
                                </div>

                                <h4>PNR Admin View Report</h4>

                            </div>
                            <?php if (isset($message) && $message != '') { ?>
                                <div class="check_error" style="color:red;"><?= $message ?></div>
                            <?php
                            }
                            if (isset($pnrinfo) && count($pnrinfo) > 1) {
                                ?>
                                <div id="pnrinfo">
                                    <style> .table-size{ width: 50%;}</style>
                                    <div class="logo pnrinfologo hide">
                                        <a href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>assets/images/logo-white.png" alt="Logo" /></a>
                                    </div>
                                    <div class="pnr_details" style="">

                                        <h4 class="section-title">Booking Information</h4>
                                        <p>Compliment interested discretion estimating on stimulated apartments.</p>
                                        <table class="table">
                                            <tbody>
                                                <tr><td colspan="2"><span class="font600 package_name">Trip Name:</span> <?= $pnrinfo['trip_name']; ?></td></tr>
                                                <tr><td><span class="font600 pnr_number">PNR Number:</span> <?= $pnrinfo['pnr_no']; ?></td>
                                                    <td><span class="font600 package_name">Trip Code:</span> <?= $pnrinfo['trip_code']; ?></td></tr>
                                                <tr><td><?php if ($pnrinfo['total_days'] > 0) { ?>
                                                <span class="font600 excluded">Total Days: </span><?= $pnrinfo['how_many_days']; ?> day(s),
                                                <?php if ($pnrinfo['how_many_nights'] > 0) { ?><?= $pnrinfo['how_many_nights']; ?> night(s)<?php } ?>
                                            <?php } ?>
                                            <?php if ($pnrinfo['how_many_hours'] > 0) { ?>
                                                <span class="font600 excluded">Total Hours: </span><?= $pnrinfo['how_many_hours']; ?> Hour(s)
                                            <?php } ?></td>
                                                <td><span class="font600 billed_by">Billing By:</span> <?= $pnrinfo['bookedby']; ?></td></tr>
                                                 <tr> <td><span class="font600 billed_by">Billing Email:</span><?= $pnrinfo['bookedby_contactemail']; ?></td>
                                                 <td><span class="font600 starting">Phone Number: </span> <?= $pnrinfo['bookedby_contactno']; ?> </td></tr>
                                                 <tr>    <td><span class="font600 starting">Booked on: </span> <?= $pnrinfo['booked_on']; ?> </td>
                                                <td><span class="font600 starting">Date of Trip : </span> <?= $pnrinfo['date_of_trip']; ?> <?= $pnrinfo['time_of_trip']; ?></td></tr>
                                                <tr><td><span class="font600 starting">No Of Traveller:</span> <?= $pnrinfo['number_of_persons']; ?></td>
                                                <td><span class="font600 no_of_traveller">Date of Trip End: </span> <?= $pnrinfo['date_of_trip_to']; ?></td></tr>
                                                   <td colspan="2"><span class="font600 included">Pick up location landmark: </span> <?= $pnrinfo['pick_up_location']; ?>, <?= $pnrinfo['pick_up_location_landmark']; ?></td>
                                                
                                                <tr>
                                                    <td><span class="font600 excluded">Languages: </span><?= $pnrinfo['languages']; ?></td>
                                                    <td colspan="2"><span class="font600 excluded">Meals: </span><?= $pnrinfo['meal']; ?></td>
                                                </tr>
                                                <?php  if(isset($pnrinfo) && $pnrinfo['status']==3){?>
                                                <tr>
                                                    <td class="text-danger"><span class="font600 excluded">Trip Cancelled On: </span><?=date("M d, Y", strtotime($pnrinfo['cancelled_on']));?></td>
                                                    <td class="text-danger"><span class="font600 excluded">Refund Status: </span><?php 
                                        $return_status=array('','New','InProgress','Paid');
                                        echo $return_status[$pnrinfo['return_paid_status']];?></td>
                                                </tr>
                                                <?php  if(isset($pnrinfo) && $pnrinfo['return_paid_status']==3){?>
                                                <tr>
                                                    <td><span class="font600 excluded">Refund Percentage: </span><?=$pnrinfo['refund_percentage'];?>%</td>
                                                    <td colspan="2"><span class="font600 excluded">Refund Amount: </span><?=$pnrinfo['return_paid_amt'];?></td>
                                                </tr>
                                                <?php  }}?>
                                            </tbody>
                                        </table>
                                        <h4 class="section-title">Customer Cost Info</h4>
                                        <table class="table tablesize">
                                            <tbody>
                                                <tr><td class="table-size"><span class="font600">Amount: </span></td>
                                                    <td class="table-size text-right"><?= $pnrinfo['subtotal_trip_price']; ?></td></tr>
                                                <?php if ($pnrinfo['offer_amt'] != 0.00) { ?>
                                                <tr><td><span class="font600 net_price">Offer Amount:
                                                        <?php
                                                        if ($pnrinfo['coupon_code'] != '') {
                                                            $offer_type = '';
                                                            if (strpos($pnrinfo['percentage_amount'], '.00') !== false) {
                                                                $pnrinfo['percentage_amount'] = round($pnrinfo['percentage_amount']);
                                                            }
                                                            if ($pnrinfo['offer_type'] == 2) {
                                                                $offer_type = '%';
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
                                                    </span></td><td class="text-right"><?= $pnrinfo['offer_amt'].' '.$coupon_code; ?></td></tr>        
                                                    <?php
                                                }if ($pnrinfo['gst_percentage'] != 0) {
                                                    ?>
                                                    <tr><td><span class="font600 net_price">GST Amount (<?= $pnrinfo['gst_percentage']; ?>%):</span>
                                                    </td><td class="text-right"><?= $pnrinfo['gst_amt']; ?></td></tr>                                                                                 
                                                <?php }if ($pnrinfo['round_off'] != 0) { ?>
                                                    <tr><td><span class="font600 net_price">Round Off:</span>
                                                    </td><td class="text-right"><?= $pnrinfo['round_off']; ?></td></tr>                                                                                    
                                                <?php }if ($pnrinfo['net_price'] != 0.00) { ?>
                                                    <tr><td><span class="font600 net_price">Paid Amount:</span>
                                                    </td><td class="text-right"><?= $pnrinfo['net_price']; ?></td></tr>                                                                                     
                                                <?php
                                                }?>
                                            </tbody>
                                        </table>
                                         <?php $whereData = array('tpd.isactive' => 1, 'tpd.pnr_no' => $pnrinfo['pnr_no']);
                                            $joins = array(
                                                array(
                                                    'table' => 'trip_master AS tm',
                                                    'condition' => 'tm.id = tpd.trip_id',
                                                    'jointype' => 'INNER'
                                                ),
                                                array(
                                                    'table' => 'user_master AS tmum',
                                                    'condition' => 'tm.user_id = tmum.id',
                                                    'jointype' => 'INNER'
                                                ),
//                                                array(
//                                                    'table' => 'user_master AS bum',
//                                                    'condition' => 'tpd.from_user_id = bum.id',
//                                                    'jointype' => 'INNER'
//                                                ),
                                                array(
                                                    'table' => 'coupon_code_master_history AS ccmhd',
                                                    'condition' => 'tpd.coupon_history_id = ccmhd.id',
                                                    'jointype' => 'LEFT'
                                                ),
                                            );
                                            $columns = 'tpd.*,tm.id AS trip_id,tm.trip_name,tm.trip_code,tmum.user_fullname AS trip_postby,tmum.phone AS trip_contactno,tmum.email AS trip_contactemail,'
                                                    . '(CASE WHEN ccmhd.id IS NOT NULL THEN ccmhd.coupon_code END) AS coupon_code,(CASE WHEN ccmhd.id IS NOT NULL THEN ccmhd.offer_type END) AS offer_type,'
                                                    . '(CASE WHEN ccmhd.id IS NOT NULL THEN ccmhd.percentage_amount END) AS percentage_amount';
                                            $tableData = get_joins('trip_book_pay_details AS tpd', $columns, $joins, $whereData);
                                            if ($tableData->num_rows() > 0) {
                                                 foreach ($tableData->result_array() as $book_pay){
                                                //$book_pay['gst_percentage']=GST_PERCENTAGE;
                                                ?>
                                                <h4 class="section-title">
                                                     <?php if ($book_pay['user_id'] == 0) { echo 'Admin offer'; }else{ echo $book_pay['trip_postby'];} ?> Cost Info</h4>
                                        <table class="table tablesize" style="width: 100%">
                                                    <tbody>
                                                        <tr><td class="table-size"><span class="font600">Vendor/Admin Name: </span></td>
                                                            <td class="table-size text-right"><?php if ($book_pay['user_id'] == 0) { echo 'Admin offer'; }else{ echo $book_pay['trip_postby'];} ?></td></tr>
                                                        <?php if ($book_pay['trip_name'] !=''){ ?>
                                                            <tr><td><span class="font600">Trip Name: </span></td>
                                                            <td class="text-right"><?php echo $book_pay['trip_name']; ?></td></tr>
                                                        <?php }if ($book_pay['user_id'] > 0){ ?>
                                                            <tr><td><span class="font600">Vendor Contact No: </span></td>
                                                            <td class="text-right"><?php echo $book_pay['trip_contactno']; ?></td></tr>
                                                             <tr><td><span class="font600">Vendor Contact Email: </span></td>
                                                            <td class="text-right"><?php echo $book_pay['trip_contactemail']; ?></td></tr>
                                                        <?php } ?>
                                                        <tr><td><span class="font600">Amount: </span></td>
                                                            <td class="text-right"><?= $book_pay['subtotal_trip_price']; ?></td></tr>
                                                        <?php if ($book_pay['offer_amt'] != 0.00) { ?>
                                                        <tr><td><span class="font600 net_price">Offer Amount(-):
                                                                <?php
                                                                if ($book_pay['coupon_code'] != '') {
                                                                    $offer_type = '';
                                                                    if (strpos($book_pay['percentage_amount'], '.00') !== false) {
                                                                        $book_pay['percentage_amount'] = round($book_pay['percentage_amount']);
                                                                    }
                                                                    if ($book_pay['offer_type'] == 2) {
                                                                        $offer_type = '%';
                                                                    }
                                                                    echo $book_pay['coupon_code'] . ' (' . $book_pay['percentage_amount'] . $offer_type . ' OFF)';
                                                                }
                                                                ?>
                                                            </span></td><td class="text-right"><?= $book_pay['offer_amt']; ?></td></tr>  
                                                        
                                                            <?php }
                                                            if ($book_pay['vendor_amt'] != 0.00) {
                                                                ?>
                                                                <tr><td><span class="font600 net_price">Vendor Amount(-):</span></td><td class="text-right"><?= $book_pay['vendor_amt']; ?></td></tr>                                                                              
                                                            <?php }
                                                            if ($book_pay['net_price'] != 0.00) {
                                                                ?>
                                                                <tr><td><span class="font600 net_price">Total Amount:</span></td><td class="text-right"><?= $book_pay['net_price']; ?></td></tr>                                                                              
                                                            <?php }if($book_pay['discount_your_price'] != 0.00) { ?>
                                                                <tr><td><span class="font600 net_price">Discount Your Trip Amount(Cash)(-):</span></td><td class="text-right"><?= $book_pay['discount_your_price']; ?></td></tr>                                                                                  
                                                            <?php }if ($book_pay['servicecharge_amt'] != 0) { ?>
                                                                <tr><td><span class="font600 net_price">Service Charge(-):</span></td><td class="text-right"><?= $book_pay['servicecharge_amt']; ?></td></tr>                                                                                  
                                                            <?php }
                                                         if ($book_pay['gst_percentage'] != 0) {
                                                            ?>
                                                            <tr><td><span class="font600 net_price">GST Amount (<?= $book_pay['gst_percentage']; ?>%):</span>
                                                            </td><td class="text-right"><?= $book_pay['gst_amt']; ?></td></tr>                                                                                 
                                                        <?php }if ($book_pay['round_off'] != 0) { ?>
                                                            <tr><td><span class="font600 net_price">Round Off:</span>
                                                            </td><td class="text-right"><?= $book_pay['round_off']; ?></td></tr>                                                                                    
                                                        <?php } ?>
                                                            <tr><td><span class="font600 net_price">Final Vendor Amount:</span>
                                                            </td><td class="text-right"><?= $book_pay['your_final_amt']; ?></td></tr>                                                                                     
                                                        <?php  if($book_pay['status']==3 && $book_pay['return_paid_status']==3){?>
                                                            <tr class="text-danger"><td><span class="font600 net_price">Refund Amount:</span>
                                                            </td><td class="text-right"><?= $book_pay['return_paid_amt']; ?></td></tr>                                                                                    
                                                        <?php }?>  
                                                    </tbody>
                                                </table>

                                                <?php 
                                                 }
                                            }
                                            ?>
                                        
                                        
                                        
                                        
                                        

                                        
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
                                            <li><i class="ri-microphone text-primary"></i> <strong class="vendor_phone">Hotline:</strong> <?= $pnrinfo['trip_contactno']; ?></li>
                                            <li><i class="ri ri-envelope text-primary"></i> <strong class="vendor_email">Email:</strong><?= $pnrinfo['trip_contactemail']; ?></li>
                                        </ul>

                                        <div class="mb-50 text-center">

                                            <div class="mb-15"></div>

                                            <a href="javascript:;" class="btn btn-primary btn-wide pnr_print"><i class="ion-android-print"></i> Print</a>

                                        </div>
                                    </div>
                                </div>
<?php } ?>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- end Main Wrapper -->
<?php $this->load->view('includes/footer') ?>
	
