<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Extension extends CI_Controller {

    function __construct() {
        parent:: __construct();
        $this->load->model("common_model");
    }

    public function index() {

        
        $data['title'] = 'Admin Dashboard';
        $data['contents'] = 'admin/extension/index';
        $this->load->view("theme/template", $data);
    }
	
 
    

}

?>