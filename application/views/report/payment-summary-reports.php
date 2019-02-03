<?php $this->load->view('includes/header') ?>

<!-- start Main Wrapper -->

<div class="main-wrapper scrollspy-container">

    <!-- start Breadcrumb -->

    <div class="breadcrumb-wrapper">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="<?= base_url() ?>">Home</a></li>
                <li><a href="#">Report</a></li>
                <li  class="active"><a href="#">Payment Summary</a></li>
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

                <?php echo form_open_multipart(base_url() . $url, array('method' => 'get', 'class' => 'form-horizontal margin-top-30', 'id' => 'payment-summary-report-form')); ?>
                <div class="col-xs-12 col-sm-4 col-lg-4">
                    <div class="row gap-10" id="rangeDatePicker">

                        <div class="col-xss-12 col-xs-6 col-sm-6">
                            <div class="form-group">
                                <label>From</label>
                                <input name="from" autocomplete="off" value="<?= $from ?>" type="text" id="rangeDatePickerFrom" class="form-control" placeholder="yyyy/mm/dd" autocomplete="off"/>
                            </div>
                        </div>

                        <div class="col-xss-12 col-xs-6 col-sm-6">
                            <div class="form-group">
                                <label>To</label>
                                <input name="to" autocomplete="off" value="<?= $to ?>" type="text" id="rangeDatePickerTo" class="form-control" placeholder="yyyy/mm/dd" autocomplete="off"/>
                            </div>
                        </div>

                    </div>
                </div>                            
                <div class="col-xs-12 col-sm-6 col-lg-6">
                    <div class="form-group">
                        <label>Title</label>
                        <div class="row">
                            <div class="col-xs-12 col-sm-8 col-md-8">
                                <input name="title" value="<?= $title ?>" type="text" class="form-control" placeholder="Search by PNR no & Trip name" id="searchTitle">
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <button type="submit" class="btn btn-primary btn-block" id="paymentSummarySearchBtn"><i class="fa fa-search"></i> Search</button>                                            
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
                <div class="col-xs-2 col-sm-1 col-lg-1 text-right">
                    <a href="javascript:;" class="btn btn-info c_mt" id="paymentSummaryExportXLSX">Export</a>
                </div>
                <div class="table-resonsive">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th>Date of Booking</th>                                                        
                                <th>PNR</th>                                                        
                                <th>Trip Name</th> 
                                <?php if ($this->session->userdata('user_type') == 'SA') { ?>
                                    <th>BYT Received Amount</th>                                                
                                    <th>Booking Type</th>
                                <?php } else if ($this->session->userdata('user_type') == 'VA') { ?>
                                    <th>Credit</th>
                                <?php } ?>
                                    <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($payment_summary_reports) && count($payment_summary_reports) > 0) {

                                foreach ($payment_summary_reports as $row) {
                                    ?>
                                    <?php
                                    if ($this->session->userdata('user_type') == 'SA') {
                                        $net_price = $row['net_price'];
                                    } else {
                                        $net_price = $row['credit'];
                                    }
                                    ?>
                                    <tr>
                                        <td><?= date("M d, Y h:i A", strtotime($row['booked_on'])); ?></td>
                                        <td>
                                <?php if ($this->session->userdata('user_type') == 'VA') { ?>
                                    <a href="<?= base_url() ?>PNR-status/<?= $row['pnr_no'] ?>/2" target="_new"><?= $row['pnr_no'] ?></a>
                                    <?php }if ($this->session->userdata('user_type') == 'SA') { ?>
                                    <a href="<?= base_url() ?>PNR-status-report/<?= $row['pnr_no'] ?>" target="_new"><?= $row['pnr_no'] ?></a>
                                <?php } ?>
                                </td>
                                <td><a href="<?=base_url()?>trip-view/<?= $row['trip_code']; ?>" target="_new"><?= $row['trip_name'] ?></a></td>
                                <td><?= $net_price ?></td>
                                <?php if ($this->session->userdata('user_type') == 'SA') { ?>
                                    <td><?= $row['user_type'] == 'SA' || $row['user_type'] == 'SA' ? 'OFFICE BOOKING' : 'B2C BOOKING' ?></td>                                                                
                                <?php } ?>
                                        <td><a href="<?= base_url() ?>my-transaction-reports?from=&to=&status=&title=<?= $row['pnr_no'] ?>" target="_new">View Transaction</a></td>
                                        
                                </tr>
                                <?php
                            }
                        } else {
                            $col = 4;
                            if ($this->session->userdata('user_type') == 'SA') {
                                $col = 5;
                            }
                            echo "<tr><td colspan='" . $col . "' style='text-align:center'>No Data Found</td></tr>";
                        }
                        ?> 	
                        </tbody>                                                
                    </table>
                </div>
                <div class="pager-wrappper text-right clearfix bt mt-0  col-sm-12">

                    <div class="pager-innner">

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
