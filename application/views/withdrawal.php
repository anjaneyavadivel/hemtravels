<?php $this->load->view('includes/header')?>

            <!-- start Main Wrapper -->

            <div class="main-wrapper scrollspy-container">

                <!-- start Breadcrumb -->

                <div class="breadcrumb-wrapper">
                    <div class="container">
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li  class="active"><a href="#">Withdrawals Request</a></li>
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
                            
                            <?php echo form_open_multipart(base_url().'withdrawals-request', array('method'=>'get','class' => 'form-horizontal margin-top-30', 'id' => 'my-transaction-report-form')); ?>
                            <div class="col-xs-12 col-sm-4 col-lg-4">
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
                                            <input name="title" value="<?=$title?>" type="text" class="form-control" placeholder="Search" id="searchTitle">
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-4">
                                            <button type="submit" class="btn btn-primary btn-block" id="transactionSearchBtn"><i class="fa fa-search"></i> Search</button>                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
<!--                            <div class="col-xs-2 col-sm-1 col-lg-1 text-right">
                                <a href="javascript:;" class="btn btn-info c_mt" id="transactionExportXLSX">Export</a>
                            </div>-->
                            <div class="col-xs-12 col-sm-12 col-lg-12 text-right">
                                        UnClear Amount(INR): <span class="text-info">0<?php // echo checkbal_mypayment($loginuser_id, 1)?> </span>
                                        Your Balance(INR): <span class="text-primary">0<?php // echo checkbal_mypayment($loginuser_id, 2)?> </span>
                                        
                                    </div>
                            <table class="table ">
                                                <thead>
                                                    <tr>
                                                        <th>Date &amp; Time</th>
                                                        <th>From</th>
                                                        <th>To</th>
                                                        <th>Transaction Details</th>
                                                        <th>Withdrawals (INR)</th>
                                                        <th>Deposits (INR)</th>
                                                        <th>Balance(INR)</th>
                                                        <th>Status</th>

                                                    </tr>
                                                </thead>
<!--                                                <tbody>
                                                    <?php
                                                        if (isset($transaction_reports) && count($transaction_reports) > 0) {
                                                            $i = 1;
                                                            foreach ($transaction_reports as $row) {                                                                                                              
                                                                $status_val = array('New', 'InProgress', 'Executed', 'Sent');
                                                                    $fromuser = $row['fromuser'];
                                                                    $touser = $row['touser'];
                                                                    if($row['from_userid']==0){$fromuser = 'Admin';}
                                                                    if($row['to_userid']==0){$touser = 'Admin';}
                                                                    ?>
                                                                    <tr>
                                                                        <td><?= date("M d, Y", strtotime($row['date_time'])); ?></td>
                                                                        <td><?= $fromuser ?></td>
                                                                        <td><?= $touser ?></td>
                                                                        <td><?= $row['transaction_notes'] ?></td>
                                                                        <td <?php if($row['withdrawals']!=0){echo 'class="text-primary"';}?>><?= $row['withdrawals']; ?></td>
                                                                        <td <?php if($row['deposits']!=0){echo 'class="text-info"';}?>><?= $row['deposits']; ?></td>
                                                                        <td><h4><?= $row['balance']; ?></h4></td>                                                                       
                                                                        <td> <span data-toggle="tooltip" data-placement="top" data-original-title="Payment status <?=$status_val[$row['status']]?>"><?= $status_val[$row['status']]; ?></span></td>                                                        
                                                                    </tr>
                                                            <?php
                                                            }
                                                    }else{
                                                        echo "<tr><td colspan='6' style='text-align:center'>No Data Found</td></tr>";
                                                    }
                                                    ?> 	
                                                </tbody>                                                -->
                                            </table>
                                            <div class="pager-wrappper text-right clearfix bt mt-0  col-sm-12">

                                                <div class="pager-innner">

                                                    <!-- <div class="clearfix">
                                                            Showing reslut 1 to 15 from 248 
                                                    </div> -->

                                                    <div class="clearfix">
                                                        <nav>
<!--                                                            <ul class="pagination">
                                                               <?php
                                                                foreach ($links as $link) {
                                                                    echo "<li>" . $link . "</li>";
                                                                }
                                                                ?>
                                                            </ul>-->
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
