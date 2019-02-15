<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Table_model extends CI_Model {
    /*
     * get rows from the posts table forms_response
     */

    function getRows_forms_response($id, $params = array()) {

        $table = 'forms_response as f';
        $this->db->select('f.id,f.form_id,f.modified,f.created,a.name,a.email,a.contact,f.status');
        $this->db->from($table);
        $this->db->join('admin as a', 'f.admin_id = a.id');
        $this->db->where('f.form_id', $id);
        //filter data by searched keywords
        if (!empty($params['search']['keywords'])) {
            //  $this->db->like('id',$params['search']['keywords']);
            $this->db->group_start();
            $match = $params['search']['keywords'];
            $array = array('a.name' => $match, 'a.contact' => $match, 'a.email' => $match);
            $this->db->or_like($array);
            $this->db->group_end();
        }
        //sort data by ascending or desceding order
        if (!empty($params['search']['sortBy'])) {
            $this->db->order_by('f.id', $params['search']['sortBy']);
        } else {
            $this->db->order_by('f.id', 'desc');
        }
        //set start and limit
        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit'], $params['start']);
        } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit']);
        }
        //get records
        $query = $this->db->get();
        //return fetched data
        ///      echo $this->db->last_query();
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }

      function getRows_apartment_setting($params = array()) {
         $admin_id = $this->session->userdata['admin']['id'];
        $table = 'apartment_setting as f';
        $this->db->select('f.*,apt.name as apt_name ,a.name as username,a.email,a.contact_wc');
        $this->db->from($table);
        $this->db->join('admin as a', 'f.admin_id = a.id','inner');
        $this->db->join('property_rental as apt', 'apt.id = f.apt_id','inner');
        $this->db->where('f.admin_id', $admin_id);
        //filter data by searched keywords
        if (!empty($params['search']['keywords'])) {
            //  $this->db->like('id',$params['search']['keywords']);
            $this->db->group_start();
            $match = $params['search']['keywords'];
            $array = array('apt.name' => $match, 'f.blocked_form' => $match, 'f.blocked_to' => $match);
            $this->db->or_like($array);
            $this->db->group_end();
        }
        //sort data by ascending or desceding order
        if (!empty($params['search']['sortBy'])) {
            $this->db->order_by('f.id', $params['search']['sortBy']);
        } else {
            $this->db->order_by('f.id', 'desc');
        }
        //set start and limit
        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit'], $params['start']);
        } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit']);
        }
        //get records
        $query = $this->db->get();
        //return fetched data
        ///      echo $this->db->last_query();
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }

    
    
}
