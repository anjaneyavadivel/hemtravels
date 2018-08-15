<?php $this->load->view('includes/header') ?>
<!-- start Main Wrapper -->

<div class="main-wrapper scrollspy-container">

    <div class="featured-bg pt-80 pb-60 img-bg-02">

        <div class="container">

            <div class="row">

                <div class="col-md-10 col-md-offset-1">

                    <div class="row gap-0">

                        <div class="col-xss-6 col-xs-6 col-sm-3">
                            <div class="counting-item">
                                <a href="booking-reports.html">
                                    <div class="icon">
                                        <i class="icon-Controller"></i>
                                    </div>
                                    <p class="number">12</p>
                                    <p>New Booking</p>
                                </a>
                            </div>
                        </div>

                        <div class="col-xss-6 col-xs-6 col-sm-3">
                            <div class="counting-item">
                                <a href="booking-reports.html">
                                    <div class="icon">
                                        <i class="icon-Resume"></i>
                                    </div>
                                    <p class="number">142</p>
                                    <p>Total Booking</p>
                                </a>
                            </div>
                        </div>

                        <div class="col-xss-6 col-xs-6 col-sm-3">
                            <div class="counting-item">
                                <a href="my-transaction.html">
                                    <div class="icon">
                                        <i class="icon-location-pin"></i>
                                    </div>
                                    <p class="number">26</p>
                                    <p>Total Trips</p>
                                </a>
                            </div>
                        </div>

                        <div class="col-xss-6 col-xs-6 col-sm-3">
                            <div class="counting-item">
                                <a href="my-tour.html">
                                    <div class="icon">
                                        <i class="icon-Wallet"></i>
                                    </div>
                                    <p class="number">1260.50</p>
                                    <p>Your Balance</p>
                                </a>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>



        <!--			<div class="clearfix">
                                
                                        <div class="container pt-90 pb-60">
        
                                                <div class="row">
                                                        
                                                        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                                        
                                                                <div class="fearured-join-item">
                                                                        <h2 class="alt-font-size">Create Your Trip?</h2>
                                                                        <p class="mb-20">Rooms oh fully taken by worse do. Points afraid but may end law lasted. Was out laughter raptures returned outweigh outward the him existence assurance.</p>
                                                                        <a href="create_trip.html" class="btn btn-primary btn-lg">Join for Guide</a>
                                                                </div>
                                                        
                                                        </div>
                                                
                                                </div>
                                        
                                        </div>
        
                                </div>-->
    </div>
</div>
<div class="bg-white">

    <div class="container pt-70 clearfix">
        <div class="col-xs-12 col-sm-8 col-md-8 mb-30">
            <div class="">
                <div class="tab-style-01-wrapper">

                    <ul class="tab-nav">
                        <li class="active"><a href="#mytriptab" data-toggle="tab" aria-expanded="true">MY TRIP</a></li>
                        <li class=""><a href="#tshare" data-toggle="tab" aria-expanded="true">VENDOR SHARED TRIP</a></li>

                    </ul>
                    <div class="tab-content">

                        <div class="tab-pane fade active in" id="mytriptab">
                            <span class="text-right col-xs-12">
                                <a href="triplist">View All<i class="ion-android-arrow-forward"></i></a></span>
                            <div class="tab-inner">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th>Post Date</th>
                                            <th>Trip Tittle</th>
                                            <th>Trip Amount</th>
                                            <th>Total Booking</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
                    if (isset($trip_booking_list) && count($trip_booking_list) > 0) {
                        foreach ($trip_booking_list as $row) {
                            
									{
                                    
										$id=$row['id'];	
										$created_on=$row['created_on'];
										$trip_name=$row['trip_name'];
										$total_booking=$row['total_booking'];
										$price_to_adult=$row['price_to_adult'];
										
										$status=$row['status'];
										$status_val = array('Closed','Open');
										$sts=explode(",",$status);
										foreach($sts as $vals)
										{
										$isactive=$row['isactive'];
										$status_active = array('deactive','active');
										$int=explode(",",$isactive); 
										$btn_type=array('text-danger','text-info');	
										foreach($int as $val)
										{
										?>
                                        <tr>
                                        <td><?=date("d/M/y",strtotime($created_on));?></td>
                                            <td> <a href="view.html"><?=$trip_name; ?></a></td>
                                            <td><?=$price_to_adult; ?></td>
                                            <td><?=$total_booking; ?></td>
                                            <td><h4 class="text-info"><?=$status_active[$val]; ?></h4></td>
                                            <td>
                                                <a href="view.html" class="btn btn-sm btn-primary btn-border "><i class="ion-eye"></i> View</a>
                                                <a class="btn btn-primary btn-sm btn-border" data-toggle="modal" href="#share"   data-toggle="tooltip" data-placement="top" data-original-title="Share Trip to other vendor"><i class="ion-android-share"></i> Share</a>
                                            </td>
                                        </tr>
                                       <?php
							}
						}
						}
						}
					}
