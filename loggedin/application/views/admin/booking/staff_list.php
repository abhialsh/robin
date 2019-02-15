<div class="content">
<div class="container-fluid">
   <!-- Page-Title -->
   <div class="row main_heading_row">
      <div class="col-md-12 col-lg-12 col-xl-10">
         <h4 class="page-title">Staff</h4>
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Booking</li>
         </ol>
      </div>
      <div class="col-md-12 col-lg-12 col-xl-2 text-right">
         <button type="button" class="btn btn-primary  waves-effect waves-light save-btn " onclick="redirect_url('<?php echo site_url('admin/booking/new_staff'); ?>')">+ Add Staff Member</button> 
      </div>
      <div class="col-md-12 col-lg-12 col-xl-12">
         <p>Add your fabulous team here so people can book them on your site. Sync each staff member’s Google Calendar to let them manage their schedule on the go.</p>
      </div>
   </div>
   <div class="row">
 <?php for($i=0; $i<=5; $i++) { ?>
      <div class="col-md-4 col-lg-3">
         <div class="profile-detail card-box">
            <div>
               <div class="btn-group pull-right">
                  <i class="fa fa-ellipsis-v  pointer  " data-toggle="dropdown" aria-expanded="false"></i>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="btnGroupDrop1" style="left:-100%">
                     <li class="dropdown-item pl-2"><a href="">Edit</a></li>
                     <li class="dropdown-item pl-2"><a href="">Delete</a></li>
                  </div>
               </div>
               <!--<img src="http://images.clipartpanda.com/user-clipart-matt-icons_preferences-desktop-personal.png" class="rounded-circle" alt="profile-image">-->
               <div class="staff_circle">
                  VS
               </div>
               <ul class="list-inline status-list m-t-10">
                  <li class="list-inline-item">
                     <h3 class="m-b-5 font-normal">Abhi Patodi</h3>
                     <p class="text-muted">Abhipatodi1100@gmail</p>
                     <p class="text-muted">+91-8120668643</p>
                  </li>
               </ul>
               <hr>
               <a  href="javascript:void(0)" onclick="open_modal('.syn_email')">Sync Google Calendar</a>
            </div>
         </div>
      </div>
 <?php } ?>
	 
 <div class="col-md-4 col-lg-3 ">
         <div class="card-box pointer" id="add-staff-div" onclick="redirect_url('<?php echo site_url('admin/booking/new_staff'); ?>')">
            <div>
               
			   <div class="mt-5 mb-5 text-center">
               <img src="https://loggedinapp.com/admin/new-booking/date/add.png" height="162" width="162" class="rounded-circle" alt="profile-image"> 
                </div>
            <div class="mb-1 text-center">
			<p class="invisible">a</p>	 
               <a  href="javascript:void(0)" onclick="open_modal('.syn_email')"  >Add New Staff Member</a>
            </div>
            </div>
         </div>
      </div>

	 
   </div>
   <!-- container -->
</div>
</div>



<!-- modal popup code start-->
<div class="custom-modal-css modal fade bs-example-modal-lg syn_email">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Sending Sync Request</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
         </div>
         <div class="modal-body">
            <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                     <label for="field-1" class="control-label">Add your staff member's email address to send a sync request. Once synced, they'll be able to see their bookings on the go in their Google Calendar.</label>
                     <input type="text" class="form-control"   placeholder="Email Address" readonly>
                   <p class="mt-3">An email verification will be sent to this address</p>   
                  </div>
               </div>
            </div>
         </div>
         <div class="modal-footer text-right">
            <button type="button" class="btn btn-default save-btn">Save</button>
			<button type="button" class="btn btn-default  save-cancel-btn" onclick="close_modal('.syn_email')">Cancel</button>
         </div>
      </div>
   </div>
</div>
<!-- modal popup code end-->