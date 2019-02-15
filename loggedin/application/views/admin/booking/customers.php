<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
   ?>
<div class="content">
   <div class="container-fluid">
      <!-- Page-Title -->
      <div class="row main_heading_row">
         <div class="col-md-12 col-lg-12 col-xl-10">
            <h4 class="page-title">Customers</h4>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
               <li class="breadcrumb-item active">Booking</li>
            </ol>
			<p>
			Everyone who books your services is added to your customer list. Click on a customer for more info.
			</p>
			
         </div>
		 <div class="col-md-12 col-lg-12 col-xl-2 text-right">
         <button type="button" class="btn btn-primary  waves-effect waves-light save-btn " onclick="redirect_url('<?php echo site_url('admin/booking/new_customers'); ?>')">+ Add Customers</button> 
      </div>
      </div>
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-body">
                  <div class="row mb-1">
                     <div class="col-lg-1 pl-0 pr-0 ">
                        <div class="form-group mb-2  ">
                           <select type="text" class="form-control">
                              <option>100</option>
                              <option>50</option>
                              <option>25</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-lg-8"></div>
                     <div class="col-lg-3  pl-0 pr-0">
                        <div class="form-group mb-2 ">
                           <label for="inputPassword2" class="sr-only">Search</label>
                           <input type="search" class="form-control" id="inputPassword2" placeholder="Search...">
                        </div>
                     </div>
                  </div>
                  <div class="table-responsive">
                     <table class="link-hover table-padding table table-centered mb-0" id="inline-editable">
                        <thead>
                           <tr>					
                              <th> Booking ID</th>
                              <th>Name</th>
                              <th>Customer Name</th>
                              <th>Staff Name</th>
                              <th>Call Status</th>
                              <th>Time</th>
                              <th>Booking Date</th>
                              <th>Type</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php for($i=1; $i<=20;$i++){ ?>
                           <tr>
                              <td>  <?php echo $i; ?> </td>
                              <td>  demo form1 </td>
                              <td>  demo form1 </td>
                              <td>  demo form1 </td>
                              <td>  demo form1 </td>
                              <td>  demo form1 </td>
                              <td>  demo form1 </td>
                              <td class="font-bold"> Class </td>
                           </tr>
                           <?php } ?>
                        </tbody>
                     </table>
                  </div>
                  <!-- end .table-responsive-->
               </div>
               <!-- end card-body -->
            </div>
            <!-- end card -->
         </div>
         <!-- end col -->
      </div>
      <!-- end row -->
   </div>
   <!-- container -->
</div>