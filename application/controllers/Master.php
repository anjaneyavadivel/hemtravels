<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Master_model');
    }

    public function category_list($category_search = '') {
        if ($this->session->userdata('user_id') == '' || $this->session->userdata('user_type') != 'SA') {
            redirect('login');
        }
        $categorysearch = trim($this->input->post('category_search'));
        if ($categorysearch != '') {
            $category_search = $categorysearch;
        }
        $this->load->library('pagination');
        $config = array();
        $config["base_url"] = base_url() . "category-master/" . $category_search; //?search=".$category_search
        $config["total_rows"] = $this->Master_model->category_count($category_search);
        $config["per_page"] = 20;
        //$config["uri_segment"] = 2;

        $config['enable_query_strings'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['use_page_numbers'] = TRUE;
        $config['query_string_segment'] = 'page';
        $config['cur_tag_open'] = '&nbsp;<a class="active">';
        $config['cur_tag_close'] = '</a>';

        $config['next_link'] = '&NestedGreaterGreater;';
        $config['prev_link'] = '&NestedLessLess;';
        $this->pagination->initialize($config);
        $page = ($this->input->get('page')) ? ( ( $this->input->get('page') - 1 ) * $config["per_page"] ) : 0;
        //$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["categorylist"] = $this->Master_model->category_list($config["per_page"], $page, $category_search);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links);
        $data["category_search"] = $category_search;
        $this->load->view('master/category/category-list', $data);
    }

    public function loadmodal($view) {
        if ($this->session->userdata('user_id') == '' || $this->session->userdata('user_type') != 'SA') {
            return FALSE;
        }
        if ($view != "") {
            $data = array();
            if (isset($_POST)) {
                foreach ($_POST as $key => $value) {
                    $data[$key] = $value;
                }
            }
            $this->load->view("master/category/$view", $data);
        } else {
            echo "Error";
        }
    }

    public function category_add() {
        if ($this->session->userdata('user_id') == '' || $this->session->userdata('user_type') != 'SA') {
            return FALSE;
        }
        if ($_POST) {
            $this->form_validation->set_rules('category_name', 'Category Name', 'trim|required');
            if ($this->form_validation->run($this) != FALSE) {
                $id = trim($this->input->post('id'));
                $name = ucwords(trim($this->input->post('category_name')));
                $whereData = array('isactive' => 1, 'name' => $name);
                $trip_category_list = selectTable('trip_category', $whereData);
                if ($trip_category_list->num_rows() > 0) {
                    echo 'Sorry! All ready exist this name.';
                    return FALSE;
                }
                $data = array(
                    'id' => $id,
                    'name' => $name,
                    'isactive' => 1);
                $category_id = $this->Master_model->category_insert($data);
                if ($category_id) {
                    return TRUE;
                }
            }
        }
        echo 'Sorry! Try again...';
        return FALSE;
    }

    public function category_edit() {
        if ($this->session->userdata('user_id') == '' || $this->session->userdata('user_type') != 'SA') {
           redirect('login');
        }
        if ($_POST) {
            $id = trim($this->input->post('id'));

            $data = array('id' => $id);
            $data['categorydetail'] = $this->Master_model->category_detail($data);
            //$this->Master_model->category_update($data,$id);
            $this->load->view('master/category/category-edit', $data);
        }
    }

    public function category_save_edit() {
        if ($this->session->userdata('user_id') == '' || $this->session->userdata('user_type') != 'SA') {
            return FALSE;
        }
        if ($_POST) {
            $id = trim($this->input->post('category_id'));
            $name = trim($this->input->post('category_name'));

            $where = array('id' => $id);
            $data = array('name' => $name);
            $result = $this->Master_model->category_update($data, $where);
            if ($result) {
                return TRUE;
            }
        }
        echo 'Sorry! Try again...';
        return FALSE;
    }

    public function category_delete($id) {
        if ($this->session->userdata('user_id') == '' || $this->session->userdata('user_type') != 'SA') {
            redirect('login');
        }
		$where = array('id' => $id);
        $data = array('isactive' => 0);
        $this->Master_model->category_update($data, $where);
        redirect('category-master');
    }
	
	public function category_active($id) {
        if ($this->session->userdata('user_id') == '') {
            redirect('login');
        }
		$where = array('id' => $id);
        $data = array('isactive' => 1);
        $this->Master_model->category_update($data, $where);
        redirect('category-master');
    }
    
    
    public function coupon_code_list($coupon_code_search ='',$offer_type='') {
        if ($this->session->userdata('user_id') == '') {
            redirect('login');
        }
        $couponcodesearch = trim($this->input->post('coupon_code_search'));
        $offertype = trim($this->input->post('offer_type'));
        $type = trim($this->input->get('type'));
        if ($offertype != '') {
            $offer_type = $offertype;
        }
        if ($couponcodesearch != '') {
            $coupon_code_search = $couponcodesearch;
        }
        if ($type != '') {
            $offer_type = $type;
        }
        $coupon_code_search=$this->security->xss_clean($coupon_code_search);
        $this->load->library('pagination');
        $config = array();
        $config["base_url"] = base_url() . "coupon-code-master/" . $coupon_code_search."?type=".$offer_type;
        $config["total_rows"] = $this->Master_model->coupon_code_count($coupon_code_search,$offer_type);
        $config["per_page"] = 20;
        //$config["uri_segment"] = 2;

        $config['enable_query_strings'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['use_page_numbers'] = TRUE;
        $config['query_string_segment'] = 'page';
        $config['cur_tag_open'] = '&nbsp;<a class="active">';
        $config['cur_tag_close'] = '</a>';

        $config['next_link'] = '&NestedGreaterGreater;';
        $config['prev_link'] = '&NestedLessLess;';
        $this->pagination->initialize($config);
        $page = ($this->input->get('page')) ? ( ( $this->input->get('page') - 1 ) * $config["per_page"] ) : 0;
        //$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["couponcodelist"] = $this->Master_model->coupon_code_list($config["per_page"], $page, $coupon_code_search,$offer_type);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links);
        $data["coupon_code_search"] = $coupon_code_search;
        $data["offer_type"] = $offer_type;
        $this->load->view('master/coupon-code/coupon-code-list', $data);
    }

    public function couponcodeaddmaster() {
        if ($this->session->userdata('user_id') == '') {
            return FALSE;
        }
        $loginuserid = $this->session->userdata('user_id');
        $whereData = array('isactive' => 1, 'user_id' => $loginuserid);
        $data['trip_list'] = selectTable('trip_master', $whereData);
        if ($this->session->userdata('user_type') == 'SA') {
            $whereData = array('isactive' => 1);
            $data['category_list'] = selectTable('trip_category', $whereData);
        }
                
        $this->load->view("master/coupon-code/coupon-code-add", $data);
        
    }
    public function couponcode_vaildation() {
        if ($this->session->userdata('user_id') == '') {
            return FALSE;
        }
        $couponcode = trim($this->input->post('couponcode'));
        $check = $this->Master_model->category_count($couponcode);
        if ($check == 0) {
            echo "true";
        } else {
            echo "false";
        }
    }
	//code
    public function coupon_code_add() {
        if ($this->session->userdata('user_id') == '') {
            return FALSE;
        }
        if ($_POST) {
            $this->form_validation->set_rules('couponcode', 'Category Name', 'trim|required');
            $this->form_validation->set_rules('couponname', 'Category Name', 'trim|required');
            $this->form_validation->set_rules('fromdate', 'Category Name', 'trim|required');
            $this->form_validation->set_rules('todate', 'Category Name', 'trim|required');
            $this->form_validation->set_rules('coupontype', 'Category Name', 'trim|required');
            $this->form_validation->set_rules('offertype', 'Category Name', 'trim|required');
            $this->form_validation->set_rules('offeramount', 'Category Name', 'trim|required');
            if ($this->form_validation->run($this) != FALSE) {
                $user_id = $this->session->userdata('user_id');
                extract($this->input->post());
                $data = array(
                    'coupon_code' => strtoupper($couponcode),
                    'coupon_name' => ucfirst($couponname),
                    'comment' => ucfirst($comment),
                    'category_id' => isset($category_id)?$category_id:0,
                    'validity_from' => date("Y-m-d", strtotime($fromdate)),
                    'validity_to' => date("Y-m-d", strtotime($todate)),
                    'type' => $coupontype,
                    'offer_type' => $offertype,
                    'percentage_amount' => $offertype==2?round($offeramount):$offeramount,
                    'trip_id' => isset($tripname)?$tripname:0,
                    'price_to_adult' => $price_to_adult,
                    'price_to_child' => $price_to_child,
                    'price_to_infan' => $price_to_infan,
                    'user_id' => $user_id,
                    'isactive' => 1);
                $coupon_code_id   = insertTable('coupon_code_master', $data);
                if ($coupon_code_id) {
                    $data['coupon_code_id']=$coupon_code_id;
                    $couponcodehistory_id   = insertTable('coupon_code_master_history', $data);
                    return TRUE;
                }
            }
        }
        echo 'Sorry! Try again...';
        return FALSE;
    }
	
	public function coupon_code_delete($id) {
        if ($this->session->userdata('user_id') == '') {
            redirect('login');
        }
		$where = array('id' => $id);
        $data = array('isactive' => 0);
        $this->Master_model->coupon_code_update($data, $where);
        redirect('coupon-code-master');
    }
	
	public function coupon_code_active($id) {
        if ($this->session->userdata('user_id') == '') {
            redirect('login');
        }
		$where = array('id' => $id);
        $data = array('isactive' => 1);
        $this->Master_model->coupon_code_update($data, $where);
        redirect('coupon-code-master');
    }
    
    
    public function checkhelper() {
        $this->load->helper('custom_helper');
//        $tripid=2;
//        $result = getallparenttrip($tripid);
//        print_r($result);
//        exit();
//        
//           $pnr_no='PNR49KXPXG8';$phoneno='9688079118';
//           $result =  getpnrinfo($pnr_no,$phoneno);
//            print_r($result);
//        
//        
//        if ($this->session->userdata('user_id') == '') {
//            return FALSE;
//        }
//        $offerdata=array(
//        'trip_id' => 1,
//        'date_of_trip' => "24-08-2018",
//        'ischeckadmin' => 1); 
//        $result = trip_offer($offerdata);
//        print_r($result);
//        exit();
        $bookdata=array(
        'trip_id' => 3,
        'book_user_id' => 1,
        'no_of_adult' => 1,
        'no_of_child' => 0,
        'no_of_infan' => 0,
        'date_of_trip' => "Sep 14, 2018",
        'pick_up_location_id' => 3);
        $result = trip_book($bookdata);
        print_r($result);
        
        
    }

}
