<?php $this->load->view('includes/header') ?>
<!-- start Main Wrapper -->

<div class="main-wrapper scrollspy-container">

    <!-- start Breadcrumb -->

    <div class="breadcrumb-wrapper">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url() ?>">Home</a></li>
                <li><a href="#">Master</a></li>
                <li  class="active"><a href="#">Coupon Code Master</a></li>
            </ol>
        </div>
    </div>

    <!-- end Breadcrumb -->
    <div class=" container pb-50">
        <div class="col-xs-12 col-sm-12 pt-20 pb-5 clearfix">
            <!--                         left side - center-->
            <div class="col-xs-12 col-sm-12 pt-10 pb-5 clearfix">
                <div class="col-xs-10 col-sm-10 col-lg-10">
                    <div class="form-group">
                        <label>Search</label>
                        <div class="row gap-0">
                            <?php echo form_open_multipart(base_url() . 'coupon-code-master', array('class' => 'form-horizontal margin-top-30', 'id' => 'search-coupon-code-form')); ?>
                            <div class="col-xs-12 col-sm-6 col-md-2">
                                <select name="offer_type" class="selectpicker show-tick form-control" title="Select placeholder">
                                    <option value="">Offer <?php if ($this->session->userdata('user_type') != 'SA') { echo 'To';}else{echo 'Type';}?>? All</option>
                            <?php if ($this->session->userdata('user_type') != 'SA') { ?>
                                    <option value="1" <?php if ($offer_type == 1) {
                                echo 'selected';
                            } ?>>Customer Offer</option>
                                    <option value="2" <?php if ($offer_type == 2) {
                                echo 'selected';
                            } ?>>Vendor Offer</option>
                            <?php }if ($this->session->userdata('user_type') == 'SA') { ?>
                                        <option value="3" <?php if ($offer_type == 3) {
                                    echo 'selected';
                                } ?>>Admin Offer</option>
<?php } ?>
                                </select>
                            </div>
                            <div class="col-xs-9 col-sm-5 col-md-6">
                                <input type="text" name="coupon_code_search" class="form-control" placeholder="Enter the coupon code/name" value="<?= $coupon_code_search ?>">
                            </div>
                            <div class="col-xs-3 col-sm-1 col-md-1">
                                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-search"></i></button>
                            </div>
<?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
                <div class="col-xs-2 col-sm-2 col-lg-2 text-right">
                    <a class="btn btn-info c_mt btn-add-coupon-code">Add</a>
                </div>
                <table class="table ">
                    <thead>
                        <tr>
                            <th>Coupon Code</th>
                            <th>Name</th>
                            <th>Offer <?php if ($this->session->userdata('user_type') != 'SA') { echo 'To';}else{echo 'Type';}?></th>
                            <th>Trip Title</th> 
                        <?php if ($this->session->userdata('user_type') == 'SA') { ?>
                                <th>Category Name</th> 
                        <?php } ?>
                            <th>Valid From</th>
                            <th>Valid To</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($couponcodelist) && count($couponcodelist) > 0) {
                            $i = 1;
                            foreach ($couponcodelist as $row) {
                                $id = $row['id'];
                                $validity_from = $row['validity_from'];
                                $validity_to = $row['validity_to'];
                                $status_active = array('deactive', 'active');
                                $coupontype = array('', 'Customer', 'Vendor', 'Admin Offer');

                                $isactive = $row['isactive'];
                                $status_active = array('deactive', 'active');
                                $int = explode(",", $isactive);
                                $btn_type = array('text-danger', 'text-info');
                                foreach ($int as $val) {
                                    ?>
                                    <tr>
                                        <td><?= $row['coupon_code']; ?></td>
                                        <td><?= $row['coupon_name']; ?></td>
                                        <td><?= $coupontype[$row['type']]; ?></td>
                                        <td><?= $row['trip_name']; ?></td>
            <?php if ($this->session->userdata('user_type') == 'SA') { ?>
                                            <td><?= $row['categoryname']; ?></td>
                                        <?php } ?>
                                        <td><?= date("M d,Y", strtotime($row['validity_from'])); ?></td>
                                        <td><?= date("M d,Y", strtotime($row['validity_to'])); ?></td>
                                        <td><?php echo $row['percentage_amount'];
                            if ($row['offer_type'] == 2) {
                                echo '%';
                            } ?></td>
                                        <td><h4 class="<?= $btn_type[$isactive]; ?>"><?= $status_active[$isactive]; ?></h4></td>
            <?php if ($isactive != '0') { ?> 
                                           <td><!-- <a class=" btn-view-couponcode" data-val="<?= $id ?>" ><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="Click here to view"></i></a>-->
                                                <a class="<?= $btn_type[$isactive]; ?> btn-edit-coupon-code" data-val="<?= $id ?>" ><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Click here to edit"></i></a>
                                                <a href="<?= base_url(); ?>coupon-code-master/delete/<?= $id ?>"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Click here to delete"></i> </a></td><?php } ?>
            <?php if ($isactive != '1') { ?><td><a href="<?= base_url(); ?>coupon-code-master/active/<?= $id ?>" class="<?= $btn_type[$val]; ?>"><i class="fa fa-check" data-toggle="tooltip" data-placement="top" title="Click here to active"></i></a><?php } ?>

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

<?php $this->load->view('includes/footer') ?>
		
