<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Continent extends CI_Model {

    public function __construct(){
	    parent::__construct();
    }

    /*
     * Continent information By ID
     */
    public function get_continent_by_id($cId = null){
	if(empty($cId))
            return FALSE;

        $this->db->select('*');
        $this->db->from('continent');
        $this->db->where('continent_id', $cId);
        $this->db->where('status', 1);
        $this->db->where('deleted IS NULL');        
        $query = $this->db->get();
        return $query->row();
    }

    /*
     * Continent information By Name
     */
    public function get_continent_by_name($cName= null){
	if(empty($cName))
	    return FALSE;

        $this->db->select('*');
        $this->db->from('continent');
        $this->db->where('name', $cName);
        $this->db->where('status', 1);
        $this->db->where('deleted IS NULL');        
        $query = $this->db->get();
        return $query->row();
    }

    /*
     * Get All Continent information
     */
    public function get_all_continent_info(){
        $continent_list = array();

        $this->db->select('*');
        $this->db->from('continent');
        $this->db->where('status', 1);
        $this->db->where('deleted IS NULL');
        $query = $this->db->get();
        foreach ($query->result() as $row){
            $continent_list[] = $row;
        }

        return $continent_list;
    }

}		