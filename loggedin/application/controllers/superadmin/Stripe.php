<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Stripe extends CI_Controller {

    function __construct() {
        parent:: __construct();
        $this->load->model("operationmodel");
        $this->operationmodel->checkSuperadmin();
    }

    public function index() {
        if ($this->session->userdata('securelogin')) {
            $data['title'] = ' Super Admin Payment';
            $data['contents'] = 'superadmin/paymet-setup';
            $data['record'] = $this->model->selectdetails('payment_setup', 'id', 'DESC');
            $this->load->view("theme/template-super", $data);
        } else {
            redirect('superadmin/dashboard/login');
        }
    }
	
	public function editStripe($id) {
        if ($this->session->userdata('securelogin')) {
			if($this->input->post()){
				$this->form_validation->set_rules('name', 'Name', 'required');
				$this->form_validation->set_rules('sk_id', 'SK Id', 'required');
				$this->form_validation->set_rules('pk_id', 'Pk Id', 'required');
				$this->form_validation->set_rules('ca_id', 'Ca Id', 'required');
				
				if ($this->form_validation->run() == TRUE) {
					$data['name'] = trim($this->input->post('name'));
					$data['sk_id'] = trim($this->input->post('sk_id'));
					$data['pk_id'] = trim($this->input->post('pk_id'));
					$data['ca_id'] = trim($this->input->post('ca_id'));
					$data['date'] = time();

					$result = $this->operationmodel->editData('payment_setup', $data, array('id'=>$id));
					if($result){
						$this->session->set_flashdata('msg_success', 'Detail successfully updated.');
					}
					else
					{
						$this->session->set_flashdata('msg_error', 'Something went wrong.');
					}
					$data['title'] = ' Super Admin Payment';
					$data['contents'] = 'superadmin/paymet-setup-edit';
					$data['record'] = $this->operationmodel->condition('payment_setup', array('id'=>$id));
					$this->load->view("theme/template-super", $data);

				}else{
					$data['title'] = ' Super Admin Payment';
					$data['contents'] = 'superadmin/paymet-setup-edit';
					$data['record'] = $this->operationmodel->condition('payment_setup', array('id'=>$id));
					$this->load->view("theme/template-super", $data);
				}
			}else{
				$data['title'] = ' Super Admin Payment';
				$data['contents'] = 'superadmin/paymet-setup-edit';
				$data['record'] = $this->operationmodel->condition('payment_setup', array('id'=>$id));
				$this->load->view("theme/template-super", $data);
			}
        } else {
            redirect('superadmin/dashboard/login');
        }
    }
    public function payment_history($id='',$entry='')
    {
        $result['title'] = 'Payment History';
        $result['contents'] = 'superadmin/payment_history';
         $this->load->view("theme/template-super",$result);
    }

  public function get_payment_history()
  {
     $search = '';
     if(isset($_POST['limit']))
      {
       $limit = $_POST['limit']; 
      }

     if(isset($_POST['perpage']))
     {
       $per_page = $_POST['perpage']; 
     }
     if(isset($_POST['search']))
     {
       $search = $_POST['search'];
        $search = array('admin.name'=>$search, 'payment_history.order_id'=>$search,'payment_history.txn_status'=>$search,'admin.last_name'=>$search);
     }

      $columns = array('payment_history.created','payment_history.pid','payment_history.amount','payment_history.currency','payment_history.txn_id','payment_history.txn_status','payment_history.txn_type','payment_history.order_id','payment_history.retailer_id','admin.name','admin.id','admin.last_name');

      $join_table  = 'admin'; 
      $join_condition = 'payment_history.retailer_id = admin.id';

      $data  = pagination('payment_history',$limit, $columns,$per_page,'',$search,$join_table, $join_condition,'left','','');

      $output2 = '<input type="hidden" id="total_page" value='.$data['total_page'].'>';
      $record_count = count($data['data']);
    if($record_count<1)
    {
        $output2 = '<tr><td colspan="7" align="center">Record not found.</td></tr>';
    }
    else
    {
      foreach($data['data'] as $row)
      { 
         $amount = '$'.$row["amount"]/100;
         $date  =  ($row["created"]);
          $output2 .='<tr class="gradeX">
            <td>'.$row["pid"].'</td>
            <td>'.$date.'</td>
            <td>'.$row["name"]." ".$row["last_name"].'</td>
            <td>'.$row["order_id"].'</td>
            <td>'.$amount.'</td>
            <td>'.$row["txn_status"].'</td>
            <td>'.$row["txn_type"].'</td>
          </tr>';
      }
           
    }
       $page_link= $data['page_link'];
             print(json_encode(array('table_data'=>$output2, 'page_link' =>$page_link)));

  }


}

?>
