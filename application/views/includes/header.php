<!doctype html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Title Of Site -->
        <title>Book Your Trips </title>

        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- Fav and Touch Icons -->
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url() ?>assets/images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url() ?>assets/images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url() ?>assets/images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon" href="<?php echo base_url() ?>assets/images/ico/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/ico/favicon.png">

        <!-- CSS Plugins -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css" media="screen">	
        <link href="<?php echo base_url() ?>assets/css/main.css" type="text/css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/css/plugin.css" type="text/css" rel="stylesheet">
       
        <!-- CSS Custom -->
        <link href="<?php echo base_url() ?>assets/css/style.css" type="text/css" rel="stylesheet">

        <!-- Add your style -->
        <link href="<?php echo base_url() ?>assets/css/your-style.css" type="text/css" rel="stylesheet">
        
       <?php $url=$this->uri->segment(1);?> 
        <?php if($url=='trip-calendar-view'){?>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/magnific-popup.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/timetable.css">
        <?php }?>
        <?php if($url=='make-new-trip'){?>
		<link type="text/css" href="<?php echo base_url() ?>assets/css/owlcarousel.css" rel="stylesheet">
                <link type="text/css" rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
       
        <?php }?>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
                <script src="<?php echo base_url() ?>assets/https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                <script src="<?php echo base_url() ?>assets/https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->


    </head>

    <body class="<?php echo (base_url() == '') ? 'home' : '' ?> bg-color-header">

        <div id="introLoader55" class="introLoading55"></div>

        <!-- start Container Wrapper -->

        <div class="container-wrapper">

            <!-- start Header -->

            <header id="header">

                <!-- start Navbar (Header) -->
                <nav class="navbar navbar-default navbar-fixed-top navbar-sticky-function navbar-arrow">

                    <div class="container">

                        <div class="logo-wrapper">
                            <div class="logo">
                                <a href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>assets/images/logo-white.png" alt="Logo" /></a>
                            </div>
                        </div>

                        <div id="navbar" class="navbar-nav-wrapper">
                            <ul class="nav navbar-nav" id="responsive-menu">
                                 <?php if ($this->session->userdata('user_type') != 'VA') { ?>
                                <li ><a href="<?php echo base_url() ?>">Home</a></li>
                                <?php    }  else{?>
                                
                                    <li>
                                        <a href="<?php echo base_url() ?>">Home</a>
                                        <ul>
                                            <li><a href="<?php echo base_url() ?>about-us">About Us</a></li>
                                            <li><a href="<?php echo base_url() ?>contact-us">Contact Us</a></li>
                                            <li><a href="<?php echo base_url() ?>faq">FAQ</a></li>
                                        </ul>

                                    </li>
                                
                                <?php } if ($this->session->userdata('user_type') != 'VA') { ?>
                                <li><a href="<?php echo base_url() ?>PNR-status">PNR Status</a></li>
                                
                                <?php    }                            
                                if ($this->session->userdata('user_type') == 'SA') {
                                    ?>
                                    <li>
                                        <a href="javascript:void(0);">Request</a>
                                        <ul>
                                            <li><a href="<?php echo base_url() ?>withdrawals-request">Cash Withdrawals Request from B2B</a></li>
                                            <li><a href="<?php echo base_url() ?>cancellation-reports">Trip Cancellation Request</a></li>
<!--                                            <li><a href="<?php echo base_url() ?>master">Contact Us Request</a></li>-->
                                        </ul>

                                    </li>
                                
                                    <li>
                                        <a href="javascript:void(0);">Master</a>
                                        <ul>
                                             <?php  if ($this->session->userdata('user_type') == 'SA') {  ?>
                                            <li><a href="coupon-code-master">Coupon Code Master</a></li>
                                            <?php }?>
                                            <li><a href="<?php echo base_url() ?>category-master">Category Master</a></li>
                                            <li><a href="<?php echo base_url() ?>tag-master">Tag Master</a></li>
                                            <li><a href="<?php echo base_url() ?>trip-inclusions-master">Trip Inclusions</a></li>
                                            <li><a href="<?php echo base_url() ?>state-master">State Master</a></li>
                                            <li><a href="<?php echo base_url() ?>city-master">City Master</a></li>
                                            <li><a href="<?php echo base_url() ?>trip-specific">Trip Specific Offer</a></li>
											
                                           
<!--                                            <li><a href="<?php echo base_url() ?>location-master">Location Master</a></li>-->
                                        </ul>

                                    </li>
                                    <li>
                                        <a href="#">Report</a>
                                        <ul>

                                            <li><a href="<?php echo base_url() ?>user-reports">Users Reports</a></li>
                                            <li><a href="<?php echo base_url() ?>booking-wise-reports">Booking Reports</a></li>
                                            <li><a href="<?php echo base_url() ?>Trip-wise-reports">Trip Reports</a></li>
                                            <li><a href="<?php echo base_url() ?>payment-from-B2C-reports">Payment from B2C</a></li>
                                            <li><a href="<?php echo base_url() ?>payment-from-B2B-reports">Payment from B2B</a></li>
                                            <li><a href="<?php echo base_url() ?>payment-to-B2B-reports">Payment to B2B</a></li>
                                            <li><a href="<?php echo base_url() ?>cancellation-reports">Cancellation Reports</a></li>
                                            <li><a href="<?php echo base_url() ?>my-transaction-reports">My Transaction</a></li>
                                            <li><a href="<?php echo base_url() ?>trip-shared-reports">Trip Shared Reports</a></li>
                                            <li><a href="<?php echo base_url() ?>payment-summary-reports">Payment Summary</a></li>
<!--                                            <li><a href="<?php echo base_url() ?>pay-history-reports">Pay History</a></li>-->
<!--                                            <li><a href="<?php echo base_url() ?>triplist">Trip List</a></li>-->
											</ul>

                                    </li>
                                    <li>
                                        <a href="#">We Are? & FAQ</a>
                                        <ul>
                                            <li><a href="<?php echo base_url() ?>about-us">About Us</a></li>
                                            <li><a href="<?php echo base_url() ?>contact-us">Contact Us</a></li>
                                            <li><a href="<?php echo base_url() ?>faq">FAQ</a></li>
                                        </ul>

                                    </li>
                                    <?php
                                } else if ($this->session->userdata('user_type') == 'VA') {
                                    ?>
                                    <li><a data-toggle="tooltip" data-placement="bottom" title="Click here to Filter, View, Book, Edit, Delete, Booking in Month, Share Trip" href="<?php echo base_url() ?>trip-list">BookMyTrip<!--<span>(Book/Edit/Calendar/Delete/Share)</span>--></a></li>
                                    <li><a href="<?php echo base_url() ?>tomorrows-trip-reports">Tomorrow's Trips</a></li>
                                    <li>
                                        <a href="#">Trip Details</a>
                                        <ul>
                                            <li><a href="<?php echo base_url() ?>make-new-trip">Make New Trip</a></li>
                                            <li><a href="<?php echo base_url() ?>coupon-code-master">Coupon Code Master</a></li>
                                            <li><a href="<?php echo base_url() ?>trip-shared">Shared Trips Details</a></li>
                                            <li><a href="<?php echo base_url() ?>trip-specific">Trip Specific Offer</a></li>
                                            <!--<li><a href="<?php echo base_url() ?>trip-list">My Trip List & Book Trip</a></li>-->
                                        </ul>
                                    </li>
                                    
                                    <li>
                                        <a href="#">Bookings</a>
                                        <ul>
                                            <li><a href="<?php echo base_url() ?>booking-list">Booking List</a></li>
                                            <li><a href="<?php echo base_url() ?>PNR-status">PNR Status Check</a></li>
                                            <li><a href="<?php echo base_url() ?>cancellation-list">Cancellation List</a></li>
                                            <li><a href="<?php echo base_url() ?>cancellation-reports">Cancellation Reports</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Reports</a>
                                        <ul>
                                            <li><a href="<?php echo base_url() ?>Trip-wise-reports">Trip List</a></li>
                                            <li><a href="<?php echo base_url() ?>booking-wise-reports">Booking List</a></li>
                                            <li><a href="<?php echo base_url() ?>my-transaction-reports">My Transactions</a></li>
                                            <li><a href="<?php echo base_url() ?>payment-from-B2C-reports">Payment from B2C</a></li>
                                            <li><a href="<?php echo base_url() ?>payment-from-B2B-reports">Payment from B2B</a></li>
                                            <li><a href="<?php echo base_url() ?>payment-to-B2B-reports">Payment to B2B</a></li> 
                                            <li><a href="<?php echo base_url() ?>payment-summary-reports">Payment Summary</a></li> 
<!--                                            <li><a href="<?php echo base_url() ?>pay-history-reports">Pay History</a></li>                                                                                     -->
                                        </ul>
                                    </li>
                                    <?php
                                } else if ($this->session->userdata('user_type') == 'CU'||$this->session->userdata('user_type') == 'GU') {
                                    ?>
                                    <li><a href="<?php echo base_url() ?>trip-list">Trips</a></li>
                                    <li><a href="<?php echo base_url() ?>about-us">About Us</a></li>
                                    <li><a href="<?php echo base_url() ?>contact-us">Contact Us</a></li>
                                    <li><a href="<?php echo base_url() ?>faq">FAQ</a></li>
                                    <?php
                                }else {
                                    ?>
                                    <li><a href="<?php echo base_url() ?>trip-list">Trips</a></li>
                                    <li><a href="<?php echo base_url() ?>about-us">About Us</a></li>
                                    <li><a href="<?php echo base_url() ?>contact-us">Contact Us</a></li>
                                    <li><a href="<?php echo base_url() ?>faq">FAQ</a></li>
                                    <?php
                                }
                                ?>






                            </ul>

                        </div><!--/.nav-collapse -->
                        <div class="nav-mini-wrapper " >
                        <ul class="nav-mini  ">
                            <?php if ($this->session->userdata('user_id') && $this->session->userdata('user_id') > 0) { 
                                if($this->session->userdata('user_type') == 'SA'){            
                                    $loginuser_id =0;
                                }else{        
                                    $loginuser_id =$this->session->userdata('user_id');
                                 }?>
                            <li class="dropdown "> <a href="<?php echo base_url() ?>profile" data-toggle="dropdown"> <img src="<?php if($this->session->userdata('user_img')) echo $this->session->userdata('user_img')?>" alt="images" class="drp_dwn" style="border-radius: 50%;" width="30"/> </a>  
                                <ul class="dropdown-menu"  style="margin-left: -130px;">
                                    <li><a href="<?php echo base_url() ?>profile" class="text-dark">Profile<br><?=$this->session->userdata('user_email')?></a></li>
                                    <li><a href="<?php echo base_url() ?>my-transaction-reports" class="text-dark">Wallet <span class="text-primary wallet">Rs:<?=checkbal_mypayment($loginuser_id, 2)?></span></a></li>
                                    <li><a href="<?php echo base_url() ?>update-profile" class="text-dark">Update Profile</a></li>
                                    <li><a href="<?php echo base_url() ?>change-password" class="text-dark">Change Password</a></li>
                                    <li><a href="<?php echo base_url() ?>logout" class="text-dark">Logout</a></li>
                                  </ul>
                            </li>
                                 <?php } else { ?>
                                    <li><a data-toggle="modal" href="#registerModal"><i class="icon-user-follow" data-toggle="tooltip" data-placement="bottom" title="sign up"></i></a></li>
                                    <li><a data-toggle="modal" href="#loginModal"><i class="icon-login" data-toggle="tooltip" data-placement="bottom" title="Login"></i> </a></li>                           

                                <?php } ?>
                        </ul>
                    </div>
                        

                    </div>

                    <div id="slicknav-mobile"></div>

                </nav>
                <!-- end Navbar (Header) -->

            </header>
            <?php $this->load->view('msg') ?>

            <!-- end Header -->

            <!-- start Main Wrapper -->


            <!-- end hero-header -->
