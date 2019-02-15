<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (isset($details) && $details) {
//  echo '<pre>';  print_r($details); echo '</pre>';
    extract($details);
    if ($always_allow == 1) {
        $booking_btwn_status = 'disabled';
    }
    if (!is_numeric($from_date)) {
        $from_date = strtotime($from_date);
    }
    if ($from_date) {
        $from_date = date('m/d/Y', $from_date);
    } else {
        $from_date = '';
    }
    if (!is_numeric($to_date)) {
        $to_date = strtotime($to_date);
    }
    if ($to_date) {
        $to_date = date('m/d/Y', $to_date);
    } else {
        $to_date = '';
    }
    $fb_formdata = $details['fb_form_data'];

    if ($fb_formdata == '[]') {
        $fb_formdata = '';
    }


    if ($request_deposit == 0) {
        $request_deposit = '';
    }
    
    $image_label = "Edit Photo";
    
} else {

    $id =  $category_name = $fb_formdata ='';
    $name = $category = $tagline = $description = $staff_id = '';
    $custmize = $service_duration_min = $service_duration_hours = '';
    $break_time = $booking_avail_between = '';
    $accept_payment_method = $price = $currency = $request_deposit = '';
    $location = $max_participant = '';
    $book_upto = $schedule = $photo = '';
    $service_type = 'Paid';
    $image_label = "Add Photo";
    $from_date = '';
    $to_date = $end = '';
    $always_allow = 1;
    $booking_btwn_status = 'disabled';
}
if ($photo == '') {
    $image = "https://image.ibb.co/eGOGQc/plus.png";
} else {
    $image = ADMIN_URL . "new-booking/service_thumb/" . $photo;
}


$stripe_details;
 $makwahEnable ;      
        
?>
<div class="content new_appoinment_add">
    <div class="container-fluid">
          payment_message();
         <form  action ="<?php echo site_url() ?>/admin/booking/manage_appoinment"   enctype="multipart/form-data" method="post" id="bookingForm" novalidate="novalidate">
        <!-- Page-Title -->
        <div class="row main_heading_row">
            <div class="col-md-12 col-lg-12 col-xl-9">
                <h4 class="page-title">Appointment</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Booking</li>
                </ol>
            </div>
          
              <div class="col-md-12 col-lg-12 col-xl-3 text-right">
                <button type="submit"   class="btn btn-primary save-cancel-btn " onclick="bookingSubmit('0')" >Save</button>	
                <button type="submit" class="btn btn-primary  waves-effect waves-light save-btn m-l-5"  onclick="bookingSubmit('1')">Publish</button> 
                <?php if (isset($id) && $id) { ?>
                    <button type="button" class="btn btn-danger danger-delete-btn m-l-5"  onclick="ApartDelete('<?php echo $id; ?>');">Delete</button> 
                <?php } ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group redstar">
                                        <label>Name Your Service</label>
                                        <input type="text" placeholder="ex. Kid's Haircut"  name="service_name" value="<?php echo $name; ?>"  class="form-control" required>
                                    </div>
                                    
                                         <div class="drop-down-pop-div form-group redstar position-relative">
                                        <label>Category</label>
                                           <input type="hidden" value="<?php echo $category; ?>"  id="category_id" class="dropbtn form-control" name="category_id"> 
                                        <input type="text" placeholder="ex. Haircuts" value="<?php echo $category_name; ?>" class="form-control open-drop-down" required="" readonly="">
                                        <div class="drop-down-popup dropdown-menu dropdown-menu-left w-50 dropdown-arrow dropdown-lg dropdon-for-category" aria-labelledby="Preview">
                                            <!-- item-->
                                            <div class="drop-down-list">
                                 <?php 
                                 
                                 //    print_r($category_list);
                                  foreach ($category_list as $category) { // echo '<pre>'; print_r($category); ?>
                                                 
                                                    <a href="javascript:void(0);" class="dropdown-get-item dropdown-item notify-item">
                                                      <?php echo  $category['name']; //id?>  
                                                    </a>
                                        <?php } 
                               /*  for ($i = 0; $i <= 10; $i++) { ?>
                                                    <a href="javascript:void(0);" class="dropdown-get-item dropdown-item notify-item">
                                                        Robert S. Taylor commented on Admin  
                                                    </a>
                                        <?php }*/ ?>
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
                                <div class="col-md-2">
                                    <div class="form-group ">
                                        <center>
                                            <div class="img-140 profile-appointment">
                                                <img class="card-img-top img-fluid  mt-2 pointer"  src="https://profiles.utdallas.edu/img/default.png" alt="Card image cap">
                                                <label class="loggedin-color apt-prf-label"><a href="javascript:void(0)">+ Add Image</a></label>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Add Description</label> <label class="pull-right"><span class="char-counter">0</span>/500</label>
                                <textarea   name="add_description" type="text" rows="4" class="form-control textarea-char-counter" placeholder="What's great about this service? Write a short and catchy description to grab your audience's attention."><?php echo $description; ?> </textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <div class="row mb-2">
                        <div class="col-md-12 redstar">
                            <label>Select Staff</label>        
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input type="checkbox"  id="allstaff" class="mr-2"> <label>All Staff</label>  
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="row" id="append_checkbox">
                                        <?php //print_r($staff_list);
                                         foreach ($staff_list as $staff) {
                                          $ar_staff = explode(',', $staff_id); 
                                           //print_r($ar_staff);
                                          $checked= '';
                                          if(in_array($staff['id'], $ar_staff)){
                                             $checked = "checked";
                                          }
                                        ?>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="checkbox" required name="staff[]"  <?php echo $checked; ?>  value="<?php echo $staff['id'] ?>">
                                                <label><?php echo $staff['name'] ?></label>  
                                            </div>
                                        </div>
                                         <?php  } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 staff-add-link">
                            <a href="javascript:void(0)">+ Add Staff Member</a>  
                            <div class="row staff_list-apt hide">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" id="new_staff" class="form-control" placeholder="Staff Name">    
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group text-left">
                                        <button type="button"  id="add_staff_submit" class="btn btn-primary save-btn">Save</button> 
                                        <button type="button" class="cancel-staff-list btn btn-primary save-cancel-btn cancel-with-border">Cancel</button> 
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
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Service Duration</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group redstar">                       
                                          <input type="number" min="0" max="99" id="tahours"  oninput="validity.valid||(value='');"  class="form-control" name="time" placeholder="0" value="<?php echo $service_duration_hours; ?>" required>  
                                        Hours
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group redstar">                        
                                         <input type="number" min="0" id="taminutes"  max="59" oninput="validity.valid||(value='');"  class="form-control" name="time1" placeholder="0" value="<?php echo $service_duration_min; ?>" required>
                                        Minutes
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group redstar">
                                <label class="">Time Between Appointments</label>
