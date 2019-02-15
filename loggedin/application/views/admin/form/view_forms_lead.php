<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row main_heading_row">
            <div class="col-md-12 col-lg-12 col-xl-10">
                <h4 class="page-title">View Form: <?php echo $form['form_name'] ?> </h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Forms View Form - (<?php echo $form['form_name'] ?>)</li>
                </ol>
            </div>
            <div class="col-md-12 col-lg-12 col-xl-2">
                <a href="">	<button type="button" class="btn btn-danger danger-delete-btn  waves-effect waves-light   pull-right">Delete</button></a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">

                                <form class="form-inline">

                                </form>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="container">

                                            <?php
                                            $i=0;
                                          foreach ($leadDetails as  $leadData) {
                                         
                                                $i++;
                                                $form_id = $leadData['form_id'];
                                                $form_data = json_decode($leadData['form_data']);
                                                // echo '<pre>';  print_r($form_data);      echo '</pre>';
                                                $LoggedIn_Name = $form_data->LoggedIn_Name;
                                                $LoggedIn_Value = $form_data->LoggedIn_Value;                                  
                                                $count = count($LoggedIn_Value);
                                                for ($x = 0; $x < $count; $x++) {
                                                    $logged_in_value_arr[$LoggedIn_Name[$x]] = $LoggedIn_Value[$x];
                                                }
                                            }
                                            ?> 


                                            <?php
                                            $input_field_arr = json_decode($form['form_data'], true);
                                            //echo '<pre>';  print_R($input_field_arr); echo '</pre>';

                                            for ($x = 0; $x < count($input_field_arr); $x++) {

                                                $label = $input_field_arr[$x]['label'];
                                                $name = $input_field_arr[$x]['name'];
                                                $type = $input_field_arr[$x]['type'];
                                                if(isset($input_field_arr[$x]['className'])) {
                                                $className = $input_field_arr[$x]['className'];
                                                }
                                                if ($logged_in_value_arr > 0) {

                                                    $value = '';

                                                    foreach ($logged_in_value_arr as $key => $val) {
                                                        if ($key == 'Set Time')
                                                            $key = 'Time';
                                                        if ($key == 'FileImage')
                                                            $key = 'File upload';

                                                        if ($name == $key || $label == $key) {
                                                            $value = $val;
                                                        }
                                                    }
                                                }

                                                if (isset($input_field_arr[$x]['required']) && $input_field_arr[$x]['required']) {
                                                    $required = "required";
                                                    $required_label = '<span style="color :red"> *</span>';
                                                } else {
                                                    $required = '';
                                                    $required_label = '';
                                                }
                                                if (isset($input_field_arr[$x]['subtype']) && $input_field_arr[$x]['subtype']) {
                                                    $subtype = $input_field_arr[$x]['subtype'];
                                                }


                                                if (isset($input_field_arr[$x]['description']) && $input_field_arr[$x]['description']) {
                                                    $help_text = $input_field_arr[$x]['description'];
                                                } else {
                                                    $help_text = '';
                                                }
                                                if (isset($input_field_arr[$x]['multiple']) && $input_field_arr[$x]['multiple']) {
                                                    $multiple = "multiple";
                                                } else {
                                                    $multiple = "";
                                                }
                                                ?>
                                                <br>
                                                <div class="form-group"> 
                                                    <label class="control-label"><?php
                                                        echo $label . '';
                                                        echo $required_label;
                                                        ?> </label></br>
                                                    <?php
                                                    if ($type == 'checkbox-group' || $type == 'radio-group') {
                                                        if ($type == 'radio-group') {
                                                            $label_type = 'radio';
                                                        }
                                                        if ($type == 'checkbox-group') {
                                                            $label_type = 'checkbox';
                                                        }
                                                        ?>    
                                                        <?php
                                                        $total_option = count($input_field_arr[$x]['values']);
                                                        for ($y = 0; $y < $total_option; $y++) {
                                                            $opt_label = $input_field_arr[$x]['values'][$y]['label'];
                                                            $opt_value = $input_field_arr[$x]['values'][$y]['label'];
                                                            if (isset($input_field_arr[$x]['selected']) && $input_field_arr[$x]['selected']) {
                                                                $selected1 = "";
                                                            }
                                                            $checked = '';
                                                            $value1 = explode(",", $value);
                                                            // Loop to store and display values of individual checked checkbox.
                                                            foreach ($value1 as $sel_val) {
                                                                if ($opt_label == $sel_val) {
                                                                    $checked = "checked";
                                                                }
                                                            }


                                                            echo '<input class="pointer" disabled type="' . $label_type . '" ' . $checked . ' name="' . $opt_label . '" value="' . $opt_label . '" />' . $opt_value . '<br/>';
                                                        }
                                                    }
                                                    if ($type == 'select') {

                                                        echo '<select disabled class="form-control pointer" id="sel1 ' . $label . '"  name="' . $label . '"  ' . $multiple . '  >'; //disabled
                                                        echo '<option  value=""> Select ' . $label . '</option>';

                                                        $total_option = count($input_field_arr[$x]['values']);
                                                        for ($y = 0; $y < $total_option; $y++) {
                                                            $opt_label = $input_field_arr[$x]['values'][$y]['label'];
                                                            $opt_value = $input_field_arr[$x]['values'][$y]['label'];
                                                            $selected = "";

                                                            $value1 = explode(",", $value);
                                                            // Loop to store and display values of individual checked checkbox.
                                                            foreach ($value1 as $sel_val) {
                                                                if ($opt_label == $sel_val) {
                                                                    $selected = "selected";
                                                                }
                                                            }

                                                            echo '<option ' . $selected . ' value="' . $opt_label . '"> ' . $opt_label . '</option>';
                                                        }
                                                        echo '</select>';
                                                    }
                                                    //   echo $type;//---------------
                                                    if ($type == 'textarea') {
                                                        ?>
                                                        <textarea class="form-control pointer" readonly="readonly" class="form-control <?php echo $label; ?>"    id="<?php echo $type; ?>"  name="<?php echo $type; ?>" > <?php echo $value; ?></textarea>
                                                        <?php
                                                    }
                                                    if ($type == 'text' || $type == 'number' || $type == 'hidden' || $type == 'url') {
                                                        ?>
                                                        <input  type="<?php echo $type; ?>" readonly="readonly"  class="form-control pointer <?php echo $type; ?>" value="<?php echo $value; ?>" />

                                                        <?php
                                                    }
                                                    if ($type == 'date') {
                                                        ?>
                                                        <input  type="text" readonly="readonly"  class="form-control pointer <?php echo $type; ?>" value="<?php echo $value; ?>" />

                                                        <?php
                                                    }
                                                    if ($type == "starRating") {
                                                        $value = round($value);
                                                        //  $value = 3;
                                                        ?>

                                                        <fieldset class="rating pointer">
                                                            <input type="radio" id="star5" name="rating" value="5"  <?php
                                                            if ($value == '5') {
                                                                echo "checked";
                                                            }
                                                            ?> />
                                                            <label class="full" for="star5" title="Awesome - 5 stars"></label>
                                                            <input type="radio" id="star4half" name="rating" value="4 and a half"  <?php
                                                            if ($value == '4') {
                                                                echo "checked";
                                                            }
                                                            ?> />
                                                            <label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                                            <input type="radio" id="star4" name="rating" value="4"  <?php
                                                            if ($value == '4') {
                                                                echo "checked";
                                                            }
                                                            ?>/>
                                                            <label class="full" for="star4" title="Pretty good - 4 stars"></label>
                                                            <input type="radio" id="star3half" name="rating" value="3 and a half"  <?php
                                                            if ($value == '3.5') {
                                                                echo "checked";
                                                            }
                                                            ?>/>
                                                            <label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                                            <input type="radio" id="star3" name="rating" value="3"  <?php
                                                            if ($value == '3') {
                                                                echo "checked";
                                                            }
                                                            ?> />
                                                            <label class="full" for="star3" title="Meh - 3 stars"></label>
                                                            <input type="radio" id="star2half" name="rating" value="2.5"  <?php
                                                            if ($value == '2.5') {
                                                                echo "checked";
                                                            }
                                                            ?> />
                                                            <label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                                            <input type="radio" id="star2" name="rating" value="2" <?php
                                                            if ($value == '2') {
                                                                echo "checked";
                                                            }
                                                            ?> />
                                                            <label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                                                            <input type="radio" id="star1half" name="rating" value="1 and a half"  <?php
                                                            if ($value == '1.5') {
                                                                echo "checked";
                                                            }
                                                            ?> />
                                                            <label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                                            <input type="radio" id="star1" name="rating" value="1"  <?php
                                                            if ($value == '1.5') {
                                                                echo "checked";
                                                            }
                                                            ?> />
                                                            <label class="full" for="star1" title="Sucks big time - 1 star"></label>
                                                            <input type="radio" id="starhalf" name="rating" value="half"  <?php
                                                            if ($value == '1') {
                                                                echo "checked";
                                                            }
                                                            ?> />
                                                            <label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>

                                                        </fieldset>

                                                        </br>
                                                        <?php
                                                    }
                                                    if ($type == "signature" && $value) {
                                                        ?>
                                                        <img src="<?php echo $value; ?>" alt="signature" height="200" width="200" border="1">	
                                                        <?php
                                                    }
                                                    if ($type == 'file' && $value) {
                                                        // echo $value ; echo '<br>';
                                                        $extension = get_file_extension($value);

                                                        $img_ext = array('gif', 'png', 'jpg', 'jpeg');
                                                        $doc_ext = array('doc', 'docx', 'ppt');
 
                                                        if (in_array($extension, $img_ext)) {
                                                            $file_img_url = $value;
                                                        } else if ($extension == "pdf") {
                                                            $file_img_url = base_url() . '/assets/custom/images/icon/pdf.png';
                                                        } else if (in_array($extension, $doc_ext)) {
                                                            $file_img_url = base_url() . '/assets/custom/images/icon/txt.png';
                                                        } else if ($extension == "txt") {
                                                            $file_img_url = base_url() . '/assets/custom/images/icon/txt.png';
                                                        } else {
                                                            $file_img_url = base_url() . '/assets/custom/images/icon/file.png';
                                                        }
                                                        $file_img_url;

                                                       //$check = checkRemoteFileNj($file_img_url);
                                                        ?>
                                                        <a target="_blank" download="<?php echo $value; ?>" href="<?php echo $value; ?>" title="<?php echo $extension; ?> file" >

                                                            <?php if ($check) { ?>
                                                                <img alt="<?php echo $extension; ?> file" class=""src="<?php echo $file_img_url; ?>"class="img-responsive"  alt="file" height="70" width="70" border="1">
                                                                <?php
                                                            } else {
                                                                echo strtoupper($extension) . " File";
                                                            }
                                                            ?>                                
                                                        </a>


                                                        <?php
                                                    }
                                                    if ($type == 'yes_no') {
                                                        //  echo $value; 
                                                        $checked = '';
                                                        if ($value == 'ON') {
                                                            $checked = 'checked';
                                                        }
                                                        //  echo $checked;
                                                        echo '<div class="pointer"><input  data-toggle="toggle" ' . $checked . '  data-size="mini"  type="checkbox"  class="' . $label . ' pointer"   data-on="Yes" data-off="No"/> </div><br/>';
                                                    }

                                                    echo '</div>';
                                                }
                                                ?>   


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- container -->
</div>
  <link href="<?php echo base_url();?>assets/custom/css/form.css" rel="stylesheet" type="text/css" />
   <script src="<?php echo base_url();?>assets/custom/js/form.js"></script>