?> 
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="tab-pane fade in" id="tshare">
                            <span class="text-right col-xs-12">
                                <a href="shared_trips.html">View All<i class="ion-android-arrow-forward"></i></a></span>
                            <div class="tab-inner">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th>Shared Date</th>
                                            <th>Shared By</th>
                                            <th>Email of Vendor</th>
                                            <th>Trip Tittle</th>
                                            <th>Shared Status</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>10/Feb/2018</td>
                                            <td>Sam</td>
                                            <td>sam@gmail.com</td>
                                            <td class="text-primary">Cycling</td>
                                            <td><h4 class="text-info">Active</h4></td>
                                            <td><h4 class="text-info">New</h4></td>
                                            <td><a href="view.html" class="btn btn-sm btn-primary btn-border">View</a>
                                                <a href="create_vendors_trip.html" class="btn btn-sm btn-primary btn-border">Make Trip</a></td>
                                        </tr>
                                        <tr>
                                            <td>10/Feb/2018</td>
                                            <td>Sam</td>
                                            <td>sam@gmail.com</td>
                                            <td class="text-primary">Cycling</td>
                                            <td><h4 class="text-danger">Deactive</h4></td>
                                            <td><h4 class="text-info">New</h4></td>
                                            <td><a href="view.html" class="btn btn-sm btn-primary btn-border">View</a></td>
                                        </tr>
                                        <tr>
                                            <td>10/Feb/2018</td>
                                            <td>Sam</td>
                                            <td>sam@gmail.com</td>
                                            <td class="text-primary">Cycling</td>
                                            <td><h4 class="text-info">Active</h4></td>
                                            <td><h4 class="text-color-02">Maked Trip</h4></td>
                                            <td><a href="view.html" class="btn btn-sm btn-primary btn-border">View</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-4 col-md-4 mb-30">

            <div class="tab-style-01-wrapper">

                <ul class="tab-nav">
                    <li class="active"><a href="#tab-style-01-01" data-toggle="tab" aria-expanded="true">New Booking</a></li>
                    <li class=""><a href="#tab-style-01-02" data-toggle="tab" aria-expanded="false">All Booking</a></li>
                </ul>
                <div class="tab-content">

                    <div class="tab-pane fade active in" id="tab-style-01-01">
<?php
                    if (isset($trip_list) && count($trip_list) > 0) {
                        foreach ($trip_list as $row) {
                            $trip_name = $row['trip_name'];
                            $booked_on = $row['booked_on'];
                            $user_fullname = $row['user_fullname'];
							$no_of_traveller = $row['no_of_traveller'];
                            ?>
                        <div class="tab-inner">
                            <span class="text-right col-xs-12">
                                <a href="booking-reports.html">View All<i class="ion-android-arrow-forward"></i></a></span>
                            <div class="user-long-sm-item clearfix mb-20">
                                <div class="tab-inner">
                                    <h3 class="mb-10"><?=$user_fullname; ?></h3>
                                    <p><b>Booked On :</b> <?=date("d/M/y",strtotime($booked_on));?> <b>No of Travellor: </b><?=$no_of_traveller; ?></p>
                                    <p><b>Trip Tittle :</b> <?=$trip_name; ?></p>
                                    <span class="labeling">More Details: </span>
                                    <a href="payment-done.html">view <i class="ion-android-arrow-forward"></i></a>

                                </div>
                            </div> 
                        </div>
						<?php
						}
					}
					?>

                    </div>

                    <div class="tab-pane fade" id="tab-style-01-02">


                        <div class="tab-inner">
                            <span class="text-right col-xs-12">
                                <a href="triplist">View All<i class="ion-android-arrow-forward"></i></a></span>
                    <?php
                    if (isset($trip_booking_list) && count($trip_booking_list) > 0) {
                        foreach ($trip_booking_list as $row) {
                            $trip_name = $row['trip_name'];
                            $booked_on = $row['booked_on'];
                            $user_fullname = $row['user_fullname'];
							$no_of_traveller = $row['no_of_traveller'];
                            ?>
							<div class="user-long-sm-item clearfix mb-20">
                                <div class="tab-inner">
                                    <h3 class="mb-10"><?=$user_fullname; ?></h3>
                                    <p><b>Booked On :</b> <?=date("d/M/y",strtotime($booked_on));?>  <b>No of Travellor: </b><?=$no_of_traveller; ?></p>
                                    <p><b>Trip Tittle :</b> <?=$trip_name; ?></p>
                                    <span class="labeling">More Details: </span>
                                    <a href="payment-done.html">view <i class="ion-android-arrow-forward"></i></a>

                                </div>


                            </div>
                            <?php
						}
					}
					?>
                        </div>

                    </div>



                </div>

            </div>
        </div>
    </div>


