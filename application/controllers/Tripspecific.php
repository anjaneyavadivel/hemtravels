<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tripspecific extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Tripspecific_model');
    }

    public function trip_list($category_search = '') {
        if ($this->session->userdata('user_id') == '' || $this->session->userdata('user_type') != 'SA') {
            redirect('login');
        }
        $categorysearch = trim($this->input->post('category_search'));
        if ($categorysearch != '') {
            $category_search = $categorysearch;
        }
        $this->load->library('pagination');
        $config = array();
        $config["base_url"] = base_url() . "trip-specific/" . $category_search; //?search=".$category_search
        $config["total_rows"] = $this->Tripspecific_model->trip_count($category_search);
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
        $data["triplist"] = $this->Tripspecific_model->trip_list($config["per_page"], $page, $category_search);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links);
        $data["category_search"] = $category_search;
        $this->load->view('master/trip-specific-list', $data);
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
            $this->load->view("master/trip-specific/$view", $data);
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

    public function trip_delete($id) {
        if ($this->session->userdata('user_id') == '' || $this->session->userdata('user_type') != 'SA') {
            redirect('login');
        }
		$where = array('id' => $id);
        $data = array('isactive' => 0);
        $this->Tripspecific_model->trip_update($data, $where);
        redirect('trip-specific');
    }
	
	public function trip_active($id) {
        if ($this->session->userdata('user_id') == '') {
            redirect('login');
        }
		$where = array('id' => $id);
        $data = array('isactive' => 1);
        $this->Tripspecific_model->trip_update($data, $where);
        redirect('trip-specific');
    }
    
   }