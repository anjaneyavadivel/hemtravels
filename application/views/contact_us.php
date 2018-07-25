<?php $this->load->view('includes/header')?>
		<!-- end Header -->

		<!-- start Main Wrapper -->
		
			<div class="main-wrapper scrollspy-container">
		
			<!-- start Breadcrumb -->
			
			<div class="breadcrumb-wrapper">
				<div class="container">
					<ol class="breadcrumb">
						<li><a href="#">Home</a></li>
						<li class="active">Contact Us</li>
					</ol>
				</div>
			</div>
			
			<!-- end Breadcrumb -->

			<div class="pt-50">
			
				<div class="container">

					<div class="row mb-10">
					
						<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
						
							<div class="section-title">
							
								<h2>Contact Us</h2>
								<p>Pretended exquisite see cordially the you.</p>
								
							</div>
							
							<div class="row">

								<div class="col-xs-12 col-sm-7 col-md-6 col-md-offset-1 mb-30-xs">
								
									<form id="contact-form" class="contact-form-wrapper" method="post" action="http://crenoveative.com/envato/togoby/contact-02.php">
									
										<div class="messages"></div>
										
										<div class="row">
										
											<div class="col-sm-12">
											
												<div class="form-group">
													<label for="form_name">Your Name <span class="font10 text-danger">(required)</span></label>
													<input id="form_name" type="text" class="form-control" name="name" data-error="Your name is required" required="required">
													<div class="help-block with-errors"></div>
												</div>
												
											</div>
											
											<div class="col-sm-12">
											
												<div class="form-group">
													<label for="form_email">Your Email <span class="font10 text-danger">(required)</span></label>
													<input id="form_email" type="email" class="form-control" name="email" data-error="Your email is required and must be a valid email address" required="required">
													<div class="help-block with-errors"></div>
												</div>
												
											</div>
											
											<div class="col-sm-12">
											
												<div class="form-group">
													<label>Subject</label>
													<input type="text" class="form-control" name="title" />
												</div>
												
											</div>
											
											<div class="col-sm-12">
											
												<div class="form-group">
													<label for="form_message">Message <span class="font10 text-danger">(required)</span></label>
													<textarea id="form_message" class="form-control" name="message" rows="5" data-minlength="50" data-error="Your message is required and must not less than 50 characters" required="required"></textarea>
													<div class="help-block with-errors"></div>
												</div>

											</div>
											
											<div class="col-sm-12 text-right text-left-xs">
												<button type="submit" class="btn btn-primary mt-5">Send Message</button>
											</div>
											
										</div>
										
									</form>
									
								</div>
								
								<div class="col-xs-12 col-sm-5 col-md-4">
								
									<ul class="address-list">
										<li>
												<h5>Address</h5>
												<address> 545, Marina Rd., <br/>Mohammed Bin Rashid Boulevard, <br/>Dubai 123234 </address>
										</li>
										<li>
												<h5>Email</h5><a href="#">office@company.com</a>
										</li>
										<li>
												<h5>Phone Number</h5><a href="#">1-866-599-6674</a>
										</li>
										<li>
												<h5>Skype</h5><a href="#">your_skype_id</a>
										</li>
										<li>
												<h5>Social Networks</h5>
												<div class="contact-social">
												
													<a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a>
													<a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>
													<a href="#" data-toggle="tooltip" data-placement="top" title="Google Plus"><i class="fa fa-google-plus"></i></a>
													<a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a>
												
												</div>
										</li>
											
									</ul>
								
								</div>
								
							</div>
							
						</div>
					
					</div>
					
				</div>

				<div class="contact-map mt-50">
			
					<div id="map" data-lat="25.19739" data-lon="55.28821" style="width: 100%; height: 500px;"></div>

					<div class="infobox-wrapper shorter-infobox contact-infobox">
						<div id="infobox">
							<div class="infobox-address">
								<h6>We Are Here</h6>
							</div>
						
						</div>
					</div>
				
				</div>
				
			</div>

		</div>
		
		<?php $this->load->view('includes/footer')?>