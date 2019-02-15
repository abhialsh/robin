<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
      	function __construct()
    	{
    		parent:: __construct();
    	}

	public function index()
	{
		if($this->session->userdata('securelogin')){
			$data['title'] = ' Super Admin Dashboard';
			$data['contents'] = 'superadmin/dashboard';
			$this->load->view("theme/template-super",$data);
		}else{
			redirect('superadmin/dashboard/login');
		}
	}
	
	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			if($this->session->userdata('securelogin')){
				redirect('superadmin/dashboard');
			}else{
				$this->load->view("superadmin/login");
			}
		}else{
			$username = trim($this->input->post('username'));
			$password = trim($this->input->post('password'));
			$data = $this->model->selectdetails('superadmin');
			foreach($data as $row){
				if($row['email'] == $username && $row['password'] == $password){
					$count = 1;
					$newdata = array(
							'name'  	 => $row['name'],
							'email'      => $row['email'],
							'lastlogin'  => $row['last_login'],
							'mobile' 	 => $row['contact']
					);
					$this->session->set_userdata('securelogin', $newdata);
				}else{
					$count = 0;
				}
				
				if($count > 0){
					redirect('superadmin/dashboard');
				}else{
					$this->session->set_flashdata('response',"<p style='text-align: center;font-size: 17px;color: #d61d1d;margin-bottom: -21px;'>Invalide Request.</p>");
					redirect('superadmin/dashboard/login');
				}
			}
		}
	}
	
	public function logout()
	{
		$newdata = array(
				'name'  	 => '',
				'email'      => '',
				'lastlogin'  => '',
				'mobile' 	 => ''
		);
		$this->session->unset_userdata($newdata);
		$this->session->sess_destroy();
		redirect('superadmin/dashboard/login','refresh');
	}
	
	
}

?>