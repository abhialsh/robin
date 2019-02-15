
<?php
$ss_user_id =   $admin_id = $this->session->userdata['admin']['id'];
$photo_class = 'https://image.ibb.co/eGOGQc/plus.png';

if (isset($details) && $details) {
    $mode = "manageClass";
    $txt = "Manage";
    $bxt = "Update Product";
    $req = '';
    extract($details);
//    echo '<pre>';
//    print_r($details);
//    echo '</pre>';

    $category_name = $details['category_name'];

    $booking_btwn_status = '';
    if ($always_allow == 1) {
        $booking_btwn_status = 'disabled';
    }
    if ($photo == '' || $photo == null) {
        $photo_class = 'https://image.ibb.co/eGOGQc/plus.png';
    } else {
        $photo_class = ADMIN_URL . 'new-booking/class_thumb/' . $photo . '"';
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
    $image_label = "Edit Photo";

} else {

    $mode = "setNewclass";
    $txt = "Add New";
    $bxt = "Save"; //"Create Product";
    $image_label = "Add Photo";
    $id = '';
    $name = '';
    $category = '';
    $tagline = '';
    $description = '';
    $staff_id = '';
    $service_duration_hours = '';
    $service_duration_min = '';
    $break_time = '';
    $booking_avail_between = '';
    $service_type = 'Paid';
    $accept_payment_method = '';
    $price = '';
    $currency = '';
    $request_deposit = '';
    $location = 'My Place';
    $max_participant = '';
    $book_upto = '';
    $schedule = '';
    $photo = '';
    $status = '';
    $added_on = '';
    $added_by = '';
    $custmize = ''; //02/27/2018
    $from_date = date('m/d/Y');
    $to_date = $end = date('m/d/Y', strtotime('+1 years'));
    $category_name = '';
    $photo = '';
    $always_allow = 1;
    $booking_btwn_status = 'disabled';
}
?> 


<div class="content new_appoinment_add cls-bus-service">
      <form  action ="<?php echo site_url() ?>/admin/booking/manage_class"   enctype="multipart/form-data" method="post" id="bookingForm" novalidate="novalidate">
        <!-- Page-Title -->
    <div class="container-fluid">
        payment_message();
          <input type="hidden" name="class_id" value="<?php echo $id; ?>" /> 
           <input type="hidden"  id="StClass"  name ="status" value=""  required/> 
        <!-- Page-Title -->
        <div class="row main_heading_row">
            <div class="col-md-12 col-lg-12 col-xl-7">
                <h4 class="page-title">Class</h4>
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
                                        <input type="text" name="service_name" value="<?php echo $name; ?>" id="" tabindex="2" class="form-control" placeholder="ex. Beginner  Yoga - Studio 1" required>
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
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <label> Type of Service </label>
                                    <select class="form-control service-type-select"   name="type_of_service">
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
                                <input type="text" class="form-control price-input numerical_value" required>
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
                            <input type="radio" name="location" checked value="1" class="mr-2 service_palace"> <label>My Place</label>
                        </div>
                    </div>
                    <div  class="row">
                        <div class="col-md-12">
                            <input type="radio" value="3" name="location" class="mr-2 service_palace"> <label>Other</label>
                            <input type="text" class="form-control hide  other-service-address" placeholder="ex. In the park">
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
                            <div class="form-group redstar">  
                                <label> Max. Participants </label>
                                <input type="text" placeholder="Ex. 20" class="form-control numerical_value" >
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-row cancel-div">
                                <div class="form-group  col-md-3 redstar">
                                    <label for="inputEmail4" class="col-form-label"> 
                                        Customers can book up to </label>                       
                                </div>
                                <div class="form-group  col-md-1">
                                    <input type="text" class="form-control">                     
                                </div>
                                <div class="form-group  col-md-7 ml-5">
                                    <label for="inputEmail4" class="col-form-label"> 
                                        Participant(s) per reservation </label>                       
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
                                    <label> Duration</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group redstar">                       
                                        <input type="" class="form-control" value="0"	>
                                        Hours
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group redstar">                        
                                        <input type="" class="form-control" value="0"	>
                                        Minutes
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-12 redstar">
                                    <label class="">Service Available for Booking Between</label>
                                    <div class="row allow-input-feild">
                                        <div class="col-md-6">
                                            <div class="form-group redstar">                  
                                                <input type="" class="form-control" value="0" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group redstar">                  
                                                <input type="" class="form-control" value="0" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="checkbox" checked class="allow_enable"> Allow service to always be available.
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
            <div class="col-12">
                <div class="card-box redstar">
                    <label> Working Hours </label>
                    <div class="row">
                        <div class="col-12">
                            <div class="mt-3">
<?php for ($j = 0; $j < 7; $j++) { ?>
                                    <span class="class-shedule-area-span">
                                        <div class="form-row day-shedule-area">
                                            <div class="form-group col-md-2">
                                                <button class="btn btn-default">Monday</button>
                                            </div>
                                            <div class="form-group col-md-1">
                                                <input type="checkbox" checked="" data-plugin="switchery" data-color="#5fbeaa" data-switchery="true" data-size="small" class="hide checkbox">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" class="form-control timepicker" >
                                            </div>
                                            <div class="form-group col-md-2 text-center">
                                                - No Duration
                                            </div>
                                            <div class="form-group col-md-2 drop-down-pop-div">
                                                <input type="text" class="form-control open-drop-down" placeholder="Select staff" readonly>
                                                <div class="drop-down-popup dropdown-menu dropdown-menu-left   dropdown-arrow dropdown-lg dropdon-for-staff" aria-labelledby="Preview">
                                                    <!-- item-->
                                                    <div class="drop-down-list">
    <?php for ($i = 0; $i <= 10; $i++) { ?>
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
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" > 							 
                                                            </div>
                                                            <div class="col-md-6 mt-3 mt-lg-0">								 
                                                                <button class="btn btn-primary publish-btn">Save</button>	<button class="cancel-pop-items btn save-cancel-btn cancel-with-border">Cancel</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
            <div class="col-sm-12">
                <div class="pull-right m-t-15">
                    <button type="button"  class="btn btn-primary save-cancel-btn">Save</button>
                    <button type="button" class="btn btn-primary publish-btn m-l-5">Publish</button>
                </div>
            </div>
        </div>
    </div>
      </form>
</div>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?php echo base_url('assets/custom/js/booking.js'); ?>"></script>