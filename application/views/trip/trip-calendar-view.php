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

           

        </div>
		<!-- start Footer Wrapper -->
		
		<?php $this->load->view('includes/footer')?>
                
	