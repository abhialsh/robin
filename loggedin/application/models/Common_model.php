<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Common_model extends CI_Model {

    public function insert($table_name = '', $data = '') {
        $query = $this->db->insert($table_name, $data);
        if ($query)
            return $this->db->insert_id();
        else
            return FALSE;
    }

    public function get_result($table_name = '', $id_array = '', $columns = array(), $order_by = array(), $limit = '') {
        if (!empty($columns)):
            $all_columns = implode(",", $columns);
            $this->db->select($all_columns);
        endif;
        if (!empty($order_by)):
            $this->db->order_by($order_by[0], $order_by[1]);
        endif;
        if (!empty($id_array)):
            foreach ($id_array as $key => $value) {
                $this->db->where($key, $value);
            }
        endif;
        if (!empty($limit)):
            $this->db->limit($limit);
        endif;
        $query = $this->db->get($table_name);
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return FALSE;
    }

    public function getResults($table_name = '', $id_array = '', $columns = array(), $order_by = array(), $limit = '') {
        if (!empty($columns)):
            $all_columns = implode(",", $columns);
            $this->db->select($all_columns);
        endif;
        if (!empty($order_by)):
            $this->db->order_by($order_by[0], $order_by[1]);
        endif;
        if (!empty($id_array)):
            foreach ($id_array as $key => $value) {
                $this->db->where($key, $value);
            }
        endif;
        if (!empty($limit)):
            $this->db->limit($limit);
        endif;
        $query = $this->db->get($table_name);
        if ($query->num_rows() > 0)
            return $query->result_array();
        else
            return FALSE;
    }

    public function get_row($table_name = '', $id_array = '', $columns = array(), $order_by = array()) {

        if (!empty($columns)):
            $all_columns = implode(",", $columns);
            $this->db->select($all_columns);
        endif;
        if (!empty($id_array)):
            foreach ($id_array as $key => $value) {
                $this->db->where($key, $value);
            }
        endif;
        if (!empty($order_by)):
            $this->db->order_by($order_by[0], $order_by[1]);
        endif;
        $query = $this->db->get($table_name);
        if ($query->num_rows() > 0)
            return $query->row();
        else
            return FALSE;
    }

    public function getRow($table_name = '', $id_array = '', $columns = array(), $order_by = array()) {

        if (!empty($columns)):
            $all_columns = implode(",", $columns);
            $this->db->select($all_columns);
        endif;
        if (!empty($id_array)):
            foreach ($id_array as $key => $value) {
                $this->db->where($key, $value);
            }
        endif;
        if (!empty($order_by)):
            $this->db->order_by($order_by[0], $order_by[1]);
        endif;
        $query = $this->db->get($table_name);
        if ($query->num_rows() > 0)
            return $query->row_array();
        else
            return FALSE;
    }

    public function update($table_name = '', $data = '', $id_array = '') {
        if (!empty($id_array)):
            foreach ($id_array as $key => $value) {
                $this->db->where($key, $value);
            }
        endif;
        return $this->db->update($table_name, $data);
    }

    public function delete($table_name = '', $id_array = '') {
        return $this->db->delete($table_name, $id_array);
    }

    public function password_check($data = '') {
        $query = $this->db->get_where('users', $data);
        if ($query->num_rows() > 0)
            return TRUE;
        else {
            //$this->form_validation->set_message('password_check', 'The %s field can not match');
            return FALSE;
        }
    }

    public function checkAdminSession() {
        $users = $this->session->userdata('admin');
        if (empty($users)) {
            redirect('admin/dashboard/login', 'location', 301);
            die;
        }
        return true;
    }

    public function isAdmin() {
        $users = $this->session->userdata('admin');
        if ($users) {
            return true;
        } else {
            return false;
        }
    }

}
