<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lhire {
	public function hire($userInfo = null){
    	
		$CI =& get_instance();
        $CI->load->model('Tasks');
        $CI->load->model("Users");
		$CI->load->model("Hires");         

		$data = $selectedFreelancer = $arrFreelancer = $arrJobs = $arrCountry = $arrContinent = $arrSkills = array();
        $post_data = $CI->input->post();               
        $jobs = $CI->Hires->get_task_data_by_user();	

        //print_r($post_data);
        if(!empty($post_data)) {
            if(!empty($post_data['fldSelectedFreelancer']) && is_array($post_data['fldSelectedFreelancer'])) {
               $selectedFreelancer = $post_data['fldSelectedFreelancer'];
            } else {
               $selectedFreelancer[] = $post_data['chkMakeOfferFreelancer'];
            }
        } else {
            $CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Please select a freelancer for sending offer.</div>');
            redirect('search-freelancer', 'refresh');
        }

        $freelancers_list = $CI->Users->get_freelancers_profile_info_by_id($selectedFreelancer);
        if(!empty($freelancers_list)) {
            foreach($freelancers_list as $row) {
                $user_status = $CI->Users->get_user_info_by_id($row['basic_info']->user_id);
                $user_profile_image = $user_status->profile_image;
                if(empty($user_profile_image)) {
                    $user_profile_image = base_url('assets/img/no-image.png');
                } else {
                    $user_profile_image = base_url('uploads/user/profile_image/'.$user_profile_image);          
                }
                $is_login = $user_status->is_login;
                $arrFreelancer[] = array(
					'freelancer_id' => $row['basic_info']->user_id, 
					'freelancer_name' => $row['basic_info']->name, 
					'freelancer_country' => $row['basic_info']->country, 
					'freelancer_state' => $row['basic_info']->state, 
					'freelancer_city' => $row['basic_info']->city, 
					'freelancer_address' => $row['basic_info']->address, 
					'user_image' => $user_profile_image, 
					'is_online' => (($is_login == '1')?'<div class="round"> </div>':'')
				);

            }
        }
		
		//echo '<pre>'; print_r($arrFreelancer); die;

        $continents = $CI->Continent->get_all_continent_info();
        if(!empty($continents)) {
            foreach($continents as $continent) {
                $arrContinent[] = array('key' => $continent->continent_id, 'value' => $continent->name, 'currentselection' => '');
            }
        }

        $countries = $CI->Countries->get_all_country_info();
        if(!empty($countries)) {
            foreach($countries as $countrie) {
                $arrCountry[] = array('key' => $countrie->country_id, 'value' => $countrie->name, 'currentselection' => '');
            }
        }

        $skills = $CI->Skills->get_all_skill_info();
        if(!empty($skills)) {
            foreach($skills as $skill) {
                $arrSkills[] = array('key' => $skill->area_of_interest_id, 'value' => $skill->name, 'currentselection' => '');
            }
        }         

        //print_r($jobs);

        /*if(!empty($jobs)) {

            foreach($jobs as $row) {

                $arrJobs[] = array('task_id' => $row->task_id, 'user_task_id' => $row->user_task_id, 'task_name' => $row->task_name, 'task_total_budget' => $row->task_total_budget);

            }

        } */   


        $data['freelancerInfo'] = $arrFreelancer;

       // $data['jobs'] = $arrJobs;
        $data['skills'] = $arrSkills;
        $data['countries'] = $arrCountry;  
        $data['continents'] = $arrContinent;         
		
		//echo '<pre>'; print_r($data);die;                

	//	$AccountForm = $CI->parser->parse('hire/direct_hire',$data,true);

		return $AccountForm;

	}
	
	public function add_new_hire($post_data = null){
		$CI =& get_instance();
        $CI->load->model('Tasks');
		$CI->load->model('Hires');
		
		$post_data = $CI->input->post(); 
		
		$return = $CI->Hires->hire_data_insert($post_data);
		
		if($return){
        	$CI->session->set_flashdata('msg', '<div class="alert alert-success text-center">'.$return['message'].'</div>');
        } else {
            $CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Unable to send hire request.</div>');
		}
		
		//echo '<pre>'; print_r($CI->input->post()); die;
		
		if(trim($CI->input->post('deposit')) == 'deposit_fund_now'){
			redirect('direct-hire/step-2/'.$CI->input->post('fldJobTitle'), 'refresh');
		}else{
			redirect('search-freelancer', 'refresh');
		}
		
	}
	
	public function hire_step2($userInfo = null){
		$CI =& get_instance();
        $CI->load->model('Tasks');
        $CI->load->model("Users");  
		
		$get_info = $CI->Tasks->get_task_info_by_user_task_id($user_task_id = $CI->uri->segment(3));
		
		
		
		if(!empty($get_info)){
			$taskArr[] = array('task_id' => $get_info->task_id, 'user_task_id' => $get_info->user_task_id,  'task_name' => $get_info->task_name, 'task_total_budget' => $get_info->task_total_budget );
		}
		
		$data['taskinfo'] = $taskArr;
		
		//echo '<pre>'; print_r($data); die;
		
		$AccountForm = $CI->parser->parse('hire/direct_hire_step2',$data,true);
		return $AccountForm;
	}
	
	public function hire_freelancers(){
		$CI =& get_instance();
        $CI->load->model('Tasks');
        $CI->load->model("Users");  
		$CI->load->model("Hires"); 
		
		$data = $selectedFreelancer = $arrFreelancer = $arrJobs = $arrCountry = $arrContinent = $arrSkills = array();
        $post_data = $CI->input->post(); 
		
		$jobs = $CI->Hires->get_task_data_by_user();
		
        
        if(!empty($post_data)) {
            if(!empty($post_data['fldSelectedFreelancer']) && is_array($post_data['fldSelectedFreelancer'])) {
               $selectedFreelancer = $post_data['fldSelectedFreelancer'];
            } else if(isset($post_data['fldFreelancerID']) && $post_data['fldFreelancerID'] !=''){
				//echo $post_data['fldFreelancerID'];die;
				
				
				$selectedFreelancer[] = $post_data['fldFreelancerID'];
			} else {
            	$selectedFreelancer[] = $post_data['chkMakeOfferFreelancer'];
            }
        } else {
            $CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Please select a freelancer for sending offer.</div>');
            redirect('search-freelancer', 'refresh');
        }

        $freelancers_list = $CI->Users->get_freelancers_profile_info_by_id($selectedFreelancer);
        if(!empty($freelancers_list)) {
            foreach($freelancers_list as $row) {
                $user_status = $CI->Users->get_user_info_by_id($row['basic_info']->user_id);
				if(!empty($user_status)){	
                    if($user_status->total_coins>=0){ $total_positive_coins='+ '.$user_status->total_coins;}else{ $total_positive_coins=$user_status->total_coins;}
					//$total_positive_coins = $user_status->total_positive_coins;
					$total_negative_coins = $user_status->total_negative_coins;
					$total_connects = $user_status->total_connects;
				}else{
					$total_positive_coins = $total_negative_coins = $total_connects = 0;
				}
				
				
                $user_profile_image = $user_status->profile_image;
                if(empty($user_profile_image)) {
                    $user_profile_image = base_url('assets/img/no-image.png');
                } else {
                    $user_profile_image = base_url('uploads/user/profile_image/'.$user_profile_image);          
                }
                $is_login = $user_status->is_login;
                $arrFreelancer[] = array(
					'freelancer_id' => $row['basic_info']->user_id, 
					'freelancer_name' => $row['basic_info']->name, 
					'freelancer_country' => $row['basic_info']->country, 
					'freelancer_state' => $row['basic_info']->state, 
					'freelancer_city' => $row['basic_info']->city, 
					'freelancer_address' => $row['basic_info']->address, 
					'user_image' => $user_profile_image, 
					'is_online' => (($is_login == '1')?'<div class="round"> </div>':''),
					'freelancer_public_id' =>$user_status->profile_id,
					'total_positive_coins' => $total_positive_coins,
					'total_negative_coins' => $total_negative_coins,
					'total_connects' => $total_connects
				);

            }
        }

        $continents = $CI->Continent->get_all_continent_info();
        if(!empty($continents)) {
            foreach($continents as $continent) {
                $arrContinent[] = array('key' => $continent->continent_id, 'value' => $continent->name, 'currentselection' => '');
            }
        }

        $countries = $CI->Countries->get_all_country_info();
        if(!empty($countries)) {
            foreach($countries as $countrie) {
                $arrCountry[] = array('key' => $countrie->country_id, 'value' => $countrie->name, 'currentselection' => '');
            }
        }

        $skills = $CI->Skills->get_all_skill_info();
        if(!empty($skills)) {
            foreach($skills as $skill) {
                $arrSkills[] = array('key' => $skill->area_of_interest_id, 'value' => $skill->name, 'currentselection' => '');
            }
        }         

        if(!empty($jobs)) {

            foreach($jobs as $row) {

                $arrJobs[] = array('task_id' => $row->task_id, 'user_task_id' => $row->user_task_id, 'task_name' => $row->task_name, 'task_total_budget' => $row->task_total_budget);

            }

        } 
		
        $data['freelancerInfo'] = $arrFreelancer;
        $data['jobs'] = $arrJobs;
        $data['skills'] = $arrSkills;
        $data['countries'] = $arrCountry;  
        $data['continents'] = $arrContinent; 
		
		//echo '<pre>'; print_r($arrFreelancer);die;
		
		$AccountForm = $CI->parser->parse('hire/hire_freelancer',$data,true);
		return $AccountForm;
	}
	
	public function rehire_freelancers($userInfo = null){
		$CI =& get_instance();
        //$CI->load->model('Tasks');
        $CI->load->model("Hires"); 
		
		$data['hire_list'] = $CI->Hires->get_old_hire_list($CI->session->userdata('user_id'));
		
		//echo '<pre>'; print_r($data['hire_list']); die;
		
		//$data['link'] = $CI->create->pagination();
		
		$AccountForm = $CI->parser->parse('hire/rehire_freelancer',$data,true);
		return $AccountForm;
		
	}
	
	public function view_contract($hired_id = 0, $freelancer_id =0){
		$CI =& get_instance();
		$CI->load->model("Hires"); 
		$CI->load->model("Users"); 
		$CI->load->model("Tasks");
		$contract_info = $CI->Hires->get_contract_details($hired_id);
		// echo '<pre>'; print_r($contract_info); die;
		$task_data = $CI->Tasks->getTaskDataById($contract_info['contract_details']['task_id']);		
		
		if(!empty($contract_info)){
			$freelancer_id = $contract_info['contract_details']['freelancer_id'];
			
			$remain_amount = ($contract_info['contract_details']['contract_total_budget_escrow'] - $contract_info['contract_details']['contract_total_budget_spend']);
			
			$data = array(
				'contract_id' => $contract_info['contract_details']['hired_id'],
				'contract_title' => $contract_info['contract_details']['hired_title'],
				'contract_details' => $contract_info['contract_details']['hired_details'],
				'contract_term' => $contract_info['contract_details']['agreed_term'],
				'contract_deposit' => $contract_info['contract_details']['deposit'],
				'contract_end_date' => date('d/m/Y',strtotime($contract_info['contract_details']['hired_end_date'])),
				
				'contract_total_budget' => $contract_info['contract_details']['agreed_budget'],
				'contract_total_budget_spend' => $contract_info['contract_details']['contract_total_budget_spend'],
				'contract_total_budget_remain' => $remain_amount,
				'contract_total_budget_escrow' => $contract_info['contract_details']['contract_total_budget_escrow'],
				'contract_milestone_cnt' => $contract_info['contract_details']['milestone_cnt'],
				
				'contract_milestone_info' => $contract_info['milestone_details'],
				'freelancer_id' => $contract_info['contract_details']['freelancer_id'],
				'task_name' => isset($task_data->task_name) ? $task_data->task_name : $contract_info['contract_details']['hired_title'],
				'user_task_id' => $contract_info['contract_details']['user_task_id'],
			);
			
			$freelancerInfo = $CI->Hires->get_freelancer_info_by_id($freelancer_id);
			
			//echo '<pre>'; print_r($data); die;
			
			$user_profile_image = $freelancerInfo['basic_info']['profile_image'];
			
			if(empty($user_profile_image)) {
				$user_profile_image = base_url('assets/img/no-image.png');
			} else {
				$user_profile_image = base_url('uploads/user/profile_image/'.$user_profile_image);          
			}
			$is_login = $freelancerInfo['basic_info']['is_login'];
			$positivecoin=0;			
            if($freelancerInfo['basic_info']['total_coins']>=0){ $positivecoin='+ '.$freelancerInfo['basic_info']['total_coins'];}else{ $positivecoin=$freelancerInfo['basic_info']['total_coins'];}
			$arrFreelancer[] = array(
				'freelancer_id' => $freelancerInfo['basic_info']['user_id'], 
				'freelancer_name' => $freelancerInfo['basic_info']['name'], 
				'freelancer_country' => $freelancerInfo['basic_info']['country'], 
				'freelancer_state' => $freelancerInfo['basic_info']['state'], 
				'freelancer_city' => $freelancerInfo['basic_info']['city'], 
				'freelancer_address' => $freelancerInfo['basic_info']['address'], 
				'freelancer_total_positive_coins' => $positivecoin,
				'freelancer_total_negative_coins' => $freelancerInfo['basic_info']['total_negative_coins'],
				'user_image' => $user_profile_image, 
				'is_online' => (($is_login == '1')?'<div class="round"> </div>':''),
				'freelancer_public_id' =>$freelancerInfo['basic_info']['profile_id'] 
			);
			$data['freelancer_details'] = $arrFreelancer;
		}
		
		
		$AccountForm = $CI->parser->parse('hire/view-contract',$data,true);
		return $AccountForm;
		
	}
		
	public function ajax_change_milestone_date(){
		$CI =& get_instance();
        $CI->load->model('Hires');
        $data = array();  
		$data = $CI->input->post();
        $data['checkField'] = 'milestone_id';
		$data['checkVal'] = $CI->input->post('frmChangeDate_milestone_id');
		$data['updateField'] = 'milestone_end_date';
		$data['updateData'] = date('Y-m-d 23:59:59',strtotime($CI->input->post('frmChangeDate')));
		$data['updateTable'] = 'task_hired_milestone';
				
		if(!empty($data)){
			$return = $CI->Hires->update_data($data);
			$data = array('status' => 1, 'message' => 'successful');
		}else{
			$data = array('status' => 0, 'message' => 'error');
		}
		return json_encode($data);
	}
	
	public function ajax_add_new_milestone(){
		$CI =& get_instance();
        $CI->load->model('Hires');
        $data = array();  
		$data = $CI->input->post();
		if(!empty($data)){
			$return = $CI->Hires->add_new_milestone($data);
			if($return){
				$data = array('status' => 1, 'message' => 'successful');
			}else{
				$data = array('status' => 0, 'message' => 'error');
			}
		}else{
			$data = array('status' => 0, 'message' => 'error');
		}
		return json_encode($data);
		
	}
	
	public function close_contract_page(){
		$CI =& get_instance();
        $CI->load->model('Hires');
		
        $contractInfo = $CI->Hires->get_contract_details_by_id($CI->uri->segment(2));
		
		//echo '<pre>'; print_r($contractInfo); die;
		
		if(!empty($contractInfo)){
			$freelancer_id = $contractInfo['contract_details']['freelancer_id']; 
			$data = array(
				'contract_title' => $contractInfo['contract_details']['hired_title'],
				'contract_id' => $contractInfo['contract_details']['hired_id'],
				'offer_id' => $contractInfo['contract_details']['offer_id'],
				'task_id' => $contractInfo['contract_details']['task_id'],
				'freelancer_id' => $contractInfo['contract_details']['freelancer_id']
			);
			
			$freelancerInfo = $CI->Hires->get_freelancer_info_by_id($freelancer_id);
			
			$user_profile_image = $freelancerInfo['basic_info']['profile_image'];
			
			if(empty($user_profile_image)) {
				$user_profile_image = base_url('assets/img/no-image.png');
			} else {
				$user_profile_image = base_url('uploads/user/profile_image/'.$user_profile_image);          
			}
			$is_login = $freelancerInfo['basic_info']['is_login'];
			$positivecoin=0;			
            if($freelancerInfo['basic_info']['total_coins']>=0){ $positivecoin='+ '.$freelancerInfo['basic_info']['total_coins'];}else{ $positivecoin=$freelancerInfo['basic_info']['total_coins'];}
			$arrFreelancer[] = array(
				'freelancer_id' => $freelancerInfo['basic_info']['user_id'], 
				'freelancer_name' => $freelancerInfo['basic_info']['name'], 
				'freelancer_country' => $freelancerInfo['basic_info']['country'], 
				'freelancer_state' => $freelancerInfo['basic_info']['state'], 
				'freelancer_city' => $freelancerInfo['basic_info']['city'], 
				'freelancer_address' => $freelancerInfo['basic_info']['address'], 
				'user_image' => $user_profile_image, 
				'is_online' => (($is_login == '1')?'<div class="round"> </div>':''),
				'freelancer_public_id' => $freelancerInfo['basic_info']['profile_id'],
				'freelancer_total_positive_coins' => $positivecoin,
				'freelancer_total_negative_coins' => $freelancerInfo['basic_info']['total_negative_coins']
			);
			$data['freelancer_details'] = $arrFreelancer;
			
		}else{
			$freelancer_id = 0;
			$data['freelancer_details'] = array();
		}
		
		$AccountForm = $CI->parser->parse('hire/close-contract',$data,true);
		return $AccountForm;
	}
	
	
	public function submit_close_contract(){
		$CI =& get_instance();
        $CI->load->model('Hires');
        $data = array(); 				
		$data = $CI->input->post();			
 
		if(!empty($data)){
			$return = $CI->Hires->close_contract_update($data);
			//$data = array('status' => 1, 'message' => 'successful');
			//$CI->session->set_flashdata('msg', '<div class="alert alert-success text-center">Contract closed successfully</div>');
			$CI->session->set_flashdata('msg', '<div class="alert alert-success text-center">Project status has been sent successfully</div>');
			redirect('hired');
		}else{
			//$data = array('status' => 0, 'message' => 'error');
			$CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Error! Try again</div>');
			redirect('view-contract/'.$CI->uri->segment(2));
		}
	}
	
	public function release_approve(){
		$CI =& get_instance();
        $CI->load->model('Hires');
        $data = array();  
		
		$milestone_details = $CI->Hires->get_milestone_details_by_id($CI->uri->segment(2));
		if(!empty($milestone_details)){
			
			$data = $milestone_details;
			$data['milestone_end_date'] = date('d/m/Y',strtotime($milestone_details['milestone_end_date'])); 
			
			$freelancer_id = $milestone_details['freelancer_id'];
			$freelancerInfo = $CI->Hires->get_freelancer_info_by_id($freelancer_id);
			
			$user_profile_image = $freelancerInfo['basic_info']['profile_image'];
			
			if(empty($user_profile_image)) {
				$user_profile_image = base_url('assets/img/no-image.png');
			} else {
				$user_profile_image = base_url('uploads/user/profile_image/'.$user_profile_image);          
			}
			$is_login = $freelancerInfo['basic_info']['is_login'];
			$arrFreelancer[] = array(
				'freelancer_id' => $freelancerInfo['basic_info']['user_id'], 
				'freelancer_name' => $freelancerInfo['basic_info']['name'], 
				'freelancer_country' => $freelancerInfo['basic_info']['country'], 
				'freelancer_state' => $freelancerInfo['basic_info']['state'], 
				'freelancer_city' => $freelancerInfo['basic_info']['city'], 
				'freelancer_address' => $freelancerInfo['basic_info']['address'], 
				'user_image' => $user_profile_image, 
				'is_online' => (($is_login == '1')?'<div class="round"> </div>':''),
				'freelancer_public_id' =>$freelancerInfo['basic_info']['profile_id'] 
			);
			$data['freelancer_details'] = $arrFreelancer;
		}else{
			$data = array();
		}
		//echo '<pre>'; print_r($data); die;
		
		$AccountForm = $CI->parser->parse('hire/release-approve',$data,true);
		return $AccountForm;
	}
	
	public function submit_release_approve(){
		$CI =& get_instance();
        $CI->load->model('Hires');
		
		$data = $CI->input->post();
		$return = $CI->Hires->submit_approval($data);
		if($CI->input->post('radio') == 'AR'){
			$msg = 'Successfully Approved & Release Fund';
		}else{
			$msg = 'Change request has been sent successfully';
		}
		
		if($return){
			$CI->session->set_flashdata('msg', '<div class="alert alert-success text-center">'.$msg.'</div>');
			redirect('hired');
		}else{
			$CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Error! Try Again.</div>');
			redirect('release-approve/'.$CI->input->post('milestone_id'));
		}
		
	}
	
}