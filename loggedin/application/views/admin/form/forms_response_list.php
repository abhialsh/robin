<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
   ?>
<div class="content">
   <div class="container-fluid">
      <!-- Page-Title -->
      <div class="row main_heading_row">
         <div class="col-md-12 col-lg-12 col-xl-12">
            <h4 class="page-title page_title">Form Responses</h4>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
               <li class="breadcrumb-item active">Form Responses</li>
            </ol>
         </div>
      </div>
      <div class="row">
         <?php 
       //echo '<pre>';   print_R($formslist);
       foreach ($formslist as $data) {  
           $form_name = strip_tags($data->form_name);    
            $url_title = url_title($form_name);
           ?>
          
         <div class="col-md-6 col-lg-2"> 
            <div class="widget-bg-color-icon card-box fadeInDown animated pointer" onclick="redirect_url('<?php echo site_url('admin/form/form_leads_list/'.$data->id.'/'.$url_title.'/'); ?>')">
               <div class="bg-icon bg-icon-info mx-auto">
                  <i class="fa fa-file-text-o text-info"></i>
               </div>
               <div>
                  <p class="text-muted text-center mt-3"></p>
                  <p class="text-muted modulelink text-center">
                     <a href="javascript:void()" class="table-action-btn">
                         <?php  $form_name = word_limiter($form_name, 15); 
                               echo ucfirst($form_name);?>
                     </a>						 
                  </p>
               </div>
               <div class="clearfix"></div>
            </div>
         </div>
         <?php } ?>
      </div>
      <!-- end row -->
   </div>
   <!-- container -->
</div>