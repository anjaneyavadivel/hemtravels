<?php 
$dashboard = $profile=$bank_details=$change_password=$my_tour=$book_history=$my_wishlist='';
$url=$this->uri->segment(1);
switch ($url) {
    case 'my-dashboard':$dashboard ='active';break;
    case 'my-profile':$profile ='active';break;
	case 'account-details':$bank_details ='active';break;
	case 'change-password':$change_password ='active';break;
	case 'my-tour':$my_tour ='active';break;
	case 'book-history':$book_history ='active';break;
	case 'my-wish-list':$my_wishlist ='active'; break;
}
?>
<div class="main-wrapper scrollspy-container">
		
			<!-- start Breadcrumb -->
			
			<div class="breadcrumb-wrapper">
				<div class="container">
					<ol class="breadcrumb">
						<li><a href="#">Home</a></li>
						<li class="active">Profile</li>
					</ol>
				</div>
			</div>
			
			<!-- end Breadcrumb -->

			<div class="user-profile-wrapper pb-50">

				<div class="user-header">
					
					<div class="content">
					
						<div class="content-top">
						
							<div class="container">
							
								<div class="inner-top">
								
									<div class="image">
										<img src="<?php echo base_url()?>assets/images/man/01.jpg" alt="image" />
									</div>
									
									<div class="GridLex-gap-20">
									
										<div class="GridLex-grid-noGutter-equalHeight GirdLex-grid-bottom">
							
											<div class="GridLex-col-7_sm-12_xs-12_xss-12">
											
												<div class="GridLex-inner">
													<div class="heading clearfix">
														<h3>Robert Kalvin</h3>
														
													</div>
													<ul class="user-meta">
														<li><i class="fa fa-map-marker"></i> 264, Carson Street Lexington, KY 40539 <!-- <span class="mh-5 text-muted">|</span> --></li>
														 <li><i class="fa fa-phone"></i> +4 8547 985</li>
														<!-- <li>
															<div class="user-social inline-block">
																<a href="#"><i class="icon-social-twitter" data-toggle="tooltip" data-placement="top" title="twitter"></i></a>
																<a href="#"><i class="icon-social-facebook" data-toggle="tooltip" data-placement="top" title="facebook"></i></a>
																<a href="#"><i class="icon-social-gplus" data-toggle="tooltip" data-placement="top" title="google plus"></i></a>
																<a href="#"><i class="icon-social-instagram" data-toggle="tooltip" data-placement="top" title="instrgram"></i></a>
															</div>
															<a href="#" class="btn btn-primary btn-xs btn-border">Follow</a>
														</li> -->
														
														
													</ul>
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

			<div class="pt-50 pb-50">
			
				<div class="container">

					<div class="row">
						
						<div class="col-xs-12 col-sm-4 col-md-3 mt-20">

							<aside class="sidebar-wrapper pr-5 pr-0-xs">
	
								<div class="common-menu-wrapper">
							
									<ul class="common-menu-list">
										
										<li class="<?php echo $dashboard?>"><a href="my-dashboard">Dashboard</a></li>
										<li class="<?php echo $profile?>"><a href="my-profile">Edit profile</a></li>
										<li class="<?php echo $bank_details?>"><a href="account-details">Bank Account</a></li>
										<li class="<?php echo $change_password?>"><a href="change-password">Change password</a></li>
										<li class="<?php echo $my_tour?>"><a href="my-tour">My tour</a></li>
										<li class="<?php echo $book_history?>"><a href="book-history">Booking History</a></li>
										<li class="<?php echo $my_wishlist?>"><a href="my-wish-list">My wihslist</a></li>
										<li ><a href="<?php echo base_url()?>logout">Logout</a></li>
									</ul>
									
								</div>
								
							</aside>
						
						</div>