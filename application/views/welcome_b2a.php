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
                                <a href="booking-reports.html">
                                    <div class="icon">
                                        <i class="icon-Controller"></i>
                                    </div>
                                    <p class="number">12</p>
                                    <p>Today Booking</p>
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

    

    <div class="container pt-70 pb-60 clearfix">

        <div class="row">

            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">

                <div class="section-title">

                    <h2>CATEGORY</h2>

                </div>

            </div>

        </div>

        <div class="mb-80">

            <div class="GridLex-gap-20 GridLex-gap-15-mdd GridLex-gap-10-xs">

                <div class="GridLex-grid-noGutter-equalHeight">

                    <?php
                    if (isset($tripcategory_list) && count($tripcategory_list) > 0) {
                        foreach ($tripcategory_list as $row) {
//                            $trip_name = $row['trip_name'];
                            $trip_img_name = '';
//                            $created_on = $row['created_on'];
//                            $offerdata = array('trip_id' =>$row['id'],
//                                'login_user_id' =>0,'ischeckadmin' => 0,'date_of_trip' =>date('Y-m-d'));
//                            $offerinfo = trip_offer($offerdata);
//                            $offer_type=0;$discount_price=0;
//                            if($offerinfo['offer_type']!=0){
//                                $discount_price=$offerinfo['offer_type']==1?round($offerinfo['discount_price']):round($offerinfo['discount_price'].'%');
//                            }
                            ?>
                    <div class="GridLex-col-3_sm-6_xs-6_xss-12">

                        <div class="top-destination-item">
                            <a href="<?php echo base_url() ?>trip-list?category=<?=$row['id']?>">
                                <div class="image">
                                    <img src="<?php echo categorypic($row['img_name']) ?>" alt="<?=$row['name']?>" />
                                </div>
                                <div class="up_style">
                                    <p href="#" class="btn_primary"><?=$row['name']?>
                                        <br><?=$row['totaltrip']?>+ Packages</p>
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
    <div class="featured-bg pt-80 pb-60 img-bg-02">

        <div class="container">

            <div class="row">

                <div class="col-md-10 col-md-offset-1">

                    <div class="row gap-0">

                        <div class="col-xss-6 col-xs-6 col-sm-3">
                            <div class="counting-item">
                                <div class="icon">
                                    <i class="icon-directions"></i>
                                </div>
                                <p class="number">354</p>
                                <p>Packages</p>
                            </div>
                        </div>

                        <div class="col-xss-6 col-xs-6 col-sm-3">
                            <div class="counting-item">
                                <div class="icon">
                                    <i class="icon-user"></i>
                                </div>
                                <p class="number">241</p>
                                <p>Guides</p>
                            </div>
                        </div>

                        <div class="col-xss-6 col-xs-6 col-sm-3">
                            <div class="counting-item">
                                <div class="icon">
                                    <i class="icon-location-pin"></i>
                                </div>
                                <p class="number">142</p>
                                <p>Destinations</p>
                            </div>
                        </div>

                        <div class="col-xss-6 col-xs-6 col-sm-3">
                            <div class="counting-item">
                                <div class="icon">
                                    <i class="icon-envelope-letter"></i>
                                </div>
                                <p class="number">354</p>
                                <p>Requests</p>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>



        <div class="clearfix">

            <div class="container pt-90 pb-60">

                <div class="row">

                    <div class="col-xs-12 col-sm-8 col-sm-offset-2">

                        <div class="fearured-join-item">
                            <h2 class="alt-font-size">Create Your Trip?</h2>
                            <p class="mb-20">Rooms oh fully taken by worse do. Points afraid but may end law lasted. Was out laughter raptures returned outweigh outward the him existence assurance.</p>
                            <a href="#registerModal" class="btn btn-primary btn-lg">Join for Guide</a>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>
</div>
<div class="bg-white">

    <div class="pt-70 pb-60 max-width-wrapper">

        <div class="container">

            <div class="row">

                <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">

                    <div class="section-title">

                        <h2>RECENT TRIPS</h2>

                    </div>

                </div>

            </div>

        </div>

        <div class="community-wrapper mb-30">

            <div class="GridLex-gap-20 GridLex-gap-15-mdd GridLex-gap-10-xs">

                <div class="GridLex-grid-noGutter-equalHeight">
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
                    <div class="GridLex-col-3_mdd-6_sm-6_xs-6_xss-12">

                        <a href="<?=base_url()?>trip-view/<?=$row['trip_code']?>" class="community-item">
                            <?php if($discount_price!=0){?>
                                        <div class="price_off2 mr-10"><?=$discount_price?> OFF</div>
                                        <?php }?>
                            <div class="image-object-fit image-object-fit-cover image">	
                                <img src="<?php echo trippic($trip_img_name) ?>" alt="<?= $trip_name; ?>" />
                            </div>
                            <div class="community-item-category"><span class="bg-danger"><?=$row['statename']?></span></div>
                            <div class="community-item-caption">
                                <h3><?= character_limiter($trip_name, 30); ?></h3>
                                <!-- <p>Evil true high lady roof men had open. To projection considered it precaution...</p> -->
                                <div class="community-item-meta">
                                    <div class="row gap-10">
<!--                                        <div class="col-xs-8 col-sm-8">
                                            by admin on JUL 12, 2018
                                        </div>-->
                                        <div class="col-xs-4 col-sm-4 text-right">
                                            read <i class="icon-arrow-right-circle font12"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>
        <?php
    }
}
?>

<!--                    <div class="GridLex-col-3_mdd-6_sm-6_xs-6_xss-12">

                        <a href="#" class="community-item">
                            <div class="image-object-fit image-object-fit-cover image">	
                                <img src="<?php echo base_url() ?>assets/images/b1.jpg" alt="images" />
                            </div>
                            <div class="community-item-category"><span class="bg-info">BANGALORE</span></div>
                            <div class="community-item-caption">
                                <h3>Explore Electronic City With your Folks</h3>
                                 <p>Dissimilar of favourable solicitude if sympathize middletons at. Forfeited disposing...</p> 
                                <div class="community-item-meta">
                                    <div class="row gap-10">
                                        <div class="col-xs-8 col-sm-8">
                                            by admin on JUL 12, 2018
                                        </div>
                                        <div class="col-xs-4 col-sm-4 text-right">
                                            read <i class="icon-arrow-right-circle font12"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>-->


                </div>

            </div>

        </div>

    </div>

</div>


<div class="mb-80"><div class="container">

        <div class="row">

            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">

                <div class="section-title">

                    <h2>popular TRIPS</h2>

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
                            <img src="<?php echo trippic($trip_img_name) ?>" alt="<?= $trip_name; ?>" />
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
		
