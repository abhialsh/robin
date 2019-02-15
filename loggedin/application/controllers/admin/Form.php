<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {

    function __construct() {

        parent:: __construct();
        $this->load->model("operationmodel");
        $this->load->model("Common_model", "common");
        $this->load->model("Table_model", 'table');
        $this->load->helper('text');
        $this->load->library('Ajax_pagination');
        $this->perPage = 50;
    }

    public function index() {

        $this->common->checkAdminSession();
        $admin_id = $this->session->userdata['admin']['id'];
        $data['title'] = 'Admin Dashboard';
        $data['contents'] = 'admin/form/forms_list';
        $where = array('admin_id' => $admin_id);
        $data['formslist'] = $this->common->get_result('formBuilder', $where);
        $this->load->view("theme/template", $data);
    }

    public function forms_response() {

        $this->common->checkAdminSession();
        $admin_id = $this->session->userdata['admin']['id'];
        $data['title'] = 'Admin Dashboard';
        $data['contents'] = 'admin/form/forms_response_list';
        $where = array('admin_id' => $admin_id);
        $data['formslist'] = $this->common->get_result('formBuilder', $where);
        $this->load->view("theme/template", $data);
    }

    public function form_leads_list($id) {

        $this->common->checkAdminSession();
        if ($id) {

            $admin_id = $this->session->userdata['admin']['id'];
            // Update Notification Status as Read
            $table = 'forms_response';
            $formsEdit = $this->common->update($table, array("read" => "1"), array('form_id' => $id));

            $where = array('admin_id' => $admin_id);
            $data['formslist'] = $this->common->get_result('formBuilder', $where);

            // -------- table  start -------------------------------------------------------
            $data = array();

            //total rows count
            $totalRec = count($this->table->getRows_forms_response($id));

            //pagination configuration
            $config['target'] = '#postList';
            $config['base_url'] = site_url() . 'admin/form/ajaxPaginationData/';
            $config['total_rows'] = $totalRec;
            $config['per_page'] = $this->perPage;
            $config['link_func'] = 'searchFilter';
            $this->ajax_pagination->initialize($config);

            //get the posts data
            $data['posts'] = $this->table->getRows_forms_response($id, array('limit' => $this->perPage));
            $data['perPage'] = $this->perPage;

            //------ view start -----------------------------------------------------------------

            $data['title'] = 'Admin Dashboard';
            $data['id'] = $id;
            $data['contents'] = 'admin/form/formBuilder_leads_list';

            $this->load->view("theme/template", $data);
        } else {
            redirect('/admin/form/forms_response/');
        }
    }

    function ajaxPaginationData() {
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
        $totalRec = count($this->table->getRows_forms_response($id, $conditions));

        //pagination configuration
        $config['target'] = '#postList';
        $config['base_url'] = site_url() . 'admin/form/ajaxPaginationData';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->perPage;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;

        //get posts data
        $data['posts'] = $this->table->getRows_forms_response($id, $conditions);

        //load the view
        $this->load->view('admin/form/ajax-pagination-data', $data, false);
    }

    public function view_forms_lead($form_id, $id) {

        $this->common->checkAdminSession();
        if ($form_id && $id) {
            $where = array('id' => $form_id);
            $data['form'] = $this->common->getRow('formBuilder', $where);
            $where_lead = array('form_id' => $form_id, 'id' => $id);
            $data['leadDetails'] = $this->common->getResults('forms_response', $where_lead);

            $data['title'] = 'Form lead View';
            $data['contents'] = 'admin/form/view_forms_lead';
            $this->load->view("theme/template", $data);
        } else {
            redirect('/admin/form/forms_response/');
        }
    }

    public function generate_csv($id) {
        $this->common->checkAdminSession();
        $data['title'] = 'Admin Dashboard';
        $data['contents'] = 'admin/form/generate_csv';
        $this->load->view("theme/template", $data);
    }

    public function formRender($id = "") {

        $this->common->checkAdminSession();

        if ($id) {
            $data['formId'] = $id;
            $where = array('id' => $id);
            $data['details'] = $dts = $this->common->get_row('formBuilder', $where);
            if (empty($dts)) {
                redirect('/admin/form/');
            }
        }

        $data['title'] = 'Admin Dashboard';
        $data['contents'] = 'admin/form/formBuilder';
        $this->load->view("theme/template", $data);
    }

    public function formBuilder($id = "") {
        $this->common->checkAdminSession();
        $data['formId'] = '';
        $data['details'] = array();
        if ($id) {
            $data['formId'] = $id;
            $where = array('id' => $id);
            $data['details'] = $dts = $this->common->get_row('formBuilder', $where);
            if (empty($dts)) {
                redirect('/admin/form/');
            }
        }
        $data['title'] = 'Admin Dashboard';
        $data['contents'] = 'admin/form/formBuilder';
        $this->load->view("theme/template", $data);
    }

    public function formBuilder_Add_update() {

        $this->common->checkAdminSession();
        $admin_id = $this->session->userdata['admin']['id'];

        if ($this->input->post()) {

            $form_name = ucfirst($this->input->post('form_name'));
            $form_descr = ucfirst($this->input->post('form_descr'));
            $form_id = trim($this->input->post('a'));
            $form_data = ($this->input->post('form_data'));
            $status = $this->input->post('status');
            $form_data = preg_replace("/&#?[a-z0-9]+;/i", "", $form_data);
            $form_data = trim($form_data);
            $editstatus = $this->input->post('editstatus');
            $limitstatus = $this->input->post('limitstatus');

            if (($form_data == '[]')) {
                $SER_ERROR = 1;
                echo $response = json_encode(array("Error: There are no form fields, please select fields.", ''));
                die;
            }

            $table = "formbuilder";
            $uniqid = uniqid();

            $formcheck = $this->common->get_row($table, array('form_name' => $form_name, 'added_by' => $admin_id));

            $a['form_name'] = $form_name;
            $a['edit_status'] = $editstatus;
            $a['limit_status'] = $limitstatus;
            $a['form_descr'] = $form_descr;
            $a['status'] = $status;
            $a['admin_id'] = $admin_id;
            $a['form_data'] = $form_data;
            $a['added_by'] = $admin_id;
            $a['added_on'] = strtotime(date("Y-m-d H:i:s"));
            $a['updated_on'] = strtotime(date("Y-m-d H:i:s"));

            if ($form_id) {

                $formsEdit = $this->common->update($table, $a, array('id' => $form_id));
                $lastFormId = $form_id;
                echo $response = json_encode(array("Form updated successfully.", $lastFormId));
            } else {

                $lastFormId = $this->common->insert($table, $a);
                echo $response = json_encode(array("Form created successfully.", $lastFormId));
            }
        }
    }

    public function manageFormStaus() {

        $res = 0;
        if ($this->input->post('id')) {

            $status_array['status'] = trim($this->input->post('status'));
            $id = trim($this->input->post('id'));
            $res = $this->common->update("formBuilder", $status_array, array('id' => $id));
        }
        echo $res;
    }

}
