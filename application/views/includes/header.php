<!doctype html>
<html lang="en">


<!-- Mirrored from crenoveative.com/envato/togoby/index-02.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 23 Jun 2018 08:51:08 GMT -->
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Title Of Site -->
	<title>B2C - Tour </title>

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<!-- Fav and Touch Icons -->
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url()?>assets/images/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url()?>assets/images/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url()?>assets/images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon" href="<?php echo base_url()?>assets/images/ico/apple-touch-icon-57-precomposed.png">
	<link rel="shortcut icon" href="<?php echo base_url()?>assets/images/ico/favicon.png">

	<!-- CSS Plugins -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css" media="screen">	
	<link href="<?php echo base_url()?>assets/css/main.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/css/plugin.css" rel="stylesheet">

	<!-- CSS Custom -->
	<link href="<?php echo base_url()?>assets/css/style.css" rel="stylesheet">
	
	<!-- Add your style -->
	<link href="<?php echo base_url()?>assets/css/your-style.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="<?php echo base_url()?>assets/https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="<?php echo base_url()?>assets/https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
    
	
</head>

<body class="<?php echo (base_url()=='')?'home':''?> bg-color-header">

	<div id="introLoader" class="introLoading"></div>

	<!-- start Container Wrapper -->
	
	<div class="container-wrapper">

		<!-- start Header -->
		
		<header id="header">

			<!-- start Navbar (Header) -->
			<nav class="navbar navbar-default navbar-fixed-top navbar-sticky-function navbar-arrow">

				<div class="container">
					
					<div class="logo-wrapper">
						<div class="logo">
							<a href="<?php echo base_url()?>"><img src="<?php echo base_url()?>assets/images/logo-white.png" alt="Logo" /></a>
						</div>
					</div>
					
					<div id="navbar" class="navbar-nav-wrapper">
                                            <ul class="nav navbar-nav" id="responsive-menu">
						
							<li >
								<a href="<?php echo base_url()?>">Home</a>
								
							</li>
						
						
									<li><a href="<?php echo base_url()?>about-us">About Us</a></li>
									<li><a href="<?php echo base_url()?>contact-us">Contact Us</a></li>
									<li><a href="<?php echo base_url()?>faq">FAQ</a></li>
									<li>
										<a href="javascript:void(0);">Admin</a>
										<ul>
									<li><a href="<?php echo base_url()?>master">Category Master</a></li>
                                                                        <li><a href="<?php echo base_url()?>master">Tag Master</a></li>
                                                                        <li><a href="<?php echo base_url()?>master">Trip Inclusions</a></li>
                                                                        <li><a href="<?php echo base_url()?>master">State Master</a></li>
                                                                        <li><a href="<?php echo base_url()?>master">City Master</a></li>
                                                                        <li><a href="<?php echo base_url()?>master">Location Master</a></li>
                                                                        </ul>
									
									</li>
									
									
								</ul>
				
					</div><!--/.nav-collapse -->

					<div class="nav-mini-wrapper " >
						<ul class="nav-mini  ">						
							
                            <?php if($this->session->userdata('user_id') && $this->session->userdata('user_id')>0){?>
                            <li class=" "> <a href="<?php echo base_url()?>my-dashboard"> <img src="<?php echo base_url()?>assets/images/ws.jpg" alt="images" class="" style="border-radius: 50%;" width="30"/> </a>
							</li>							
                            <li><a href="<?php echo base_url()?>logout"><i class="icon-login" data-toggle="tooltip" data-placement="bottom" title="Logout"></i> </a></li>
                            <?php }else{?>
                            <li><a data-toggle="modal" href="#registerModal"><i class="icon-user-follow" data-toggle="tooltip" data-placement="bottom" title="sign up"></i></a></li>
                            <li><a data-toggle="modal" href="#loginModal"><i class="icon-login" data-toggle="tooltip" data-placement="bottom" title="Login"></i> </a></li>                           
                            
                            <?php }?>
						</ul>
					</div>
				
				</div>
				
				<div id="slicknav-mobile"></div>
				
			</nav>
			<!-- end Navbar (Header) -->

		</header>
        <?php $this->load->view('msg')?>
		
		<!-- end Header -->

		<!-- start Main Wrapper -->
		
		
			<!-- end hero-header -->