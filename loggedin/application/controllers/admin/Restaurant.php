<?php

class Restaurant extends CI_Controller {

    function __construct() {

        parent:: __construct();
        $this->load->model("Restaurant_model", "rest");
        $this->load->model("Common_model", "common");
        $this->load->model("Table_model", 'table');
        $this->load->helper('text');
        $this->load->library('Ajax_pagination');
         $this->common->checkAdminSession();
        $this->perPage = 50;
    }

    public function index() {
        
        $admin_id = $this->session->userdata['admin']['id'];
        $data['menu_category'] =$this->rest->menu_category_list();
        $data['adddons_group'] =$this->rest->rest_addon_group();
        $data['title'] = 'Admin Dashboard';
        $data['contents'] = 'admin/restaurant/index';
        $this->load->view("theme/template", $data);
    }

    public function manage_shipping() {

        $data['title'] = 'Admin Dashboard';
        $data['contents'] = 'admin/restaurant/manage_shipping';
        $this->load->view("theme/template", $data);
    }

    public function storepickup() {

        $data['title'] = 'Admin Dashboard';
        $data['contents'] = 'admin/restaurant/storepickup';
        $this->load->view("theme/template", $data);
    }

    public function localdelivery() {

        $data['title'] = 'Admin Dashboard';
        $data['contents'] = 'admin/restaurant/localdelivery';
        $this->load->view("theme/template", $data);
    }

    public function setting() {

        $data['title'] = 'Admin Dashboard';
        $data['contents'] = 'admin/restaurant/manage_setting';
        $this->load->view("theme/template", $data);
    }

    public function orders() {

        $data['title'] = 'Admin Dashboard';
        $data['contents'] = 'admin/restaurant/orders';
        $this->load->view("theme/template", $data);
    }

}
