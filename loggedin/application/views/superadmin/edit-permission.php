<div class="content">
	<div class="container-fluid">
		<!-- Page-Title -->
		<div class="row">
			<div class="col-sm-12">
				<h4 class="page-title">Loggedin App</h4>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?php echo site_url('superadmin/dashboard');?>">Dashboard</a></li>
					<li class="breadcrumb-item active">Permission</li>
				</ol>

			</div>
		</div>
		<?php foreach($record as $row){ ?>
		<div class="row">
			<div class="col-md-12">
				<div class="card-box">
					<form method="post" action="<?php echo site_url()?>/superadmin/permission/editPermissionData" autocomplete="off" id="client_add" class="add">
					<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
						<div class="form-row">
							<div class="form-group col-md-6">
								<label class="col-form-label">Permission Name</label>
								<input type="text" class="form-control" name="name" placeholder="Permission Name" autocomplete="false" title="Permission Name is required" value="<?php echo $row['name']; ?>" required>

							</div>
							<div class="form-group col-md-6">
								<label class="col-form-label">Permission Description</label>
								<input type="text" class="form-control" name="description" placeholder="Permission Description" value="<?php echo $row['description']; ?>" autocomplete="false">
							</div>
							
						</div>
						<button type="submit" class="btn btn-primary" id="btnSubmit">Submit</button>
					</form>
				</div>
			</div>
		</div>
		<?php    }     ?> 
		
	</div>
 