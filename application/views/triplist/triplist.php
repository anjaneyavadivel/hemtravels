<?php $this->load->view('includes/header')?>
            <!-- start Main Wrapper -->
            <div class="main-wrapper scrollspy-container">
                <!-- start Breadcrumb -->
                <div class="breadcrumb-wrapper">
                    <div class="container">
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Report</a></li>
                            <li  class="active"><a href="#">Trip List</a></li>
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
                            
                                            <div class="col-xs-12 col-sm-3 col-lg-3">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="selectpicker show-tick form-control" title="Select placeholder">
                                                        <option value="">All</option>
                                                        <option value="1">Active</option>
                                                        <option value="0">Deactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-8 col-lg-8">
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-8 col-md-8">
                                                            <input type="text" class="form-control" placeholder="Enter the trip title...">
                                                        </div>
                                                        <div class="col-xs-12 col-sm-4 col-md-4">
                                                            <a href="#" class="btn btn-primary btn-block"><i class="fa fa-search"></i> Search</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                            <div class="table-resonsive">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th>Post Date</th>
                                        <th>Trip Tittle</th>
                                        <th>Trip Amount</th>
                                        <th>Total Booking</th>
                                        <th>Status</th>
                                        <th>Actions</th>
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
										$trip_code=$row['trip_code'];	
										$created_on=$row['created_on'];
										$trip_name=$row['trip_name'];
										$total_booking=$row['total_booking'];
										$price_to_adult=$row['price_to_adult'];
										
										$status=$row['status'];
										$status_val = array('Closed','Open');
										$sts=explode(",",$status);
										foreach($sts as $vals)
										{
										$isactive=$row['isactive'];
										$status_active = array('Deactive','Active');
										$int=explode(",",$isactive); 
										$btn_type=array('text-danger','text-info');	
										foreach($int as $val)
										{
										?>
                                    <tr>
                                        <td><?=date("d/M/y",strtotime($created_on));?><sup>
<!--                                                <small style="color: red;"><?=$status_val[$vals];?></small></sup>-->
                                        </td>
                                        <td><?=$trip_name;?></td>
										<td><?=$price_to_adult;?></td>
										<td><?=$total_booking;?></td>
<!--										<td><?=$status_val[$vals];?></td>-->
                                        <td><h4 class="<?=$btn_type[$val];?>"><?=$status_active[$val];?></h4></td>
                                        <td><div class="dropdown">
                                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
                                                <span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="<?=base_url();?>trips/update/<?=$trip_code?>"><i class="fa fa-edit"></i> Edit</a></li>
                                                    <li><a href="<?=base_url();?>trip-view/<?=$trip_code?>"><i class="fa fa-search"></i> View / Book</a></li>
                                                    <li><a href="<?=base_url();?>trip-calendar-view/<?=$trip_code?>"><i class="fa fa-calendar"></i> Month View</a></li>
                                                    <li><a class="share-link" href="javascript:void(0);" data-val="<?=$trip_code?>"><i class="fa fa-share"></i> Share </a></li>
                                                    <?php if($isactive !='0'){?>                                         
                                                        <li><a href="<?=base_url();?>triplist/delete/<?=$id?>"><i class="fa fa-trash"></i> Delete</a></li>
                                                    <?php } else { ?>
                                                        <li><a href="<?=base_url();?>triplist/active/<?=$id?>"><i class="fa fa-check"></i> Active</a></li>
                                                    <?php } ?> 
                                                </ul>
                                            </div>
                                        </td>

                                    </tr>
                                            <?php 				
                                    } 
                                    }
                                    }
                            }		
                            ?> 	
                                </tbody>
                            </table></div>
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

            