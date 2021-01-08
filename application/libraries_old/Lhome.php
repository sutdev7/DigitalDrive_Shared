<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lhome {

	//Home Page Load Here
	public function home_page()
	{
		$CI =& get_instance();
		//$CI->load->model('website/Homes');
		//$CI->load->model('web_settings');
		//$CI->load->model('Soft_settings');
		//$CI->load->model('Blocks');
		/*$parent_category_list 	= $CI->Homes->parent_category_list();
		$pro_category_list 		= $CI->Homes->category_list();
		$best_sales 			= $CI->Homes->best_sales();
		$footer_block 			= $CI->Homes->footer_block();
		$slider_list 			= $CI->web_settings->slider_list();
		$block_list 			= $CI->Blocks->block_list(); 
		$currency_details 		= $CI->Soft_settings->retrieve_currency_info();
		$Soft_settings 			= $CI->Soft_settings->retrieve_setting_editdata();
		$languages 				= $CI->Homes->languages();
		$currency_info 			= $CI->Homes->currency_info();
		$selected_currency_info = $CI->Homes->selected_currency_info();
		$select_home_adds 		= $CI->Homes->select_home_adds();*/

		$data = array(	
			/*'category_list' => $parent_category_list,
			'pro_category_list' => $pro_category_list,
			'slider_list' 	=> $slider_list,
			'block_list' 	=> $block_list,
			'best_sales' 	=> $best_sales,
			'footer_block' 	=> $footer_block,
			'languages' 	=> $languages,
			'currency_info' => $currency_info,
    		'select_home_adds' => $select_home_adds,
			'selected_cur_id' => (($selected_currency_info->currency_id)?$selected_currency_info->currency_id:""),
			'Soft_settings' => $Soft_settings,
			'currency' 		=> $currency_details[0]['currency_icon'],
			'position' 		=> $currency_details[0]['currency_position'],*/
		);
		$HomeForm = $CI->parser->parse('home/index',$data,true);
		return $HomeForm;
	}	

	public function how_it_works_page()
	{
		$CI =& get_instance();
		$data = array();
		$HomeForm = $CI->parser->parse('home/how-it-works',$data,true);
		return $HomeForm;
	}

	public function about_us_page()
	{
		$CI =& get_instance();
		$data = array();
		$HomeForm = $CI->parser->parse('home/about-us',$data,true);
		return $HomeForm;
	}

	public function trust_safety_page()
	{
		$CI =& get_instance();
		$data = array();
		$HomeForm = $CI->parser->parse('home/trust-safety',$data,true);
		return $HomeForm;
	}

	public function privacy_policy_page()
	{
		$CI =& get_instance();
		$data = array();
		$HomeForm = $CI->parser->parse('home/privacy-policy',$data,true);
		return $HomeForm;
	}

	public function terms_and_condition_page()
	{
		$CI =& get_instance();
		$data = array();
		$HomeForm = $CI->parser->parse('home/terms-and-condition',$data,true);
		return $HomeForm;
	}

	public function help_center_page()
	{
		$CI =& get_instance();
		$data = array();
		$HomeForm = $CI->parser->parse('home/help-center',$data,true);
		return $HomeForm;
	}						
}
?>