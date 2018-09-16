
<?php $this->load->view('includes/header') ?>

<!-- start Main Wrapper -->

<div class="main-wrapper scrollspy-container">

    <!-- start Breadcrumb -->

    <div class="breadcrumb-wrapper">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="<?= base_url() ?>">Home</a></li>
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
                 <?php echo form_open_multipart(base_url() . $url, array('method'=>'get','class' => 'form-horizontal margin-top-30', 'id' => 'trip-report-form')); ?>
                           
                <div class="col-xs-12 col-sm-4 col-lg-4">
                    <div class="row gap-10" id="rangeDatePicker">

                        <div class="col-xss-12 col-xs-6 col-sm-6">
                            <div class="form-group">
                                <label>Date of Trip From</label>
                                <input name="from" value="<?=$from?>" type="text" id="rangeDatePickerFrom" class="form-control" placeholder="MMM D, YYYY" />
                            </div>
                        </div>

                        <div class="col-xss-12 col-xs-6 col-sm-6">
                            <div class="form-group">
                                <label>Date of Trip To</label>
                                <input name="to" value="<?=$to?>" type="text" id="rangeDatePickerTo" class="form-control" placeholder="MMM D, YYYY" />
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xs-12 col-sm-3 col-lg-3">
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="selectpicker show-tick form-control" id="status" title="Status">
                            <option value="">All</option>
                            <option value="1" <?php if($status==1){echo 'selected';}?>>Active</option>
                            <option value="2" <?php if($status==2){echo 'selected';}?>>Inactive</option>                           
                        </select>
                    </div>
                </div>                
                <div class="col-xs-12 col-sm-8 col-lg-8">
                    <div class="form-group">
                        <label>Title</label>
                        <div class="row">
                            <div class="col-xs-12 col-sm-8 col-md-8">
                                <input name="title" value="<?=$title?>" type="text" class="form-control" id="titleSearch" placeholder="Search Trip Title, Category">
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                     <button type="submit" class="btn btn-primary btn-block" id="searchTrip"><i class="fa fa-search"></i> Search</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>                
                <div class="col-xs-2 col-sm-1 col-lg-1 text-right">
                    <a href="javascript:;" class="btn btn-info c_mt" id="tripReport" >Export</a>
                </div>                
                <table class="table ">
                    <thead>
                        <tr>
                            <th>Sno</th>
                            <th>Trip Code</th>
                            <th>Name</th>
                            <th>Vendor</th>
                            <th>Category</th>                            
                            <th>State</th>                            
                            <th>City</th>                            
                            <th>Price to Adult</th>
                            <th>Price to Children</th>
                            <th>Price to Infan</th>
                            <!--<th>View To</th>-->
                            <th>Created On</th>                            
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($triplist) && count($triplist) > 0) {
                            $i = 1;
                            foreach ($triplist as $row) {
                               // $view_to = $row['view_to'] == 2 ?'Vendor':'Customer & Vendor';
                                $isactive = $row['isactive'] == 1 ?'Active':'Inactive';
                                $status_val = array('New', 'Pending', 'Booked', 'Cancelled', 'Confirmed', 'Completed');
                                $user_type_val = array('CU'=>'B2C Booking','GU'=>'B2C Booking','VA'=>'Office Booking');
                                    ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $row['trip_code']; ?></td>
                                        <td><?= $row['trip_name']; ?></td>
                                        <td><?= $row['user_fullname']; ?></td>
                                        <td><?= $row['category']; ?></td>
                                        <td><?= $row['state']; ?></td>
                                        <td><?= $row['city']; ?></td>
                                        <td><?= $row['price_to_adult']; ?></td>
                                        <td><?= $row['price_to_child']; ?></td>
                                        <td><?= $row['price_to_infan']; ?></td>                                       
                                        <td><?= date("M d, Y", strtotime($row['created_on'])); ?></td>
                                        <td><?= $isactive ?></td>
                                        <td><a href="<?=base_url()?>trip-view/<?=$row['trip_code']?>" target="_new" class="btn btn-border btn-sm btn-primary">View</a></td>                                       
                                    </tr>
                                    <?php
                                   $i++;
                            }
                        }else{
                            echo "<td colspan='13' style='text-align:center'>No Data Found</td>";
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
                                    <?php
                                    foreach ($links as $link) {
                                        echo "<li>" . $link . "</li>";
                                    }
                                    ?>                                   
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
<?php $this->load->view('includes/footer') ?>

