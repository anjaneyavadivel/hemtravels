
<?php $this->load->view('includes/header') ?>

<!-- start Main Wrapper -->

<div class="main-wrapper scrollspy-container">

    <!-- start Breadcrumb -->

    <div class="breadcrumb-wrapper">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="<?= base_url() ?>">Home</a></li>
                <li  class="active"><a href="#">Booking List</a></li>
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
                 <?php echo form_open_multipart(base_url() . $url, array('method'=>'get','class' => 'form-horizontal margin-top-30', 'id' => 'booking-report-form')); ?>
                           
                <div class="col-xs-12 col-sm-4 col-lg-4">
                    <div class="row gap-10" id="rangeDatePicker">

                        <div class="col-xss-12 col-xs-6 col-sm-6">
                            <div class="form-group">
                                <label>Date of Trip From</label>
                                <input name="from" autocomplete="off" value="<?=$from?>" type="text" id="rangeDatePickerFrom" class="form-control" placeholder="MMM D, YYYY" />
                            </div>
                        </div>

                        <div class="col-xss-12 col-xs-6 col-sm-6">
                            <div class="form-group">
                                <label>Date of Trip To</label>
                                <input name="to" autocomplete="off" value="<?=$to?>" type="text" id="rangeDatePickerTo" class="form-control" placeholder="MMM D, YYYY" />
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-lg-4">
                    <div class="row gap-10" id="bookedRangeDatePicker">

                        <div class="col-xss-12 col-xs-6 col-sm-6">
                            <div class="form-group">
                                <label>Booked On - From</label>
                                <input name="bookedonfrom" autocomplete="off" value="<?=$bookedOnFrom?>" type="text" id="bookedRangeDatePickerFrom" class="form-control" placeholder="MMM D, YYYY" />
                            </div>
                        </div>

                        <div class="col-xss-12 col-xs-6 col-sm-6">
                            <div class="form-group">
                                <label>Booked On - To</label>
                                <input name="bookedonto" autocomplete="off" value="<?=$bookedOnTo?>" type="text" id="bookedRangeDatePickerTo" class="form-control" placeholder="MMM D, YYYY" />
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xs-12 col-sm-3 col-lg-3">
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="selectpicker show-tick form-control" id="bookingStatus" title="Status">
                            <option value="">All</option>
                            <option value="1" <?php if($status==1){echo 'selected';}?>>Pending</option>
                            <option value="2" <?php if($status==2){echo 'selected';}?>>Booked</option>
                            <option value="3" <?php if($status==3){echo 'selected';}?>>Cancelled</option>
                            <option value="4" <?php if($status==4){echo 'selected';}?>>Confirmed</option>
                            <option value="5" <?php if($status==5){echo 'selected';}?>>Completed</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3 col-lg-3">
                    <div class="form-group">
                        <label>Booked From</label>
                        <select name="bookfrom" class="selectpicker show-tick form-control" id="bookedFrom" title="Booked From">
                            <option value="">All</option>
                            <option value="1" <?php if($bookfrom==1){echo 'selected';}?>>B2C Booking</option>
                            <option value="2" <?php if($bookfrom==2){echo 'selected';}?>>Office Booking</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-8 col-lg-8">
                    <div class="form-group">
                        <label>Title</label>
                        <div class="row">
                            <div class="col-xs-12 col-sm-8 col-md-8">
                                <input name="title" value="<?=$title?>" type="text" id="bookSearchTitle" class="form-control" placeholder="Search Trip Title, PNR No, Phone No">
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <button type="submit" class="btn btn-primary btn-block" id="bookSearchBtn"><i class="fa fa-search"></i> Search</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
                <?php if($url=='booking-wise-reports'){?>
                <div class="col-xs-2 col-sm-1 col-lg-1 text-right">
                    <a class="btn btn-info c_mt" id="bookExportXLSX">Export</a>
                </div>
                <?php }?>
                <table class="table ">
                    <thead>
                        <tr>
                            <th>Booked On</th>
                            <th>PNR No</th>
                            <th>Booked From</th>
                            <th>Trip Title</th>
                            <th>Date of Trip</th>
                            <th>Pickup Location</th>
                            <th>No of  Travellers</th>
                            <th>Total Amount</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($bookinglist) && count($bookinglist) > 0) {
                            $i = 1;
                            foreach ($bookinglist as $row) {
                                $pnr_no = $row['pnr_no'];
                                $status = $row['status'];
                                $user_type = $row['user_type'];
                                $status_val = array('New', 'Pending', 'Booked', 'Cancelled', 'Confirmed', 'Completed');
                                $user_type_val = array('CU'=>'B2C Booking','GU'=>'B2C Booking','VA'=>'Office Booking');
                                    ?>
                                    <tr>
                                        <td><?= date("M d, Y", strtotime($row['booked_on'])); ?></td>
                                        <td><?= $pnr_no; ?></td>
                                        <td><?=$user_type_val[$user_type]?></td>
                                        <td><a href="<?=base_url()?>trip-view/<?= $row['trip_code']; ?>" target="_new"><?= $row['trip_name']; ?></a></td>
                                        <td><?= date("M d, Y", strtotime($row['date_of_trip'])); ?></td>
                                        <td><?= $row['pick_up_location']; ?></td>
                                        <td><?= $row['number_of_persons']; ?></td>
                                        <td><?= $row['total_trip_price']; ?></td>
                                        <td><h4 class="text-info"  data-toggle="tooltip" data-placement="top" data-original-title="Booking status <?=$status_val[$status]?>"><?= $status_val[$status]; ?></h4></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
                                                <span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                   <li> <a href="<?=base_url()?>PNR-status/<?=$pnr_no?>/1" target="_new"><i class="fa fa-eye"></i> View Ticket</a></li>
                                            <?php if ($this->session->userdata('user_type') == 'VA') {?>
                                            <li><a href="<?=base_url()?>PNR-status/<?=$pnr_no?>/2" target="_new"><i class="fa fa-eye"></i> Your Report</a></li>
                                            <?php }if ($this->session->userdata('user_type') == 'SA') {?>
                                            <li><a href="<?=base_url()?>PNR-status-report/<?=$pnr_no?>" target="_new"><i class="fa fa-eye"></i> Your Report</a></li>
                                            <?php }if ($this->session->userdata('user_type') == 'VA' && ($row['status']==2||$row['status']==4)) {?>
                                            <li><a href="<?=base_url()?>PNR-status/<?=$pnr_no?>/3" target="_new"><i class="fa fa-remove"></i> Cancel Trip</a></li>
                                            <?php }?>
                                            
                                                </ul>
                                            </div>
                                            
                                            
                                        </td>
                                    </tr>
                            <?php
                        }
                    }else{
                        echo "<tr><td colspan='10' style='text-align:center'>No Data Found</td></tr>";
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
<?php $this->load->view('includes/footer') ?>