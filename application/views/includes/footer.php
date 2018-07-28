<?php $url=$this->uri->segment(1);?>
<div class="footer-wrapper scrollspy-footer">
		
			<footer class="main-footer">
			
				<div class="container base_url" id="<?=base_url()?>">
				
					<div class="row">
					
						<div class="col-sm-12 col-md-4">
						
							<h5 class="footer-title">newsletter</h5>
							
							<p class="font16">Subsribe to get our latest updates and oeffers</p>
							
							<div class="footer-newsletter">
								
								<div class="form-group">
									<input class="form-control" placeholder="enter your email " />
									<button class="btn btn-primary">subsribe</button>
								</div>
								
								<p class="font-italic font13">*** Don't worry, we wont spam you!</p>
							
							</div>

						</div>
						
						<div class="col-sm-12 col-md-8">
						
							<div class="row">
								
								<div class="col-xs-12 col-sm-4 col-md-3 col-md-offset-3 mt-25-sm">
									<h5 class="footer-title">footer</h5>
									<ul class="footer-menu">
										<li><a href="#">Support</a></li>
										<li><a href="#">Advertise</a></li>
										<li><a href="#">Media Relations</a></li>
										<li><a href="#">Affiliates</a></li>
										<li><a href="#">Careers</a></li>
									</ul>
								</div>
								
								<div class="col-xs-12 col-sm-4 col-md-3 mt-25-sm">
									<h5 class="footer-title">quick  links</h5>
									<ul class="footer-menu">
										<li><a href="#">Media Relations</a></li>
										<li><a href="#">Affiliates</a></li>
										<li><a href="#">Careers</a></li>
										<li><a href="#">Support</a></li>
										<li><a href="#">Advertise</a></li>
									</ul>
								</div>
								
								<div class="col-xs-12 col-sm-4 col-md-3 mt-25-sm">
								
									<h5 class="footer-title">helps</h5>
									<ul class="footer-menu">
										<li><a href="#">Using a Tour</a></li>
										<li><a href="#">Submitting a Tour</a></li>
										<li><a href="#">Managing My Account</a></li>
										<li><a href="#">Merchant Help</a></li>
										<li><a href="#">White Label Website</a></li>
									</ul>
								
								</div>

							</div>

						</div>
						
					</div>
					
				</div>
				
			</footer>
			
			<footer class="bottom-footer">
			
				<div class="container">
				
					<div class="row">
					
						<div class="col-xs-12 col-sm-6 col-md-4">
				
							<p class="copy-right">&#169; 2017 B2C</p>
							
						</div>
						
						<div class="col-xs-12 col-sm-6 col-md-4">
						
							<ul class="bottom-footer-menu">
								<li><a href="#">Cookies</a></li>
								<li><a href="#">Policies</a></li>
								<li><a href="#">Terms</a></li>
								<li><a href="#">Blogs</a></li>
							</ul>
						
						</div>
						
						<div class="col-xs-12 col-sm-12 col-md-4">
							<ul class="bottom-footer-menu for-social">
								<li><a href="#"><i class="icon-social-twitter" data-toggle="tooltip" data-placement="top" title="twitter"></i></a></li>
								<li><a href="#"><i class="icon-social-facebook" data-toggle="tooltip" data-placement="top" title="facebook"></i></a></li>
								<li><a href="#"><i class="icon-social-google" data-toggle="tooltip" data-placement="top" title="google plus"></i></a></li>
								<li><a href="#"><i class="icon-social-instagram" data-toggle="tooltip" data-placement="top" title="instrgram"></i></a></li>
							</ul>
						</div>
					
					</div>

				</div>
				
			
			</footer>
			
		</div>
        	<!-- end Footer Wrapper -->
		
	</div> 
	
	<!-- end Container Wrapper -->
 
 
<!-- start Back To Top -->

<div id="back-to-top">
   <a href="#"><i class="ion-ios-arrow-up"></i></a>
</div>

<!-- end Back To Top -->


