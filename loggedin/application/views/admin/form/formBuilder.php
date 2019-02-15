<!--start content start code-->
<div class="content">
    <!--container-fluid start code-->
    <div class="container-fluid">
        <!-- Page-Title code start-->
        <div class="row main_heading_row">
            <div class="col-md-12 col-lg-12 col-xl-7">

                <?php if ($formId) { ?>
                    <h2 class="page-title">Edit Form</h2>
                <?php } else { ?>
                    <h4 class="page-title">Add Form Fields (Untitled form)</h4>
                <?php } ?> 

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('admin/dashboard/'); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo site_url('admin/form/'); ?>">Forms</a></li>
                    <li class="breadcrumb-item active">Add Form Fields (Untitled form)</li>
                </ol>
            </div>
            <div class="pull-right col-md-12 col-lg-12 col-xl-5 text-right">
                <?php if ($formId) { ?>
                    <a href="<?php echo site_url('admin/form/formRender/' . $formId); ?>" class="btn btn-default save-cancel-btn" id="view_form_btn">View Form </a>
                <?php } ?> 
                <button type="button"  id="frmb_save" class="btn btn-primary save-cancel-btn">Save</button>
                <button type="button" id="frmb_Publish" class="btn btn-primary publish-btn m-l-5">Submit</button>
                <?php if ($formId) { ?>
                    <button onclick="open_modal('.delete-form');" type="button" class="btn btn-danger danger-delete-btn">Delete</button>     
                <?php } ?> 
            </div>
        </div>
        <!-- Page-Title code end-->
        <!-- Page-content code start-->

        <?php
        if (isset($details) && $details && $details->form_name) {
            // print_R($details);
            $form_name = $details->form_name;
            $form_data = $details->form_data;

            $form_descr = $details->form_descr;
            $limit_status = $details->limit_status;
            $edit_status = $details->edit_status;
        } else {
            $form_name = $form_descr = $limit_status = '';
            $form_data = $edit_status = '';
        }
        ?>
        <form  id="formbuliler_form" method="post">
            <div class="row">
                <div class="col-12">
                    <div id="resajmsg"></div>
                    <div class="card-box">
                        <div class="form-row">
                            <div class="form-group redstar col-md-6">
                                <label for="inputEmail4" class="col-form-label">Form Name</label>
                                <input type="text" class="form-control"  value ="<?php echo ucfirst($form_name) ?>"  id="form_name" name="form_name" placeholder="Form Name" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group redstar col-md-10">
                                <label for="inputAddress" class="col-form-label">Address</label>
                                <textarea class="form-control" id="form_descr" name ="form_descr"   placeholder="Type your text here..."><?php echo $form_descr ?></textarea>
                            </div>
                        </div>
                        <div class="form-group m-t-20">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="1" name="limit_status" <?php
                                    if ($limit_status == 1) {
                                        echo "checked";
                                    }
                                    ?> id="limitstatus">
                                    Limit To 1 Response
                                </label>
                            </div>
                        </div>
                        <div class="form-group m-t-30">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="1" name="edit_status" id="editstatus" <?php
                                    if ($edit_status == 1) {
                                        echo "checked";
                                    }
                                    ?>> Edit After Submit    
                                </label>
                            </div>
                        </div>
                        <h4 class="m-t-0 header-title m-t-30">FORM FIELDS</h4>
                        <p class="text-muted m-b-30 font-14">
                            The user profile name, phone number and email will be shared automatically when they submit a form response.
                            There's no need to request that information unless you are asking about third party.
                        </p>
                        <!--                    <div class="build-wrap"></div>-->
                        <div   class="build-wrap"></div>
                        <form class="render-wrap"></form>
                        <button class = "btn btn-default"  id="edit-form">Edit Form</button>
                        <input type="hidden" name="form_id" id="form_id" value="<?php echo $formId; ?>"/>
                        <textarea rows="4" cols="50" id="form_data"><?php echo $form_data; ?></textarea>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="pull-right m-t-15">
                                <button type="button" onclick="$('#frmb_save').click()"   class="btn btn-primary save-cancel-btn">Save</button>
                                <button type="button" onclick="$('#frmb_Publish').click()" class="btn btn-primary publish-btn m-l-5">Publish</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Page-content code end-->
    </div>
    <!-- container-fluid end code-->
</div>
<!--start content end code-->

<!--delete model form start-->
<div  class="modal fade bs-example-modal-sm delete-form" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="mySmallModalLabel">Are you sure you want to delete this form?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
              <p>The result page will also be deleted.</p>
              <p> If you need to deactivate this form please go to dashboard page. </p>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger btn-ok" onclick="deleteformdata()">Delete</a>
                </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
 
<!--delete model form end-->
<script src="<?php echo base_url('assets/formBuilder/'); ?>assets/js/vendor.js"></script>
<script src="<?php echo base_url('assets/formBuilder/'); ?>assets/js/form-builder.min.js"></script>
<script src="<?php echo base_url('assets/formBuilder/'); ?>assets/js/form-render.min.js"></script>
<script src="<?php echo base_url(); ?>assets/custom/js/formbuilder.js"></script>   