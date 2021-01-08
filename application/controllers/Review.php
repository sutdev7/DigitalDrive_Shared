<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Review extends CI_Controller {
	function __construct() {
      	parent::__construct();
		header('Cache-Control: no-cache, must-revalidate, max-age=0');
		header('Cache-Control: post-check=0, pre-check=0',false);
		header('Pragma: no-cache');
		$this->load->library('Lreview');        if(!$this->auth->is_logged() && $this->uri->segment(1)!='browse-task') {        	$this->session->set_flashdata('msg', '<div class="alert alert-info text-center">You haven\'t login to the portal. Please login to proceed further.</div>');        	redirect('sign-in', 'refresh');        }    }

	public function index()	{
		$content = $this->lreview->review_page();
		$data = array(
			'content' => $content,
			'title' => display('Reviews :: Hire-n-Work'),
		);
		$this->template->full_customer_html_view($data);		
	}
	
	public function give_review(){ 
		$content = $this->lreview->givereview_page();
		$data = array(
					'content' => $content,
					'title' => display('Review:: Hire-n-Work'),
				);		
		$this->template->full_customer_html_view($data);
	}
	
	public function submit_review(){
		$this->lreview->submit_review();
	}
	
	
}