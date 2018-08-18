
<?php $this->load->view('includes/header')?>

            <!-- start Main Wrapper -->

            <div class="main-wrapper scrollspy-container">

                <!-- start Breadcrumb -->

                <div class="breadcrumb-wrapper">
                    <div class="container">
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Master</a></li>
                            <li  class="active"><a href="#">Category Master</a></li>
                        </ol>
                    </div>
                </div>

                <!-- end Breadcrumb -->
                <div class=" container pb-50">
                    <div class="col-xs-0 col-sm-3">
                        <!--                         left side-->
                    </div>
                    <div class="col-xs-12 col-sm-12 pt-20 pb-5 clearfix">
                        <!--                         left side - center-->
                        <div class="col-xs-12 col-sm-12 pt-10 pb-5 clearfix">
                            
                            <div class="col-xs-12 col-sm-4 col-lg-4">
                                                <div class="row gap-10" id="rangeDatePicker">

                                                    <div class="col-xss-12 col-xs-6 col-sm-6">
                                                        <div class="form-group">
                                                            <label>From</label>
                                                            <input type="text" id="rangeDatePickerTo" class="form-control" placeholder="yyyy/mm/dd" />
                                                        </div>
                                                    </div>

                                                    <div class="col-xss-12 col-xs-6 col-sm-6">
                                                        <div class="form-group">
                                                            <label>To</label>
                                                            <input type="text" id="rangeDatePickerFrom" class="form-control" placeholder="yyyy/mm/dd" />
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-3 col-lg-3">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="selectpicker show-tick form-control" title="Select placeholder">
                                                        <option value="">All</option>
                                                        <option value="0">New</option>
                                                        <option value="1">Pending</option>
                                                        <option value="1">Completed</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-3 col-lg-3">
                                                <div class="form-group">
                                                    <label>Booked From</label>
                                                    <select class="selectpicker show-tick form-control" title="Select placeholder">
                                                        <option value="">All</option>
                                                        <option value="0">B2C Booking</option>
                                                        <option value="1">Office Booking</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-8 col-lg-8">
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-8 col-md-8">
                                                            <input type="text" class="form-control" placeholder="Search Trip Title, PNR No, Phone No">
                                                        </div>
                                                        <div class="col-xs-12 col-sm-4 col-md-4">
                                                            <a href="#" class="btn btn-primary btn-block"><i class="fa fa-search"></i> Search</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
<!--                            <div class="col-xs-2 col-sm-1 col-lg-1 text-right mr-20">
                                <a class="btn btn-info c_mt" >Export PDF</a>
                            </div>-->
                            <div class="col-xs-2 col-sm-1 col-lg-1 text-right">
                                <a class="btn btn-info c_mt" >Export XL</a>
                            </div>
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th>Booked On</th>
                                        <th>PNR No</th>
                                        <th>Booked From</th>
                                        <th>Booking Date</th>
                                        <th>Trip Title</th>
                                        <th>No of  Travellers</th>
                                        <th>Total Amount</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
								<?php 
								if(isset($bookinglist) && count($bookinglist)>0)
								{
									$i=1;
									foreach($bookinglist as $row)
									{
                                    
										$booked_on=$row['booked_on'];	
										$pnr_no=$row['pnr_no'];
										$trip_name=$row['trip_name'];
										$status=$row['status'];
										$no_of_traveller=$row['no_of_traveller'];
										$price_to_adult=$row['price_to_adult'];
										
										$status=$row['status'];
										$status_val = array('New','Pending','Completed');
										$sts=explode(",",$status);
										foreach($sts as $vals)
										{
										
										?>
                                    <tr>
                                        <td><?=date("d/M/y",strtotime($booked_on));?></td>
                                        <td><?=$pnr_no;?></td>
                                        <td>B2C Booking</td>
                                        <td>21 Feb 2018 to 24 Feb 2018</td>
                                        <td><a href="list.html"><?=$trip_name;?></a></td>
                                        <td><?=$no_of_traveller;?></td>
                                        <td><?=$price_to_adult;?></td>
                                        <td><h4 class="text-info"  data-toggle="tooltip" data-placement="top" data-original-title="New order"><?=$status_val[$vals];?></h4></td>
                                        <td><a href="payment-done.html" target="_new" class="btn btn-border btn-sm btn-primary">View</a>
<!--                                            <a href="#" class="btn btn-border btn-sm btn-primary">Edit</a>-->
                                        </td>
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
		<?php $this->load->view('includes/footer')?>

            