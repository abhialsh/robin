<div class="content new_staff_add">
   <div class="container-fluid">
      <!-- Page-Title -->
      <div class="row main_heading_row">
         <div class="col-md-12 col-lg-12 col-xl-7">
            <h4 class="page-title">Add Staff Member</h4>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
               <li class="breadcrumb-item active">Booking</li>
            </ol>
         </div>
         <div class="col-md-12 col-lg-12 col-xl-5 text-right">
		    <button type="button" class="btn btn-primary save-cancel-btn m-l-5" onclick="redirect_url('<?php echo site_url('admin/booking/staff_list'); ?>')">Cancel</button>
            <button type="button" class="btn btn-primary publish-btn m-l-5">Save</button>
         </div>
      </div>
      <div class="row">
         <div class="col-12">
            <div class="card-box">
               <div class="row">
                  <div class="col-md-4">
                     <div class="form-group p-20 center_small">
                        <div class="staff-img-container">
                           <img src="https://profiles.utdallas.edu/img/default.png" alt=""  class="rounded-circle staff_img" width='150'/>                           
                           <div class="button"><a href="javascript:void(0)"> + Add Photo </a></div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-8">
                     <div class="form-group redstar">
                        <label>Full Name</label>
                        <input type="text" placeholder="e.g., Joe Martin" class="form-control">
                     </div>
                     <div class="form-group col-md-6 p-0 pull-left padding_0">
                        <label>Email (Optional) <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Notification emails will be sent to this email and to the business email address in the Business Info tab."></i></label>
                        <input type="text" placeholder="e.g., joe@myclient.com" class="form-control">
                     </div>
                     <div class="form-group col-md-6  pr-0 pull-right padding_0">
                        <label>Phone (Optional)</label>
                        <input type="text" placeholder="123 456 9874" class="form-control">
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12">
                     <div class="form-group">
                        <h4>  Staff Member Hours <i class="fa fa-question-circle ml-2" data-toggle="tooltip" data-placement="top" title="Notification emails will be sent to this email and to the business email address in the Business Info tab."></i></h4>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <input type="radio" name="set_time" class="set_staff_time" value="0"> Same as Business Hourss <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="To set your business's Appointment Hours, head over to the Business Setup-->Booking Options"></i>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <input type="radio" name="set_time" class="set_staff_time" value="1"> Set staff member's hours
                     </div>
                  </div>
               </div>
               <div class="row hide business_hours">
                  <div class="col-12">
                     <div class="p-20">
                        <div class="form-row">
                           <div class="form-group col-md-2">
                              <button class="btn btn-default">Monday</button>
                           </div>
                           <div class="form-group col-md-1">
                              <input type="checkbox" checked="" data-plugin="switchery" data-color="#5fbeaa" data-switchery="true" data-size="small" style="display: none;">
                           </div>
                           <div class="form-group col-md-2">
                              <input type="text" class="form-control timepicker" placeholder="Facebook Link">
                           </div>
                           <div class="form-group col-md-2">
                              <input type="text" class="form-control timepicker" placeholder="Facebook Link">
                           </div>
                        </div>
                        <div class="form-row">
                           <div class="form-group col-md-2">
                              <button class="btn btn-default">Monday</button>
                           </div>
                           <div class="form-group col-md-1">
                              <input type="checkbox" checked="" data-plugin="switchery" data-color="#5fbeaa" data-switchery="true" data-size="small" style="display: none;">
                           </div>
                           <div class="form-group col-md-2">
                              <input type="text" class="form-control timepicker" placeholder="Facebook Link">
                           </div>
                           <div class="form-group col-md-2">
                              <input type="text" class="form-control timepicker" placeholder="Facebook Link">
                           </div>
                        </div>
                        <div class="form-row">
                           <div class="form-group col-md-2">
                              <button class="btn btn-default">Monday</button>
                           </div>
                           <div class="form-group col-md-1">
                              <input type="checkbox" checked="" data-plugin="switchery" data-color="#5fbeaa" data-switchery="true" data-size="small" style="display: none;">
                           </div>
                           <div class="form-group col-md-2">
                              <input type="text" class="form-control timepicker" placeholder="Facebook Link">
                           </div>
                           <div class="form-group col-md-2">
                              <input type="text" class="form-control timepicker" placeholder="Facebook Link">
                           </div>
                        </div>
                        <div class="form-row">
                           <div class="form-group col-md-2">
                              <button class="btn btn-default">Monday</button>
                           </div>
                           <div class="form-group col-md-1">
                              <input type="checkbox" checked="" data-plugin="switchery" data-color="#5fbeaa" data-switchery="true" data-size="small" style="display: none;">
                           </div>
                           <div class="form-group col-md-2">
                              <input type="text" class="form-control timepicker" placeholder="Facebook Link">
                           </div>
                           <div class="form-group col-md-2">
                              <input type="text" class="form-control timepicker" placeholder="Facebook Link">
                           </div>
                        </div>
                        <div class="form-row">
                           <div class="form-group col-md-2">
                              <button class="btn btn-default">Monday</button>
                           </div>
                           <div class="form-group col-md-1">
                              <input type="checkbox" checked="" data-plugin="switchery" data-color="#5fbeaa" data-switchery="true" data-size="small" style="display: none;">
                           </div>
                           <div class="form-group col-md-2">
                              <input type="text" class="form-control timepicker" placeholder="Facebook Link">
                           </div>
                           <div class="form-group col-md-2">
                              <input type="text" class="form-control timepicker" placeholder="Facebook Link">
                           </div>
                        </div>
                        <div class="form-row">
                           <div class="form-group col-md-2">
                              <button class="btn btn-default">Monday</button>
                           </div>
                           <div class="form-group col-md-1">
                              <input type="checkbox" checked="" data-plugin="switchery" data-color="#5fbeaa" data-switchery="true" data-size="small" style="display: none;">
                           </div>
                           <div class="form-group col-md-2">
                              <input type="text" class="form-control timepicker" placeholder="Facebook Link">
                           </div>
                           <div class="form-group col-md-2">
                              <input type="text" class="form-control timepicker" placeholder="Facebook Link">
                           </div>
                        </div>
                        <div class="form-row">
                           <div class="form-group col-md-2">
                              <button class="btn btn-default">Monday</button>
                           </div>
                           <div class="form-group col-md-1">
                              <input type="checkbox" checked="" data-plugin="switchery" data-color="#5fbeaa" data-switchery="true" data-size="small" style="display: none;">
                           </div>
                           <div class="form-group col-md-2">
                              <input type="text" class="form-control timepicker" placeholder="Facebook Link">
                           </div>
                           <div class="form-group col-md-2">
                              <input type="text" class="form-control timepicker" placeholder="Facebook Link">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-sm-12">
                  <div class="pull-right m-t-15">
                     <button type="button" onclick="redirect_url('<?php echo site_url('admin/booking/staff_list'); ?>')"  class="btn btn-primary save-cancel-btn">Cancel</button>
                     <button type="button"   class="btn btn-primary publish-btn m-l-5">Save</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script src="<?php echo base_url('assets/custom/js/booking.js'); ?>"></script>