<?php $this->load->view('includes/header')?>
  <!-- start Main Wrapper -->

           <div class="main-wrapper scrollspy-container">

                <!-- start Breadcrumb -->

                <div class="breadcrumb-wrapper">
                    <div class="container">
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url()?>">Home</a></li>
                            <li><a href="<?php echo base_url('trip-list')?>">Trip List</a></li>
                            <li class="active">Calendar View</li>
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
                                                        <a href="<?php echo base_url('trip-list')?>" class="btn btn-primary btn-sm btn-block mt-15-xs"><i class="ion-arrow-left-c"></i> Back to detail</a>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>


                            </div><div class="timetable-example">
                                        <div class="tiva-timetable" data-source="php" data-view="month"></div>
                                 </div>

                </div>

                        </div>

                    </div>


            <!-- end Main Wrapper -->

            <!-- start Footer Wrapper -->

            <div class="footer-wrapper scrollspy-footer">

                <footer class="main-footer">

                    <div class="container">

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

                                <p class="copy-right">&#169; 2017 Togoby - tour hosting</p>

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
		<!-- start Footer Wrapper -->
		
		<?php $this->load->view('includes/footer')?>
                
	