<div class="content">
	<div class="container-fluid">
		<!-- Page-Title -->
		<div class="row">
			<div class="col-sm-12">
				<h4 class="page-title">Loggedin App</h4>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?php echo site_url('superadmin/dashboard');?>">Dashboard</a></li>
					<li class="breadcrumb-item active">permission</li>
				</ol>

			</div>
		</div>
		
		<div class="row">
		<div class="col-sm-12">

			<div class="card-box">

				<table class="table table-striped add-edit-table" id="datatable-editable">
					<thead>
					<tr>
						<th>Name</th>
						<th>Description</th>
						<th>Module Status</th>
						<th>Payment Status</th>
						<th>Create Date</th>
						<th>Actions</th>
					</tr>
					</thead>
					<tbody>
				<?php foreach($record as $row){ ?>
					<tr class="gradeX">
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['description']; ?></td>
						<td>
							<?php if($row['status'] == 1){
								$act = "style='display:block;' ";
								$dct = "style='display:none;' ";
							}
							else
							{
								$act = "style='display:none;' ";
								$dct = "style='display:block;' ";
							}?>
							<button class="btn btn-success <?php echo 'act'.$row['id'];?>" id="<?php echo $row['id']; ?>" <?php echo $act; ?> onclick="client_type($(this).attr('id'),0,'module_status')">Active</button>

							<button class="btn btn-warning <?php echo 'dct'.$row['id'];?>" id="<?php echo $row['id']; ?>" <?php echo $dct; ?> onclick="client_type($(this).attr('id'),1,'module_status')">Deactive</button>
						</td>
						<td>
							<?php 
							if($row['payment_status'] == 1)
							{
								$act = "style='display:block;' ";
								$dct = "style='display:none;' ";
							}
							else
							{
								$dct = "style='display:block;' ";
								$act = "style='display:none;' ";
							} ?>
							<button class="btn btn-success <?php echo $row['id'].'act'; ?>" <?php echo $act; ?> id="<?php echo $row['id']; ?>" onclick="client_type($(this).attr('id'), 0, 'update_payment_status')">Active</button>
							<button class="btn btn-warning <?php echo $row['id'].'dct'; ?>" <?php echo $dct; ?> id="<?php echo $row['id']; ?>" onclick="client_type($(this).attr('id'), 1, 'update_payment_status')">Deactive</button>
						</td>
						<td><?php echo date('m-d-Y h:i a',$row['modifydate']); ?></td>
						
						<td class="actions">
							<a href="<?php echo site_url('superadmin/permission/editPermission/'.$row['id']);?>" class="on-default edit-row" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
						</td>
					</tr>
				<?php   }    ?>	
					</tbody>
				</table>
			</div>
		</div>
		<!-- end: page -->

	</div>
		
	</div>