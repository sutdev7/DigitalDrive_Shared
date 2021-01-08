<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Keywords_model extends CI_Model {

    public function __construct(){
	    parent::__construct();
    }
     public function get_keywords(){
     	$this->db->select('*');
    	$this->db->from('keywords');
    	$this->db->where('status', 1);
    	$this->db->order_by('keyword', 'ASC');
    	$query = $this->db->get();
        return $query->result();
     }
}