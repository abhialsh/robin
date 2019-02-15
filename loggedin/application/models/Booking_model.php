<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Booking_model extends CI_Model {
    /*
     * get rows from the posts table forms_response
     */

    public $table = "sp_services";
    public $table_cat = "sp_category";

    function get_serviceCategories($ses_id, $type) {

        //  SELECT count(sp_services.category) as count_category, sp_category.* FROM `sp_category`
        //   left JOIN sp_services ON sp_category.id=sp_services.category WHERE 1 and sp_category.added_by=$ses_id and cat_type='service' 
        //     AND `sp_services`.`isdelete`='0' AND `sp_category`.`isdelete`='0'  GROUP BY sp_category.id ORDER BY sp_category.order_by_drag
        $this->db->select('count(s.category) as count_category, c.*');
        $this->db->from($this->table_cat . ' as c ');
        $this->db->join($this->table . ' as s ', 'c.id = s.category', 'left');
        $this->db->where(array('c.added_by' => $ses_id, 'c.cat_type' => $type, 's.isdelete' => '0', 'c.isdelete' => '0'));
        $this->db->group_by('c.id');
        $this->db->order_by('c.order_by_drag', 'desc');
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }

    function get_category_list($ses_id, $type) {

        $this->db->select('c.*');
        $this->db->from($this->table_cat . ' as c ');
        $this->db->where(array('c.added_by' => $ses_id, 'c.cat_type' => $type, 'c.isdelete' => '0'));
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }

    function get_staff_list($admin) {
        $this->db->select('id,name,email');
        $query = $this->db->get_where('sp_staff', array('added_by' => $admin), 0, 500);
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }

    function cat_services($id) {

        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where(array('category' => $id, 'isdelete' => '0')); //'booking_type' => "service",
        $this->db->order_by('order_by_drag', 'desc');
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }

    function bus_time_schedule($id) {
        $query = $this->db->get_where('bus_time_schedule', array('class_id' => $id), 0, 500);
        $totalFiltered1 = $query->num_rows();
        $result = $query->result_array();
        $day = array();
      
        foreach ($result as $rowdata) {
               
                if ($rowdata['day'] == 1) {
                    $day[1] = array_unique(json_decode($rowdata['time'], true));
                }
                if ($rowdata['day'] == 2) {
                    $day[2] = array_unique(json_decode($rowdata['time'], true));
                }
                 if ($rowdata['day'] ==3) {
                    $day[3] = array_unique(json_decode($rowdata['time'], true));
                }
                 if ($rowdata['day'] == 4) {
                    $day[4] = array_unique(json_decode($rowdata['time'], true));
                }
                 if ($rowdata['day'] == 5) {
                    $day[5] = array_unique(json_decode($rowdata['time'], true));
                } if ($rowdata['day'] == 6) {
                    $day[6] = array_unique(json_decode($rowdata['time'], true));
                }
                 if ($rowdata['day'] == 7) {
                    $day[7] = array_unique(json_decode($rowdata['time'], true));
                }

        }
        return $day;
    }

    function class_time_shedule($id) {
        $query = $this->db->get_where('class_staff_schedule', array('class_id' => $id), 0, 500);
        $totalFiltered1 = $query->num_rows();
        $result = $query->result_array();
        $day = array();
        foreach ($result as $rowdata) {

            if ($rowdata['day'] == 1) {
                $day[1][] = $rowdata['time'];
            }
            if ($rowdata['day'] == 2) {
                $day[2][] = $rowdata['time'];
            }
            if ($rowdata['day'] == 3) {
                $day[3][] = $rowdata['time'];
            }
            if ($rowdata['day'] == 4) {
                $day[4][] = $rowdata['time'];
            }
            if ($rowdata['day'] == 5) {
                $day[5][] = $rowdata['time'];
            }
            if ($rowdata['day'] == 6) {
                $day[6][] = $rowdata['time'];
            }
            if ($rowdata['day'] == 7) {
                $day[7][] = $rowdata['time'];
            }
        }
        return $day;
    }

    function staffNamesBycommaIds($staff_data) {

        $str = '';
        if ($staff_data != '') {
            $arr = explode(",", $staff_data);

            for ($x = 0; $x < COUNT($arr); $x++) {
                $this->db->select('name');
                $this->db->from("sp_staff");
                $this->db->where("id=$arr[$x]");
                $query = $this->db->get();

                if ($query->num_rows() > 0) {

                    $data2 = $query->row_array();
                    $str .= ucfirst($data2['name']) . ", ";
                }
            }
            $str = rtrim($str, ", ");
        }
        return $str;
    }

    function form_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function copy_service($id, $service_name) {
        $sql = "INSERT INTO sp_services
                (category,name,tagline,description,staff_id,service_duration_hours,service_duration_min,break_time,booking_avail_between,service_type,accept_payment_method,price,currency,request_deposit,location,max_participant,book_upto,schedule,photo,status,added_on,added_by,custmize ,`from_date`, `to_date`, `booking_type`, `mode_id`)
                SELECT category,name,tagline,description,staff_id,service_duration_hours,service_duration_min,break_time,booking_avail_between,service_type,accept_payment_method,price,currency,request_deposit,location,max_participant,book_upto,schedule,photo,status,added_on,added_by,custmize ,`from_date`, `to_date`, `booking_type`, `mode_id`
                FROM sp_services
                WHERE id = '$id'";
        $this->db->query($sql);
        $last_id = $this->db->insert_id();
        if ($last_id) {
            $this->db->where('id', $last_id);
            $data['name'] = "Copy of " . $this->Form_input($service_name);
            return $this->db->update('sp_services', $data);
        }
    }

      function copy_bus($id, $service_name) {
        $rd = 0;
        $this->copy_service($id, $service_name);
        $query = $this->db->get_where('class_staff_schedule', array('class_id' => $id), 0, 500);
        $num = $query->num_rows();

        if ($num) {

            foreach ($query->result_array() as $datass) {

                $m_data['class_id'] = $last_id;
                $m_data['time'] = $datass['time'];
                $m_data['staff_id'] = $datass['staff_id'];
                $m_data['day'] = $datass['day'];
                if ($m_data) {
                    $rd = $this->db->insert('class_staff_schedule', $m_data);
                }
            }
        }
        return $rd;
    }
    function copy_class($id, $service_name) {
        $rd = 0;
        $this->copy_service($id, $service_name);
        $query = $this->db->get_where('class_staff_schedule', array('class_id' => $id), 0, 500);
        $num = $query->num_rows();

        if ($num) {

            foreach ($query->result_array() as $datass) {

                $m_data['class_id'] = $last_id;
                $m_data['time'] = $datass['time'];
                $m_data['staff_id'] = $datass['staff_id'];
                $m_data['day'] = $datass['day'];
                if ($m_data) {
                    $rd = $this->db->insert('class_staff_schedule', $m_data);
                }
            }
        }
        return $rd;
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
