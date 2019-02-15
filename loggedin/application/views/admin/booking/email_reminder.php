<div class="content email-reminder-page">
   <div class="container-fluid">
      <!-- Page-Title -->
      <div class="row main_heading_row">
         <div class="col-md-12 col-lg-12 col-xl-10">
            <h4 class="page-title">Emails & Reminders</h4>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
               <li class="breadcrumb-item active">Booking</li>
            </ol>
            <p>Save time running your business by sending automatic emails to your customers. Customize each one to make it your own.</p>
         </div>
         <div class="pull-right col-md-12 col-lg-12 col-xl-2 text-right">                  
            <button type="button"  class="btn btn-primary save-cancel-btn" onclick="redirect_url('<?php echo site_url('admin/booking/booking_option'); ?>')">Cancel</button>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-12 col-xl-4">
            <div class="card-box">
               <h4 class="text-dark header-title m-t-0 m-b-30"><i class="fa fa-question-circle" data-toggle="tooltip" data-placement="right" title="" data-original-title="Customers automatically receive this email every time they book one of your services."></i></h4>
               <div class="widget-chart text-center">
                  <img src="<?php echo base_url('assets/loggedin_images/booking/confirm_schedule.png'); ?>" alt="logged in">
                  <h3 class=" m-t-20 font-normal font-black">Confirmation Email</h3>
                  <p>Send a confirmation email every time a customer books.</p>
                  <p><a href="javascript:void()" onclick="open_modal('.confirm-mail-reminder')">Customize</a> </p>
               </div>
            </div>
         </div>
         <div class="col-lg-12 col-xl-4">
            <div class="card-box">
               <h4 class="text-dark header-title m-t-0 m-b-30"><i class="fa fa-question-circle " data-toggle="tooltip" data-placement="right" title="" data-original-title="Automatic reminder emails are a great way to help customers show up on time and reduce no-shows."></i></h4>
               <div class="widget-chart text-center">
                  <img src="<?php echo base_url('assets/loggedin_images/booking/clock.png'); ?>" alt="logged in">
                  <h3 class=" m-t-20 font-normal font-black">Reminder Email</h3>
                  <p>Send a friendly reminder 24 hours before you're scheduled to meet.</p>
                  <p><a href="javascript:void()" onclick="open_modal('.reminder_mail')">Upgrade</a>  </p>
               </div>
            </div>
         </div>
         <div class="col-lg-12 col-xl-4">
            <div class="card-box">
               <h4 class="text-dark header-title m-t-0 m-b-30"><i class="fa fa-question-circle" data-toggle="tooltip" data-placement="right" title="" data-original-title="This email gets sent automatically to all booked participants when you cancel a Class."></i></h4>
               <div class="widget-chart text-center">
                  <img src="<?php echo base_url('assets/loggedin_images/booking/mailcancel.png'); ?>" alt="logged in " class="mb-0 mt-2">
                  <h3 class="mt-5 font-normal font-black">Cancellation Email</h3>
                  <p> Notify your participants when you cancel a Class. <span class="invisible">loggedin</span></p>
				  
                  <p> <a href="javascript:void()" onclick="open_modal('.cancel-booking-footer');">Customize</a>  </p>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- container -->
</div>
<div class="custom-modal-css modal fade bs-example-modal-lg confirm-mail-reminder">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Confirmation Email</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
         </div>
         <div class="modal-body">
            <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                     <ul class="nav nav-tabs  nav-justified remove-boxshadow custom-tab-menu">
                        <li class="nav-item">
                           <a href="javascript:void(0)" data-toggle="tab" data-id='apt' aria-expanded="false" class="setfooter_booking nav-link active">
                           Appointment 
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="javascript:void(0" data-toggle="tab" data-id='cls' aria-expanded="true" class="nav-link setfooter_booking">
                           Class 
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="javascript:void(0" data-toggle="tab" data-id='bus' aria-expanded="false" class="nav-link setfooter_booking">
                           Bus Ticket 
                           </a>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="row mt-2">
               <div class="col-md-12 apt-footer footer-message-div">
                  <div class="form-group">
                     <label>Appointment Footer Message:</label>
                     <textarea class="form-control"></textarea>
                  </div>
               </div>
               <div class="col-md-12 cls-footer hide footer-message-div">
                  <div class="form-group">
                     <label>Class Footer Message:</label>
                     <textarea class="form-control"></textarea>
                  </div>
               </div>
               <div class="col-md-12 bus-footer hide footer-message-div">
                  <div class="form-group">
                     <label>Bus Footer Message:</label>
                     <textarea class="form-control"></textarea>
                  </div>
               </div>
            </div>
         </div>
         <div class="modal-footer text-left">
            <button type="button" class="btn btn-default save-btn">Save</button>
         </div>
      </div>
   </div>
