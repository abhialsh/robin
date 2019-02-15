<div class="content" id="class-list-page">
   <div class="container-fluid">
      <!-- Page-Title -->
      <div class="row main_heading_row">
         <div class="col-md-12 col-lg-12 col-xl-10">
            <h4 class="page-title">Class</h4>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
               <li class="breadcrumb-item active">Booking</li>
            </ol>
            <p>This is where you can manage your Classes.</p>
         </div>
         <div class="col-md-12 col-lg-12 col-xl-2">
            <button type="button" class="btn btn-primary save-btn" onclick="redirect_url('<?php echo site_url('admin/booking/new_class'); ?>')"> + Add New Class</button>
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
         <div class="col-lg-12 booking-panel" id="panel_<?php echo $data1['id']; ?>">
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
               <div   class="background-none border-radius-none <?php echo $data1['id']; ?> category-panel-collapse panel-collapse collapse <?php echo $show ?> mt-3 ml-3 mr-3" >
                  <div class="portlet-body border-radius-none p-0">
                     <div class="row">
                        <div class="col-md-2 text-center p-2">			  
                           <img src="https://loggedinapp.com//upload/admin/profile/1543326706.png" class="img-fluid rounded-circle ml-md-3 mt-md-4 mt-0 ml-lg-0 mt-lg-0" alt="profile-image">
                        </div>
                        <div class="col-md-9 p-2 pl-4 pr-4">
                           <div class="row">
                              <div class="col-md-9">
                                  <h3 class="font-normal"  id="title<?php echo $data['id']; ?>">  <?php echo ucfirst($data['name']); ?></h3>
                                 <p class="text-capitalize">
                                      <span>  
                                        <?php
                                        $dur_hr = $data['service_duration_hours'];
                                        $dur_min1 = $data['service_duration_min'];
                                        $dur_min_2 = $data['booking_avail_between'];

                                        echo $service_duration = getBookingDuration($dur_hr, $dur_min1, $dur_min_2);

                                        //echo $data['service_duration_hours']." "."hr"." ".$data['service_duration_min']." min ";
                                        ?>

                                    </span> |
                                    <span> Max Participants: 
                                        <?php echo $data['max_participant']; ?> 
                                    </span>    
                                    </p>
                                      <p class="text-capitalize">
                                     <?php echo $data['location'];  $toggle=$data['id'];  ?> 
                                      </p>
                              <a class="toggleDescr pointer loggedin-color" id="set<?php echo $data['id']; ?>" target="<?php echo $data['id']; ?>">More details
                                                           </a> 
                              </div>
                              <div class="col-md-3 p-2   pr-4">
                                 <h3 class="font-normal"> 
                                              <?php
                                                if ($data['price'] != 0 && $data['service_type'] != "Free") {
                                                     echo CURRENCY_SYMBOL. number_format($data['price'], 2);
                                                }
                                                if ($data['service_type'] == "Free") {
                                                    echo $data['custmize'];
                                                }
                                                ?>   </h3>
                                 <p class="text-capitalize">
                                    <?php
                                        if ($data['service_type'] == "Free") {
                                            echo "Free";
                                        } else {
                                            echo $data['accept_payment_method'];
                                        }
                                        ?>  </p>
                              </div>
                           </div>
                           <div class="row descr_section hide">
                              <div class="col-md-12">
                                 <div class="table-responsive">
                                     <?php  
                                    $days_times = $this->booking_model->class_time_shedule($data['id']);   
                                //   echo '<pre>'; print_R($days_times);   echo '</pre>'; 
                                     ?>
                                    <table class="table table-borderless day-table ">
                                       <thead>
                                          <tr>
                                             <th>Monday</th>
                                             <th>Tuesday</th>
                                             <th>Wednesday</th>
                                             <th>Thursday</th>
                                             <th>Friday</th>
                                             <th>Saturday</th>
                                             <th>Sunday</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                               <tr>
                                                    <td>
                                                        <?php
                                                            if(isset($days_times[1])){
                                                        $day1 = array_unique($days_times[1]);
                                                        if (count($day1) == 0) {
                                                            echo "-";
                                                        } else {
                                                            for ($i = 0; $i < count($day1); $i++) {
                                                                echo $day1[$i] . '<br><br>';
                                                            }
                                                        }
                                                          }else {
                                                               echo "-";
                                                         }
                                                        ?>
                                                    </td>
                                                    <td> 
                                                        <?php
                                                            if(isset($days_times[2])){
                                                        $day2 = array_unique($days_times[2]);
                                                        if (count($day2) == 0) {
                                                            echo "-";
                                                        } else {
                                                            for ($i = 0; $i < count($day2); $i++) {
                                                                echo $day2[$i] . '<br><br>';
                                                            }
                                                        }
                                                          }else {
                                                               echo "-";
                                                         }
                                                        ?>
                                                    </td>
                                                    <td> 
                                                        <?php
                                                            if(isset($days_times[3])){
                                                        $day3 = array_unique($days_times[3]);
                                                        if (count($day3) == 0) {
                                                            echo "-";
                                                        } else {
                                                            for ($i = 0; $i < count($day3); $i++) {
                                                                echo $day3[$i] . '<br><br>';
                                                            }
                                                        }
                                                          }else {
                                                               echo "-";
                                                         }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            if(isset($days_times[4])){
                                                        $day4 = array_unique($days_times[4]);
                                                        if (count($day4) == 0) {
                                                            echo "-";
                                                        } else {
                                                           foreach($day4  as $day) {
                                                                echo $day . '<br><br>';
                                                            }
                                                        }  }else {
                                                               echo "-";
                                                         }
                                                        ?>
                                                    </td>
                                                    <td> 
                                                        <?php
                                                        if(isset($days_times[5])){
                                                        $day5 = array_unique($days_times[5]);
                                                        if (count($day5) == 0) {
                                                            echo "-";
                                                        } else {
                                                            for ($i = 0; $i < count($day5); $i++) {
                                                                echo $day5[$i] . '<br><br>';
                                                            }
                                                        }
                                                        }else {
                                                               echo "-";
                                                         }
                                                        ?>
                                                    </td>
                                                    <td> 
                                                        <?php
                                                         if(isset($days_times[6])){
                                                        $day6 = array_unique($days_times[6]);
                                                        if (count($day6) == 0) {
                                                            echo "-";
                                                        } else {
                                                            for ($i = 0; $i < count($day6); $i++) {
                                                                echo $day6[$i] . '<br><br>';
                                                            }
                                                        }
                                                         }else {
                                                               echo "-";
                                                         }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                         if(isset($days_times[7])){
                                                        $day7 = array_unique($days_times[7]);
                                                        if (count($day7) == 0) {
                                                            echo "-";
                                                        } else {
                                                            for ($i = 0; $i < count($day7); $i++) {
                                                                echo $day7[$i] . '<br><br>';
                                                            }
                                                        }
                                                         }else {
                                                               echo "-";
                                                         }
                                                        ?>
                                                    </td>
                                                </tr>  
                                       
<!--                                          <tr>
                                             <th scope="row">1</th>
                                             <td>Mark</td>
                                             <td>Otto</td>
                                             <td>@mdo</td>
                                             <td>Mark</td>
                                             <td>Otto</td>
                                             <td>@mdo</td>
                                          </tr>-->
                                       </tbody>
                                    </table>
                                       <span> <?php echo ($data['description'] ) ?> </span>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-1 p-2 pl-3 pr-3 copy-edit-area  lg-border-left-0" >
                           <hr class="d-lg-none d-md-none d-sm-block">
                           <p class="mt-4 text-center">
                            <p class="mt-4 text-center" onclick="redirect_url('<?php echo site_url('admin/booking/new_class/'.$data['id']); ?>')">
                              <i class="fa fa-edit pointer loggedin-color"></i>
                            </p>
                           <p class="mt-5 text-center" onclick="copyClass(<?php echo $data['id']; ?>,<?php echo $sid; ?>)">
                              <i class="fa fa-files-o pointer loggedin-color"></i>
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
               <?php } 
                                }?>
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