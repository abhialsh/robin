<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Restaurant_model extends CI_Model {
    /*
     * get rows from the posts table forms_response
     */

    public function __construct() {

        parent::__construct();
        $this->admin_id = $this->session->userdata['admin']['id'];
    }

    function menu_category_list() {
        $this->admin_id;
        $this->db->select('*');
        $this->db->where('admin_id', $this->admin_id);
        $this->db->order_by('id','asc');
        $query = $this->db->get("rest_menu_category");
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    } 
    
    function rest_menu_item($cat_id) {
        $this->admin_id;
        $this->db->select('*');
        $this->db->where(array('admin_id'=> $this->admin_id,'cat_id'=>$cat_id));
        $this->db->order_by('id','asc');
        $query = $this->db->get("rest_menu_item");
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }
       function item_size($item_id) {
        $this->admin_id;
        $this->db->select('*');
        $this->db->where(array('admin_id'=> $this->admin_id,'item_id'=>$item_id));
        $this->db->order_by('id','asc');
        $query = $this->db->get("rest_item_size");
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }
      function rest_addon_group() {
        $this->admin_id;
        $this->db->select('*');
        $this->db->where(array('admin_id'=> $this->admin_id));
        $this->db->order_by('id','asc');
        $query = $this->db->get("rest_addon_group");
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }
    
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

}
