<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tripinclusions extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Tripinclusions_model');	
		$this->load->library('form_validation');		
		
	}

    public function trip_list($trip_search = '') {
        if ($this->session->userdata('user_id') == '') {
            redirect('login');
        }
        $tripsearch = trim($this->input->post('trip_search'));
        if ($tripsearch != '') {
            $trip_search = $tripsearch;
        }
        $this->load->library('pagination');
        $config = array();
        $config["base_url"] = base_url() . "trip-inclusions-master/" . $trip_search; //?search=".$trip_search
        $config["total_rows"] = $this->Tripinclusions_model->trip_count($trip_search);
        $config["per_page"] = 20;
        //$config["uri_segment"] = 2;

        $config['enable_query_strings'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['use_page_numbers'] = TRUE;
        $config['query_string_segment'] = 'page';
        $config['cur_trip_open'] = '&nbsp;<a class="active">';
        $config['cur_trip_close'] = '</a>';

        $config['next_link'] = '&NestedGreaterGreater;';
        $config['prev_link'] = '&NestedLessLess;';
        $this->pagination->initialize($config);
        $page = ($this->input->get('page')) ? ( ( $this->input->get('page') - 1 ) * $config["per_page"] ) : 0;
        //$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["triplist"] = $this->Tripinclusions_model->trip_list($config["per_page"], $page, $trip_search);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links);
        $data["trip_search"] = $trip_search;
        $this->load->view('master/trip/trip-list', $data);
    }

    public function loadmodal($view) {
        if ($view != "") {
            $data = array();
            if (isset($_POST)) {
                foreach ($_POST as $key => $value) {
                    $data[$key] = $value;
                }
            }
            $this->load->view("master/trip/$view", $data);
        } else {
            echo "Error";
        }
    }

    public function trip_add() {
        if ($this->session->userdata('user_id') == '') {
            return FALSE;
        }
        if ($_POST) {
            $this->form_validation->set_rules('trip_name', 'trip Name', 'trim|required');
            if ($this->form_validation->run($this) != FALSE) {
                $id = trim($this->input->post('id'));
                $name = ucwords(trim($this->input->post('trip_name')));
                $whereData = array('isactive' => 1, 'name' => $name);
                $trip_trip_list = selectTable('trip_inclusions', $whereData);
                if ($trip_trip_list->num_rows() > 0) {
                    echo 'Sorry! All ready exist this name.';
                    return FALSE;
                }
                $data = array(
                    'id' => $id,
                    'name' => $name,
                    'isactive' => 1);
                $trip_id = $this->Tripinclusions_model->trip_insert($data);
                if ($trip_id) {
                    return TRUE;
                }
            }
        }
        echo 'Sorry! Try again...';
        return FALSE;
    }

    public function trip_edit() {
        if ($this->session->userdata('user_id') == '') {
            redirect('login');
        }
        if ($_POST) {
            $id = trim($this->input->post('id'));

            $data = array('id' => $id);
            $data['tripdetail'] = $this->Tripinclusions_model->trip_detail($data);
            //$this->Tripinclusions_model->trip_update($data,$id);
            $this->load->view('master/trip/trip-edit', $data);
        }
    }

    public function trip_save_edit() {
        if ($this->session->userdata('user_id') == '') {
            return FALSE;
        }
        if ($_POST) {
            $id = trim($this->input->post('trip_id'));
            $name = trim($this->input->post('trip_name'));

            $where = array('id' => $id);
            $data = array('name' => $name);
            $result = $this->Tripinclusions_model->trip_update($data, $where);
            if ($result) {
                return TRUE;
            }
        }
        echo 'Sorry! Try again...';
        return FALSE;
    }

    public function trip_delete($id) {
        if ($this->session->userdata('user_id') == '') {
            redirect('login');
        }
		$where = array('id' => $id);
        $data = array('isactive' => 0);
        $this->Tripinclusions_model->trip_update($data, $where);
        redirect('trip-inclusions-master');
    }
	
	public function trip_active($id) {
        if ($this->session->userdata('user_id') == '') {
            redirect('login');
        }
		$where = array('id' => $id);
        $data = array('isactive' => 1);
        $this->Tripinclusions_model->trip_update($data, $where);
        redirect('trip-inclusions-master');
    }

}

