<?php $this->load->view('includes/header') ?>
<style>
    #b2c-auto-suggestion-form .dropdown-menu{
        min-width: 100%!important;
    }
    #b2c-auto-suggestion-form .dropdown-menu>.active>a, 
    #b2c-auto-suggestion-form .dropdown-menu>.active>a:focus,
    #b2c-auto-suggestion-form .dropdown-menu>.active>a:hover {
        background-color: #ee7d43;           
    }
     
</style>
<div class="main-wrapper scrollspy-container">

    <!-- start hero-header -->
    <div class="hero img-bg-01">
        <div class="container">

            <h1>Where do you want to go?</h1>
            <p>Discover and book your unique travel experiences offered by local experts</p>

            <?php echo form_open_multipart(base_url() . 'trip-list', array('method' => 'get','class' => 'form-horizontal margin-top-30', 'id' => 'b2c-auto-suggestion-form')); ?>
 
                <div class="form-group">
                    <input type="text" name="search" id="pick_loc_auto_suggestion" placeholder="Search for activities, tours, city,location... eg: goa, boating " class="form-control" autocomplete="off" >
                    <button class="btn"><i class="icon-magnifier"></i></button>
                </div>
            <?php echo form_close(); ?>

            <div class="top-search">
                <span class="font700">Top Searches : </span>
                <a href="<?=base_url()?>trip-list?search=Goa">Goa</a>
                <a href="<?=base_url()?>trip-list?search=Boating">Boating</a>
                <a href="<?=base_url()?>trip-list?search=Water Rides">Water Rides</a>
            </div>

        </div>

    </div>

    <div class="post-hero clearfix">

        <div class="container">

            <div class="row">

                <div class="col-xs-12 col-sm-4 mb-20-xs">
                    <div class="horizontal-featured-icon-sm clearfix">
                        <div class="icon"><img src="<?php echo base_url() ?>assets/images/service_01.png" width="40" alt="images" /> </div>
                        <div class="content">
                            <h6>Wide Range</h6>
                            <span>10,000+ Travel Experiences</span>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-4 mb-20-xs">
                    <div class="horizontal-featured-icon-sm clearfix">
                        <div class="icon"> <img src="<?php echo base_url() ?>assets/images/service_02.png" width="40" alt="images" /> </div>
                        <div class="content">
                            <h6>Easy Booking</h6>
                            <span>Instant book with suppliers in real time</span>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-4 mb-20-xs">
                    <div class="horizontal-featured-icon-sm clearfix">
                        <div class="icon"> <img src="<?php echo base_url() ?>assets/images/service_03.png" width="25" alt="images" /> </div>
                        <div class="content">
                            <h6>Customer Experience</h6>
                            <span>With 96.8 % NPS – We are good in our job. </span>
                        </div>
                    </div>
                </div>

            </div>

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
//                                    'parenttrip_id' => $row['id'], 
//                                'login_user_id' =>0,'ischeckadmin' => 0,'date_of_trip' =>date('Y-m-d'));
//                            $offerinfo = trip_offer($offerdata);
//                            $offer_type=0;$discount_price=0;
//                            if($offerinfo['offer_type']!=0){
//                                $discount_price=$offerinfo['offer_type']==1?round($offerinfo['discount_price']):round($offerinfo['discount_price'].'%');
//                            }
                            ?>
                    <div class="GridLex-col-3_sm-6_xs-6_xss-12">

                        <div class="top-destination-item">
                            <a href="<?php echo base_url() ?>trip-list?category_id=<?=$row['id']?>">
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
                                <p>Tour Operators</p>
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
                            <h2 class="alt-font-size">CREATE YOUR TRIP</h2>
                            <p class="mb-20">Just Sign in and enter the details of all your trips. All your associates will be able to sell and book all your trips for you Online without calling you. And you will get the real time updates.</p>
                            <a data-toggle="modal" href="#registerModal" class="btn btn-primary btn-lg">JOIN TO SELL MORE</a>
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
                                    'parenttrip_id' => $row['id'], 
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
                                    'parenttrip_id' => $row['id'], 
                                'login_user_id' =>0,'ischeckadmin' => 0,'date_of_trip' =>date('Y-m-d'));
                            $offerinfo = trip_offer($offerdata);
                            $offer_type=0;$discount_price=0;
                            if($offerinfo['offer_type']!=0){
                                $discount_price=$offerinfo['offer_type']==1?round($offerinfo['discount_price']):round($offerinfo['discount_price'].'%');
                            }
                            ?>
            <div class="GridLex-col-3_sm-6_xs-6_xss-12">

                <div class="top-destination-item">
                    <a href="<?=base_url()?>trip-view/<?=$row['trip_code']?>">
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
		
