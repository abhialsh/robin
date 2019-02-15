<div class="content">
	<div class="container-fluid">
		<!-- Page-Title -->
		<div class="row">
			<div class="col-sm-12">
				<h4 class="page-title">Loggedin App</h4>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?php echo site_url('superadmin/stripe');?>">Stripe Section</a></li>
					<li class="breadcrumb-item active">Payment Setup</li>
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
						<th>SK Id</th>
						<th>PK Id</th>
						<th>CA Id</th>
						<th>Update date</th>
						<th>Actions</th>
					</tr>
					</thead>
					<tbody>
				<?php foreach($record as $row){ ?>
					<tr class="gradeX">
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['sk_id']; ?></td>
						<td><?php echo $row['pk_id']; ?></td>
						<td><?php echo $row['ca_id']; ?></td>
						<td><?php echo date("m-d-Y",$row['date']); ?></td>
						<td class="actions">
							<a href="<?php echo site_url()?>/superadmin/stripe/editStripe/<?php echo $row['id']; ?>" class="on-default edit-row" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
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