<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title text-center">Update Coupon Code</h4>
</div>
<?php echo form_open_multipart(base_url() . 'coupon-code-master/save-edit', array('class' => 'form-horizontal margin-top-30', 'id' => 'edit-coupon-code-form')); ?>

<div class="modal-body">
        <input name="coupon_id" type="hidden" class="form-control"  value="<?=$coupondetail['id']?>"/>

                <div class="row gap-20">

                    <div class="col-sm-12 col-md-12">

                        <div class="form-group"> 
                            <label>Coupon Code<span class="validation">*</span></label>
                            <input class="form-control" name="couponcode" placeholder="eg:B2CDIS200, XXXXXB2C100,  XXXXXB2B200..." type="text" value="<?=$coupondetail['coupon_code']?>"> 
                        </div>

                    </div>
                    <div class="col-sm-12 col-md-12">

                        <div class="form-group"> 
                            <label>Coupon Name<span class="validation">*</span></label>
                            <input class="form-control" name="couponname" placeholder="eg:B2C100, B2B200, diwali offer..." type="text" value="<?=$coupondetail['coupon_name']?>"> 
                        </div>

                    </div>
                    <div class="col-sm-12 col-md-12">
                        <div class="form-group" id="rangeDatePicker">
                            <div class="col-xss-12 col-xs-6 col-sm-6">
                                <div class="form-group">
                                    <label>From<span class="validation">*</span></label>
                                    <input type="text" name="fromdate" id="rangeDatePickerTo" class="form-control" placeholder="M D, YYYY" value="<?=date("M d, Y", strtotime($coupondetail['validity_from']))?>" />
                                </div>
                            </div>

                            <div class="col-xss-12 col-xs-6 col-sm-6">
                                <div class="form-group">
                                    <label>To<span class="validation">*</span></label>
                                    <input type="text" name="todate" id="rangeDatePickerFrom" class="form-control" placeholder="M D, YYYY" value="<?=date("M d, Y", strtotime($coupondetail['validity_to']))?>"/>
                                </div>
                            </div> 
                        </div>

                    </div>
                    <div class="col-sm-12 col-md-12">

                        <div class="form-group"> 
                            <label>Offer To?<span class="validation">*</span></label>
                            <select name="coupontype" id="coupontype" class="selectpicker show-tick form-control" title="Select placeholder">
                                <option value="">Select a offer to...</option>
                                <?php  if ($this->session->userdata('user_type') != 'SA') {  ?>
                                <option value="1" <?php if($coupondetail['type']==1){?>selected<?php }?>>Customer Offer</option>
                                <option value="4" <?php if($coupondetail['type']==4){?>selected<?php }?>>Specific Customer Offer</option>
                                <option value="2" <?php if($coupondetail['type']==2){?>selected<?php }?>>Vendor Offer</option>
                                 <?php  }else if ($this->session->userdata('user_type') == 'SA') {  ?>
                                <option value="3" <?php if($coupondetail['type']==3){?>selected<?php }?>>Admin Offer</option>
                                 <?php  }?>
                            </select>
                        </div>
                    </div>
                    <?php if (isset($trip_list) && $trip_list->num_rows() > 0) {?>
                    <div class="col-sm-12 col-md-12">
                        <div class="form-group"> 
                            <label>Trip Name</label>
                            <select name="tripname" class="cm_tripname selectpicker show-tick form-control">
                                <option value="">Select a trip...</option>
                                <?php foreach($trip_list->result() as $row){?>
                                    <option value="<?=$row->id?>" <?php if($coupondetail['trip_id']==$row->id){?>selected<?php }?>><?=$row->trip_code.' | '.$row->trip_name?></option> 
                                <?php }?>
                            </select>
                        </div>

                    </div>
                    <div class="col-sm-12 col-md-12" id="cm_tripinfo">
                        <table class="table">
    <tbody>
        <tr><td><span class="font600 package_name">Price to Adult:</span></td>
            <td class="table-size text-right"> <?= number_format($pnrinfo->price_to_adult,2); ?></td></tr>
        <tr><td><span class="font600 package_name">Price to Child:</span></td>
            <td class="table-size text-right"> <?= number_format($pnrinfo->price_to_child,2); ?></td></tr>
        <tr><td><span class="font600 package_name">Price to Infan:</span></td>
            <td class="table-size text-right"> <?= number_format($pnrinfo->price_to_infan,2); ?></td></tr>
    </tbody>
</table>
                    </div>
                    <?php }?>
                    
                    <?php if (isset($category_list) && $category_list->num_rows() > 0) {?>
                    <div class="col-sm-12 col-md-12">
                        <div class="form-group"> 
                            <label>Category Name</label>
                            <select name="category_id" class="selectpicker show-tick form-control">
                                <option value="">Select a category...</option>
                                <?php foreach($category_list->result() as $row){?>
                                    <option value="<?=$row->id?>" <?php if($coupondetail['category_id']==$row->id){?>selected<?php }?>><?=$row->name?></option> 
                                <?php }?>
                            </select>
                        </div>

                    </div>
                    <?php }?>
                    
                    <div class="col-sm-12 col-md-12 adminalter hide">

                        <div class="form-group"> 
                                <label>Increase Price(%) to Adult</label>
                                <input class="form-control" name="price_to_adult" value="<?=$coupondetail['price_to_adult']?>" placeholder="Enter the increase price percentage... ex: 5" type="text"> 
                            </div>
                    </div>
                    
                    <div class="col-sm-12 col-md-12 adminalter hide">

                        <div class="form-group"> 
                                <label>Increase Price(%) to Child</label>
                                <input class="form-control" name="price_to_child" value="<?=$coupondetail['price_to_child']?>" placeholder="Enter the increase price percentage... ex: 4" type="text"> 
                            </div>
                    </div>
                    
                    <div class="col-sm-12 col-md-12 adminalter hide">

                        <div class="form-group"> 
                                <label>Increase Price(%) to Infan</label>
                                <input class="form-control" name="price_to_infan" value="<?=$coupondetail['price_to_infan']?>" placeholder="Enter the increase price percentage... ex: 2" type="text"> 
                            </div>
                    </div>
                    <div class="col-sm-12 col-md-12">

                        <div class="form-group"> 
                            <label>Offer Type<span class="validation">*</span></label>
                            <select name="offertype" id="offertype" class="selectpicker show-tick form-control">
                                <option value="">Select a offer type...</option>
                                <?php  if ($this->session->userdata('user_type') != 'SA') {  ?>
                                <option value="1" <?php if($coupondetail['offer_type']==1){?>selected<?php }?>>Fixed</option>
                                <?php  }  ?>
                                <option value="2" <?php if($coupondetail['offer_type']==2){?>selected<?php }?>>Percentage</option>
                            </select>
                        </div>

                    </div>
                    <div class="col-sm-12 col-md-12">

                        <div class="form-group"> 
                            <label>Amount / Percentage<span class="validation">*</span></label>
                            <input class="form-control" name="offeramount" placeholder="Enter the Fixed Amount / Percentage" type="text" value="<?=$coupondetail['percentage_amount']?>"> 
                        </div>

                    </div>
                    <div class="col-sm-12 col-md-12">

                        <div class="form-group"> 
                            <label>Comments<span class="validation">*</span></label>
                            <textarea class="form-control" name="comment" placeholder="Enter the comments" type="text" value="<?=$coupondetail['comment']?>"> </textarea>
                        </div>

                    </div>


                </div>

            </div>
<div class="modal-footer text-center">
    <span class="message33"></span>
    <button type="submit" class="submit_btn btn btn-primary">Update</button>
    <button type="button" data-dismiss="modal" class="btn btn-primary btn-border">Close</button>
</div>
<?php echo form_close(); ?>
