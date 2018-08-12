<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class City extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('City_model');	
        $this->load->model('State_model');			
		$this->load->library('form_validation');		
		
	}

    public function city_list($city_search = '') {
        if ($this->session->userdata('user_id') == '') {
            redirect('login');
        }
        $citysearch = trim($this->input->post('city_search'));
        if ($citysearch != '') {
            $city_search = $citysearch;
        }
        $this->load->library('pagination');
        $config = array();
        $config["base_url"] = base_url() . "city-master/" . $city_search; //?search=".$city_search
        $config["total_rows"] = $this->City_model->city_count($city_search);
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
        $data["citylist"] = $this->City_model->city_list($config["per_page"], $page, $city_search);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links);
        $data["city_search"] = $city_search;
        $this->load->view('master/city/city-list', $data);

    }

    public function loadmodal($view) {
        if ($view != "") {
            $data = array();
            if (isset($_POST)) {
                foreach ($_POST as $key => $value) {
                    $data[$key] = $value;
                }
            }
            $this->load->view("master/city/$view", $data);
        } else {
            echo "Error";
        }
    }
	 

    public function city_add() {
        if ($this->session->userdata('user_id') == '') {
            return FALSE;
        }
		         if ($_POST) {
            $this->form_validation->set_rules('city_name', 'city Name', 'trim|required');
            if ($this->form_validation->run($this) != FALSE) {
                $id = trim($this->input->post('id'));
                $name = ucwords(trim($this->input->post('city_name')));
                $whereData = array('isactive' => 1, 'csid'=>$state_id,'name' => $name);
                $trip_city_list = selectTable('city_master', $whereData);
                if ($trip_city_list->num_rows() > 0) {
                    echo 'Sorry! All ready exist this name.';
                    return FALSE;
                }
                $data = array(
                    'id' => $id,
					'csid'=>$state_id,
                    'name' => $name,
                    'isactive' => 1);
				$data["stateselect"] = $this->City_model->state_select($data);
				$this->load->view('master/city/city-add', $data);
                $city_id = $this->City_model->city_insert($data);
                if ($city_id) {
                    return TRUE;
                }
            }
        }
        echo 'Sorry! Try again...';
        return FALSE;
    }

    public function city_edit() {
        if ($this->session->userdata('user_id') == '') {
            redirect('login');
        }
        if ($_POST) {
            $id = trim($this->input->post('id'));
            $data = array('id' => $id);
            $data['citydetail'] = $this->City_model->city_detail($data);
            $this->load->view('master/city/city-edit', $data);
        }
    }

    public function city_save_edit() {
        if ($this->session->userdata('user_id') == '') {
            return FALSE;
        }
        if ($_POST) {
            $id = trim($this->input->post('city_id'));
            $name = trim($this->input->post('city_name'));

            $where = array('id' => $id);
            $data = array('name' => $name);
            $result = $this->City_model->city_update($data, $where);
            if ($result) {
                return TRUE;
            }
        }
        echo 'Sorry! Try again...';
        return FALSE;
    }

    public function city_delete($id) {
        if ($this->session->userdata('user_id') == '') {
            redirect('login');
        }
		$where = array('id' => $id);
        $data = array('isactive' => 0);
        $this->City_model->city_update($data, $where);
        redirect('city-master');
    }
	
	public function city_active($id) {
        if ($this->session->userdata('user_id') == '') {
            redirect('login');
        }
		$where = array('id' => $id);
        $data = array('isactive' => 1);
        $this->City_model->city_update($data, $where);
        redirect('city-master');
    }

}
