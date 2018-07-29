<?php $this->load->view('includes/header')?>
<?php $this->load->view('user/side_bar');$v=$view->row();?>
<div class="col-xs-12 col-sm-8 col-md-9">
						
							<div class="dashboard-wrapper">
							<h4 class="section-title">Profile:</h4>
							
							<p class="lead"><?php echo $v->about_me?></p>
							
							<div class="bt mt-30 mb-30"></div>
							
							<ul class="featured-list-with-h">
							
								<li>
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-6">
											<h5>First Name</h5>
										</div>
										<div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
											<span class="pl-sm"><?php echo $v->user_fullname?></span>
										</div>
									</div>
								</li>
								
								
								
								<li>
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-6">
											<h5>Born</h5>
										</div>
										<div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
											<span class="pl-sm"><?php echo date('d-m-Y',strtotime($v->dob))?></span>
										</div>
									</div>
								</li>
								
								<li>
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-6">
											<h5>Email</h5>
										</div>
										<div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
											<span class="pl-sm"><?php echo $v->email?></span>
										</div>
									</div>
								</li>
								
								<!--<li>
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-6">
											<h5>Address</h5>
										</div>
										<div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
											<span class="pl-sm"><?php echo $v->user_fullname?></span>
										</div>
									</div>
								</li>
								
								<li>
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-6">
											<h5>City/town</h5>
										</div>
										<div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
											<span class="pl-sm"><?php echo $v->user_fullname?> </span>
										</div>
									</div>
								</li>
								
								<li>
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-6">
											<h5>Province/State</h5>
										</div>
										<div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
											<span class="pl-sm"><?php echo $v->user_fullname?></span>
										</div>
									</div>
								</li>
								
								<li>
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-6">
											<h5>Street</h5>
										</div>
										<div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
											<span class="pl-sm"><?php echo $v->user_fullname?> </span>
										</div>
									</div>
								</li>

								<li>
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-6">
											<h5>Zip Code</h5>
										</div>
										<div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
											<span class="pl-sm"><?php echo $v->user_fullname?> </span>
										</div>
									</div>
								</li>

								<li>
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-6">
											<h5>Country</h5>
										</div>
										<div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
											<span class="pl-sm"><?php echo $v->user_fullname?> </span>
										</div>
									</div>
								</li>-->
								
							</ul>
							
							<!--<div class="mb-30"></div>
							
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
							Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure 
							dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non 
							proident, sunt in culpa qui officia deserunt mollit anim.</p>
							
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
							Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure 
							dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non 
							proident, sunt in culpa qui officia deserunt mollit anim.</p>
							
							<h4>Inhabiting discretion the her dispatched</h4>
							
							<ul class="list-bullet-circle">
								<li>Examine she brother prudent add day ham.</li>
								<li>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim.</li>
								<li>Certain it waiting no entered is. Passed her indeed uneasy shy polite appear denied</li>
								<li>Satisfaction guarantee</li>
							</ul>
-->
							

						</div>
						
						
						
					</div>

				</div>
			
			</div>

		</div>
		
		<!-- end Main W
		
	
	<?php $this->load->view('includes/footer')?>