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

		<input type="hidden" name="URL" id="URL" value="<?php echo site_url('/superadmin/Client/getClient_detail')?>">
		<input type="hidden" name="current_page" id="current_page" value="">
		<select id="entry" onchange="ajax_pagination('1',$('#searching').val(),$(this).val())">
			<option value="100">100</option>
			<option value="50">50</option>
			<option value="25">25</option>
		</select>
		<input type="search" name="search" id="searching" placeholder="Search..">
		

		<div class="row">
		<div class="col-sm-12">

			<div class="card-box">
				<div class="row">
					<div class="col-sm-12">
						<div class="m-b-30">
							<a href="<?php echo site_url('superadmin/client/addclient'); ?>"><button id="addToTable" class="btn btn-success waves-effect waves-light" style="float: right;margin-bottom: 18px;"><i class="md md-add-circle-outline"></i> Add</button></a>
						</div>
					</div>
				</div>

				<table class="table table-striped add-edit-table" id="datatable-editable">
					<thead>
					<tr>
						<th>Business Name</th>
						<th>Email</th>
						<th>Mobile</th>
						<th>Country</th>
						<th>Last Login</th>
						<th>Go To Dashboard</th>
						<th>Status</th>
						<th>Actions</th>
					</tr>
					</thead>
					<tbody class="datalist">
				 
					</tbody>
				</table>
			</div>
			<div class="page_link"></div>
		</div>
		<!-- end: page -->

	</div>
		
	</div>
	<script type="text/javascript">
		
		ajax_pagination(1,$('#searching').val());
	</script>