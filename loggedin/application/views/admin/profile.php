
<?php
extract($admin_data);
//print_r($admin_data);
//--------------- cover and profile  -------------

$dp = site_url() . "assets/images/users/default-profile-2.jpg";
$cover = '';
if ($profile_dp) {
    $dp_image = site_url() . "/upload/admin/profile/" . $profile_dp;
    if (checkRemoteFile($dp_image)) {
        $dp = $dp_image;
    }
}
if ($cover_image) {
    $cover_img = site_url() . "/upload/admin/cover/" . $cover_image;
    if (checkRemoteFile($cover_img)) {
        $cover = $cover_img;
    }
}
//-----------biz info -----------------------------------
$business_data;

//-------------------------------------------------------
$data = array();
if ($admin_id && $data) {

    $b_name = $data['name'];
    $b_email = $data['email'];
    $b_phone = $data['phone'];
    $b_skype_name = $data['skype_name'];
    $b_address = $data['street_address'];
    $b_city = $data['city'];
    $b_zip = $data['zip'];
    $apno = $data['aprt_no'];
    $county_short = $data['country_short'];
    $street = $data['street'];
}
$geo_country1 = str_ireplace('+', '', $admin_data['country_code']);
$geo_country = $admin_data['country'] . "," . $geo_country1;

$days = allDays();
?>

<!-- container start -->
<div class="content">
    <!-- container-fluid start -->
    <div class="container-fluid">       
        <!-- page content code start -->
             <form action="<?php echo site_url() ?>/admin/setting/crud_profile" method="post" id="profileform">
        <div class="row">
          
            <div class="col-lg-10 offset-lg-1">
                <div id="res_profile"></div>
                <!--this code for profile and cover image start-->
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="card hovercard">
                            <div class="cardheader">
                                <i class="ion-camera mycamera upload_cover" style="color:gray"></i>
                            </div>
                            <div class="avatar profile_img_upload">
                                <img alt="" src="https://www.kodefork.com/static/users/images/user.png">
                                <label for="imageUpload"></label>
                            </div>
                        </div>
                    </div>
                    <!-- profile and cover image code end -->

                    <!-- business information code start -->
                    <div class="col-12">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-sm-4">    
                                    <h4 class="m-t-0 header-title">BUSINESS INFO</h4>
                                </div>
                                <div class="col-sm-8">
                                    <div class="pull-right m-t-15">
                                          <input type="reset" class="btn btn-primary save-cancel-btn" value="Cancel">
                                        <button type="button"  onclick="form_submit('profileform', 'res_profile')" class="btn btn-primary publish-btn m-l-5">Save</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="p-20">

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4" class="col-form-label red_star">Business Name</label>
<!--                                                <input type="email" class="form-control" placeholder="Business Name">-->
                                                <input type="text" value="<?php echo $admin_data['business_name']; ?>" name="business_name"  required="" placeholder="Business Name" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4" class="col-form-label red_star">Business Email</label>
