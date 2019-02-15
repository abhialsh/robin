<!-- container start -->
<div class="content page-restaurant" id="restaurant">
    <!-- container-fluid start -->
    <div class="container-fluid">
        <!-- Page-Title start code  -->
        <div class="row">
            <div class="col-sm-12 m-b-20">
                <h4 class="page-title page_title">Restaurant Menu Setup</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Restaurants </li>
                </ol>
            </div>
        </div>
        <!-- Page-Title end code  -->
        <div class="row">
            <div class="col-md-8">
                <?php
                /// print_r($menu_category);

                foreach ($menu_category as $dataC) {
                    $Cat_img = 'https://profiles.utdallas.edu/img/default.png';
                    if ($dataC['image']) {
                        $Cimg = base_url() . 'upload/Rest/thumb/' . $dataC['image'];
                        if(checkRemoteFile($Cat_img)){
                           $Cat_img =$Cimg; 
                        }
                    }
                    ?>
                    <span class="menu-span" id="menu_<?php echo $dataC['id']; ?>">
                        <div class="card-box pt-2 pb-4">
                            <div class="row restaurant-menu-box">
                                <div class="col-md-12 col-sm-12 col-lg-2">
                                    <div class="img-100 profile-appointment">
                                        <img class="card-img-top img-fluid  mt-2 pointer" src="<?php echo $Cat_img; ?>" id="resImage<?php echo $dataC['id']; ?>" alt="Card image cap">
                                        <center> <label class="loggedin-color apt-prf-label ment-pic-label text-center"><a href="javascript:void(0)">+ Add </a></label></center>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-lg-10   mt-4 mt-lg-2">
                                    <div class="panel-group i-accordion">
                                        <div class="panel panel-success">
                                            <div class="panel-heading collapsed">
                                                <p class="font-bold"><?php echo htmlentities($dataC['name']); ?> <i class="fa pull-right fa-chevron-down pointer"></i></p>
                                            </div>
                                            <div class="panel-collapse collapse show" aria-expanded="false">
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-9">
                                                            <p class="mt-3"><input type="text" class="form-control">
                                                            </p>
                                                        </div>
                                                        <div class="col-md-3 text-right">
                                                            <p class="mt-3 edit-delete invisible"> <a href="" class="btn btn-sm custom-btn-circle mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                                    <i class="md md-mode-edit"></i></a>
                                                                <a href="" class="btn btn-sm custom-btn-circle mr-0" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                                    <i class="md md-delete"></i></a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $rest_menu_item = $this->rest->rest_menu_item($dataC['id']);
                        // echo '<pre>'; print_r($rest_menu_item); echo '</pre>';
                        if ($rest_menu_item) {
                            foreach ($rest_menu_item as $dtItem) {
                                $item_img = 'https://profiles.utdallas.edu/img/default.png';
                                if ($dtItem['image']) {
                                    $item_img = base_url() . 'upload/Rest/thumb/' . $dtItem['image'];
                                }
                                ?>
                                <div class="row custom-child-accordion"  id="item<?php echo $dtItem['id']; ?>">
                                    <div class="col-md-12 col-sm-12 col-lg-2">
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-lg-10   mt-4 mt-lg-2 ">
                                        <div class="card-box pt-3 pb-3 list-item">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="img-100 profile-appointment">
                                                        <img class="card-img-top img-fluid mt-0 pointer" src="<?php echo $item_img; ?>" alt="Card image cap">
                                                        <center> <label class="loggedin-color apt-prf-label ment-pic-label text-center"><a href="javascript:void(0)">+ Add </a></label></center>
                                                    </div>
                                                </div>
                                                <div class="col-md-9  mt-4 mt-lg-0">
                                                    <div class="panel-group i-accordion">
                                                        <div class="panel panel-success">
                                                            <div class="panel-heading collapsed" data-toggle="collapse" data-parent=".i-accordion" href=".accordion1" aria-expanded="false">
                                                                <p class="font-bold"><?php echo ucfirst($dtItem['item_name']); ?> </p>
                                                            </div>
                                                            <div class="panel-collapse collapse show" aria-expanded="false">
                                                                <div class="panel-body">
                                                                    <p class="pt-0 pt-lg-4 text-right ">
                                                                        <a href="javascript:void(0)" class="btn btn-sm custom-btn-circle mr-2 child-form-edit" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                                            <i class="md md-mode-edit"></i></a>
                                                                        <a href="" class="btn btn-sm custom-btn-circle mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                                            <i class="md md-delete"></i></a>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-4">
                                                <?php
                                                $item_size = $this->rest->item_size($dtItem['id']);
                                                $numSz =count($item_size);     
                                                // echo '<pre>'; print_r($rest_menu_item); echo '</pre>';
                                                if ($item_size) {
                                                    foreach ($item_size as $dtSiz) {
                                                        ?>
                                                        <div class="col-md-12  p-3 mb-1 border-all-side">
                                                            <p class="p-0 m-0">
                                                                <?php echo $dtSiz['size_name']; ?>
                                                                <span class="pull-right">
                                                                    <?php echo CURRENCY_SYMBOL . number_format($dtSiz['price'], 2); ?>
                                                            </p>
                                                        </div>
                                                    <?php
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="card-box pt-3 pb-3 child-form hide">
                                            <div class="row">
                                                <div class="<?php if($numSz >0){ echo  'col-md-12';}else { echo  'col-md-8'; }?>">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control"  name="item_name" value ="<?php echo htmlentities($dtItem['item_name']); ?>" required="" placeholder="Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 <?php if($numSz > 0){ echo 'hide';} ?>" >
                                                    <div class="form-group">
                                                        <input type="text" class="form-control qty"  value ="<?php echo $dtItem['price']; ?>" name="item_price" required="" placeholder="Price">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control"  name="item_desc" value ="<?php echo htmlentities(base64_decode($dtItem['descripation'])); ?>" placeholder="Description">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php    if ($item_size) {
                                                    foreach ($item_size as $dteSiz) {
                                                        ?>
                                                <div class="row mb-2 size-feild">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"  value ="<?php echo htmlentities($dteSiz['size_name']); ?>" name="item_size[]" required="" placeholder="Size">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control qty"  value ="<?php echo $dteSiz['price']; ?>" name="size_price[]" required="" placeholder="Price">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 h4 mt-1">
                                                        <div class="form-group">
                                                     
                                                            <i class="fa fa-close mr-3 pointer"></i>  
                                                                <input type="hidden" name="is_default[]" value="0">
                                                            <input type="radio" name="is_default[]" value="1" <?Php if ($dteSiz['is_default'] == '1') echo 'checked'; ?>>
                                                        </div>
                                                    </div>
                                                </div>
                                              <?php } 
                                            }?>
                                            <div class="row mb-2 size-area">
                                                <div class="col-md-6"><button class="btn save-btn add-mutipal-size">Multipal Size</button></div>
                                                <div class="col-md-6 text-right"><button class="btn save-cancel-btn cancel-btn-border mr-3 cancel-child-form">Cancel</button><button class="btn save-btn">Save</button></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                        }
                        ?>
                    </span>
<?php } ?>
            </div>
            <div class="col-md-4">
                <div class="card-box">
                    <h4 class="m-t-0 header-title text-center">Choices & Addons</h4>
                    <hr>
                    <div class="row">
                         <?php 
                         if($adddons_group) {
                        foreach ($adddons_group as $dataGrp) { ?>
                        <div class="col-md-12 mb-3">
                            <div   class="row">
                                <div class="col-lg-12 p-0"> 
                                    <div class="portlet">
                                        <div class="portlet-heading bg-danger bg-loggedin-custom">
                                            <h3 class="portlet-title">
                                            <?php    $group_name = strip_tags($dataGrp['name']); 
                                                 echo   $group_name = ucfirst(word_limiter($group_name, 15));
                                            ?>
                                            </h3>
                                            <div class="portlet-widgets">
                                                <span class="divider"></span>
                                                <a data-toggle="collapse" data-parent="#accordion<?php echo $dataGrp['id'] ?>" href="#bg-danger"><i class="ion-minus-round"></i></a>
                                                <span class="divider"></span>
                                                <a data-toggle="collapse" data-parent="#accordion<?php echo $dataGrp['id'] ?>" href="#bg-danger"><i class="fa fa-pencil-square-o"></i></a>
                                                <span class="divider"></span>
                                                <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div id="bg-danger" class="panel-collapse collapse show">
                                            <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12 mb-2">
                                                        <div class="form-group">
                                                            <h5 class="m-t-2 header-title text-center">
                                                                <b>Click Add Item to start</b>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend ">
                                                                    <span class="input-group-text pt-0 pb-0" >$</span>
                                                                </div>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="checkbox" class="mr-2"> Pre Select
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend ">
                                                                    <span class="input-group-text pt-0 pb-0" >$</span>
                                                                </div>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="checkbox" class="mr-2"> Pre Select
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 text-right">
                                                        <button class="btn save-cancel-btn cancel-btn-border mr-3 cancel-child-form">Cancel</button>
                                                        <button class="btn save-btn">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <?php }
                         
                        } ?>
                         <div class="col-md-12 mb-3">
                            <div class="row">
                                <button class="btn form-controll w-100 save-btn add-group-toggle">Add Group</button>
                            </div>
                        </div>
                      
                        <div class="col-md-12 border-all-side p-20 invisible" id="add_group_div">
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <input type="radio" class="mr-2">Select Any
                                        </div>
                                        <div class="col-md-7">
                                            <input type="radio" class="mr-2">Select One
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <button class="btn save-cancel-btn cancel-btn-border mr-3  add-group-toggle ">Cancel</button>
                                    <button class="btn save-btn">Save</button>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- container-fluid start -->
</div>
<script src="<?php echo base_url('assets/custom/js/restaurant.js'); ?>"></script>
<!-- container end-->