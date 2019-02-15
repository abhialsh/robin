<!-- container start -->
<div class="content page-restaurant">
   <!-- container-fluid start -->
   <div class="container-fluid">
      <!-- Page-Title start code  -->
      <div class="row">
         <div class="col-sm-12 m-b-20">
            <h4 class="page-title page_title">Manage Restaurant Opening Hours</h4>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
               <li class="breadcrumb-item active">Restaurant</li>
            </ol>
         </div>
      </div>
      <!-- Page-Title end code  -->
      <div class="row">
         <div class="col-lg-12">
            <div class="portlet">
               <div class="portlet-heading bg-info bg-loggedin-custom top-radius-both-0">
                  <h3 class="portlet-title">
                     Manage Setting           
                  </h3>
                  <div class="portlet-widgets">
                     <a href="javascript:;" data-toggle="reload"><i class="ion-refresh invisible"></i></a>
                     <span class="divider"></span>
                     <a href="#" data-toggle="remove"><i class="ion-close-round invisible"></i></a>
                     <span class="divider"></span>
                     <a data-toggle="collapse" data-parent="#accordion1" href="#shedule"><i class="ion-minus-round "></i></a>
                  </div>
                  <div class="clearfix"></div>
               </div>
               <div id="shedule" class="panel-collapse collapse show ">
                  <div class="portlet-body bottom-radius-both-0">
                     <div class="form-group row">
                        <label class="col-md-3 col-form-label">Open / Close</label>
                        <label class="col-md-9 col-form-label">Open Today</label>
                     </div>
                     <div class="form-group row">
                        <label class="col-md-3 col-form-label">Heading Text</label>
                        <div class="col-md-6"><input type="text" class="form-control"> </div>
                     </div>
                     <div class="form-group row">
                        <label class="col-md-3 col-form-label">Allow substitution in products during checkout</label>
                        <div class="col-md-6">  <input type="checkbox" checked="" data-plugin="switchery" data-color="#5fbeaa" data-switchery="true" data-size="small" style="display: none;"> </div>
                     </div>
                     <div class="form-group row">
                        <label class="col-md-3 col-form-label">Store Tax in (%)</label>
                        <div class="col-md-6"><input type="text" class="form-control" placeholder="E.G. 10 or 10.5"> </div>
                     </div>
                     <div class="form-group row">
                        <label class="col-md-3 col-form-label">Text Name & Description</label>
                        <div class="col-md-6">
                           <div class="row">
                              <div class="col-md-6">
                                 <input type="text" class="form-control" placeholder=""> 
                              </div>
                              <div class="col-md-6">
                                 <input type="text" class="form-control" placeholder=""> 
                              </div>
                           </div>
                        </div>
                        <div class="col-md-1 mt-2 loggedin-color"><i class="fa fa-plus pointer"></i></div>
                     </div>
                     <div class="form-group row">
                        <label class="col-md-3 col-form-label">Opening Hours</label>                      
                     </div>
                     <div class="form-group row">
                        <label class="col-md-12 col-form-label">
                           <?php for($i=0; $i<7 ;$i++){ ?>
                           <div class="form-row">
                              <div class="form-group col-md-2">
                                 <button class="btn btn-default">Monday</button>
                              </div>
                              <div class="form-group col-md-1">
                                 <input type="checkbox" checked="" data-plugin="switchery" data-color="#5fbeaa" data-switchery="true" data-size="small" style="display: none;">
                              </div>
                              <div class="form-group col-md-2">
                                 <input type="text" class="form-control timepicker" placeholder="">
                              </div>
                              <div class="form-group col-md-2">
                                 <input type="text" class="form-control timepicker" placeholder="">
                              </div>
                              <div class="form-group col-md-1">
                                 <i class="fa fa-plus mt-2 loggedin-color ml-4 pointer"></i>
                              </div>
                           </div>
                           <?php } ?>
                        </label>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12 text-right">
            <button type="button" class="btn save-btn">Save</button>
         </div>
      </div>
      <!-- container-fluid start -->
   </div>
</div>
<script src="<?php echo base_url('assets/custom/js/restaurant.js'); ?>"></script>
<!-- container end-->