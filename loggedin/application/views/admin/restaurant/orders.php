<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
   ?>
<div class="content">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row main_heading_row">
            <div class="col-md-12 col-lg-12 col-xl-10">
                <h4 class="page-title">Manage Orders</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Restaurant</li>
                </ol>
            </div>

        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-lg-1 pl-0 pr-0">
                                <div class="form-group mb-2 ">
                                    <select type="text" class="form-control">
                                        <option>100</option>
                                        <option>50</option>
                                        <option>25</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-lg-4 mt-2 text-right"> Search By Date :</div>
                            <div class="col-lg-3  pl-0 pr-0">

                                <div class="form-group mb-2 ">
                                    <input type="text" class="form-control input-daterange-datepicker" id="inputPassword2" placeholder="Search...">
                                </div>

                            </div>
                            <div class="col-lg-1"></div>

                            <div class="col-lg-3  pl-0 pr-0">

                                <div class="form-group mb-2 ">
                                    <label for="inputPassword2" class="sr-only">Search</label>
                                    <input type="search" class="form-control" id="inputPassword2" placeholder="Search...">
                                </div>

                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="link-hover table-padding table table-centered mb-0" id="inline-editable">
                                <thead>
                                    <tr>
                                        <th> Order No.</th>
                                        <th>Name</th>
                                        <th>Amount</th>
                                        <th>Order Status</th>
                                        <th>Date</th>
                                        <th>Delivery</th>
                                        <th>Action</th>
                                        <th>Status</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for($i=1; $i<=20;$i++){ ?>
                                    <tr>
                                        <td>
                                            <?php echo $i; ?>
                                        </td>
                                        <td> demo form1 </td>
                                        <td> demo form1 </td>
                                        <td><span class="label label-success status-btn success-status-btn font-weight-normal"> Store / National  </span> </td>
                                        <td> demo form1 </td>
                                        <td><span class="label label-warning status-btn warning-status-btn font-weight-normal"> Store / National  </span> </td>
                                        <td> <button class="btn btn-default save-btn waves-effect waves-light btn-sm" id="sa-basic">Complete</button> </td>
                                        <td>
                                            <select type="text" class="form-control">
                                                <option value="">Select</option>
                                                <option>Cancel</option>                                               
                                            </select>
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
