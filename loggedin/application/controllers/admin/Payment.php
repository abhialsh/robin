<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {

    function __construct() {
        parent:: __construct();
        $this->load->model("common_model");
    }

    public function index() {

        
        $data['title'] = 'Admin Dashboard';
        $data['contents'] = 'admin/payment/index';
        $this->load->view("theme/template", $data);
    }
	
	public function account_setup() {

        
        $data['title'] = 'Admin Dashboard';
        $data['contents'] = 'admin/payment/setup';
        $this->load->view("theme/template", $data);
    }

    

}

?>