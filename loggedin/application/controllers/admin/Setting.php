<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

    function __construct() {
        parent:: __construct();
        $this->load->model("Common_model", "common");
        $this->common->checkAdminSession();
        $this->admin_id = $this->session->userdata['admin']['id'];
    }

    public function profile() {
 
        $admin_id = $this->session->userdata['admin']['id'];
        $where = array('id' => $admin_id);
        $dts = $this->common->getRow('admin', $where);
        $where_bs = array('admin_id' => $admin_id);
        $biz_info = $this->common->getRow('business_info', $where_bs);

        $data['title'] = 'Admin Dashboard';
        $data['contents'] = 'admin/profile';
        $data['admin_id'] = $admin_id;
        $data['admin_data'] = $dts;
        $data['business_data'] = $biz_info;
        $data['countries'] = $this->common->getResults('countries');

        $this->load->view("theme/template", $data);
    }

    public function checkmail() {
        return true;
    }

    public function crud_profile() {

        $msg = array();
        if ($this->input->post()) {
            $mailstatus = '';
            $additional = '';
            $admin_id = $this->admin_id;
            //  $admindata = $this->common->getRow("admin", array('id' => $admin_id));
            // echo  $admin_email = $admindata['email'];
            $admin_email = $this->session->userdata['admin']['email'];

            if (trim($admin_email) != trim($this->input->post('admin_email'))) {

                $admin_email = ($this->input->post('admin_email'));
                $admin_email1 = $this->input->post('admin_email');
                $check_email = $this->common->getRow("admin", array('email' => $admin_email1));

                if ($check_email) {
                    $msg = array('danger', 'Email address already taken');
                    die();
                }

                $ck = $this->checkmail($admin_email, $admin_email1, $this->input->post('insert_admin_name'));
                if ($ck == 1) {
                    $mailstatus = "ok";
                    $msg = array('success', "Please verify that you've changed your email address for LoggedIn");
                }
            }

            $totalday = count($this->input->post('working_days'));
            $daydata = array();
            for ($i = 0; $i < $totalday; $i++) {
                if ($this->input->post('working_days')[$i] != '') {
                    $daydata['day'] = $this->input->post('working_days')[$i];
                    $daydata['start_time'] = $this->input->post('start_time')[$i];
                    $daydata['end_time'] = $this->input->post('end_times')[$i];
                }
                $daydata1[] = $daydata;
            }

            $COUNTRY_CODE = explode(',', $this->input->post('country_code'));
            $admin['business_name'] = $this->input->post('business_name');
            $admin['business_phone'] = $this->input->post('bussiness_phone');
            $admin['country_code'] = "+" . $COUNTRY_CODE[1];
            $admin['country'] = $COUNTRY_CODE[0];
            //$admin['email']=$this->input->post('admin_email'); 
            $admin['timezone'] = $this->input->post('timezone');
            $admin['name'] = $this->input->post('insert_admin_name');
            $admin['last_name'] = $this->input->post('insert_admin_lname');
            $admin['contact'] = $this->input->post('contact_number');
            $admin['contact_wc'] = $admin['country_code'] . $this->input->post('contact_number');

            $formsEdit = $this->common->update('admin', $admin, array('id' => $admin_id));

            // ---- update business info start -------------
            $res_BI = $this->common->getRow("business_info", array('admin_id' => $admin_id));

            $addtionalgallery = $res_BI['gallery_images'];

            $bus['website'] = $this->input->post('weburl');
            $bus['fb_url'] = $this->input->post('fburl');
            $bus['linkdin_url'] = $this->input->post('linkdin');
            $bus['instagram_url'] = $this->input->post('instagram');
            $bus['twitter_url'] = $this->input->post('twitter');
            $bus['googleplus_url'] = $this->input->post('googleplus');
            $bus['youtube_url'] = $this->input->post('youtube');
            $bus['listing_keyword'] = $this->input->post('listing_keyword');
            $bus['categories'] = implode(',', $this->input->post('listing_category'));
            $bus['lat'] = $this->input->post('lat');
            $bus['lng'] = $this->input->post('lng');
            $bus['timeshedule'] = json_encode($daydata1, true);
            $bus['description'] = $this->input->post('description');
            // gallary image upload start ------
              if (!empty($_FILES['gallery']['name'])) {
                $totalfile = count($_FILES['gallery']);
                for ($j = 0; $j < $totalfile; $j++) {
                    if ($_FILES['gallery']['name'][$j]) {
                        $allowed = array(
                            'gif',
                            'png',
                            'jpg',
                            'GIF',
                            'PNG',
                            'jpge',
                            'JPG',
                            'JPGE'
                        );
                        $filename_check = $_FILES['gallery']['name'][$j];
                        $ext = pathinfo($filename_check, PATHINFO_EXTENSION);
                        if (!in_array($ext, $allowed)) {
                            echo 'error';
                            die;
                        }
                        $imgname = time() . $_FILES["gallery"]["name"][$j];
                        $target_file = "gallery/" . $imgname;
                        move_uploaded_file($_FILES["gallery"]["tmp_name"][$j], $target_file);
                        $img_data[] = $imgname;
                    }
                }
                $gallery = implode(',', $img_data);
                if ($gallery != '' && $addtionalgallery != '') {
                    $gallery = $gallery . ',' . $addtionalgallery;
                }
                if ($gallery != '') {
                    $bus['gallery_images'] = $gallery;
                }
            }
            //--------  Faq  start ------

            $count = count($this->input->post('faq_question'));
            for ($i = 0; $i < $count; $i++) {
                if ($this->input->post('faq_question')[$i]) {

                    if ($this->input->post('faq_question')[$i] != '' && $this->input->post('faq_answer')[$i] != '') {
                        $faq_data['question'] = $this->input->post('faq_question')[$i];
                        $faq_data['answer'] = $this->input->post('faq_answer')[$i];
                    }

                    $data_faq[] = $faq_data;
                }
            }
            $bus['faq'] = base64_encode(json_encode($data_faq));

         //--------add update business info  ------
            if ($res_BI) {
                $bus['address'] = $this->input->post('street_address');
                $this->common->update("business_info", $bus, array('admin_id' => $admin_id));
            } else {
                $bus['admin_id'] = $admin_id;
                $bus['address'] = $this->input->post('street_address');
                $lastFormId = $this->common->insert("business_info", $bus);
            }
          //-------- update admin session ------
//            $ses = $this->session->userdata['admin'];
//            $ses['business_address'] = $this->input->post('street_address');
//            $ses['business_name'] = $this->input->post('insert_business_name');
//            
//             $this->session->set_userdata('admin', $ses);
            
            $redirect_page = site_url("admin/setting/profile/");
            if ($mailstatus != "ok") {
                $msg = array('redirect', 'Profile saved successfully', $redirect_page);
            }
        }
           echo $msg = json_encode($msg);
    }

}

?>