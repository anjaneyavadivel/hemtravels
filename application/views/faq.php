<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('includes/header') ?>
<body class="bg-white" data-path="<?=base_url();?>">

<div class=" scrollspy-container">
		
			<!-- start Breadcrumb -->
			
			<div class="breadcrumb-wrapper">
				<div class="container">
					<ol class="breadcrumb">
						<li><a href="#">Home</a></li>
						<li class="active">Frequently asked questions</li>
					</ol>
				</div>
			</div>
			
			<!-- end Breadcrumb -->

			<div class="pt-50 pb-50">
		
				<div class="container">
										<button type="button" class="btn btn-primary float-right" data-toggle="modal"  id="faq_add">Add</button>

					<div class="row">
					
						<div class="col-xs-12 col-md-3 hidden-sm hidden-xs">
						
							<div class="scrollspy-sidebar">

								<ul class="scrollspy-sidenav sidebar-menu nav">
									<li><h4 class="sidebar-menu-title">Quick Menu</h4></li>
									
									<li class="active always-active">
										<a href="#faq-item" class="anchor">FAQ</a>
										<ul class="sidebar-menu-child nav">
											<?php 
											if(isset($faqlist) && count($faqlist)>0)
											{
												$i=1;
												foreach($faqlist as $row)
												{
													$id=$row['id'];	
													$question=$row['question'];
													$answer=$row['answer'];
													//$isactive=$row['isactive'];
													?>
												<li><a href="#faq-item-0" class="anchor"><?=$question;?></a></li>
											<button type="button" class="btn btn-default faq_edit" data-id="<?=$id?>">Edit</button>
											<a href="<?=base_url()?>faq/delete/<?=$id?>"><button type="button" class="btn btn-default">Delete</button> </a>

												<?php 				
												}
											}		
											?> 	
										</ul>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-9">
							<div class="faq-wrapper">
								<div class="section-title bb pb-20">
									<h2 class="text-left" id="faq-item">Frequently asked questions <span class="text-uppercase">(FAQ)</span></h2>
								</div>
								<div id="faq-item-0" class="faq-thread">
									<?php 
									if(isset($faqlist) && count($faqlist)>0)
									{
										$i=1;
										foreach($faqlist as $row)
										{
											$id=$row['id'];	
											$question=$row['question'];
											$answer=$row['answer'];
											//$isactive=$row['isactive'];
											?>
										<h4 class="faq-title"><?=$question;?></h4>
											<p><?=$answer;?></p>
									<?php 				
										}
									}		
									?> 	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="faq_model"></div>

		<?php $this->load->view('includes/footer') ?>
		<script type="text/javascript" src="<?php echo base_url()?>assets-customs/js/faq.js"></script>
<script>
  jQuery(document).ready(function() {  
     FormValidation.init();
  });
  </script>
</body>
</html>