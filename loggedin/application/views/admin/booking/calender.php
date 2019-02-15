<link href="<?php echo base_url('plugins/fullcalendar/css/fullcalendar.min.css');?> " rel="stylesheet" />
<div class="content page-calender">
   <div class="container-fluid">
      <!-- Page-Title -->
      <div class="row main_heading_row">
         <div class="col-md-12 col-lg-12 col-xl-8">
            <h4 class="page-title">Calender</h4>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
               <li class="breadcrumb-item active">Booking</li>
            </ol>
         </div>
         <div class="col-md-12 col-lg-12 col-xl-4 text-right">
            <button type="button" class="btn btn-primary save-btn" onclick="redirect_url('<?php echo site_url('admin/booking/staff_list'); ?>')">  Sync Calendars </button>
            <button type="button" class="btn btn-primary save-btn">  Refresh <i class="fa fa-refresh"></i> </button>
         </div>
         <div class="col-md-12 mt-3 mt-lg-0">
            <p>Here's where you can manage the bookings of everyone on your team. Click a time slot to manually add or reschedule appointments, view customers and more.</p>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-12">
            <div class="row">
               <div class="col-lg-3">
                  <div class="widget">
                     <div class="widget-body">
                        <div class="row">
                           <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="checkbox">
                                 <button type="button" class="btn btn-default dropdown-toggle waves-effect waves-light save-btn" data-toggle="dropdown" aria-expanded="true">Add New</button>
                                 <div class="dropdown-menu dropdown-menu-left" aria-labelledby="btnGroupDrop1" x-placement="top-end" >
                                    <a class="dropdown-item" onclick="open_modal('.add-service')" href="javascript:void(0)">Appointment</a>
                                    <a class="dropdown-item" onclick="open_modal('.add-class')" href="javascript:void(0)">Class</a>
                                    <a class="dropdown-item" href="javascript:void(0)" onclick="open_modal('.add-blocked-time')">Blocked Time</a>
                                    <a class="dropdown-item" href="javascript:void('0')" onclick="open_modal('.bus-booking')">Bus</a>
                                 </div>
                              </div>
                              <div class="mt-3">
                                 <button type="button" class="btn btn-default dropdown-toggle waves-effect waves-light save-btn" data-toggle="dropdown" aria-expanded="true">Add New</button>
                                 <div class="dropdown-menu dropdown-menu-left" aria-labelledby="btnGroupDrop1" x-placement="top-end" >
                                    <a class="dropdown-item" href="#"><input type="checkbox"> Select all</a>
                                    <a class="dropdown-item" href="#"><input type="checkbox"> Select all</a>
                                    <a class="dropdown-item" href="#"><input type="checkbox"> Select all</a>
                                    <a class="dropdown-item" href="#"><input type="checkbox"> Select all</a>
                                 </div>
                              </div>
                              <!-- checkbox -->
                              <div class=" m-t-20">
                                 <input  type="checkbox">
                                 <label for="drop-remove">
                                 Appointment
                                 </label>
                              </div>
                              <div class="">
                                 <input  type="checkbox">
                                 <label for="drop-remove">
                                 Class
                                 </label>
                              </div>
                              <div class="">
                                 <input  type="checkbox">
                                 <label for="drop-remove">
                                 Google
                                 </label>
                              </div>
                              <div class="">
                                 <input  type="checkbox">
                                 <label for="drop-remove">
                                 Blocked	
                                 </label>
                              </div>
                              <div class="">
                                 <input  type="checkbox">
                                 <label for="drop-remove">
                                 Bus	
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- end col-->
               <div class="col-lg-9">
                  <div class="card-box">
                     <div id="calendar"></div>
                  </div>
               </div>
               <!-- end col -->
            </div>
            <!-- end row -->
            <!-- BEGIN MODAL -->
         </div>
         <!-- END MODAL -->
      </div>
      <!-- end col-12 -->
   </div>
   <!-- end row -->
</div>
<!-- container -->
<div class="custom-modal-css modal fade bs-example-modal-lg bus-booking">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Add New Bus Service</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
         </div>
         <div class="modal-body">
            <div class="row mt-2">
               <div class="col-md-12">
                  <div class="form-group redstar">
                     <label>Choose a service</label>	
                     <select type="text" class="form-control"></select>				  
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="form-group">
                     <label>Price : $0.12</label>	
                      
                  </div>
               </div>
			   <div class="col-md-12">
                  <div class="row">
                     <div class="col-md-4">
                        <div class="form-group redstar">
                           <label>Day</label>	
                           <input type="text" class="form-control datepicker">						  
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group redstar">
                           <label>Time </label>	
                           <input type="text" class="form-control datepicker">						  
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group redstar">
                           <label>Max. Participants</label>	
                            <input type="text" class="form-control">		
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>Customer Name</label>	
                           <input type="text" class="form-control">						  
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group ">
                           <label>Phone</label>	
                           <input type="text" class="form-control">	
                        </div>
                     </div>
                  </div>
               </div>
              
               <div class="col-md-12">
                  <div class="form-group redstar">
                     <label>Email</label>	
                     <input type="email" class="form-control">			  
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="form-group">
                     <label>Note To Staff</label>	
                     <textarea type="email" class="form-control"></textarea>			  
                  </div>
               </div>
            </div>
         </div>
         <div class="modal-footer text-right">
            <button type="button" class="btn btn-default save-cancel-btn" onclick="close_modal('.bus-booking')">Cancel</button>
            <button type="button" class="btn btn-default save-btn">Save</button>
         </div>
      </div>
   </div>
