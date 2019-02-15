<div class="content">
   <div class="container-fluid">
      <!-- Page-Title -->
	  
	  <div class="row main_heading_row">
            <div class="col-md-12 col-lg-12 col-xl-7">
                
                                 <h4 class="page-title">Payment Dashboard</h4>
                     
                
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Payment Dashboard</li>
                </ol>
            </div>
            <div class="col-md-12 col-lg-12 col-xl-5 text-right">
              
                <button type="button" class="btn btn-primary publish-btn m-l-5">View Transfers</button>
                     
            </div>
        </div>
      
	  <!--page title end-->
	  <!--dashboard box start-->
	  
 <div class="row">
<div class="col-md-6 col-lg-6 col-xl-4">
	<div class="widget-bg-color-icon card-box fadeInDown animated">
		<div class="bg-icon bg-icon-info pull-left dash_box">
			<i class="fa fa-user"></i>
		</div>
		<div class="text-right">
			<h5 class="text-dark"><b class="counter">User Name</b></h5>
			<h3 class="text-muted mb-0">James</h3>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<div class="col-md-6 col-lg-6 col-xl-4">
	<div class="widget-bg-color-icon card-box fadeInDown animated">
		<div class="bg-icon bg-icon-info pull-left dash_box">
			<i class="fa fa-dollar"></i>
		</div>
		<div class="text-right">
			<h5 class="text-dark"><b class="counter">Pending for payouts</b></h5>
			<h3 class="text-muted mb-0">$5279.28</h3>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
</div>
 
	  
	  
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-body">
                  <div class="row mb-2">
				   <div class="col-lg-1 pl-0 pr-0">
                          <div class="form-group mb-2 ">                            
                              <select type="text" class="form-control">
							  <option>100</option>
							  <option>50</option>
							  <option>25</option>
							  </select>
                           </div>
                          
                     </div>
					 <div class="col-lg-4"></div>
					 	  <div class="col-lg-3  pl-0 pr-0">
                      
                           <div class="form-group mb-2 ">                            
                              <input type="text" class="form-control input-daterange-datepicker" id="inputPassword2" placeholder="Search...">
                           </div>
                       
                     </div>
                    <div class="col-lg-1"></div>
				
					  <div class="col-lg-3  pl-0 pr-0">
                      
                           <div class="form-group mb-2 ">
                              <label for="inputPassword2" class="sr-only">Search</label>
                              <input type="search" class="form-control" id="inputPassword2" placeholder="Search...">
                           </div>
                       
                     </div>
                  </div>
                  <div class="table-responsive">
                     <table class="link-hover table-padding table table-centered mb-0" id="inline-editable">
                        <thead>
                          <tr>
                             <th>  # </th>
							  <th> Order Id </th>
							  <th> Amount	</th>
							 <th>  Stripe Fees </th>
							  <th> Loggedin Fees </th>
							  <th> Net Amount	</th>
							  <th> Date	</th>
							  <th> Status </th>
                        </tr>
                        </thead>
                        <tbody>
                           <?php for($i=1; $i<=20;$i++){ ?>
                           <tr>
                              <td>  <?php echo $i; ?> </td>
							   <td>  demo form1 </td>
							    <td>  demo form1 </td>
								 <td>  demo form1 </td>
                              <td>  demo form1 </td>
                              <td>  demo form1 </td>
                              <td>  demo form1 </td>
                              <td> <button class="btn btn-default save-btn waves-effect waves-light btn-sm" id="sa-basic">Complete</button> </td>
                           </tr>
                           <?php } ?>
                        </tbody>
                     </table>
                  </div>
                  <!-- end .table-responsive-->
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