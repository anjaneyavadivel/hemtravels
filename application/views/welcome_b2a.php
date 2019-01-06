<?php $this->load->view('includes/header') ?>
<div class="main-wrapper scrollspy-container">

    <!-- start hero-header -->

    <div class="main-wrapper scrollspy-container">

        <div class="featured-bg pt-80 pb-60 img-bg-02">

            <div class="container">

                <div class="row">

                    <div class="col-md-10 col-md-offset-1">

                        <div class="row gap-0">

                            <div class="col-xss-6 col-xs-6 col-sm-3">
                                <div class="counting-item">
                                    <a href="<?php echo base_url() ?>booking-wise-reports?from=<?= date('M d, Y') ?>&to=<?= date('M d, Y') ?>&status=&bookfrom=&title=">
                                        <div class="icon">
                                            <i class="icon-Controller"></i>
                                        </div>
                                        <p class="number"><?= $total_totday_booking ?></p>
                                        <p>Today Booking</p>
                                    </a>
                                </div>
                            </div>

                            <div class="col-xss-6 col-xs-6 col-sm-3">
                                <div class="counting-item">
                                    <a href="<?php echo base_url() ?>booking-wise-reports">
                                        <div class="icon">
                                            <i class="icon-Resume"></i>
                                        </div>
                                        <p class="number"><?= $total_booking ?></p>
                                        <p>Total Booking</p>
                                    </a>
                                </div>
                            </div>

                            <div class="col-xss-6 col-xs-6 col-sm-3">
                                <div class="counting-item">
                                    <a href="<?php echo base_url() ?>Trip-wise-reports">
                                        <div class="icon">
                                            <i class="icon-location-pin"></i>
                                        </div>
                                        <p class="number"><?= $total_trip ?></p>
                                        <p>Total Trips</p>
                                    </a>
                                </div>
                            </div>

                            <div class="col-xss-6 col-xs-6 col-sm-3">
                                <?php
                                if ($this->session->userdata('user_type') == 'SA') {
                                    $loginuser_id = 0;
                                } else {
                                    $loginuser_id = $this->session->userdata('user_id');
                                }
                                ?>
                                <div class="counting-item">
                                    <a href="<?php echo base_url() ?>my-transaction-reports">
                                        <div class="icon">
                                            <i class="icon-Wallet"></i>
                                        </div>
                                        <p class="number"><?= checkbal_mypayment($loginuser_id, 2) ?></p>
                                        <p>Your Balance</p>
                                    </a>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>



        </div>
        <div class="bg-white">

            <div class="container pt-70 clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 mb-30">
                    <div class="">
                        <div class="tab-style-01-wrapper">

                            <ul class="tab-nav">
                                <li class="active"><a href="#BookingList" data-toggle="tab" aria-expanded="true">Booking List</a></li>
                                <li class=""><a href="#CancellationList" data-toggle="tab" aria-expanded="true">Cancellation List</a></li>
                                <li class=""><a href="#TripList" data-toggle="tab" aria-expanded="true">Trip List</a></li>

                            </ul>
                            <div class="tab-content">

                                <div class="tab-pane fade active in" id="BookingList">
                                    <span class="text-right col-xs-12">
                                        <a href="<?php echo base_url() ?>booking-wise-reports">View All<i class="ion-android-arrow-forward"></i></a></span>
                                    <div class="tab-inner">
                                        <div class="table-responsive">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th>Booked On</th>
                                                    <th>PNR No</th>
                                                    <th>Booked From</th>
                                                    <th>Trip Title</th>
                                                    <th>Date of Trip</th>
                                                    <th>Pickup Location</th>
                                                    <th>No of Travellers</th>
                                                    <th>Total Amount</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (isset($bookinglist) && count($bookinglist) > 0) {
                                                    $i = 1;
                                                    foreach ($bookinglist as $row) {
                                                        $pnr_no = $row['pnr_no'];
                                                        $status = $row['status'];
                                                        $user_type = $row['user_type'];
                                                        $status_val = array('New', 'Pending', 'Booked', 'Cancelled', 'Confirmed', 'Completed');
                                                        $user_type_val = array('CU' => 'B2C Booking', 'GU' => 'B2C Booking', 'VA' => 'Office Booking');
                                                        ?>
                                                        <tr>
                                                            <td><?= date("M d, Y", strtotime($row['booked_on'])); ?></td>
                                                            <td><?= $pnr_no; ?></td>
                                                            <td><?= $user_type_val[$user_type] ?></td>
                                                            <td><a href="<?= base_url() ?>trip-view/<?= $row['trip_code']; ?>" target="_new"><?= $row['trip_name']; ?></a></td>
                                                            <td><?= date("M d, Y", strtotime($row['date_of_trip'])); ?></td>
                                                            <td><?= $row['pick_up_location']; ?></td>
                                                            <td><?= $row['number_of_persons']; ?></td>
                                                            <td><?= $row['total_trip_price']; ?></td>
                                                            <td><h4 class="text-info"  data-toggle="tooltip" data-placement="top" data-original-title="Booking status <?= $status_val[$status] ?>"><?= $status_val[$status]; ?></h4></td>
                                                            <td>
                                                                <div class="dropdown">
                                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
                                                <span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                  <?php if ($this->session->userdata('user_type') == 'VA' && $row['status']==1 && date("Y-m-d", strtotime($row['date_of_trip']))>date('Y-m-d')) {?>
                                            <li><a href="<?=base_url()?>PNR-status/<?=$pnr_no?>/66" target="_new"><i class="fa fa-money"></i> View & Pay</a></li>
                                            <?php }else{?>
                                              <li> <a href="<?=base_url()?>PNR-status/<?=$pnr_no?>/1" target="_new"><i class="fa fa-eye"></i> View Ticket</a></li>
                                            <?php }if ($this->session->userdata('user_type') == 'VA') {?>
                                            <li><a href="<?=base_url()?>PNR-status/<?=$pnr_no?>/2" target="_new"><i class="fa fa-eye"></i> Your Report</a></li>
                                            <?php }if ($this->session->userdata('user_type') == 'SA') {?>
                                            <li><a href="<?=base_url()?>PNR-status-report/<?=$pnr_no?>" target="_new"><i class="fa fa-eye"></i> Your Report</a></li>
                                            <?php }if (($row['status']!=1)) {?>
                                              <li> <a href="<?=base_url()?>pay-history-reports?title=<?=$pnr_no?>" target="_new"><i class="fa fa-money"></i> View Pay History</a></li>
                                            <?php }if ($this->session->userdata('user_type') == 'VA' && ($row['status']==2||$row['status']==4) && date("Y-m-d", strtotime($row['date_of_trip']))>date('Y-m-d')) {?>
                                            <li><a href="<?=base_url()?>PNR-status/<?=$pnr_no?>/3" target="_new"><i class="fa fa-remove"></i> Cancel Trip</a></li>
                                            <?php }?>
                                            
                                                </ul>
                                            </div>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='10' style='text-align:center'>No Data Found</td></tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div> </div>

                                </div>
                                <div class="tab-pane fade in" id="CancellationList">
                                    <span class="text-right col-xs-12">
                                        <a href="<?php echo base_url() ?>cancellation-reports">View All<i class="ion-android-arrow-forward"></i></a></span>
                                    <div class="tab-inner">
                                        <div class="table-responsive">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th>Cancelled On</th>
                            <th>PNR No</th>
                            <th>Booked From</th>
                            <th>Trip Title</th>
                            <th>Date of Trip</th>
                            <th>No of  Travellers</th>
                            <th>Total Amount</th>
                            <th>Cancellation / Return Paid Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                        if (isset($cancellist) && count($cancellist) > 0) {
                            $i = 1;
                            foreach ($cancellist as $row) {
                                $pnr_no = $row['pnr_no'];
                                $status = $row['return_paid_status'];
                                $user_type = $row['user_type'];
                                $status_val = array('New', 'New', 'InProgress', 'Paid');
                                $user_type_val = array('CU'=>'B2C Booking','GU'=>'B2C Booking','VA'=>'Office Booking');
                                    ?>
                                    <tr>
                                        <td><?= date("M d, Y", strtotime($row['cancelled_on'])); ?></td>
                                        <td><?= $pnr_no;?></td>
                                        <td><?=$user_type_val[$user_type]?></td>
                                        <td><a href="<?=base_url()?>trip-view/<?= $row['trip_code']; ?>" target="_new"><?= $row['trip_name']; ?></a></td>
                                        <td><?= date("M d, Y", strtotime($row['date_of_trip'])); ?></td>
                                        <td><?= $row['number_of_persons']; ?></td>
                                        <td><?= $row['total_trip_price']; ?></td>
                                        <td><?= $row['return_paid_amt']; ?></td>
                                        <td><h4 class="text-info"  data-toggle="tooltip" data-placement="top" data-original-title="Cancel status <?=$status_val[$status]?>"><?= $status_val[$status]; ?></h4></td>
                                        <td><a href="<?=base_url()?>PNR-status/<?=$pnr_no?>/2" target="_new" class="btn btn-border btn-sm btn-primary">View</a>
                                            <?php /*if($row['trip_id']==$row['from_trip_id'] && $this->session->userdata('user_type') == 'VA'){?>
                                            <a href="javascript:void(0)" class="btn btn-border btn-sm btn-primary">Update Status</a>
                                            <?php }*/?>
                                       </td>
                                    </tr>
            <?php
    }
}
?> 	

                                            </tbody>
                                        </table>
                                    </div></div>

                                </div>
                                <div class="tab-pane fade in" id="TripList">
                                    <span class="text-right col-xs-12">
                                        <a href="<?php echo base_url() ?>Trip-wise-reports">View All<i class="ion-android-arrow-forward"></i></a></span>
                                    <div class="tab-inner">
                                        <div class="table-responsive">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th>Trip Code</th>
                                                    <th>Trip Name</th>                            
                                                    <th>Category</th>                            
                                                    <th>State</th>                            
                                                    <th>City</th>                            
                                                    <th>Price to Adult</th>
                                                    <th>Price to Children</th>
                                                    <th>Price to Infan</th>
                                                    <th>Posted By</th>                            
                                                    <th>Posted On</th>                            
                                                    <th>Status</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (isset($triplist) && count($triplist) > 0) {
                                                    $i = 1;
                                                    foreach ($triplist as $row) {
                                                        // $view_to = $row['view_to'] == 2 ?'Vendor':'Customer & Vendor';
                                                        $isactive = $row['isactive'] == 1 ? 'Active' : 'Inactive';
                                                        $status_val = array('New', 'Pending', 'Booked', 'Cancelled', 'Confirmed', 'Completed');
                                                        $user_type_val = array('CU' => 'B2C Booking', 'GU' => 'B2C Booking', 'VA' => 'Office Booking');
                                                        ?>
                                                        <tr>                                        
                                                            <td><?= $row['trip_code']; ?></td>
                                                            <td><?= $row['trip_name']; ?></td>                                        
                                                            <td><?= $row['category']; ?></td>
                                                            <td><?= $row['state']; ?></td>
                                                            <td><?= $row['city']; ?></td>
                                                            <td><?= $row['price_to_adult']; ?></td>
                                                            <td><?= $row['price_to_child']; ?></td>
                                                            <td><?= $row['price_to_infan']; ?></td>
                                                            <td><?= $row['user_fullname']; ?></td>
                                                            <td><?= date("M d, Y", strtotime($row['created_on'])); ?></td>
                                                            <td><?= $isactive ?></td>
                                                            <td><a href="<?= base_url() ?>trip-view/<?= $row['trip_code'] ?>" target="_new" class="btn btn-border btn-sm btn-primary">View</a></td>                                       
                                                        </tr>
                                                        <?php
                                                        //$i++;
                                                    }
                                                } else {
                                                    echo "<td colspan='13' style='text-align:center'>No Data Found</td>";
                                                }
                                                ?> 
                                            </tbody>
                                        </table>
                                    </div></div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="bg-white">

            <div class="container pt-70 clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 mb-30">
                    <div class="">
                        <div class="tab-style-01-wrapper">

                            <ul class="tab-nav">
                                <li class="active"><a href="#MyTransaction" data-toggle="tab" aria-expanded="true">My Transaction</a></li>
                                <li class=""><a href="#PaymentfromB2C" data-toggle="tab" aria-expanded="true">Payment from B2C</a></li>
                                <li class=""><a href="#PaymentfromB2B" data-toggle="tab" aria-expanded="true">Payment from B2B</a></li>
                                <li class=""><a href="#PaymenttoB2B" data-toggle="tab" aria-expanded="true">Payment to B2B</a></li>
                         
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="MyTransaction">
                                    <span class="text-right col-xs-12">
                                        <a href="<?php echo base_url() ?>my-transaction-reports">View All<i class="ion-android-arrow-forward"></i></a></span>
                                    <div class="tab-inner">
                                        <div class="table-responsive">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th>Date &amp; Time</th>
                                                        <th>From</th>
                                                        <th>To</th>
                                                        <th>Transaction Details</th>
                                                        <th>Withdrawals (INR)</th>
                                                        <th>Deposits (INR)</th>
                                                        <th>Balance(INR)</th>
                                                        <th>Status</th>     
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                        if (isset($transaction_reports) && count($transaction_reports) > 0) {
                                                            $i = 1;
                                                            foreach ($transaction_reports as $row) {                                                                                                              
                                                                $status_val = array('New', 'InProgress', 'Executed', 'Sent');
                                                                    $fromuser = $row['fromuser'];
                                                                    $touser = $row['touser'];
                                                                    if($row['from_userid']==0){$fromuser = 'Admin';}
                                                                    if($row['to_userid']==0){$touser = 'Admin';}
                                                                    ?>
                                                                    <tr>
                                                                        <td><?= date("M d, Y", strtotime($row['date_time'])); ?></td>
                                                                        <td><?= $fromuser ?></td>
                                                                        <td><?= $touser ?></td>
                                                                        <td><?= $row['transaction_notes'] ?></td>
                                                                        <td <?php if($row['withdrawals']!=0){echo 'class="text-primary"';}?>><?= $row['withdrawals']; ?></td>
                                                                        <td <?php if($row['deposits']!=0){echo 'class="text-info"';}?>><?= $row['deposits']; ?></td>
                                                                        <td><h4><?= $row['balance']; ?></h4></td>                                                                       
                                                                        <td> <span data-toggle="tooltip" data-placement="top" data-original-title="Payment status <?=$status_val[$row['status']]?>"><?= $status_val[$row['status']]; ?></span></td>                                                        
                                                                    </tr>
                                                            <?php
                                                            }
                                                    }else{
                                                        echo "<tr><td colspan='6' style='text-align:center'>No Data Found</td></tr>";
                                                    }
                                                    ?> 	
                                            </tbody>
                                        </table>
                                    </div></div>

                                </div>
                                <div class="tab-pane fade in" id="PaymentfromB2C">
                                    <span class="text-right col-xs-12">
                                        <a href="<?php echo base_url() ?>payment-from-B2C-reports">View All<i class="ion-android-arrow-forward"></i></a></span>
                                    <div class="tab-inner">
                                        <div class="table-responsive">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th>Booked On</th>
                                        <th>PNR No</th>                                        
                                        <th>Trip Title</th>
                                        <th>No of Persons</th>
                                        <th>Total Trip Price</th>
                                        <th><span style="color: #FE8800" data-toggle="tooltip" data-placement="top" data-original-title="Amount sent to Parent Trip/Vendor">Sent to Parent Trip/Vendor Price</span></th>
                                        <th>Offer Amount</th>
                                        <th>Service Charge</th>
                                        <th>GST Amount</th>
                                        <th>Your Final Amount</th>                                        
                                        <th>Status</th>        
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                        if (isset($b2c_reports) && count($b2c_reports) > 0) {
                                            $i = 1;
                                            foreach ($b2c_reports as $row) {
                                                $pnr_no = $row['pnr_no'];
                                                $status = $row['tra_status'];                                                
                                                $status_val = array('New', 'InProgress', 'Executed', 'Sent');
                                                
                                                    ?>
                                                    <tr>
                                                        <td><?= date("M d, Y", strtotime($row['booked_on'])); ?></td>
                                                        <?php if($this->session->userdata('user_type') == 'SA'){  ?>
                                                        <td><a href="<?=base_url()?>PNR-status-report/<?= $row['pnr_no']; ?>" target="_new"><?= $pnr_no; ?></a></td>                                                        
                                                        <?php }else{  ?>
                                                        <td><a href="<?=base_url()?>PNR-status/<?= $row['pnr_no']; ?>/2" target="_new"><?= $pnr_no; ?></a></td>                                                        
                                                        <?php }  ?>
                                                        <td><a href="<?=base_url()?>trip-view/<?= $row['trip_code']; ?>" target="_new"><?= $row['trip_name']; ?></a></td>                                                        
                                                        <td><?= $row['number_of_persons']; ?></td>
                                                        <td><?= $row['subtotal_trip_price']; ?></td>
                                                        <?php if($row['vendor_amt']>0){?>
                                                        <td><span style="color: #FE8800" data-toggle="tooltip" data-placement="top" data-original-title="Amount sent to Parent Trip (<?=$row['parent_trip_name'];?>) / Vendor Name ( <?=$row['parent_trip_user_name'];?>|<?=$row['parent_trip_user_email'];?> )"><?= $row['vendor_amt']; ?></span></td>
                                                        <?php }else{?>
                                                        <td><?= $row['vendor_amt']; ?></td>
                                                        <?php }?>
                                                        <td><?= $row['offer_amt']; ?></td>
                                                        <td><?= $row['servicecharge_amt']; ?></td>
                                                        <td><?= $row['gst_amt']; ?></td>
                                                        <td><?= $row['your_final_amt']; ?></td>
                                                        <td><h4 class="text-info"  data-toggle="tooltip" data-placement="top" data-original-title="Booking status <?=$status_val[$status]?>"><?= $status_val[$status]; ?></h4></td>                                                        
                                                    </tr>
                                            <?php
                                        }
                                    }else{
                                        echo "<tr><td colspan='10' style='text-align:center'>No Data Found</td></tr>";
                                    }
                                    ?> 	
                                            </tbody>
                                        </table>
                                    </div></div>

                                </div>
                                <div class="tab-pane fade in" id="PaymentfromB2B">
                                    <span class="text-right col-xs-12">
                                        <a href="<?php echo base_url() ?>payment-from-B2B-reports">View All<i class="ion-android-arrow-forward"></i></a></span>
                                    <div class="tab-inner">
                                        <div class="table-responsive">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th>Booked On</th>
                                        <th>PNR No</th>                                        
                                        <th>Trip Title</th>
                                        <th>No of Persons</th>
                                        <th>Total Trip Price</th>
                                        <th><span style="color: #FE8800" data-toggle="tooltip" data-placement="top" data-original-title="Amount sent to Parent Trip/Vendor">Sent to Parent Trip/Vendor Price</span></th>
                                        <th>Offer Amount</th>
                                        <th>Service Charge</th>
                                        <th>GST Amount</th>
                                        <th>Your Final Amount</th>                                        
                                        <th>Status</th>    

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                        if (isset($b2b_from_reports) && count($b2b_from_reports) > 0) {
                                            $i = 1;
                                            foreach ($b2b_from_reports as $row) {
                                                $pnr_no = $row['pnr_no'];
                                                $status = $row['tra_status'];                                                
                                                $status_val = array('New', 'InProgress', 'Executed', 'Sent');
                                                
                                                    ?>
                                                    <tr>
                                                        <td><?= date("M d, Y", strtotime($row['booked_on'])); ?></td>
                                                        <?php if($this->session->userdata('user_type') == 'SA'){  ?>
                                                        <td><a href="<?=base_url()?>PNR-status-report/<?= $row['pnr_no']; ?>" target="_new"><?= $pnr_no; ?></a></td>                                                        
                                                        <?php }else{  ?>
                                                        <td><a href="<?=base_url()?>PNR-status/<?= $row['pnr_no']; ?>/2" target="_new"><?= $pnr_no; ?></a></td>                                                        
                                                        <?php }  ?>
                                                        <td><a href="<?=base_url()?>trip-view/<?= $row['trip_code']; ?>" target="_new"><?= $row['trip_name']; ?></a></td>                                                        
                                                        <td><?= $row['number_of_persons']; ?></td>
                                                        <td><?= $row['subtotal_trip_price']; ?></td>
                                                        <?php if($row['vendor_amt']>0){?>
                                                        <td><span style="color: #FE8800" data-toggle="tooltip" data-placement="top" data-original-title="Amount sent to Parent Trip (<?=$row['parent_trip_name'];?>) / Vendor Name ( <?=$row['parent_trip_user_name'];?>|<?=$row['parent_trip_user_email'];?> )"><?= $row['vendor_amt']; ?></span></td>
                                                        <?php }else{?>
                                                        <td><?= $row['vendor_amt']; ?></td>
                                                        <?php }?>
                                                        <td><?= $row['offer_amt']; ?></td>
                                                        <td><?= $row['servicecharge_amt']; ?></td>
                                                        <td><?= $row['gst_amt']; ?></td>
                                                        <td><?= $row['your_final_amt']; ?></td>
                                                        <td><h4 class="text-info"  data-toggle="tooltip" data-placement="top" data-original-title="Booking status <?=$status_val[$status]?>"><?= $status_val[$status]; ?></h4></td>                                                        
                                                    </tr>
                                            <?php
                                        }
                                    }else{
                                        echo "<tr><td colspan='10' style='text-align:center'>No Data Found</td></tr>";
                                    }
                                    ?> 	
                                            </tbody>
                                        </table>
                                    </div></div>

                                </div>
                                <div class="tab-pane fade in" id="PaymenttoB2B">
                                    <span class="text-right col-xs-12">
                                        <a href="<?php echo base_url() ?>payment-to-B2B-reports">View All<i class="ion-android-arrow-forward"></i></a></span>
                                    <div class="tab-inner">
                                        <div class="table-responsive">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                   <th>Booked On</th>
                                        <th>PNR No</th>                                        
                                        <th>Trip Title</th>
                                        <th>No of Persons</th>
                                        <th>Total Trip Price</th>
                                        <th>Vendor Trip Price</th>
                                        <th>Vendor Discount Percentage/ Fixed Price</th>
                                        <th>Total Vendor Discount Amount</th>
                                        <th><span style="color: #FE8800" data-toggle="tooltip" data-placement="top" data-original-title="Amount sent to Parent Trip/Vendor">Sent to Parent Trip/Vendor Price</span></th>
                                        <th>Your Final Amount (SER,GST)</th>                                        
                                        <th>Status</th>     

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                        if (isset($b2b_to_reports) && count($b2b_to_reports) > 0) {
                                            $i = 1;
                                            foreach ($b2b_to_reports as $row) {
                                                $pnr_no = $row['pnr_no'];
                                                $status = $row['tra_status'];                                                
                                                $status_val = array('New', 'InProgress', 'Executed', 'Sent');
                                                
                                                    ?>
                                                   <tr>
                                                        <td><?= date("M d, Y", strtotime($row['booked_on'])); ?></td>
                                                        <?php if($this->session->userdata('user_type') == 'SA'){  ?>
                                                        <td><a href="<?=base_url()?>PNR-status-report/<?= $row['pnr_no']; ?>" target="_new"><?= $pnr_no; ?></a></td>                                                        
                                                        <?php }else{  ?>
                                                        <td><a href="<?=base_url()?>PNR-status/<?= $row['pnr_no']; ?>/2" target="_new"><?= $pnr_no; ?></a></td>                                                        
                                                        <?php }  ?>
                                                        <td><a href="<?=base_url()?>trip-view/<?= $row['trip_code']; ?>" target="_new"><?= $row['trip_name']; ?></a></td>                                                        
                                                        <td><?= $row['number_of_persons']; ?></td>
                                                        <td><?= $row['subtotal_trip_price']; ?></td>
                                                        <td><?= $row['parent_subtotal_trip_price']; ?></td>
                                                        <td><?php if($row['parent_discount_percentage']!='0.00'){
                                                            $discount_percentage = $row['parent_discount_percentage'];
                                                            if (strpos($discount_percentage, '.00') !== false) {
                                                                $discount_percentage = round($discount_percentage);
                                                            }
                                                        echo $discount_percentage.' %';}else{
                                                            echo 'Rs:'.$row['parent_discount_price'];
                                                        }?>
                                                        <td><?= $row['parent_offer_amt']; ?></td>
                                                        <?php if($row['vendor_amt']>0){?>
                                                        <td><span style="color: #FE8800" data-toggle="tooltip" data-placement="top" data-original-title="Amount sent to Parent Trip (<?=$row['parent_trip_name'];?>) / Vendor Name ( <?=$row['parent_trip_user_name'];?>|<?=$row['parent_trip_user_email'];?> )"><?= $row['vendor_amt']; ?></span></td>
                                                        <?php }else{?>
                                                        <td><?= $row['vendor_amt']; ?></td>
                                                        <?php }?>
                                                        <td><?= $row['your_final_amt']; ?></td>
                                                        <td><h4 class="text-info"  data-toggle="tooltip" data-placement="top" data-original-title="Booking status <?=$status_val[$status]?>"><?= $status_val[$status]; ?></h4></td>                                                        
                                                    </tr>
                                            <?php
                                        }
                                    }else{
                                        echo "<tr><td colspan='8' style='text-align:center'>No Data Found</td></tr>";
                                    }
                                    ?> 	
                                            </tbody>
                                        </table>
                                    </div></div>

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

<!-- end Main Wrapper -->

<!-- start Footer Wrapper -->

<?php $this->load->view('includes/footer') ?>
		
