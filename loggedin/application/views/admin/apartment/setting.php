<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (isset($details) && $details) {
    
    extract($details);
    $blocked_form = date(DATE_FORMAT, $blocked_form);
    $blocked_to = date(DATE_FORMAT, $blocked_to);
} else {
    
    $blocked_form = date(DATE_FORMAT);
    $blocked_to = date(DATE_FORMAT, strtotime('+5 days'));
    $note = '';
    $apt_id = '';
}
?>

<div class="content">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row main_heading_row">
            <div class="col-md-12 col-lg-12 col-xl-7">
                <h4 class="page-title">Add New</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>/admin/dashboard/">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo site_url() ?>/admin/Apartment/setting_list">Setting</a></li>
                    <li class="breadcrumb-item active">Apartment</li>
                </ol>
            </div>
            <div class="col-md-12 col-lg-12 col-xl-2 text-right">
                <button type="button"  onclick="form_submit('AptSettingform','serblockResult')"  class="btn btn-primary  waves-effect waves-light save-btn ">Save</button> 
                <?php if (isset($id) && $id) { ?>
                    <button type="button" class="btn btn-danger danger-delete-btn m-l-5"  onclick="AptsettingDelete(<?php echo $id; ?>)">Delete</button> 
                <?php } ?>
            </div>
        </div>
    
        <form  class="form-bordered"  action="<?php echo site_url() ?>/admin/Apartment/manage_setting"  method="post" id="AptSettingform" novalidate="novalidate">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xl-9">
                        <div id="serblockResult"> </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group redstar">
                                <label for="inputAddress" class="col-form-label">Apartment Name</label>
                                <select class="form-control" name="apt_id"  required>
                                    <option value="">Select Apartment </option>
                                    <?php
                                    if (isset($apt_list) && $apt_list) {
                                        foreach ($apt_list as $data) {  ?>
                                            <option value="<?php echo $data['id'] ?>" <?php echo $apt_id == $data['id'] ? ' selected="selected"' : ''; ?> ><?php echo $data['name']; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>   
                            <div class="form-row">
                                <div class="form-group col-md-6 redstar">
                                    <label for="inputEmail4" class="col-form-label">Blocked From</label>
                                    <input type="text" class="datepicker form-control"  value="<?php echo $blocked_form; ?>" name="blocked_form" required >
                                </div>
                                <div class="form-group col-md-6 redstar">
                                    <label for="inputPassword4" class="col-form-label">Blocked To</label>
                                    <input type="text" class="datepicker form-control" value="<?php echo $blocked_to; ?>" name="blocked_to" required>
                                </div>
                            </div>
                            <div class="form-group redstar">
                                <label for="inputAddress" class="col-form-label">Note</label>
                                    <textarea class="form-control"  name="note"><?php echo base64_decode($note) ?></textarea>
                            </div>
                        </div>                
                    </div>            
                </div>
            </div>
            <input type="hidden" name="edit_id" value="<?php echo $id ?>" />                
        </form>
        <div class="row">
            <div class="col-sm-9">
                <div class="text-right m-t-15">                          
                    <button type="button" onclick="form_submit('AptSettingform','serblockResult')"  class="btn btn-primary publish-btn m-l-5">Save</button>
                </div>
            </div>
        </div>
        <!-- end row -->
        
<form action="a.php" id="prospects_form">
<input type="text" name="name">
<button type="submit" form="form1" value="Submit">Submit</button>

</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
$("#prospects_form").submit(function(e) {
    alert();
    e.preventDefault();
});</script>
    </div>
    <!-- container -->
</div>
