<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Loginview extends CI_Controller {

    function __construct() {

        parent::__construct();
    }

    function login_verfy($id = 0) {
        if ($id == 0) {
            $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
            $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
            $this->output->set_header('Pragma: no-cache');
            $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
            if ($this->session->userdata('user_id') == '') {
                $this->session->set_userdata('err', 'Please, Login to Access!!');
                redirect('login');
            }
        } else {
            return false;
        }
    }

    public function profile($profile_id = '') {
        $this->login_verfy();
        $user_id = $this->session->userdata('user_id');
        //$this->load->helper('custom_helper');
        if ($profile_id == '') {
            $profile_id = $user_id;
        }
        $data['view'] = $this->user_model->select('user_master', array('id' => $profile_id));
        if ($data['view']->num_rows() == 0)
            redirect('login/logout');

        $data['loginuserid'] = $user_id;
        $data['profile_id'] = $profile_id;
        $this->load->view('user/profile', $data);
    }

    public function update_profile() {
        $this->login_verfy();
        $user_id = $this->session->userdata('user_id');
        if ($this->input->post('save')) {
            $values = array();
            $this->form_validation->set_rules('user_fullname', 'Name', 'trim|required|max_length[50]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[6]|max_length[60]');
            $this->form_validation->set_rules('phone', 'Phone number', 'trim|required|min_length[10]|max_length[12]');
            $this->form_validation->set_rules('alt_phone', 'Alt Phone', 'trim|min_length[10]|max_length[12]');
            $this->form_validation->set_rules('emergency_contact_no', 'Emergency contact no', 'trim|min_length[10]|max_length[12]');
            $this->form_validation->set_rules('emergency_contact_person', 'Emergency contact person', 'trim|min_length[6]|max_length[50]');
            if ($this->form_validation->run($this) == FALSE) {
                $this->session->set_userdata('err', validation_errors());
                redirect('update-profile');
            }
            $email = $this->input->post('email');
            $check = $this->user_model->select('user_master', array('id !=' => $user_id, 'email' => $email));
            if ($check->num_rows() > 0) {
                $this->session->set_userdata('err', 'Already exist this email, Choose different one.!');
                redirect('update-profile');
            }
            if (!empty($_FILES['image'])) {
                if ($_FILES['image']['name'] != "") {
                    $path = 'uploads/';
                    $old_name = $_FILES["image"]["name"];
                    $split_name = explode('.', $old_name);
                    $time = time();
                    $file_name = $time . "." . $split_name[1];
                    move_uploaded_file($_FILES["image"]["tmp_name"], $path . "/" . $file_name);
                    $values['profile_pic'] = $file_name;
                    if (trim($file_name) != "" && file_exists("./uploads/$file_name")) {
                        $image_url = base_url() . "uploads/$file_name";
                    } else {
                        $image_url = base_url() . "assets/images/man/01.jpg";
                    }
                    $this->session->set_userdata('user_img', $image_url);
                }
            }
            $values['email'] = $this->input->post('email');
            $values['user_fullname'] = $this->input->post('user_fullname');
            $values['phone'] = $this->input->post('phone');
            $values['alt_phone'] = $this->input->post('alt_phone');
            $values['emergency_contact_person'] = $this->input->post('emergency_contact_person');
            $values['emergency_contact_no'] = $this->input->post('emergency_contact_no');
            $query = $this->user_model->update('user_master', $values, array('id' => $user_id));
            if ($query) {
                $this->session->set_userdata('suc', 'Succesfully updated your Profile..!');
            } else {
                $this->session->set_userdata('err', 'Please try again..!');
            }
            redirect('update-profile');
        }
        $data['loginuserid'] = $user_id;
        $data['profile_id'] = $user_id;
        $data['view'] = $this->user_model->select('user_master', array('id' => $user_id));
        if ($data['view']->num_rows() == 0)
            redirect('login/logout');
        
        $this->load->view('user/update_profile', $data);
    }

    public function change_password() {
        $this->login_verfy();
        $user_id = $this->session->userdata('user_id');
        if ($this->input->post('save')) {
            if ($this->input->post('password2') == $this->input->post('password1') && $this->input->post('password2') != '') {
                $password = $this->input->post('password1');
                $check = $this->user_model->select('user_master', array('id' => $user_id, 'password' => md5(md5($password))));
                if ($check->num_rows() > 0) {
                    $this->session->set_userdata('err', 'Already same password used, Choose different one.!');
                    redirect('change-password');
                } else {
                    $query = $this->user_model->update('user_master', array('password' => md5(md5($password))), array('id' => $user_id));
                    if ($query) {
                        $this->session->set_userdata('suc', 'Succesfully updated your password..!');
                    } else {
                        $this->session->set_userdata('err', 'Please try again..!');
                    }
                    redirect('change-password');
                }
            } else {
                $this->session->set_userdata('err', 'Invalid Password..!');
                redirect('change-password');
            }
        }
        $data['loginuserid'] = $user_id;
        $data['profile_id'] = $user_id;
        $data['view'] = $this->user_model->select('user_master', array('id' => $user_id));
        if ($data['view']->num_rows() == 0)
            redirect('login/logout');
        
        $this->login_verfy();
        $this->load->view('user/change_password',$data);
    }

    public function account_details() {
        $this->login_verfy();
        $user_id = $this->session->userdata('user_id');
        if ($this->input->post('save')) {
            $this->form_validation->set_rules('bank_name', 'Bank name', 'trim|required');
            $this->form_validation->set_rules('account_holder_name', 'Account holder name', 'trim|required|min_length[6]|max_length[50]');
            $this->form_validation->set_rules('account_number', 'Account Number', 'trim|required|min_length[6]|max_length[32]');
            $this->form_validation->set_rules('ifsc_code', 'IFSC code', 'trim|required|min_length[6]|max_length[12]');
            $this->form_validation->set_rules('branch_name', 'Account Branch name', 'trim|required|min_length[6]|max_length[100]');
            $this->form_validation->set_rules('address', 'Address', 'trim|required|min_length[6]|max_length[300]');
            if ($this->form_validation->run($this) == FALSE) {
                $this->session->set_userdata('err', validation_errors());
                redirect('account-details');
            }
            if ($this->input->post('account_number1') == $this->input->post('account_number') && $this->input->post('account_number') != '') {
                $password = $this->input->post('account_number1');
                $check = $this->user_model->select('user_bank_master', array('user_id' => $user_id, 'account_number' => $password));
                if ($check->num_rows() > 0) {
                    $this->session->set_userdata('err', 'Already exist this account number.!');
                    redirect('account-details');
                } else {
                    $is_primary = 0;
                    if ($this->input->post('is_primary') == 1) {
                        $is_primary = 1;
                        $this->user_model->update('user_bank_master', array('is_primary' => 0), array('user_id' => $user_id));
                    }
                    $values = array('user_id' => $user_id,
                        'bank_name' => strtoupper($this->input->post('bank_name')),
                        'account_holder_name' => strtoupper($this->input->post('account_holder_name')),
                        'account_number' => $this->input->post('account_number'),
                        'ifsc_code' => $this->input->post('ifsc_code'),
                        'branch_name' => $this->input->post('branch_name'),
                        'address' => $this->input->post('address'),
                        'is_primary' => $is_primary,
                        'added_by' => $user_id
                    );
                    $query = $this->user_model->insert('user_bank_master', $values);
                    if ($query) {
                        $this->session->set_userdata('suc', 'Succesfully Add your Bank details..!');
                    } else {
                        $this->session->set_userdata('err', 'Please try again..!');
                    }
                    redirect('account-details');
                }
            } else {
                $this->session->set_userdata('err', 'Invalid Account number..!');
                redirect('account-details');
            }
        }

        $data['bank'] = $this->user_model->select('user_bank_master', array('user_id' => $user_id));
        $data['loginuserid'] = $user_id;
        $data['profile_id'] = $user_id;
        $data['view'] = $this->user_model->select('user_master', array('id' => $user_id));
        if ($data['view']->num_rows() == 0)
            redirect('login/logout');
        $this->load->view('user/account_details', $data);
    }

    public function my_post() {
        $this->login_verfy();
        $this->load->view('user/my_post');
    }

    public function booking_history() {
        $this->login_verfy();
        $this->load->view('user/book_history');
    }

    public function my_wish_list() {
        $this->login_verfy();
        $this->load->view('user/my_wish_list');
    }

    public function logout() {
        $this->session->unset_userdata('user_id', '');
        $this->session->unset_userdata('uname', '');
        $this->session->sess_destroy();
        $this->session->set_userdata('suc', ' Loggedout Successfully ..!');
        redirect();
    }

}
