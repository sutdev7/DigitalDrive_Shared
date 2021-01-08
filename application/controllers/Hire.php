<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hire extends CI_Controller {

	function __construct() {
      	parent::__construct();

		header('Cache-Control: no-cache, must-revalidate, max-age=0');
		header('Cache-Control: post-check=0, pre-check=0',false);
		header('Pragma: no-cache');

		$this->load->library('Lhire');
        
    }

	public function index(){
			
	}
	
	public function direct_hire($pageIndex = 0){
		
    	$content = $this->lhire->hire($this->session->all_userdata());
		$data = array(
					'content' => $content,
					'title' => display('Direct Hire :: Hire-n-Work'),
				);		
		$this->template->full_customer_html_view($data);
    }
	
	public function add_direct_hire_step1(){

		$data = array();
        		
		$this->form_validation->set_rules('contract_title','Contract Title','required');
	//	$this->form_validation->set_rules('fldJobTitle','Select Task','required');
		$this->form_validation->set_rules('terms','Hired Terms','required');
		$this->form_validation->set_rules('deposite_milestone','Deposit','required');
	//	$this->form_validation->set_rules('fldJobTitle', 'Job Title','required', 'callback_jobtitle_check['.$_REQUEST['fldJobTitle'],$_REQUEST['freelancer_id'].']');
	 	$this->form_validation->set_rules('fldJobTitle', 'Job Title', 'required|callback_jobtitle_check[' .$_REQUEST['fldJobTitle']. ']');
		$submitData = $this->input->post(); 
	
        if($this->form_validation->run() == false){ 
	        $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">'.validation_errors().'</div>');
		 	redirect('search-freelancer');
		}else{      	
        	$this->lhire->add_new_hire($submitData);
	    }
		
	}
	
	
	
	public function jobtitle_check($fldJobTitle)
	{
		
		//echo $fldJobTitle;
	//	 echo "<br/>";
		 $notification_from=$_REQUEST['freelancer_id'];
		 $notification_to=$this->session->userdata("user_id");
		 
		/*  echo "SELECT * FROM task_notification JOIN task ON task_notification.task_id=task.task_id WHERE notification_master_id=15 AND notification_from='".$notification_from."' AND notification_to='".$notification_to."' AND task.user_task_id='".$fldJobTitle."'";  */
	
		  $q=$this->db->query("SELECT * FROM task_notification JOIN task ON task_notification.task_id=task.task_id WHERE notification_master_id=15 AND notification_from='".$notification_from."' AND notification_to='".$notification_to."' AND task.user_task_id='".$fldJobTitle."'");
		  $r=$q->num_rows();

		 if($r>0){
			 $this->form_validation->set_message('jobtitle_check', 'Freelancer already rejected the selected task.You cannot hire. Please try another task');
			 return FALSE;
		 }else{
			return TRUE;
		 }
		  
		 
		 exit;
		//	$this->form_validation->set_message('username_check', 'The %s field can not be the word "test"');
		//	return FALSE;
	 
	}
	
	
	public function direct_hire_step2($pageIndex = 0){
		
    	$content = $this->lhire->hire_step2($this->session->all_userdata());
		$data = array(
					'content' => $content,
					'title' => display('Direct Hire :: Hire-n-Work'),
				);		
		$this->template->full_customer_html_view($data);
    }
	
	public function hire_freelancer(){
		$content = $this->lhire->hire_freelancers($this->session->all_userdata());
		$data = array(
					'content' => $content,
					'title' => display('Direct Hire :: Hire-n-Work'),
				);		
		$this->template->full_customer_html_view($data);
	}
	
	public function rehire_freelancer(){
		$content = $this->lhire->rehire_freelancers($this->session->all_userdata());
		$data = array(
					'content' => $content,
					'title' => display('Rehire :: Hire-n-Work'),
				);		
		$this->template->full_customer_html_view($data);
	}
	
	public function view_contract(){
		$content = $this->lhire->view_contract($this->uri->segment(2),$this->uri->segment(3));
		$data = array(
					'content' => $content,
					'title' => display('View Contract :: Hire-n-Work'),
				);		
		$this->template->full_customer_html_view($data);
	}
	
	public function release_approve(){
		$content = $this->lhire->release_approve($this->uri->segment(2));
		$data = array(
					'content' => $content,
					'title' => display('Release Approve:: Hire-n-Work'),
				);		
		$this->template->full_customer_html_view($data);
	}
	
	public function submit_release_approve(){
		$this->lhire->submit_release_approve();
	}
	
	public function ajax_change_milestone_date(){ 
		echo $this->lhire->ajax_change_milestone_date();
	}
	
	public function ajax_add_new_milestone(){ 
		echo $this->lhire->ajax_add_new_milestone();
	}
	
	public function close_contract(){ 
		$content = $this->lhire->close_contract_page($this->uri->segment(2));
		$data = array(
					'content' => $content,
					'title' => display('Release Approve:: Hire-n-Work'),
				);		
		$this->template->full_customer_html_view($data);
	}
	
	public function submit_close_contract(){
		$this->lhire->submit_close_contract();
	}
	
}