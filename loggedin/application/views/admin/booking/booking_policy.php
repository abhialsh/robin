<div class="content">
   <div class="container-fluid">
      <!-- Page-Title -->
      <div class="row main_heading_row">
         <div class="col-md-12 col-lg-12 col-xl-10">
            <h4 class="page-title">Booking Policy</h4>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
               <li class="breadcrumb-item active">Booking</li>
            </ol>
            <p>Explore these extra features to give your customers a great booking experienc</p>
         </div>
         <div class="col-md-12 col-lg-12 col-xl-2 text-right">
            <button type="button"   class="btn btn-primary save-cancel-btn m-l-5" onclick="redirect_url('<?php echo site_url('admin/booking/booking_option'); ?>')">cancel</button>
            <button type="button"   class="btn btn-primary publish-btn m-l-5">Save</button>
         </div>
      </div>
      <div class="row">
         <div class="col-12">
            <div class="card-box">
               <div class="row">
                  <div class="col-md-4 d-flex align-self-center">
                     <div class="mx-auto text-center">
                        <i class="fa fa-address-card-o  font-80 loggedin-color" aria-hidden="true"></i><br>	Cancellation Policy 
                     </div>
                  </div>
                  <div class="col-md-8">
                     <div class="form-row">
                        <div class="form-group  col-md-12">
                           <label for="inputEmail4" class="col-form-label"> 
                           Cancellation Policy (Optional) </label> <i class="fa fa-question-circle pointer" data-toggle="tooltip" data-placement="right" title="" data-original-title="Let people know what happens if they want to cancel or reschedule a service. This text will appear on the app before your customer completes a booking."></i>
                           <textarea type="text" class="form-control"  name="form_name"  required=""></textarea>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-12">
            <div class="card-box">
               <div class="row">
                  <div class="col-md-4 d-flex align-self-center">
                     <div class="mx-auto text-center">
                        <i class="fa fa-address-card-o  font-80 loggedin-color" aria-hidden="true"></i><br>	Booking Rules
                     </div>
                  </div>
                  <div class="col-md-8">
				   <div class="form-row">
                        <div class="form-group  col-md-12">
                           <label for="inputEmail4" class="col-form-label"> 
                           When can customers book? </label> <i class="fa fa-question-circle pointer" data-toggle="tooltip" data-placement="right" title="" data-original-title="Choose how far in advance customers can book a service."></i>                            
                        </div>
                     </div>
					 
                     <div class="form-row">
                        <div class="form-group  col-md-1">
                           <label for="inputEmail4" class="col-form-label"> 
                           upto </label>                       
                        </div>
                        <div class="form-group  col-md-2">
                           <input type="text" class="form-control">                     
                        </div>
                        <div class="form-group  col-md-1 ml-2">
                           <label for="inputEmail4" class="col-form-label"> 
                           Days </label>                       
                        </div>
                        <div class="form-group  col-md-2">
                           <select type="text" class="form-control"> </select>                    
                        </div>
                        <div class="form-group  col-md-5 ml-2">
                           <label for="inputEmail4" class="col-form-label"> 
                           hours before start time. </label>                       
                        </div>
                     </div>
                  <div class="form-row">
                        <div class="form-group  col-md-12">
                           <label for="inputEmail4" class="col-form-label"> 
                          <input type="checkbox" checked class="mr-2" onclick="$('.cancel-div').toggle()"> Allow customer to cancel on the app? </label> <i class="fa fa-question-circle pointer" data-toggle="tooltip" data-placement="right" title="" data-original-title="Customers can cancel services in the My Bookings section of the app."></i>                            
                        </div>
                     </div>
                     <div class="form-row cancel-div">
                        <div class="form-group  col-md-12">
                           <label for="inputEmail4" class="col-form-label"> 
                            When can customers cancel? </label> <i class="fa fa-question-circle pointer" data-toggle="tooltip" data-placement="right" title="" data-original-title="Customers can cancel services in the My Bookings section of the app."></i>                            
                        </div>
                     </div>
                     <div class="form-row cancel-div">
                        <div class="form-group  col-md-1">
                           <label for="inputEmail4" class="col-form-label"> 
                           upto </label>                       
                        </div>
                        <div class="form-group  col-md-2">
                           <input type="text" class="form-control">                     
                        </div>
                        <div class="form-group  col-md-1 ml-2">
                           <label for="inputEmail4" class="col-form-label"> 
                           Days </label>                       
                        </div>
                        <div class="form-group  col-md-2">
                           <select type="text" class="form-control"> </select>   
                        </div>
                        <div class="form-group  col-md-5 ml-2">
                           <label for="inputEmail4" class="col-form-label"> 
                           hours before start time. </label>                       
                        </div>
                     </div>
                  <div class="form-row">
                        <div class="form-group  col-md-12">
                           <label for="inputEmail4" class="col-form-label"> 
                            <input type="checkbox" checked class="mr-2" onclick="$('.reshedule_div').toggle()"> Allow customer to reschedule on the app? </label> <i class="fa fa-question-circle pointer" data-toggle="tooltip" data-placement="right" title="" data-original-title="Customers can reschedule services in the My Bookings section of the app."></i>                            
                        </div>
                     </div>
                     <div class="form-row reshedule_div">
                        <div class="form-group  col-md-12">
                           <label for="inputEmail4" class="col-form-label"> 
                           When can customers reschedule? </label> <i class="fa fa-question-circle pointer" data-toggle="tooltip" data-placement="right" title="" data-original-title="Customers can reschedule services in the My Bookings section of the app"></i>                            
                        </div>
                     </div>
                     <div class="form-row reshedule_div">
                        <div class="form-group  col-md-1">
                           <label for="inputEmail4" class="col-form-label"> 
                           upto </label>                       
                        </div>
                        <div class="form-group  col-md-2">
                           <input type="text" class="form-control">                     
                        </div>
                        <div class="form-group  col-md-1 ml-2">
                           <label for="inputEmail4" class="col-form-label"> 
                           Days </label>                       
                        </div>
                        <div class="form-group  col-md-2">
                          <select type="text" class="form-control"> </select>          
                        </div>
                        <div class="form-group  col-md-5 ml-2">
                           <label for="inputEmail4" class="col-form-label"> 
                           hours before start time. </label>                       
                        </div>
                     </div>
                
				  
				  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-12">
            <div class="pull-right m-t-15">
               <button type="button"   class="btn btn-primary save-cancel-btn m-l-5" onclick="redirect_url('<?php echo site_url('admin/booking/booking_option'); ?>')">cancel</button>
               <button type="button"   class="btn btn-primary publish-btn m-l-5">Save</button>
            </div>
         </div>
      </div>
   </div>
   <!-- container -->
</div>