<?php $this->load->view('includes/header')?>
<?php $this->load->view('user/side_bar')?>
<div class="col-xs-12 col-sm-8 col-md-9 mt-20">
						
							<div class="dashboard-wrapper">
							
								<h4 class="section-title">Edit profile</h4>
								<p class="mmt-15 mb-20">Interested astonished he at cultivated or me. Nor brought one invited she produce her.</p>
								
								<form class="post-form-wrapper">
									
									<div class="row gap-20">

										<div class="col-sm-6 col-md-4">
												
											<div class="form-group bootstrap-fileinput-style-01">
												<label>Photo</label>
												<input type="file" name="form-register-photo" id="form-register-photo">
												<span class="font12 font-italic">** photo must not bigger than 250kb</span>
											</div>

										</div>
										
										<div class="clear"></div>
										
										<div class="col-sm-6 col-md-4">
												
											<div class="form-group">
												<label>First Name</label>
												<input type="text" class="form-control" value="Christine">
											</div>
											
										</div>
										
										<div class="col-sm-6 col-md-4">
										
											<div class="form-group">
												<label>Last Name</label>
												<input type="text" class="form-control" value="Gateau">
											</div>
											
										</div>
										
										<div class="clear"></div>
										
										<div class="col-sm-6 col-md-4">
										
											<div class="form-group">
												<label>Born</label>
												<div class="row gap-5">
													<div class="col-xs-3 col-sm-3">
														<select class="selectpicker form-control" data-live-search="false">
															<option value="0">day</option>
															<option value="1">01</option>
															<option value="2" selected>02</option>
															<option value="3">03</option>
														</select>
													</div>
													<div class="col-xs-5 col-sm-5">
														<select class="selectpicker form-control" data-live-search="false">
															<option value="0">month</option>
															<option value="1">Jan</option>
															<option value="2" selected>Feb</option>
															<option value="3">Mar</option>
														</select>
													</div>
													<div class="col-xs-4 col-sm-4">
														<select class="selectpicker form-control" data-live-search="false">
															<option value="0">year</option>
															<option value="1">1985</option>
															<option value="2" selected>1986</option>
															<option value="3">1987</option>
														</select>
													</div>
												</div>
											</div>
											
										</div>
										
										<div class="col-sm-6 col-md-4">
										
											<div class="form-group">
												<label>Email</label>
												<input type="email" class="form-control" value="myemail@gmail.com">
											</div>
											
										</div>
										
										<div class="clear"></div>
										
										<div class="col-sm-6 col-md-4">
										
											<div class="form-group">
												<label>Address</label>
												<input type="text" class="form-control" value="254">
											</div>
											
										</div>
										
										<div class="col-sm-6 col-md-4">
										
											<div class="form-group">
												<label>City/town</label>
												<select class="selectpicker show-tick form-control" data-live-search="false">
													<option value="0">Select</option>
													<option value="1">Thailand</option>
													<option value="2" selected>France</option>
													<option value="3">China</option>
													<option value="4">Malaysia </option>
													<option value="5">Italy</option>
												</select>
											</div>
											
										</div>
										
										<div class="clear"></div>
										
										<div class="col-sm-6 col-md-4">
										
											<div class="form-group">
												<label>Province/State</label>
												<input type="text" class="form-control" value="Paris">
											</div>
											
										</div>
										
										<div class="col-sm-6 col-md-4">
										
											<div class="form-group">
												<label>Street</label>
												<input type="text" class="form-control" value="Somewhere ">
											</div>
											
										</div>

										<div class="clear"></div>
										
										<div class="col-sm-6 col-md-4">
										
											<div class="form-group">
												<label>Zip Code</label>
												<input type="text" class="form-control" value="35214">
											</div>
											
										</div>
										
										<div class="col-sm-6 col-md-4">
										
											<div class="form-group">
												<label>Country</label>
												<select class="selectpicker show-tick form-control" data-live-search="false">
													<option value="0">Select</option>
													<option value="1">Thailand</option>
													<option value="2" selected>France</option>
													<option value="3">China</option>
													<option value="4">Malaysia </option>
													<option value="5">Italy</option>
												</select>
											</div>
											
										</div>

										<div class="clear"></div>
										
										
										<div class="clear mb-10"></div>

										<div class="col-sm-12">
											<a href="#" class="btn btn-primary">Save</a>
											<a href="#" class="btn btn-primary btn-border">Cancel</a>
										</div>

									</div>
									
								</form>
								
							</div>
							
						</div>

					</div>

				</div>
			
			</div>

	<?php $this->load->view('includes/footer')?>