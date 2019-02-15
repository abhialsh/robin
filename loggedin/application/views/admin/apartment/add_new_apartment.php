<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (isset($details) && $details) {
    ///echo '<pre>'; print_R($details);  echo '</pre>';
    extract($details);
    $check_in_time;
    $check_out_time;
    $check_in_time = date("H:i A", intval($check_in_time));
    $check_out_time = date("H:i A", intval($check_out_time));
    
} else {
    $id='';
    $check_in_time = "10:00 AM";
    $check_out_time = "12:00 PM";
    $short_description = $cleaning_fee = $service_fee = $occupancy_taxes_fees = '';
    $contact_no = $address_line1 = $location = $latitude = $longitude =$room_description =  '';
    $nos_guest = $nos_of_children = $nos_of_adults = $nos_of_infants = $nos_bedroom = '';
    $nos_beds = $nos_bath = $amenities = $family_amenities = $house_rule =$accessability ='';
    $cancellations = $sleeping_arrange = $price  = $name = '' ;

}

$amenities_arr_list = array(
    'Elevator' => 'Elevator',
    'Washer' => 'Washer',
    'Pets allowed' => 'Pets allowed',
    'Suitable for events' => 'Suitable for events',
    'Free parking on premises' => 'Free parking on premises',
    'Smoking allowed' => 'Smoking allowed',
    'Cable TV' => 'Cable TV',
    'Breakfast' => 'Breakfast',
    'Gym' => 'Gym',
    'Laptop friendly workspace' => 'Laptop friendly workspace',
    'Family/kid friendly' => 'Family or kid friendly',
    'Heating' => 'Heating',
    'Wheelchair accessible' => 'Wheelchair accessible',
    'Iron' => 'Iron',
    'Indoor fireplace' => 'Indoor fireplace',
    'Hangers' => 'Hangers',
    'Private entrance' => 'Private entrance',
    'Pool' => 'Pool',
    'Buzzer/wireless intercom' => 'Buzzer_wireless intercom',
    'Wireless Internet' => 'Wireless Internet',
    'TV' => 'TV',
    'Doorman' => 'Doorman',
    'Hair dryer' => 'Hair dryer',
    'Dryer' => 'Dryer',
    'Essentials' => 'Essentials',
);

$family_amenities_list = array(
    'Baby bath' => 'Baby bath',
    'Game console' => 'Game console',
    'Baby monitor' => 'Baby monitor',
    'High chair' => 'High chair',
    'Babysitter recommendations' => 'Babysitter recommendations',
    'Room-darkening shades' => 'Room-darkening shades',
    'Childrens books and toys' => 'Childrens books and toys',
    'Stair gates' => 'Stair gates',
    'Childrens dinnerware' => 'Childrens dinnerware',
    'Table corner guards' => 'Table corner guards',
    'Crib' => 'Crib',
    'Window guards' => 'Window guards',
    'Outlet covers' => 'Outlet covers',
    'Bathtub' => 'Bathtub',
    'Play or travel crib' => 'Play or travel crib',
    'Changing table' => 'Changing table',
    'Fireplace guards' => 'Fireplace guards',
);
  $sleeping_arrange = explode(",", $sleeping_arrange);
    $Amenities_arr = explode(",", $amenities);
?>

