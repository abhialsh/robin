<?php
class Shop extends CI_Controller {

    function __construct() {

        parent:: __construct();
        $this->load->model("operationmodel");
        $this->load->model("Common_model", "common");
        $this->load->model("Table_model", 'table');
        $this->load->helper('text');
        $this->load->library('Ajax_pagination');
        $this->perPage = 50;
    }

    public function categories() {
		
		$data['title'] = 'Admin Dashboard';
        $data['contents'] = 'admin/shop/categories';
        $this->load->view("theme/template", $data);
		
	}
    
    public function products() {
		
		$data['title'] = 'Admin Dashboard';
        $data['contents'] = 'admin/shop/products';
        $this->load->view("theme/template", $data);
		
	}
	 
}

