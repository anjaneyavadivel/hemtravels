<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Request extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function withdrawals_request() {
        $data["from"] = '';
        $data["to"] = '';
        $data["status"] = '';
        $data["bookfrom"] = '';
        $data["title"] = '';
        $this->load->view('withdrawal', $data);
    }

}
