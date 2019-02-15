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
                          <?php  
                          if($this->session->flashdata('msg_success'))
                          {
                            msg_alert();
                            header('Refresh:3; url= ' . site_url() . '/superadmin/stripe/');
                          }
                          else{
                          	msg_alert();
                          }
                          ?>
				<div class="card-box">
			<?php foreach($record as $row){ ?>
					<form method="post" action="" autocomplete="off" id="client_add" class="add">
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="inputEmail4" class="col-form-label">Name</label>
								<input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo $row['name']; ?>" autocomplete="false" required>
							</div>
							<div class="form-group col-md-6">
								<label for="inputPassword4" class="col-form-label">sk id</label>
								<input type="text" class="form-control" name="sk_id" placeholder="sk id" value="<?php echo $row['sk_id']; ?>" autocomplete="false">
							</div>
						</div>
						
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="inputPassword4" class="col-form-label">pk id</label>
								<input type="text" class="form-control" name="pk_id" placeholder="pk id" value="<?php echo $row['pk_id']; ?>" autocomplete="false" required>
							</div>
							<div class="form-group col-md-6">
								<label for="inputEmail4" class="col-form-label">ca id</label>
								<input type="text" class="form-control" name="ca_id" placeholder="ca id" value="<?php echo $row['ca_id']; ?>" autocomplete="false" required="">
							</div>
						</div>
						
						<button type="submit" class="btn btn-primary" id="btnSubmit">Sign in</button>
					</form>
			<?php   }   ?>
				</div>
			</div>
		</div>
		 
		
	</div>
    </div>
 