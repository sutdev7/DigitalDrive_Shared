<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Homes extends CI_Model {

	public function __construct(){

		parent::__construct();

        $this->load->model('Users');

	}
	
	public function add_user_query($data = array()){
		if(!empty($data)){
			$insert = array(
				'name' => $data['name'],
				'mail_id' => $data['email'],
				'message' => $data['message'],
				'doc' => date('Y-m-d H:i:s'),
				'read_status' => 'N'
			);
			
			$return = $this->db->insert('anonymous_user_query',$insert);
			if($return){
				return TRUE;
			}else{
				return FALSE;
			}
		}else{
			return FALSE;
		}
	}
}