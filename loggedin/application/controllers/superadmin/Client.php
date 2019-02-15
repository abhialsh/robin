<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

    function __construct() {
        parent:: __construct();
        $this->load->model("operationmodel");
         $this->operationmodel->checkSuperadmin();
         $this->load->helper('date');
    }

    public function index() {
        if ($this->session->userdata('securelogin')) 
        {
            $data['title'] = ' Super Admin Client';
            $data['contents'] = 'superadmin/client';
            
            $this->load->view("theme/template-super", $data);
        }
        else
        {
            redirect('superadmin/dashboard/login');
        }
    }
    public function getClient_detail()
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
        $search = array('business_name'=>$search, 'email'=>$search,'contact_wc'=>$search,'country'=>$search);
     }

     $columns = '*';

     $data  = pagination('admin',$limit, $columns,$per_page,'',$search,'','','','created','DESC');
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
       /*  $amount = '$'.$row["amount"]/100;
         */
       
          $output2 .='<tr class="gradeX">
            <td>'.$row['business_name'].'</td>
            <td>'.$row['email'].'</td>
            <td>'.$row['contact_wc'].'</td>
            <td>'.$row['country'].'</td>
            <td>'.$row['last_login'].'</td>
            <td><button type="button" class="btn btn-default waves-effect waves-light">Go Now</button></td>';
            if($row['admin_type']==2){
                            $act = "style='display:block;' ";
                            $dct = "style='display:none;'";
                          }
                          else
                          {
                            $act = "style='display:none;'";
                            $dct = "style='display:block;'";
                          }
            $output2 .= '<td><input type="hidden" id="BaseURL" value='.site_url().'><button type="button" class="btn btn-success waves-effect waves-light act'.$row['id']. '" id='.$row['id'].' '.$act.' onclick="client_type(('.$row['id'].'),4)">Active</button>
              
              <button type="button" class="btn btn-warning waves-effect waves-light dct'.$row['id']. '" id='.$row['id'].' '.$dct.' onclick="client_type(('.$row['id'].'),2)">Deactive</button>
             </td>';
            $output2 .= '<td class="actions"><a href='.site_url().'/superadmin/Client/editClient/'. $row["id"].' '.'class="on-default edit-row" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-pencil"></i></a></td>
           
          </tr>';
      }
           
          }
          $page_link= $data['page_link'];
             print(json_encode(array('table_data'=>$output2, 'page_link' =>$page_link)));

    }
    public function addclient() {
    
            $table = "menu";
            $where['status'] = 1;
            $where['parent'] = 0;
            $like = '';
            $coloum = "name";
            $form = "ASC";

            $data['res'] = $this->operationmodel->filterData($table, $where, $like, $coloum, $form);
            $where['payment_status'] = 1;
            $data['fees'] = $this->operationmodel->filterData($table, $where, $like, $coloum, $form);
            $data['countries'] = $this->operationmodel->getallData("countries");
             if ($this->input->post()) {
             $this->addClientData();
             }
            $data['title'] = ' Super Admin Client';
            $data['contents'] = 'superadmin/add-client';
            $this->load->view("theme/template-super", $data);
       
    }

    public function addClientData() {
          
        $this->form_validation->set_rules('fname', 'First name', 'required');
        $this->form_validation->set_rules('bname', 'Business name', 'required');
        $this->form_validation->set_rules('bmobile', 'Business phone number', 'required');
        $this->form_validation->set_rules('cemail', 'Client email address', 'required');
        $this->form_validation->set_rules('cmobile', 'Client mobile number', 'required');

        if ($this->form_validation->run() == TRUE) {
        $table = "admin";
        $check_email['email'] = trim($this->input->post('cemail'));
        $check_mobile['business_phone'] = trim($this->input->post('bmobile'));
        $result_eamil = $this->operationmodel->checkUser($table, $check_email);
        $result_mobile = $this->operationmodel->checkUser($table, $check_mobile);
        if ($result_eamil > 0) {
            $error = "This email address already exist.";
              $this->session->set_flashdata('msg_error', $error);
        } elseif ($result_mobile > 0) {
            $error = "This mobile number already exist.";
             $this->session->set_flashdata('msg_error', $error);
        }
 
         else {
            $data['name'] = trim($this->input->post('fname'));
            $data['last_name'] = trim($this->input->post('lname'));
            $data['business_name'] = trim($this->input->post('bname'));
            $data['business_phone'] = trim($this->input->post('bmobile'));
            $data['email'] = trim($this->input->post('cemail'));
            $data['contact'] = trim($this->input->post('cmobile'));
            $data['password'] = trim($this->input->post('password'));
            $data['pass_md5'] = md5(trim($this->input->post('password')));
            $country = explode("(", trim($this->input->post('country')));
            $data['country'] = trim($country[0]);

            $code = str_replace(")", "", $country[1]);
            $data['country_code'] = trim($code);
            $data['contact_wc'] = $data['country_code'] . $data['contact'];
            $data['admin_type'] = 2;
            $data['mail_verify'] = 0;

            $datestring = date('Y-m-d h:i a');
            $data['created'] = strtotime($datestring);

            $check = "";
            if (!empty($_FILES['profile_pic']['name'])) {

                $fileName1 = $_FILES['profile_pic']['name'];
                $field1 = 'profile_pic';
                $path1 = 'uploads/admin/profile';
                $thumb_path1 = 'thumb';
                $response2 = file_upload($fileName1, $field1, $path1, $thumb_path1, $check);
                if ($response2["value"] == 1) {
                    $data['profile_dp'] = $response2["file"];
                } else {
                    $data['profile_dp'] = "";
                }
                $check =1;
            }

            /* Cover Image Uploading start */
            if (!empty($_FILES['cover_pic']['name'])) {
                $fileName = $_FILES['cover_pic']['name'];
                $field = 'cover_pic';
                $path = 'uploads/admin/cover';
                $thumb_path = 'thumb';
                $response = file_upload($fileName, $field, $path, $thumb_path, $check);
                /* print_r($response);
                  die(); */
                if ($response["value"] == 1) {
                    $data['cover_image'] = $response["file"];
                } else {
                    $data['cover_image'] = "";
                }
            }
            /* File Uploading end */
            /* Data inserting section */

            $result = $this->operationmodel->saveData($table, $data);
            $last_id = $result;

            /*---------->LoggedIn Fees intigration start<---------*/

$fee    = $this->input->post('discount');
       $module = $this->input->post('module');
       $charge_formt = $this->input->post('payment_type');
       $count = count($fee);
            for ($i = 0; $i < $count; $i++)
            {
                if (!empty($fee[$i]) && $fee[$i] > 0) 
                {
                    $module_id = $module[$i];
                    $fees = $fee[$i];
                    $payment_type = $charge_formt[$i];
                    $data = array("admin_id"=>$last_id,"module_id"=>$module_id,"discount"=>$fees,"payment_type"=>$payment_type);
                    $result = $this->operationmodel->saveData('loggedin_fees', $data);
                }
            }

     /*---------->LoggedIn Fees intigration end<---------*/

            
                $table = "admin_permission";

                $datestring = date('Y-m-d h:i a');
                if(count($this->input->post('permission')) ==0)
                {
                    
                    $per['permission'] = "";
                    $per['createdate'] = strtotime($datestring);
                    $per['admin_id'] = $last_id;

                }
                else{
                    $per['permission'] = implode(",", $this->input->post('permission'));
                    $per['createdate'] = strtotime($datestring);
                    $per['admin_id'] = $last_id;
                }

                $this->operationmodel->saveData($table, $per);
                $success = "Successfully added.";
                $this->session->set_flashdata('msg_success', $success);
                
              header('Refresh:3; url= ' . base_url() . 'index.php/superadmin/Client');

             //   redirect('superadmin/Client');
             

        }
    }
    
        
    }

    public function editClient($id) {
        $data['client_data'] = $this->operationmodel->condition('admin', array("id" => $id));

        $table = "menu";
        $where['status'] = 1;
        $where['parent'] = 0;
        $like = '';
        $coloum = "name";
        $form = "ASC";
        $data['res'] = $this->operationmodel->filterData($table, $where, $like, $coloum, $form);
        
        $where['payment_status'] = 1;
        $data['fees'] = $this->operationmodel->filterData($table, $where, $like, $coloum, $form);
        
        foreach($data['fees'] as $fees)
        {
            $row_id = $fees['id'];
            $fee[] =  $this->operationmodel->filterData('loggedin_fees', array("module_id"=>$row_id,"admin_id"=>$id));
        }
        
        $data['charge'] = $fee;
        
        $where1['admin_id'] = $id;

        $table = 'admin_permission';
        $data['check_permission'] = $this->operationmodel->condition($table, $where1);
        $data['country'] = $this->operationmodel->getallData("countries");
        $data['title'] = ' Super Admin Client';
        $data['contents'] = 'superadmin/edit_client';
        
        $where1['admin_id'] = $id;
        $table = 'admin_permission';
        $data['check_permission'] = $this->operationmodel->condition($table, $where1);
        $this->load->view("theme/template-super", $data);
    }
    
    

    public function updateClient($id) {



        
       $fee    = $this->input->post('discount');
       $module = $this->input->post('module');
       $charge_formt = $this->input->post('payment_type');
       $count = count($fee);
       $this->operationmodel->deleteData('loggedin_fees',array("admin_id"=>$id));
            for ($i = 0; $i < $count; $i++)
            {
                if (!empty($fee[$i]) && $fee[$i] > 0) 
                {
                    $module_id = $module[$i];
                    $fees = $fee[$i];
                    $payment_type = $charge_formt[$i];
                    $fee_data = array("admin_id"=>$id,"module_id"=>$module_id,"discount"=>$fees,"payment_type"=>$payment_type);
                     $this->operationmodel->saveData('loggedin_fees', $fee_data);

                }
            }

        $table = "admin";
        $where['id'] = $id;
        $data['name'] = trim($this->input->post('fname'));
        $data['last_name'] = trim($this->input->post('lname'));
        $data['business_name'] = trim($this->input->post('bname'));
        $data['business_phone'] = trim($this->input->post('bmobile'));
        /* $data['email'] = trim($this->input->post('cemail')); */
        $data['contact'] = trim($this->input->post('cmobile'));
        $data['password'] = trim($this->input->post('password'));
        $data['pass_md5'] = md5(trim($this->input->post('password')));
        $country = explode("(", trim($this->input->post('country')));
        $data['country'] = trim($country[0]);
        $code = str_replace(")", "", $country[1]);
        $data['country_code'] = trim($code);
        $data['contact_wc'] = $data['country_code'] . $data['contact'];
        $datestring = date('Y-m-d h:i a');
            $data['modified'] = strtotime($datestring);
        
        $cut = "";
        if (!empty($_FILES['cover_pic']['name'])) {
            $fileName = $_FILES['cover_pic']['name'];
            $field = 'cover_pic';
            $path = 'uploads/admin/cover';
            $thumb_path = 'thumb';
            $response = file_upload($fileName, $field, $path, $thumb_path);
            $data['cover_image'] = $response["file"];
            $cut = 1;
        }
        if (!empty($_FILES['profile_pic']['name'])) {
            $fileName1 = $_FILES['profile_pic']['name'];
            $field1 = 'profile_pic';
            $path1 = 'uploads/admin/profile';
            $thumb_path1 = 'thumb';
            $response2 = file_upload($fileName1, $field1, $path1, $thumb_path1,$cut);
            $data['profile_dp'] = $response2["file"];
        }
        /* print_r($response);
          die(); */
        $result = $this->operationmodel->editData($table, $data, $where);
        $table = "admin_permission";
        $where1['admin_id'] = $id;

        $per['permission'] = implode(",", $this->input->post('permission'));
        $per['modifydate'] = strtotime($datestring);
        $this->operationmodel->editData($table, $per, $where1);

        /* $success = "Successfully added.";
          $this->session->set_flashdata('msg_success', $success); */
        redirect('superadmin/Client');
    }

    function updateClientType()
    {
        $mod =  $_POST["mode"];
        if($mod == "update_status")
        {
          $id['id']           = $_POST["where"];
          $type['admin_type'] =  $_POST["set"];

          $result = $this->operationmodel->editData('admin', $type, $id);
          if($result)
          {
            echo  $type['admin_type'];            
          }
        }
    }

}

?>
