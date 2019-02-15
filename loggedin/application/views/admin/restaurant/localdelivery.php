<div class="content">
   <div class="container-fluid">
      <!-- Page-Title -->
      <div class="row main_heading_row">
         <div class="col-md-12 col-lg-12 col-xl-8">
            <h4 class="page-title">Store Pickup</h4>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
               <li class="breadcrumb-item active">Restaurant</li>
            </ol>
         </div>
         <div class="col-md-12 col-lg-12 col-xl-4 text-right">
            <button type="button" onclick="redirect_url('<?php echo site_url('admin/restaurant/manage_shipping'); ?>')" class="btn btn-primary cancel-btn">Cancel</button>
            <button type="button" id="frmb_Publish" class="btn btn-primary publish-btn m-l-5">Save</button>
         </div>
      </div>
      <!-- Page-Title-End-->
      <!--page content start-->
      <div class="row">
         <div class="col-md-12">
            <div class="row">
               <div class="col-12">
                  <!-- strat card-box -->
                  <div class="card-box">
                     <div class="form-group row">
                        <label class="col-md-2 col-form-label">Enable Store Pickup </label>
                        <div class="col-md-10 mt-2">
                           <input type="checkbox" checked onchange="$('.store-pickup').toggle()" data-plugin="switchery" data-color="#5fbeaa" data-switchery="true" data-size="small" style="display: none;">
                        </div>
                     </div>
                     <div class="form-group row">
                        <label class="col-md-6 col-form-label">Min amount for local delivery</label>
                     </div>
                     <div class="form-group row">
                        <div class="col-md-6 mt-0">
                           <div class="input-group">
                              <div class="input-group-prepend ">
                                 <span class="input-group-text pt-0 pb-0">$</span>
                              </div>
                              <input type="text" class="form-control" placeholder="Min Amount">
                           </div>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label class="col-md-12 col-form-label">
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" onclick="$('.handling-fee').toggle()" class="custom-control-input" id="customCheck2">
                        <label class="custom-control-label" for="customCheck2"> Add a handling fee to every order</label>
                        </div>
                        </label>
                     </div>
                     <div class="form-group row handling-fee hide">
                        <div class="col-md-6 mt-0">
                           <div class="input-group">
                              <div class="input-group-prepend ">
                                 <span class="input-group-text pt-0 pb-0">$</span>
                              </div>
                              <input type="text" class="form-control" placeholder="0.00">
                           </div>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label class="col-md-6 col-form-label">Estimated wait time for local delivery (min)</label>
                     </div>
                     <div class="form-group row">
                        <div class="col-md-6 mt-0">
                           <input type="text" class="form-control" placeholder="E.G 30">
                        </div>
                     </div>
                     <div class="form-group row ">
                        <div class="col-md-12">
                           <h4 class="mt-3 header-title  text-capitalize">Choose Shipping Method</h4>
                        </div>
                     </div>
                     <div class="form-group row ">
                        <div class="col-md-12">
                           <div class="custom-control custom-radio">
                              <input type="radio" checked="" id="customRadio1" name="customRadio" class="custom-control-input">
                              <label class="custom-control-label ml-2" for="customRadio1">I have my own courier for local delivery.
                              </label>
                           </div>
                        </div>
                     </div>
                     <div class="form-group row ">
                        <div class="col-md-12">
                           <div class="custom-control custom-radio">
                              <input type="radio" checked="" id="customRadio2" name="customRadio" class="custom-control-input">
                              <label class="custom-control-label ml-2" for="customRadio2"> I would like to use Postmates for all my delivery.
                              </label>
                           </div>
                        </div>
                     </div>
                     <div class="form-group row ">
                        <div class="col-md-12">
                           <div class="custom-control custom-radio">
                              <input type="radio" checked="" id="customRadio3" name="customRadio" class="custom-control-input">
                              <label class="custom-control-label ml-2" for="customRadio3">I have my own courier for local delivery but want to use Postmates for extended delivery within my city.
                              </label>
                           </div>
                        </div>
                     </div>
                     <div class="form-group row ">
                        <div class="col-md-12">
                           <h4 class="mt-3 header-title  text-capitalize">Short Range Delivery</h4>
                        </div>
                     </div>
                     <div class="form-group  row">
                        <label class="col-md-6 col-form-label">Store Delivery Area (In Miles)</label>
                     </div>
                     <div class="form-group row ">
                        <div class="col-md-6 mt-0">
                           <select class="form-control store_del_area_select" name="store_del_area" required="">
                              <option value="">select</option>
                              <!--<option value="0.0" >0 mile</option>-->
                              <option value="0.25">0.25 mile</option>
                              <option value="0.5">0.5 mile</option>
                              <option value="0.75">0.75 mile</option>
                              <option value="1">1 mile</option>
                              <option value="1.5">1.5 miles</option>
                              <option value="2">2 miles</option>
                              <option value="2.5">2.5 miles</option>
                              <option value="3">3 miles</option>
                              <option value="3.5">3.5 miles</option>
                              <option value="4">4 miles</option>
                              <option value="4.5" selected="">4.5 miles</option>
                              <option value="5">5 miles</option>
                              <option value="6"> 6 miles</option>
                              <option value="7"> 7 miles</option>
                              <option value="8"> 8 miles</option>
                              <option value="9"> 9 miles</option>
                              <option value="10"> 10 miles</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group row ">
                        <div class="col-md-12">
                           <div class="custom-control custom-radio">
                              <input type="radio" checked="" id="customRadio4" name="customRadio" class="custom-control-input">
                              <label class="custom-control-label ml-2" for="customRadio4"> Free Shipping
                              </label>
                           </div>
                        </div>
                     </div>
                     <div class="form-group row ">
                        <div class="col-md-12">
                           <div class="custom-control custom-radio">
                              <input type="radio" checked="" id="customRadio5" name="customRadio" class="custom-control-input falate-radio">
                              <label class="custom-control-label ml-2" for="customRadio5"> Flat Rate
                              </label>
                           </div>
                        </div>
                     </div>
                     <div class="form-group row ">
                        <div class="col-md-6">
                           <label>Standard delivery fee</label>
                        </div>
                     </div>
                     <div class="form-group row">
                        <div class="col-md-6 mt-0">
                           <div class="input-group">
                              <div class="input-group-prepend ">
                                 <span class="input-group-text pt-0 pb-0">$</span>
                              </div>
                              <input type="text" class="form-control" placeholder="Min Amount">
                           </div>
                        </div>
                     </div>
                     <div class="form-group row ">
                        <div class="col-md-12">
                           <h4 class="mt-3 header-title  text-capitalize">Delivery Hours</h4>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label class="col-md-3 col-form-label">Use My Opening Hours  </label>
                        <div class="col-md-9 mt-2">
                           <input type="checkbox" checked onchange="$('.store-pickup').toggle()" data-plugin="switchery" data-color="#5fbeaa" data-switchery="true" data-size="small" style="display: none;">
                        </div>
                     </div>
                     <div class="form-group row">
                        <label class="col-md-3 col-form-label">Enable Delivery Hours </label>
                        <div class="col-md-9 mt-2">
                           <input type="checkbox" checked onchange="$('.store-pickup').toggle()" data-plugin="switchery" data-color="#5fbeaa" data-switchery="true" data-size="small" style="display: none;">
                        </div>
                     </div>
                     <div class="form-group row ">
                        <div class="col-md-12">
                           <div class="custom-control custom-radio">
                              <input type="radio" checked="" id="customRadio7" name="customRadio" class="custom-control-input">
                              <label class="custom-control-label ml-2" for="customRadio7"> Set a fix time interval between delivery hours.
                              </label>
                           </div>
                        </div>
                     </div>
                     <div class="form-group row ">
                        <div class="col-md-6 mt-0">
                           <select class="form-control store_del_area_select" name="store_del_area" required="">
                              <option value="15">15 Minut</option>
                              <option value="30">30 Minut</option>
                              <option value="45">45 Minut</option>
                              <option value="60">60 Minut</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group row ">
                        <div class="col-md-12">
                           <div class="custom-control custom-radio">
                              <input type="radio" checked="" id="customRadio6" name="customRadio" class="custom-control-input">
                              <label class="custom-control-label ml-2" for="customRadio6">  Custom delivery time slots
                              </label>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-12">
                           <div class="card-box">
                              <div class="row">
                                 <div class="col-md-4 d-flex align-self-center">
                                    <div class="mx-auto">
                                       <i class="ion-clock  font-80 loggedin-color" aria-hidden="true"></i><br>	Service Info 
                                    </div>
                                 </div>
                                 <div class="col-md-8">
                                    <div class="p-20 time-hour-set">
                                       <?php for($i=0; $i<=6; $i++) { ?>
                                       <div class="form-row">
                                          <div class="form-group col-md-2">
                                             <button class="btn btn-default">Monday</button>
                                          </div>
                                          <div class="form-group col-md-2">
                                             <input type="checkbox" checked="" data-plugin="switchery" data-color="#5fbeaa" data-switchery="true" data-size="small" style="display: none;">
                                          </div>
                                          <div class="form-group col-md-3">
                                             <input type="text" class="form-control timepicker">
                                          </div>
                                          <div class="form-group col-md-3">
                                             <input type="text" class="form-control timepicker">
                                          </div>
                                          <div class="form-group col-md-2 mt-1">
                                             <i class="fa fa-plus loggedin-color pointer"></i>
                                          </div>
                                       </div>
                                       <?php } ?>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="form-group row ">
                        <div class="col-md-12">                         
                                <label> <i class="fa  fa-calendar mr-2 loggedin-color"></i> Custom delivery time slots <i class="fa fa-edit ml-2 loggedin-color pointer" onclick="open_modal('.custom-slotes')"></i>
                              </label>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- end card-box -->
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12 col-lg-12 col-xl-12 text-right">
            <button type="button" onclick="redirect_url('<?php echo site_url('admin/restaurant/manage_shipping'); ?>')" class="btn btn-primary cancel-btn">Cancel</button>
            <button type="button" id="frmb_Publish" class="btn btn-primary publish-btn m-l-5">Save</button>
         </div>
      </div>
      <!--page content end-->
   </div>
