<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {

        parent:: __construct();
        $this->load->model("Common_model", "common");
    }

    public function index() {
        $this->load->view('home');
    }

    public function login() {
        $this->load->view('welcome_message');
    }

    public function reset_password() {
        $this->load->view('welcome_message');
    }

    public function setupaccount() {
        $this->load->view('welcome_message');
    }

    public function thankyou() {
        $this->load->view('admin/thankyou');
    }

    public function logout() {
        $this->load->view('welcome_message');
    }

}
