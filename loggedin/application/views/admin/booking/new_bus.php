<div class="content new_appoinment_add bus-page">
<div class="container-fluid">
<!-- Page-Title -->
<div class="row main_heading_row">
   <div class="col-md-12 col-lg-12 col-xl-7">
      <h4 class="page-title">Appointment</h4>
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
         <li class="breadcrumb-item active">Booking</li>
      </ol>
   </div>
   <div class="col-md-12 col-lg-12 col-xl-5 text-right">
      <button type="button" class="btn btn-primary save-cancel-btn m-l-5" onclick="redirect_url('<?php echo site_url('admin/booking/staff_list'); ?>')">Save</button>
      <button type="button" class="btn btn-primary publish-btn m-l-5">Publish</button>
   </div>
</div>
<div class="row">
   <div class="col-md-12">
      <div class="card-box">
         <div class="row">
            <div class="col-md-12">
               <div class="row">
                  <div class="col-md-12">
                     <div class="form-group redstar">
                        <label>Name Your Service</label>
                        <input type="text" placeholder="ex. Kid's Haircut" class="form-control" required>
                     </div>
                     <div class="form-group redstar drop-down-pop-div">
                        <label>Category</label>
                        <input type="text" placeholder="ex. Haircuts"  class="form-control  open-drop-down" required>
                        <div class="drop-down-popup dropdown-menu dropdown-menu-left w-50 dropdown-arrow dropdown-lg dropdon-for-category" aria-labelledby="Preview">
                           <!-- item-->
                           <div class="drop-down-list">
                              <?php for($i=0; $i <=10 ; $i++) { ?>
                              <a href="javascript:void(0);" class="dropdown-get-item dropdown-item notify-item">
                              Robert S. Taylor commented on Admin  
                              </a>
                              <?php } ?>
                           </div>
                           <!-- All-->
                           <div class="footer pl-0 w-100">
                              <a href="javascript:void(0);" class="ml-4 add-dropdown-item">
                              + Add New
                              </a>
                              <div class="row pl-2 pl-2 dropdown-add-area hide">
                                 <div class="col-md-7">
                                    <input type="text" class="form-control"> 							 
                                 </div>
                                 <div class="col-md-5 mt-3 mt-lg-0">								 
                                    <button class="btn btn-primary publish-btn">Save</button>	<button class="cancel-pop-items btn save-cancel-btn cancel-with-border">Cancel</button>								 
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12">
               <div class="form-group">
                  <label>Add Description</label> <label class="pull-right"><span class="char-counter">0</span>/500</label>
                  <textarea type="text" rows="4" class="form-control textarea-char-counter" placeholder="What's great about this service? Write a short and catchy description to grab your audience's attention."></textarea>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="row">
   <div class="col-md-12">
      <div class="card-box">
         <div class="row">
            <div class="col-md-6">
               <div class="row">
                  <div class="col-md-12">
                     <label>Service Duration</label>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group redstar">                       
                        <input type="" class="form-control" value="0">
                        Hours
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group redstar">                        
                        <input type="" class="form-control" value="0">
                        Minutes
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="row">
   <div class="col-md-12">
      <div class="card-box">
         <div class="row">
            <div class="col-md-12">
               <div class="row">
                  <div class="col-md-6">
                     <label> Type of Service </label>
                     <select class="form-control service-type-select" name="type_of_service">
                        <option value="0"> Free </option>
                        <option value="1" selected=""> Paid </option>
                        <option value="2"> Prices Vary </option>
                        <option value="3"> Leave Blank </option>
                     </select>
                  </div>
                  <div class="col-md-6 accept-pay-div">
                     <label> Accept Payment </label>
                     <select class="form-control">
                        <option value="Online Payment"> On My App </option>
                        <option value="Offline Payment"> In person </option>
                        <option value="Deposit"> Both </option>
                     </select>
                  </div>
               </div>
            </div>
         </div>
         <div class="row pt-2 price-div">
            <div class="col-md-12 redstar">
               <label> Price </label>
               <div class="input-group col-sm-2 pl-0 pr-0">
                  <div class="input-group-prepend">
                     <span class="input-group-text" id="basic-addon1">$</span>
                  </div>
                  <input type="text" class="form-control price-input" required="">
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="row">
   <div class="col-md-12">
      <div class="card-box">
         <div class="row">
            <div class="col-md-12">
               <div class="row">
                  <div class="col-md-6 redstar">
                     <label>Amount of seats on this bus</label><input type="text" class="form-control"> 
                  </div>
               </div>
               <div class="row mt-4">
                  <div class="col-md-12 col-lg-12 col-xl-3">
                     <label>Customers can book up to</label>
                  </div>
                  <div class="col-md-12 col-lg-12 col-xl-3">
                     <input type="text" class="form-control">
                  </div>
                  <div class="col-md-12 col-lg-12 col-xl-5 sm-mt-2">
                     <label>participant(s) per reservation</label>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6 redstar mt-3">
                     <label>Location</label>
                     <input type="text" class="form-control" id="auto_address">  
                     <input type="hidden" class="form-control" id="latitude">  
                     <input type="hidden" class="form-control" id="longitude">  
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="row timeshdeuler">
   <div class="col-12">
      <div class="card-box redstar">
         <label> Time Schedule  </label>
         <div class="row">
            <div class="col-12">
               <div class="mt-3">
                  <?php for($j=0; $j<7 ; $j++){ ?>
                  <span class="bus-shedule-area-span">
                     <div class="form-row bus-day-shedule-area">
                        <div class="form-group col-md-2">
                           <button class="btn btn-default">Monday</button>
                        </div>
                        <div class="form-group col-md-1">
                           <input type="checkbox"   data-plugin="switchery" data-color="#5fbeaa" data-switchery="true" data-size="small" class="hide checkbox">
                        </div>
                        <div class="form-group col-md-2">
                           <input type="text" class="form-control timepicker" >
                        </div>
                        <div class="form-group col-md-2">
                           <i class="fa fa-plus mt-2  ml-lg-3 pointer add-more-timeshedule loggedin-color"></i>
                        </div>
                     </div>
                  </span>
                  <?php } ?>
               </div>
            </div>
         </div>
         <!-- end row -->
      </div>
      <!-- end card-box -->
   </div>
   <!-- end col -->
