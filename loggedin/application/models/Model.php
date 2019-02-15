<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Model extends CI_Model {
	
	public function selectdetails($table,$order_by='',$type='')
	{
		$this->db->select("*");
		$this->db->from($table);
		if(!empty($order_by) && !empty($type)){
			$this->db->order_by($order_by, $type);
		}
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function selectdetailsWhere($table,$condition)
	{
		if($condition != ""){
			$query = $this->db->get_where($table,$condition);
		}else{
			$query = $this->db->get($table);
		}
			return $query->result_array();
	}
	
	public function update($table,$data,$where=""){
		$query = $this->db->update($table,$data,$where);
        return $query;
	}
	
}
?>