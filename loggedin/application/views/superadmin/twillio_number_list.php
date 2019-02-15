<div class="content">
  <div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
      <div class="col-sm-12">
        <h4 class="page-title">Loggedin App</h4>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Consultant</a></li>
          <li class="breadcrumb-item active">Consultant section</li>
        </ol>

      </div>
    </div>
     <div id="msg" style="display:none;background-color:red;width:100%;margin:5px auto;text-align:center;color:white;padding:1%;"></div>

     <input type="hidden" name="URL" id="URL" value="<?php echo site_url('/superadmin/Consultant/Get_twillioNumber_Detail')?>">
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
           
          </div>
        </div>
         
        <table class="table table-lg table-hover">
                                    <thead>
									<tr>
									<td colspan="3"><h4>Purchased Number Detail</h4>
</td>
									<td><span><button class="btn btn-success checkall" onclick="$('#add_numberModal').modal('show');"> Add Number</button> <span>
                                </span></span></td>
									</tr>
                                        <tr>
                                            <th>Sr No</th>
                                            <th>Twilio Number</th>
                                            <th>Create Date</th>
                                            <th>Action</th>
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

  <div class="modal modal-box-2 fade show add_new_number" id="add_numberModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog">
                <div class="modal-content" id="myModalLabel">
                    <div class="modal-header theme-bg">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    </div>
                    <div class="modal-body">
                        <h3>Add New <span>Number</span></h3>
                        <form name="sentMessage" id="add_purchaed_twilio_number" class="contactForm">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="date" autocomplete="off"  placeholder="Enter date" value="<?php echo date('d-m-Y');  ?>" id="datepicker" readonly="">
                                        <p class="help-block text-danger"></p>
                                    </div> 
                                    <div class="form-group">
                                        <input type="text" class="form-control numeric" autocomplete="off" id="new_twnumber" name="number" placeholder="Enter number" >
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-lg-12 text-center">
                                    <div id="success-msg"> </div>
                                    <button type="button" class="btn btn-success" id="add_twilio_number">Add Number</button>
                                   <button type="button" class="btn btn-gredient" data-dismiss="modal">Close</button>
                                   
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>   
		
<!---------Edit Model--------------->	

		<div id="updateModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header theme-bg">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				
			  </div>
			  <div class="modal-body">
                        <h3>Update <span>Number</span></h3>
                        <form name="sentMessageUpdate" id="" class="contactForm">
						<input type="hidden" name="upid" id="upid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="date" id="twdate" autocomplete="off"  placeholder="Enter date" value="<?php echo date('d-m-Y');  ?>" id="datepicker" readonly="">
                                        <p class="help-block text-danger"></p>
                                    </div> 
                                    <div class="form-group">
                                        <input type="hidden" name="twnumber_id" id="twnumber_id">
                                        <input type="text" class="form-control numeric" autocomplete="off"  name="number" id="twnumber" placeholder="Enter number" value="">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-lg-12 text-center">
                                    <div id="success-msg"> </div>
                                    
                                   
                                </div>
                            </div>
                        </form>
                    </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-success update_twilio_number" id="update_number">Update</button>
                                   <button type="button" class="btn gredient-btn" data-dismiss="modal">Close</button>
			  </div>
			</div>

		  </div>
		</div>
		<script>
function box_confirm(frmid,msg){
			swal({
        title: "Are you sure?",
  text: msg,
  icon: "warning",
  buttons: true,
   dangerMode: true,
    }).then(function (result) {
		if(result) {
		document.getElementById(frmid).submit();
		
		}
    });
		}
		 $(document).ready(function(){
			 $(".editLink").click(function(){
                $("#updateModal").modal('show');
				 var id = $(this).attr("id");
				 $.ajax({
					 url:"<?php echo site_url()?>/superadmin/consultant/editConsultantNumber",
					 method:"POST",
                     data: {'mode':'get_number', 'id':id},
					 success:function(res)
					 {
                         $("#updateModal").modal('hide');
						 $("#twnumber").val(res);
                         $("#twnumber_id").val(id);
                         
					 }
				 })
			 });
             $("#update_number").click(function(){

                $("#updateModal").modal('hide');
                number    = $("#twnumber").val();
                number_id = $("#twnumber_id").val();
                $.post("<?php echo site_url()?>/superadmin/consultant/editConsultantNumber", {'mode':'update_number','nid':number_id, 'numbr':number}, function(res)
                {
                    if(res==1)
                    {
                      $("#msg").css("background-color","green");
                      $("#msg").html('Number successfully updated.').fadeIn(2000);
                      $("#msg").fadeOut(3000,function(){
                       window.location.reload();
                      });
                    }
                    else
                    {
                        $("#msg").html('Something went wrong.').fadeIn(2000);
                      $("#msg").fadeOut(3000);
                    }
                })

             })
   $("#add_twilio_number").click(function(){
    $("#add_numberModal").modal('hide');
      twnumber    = $("#new_twnumber").val();
      url = $("#BaseURL").val();
      $.post(url+'/superadmin/consultant/addConsultantNumber',{'mode':'add_consultant_number', 'new_number':twnumber}, function(res){
        if(res==1)
                    {
                      $("#msg").css("background-color","green");
                      $("#msg").html('Number successfully added.').fadeIn(2000);
                      $("#msg").fadeOut(3000,function(){
                       window.location.reload();
                      });
                    }
                    else
                    {
                        $("#msg").html('Something went wrong.').fadeIn(2000);
                      $("#msg").fadeOut(3000);
                    }
      });

   })

		 });
		
		</script>
	

<script type="text/javascript">
    
    ajax_pagination(1,$('#searching').val());
  </script>