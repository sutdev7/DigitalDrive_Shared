<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio extends CI_Controller {

	function __construct() {
      	parent::__construct();
		header('Cache-Control: no-cache, must-revalidate, max-age=0');
		header('Cache-Control: post-check=0, pre-check=0',false);
		header('Pragma: no-cache');
		$this->load->library('Luser');
        $this->load->model('Users');

        if(!$this->auth->is_logged()) {
        	$this->session->set_flashdata('msg', '<div class="alert alert-info text-center">You haven\'t login to the portal. Please login to proceed further.</div>');
        	redirect('sign-in', 'refresh');
        }		
    }

    public function getPortfolioList(){
   
        $response = array();
        $postData = $this->input->post();
        $data = $this->Users->getPortfolioById($postData);
     
        if($data !=''){
        
         $response['success']= 'success';
         $response['result']= $data;

        }else{
         
         $response['success']= 'error';
         $response['result']= '';

        }
        echo json_encode($response);
        


    }
    



}