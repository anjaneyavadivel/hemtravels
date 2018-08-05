<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
public $data;
	
	 public $user=null;
	 private $connection;
	function __construct()
	{
		
		parent::__construct();
		if($this->session->userdata('user_id')!='')
		{
			redirect();
		}
		
		$this->load->library('Twitteroauth');
		$this->load->library('facebook',array("appId"=>'199247477149749',"secret"=>'b61b82a8953a5d6ec96b7783d22a87e3'));
		$this->user = $this->facebook->getUser();
		/*
		$this->load->library('Instagram_api');*/
	}		
	public function index()
	{
	}
	public function gmail()
	{
		// Include two files from google-php-client library in controller
		include_once APPPATH . 'libraries/google/src/Google_Client.php';
		include_once APPPATH . 'libraries/google/src/contrib/Google_Oauth2Service.php';
		
		$client = new Google_Client();
		$client->setApplicationName("Google UserInfo PHP Starter Application");
		
		$oauth2 = new Google_Oauth2Service($client);
		
		if ($this->input->get('code')) 
		{
		  	$client->authenticate($this->input->get('code'));
		 	 $_SESSION['token'] = $client->getAccessToken();
		  	if ($client->getAccessToken()) 
			{
				$user = $oauth2->userinfo->get();
				$content = $user;
				$name = explode(" ",$content['name']);
				$fname = isset($name[0])?$name[0]:'';
				$lname = isset($name[1])?$name[1]:'';
				print_r($content);exit;
				$this->check_data('gmail',$content['id'],$fname,$lname,$content['picture']);
				$_SESSION['token'] = $client->getAccessToken();
			} 
			else
			{
				$this->session->set_userdata('err','Please try again..!');
				redirect();
			}
		}
		
		if ($this->session->userdata('token')) 
		{
		 $client->setAccessToken($this->session->userdata('token'));
		}
		
		if (isset($_REQUEST['logout'])) 
		{
		  unset($_SESSION['token']);
		  $client->revokeToken();
		}
		
		if ($client->getAccessToken()) 
		{
		  	$user = $oauth2->userinfo->get();
		 	$content = $user;
			$name = explode(" ",$content['name']);
			$fname = isset($name[0])?$name[0]:'';
			$lname = isset($name[1])?$name[1]:'';
			$this->check_data('gmail',$content['id'],$fname,$lname,$content['picture']);
		  	$_SESSION['token'] = $client->getAccessToken();
		} 
		else 
		{
		  $authUrl = $client->createAuthUrl();
		}
		if(isset($authUrl)) 
		{
			redirect($authUrl);//this is redirect to google in this place
		}
		
	}
	
	public function fb() #home Page
	{	
		if($this->user)
		{
			try
			{
				$user_profile = $this->facebook->api('/me');
				$name = explode(" ",$user_profile['name']);
				$fname = isset($name[0])?$name[0]:'';
				$lname = isset($name[1])?$name[1]:'';
				$this->check_data('fb',$user_profile['id'],$fname,$lname,'');
			}
			catch(FacebookApiException $e){
			print_r(e);
			$user=null;
			}
		}
		if($this->user)
		{
			$logout=$this->facebook->getLoginUrl(array("next"=>base_url()));
			?> <a href="<?php echo $logout; ?>">Logout</a>
			<?php
		}
		else
		{
			$login=$this->facebook->getLoginUrl();
			redirect($login); 
			?> <a href="<?php echo $login; ?>">Login</a><?php
		}
	}
	function check_data($net,$id,$fname,$lname,$profile_image_url)
	{
		$check						=	$this->user_model->select('user_master',array('social_network'=>$net,'auth_id'=>$id));
		if($check->num_rows()>0)
		{
			$ch		=	$check->row();
			$this->session->set_userdata('user_id',$ch->um_user_id);
			$this->session->set_userdata('user_email',$ch->um_email);
			$this->session->set_userdata('name',$ch->um_first_name.' '.$ch->um_first_name);
			$this->session->set_userdata('user_img',$ch->um_profile_pic);
			$this->session->set_userdata('user_type',$ch->um_type);
			if($this->session->userdata('last_url'))
			{				
				redirect();
			}
			else
			{
				$this->session->set_userdata('suc','Login Successfully...!');
				redirect();
			}
		}
		else
		{
			
			//echo $this->session->userdata('signup_socail').'******';exit;
			if($this->session->userdata('signup_socail')==1)
			{				
				/*$this->session->set_userdata('signup_socail',0);
				$this->session->unset_userdata('signup_socail');*/
				$this->session->set_userdata('social_network',$net);
				$this->session->set_userdata('auth_id',$id);
				$this->session->set_userdata('first_name',$fname);
				$this->session->set_userdata('last_name',$lname);
				$this->session->set_userdata('user_img',$profile_image_url);
				//echo "hi";exit;
				$this->session->set_userdata('suc','Login Successfully...!');
				redirect();
			}
			if($this->session->userdata('login_socail')==1)
			{
				$values	=	array('social_network'	=>	$net,
								'auth_id'			=>	$id,
								'user_fullname'			=>	$fname.' '.$lname,
								'um_type'				=>	'CU',
								'um_profile_pic'		=>	$profile_image_url);
								
				$query	=	$this->usermodel->insert('user_master',$values);
				//echo $this->db->last_query();exit;
				$last_id=	$this->db->insert_id();
				if($query)
				{
					$check						=	$this->user_model->select('user_master',array('id'=>$last_id));
					if($check->num_rows()>0)
					{
						/*$this->session->set_userdata('login_socail',0);
						$this->session->unset_userdata('login_socail');*/
						$ch		=	$check->row();
						$this->session->set_userdata('user_id',$ch->um_user_id);
						$this->session->set_userdata('user_email',$ch->um_email);
						$this->session->set_userdata('name',$ch->um_first_name.' '.$ch->um_first_name);
						$this->session->set_userdata('user_img',$ch->um_profile_pic);
						$this->session->set_userdata('user_type',$ch->um_type);
						
						$this->session->set_userdata('suc','Login Successfully...!');
						redirect();
					}
					else
					{
						$this->session->set_userdata('err','Please try again..!');
						redirect();
					}
				}
				else
				{
					$this->session->set_userdata('err','Please try again..!');
					redirect();
				}
			}
		}
	}
	
}
