<?php $this->load->view('includes/header') ?>
<?php
$data['view'] = $view;
$data['loginuserid'] = $loginuserid;
$data['profile_id'] = $profile_id;
$this->load->view('user/side_bar', $data);
$v = $view->row();?>
<div class="col-xs-12 col-sm-8 col-md-9">

    <div class="dashboard-wrapper">

        <h4 class="section-title">Change password</h4>
        <p class="mmt-15 mb-20">Middleton fat two satisfied additions. So continued he or commanded household smallness delivered.</p>

        <?php echo form_open_multipart(base_url() . 'change-password', array('class' => 'form-horizontal margin-top-30', 'id' => 'change_password')); ?>

        <div class="row gap-20">

            <!--<div class="col-sm-6 col-md-4">
            
                    <div class="form-group">
                            <label>Current Password</label>
                            <input type="password" class="form-control" value="55454545">
                    </div>
                    
            </div>-->

            <div class="clear"></div>

            <div class="col-sm-6 col-md-4">

                <div class="form-group">
                    <label>New Password</label>
                    <input type="password" name="password1" id="password1" class="form-control" placeholder="your new password">
                </div>

            </div>

            <div class="clear"></div>

            <div class="col-sm-6 col-md-4">

                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="password2" id="password2" class="form-control"  placeholder="confirm your new password">
                </div>

            </div>

            <div class="clear mb-10"></div>

            <div class="col-sm-12">
                <input type="submit" value="Save" class="btn btn-primary" name="save" />
                <a href="<?php echo base_url() ?>" class="btn btn-primary btn-border">Cancel</a>
            </div>

        </div>

        <?php echo form_close() ?>

    </div>

</div>

</div>

</div>

</div>

<?php
$this->load->view('includes/footer')?>