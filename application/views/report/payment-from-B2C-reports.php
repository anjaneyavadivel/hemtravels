<?php $this->load->view('includes/header')?>


            <!-- start Main Wrapper -->

            <div class="main-wrapper scrollspy-container">

                <!-- start Breadcrumb -->

                <div class="breadcrumb-wrapper">
                    <div class="container">
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Report</a></li>
                            <li  class="active"><a href="#">Payment from B2C</a></li>
                        </ol>
                    </div>
                </div>

                <!-- end Breadcrumb -->
                <div class=" container pb-50">
                    <div class="row">
                        <div class="col-xs-0 col-sm-3">
                            <!--                         left side-->
                        </div>
                        <div class="col-xs-12 col-sm-12 pt-20 pb-5 clearfix">
                        <!--                         left side - center-->
                        <div class="col-xs-12 col-sm-12 pt-10 pb-5 clearfix">
                            
                             <?php echo form_open_multipart(base_url() . $url, array('method'=>'get','class' => 'form-horizontal margin-top-30', 'id' => 'payment-b2c-report-form')); ?>
                            <div class="col-xs-12 col-sm-4 col-lg-4">
                                <div class="row gap-10" id="rangeDatePicker">

                                    <div class="col-xss-12 col-xs-6 col-sm-6">
                                        <div class="form-group">
                                            <label>From</label>
                                            <input name="from" autocomplete="off" type="text" id="rangeDatePickerFrom" class="form-control" placeholder="yyyy/mm/dd" value="<?=$from?>" />
                                        </div>
                                    </div>

                                    <div class="col-xss-12 col-xs-6 col-sm-6">
                                        <div class="form-group">
                                            <label>To</label>
                                            <input name="to" autocomplete="off" type="text" id="rangeDatePickerTo" class="form-control" placeholder="yyyy/mm/dd" value="<?=$to?>" />
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-2 col-lg-2">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="selectpicker show-tick form-control" title="Select placeholder" id="status">
                                        <option value="" selected>All</option>
                                        <option value="0" <?php if($status=='0'){echo 'selected';}?>>New</option>
                                        <option value="1" <?php if($status==1){echo 'selected';}?>>InProgress</option>
                                        <option value="2" <?php if($status==2){echo 'selected';}?>>Executed</option>
                                        <option value="3" <?php if($status==3){echo 'selected';}?>>Sent</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-lg-6">
                                <div class="form-group">
                                    <label>Title</label>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-8 col-md-8">
                                            <input name="title" type="text" class="form-control" value="<?=$title?>" placeholder="Search Trip Title, Trip Code, PNR no..." id="searchTitle">
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-4">
                                            <button type="submit" class="btn btn-primary btn-block" id="b2cSearchBtn"><i class="fa fa-search"></i> Search</button>                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-lg-12">
                                    <a class="btn btn-info col-lg-1 col-sm-1 col-lg-1" id="b2cExportXLSX">Export</a>
                                    <p class="col-lg-6">This report will generate after trip completed</p>
                                </div>
                            </div>
                            
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Booked On</th>
                                        <th>PNR No</th>                                        
                                        <th>Trip Title</th>
                                        <th>No of Persons</th>
                                        <th>Total Trip Price</th>
                                        <th><span style="color: #FE8800" data-toggle="tooltip" data-placement="top" data-original-title="Amount sent to Parent Trip/Vendor">Sent to Parent Trip/Vendor Price</span></th>
                                        <th>Offer Amount</th>
                                        <th>Service Charge</th>
                                        <th>GST Amount</th>
                                        <th>Your Final Amount</th>                                        
                                        <th>Status</th>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if (isset($b2c_reports) && count($b2c_reports) > 0) {
                                            $i = 1;
                                            foreach ($b2c_reports as $row) {
                                                $pnr_no = $row['pnr_no'];
                                                $status = $row['tra_status'];                                                
                                                $status_val = array('New', 'InProgress', 'Executed', 'Sent');
                                                
                                                    ?>
                                                    <tr>
                                                        <td><?= date("M d, Y", strtotime($row['booked_on'])); ?></td>
                                                        <?php if($this->session->userdata('user_type') == 'SA'){  ?>
                                                        <td><a href="<?=base_url()?>PNR-status-report/<?= $row['pnr_no']; ?>" target="_new"><?= $pnr_no; ?></a></td>                                                        
                                                        <?php }else{  ?>
                                                        <td><a href="<?=base_url()?>PNR-status/<?= $row['pnr_no']; ?>/2" target="_new"><?= $pnr_no; ?></a></td>                                                        
                                                        <?php }  ?>
                                                        <td><a href="<?=base_url()?>trip-view/<?= $row['trip_code']; ?>" target="_new"><?= $row['trip_name']; ?></a></td>                                                        
                                                        <td><?= $row['number_of_persons']; ?></td>
                                                        <td><?= $row['subtotal_trip_price']; ?></td>
                                                        <?php if($row['vendor_amt']>0){?>
                                                        <td><span style="color: #FE8800" data-toggle="tooltip" data-placement="top" data-original-title="Amount sent to Parent Trip (<?=$row['parent_trip_name'];?>) / Vendor Name ( <?=$row['parent_trip_user_name'];?>|<?=$row['parent_trip_user_email'];?> )"><?= $row['vendor_amt']; ?></span></td>
                                                        <?php }else{?>
                                                        <td><?= $row['vendor_amt']; ?></td>
                                                        <?php }?>
                                                        <td><?= $row['offer_amt']; ?></td>
                                                        <td><?= $row['servicecharge_amt']; ?></td>
                                                        <td><?= $row['gst_amt']; ?></td>
                                                        <td><?= $row['your_final_amt']; ?></td>
                                                        <td><h4 class="text-info"  data-toggle="tooltip" data-placement="top" data-original-title="Booking status <?=$status_val[$status]?>"><?= $status_val[$status]; ?></h4></td>                                                        
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
                                            </ul>
                                        </nav>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>
                    </div>
                </div>
            </div>

            <!-- end Main Wrapper -->

		<?php $this->load->view('includes/footer')?>
