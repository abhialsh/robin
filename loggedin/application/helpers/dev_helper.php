<?php
// any_in_array() is not in the Array Helper, so it defines a new function
function any_in_array($needle, $haystack) {
    $needle = is_array($needle) ? $needle : array($needle);

    foreach ($needle as $item) {
        if (in_array($item, $haystack)) {
            return TRUE;
        }
    }

    return FALSE;
}

// random_element() is included in Array Helper, so it overrides the native function
function random_element($array) {
    shuffle($array);
    return array_pop($array);
}

if (!function_exists('backend_pagination')) {

    function backend_pagination() {
        $data = array();
        $data['full_tag_open'] = '<ul class="pagination">';
        $data['full_tag_close'] = '</ul>';
        $data['first_tag_open'] = '<li>';
        $data['first_tag_close'] = '</li>';
        $data['num_tag_open'] = '<li>';
        $data['num_tag_close'] = '</li>';
        $data['last_tag_open'] = '<li>';
        $data['last_tag_close'] = '</li>';
        $data['next_tag_open'] = '<li>';
        $data['next_tag_close'] = '</li>';
        $data['prev_tag_open'] = '<li>';
        $data['prev_tag_close'] = '</li>';
        $data['cur_tag_open'] = '<li class="active"><a href="#">';
        $data['cur_tag_close'] = '</a></li>';
        return $data;
    }

}
if (!function_exists('msg_alert')) {

    function msg_alert() {
        $CI = & get_instance();
        ?>
        <?php if ($CI->session->flashdata('msg_success')): ?>	
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button> 
                <strong>Success :</strong> <?php echo $CI->session->flashdata('msg_success'); ?>
            </div>
        <?php endif; ?>
        <?php if ($CI->session->flashdata('msg_info')): ?>	
            <div class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert">&times;</button> 
                <strong>Info :</strong> <?php echo $CI->session->flashdata('msg_info'); ?>
            </div>
        <?php endif; ?>
        <?php if ($CI->session->flashdata('msg_warning')): ?>	
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert">&times;</button> 
                <strong>Warning :</strong> <?php echo $CI->session->flashdata('msg_warning'); ?>
            </div>
        <?php endif; ?>
        <?php if ($CI->session->flashdata('msg_error')): ?>	
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button> 
                <strong>Error :</strong> <?php echo $CI->session->flashdata('msg_error'); ?>
            </div>
        <?php endif; ?>
    <?php
    }

}

if (!function_exists('upload_file')) {

    function upload_file($param = null) {
        $CI = & get_instance();

        $config['upload_path'] = './assets/uploads/';
        $config['allowed_types'] = 'gif|jpg|png|xls|xlsx|csv|jpeg|pdf|doc|docx';
        $config['max_size'] = 1024 * 90;
        $config['image_resize'] = FALSE;
        $config['resize_width'] = 126;
        $config['resize_height'] = 126;

        if ($param) {
            $config = $param + $config;
        }
        $CI->load->library('upload', $config);
        if (!empty($config['file_name']))
            $file_Status = $CI->upload->do_upload($config['file_name']);
        else
            $file_Status = $CI->upload->do_upload();
        if (!$file_Status) {
            return array('STATUS' => FALSE, 'FILE_ERROR' => $CI->upload->display_errors());
        } else {
            $uplaod_data = $CI->upload->data();

            $upload_file = explode('.', $uplaod_data['file_name']);

            if ($config['image_resize'] && in_array($upload_file[1], array('gif', 'jpeg', 'jpg', 'png', 'bmp', 'jpe'))) {
                $param2 = array(
                    'source_image' => $config['source_image'] . $uplaod_data['file_name'],
                    'new_image' => $config['new_image'] . $uplaod_data['file_name'],
                    'create_thumb' => FALSE,
                    'maintain_ratio' => FALSE,
                    'width' => $config['resize_width'],
                    'height' => $config['resize_height'],
                );

                image_resize($param2);
            }
            return array('STATUS' => TRUE, 'UPLOAD_DATA' => $uplaod_data);
        }
    }

}
/**
 * 	image resize
 */
if (!function_exists('image_resize')) {

    function image_resize($param = null) {
        $CI = & get_instance();
        $config['image_library'] = 'gd2';
        $config['source_image'] = './assets/uploads/';
        $config['new_image'] = './assets/uploads/';
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = FALSE;
        $config['width'] = 150;
        $config['height'] = 150;

        if ($param) {
            $config = $param + $config;
        }
        $CI->load->library('image_lib', $config);
        if (!$CI->image_lib->resize()) {
            //return array('STATUS'=>TRUE,'MESSAGE'=>$CI->image_lib->display_errors()); 
            die($CI->image_lib->display_errors());
        } else {
            return array('STATUS' => TRUE, 'MESSAGE' => 'Image resized.');
        }
    }

}

if (!function_exists('create_thumbnail')) {

    function create_thumbnail($config_img = '', $img_fix = '') {
        $CI = & get_instance();
        $config_image['image_library'] = 'gd2';
        $config_image['source_image'] = $config_img['source_path'] . $config_img['file_name'];
        //$config_image['create_thumb'] = TRUE;
        $config_image['new_image'] = $config_img['destination_path'] . $config_img['file_name'];
        $config_image['height'] = $config_img['height'];
        $config_image['width'] = $config_img['width'];
        if ($img_fix) {
            $config_image['maintain_ratio'] = FALSE;
        } else {
            $config_image['maintain_ratio'] = TRUE;
            list($width, $height, $type, $attr) = getimagesize($config_img['source_path'] . $config_img['file_name']);

            if ($width < $height) {
                $cal = $width / $height;
                $config_image['width'] = $config_img['width'] * $cal;
            }
            if ($height < $width) {
                $cal = $height / $width;
                $config_image['height'] = $config_img['height'] * $cal;
            }
        }

        $CI->load->library('image_lib');
        $CI->image_lib->initialize($config_image);

        if (!$CI->image_lib->resize())
            return array('status' => FALSE, 'error_msg' => $CI->image_lib->display_errors());
        else
            return array('status' => TRUE, 'file_name' => $config_img['file_name']);
    }

}
?>
