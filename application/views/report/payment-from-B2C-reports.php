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
                                        
                                        <th>Transaction Date</th>
                                        <th>PNR No</th>
                                        <th>Booking Date</th>
                                        <th>Trip Date</th>
                                        <th>Trip Title</th>
                                        <th>No of  Travellers</th>
                                        <th>Trip Amount</th>
                                        <th>Offer Amount</th>
                                        <th>GST Amount</th>
                                        <th>Total Get Amount</th>
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

            <!-- start Footer Wrapper -->

            <div class="footer-wrapper scrollspy-footer">

                <footer class="main-footer">

                    <div class="container">
					
					<div class="logo-wrapper">
						<div class="logo">
							<a href="index.html"><img src="images/logo-white.png" alt="Logo" /></a>
						</div>
					</div>
					
					<div id="navbar" class="navbar-nav-wrapper">
					
						<ul class="nav navbar-nav" id="responsive-menu">

                                <li >
                                    <a href="index.html">Home</a>

                                </li>


                                <li><a href="about-us.html">About Us</a></li>
                                <li><a href="contact-us.html">Contact Us</a></li>
                                <li><a href="faq.html">FAQ</a></li>
                                <li><a href="PNR-status-check.html">PNR Status</a></li>
<!--                                <li><a href="PNR-status-check.html">PNR Status Check</a></li>-->
                                <li>
                                    <a href="#">B2C</a>
                                    <ul>
                                        <li><a href="index.html">B2C home page</a></li>
                                        <li><a href="list.html">List of Trips</a></li>
                                        <li><a href="view.html">View Trips</a></li>
                                        <li><a href="book_ticket.html">Book - summary</a></li>
                                        <li><a href="payment.html">Book - get user info</a></li>
                                        <li><a href="payment-final.html">Book - Payment</a></li>
                                        <li><a href="payment-done.html">Payment Done</a></li>
                                        <li><a href="booking-history.html">Booking History</a></li>
                                        <li><a href="my-wishlist.html">My-Wishlist</a></li>
                                    </ul>

                                </li>
                                <li>
                                    <a href="#">Admin</a>
                                    <ul>
                                        <li><a href="payment-to-vendor.html">Payment to the Vendor</a></li>
                                        <li><a href="cancellation-list.html">Cancellation List</a></li>
                                        <li><a href="booking-list.html">Booking List</a></li>
                                        <li><a href="coupon-code-master.html">Coupon Code Master</a></li>
                                        <li><a href="master.html">Category Master</a></li>
                                        <li><a href="master.html">Tag Master</a></li>
                                        <li><a href="master.html">Trip Inclusions Master</a></li>
                                        <li><a href="master.html">State Master</a></li>
                                        <li><a href="master.html">City Master</a></li>
                                        <li><a href="master.html">Location Master</a></li>
                                        <li><a href="booking-reports.html">Reports - Booking</a></li>
                                        <li><a href="Trip-reports.html">Reports - Trip</a></li>
                                        <li><a href="payment-from-B2C-reports.html">Reports - Payment from B2C</a></li>
                                        <li><a href="payment-from-B2B-reports.html">Reports - Payment from B2B</a></li>
                                        <li><a href="cancellation-payment.html">Reports - Cancellation payment</a></li>
                                    </ul>

                                </li>
                                <li>
                                    <a href="#">B2B</a>
                                    <ul>
                                        <li><a href="B2B-index.html">B2B home page</a></li>
                                        <li><a href="B2B-list.html">List of Trips - Office Bookings</a></li>
                                        <li><a href="view.html">View Trips - Office Bookings</a></li>
                                        <li><a href="create_trip.html">Make New Trip</a></li>
                                        <li><a href="create_vendors_trip.html">Make Trip from Other Vendors</a></li>
                                        <li><a href="cancellation-list.html">Cancellation List</a></li>
                                        <li><a href="coupon-code-master.html">Coupon Code Master</a></li>
                                        <li><a href="shared_trips.html">Shared Trips</a></li>
                                        <li><a href="my-bookings.html">My bookings</a></li>
                                        <li><a href="booking-reports.html">Reports - Booking</a></li>
                                        <li><a href="Trip-reports.html">Reports - Trip</a></li>
                                        <li><a href="payment-from-B2C-reports.html">Reports - Payment from B2C</a></li>
                                        <li><a href="payment-from-B2B-reports.html">Reports - Payment from B2B</a></li>
                                        <li><a href="cancellation-payment.html">Reports - Cancellation payment</a></li>
                                    </ul>

                                </li>

                            </ul>
				
					</div><!--/.nav-collapse -->

                    <div class="nav-mini-wrapper " >
                        <ul class="nav-mini  ">
                            <li class="dropdown "> <a href="profile.html" data-toggle="dropdown"> <img src="images/ws.jpg" alt="images" class="drp_dwn" style="border-radius: 50%;" width="30"/> </a>  <ul class="dropdown-menu">
    <li><a href="dashboard.html" class="text-dark">Profile</a></li>
    <li><a href="my-transaction.html" class="text-dark">Wallet <span class="text-primary wallet">Rs:200</span></a></li>
    <li><a href="profile.html" class="text-dark">Update Profile</a></li>
    <li><a href="change-pass.html" class="text-dark">Change Password</a></li>
    <li><a href="#" class="text-dark">Logout</a></li>
  </ul>
                            </li>
                            <li><a data-toggle="modal" href="#registerModal"><i class="icon-user-follow" data-toggle="tooltip" data-placement="bottom" title="sign up"></i></a></li>
                            <li><a data-toggle="modal" href="#loginModal"><i class="icon-login" data-toggle="tooltip" data-placement="bottom" title="login"></i> </a></li>
                        </ul>
                    </div>
                
                </div>

                </footer>

                <footer class="bottom-footer">

                    <div class="container">

                        <div class="row">

                            <div class="col-xs-12 col-sm-6 col-md-4">

                                <p class="copy-right">&#169; 2018 B2C - tour hosting</p>

                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-4">

                                <ul class="bottom-footer-menu">
                                    <li><a href="#">Cookies</a></li>
                                    <li><a href="#">Policies</a></li>
                                    <li><a href="#">Terms</a></li>
                                    <li><a href="#">Blogs</a></li>
                                </ul>

                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <ul class="bottom-footer-menu for-social">
                                    <li><a href="#"><i class="icon-social-twitter" data-toggle="tooltip" data-placement="top" title="twitter"></i></a></li>
                                    <li><a href="#"><i class="icon-social-facebook" data-toggle="tooltip" data-placement="top" title="facebook"></i></a></li>
                                    <li><a href="#"><i class="icon-social-google" data-toggle="tooltip" data-placement="top" title="google plus"></i></a></li>
                                    <li><a href="#"><i class="icon-social-instagram" data-toggle="tooltip" data-placement="top" title="instrgram"></i></a></li>
                                </ul>
                            </div>

                        </div>

                    </div>


                </footer>

            </div>
		<?php $this->load->view('includes/footer')?>
