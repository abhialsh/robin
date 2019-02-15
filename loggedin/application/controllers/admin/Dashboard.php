<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct() {

        parent:: __construct();
        $this->load->model("operationmodel");
        $this->load->model("Common_model", "common");
    }

    public function index() {

        $this->common->checkAdminSession();
        $data['title'] = 'Admin Dashboard';
        $data['contents'] = 'admin/dashboard';
        $this->load->view("theme/template", $data);
    }

    public function login() {   
        if($this->common->isAdmin()){
             redirect('/admin/dashboard/'); 
        }
        $data['countries'] = $this->common->get_result('countries');
       $this->load->view("admin/login", $data);
    }

     public function auth_login(){
           $msg = array();
         if ($this->input->post()) {

            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() == TRUE) {
              
                $login_data['email'] = trim($this->input->post('username'));
                $login_data['password'] = md5(trim($this->input->post('password')));

                $res_admin = $this->operationmodel->login("admin", $login_data);
                
                $email = trim($this->input->post('username'));
                $timezone = trim($this->input->post('timezone'));
                $res_subadmin = $this->operationmodel->login("sub_admin", array('email' => $email));

                if (!empty($res_admin)) {
                    $ser_error = 0;
                    $err_msg = '';
                    $mailstatrus = $res_admin->mail_verify;
                    if ($mailstatrus == '1') {
                        $err_msg = 'Please try again later.';
                        $ser_error = 0;
                    }
                    if ($res_admin->status == '1') {
                        $err_msg .= 'User is not allowed to login.';
                        $ser_error = 0;
                    }
                    if ($ser_error == 0) {

                        $a['last_login'] = $res_admin->new_login;
                        $a['new_login'] = strtotime(date("Y-m-d H:i:s"));
                        if ($res_admin->timezone == "") {
                            $a['timezone'] = $timezone;
                        }
                        $this->common->update('admin', $a, array('id' => $res_admin->id));

                        $newdata = array(
                            'id' => $res_admin->id,
                            'admin_permission' => "admin",
                            'admin_profile' => base_url('uploads/admin/profile/thumb/') . $res_admin->profile_dp,
                            'set_time_zone' => $res_admin->timezone,
                            'name' => $res_admin->name,
                            'email' => $res_admin->email,
                            'lastlogin' => $res_admin->last_login,
                            'mobile' => $res_admin->contact,
                            'business_name' => $res_admin->business_name,
                            'business_address' => '',
                            
                           
                        );
                        $this->session->set_userdata('admin', $newdata);

                         if ($res_admin->business_name != "") {
                              $redirect_page = site_url("admin/dashboard");
                        } else {
                           $redirect_page = site_url("admin/setting/profile");
                        }
                       
                      $msg = array('redirect', 'Login successfully', $redirect_page);
                     
                      //  redirect("admin/dashboard");
                    } else {
                        $msg = array('danger', $err_msg);
                    }
                } else if (!empty($res_subadmin)) {   
                    $newdata = array(
                        'id' => $res_subadmin->id,
                        'admin_permission' => "user",
                        'admin_profile' => base_url('uploads/admin/profile/thumb/') . $res_subadmin->profile_dp,
                        'set_time_zone' => $res_subadmin->timezone,
                        'name' => $res_subadmin->name,
                        'email' => $res_subadmin->email,
                        'lastlogin' => $res_subadmin->last_login,
                        'mobile' => $res_subadmin->contact,
                    );
                    $this->session->set_userdata('admin', $newdata);
                    
                       $redirect_page = site_url("admin/dashboard");
                       
                       
                     $msg = array('redirect', 'Login successfully', $redirect_page);
                   
                } else {
                     $msg = array('danger', 'Username or password is incorrect.');
                }
            }
        }
          echo $msg = json_encode($msg);
     }
    
    
    public function register() {

        $msg = array();
        if ($this->input->post()) {

            $this->form_validation->set_rules('name', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('email', 'email', 'required');

            if ($this->form_validation->run() == TRUE) {

                $contact_number = contact_no_validate(trim($this->input->post('contact_number')));
                $country = explode(",", $this->input->post('country'));
                $country_code = $country[1];
                $country = $country[0];
                $country_code = '+' . str_replace(' ', '', $country_code);

                $password = trim($this->input->post('password'));
                $timezone = trim($this->input->post('timezone'));
                $email = trim($this->input->post('email'));


                $contactcheck = $this->common->get_row("admin", array('contact' => $contact_number));
                $emailcheck = $this->common->get_row("admin", array('email' => $email));

                $sql = $this->db->last_query();

                if ($contactcheck == '' && $emailcheck == '') {
                    
                    $a['contact'] = $contact_number;
                    $a['country_code'] = $country_code;
                    $a['contact_wc'] = $contact_wc = $country_code . $contact_number;
                    $a['business_phone'] = $country_code . trim($this->input->post('business_phone'));
                    $a['email'] = trim($this->input->post('email'));
                    $a['name'] = trim($this->input->post('name'));
                    $a['last_name'] = trim($this->input->post('lname'));
                    $a['business_name'] = trim($this->input->post('business_name'));
                    $a['country'] = $country;
                    $a['admin_type'] = '2';
                    $a['password'] = md5($password);
                    $a['pass_md5'] = $password;
                    $a['last_login'] = strtotime(date("Y-m-d H:i:s"));
                    $a['new_login'] = strtotime(date("Y-m-d H:i:s"));
                    $a['timezone'] = $timezone;

                    $lastId = $this->common->insert("admin", $a);

                    $resultPer = $this->common->get_result("menu", array('`status`' => 1));

                    $perm = '';
                    foreach ($resultPer as $rows) {
                        $perm = $perm . "," . $rows->id;
                    }
                    $mainper = ltrim($perm, ",");
                    $aa['admin_id'] = $lastId;
                    $aa['permission'] = $mainper;
                    $aa['createdate'] = strtotime(date("Y-m-d H:i:s"));

                    $this->common->insert("admin_permission", $aa);

                    // login 
                    if ($lastId) {
                        //-----staff insert owner 02-10-2018 abhilash  start ---------
                        $Staff['name'] = 'Owner';
                        $Staff['email'] = $email;
                        $Staff['phone'] = $contact_wc;
                        $Staff['set_time'] = '1';
                        $Staff['admin_id'] = $lastId;
                        $Staff['added_on'] = date("Y-m-d H:i:s");

                        $stff_id = $this->common->insert("service_staff", $Staff);

                        $redirect_page = site_url("home/thankyou?email=$email");
                    } else {
                        $msg = array('danger', 'Please try again later.');
                    }

                    $msg = array('redirect', 'Registration successfully', $redirect_page);
                } else {

                    if ($emailcheck->email == $email) {
                        $msg = array('danger', 'This email address already exists');
                    } else {
                        $msg = array('danger', 'Mobile number already exists');
                    }
                }
            }
        }

        echo $msg = json_encode($msg);
    }

    public function logout() {
        $newdata = array(
            'name' => '',
            'email' => '',
            'lastlogin' => '',
            'mobile' => ''
        );
        $this->session->unset_userdata($newdata);
        $this->session->sess_destroy();
        redirect('admin/dashboard/login');
    }

}

?>