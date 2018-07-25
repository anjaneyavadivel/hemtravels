<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

	
        public function category_list()
	{
		$this->load->view('master/category/category-list');
	}
        public function contact_us()
	{
		$this->load->view('contact_us');
	}
        public function faq()
	{
		$this->load->view('faq');
	}
}