<!--                                <input type="" class="form-control" value="0"	>-->
                                 <select class="form-control" name="time_between">
                                            <option label="0 min" value="number:0" selected="selected">0 min
                                            </option>
                                            <?php for ($k = 5; $k <= 60; $k = $k + 5) {
                                                ?>
                                                <option   value="<?php echo $k; ?>" 
                                                <?php
                                                if ($booking_avail_between == $k) {
                                                    echo "selected";
                                                }
                                                ?>>
                                                    <?php echo $k; ?> min
                                                </option>
                                            <?php } ?>
                                        </select>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-12 redstar">
                                    <label class="">Service Available for Booking Between</label>
                                    <div class="row allow-input-feild">
                                        <div class="col-md-6">
                                            <div class="form-group redstar">                  
<!--                                                <input type="" class="form-control" value="0" disabled>-->
                                                    <input type="text" class="form-control datepicker from_date_range" name="date1" value="<?php echo $from_date; ?>" required <?php echo $booking_btwn_status;?>>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group redstar">                  
<!--                                                <input type="" class="form-control" value="0" disabled>-->
                                                  <input type="text" class="form-control datepicker to_date_range" name="date2" value="<?php echo $to_date; ?>" required <?php echo $booking_btwn_status;?>>
                                                  <span id="error_range" style="color: rgb(153, 0, 0); margin-left: 10px;"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="checkbox" value="1"  class="allow_enable" name ="always_allow" <?php if($always_allow ==1){echo 'checked'; }?>>
<!--                                            <input type="checkbox" checked class="allow_enable"> -->
                                            Allow service to always be available.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            Set your general <a href="<?php echo site_url('admin/booking/set_availability'); ?>">booking hours</a>
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
                                            <option value="Free" <?php if ( $service_type == "Free") { echo "selected"; }?> > Free  </option>
                                            <option value="Paid" <?php if ($service_type == "Paid") {echo "selected"; }?> > Paid  </option>
                                            <option value="Prices Vary" <?php if ($service_type == "Prices Vary") { echo "selected";  } ?> > Prices Vary   </option>
                                            <option value="Leave Blank" <?php if ($service_type == "Leave Blank") {echo "selected";}?> > Leave Blank   </option>
                                        </select>
