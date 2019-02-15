<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="<?php if(isset($meta_desc) && $meta_desc) {echo $meta_desc;} ?>">
      <meta name="author" content="<?php if(isset($meta_author) && $meta_author) { echo $meta_author; }else {echo 'Loggedin';}?>">
      <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.ico">
      <title> <?php if(isset($title) && $title) echo $title; ?> </title>
      <!--Morris Chart CSS -->
      <link rel="stylesheet" href="<?php echo base_url();?>assets/morris/morris.css">
      <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>assets/css/icons.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" type="text/css" />
      <script type="text/javascript" src="<?php echo base_url()?>/assets/js/jquery.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>/assets/custom/js/superadmin.js"></script>
      
      <script src="<?php echo base_url();?>assets/js/modernizr.min.js"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


      <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
    <script src="<?php echo base_url();?>assets/js/date_ranger.js"></script>



   </head>
   <body class="fixed-left">
      <input type="hidden" name="BaseURL" id="BaseURL" value="<?php echo site_url();?>"> <!-- // Base Url for JS -->
      <!-- Begin page -->
      <div id="wrapper">
         <!-- Top Bar Start -->
         <div class="topbar">
            <!-- LOGO -->
            <div class="topbar-left">
               <div class="text-center">
                  <a href="index.html" class="logo"><i class="icon-magnet icon-c-logo"></i><span>L<i class="md md-album"></i>ggedin App</span></a>
               </div>
            </div>
            <!-- Button mobile view to collapse sidebar menu -->
            <!--    navigation  -->  
            <?php $this->view('theme/nav-super'); ?> 
         </div>
         <!-- Top Bar End -->
         <!-- ========== Left Sidebar Start ========== -->
         <?php $this->view('theme/left_sidebar-super'); ?> 
         <!-- Left Sidebar End -->
         <!-- ============================================================== -->
         <!-- Start right Content here -->
         <!-- ============================================================== -->
         <div class="content-page">
            <!-- Start content -->
            <?php 
            $this->view($contents); ?> 
         </div>
         <!-- content -->
         <footer class="footer text-right">
            &copy; <?php echo date('Y'); ?>. All rights reserved.
         </footer>
      </div>
      <!-- ============================================================== -->
      <!-- End Right content here -->
      <!-- ============================================================== -->
      <!-- Right Sidebar -->
      <?php $this->view('theme/right_sidebar-super'); ?> 
      <!-- /Right-bar -->
      </div>
      <!-- END wrapper -->
      <script>
         var resizefunc = [];
      </script> 
      <script src="<?php echo base_url();?>plugins/raphael/raphael-min.js"></script>
      <script src="<?php echo base_url();?>plugins/morris/morris.min.js"></script>
      <!-- jQuery  -->
     
      <script src="<?php echo base_url();?>assets/js/popper.min.js"></script><!-- Popper for Bootstrap -->
      <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
      <script src="<?php echo base_url();?>assets/js/detect.js"></script>
      <script src="<?php echo base_url();?>assets/js/fastclick.js"></script>
      <script src="<?php echo base_url();?>assets/js/jquery.slimscroll.js"></script>
      <script src="<?php echo base_url();?>assets/js/jquery.blockUI.js"></script>
      <script src="<?php echo base_url();?>assets/js/waves.js"></script>
      <script src="<?php echo base_url();?>assets/js/wow.min.js"></script>
      <script src="<?php echo base_url();?>assets/js/jquery.nicescroll.js"></script>
      <script src="<?php echo base_url();?>assets/js/jquery.scrollTo.min.js"></script>
      <!-- Counterup  -->
      <script src="<?php echo base_url();?>plugins/waypoints/lib/jquery.waypoints.min.js"></script>
      <script src="<?php echo base_url();?>plugins/counterup/jquery.counterup.min.js"></script>
      <script src="<?php echo base_url();?>assets/pages/jquery.dashboard_4.js"></script>
      <script src="<?php echo base_url();?>assets/js/jquery.core.js"></script>
      <script src="<?php echo base_url();?>assets/js/jquery.app.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>/assets/custom/js/jquery.validate.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>/assets/custom/js/additional-methods.js"></script>
      
   </body>
</html>