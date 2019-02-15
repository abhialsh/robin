<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Permission extends CI_Controller {
	function __construct()
    	{
    		parent:: __construct();
    		$this->load->model("operationmodel");
    	}

	public function index()
		{
			if($this->session->userdata('securelogin')){
				$data['title'] = ' Super Admin Permission';
				$data['contents'] = 'superadmin/permission';
				$data['record'] = $this->model->selectdetailsWhere('menu',array("parent"=>'0'));
				$this->load->view("theme/template-super",$data);
			}else{
				redirect('superadmin/dashboard/login');
			}
		}
		
	public function editPermission($id)
		{
			if($this->session->userdata('securelogin')){
				$data['title'] = ' Super Admin Permission';
				$data['contents'] = 'superadmin/edit-permission';
				$data['record'] = $this->model->selectdetailsWhere('menu',array("id"=>$id));
				$this->load->view("theme/template-super",$data);
			}else{
				redirect('superadmin/dashboard/login');
			}
		}
		
	public function editPermissionData(){
		if ($this->session->userdata('securelogin')){
			$this->form_validation->set_rules('name', 'Permission name', 'required');
			if ($this->form_validation->run() == true) {
				$id = trim($this->input->post('id'));
				$insert['name'] = trim($this->input->post('name'));
				$insert['description'] = trim($this->input->post('description'));
				
				$datestring = date('Y-m-d h:i a');
                $insert['modifydate'] = strtotime($datestring);

				$this->model->update('menu', $insert, array("id"=>$id));
				redirect('superadmin/permission');
			}else{
				redirect('superadmin/permission');
			}
		}else{
			redirect('superadmin/dashboard/login');
		}
	}

	public function update_module_Status()
	{

       $mod =  $_POST["mode"];
       if($mod == 'UpdateModuleStatus')
       {
          $where['id']           = $_POST["where"];
          $set['status'] =  $_POST["set"];
       	  
       	$result = $this->operationmodel->editData('menu', $set, $where);
         if($result)
         {
         	 if($set['status'] == 1)
         	 {
         	 	echo 2;
         	 }
         	 else
         	 {
         	 	echo 4;
         	 }
         }
       }

       if($mod == 'UpdatePaymentStatus')
       {
          $where['id']           = $_POST["where"];
          $set['payment_status'] =  $_POST["set"];
          $result = $this->operationmodel->editData('menu', $set, $where);
          if($result)
         {
         	 if($set['payment_status'] == 1)
         	 {
         	 	echo 5;
         	 }
         	 else
         	 {
         	 	echo 6;
         	 }
         }
       }
	}
	
}
?>