
<?php $this->load->view('includes/header') ?>

<!-- start Main Wrapper -->

<div class="main-wrapper scrollspy-container">

    <!-- start Breadcrumb -->

    <div class="breadcrumb-wrapper">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="<?= base_url() ?>">Home</a></li>
                <li  class="active"><a href="#">Trip Shared</a></li>
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
                 <?php echo form_open_multipart(base_url() . $url, array('method'=>'get','class' => 'form-horizontal margin-top-30', 'id' => 'trip-shared-report-form')); ?>
                 
                
                <div class="col-xs-12 col-sm-3 col-lg-3">
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="selectpicker show-tick form-control" id="status" title="Status">
                            <option value="">All</option>
                            <option value="1" <?php if($status=='1'){echo 'selected';}?>>New</option>
                            <option value="2" <?php if($status=='2'){echo 'selected';}?>>Maked</option>                           
                            <option value="3" <?php if($status=='3'){echo 'selected';}?>>Cancelled</option>                           
                        </select>
                    </div>
                </div>                
                <div class="col-xs-12 col-sm-8 col-lg-8">
                    <div class="form-group">
                        <label>Title</label>
                        <div class="row">
                            <div class="col-xs-12 col-sm-8 col-md-8">
                                <input name="title" value="<?=$title?>" type="text" class="form-control" id="titleSearch" placeholder="Search Trip Title">
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                     <button type="submit" class="btn btn-primary btn-block" id="searchSharedTrip"><i class="fa fa-search"></i> Search</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>                
                <div class="col-xs-2 col-sm-1 col-lg-1 text-right">
                    <a href="javascript:;" class="btn btn-info c_mt" id="tripSharedReport" >Export</a>
                </div>       
                 <div class="table-resonsive">            
                <table class="table ">
                    <thead>
                        <tr> 
                            <th>Code</th>
                            <th>Trip Name</th>
                            <th>Shared By</th>
                            <th>Shared To</th>
                            <th>Shared To Mail	</th>
                            <th>Coupon Name</th>
                            <th>Maked Trip Name</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($tripSharedlist) && count($tripSharedlist) > 0) {
                            
                            foreach ($tripSharedlist as $row) {  
                               
                                $id = $row['id'];
                                $code = $row['code'];
                                $trip_name = $row['trip_name'];
                                $sharedusername = $row['sharedusername'];
                                $tousername = $row['tousername'];
                                $email = $row['email'];
                                if($email==''){$email = $row['to_user_mail'];}
                                $coupon_name = $row['coupon_name'];
                                if($coupon_name!=''){
                                    if($row['offer_type']==1){$coupon_name .= ' - Rs:'.$row['percentage_amount'];}
                                    else{$coupon_name .= ' - '.$row['percentage_amount'].'%';}
                                }
                                $status = $row['status'];
                                $status_active = array('', 'New', 'Maked Trip', 'Cancelled');
                                    ?>
                                    <tr>
                                        <td><?= $code; ?></td>
                                        <td><a href="<?=base_url()?>trip-view/<?=$row['trip_code']?>" target="_new" class=""><?= $trip_name; ?></a></td>
                                        <td><a href="<?=base_url()?>profile/<?=$row['shared_user_id']?>" target="_new" class=""><?= $sharedusername; ?></a></td>
                                        <td><a href="<?=base_url()?>profile/<?=$row['user_id']?>" target="_new" class=""><?= $tousername; ?></a></td>
                                        <td><?= $email; ?></td>
                                        <td><?= $coupon_name; ?></td>
                                        <td><a href="<?=base_url()?>trip-view/<?=$row['maked_trip_code']?>" target="_new" class=""><?= $row['maked_trip_name']; ?></a></td>
                                        <td><h4><?= $status_active[$status]; ?></h4></td>
                                    </tr>
                                    <?php
                                   
                            }
                        }else{
                            echo "<td colspan='6' style='text-align:center'>No Data Found</td>";
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