<div class="content">
    <div class="container-fluid">
        <!-- Page-Title -->
         <form  action ="<?php echo site_url() ?>/admin/Apartment/manage"   enctype="multipart/form-data" method="post" id="rentalForm" novalidate="novalidate">
        <div class="row main_heading_row">
            <div class="col-md-12 col-lg-12 col-xl-6">
                <h4 class="page-title">Add New Apartment</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Apartment</li>
                </ol>
            </div>
            <div class="col-md-12 col-lg-12 col-xl-3 text-right">
                <button type="submit"   class="btn btn-primary save-cancel-btn " onclick="aptSubmit('0')" >Save</button>	
                <button type="submit" class="btn btn-primary  waves-effect waves-light save-btn m-l-5"  onclick="aptSubmit('1')">Publish</button> 
                <?php if (isset($id) && $id) { ?>
                    <button type="button" class="btn btn-danger danger-delete-btn m-l-5"  onclick="ApartDelete('<?php echo $id; ?>');">Delete</button> 
                <?php } ?>
            </div>
        </div>
     
       
            <!-- Page-Title-end-->
            <!-- row-for-About Property-->
            <div class="row">
            <span id="apt_res" class="col-md-12 col-lg-12 col-xl-9"  ></span>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xl-9">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title">About Property</h4>
                        <div class="row">
                            <div class="col-12">
                                <div class="p-20 p-l-0 p-r-0">
                                    <div class="form-row">
                                        <div class="form-group redstar col-md-12">
                                            <label for="inputEmail4" class="col-form-label red_star">Property Name</label>
                                            <input type="text" name="name" class="form-control mt-2"  value="<?php echo $name; ?>" required> 
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputEmail4" class="col-form-label red_star">Short Description  </label>
                                            <input type="text" name="short_description" class="form-control mt-2" value="<?php
                                                if (is_base64($short_description))
                                                    echo base64_decode($short_description);
                                                else
                                                    echo $short_description;
                                                ?>" placeholder="Short Description" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12 redstar">
                                            <label for="inputEmail4" class="col-form-label red_star">Price  </label>
                                            <div class="input-group col-sm-12 pl-0 pr-0 mt-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" >$</span>
                                                </div>
                                                 <input type="text" name="price" class="form-control"  value="<?php echo $price; ?>" required> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputEmail4" class="col-form-label red_star">Cleaning Fee  </label>
                                            <div class="input-group col-sm-12 pl-0 pr-0 mt-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">$</span>
                                                </div>
                                                <input type="text" name="cleaning_fee" class="form-control " value="<?php echo $cleaning_fee; ?>"   placeholder="Cleaning fee">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputEmail4" class="col-form-label red_star">Service Fee  </label>
                                            <div class="input-group col-sm-12 pl-0 pr-0 mt-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" >$</span>
                                                </div>
<!--                                                <input type="text" class="form-control" placeholder="Service Fee">-->
                                                <input type="text" name="service_fee" class="form-control " value="<?php echo $service_fee; ?>"   placeholder="Service fee"> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputEmail4" class="col-form-label red_star ">Occupancy taxes and fees ( % )</label>
<!--                                            <input type="text" class="form-control mt-2" placeholder="Occupancy taxes and fees ( % )">-->
                                            <input type="text" name="occupancy_taxes_fees" class="form-control  mt-2 float" value="<?php echo $occupancy_taxes_fees; ?>"   placeholder="Occupancy taxes and fees ( % )"> 
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputEmail4" class="col-form-label red_star ">Contact Number </label>
<!--                                            <input type="text" class="form-control mt-2" placeholder="Contact Number">-->
                                            <input type="text" name="contact_no" id="number" minlength="8" maxlength="14"  value="<?php echo $contact_no; ?>" class="form-control  mt-2 contact_no" placeholder="Contact Number"> 

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end card-box -->
                </div>
                <!-- end col -->
            </div>
            <!-- row-for-About Property-end-->    
            <!-- row-for-Address-end--> 
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xl-9">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title">Address</h4>
                        <div class="row">
                            <div class="col-12">
                                <div class="p-20 p-l-0 p-r-0">
                                    <div class="form-row">
                                        <div class="form-group redstar col-md-12">
                                            <label for="inputEmail4" class="col-form-label red_star">Address</label>
<!--                                            <input type="text" class="form-control mt-2" placeholder="Address">-->
                                            <input type="text"   name="location"  id="auto_address" required="" class="form-control  mt-2" value="<?php
                                            if ($address_line1)
                                                echo $address_line1;
//                                                    if ($location)
//                                                        echo $location;
                ?>"  placeholder="Address">
                                            <input type="hidden" class="latitude" id="latitude" name="latitude" value ="<?php echo $latitude ?>" >
                                            <input type="hidden" class="longitude" id="longitude" name="longitude" value="<?php echo $longitude ?>" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end card-box -->
                </div>
                <!-- end col -->
            </div>
            <!-- row-for-Address-end-->     
            <!-- row-for-Room Description-start-->     
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xl-9">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title">Room Description</h4>
                        <div class="row">
                            <div class="col-12">
                                <div class="p-20 p-l-0 p-r-0">
                                    <div class="form-row">
                                        <div class="form-group redstar col-md-12">
                                            <label for="inputEmail4" class="col-form-label red_star ">Room Description</label>
