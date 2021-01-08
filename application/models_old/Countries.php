<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Countries extends CI_Model {

    public function __construct(){
	    parent::__construct();
    }

    /*
     * Country information By ID
     */
    public function get_country_by_id($cId = null){
	if(empty($cId))
            return FALSE;

        $this->db->select('*');
        $this->db->from('country');
        $this->db->where('country_id', $cId);
        $this->db->where('status', 1);
        $this->db->where('deleted IS NULL');        
        $query = $this->db->get();
        return $query->row();
    }

    /*
     * Country information By Continent ID
     */
    public function get_country_by_continent_id($cId = null){
        $country_list = array();
                
        if(empty($cId))
            return FALSE;

        $this->db->select('*');
        $this->db->from('country');
        $this->db->where('continent_id', $cId);
        $this->db->where('status', 1);
        $this->db->where('deleted IS NULL');        
        $query = $this->db->get();
        foreach ($query->result() as $row){
            $country_list[] = $row;
        }

        return $country_list;
    }    

    /*
     * Country information By Name
     */
    public function get_country_by_name($cName= null){
	if(empty($cName))
	    return FALSE;

        $this->db->select('*');
        $this->db->from('country');
        $this->db->where('name', $cName);
        $this->db->where('status', 1);
        $this->db->where('deleted IS NULL');        
        $query = $this->db->get();
        return $query->row();
    }

    /*
     * Get All Country information
     */
    public function get_all_country_info(){
        $country_list = array();

        $this->db->select('*');
        $this->db->from('country');
        $this->db->where('status', 1);
        $this->db->where('deleted IS NULL');
        $query = $this->db->get();
        foreach ($query->result() as $row){
            $country_list[] = $row;
        }

        return $country_list;
    }

}		