</div>


<div class="custom-modal-css modal fade bs-example-modal-lg add-blocked-time">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Block Off Time</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
         </div>
         <div class="modal-body">
            <div class="row mt-2">
               <div class="col-md-12">
                  <div class="form-group redstar">
                     <label>Staff Member</label>	
                     <select type="text" class="form-control"></select>		  
                  </div>
               </div>
               
               <div class="col-md-12">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>From</label>	
                           <input type="text" class="form-control datepicker">						  
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group ">
                           <label>&nbsp;</label>	
                           <input type="text" class="form-control timepicker">
                           
                        </div>
                     </div>
                  </div>
               </div>
                     
               <div class="col-md-12">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>To</label>	
                           <input type="text" class="form-control datepicker">						  
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group ">
                           <label>&nbsp;</label>	
                            <input type="text" class="form-control timepicker">
                        </div>
                     </div>
                  </div>
               </div>
			   <div class="col-md-12">
                  <div class="form-group">
                     <label>Note To Staff</label>	
                     <textarea type="email" class="form-control"></textarea>			  
                  </div>
               </div>
            </div>
         </div>
         <div class="modal-footer text-right">
            <button type="button" class="btn btn-default save-cancel-btn" onclick="close_modal('.add-blocked-time')">Cancel</button>
            <button type="button" class="btn btn-default save-btn">Block</button>
         </div>
      </div>
   </div>
</div>

<div class="custom-modal-css modal fade bs-example-modal-lg add-service">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Add New Appointment</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
         </div>
         <div class="modal-body">
            <div class="row mt-2">
               <div class="col-md-12">
                  <div class="form-group redstar">
                     <label>Service</label>	
                     <input type="text" class="form-control">				  
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="form-group redstar">
                     <label>Staff Member</label>	
                     <select type="text" class="form-control">
                        <option></option>
                     </select>
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>From</label>	
                           <input type="text" class="form-control datepicker">						  
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group ">
                           <label>&nbsp;</label>	
                           <select type="text" class="form-control">
                              <option>No time available</option>
                           </select>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group redstar">
                           <label>Customer Name</label>	
                           <input type="text" class="form-control datepicker">						  
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group ">
                           <label>Phone</label>	
                           <input type="text" class="form-control">				 						   
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="form-group redstar">
                     <label>Email</label>	
                     <input type="email" class="form-control">			  
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="form-group">
                     <label>Note To Staff</label>	
                     <textarea type="email" class="form-control"></textarea>			  
                  </div>
               </div>
            </div>
         </div>
         <div class="modal-footer text-right">
            <button type="button" class="btn btn-default save-cancel-btn" onclick="close_modal('.add-service')">Cancel</button>
            <button type="button" class="btn btn-default save-btn">Create Appointment</button>
         </div>
      </div>
   </div>
</div>
<div class="custom-modal-css modal fade bs-example-modal-lg add-class">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Add New Class</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
         </div>
         <div class="modal-body">
            <div class="row mt-2">
               <div class="col-md-12">
                  <div class="form-group redstar">
                     <label>Choose a Class</label>	
                     <select type="text" class="form-control">	</select>			  
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group redstar"> 
                           <label>Assign Staff</label>	
                           <select type="text" class="form-control ">	</select>					  
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group ">
                           <label>Price</label>	
                           <input type="text" class="form-control no-border p-0" value="$15.00">	
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="row">
                     <div class="col-md-4">
                        <div class="form-group redstar">
                           <label>Day</label>	
                           <input type="text" class="form-control datepicker">						  
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group redstar">
                           <label>Time </label>	
                           <input type="text" class="form-control datepicker">						  
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group redstar">
                           <label>Max. Participants</label>	
                           <select type="text" class="form-control">
                              <option>No time available</option>
                           </select>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group redstar">
                           <label>Location</label>	
                           <p class="mt-2">
                              <input type="radio" name="location" class="location-radio"> My Place	
                           </p>
                           <p>							
                              <input type="radio" name="location" value="3" class="location-radio"> My Place	
                           </p>
                           <p>	
                              <input type="text" class="form-control other-address hide">
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
               
               <div class="col-md-12">
                  <div class="form-group">
                     <label>Note To Staff</label>	
                     <textarea type="email" class="form-control"></textarea>			  
                  </div>
               </div>
            </div>
         </div>
         <div class="modal-footer text-right">
            <button type="button" class="btn btn-default save-cancel-btn" onclick="close_modal('.add-service')">Cancel</button>
            <button type="button" class="btn btn-default save-btn">Create Appointment</button>
         </div>
      </div>
   </div>
</div>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?php echo base_url('plugins/moment/moment.js');?>"></script>
<script src="<?php echo base_url('plugins/fullcalendar/js/fullcalendar.min.js');?>"></script>
<script src="<?php echo base_url('assets/pages/jquery.fullcalendar.js');?>"></script>
<script src="<?php echo base_url('assets/custom/js/calender.js'); ?>"></script>