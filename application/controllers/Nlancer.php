<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nlancer extends CI_Controller {

	function __construct() {
      	parent::__construct();

		header('Cache-Control: no-cache, must-revalidate, max-age=0');
		header('Cache-Control: post-check=0, pre-check=0',false);
		header('Pragma: no-cache');

		$this->load->library('Lfreelancer');
		$this->load->library('Lmicrokey');
		$this->load->library('Lnlancer');
		if(!$this->auth->is_logged()) {
        	$this->session->set_flashdata('msg', '<div class="alert alert-info text-center">You haven\'t login to the portal. Please login to proceed further.</div>');
        	redirect('sign-in', 'refresh');

        }
    }

   
	public function index(){

	$this->load->view('nlancer/dashboard.php');
		
		// $content = $this->lnlancer->dashboard_page();
		// $data = array(
		// 	'content' => $content,
		// 	'title' => display('Dashboard :: Hire-n-Work'),
		// );
		// $this->template->full_freelancer_html_view($data);
	}
	
	
}