</div>
<div class="custom-modal-css modal fade bs-example-modal-sm reminder_mail">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Upgrade to Send Reminder Emails</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
         </div>
         <div class="modal-body">
            <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                     <ul class="nav nav-tabs  nav-justified remove-boxshadow custom-tab-menu">
                        <li class="nav-item">
                           <a href="javascript:void(0)" data-toggle="tab" data-id='apt' aria-expanded="false" class="set-reminder nav-link active">
                           Appointment 
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="javascript:void(0" data-toggle="tab" data-id='cls' aria-expanded="true" class="nav-link set-reminder">
                           Class 
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="javascript:void(0" data-toggle="tab" data-id='bus' aria-expanded="false" class="nav-link set-reminder">
                           Bus Ticket 
                           </a>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="row mt-2">
               <div class="col-md-12 apt-form set-reminder-form">
                  <div class="form-group redstar">
                     <label>Subject:</label>
                     <input type="text" class="form-control">
                  </div>
                  <div class="form-group redstar">
                     <label>Message:</label>
                     <textarea type="text" class="form-control"></textarea>
                  </div>
                  <div class="form-group redstar mb-1">
                     <label>Reminder Times Setups</label>
                  </div>
                  <div class="form-row mt-0">
                     <div class="form-group col-md-3">
                        <select  class="form-control"></select>
                     </div>
                     <div class="form-group col-md-3">
                        <select   class="form-control"></select>
                     </div>
                     <div class="form-group col-md-3">
                         <select   class="form-control"></select>
                     </div>
                  </div>
               </div>
               <div class="col-md-12 cls-form hide set-reminder-form">
                  <div class="form-group redstar">
                     <label>Subject:</label>
                     <input type="text" class="form-control">
                  </div>
                  <div class="form-group redstar">
                     <label>Message:</label>
                     <textarea type="text" class="form-control"></textarea>
                  </div>
                  <div class="form-group redstar mb-1">
                     <label>Reminder Times Setups</label>
                  </div>
                  <div class="form-row mt-0">
                     <div class="form-group col-md-3">
                        <select  class="form-control"></select>
                     </div>
                     <div class="form-group col-md-3">
                        <select   class="form-control"></select>
                     </div>
                     <div class="form-group col-md-3">
                         <select   class="form-control"></select>
                     </div>
                  </div>
              
               </div>
               <div class="col-md-12 bus-form hide set-reminder-form">
                  <div class="form-group redstar">
                     <label>Subject:</label>
                     <input type="text" class="form-control">
                  </div>
                  <div class="form-group redstar">
                     <label>Message:</label>
                     <textarea type="text" class="form-control"></textarea>
                  </div>
                  <div class="form-group redstar mb-1">
                     <label>Reminder Times Setups</label>
                  </div>
                  <div class="form-row mt-0">
                     <div class="form-group col-md-3">
                        <select  class="form-control"></select>
                     </div>
                     <div class="form-group col-md-3">
                        <select   class="form-control"></select>
                     </div>
                     <div class="form-group col-md-3">
                         <select   class="form-control"></select>
                     </div>
                  </div>
              
               </div>
            </div>
         </div>
         <div class="modal-footer text-right">
            <button type="button" class="btn btn-default save-btn">Save</button>
         </div>
      </div>
   </div>
</div>
<div class="custom-modal-css modal fade bs-example-modal-lg cancel-booking-footer">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Customize Cancellation Email</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
         </div>
         <div class="modal-body">
            <div class="row mt-2">
               <div class="col-md-12">
                  <p>Customize your confirmation emails here to suit your business. Booking details will automatically appear at the bottom.</p>
                  <div class="form-group">
                     <label>Footer Message</label>
                     <textarea class="form-control"></textarea>
                  </div>
               </div>
            </div>
         </div>
         <div class="modal-footer text-right">
            <button type="button" class="btn btn-default save-btn">Save</button>
         </div>
      </div>
   </div>
</div>
<script src="<?php echo base_url('assets/custom/js/booking.js'); ?>"></script>