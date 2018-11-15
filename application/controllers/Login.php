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
                $codition['email'] = strtolower($this->input->post('forget_email'));
                $codition['status'] = 1;
                $check = $this->user_model->select('user_master', $codition);
                if ($check->num_rows() > 0) {

                    $ch = $check->row();
                    $user_ids = $ch->um_user_id;
                    $activation_code = md5(md5($user_ids . date('ymdhis')));
                    $data['activation_code'] = $activation_code;
                    $data['new_email'] = strtolower($this->input->post('new_email'));
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
            //$this->load->helper('custom_helper');
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
            $codition['email'] = strtolower($this->input->post('um_email'));
            $codition['password'] = md5(md5($this->input->post('um_password')));
            $codition['isactive'] = 1;
            $check = $this->user_model->select('user_master', $codition);
            if ($check->num_rows() > 0) {
                $ch = $check->row();
                if ($ch->user_type == 'SA') {
                    $updatedata = array('balance_amt' => checkbal_mypayment(0, 2), 'unclear_amt' => checkbal_mypayment(0, 1));
                } else {
                    $updatedata = array('balance_amt' => checkbal_mypayment($ch->id, 2), 'unclear_amt' => checkbal_mypayment($ch->id, 1));
                }
                $whereData = array('id' => $ch->id);
                $result = updateTable('user_master', $whereData, $updatedata);
                $image = $ch->profile_pic;
                if (trim($image) != "" && file_exists("./uploads/$image")) {
                    $image_url = base_url() . "uploads/$image";
                } else {
                    $image_url = base_url() . "assets/images/man/01.jpg";
                }
                $this->session->set_userdata('user_id', $ch->id);
                $this->session->set_userdata('user_email', $ch->email);
                $this->session->set_userdata('user_phone', $ch->phone);
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
        $check = $this->user_model->select('user_master', array('email' => strtolower($this->input->post('new_email'))));
        if ($check->num_rows() > 0) {
            if ($this->session->userdata('last_url')) {
                $this->session->set_userdata('err', 'Already Exist mail id Please Login...!');
                redirect($this->session->userdata('last_url'));
            } else {
                $this->session->set_userdata('err', 'Already Exist mail id Please Login...!');
                redirect();
            }
        } else {
            //$this->load->helper('custom_helper');

            $values = array('email' => strtolower($this->input->post('new_email')),
                'user_fullname' => ucwords($this->input->post('user_fullname')),
                'password' => md5(md5($this->input->post('cnew_pasword'))),
                'activation_code' => '',
                'user_type' => $this->input->post('user_type'),
            );
            $query = $this->user_model->insert('user_master', $values);
            $user_id = $this->db->insert_id();
            if ($query) {
                $activation_code = md5(md5($user_id . date('ymdhis')));
                $data['activation_code'] = $activation_code;
                //$data['new_email'] = $this->input->post('new_email');
                $upt = $this->user_model->update('user_master', array('activation_code' => $activation_code), array('id' => $user_id));
                if ($upt) {
                    $whereData = array('to_user_mail' => strtolower($this->input->post('new_email')));
                    $updatedata = array('to_user_mail' => '','user_id' => $user_id);
                    $result = updateTable('trip_shared', $whereData, $updatedata);
                    //echo $this->input->post('new_email');exit;
                    //$messages = $this->load->view('mail/confrimation', $data, true);
                    $toemail=$this->input->post('new_email');
                    $subject='Email verification';
                    $message='Congratulations! You recently added a new email address to your '.site_title.'. To verify that you own this email address, simply click on the link below.<br><br>'
                            . '<a href="'.base_url().'login/email_verfication/'.$activation_code.'" target="_blank" >Click here to verify your email</a>'
                            . '<br><br>Verifying your email address ensures that you can securely retrieve your account information if your password is lost or stolen. You must verify your email address before you can use it on  '.site_title.'! services that require an email address.';
                    $mailData = array(
                    //'fromuserid' => 1,
                    'fromusername' => $this->input->post('user_fullname'),
                    'toemail' => $toemail,
                    'subject' => $subject,
                    'message' => $message,
                    //'othermsg' => ''
                    );

                    $query1 = sendemail_personalmail($mailData);
                    //$query1 = $this->user_model->email_sent_user($this->input->post('new_email'), "Confirmation from Hem Travel", $messages);
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
            $check = $this->user_model->select('user_master', array('activation_code' => $this->uri->segment(3)));
            if ($check->num_rows() > 0) {
                $ch = $check->row();
                $values = array('last_visit' => date('Y-m-d h:i:s'),
                'activation_code'=>'',
                'isactive'=>1 );
                $this->user_model->update('user_master', $values, array('id' => $ch->id));
                $image = $ch->profile_pic;
                if (trim($image) != "" && file_exists("./uploads/$image")) {
                    $image_url = base_url() . "uploads/$image";
                } else {
                    $image_url = base_url() . "assets/images/man/01.jpg";
                }
                $this->session->set_userdata('user_id', $ch->id);
                $this->session->set_userdata('user_email', $ch->email);
                $this->session->set_userdata('user_phone', $ch->phone);
                $this->session->set_userdata('name', $ch->user_fullname);
                $this->session->set_userdata('user_img', $image_url);
                $this->session->set_userdata('user_type', $ch->user_type);
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
    function forgotPasswordRequest() {
        
        $returnData = array('status'=>false,'message'=>'Please check your submission');
        
        $this->form_validation->set_rules('ex_email', 'E-Mail', 'trim|required');
        
        if ($this->form_validation->run($this) !== FALSE) {
            
                $this->session->unset_userdata('signup_socail');
                $check = selectTable('user_master', $whereData = array('email' => strtolower($this->input->post('ex_email'))), $showField = array('*'), $orWhereData = array(), $group = array(), $order = '', $having = '', $limit = array(), $result_way = 'all', $echo = 0,$inWhereData = array('isactive','1,2'),$notInWhereData = array());
                //$check = $this->user_model->select('user_master', array('email' => strtolower($this->input->post('ex_email'))));
		
                if ($check->num_rows() < 1) {
                    $returnData['message'] = 'This user was not associated with any account!';
                } else {
                    //$this->load->helper('custom_helper');
                    
                    try{
                        $this->load->helper('security');
                        $activation_code = rand(111111, 999999);
                        $data['activation_code'] = $activation_code;
                        $activation_code_valid_till = date('Y-m-d H:i:s', strtotime('+1 hour'));
                        //$data['new_email'] = $this->input->post('new_email');
                        $upt = $this->user_model->update('user_master', array('activation_code' => $activation_code,'activation_code_time' => $activation_code_valid_till), array('email' => strtolower($this->input->post('ex_email'))));
                        if ($upt) {
                            $toemail=$this->input->post('ex_email');
                            $subject='Email verification for forgotten password';
                            $message='To verify your identity, please use the following One Time Password (OTP) to complete verification for change password:<br><br><h1>' . $activation_code . '</h1> <br> 
                                This OTP is confidential. For security reasons, DO NOT share the OTP with anyone. <br>
                                YouthHub takes your account security very seriously.';
                            
                            $userDetails = $check->first_row('array');
                            
                             $mailData = array(
                            //'fromuserid' => 1,
                            //'ccemail' => admin_email . ',' . email_bottem_email . ',' . 'anjaneya.developer@gmail.com,',
                            'fromusername' => $userDetails['user_fullname'],
                            'toemail' => $toemail,
                            'subject' => $subject,
                            'message' => $message,
                            //'othermsg' => ''
                            );
                            //$query1 = true;
                            $query1 = sendemail_personalmail($mailData);
                            if ($query1) {
                                $returnData = array('status'=>true,'message'=>'Forgot password verification code sent to your registered email');
                            } else {
                                $returnData['message'] = 'Forgot password verification code not send,please try again!.';
                            }
                        }
                    }catch(Exception $e){
                        $returnData['message'] = 'Forgot password verification code not send,please try again!.';
                    }
                }
        }
        echo json_encode($returnData);exit;
    }
    
    function forgetpasswordverfication() {
        
        $returnData = array('status'=>false,'message'=>'Please check your submission');
        
        $this->form_validation->set_rules('ex_email', 'E-Mail', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[repassword]');
        $this->form_validation->set_rules('repassword', 'Re-enter Password', 'trim|required');
        $this->form_validation->set_rules('passcode', 'Passcode', 'trim|required');
        
        if ($this->form_validation->run($this) !== FALSE && $this->session->userdata('user_id') == '') {
          
            $this->session->unset_userdata('signup_socail');
            extract($this->input->post(NULL, TRUE));
            $check = selectTable('user_master', $whereData = array('activation_code' => $passcode,'email' => strtolower($ex_email)), $showField = array('*'), $orWhereData = array(), $group = array(), $order = '', $having = '', $limit = array(), $result_way = 'all', $echo = 0,$inWhereData = array('isactive','1,2'),$notInWhereData = array());
            //$check = $this->user_model->select('user_master', array('activation_code' => $passcode,'email' => strtolower($ex_email)));
            $userDetails = $check->first_row('array');
            
            $toDay = date('Y-m-d H:i:s');
            
            if ($check->num_rows() > 0 && isset($userDetails['activation_code_time']) && strtotime($toDay) <= strtotime($userDetails['activation_code_time'])) {
                $ch = $check->row();
                $new = md5(md5($password));
                $updateData = array(
                    'password' => $new,
                    'activation_code' => '',
                    'activation_code_time' => ''
                );
                if($userDetails['user_type']=='GU'){
                    $updateData['user_type']='CU';
                }
                if($userDetails['isactive']==2){
                    $updateData['isactive']=1;
                }
                $whereData = array('id' => $ch->id);
                $updateResult = updateTable('user_master', $whereData, $updateData);
                
                $values = array('um_updated_on' => date('Y-m-d h:i:s'),
                    'um_updated_by' => $ch->id,
                );
                $image = $ch->profile_pic;
                if (trim($image) != "" && file_exists("./uploads/$image")) {
                    $image_url = base_url() . "uploads/$image";
                } else {
                    $image_url = base_url() . "assets/images/man/01.jpg";
                }
                $this->session->set_userdata('user_id', $ch->id);
                $this->session->set_userdata('user_email', $ch->email);
                $this->session->set_userdata('name', $ch->user_fullname);
                $this->session->set_userdata('user_img', $image_url);
                $this->session->set_userdata('user_type', $ch->user_type);

                $returnData = array('status'=>true,'message'=>'Password successfully changed');
            } else {
                $returnData['message'] = 'Verification code expired/not valid';
            }
        } 
        
        echo json_encode($returnData);exit;
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
                $image = $ch->profile_pic;
                if (trim($image) != "" && file_exists("./uploads/$image")) {
                    $image_url = base_url() . "uploads/$image";
                } else {
                    $image_url = base_url() . "assets/images/man/01.jpg";
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
        if ($_POST) {
            $check = $this->user_model->select('user_master', array('email' => strtolower($this->input->post('new_email'))));
            if ($check->num_rows() > 0) {
                echo "false";
                return false;
            }
        }
        echo "true";
        return TRUE;
    }

    function old_email_vaildation() {
        if ($_POST) {
            $check = $this->user_model->select('user_master', array('email' => strtolower($this->input->post('um_email'))));
            if ($check->num_rows() == 0) {
                echo "false";
                return false;
            }
        }
        echo "true";
        return TRUE;
    }

    function for_email_vaildation() {
        if ($_POST) {
            $check = $this->user_model->select('user_master', array('email' => $this->input->post('forget_email')));
            if ($check->num_rows() == 0) {
                echo "false";
                return false;
            }
        }
        echo "true";
        return TRUE;
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
