<?php $this->load->view('includes/header')?>

            <!-- start Main Wrapper -->

            <div class="main-wrapper scrollspy-container">

                <!-- start Breadcrumb -->

                <div class="breadcrumb-wrapper">
                    <div class="container">
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Master</a></li>
                            <li  class="active"><a href="#">Category Master</a></li>
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
                            
                            <div class="col-xs-12 col-sm-4 col-lg-4">
                                                <div class="row gap-10" id="rangeDatePicker">

                                                    <div class="col-xss-12 col-xs-6 col-sm-6">
                                                        <div class="form-group">
                                                            <label>From</label>
                                                            <input type="text" id="rangeDatePickerTo" class="form-control" placeholder="yyyy/mm/dd" />
                                                        </div>
                                                    </div>

                                                    <div class="col-xss-12 col-xs-6 col-sm-6">
                                                        <div class="form-group">
                                                            <label>To</label>
                                                            <input type="text" id="rangeDatePickerFrom" class="form-control" placeholder="yyyy/mm/dd" />
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-2 col-lg-2">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="selectpicker show-tick form-control" title="Select placeholder">
                                                        <option value="">All</option>
                                                        <option value="0">Withdrawals</option>
                                                        <option value="1">Deposits</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-lg-6">
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-8 col-md-8">
                                                            <input type="text" class="form-control" placeholder="Search">
                                                        </div>
                                                        <div class="col-xs-12 col-sm-4 col-md-4">
                                                            <a href="#" class="btn btn-primary btn-block"><i class="fa fa-search"></i> Search</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                            <div class="col-xs-2 col-sm-1 col-lg-1 text-right">
                                <a class="btn btn-info c_mt" >Export XL</a>
                            </div><div class="col-xs-12 col-sm-12 col-lg-12 text-right">
                                        UnClear Amount(INR): <span class="text-info">300.00 </span>
                                        Your Balance(INR): <span class="text-primary">1260.50 </span>
                                        <a class="btn btn-sm btn-info" data-toggle="modal" href="#add">Withdraw</a>
                                        <a class="btn btn-sm btn-primary" data-toggle="modal" href="#">Add Money</a>
                                    </div>
                            <table class="table ">
                                                <thead>
                                                    <tr>
                                                        <th>Date &amp; Time</th>
                                                        <th>Transaction Details</th>
                                                        <th>Withdrawals (INR)</th>
                                                        <th>Deposits (INR)</th>
                                                        <th>Balance(INR)</th>
                                                        <th>Status</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>19 Feb 2018, 04:20pm</td>
                                                        <td>Book: Goa - Vascodacoma</td>
                                                        <td class="text-right">300.00</td>
                                                        <td class="text-right"></td>
                                                        <td class="text-right"><h4 class="text-info">400.00</h4></td>
                                         <td><h4 class="text-primary"  data-toggle="tooltip" data-placement="top" data-original-title="InProgress to Payment">InProgress</h4></td>
                                                    </tr>
                                                    <tr>
                                                        <td>09 Feb 2018, 04:20pm</td>
                                                        <td>Book: Goa - Vascodacoma</td>
                                                        <td class="text-right">300.00</td>
                                                        <td class="text-right"></td>
                                                        <td class="text-right"><h4 class="text-info">700.00</h4></td>
                                                    <td><h4 class="text-darker"  data-toggle="tooltip" data-placement="top" data-original-title="executed to Payment">Executed</h4></td>
                                         </tr>
                                                    <tr>
                                                        <td>02 Feb 2018, 10:20am</td>
                                                        <td>Deposits</td>
                                                        <td class="text-right"></td>
                                                        <td class="text-right">1000.00</td>
                                                        <td class="text-right"><h4 class="text-info">1000.00</h4></td>
                                                    <td><h4 class="text-darker"  data-toggle="tooltip" data-placement="top" data-original-title="executed to Payment">Executed</h4></td>
                                                    </tr>
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
                                                <li>
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
                                                </li>
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
