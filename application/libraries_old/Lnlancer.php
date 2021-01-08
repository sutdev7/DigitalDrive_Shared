<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lnlancer {
	
	public function dashboard_page(){
		$CI =& get_instance();
		$CI->load->model('Users');
        $CI->load->model('Tasks');
		$CI->load->model('Freelancers');
        $CI->load->library("pagination");
		
		
	
		//$data['user_info'][] = $userInfo;
		$AccountForm = $CI->parser->parse('nlancer/dashboard',true);
		return $AccountForm;
	}
	
	
	
}