<!--                                    <select class="form-control service-type-select"   name="type_of_service">
                                        <option value="0"> Free </option>
                                        <option value="1" selected=""> Paid </option>
                                        <option value="2"> Prices Vary </option>
                                        <option value="3"> Leave Blank </option>
                                    </select>-->
                                </div>
                                <div class="col-md-6 accept-pay-div">
                                    <label> Accept Payment </label>
                                      <select class="form-control" id="accept_payment" name="accept_payment">
                                            <option value="Online Payment" 
                                            <?php
                                            if ($accept_payment_method == "Online Payment") {
                                                echo "selected";
                                            }
                                            ?> > On My App  
                                            </option>
                                            <option value="Offline Payment" 
                                            <?php
                                            if ($accept_payment_method == "Offline Payment") {
                                                echo "selected";
                                            }
                                            ?>> In person  
                                            </option>
                                            <option value="Deposit" 
                                            <?php
                                            if ($accept_payment_method == "Deposit") {
                                                echo "selected";
                                            }
                                            ?>> Both  
                                            </option>
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
                                  <input value="<?php echo $price; ?>" class="form-control price-input float"  type="text" placeholder="Price"  name="price"  />
                               
                            </div>
                        </div>
                    </diV>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <div  class="row">
                        <div class="col-md-12 redstar">
                            <label>Location</label>
                        </div>
                    </div>
                    <div  class="row mt-3">
                        <div class="col-md-12">
                            <input type="radio"   <?php
                                if ($location == "Customers Place") {
                                    echo "checked";
                                }
                                ?>    name="location" checked  value="My Place" class="mr-2 service_palace"> <label>My Place</label>
                        </div>
                    </div>
                    <div  class="row">
                        <div class="col-md-12">
                            <input type="radio"  <?php
                                if ($location == "Customers Place") {
                                    echo "checked";
                                }
                                ?>  value="2" name="location"   value="Customers Place" class="mr-2 service_palace"> <label> Customer's Place</label>
                        </div>
                    </div>
                    <div  class="row">
                        <div class="col-md-12">
                            <input type="radio"  value="other"  name="location" class="mr-2 service_palace"   <?php
                                if ($location != "Customers Place" && $location != "My Place" && $location) {
                                    echo "checked";
                                }
                                $location_address = '';
                                if ($location != "Customers Place" && $location != "My Place" && $location) {
                                    $location_address = $location;
                                }
                                ?>> <label>Other</label>
                            <input type="text" value="<?php echo $location_address; ?>" class="form-control hide  other-service-address" placeholder="ex. In the park">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <div  class="row">
                        <div class="col-md-12">
                            <label>Form</label>				  
                        </div>
                    </div>
                    <div  class="row pt-2">
                        <div class="col-md-12">
                            <button type="button" class="btn save-btn waves-effect waves-light add-form">
                                <span class="btn-label"><i class="fa fa-plus"></i>
                                </span>Add Form</button>	
                            <button type="button" class="btn save-btn waves-effect waves-light close-form hide">
                                <span class="btn-label"><i class="fa fa-close"></i>
                                </span>Close Form</button>					 
                        </div>
                    </div>
                    <div class="row mt-4 form-div form-build-hide">
                        <div class="col-md-12">
                              <textarea class="form-control hide" name ="fb_formdata" rows="5" id="fb_formdata" ><?php echo $fb_formdata; ?></textarea>
                            <div class="build-wrap"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="pull-right m-t-15">
                       <input type="hidden" name="apt_id" value="<?php echo $id; ?>"/>
                       <input type="hidden" id="booking_status"  name="status" value="1"/>
                    
                    <button type="button"  class="btn btn-primary save-cancel-btn"  onclick="bookingSubmit('0')">Save</button>
                    <button type="button"  class="btn btn-primary publish-btn m-l-5"  onclick="bookingSubmit('1')">Publish</button>
                </div>
            </div>
        </div>
         </form>
    </div>
</div>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?php echo base_url('assets/custom/js/booking.js'); ?>"></script>
<script src="<?php echo base_url('assets/formBuilder/'); ?>assets/js/vendor.js"></script>
<script src="<?php echo base_url('assets/formBuilder/'); ?>assets/js/form-builder.min.js"></script>
<script src="<?php echo base_url('assets/formBuilder/'); ?>assets/js/form-render.min.js"></script>
<script src="<?php echo base_url(); ?>assets/custom/js/formbuilder.js"></script>