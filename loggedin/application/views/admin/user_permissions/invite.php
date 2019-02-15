<!-- container start -->
<div class="content">
   <!-- container-fluid start -->
   <div class="container-fluid">
      <!-- Page-Title start code  -->
      <div class="row">
         <div class="col-sm-12 m-b-20">
            <h4 class="page-title page_title">Invite User</h4>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
               <li class="breadcrumb-item active">Invite User</li>
            </ol>
         </div>
      </div>
      <!-- Page-Title end code  -->   
      <!--this code for Consultant form-->
      <form action="">
         <div class="row">
            <div class="col-lg-9">
               <div class="row">
                  <div class="col-12">
                     <!-- strat card-box -->
                     <div class="card-box">
                        <div class="col-lg-12">
                           <div class="form-group mb-3 redstar">
                              <label for="simpleinput">Bulk Email </label> (Press ' Enter ' after every email)
                              <textarea type="email"  name="example-email" class="form-control" placeholder="example@gmail.com"></textarea>
                           </div>
                           <div class="form-group mb-3">
                              <label for="example-email">Check All</label>
							  <label for="example-email" class="pull-right redstar"><label>Permissions</label></label>
                              <ul class="list-group m-t-10">
                                 <li class="list-group-item">
                                    <div class="material-switch pull-left">
                                       <input type="checkbox" value="1" name="permission[]" id="checkItem" autocomplete="nope">
                                       <label for="someSwitchOptionDefault" class="label-default"></label>
                                    </div>
                                    Forms                                    
                                 </li>
                                 <li class="list-group-item">
                                    <div class="material-switch pull-left">
                                       <input type="checkbox" value="2" name="permission[]" id="checkItem" autocomplete="nope">
                                       <label for="someSwitchOptionDefault" class="label-default"></label>
                                    </div>
                                    Booking                                    
                                 </li>
                                 <li class="list-group-item">
                                    <div class="material-switch pull-left">
                                       <input type="checkbox" value="3" name="permission[]" id="checkItem" autocomplete="nope">
                                       <label for="someSwitchOptionDefault" class="label-default"></label>
                                    </div>
                                    Shop                                    
                                 </li>
                                 <li class="list-group-item">
                                    <div class="material-switch pull-left">
                                       <input type="checkbox" value="5" name="permission[]" id="checkItem" autocomplete="nope">
                                       <label for="someSwitchOptionDefault" class="label-default"></label>
                                    </div>
                                    Invoice                                    
                                 </li>
                                 <li class="list-group-item">
                                    <div class="material-switch pull-left">
                                       <input type="checkbox" value="6" name="permission[]" id="checkItem" autocomplete="nope">
                                       <label for="someSwitchOptionDefault" class="label-default"></label>
                                    </div>
                                    Apartment Rental                                    
                                 </li>
                                 <li class="list-group-item">
                                    <div class="material-switch pull-left">
                                       <input type="checkbox" value="7" name="permission[]" id="checkItem" autocomplete="nope">
                                       <label for="someSwitchOptionDefault" class="label-default"></label>
                                    </div>
                                    Restaurants                                    
                                 </li>
                                 <li class="list-group-item">
                                    <div class="material-switch pull-left">
                                       <input type="checkbox" value="8" name="permission[]" id="checkItem" autocomplete="nope">
                                       <label for="someSwitchOptionDefault" class="label-default"></label>
                                    </div>
                                    Chat                                    
                                 </li>
                                 <li class="list-group-item">
                                    <div class="material-switch pull-left">
                                       <input type="checkbox" value="9" name="permission[]" id="checkItem" autocomplete="nope">
                                       <label for="someSwitchOptionDefault" class="label-default"></label>
                                    </div>
                                    Extension                                    
                                 </li>
                                 <li class="list-group-item">
                                    <div class="material-switch pull-left">
                                       <input type="checkbox" value="10" name="permission[]" id="checkItem" autocomplete="nope">
                                       <label for="someSwitchOptionDefault" class="label-default"></label>
                                    </div>
                                    Payment                                    
                                 </li>
                                 <li class="list-group-item">
                                    <div class="material-switch pull-left">
                                       <input type="checkbox" value="11" name="permission[]" id="checkItem" autocomplete="nope">
                                       <label for="someSwitchOptionDefault" class="label-default"></label>
                                    </div>
                                    Consultant                                    
                                 </li>
                                 <li class="list-group-item">
                                    <div class="material-switch pull-left">
                                       <input type="checkbox" value="13" name="permission[]" id="checkItem" autocomplete="nope">
                                       <label for="someSwitchOptionDefault" class="label-default"></label>
                                    </div>
                                    User help                                    
                                 </li>
                                 <li class="list-group-item">
                                    <div class="material-switch pull-left">
                                       <input type="checkbox" value="14" name="permission[]" id="checkItem" autocomplete="nope">
                                       <label for="someSwitchOptionDefault" class="label-default"></label>
                                    </div>
                                    Capture &amp; Refund Payment                                     
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <!-- end card-box -->
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-9">
               <div class="form-group text-right m-b-0">
                  <button onclick="redirect_url('<?php echo site_url('admin/permissions'); ?>')" class="btn btn-primary waves-effect waves-light save-cancel-btn" type="button">
                  Cancel
                  </button>
                  <button type="reset" class="btn btn-secondary publish-btn waves-effect m-l-5">
                  Invite User
                  </button>
               </div>
            </div>
         </div>
      </form>
      <!-- Consultant form code end -->
   </div>
   <!-- container-fluid start -->
</div>
<!-- container end-->