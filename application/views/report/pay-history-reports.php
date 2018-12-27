<?php $this->load->view('includes/header')?>

            <!-- start Main Wrapper -->

            <div class="main-wrapper scrollspy-container">

                <!-- start Breadcrumb -->

                <div class="breadcrumb-wrapper">
                    <div class="container">
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Report</a></li>
                            <li  class="active"><a href="#">Pay History</a></li>
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
                            
                            <?php echo form_open_multipart(base_url() . $url, array('method'=>'get','class' => 'form-horizontal margin-top-30', 'id' => 'pay-history-report-form')); ?>
<!--                            <div class="col-xs-12 col-sm-4 col-lg-4">
                                <div class="row gap-10" id="rangeDatePicker">

                                    <div class="col-xss-12 col-xs-6 col-sm-6">
                                        <div class="form-group">
                                            <label>From</label>
                                            <input name="from" autocomplete="off" value="<?=$from?>" type="text" id="rangeDatePickerFrom" class="form-control" placeholder="yyyy/mm/dd" autocomplete="off"/>
                                        </div>
                                    </div>

                                    <div class="col-xss-12 col-xs-6 col-sm-6">
                                        <div class="form-group">
                                            <label>To</label>
                                            <input name="to" autocomplete="off" value="<?=$to?>" type="text" id="rangeDatePickerTo" class="form-control" placeholder="yyyy/mm/dd" autocomplete="off"/>
                                        </div>
                                    </div>

                                </div>
                            </div>                            -->
                            <div class="col-xs-12 col-sm-6 col-lg-6">
                                <div class="form-group">
<!--                                    <label>Title</label>-->
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-8 col-md-8">
                                            <input name="title" value="<?=$title?>" type="hidden" class="form-control" placeholder="Search by PNR no & Trip name" id="searchTitle">
                                            <input name="download" value="1" type="hidden" class="form-control" >
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-4">
                                            <button type="submit" class="btn btn-info btn-block" id="payHistorySearchBtn">Export</button>                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
<!--                            <div class="col-xs-2 col-sm-1 col-lg-1 text-right">
                                <a href="javascript:;" class="btn btn-info c_mt" id="payHistoryExportXLSX">Export</a>
                            </div>-->
                            <table class="table ">
                                                <thead>
                                                    <tr>
                                                        <th>PNR No</th>  
                                                        <th>User Name</th>                                                      
                                                        <th>From User</th>
                                                        <th>To User</th>
                                                        <th>Trip Name</th>
                                                        <th>Date &amp; Time</th>
                                                        <th>Transaction Notes</th>
                                                        <th>Withdrawals (INR)</th>
                                                        <th>Deposits (INR)</th>                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        if (isset($pay_history_reports) && count($pay_history_reports) > 0) {
                                                            
                                                            foreach ($pay_history_reports as $row) { 
                                                                $fromuser = $row['fromuser'];
                                                                    $touser = $row['touser'];
                                                                    if($row['from_userid']==0){$fromuser = 'Admin';}
                                                                    if($row['to_userid']==0){$touser = 'Admin';}
                                                                    if($row['userid']==0){$row['recordusername'] = 'Admin';}?>
                                                                    <tr>
                                                                        <td><?= $row['pnr_no'] ?></td>                                                                        
                                                                        <td><?= $row['recordusername'] ?></td>
                                                                        <td><?= $fromuser ?></td>
                                                                        <td><?= $touser ?></td>
                                                                        <td><?= $row['trip_name'] ?></td>
                                                                        <td><?= date("M d, Y", strtotime($row['date_time'])); ?></td>
                                                                        <td><?= $row['transaction_notes'] ?> </td>
                                                                        <td <?php if($row['withdrawals']!=0){echo 'class="text-primary"';}?>><?= $row['withdrawals']; ?></td>
                                                                        <td <?php if($row['deposits']!=0){echo 'class="text-info"';}?>><?= $row['deposits']; ?></td>
                                                                        
                                                                    </tr>
                                                            <?php
                                                            }
                                                    }else{
                                                        echo "<tr><td colspan='9' style='text-align:center'>No Data Found</td></tr>";
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

            		<?php $this->load->view('includes/footer')?>
