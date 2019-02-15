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
		<input type="hidden" name="URL" id="URL" value="<?php echo site_url('/superadmin/Order/Get_Order_Detail')?>">
		<input type="hidden" name="current_page" id="current_page" value="">
		<select id="entry" onchange="ajax_pagination('1',$('#searching').val())">
			<option value="100">100</option>
			<option value="50">50</option>
			<option value="25">25</option>
		</select>
		<input type="search" name="search" id="searching" placeholder="Search..">
 	    <input type="text" class="daterange" name="datefilter" id="datefilter" placeholder="MM/DD/YY" autocomplete="off"/> 
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
		<div class="row">	
			<div class="col-sm-12">

				<div class="card-box">
					<div class="table-responsive">
					<table class="table table-striped add-edit-table" id="datatable-editable">
						<thead>
							<tr>
								<th>#</th>
								<th>Order No</th>
								<th>Name</th>
								<th>Qty</th>
								<th>Amount</th>
								<th>Payment Type</th>
								<th>Payment Status</th>
								<th>Order Status</th>
								<th>Date</th>
								<th>Type</th>
								<th>History</th>
							</tr>
						</thead>
						<tbody class="datalist">

						</tbody>

					</table>

				</div>
				
					<div class="page_link"></div>
				</div>
			</div>
			<!-- end: page -->

		</div>
		
	</div>

	<!--  Modal content for the above example -->
	<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;" id="myModal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>

					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body">
					<div class="table-responsive table-hover">
						<table class="table" id="order_detail">

						</table>
					</div>
				</div>
				<div class="modal-footer">
                   <button type="button" class="btn btn-white waves-effect" data-dismiss="modal">Close</button>
                </div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->



	<script type="text/javascript">
		
		ajax_pagination(1,$('#searching').val());
	</script>