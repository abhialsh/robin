<?php
 class Order extends CI_Controller
 {
 	function __construct()
 	{
 		parent::__construct();
 		$this->load->model("operationmodel");
        $this->operationmodel->checkSuperadmin();
 	}

 	function Order_Detail()
 	{
 		     $result['title'] = 'Payment History';
         $result['contents'] = 'superadmin/order_detail';
         $this->load->view("theme/template-super",$result);
 	} 
 	public function Get_Order_Detail($type='all')
 	{ 
    if($type == 'all')
    {       
            
            if(isset($_POST['limit']))
            {
             $limit = $_POST['limit']; 
            }
            $current_page = 1;
             if(isset($_POST['current_page']))
            {
              $current_page = $_POST['current_page']; 
            }
         
             

            $date_filter='';
            if(isset($_POST['date_filter']) && $_POST['date_filter'] != '')
            {
             $date = explode('-', $_POST['date_filter']);
             $start_date = trim($date[0]);
             $start_date = $start_date." 00:00:00";
             $end_date = trim($date[1]);
             $end_date =$end_date." 23:59:59";

             $start_date = strtotime($start_date);
             $end_date = strtotime($end_date);
             $date_filter = " (orders.added_on  BETWEEN '".$start_date."' AND '".$end_date."') ";
            }

      
           if(isset($_POST['perpage']))
           {
             $per_page = $_POST['perpage']; 
           }
           if(isset($_POST['search']))
           {
             $search = $_POST['search'];

              $search2 = array('admin.name'=>$search, 'admin.last_name'=>$search,'orders.order_no'=>$search,'orders.total_qty'=>$search,'orders.total_price'=>$search,'orders.payment_type'=>$search);
              if($date_filter != '')
              {
                $date_filter = $date_filter." AND (`admin`.`name` LIKE '%".$search."%' OR `admin`.`last_name` LIKE '%".$search."%' OR `orders`.`order_no` LIKE '%".$search."%' OR `orders`.`total_qty` LIKE '%".$search."%' OR `orders`.`total_price` LIKE '%".$search."%' OR `orders`.`payment_type` LIKE '%".$search."%') ";
                $search2 = '';
              }
           }
           
            $columns = array('orders.*','admin.name','admin.id','admin.last_name');
      
            $join_table  = 'admin'; 
            $join_condition = 'orders.user_id = admin.id';
      
            $data  = pagination('orders',$limit, $columns,$per_page,$date_filter,$search2,$join_table, $join_condition,'LEFT','orders.oid','DESC',$current_page);
      
             $output2 = '<input type="hidden" id="total_page" value='.$data['total_page'].'>';
            $record_count = count($data['data']);
          if($record_count<1)
          {
              $output2 = '<tr><td colspan="11" align="center">Not Record  Found.</td></tr>';
          }
          else
          {
            /*$output2 = '<tr><td colspan="11" align="center">'.$data['last_query'].'</td></tr>';*/
            $i = $limit+1;
            foreach($data['data'] as $row)
            {  
               
                $output2 .='<tr>
                  <td>'.$i++.'</td>
                  <td>'.$row["order_no"].'</td>
                  <td>'.$row["name"]." ".$row["last_name"].'</td>
                  <td>'.$row["total_qty"].'</td>
                  <td>'.$row["total_price"].'</td>
                  <td>'.$row["payment_type"].'</td>
                  <td>';
                  
                  if ($row['paid'] == '1')
                  { 
                    $output2 .='<span class="label label-sm label-success">Done</span>';
                  }
                  else
                  {
                    $output2 .= '<span class="label label-sm label-info">Pending</span>';
                  }
      
                  $output2 .='</td><td>';
                  if($row['order_status'] == '1')
                  { 
                    $output2 .= '<span class="label label-xs label-success"> Delivered</span>';
                  }
                  elseif($row['order_status'] == '2')
                  {
                    $output2 .= '<span class="label label-xs label-danger"> Rejected</span>';
                  }
                  elseif($row['order_status'] == '3')
                  {
                    $output2 .= '<span class="label label-xs label-warning"> User Cancel</span>'; 
                  }
                  elseif($row['order_status'] == '4')
                  {
                    $output2 .= '<span class="label label-xs label-warning"> Refund Request</span>'; 
                  }
                  elseif($row['order_status'] == '5')
                  {
                    $output2 .= '<span class="label label-xs label-danger"> Refunded</span>'; 
                  }
                  else
                  {   
                    $output2 .= '<span class="label label-xs label-info"> Pending</span>'; 
                  }
                    

                    $output2 .= '</td>
                     <td>'.date("m-d-Y h:i a", $row["added_on"]).'</td>
                      <td>'.$row["type"].'</td>
                      <td><span class="label label-sm label-warning pointer" data-toggle="modal" data-target="#myModal" onclick="getDetail('."'".$row["order_no"]."'".','."'"."Order"."'".')"> Order</span>
      <span class="label label-sm label-warning pointer" data-toggle="modal" data-target="#myModal" onclick="getDetail('."'".$row["order_no"]."'".','."'"."Payment"."'".')"> Payment</span></td>
                  
                </tr>';
                 }
          }
                 $page_link= $data['page_link'];
             print(json_encode(array('table_data'=>$output2, 'page_link' =>$page_link)));
    }
  else
  {
      
    if(isset($_POST['order_no']) && $_POST['order_no'] != "")
    {
         $order_no = $_POST['order_no'];
         $req = $_POST['request_for'];  
    
       
       $where = array('order_id'=>$order_no);
      if($req == 'Order')
      {
         $colom = array('order_id','reason','description','datetime','action');
         $record = $this->operationmodel->getSpecialData('order_history',$colom,$where);
         $record = $record['record'];
          
         $i = 0;


         $res = '<thead>
<tr> <th>#</th> <th>Order No.</th> <th>Status</th> <th>Reason</th> <th>Description</th> <th>Date</th> </tr>
</thead>';
         foreach($record as $row)
         {
           $i++;
           $res .=  "<tr><td>".$i."</td><td>".$row['order_id']."</td><td>";
           if($row['action'] == '0')
           {
             $status = 'Pending';
           }
           else if($row['action'] == '1')
           {
            $status = 'Complete';
           }
           else if($row['action'] == '2')
           {
            $status = 'Reject';
           }
           else if($row['action'] == '3')
           {
            $status = 'Cancel';
           }
           else if($row['action'] == '4')
           {
            $status = 'Refund';
            }
           else if($row['action'] == '5')
           {
            $status = 'Refunded';
           }
         $date = $row['datetime'];
         if(!strpos($date,'-'))
         {
           $date = date("d-m-Y h:i:s a");
         }

         $res .= $status."</td><td>".$row['reason']."</td><td>".$row['description']."</td><td>".$date."</td></tr>";
        
        }
        echo $res;
      }
      else
     {
      $colom = array('order_id','amount','currency','payment_id','txn_status','txn_type','datetime');
      
      $record = $this->operationmodel->getSpecialData('payment_history',$colom,$where);
         $record = $record['record'];
      $res = '<thead>
<tr> <th>#</th> <th>Order No.</th> <th>Amount</th> <th>Payment Id</th> <th>Pay Status</th> <th>Txn For</th> <th>Date</th> </tr>
</thead>';
      $i = 0;
      if(count($record)>0)
      {
       foreach($record as $row)
       {
         $i++;
         $date = $row['datetime'];
         if(!strpos($date,'-'))
         {
           $date = date("d-m-Y h:i:s a");
         }

         $res .= "<tr><td>".$i."</td><td>".$row['order_id']."</td><td>$ ".round(($row['amount'] / 100),2)."</td><td>".$row['payment_id']."</td><td>".$row['txn_status']."</td><td>".$row['txn_type']."</td><td>".$date."</td></tr>";
       }
      }
      else{
        $res .= "<tr><td colspan='7' align='center'>No record found.</td></tr>";
      }

       echo $res;
    }

    }
    else
    {
      echo "<tr><td colspan='6'>No record found.</td></tr>";
    }
  }


  }
  function Test($type)
  {
    echo $type;
  }
   
}
?>
