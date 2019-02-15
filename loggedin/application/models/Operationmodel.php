<?php

class Operationmodel extends CI_Model {

    function saveData($table, $data) {
        $this->db->insert($table, $data);
        $q = $this->db->insert_id();
        return $q;
    }

    function getallData($table, $where= '',$row='') {
       
       if(!empty($row)){
             $q = $this->db->get_where($table, $where);
             $data = $q->row();
        }
        if ($where == '') {
            $q = $this->db->get($table);
            $data = $q->result_array();
        }
        
         else {
             $q = $this->db->get_where($table, $where);
             $data = $q->result_array();
        }
        return $data;
    }

    function condition($table, $where) {

        $q = $this->db->get_where($table, $where);
        $data = $q->result_array();
        return $data;
    }

    function login($table, $where) {
        $data = '';
        $q = $this->db->get_where($table, $where);
        $row = $q->num_rows();
        if ($row > 0) {
            $data = $q->row();
        }
        return $data;
    }

    function checkUser($table, $where) {
        $q = $this->db->get_where($table, $where);
        $data = $q->num_rows();
        return $data;
    }

    function deleteData($table, $where) {
        $q = $this->db->delete($table, $where);
        return $q;
    }

    function editData($table, $set, $where) {
        $q = $this->db->update($table, $set, $where);
        return $q;
    }

    function filterData($table = '', $where = '', $like = '', $coloum = '', $form = '', $limit = '', $start = '') {
        $this->db->select("*");
        $this->db->from($table);
       if (!empty($where)) {
            $this->db->where($where);
        }
        
        if (!empty($like)) {
            $this->db->or_like($like);
        }
        if (!empty($limit) && !empty($start)) {
            $this->db->limit($limit, $start);
        }
        $this->db->order_by($coloum, $form);
        $q = $this->db->get();
        $data = $q->result_array();
        return $data;
    }

    public function checkSuperadmin() {
        $users = $this->session->userdata('securelogin');
        if (empty($users)) {
            redirect('superadmin/dashboard/login');
            die;
        }
        return true;
    }
      public function checkAdmin() {
        $users = $this->session->userdata('securesublogin');
        if (empty($users)) {
            redirect('admin/dashboard/login');
            die;
        }
        return true;
    } 

    public function getSpecialData($table,$coloum='*',$where='',$order_by='',$form='', $limit='', $offset='',$join_table='',$join_condition='',$join_type='inner',$search='')
    {
        $this->db->select($coloum);
        $this->db->from($table);
        if($where != '')
        {
            $this->db->where($where);
        }
        if($search!='')
        {
          $this->db->or_like($search);
        }
        if($order_by != '' && $form != '')
        {
            $this->db->order_by($order_by, $form);
        }
        if($join_table != '')
        {
            $this->db->join($join_table,$join_condition,$join_type);
        }
        if($limit != '' && $offset !='')
        {
            $this->db->limit($offset,$limit);
        }

        $q = $this->db->get();
        $data['last_query'] =$this->db->last_query();
        $data['num_row'] = $q->num_rows();
        $data['record'] = $q->result_array();
        return $data;
    }


    /*-------->For pagination<---------*/
public function record_count($table,$coloum='*',$where='',$search='', $join_table='',$join_condition='',$join_type='')
 {
    $this->db->select($coloum);
        $this->db->from($table);
        if($where != '')
        {
            $this->db->where($where);
        }
        if($search!='')
        {
            $this->db->or_like($search);
          
        }
        
        if($join_table != '')
        {
            $this->db->join($join_table,$join_condition,$join_type);
        }
        
        $query = $this->db->get();
        $num_row = $query->num_rows();
        return $num_row;
 }

   
}

?>