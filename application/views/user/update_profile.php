<?php $this->load->view('includes/header')?>
<?php $this->load->view('user/side_bar');$v=$view->row();?>
<div class="col-xs-12 col-sm-8 col-md-9">
						
							<div class="dashboard-wrapper">
							
								<h4 class="section-title">Edit profile</h4>
								<?php echo form_open_multipart(base_url() . 'update-profile', array('class' => 'form-horizontal margin-top-30', 'id' => 'change_password')); ?>
									
									<div class="row gap-20">
										<div class="col-sm-6 col-md-4">
												<img src="<?php if($this->session->userdata('user_img')) echo $this->session->userdata('user_img')?>" alt="image" />
											<div class="form-group ">
												<label>Photo</label>
												<input type="file" name="image" id="photo">
												<span class="font12 font-italic">** photo must not bigger than 250kb</span>
											</div>
										</div>
										
										<div class="clear"></div>
										
										<div class="col-sm-6 col-md-4">
												
											<div class="form-group">
												<label>Name</label>
												<input type="text" class="form-control" name="user_fullname" maxlength="50" value="<?php echo $v->user_fullname?>">
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
												<input type="email" class="form-control" maxlength="50" name="email" value="<?php echo $v->email?>">
											</div>
											
										</div>
										
										<div class="clear"></div>
										<div class="col-sm-6 col-md-4">
										
											<div class="form-group">
												<label>Phone/WhatsApp</label>
												<input type="text" class="form-control" maxlength="12" name="phone" value="<?php echo $v->phone?>">
											</div>
											
										</div>
										<div class="col-sm-6 col-md-4">
										
											<div class="form-group">
												<label>Alt Phone No</label>
												<input type="text" class="form-control" maxlength="12" name="alt_phone" value="<?php echo $v->alt_phone?>">
											</div>
											
										</div>
										
										<div class="clear"></div>
										
										<div class="col-sm-6 col-md-4">
										
											<div class="form-group">
												<label>Address1</label>
												<input type="text" class="form-control" maxlength="50" value="<?php echo $v->user_fullname?>">
											</div>
											
										</div>
										
										<div class="col-sm-6 col-md-4">
										
											<div class="form-group">
												<label>Address2</label>
												<input type="text" class="form-control" value="254">
											</div>
											
										</div>
										
										<div class="clear"></div>
										
										<!--<div class="col-sm-6 col-md-4">
										
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
											
										</div>-->
										<!--
										<div class="col-sm-6 col-md-4">
										
											<div class="form-group">
												<label>Province/State</label>
												<input type="text" class="form-control" value="Paris">
											</div>
											
										</div>
										
										
										<div class="col-sm-6 col-md-4">
										
											<div class="form-group">
												<label>Zip Code</label>
												<input type="text" class="form-control" value="35214">
											</div>
											
										</div>-->

										
										<div class="clear"></div>
										<div class="col-sm-6 col-md-4">
										
											<div class="form-group">
												<label>Emergency Contact Person Name</label>
												<input type="text" class="form-control" maxlength="50" name="emergency_contact_person" value="<?php echo $v->emergency_contact_person?>">
											</div>
											
										</div>
										<div class="col-sm-6 col-md-4">
										
											<div class="form-group">
												<label>Emergency Contact No</label>
												<input type="text" class="form-control" maxlength="10" name="emergency_contact_no" value="<?php echo $v->emergency_contact_no?>">
											</div>
											
										</div>
										
										
										<div class="clear mb-10"></div>

										<div class="col-sm-12">
											<input type="submit" class="btn btn-primary" value="Save" name="save" />
											<a href="<?php echo base_url()?>my-profile" class="btn btn-primary btn-border">Cancel</a>
										</div>

									</div>
									
							   <?php echo form_close()?>
								
							</div>
							
						</div>

					</div>

				</div>
			
			</div>

	<?php $this->load->view('includes/footer')?>