</div>
<div class="bg-white">

    <div class="container pt-70 pb-60 clearfix">

        <div class="row">

            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">

                <div class="section-title">

                    <h2>Your recent trips</h2>

                </div>

            </div>

        </div>
        <div class="mb-80">

            <div class="GridLex-gap-20 GridLex-gap-15-mdd GridLex-gap-10-xs">

                <div class="GridLex-grid-noGutter-equalHeight   mhn-slide owl-carousel ">
                    <?php
                    if (isset($trippost_list) && count($trippost_list) > 0) {
                        foreach ($trippost_list as $row) {
                            $trip_name = $row['trip_name'];
                            $trip_img_name = $row['trip_img_name'];
                            $created_on = $row['created_on'];
                            $offerdata = array('trip_id' =>$row['id'],
                                'login_user_id' =>0,'ischeckadmin' => 0,'date_of_trip' =>date('Y-m-d'));
                            $offerinfo = trip_offer($offerdata);
                            $offer_type=0;$discount_price=0;
                            if($offerinfo['offer_type']!=0){
                                $discount_price=$offerinfo['offer_type']==1?round($offerinfo['discount_price']):round($offerinfo['discount_price'].'%');
                            }
                            ?>
                            <div class="GridLex-col-3_sm-6_xs-6_xss-12  mhn-item ">

                                <div class="top-destination-item mhn-inner">
                                    <a href="<?=base_url()?>trip-view">
                                        <?php if($discount_price!=0){?>
                                        <div class="price_off2 mr-10"><?=$discount_price?> OFF</div>
                                        <?php }?>
                                        <div class="image">
                                            <img src="<?php echo trippic($trip_img_name) ?>" alt="images" />
                                        </div>
                                        <div class="up_style">
                                            <p href="#" class="btn_primary"><?= character_limiter($trip_name, 30); ?>
                                                <!--                                                    <br>10+ Packages</p>-->
                                            <p href="#" class="btn_primary"></p>
                                            <h4 class="uppercase"><span>Explore</span></h4>

                                        </div>										
                                    </a>
                                </div>

                            </div>
        <?php
    }
}
?>
                </div>

            </div>

        </div>

    </div>

</div>


<div class="mb-80"><div class="container">

        <div class="row">

            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">

                <div class="section-title">

                    <h2>Your popular TRIPS</h2>

                </div>

            </div>

        </div>

    </div>


    <div class="GridLex-gap-20 GridLex-gap-15-mdd GridLex-gap-10-xs popular_trip">
        <div class="GridLex-grid-noGutter-equalHeight">
		<?php
                    if (isset($trip_popular_list) && count($trip_popular_list) > 0) {
                        foreach ($trip_popular_list as $row) {
                            $trip_name = $row['trip_name'];
                            $trip_img_name = $row['trip_img_name'];
                            $created_on = $row['created_on'];
                            $offerdata = array('trip_id' =>$row['id'],
                                'login_user_id' =>0,'ischeckadmin' => 0,'date_of_trip' =>date('Y-m-d'));
                            $offerinfo = trip_offer($offerdata);
                            $offer_type=0;$discount_price=0;
                            if($offerinfo['offer_type']!=0){
                                $discount_price=$offerinfo['offer_type']==1?round($offerinfo['discount_price']):round($offerinfo['discount_price'].'%');
                            }
                            ?>
            <div class="GridLex-col-3_sm-6_xs-6_xss-12">

                <div class="top-destination-item">
                    <a href="<?=base_url()?>trip-view">
                                        <?php if($discount_price!=0){?>
                                        <div class="price_off2 mr-10"><?=$discount_price?> OFF</div>
                                        <?php }?>
                        <div class="image">
                            <img src="<?php echo trippic($trip_img_name) ?>" alt="images" />
                        </div>
                        <div class="up_style">
                            <p href="#" class="btn_primary"><?= character_limiter($trip_name, 30); ?>
                                <!--<br>10+ Packages--></p>
                            <h4 class="uppercase"><span>Explore</span></h4>

                        </div>										
                    </a>
                </div>
            </div>
			<?php
    }
}
?>
        
        </div>
    </div>
</div>
</div>

<!-- end Main Wrapper -->
<!-- start Footer Wrapper -->

<?php $this->load->view('includes/footer') ?>
		
