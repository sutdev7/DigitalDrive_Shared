<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Task extends CI_Controller {

	function __construct() {
      	parent::__construct();

		header('Cache-Control: no-cache, must-revalidate, max-age=0');
		header('Cache-Control: post-check=0, pre-check=0',false);
		header('Pragma: no-cache');

		$this->load->library('Ltask');

        if(!$this->auth->is_logged() && $this->uri->segment(1)!='browse-task' && $this->uri->segment(1)!='browse-freelancer'){
        	$this->session->set_flashdata('msg', '<div class="alert alert-info text-center">You haven\'t login to the portal. Please login to proceed further.</div>');
        	redirect('sign-in', 'refresh');
        }
    }

    public function browse_freelancer(){
		//echo '884'; die();
		$content = $this->ltask->browse_freelancer_page();
		$data = array(
			        'content' => $content,
			        'title' => display('Browse Task :: Hire-n-Work'),
		        );
		$this->template->full_website_html_view($data);
	}

    public function edit_microkey_client($taskID = null){
		if(empty($taskID))
			redirect('microkey-list-client', 'refresh');
        $content = $this->ltask->edit_microkey_client($taskID);
		if( empty($content) ){
			redirect('dashboard', 'refresh');
			
		}
		
		/*if($content=="1"){ // Task hired cannot be edited
			$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Task already hired. Cannot be edit.</div>');
			redirect('upcoming-projects', 'refresh');

		}*/
		 

		$data = array(
	        'content' => $content,
	        'title' => display('Edit Task Step - 1 :: Hire-n-Work'),
	    );

		$this->template->full_customer_html_view($data);
	}

	public function index()	{
		$content = $this->ltask->past_task_page_1();
		$data = array(
			'content' => $content,
			'title' => display('Post Task Step - 1 :: Hire-n-Work'),
		);
		$this->template->full_customer_html_view($data);
	}

	public function past_task_page_2()	{
		$data = array();

        $this->form_validation->set_rules('fldTaskTitle','Title', 'required');
		$this->form_validation->set_rules('fldTaskKeywords','Keywords', 'required');
        $this->form_validation->set_rules('fldSkillRequired','Skill Requirement','callback_required_check');
        $this->form_validation->set_rules('fldTaskDescription','Description', 'required');

        $submitData = $this->input->post();

        if($this->form_validation->run() == false){
	        $content = $this->ltask->past_task_page_1($submitData);
	        $data = array(
		        'content' => $content,
		        'title' => display('Post Task Step - 1 :: Hire-n-Work'),
	        );
		}else{
        	if(!empty($submitData['fldTaskTitle']) && !empty($submitData['fldTaskKeywords']) && !empty($submitData['fldSkillRequired']) && !empty($submitData['fldTaskDescription'])) {
		        $content = $this->ltask->past_task_page_2($submitData);
		        $data = array(
			        'content' => $content,
			        'title' => display('Post Task Step - 2  :: Hire-n-Work'),
		        );
        	}
	    }

		$this->template->full_customer_html_view($data);
	}


	public function past_task_page_3()	{

		$data = array();
        $this->form_validation->set_rules('fldTaskTitle','Title', 'required');
		$this->form_validation->set_rules('fldTaskKeywords','Keywords', 'required');
        $this->form_validation->set_rules('fldSkillRequired','Skill Requirement','callback_required_check');
        $this->form_validation->set_rules('fldTaskDescription','Description', 'required');
        $this->form_validation->set_rules('fldSelContinent','Continent', 'required');
        $this->form_validation->set_rules('flddurationfield','Duration Period', 'required');
		$this->form_validation->set_rules('flddurationtype','Duration Type', 'required');
        $this->form_validation->set_rules('fldSelCountry','Country', 'required');

        $submitData = $this->input->post();
        if($this->form_validation->run() == false){
	        $content = $this->ltask->past_task_page_2($submitData);
	        $data = array(
		        'content' => $content,
		        'title' => display('Post Task Step - 2 :: Hire-n-Work'),
	        );
		}else{
        	if(!empty($submitData['fldTaskTitle']) && !empty($submitData['fldTaskKeywords']) && !empty($submitData['fldSkillRequired']) && !empty($submitData['fldTaskDescription']) && !empty($submitData['fldSelContinent']) && !empty($submitData['flddurationfield']) && !empty($submitData['flddurationtype']) && !empty($submitData['fldSelCountry'])) {
		        $content = $this->ltask->past_task_page_3($submitData);
		        $data = array(
			        'content' => $content,
			        'title' => display('Post Task Step - 3  :: Hire-n-Work'),
		        );
        	}
	    }
		$this->template->full_customer_html_view($data);
	}

	public function edit_task_page_1($taskID = null){
		if(empty($taskID))
			redirect('upcoming-projects', 'refresh');
        $content = $this->ltask->edit_task_page_1($taskID);
		if( empty($content) ){
			redirect('dashboard', 'refresh');
			
		}
		
		if($content=="1"){ // Task hired cannot be edited
			$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Task already hired. Cannot be edit.</div>');
			redirect('upcoming-projects', 'refresh');

		}
		 

		$data = array(
	        'content' => $content,
	        'title' => display('Edit Task Step - 1 :: Hire-n-Work'),
	    );

		$this->template->full_customer_html_view($data);
	}

	public function edit_task_page_2($taskID = null){
		 if(!$this->input->post()){
			redirect('dashboard', 'refresh'); 
		 }
		
		$data = array();
        $this->form_validation->set_rules('fldTaskTitle','Title', 'required');
        $this->form_validation->set_rules('fldTaskKeywords','Keywords','required');
        $this->form_validation->set_rules('fldSkillRequired','Skill Requirement','callback_required_check');
        $this->form_validation->set_rules('fldTaskDescription','Description', 'required');

        $submitData = $this->input->post();
        if($this->form_validation->run() == false){
	        $content = $this->ltask->edit_task_page_1($submitData);
	        $data = array(
		        'content' => $content,
		        'title' => display('Edit Task Step - 2 :: Hire-n-Work'),
	        );
		}else{
        	if(!empty($submitData['fldTaskTitle']) && !empty($submitData['fldSkillRequired']) && !empty($submitData['fldTaskDescription'])) {
		        $content = $this->ltask->edit_task_page_2($taskID,$submitData);
		        $data = array(
			        'content' => $content,
			        'title' => display('Edit Task Step - 2  :: Hire-n-Work'),
		        );
        	}
	    }
		$this->template->full_customer_html_view($data);
	}

	public function edit_task_page_3($taskID = null){
		 if(!$this->input->post()){
			redirect('dashboard', 'refresh'); 
		 }
		$data = array();

        $this->form_validation->set_rules('fldTaskTitle','Title', 'required');
        $this->form_validation->set_rules('fldTaskKeywords','Keywords','required');
        $this->form_validation->set_rules('fldSkillRequired','Skill Requirement','callback_required_check');
        $this->form_validation->set_rules('fldTaskDescription','Description', 'required');
        $this->form_validation->set_rules('fldSelContinent','Continent', 'required');
        $this->form_validation->set_rules('fldDueDate','Due Date', 'required');
        $this->form_validation->set_rules('fldSelCountry','Country', 'required');

        $submitData = $this->input->post();
        if($this->form_validation->run() == false){
	        $content = $this->ltask->edit_task_page_2($taskID, $submitData);
	        $data = array(
		        'content' => $content,
		        'title' => display('Edit Task Step - 2 :: Hire-n-Work'),
	        );
		}else{
        	if(!empty($submitData['fldTaskTitle']) && !empty($submitData['fldSkillRequired']) && !empty($submitData['fldTaskDescription']) && !empty($submitData['fldSelContinent']) && !empty($submitData['fldDueDate']) && !empty($submitData['fldSelCountry'])) {
		        $content = $this->ltask->edit_task_page_3($taskID, $submitData);
		        $data = array(
			        'content' => $content,
			        'title' => display('Edit Task Step - 3  :: Hire-n-Work'),
		        );
        	}
	    }
		$this->template->full_customer_html_view($data);
	}

	public function make_an_offer(){
        $content = $this->ltask->make_an_offer_page($this->session->all_userdata());
	    $data = array(
	        'content' => $content,
	        'title' => display('Make An Offer :: Hire-n-Work'),
	    );
		$this->template->full_customer_html_view($data);
	}

	public function task_details($taskID = null){
		if(empty($taskID))
			redirect('upcoming-projects', 'refresh');

        $content = $this->ltask->task_details_page($taskID, $this->session->all_userdata());
	    $data = array(
	        'content' => $content,
	        'title' => display('Job Details :: Hire-n-Work'),
	    );

		$this->template->full_customer_html_view($data);
	}

	public function offer_details($taskID = null){
		if(empty($taskID))
			redirect('upcoming-projects', 'refresh');

        $content = $this->ltask->offer_details_page($taskID, $this->session->all_userdata());
	    $data = array(
	        'content' => $content,
	        'title' => display('Offer Details :: Hire-n-Work'),
	    );
		$this->template->full_customer_html_view($data);
	}

	public function delete_attachment(){
		$rowid = $_POST['rowId'];
		$user_task_id = $_POST['taskId'];
		$this->load->model('Tasks');
		$return = $this->Tasks->delete_action('task_attachments', array('is_visible'=>0, 'is_deleted' => 1), array('task_attachment_id' => $rowid));

		$task = $this->Tasks->task_details_by_user_task_id($user_task_id);
		$output = '<table>';

		if(!empty($task[0]['task_attachments'])){
			foreach($task[0]['task_attachments'] as $single){
				$output .='<tr>
                    	<td><a href="'.base_url().'download_file/'.$single['file_name'].'">'.$single['file_display_name'].'</a></td>
                    	<td><i class="remv fa fa-close" aria-hidden="true" id="removeattch_'.$single['task_attachment_id'].'" data-id="'.$single['task_attachment_id'].'"></i></td>
                    </tr>';
			}
		}
		$output .= '</table>';
		echo $output;
	}

	public function view_offer_details($OffertaskID = null)	{

		if(empty($OffertaskID))
			redirect('dashboard', 'refresh');

        $content = $this->ltask->view_offer_details_page($OffertaskID, $this->session->all_userdata());
	    $data = array(
	        'content' => $content,
	        'title' => display('Offer Details :: Hire-n-Work'),
	    );

		$this->template->full_customer_html_view($data);
	}

	public function view_all_offers($taskID = null)	{
		if(empty($taskID))
			redirect('upcoming-projects', 'refresh');
        $content = $this->ltask->view_all_offers_page($taskID, $this->session->all_userdata());
	    $data = array(
	        'content' => $content,
	        'title' => display('View All Offers :: Hire-n-Work'),
	    );
		$this->template->full_customer_html_view($data);
	}

	public function sent_offer($pageIndex = 0){
        $content = $this->ltask->sent_offer_page($this->session->all_userdata(), $pageIndex);
	    $data = array(
	        'content' => $content,
	        'title' => display('Sent Offers :: Hire-n-Work'),
	    );
		$this->template->full_customer_html_view($data);
	}

	public function send_offer_to_user(){
        $submitData = $this->input->post();
       	if(!empty($submitData['arrSelectedFreelancer']) && !empty($submitData['fldJobTitle'])) {
    		$this->ltask->send_offer_to_user($submitData, $this->session->all_userdata());
       	} else {
       		redirect('search-freelancer', 'refresh');
       	}
	}
	
	/*
	public function accept_offer(){
		$task_id = $this->uri->segment(3);
		if($task_id != ''){
			$this->ltask->accept_offer($task_id);
		}
		redirect('notification', 'refresh');
	}

	public function reject_offer(){
		$task_id = $this->uri->segment(3);
		if($task_id != ''){
			$this->ltask->reject_offer($task_id);
		}
		redirect('notification', 'refresh');
	}*/

	public function add_new_job_post() {
		$data = array();

        $this->form_validation->set_rules('fldTaskTitle','Title', 'required');
		$this->form_validation->set_rules('fldTaskKeywords','Keywords','required');
        $this->form_validation->set_rules('fldSkillRequired','Skill Requirement','callback_required_check');
        $this->form_validation->set_rules('fldTaskDescription','Description', 'required');
        $this->form_validation->set_rules('fldSelContinent','Continent', 'required');
        $this->form_validation->set_rules('flddurationfield','Duration Period', 'required');
		$this->form_validation->set_rules('flddurationtype','Duration Type', 'required');
        $this->form_validation->set_rules('fldSelCountry','Country', 'required');
       // $this->form_validation->set_rules('fldTotalBudget','Total Amount', 'required|decimal|greater_than_equal_to[1500]');
		$this->form_validation->set_rules('fldTotalBudget','Total Amount', 'required');

        $submitData = $this->input->post();
        if($this->form_validation->run() == false){
	        $content = $this->ltask->past_task_page_3($submitData);
	        $data = array(
		        'content' => $content,
		        'title' => display('Post Task Step - 3 :: Hire-n-Work'),
	        );
		    $this->template->full_customer_html_view($data);
		} else {
        	$this->ltask->add_new_job($this->session->all_userdata());
	    }
	}

	public function edit_job_post($taskID = null){
		$data = array();

        $this->form_validation->set_rules('fldTaskTitle','Title', 'required');
        $this->form_validation->set_rules('fldTaskKeywords','Keywords','required');
        $this->form_validation->set_rules('fldSkillRequired','Skill Requirement','callback_required_check');
        $this->form_validation->set_rules('fldTaskDescription','Description', 'required');
        $this->form_validation->set_rules('fldSelContinent','Continent', 'required');
        $this->form_validation->set_rules('fldDueDate','Due Date', 'required');
        $this->form_validation->set_rules('fldSelCountry','Country', 'required');
        $this->form_validation->set_rules('fldTotalBudget','Total Amount', 'required');

        $submitData = $this->input->post();
        if($this->form_validation->run() == false){
	        $content = $this->ltask->edit_task_page_3($taskID, $submitData);
	        $data = array(
		        'content' => $content,
		        'title' => display('Edit Task Step - 3 :: Hire-n-Work'),
	        );
		    $this->template->full_customer_html_view($data);
		} else{
        	$this->ltask->edit_new_job($taskID, $this->session->all_userdata());
	    }
	}

	public function browse_task(){
		$content = $this->ltask->browse_task_page();
		$data = array(
			        'content' => $content,
			        'title' => display('Browse Task :: Hire-n-Work'),
		        );
		$this->template->full_website_html_view($data);
	}

    public function required_check(){
    	$choice = $this->input->post("fldSkillRequired");
        if(is_null($choice)){
            $choice = array();
        }
        $travel_cat = implode(',', $choice);
        if($travel_cat != '')
            return true;
        else
            return false;
    }

    public function comment_post(){
		$taskID = $this->input->post('taskId');
		if(empty($taskID)){
			redirect('upcoming-projects', 'refresh');
		}else{
			$this->form_validation->set_rules('taskRemark','Comments', 'required');
			$submitData = $this->input->post();
			$submitData = array_merge($submitData , $this->session->all_userdata());

			if($this->form_validation->run() == false){
				redirect('task-details/'.$taskID, 'refresh');
			}else{
				if(!empty($submitData['taskRemark'])) {
					$content = $this->ltask->comment_post($taskID, $submitData);
					$data = array(
						'content' => $content,
						'title' => display('Job Details :: Hire-n-Work'),
					);
				}
			}
		}
	}

	public function getCountryByContinent() {
    	echo $this->ltask->getCountryByContinent();
    }

    public function ajax_list_tasks() {
    	echo $this->ltask->ajax_list_tasks();
    }

    public function ajax_get_task_details() {
    	echo $this->ltask->ajax_get_task_details();
    }
	public function ajax_update_budget(){ 
		echo $this->ltask->ajax_update_budget();
	}
	

    public function ajax_sent_offer_page() {
    	echo $this->ltask->ajax_sent_offer_page($this->session->all_userdata());
    }

    public function ajax_close_offer_send_user() {
    	echo $this->ltask->ajax_close_offer_send_user($this->session->all_userdata());
    }

    public function download_file($filename = null) {
        $this->ltask->download_file($filename);
    }
	
	public function download_attachment($taskID = null) {
		
        $this->ltask->download_attachment($taskID);
    }

	public function send_offer($user_id = ''){
		$this->ltask->send_offer($user_id);
	}


}