</div>
<input type="hidden" class="form-control" id="street_number">
<input type="hidden" class="form-control" id="route">
<input type="hidden" class="form-control" id="administrative_area_level_1">
<input type="hidden" class="form-control" id="country">
<input type="hidden" class="form-control" id="latitude">
<input type="hidden" class="form-control" id="longitude">

<div class="custom-modal-css modal fade bs-example-modal-lg custom-slotes">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Add Special Hours</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
         </div>
         <div class="modal-body">
		 
            <div class="row mt-2">			
               <div class="col-md-1">                  
                  <div class="form-group">
                     <label><i class="fa fa-calendar loggedin-color"></i></label>                      
                  </div>
               </div>
			    <div class="col-md-3">                  
                  <div class="form-group">
                      <input type="text" class="form-control datepicker">                   
                  </div>
               </div>
			    <div class="col-md-1">                  
                  <div class="form-group mt-1">
                     <input type="checkbox" checked="" data-plugin="switchery" data-color="#5fbeaa" data-switchery="true" data-size="small" style="display: none;">              
                  </div>
               </div>
			    <div class="col-md-3">                  
                  <div class="form-group">
                      <input type="text" class="form-control timepicker">                   
                  </div>
               </div>
			    <div class="col-md-3">                  
                  <div class="form-group">
                      <input type="text" class="form-control timepicker">                   
                  </div>
               </div>
			    <div class="col-md-1">                  
                  <div class="form-group mt-1">
                     <label><i class="fa fa-plus loggedin-color pointer"></i></label>                      
                  </div>
               </div>
            </div>			
	      <div class="row mt-2">			
              <div class="col-md-12">                  
                  <div class="form-group">
				  <a href="javascript:void(0)">+ Add Row</a>
				  </div>
			</div>
	</div>
			
			
         </div>
         <div class="modal-footer text-right">
            <button type="button" class="btn btn-default save-btn">Save</button>
         </div>
      </div>
   </div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyANnatdMrgEcUnbDBAijOx_PHax0Z3MQTo&libraries=places&callback=initialize" async defer></script>
<script src="<?php echo base_url('assets/custom/js/google.js'); ?>"></script>
<script src="<?php echo base_url('assets/custom/js/restaurant.js'); ?>"></script>