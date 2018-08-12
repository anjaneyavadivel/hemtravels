<?php $this->load->view('includes/header') ?>
<link rel="stylesheet" href="<?php echo base_url()?>assets-customs/css/trip-list.css">
<!-- start Main Wrapper -->
<div class="loading" style="display:none;"></div>

<div class="main-wrapper scrollspy-container filter_res">

    <!-- start breadcrumb -->

    <div class="breadcrumb-image-bg" style="background-image:url('<?php echo base_url()?>assets/images/ws.jpg');">
        <div class="container">

            <div class="page-title">

                <div class="row">

                    <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">

                        <h2>Tour offer results</h2>
                        <p>Yet remarkably appearance get him his projection. Diverted endeavor bed peculiar men the not desirous.</p>

                    </div>

                </div>

            </div>

            <div class="breadcrumb-wrapper">

                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url()?>">Home</a></li>

                    <li class="active">Trip List</li>
                </ol>

            </div>

        </div>

    </div>

    <!-- end breadcrumb -->

    <div class="filter-full-width-wrapper">

        <form class="">

            <div class="filter-full-primary">

                <div class="container">

                    <div class="filter-full-primary-inner">

                        <div class="form-holder">

                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-6">

                                    <div class="filter-item bb-sm no-bb-xss">
                                        <label class="block-xs hidden-xs">Filter</label>

                                        <!--												<div class="input-group input-group-addon-icon no-border no-br-sm">
                                                                                                                                                <span class="input-group-addon input-group-addon-icon bg-white"><label><i class="fa fa-map-marker"></i> Filters</label></span>
                                                                                                                                                <input type="text" class="form-control" id="autocompleteTagging" value="Goa" placeholder="" />
                                                                                                                                        </div>-->

                                    </div>

                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-6">

                                    <div class="filter-item-wrapper">

                                        <div class="row">

                                            <div class="col-xss-12 col-xs-6 col-sm-5">

                                                <div class="filter-item mmr">

                                                    <div class="input-group input-group-addon-icon no-border no-br-xs">
                                                        <span class="input-group-addon input-group-addon-icon bg-white">
                                                            <label class="block-xs"><i class="fa fa-sort-amount-asc"></i> Sort by:</label></span>
                                                        <select class="selectpicker form-control block-xs sortOrder">
                                                            <option value="1" selected> Price</option>
                                                            <!--<option value="2"> Location</option>-->
                                                            <option value="3"> Category</option>
                                                            <option value="4"> New Post</option>
                                                            <option value="5"> User Rating</option>
                                                        </select>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="btn-holder filter_mbl">
                            <span class="btn btn-toggle btn-refine collapsed" data-toggle="collapse" data-target="#refine-result">Filter</span>
                        </div>

                    </div>

                </div>

            </div>



        </form>

    </div>

    <div class="pt-30 pb-50">

        <div class="">

            <div class="trip-guide-wrapper">
                <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="filter-full-secondary">

                        <div id="refine-result" class="collapse">

                            <div class=""> 

                                <div class="collapse-inner clearfix">

                                    <div class="row">

                                        <div class="col-xs-12 col-sm-12 col-md-12">

                                            <div class="row">

                                                <div class="col-xss-12 col-xs-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Search</label>
                                                        <input type="text" class="form-control" id="search_title" placeholder="Enter the title">
                                                    </div>
                                                </div>       
                                               
                                                <div class="col-xss-12 col-xs-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Price Range</label>
                                                        <div class="row checkbox-wrapper">
                                                            <div class="col-xss-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                <div class="checkbox-block">
                                                                    <input id="search_price-1" name="search_price[]" type="checkbox" class="checkbox search_price" value="0-999"/>
                                                                    <label class="" for="search_price-1">Rs 0 - 999</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-xss-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                <div class="checkbox-block">
                                                                    <input id="search_price-2" name="search_price[]" type="checkbox" class="checkbox search_price" value="1000-2499"/>
                                                                    <label class="" for="search_price-2">Rs 1000 - 2499</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-xss-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                <div class="checkbox-block">
                                                                    <input id="search_price-3" name="search_price[]" type="checkbox" class="checkbox search_price" value="2500-10000"/>
                                                                    <label class="" for="search_price-3">Rs 2,500 - 10000</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-xss-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                <div class="checkbox-block">
                                                                    <input id="search_price-4" name="search_price[]" type="checkbox" class="checkbox search_price" value="10000-50000"/>
                                                                    <label class="" for="search_price-4">Rs 10000 - 50K</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-xss-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                <div class="checkbox-block">
                                                                    <input id="search_price-5" name="search_price[]" type="checkbox" class="checkbox search_price" value="50000"/>
                                                                    <label class="" for="search_price-5">INR 50K+</label>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xss-12 col-xs-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Number of people</label>
                                                        <div class="row checkbox-wrapper">
                                                            <div class="col-xss-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                <div class="checkbox-block">
                                                                    <input id="search_people_1" name="search_peoples[]" type="checkbox" class="checkbox search_people" value="1_5"/>
                                                                    <label class="" for="search_people_1">1 - 5</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-xss-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                <div class="checkbox-block">
                                                                    <input id="search_people_2" name="search_peoples[]" type="checkbox" class="checkbox search_people" value="6_10"/>
                                                                    <label class="" for="search_people_2">6 - 10</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-xss-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                <div class="checkbox-block">
                                                                    <input id="search_people_3" name="search_peoples[]" type="checkbox" class="checkbox search_people" value="11_20"/>
                                                                    <label class="" for="search_people_3">11 - 20</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-xss-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                <div class="checkbox-block">
                                                                    <input id="search_people_4" name="search_peoples[]" type="checkbox" class="checkbox search_people" value="20"/>
                                                                    <label class="" for="search_people_4">20 +</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php if(isset($category_list) && count($category_list) > 0) { ?>
                                                <div class="col-xss-12 col-xs-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Category</label>
                                                        <div class="row checkbox-wrapper">
                                                            <?php foreach($category_list as $v) { 
                                                                echo '<div class="col-xss-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                        <div class="checkbox-block">
                                                                            <input id="catgeory_'.$v['id'].'" name="categor_ids[]" type="checkbox" class="checkbox search_category" value="'.$v['id'].'"/>
                                                                            <label class="" for="catgeory_'.$v['id'].'">'.$v['name'].'</label>
                                                                        </div>
                                                                      </div>';
                                                            } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                                
                                                <div class="col-xss-12 col-xs-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Tags</label>
                                                        <div class="form-group form-spin-group">
                                                            <input name="tags" type="text" class="form-control" id="autocompleteTagging2" value="" placeholder="" />                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-xs-12 col-sm-12 mb-10">


                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-8 col-lg-8">

                    <div class="GridLex-gap-20 GridLex-gap-15-mdd GridLex-gap-10-xs">

                        <div class="itinerary-list-wrapper trip-list-items-wrapper">
                            
                        </div>

                    </div>

                </div>
            </div>
                                <div class="pager-wrappper clearfix">

                                    <div class="pager-innner">

                                        <!-- <div class="clearfix">
                                                Showing reslut 1 to 15 from 248 
                                        </div> -->

                                        <div class="clearfix">
                                            <a href="javascript:;" class="load_more">Load more...</a>
                                            <input type="hidden" id="currentPage" value="1">
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

<script>
    var group_tags = '<?=json_encode($tags);?>';
</script>

                    <!-- start Footer Wrapper -->

                    <?php $this->load->view('includes/footer') ?>
                
