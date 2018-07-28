<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Master_model');
    }

    public function category_list() {
        if ($this->session->userdata('user_id') == '') {
            redirect('login');
        }
        $data['categorylist'] = $this->Master_model->category_list();
        $this->load->view('master/category/category-list', $data);
    }
    
    public function loadmodal($view) {
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
        if ($this->session->userdata('user_id') == '') {
            redirect('login');
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
        if ($this->session->userdata('user_id') == '') {
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
        if ($this->session->userdata('user_id') == '') {
            redirect('login');
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
        if ($this->session->userdata('user_id') == '') {
            redirect('login');
        }
        $data = array('isactive' => 0);
        $this->Master_model->category_update($data, $id);
        redirect('category-master');
    }

}
