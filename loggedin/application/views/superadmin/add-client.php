<div class="content">
	<div class="container-fluid">
		<!-- Page-Title -->
		<div class="row">
			<div class="col-sm-12">
				<h4 class="page-title">Loggedin App</h4>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?php echo site_url('superadmin/dashboard');?>">Dashboard</a></li>
					<li class="breadcrumb-item active">Client</li>
				</ol>

			</div>
		</div>
		
		<div class="row">
			<div class="col-md-12">
                          <?php  msg_alert(); ?>
				<div class="card-box">
					<form method="post" action="" autocomplete="off" enctype="multipart/form-data" id="client_add" class="add">
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="inputEmail4" class="col-form-label">First Name</label>
								<input type="text" class="form-control" name="fname" placeholder="First Name" autocomplete="false" title="First name is required" required>

							</div>
							<div class="form-group col-md-6">
								<label for="inputPassword4" class="col-form-label">Last Name</label>
								<input type="text" class="form-control" name="lname" placeholder="Last Name" autocomplete="false">
							</div>
							
						</div>
						
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="inputPassword4" class="col-form-label">Business Name</label>
								<input type="text" class="form-control" name="bname" placeholder="Business Name" autocomplete="false" title="Business name is required" required>
							</div>
							<div class="form-group col-md-6">
								<label for="inputEmail4" class="col-form-label">Business Mobile</label>
								<input type="text" class="form-control" name="bmobile" placeholder="Business Mobile" autocomplete="false" title="Business phone number is required" required="">
							</div>
						</div>
						
						<div class="form-row">
							<div class="form-group col-md-4">
								<label for="inputPassword4" class="col-form-label">Client Email</label>
								<input type="text" class="form-control" name="cemail" placeholder="Client Email" autocomplete="false" title="Client email address is required" required="">
							</div>
							<div class="form-group col-md-4">
								<label for="inputPassword4" class="col-form-label">Client Mobile</label>
								<input type="text" class="form-control" name="cmobile" placeholder="Client Mobile" autocomplete="false" title="Client mobile number is required" required="">
							</div>
							<div class="form-group col-md-4">
								<label for="inputPassword4" class="col-form-label">Password</label>
								<input type="password" class="form-control" name="password" placeholder="Password" autocomplete="false">
							</div>
							
						</div>
						
						<div class="form-row">
							<div class="form-group col-md-4">
								<label for="inputState" name="countrycode" class="col-form-label">Country Code</label>
								<select class="form-control" name="country">
									
									<?php foreach($countries as $allcountry)
									{ ?>
									<option value="<?php echo $allcountry["name"]." "."(+".$allcountry["phonecode"].")";?>"><?php echo $allcountry["name"]." "."(+".$allcountry["phonecode"].")";?></option>
								<?php } ?>
								</select>
							</div>
							<div class="form-group col-md-4">
								<label for="inputPassword4" class="col-form-label">Profile Picture</label>
								<input type="file" class="form-control" name="profile_pic">
							</div>
							
							<div class="form-group col-md-4">
								<label for="inputPassword4" class="col-form-label">Cover Picture</label>
								<input type="file" class="form-control" name="cover_pic">
							</div>
							<div class="form-group">
									<div class="row">
										<label for="example-text-input" class="col-3 col-form-label">LoggedIn Fees</label>
											<br>
											<div class="col-9">
											<div class="row">
												<?php  foreach($fees as $row){ 
                                                    $select1 = '';
                                                    $select2 = '';
                                                    $amoun  =  '';
                                                    if($row['name']== "Apartment Rental")
                                                    {
                                                    	$select1 = "selected";
                                                    	$amoun  =  '3';
                                                    }else if($row['name']== "Shop")
                                                    {
                                                    	$select2 = "selected";
                                                    	$amoun  =  '0.50';
                                                    }
                                                    else if($row['name']== "Invoice")
                                                    {
                                                    	$select2 = "selected";
                                                    	$amoun  =  '0.50';
                                                    }
                                                    else if($row['name']== "Restaurants")
                                                    {
                                                    	$select1 = "selected";
                                                    	$amoun  =  '5';
                                                    }
                                                    else if($row['name']== "Consultant")
                                                    {
                                                    	$select1 = "selected";
                                                    	$amoun  =  '3';
                                                    }
                                                    else if($row['name']== "Booking")
                                                    {
                                                    	$select2 = "selected";
                                                    	$amoun  =  '0.50';
                                                    }

												 ?>
													<div class="col-4">
													<span class="list-group-item" style="padding: 6px;"> <?php echo $row['name']; ?></span>
												</div>
                                                     <input type="hidden" name="module[]" value="<?php echo $row['id']; ?>">
                                                     <div class="col-4">
													<select name="payment_type[]" class="form-control">
													
													 <option value="fixed_amount" <?php echo $select2;?>> Fixed amount($)</option>
													  <option value="in_persantage" <?php echo $select1;?>> Percentage(%)</option>
													 </select>
													</div>
													<div class="col-4">
													<input type="number"  name="discount[]" value="<?php echo $amoun;?>" step="any" class="form-control" min="0" >
												</div>
													 
												<?php   }   ?>	
												</div>
												
											</div>
									</div>
								</div>
								<br>
							<div class="col-lg-12 col-md-12">
								<h4 class="m-t-0 header-title"><b>Permission</b></h4>
								<div class="checkbox checkbox-single client_add" style="border-bottom: #ccc5c5 1px solid;margin-bottom: 8px;">
									<input type="checkbox" id="checkAll">
									<label style="width: 100%;padding-left: 25px;">Check All</label>
								</div>
									
							<?php foreach($res as $row){  ?>
								<div class="checkbox checkbox-single">
									<input type="checkbox" class="select_modules" value="<?php echo $row['id']; ?>" name="permission[]">
									<label style="width: 100%;padding-left: 25px;"><?php echo $row['name']; ?></label>
								</div>
							<?php   }   ?>	
							</div> 
							
						</div>
						
						
						
						<button type="submit" class="btn btn-primary" id="btnSubmit">Sign in</button>
					</form>
				</div>
			</div>
		</div>
		 
		
	</div>
    </div>
 