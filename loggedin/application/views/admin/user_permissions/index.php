<div class="content">
   <div class="container-fluid">
      <!-- Page-Title -->
      <div class="row main_heading_row">
         <div class="col-md-12 col-lg-12 col-xl-10">
            <h4 class="page-title">User Permission</h4>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
               <li class="breadcrumb-item active">User Permission</li>
            </ol>
         </div>
         <div class="col-md-12 col-lg-12 col-xl-2 text-right">
            	<button type="button" class="btn btn-primary  waves-effect waves-light save-btn " onclick="redirect_url('<?php echo site_url('admin/Permissions/invite')?>')">Invite User</button> 
         </div>
      </div>
      <!-- Page-Title-End--> 
      <!--page content start-->
      <div class="row">
         <div class="col-12">
            <div class="card">
               <!-- start card-body -->
               <div class="card-body">
                  <!--search area code start-->
                  <div class="row mb-2">
                     <div class="col-lg-1 pl-0 pr-0">
                        <div class="form-group mb-2 ">
                           <select type="text" class="form-control">
                              <option>100</option>
                              <option>50</option>
                              <option>25</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-lg-4"></div>
                     <div class="col-lg-3  pl-0 pr-0">
                        <div class="form-group mb-2 ">                            
                           <input type="text" class="form-control input-daterange-datepicker" id="inputPassword2" placeholder="Search...">
                        </div>
                     </div>
                     <div class="col-lg-1"></div>
                     <div class="col-lg-3  pl-0 pr-0">
                        <div class="form-group mb-2 ">
                           <label for="inputPassword2" class="sr-only">Search</label>
                           <input type="search" class="form-control" id="inputPassword2" placeholder="Search...">
                        </div>
                     </div>
                  </div>
                  <!--search area code end-->
                  <!-- start .table-responsive-->
                  <div class="table-responsive">
                     <!--table code start-->                   
                     <table class="link-hover table-padding table table-centered mb-0" id="inline-editable">
                        <thead>
                           <tr>
                           <tr>
                              <th>S. No.</th>
                              <th>Name</th>
                              <th>Contact</th>
                              <th>Email</th>
                              <th>Reg Date</th>
                              <th>Status</th>
                              <th>Action  </th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php for($i=1; $i<=10;$i++){ ?>
                           <tr>
                              <td>  <?php echo $i; ?> </td>
                              <td>  demo form1 </td>
                              <td>  demo form1 </td>
                              <td>  demo form1 </td>
                              <td>  demo form1 </td>
                              <td>  <span class="label label-success status-btn success-status-btn font-weight-normal"> Approve  </span></td>                              
                              <td> <a href="http://192.168.1.199/loggedin/index.php/admin/form/view_forms_lead" class="btn   btn-sm custom-btn-circle"><i class="md md-mode-edit"></i></a> </td>
                           </tr>
						   <tr>
                              <td>  <?php echo $i; ?> </td>
                              <td>  demo form1 </td>
                              <td>  demo form1 </td>
                              <td>  demo form1 </td>
                              <td>  demo form1 </td>
                              <td>  <span class="label status-btn  label-danger font-weight-normal"> Pending </span></td>
                              
                              <td> <a href="http://192.168.1.199/loggedin/index.php/admin/form/view_forms_lead" class="btn   btn-sm custom-btn-circle"><i class="md md-mode-edit"></i></a></td>
                           </tr>
                           <?php } ?>
                        </tbody>
                     </table>
                     <!--table code end-->                
                  </div>
                  <!-- end .table-responsive-->
               </div>
               <!-- end card-body -->
            </div>
         </div>
      </div>
      <!--page content end-->  
   </div>
</div>