<?php $this->load->view('includes/header') ?>

<!-- start Main Wrapper -->

<div class="main-wrapper scrollspy-container">

    <!-- start Breadcrumb -->

    <div class="breadcrumb-wrapper">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="<?= base_url() ?>">Home</a></li>
                <li><a href="javascript:;">Bookings</a></li>
                <li class="active"><a href="#">Tomorrow's Trip</a></li>
            </ol>
        </div>
    </div>

    <!-- end Breadcrumb -->
    <div class=" container pb-50">
        <div class="col-xs-0 col-sm-3">
            <!-- left side-->
        </div>
        <div class="col-xs-12 col-sm-12 pt-20 pb-5 clearfix">
            <!--                         left side - center-->
            <div class="col-xs-12 col-sm-12 pt-10 pb-5 clearfix">
                 <?php echo form_open_multipart(base_url() . $url, array('method'=>'get','class' => 'form-horizontal margin-top-30', 'id' => 'tomorrow-reports-form')); ?>
                           
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
                                
                <div class="col-xs-12 col-sm-8 col-lg-8">
                    <div class="form-group">
                        <label>Title</label>
                        <div class="row">
                            <div class="col-xs-12 col-sm-8 col-md-8">
                                <input name="title" value="<?=$title?>" type="text" class="form-control" id="titleSearch" placeholder="Search trip title, trip code, PNR No">
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                     <button type="submit" class="btn btn-primary btn-block" id="tomorrowTripSearchTrip"><i class="fa fa-search"></i> Search</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>                
                <div class="col-xs-2 col-sm-1 col-lg-1 text-right">
                    <a href="javascript:;" class="btn btn-info c_mt" id="tomorrowTripReport" >Export</a>
                </div>  
                <div class="table-resonsive">
                <table class="table ">
                    <thead>
                        <tr>                            
                            <th>PNR No</th>
                            <th>Date of Booking</th> 
                            <th>Name of the Person</th>  
                            <th>Mobile Number</th>                      
                            <th>Number of Persons</th>                            
                            <th>Pickup Point</th>                            
                            <th>Pickup Time</th>                            
                            <th>Trip Name</th>                                
                            <th>Vendor Name</th>                               
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($bookinglist) && count($bookinglist) > 0) {
                            $vendorName = $this->session->userdata('name');
                            foreach ($bookinglist as $row) {
                                    $time = date("H:i A", strtotime($row['time_of_trip']));
                                    ?>
                                    <tr>                                        
                                        <td><a href="<?=base_url()?>PNR-status/<?=$row['pnr_no']?>/2" target="_new"><?= $row['pnr_no']; ?></a></td>
                                        <td><?= date("M d, Y", strtotime($row['date_of_trip'])); ?></td>
                                        <td><?= $row['booked_to']; ?></td>
                                        <td><?= $row['booked_phone_no']; ?></td>                                       
                                        <td><?= $row['number_of_persons']; ?></td>
                                        <td><?= $row['pick_up_location']; ?></td>
                                        <td><?= $time; ?></td>
                                        <td><a href="<?=base_url()?>trip-view/<?= $row['trip_code']; ?>" target="_new"><?= $row['trip_name'] ?></a></td> 
                                        <td><?= $row['vendor'] ?></td> 
                                    </tr>
                                    <?php
                                   
                            }
                        }else{
                            echo "<td colspan='8' style='text-align:center'>No Data Found</td>";
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