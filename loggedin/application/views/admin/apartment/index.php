<!-- content start code -->
<div class="content">
    <!-- container-fluid start code -->
    <div class="container-fluid">
        <!-- Page-Title start code  -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title page_title">Apartment Rental Form</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Apartment</li>
                </ol>
            </div>
        </div>
        <!-- Page-Title end code  -->
        <!--all box code start -->
        <div class="row dashboard_box">
            <div class="col-md-6 col-lg-3">
                <div class="widget-bg-color-icon card-box fadeInDown animated pointer" onclick="redirect_url('<?php echo site_url('admin/apartment/new_apartment'); ?>')">
                    <div class="bg-icon bg-icon-info mx-auto">
                        <i class="fa fa-file-text-o text-info"></i>
                    </div>
                    <div>
                        <p class="text-muted text-center mt-4  mb-4"><a href="javascript:void(0)">Add Apartment</a></p>
                        <div class="product-action text-center">
                            <p class="text-muted text-center mt-3"><a href="javascript:void(0)">Get Started</a></p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <?php  foreach ($list as $data) {  
                    $form_name = strip_tags($data->name);
                   $url_title = url_title($form_name);
            ?>
            <div class="col-md-6 col-lg-3" id="form_<?php echo $data->id ?>">
                <div class="widget-bg-color-icon card-box fadeInDown animated" >
                    <div class="bg-icon bg-icon-info mx-auto" onclick="redirect_url('<?php echo site_url('admin/apartment/new_apartment/'.$data->id.'/'.$url_title.'/'); ?>')">                  
                        <i class="fa fa-file-text-o text-info"></i>                    
                    </div>
                    <div>
                        <p class="text-muted text-center mt-4 mb-4">
                            <a href="<?php echo site_url('admin/apartment/new_apartment/'.$data->id.'/'.$url_title.'/'); ?>">
                              <?php
                            $form_name = word_limiter($form_name, 15);
                            echo ucfirst($form_name);
                         ?>                </a>
                        </p>
                        <div class="product-action text-center">

                            <a href="<?php echo site_url('admin/apartment/apartment_detail/'.$data->id.'/'.$url_title.'/'); ?>"  class="btn btn-sm custom-btn-circle mr-3" data-toggle="tooltip" data-placement="top" title="Details">
                                <i class="md md-remove-red-eye"></i>
                            </a>

                            <a href="<?php echo site_url('admin/apartment/new_apartment/'.$data->id.'/'.$url_title.'/'); ?>"   class="btn  btn-sm custom-btn-circle" data-toggle="tooltip" data-placement="top" title="Edit"><i class="md md-mode-edit"></i>
                            </a>

                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <?php  }   ?>
        </div>
        <!-- End Box code end code  -->
    </div>
    <!-- container-fluid end code -->
</div>
<!--content end code -->