<?php
$mn_updateprofile = $mn_profile = $mn_bank_details = $mn_change_password = $mn_mypost = $mn_history = $mn_mywishlist = $mn_mytransaction = '';
$url = $this->uri->segment(1);
switch ($url) {
    case 'update-profile':$mn_updateprofile = 'active';
        break;
    case 'profile':$mn_profile = 'active';
        break;
    case 'account-details':$mn_bank_details = 'active';
        break;
    case 'change-password':$mn_change_password = 'active';
        break;
    case 'my-post':$mn_mypost = 'active';
        break;
    case 'book-history':$mn_history = 'active';
        break;
    case 'my-wish-list':$mn_mywishlist = 'active';
        break;
    case 'my-transaction':$mn_mytransaction = 'active';
        break;
}

$v=$view->row();
?>
<div class="main-wrapper scrollspy-container">

    <!-- start Breadcrumb -->

    <div class="breadcrumb-wrapper">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Profile</li>
            </ol>
        </div>
    </div>

    <!-- end Breadcrumb -->

    <div class="user-profile-wrapper">

        <div class="user-header">

            <div class="content">

                <div class="content-top">

                    <div class="container">

                        <div class="inner-top">

                            <div class="image">
                                <img src="<?php echo profile_pic($v->profile_pic) ?>" alt="<?php echo $v->user_fullname?>" />
                            </div>

                            <div class="GridLex-gap-20">

                                <div class="GridLex-grid-noGutter-equalHeight GirdLex-grid-bottom">

                                    <div class="GridLex-col-7_sm-12_xs-12_xss-12">

                                        <div class="GridLex-inner">
                                            <div class="heading clearfix">
                                                <h3><?php echo $v->user_fullname?></h3>

                                            </div>
                                            <ul class="user-meta">
                                                <li><i class="fa fa-envelope"></i>  <?php echo $v->email ?></li>
<?php if ($v->phone!='') { ?>
                                                    <li><i class="fa fa-phone"></i> <?php echo $v->phone ?></li>
<?php } ?>


                                            </ul>
                                        </div>

                                    </div>


                                </div>

                            </div>


                        </div>

                    </div>

                </div>					

            </div>

        </div>

    </div>

    <div class="pt-50 pb-50">

        <div class="container">

            <div class="row">

                <div class="col-xs-12 col-sm-4 col-md-3 mt-20">

                    <aside class="sidebar-wrapper pr-5 pr-0-xs">

                        <div class="common-menu-wrapper">

                            <ul class="common-menu-list">

                                <li class="<?php echo $mn_profile ?>"><a href="<?php echo base_url() ?>profile">Dashboard</a></li>
                                <?php if ($loginuserid==$profile_id) { ?>
                                <li class="<?php echo $mn_updateprofile ?>"><a href="<?php echo base_url() ?>update-profile">Edit profile</a></li>
                                <?php if ($this->session->userdata('user_type') && $this->session->userdata('user_type') == 'GU') { ?>

                                    <li class="<?php echo $mn_history ?>"><a href="<?php echo base_url() ?>booking-history">Booking History</a></li>
                                    <li class="<?php echo $mn_mywishlist ?>"><a href="<?php echo base_url() ?>my-wishlist">My wihslist</a></li>
                                <?php } ?>
                                <li class="<?php echo $mn_change_password ?>"><a href="<?php echo base_url() ?>change-password">Change password</a></li>
                                <li class=""><a href="<?php echo base_url() ?>logout">Logout</a></li>
                                <li class="<?php echo $mn_mypost ?>"><a href="<?php echo base_url() ?>my-post">My post</a></li>

<?php if ($this->session->userdata('user_type') && $this->session->userdata('user_type') == 'VA') { ?>
                                    <li class="<?php echo $mn_mytransaction ?>"><a href="<?php echo base_url() ?>my-transaction">My Transaction</a></li>
                                    <li class="<?php echo $mn_bank_details ?>"><a href="<?php echo base_url() ?>account-details">Bank Account</a></li>
                                <?php }} ?>
                            </ul>

                        </div>

                    </aside>

                </div>