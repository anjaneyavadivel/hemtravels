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
                    <div class="col-xs-12 col-sm-6 pt-20 pb-5 clearfix">
                        <!--                         left side - center-->
                        <div class="col-xs-12 col-sm-12 pt-10 pb-5 clearfix">
                            <div class="col-xs-0 col-sm-1 col-lg-4">

                            </div>
                            <div class="col-xs-10 col-sm-10 col-lg-6">
                                <div class="form-group">
                                    <label>Search</label>
                                    <div class="row gap-0">
                                        <div class="col-xs-9 col-sm-10 col-md-10">
                                            <input type="text" class="form-control" placeholder="Enter category name">
                                        </div>
                                        <div class="col-xs-3 col-sm-2 col-md-2">
                                            <a href="#" class="btn btn-primary btn-block"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-2 col-sm-1 col-lg-1 text-right">
                                <a class="btn btn-info c_mt"  data-toggle="modal" href="#add-category">Add</a>
                            </div>
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th>Sno</th>
                                        <th>Category Name</th>
                                        <th>Staus</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Attraction Visit</td>
                                        <td><h4 class="text-info">Active</h4></td>
                                        <td><a href="#" ><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Click here to edit"></i></a>
                                            <a href="#"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Click here to delete"></i> </a></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Boating</td>
                                        <td><h4 class="text-info">Active</h4></td>
                                        <td><a href="#" ><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Click here to edit"></i></a>
                                            <a href="#"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Click here to delete"></i> </a></td>
                                   </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Cycling</td>
                                        <td><h4 class="text-info">Active</h4></td>
                                           <td><a href="#" ><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Click here to edit"></i></a>
                                            <a href="#"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Click here to delete"></i> </a></td>
                                </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Cycling</td>
                                        <td><h4 class="text-danger">Deactive</h4></td>
                                        <td><a href="#" class="text-primary"><i class="fa fa-check" data-toggle="tooltip" data-placement="top" title="Click here to active"></i></a>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Cycling</td>
                                        <td><h4 class="text-danger">Deactive</h4></td>
                                            <td><a href="#" class="text-primary"><i class="fa fa-check" data-toggle="tooltip" data-placement="top" title="Click here to active"></i></a>
                                </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Dooley</td>
                                        <td><h4 class="text-danger">Deactive</h4></td>
                                              <td><a href="#" class="text-primary"><i class="fa fa-check" data-toggle="tooltip" data-placement="top" title="Click here to active"></i></a>
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
        <div id="add-category" class="modal fade login-box-wrapper modal-overflow" tabindex="-1" data-backdrop="static" data-keyboard="false" data-replace="true">
    
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center">Add Category</h4>
            </div>

            <div class="modal-body">

                <div class="row gap-20">

                    <div class="col-sm-12 col-md-12">

                        <div class="form-group"> 
                            <label>Category Name</label>
                            <input class="form-control" placeholder="" type="text"> 
                        </div>

                    </div>


                </div>

            </div>

            <div class="modal-footer text-center">
                <button type="button" class="btn btn-primary">Add</button>
                <button type="button" data-dismiss="modal" class="btn btn-primary btn-border">Close</button>
            </div>

        </div>
		<!-- start Footer Wrapper -->
		
		<?php $this->load->view('includes/footer')?>
		
	