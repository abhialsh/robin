<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
   ?>
<div class="content">
   <div class="container-fluid">
      <!-- Page-Title -->
      <div class="row main_heading_row">
         <div class="col-md-12 col-lg-12 col-xl-10">
            <h4 class="page-title">Add New Customer</h4>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
               <li class="breadcrumb-item active">Booking</li>
            </ol>
            
         </div>
         <div class="col-md-12 col-lg-12 col-xl-2 text-right">
		  <button type="button"   class="btn btn-primary save-cancel-btn"  onclick="redirect_url('<?php echo site_url('admin/booking/customers'); ?>')">Cancel</button>
        <button type="button"   class="btn btn-primary publish-btn m-l-5">Save</button>
          
         </div>
      </div>
      <div class="row">
         <div class="col-12">
            <div class="card-box">
               <div class="row">
                  <div class="col-md-4 d-flex align-self-center">			 
                     <img src="https://image.ibb.co/jLczFc/curriculum.png" class="mx-auto" width="100" height="100">
                  </div>
                  <div class="col-md-8">
                     <div class="row  pt-2">
                        <div class="col-md-6 ">
                           <div class="form-group redstar">
                              <label>First Name</label>
                              <input type="text" placeholder="First Name" data-mask="999-99-999-9999-9" class="form-control">
                           </div>
                        </div>
                        <div class="col-md-6 ">
                           <div class="form-group redstar">
                              <label>First Name</label>
                              <input type="text" placeholder="Last Name" data-mask="999-99-999-9999-9" class="form-control">
                           </div>
                        </div>
                        <div class="col-md-6 ">
                           <div class="form-group redstar">
                              <label>Phone</label>
                              <input type="text" placeholder="e.g., 1234567890" data-mask="999-99-999-9999-9" class="form-control">
                           </div>
                        </div>
                        <div class="col-md-6 ">
                           <div class="form-group redstar">
                              <label>Email</label>
                              <input type="email" placeholder="example@gmail.com" data-mask="999-99-999-9999-9" class="form-control">
                           </div>
                        </div>
                        <div class="col-md-6 ">
                           <div class="form-group">
                              <label>Birthday (Optional)</label>  
                              <div class="row">
                                 <div class="col-md-4 mb-3 mb-sm-0">
                                    <select class="form-control">
                                       <option value="">Date</option>
									   <?php for($d=1; $d<=31; $d++){ echo "<option value='$d'>$d</option>"; } ?>
                                    </select>
                                 </div>
                                 <div class="col-md-4 mb-3 mb-sm-0"> 
                                    <select class="form-control">
                                       <option value="">Month</option>
									    <?php for($m=1; $m<=12; $m++){ echo "<option value='$m'>$m</option>"; } ?>
                                    </select>
                                 </div>
                                 <div class="col-md-4 mb-3 mb-sm-0">
                                    <select class="form-control">
                                       <option value="">Year</option>
									    <?php for($y=1947; $y<= date('Y'); $y++){ echo "<option value='$y'>$y</option>"; } ?>
                                    </select>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 ">
                           <div class="form-group">
                              <label>Street</label>    
                              <input type="text" placeholder="Street"  class="form-control">							  
                           </div>
                        </div>
						 <div class="col-md-6 ">
                           <div class="form-group ">
                              <label>City</label>
                              <input type="text" placeholder=""  class="form-control">
                           </div>
                        </div>
                        <div class="col-md-6 ">
                           <div class="form-group">
                              <label>Zip Code</label>
                              <input type="text" placeholder=""  class="form-control">
                           </div>
                        </div>
						 <div class="col-md-12">
                           <div class="form-group">
                              <label>Notes</label>
                              <textarea type="text" placeholder="Notes...."  class="form-control"></textarea>
                           </div>
                        </div>
                       
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div><div class="row">
                    <div class="col-sm-12">
                        <div class="pull-right m-t-15">
                            <button type="button" onclick="redirect_url('<?php echo site_url('admin/booking/customers'); ?>')"  class="btn btn-primary save-cancel-btn">Cancel</button>
                            <button type="button"   class="btn btn-primary publish-btn m-l-5">Save</button>
                        </div>
                    </div>
                </div>
   </div>
   <!-- container -->
</div>