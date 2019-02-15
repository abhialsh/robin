<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row main_heading_row">
            <div class="col-md-12 col-lg-12 col-xl-10">
                <h4 class="page-title">Forms Leads</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Forms Leads</li>
                </ol>
            </div>
            <div class="col-md-12 col-lg-12 col-xl-2">
                <a href="<?php echo site_url('admin/form/generate_csv/' . $id); ?>">	
                    <button type="button" class="btn btn-primary  waves-effect waves-light save-btn pull-right">Generate CSV</button></a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row mb-2">
                            <div class="col-lg-1 pl-0 pr-0">
                                <div class="form-group mb-2 ">                            
                                    <select type="text" class="form-control" id="per_page"  onchange="searchFilter()">
                                        <option value="100" <?php if($perPage=='100')echo "selected";?>>100</option>
                                        <option value="50" <?php if($perPage=='50')echo "selected";?>>50</option>
                                        <option value ="25" <?php if($perPage=='25')echo "selected";?>>25</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-lg-4"></div>
<!--                            <div class="col-lg-2  pl-0 pr-0">

                                <div class="form-group mb-2">                            
                                    <select id="sortBy" class="form-control" id="sel1" onchange="searchFilter()">
                                        <option value="">Sort By</option>
                                        <option value="asc">Ascending</option>
                                        <option value="desc">Descending</option>
                                    </select>
                                </div>

                            </div>-->
                            <div class="col-lg-4"></div>

                            <div class="col-lg-3  pl-0 pr-0 pull-right">

                                <div class="form-group mb-2 ">
                                    <label for="inputPassword2" class="sr-only">Search</label>
                                    <input type="search" class="form-control"  id="keywords" placeholder="Search..." onkeyup="searchFilter()">
                                </div>

                            </div>
                        </div>

                   

                    <div class="table-responsive">
                        <table class="link-hover table-padding table table-centered mb-0" id="inline-editable">
                            <thead>
                                <tr>
                                    <th> Name</th>
                                    <th>Email</th>
                                    <th>Contact No</th>
                                    <th>Added On	</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="postList">
                                <?php
                                //   echo '<pre>'; print_R($posts);
                               
                                if (!empty($posts)): foreach ($posts as $data):
                                        if ($data['modified'] == '0000-00-00 00:00:00') {
                                            //$added_on = date(DATE_FORMAT, strtotime($data['created']));
                                            $added_on = date("m-d-Y H:i:s", $data['created']);
                                        } else if ($data['created']) {
                                            //$added_on = date(DATE_FORMAT, strtotime($data['modified']));
                                            $added_on = date("m-d-Y H:i:s", $data['modified']);
                                        } else {
                                            $added_on = 'DDDDD';
                                        }
                                        $view_link = site_url('admin/form/view_forms_lead/' . $data['form_id'] . '/' . $data['id']);
                                        ?>
                                        <tr id="Res<?php echo  $data['id']; ?>" onclick="redirect_url('<?php echo $view_link; ?>')"> 
                                            <td>  <?php echo $data['name']; ?></td>
                                            <td> <?php echo $data['email']; ?> </td>
                                            <td> <?php echo $data['contact']; ?> </td>
                                            <td> <?php echo $added_on; ?></td>
                                            <td>
                                                <a href="<?php echo $view_link; ?>" class="btn   btn-sm custom-btn-circle"><i class="md md-remove-red-eye"></i></a> </td>
                                        </tr>             
                                    <?php endforeach;
                                else: ?>
                                    <tr> <td colspan="11" align="center" class="noTblData"> <b>No record found </b></td>     </tr>
                                <?php endif; ?>
                                <tr> <td colspan="11">  <?php echo $this->ajax_pagination->create_links(); ?>  </td> </tr>             

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
<script>
    function searchFilter(page_num) {
        page_num = page_num ? page_num : 0;

        var keywords = $('#keywords').val();
        var sortBy = $('#sortBy').val();
        var per_page = $('#per_page').val();
         var id ="<?php echo $id; ?>";
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url(); ?>/admin/form/ajaxPaginationData/' + page_num,
            data: 'page=' + page_num + '&keywords=' + keywords + '&sortBy=' + sortBy + '&per_page='+per_page+'&id=' + id,
            beforeSend: function () {
                $('.loading-overlay').show();
            },
            success: function (html) {
                $('#postList').html(html);
                $('.loading-overlay').fadeOut("slow");
            }
        });
    }
</script>