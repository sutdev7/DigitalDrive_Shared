<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lfreelancer {
	
	public function dashboard_page(){
		$CI =& get_instance();
		$CI->load->model('Users');
        $CI->load->model('Tasks');
		$CI->load->model('Freelancers');
        $CI->load->library("pagination");
		
		
		// Search text
		$searchValue = "";
		if($CI->input->post('search') != NULL ){
		  $searchValue = $CI->input->post('searchValue');
		  $CI->session->set_userdata(array("searchValue"=>$searchValue));
		}else{
		  if($CI->session->userdata('searchValue') != NULL){
			$searchValue = $CI->session->userdata('searchValue');
		  }
		}
		
		// Row per page
		$rowperpage = PER_PAGE;
		// Row position
		
		if($CI->uri->segment(2)){
			$rowno = ($CI->uri->segment(2));
		}
		else{
			$rowno = 1;
		}
		
		if($rowno != 0){
		  $rowno = ($rowno-1) * $rowperpage;
		}
		
		// Pagination Configuration
		$config['base_url'] = base_url().'freelancer-dashboard';
		$config['full_tag_open'] = '<ul class="pagination" style="margin-top:20px;">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = true;
		$config['first_tag_open'] = '<li class="previous">';
		$config['first_tag_close'] = '</li>';  
		$config['last_link'] = true;
		$config['first_tag_open'] = '<li class="next">';
		$config['first_tag_close'] = '</li>'; 
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li class="next">';
		$config['next_tag_close'] = '</li>';  
		$config['prev_link'] = 'Previous';
		$config['prev_tag_open'] = '<li class="previous">';
		$config['prev_tag_close'] = '</li>'; 
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>'; 
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		
		
		$config['use_page_numbers'] = TRUE;
		$config['total_rows'] = $CI->Freelancers->get_freelancer_dashboard_count($searchValue);
		$config['per_page'] = $rowperpage;
		
		$CI->pagination->initialize($config);
		
		$data['links'] = $CI->pagination->create_links();
		
		// $data['job_array'] = $CI->Freelancers->get_freelancer_dashboard_data($searchValue,$rowperpage,$rowno);
		$data['job_array'] = $CI->Freelancers->get_job_by_type('offer', $searchValue, $rowperpage, $rowno);
		
		$userData = $CI->Users->get_user_profile_info_by_id($CI->session->userdata('user_id'));

		$userprofilestatus = $CI->Users->check_profile_status($CI->session->userdata('user_id'));

		
		
		$userLoginData = $CI->Users->getUserLoginData('user_id', $CI->session->userdata('user_id'));
		if(!empty($userLoginData)){
			$connections = $userLoginData->total_connects;
			$total_positive_coins = $userLoginData->total_positive_coins;
			$total_negative_coins = $userLoginData->total_negative_coins;
		}else{
			$connections = $total_positive_coins = $total_negative_coins = 0;
		}
		
		$user_profile_image = $CI->session->userdata('user_image');
		
		if(empty($user_profile_image)) {
			$user_profile_image = base_url('assets/img/no-image.png');
		}else{
			$user_profile_image = base_url('uploads/user/profile_image/'.$user_profile_image);	    	
		}

		if(!empty($userData)) {
			$spend_by_user = $CI->Tasks->get_user_total_spend($CI->session->userdata('user_id'));
			
			$userInfo = array('id' => $userData['basic_info']->user_id, 'name' => $userData['basic_info']->name, 'country' => $userData['basic_info']->country, 'gender' => $userData['basic_info']->gender, 'date_of_birth' => $userData['basic_info']->date_of_birth, 'bio' => $userData['basic_info']->bio, 'address' => $userData['basic_info']->address, 'state' => $userData['basic_info']->state, 'city' => $userData['basic_info']->city, 'vat' => $userData['basic_info']->vat, 'user_languages' => implode(', ', $userData['user_selected_languages']), 'user_skills' => $userData['user_selected_skills'], 'user_image' => $user_profile_image, 'spend_by_user' => $spend_by_user,'total_positive_coins'=> $total_positive_coins,'total_negative_coins'=> $total_negative_coins, 'connections' => $connections,'profile_status'=>$userprofilestatus->profile_status);

		}
		$data['user_info'][] = $userInfo;
		
		$AccountForm = $CI->parser->parse('freelancer/dashboard',$data,true);
		return $AccountForm;
	}
	
	public function key_list($rowno = ''){
		
		$CI =& get_instance();
		$CI->load->model('Users');
        $CI->load->model('Tasks');
		$CI->load->model('Freelancers');
        $CI->load->library("pagination");
		$data = $freelancerInfo = $arrCountry =  $arrSkills = $jobsData = array();
		
		// Search text
		$searchValue = "";
		if($CI->input->post('search') != NULL ){
		  $searchValue = $CI->input->post('searchValue');
		  $CI->session->set_userdata(array("searchValue"=>$searchValue));
		}else{
		  if($CI->session->userdata('searchValue') != NULL){
			$searchValue = $CI->session->userdata('searchValue');
		  }
		}
		
		// Row per page
		$rowperpage = PER_PAGE;
		// Row position
		
		if($CI->uri->segment(2)){
			$rowno = ($CI->uri->segment(2));
		}
		else{
			$rowno = 1;
		}
		
		
		if($rowno != 0){
		  $rowno = ($rowno-1) * $rowperpage;
		}
		// All records count
		$allcount = $CI->Freelancers->search_jobs_by_keyword_count($searchValue);		
		// Get records
		$taskList = $CI->Freelancers->search_jobs_by_keyword($rowno,$rowperpage,$searchValue);
		
		//echo '<pre>'; print_r($taskList); die;
		
		
		if(!empty($taskList)){
			foreach($taskList as $row){ 
				$skillsArr['skill_name_show'] = array();
				
				$jobsData[] = array(
					'task_id' => $row['basic_info']['task_id'],
					'user_task_id' => $row['basic_info']['user_task_id'],
					'task_name' => $row['basic_info']['task_name'],
					'task_details' => $row['basic_info']['task_details'],
					'task_total_budget' => $row['basic_info']['task_total_budget'],
					'task_requirements' => $row['task_requirements'],
					'task_origin_location' => $row['basic_info']['task_origin_location'],
					'task_origin_country' => $row['basic_info']['task_origin_country'],
					'task_doc' => date('d M Y',strtotime($row['basic_info']['task_doc'])),
					'offer_count' => $row['basic_info']['offer_count']
				);
			}
		}
		
		
		
		// Pagination Configuration
		$config['base_url'] = base_url().'key-list';
		$config['full_tag_open'] = '<ul class="pagination" style="margin-top:20px;">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = true;
        $config['first_tag_open'] = '<li class="previous">';
        $config['first_tag_close'] = '</li>';  
        $config['last_link'] = true;
        $config['first_tag_open'] = '<li class="next">';
        $config['first_tag_close'] = '</li>'; 
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li class="next">';
        $config['next_tag_close'] = '</li>';  
        $config['prev_link'] = 'Previous';
        $config['prev_tag_open'] = '<li class="previous">';
        $config['prev_tag_close'] = '</li>'; 
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>'; 
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
		
		
		$config['use_page_numbers'] = TRUE;
		$config['total_rows'] = $allcount;
		$config['per_page'] = $rowperpage;
		
		$CI->pagination->initialize($config);
		
		$data['links'] = $CI->pagination->create_links();
		$data["jobs"] = $jobsData;
		$data['row'] = $rowno;
		$data['search'] = $searchValue;





		// echo '<pre>'; print_r($data["jobs"]);die;
		
		$AccountForm = $CI->parser->parse('freelancer/key-list',$data,true);
		return $AccountForm;
	}
	
	public function freelancer_job_details($taskID = ''){

        $CI =& get_instance();
        $CI->load->model('Tasks');
		$CI->load->model("Users");
		$CI->load->model("Freelancers"); 
		$CI->load->model('Continent');
		$CI->load->model('Countries');

        $data = $arrTask = $arrOfferSend = $commentArr = array();

        $task_details = $CI->Tasks->get_task_info_by_user_task_id($taskID);
		
        if(!empty($task_details)){
            $task_id = $task_details->task_id;
			$task_created_by = $task_details->task_created_by;
		}else{
			$task_id = $task_created_by = ''; 
		}
		
		$savedcheck = $CI->Freelancers->check_saved_task($task_id, $CI->session->userdata('user_id'));
		if($savedcheck){
			$data['savetext'] = '<span id="">Already Saved</span>';
		}else{
			$data['savetext'] = '<span id="txtShow">Save This Job</span>';
		}
		
		// get freelancer connection 
		$getcoonects = $CI->Freelancers->get_user_basic_info($CI->session->userdata('user_id'));
		if(!empty($getcoonects)){
			$data['connection'] = $getcoonects['total_connects'];
		}else{
			$data['connection'] = 0;
		}
		
		$data['offer_send'] = $CI->Freelancers->job_offer_user($task_id);
		
		$data['proposal_count'] = $CI->Freelancers->proposal_count($task_id, $count = '');
		
		$tablename = array('comment_master','users','user_login');
		$jointype = array('left','left');
		$joincondition = array('comment_master_alias.user_id=users_alias.user_id','comment_master_alias.user_id=user_login_alias.user_id');
		$condition = 'comment_master_alias.tast_user_id="'.$taskID.'"';
		$fieldArr		= array('*','*','*');
		$limit			= "all";
		$oderby			= 'comment_master_alias.id desc';

		$comment_info = $CI->Tasks->getJoinDataByCondition($tablename,$jointype,$joincondition,$condition,$fieldArr,$limit,$oderby);
		if(!empty($comment_info)){
			foreach($comment_info as $row){
				if($row->profile_image != NULL){
					$img_url = base_url().'uploads/user/profile_image/'.$row->profile_image;
				}else{
					$img_url = base_url().'assets/img/user2.png';
				}
				$commentArr[] = array('user_id' => $row->user_id, 'profile_image' => $img_url, 'name' => $row->name, 'remarks' => $row->remarks);
			}
		}
		
        $task = $CI->Tasks->task_status_info_by_task_id($task_details->task_id); 
        foreach($task as $details) {
            $continent = $CI->Continent->get_continent_by_id($details['basic_info']['task_origin_location']);
            $country = $CI->Countries->get_country_by_id($details['basic_info']['task_origin_country']);

            $user_info = array();
            if(!empty($details['task_hired']) && count($details['task_hired']) > 0){
                foreach($details['task_hired'] as $freelancer_hired){
                    $user_details = $CI->Users->get_user_profile_info_by_id($freelancer_hired['receiver_id']);
                    $user_status = $CI->Users->get_user_info_by_id($freelancer_hired['receiver_id']);
                    $user_profile_image = $user_status->profile_image;
                    if(empty($user_profile_image)) {
                        $user_profile_image = base_url('assets/img/no-image.png');
                    } else {
                        $user_profile_image = base_url('uploads/user/profile_image/'.$user_profile_image);          
                    }
                    $is_login = $user_status->is_login; 
                    $user_info[] = array('freelancer_id' => $user_details['basic_info']->user_id, 'freelancer_name' => $user_details['basic_info']->name, 'freelancer_country' => $user_details['basic_info']->country, 'freelancer_state' => $user_details['basic_info']->state, 'freelancer_city' => $user_details['basic_info']->city, 'user_image' => $user_profile_image, 'is_online' => (($is_login == '1')?'<span> </span>':''));

                }
            }

            

            $datetime1 = strtotime($details['basic_info']['task_doc']);
            $datetime2 = strtotime(date("Y-m-d H:i:s"));
            $interval  = abs($datetime2 - $datetime1);

            $years = floor($interval / (365*60*60*24));
            $months = floor(($interval - $years * 365*60*60*24) / (30*60*60*24));    
            $days = floor(($interval - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
            $hours = floor(($interval - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60)); 
            $minutes = floor(($interval - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60);
            $seconds = floor(($interval - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minutes*60));     
            $minutes   = round($interval / 60);

            $arrTask[] = array(
				'task_id' => $task_id,
				'user_task_id' => $details['basic_info']['user_task_id'], 
				'task_title' => $details['basic_info']['task_name'], 
				'task_details' => $details['basic_info']['task_details'], 
				'task_due_date' => $details['basic_info']['task_due_date'], 
				'task_total_budget' => $details['basic_info']['task_total_budget'], 
				'task_doc' => date('d M Y', strtotime($details['basic_info']['task_doc'])), 
				'task_continent' => $continent->name, 
				'task_country' => $country->name, 
				'task_duration' => $minutes, 
				'task_attachments' => $details['task_attachments'], 
				'task_requirements' => $details['task_requirements'], 
				'task_freelancer_hire' => count($details['task_hired']), 
				'task_freelancer_hired_details' => $user_info, 
				'offer_send' => $arrOfferSend, 
				'commentArr' => $commentArr 
			);
        }

        // task creator info
		$creator_info = $CI->Freelancers->get_user_basic_info($task_created_by);
		$creator_post_info = $CI->Freelancers->get_client_post_count_info($task_created_by);
		
        $data['task_info'] = $arrTask; 
		
		$data['creator_data'][] = array('client_name'=> $creator_info['name'], 'since' => date('Y, M',strtotime($creator_info['doc'])), 'creator_post_count' => $creator_post_info  ); 
		
		//echo '<pre>';print_r($data);die('jjj');
			
		$AccountForm = $CI->parser->parse('freelancer/job-details',$data,true);
		return $AccountForm;
		
	}
	
	function ajax_save_job($task_user_id = ''){ 
		$CI =& get_instance();
		$CI->load->model("Freelancers"); 
		$CI->Freelancers->save_user_jobs($task_user_id);
	}
	
	public function freelancer_proposal(){
		$CI =& get_instance();
		$data = $userInfo = array();
		$CI->load->model("Tasks");
		$CI->load->model("Freelancers"); 
		$CI->load->model("Continent");
		$CI->load->model("Countries");
		
		
		$taskID = $CI->input->post('task_id');
		
		if($taskID == ''){
			redirect('key-list', 'refresh');
		}else{
			
			$details = $CI->Tasks->task_status_info_by_task_id($taskID);
			
			$user_info = $CI->Users->get_user_info_by_id($CI->session->userdata('user_id'));
			
			$continent = $CI->Continent->get_continent_by_id($details[0]['basic_info']['task_origin_location']);
			$country = $CI->Countries->get_country_by_id($details[0]['basic_info']['task_origin_country']);
			
			$datetime1 = strtotime($details[0]['basic_info']['task_doc']);
			$datetime2 = strtotime(date("Y-m-d H:i:s"));
			$interval  = abs($datetime2 - $datetime1);
	
			$years = floor($interval / (365*60*60*24));
			$months = floor(($interval - $years * 365*60*60*24) / (30*60*60*24));    
			$days = floor(($interval - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
			$hours = floor(($interval - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60)); 
			$minutes = floor(($interval - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60);
			$seconds = floor(($interval - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minutes*60));     
			$minutes   = round($interval / 60);
			
			$arrTask['task_info'] = array(
				'task_id' => $taskID,
				'user_task_id' => $details[0]['basic_info']['user_task_id'], 
				'task_title' => $details[0]['basic_info']['task_name'], 
				'task_details' => $details[0]['basic_info']['task_details'], 
				'task_due_date' => $details[0]['basic_info']['task_due_date'], 
				'task_total_budget' => $details[0]['basic_info']['task_total_budget'], 
				'task_continent' => $continent->name, 
				'task_country' => $country->name, 
				'task_duration' => $minutes, 
				'task_attachments' => $details[0]['task_attachments'], 
				'task_requirements' => $details[0]['task_requirements'],
				'user_connects' => $user_info->total_connects
			);
			
			$data['task_data'] = $arrTask;
			//print_r($details); print_r($arrTask); print_r($data['task_data']);  die('libr');
			
			$AccountForm = $CI->parser->parse('freelancer/proposal',$data,true);
			return $AccountForm;
		}
	}
	public function submit_proposal(){
		$CI =& get_instance();
		$data = $userInfo = array();
		
		$CI->load->model('Freelancers');
		$CI->load->model('Users');
		
		// proposal send or not
		$proposal_info = $CI->Freelancers->get_proposal_info($postVal = array('task_id' => $CI->input->post('task_id'), 'user_id' => $CI->session->userdata('user_id')));
		if(trim($proposal_info) == 'yes'){
			$CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Proposal Already Sent.</div>');
			redirect('key-list', 'refresh');
		}else{
			
			$user_info = $CI->Users->get_user_info_by_id($CI->session->userdata('user_id'));
			
			if($user_info->total_connects == 0){
				$CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Insufficient Connects.</div>');
				redirect('purchase-list', 'refresh');
			}else{
				if(!empty($_FILES) && is_array($_FILES)){  
					for($i = 0; $i<count($_FILES['fldTaskDocuments']['name']); $i++) {
						$path = $_FILES['fldTaskDocuments']['name'][$i];
						$path_parts = pathinfo($path);
						$filename = time() . $CI->session->userdata('user_id') . '_' . $path;
						$sourcePath = $_FILES['fldTaskDocuments']['tmp_name'][$i];
						$targetPath = "./uploads/proposal/".$filename;
						if(move_uploaded_file($sourcePath,$targetPath)) {
							 $postData['uploadFiles'][] = $filename;
						}
					}
				}
				$CI->Freelancers->add_proposal($postData);
			}
		}
	}

	public function public_profile($user_id = ''){

		$CI =& get_instance();
		$data = $userInfo = array();
		$CI->load->model('Users');
		$CI->load->model('Tasks');
		$CI->load->library('Ltask');

		$userData = $CI->Users->get_user_profile_info_by_id($user_id);
		$user_profile_image = $CI->session->userdata('user_image');
		$user_login = $CI->Users->get_user_info_by_id($user_id);

		if(empty($user_login->profile_image)) {
	    	$user_profile_image = base_url('assets/img/no-image.png');
	    }else {
	    	$user_profile_image = base_url('uploads/user/profile_image/'.$user_login->profile_image);	    	
	    } 

		if(!empty($userData)) {
        	//$spend_by_user = $CI->Tasks->get_user_total_spend($CI->session->userdata('user_id'));

			$spend_by_user = array();

            $data= array(

				'id' => $userData['basic_info']->user_id, 
				'name' => $userData['basic_info']->name,
				'address' => $userData['basic_info']->address,
				'city' => $userData['basic_info']->city,
				'state' => $userData['basic_info']->state, 
				'country' => $userData['basic_info']->country, 
				'gender' => $userData['basic_info']->gender, 
				'date_of_birth' => $userData['basic_info']->date_of_birth, 
				'bio' => $userData['basic_info']->bio,
				'vat' => $userData['basic_info']->vat,
				'user_languages' => implode(', ', $userData['user_selected_languages']), 
				'user_skills' => $userData['user_selected_skills'], 
				'user_image' => $user_profile_image, 
				'spend_by_user' => $spend_by_user,
				'user_image' => $user_profile_image,
			);
        }

		$data = array_merge($data,(array)($user_login));

		//print_r($userData); print_r($CI->session->all_userdata());
		//print_r($data); 
		//die;
		$AccountForm = $CI->parser->parse('freelancer/public_profile',$data,true);
		return $AccountForm;
	}

	public function earnings(){
		$CI =& get_instance();
		$data = $userInfo = array();
		$AccountForm = $CI->parser->parse('freelancer/earnings',$data,true);
		return $AccountForm;
	}

	public function analytics(){
		$CI =& get_instance();
		$CI->load->model('Tasks');
		$data = array();
		$data['analytics'] = $CI->Tasks->project_details($CI->session->userdata('user_id'));
		$AccountForm = $CI->parser->parse('freelancer/analytics', $data, true);
		return $AccountForm;
	}

	public function problem_ticket($userInfo = array()){

		$CI =& get_instance();
		$CI->load->model('Freelancers');
		$data = array();
		$data['grievance'] = $CI->Freelancers->get_grievance();
		$AccountForm = $CI->parser->parse('freelancer/problem_ticket',$data,true);
		return $AccountForm;
	}
	
	public function add_ticket($userInfo = array()){
		$CI =& get_instance();
		$CI->load->model('Freelancers');	
		$submitData = $CI->input->post(); 
		$result = $CI->Freelancers->add_ticket($userInfo, $submitData); 

		if($result) {
			$CI->session->set_flashdata('msg', '<div class="alert alert-success text-center">New ticket has been generated successfully. Your ticket number : '.$result['message'].'</div>');
			//return array('status' =>  TRUE, 'message' => 'Task data save successfully.');            	
		}else{
			$CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Unable to generate ticket. Please try again.</div>');
			//return array('status' =>  FALSE, 'message' => 'Unable to save task data.');
		}	
	}
	
	public function job_list_data($type){
		$CI =& get_instance();
		$CI->load->model('Users');
        $CI->load->model('Tasks');
		$CI->load->model('Freelancers');
        $CI->load->library("pagination");
		
		
		// Search text
		$searchValue = "";
		if($CI->input->post('search') != NULL ){
		  $searchValue = $CI->input->post('searchValue');
		  $CI->session->set_userdata(array("searchValue"=>$searchValue));
		}else{
		  if($CI->session->userdata('searchValue') != NULL){
			$searchValue = $CI->session->userdata('searchValue');
		  }
		}
		
		// Row per page
		$rowperpage = PER_PAGE;
		// Row position
		
		if($CI->uri->segment(3)){
			$rowno = ($CI->uri->segment(3));
		}
		else{
			$rowno = 1;
		}
		
		if($rowno != 0){
		  $rowno = ($rowno-1) * $rowperpage;
		}
		
		// Pagination Configuration
		$config['base_url'] = base_url().'job-list/'.$type;
		$config['full_tag_open'] = '<ul class="pagination" style="margin-top:20px;">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = false;
		$config['first_tag_open'] = '<li class="previous">';
		$config['first_tag_close'] = '</li>';  
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li class="next">';
		$config['first_tag_close'] = '</li>'; 
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li class="next">';
		$config['next_tag_close'] = '</li>';  
		$config['prev_link'] = 'Previous';
		$config['prev_tag_open'] = '<li class="previous">';
		$config['prev_tag_close'] = '</li>'; 
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>'; 
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		
		
		$config['use_page_numbers'] = TRUE;
		$config['total_rows'] = $CI->Freelancers->get_job_by_type_count($type,$searchValue);
		$config['per_page'] = $rowperpage;
		
		$CI->pagination->initialize($config);
		
		$data['links'] = $CI->pagination->create_links();
		
		$data['job_array'] = $CI->Freelancers->get_job_by_type($type,$searchValue,$rowperpage,$rowno);
		
		//echo '<pre>'; print_r($data['job_array']); die;
		/*
		if(!empty($data['job_array'])){ $i = 0;
			foreach($data['job_array'] as $singl){
				if($type == 'active'){
					$data['job_array'] = array('view_link' => ); 
				}else{
					$data['job_array'] =  array('view_link' => ); 
				}
				$i++;
			}
		}*/
		
		
		$userLoginData = $CI->Users->getUserLoginData('user_id', $CI->session->userdata('user_id'));
		
		if(!empty($userLoginData)){
			$connections = $userLoginData->total_connects;
			$total_positive_coins = $userLoginData->total_positive_coins;
			$total_negative_coins = $userLoginData->total_negative_coins;
		}else{
			$connections = $total_positive_coins = $total_negative_coins = 0;
		}
				
		$userData = $CI->Users->get_user_profile_info_by_id($CI->session->userdata('user_id'));
		$user_profile_image = $CI->session->userdata('user_image');
		
		if(empty($user_profile_image)) {
			$user_profile_image = base_url('assets/img/no-image.png');
		}else{
			$user_profile_image = base_url('uploads/user/profile_image/'.$user_profile_image);	    	
		}

		if(!empty($userData)) {
			$spend_by_user = $CI->Tasks->get_user_total_spend($CI->session->userdata('user_id'));
			
			$userInfo = array('id' => $userData['basic_info']->user_id, 'name' => $userData['basic_info']->name, 'country' => $userData['basic_info']->country, 'gender' => $userData['basic_info']->gender, 'date_of_birth' => $userData['basic_info']->date_of_birth, 'bio' => $userData['basic_info']->bio, 'address' => $userData['basic_info']->address, 'state' => $userData['basic_info']->state, 'city' => $userData['basic_info']->city, 'vat' => $userData['basic_info']->vat, 'user_languages' => implode(', ', $userData['user_selected_languages']), 'user_skills' => $userData['user_selected_skills'], 'user_image' => $user_profile_image, 'spend_by_user' => $spend_by_user, 'connections' => $connections,'total_positive_coins' => $total_positive_coins,'total_negative_coins' => $total_negative_coins );

		}
		$data['user_info'][] = $userInfo;
		
		$AccountForm = $CI->parser->parse('freelancer/job_list_page',$data,true);
		return $AccountForm;
	}
	
	public function saved_job_list(){
		$CI =& get_instance();
		$CI->load->model('Freelancers');
		$CI->load->model('Tasks');
		$CI->load->model('Users');
		$CI->load->library('pagination');
		
		// Pagination Configuration
		$config['base_url'] = base_url().'save-job-list';
		$config['full_tag_open'] = '<ul class="pagination" style="margin-top:20px;">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = true;
        $config['first_tag_open'] = '<li class="previous">';
        $config['first_tag_close'] = '</li>';  
        $config['last_link'] = true;
        $config['first_tag_open'] = '<li class="next">';
        $config['first_tag_close'] = '</li>'; 
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li class="next">';
        $config['next_tag_close'] = '</li>';  
        $config['prev_link'] = 'Previous';
        $config['prev_tag_open'] = '<li class="previous">';
        $config['prev_tag_close'] = '</li>'; 
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>'; 
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
		$config["per_page"] = PER_PAGE;	

		
        $CI->pagination->initialize($config);
        $page = ($CI->uri->segment(2)) ? $CI->uri->segment(2) : 0;        
        $data["links"] = $CI->pagination->create_links();
		
		$userData = $CI->Users->get_user_profile_info_by_id($CI->session->userdata('user_id'));
	    $user_profile_image = $CI->session->userdata('user_image');
		
	    if(empty($user_profile_image)) {
	    	$user_profile_image = base_url('assets/img/no-image.png');
	    }else{
	    	$user_profile_image = base_url('uploads/user/profile_image/'.$user_profile_image);	    	
	    }

        if(!empty($userData)) {
        	$spend_by_user = $CI->Tasks->get_user_total_spend($CI->session->userdata('user_id'));
            $userInfo = array('id' => $userData['basic_info']->user_id, 'name' => $userData['basic_info']->name, 'country' => $userData['basic_info']->country, 'gender' => $userData['basic_info']->gender, 'date_of_birth' => $userData['basic_info']->date_of_birth, 'bio' => $userData['basic_info']->bio, 'address' => $userData['basic_info']->address, 'state' => $userData['basic_info']->state, 'city' => $userData['basic_info']->city, 'vat' => $userData['basic_info']->vat, 'user_languages' => implode(', ', $userData['user_selected_languages']), 'user_skills' => $userData['user_selected_skills'], 'user_image' => $user_profile_image, 'spend_by_user' => $spend_by_user);
        }
		$data['user_info'][] = $userInfo;
		$data['job_array'] = $CI->Freelancers->saved_job_list($config["per_page"],$page);
		$AccountForm = $CI->parser->parse('freelancer/save_job_list_page',$data,true);

		return $AccountForm;
	}
	
	public function hired_job_details($taskID = 0){
		$CI =& get_instance();
        $CI->load->model('Tasks');
		$CI->load->model("Users");
		$CI->load->model("Freelancers"); 
		$CI->load->model('Continent');
		$CI->load->model('Countries');

        $data = $arrTask = $arrOfferSend = $commentArr = array();

        $task_details = $CI->Tasks->get_task_info_by_user_task_id($taskID);
		
        if(!empty($task_details)){
            $task_id = $task_details->task_id;
			$task_created_by = $task_details->task_created_by;
		}else{
			$task_id = $task_created_by = ''; 
		}
		
		$savedcheck = $CI->Freelancers->check_saved_task($task_id, $CI->session->userdata('user_id'));
		if($savedcheck){
			$data['savetext'] = '<span id="">Already Saved</span>';
		}else{
			$data['savetext'] = '<span id="txtShow">Save This Job</span>';
		}
		
		// get freelancer connection 
		$getcoonects = $CI->Freelancers->get_user_basic_info($CI->session->userdata('user_id'));
		if(!empty($getcoonects)){
			$data['connection'] = $getcoonects['total_connects'];
		}else{
			$data['connection'] = 0;
		}
		
		$data['offer_send'] = $CI->Freelancers->job_offer_user($task_id);
		
		$data['proposal_count'] = $CI->Freelancers->proposal_count($task_id, $count = '');
		
		$tablename = array('comment_master','users','user_login');
		$jointype = array('left','left');
		$joincondition = array('comment_master_alias.user_id=users_alias.user_id','comment_master_alias.user_id=user_login_alias.user_id');
		$condition = 'comment_master_alias.tast_user_id="'.$taskID.'"';
		$fieldArr		= array('*','*','*');
		$limit			= "all";
		$oderby			= 'comment_master_alias.id desc';

		$comment_info = $CI->Tasks->getJoinDataByCondition($tablename,$jointype,$joincondition,$condition,$fieldArr,$limit,$oderby);
		if(!empty($comment_info)){
			foreach($comment_info as $row){
				if($row->profile_image != NULL){
					$img_url = base_url().'uploads/user/profile_image/'.$row->profile_image;
				}else{
					$img_url = base_url().'assets/img/user2.png';
				}
				$commentArr[] = array('user_id' => $row->user_id, 'profile_image' => $img_url, 'name' => $row->name, 'remarks' => $row->remarks);
			}
		}
		
        $task = $CI->Tasks->task_status_info_by_task_id($task_details->task_id); 
        foreach($task as $details) {
            $continent = $CI->Continent->get_continent_by_id($details['basic_info']['task_origin_location']);
            $country = $CI->Countries->get_country_by_id($details['basic_info']['task_origin_country']);

            $user_info = array();
            if(!empty($details['task_hired']) && count($details['task_hired']) > 0){
                foreach($details['task_hired'] as $freelancer_hired){
                    $user_details = $CI->Users->get_user_profile_info_by_id($freelancer_hired['receiver_id']);
                    $user_status = $CI->Users->get_user_info_by_id($freelancer_hired['receiver_id']);
                    $user_profile_image = $user_status->profile_image;
                    if(empty($user_profile_image)) {
                        $user_profile_image = base_url('assets/img/no-image.png');
                    } else {
                        $user_profile_image = base_url('uploads/user/profile_image/'.$user_profile_image);          
                    }
                    $is_login = $user_status->is_login; 
                    $user_info[] = array('freelancer_id' => $user_details['basic_info']->user_id, 'freelancer_name' => $user_details['basic_info']->name, 'freelancer_country' => $user_details['basic_info']->country, 'freelancer_state' => $user_details['basic_info']->state, 'freelancer_city' => $user_details['basic_info']->city, 'user_image' => $user_profile_image, 'is_online' => (($is_login == '1')?'<span> </span>':''));

                }
            }
			
			// get milestone list data by hired id
			$getHireData = $CI->Freelancers->get_hire_info($task_id, $CI->session->userdata('user_id'));
			if(!empty($getHireData)){
				$hire_id = $getHireData['hired_id'];
				$offer_id = $getHireData['offer_id'];
				$milestoneInfo = $CI->Freelancers->get_task_milestone_list($task_id, $hire_id);
				$data['milestoneInfo'] = $milestoneInfo; 
			}else{
				$offer_id = $hire_id = 0;
				$data['milestoneInfo'] = array(); 
			}
            

            $datetime1 = strtotime($details['basic_info']['task_doc']);
            $datetime2 = strtotime(date("Y-m-d H:i:s"));
            $interval  = abs($datetime2 - $datetime1);

            $years = floor($interval / (365*60*60*24));
            $months = floor(($interval - $years * 365*60*60*24) / (30*60*60*24));    
            $days = floor(($interval - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
            $hours = floor(($interval - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60)); 
            $minutes = floor(($interval - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60);
            $seconds = floor(($interval - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minutes*60));     
            $minutes   = round($interval / 60);

            $arrTask[] = array(
				'task_id' => $task_id,
				'enc_task_id' => base64_encode($task_id),
				'user_task_id' => $details['basic_info']['user_task_id'], 
				'task_title' => $details['basic_info']['task_name'], 
				'task_details' => $details['basic_info']['task_details'], 
				'task_due_date' => $details['basic_info']['task_due_date'], 
				'task_total_budget' => $details['basic_info']['task_total_budget'], 
				'task_doc' => date('d M Y', strtotime($details['basic_info']['task_doc'])), 
				'task_continent' => $continent->name, 
				'task_country' => $country->name, 
				'task_duration' => $minutes, 
				'task_attachments' => $details['task_attachments'], 
				'task_requirements' => $details['task_requirements'], 
				'task_freelancer_hire' => count($details['task_hired']), 
				'task_freelancer_hired_details' => $user_info, 
				'offer_send' => $arrOfferSend, 
				'commentArr' => $commentArr 
			);
        }

        // task creator info
		$creator_info = $CI->Freelancers->get_user_basic_info($task_created_by);
		$creator_post_info = $CI->Freelancers->get_client_post_count_info($task_created_by);
		
        $data['task_info'] = $arrTask; 
		
		$data['creator_data'][] = array('client_name'=> $creator_info['name'], 'since' => date('Y, M',strtotime($creator_info['doc'])), 'creator_post_count' => $creator_post_info  ); 
		
		//echo '<pre>';print_r($data['task_info']);die('jjj');
			
		$AccountForm = $CI->parser->parse('freelancer/hired-job-details',$data,true);
		return $AccountForm;
	}
	
	public function freelancer_direct_action($data = array()){
		$CI =& get_instance();
        $CI->load->model('Notifications');
		
		
		if(!empty($data)){
			$task_id = base64_decode($data['task_id']);
			$action_type = base64_decode($data['action_type']);
			
			$return = $CI->Notifications->hired_action($task_id,'A');
			if($return){
				redirect('notification');
			}else{
				redirect('notification');
			}
		}
		
		
		
		
	}

	public function analytics_details($condition = array()){
		$CI =& get_instance();
		$CI->load->model('Tasks');
		$data = array();
		$data['analytics'] = $CI->Tasks->project_details($CI->session->userdata('user_id'), 100, $condition);
		$data['daterange'] = $condition['daterange'] ?? null;
		$AccountForm = $CI->parser->parse('freelancer/analytics_details', $data, true);
		return $AccountForm;
	}
	

}