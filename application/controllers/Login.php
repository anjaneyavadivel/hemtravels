<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    function index() {
        //echo $this->session->userdata('user_id');exit;
        redirect();
    }

    function login_check() {
        //echo $this->input->post('new_email');exit;

        if ($this->input->post('forget_pass')) {
            if ($this->input->post('forget_email') != '') {
                $this->session->unset_userdata('signup_socail');
                $codition = array();
                $codition['email'] = $this->input->post('forget_email');
                $codition['status'] = 1;
                $check = $this->user_model->select('user_master', $codition);
                if ($check->num_rows() > 0) {

                    $ch = $check->row();
                    $user_ids = $ch->um_user_id;
                    $activation_code = md5(md5($user_ids . date('ymdhis')));
                    $data['activation_code'] = $activation_code;
                    $data['new_email'] = $this->input->post('new_email');
                    $upt = $this->user_model->update('user_master', array('forgotten_password_code' => $activation_code), array('id' => $user_ids));
                    if ($upt) {
                        $messages = $this->load->view('mail/forgot', $data, true);
                        $query1 = $this->user_model->email_sent_user($this->input->post('forget_email'), "Forget Password from Travels", $messages);
                        if ($query1) {
                            if ($this->session->userdata('last_url')) {
                                $this->session->set_userdata('suc', 'Successfully registerd please Confirm Your mail..!');
                                redirect($this->session->userdata('last_url'));
                            } else {
                                $this->session->set_userdata('suc', 'Successfully registerd please Confirm Your mail..!');
                                redirect();
                            }
                        } else {
                            if ($this->session->userdata('last_url')) {
                                $this->session->set_userdata('err', 'Please try again..!');
                                redirect($this->session->userdata('last_url'));
                            } else {
                                $this->session->set_userdata('err', 'Please try again..!');
                                redirect();
                            }
                        }
                    } else {
                        if ($this->session->userdata('last_url')) {
                            $this->session->set_userdata('err', 'Please try again..!');
                            redirect($this->session->userdata('last_url'));
                        } else {
                            $this->session->set_userdata('err', 'Please try again..!');
                            redirect();
                        }
                    }
                } else {
                    if ($this->session->userdata('last_url')) {
                        $this->session->set_userdata('err', 'Please try again..!');
                        redirect($this->session->userdata('last_url'));
                    } else {
                        $this->session->set_userdata('err', 'Please try again..!');
                        redirect();
                    }
                }
            } else {
                if ($this->session->userdata('last_url')) {
                    $this->session->set_userdata('err', 'Please enter email...!');
                    redirect($this->session->userdata('last_url'));
                } else {
                    $this->session->set_userdata('err', 'Please enter email...!');
                    redirect();
                }
            }
        }
        if ($this->input->post('login')) {
            $this->form_validation->set_rules('um_email', 'Email address', 'trim|required');
            $this->form_validation->set_rules('um_password', 'Password', 'trim|required|min_length[6]');
            if ($this->form_validation->run($this) == FALSE) {
                $this->session->set_userdata('err', validation_errors());
                if ($this->session->userdata('last_url')) {
                    redirect($this->session->userdata('last_url'));
                } else {
                    redirect();
                }
            }
            $this->session->unset_userdata('signup_socail');
            $codition = array();
            $codition['email'] = $this->input->post('um_email');
            $codition['password'] = md5(md5($this->input->post('um_password')));
            $codition['isactive'] = 1;
            $check = $this->user_model->select('user_master', $codition);
            if ($check->num_rows() > 0) {
                $ch = $check->row();  
				$image=$ch->profile_pic;
				if (trim($image) != "" && file_exists("./uploads/$image")) 
				{
					$image_url	=	base_url()."uploads/$image";
				}
				else
				{
					$image_url	=	base_url()."assets/images/man/01.jpg";
				}   
                $this->session->set_userdata('user_id', $ch->id);
                $this->session->set_userdata('user_email', $ch->email);
                $this->session->set_userdata('name', $ch->user_fullname);
                $this->session->set_userdata('user_img', $image_url);
                $this->session->set_userdata('user_type', $ch->user_type);
                if ($this->session->userdata('name') == '') {
                    $this->session->set_userdata('suc', 'Login Successfully...!');
                    redirect();
                }
                if ($this->session->userdata('last_url')) {
                    $this->session->set_userdata('suc', 'Login Successfully...!');
                    redirect($this->session->userdata('last_url'));
                } else {
                    $this->session->set_userdata('suc', 'Login Successfully...!');
                    redirect();
                }
            } else {
                if ($this->session->userdata('last_url')) {
                    $this->session->set_userdata('err', 'Mismatch username And Password. Please try again..!');
                    redirect($this->session->userdata('last_url'));
                } else {
                    $this->session->set_userdata('err', 'Mismatch username And Password. Please try again..!');
                    redirect();
                }
            }
        } else {
            if ($this->session->userdata('last_url')) {
                $this->session->set_userdata('err', 'Please try again..!');
                redirect($this->session->userdata('last_url'));
            } else {
                $this->session->set_userdata('err', 'Please try again..!');
                redirect();
            }
        }
    }

    function login_sign_up() {
        $this->session->unset_userdata('signup_socail');
        $check = $this->user_model->select('user_master', array('email' => $this->input->post('new_email')));
        if ($check->num_rows() > 0) {
            if ($this->session->userdata('last_url')) {
                $this->session->set_userdata('err', 'Already Exist mail id Please Login...!');
                redirect($this->session->userdata('last_url'));
            } else {
                $this->session->set_userdata('err', 'Already Exist mail id Please Login...!');
                redirect();
            }
        } else {

            $values = array('email' => $this->input->post('new_email'),
                'password'			=>	md5(md5($this->input->post('cnew_pasword'))),
                'activation_code' => '',
                'user_type' => 'CM',
               );
            $query = $this->user_model->insert('user_master', $values);
            $user_id = $this->db->insert_id();
            if ($query) {
                $activation_code = md5(md5($user_id . date('ymdhis')));
                $data['activation_code'] = $activation_code;
                $data['new_email'] = $this->input->post('new_email');
                $upt = $this->user_model->update('user_master', array('activation_code' => $activation_code), array('id' => $user_id));
                if ($upt) {
                    //echo $this->input->post('new_email');exit;
                    $messages = $this->load->view('mail/confrimation', $data, true);
                    $query1 = $this->user_model->email_sent_user($this->input->post('new_email'), "Confirmation from Hem Travel", $messages);
                    if ($query1) {
                        if ($this->session->userdata('last_url')) {
                            $this->session->set_userdata('suc', 'Successfully registerd please Confirm Your mail..!');
                            redirect($this->session->userdata('last_url'));
                        } else {
                            $this->session->set_userdata('suc', 'Successfully registerd please Confirm Your mail..!');
                            redirect();
                        }
                    } else {
                        if ($this->session->userdata('last_url')) {
                            $this->session->set_userdata('err', 'Please try again..!');
                            redirect($this->session->userdata('last_url'));
                        } else {
                            $this->session->set_userdata('err', 'Please try again..!');
                            redirect();
                        }
                    }
                } else {
                    $this->session->set_userdata('err', 'Please try again..!');
                    redirect();
                }
            } else {
                if ($this->session->userdata('last_url')) {
                    $this->session->set_userdata('err', 'Please try again..!');
                    redirect($this->session->userdata('last_url'));
                } else {
                    $this->session->set_userdata('err', 'Please try again..!');
                    redirect();
                }
            }
        }
    }

    function email_verfication() {
        if ($this->session->userdata('user_id') == '') {
            $check = $this->user_model->select('user_master', array('activation_code' => $this->uri->segment(2)));
            if ($check->num_rows() > 0) {
                $ch = $check->row();
                $values = array('um_updated_on' => date('Y-m-d h:i:s'),
                        /* 'um_updated_by'	=>	$ch->um_user_id,
                          'um_status'		=>	1 */                        );
                $this->pet_model->update('user_master', $values, array('activation_code' => $this->uri->segment(2)));
                $this->session->set_userdata('user_id', $ch->id);
                $this->session->set_userdata('user_email', $ch->email);
                $this->session->set_userdata('name', $ch->full_name);
                $this->session->set_userdata('user_img', $ch->profile_pic);
                $this->session->set_userdata('user_type', $ch->type);
                $this->session->set_userdata('signup_socail', 2);

                $this->session->set_userdata('suc', 'Login Successfully...!');
                redirect('');
            } else {
                $this->session->set_userdata('err', 'Please try again..!');
                redirect();
            }
        } else {
            redirect('logout');
        }
    }

    function forgetpassword_verfication() {
        if ($this->session->userdata('user_id') == '') {
            $this->session->unset_userdata('signup_socail');
            $check = $this->user_model->select('user_master', array('forgotten_password_code' => $this->uri->segment(2)));
            if ($check->num_rows() > 0) {
                $ch = $check->row();
                $values = array('um_updated_on' => date('Y-m-d h:i:s'),
                    'um_updated_by' => $ch->id,
                );
				$image=$ch->profile_pic;
				if (trim($image) != "" && file_exists("./uploads/$image")) 
				{
					$image_url	=	base_url()."uploads/$image";
				}
				else
				{
					$image_url	=	base_url()."assets/images/man/01.jpg";
				}
                $this->session->set_userdata('user_id', $ch->id);
                $this->session->set_userdata('user_email', $ch->email);
                $this->session->set_userdata('name', $ch->fullname);
                $this->session->set_userdata('user_img', $image_url);
                $this->session->set_userdata('user_type', $ch->type);

                if ($this->session->userdata('last_url')) {
                    $this->session->set_userdata('suc', 'Login Successfully please change your password in your profile...! ');
                    redirect($this->session->userdata('last_url'));
                } else {
                    $this->session->set_userdata('suc', 'Login Successfully...!');
                    redirect();
                }
            } else {
                if ($this->session->userdata('last_url')) {
                    $this->session->set_userdata('err', 'Please try again..!');
                    redirect($this->session->userdata('last_url'));
                } else {
                    $this->session->set_userdata('err', 'Please try again..!');
                    redirect();
                }
            }
        } else {
            redirect('logout');
        }
    }

    function new_email_vaildation() {
        $check = $this->user_model->select('user_master', array('email' => $_POST['new_email']));
        if ($check->num_rows() > 0) {
            echo "false";
        } else {
            echo "true";
        }
    }

    function old_email_vaildation() {
        $check = $this->user_model->select('user_master', array('email' => $_POST['um_email']));
        if ($check->num_rows() == 0) {
            echo "false";
        } else {
            echo "true";
        }
    }

    function for_email_vaildation() {
        $check = $this->user_model->select('user_master', array('email' => $_POST['forget_email']));
        if ($check->num_rows() == 0) {
            echo "false";
        } else {
            echo "true";
        }
    }

    function signup() {

        redirect();
    }

    function login_front() {
        $this->session->set_userdata('login_socail', 1);
        $social_media_type = $this->uri->segment(2);
        if ($social_media_type != '') {
            if ($social_media_type == 'gmail') {
                redirect('gmail');
            } elseif ($social_media_type == 'fb') {
                redirect('fb');
            } else {
                $this->session->set_userdata('err', 'Please try again..!');
                redirect();
            }
        } else {
            $this->session->set_userdata('err', 'Please try again..!');
            redirect();
        }
    }

    function signup_last() {
        $this->session->set_userdata('signup_socail', 1);
        //echo $this->session->userdata('signup_socail').'++++';exit;
        $social_media_type = $this->uri->segment(2);
        if ($social_media_type != '') {
            if ($social_media_type == 'gmail') {
                redirect('gmail');
            } elseif ($social_media_type == 'fb') {
                redirect('fb');
            } elseif ($social_media_type == 'twitter') {
                redirect('twitter');
            } else {
                $this->session->set_userdata('err', 'Please try again..!');
                redirect();
            }
        } else {
            $this->session->set_userdata('err', 'Please try again..!');
            redirect();
        }
    }

    function logout() {
        $this->session->set_userdata('user_id', '');
        $this->session->set_userdata('user_email', '');
        $this->session->set_userdata('name', '');
        $this->session->set_userdata('user_img', '');
        $this->session->set_userdata('user_type', '');
        $this->session->sess_destroy();
        redirect();
    }

}
