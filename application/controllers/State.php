<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class State extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('State_model');	
		$this->load->library('form_validation');		
		
	}

    public function state_list($state_search = '') {
        if ($this->session->userdata('user_id') == '') {
            redirect('login');
        }
        $statesearch = trim($this->input->post('state_search'));
        if ($statesearch != '') {
            $state_search = $statesearch;
        }
        $this->load->library('pagination');
        $config = array();
        $config["base_url"] = base_url() . "state-master/" . $state_search; //?search=".$state_search
        $config["total_rows"] = $this->State_model->state_count($state_search);
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
        $data["statelist"] = $this->State_model->state_list($config["per_page"], $page, $state_search);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links);
        $data["state_search"] = $state_search;
        $this->load->view('master/state/state-list', $data);
    }

    public function loadmodal($view) {
        if ($view != "") {
            $data = array();
            if (isset($_POST)) {
                foreach ($_POST as $key => $value) {
                    $data[$key] = $value;
                }
            }
            $this->load->view("master/state/$view", $data);
        } else {
            echo "Error";
        }
    }

    public function state_add() {
        if ($this->session->userdata('user_id') == '') {
            return FALSE;
        }
        if ($_POST) {
            $this->form_validation->set_rules('state_name', 'state Name', 'trim|required');
            if ($this->form_validation->run($this) != FALSE) {
                $id = trim($this->input->post('id'));
                $name = ucwords(trim($this->input->post('state_name')));
                $whereData = array('isactive' => 1, 'name' => $name);
                $trip_state_list = selectTable('state_master', $whereData);
                if ($trip_state_list->num_rows() > 0) {
                    echo 'Sorry! All ready exist this name.';
                    return FALSE;
                }
                $data = array(
                    'id' => $id,
                    'name' => $name,
                    'isactive' => 1);
                $state_id = $this->State_model->state_insert($data);
                if ($state_id) {
                    return TRUE;
                }
            }
        }
        echo 'Sorry! Try again...';
        return FALSE;
    }

    public function state_edit() {
        if ($this->session->userdata('user_id') == '') {
            redirect('login');
        }
        if ($_POST) {
            $id = trim($this->input->post('id'));

            $data = array('id' => $id);
            $data['statedetail'] = $this->State_model->state_detail($data);
            //$this->State_model->category_update($data,$id);
            $this->load->view('master/state/state-edit', $data);
        }
    }

    public function state_save_edit() {
        if ($this->session->userdata('user_id') == '') {
            return FALSE;
        }
        if ($_POST) {
            $id = trim($this->input->post('state_id'));
            $name = trim($this->input->post('state_name'));

            $where = array('id' => $id);
            $data = array('name' => $name);
            $result = $this->State_model->state_update($data, $where);
            if ($result) {
                return TRUE;
            }
        }
        echo 'Sorry! Try again...';
        return FALSE;
    }

    public function state_delete($id) {
        if ($this->session->userdata('user_id') == '') {
            redirect('login');
        }
		$where = array('id' => $id);
        $data = array('isactive' => 0);
        $this->State_model->state_update($data, $where);
        redirect('state-master');
    }
	
	public function state_active($id) {
        if ($this->session->userdata('user_id') == '') {
            redirect('login');
        }
		$where = array('id' => $id);
        $data = array('isactive' => 1);
        $this->State_model->state_update($data, $where);
        redirect('state-master');
    }

}