<!--                                            <textarea type="text" class="form-control mt-2" placeholder="Room Description"></textarea>-->
                                            <textarea class="form-control  mt-2" name="room_description" rows="4"><?php echo $room_description; ?></textarea>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end card-box -->
                </div>
                <!-- end col -->
            </div>
            <!-- row-for-Room Description-end-->
            <!-- row-for-RUpload Image-start-->
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xl-9">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title">Upload Image</h4>
                        <div class="row">
                            <div class="col-12">
                                <div class="p-20 p-l-0 p-r-0">
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label class="control-label">Upload Image</label>
                                            <span id="resajimg"></span>

                                            <?php
                                          ///  echo '<pre>';  print_R($apt_images); echo'</pre>';
                                            if (isset($id) && $id && $apt_images) {

                                               

                                                foreach ($apt_images as $data) {
                                                 //   print_R($data);
                                                    ?>
                                                    
                                                            <img src="<?php echo base_url('uploads/admin/apartment/thumb/'.$data['image']) ; ?>">
                                                            
                                                   
                                                <?php } ?>
                                                <?php
                                                
                                            }
                                            ?>
                                            </ul>
                                            <output id="resultimages" ></output>
                                            <input type="file" class="filestyle upload" accept="image/*" name="property_images[]" data-input="false" multiple="multiple" id="filestyle-1" tabindex="-1" style="position: absolute; clip: rect(0px, 0px, 0px, 0px);">
                                            <input type="hidden" class="nos_images" id="nos_images" value="0" autocomplete="nope">
                                            <div class="bootstrap-filestyle input-group mt-2"><span class="group-span-filestyle " tabindex="0"><label for="filestyle-1" class="btn btn-default "><span class="icon-span-filestyle glyphicon glyphicon-folder-open"></span> <span class="buttonText"><i class="ion-upload m-r-5"></i> Choose file</span></label></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end card-box -->
                </div>
                <!-- end col -->
            </div>
            <!-- row-for-RUpload Image-end-->
            <!-- row-for-General Info-start-->
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xl-9">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title">General Info</h4>
                        <div class="row">
                            <div class="col-12">
                                <div class="p-20 p-l-0 p-r-0">
                                    <div class="form-row">
                                        <div class="form-group col-md-4 redstar">
                                            <label for="inputEmail4" class="col-form-label">Guests</label>
<!--                                            <input type="text" class="form-control mt-2" placeholder="Max. Number of Guests">-->
                                            <input type="number"  name="nos_guest" value="<?php echo $nos_guest; ?>" required class="form-control" placeholder="Max. Number of Guests">
                                        </div>
                                        <div class="form-group col-md-4 redstar">
                                            <label for="inputPassword4" class="col-form-label">Children</label>
<!--                                            <input type="text" class="form-control mt-2" placeholder="Max. Number of Children">-->
                                            <input type="number"  name="nos_of_children" value="<?php echo $nos_of_children; ?>" required class="form-control" placeholder="Max. Number of Children">
                                        </div>
                                        <div class="form-group col-md-4 redstar">
                                            <label for="inputPassword4" class="col-form-label">Adults</label>
<!--                                            <input type="text" class="form-control mt-2" placeholder="Max. Number of Adults">-->
                                            <input type="number"  name="nos_of_adults" value="<?php echo $nos_of_adults; ?>" required class="form-control" placeholder="Max. Number of Adults">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4 redstar">
                                            <label for="inputEmail4" class="col-form-label">Infants</label>
<!--                                            <input type="text" class="form-control mt-2" placeholder="Max. Number of Infants">-->
                                            <input type="number"  name="nos_of_infants" value="<?php echo $nos_of_infants; ?>" required class="form-control" placeholder="Max. Number of Infants">
                                        </div>
                                        <div class="form-group col-md-4 redstar">
                                            <label for="inputPassword4" class="col-form-label">Bedrooms</label>
<!--                                            <input type="text" class="form-control mt-2" placeholder="Max. Number of Bedrooms">-->
                                            <input type="number" name="nos_bedroom"  value="<?php echo $nos_bedroom; ?>" required class="form-control" placeholder="Max. Number of Bedrooms">
                                        </div>
                                        <div class="form-group col-md-4 redstar">
                                            <label for="inputPassword4" class="col-form-label">Beds</label>
<!--                                            <input type="text" class="form-control mt-2" placeholder="Max. Number of Beds">-->
                                            <input type="number" name="nos_beds"  value="<?php echo $nos_beds; ?>" required class="form-control" placeholder="Max. Number of Beds">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4 redstar">
                                            <label for="inputEmail4" class="col-form-label">Baths</label>
<!--                                            <input type="text" class="form-control mt-2" placeholder="Max. Number of Beds Baths">-->
                                            <input type="number"  name="nos_bath"  value="<?php echo $nos_bath; ?>" required class="form-control" placeholder="Max. Number of Baths">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputPassword4" class="col-form-label">Check-in Time</label>
