<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {

    function __construct() {
        parent:: __construct();
        $this->load->model("Common_model", "common");
        $this->load->model("booking_model");
        $this->common->checkAdminSession();
    }

    public function history() {
        $data['title'] = 'Admin Dashboard';
        $data['contents'] = 'admin/booking/history';
        $this->load->view("theme/template", $data);
    }

    public function customers() {
        $data['title'] = 'Admin Dashboard';
        $data['contents'] = 'admin/booking/customers';
        $this->load->view("theme/template", $data);
    }

    public function new_customers() {
        $data['title'] = 'Admin Dashboard';
        $data['contents'] = 'admin/booking/new_customer';
        $this->load->view("theme/template", $data);
    }

    public function staff_list() {
        $data['title'] = 'Admin Dashboard';
        $data['contents'] = 'admin/booking/staff_list';
        $this->load->view("theme/template", $data);
    }

    public function new_staff() {
        $data['title'] = 'Admin Dashboard';
        $data['contents'] = 'admin/booking/new_staff';
        $this->load->view("theme/template", $data);
    }

    public function bus_list() {
        $data['title'] = 'Admin Dashboard';
        $data['contents'] = 'admin/booking/bus_list';
        $admin_id = $this->session->userdata['admin']['id'];
        $data['categories'] = $this->booking_model->get_serviceCategories($admin_id, 'bus');

        $this->load->view("theme/template", $data);
    }

    public function buslist() {
        $data['title'] = 'Admin Dashboard';
        $data['contents'] = 'admin/booking/buslist';
        $admin_id = $this->session->userdata['admin']['id'];
        $data['categories'] = $this->booking_model->get_serviceCategories($admin_id, 'bus');
        $this->load->view("theme/template", $data);
    }

    public function bus_setting() {
        $data['title'] = 'Admin Dashboard';
        $data['contents'] = 'admin/booking/bus_setting';
        $this->load->view("theme/template", $data);
    }

    public function booking_option() {
        $data['title'] = 'Admin Dashboard';
        $data['contents'] = 'admin/booking/booking_option';
        $this->load->view("theme/template", $data);
    }

    public function set_availability() {
        $data['title'] = 'Admin Dashboard';
        $data['contents'] = 'admin/booking/set_availability';
        $this->load->view("theme/template", $data);
    }

    public function email_reminder() {
        $data['title'] = 'Admin Dashboard';
        $data['contents'] = 'admin/booking/email_reminder';
        $this->load->view("theme/template", $data);
    }

    public function booking_policy() {
        $data['title'] = 'Admin Dashboard';
        $data['contents'] = 'admin/booking/booking_policy';
        $this->load->view("theme/template", $data);
    }

    public function appoinment_list() {
        $data['title'] = 'Admin Dashboard';
        $data['contents'] = 'admin/booking/appoinment_list';
        $admin_id = $this->session->userdata['admin']['id'];
        $data['categories'] = $this->booking_model->get_serviceCategories($admin_id,'service');

        $this->load->view("theme/template", $data);
    }

    public function copyServices() {

        $id = $this->input->post('a');
        $service_name = $this->input->post('service_name');
        echo $this->booking_model->copy_service($id, $service_name);
    }
    
     public function copyBus() {

        $id = $this->input->post('a');
        $service_name = $this->input->post('service_name');
        echo $this->booking_model->copy_bus($id, $service_name);
    }
   public function copyClass() {

        $id = $this->input->post('a');
        $service_name = $this->input->post('service_name');
        echo $this->booking_model->copy_class($id, $service_name);
    }
    
    public function updateCategory() {

        $id = $this->input->post('a');
        $service_name = $this->input->post('name');
        $admin_id = $this->session->userdata['admin']['id'];
        //check  
        $where = array('cat_type' => 'service', 'name' => $service_name, 'added_by' => "$admin_id", 'id<>' => $id);
        $check = $this->common->getRow('sp_category', $where);
        $oe = 0;
        if (!$check) {
            //update
            $a['name'] = $service_name;
            $oe = $this->common->update('sp_category', $a, array('id' => $id));
        }
        echo $oe;
    }

    public function class_list() {
        $data['title'] = 'Admin Dashboard';
        $data['contents'] = 'admin/booking/class_list';
        $admin_id = $this->session->userdata['admin']['id'];
        $data['categories'] = $this->booking_model->get_serviceCategories($admin_id, 'class');

        $this->load->view("theme/template", $data);
    }

    public function new_appoinment($id = "") {
        $admin_id = $this->session->userdata['admin']['id'];
        if ($id) {
            $data['formId'] = $id;
            $where = array('id' => $id, 'isdelete' => '0');
            $data['details'] = $dts = $this->common->getRow('sp_services', $where);
            $where_image = array('Apt_id' => $id);
            $apt_images = $this->common->getResults('sp_services', $where);
            // category detasils 
            $cat_id = $dts['category'];
            $cat_dts = $this->common->getRow('sp_category', array('id' => $cat_id));
            $data['details']['category_name'] = $cat_dts['name'];
            $data['category_list'] = $this->booking_model->get_category_list($admin_id, 'service');

            if (empty($dts)) {
                redirect('admin/booking/appoinment_list');
            }
        } else {
            $data['category_list'] = array();
        }

        $stripe_where = array('uid' => $admin_id, 'access_token !=' => '', 'stripe_publishable_key !=' => '', 'stripe_user_id' => '');
        //  $data['stripe_details'] = $this->common->getRow('stripe_details', $stripe_where);
        // makwah
        $config_where = array('admin_id' => $admin_id);
        // $makwahEnable = $this->common->getRow('admin_module_config', $config_where, array('makwah'));
        //  $data['makwahEnable'] = $makwahEnable;
        $data['staff_list'] = $this->booking_model->get_staff_list($admin_id, '');
        $data['title'] = 'Admin - Service Appoinment';
        $data['contents'] = 'admin/booking/new_appoinment';
        $this->load->view("theme/template", $data);
    }

    public function ajx_new_staff() {

        $admin_id = $this->session->userdata['admin']['id'];
        $staff_name = $this->input->post('add_staff_name');

        if ($staff_name && $admin_id) {

            $data = array();
            $data['name'] = $staff_name;
            $data['status'] = 1;
            $data['added_on'] = time();
            $data['added_by'] = $admin_id;

            $staff_id = $this->common->insert("sp_staff", $data);

            if ($staff_id) {
                ?>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="checkbox" required name="staff[]"  checked=""  value="<?php echo $staff_id ?>">
                        <label><?php echo $staff_name ?></label>  
                    </div>
                </div>
                <?php
            }
        }
    }

    public function manage_appoinment() {

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

    public function new_class($id ='') {
            $admin_id = $this->session->userdata['admin']['id'];
           if ($id) {
            $data['formId'] = $id;
            $where = array('id' => $id, 'isdelete' => '0');
            $data['details'] = $dts = $this->common->getRow('sp_services', $where);
            // category detasils 
            $cat_id = $dts['category'];
            $cat_dts = $this->common->getRow('sp_category', array('id' => $cat_id));
            $data['details']['category_name'] = $cat_dts['name'];
            $data['category_list'] = $this->booking_model->get_category_list($admin_id, 'class');

            if (empty($dts)) {
                redirect('admin/booking/appoinment_list');
            }
        } else {
            $data['category_list'] = array();
        }
 
        $config_where = array('admin_id' => $admin_id);
        // $makwahEnable = $this->common->getRow('admin_module_config', $config_where, array('makwah'));
        //  $data['makwahEnable'] = $makwahEnable;

        $data['title'] = 'Admin Dashboard';
        $data['contents'] = 'admin/booking/new_class';
        $this->load->view("theme/template", $data);
    }
    public function  manageClass(){
        
        
    }
    public function new_bus($id='') {
        
           if ($id) {
            $data['formId'] = $id;
            $where = array('id' => $id, 'isdelete' => '0');
            $data['details'] = $dts = $this->common->getRow('sp_services', $where);
            // category detasils 
            $cat_id = $dts['category'];
            $cat_dts = $this->common->getRow('sp_category', array('id' => $cat_id));
            $data['details']['category_name'] = $cat_dts['name'];
            $data['category_list'] = $this->booking_model->get_category_list($admin_id, 'service');

            if (empty($dts)) {
                redirect('admin/booking/appoinment_list');
            }
        } else {
            $data['category_list'] = array();
        }

        $stripe_where = array('uid' => $admin_id, 'access_token !=' => '', 'stripe_publishable_key !=' => '', 'stripe_user_id' => '');
        //  $data['stripe_details'] = $this->common->getRow('stripe_details', $stripe_where);
        // makwah
        $config_where = array('admin_id' => $admin_id);
        // $makwahEnable = $this->common->getRow('admin_module_config', $config_where, array('makwah'));
        //  $data['makwahEnable'] = $makwahEnable;

        $data['title'] = 'Admin Dashboard';
        $data['contents'] = 'admin/booking/new_bus';
        $this->load->view("theme/template", $data);
    }

    public function calender() {
        $data['title'] = 'Admin Dashboard';
        $data['contents'] = 'admin/booking/calender';
        $this->load->view("theme/template", $data);
    }

}
?>