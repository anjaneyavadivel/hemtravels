<?php $this->load->view('includes/header')?>
  <!-- start Main Wrapper -->

           <div class="main-wrapper scrollspy-container">

                <!-- start Breadcrumb -->

                <div class="breadcrumb-wrapper">
                    <div class="container">
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url()?>">Home</a></li>
                            <li><a href="#">Master</a></li>
                            <li  class="active"><a href="#">trip shared Master</a></li>
                        </ol>
                    </div>
                </div>

				
				
                <!-- end Breadcrumb -->
                <div class=" container pb-50">
                    <div class="col-xs-0 col-sm-3">
                        <!--                         left side-->
                    </div>
                    <div class="col-xs-12 col-sm-6 pt-20 pb-5 clearfix">
                        <!--                         left side - center-->
                        <div class="col-xs-12 col-sm-12 pt-10 pb-5 clearfix">
                            <div class="col-xs-0 col-sm-1 col-lg-4">

                            </div>
                            <div class="col-xs-10 col-sm-10 col-lg-6">
                                <div class="form-group">
                                    <label>Search</label>
                                    <div class="row gap-0">
                                        <?php echo form_open_multipart(base_url() . 'trip-shared', array('class' => 'form-horizontal margin-top-30', 'id' => 'search-state-form')); ?>

                                        <div class="col-xs-9 col-sm-10 col-md-10">
                                            <input type="text" name="trip_search" class="form-control" placeholder="Enter state name" value="<?=$trip_search?>">
                                        </div>
                                        <div class="col-xs-3 col-sm-2 col-md-2">
                                            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-search"></i></button>
                                        </div>
                                        <?php echo form_close(); ?>
                                    </div>
                                </div>
                            </div>
                            
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Code</th>
                                        <th>Trip Name</th>
                                        <th>shared user</th>
                                        <th>user</th>
                                        <th>user mail	</th>
                                        <th>coupon name</th>
                                        <th>Status</th>

                                    </tr>
                                </thead>
                                <tbody>
								<?php 
								if(isset($triplist) && count($triplist)>0)
								{
									$i=1;
									foreach($triplist as $row)
									{
										$id=$row['id'];	
										$code=$row['code'];
										$trip_name=$row['trip_name'];
										$user_fullname=$row['user_fullname'];
										$user_fullname=$row['user_fullname'];
										$email=$row['email'];
										$coupon_name=$row['coupon_name'];
										$status=$row['status'];
										$status_active = array('','new','marked','cancelled');
										$int=explode(",",$status); 
										foreach($int as $val)
										{
										?>
                                    <tr>
                                        <td><?=$id;?></td>
										<td><?=$code;?></td>
                                        <td><?=$trip_name;?></td>
										<td><?=$user_fullname;?></td>
                                        <td><?=$user_fullname;?></td>
										<td><?=$email;?></td>
                                        <td><?=$coupon_name;?></td>
                                        <td><h4><?=$status_active[$val];?></h4></td>
                                       
                                    </tr>
										<?php 				
									} 
									}
								}		
								?> 	
                                    
                                    
                                </tbody>
                            </table>
                            <div class="pager-wrappper text-right clearfix bt mt-0  col-sm-12">

                                <div class="pager-innner">

                                    <!-- <div class="clearfix">
                                            Showing reslut 1 to 15 from 248 
                                    </div> -->

                                    <div class="clearfix">
                                        <nav>
                                           
                                            <ul class="pagination">
                                                <?php foreach ($links as $link) {
                                                    echo "<li>". $link."</li>";
                                                    } ?>
<!--                                                <li>
                                                    <a href="#" aria-label="Previous">
                                                        <span aria-hidden="true">&laquo;</span>
                                                    </a>
                                                </li>
                                                <li class="active"><a href="#">1</a></li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                                <li><span>...</span></li>
                                                <li><a href="#">12</a></li>
                                                <li><a href="#">13</a></li>
                                                <li>
                                                    <a href="#" aria-label="Next">
                                                        <span aria-hidden="true">&raquo;</span>
                                                    </a>
                                                </li>-->
                                            </ul>
                                        </nav>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        <!-- end Main Wrapper -->

        
		<!-- start Footer Wrapper -->
		
		<?php $this->load->view('includes/footer')?>
		
	