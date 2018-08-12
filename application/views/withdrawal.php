<?php $this->load->view('includes/header')?>
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
                                            <div class="col-xs-12 col-sm-3 col-lg-3">
                                                <div class="form-group">
                                                    <label>Booked From</label>
                                                    <select class="selectpicker show-tick form-control" title="Select placeholder">
                                                        <option value="">All</option>
                                                        <option value="0">B2C Booking</option>
                                                        <option value="1">Office Booking</option>
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
                                                            <a href="#" class="btn btn-primary btn-block"><i class="fa fa-search"></i> Search</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

<div class="bg-white">

                <div class="container pt-70 clearfix">
                    <div class="col-xs-12 col-sm-8 col-md-8 mb-30">
                        <div class="">
                          <div class="tab-style-01-wrapper">

                            <ul class="tab-nav">
                                <li class=""><a href="#tshare" data-toggle="tab" aria-expanded="true">VENDOR SHARED TRIP</a></li>
                         
                            </ul>
                            <div class="tab-content">

                                
<div class="tab-pane active in" id="tshare">
<span class="text-right col-xs-12">
                                                <a href="shared_trips.html">View All<i class="ion-android-arrow-forward"></i></a></span>
                                    <div class="tab-inner">
                                        <table class="table ">
                                <thead>
                                    <tr>
                                        <th>Shared Date</th>
                                        <th>Shared By</th>
                                        <th>Email of Vendor</th>
                                        <th>Trip Tittle</th>
                                        <th>Shared Status</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>10/Feb/2018</td>
                                        <td>Sam</td>
                                        <td>sam@gmail.com</td>
                                        <td class="text-primary">Cycling</td>
                                        <td><h4 class="text-info">Active</h4></td>
                                        <td><h4 class="text-info">New</h4></td>
                                        <td><a href="view.html" class="btn btn-sm btn-primary btn-border">View</a>
                                        <a href="create_vendors_trip.html" class="btn btn-sm btn-primary btn-border">Make Trip</a></td>
                                    </tr>
                                    <tr>
                                        <td>10/Feb/2018</td>
                                        <td>Sam</td>
                                        <td>sam@gmail.com</td>
                                        <td class="text-primary">Cycling</td>
                                        <td><h4 class="text-danger">Deactive</h4></td>
                                        <td><h4 class="text-info">New</h4></td>
                                        <td><a href="view.html" class="btn btn-sm btn-primary btn-border">View</a></td>
                                    </tr>
                                    <tr>
                                        <td>10/Feb/2018</td>
                                        <td>Sam</td>
                                        <td>sam@gmail.com</td>
                                        <td class="text-primary">Cycling</td>
                                        <td><h4 class="text-info">Active</h4></td>
                                        <td><h4 class="text-color-02">Maked Trip</h4></td>
                                        <td><a href="view.html" class="btn btn-sm btn-primary btn-border">View</a></td>
                                    </tr>
                                </tbody>
                            </table>
                                    </div>

                                </div>

                            </div>

                        </div>
                        </div>
                    </div>
					</div>
                        </div>
								<?php $this->load->view('includes/footer')?>