</div>
<div class="row">
   <div class="col-12">
      <div class="card-box redstar">
         <div class="row mt-1">
            <div class="col-12 add_aditional_stop">
               <a href="javascript:void(0)"  ><i class="fa fa-plus loggedin-color"></i> Add Additional Stops</a>
            </div>
         </div>
         <span class="aditional_stoparea"></span>
         <!-- end row -->
      </div>
      <!-- end card-box -->
   </div>
   <!-- end col -->
</div>
<div class="row"> 
   <div class="col-md-12">
      <div class="card-box ">
         <div class="row mt-1">
            <div class="col-md-12 add_custom_date">
               <a href="javascript:void(0)"  ><i class="fa fa-plus loggedin-color"></i> Add Custom Date</a>
            </div>
         </div>
		 <span class="more_custom_date">
		 </span>
             <!-- end row -->
            </div>
            <!-- end card-box -->
         </div>
         <!-- end col -->
      </div>
      <div class="row">
         <div class="col-sm-12">
            <div class="pull-right m-t-15">
               <button type="button"  class="btn btn-primary save-cancel-btn">Save</button>
               <button type="button" class="btn btn-primary publish-btn m-l-5">Publish</button>
            </div>
         </div>
      </div>
   </div>
</div>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>		
<script src="<?php echo base_url('assets/custom/js/booking.js'); ?>"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyANnatdMrgEcUnbDBAijOx_PHax0Z3MQTo&libraries=places&callback=initialize" async defer></script>
<script src="<?php echo base_url('assets/custom/js/google.js'); ?>"></script>