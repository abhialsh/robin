<div class="content">
  <div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
      <div class="col-sm-12">
        <h4 class="page-title">Loggedin App</h4>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Consultant</a></li>
          <li class="breadcrumb-item active">All Consultant</li>
        </ol>

      </div>
    </div>
    
    <div class="row">
    <div class="col-sm-12">

      <div class="card-box">
        <div class="row">
          <div class="col-sm-12">
           
          </div>
        </div>

        <table class="table table-striped add-edit-table" id="datatable-editable">
          <thead>
                                        <tr>
                                            <th>Sr No</th>
                                            <th>Consultant Name</th>
                                            <th>Email Address</th>
                                            <th>Contact</th>
                                            <th>Designation</th>
                                            <th style="width: 100px;">Call Rate</th>
                                            <th>Address</th>                                             
                                            <th>Action</th>                                             
                                        </tr>
          </thead>
          <tbody>
       <?php
$i=1;
    foreach ($record as $row) {
       ?>
       <tr>
        <td>
          <?php echo $i++;?>
        </td>
        <td>
          <?php echo $row['consultant_name'];?>
        </td>
        <td>
          <?php echo $row['email'];?>
        </td>
        <td>
          <?php echo $row['contact'];?>
        </td>
        <td>
          <?php echo $row['designation'];?>
        </td>
        <td>
          <?php echo "$".$row['call_rate'];?>
        </td>
        <td>
           <?php echo $row['address'].",".$row['city'].",".$row['region'].",".$row['country'].",".$row['zipcode'];?>
        </td>
        <td>
		    <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal"><i class='pointer ti-trash delete_twilio_cunsoltant' id='delete'></i></button>
           
        </td>

       </tr>
        
  <?php  } ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- end: page -->

  </div>
    
  </div>

  <div class="container">
  
  <!-- Trigger the modal with a button -->
  

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
          <p>Are you sure to delete this record</p>
        </div>
        <div class="modal-footer">
          <a class="btn btn-danger btn-lg" href="<?php echo site_url()?>/superadmin/consultant/deleteConsultant/<?php echo $row['id'];?>" class='delete cursor' title='' data-toggle='tooltip' data-original-title='Delete'>Delete</a> 
		  
		  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

