<?php $this->load->view('includes/header')?>
  <!-- start Main Wrapper -->

           <div class="main-wrapper scrollspy-container">

                <!-- start Breadcrumb -->

                <div class="breadcrumb-wrapper">
                    <div class="container">
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url()?>">Home</a></li>
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
                    <div class="col-xs-12 col-sm-6 pt-20 pb-5 clearfix">
                        <!--                         left side - center-->
                        <div class="col-xs-12 col-sm-12 pt-10 pb-5 clearfix">
                            <div class="col-xs-0 col-sm-1 col-lg-4">

                            </div>
                            <div class="col-xs-10 col-sm-10 col-lg-6">
                                <div class="form-group">
                                    <label>Search</label>
                                    <div class="row gap-0">
                                        <?php echo form_open_multipart(base_url() . 'category-master', array('class' => 'form-horizontal margin-top-30', 'id' => 'search-category-form')); ?>

                                        <div class="col-xs-9 col-sm-10 col-md-10">
                                            <input type="text" name="category_search" class="form-control" placeholder="Enter category name" value="<?=$category_search?>">
                                        </div>
                                        <div class="col-xs-3 col-sm-2 col-md-2">
                                            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-search"></i></button>
                                        </div>
                                        <?php echo form_close(); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-2 col-sm-1 col-lg-1 text-right">
                                <a class="btn btn-info c_mt btn-add-category">Add</a>
                            </div>
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th>Sno</th>
                                        <th>Category Name</th>
                                        <th>Staus</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
								<?php 
								if(isset($categorylist) && count($categorylist)>0)
								{
									$i=1;
									foreach($categorylist as $row)
									{
										$id=$row['id'];	
										$name=$row['name'];
										$isactive=$row['isactive'];
										$status_active = array('deactive','active');
										$int=explode(",",$isactive); 
										$btn_type=array('text-danger','text-info');	
										foreach($int as $val)
										{
										?>
                                    <tr>
                                        <td><?=$id;?></td>
                                        <td><?=$name;?></td>
                                        <td><h4 class="<?=$btn_type[$val];?>"><?=$status_active[$val];?></h4></td>
                                       <?php if($isactive!='0'){?> 
                                        <td><a class="<?=$btn_type[$val];?> btn-edit-category" data-val="<?=$id?>" ><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Click here to edit"></i></a>
                                            <a href="<?=base_url();?>category-master/delete/<?=$id?>"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Click here to delete"></i> </a></td><?php }?>
										<?php if($isactive!='1'){?><td><a href="#" class="<?=$btn_type[$val];?>"><i class="fa fa-check" data-toggle="tooltip" data-placement="top" title="Click here to active"></i></a><?php }?>

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
		
	