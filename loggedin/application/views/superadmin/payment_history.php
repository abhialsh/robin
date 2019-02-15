<div class="content">
	<div class="container-fluid">
		<!-- Page-Title -->
		<div class="row">
			<div class="col-sm-12">
				<h4 class="page-title">Loggedin App</h4>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?php echo site_url('superadmin/stripe');?>">Stripe Section</a></li>
					<li class="breadcrumb-item active">Payment History</li>
				</ol>

			</div>
		</div>
		<input type="hidden" name="URL" id="URL" value="<?php echo site_url('/superadmin/Stripe/get_payment_history')?>">
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
					<table class="table table-striped add-edit-table" id="datatable-editable">
						<thead>
							<tr>
								<th>#</th>
								<th>Date</th>
								<th>Retailer Name</th>
								<th>Order No</th>
								<th>Amount</th>
								<th>Transaction Status</th>
								<th>Transaction For</th>
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