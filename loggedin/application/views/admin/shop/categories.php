<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
   ?>
<div class="content">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row main_heading_row">
            <div class="col-md-12 col-lg-12 col-xl-10">
                <h4 class="page-title">Manage Category</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Shop</li>
                </ol>
            </div>

        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="link-hover table-padding table table-centered mb-0" id="inline-editable">
                                <thead>
                                    <tr>
                                        <th class="text-center">-</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for($i=1; $i<=20;$i++){ ?>
                                    <tr>
                                        <td class="text-center">
                                            <?php echo $i; ?>
                                        </td>
                                        <td class="text-center"> demo form1 </td>
                                        <td class="text-center"> demo form1 </td>
                                        <td class="text-center"> <span class="label label-success status-btn success-status-btn font-weight-normal"> Approve </span> </td>
                                        <td class="text-right"> <a href="http://192.168.1.199/loggedin/index.php/admin/form/formBuilder/73" id="73" class="btn btn-sm custom-btn-circle mr-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                <i class="md md-mode-edit"></i></a>
                                            <a href="javascript:void(0)" id="form_deactive73" onclick="ManageFormStaus(73, 0);" class="btn  btn-sm custom-btn-circle " data-toggle="tooltip" data-placement="top" title="" data-original-title="De-active"><i class="ti-na"></i></a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- end .table-responsive-->
                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- container -->
</div>