<!--                                            <input type="text" class="form-control mt-2 timepicker" placeholder="Check-in Time">-->
                                            <input type="text"  name="check_in_time"  value="<?php echo $check_in_time; ?>"  class="form-control timepicker" placeholder="Check-in Time">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputPassword4" class="col-form-label">Check-out Time</label>
<!--                                            <input type="text" class="form-control mt-2 timepicker" placeholder="Check-out Time">-->
                                            <input type="text"  name="check_out_time"  value="<?php echo $check_out_time; ?>"  class="form-control timepicker" placeholder="Check-out Time">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4" class="col-form-label">Booking Interval</label>
                                            <select id="sel1" name="booking_interval" class="form-control mt-2">
                                                <?php for ($y = 0; $y <= 10; $y++) { ?>
                                                    <option value="<?php echo $y; ?>"> <?php echo $y; ?> day</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-8">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end card-box -->
                </div>
                <!-- end col -->
            </div>
            <!-- row-for-General Info-end-->
            <!-- row-for-Amenities-start-->
            <div class="row apprtment-checkbox">
                <div class="col-md-12 col-lg-12 col-xl-9">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title">Amenities</h4>

                        <div class="row">
                            <div class="col-12">
                                <div class="p-20 p-l-0 p-r-0">
                                    <div class="form-group row">
                                        <?php
                                        foreach ($amenities_arr_list as $a_key => $a_value) {
                                            ?>
                                            <div class="col-md-4 col-lg-4 col-xl-4 pt-2">                                                
                                                <input type="checkbox" class="mr-2" name="amenities[]" value="<?php echo $a_value; ?>" <?php
                                        if (in_array($a_value, $Amenities_arr)) {
                                            echo 'checked';
                                        }
                                            ?> >
                                                <label for="checkbox6 ">
                                                    <?php echo $a_key; ?>
                                                </label>                                                
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>  
                        <!-- end row -->
                    </div>
                    <!-- end card-box -->
                </div>
                <!-- end col -->
            </div>
            <!-- row-for-Amenities-end-->
            <!-- row-for-Family Amenities-start-->
            <div class="row apprtment-checkbox">
                <div class="col-md-12 col-lg-12 col-xl-9">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title">Family Amenities</h4>
                        <div class="row">
                            <div class="col-12">
                                <div class="p-20 p-l-0 p-r-0">
                                    <div class="form-group row">
                                        <?php
                                        $selected_fam_arr = explode(",", $family_amenities);
                                        foreach ($family_amenities_list as $fa_key => $fa_value) {
                                            ?>
                                            <div class="col-md-4 col-lg-4 col-xl-4 pt-2">                                                
                                                <input type="checkbox" class="mr-2" name="family_amenities[]" value="<?php echo $fa_key; ?>" <?php
                                        if (in_array($fa_key, $selected_fam_arr)) {
                                            echo 'checked';
                                        }
                                            ?> >
                                                <label for="checkbox6 ">
                                                    <?php echo $fa_value; ?>
                                                </label>                                                
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end card-box -->
                </div>
                <!-- end col -->
            </div>
            <!-- row-for-Family Amenities-end-->
            <!-- row-for-Sleeping Arrangements-start-->
            <div class="row apprtment-checkbox">
                <div class="col-md-12 col-lg-12 col-xl-9">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title">Sleeping Arrangements</h4>
                        <div class="row">
                            <div class="col-12">
                                <div class="p-20 p-l-0 p-r-0">
                                    <div class="form-group row">
                                        <div class="col-md-12 col-lg-12 col-xl-4">
                                            <div>
<!--                                                <input class="mr-2"   type="checkbox" data-parsley-multiple="checkbox6">-->
                                                 <input type="checkbox" name="sleeping_arrange[]" value="Bedroom 1(1 king bed)"<?php
                                                            if (in_array("Bedroom 1(1 king bed)", $sleeping_arrange)) {
                                                                echo 'checked';
                                                            }
                                                            ?>>
                                                <label for="checkbox6 ">
                                                    Bedroom 1 (1 king bed) 
                                                </label>  
                                            </div>
                                            <div>
                                                <input class="mr-2 invisible" class="mr-2"   type="checkbox" data-parsley-multiple="checkbox6">
                                                <label for="checkbox6 ">
                                                    <i class="fa fa-bed"></i>
                                                </label>  
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-lg-12 col-xl-4">
                                            <div>						   
<!--                                                <input class="mr-2" type="checkbox" data-parsley-multiple="checkbox6">-->
                                                 <input type="checkbox" class="mr-2" name="sleeping_arrange[]" value="Bedroom 2(1 double bed)" <?php
                                                            if (in_array("Bedroom 2(1 double bed)", $sleeping_arrange)) {
                                                                echo 'checked';
                                                            }
                                                            ?>>
                                                <label for="checkbox6">
                                                    Bedroom 2 (1 double bed) 							  
                                                </label>  
                                            </div>
                                            <div>
                                                <input class="mr-2 invisible"    type="checkbox" data-parsley-multiple="checkbox6">
                                                <label for="checkbox6 ">
                                                    <i class="fa fa-bed"></i>
                                                </label>  
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-lg-12 col-xl-4">
                                            <div>						   
<!--                                                <input  class="mr-2" type="checkbox" data-parsley-multiple="checkbox6">-->
                                                <input type="checkbox" class="mr-2" name="sleeping_arrange[]" value="Common Spaces(2 sofa beds)" <?php
                                                            if (in_array("Common Spaces(2 sofa beds)", $sleeping_arrange)) {
                                                                echo 'checked';
                                                            }
                                                            ?>>
                                                <label for="checkbox6">
                                                    Common Spaces (2 sofa beds) 
                                                </label>                                                 
                                            </div>
                                            <div>
                                                <input class="mr-2 invisible"   type="checkbox" data-parsley-multiple="checkbox6">
                                                <label for="checkbox6 ">
                                                    <i class="fa fa-bed"></i>
                                                </label>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end card-box -->
                </div>
                <!-- end col -->
            </div>
            <!-- row-for-Sleeping Arrangements-end-->     
            <!-- row-for-House Rules-start-->  	
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xl-9">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title">House Rules</h4>
                        <div class="row">
                            <div class="col-12">
                                <div class="p-20 p-l-0 p-r-0">
                                    <div class="form-row">
                                        <div class="form-group  col-md-12">
                                            <label for="inputEmail4" class="col-form-label red_star">House Rules</label>
<!--                                            <input type="text" class="form-control mt-2" placeholder="House Rules">-->
                                               <input type="text"  name="house_rule" class="form-control mt-2" value="<?php echo $house_rule; ?>" placeholder="House rules"> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end card-box -->
                </div>
                <!-- end col -->
            </div>
            <!-- row-for-House Rules-end--> 
            <!-- row-for-Accessibility -start--> 
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xl-9">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title">Accessibility</h4>
                        <div class="row">
                            <div class="col-12">
                                <div class="p-20 p-l-0 p-r-0">
                                    <div class="form-row">
                                        <div class="form-group  col-md-12">
                                            <label for="inputEmail4" class="col-form-label red_star">Accessibility</label>
<!--                                            <input type="text" class="form-control mt-2" placeholder="Accessibility">-->
                                                <input type="text" name="accessability"   value="<?php echo $accessability; ?>" class="form-control mt-2" placeholder="Accessibility"> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end card-box -->
                </div>
                <!-- end col -->
            </div>
            <!-- row-for-Accessibility -end-->     
            <!-- row-for-Cancellations -start-->     
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xl-9">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title">Cancellations</h4>
                        <div class="row">
                            <div class="col-12">
                                <div class="p-20 p-l-0 p-r-0">
                                    <div class="form-row">
                                        <div class="form-group  col-md-12">
                                            <label for="inputEmail4" class="col-form-label red_star">Cancellations</label>
<!--                                            <input type="text" class="form-control mt-2" placeholder="Cancellations">-->
                                               <input type="text" name="cancellations"   value="<?php echo $cancellations; ?>"   class="form-control mt-2" placeholder="Cancellations">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end card-box -->
                </div>
                <!-- end col -->
                    <input type="hidden" name="apt_id" value="<?php echo $id; ?>"/>
                    <input type="hidden" id="apt_status"  name="status" value="1"/>
            </div>
            <!-- row-for-Cancellations -end--> 
       
        <div class="row">
            <div class="col-sm-9">
                <div class="text-right m-t-15">        
                    <button type="submit"   onclick="aptSubmit('0')"  class="btn btn-primary save-cancel-btn m-l-5">Save</button>			
                    <button type="submit"   onclick="aptSubmit('1')" class="btn btn-primary publish-btn m-l-5">Publish</button>
                </div>
            </div>
        </div>
           
        <!-- end row -->
          </form>    
    </div>
    <!-- container -->
</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyANnatdMrgEcUnbDBAijOx_PHax0Z3MQTo&libraries=places&callback=initialize" async defer></script>
<script src="<?php echo base_url('assets/custom/js/google.js'); ?>"></script>
<script src="<?php echo base_url('assets/custom/js/operation.js'); ?>"></script>
 