<!-- start Sign-in Modal -->
<div id="loginModal" class="modal fade login-box-wrapper" tabindex="-1" data-width="550" data-backdrop="static" data-keyboard="false" data-replace="true">

	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title text-center">Sign-in into your account</h4>
	</div>
	<?php echo form_open_multipart(base_url() . 'login/login_check', array('class' => 'form-horizontal margin-top-30', 'id' => 'login')); ?>
	<div class="modal-body">
		<div class="row gap-20">
		
			<div class="col-sm-6 col-md-6">
				<button class="btn btn-facebook btn-block mb-5-xs">Log-in with Facebook</button>
			</div>
			<div class="col-sm-6 col-md-6">
				<button class="btn btn-google-plus btn-block">Log-in with Google+</button>
			</div>
			
			<div class="col-md-12">
				<div class="login-modal-or">
					<div><span>or</span></div>
				</div>
			</div>
			
			<div class="col-sm-12 col-md-12">
	
				<div class="form-group"> 
					<label>Email Address</label>
					<input class="form-control" placeholder="Enter your Email Address" type="email" id="um_email" name="um_email" maxlength="50"> 
				</div>
			
			</div>
			
			<div class="col-sm-12 col-md-12">
			
				<div class="form-group"> 
					<label>Password</label>
					<input class="form-control" placeholder="Min 4 and Max 10 characters" type="password" id="um_password" name="um_password" > 
				</div>
			
			</div>
			
			<div class="col-sm-6 col-md-6">
				<div class="checkbox-block"> 
					<input id="remember_me_checkbox" name="remember_me_checkbox" class="checkbox" value="First Choice" type="checkbox"> 
					<label class="" for="remember_me_checkbox">Remember me</label>
				</div>
			</div>
			
			<div class="col-sm-6 col-md-6">
				<div class="login-box-link-action">
					<a data-toggle="modal" href="#forgotPasswordModal" class="block line18 mt-1">Forgot password?</a> 
				</div>
			</div>
			
			<div class="col-sm-12 col-md-12">
				<div class="login-box-box-action">
					No account? <a data-toggle="modal" href="#registerModal">Register</a>
				</div>
			</div>
			
		</div>
	</div>
	
	<div class="modal-footer text-center">		
        <input type="submit" value="Log-in" class=""btn btn-primary" name="login" />
		<button type="button" data-dismiss="modal" class="btn btn-primary btn-border">Close</button>
	</div>
	 <?php echo form_close()?>
</div>
<!-- end Sign-in Modal -->

<!-- start Register Modal -->
<div id="registerModal" class="modal fade login-box-wrapper" tabindex="-1" data-backdrop="static" data-keyboard="false" data-replace="true">

	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title text-center">Create your account for free</h4>
	</div>
	<?php echo form_open_multipart(base_url() . 'login/singup', array('class' => 'form-horizontal margin-top-30', 'id' => 'sign_up')); ?>
	<div class="modal-body">
	
		<div class="row gap-20">
		
			<div class="col-sm-6 col-md-6">
				<button class="btn btn-facebook btn-block mb-5-xs">Register with Facebook</button>
			</div>
			<div class="col-sm-6 col-md-6">
				<button class="btn btn-google-plus btn-block">Register with Google+</button>
			</div>
			
			<div class="col-md-12">
				<div class="login-modal-or">
					<div><span>or</span></div>
				</div>
			</div>
			
			<div class="col-sm-12 col-md-12">
	
				<div class="form-group"> 
					<label>Username</label>
					<input class="form-control" placeholder="Min 4 and Max 10 characters" type="text"> 
				</div>
			
			</div>
			
			<div class="col-sm-12 col-md-12">
	
				<div class="form-group"> 
					<label>Email Address</label>
					<input class="form-control" placeholder="Enter your email address"  type="email" id="new_email" name="new_email"> 
				</div>
			
			</div>
			
			<div class="col-sm-12 col-md-12">
			
				<div class="form-group"> 
					<label>Password</label>
					<input class="form-control" placeholder="Min 6 and Max 20 characters" type="password" id="new_pasword" name="new_pasword"> 
				</div>
			
			</div>
			
			<div class="col-sm-12 col-md-12">
			
				<div class="form-group"> 
					<label>Password Confirmation</label>
					<input class="form-control" placeholder="Re-type password again" type="password" id="cnew_pasword" name="cnew_pasword"> 
				</div>
			
			</div>
			
			<div class="col-sm-12 col-md-12">
				<div class="checkbox-block"> 
					<input id="register_accept_checkbox" name="register_accept_checkbox" class="checkbox" value="First Choice" type="checkbox"> 
					<label class="" for="register_accept_checkbox">By register, I read &amp; accept <a href="#">the terms</a></label>
				</div>
			</div>
			
			<div class="col-sm-12 col-md-12">
				<div class="login-box-box-action">
					Already have account? <a data-toggle="modal" href="#loginModal">Log-in</a>
				</div>
			</div>
			
		</div>
	
	</div>
	
	<div class="modal-footer text-center">
    	 <input type="submit" value="Register" class=""btn btn-primary" name="signup" />
		<button type="button" data-dismiss="modal" class="btn btn-primary btn-border">Close</button>
	</div>
	<?php echo form_close()?>
