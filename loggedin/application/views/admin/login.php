<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Loggedin App">
        <meta name="author" content="Loggedin App">
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico">
        <title>Admin Login</title>
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/custom/css/admin.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/custom/css/theme.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div class="account-pages login_left"></div>
        <div class="account-pages login_right"></div>
        <div class="row">
            <div class="col-md-6"> 
                <div class="wrapper-page">
                    <div class="ex-page-content front-page text-center">
                        <div class="text-error"><span class="text-primary"> </span><i class="ti-face-sad text-pink"></i><i class="ti-face-sad text-info"></i></div>
                        <br>
                        <h4 class="text-white">WELCOME TO</h4>
                        <h1 class="text-white">LOGGEDIN</h1>                
                    </div>
                </div>
            </div>
            <div class="col-md-6 slider-right hide">
                <div class="card-box login-form-box loginform">
                    <div class="panel-heading">
                        <h4 class="custom-h4 header-title heading m-t-0">lOGIN</h4>
                        <br>			   
                    </div>
                    <span id="result"></span>
                    <form action="<?php echo site_url() ?>/admin/Dashboard/auth_login" method="post" class="m-t-10" id="loginform">
                        <div class="form-group redstar">
                            <label for="userName">Email Address</label>
                            <input type="email" name="username"  required  parsley-trigger="change" required="" placeholder="Email Address" class="form-control" id="userName">
                        </div>
                        <div class="form-group redstar">
                            <label for="pass1">Password</label>
                            <input  name="password" type="password" placeholder="Password" required="" class="form-control">
                        </div>
                        <div class="form-group text-left m-b-0">
                            <button class="btn btn-primary save-btn" type="button" onclick="form_submit('loginform', 'result')">
                                Login
                            </button>
                            <a href="#" class="text-primary m-l-5 float-right forgot"><i class="fa fa-lock m-r-5"></i> Forgot
                                your password?</a>				 
                        </div>
                        <div class="row m-t-10">
                            <div class="col-sm-12 text-left">
                                <p>Don't have an account? <a href="#" class="text-primary m-l-5 signup">Sign Up</a>
                                </p>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="card-box login-form-box registerform display_none">
                    <div class="panel-heading">
                        <h4 class="custom-h4 header-title heading m-t-0">Register</h4>
                        <br>			   
                    </div>
                      <span id="resultReg"></span>
                <form action="<?php echo site_url() ?>/admin/Dashboard/register" method="post" class="m-t-10" id="registerform">
                        <div class="form-group">                    
                            <input type="name" class="form-control" autocomplete="nope" name="business_name" required="" placeholder="Business Name">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="country" required id="country_code" required="">
                                <option value="">Select Country</option>
                                <?php
                                foreach ($countries as &$country) {
                                    $country_name = $country->name . ' (+' . $country->phonecode . ')';
                                    $country_value = $country->name . ',' . $country->phonecode;
                                    $selected = "";
                                    // $geo_country
                                    if ($country_value == "United States,1") {
                                        $selected = "selected";
                                    }
                                    echo '<option value="' . $country_value . '" ' . $selected . ' >' . $country_name . '</option>';
                                }
                                ?>
                            </select> 
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control contact_no " autocomplete="nope" name="business_phone" required="" placeholder="Business Phone Number">                      
                        </div>
                      <div class="form-group">
                            <input type="email" class="form-control" autocomplete="nope" name="email" required="" placeholder="Business Email ">				  
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" autocomplete="nope" name="name" required="" placeholder="Fisrt Name (Private)">				  
                        </div>

                        <div class="form-group">                     
                            <input type="text" class="form-control" autocomplete="nope" name="lname" required="" placeholder="Last Name (Private)">                     
                        </div>
                        <div class="form-group">                     
                            <input type="text" class="form-control contact_no" name="contact_number" required="" placeholder="Contact Number (Private)" autocomplete="nope">
                        </div>

                        <div class="form-group">                     
                            <input type="password" class="form-control" id="npassword" name="password" value="" required="" placeholder="Password" autocomplete="nope">
                        </div>
                        <div class="form-group">                     
                            <input type="password" class="form-control" equalto="#npassword"  name="confirm-password" value="" required="" placeholder="Confirm Password" autocomplete="nope">
                        </div>
                        <div class="form-group text-left m-b-0">
                            <button class="btn btn-primary save-btn" type="button" onclick="form_submit('registerform', 'resultReg')"> Submit</button>

                        </div>
                        <div class="row m-t-10">
                            <div class="col-sm-12 text-left">
                                <p>Already Registered? <a href="#" class="text-primary m-l-5 signin">Sign In</a>
                                </p>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="card-box login-form-box forgotform display_none">
                    <div class="panel-heading">
                        <h4 class="custom-h4 header-title heading m-t-0">Forgot Password</h4>
                        <br>			   
                    </div>
                    <span id="result"></span>
                    <form action="<?php echo site_url() ?>/admin/Dashboard/forgot" method="post" class="m-t-10" id="forgotform">
                        <div class="form-group redstar">
                            <label for="userName">Email Address</label>
                            <input type="email" name="username"  required  parsley-trigger="change" required="" placeholder="Email Address" class="form-control" >
                        </div>

                        <div class="form-group text-left m-b-0">
                            <button class="btn btn-primary save-btn" type="button" onclick="form_submit('forgotform', 'result')">
                                Submit
                            </button>

                        </div>
                        <div class="row m-t-10">
                            <div class="col-sm-12 text-left">
                                <p>Already Registered?   <a href="#" class="text-primary m-l-5 signin">Login Here</a>
                                </p>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <script>
            var resizefunc = [];
        </script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets/custom/js/jquery.validate.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets/custom/js/additional-methods.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets/custom/js/admin_function.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets/custom/js/admin_custom.js"></script>
        <script src="<?php echo base_url(); ?>plugins/timepicker/bootstrap-timepicker.js"></script>

        <script>
            $(document).ready(function () {
                $('.signup').click(function () {
                    $('.registerform').show('slow');
                    $('.loginform,.forgotform').hide('slow');
                });
                $('.signin').click(function () {
                    $('.registerform,.forgotform').hide('slow');
                    $('.loginform').show('slow');
                });
                $('.forgot').click(function () {
                    $('.loginform').hide('slow');
                    $('.forgotform').show('slow');
                });
            })

        </script>
    </body>
</html>