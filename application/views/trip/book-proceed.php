<?php $this->load->view('includes/header')?>
 <div class="main-wrapper scrollspy-container">

                <!-- start Breadcrumb -->

                <div class="breadcrumb-wrapper">
                    <div class="container">
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url()?>">Home</a></li>
                            <li><a href="<?php echo base_url()?>trip-list">Trip List</a></li>
                            <li><a href="<?php echo base_url().'trip-view/'.$details['trip_code']?>">Trip View</a></li>
                            <li class="active">Summary</li>
                        </ol>
                    </div>
                </div>

                <!-- end Breadcrumb -->

                <div class="user-profile-wrapper">

                    <div class="payment-header">

                        <div class="container">

                            <div class="content">

                                <div class="trip-list-item no-border">
                                    <div class="image-absolute">
                                        <div class="image image-object-fit image-object-fit-cover">
                                             <?php 
                                                $image = base_url().'assets-customs/img/no_image_found.png';
                                                if(isset($details['trip_img_name']) && !empty($details['trip_img_name'])){
                                                  $image =  base_url().'assets-customs/gallery_images/'.$details['trip_img_name'];  
                                                }
                                                echo '<img src="'.$image.'" alt="'.$details['trip_name'].'" >';
                                            ?>
                                        </div>
                                    </div>
                                    <div class="content">

                                        <div class="GridLex-gap-20 mb-5">

                                            <div class="GridLex-grid-noGutter-equalHeight GridLex-grid-middle">

                                                <div class="GridLex-col-6_sm-12_xs-12_xss-12">

                                                    <div class="GridLex-inner">
                                                        <h6><a href="javascript:;"><?php echo isset($details['trip_name'])?$details['trip_name']:'';?></a></h6>
                                                        <?php 
                                                            if(isset($details['trip_duration']) && $details['trip_duration'] == '2' && isset($details['how_many_days']) && isset($details['how_many_nights'])){
                                                                echo '<span class="font-italic font14">'.$details['how_many_days'].' days '.$details['how_many_nights'].' nights</span>';
                                                            }else if(isset($details['trip_duration']) && $details['trip_duration'] == '1' && isset($details['how_many_hours'])){
                                                                echo '<span class="font-italic font14">'.$details['how_many_hours'].' hours </span>';                                                         
                                                            }
                                                        ?> 
                                                    </div>

                                                </div>

                                                <div class="GridLex-col-3_sm-6_xs-7_xss-12">
                                                    <div class="GridLex-inner line-1 font14 text-center text-left-sm text-muted spacing-1">
                                                        <div class="rating-item rating-item-lg  mt-10-xs">
                                                            <input type="hidden" class="rating" data-filled="fa fa-star rating-rated" data-empty="fa fa-star-o" data-fractions="2" data-readonly value="<?php echo isset($details['total_rating'])?$details['total_rating']:0;?>"/>
                                                            <div class="rating-text">Based on <a href="#"><?php echo $review_count; ?> reviews</a></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="GridLex-col-3_sm-6_xs-5_xss-12">
                                                    <div class="GridLex-inner text-right text-left-xss">
                                                        <a href="<?php echo base_url().'trip-view/'.$details['trip_code']?>" class="btn btn-primary btn-sm btn-block mt-15-xs"><i class="ion-arrow-left-c"></i> Back to detail</a>
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
               <div class=" col-sm-12 pt-30 pb-30 text-center">
                                <div class="col-xs-4 col-sm-4 col-lg-4 p-0 ">
                                    <i class="fa fa-check active_book" aria-hidden="true"></i> 
                                    <span class="progressline"> </span>
                                </div>
                                <div class="col-xs-4 col-sm-4 col-lg-4 p-0">
                                    <i class="fa fa-check active_book " aria-hidden="true"></i> 
                                    <span class="progressline"> </span>
                                </div>
                                <div class="col-xs-4 col-sm-4 col-lg-4 p-0">
                                    <i class="fa fa-check inactive_book " aria-hidden="true"></i> 
                                  
                                </div>
                                
                            </div>
                <div class="pt-30 pb-50">

                    <div class="container">

                        <div class="row">

                            <div class="col-xs-12 col-sm-8 col-md-12 mt-20">

                                <div class="itinerary-toggle-wrapper">

                                    <div class="panel-group bootstrap-toggle">

                                        <div class="panel">
                                            <div class="panel-heading active">
                                                <div class="panel-title">
                                                    <a data-toggle="collapse" aria-expanded="true" data-parent="#" href="#bootstarp-toggle-one-2">
                                                        <div class="itinerary-day">
                                                            <span class="number">02</span>
                                                        </div>
                                                        <div class="itinerary-header">
                                                            <h4>Traveler Information </h4>

                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div id="bootstarp-toggle-one-2" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    <div class="row gap-20">
                                                         <?php if ($this->session->userdata('user_id') == '') {?>
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
                                                         </div> <?php }?>
                                    <?php echo form_open_multipart('#', array('class' => 'trip-proceed', 'id' => 'trip_proceed')); 
                                    if($this->session->userdata('user_type')=='VA'){ $user_fullname=''; }
                                    if($this->session->userdata('user_type')=='VA'){ $user_email=''; }
                                    if($this->session->userdata('user_type')=='VA'){ $user_phone=''; }
                                    ?>
                                                        
                                    <div class="col-sm-12 col-md-4">

                                        <div class="form-group"> 
                                            <label>Username</label>
                                            <input class="form-control" placeholder="Min 4 characters" name="user_name" id="user_name" type="text" value="<?php echo $user_fullname;?>"> 
                                        </div>

                                    </div>

                                    <div class="col-sm-12 col-md-4">

                                        <div class="form-group"> 
                                            <label>Email Address</label>
                                            <input class="form-control" placeholder="Enter your email address" name="email" id="email" type="text" value="<?php echo $user_email;?>"> 
                                        </div>

                                    </div>

                                    <div class="col-sm-12 col-md-4">

                                        <div class="form-group"> 
                                            <label>Phone Number</label>
                                            <input class="form-control" placeholder="Enter your phone number" name="phonenumber" id="phonenumber" type="text" value="<?php echo $user_phone;?>"> 
                                        </div>

                                    </div>

                                   <input type="hidden" id="tripId" value="<?php echo isset($details['id'])?$details['id']:0?>">                  
                                    <?php echo form_close()?>                    
                                   <?php if ($this->session->userdata('user_id') == '') {?>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="login-box-box-action">
                                            Already have account? <a data-toggle="modal" href="#loginModal">Log-in</a>
                                        </div>
                                    </div>                  
                                   <?php }?>

                                </div>
                                                    
                                                        <div class="text-right">
                                                        <a class="btn btn-primary mt-25 confirm_user" href="javascript:;">Next</a>
                                                        </div>

                                                </div>
                                            </div>

                                        </div>
                                        <!-- end of panel -->
                                        
                                    

                                        <!-- end of panel -->


                                    </div>

                                </div>
                                
                            </div>

                        </div>

                    </div>

                </div>

            </div>
<?php $this->load->view('includes/footer')?>
                
	