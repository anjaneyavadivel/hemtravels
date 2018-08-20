<?php $this->load->view('includes/header') ?>
<!-- end Header -->
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
									                                        <a class=" btn-edit-faq" data-val="<?=$id?>" ><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Click here to edit"></i></a>

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
						    
                        <p class="text-right"><a  class="btn btn-info c_mt btn-add-faq">Click here to add FAQ</a></td></p>
                        
							<?php 
								if(isset($faqlist) && count($faqlist)>0)
								{
									$i=1;
									foreach($faqlist as $row)
									{
										//$id=$row['id'];	
										$question=$row['question'];
										$answer=$row['answer'];
										//$isactive=$row['isactive'];
										
										?>
                        <div id="faq-item-0" class="faq-thread">

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

<?php
$this->load->view('includes/footer')?>