<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Apartment extends CI_Controller {

    function __construct() {

        parent:: __construct();
        $this->load->model("Common_model", "common");
        $this->load->model("Table_model", 'table');
        $this->load->helper('text');
        $this->common->checkAdminSession();
        $this->admin_id = $this->session->userdata['admin']['id'];
        $this->perPage = 50;
    }

    public function index() {

        $admin_id = $this->session->userdata['admin']['id'];
        $where = array('admin_id' => $admin_id);
        $data['list'] = $list = $this->common->get_result('property_rental', $where);
        if (!$list) {
            redirect('/admin/apartment/new_apartment/');
        }
        $data['title'] = 'Admin Dashboard';
        $data['contents'] = 'admin/apartment/index';
        $this->load->view("theme/template", $data);
    }

    public function new_apartment($id = '') {

        $apt_images = array();

        if ($id) {
            $data['formId'] = $id;
            $where = array('id' => $id);
            $data['details'] = $dts = $this->common->getRow('property_rental', $where);
            $where_image = array('Apt_id' => $id);
            $apt_images = $this->common->getResults('property_images', $where);

            if (empty($dts)) {
                redirect('/admin/apartment/');
            }
        }
        $data['apt_images'] = $apt_images;

        $data['title'] = 'Admin Dashboard';
        $data['contents'] = 'admin/apartment/add_new_apartment';
        $this->load->view("theme/template", $data);
    }

    // add and edit apartment

    public function manage() {

        $admin_id = $this->session->userdata['admin']['id'];
        $msg = array();

        if ($this->input->post()) {
            //    print_R($this->input->post());
            $this->form_validation->set_rules('latitude', 'Address', 'required', array('required' => 'Please enter valid address'));
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('price', 'Price', 'required');

            if ($this->form_validation->run() == TRUE) {
                $latitude = trim($this->input->post('latitude'));
                $longitude = trim($this->input->post('longitude'));

                // $emailcheck = $this->common->get_row("admin", array('email' => $email));

                $data = array();
                $data['admin_id'] = $admin_id;
                $data['name'] = trim($this->input->post('name'));
                $data['short_description'] = trim($this->input->post('short_description'));
                $data['price'] = trim($this->input->post('price'));
                $data['cleaning_fee'] = trim($this->input->post('cleaning_fee'));
                $data['service_fee'] = trim($this->input->post('service_fee'));
                $data['occupancy_taxes_fees'] = trim($this->input->post('occupancy_taxes_fees'));
                $data['contact_no'] = trim($this->input->post('contact_no'));
                $data['address_line1'] = trim($this->input->post('location'));
                $data['latitude'] = $latitude;
                $data['longitude'] = $longitude;
                $data['city'] = trim($this->input->post('city'));
                $data['state'] = trim($this->input->post('state'));
                $data['country'] = trim($this->input->post('country'));
                $data['zip'] = trim($this->input->post('zip'));
                $data['room_description'] = trim($this->input->post('room_description'));
                $data['nos_guest'] = trim($this->input->post('nos_guest'));
                $data['nos_of_adults'] = trim($this->input->post('nos_of_adults'));
                $data['nos_of_children'] = trim($this->input->post('nos_of_children'));
                $data['nos_of_infants'] = trim($this->input->post('nos_of_infants'));
                $data['nos_bedroom'] = trim($this->input->post('nos_bedroom'));
                $data['nos_beds'] = trim($this->input->post('nos_beds'));
                $data['nos_bath'] = trim($this->input->post('nos_bath'));
                $data['sleeping_arrangements'] = trim($this->input->post('sleeping_arrangements'));
                $data['house_rule'] = trim($this->input->post('house_rule'));
                $data['accessability'] = trim($this->input->post('accessability'));
                $data['cancellations'] = trim($this->input->post('cancellations'));
                $data['status'] = trim($this->input->post('visible'));
                $data['booking_interval'] = trim($this->input->post('booking_interval'));
                $data['check_in_time'] = trim($this->input->post('check_in_time'));
                $data['check_out_time'] = trim($this->input->post('check_out_time'));

                if (($this->input->post('sleeping_arrange'))) {
                    $data['sleeping_arrange'] = implode(",", ($this->input->post('sleeping_arrange')));
                }

                if (($this->input->post('amenities'))) {
                    $data['amenities'] = implode(",", ($this->input->post('amenities')));
                }

                if (($this->input->post('family_amenities'))) {
                    $data['family_amenities'] = implode(",", ($this->input->post('family_amenities')));
                }
                $data['added_on'] = time();

                $redirect_page = site_url("admin/apartment/");
                /// image upload
                if ($this->input->post('apt_id')) {
                    $apt_id = $this->input->post('apt_id');
                    $formsEdit = $this->common->update("property_rental", $data, array('id' => $apt_id));
                    $msg = array('redirect', 'Property rental updated successfully', $redirect_page);
                } else {
                    $apt_id = $this->common->insert("property_rental", $data);
                    $msg = array('redirect', 'Property rental created successfully', $redirect_page);
                }
                $image_data = array();
                //   echo '<pre>';print_R($_POST);
                    

                if (!empty($_FILES['property_images']['name'])) {

                    $product_images = $_FILES['property_images'];
                     $count = count($_FILES['property_images']);
                 
                    foreach ($product_images as $image) {
                      //       print_r($product_images);
                        $names = explode('.', $image['name']);
                        $value = $apt_id . '_' . time() . '_' . $key . '.' . $names[1];

                         $fileName = $value;
                        $field = 'profile_pic';
                        $path = 'uploads/admin/apartment';
                        $thumb_path = 'thumb';
                        $response = file_upload($fileName, $field, $path, $thumb_path, $count);
                      //   file_upload($file_name = '', $field = '', $path = '', $thumb_path = '', $multiple = '')
                        if ($response2["value"] == 1) {
                            $image_data['Apt_id'] = $apt_id;
                            $image_data['image'] = $value;
                            $image_data['added_on'] = strtotime(date("Y-m-d H:i:s"));
                            $image_data['added_by'] = $admin_id;
                            $image_data['status'] = '1';
                        //    echo '<pre>';
                          //  print_r($image_data);
                            $prop_imageAdd = $this->common->insert("property_images", $image_data);
                        }
                    }
                }


                if ($this->input->post('apt_id')) {
                    $apt_id = $this->input->post('apt_id');
                    $formsEdit = $this->common->update("property_rental", $data, array('id' => $apt_id));
                    $msg = array('redirect', 'Property rental updated successfully', $redirect_page);
                } else {
                    $apt_id = $this->common->insert("property_rental", $data);
                    $msg = array('redirect', 'Property rental created successfully', $redirect_page);
                }
            } else {
                $msg = array('danger', validation_errors());
            }
        }

        echo $msg = json_encode($msg);
    }

    public function apartment_detail() {

        $data['title'] = 'Admin Dashboard';
        $data['contents'] = 'admin/apartment/apartment_detail';
        $this->load->view("theme/template", $data);
    }

    public function booked_apartment() {

        $data['title'] = 'Admin Dashboard';
        $data['contents'] = 'admin/apartment/booked_apartment';
        $this->load->view("theme/template", $data);
    }

    public function setting_list() {

        $admin_id = $this->session->userdata['admin']['id'];

        // -------- table  start -------------------------------------------------------
        $data = array();
        //total rows count
        $totalRec = count($this->table->getRows_apartment_setting());

        //pagination configuration
        $config['target'] = '#postList';
        $config['base_url'] = site_url() . 'admin/apartment/ajaxTblSettingData/';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->perPage;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        //get the posts data
        $data['posts'] = $this->table->getRows_apartment_setting(array('limit' => $this->perPage));
        $data['perPage'] = $this->perPage;

        $data['title'] = 'Admin Dashboard';
        $data['contents'] = 'admin/apartment/setting_list';
        $this->load->view("theme/template", $data);
    }

    function ajaxTblSettingData() {

        $conditions = array();
        //calc offset number
        $page = $this->input->post('page');
        $id = $this->input->post('id');
        if ($this->input->post('per_page')) {
            $this->perPage = $this->input->post('per_page');
        }
        if (!$page) {
            $offset = 0;
        } else {
            $offset = $page;
        }

        //set conditions for search
        $keywords = $this->input->post('keywords');
        $sortBy = $this->input->post('sortBy');
        if (!empty($keywords)) {
            $conditions['search']['keywords'] = $keywords;
        }
        if (!empty($sortBy)) {
            $conditions['search']['sortBy'] = $sortBy;
        }

        //total rows count
        $totalRec = count($this->table->getRows_apartment_setting($conditions));

        //pagination configuration
        $config['target'] = '#postList';
        $config['base_url'] = site_url() . 'admin/apartment/ajaxTblSettingData';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->perPage;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;

        //get posts data
        $data['posts'] = $this->table->getRows_apartment_setting($conditions);

        //load the view
        $this->load->view('admin/apartment/ajaxTblSettingData', $data, false);
    }

    public function setting($id = "") {

        $admin_id = $this->session->userdata['admin']['id'];

        if ($id) {
            $where = array('id' => $id);
            $data['details'] = $dts = $this->common->getRow('apartment_setting', $where);
            if (empty($dts)) {
                redirect('/admin/apartment/setting_list');
            }
        }
        $data['id'] = $id;
        $where_apt = array('status' => '1', 'admin_id' => $admin_id);
        $data['apt_list'] = $this->common->getResults('property_rental', $where_apt);
        $data['title'] = 'Admin Dashboard - Setting';
        $data['contents'] = 'admin/apartment/setting';
        $this->load->view("theme/template", $data);
    }

    public function manage_setting() {

        $admin_id = $this->session->userdata['admin']['id'];
        $msg = array();
        $SER_ERROR = 0;
        if ($this->input->post()) {
            //  print_r($this->input->post()); die();
            $table = 'apartment_setting';

            // ------validation------------
            $blocked_form = ($this->input->post('blocked_form'));
            $blocked_to = $this->input->post('blocked_to');

            $edit_id = ($this->input->post('edit_id'));
            $this->form_validation->set_rules('apt_id', 'Apartment', 'required');
            $this->form_validation->set_rules('blocked_form', 'Blocked form', 'required');
            $this->form_validation->set_rules('blocked_to', 'Blocked to', 'required');

            if ($blocked_form > $blocked_to) {
                $SER_ERROR = 1;
                $ser_error_name = "Blocked from date greater than Blocked To";
            }

            if ($SER_ERROR == 0 && $this->form_validation->run() == TRUE) {
                //set data 
                $data = array();
                $apt_id = $this->input->post('apt_id');
                $data['apt_id'] = $apt_id;
                $data['admin_id'] = $admin_id;
                $data['note'] = base64_encode(trim($this->input->post('note')));
                $data['blocked_to'] = strtotime($blocked_to);
                $data['blocked_form'] = strtotime($blocked_form);
                $data['updated_on'] = strtotime(date("Y-m-d H:i:s"));

                $redirect_page = site_url("admin/apartment/setting_list");
                // add and update  data 
                $msg = array('data', $data);
                if ($edit_id) {
                    $formsEdit = $this->common->update($table, $data, array('id' => $edit_id));
                    $msg = array('redirect', ' Apartment setting updated successfully', $redirect_page);
                } else {
                    $data['added_on'] = strtotime(date("Y-m-d H:i:s"));
                    $apt_id = $this->common->insert($table, $data);
                    $msg = array('redirect', 'Apartment setting created successfully', $redirect_page);
                }
            } else {

                $msg = array('danger', validation_errors());
                $msg = array('danger', $ser_error_name);
            }
        }

        echo $msg = json_encode($msg);
    }

}

?>