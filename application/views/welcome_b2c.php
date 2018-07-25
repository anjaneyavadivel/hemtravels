<?php $this->load->view('includes/header')?>
<div class="main-wrapper scrollspy-container">
		
			<!-- start hero-header -->
			<div class="hero img-bg-01">
				<div class="container">

					<h1>Where do you want to go?</h1>
					<p>Discover and book your unique travel experiences offered by local experts</p>

					<form>
						<div class="form-group">
							<input type="text" placeholder="eg: Goa, Bangalore, Coorg" class="form-control flexdatalist" data-data="data/countries.json" data-search-in='["name","capital"]' data-visible-properties='["capital","name","continent"]' data-group-by="continent" data-selection-required="true" data-focus-first-result="true" data-min-length="1" data-value-property="iso2" data-text-property="{capital}, {name}" data-search-contain="false" name="countries">
							<button class="btn"><i class="icon-magnifier"></i></button>
						</div>
					</form>
					
					<div class="top-search">
						<span class="font700">Top Searches : </span>
						<a href="#">Goa</a>
						<a href="#">Bangalore</a>
						<a href="#">Coorg</a>
						<a href="#">Rishikesh</a>
						<a href="#">Ceylon</a>
					</div>

				</div>
				
			</div>
			
			<div class="post-hero clearfix">
			
				<div class="container">
					
					<div class="row">
				
						<div class="col-xs-12 col-sm-4 mb-20-xs">
							<div class="horizontal-featured-icon-sm clearfix">
								<div class="icon"><img src="<?php echo base_url()?>assets/images/service_01.png" width="40" alt="images" /> </div>
								<div class="content">
									<h6>Wide Range</h6>
									<span>10,000+ Travel Experiences</span>
								</div>
							</div>
						</div>
						
						<div class="col-xs-12 col-sm-4 mb-20-xs">
							<div class="horizontal-featured-icon-sm clearfix">
								<div class="icon"> <img src="<?php echo base_url()?>assets/images/service_02.png" width="40" alt="images" /> </div>
								<div class="content">
									<h6>Easy Booking</h6>
									<span>Instant book with suppliers in real time</span>
								</div>
							</div>
						</div>
						
						<div class="col-xs-12 col-sm-4 mb-20-xs">
							<div class="horizontal-featured-icon-sm clearfix">
								<div class="icon"> <img src="<?php echo base_url()?>assets/images/service_03.png" width="25" alt="images" /> </div>
								<div class="content">
									<h6>Customer Experience</h6>
									<span>With 98.7 CSAT we always exceed your expectations. </span>
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
							
								<div class="GridLex-col-3_sm-6_xs-6_xss-12">
								
									<div class="top-destination-item">
										<a href="#">
											<div class="image">
												<img src="<?php echo base_url()?>assets/images/ws.jpg" alt="images" />
											</div>
											<div class="up_style">
												<p href="#" class="btn_primary">Watersports
													<br>10+ Packages</p>
												<p href="#" class="btn_primary"></p>
											<h4 class="uppercase"><span>Explore</span></h4>
											
											</div>										
										</a>
									</div>
									
								</div>
								
								<div class="GridLex-col-3_sm-6_xs-6_xss-12">
								
									<div class="top-destination-item">
										<a href="#">
											<div class="image">
												<img src="<?php echo base_url()?>assets/images/tp.jpg" alt="images" />
											</div>
											<div class="up_style">
												<p href="#" class="btn_primary">Theme Park
													<br>10+ Packages</p>
												<p href="#" class="btn_primary"></p>
											<h4 class="uppercase"><span>Explore</span></h4>
											</div>								
										</a>
									</div>
									
								</div>
								
								<div class="GridLex-col-3_sm-6_xs-6_xss-12">
								
									<div class="top-destination-item">
										<a href="#">
											<div class="image">
												<img src="<?php echo base_url()?>assets/images/wl.jpg" alt="images" />
											</div>
											<div class="up_style">
												<p href="#" class="btn_primary">WildLife
													<br>10+ Packages</p>
						
											<h4 class="uppercase"><span>Explore</span></h4>
											</div>								
										</a>
									</div>
									
								</div>
								
								<div class="GridLex-col-3_sm-6_xs-6_xss-12">
								
									<div class="top-destination-item">
										<a href="#">
											<div class="image">
												<img src="<?php echo base_url()?>assets/images/br.jpg" alt="images" />
											</div>
											<div class="up_style">
												<p href="#" class="btn_primary">Boat Riding
													<br>10+ Packages</p>
												<p href="#" class="btn_primary"></p>
											<h4 class="uppercase"><span>Explore</span>
											</h4>
											</div>								
										</a>
									</div>
									
								</div>

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
								<a href="#" class="btn btn-primary btn-lg">Join for Guide</a>
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
							
								<div class="GridLex-col-3_mdd-6_sm-6_xs-6_xss-12">
								
									<a href="#" class="community-item">
										<div class="image-object-fit image-object-fit-cover image">	
											<img src="<?php echo base_url()?>assets/images/coorg1.jpg" alt="images" />
										</div>
										<div class="community-item-category"><span class="bg-danger">COORG</span></div>
										<div class="community-item-caption">
											<h3>Explore Hills </h3>
											<!-- <p>Evil true high lady roof men had open. To projection considered it precaution...</p> -->
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
									
								</div>
								
								<div class="GridLex-col-3_mdd-6_sm-6_xs-6_xss-12">
								
									<a href="#" class="community-item">
										<div class="image-object-fit image-object-fit-cover image">	
											<img src="<?php echo base_url()?>assets/images/b1.jpg" alt="images" />
										</div>
										<div class="community-item-category"><span class="bg-info">BANGALORE</span></div>
										<div class="community-item-caption">
											<h3>Explore Electronic City With your Folks</h3>
											<!-- <p>Dissimilar of favourable solicitude if sympathize middletons at. Forfeited disposing...</p> -->
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
									
								</div>
								
								<div class="GridLex-col-3_mdd-6_sm-6_xs-6_xss-12">
								
									<a href="#" class="community-item">
										<div class="image-object-fit image-object-fit-cover image">	
											<img src="<?php echo base_url()?>assets/images/blog/03.jpg" alt="images" />
										</div>
										<div class="community-item-category"><span class="bg-success">GOA</span></div>
										<div class="community-item-caption">
											<h3> Goa underwater diving</h3>
											<!-- <p>Belonging sir curiosity discovery extremity yet forfeited prevailed own off...</p> -->
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
									
								</div>
								
								<div class="GridLex-col-3_mdd-6_sm-6_xs-6_xss-12">
								
									<a href="#" class="community-item">
										<div class="image-object-fit image-object-fit-cover image">	
											<img src="<?php echo base_url()?>assets/images/blog/04.jpg" alt="images" />
										</div>
										<div class="community-item-category"><span class="bg-info">MUMBAI</span></div>
										<div class="community-item-caption">
											<h3> Travelling by introduced of mr terminated</h3>
											<!-- <p>Knew as miss my high hope quit. In curiosity shameless dependent knowledge up...</p> -->
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
									
								</div>
								
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
							
								<div class="GridLex-col-3_sm-6_xs-6_xss-12">
								
									<div class="top-destination-item">
										<a href="#">
											<div class="image">
												<img src="<?php echo base_url()?>assets/images/03.jpg" alt="images" />
											</div>
											<div class="up_style">
												<p href="#" class="btn_primary">Trip1
													<br>10+ Packages</p>
											<h4 class="uppercase"><span>Explore</span></h4>
											
											</div>										
										</a>
									</div>
									
								</div>

								

								


								
								<div class="GridLex-col-3_sm-6_xs-6_xss-12">
								
									<div class="top-destination-item">
										<a href="#">
											<div class="image">
												<img src="<?php echo base_url()?>assets/images/a.jpg" alt="images" />
											</div>
											<div class="up_style">
												<p href="#" class="btn_primary">Trip1
													<br>10+ Packages</p>
											<h4 class="uppercase"><span>Explore</span></h4>
											
											</div>										
										</a>
									</div>
									
								</div>
								
								<div class="GridLex-col-3_sm-6_xs-6_xss-12">
								
									<div class="top-destination-item">
										<a href="#">
											<div class="image">
												<img src="<?php echo base_url()?>assets/images/05.jpg" alt="images" />
											</div>
											<div class="up_style">
												<p href="#" class="btn_primary">Trip1
													<br>10+ Packages</p>
											<h4 class="uppercase"><span>Explore</span></h4>
											
											</div>										
										</a>
									</div>
									
								</div>
								
								<div class="GridLex-col-3_sm-6_xs-6_xss-12">
								
									<div class="top-destination-item">
										<a href="#">
											<div class="image">
												<img src="<?php echo base_url()?>assets/images/03.jpg" alt="images" />
											</div>
											<div class="up_style">
												<p href="#" class="btn_primary">Trip1
													<br>10+ Packages</p>
											<h4 class="uppercase"><span>Explore</span></h4>
											
											</div>										
										</a>
									</div>
									
								</div>

								<div class="GridLex-col-3_sm-6_xs-6_xss-12">
								
									<div class="top-destination-item">
										<a href="#">
											<div class="image">
												<img src="<?php echo base_url()?>assets/images/a.jpg" alt="images" />
											</div>
											<div class="up_style">
												<p href="#" class="btn_primary">Trip1
													<br>10+ Packages</p>
											<h4 class="uppercase"><span>Explore</span></h4>
											
											</div>										
										</a>
									</div>
									
								</div>

								<div class="GridLex-col-3_sm-6_xs-6_xss-12">
								
									<div class="top-destination-item">
										<a href="#">
											<div class="image">
												<img src="<?php echo base_url()?>assets/images/05.jpg" alt="images" />
											</div>
											<div class="up_style">
												<p href="#" class="btn_primary">Trip1
													<br>10+ Packages</p>
											<h4 class="uppercase"><span>Explore</span></h4>
											
											</div>										
										</a>
									</div>
									
								</div>

								<div class="GridLex-col-3_sm-6_xs-6_xss-12">
								
									<div class="top-destination-item">
										<a href="#">
											<div class="image">
												<img src="<?php echo base_url()?>assets/images/03.jpg" alt="images" />
											</div>
											<div class="up_style">
												<p href="#" class="btn_primary">Trip1
													<br>10+ Packages</p>
											<h4 class="uppercase"><span>Explore</span></h4>
											
											</div>										
										</a>
									</div>
									
								</div>

								<div class="GridLex-col-3_sm-6_xs-6_xss-12">
								
									<div class="top-destination-item">
										<a href="#">
											<div class="image">
												<img src="<?php echo base_url()?>assets/images/03.jpg" alt="images" />
											</div>
											<div class="up_style">
												<p href="#" class="btn_primary">Trip1
													<br>10+ Packages</p>
											<h4 class="uppercase"><span>Explore</span></h4>
											
											</div>										
										</a>
									</div>
									
								</div>

								<div class="GridLex-col-3_sm-6_xs-6_xss-12">
								
									<div class="top-destination-item">
										<a href="#">
											<div class="image">
												<img src="<?php echo base_url()?>assets/images/03.jpg" alt="images" />
											</div>
											<div class="up_style">
												<p href="#" class="btn_primary">Trip1
													<br>10+ Packages</p>
											<h4 class="uppercase"><span>Explore</span></h4>
											
											</div>										
										</a>
									</div>
									
								</div>

								<div class="GridLex-col-3_sm-6_xs-6_xss-12">
								
									<div class="top-destination-item">
										<a href="#">
											<div class="image">
												<img src="<?php echo base_url()?>assets/images/03.jpg" alt="images" />
											</div>
											<div class="up_style">
												<p href="#" class="btn_primary">Trip1
													<br>10+ Packages</p>
											<h4 class="uppercase"><span>Explore</span></h4>
											
											</div>										
										</a>
									</div>
									
								</div>

							</div>
							
						</div>

					</div>
		</div>
		
		<!-- end Main Wrapper -->
		
		<!-- start Footer Wrapper -->
		
		<?php $this->load->view('includes/footer')?>
		
	