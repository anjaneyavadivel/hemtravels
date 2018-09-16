<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tripspecific extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Tripspecific_model');
    }

    public function trip_list($trip_search = '', $offer_type = '') {
        if ($this->session->userdata('user_id') == '') {
            redirect('login');
        }
        $tripsearch = trim($this->input->post('trip_search'));
        $offertype = trim($this->input->post('offer_type'));
        $type = trim($this->input->get('type'));
        if ($offertype != '') {
            $offer_type = $offertype;
        }
        if ($tripsearch != '') {
            $trip_search = $tripsearch;
        }
        if ($type != '') {
            $offer_type = $type;
        }
        $trip_search = $this->security->xss_clean($trip_search);
        $this->load->library('pagination');
        $config = array();
        $config["base_url"] = base_url() . "trip-shared/" . $trip_search . "?type=" . $offer_type;
        $config["total_rows"] = $this->Tripspecific_model->trip_count($trip_search, $offer_type);
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
        $data["triplist"] = $this->Tripspecific_model->trip_list($config["per_page"], $page, $trip_search, $offer_type);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links);
        $data["trip_search"] = $trip_search;
        $data["offer_type"] = $offer_type;
        $this->load->view('trip-specific/trip-specific-list', $data);
    }

    
}

   