<!--                                                <input type="password" class="form-control" placeholder="Business Email">-->
                                                <input type="email" value="<?php echo $admin_data['email']; ?>" name="admin_email" parsley-trigger="change" required="" placeholder="Business Email" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4" class="col-form-label red_star">Country Code</label>
                                                <select class="form-control" name="country_code" required id="country_code" required="">
                                                    <option value="">Select</option>
                                                    <?php
                                                    foreach ($countries as $allCountry) {

                                                        $country_name = $allCountry['name'] . ' (+' . $allCountry['phonecode'] . ')';
                                                        $country_value = $allCountry['name'] . ',' . $allCountry['phonecode'];
                                                        $selected = "";
                                                        if ($country_value == $geo_country) {
                                                            $selected = "selected";
                                                        }
                                                        echo '<option value="' . $country_value . '" ' . $selected . ' >' . $country_name . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4" class="col-form-label red_star">Business Phone Number</label>
<!--                                                <input type="password" class="form-control" placeholder="Business Phone Number">-->
                                                <input type="text" name="contact_number" value="<?php echo $admin_data['contact']; ?>" placeholder="Business Phone Number" required="" class="contact contact_no form-control">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4" class="col-form-label red_star">Website Link</label>
<!--                                                <input type="password" class="form-control" placeholder="Website Link">-->
                                                <input type="url" value="<?php echo $business_data['website']; ?>" name="weburl" placeholder="Website" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4" class="col-form-label red_star">Current Time Zone</label>
                                                <select name="timezone" class="form-control" id="ctctmzn" required="">
                                                    <?php
                                                    $zone = TimeZones();
                                                    foreach ($zone as $key => $value) {
                                                        ?>
                                                        <option value="<?php echo $key; ?>">
                                                            <?php echo $value; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4" class="col-form-label red_star">Address</label>
<!--                                                <input type="password" class="form-control" placeholder="Address">-->
                                                <input type="text"  name="street_address" value="<?php echo $business_data['address']; ?>" tabindex="2" class="form-control" id="autocomplete" onFocus="geolocate()" required placeholder="Address">

                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="inputEmail4" class="col-form-label red_star">Description</label>
                                                <textarea class="form-control" type="text"  placeholder="Description"   name="description"><?php echo $business_data['description']; ?></textarea>
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
                <!-- business information code end -->
                <!-- WORKING HOURS code start  -->  
                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <h4 class="m-t-0 header-title">Working Hours</h4>
                            <div class="row">
                                <div class="col-12">
                                    <div class="p-20">

                                        <?Php
                                        $working_hours_arr = json_decode($business_data['timeshedule'], true);

                                        // echo '<pre>'; print_r($working_hours_arr); echo '</pre>';

                                        foreach ($days as $key => &$day) {

                                            $checked = '';
                                            $disabled = 'disabled'; //disabled
                                            $label_class = "light";  // 'light'
                                            $start_time_wh = '10:00 AM';
                                            $end_time_wh = '05:00 PM';
                                            
                                               $key = array_search($key, array_column($working_hours_arr, 'day'));
                                                $working_hours = $working_hours_arr[$key];
                                                
                                                 if($working_hours ){
                                                      
                                                    $label_class = "default";
                                                    $checked = "checked";
                                                    $disabled = '';
                                                    $timestamp = strtotime($working_hours['start_time']);
                                                    $start_time_wh = date('h:i a', $timestamp);
                                                    $timestamp1 = strtotime($working_hours['end_time']);
                                                    $end_time_wh = date('h:i a', $timestamp1);
                                                    
                                                }
                                            
                                            ?> 
                                            <div class="form-row" id="day_<?php echo $key ?>">
                                                <div class="form-group col-md-2 ">
                                                    <button class="btn btn-<?php echo $label_class; ?> "><?php echo $day; ?></button>
                                                </div>
                                                <div class="form-group col-md-2 text-center">
                                                    <input type="checkbox"  <?php echo $checked; ?>  name="working_days[]" data-key="<?php echo $key ?>" id="dayCheck<?php echo $key ?>" <?php echo $checked; ?> value="<?php echo $key ?>"   data-plugin="switchery" data-color="#5fbeaa" data-switchery="true" data-size="small" style="display: none;">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <input name="start_time[]"  value="<?php echo $start_time_wh ?>"  <?php echo $disabled; ?>  type="text" class="form-control timepicker" placeholder="start time">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <input type="text"  name="end_times[]"  value="<?php echo $end_time_wh ?>" class="form-control timepicker" <?php echo $disabled; ?> placeholder="Facebook Link">
                                                </div>
                                            </div>
                                        <?php } ?>

                                        <!--                                       
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
                                            </div>-->

                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- end card-box -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- WORKING HOURS code end -->
                <!-- PERSONAL INFO code start -->
                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <h4 class="m-t-0 header-title">PERSONAL INFO</h4>
                            <div class="row">
                                <div class="col-12">
                                    <div class="p-20">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4" class="col-form-label red_star">First Name</label>
                                                <input type="text" value="<?php echo $admin_data['name']; ?>" name="insert_admin_name" class="form-control" placeholder="First Name">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4" class="col-form-label red_star">Last Name</label>
                                                <input type="text" value="<?php echo $admin_data['last_name']; ?>" name="insert_admin_lname" class="form-control" placeholder="Last Name">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4" class="col-form-label red_star">Contact Number (Private)</label>
                                                <input  type="text" required="" class="form-control  contact_no" value="<?php echo $admin_data['business_phone']; ?>" name="bussiness_phone"  class="form-control" placeholder="Contact Number (Private)">
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
                <!-- PERSONAL INFO code end -->
                <!-- ADDITIONAL INFO code start -->
                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <h4 class="m-t-0 header-title">ADDITIONAL INFO</h4>
                            <div class="row">
                                <div class="col-12">
                                    <div class="p-20">

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4" class="col-form-label red_star">Facebook Link</label>
                                                <input type="text" value="<?php echo $business_data['fb_url']; ?>" name="fburl" placeholder="Facebook Link" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4" class="col-form-label red_star">Linkdin Link</label>
                                                <input type="text" value="<?php echo $business_data['linkdin_url']; ?>" name="linkdin" placeholder="Linkdin Link" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4" class="col-form-label red_star">Instagram Link</label>
                                                <input type="text" value="<?php echo $business_data['instagram_url']; ?>" name="instagram" placeholder="Instagram Link" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4" class="col-form-label red_star">Twitter Link</label>
                                                <input type="text" value="<?php echo $business_data['twitter_url']; ?>" name="twitter" placeholder="Twitter Link" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4" class="col-form-label red_star">Google+ Link</label>
                                                <input type="url" value="<?php echo $business_data['googleplus_url']; ?>" name="googleplus" placeholder="Google+ Link" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4" class="col-form-label red_star">Youtube Link</label>
                                                <input type="url" value="<?php echo $business_data['youtube_url']; ?>" name="youtube" placeholder="Youtube Link" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="inputPassword4" class="col-form-label red_star">Listing Categories</label>

                                                <input type="text" id="ms1"  name="listing_category[]" value="<?php echo $business_data['categories']; ?>" placeholder="Listing Keyword" class="form-control">

                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="inputPassword4" class="col-form-label red_star">Listing Keyword</label>
                                                <input type="text" data-role="tagsinput" value="<?php echo $business_data['listing_keyword']; ?>" name="listing_keyword" placeholder="Listing Keyword" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="inputPassword4" class="col-form-label red_star">Gallery Images</label>
                                                <input  type="file" name="gallery[]" placeholder="" class="form-control" id="files" multiple="" autocomplete="nope">
                                            </div>
                                            <div class="showimage" style="margin-top:10px;margin-right:10px">
                                                <?php
                                                $images = explode(',', $business_data['gallery_images']);
                                                $i = 0;
                                                foreach ($images as $imagepath) {
                                                    if ($imagepath) {
                                                        $i = $i + 1;
                                                        echo "<div class='del$i' style='width:100px; margin-right:10px; text-align:center; float:left; height:150px'>"
                                                                . "<img src='".base_url()."uploads/gallery/$imagepath' style='margin-bottom:5px' width='100' height='100'>"
                                                                . "<button type='button' data-id='del$i' class='remove_image btn btn-default waves-effect waves-light' imgname='$imagepath'>Remove</button></div>";
                                                    }
                                                }
                                                ?>
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
                <!-- ADDITIONAL INFO code end -->
                <!-- faq section code start  -->
                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <h4 class="m-t-0 header-title">FAQS</h4>
                            <div class="row">
                                <div class="col-12">
                                    <div class="p-20">
                                        <div class="form-row faqcode">
                                            <div class="form-group col-md-12">
                                                <button type="button" class="btn btn-default waves-effect waves-light add_new_faq">
                                                    <span class="btn-label"><i class="fa fa-plus"></i>
                                                    </span>Add Faq</button>

                                                <?php
                                                $chat = json_decode(base64_decode($business_data['faq']));
                                                if (count($chat) != 0) {
                                                    foreach ($chat as $chata) {
                                                        $faqdata[] = (array) $chata;
                                                    }
                                                    $i = 0;
                                                    foreach ($faqdata as $key => $value) {
                                                        ?>  
                                                        <div class="form-row faqbackground ui-draggable ui-draggable-handle" itemid="<?php echo $i++; ?>">
                                                            <div class="form-group col-md-12"><input type="text" value="<?php echo $faqdata[$key]['question']; ?>" name="faq_question[]" class="form-control" placeholder="Question"></div>
                                                            <div class="form-group col-md-12"><input type="text" value="<?php echo $faqdata[$key]['answer']; ?>" name="faq_answer[]" class="form-control" placeholder="Answer"></div>
                                                            <div class="form-group col-md-12"><button type="button" class="removefaq btn btn-white waves-effect">Remove</button></div>
                                                        </div>

                                                        <?php
                                                    }
                                                }
                                                ?>

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
                <!-- faq section code end  -->

                <div class="row">
                    <div class="col-sm-12">
                        <div class="pull-right m-t-15">
                             <input type="reset" class="btn btn-primary save-cancel-btn" value="Cancel">
                            <button type="button"    onclick="form_submit('profileform', 'res_profile')" class="btn btn-primary publish-btn m-l-5">Save</button>
                        </div>
                    </div>
                </div>
            </div>
               
        </div>
          </form>         
        <!-- page content code end -->
    </div>
    <!-- container-fluid start -->
</div>
<!-- container end-->
<script src="<?Php echo base_url() ?>/assets/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>