</div>
<!-- end Register Modal -->

<!-- start Forget Password Modal -->
<div id="forgotPasswordModal" class="modal fade login-box-wrapper" tabindex="-1" data-backdrop="static" data-keyboard="false" data-replace="true">

	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title text-center">Restore your forgotten password</h4>
	</div>
	
	<div class="modal-body">
		<div class="row gap-20">
			
			<div class="col-sm-12 col-md-12">
				<p class="mb-20">Maids table how learn drift but purse stand yet set. Music me house could among oh as their. Piqued our sister shy nature almost his wicket. Hand dear so we hour to.</p>
			</div>
			
			<div class="col-sm-12 col-md-12">
	
				<div class="form-group"> 
					<label>Email Address</label>
					<input class="form-control" placeholder="Enter your email address" type="text"> 
				</div>
			
			</div>

			<div class="col-sm-12 col-md-12">
				<div class="checkbox-block"> 
					<input id="forgot_password_checkbox" name="forgot_password_checkbox" class="checkbox" value="First Choice" type="checkbox"> 
					<label class="" for="forgot_password_checkbox">Generate new password</label>
				</div>
			</div>
			
			<div class="col-sm-12 col-md-12">
				<div class="login-box-box-action">
					Return to <a data-toggle="modal" href="#loginModal">Log-in</a>
				</div>
			</div>
			
		</div>
	</div>
	
	<div class="modal-footer text-center">
		<button type="button" class="btn btn-primary">Restore</button>
		<button type="button" data-dismiss="modal" class="btn btn-primary btn-border">Close</button>
	</div>
	
</div>
<!-- end Forget Password Modal -->
 
<!-- Core JS -->
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/core-plugins.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.cookie.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets-customs/js/customs.js"></script>
<?php if($url==''){?>
<!-- Only in Home Page -->
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.flexdatalist.js"></script>
<?php }?>
<?php if($url=='home-dashboard' || $url=='update-profile'){?>
<!-- Detail Page JS -->
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.stickit.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap-tokenfield.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/typeahead.bundle.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.sumogallery.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/images-grid.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.bootstrap-touchspin.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/customs-detail.js"></script>
	<?php if($url=='update-profile'){?>
    <!-- Dashboard Edit Profile Page JS -->
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/fileinput.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/customs-fileinput.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap3-wysihtml5.min.js"></script>
	<?php }?>
<?php }?>
<?php if($url=='contact-us'){?>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/infobox.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/validator.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/customs-contact.js"></script>
<?php }?>
<?php if($url=='make-new-trip'){?>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap-tokenfield.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/typeahead.bundle.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap3-wysihtml5.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.bootstrap-touchspin.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/customs-dashboard-guide-info.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/fileinput.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/customs-fileinput.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/dropzone.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.ui.timepicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets-customs/js/make-trip.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets-customs/js/make-trip-validation.js"></script>
<?php }?>
</body>


</html>