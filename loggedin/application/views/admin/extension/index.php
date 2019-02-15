<div class="content extention-page">
    <div class="container-fluid"> 
        <!-- Page-Title -->
        <div class="row main_heading_row">
            <div class="col-md-12 col-lg-12 col-xl-8">
                <h4 class="page-title">Extension</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Extension</li>
                </ol>
            </div>
            <div class="col-md-12 col-lg-12 col-xl-4 text-right">
                <button type="button" class="btn btn-primary  waves-effect waves-light save-btn">Save</button>
                <button type="button" class="btn btn-primary  waves-effect waves-light save-cancel-btn m-l-5">Publish</button>
            </div>
        </div>
        <!-- Page-Title-End-->
        <!--page content start-->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- start card-body -->
                    <div class="card-body m-b-30">
                        <form class="extention_form">
                            <!--search area code start-->
                            <div class="form-row">
                                <div class="form-group  col-md-6">
                                    <label for="inputEmail4" class="col-form-label">Country Code</label>
                                    <select type="text" class="form-control" vlaue="" id="form_name" name="form_name" placeholder="Form Name"></select>
                                </div>
                            </div>

                            <span class="department-box">
                                <div class="form-row  p-2 delete-box">
                                    <div class="col-md-10 extntion-form-box p-3">
									<div class="row">
                                        <div class="form-group  redstar col-md-7">
                                            <label for="inputEmail4" class="col-form-label">Department </label>
                                            <input type="text" class="form-control" vlaue="" id="form_name" name="form_name" placeholder="Department Name">
                                        </div>
										 <div class="form-group  redstar col-md-3">
                                           
                                        </div>
                                        </div>
										
                                        <span class="dynamic-feilds">
										<div class="row">
                                            <div class="form-group  col-md-5 pull-left redstar">
                                                <label for="inputEmail4" class="col-form-label"> Person Name</label>
                                                <input type="text" class="form-control" vlaue="" name="form_name" placeholder="Person Name">
                                            </div>
                                            <div class="form-group  col-md-5 pull-left redstar">
                                                <label for="inputEmail4" class="col-form-label">Phone Number</label>
                                                <input type="text" class="form-control" vlaue="" name="form_name" placeholder="Phone Number">
                                            </div>
                                            <div class="form-group  col-md-2 pull-left">
                                                <label for="inputEmail4" class="col-form-label "><span class="delete-person delete-lable-box pointer label label-primary pull-right">X</span> </label>
                                            </div>
											</div>
                                        </span>
                                        <p class="add-person-btn p-2">
                                            <label for="inputEmail4" class="col-form-label"><a href="javascript: void(0)" class="pointer add_another_person"><i class="ion-plus-circled"></i> Add Another Person</a></label>
                                        </p>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="inputEmail4" class="col-form-label pt-0"><span class="delete-lable-box delete-another-department pointer label label-primary pull-right">X</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row p-1 add-another-department">
                                    <div class="form-group  col-md-12 p-3 p-t-0">
                                        <label for="inputEmail4" class="col-form-label ml-3"><a href="javascript: void(0)" class="pointer add_new_department"><i class="ion-plus-circled"></i> Add Another Department</a></label>
                                    </div>
                                </div>
                            </span>

                        </form>
                        <!-- end card-body -->
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
                    <div class="col-sm-12">
                        <div class="pull-right m-t-15">
                            <button type="button" id="frmb_save" class="btn btn-primary save-cancel-btn">Save</button>
                            <button type="button" id="frmb_Publish" class="btn btn-primary publish-btn m-l-5">Publish</button>
                        </div>
                    </div>
                </div>
        <!--page content end-->
    </div>
</div>

<script src="<?php echo base_url('assets/custom/js/extention.js'); ?>"></script>
