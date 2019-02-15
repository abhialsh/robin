<div class="content extention-page">
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
                    <div class="col-md-12">
                        <!-- strat card-box -->
                        <div class="card-box">
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Enable Store Pickup </label> 
                                <div class="col-md-10 mt-2">
                                    <input type="checkbox" checked onchange="$('.store-pickup').toggle()" data-plugin="switchery" data-color="#5fbeaa" data-switchery="true" data-size="small" style="display: none;">
                                </div> 
                            </div> 
                            <span class="store-pickup">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label class="mb-3"> Enable Store Pickup </label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" checked onclick="$('.business-address').removeClass('hide'),$('.other-address').addClass('hide')" id="customRadio2" name="customRadio" class="custom-control-input">
                                        <label class="custom-control-label ml-2" for="customRadio2">Use Business Address
                                        </label>
                                    </div>
                                </label>
                                <div class="col-9 mt-2">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio3" onclick="$('.business-address').addClass('hide'),$('.other-address').removeClass('hide')" id="customRadio2" name="customRadio" name="customRadio" class="custom-control-input">
                                        <label class="custom-control-label  ml-2" for="customRadio3">Use Other Address</label>
                                    </div>

                                </div>
                            </div>                            
                            <div class="form-group row business-address">
                                <div class="col-md-6">
                                    <label class="mb-3"> Pickup Address </label>
                                    <input type="text" class="form-control" readonly >
                                </div>
                            </div>
                            <div class="form-group row business-address">
                                <div class="col-md-3">
                                    <label class="mb-3"> City </label>
                                    <input type="text" class="form-control" readonly> 
                                </div>
                                <div class="col-md-3">
                                    <label class="mb-3"> Zip Code </label>    
                                     <input type="text" class="form-control" readonly>                         
                                </div>
                            </div>
                              <div class="form-group row other-address hide">
                                <div class="col-md-6">
                                    <label class="mb-3"> Pickup Address </label>
                                    <input type="text" class="form-control" id="auto_address">
                                </div>
                            </div>
                            <div class="form-group row other-address hide">
                                <div class="col-md-3">
                                    <label class="mb-3"> City </label>
                                    <input type="text" class="form-control" id="locality">
                                </div>
                                <div class="col-md-3">
                                    <label class="mb-3"> Zip Code </label>    
                                     <input type="text" class="form-control" id="postal_code">                         
                                </div>
                            </div>
                            <div class="form-group row store-pickup">
                                <div class="col-md-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" onclick="$('.fees').toggle()" class="custom-control-input" id="customCheck2">
                                        <label class="custom-control-label" for="customCheck2">Check this custom checkbox</label>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group row fees hide">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend ">
                                            <span class="input-group-text pt-0 pb-0">$</span>
                                        </div>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            </span>
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyANnatdMrgEcUnbDBAijOx_PHax0Z3MQTo&libraries=places&callback=initialize" async defer></script>
<script src="<?php echo base_url('assets/custom/js/google.js'); ?>"></script>
