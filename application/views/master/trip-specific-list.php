<?php $this->load->view('includes/header')?>
  <!-- start Main Wrapper -->

           <div class="main-wrapper scrollspy-container">

                <!-- start Breadcrumb -->

                <div class="breadcrumb-wrapper">
                    <div class="container">
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url()?>">Home</a></li>
                            <li><a href="#">report</a></li>
                            <li  class="active"><a href="#">trip specific</a></li>
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
                            
                            <div class="col-xs-2 col-sm-1 col-lg-1 text-right">
                                <a class="btn btn-info c_mt btn-add-city">Add</a>
                            </div>
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th>Sno</th>
										<th>title </th>
										<th>type</th>
										<th>from date</th>
                                        <th>to date</th>
                                        <th>no of traveller</th>
										<th>no of min booktraveller</th>
										<th>no of max booktraveller</th>
                                        <th>offer type</th>
                                        <th>status</th>
                                        <th>Action</th>

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
										$title=$row['title'];
										$type=$row['type'];
										$type_active = array('','Set Offer Specific Day','Set Trip Close Specific Day');
										$from_date=$row['from_date'];
										$to_date=$row['to_date'];
										$no_of_traveller=$row['no_of_traveller'];	
										$no_of_min_booktraveller=$row['no_of_min_booktraveller'];
										$no_of_max_booktraveller=$row['no_of_max_booktraveller'];
										$offer_type=$row['offer_type'];
										$offer_active = array('','fixed','percentage');
										$isactive=$row['isactive'];
										$status_active = array('deactive','active');
										$int=explode(",",$isactive); 
										$btn_type=array('text-danger','text-info');	
										foreach($int as $val)
										{
										?>
                                    <tr>
                                        <td><?=$id;?></td>
										<td><?=$title;?></td>
										<td><?=$type_active[$type];?></td>
										<td><?=$from_date;?></td>
                                        <td><?=$to_date;?></td>
										<td><?=$no_of_traveller;?></td>
                                        <td><?=$no_of_min_booktraveller;?></td>
										 <td><?=$no_of_max_booktraveller;?></td>
										 <td><?=$offer_active[$offer_type];?></td>
                                        <td><h4 class="<?=$btn_type[$val];?>"><?=$status_active[$val];?></h4></td>
                                       <?php if($isactive!='0'){?> 
                                        <td><a class="<?=$btn_type[$val];?> btn-edit-trip" data-val="<?=$id?>" ><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Click here to edit"></i></a>
                                            <a href="<?=base_url();?>trip-specific/delete/<?=$id?>"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Click here to delete"></i> </a></td><?php }?>
										<?php if($isactive!='1'){?><td><a href="<?=base_url();?>trip-specific/active/<?=$id?>" class="<?=$btn_type[$val];?>"><i class="fa fa-check" data-toggle="tooltip" data-placement="top" title="Click here to active"></i></a><?php }?>

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
		
	