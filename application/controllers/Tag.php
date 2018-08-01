<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tag extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Tag_model');	
		$this->load->library('form_validation');		
		
	}

    public function tag_list($tag_search = '') {
        if ($this->session->userdata('user_id') == '') {
            redirect('login');
        }
        $tagsearch = trim($this->input->post('tag_search'));
        if ($tagsearch != '') {
            $tag_search = $tagsearch;
        }
        $this->load->library('pagination');
        $config = array();
        $config["base_url"] = base_url() . "tag-master/" . $tag_search; //?search=".$tag_search
        $config["total_rows"] = $this->Tag_model->tag_count($tag_search);
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
        $data["taglist"] = $this->Tag_model->tag_list($config["per_page"], $page, $tag_search);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links);
        $data["tag_search"] = $tag_search;
        $this->load->view('master/tag/Tag-list', $data);
    }

    public function loadmodal($view) {
        if ($view != "") {
            $data = array();
            if (isset($_POST)) {
                foreach ($_POST as $key => $value) {
                    $data[$key] = $value;
                }
            }
            $this->load->view("master/tag/$view", $data);
        } else {
            echo "Error";
        }
    }

    public function tag_add() {
        if ($this->session->userdata('user_id') == '') {
            return FALSE;
        }
        if ($_POST) {
            $this->form_validation->set_rules('tag_name', 'tag Name', 'trim|required');
            if ($this->form_validation->run($this) != FALSE) {
                $id = trim($this->input->post('id'));
                $name = ucwords(trim($this->input->post('tag_name')));
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
                $tag_id = $this->Tag_model->tag_insert($data);
                if ($tag_id) {
                    return TRUE;
                }
            }
        }
        echo 'Sorry! Try again...';
        return FALSE;
    }

    public function tag_edit() {
        if ($this->session->userdata('user_id') == '') {
            redirect('login');
        }
        if ($_POST) {
            $id = trim($this->input->post('id'));

            $data = array('id' => $id);
            $data['tagdetail'] = $this->Tag_model->tag_detail($data);
            //$this->Tag_model->category_update($data,$id);
            $this->load->view('master/tag/tag-edit', $data);
        }
    }

    public function tag_save_edit() {
        if ($this->session->userdata('user_id') == '') {
            return FALSE;
        }
        if ($_POST) {
            $id = trim($this->input->post('tag_id'));
            $name = trim($this->input->post('tag_name'));

            $where = array('id' => $id);
            $data = array('name' => $name);
            $result = $this->Tag_model->tag_update($data, $where);
            if ($result) {
                return TRUE;
            }
        }
        echo 'Sorry! Try again...';
        return FALSE;
    }

    public function tag_delete($id) {
        if ($this->session->userdata('user_id') == '') {
            redirect('login');
        }
		$where = array('id' => $id);
        $data = array('isactive' => 0);
        $this->Tag_model->tag_update($data, $where);
        redirect('tag-master');
    }
	
	public function tag_active($id) {
        if ($this->session->userdata('user_id') == '') {
            redirect('login');
        }
		$where = array('id' => $id);
        $data = array('isactive' => 1);
        $this->Tag_model->tag_update($data, $where);
        redirect('tag-master');
    }

}
