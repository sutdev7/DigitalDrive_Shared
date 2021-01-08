<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('display')) {

    function display($text = null)
    {

        return $text;
        /*$ci =& get_instance();
        $ci->load->database();
        $table         = 'language';
        $phrase        = 'phrase';

        $data     = $ci->db->get('soft_setting')->row();
        $user_lang= $ci->session->userdata('language');

        //set language 
        if (!empty($user_lang)) {
            $language = $user_lang; 
        } else {
            $language = $data->language;
            $ci->session->set_userdata('language',$language);
        } 
 
        if (!empty($text)) {

            if ($ci->db->table_exists($table)) { 

                if ($ci->db->field_exists($phrase, $table)) { 

                    if ($ci->db->field_exists($language, $table)) {

                        $row = $ci->db->select($language)
                              ->from($table)
                              ->where($phrase, $text)
                              ->get()
                              ->row(); 

                        if (!empty($row->$language)) {
                            return $row->$language;
                        } else {
                            return false;
                        }

                    } else {
                        return false;
                    }

                } else {
                    return false;
                }

            } else {
                return false;
            }            
        } else {
            return false;
        }*/  

    }
 
}
