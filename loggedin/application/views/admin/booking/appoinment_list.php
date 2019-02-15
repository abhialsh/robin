<?php
//echo '<pre>';
//print_r($data);
//echo '</pre>';
?>

<div class="content" id="service-list">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row main_heading_row">
            <div class="col-md-12 col-lg-12 col-xl-10">
                <h4 class="page-title">Services</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Booking</li>
                </ol>
                <p>This is where you can manage your service.</p>
            </div>
            <div class="col-md-12 col-lg-12 col-xl-2">
                <button type="button" class="btn btn-primary save-btn" onclick="redirect_url('<?php echo site_url('admin/booking/new_appoinment') ?>')"> + Add New Service</button>
            </div>
        </div>
        <div class="row booking-accordian">
            <?php
            //  echo '<pre>';     print_r($categories);    echo '</pre>';
            if ($categories) {
                $count_category = '';
                $i = 0;
                foreach ($categories as $data1) {
                    $i++;
                    $sid = $data1['id'];
                    $count_category += $data1['count_category'];
                    $count_data = $data1['count_category'];
                    if ($count_data > 0) {
                        if ($i == 1) {
                            $show = 'show';
                        }
                        ?>
                        <div class="col-lg-12 booking-panel" id="panel_<?php echo $data1['id']; ?>" > <!--id="panel,<?php echo $data1['id']; ?>" -->
                            <div class="category-portlet portlet background-none no-border">
                                <div class="portlet-heading bg-loggedin-custom border-radius-none">
                                    <h3 class="portlet-title">
                                        <?php echo ucfirst($data1['name']); ?> 
                                    </h3>
                                    <div class="row">
                                        <div class="col-md-5 update-category hide">
                                            <input type="text"  id="service<?php echo $data1['id']; ?>"   name="cat_name" class="form-control" value="<?php echo ($data1['name']); ?> ">
                                             <span id ="error<?php echo $data1['id'];?>" class ="sr-msg-error"></span>  
                                        </div>
                                        <div class="col-md-3 update-category hide">
                                            <button  onclick="updateCategory(<?php echo $data1['id']; ?>)" class="update-btn btn btn-icon waves-effect btn-default waves-light"> <i class="fa  fa-check"></i> </button>
                                            <button class="cancel-link btn btn-icon cancel-btn waves-effect btn-default waves-light"> <i class="fa fa-remove loggedin-color"></i> </button>
                                        </div>
                                        <div class="col-md-8 update-category-blank "></div>
                                        <div class="col-md-4">
                                            <div class="portlet-widgets">
                                                <a href="javascript:;"><i class="fa fa-edit cat-edit"></i></a>
                                                <span class="divider"></span>
                                                <a data-toggle="collapse"   href=".<?php echo $data1['id']; ?>" class="" aria-expanded="true"><i class="ion-minus-round"></i></a>
                                                <span class="divider"></span>
                                                <a href="#" onclick="return confirm('are')"><i class="ion-close-round"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div id="sortable<?php echo $sid; ?>">
                                <?php
                                $services_data = $this->booking_model->cat_services($sid);
                                if ($services_data) {
                                    $j = 0;
                                    foreach ($services_data as $data) {
                                        if ($data['photo'] != '') {
                                            $img = base_url() . "new-booking/service_thumb/" . $data['photo'];
                                        } else {
                                            $img = "https://image.ibb.co/mFdQcR/businessman_2325953_960_720.jpg";
                                                  'https://loggedinapp.com//upload/admin/profile/1543326706.png';
                                        }
                                        ?>
                                        <div class="background-none border-radius-none <?php echo $data1['id']; ?> category-panel-collapse panel-collapse collapse <?php echo $show ?>  mt-3 ml-3 mr-3" >
                                            <div class="portlet-body border-radius-none p-0">
                                                <div class="row">
                                                    <div class="col-md-2 text-center p-2">			  
                                                        <img src="<?php echo $img; ?>" class="img-fluid rounded-circle ml-md-3 mt-md-4 mt-0 ml-lg-0 mt-lg-0" alt="profile-image">
                                                    </div>
                                                    <div class="col-md-6 p-2 pl-4 pr-4">
                                                        <h3 class="font-normal"  id="title<?php echo $data['id']; ?>">  <?php echo ucfirst($data['name']); ?></h3>
                                                        <p class="text-capitalize">
                                                            <?php echo $this->booking_model->staffNamesBycommaIds($data['staff_id']); ?>
                                                        </p>
                                                        <p class="text-capitalize">  <?php echo $data['location']; ?> 
                                                            <?php
                                                            $dur_hr = $data['service_duration_hours'];
                                                            $dur_min1 = $data['service_duration_min'];
                                                            $dur_min_2 = $data['booking_avail_between'];

                                                            echo $service_duration = getBookingDuration($dur_hr, $dur_min1, '');
                                                            
                                                            ?> 

                                                        </p>
                                                        <?php if(($data['description'])!=""){ ?> 
                                                          <a class="toggleDescr pointer loggedin-color" id="set<?php echo $data['id']; ?>" target="<?php echo $data['id']; ?>">More details
                                                           </a> 
							 <?php } ?>
                                                        <div class="col-md-12 descr_section hide"  style="text-align:justify">
                                                                <?php echo ($data['description']); // filedAJinput?> 
                                                         </div>	
                                                         
                                                    </div>
                                                    <div class="col-md-3 p-2 pl-4 pr-4">
                                                        <h3 class="font-normal">
                                                            <?php
                                                            if ($data['price'] != 0 && $data['service_type'] != "Free") {
                                                                echo CURRENCY_SYMBOL . number_format($data['price'], 2);
                                                            }
                                                            if ($data['service_type'] == "Free") {
                                                                echo $data['custmize'];
                                                            }
                                                            ?>  

                                                        </h3>
                                                        <p class="text-capitalize">  <?php
                                                            if ($data['service_type'] == "Free") {
                                                                echo "Free";
                                                            } else {
                                                                echo $data['accept_payment_method'];
                                                            }
                                                            ?>  </p>
                                                    </div>
                                                    <div class="col-md-1 p-2 pl-3 pr-3 copy-edit-area  lg-border-left-0" >
                                                        <hr class="d-lg-none d-md-none d-sm-block">
                                                        <p class="mt-4 text-center" onclick="redirect_url('<?php echo site_url('admin/booking/new_appoinment/'.$data['id']); ?>')">
                                                            <i class="fa fa-edit pointer loggedin-color"></i>
                                                        </p>
                                                        <p class="mt-5 text-center" onclick="copyServices(<?php echo $data['id']; ?>,<?php echo $sid; ?>)">
                                                            <i class="fa fa-files-o pointer loggedin-color"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                }
                                ?>
                                 </div>    
                            </div>
                        </div>
                        <?php
                    }
                }
            }
            ?>
        </div>
    </div>
    <!-- container -->
</div>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?php echo base_url('assets/custom/js/booking.js'); ?>"></script>
