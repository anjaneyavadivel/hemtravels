<?php $this->load->view('includes/header') ?>


<!-- start Main Wrapper -->

<div class="main-wrapper scrollspy-container">

    <!-- start Breadcrumb -->

    <div class="breadcrumb-wrapper">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url() ?>">Home</a></li>
                <li  class="active"><a href="#">Shared Trip from Vendor</a></li>
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
                <?php echo form_open_multipart(base_url() . 'trip-shared', array('class' => 'form-horizontal margin-top-30', 'id' => 'search-state-form')); ?>

                <div class="col-xs-12 col-sm-3 col-lg-3">
                    <div class="form-group">
                        <label>Status</label>
                        <select class="selectpicker show-tick form-control" title="Select placeholder">
                            <option value="">All</option>
                            <option value="0">New</option>
                            <option value="1">Pending</option>
                            <option value="1">Completed</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-8 col-lg-8">
                    <div class="form-group">
                        <label>Title</label>
                        <div class="row">
                            <div class="col-xs-12 col-sm-8 col-md-8">
                                <input type="text" class="form-control" placeholder="Search Trip Title, PNR No, Phone No">
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-search"></i> Search</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
                <table class="table ">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Trip Name</th>
                            <th>Shared By</th>
                            <th>Shared To</th>
                            <th>Shared To Mail	</th>
                            <th>Coupon Name</th>
                            <th>Status</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($triplist) && count($triplist) > 0) {
                            $i = 1;
                            foreach ($triplist as $row) {
                                $id = $row['id'];
                                $code = $row['code'];
                                $trip_name = $row['trip_name'];
                                $user_fullname = $row['user_fullname'];
                                $user_fullname = $row['user_fullname'];
                                $email = $row['email'];
                                $coupon_name = $row['coupon_name'];
                                $status = $row['status'];
                                $status_active = array('', 'new', 'marked', 'cancelled');
                                $int = explode(",", $status);
                                foreach ($int as $val) {
                                    ?>
                                    <tr>
                                        <td><?= $code; ?></td>
                                        <td><?= $trip_name; ?></td>
                                        <td><?= $user_fullname; ?></td>
                                        <td><?= $user_fullname; ?></td>
                                        <td><?= $email; ?></td>
                                        <td><?= $coupon_name; ?></td>
                                        <td><h4><?= $status_active[$val]; ?></h4></td>

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
		
