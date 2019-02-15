<?php
 class Consultant extends CI_Controller
 {
 	function __construct(){
 		parent::__construct();
 		$this->load->model("operationmodel");
 		$this->operationmodel->checkSuperadmin();
 	}
 	function index(){
 	     	$where['trash_status'] = 0;
 	     	$data['title']    = ' Super Admin consultant';
            $data['contents'] = 'superadmin/consultant';
            $data['record']   = $this->operationmodel->getallData('twilio_consultant',$where);
            $this->load->view("theme/template-super", $data);
 	}
 	function deleteConsultant($id){
      $data['trash_status']= 1;
      $where['id'] = $id;
      $table       = 'twilio_consultant';
      $resut = $this->operationmodel->editData($table,$data,$where);
      if($resut){
       $success = "Deleted successfully.";
       $this->session->set_flashdata('msg_success', $success);
       redirect("superadmin/consultant");
       
	
      }
      else{
       $msg = "Something went wrong.";
       $this->session->set_flashdata('msg_error', $msg);	
      }
 	}

	function twillioNumberDetail() {
		
		$table  = 'twilio_purchased_number';
		$where['trash_status']  = '0';
		$like   = '';
		$coloum = 'id';
		$form   = 'DESC';
		
	$data['title']    = 'Super Admin consultant';
	$data['contents'] = 'superadmin/twillio_number_list';

	// $data['record']   = $this->operationmodel->filterData($table, $where, $like, $coloum, $form);
	$this->load->view("theme/template-super", $data);
	}
  
  function Get_twillioNumber_Detail()
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
$where = array('trash_status'=>0);
     if(isset($_POST['search']))
     {
       $search = $_POST['search'];
        $where = " `trash_status`='0' "." AND (`twilio_number` LIKE '%".$search."%') ";
        $search = '';
     }

     $columns = '*';
     //$where['trash_status']  = '0';

     $data  = pagination('twilio_purchased_number',$limit, $columns,$per_page,$where,$search,'','','','id','DESC');

  

     $output2 = '<input type="hidden" id="total_page" value='.$data['total_page'].'>';
      $record_count = count($data['data']);
    
    if($record_count<1)
    {
        $output2 = '<tr><td colspan="7" align="center">Record not found.</td></tr>';
    }

    else
    {
      
      
      $i =1;
      foreach($data['data'] as $row)
      { 
       /*  $amount = '$'.$row["amount"]/100;
         */
       
          $output2 .='<tr class="gradeX">
            <td>'.$i++.'</td>
            <td>'.$row['twilio_number'].'</td>
            <td>'.date("m-d-Y h:i a", $row['created_date']).'</td>
            <td>'.'Test'.'</td>';
      }
           
    }
    $page_link= $data['page_link'];
    print(json_encode(array('table_data'=>$output2, 'page_link' =>$page_link)));



  }


	public function deleteConsultantNumber($id) {
		
		$table  = 'twilio_purchased_number';
		$where['id']  = $id;
		$data['trash_status'] = 1;
		$resut = $this->operationmodel->editData($table,$data,$where);
		if($resut){
           $success = "Deleted successfully.";
           $this->session->set_flashdata('msg_success', $success);
           redirect("superadmin/consultant/twillioNumberDetail");
		}
        else{
           $msg = "Something went wrong.";
           $this->session->set_flashdata('msg_error', $msg);	
        }
		
	}
	public function addConsultantNumber()
	{

		$mod = $_POST["mode"];
		$table = 'twilio_purchased_number';
		if($mod == 'add_consultant_number')
		{
          $number['twilio_number'] = $_POST["new_number"];
             $datestring = date('Y-m-d h:i a');
             $number['created_date'] = strtotime($datestring);
          $result = $this->operationmodel->saveData($table,$number);
          if($result)
          {
          	echo 1;
          }			
          else
          {
          	echo 0;
          }
		}
       

	}
	public function editConsultantNumber()
	{
		$mod = $_POST["mode"];
		$table        = 'twilio_purchased_number';
        if($mod == "get_number")
        {	
         $id = $_POST["id"];
		 $where['id']  = $id;
		 $result       = $this->operationmodel->getallData($table,$where);
		 echo $result[0]["twilio_number"];
        }
        if($mod == "update_number")
        {
        	$where['id'] = $_POST["nid"];
        	$number['twilio_number'] = $_POST["numbr"];
        	$datestring = date('Y-m-d h:i a');
             $number['modify'] = strtotime($datestring);
        	$result = $this->operationmodel->editData($table,$number,$where);
        	if($result)
        	{
        		echo 1;
        	}
        	else{
               	echo 0;	
        	}
        }
		
	}
 }
?>