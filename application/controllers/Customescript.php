<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customescript extends CI_Controller {

	function __construct() {
      	parent::__construct();

        header('Cache-Control: no-cache, must-revalidate, max-age=0');
        header('Cache-Control: post-check=0, pre-check=0',false);
        header('Pragma: no-cache');

        $this->load->library('Laccount');
        $this->load->model('Users');		
    }

    public function change_unique_user_id() {
//        $last_id =  $this->Users->getUserUniqueId(4);
//        c_pr($last_id);
//        $this->db->select('users.*,user_login.*,user_login.status as active_status,country.name as country_name');
//        $this->db->from('users');
//        $this->db->join('user_login', 'user_login.user_id = users.user_id');
//        $this->db->join('country', 'country.country_id = users.country','left');
////        $this->db->where_in('user_type',array(3,4,5));
//        $this->db->where('user_type',5);
//        $this->db->order_by('users.doc','asc');
//        $this->db->group_by('users.user_id');
//        $result = $this->db->get()->result();
//        if (!empty($result)) {
//            foreach ($result as $row) {
//                $last_id =  $this->Users->getUserUniqueId($row->user_type);
//                if ($last_id != "") {
//                    if ($row->user_type == 3) {
//                        $update_data['unique_id'] = 'CL' . $last_id;
//                    } elseif ($row->user_type == 4) {
//                        $update_data['unique_id'] = 'FR' . $last_id;
//                    } elseif ($row->user_type == 5) {
//                        $update_data['unique_id'] = 'NL' . $last_id;
//                    }
//                    $update_data['unique_user_key'] = $last_id;
//                    $this->db->where('user_id', $row->user_id);
//                    $this->db->update('user_login', $update_data);
//                }
//            }
//        }
//        echo "<pre>"; print_r($result);die;
    }
		
}
