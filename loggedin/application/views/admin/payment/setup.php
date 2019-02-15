<div class="content">
   <div class="container-fluid">
      <!-- Page-Title -->
      <div class="row main_heading_row">
         <div class="col-md-12 col-lg-12 col-xl-7">
            <h4 class="page-title">Stripe Account Setup Process</h4>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
               <li class="breadcrumb-item active">Stripe Account Setup Process</li>
            </ol>
         </div>
      </div>
      <!--page title end-->
      <!--dashboard box start-->
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-body">
                  <div class="row">
                     <div class="col-lg-3">
                        <div class="form-group">
                           <label for="simpleinput">Business Name</label>
                        </div>
                     </div>
                     <div class="col-lg-9">
                        <div class="form-group">
                           <label for="example-range">B james</label>
                        </div>
                     </div>
                     <div class="col-lg-3">
                        <div class="form-group">
                           <label for="simpleinput">Name</label>
                        </div>
                     </div>
                     <div class="col-lg-9">
                        <div class="form-group">
                           <label for="example-range">James test</label>
                        </div>
                     </div>
                     <div class="col-lg-3">
                        <div class="form-group">
                           <label for="simpleinput">Email</label>
                        </div>
                     </div>
                     <div class="col-lg-9">
                        <div class="form-group">
                           <label for="example-range">Testloggedin@gmail.com</label>
                        </div>
                     </div>
                     <div class="col-lg-3">
                        <div class="form-group">
                           <label for="simpleinput">Statement Descriptor</label>
                        </div>
                     </div>
                     <div class="col-lg-9">
                        <div class="form-group">
                           <label for="example-range">B james test</label>
                        </div>
                     </div>
                     <div class="col-lg-3">
                        <div class="form-group">
                           <label for="simpleinput">Create Date</label>
                        </div>
                     </div>
                     <div class="col-lg-9">
                        <div class="form-group">
                           <label for="example-range">11-29-2018 11:54 am</label>
                        </div>
                     </div>
                     <div class="col-lg-3">
                        <div class="form-group">
                           <label for="simpleinput">Account Id</label>
                        </div>
                     </div>
                     <div class="col-lg-9">
                        <div class="form-group">
                           <label for="example-range">Acct_1DbixJD8UTEAz5mU</label>
                        </div>
                     </div>
                     <div class="col-lg-3">
                        <div class="form-group">
                           <label for="simpleinput">Access Token</label>
                        </div>
                     </div>
                     <div class="col-lg-9">
                        <div class="form-group">
                           <label for="example-range">Sk_test_8viSTwZgXzFudfvjzOoV2i1w</label>
                        </div>
                     </div>
                     <div class="col-lg-3">
                        <div class="form-group">
                           <label for="simpleinput">Publish Key</label>
                        </div>
                     </div>
                     <div class="col-lg-9">
                        <div class="form-group">
                           <label for="example-range">Pk_test_7K57TA5ANuchNRr8YRf59Lqs</label>
                        </div>
                     </div>
                     <div class="col-lg-3">
                        <div class="form-group">
                           <label for="simpleinput">Charge Type</label>
                        </div>
                     </div>
                     <div class="col-lg-9">
                        <div class="form-group">
                           <label for="example-range">Manual Capture </label>
                           <i class="ti-pencil-alt m-l-10 pointer" onclick="open_modal('.capture_payment')"></i>
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
<!-- modal popup code start-->
<div class="custom-modal-css modal fade bs-example-modal-lg capture_payment">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Charge Type</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
         </div>
         <div class="modal-body">
             <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                     <label for="field-1" class="control-label">Statement Descriptor  (This name will appear on customer credit card statment.)</label>
                     <input type="text" class="form-control" id="field-1" placeholder="John">
                     <p>Statement descriptors are limited to between 5 and 22 characters. They must contain at least 5 letters and cannot use the special characters <, >, \, ', or "</p>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                     <input type="radio" name="capture">
                     <label  >Check this custom checkbox</label>	 
                     <p>No need to capture payments manually funds will automatically go into your accoun</p>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                     <input type="radio" name="capture">
                     <label>Manual Capture</label>	 
                     <p>Funds will expire after 7 days if you don't manually capture them within that time period. Recommended only if you have high refund rate.</p>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="form-group text-center">
                     <button class="btn btn-primary save-btn">Submit</button>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                     <label>Note:</label>	 
                     <p>The original credit card processing fees are not returned to your merchant account when issuing a refund after funds are captured.</p>
                  </div>
               </div>
            </div>
		</div>
         <div class="modal-footer text-left">
            <button type="button" class="btn btn-default save-btn">Save</button>
         </div>
      </div>
   </div>
</div>
<!-- modal popup code end-->