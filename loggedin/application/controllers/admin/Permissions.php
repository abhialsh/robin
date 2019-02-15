<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Permissions extends CI_Controller {

    function __construct() {
        parent:: __construct();
        $this->load->model("common_model");
    }

    public function index() {        
        $data['title'] = 'Admin Dashboard';
        $data['contents'] = 'admin/user_permissions/index';
        $this->load->view("theme/template", $data);
    }    
	
	public function invite() {        
        $data['title'] = 'Admin Dashboard';
        $data['contents'] = 'admin/user_permissions/invite';
        $this->load->view("theme/template", $data);
    }
}

?>