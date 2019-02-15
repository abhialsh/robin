<?php
  $client_data = $client_data[0];
  if(count($check_permission)!=0){
    $check_permission =  explode(",", $check_permission[0]['permission']);
   }
  $country   =  $country;
 ?>
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
				<div class="card-box">
					<form method="post" action="<?php echo site_url()?>/superadmin/Client/updateClient/<?php echo $client_data["id"]; ?>" autocomplete="off" enctype="multipart/form-data" id="client_add" class="add">
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="inputEmail4" class="col-form-label">First Name</label>
								<input type="text" class="form-control" name="fname" value="<?php echo $client_data["name"]; ?>" placeholder="First Name" autocomplete="false" title="First name is required" required>

							</div>
							<div class="form-group col-md-6">
								<label for="inputPassword4" class="col-form-label">Last Name</label>
								<input type="text" class="form-control" name="lname"  value="<?php echo $client_data["last_name"]; ?>" placeholder="Last Name" autocomplete="false">
							</div>
							
						</div>
						
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="inputPassword4" class="col-form-label">Business Name</label>
								<input type="text" class="form-control" name="bname" value="<?php echo $client_data["business_name"]; ?>"  placeholder="Business Name" autocomplete="false" title="Business name is required" required>
							</div>
							<div class="form-group col-md-6">
								<label for="inputEmail4" class="col-form-label">Business Mobile</label>
								<input type="text" class="form-control" name="bmobile" value="<?php echo $client_data["business_phone"]; ?>"  placeholder="Business Mobile" autocomplete="false" title="Business phone number is required" required="">
							</div>
						</div>
						
						<div class="form-row">
							<div class="form-group col-md-4">
								<label for="inputPassword4" class="col-form-label">Client Email</label>
								<input type="text" class="form-control" name="cemail" value="<?php echo $client_data["email"]; ?>"  placeholder="Client Email" autocomplete="false" title="Client email address is required" required="" readonly>
							</div>
							<div class="form-group col-md-4">
								<label for="inputPassword4" class="col-form-label">Client Mobile</label>
								<input type="text" class="form-control" name="cmobile" value="<?php echo $client_data["contact"]; ?>"  placeholder="Client Mobile" autocomplete="false" title="Client mobile number is required" required="">
							</div>
							<div class="form-group col-md-4">
								<label for="inputPassword4" class="col-form-label">Password</label>
								<input type="text" class="form-control" name="password" placeholder="Password" autocomplete="false" value="<?php echo $client_data["password"]; ?>">
							</div>
							
						</div>
						
						<div class="form-row">
							<div class="form-group col-md-4">
								<label for="inputState" name="countrycode" class="col-form-label">Country Code</label>
								<select class="form-control" name="country">
									
									<?php foreach($country as $allcountry)
									{ ?>
                                    <option value="<?php echo $allcountry["name"]." "."(+".$allcountry["phonecode"].")";?>" 
                                      <?php echo  ($client_data['country'] == $allcountry["name"])? "selected" : ""; ?>
                                     >
                                     <?php echo $allcountry["name"]." "."(+".$allcountry["phonecode"].")";?>
                                     </option>

									
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
							<div class="form-group col-md-4">
								<!-- empty Div-->
							</div>
							<div class="form-group col-md-4">
								
								<img src="<?php echo (!empty($client_data["profile_dp"])? base_url('uploads/admin/profile/thumb/'. $client_data["profile_dp"]) :base_url('uploads/default_img.png')); ?>">
							</div>
							<div class="form-group col-md-4">
								<img src="<?php echo (!empty($client_data["cover_image"])? base_url('uploads/admin/cover/thumb/'. $client_data["cover_image"]) : base_url('uploads/default_img.png')) ;?>"/>
							</div>
							<div class="form-group">
									<div class="row">
										<label for="example-text-input" class="col-3 col-form-label">LoggedIn Fees</label>
											
											<div class="col-9">
											<div class="row">
												<?php 
												foreach($fees as $row){
													$discount = "";
													$paymenttype = "";
													for($z=0;$z<count($charge);$z++){
														if(!empty($charge[$z])){
															if($charge[$z][0]['module_id'] == $row['id']){
																$discount = $charge[$z][0]['discount'];
																$paymenttype = $charge[$z][0]['payment_type'];
															}
														}
													}

												 ?>
													<div class="col-4">
														<span class="list-group-item" style="padding: 6px;"> <?php echo $row['name']; ?></span>
													</div>
                                                     <input type="hidden" name="module[]" value="<?php echo $row['id']; ?>">
                                                     <div class="col-4">
													<select name="payment_type[]" class="form-control">
													
													 <option value="fixed_amount" <?php if($paymenttype == "fixed_amount"){ echo "selected"; } ?>> Fixed amount($)</option>
													 <option value="in_persantage" <?php if($paymenttype == "in_persantage"){ echo "selected"; } ?>> Percentage(%)</option>
													 </select>
													</div>
													<div class="col-4">
													<input type="number"  name="discount[]" value="<?php echo $discount; ?>" step="any" class="form-control" min="0" >
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
									<input type="checkbox" class="select_modules" value="<?php echo $row['id']; ?>" name="permission[]" <?php echo (in_array($row['id'], $check_permission))? "checked":"" ?>>
									<label style="width: 100%;padding-left: 25px;"><?php echo $row['name']; ?></label>
								</div>
							<?php   }   ?>	
							</div> 
							
						</div>
						
						
						
						<button type="submit" class="btn btn-primary" id="btnSubmit">Update</button>
					</form>
				</div>
			</div>
		</div>
		 
		
	</div>
 