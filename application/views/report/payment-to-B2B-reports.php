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
                                                        <option value="0">New</option>
                                                        <option value="1">InProgress</option>
                                                        <option value="1">Paid</option>
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
                            </div>
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th>Booking Date</th>
                                        <th>PNR No</th>
                                        <th>Booked From</th>
                                        <th>Trip Title</th>
                                        <th>No of  Travellers</th>
                                        <th>Trip Amount</th>
                                        <th>Offer Amount</th>
                                        <th>Total Give Amount</th>
                                        <th>Status</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>10 Feb 2018</td>
                                        <td>PNR9977234</td>
                                        <td>Vendor</td>
                                        <td><a href="list.html" target="_new">Attraction Visit</a></td>
                                        <td>2</td>
                                        <td>400</td>
                                        <td>50</td>
                                        <td>350</td>
                                        <td><h4 class="text-info"  data-toggle="tooltip" data-placement="top" data-original-title="New cancellation">New</h4></td>
                                        
                                    </tr>
                                    <tr>
                                        <td>10 Feb 2018</td>
                                        <td>PNR9977234</td>
                                        <td>Customer</td>
                                        <td><a href="list.html" target="_new">Attraction Visit</a></td>
                                        <td>2</td>
                                        <td>300</td>
                                        <td>50</td>
                                        <td>250</td>
                                         <td><h4 class="text-primary"  data-toggle="tooltip" data-placement="top" data-original-title="InProgress to Payment">InProgress</h4></td>
                                        
                                    </tr>
                                    <tr>
                                        <td>10 Feb 2018</td>
                                        <td>PNR9977234</td>
                                        <td>Vendor</td>
                                        <td><a href="list.html" target="_new">Attraction Visit</a></td>
                                        <td>2</td>
                                        <td>300</td>
                                        <td>100</td>
                                        <td>200</td>
                                        <td><h4 class=""  data-toggle="tooltip" data-placement="top" data-original-title="Paid to customer">Paid</h4></td>
                                        
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
