<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Consultant extends CI_Controller {

    function __construct() {
        parent:: __construct();
        $this->load->model("common_model");
    }

    public function index() {

        
        $data['title'] = 'Admin Dashboard';
        $data['contents'] = 'admin/consultant/index';
        $this->load->view("theme/template", $data);
    }
	
 public function history() {

        $data['title'] = 'Admin Dashboard';
        $data['contents'] = 'admin/consultant/history';
        $this->load->view("theme/template", $data);
    }

    

}

?>