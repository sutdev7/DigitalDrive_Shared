<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Languages extends CI_Model {

    public function __construct(){
	parent::__construct();
    }

    /*
     * Language information By ID
     */
    public function get_language_by_id($lId = null){
	if(empty($lId))
            return FALSE;

        $this->db->select('*');
        $this->db->from('languages');
        $this->db->where('language_id', $lId);
        $this->db->where('status', 1);
        $this->db->where('deleted IS NULL');        
        $query = $this->db->get();
        return $query->row();
    }

    /*
     * Language information By Name
     */
    public function get_language_by_name($lName= null){
	if(empty($lName))
            return FALSE;

        $this->db->select('*');
        $this->db->from('languages');
        $this->db->where('name', $lName);
        $this->db->where('status', 1);
        $this->db->where('deleted IS NULL');        
        $query = $this->db->get();
        return $query->row();
    }

    /*
     * Get All Language information
     */
    public function get_all_language_info(){
        $language_list = array();

        $this->db->select('*');
        $this->db->from('languages');
        $this->db->where('status', 1);
        $this->db->where('deleted IS NULL');
        $query = $this->db->get();
        foreach ($query->result() as $row){
            $language_list[] = $row;
        }
                
        return $language_list;
    }
}		