<?php 
$dashboard = $profile=$bank_details=$change_password=$my_tour=$book_history=$my_wishlist='';
$url=$this->uri->segment(1);
switch ($url) {
    case 'my-dashboard':$dashboard ='active';break;
    case 'my-profile':$profile ='active';break;
	case 'account-details':$bank_details ='active';break;
	case 'change-password':$change_password ='active';break;
	case 'my-tour':$my_tour ='active';break;
	case 'book-history':$book_history ='active';break;
	case 'my-wish-list':$my_wishlist ='active'; break;
}
?>
<div class="col-xs-12 col-sm-4 col-md-3 mt-20">

							<aside class="sidebar-wrapper pr-5 pr-0-xs">
	
								<div class="common-menu-wrapper">
							
									<ul class="common-menu-list">
										
										<li class="<?php echo $dashboard?>"><a href="my-dashboard">Dashboard</a></li>
										<li class="<?php echo $profile?>"><a href="my-profile">Edit profile</a></li>
										<li class="<?php echo $bank_details?>"><a href="account-details">Bank Account</a></li>
										<li class="<?php echo $change_password?>"><a href="change-password">Change password</a></li>
										<li class="<?php echo $my_tour?>"><a href="my-tour">My tour</a></li>
										<li class="<?php echo $book_history?>"><a href="book-history">Booking History</a></li>
										<li class="<?php echo $my_wishlist?>"><a href="my-wish-list">My wihslist</a></li>
										<li ><a href="#">Logout</a></li>
										
									</ul>
									
								</div>
								
							</aside>
						
						</div>