<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('file_upload')) {

    function file_upload($file_name = '', $field = '', $path = '', $thumb_path = '', $multiple = '') {
        $CI = & get_instance();
        $path = "./" . $path . "/";
        $thumb_path = $path . $thumb_path . "/";

        $config['upload_path'] = $path;
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = 20 * 90;
        $config['max_width'] = '300';
        $config['max_height'] = '300';

        if ($multiple == '') {
            $CI->load->library('upload', $config);
        } else {
            $CI->upload->initialize($config);
        }

        if (!$CI->upload->do_upload($field)) {
            $status = $CI->upload->display_errors();
        } else {
            $data = $CI->upload->data(); //uploading
            //fetching path
            $config1 = array(
                'source_image' => $data['full_path'], //get original image
                'new_image' => $thumb_path, //save as new image //need to create thumbs first
                'maintain_ratio' => true,
                'width' => 125,
                'height' => 125);

            if ($multiple == '') {
                $CI->load->library('image_lib', $config1);
            } else {
                $CI->image_lib->clear();
                $CI->image_lib->initialize($config1);
            }
            //load library
            $CI->image_lib->resize(); //generating thumb
            $status = array("file" => $data['file_name'], "value" => 1);
        }
        // we will get image name here
        return $status;
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

function pagination($table, $limit, $coloum = '*', $per_page = '20', $where = '', $search = '', $join_tbl = '', $join_condition = '', $join_type = 'inner', $order_by = '', $form = '', $current_page = '') {
    $CI = & get_instance();

    $total_row = $CI->operationmodel->record_count($table, $coloum, $where, $search, $join_tbl, $join_condition, $join_type);

    $total_page = ceil($total_row / $per_page);

    $count = $per_page * ($current_page);
    if ($total_row <= $count) {
        $count = $total_row;
    }
    $pag_link = '<ul class="pagination"><li class="page-item"><a class="page-link" id="prev" onclick="previous()" >Previous</a></li>';

    $k = 0;

    for ($i = $current_page - 5; $i <= ($total_page); $i++) {
        $j = $current_page + 5;
        $l = $current_page - 5;

        if ($i > 0 && $i > $l && $i <= $j) {
            $k++;

            $pag_link .= '<li class="page-item"><a class="page-link" id=page' . $i . ' onclick="ajax_pagination(' . $i . ')">' . $i . '</a></li>';


            if ($k > 8) {
                break;
            }
        }
    }
    $pag_link .= '<li class="page-item"><a class="page-link" id="next" onclick="next()" >Next' . '</a></li></ul>';


    $result = $CI->operationmodel->getSpecialData($table, $coloum, $where, $order_by, $form, $limit, $per_page, $join_tbl, $join_condition, $join_type, $search);

    return $data = array("page_link" => $pag_link, "data" => $result['record'], 'last_query' => $result['last_query'], 'total_page' => $total_page);
}

?>


