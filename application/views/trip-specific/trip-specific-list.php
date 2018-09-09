<?php $this->load->view('includes/header') ?>
<!-- start Main Wrapper -->

<div class="main-wrapper scrollspy-container">

    <!-- start Breadcrumb -->

    <div class="breadcrumb-wrapper">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url() ?>">Home</a></li>
                <li><a href="#">Master</a></li>
                <li  class="active"><a href="#">trip specific</a></li>
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
                            <?php echo form_open_multipart(base_url() . 'trip-specific', array('class' => 'form-horizontal margin-top-30', 'id' => 'search-coupon-code-form')); ?>
                            <div class="col-xs-12 col-sm-6 col-md-2">
                                
                            </div>
                            <div class="col-xs-9 col-sm-5 col-md-6">
                                <input type="text" name="trip_search" class="form-control" placeholder="Enter the name" value="<?= $trip_search ?>">
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
                            <th>id</th>
                            <th>Name</th>
							<th>type</th>
                            
                            <th>Valid From</th>
                            <th>Valid To</th>
                            <th>no of travel</th>
							 <th>no of max</th>
							  <th>no of min</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($triplist) && count($triplist) > 0) {
                            $i = 1;
                            foreach ($triplist as $row) {
                                $id = $row['id'];
								$title = $row['title'];
                                $from_date = $row['from_date'];
                                $to_date = $row['to_date'];
                                $status_active = array('deactive', 'active');
                                $type = array('', 'Set Offer Specific Day', 'Set Trip Close Specific Day');

                                $isactive = $row['isactive'];
                                $status_active = array('deactive', 'active');
                                $int = explode(",", $isactive);
                                $btn_type = array('text-danger', 'text-info');
                                foreach ($int as $val) {
                                    ?>
                                    <tr>
                                        <td><?= $row['id']; ?></td>
                                        <td><?= $row['title']; ?></td>
                                        <td><?= $type[$row['type']]; ?></td>
                                        <td><?= $row['trip_name']; ?></td>
            
                                        <td><?= date("M d,Y", strtotime($row['from_date'])); ?></td>
                                        <td><?= date("M d,Y", strtotime($row['to_date'])); ?></td>
                                        <td><?php echo $row['percentage_amount'];
                            if ($row['offer_type'] == 2) {
                                echo '%';
                            } ?></td>
                                        <td><h4 class="<?= $btn_type[$isactive]; ?>"><?= $status_active[$isactive]; ?></h4></td>
            <?php if ($isactive != '0') { ?> 
                                           <td><!-- <a class=" btn-view-couponcode" data-val="<?= $id ?>" ><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="Click here to view"></i></a>-->
                                                <a class="<?= $btn_type[$isactive]; ?> btn-edit-coupon-code" data-val="<?= $id ?>" ><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Click here to edit"></i></a>
                                                <a href="<?= base_url(); ?>trip-shared/delete/<?= $id ?>"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Click here to delete"></i> </a></td><?php } ?>
            <?php if ($isactive != '1') { ?><td><a href="<?= base_url(); ?>trip-shared/active/<?= $id ?>" class="<?= $btn_type[$val]; ?>"><i class="fa fa-check" data-toggle="tooltip" data-placement="top" title="Click here to active"></i></a><?php } ?>

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
		
