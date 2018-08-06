<?php $this->load->view('includes/header')?>
<?php $this->load->view('user/side_bar')?>
<div class="col-xs-12 col-sm-8 col-md-9">
						
							<div class="dashboard-wrapper">
							
								<h4 class="section-title">Bank Account</h4>
								<p class="mmt-15 mb-20">Interested astonished he at cultivated or me. Nor brought one invited she produce her.</p>
							<div class="col-xs-12 col-sm-9 text-right">
								<a  class="btn btn-primary mb-20 text-right" data-toggle="modal" href="#bank_acc">Add Account</a>
							</div>

						<div class="row">
						<div class="col-xs-12 col-sm-9">
							<div class="itinerary-toggle-wrapper">
							
								<div class="panel-group bootstrap-toggle">
									<?php if(isset($view) && $view->num_rows()>0){
										$i=1;foreach($view->result() as $v){
										?>
									<div class="panel">
										<div class="panel-heading">
											<div class="panel-title">
												<a data-toggle="collapse" data-parent="#" href="#bootstarp-toggle-one-<?php echo $v->bank_id?>">
													<div class="itinerary-day">
														<span class="number"><?php echo $i++?></span>
													</div>
													<div class="itinerary-header">
														<h4><?php echo strtoupper($v->bank_name)?> </h4>
													
													</div>
												</a>
											</div>
										</div>
										<div id="bootstarp-toggle-one-<?php echo $v->bank_id?>" class="panel-collapse collapse">
											<div class="panel-body">
											<ul class="featured-list-with-h"  style="list-style: none;">
							
								<li>
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-6">
											<h5>Bank Name</h5>
										</div>
										<div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
											<span class="pl-sm"><?php echo $v->bank_name?></span>
										</div>
									</div>
								</li>
								
								<li>
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-6">
											<h5>Account Holder Name</h5>
										</div>
										<div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
											<span class="pl-sm"><?php echo $v->account_holder_name?></span>
										</div>
									</div>
								</li>
								
								<li>
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-6">
											<h5>Account Number</h5>
										</div>
										<div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
											<span class="pl-sm"><?php echo $v->account_number?></span>
										</div>
									</div>
								</li>
								
								<li>
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-6">
											<h5>IFSC Code</h5>
										</div>
										<div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
											<span class="pl-sm"><?php echo $v->ifsc_code?></span>
										</div>
									</div>
								</li>
								
								<li>
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-6">
											<h5>Branch</h5>
										</div>
										<div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
											<span class="pl-sm"><?php echo $v->branch_name?></span>
										</div>
									</div>
								</li>
								
								<li>
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-6">
											<h5>Address</h5>
										</div>
										<div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
											<span class="pl-sm"><?php echo $v->address?> </span>
										</div>
									</div>
								</li>
								
								
							</ul>

											</div>
										</div>

									</div>
                                    <?php
									}
									}
									?>
									<!-- end of panel -->
                                                                        
									
								

									
								</div>
							
							</div>
						</div>
					</div>
							</div>
								
								
									
							</div>
<div id="bank_acc" class="modal fade login-box-wrapper" tabindex="-1" data-width="550" data-backdrop="static" data-keyboard="false" data-replace="true">

	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title text-center">Add Account</h4>
	</div>
    <?php echo form_open_multipart(base_url() . 'account-details', array('class' => 'form-horizontal margin-top-30', 'id' => 'addbankAccount')); ?>
	
	<div class="modal-body">
		<div class="row gap-20">
			<div class="col-sm-12 col-md-12">
	
				<div class="form-group"> 
					<label>Bank Name</label>
					<input class="form-control" name="bank_name" maxlength="50" placeholder="Enter the Bank Name" type="text"> 
				</div>
			
			</div>
			<div class="col-sm-12 col-md-12">
	
				<div class="form-group"> 
					<label>Account Holder Name</label>
					<input class="form-control" name="account_holder_name" maxlength="50" placeholder="Enter the Account Holder Name" type="text"> 
				</div>
			
			</div>
			
			<div class="col-sm-12 col-md-12">
			
				<div class="form-group"> 
					<label>Account Number</label>
                                        <input class="form-control" name="account_number" id="account_number" maxlength="32"  placeholder="Enter the Account Number" type="text"> 
				</div>
			
			</div>
			
			<div class="col-sm-12 col-md-12">
			
				<div class="form-group"> 
					<label>Confirm Account Number</label>
					<input class="form-control" name="account_number1" maxlength="32"  placeholder="Enter the Account Number" type="text"> 
				</div>
			
			</div>
			<div class="form-group col-sm-12 col-md-12">
                                <label>IFSC Code</label>
					<input class="form-control" name="ifsc_code" maxlength="12"  placeholder="Enter the IFSC Code" type="text"> 
                        </div>
			<div class="form-group col-sm-12 col-md-12">
                                <label>Branch Name</label>
					<input class="form-control" name="branch_name" maxlength="100"  placeholder="Enter the Branch Name" type="text"> 
                        </div>
			<div class="form-group col-sm-12 col-md-12">
                                <label>Address</label>
					<input class="form-control" name="address" maxlength="300"  placeholder="Enter the Address" type="text"> 
                        </div>
			<div class="form-group col-sm-12 col-md-12">
                                <label>Is Primary Account</label>
                                <div class="checkbox-block">
                                        <input id="filter_checkbox-2" name="is_primary" type="checkbox" class="checkbox" value="1">
                                        <label class="" for="filter_checkbox-2">Yes, This is our primary account</label>
                                </div>
                        </div>
			
		</div>
	</div>
	
	<div class="modal-footer text-center">
		<input type="submit" class="btn btn-primary" value="Add" name="save">
		<button type="button" data-dismiss="modal" class="btn btn-primary btn-border">Close</button>
	</div>
		<?php echo form_close()?>
</div>
					</div>

				</div>
			
			</div>

	<?php $this->load->view('includes/footer')?>