<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
   ?>
<div class="content">
   <div class="container-fluid">
      <!-- Page-Title -->
      <div class="row main_heading_row">
         <div class="col-md-12 col-lg-12 col-xl-10">
            <h4 class="page-title">Apartment Rental  </h4>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
               <li class="breadcrumb-item active">Demo  Apartment </li>
            </ol>
         </div>         
      </div>
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-body">
                  <div class="row mb-2 pull-right">
                     <div class="col-lg-8">
                        <form class="form-inline">
                           <div class="form-group mb-2">
                              <label for="inputPassword2" class="sr-only">Search</label>
                              <input type="search" class="form-control" id="inputPassword2" placeholder="Search...">
                           </div>
                        </form>
                     </div>
                  </div>
                  <div class="table-responsive">
                     <table class="link-hover table-padding table table-centered mb-0" id="inline-editable">
                        <thead>
                           <tr>
                              <th> Booking No.	</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Contact</th>
                              <th>Check-In</th>
                              <th>heck-Out</th>
                              <th>Total Price</th>                             
                           </tr>
                        </thead>
                        <tbody>
                           <?php for($i=0; $i<=20;$i++){ ?>
                           <tr>
                              <td>  demo form1 </td>
                              <td>  demo form1 </td>
                              <td>  demo form1 </td>
                              <td>  demo form1 </td>  
                              <td>  demo form1 </td>
                              <td>  demo form1 </td>
                              <td>  demo form1 </td>   							  
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