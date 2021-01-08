<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Complain extends CI_Controller {

	function __construct() {
      	parent::__construct();

		header('Cache-Control: no-cache, must-revalidate, max-age=0');
		header('Cache-Control: post-check=0, pre-check=0',false);
		header('Pragma: no-cache');

		$this->load->library('Lcomplain');

        if(!$this->auth->is_logged() && $this->uri->segment(1)!='browse-task') {
        	$this->session->set_flashdata('msg', '<div class="alert alert-info text-center">You haven\'t login to the portal. Please login to proceed further.</div>');
        	redirect('sign-in', 'refresh');
        }		
    }

	public function index()
	{
		$this->lcomplain->save_complain_data($this->session->all_userdata());		
	}
}
