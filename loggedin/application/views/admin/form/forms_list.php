<!-- content start code -->
  <div class="content">
  <!-- container-fluid start code -->
   <div class="container-fluid">     
<!-- Page-Title start code  -->
      <div class="row">
         <div class="col-sm-12">
            <h4 class="page-title page_title">Add New Form</h4>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
               <li class="breadcrumb-item active">Add New Form</li>
            </ol>
         </div>
      </div>
<!-- Page-Title end code  -->
<!-- Page-Title start code  -->
      <div class="row dashboard_box">
         <div class="col-md-6 col-lg-3"> 
            <div class="widget-bg-color-icon card-box fadeInDown animated pointer" onclick="redirect_url('<?php echo site_url('admin/form/formBuilder'); ?>')">
               <div class="bg-icon bg-icon-info mx-auto">
                  <i class="fa fa-file-text-o text-info"></i>
               </div>
               <div>
                  <p class="text-muted text-center mt-3">Add Form</p>
                  <p class="text-muted text-center">Created unlimited forms with our easy drag and drop form builder.</p>
                  <div class="product-action text-center">
                     <p class="text-muted text-center mt-3">Get Started</p>
                  </div>
               </div>
               <div class="clearfix"></div>
            </div>
         </div>
         <?php 
       //echo '<pre>';   print_R($formslist);
       foreach ($formslist as $data) {     ?>
          
         <div class="col-md-6 col-lg-3" id= "form_<?Php echo $data->id; ?>">
            <div class="widget-bg-color-icon card-box fadeInDown animated">
               <div class="bg-icon bg-icon-info mx-auto">
                   <a href="<?php echo site_url('admin/form/formBuilder/'.$data->id);?>">
                      <i class="fa fa-file-text-o text-info"></i>
                    </a>
               </div>
               <div>
                  <p class="text-muted text-center mt-3">
                      <a href="<?php echo site_url('admin/form/formBuilder/'.$data->id);?>">
                      <?php

                            $form_name = strip_tags($data->form_name);
                            $form_name = word_limiter($form_name, 15);
                            echo ucfirst($form_name);
                         ?>
                      </a></p>
                  <p class="text-muted text-center">
                    <?php
                    
                        $form_descr = strip_tags($data->form_descr);
                        $form_descr = word_limiter($form_descr, 40);
                         echo ucfirst($form_descr);
                    ?> 
                  </p>
                  <div class="product-action text-center">
                     <a href="<?php echo site_url('admin/form/formBuilder/'.$data->id);?>"   id="<?php echo $data->id; ?>"class="btn btn-sm custom-btn-circle mr-3" data-toggle="tooltip" data-placement="top" title="Edit">
                         <i class="md md-mode-edit"></i></a>
 				 		
                     <a href="javascript:void(0)"  id="form_deactive<?php echo $data->id; ?>"  onclick="ManageFormStaus(<?php echo $data->id; ?>, 0);" class="btn  btn-sm custom-btn-circle <?php if($data->status==1) { echo "hide"; } ?>" data-toggle="tooltip" data-placement="top" title="De-active"><i class="ti-na"></i></a>
					 
					  <a href="javascript:void(0)"  id="form_active<?php echo $data->id; ?>"  onclick="ManageFormStaus(<?php echo $data->id; ?>, 1);" class="btn  btn-sm custom-btn-circle <?php if($data->status==0) { echo "hide"; } ?>" data-toggle="tooltip" data-placement="top" title="Active"><i class="icon-check"></i></a>
					 
                  </div>
               </div>
               <div class="clearfix"></div>
            </div>
         </div>
         <?php } ?>
      </div>
<!-- Page-Title end code  -->
   </div>
 <!-- container-fluid end code -->
</div>
 <!--content end code -->
     <script src="<?php echo base_url();?>assets/custom/js/form.js"></script>   