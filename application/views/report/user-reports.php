
<?php $this->load->view('includes/header') ?>

<!-- start Main Wrapper -->

<div class="main-wrapper scrollspy-container">

    <!-- start Breadcrumb -->

    <div class="breadcrumb-wrapper">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="<?= base_url() ?>">Home</a></li>
                <li  class="active"><a href="#">Users</a></li>
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
                 <?php echo form_open_multipart(base_url() . $url, array('method'=>'get','class' => 'form-horizontal margin-top-30', 'id' => 'user-report-form')); ?>
                           
                <div class="col-xs-12 col-sm-4 col-lg-4">
                    <div class="row gap-10" id="rangeDatePicker">

                        <div class="col-xss-12 col-xs-6 col-sm-6">
                            <div class="form-group">
                                <label>Date From</label>
                                <input name="from" autocomplete="off" value="<?=$from?>" type="text" id="rangeDatePickerFrom" class="form-control" placeholder="MMM D, YYYY" />
                            </div>
                        </div>

                        <div class="col-xss-12 col-xs-6 col-sm-6">
                            <div class="form-group">
                                <label>Date To</label>
                                <input name="to" autocomplete="off" value="<?=$to?>" type="text" id="rangeDatePickerTo" class="form-control" placeholder="MMM D, YYYY" />
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xs-12 col-sm-3 col-lg-3">
                    <div class="form-group">
                        <label>User Type</label>
                        <select name="type" class="selectpicker show-tick form-control" id="userType" title="userType">
                            <option value="">All</option>
                            <option value="VA" <?php if($type=='VA'){echo 'selected';}?>>Vendor</option>
                            <option value="CU" <?php if($type=='CU'){echo 'selected';}?>>Customer</option>                           
                            <option value="GU" <?php if($type=='GU'){echo 'selected';}?>>Guest</option>                           
                        </select>
                    </div>
                   
                </div>
               
                
                <div class="col-xs-12 col-sm-8 col-lg-8">
                    <div class="form-group">
                        <label>Name / Email / Phone</label>
                        <div class="row">
                            <div class="col-xs-12 col-sm-8 col-md-8">
                                <input name="title" value="<?=$title?>" type="text" class="form-control" id="title" placeholder="Search customer name,email,phone">
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                     <button type="submit" class="btn btn-primary btn-block" id="searchUser"><i class="fa fa-search"></i> Search</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php echo form_close(); ?>   
                
                <div class="col-xs-2 col-sm-1 col-lg-1 text-right">
                    <a href="javascript:;" class="btn btn-info c_mt" id="userReport" >Export</a>
                </div>                
                <table class="table ">
                    <thead>
                        <tr>                            
                            <th>Type</th>
                            <th>Name</th>                            
                            <th>Email</th>                            
                            <th>Phone</th>        
                            <th>Gendor</th>                            
                            <th>DOB</th>
                            <th>Balance Amount</th>
                            <th>Unclear Amount</th>                                                    
                            <th>Created On</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($userlist) && count($userlist) > 0) {
                            
                            foreach ($userlist as $row) {                               
                                $isactive  = 'Not Activate';
                                if($row['isactive'] == 1){
                                    $isactive = 'Active';
                                }else if($row['isactive'] == 0){
                                    $isactive = 'Inactive';
                                }                               
                               
                                $userTypes = array('VA' => 'Vendor','GU' =>'Guest','CU'=>'Customer');
                                $type      =  $userTypes[$row['user_type']];
                                $gender = '';
                    
                                if($row['gender'] == 1){
                                   $gender = 'Male';
                                }else if($row['gender'] == 2){
                                   $gender = 'Female';
                                }
                                
                                $dob = '';
                                if(!empty($row['dob'])){
                                  $dob =  date("M d, Y", strtotime($row['dob']));
                                }
                                    ?>
                                    <tr>                                        
                                        <td><?= $type ?></td>
                                        <td><?= $row['user_fullname']; ?></td>                                        
                                        <td><?= $row['email']; ?></td>
                                        <td><?= $row['phone']; ?></td>                                      
                                        <td><?=  $gender?></td>
                                        <td><?=  $dob?></td>                                       
                                        <td><?= $row['balance_amt']; ?></td>
                                        <td><?= $row['unclear_amt']; ?></td>
                                        <td><?= date("M d, Y", strtotime($row['created_on'])); ?></td>
                                        <td><?= $isactive ?></td>                                        
                                    </tr>
                                    <?php
                                   
                            }
                        }else{
                            echo "<td colspan='10' style='text-align:center'>No Data Found</td>";
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

