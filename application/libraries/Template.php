<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Template {

	//Admin Html View....
	/*public function full_admin_html_view($content){
	
		$CI =& get_instance();
		$logged_info='';
		
		if ($CI->auth->is_admin())
		{
			$log_info = array(
					'email'  => $CI->session->userdata('user_name'),
					'logout' => base_url('Admin_dashboard/logout')
				); 
			$logged_info = $CI->parser->parse('include/admin_header',$log_info,true);
		}
		$CI->load->model('Products');
		$company_info=$CI->Products->retrieve_company();
		$data = array (
				'logindata' 	=> $logged_info,
				'content' 		=> $content,
				'company_info' 	=> $company_info
			);
		$content = $CI->parser->parse('admin_html_template',$data);
	}*/

	//Website Html View....
	public function full_website_home_html_view($data){
		$CI =& get_instance();
		//$CI->load->model('Products');
		//$company_info=$CI->Products->retrieve_company();
		$content = $CI->parser->parse('website/website_home_html_template',$data);
	}

	//Website Html View....
	public function full_website_html_view($data){
		$CI =& get_instance();
		$content = $CI->parser->parse('website/website_html_template',$data);
	}	

	//Customer Html View....
	public function full_customer_html_view($data){
		$CI =& get_instance();
		$CI->load->model('Users');
		$user_id = $CI->session->userdata('user_id');
		$result = $CI->Users->check_profile_status($user_id);
        $profile_status = isset($result->profile_status) ? $result->profile_status : '';
        $data['profile_status']=$profile_status;
		$content = $CI->parser->parse('website/website_client_html_template',$data);
	}
	
	//Message Html View....
	public function full_website_message_view($data){
		$CI =& get_instance();
		$content = $CI->parser->parse('website/website_message_html_template',$data);
	}
	
	//Freelancer Html View....
	public function full_freelancer_html_view($data){
		$CI =& get_instance();
		$CI->load->model('Users');
		$user_id = $CI->session->userdata('user_id');
		$result = $CI->Users->check_profile_status($user_id);
        $profile_status = isset($result->profile_status) ? $result->profile_status : '';
        $data['profile_status']=$profile_status;
		$content = $CI->parser->parse('website/website_freelancer_html_template',$data);
	}
}