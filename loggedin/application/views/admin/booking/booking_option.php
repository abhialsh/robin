<div class="content">
   <div class="container-fluid">
      <!-- Page-Title -->
      <div class="row main_heading_row">
         <div class="col-md-12 col-lg-12 col-xl-12">
            <h4 class="page-title">Booking Options</h4>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
               <li class="breadcrumb-item active">Booking</li>
            </ol>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-6">
            <div class="card-box">
               <div class="bar-widget">
                  <div class="table-box">
                     <div class="table-detail">
                        <h2 class="m-0  counter font-normal">Set Your Availability</h2>
                        <p class="text-muted mt-4">Add your appointment hours, time zone and more.</p>
                        <p class="text-muted mt-5"><a href="<?php echo site_url('admin/booking/set_availability'); ?>" class="btn btn-default btn-custom waves-effect waves-light no-border"> Set Availability </a></p>
                     </div>
                     <div class="table-detail w-25 text-center">
                        <div class="iconbox ">
                           <i class="ion-calendar loggedin-color bookingoption-icon"></i>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-6">
            <div class="card-box">
               <div class="bar-widget">
                  <div class="table-box">
                     <div class="table-detail">
                        <h2 class="m-0  counter font-normal">Add Your Booking Policy</h2>
                        <p class="text-muted mt-4">Take a few minutes to add your cancellation policy and rules for booking.</p>
                        <p class="text-muted mt-4"><a href="<?php echo site_url('admin/booking/booking_policy'); ?>" class="btn btn-default btn-custom waves-effect waves-light no-border"> Add Booking Policy </a></p>
                     </div>
                     <div class="table-detail w-25 text-center">
                        <div class="iconbox ">
                           <i class="fa fa-address-card-o loggedin-color bookingoption-icon"></i>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>   
         <div class="col-lg-6">
            <div class="card-box">
               <div class="bar-widget">
                  <div class="table-box">
                     <div class="table-detail">
                        <h2 class="m-0  counter font-normal">Send Auto Emails & Reminders</h2>
                        <p class="text-muted mt-4">Save time running your business by sending automatic emails to your clients.</p>
                        <p class="text-muted mt-4"><a href="<?php echo site_url('admin/booking/email_reminder'); ?>" class="btn btn-default btn-custom waves-effect waves-light no-border"> Send Auto Emails </a></p>
                     </div>
                     <div class="table-detail w-25 text-center">
                        <div class="iconbox">
                           <i class="fa fa-envelope loggedin-color bookingoption-icon"></i>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- container -->
</div>