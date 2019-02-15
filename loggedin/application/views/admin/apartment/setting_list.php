<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row main_heading_row">
            <div class="col-md-12 col-lg-12 col-xl-10">
                <h4 class="page-title">Manage Apartment Setting</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Apartment</li>
                </ol>
            </div>
            <div class="col-md-12 col-lg-12 col-xl-2 text-right">
                <a href="<?php echo site_url('admin/apartment/setting'); ?>">	<button type="button" class="btn btn-primary  waves-effect waves-light save-btn">Add New</button></a> 
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
                            <div class="col-lg-8"></div>
                            <div class="col-lg-3  pl-0 pr-0">

                                <div class="form-group mb-2 ">
                                    <label for="inputPassword2" class="sr-only">Search</label>
                                    <input type="search" class="form-control" i id="keywords" placeholder="Search..." onkeyup="searchFilter()">
                                </div>

                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="link-hover table-padding table table-centered mb-0" id="inline-editable">
                                <thead>
                                    <tr>			
                                        <th>---</th>
                                        <th>Name</th>
                                        <th>Blocked form</th>
                                        <th>Blocked To</th>
                                        <th>Note</th>
                                        <th>Action</th>   
                                    </tr>
                                </thead>
                                <tbody id="postList">
                                     <?php
                                //   echo '<pre>'; print_R($posts);
                                        $page_no =1;
                                        $offset = $perPage * ($page_no - 1);
                                        $i = $offset;
                                if (!empty($posts)): foreach ($posts as $data):
                                     $i++;
                                          $blocked_form = date(DATE_FORMAT, $data['blocked_form']);
                                           //$timestampblocked_to = strtotime($data['blocked_to']);
                                          $blocked_to = date(DATE_FORMAT, $data['blocked_to']);
                                        $view_link = site_url('admin/apartment/setting/'. $data['id']. '/' . url_title($data['apt_name']));
                                        ?>
                                        <tr id="Res<?php echo  $data['id']; ?>" onclick="redirect_url('<?php echo $view_link; ?>')"> 
                                            
                                             <td class="align-middle">  <?php echo $i; ?>  </td>
                                              <td class="align-middle"> <?php echo $data['apt_name']; ?> </td>
                                             <td class="align-middle"> <?php echo $blocked_form; ?> </td>
                                              <td class="align-middle"><?php echo $blocked_to; ?> </td>
                                           <td class="align-middle"> 
                                               <?php  $note = strip_tags(base64_decode($data['note'])); 
                                                       $note = word_limiter($note, 40);
                                                     echo ucfirst($note);
                                               
                                               ?>
                                           
                                           </td>
                                           <td class="align-middle">  
                                                <a href="<?php echo  $view_link ?>"   class="btn btn-sm custom-btn-circle mr-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                    <i class="md md-mode-edit"></i></a>
                                            </td>      
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
       
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url(); ?>/admin/apartment/ajaxTblSettingData/' + page_num,
            data: 'page=' + page_num + '&keywords=' + keywords + '&sortBy=' + sortBy + '&per_page='+per_page,
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