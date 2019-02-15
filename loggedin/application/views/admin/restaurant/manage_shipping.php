<div class="content extention-page">
   <div class="container-fluid">
      <!-- Page-Title -->
      <div class="row main_heading_row">
         <div class="col-md-12 col-lg-12 col-xl-8">
            <h4 class="page-title">Manage Shipping</h4>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
               <li class="breadcrumb-item active">Restaurant</li>
            </ol>
         </div>
      </div>
      <!-- Page-Title-End-->
      <!--page content start-->
      <div class="row">
         <div class="col-sm-12">
            <div class="pull-left ">
               <button type="button" id="frmb_save" class="btn btn-primary publish-btn">Store Pickup</button>
               <button type="button" id="frmb_Publish" class="btn btn-primary publish-btn m-l-5">Local Delivery</button>
            </div>
         </div>
      </div>
      <div class="row mt-4">
         <div class="col-lg-12">
            <div class="portlet">
               <div class="portlet-heading bg-danger bg-loggedin-custom top-radius-both-0">
                  <h3 class="portlet-title">
                     Danger Heading
                  </h3>
                  <div class="portlet-widgets">
                     <a href="javascript:;" data-toggle="reload" class="invisible"><i class="ion-refresh"></i></a>
                 
                     <span class="divider"></span>
                     <a href="#" data-toggle="remove" class="invisible"><i class="ion-close-round"></i></a>
					     <span class="divider"></span>
                     <a data-toggle="collapse" data-parent="#accordion1" href=".collapse"><i class="ion-minus-round"></i></a>	
                  </div>
                  <div class="clearfix"></div>
               </div>
               <div   class="panel-collapse collapse show">
                  <div class="portlet-body bottom-radius-both-0">
                     <div class="row">
                        <div class="col-md-12">                            
                           <div class="form-group">
                              <div class="row">
                                 <div class="col-md-6 text-left pl-5">	
                                  <label for="inputPassword4" class="col-form-label red_star">Store pick up is enable.</label>							 
                                 </div>
								 <div class="col-md-5 text-right">	
                                    <button type="button" onclick="redirect_url('<?php echo site_url('admin/restaurant/storepickup'); ?>')"   class="btn btn-primary publish-btn w-45">+ Manage Store Pickup</button>						 
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
					  <div class="row">
                        <div class="col-md-12">                            
                           <div class="form-group">
                              <div class="row">
                                 <div class="col-md-6 text-left pl-5">	
                                  <label for="inputPassword4" class="col-form-label red_star">Local delivery free shipping enable.</label>							 
                                 </div>
								 <div class="col-md-5 text-right">	
                                    <button type="button" onclick="redirect_url('<?php echo site_url('admin/restaurant/localdelivery'); ?>')"  class="btn btn-primary publish-btn w-45">+ Manage Local Delivery</button>						 
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--page content end-->
   </div>
</div>
<script src="<?php echo base_url('assets/custom/js/extention.js'); ?>"></script>