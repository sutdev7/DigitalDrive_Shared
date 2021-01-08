<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lreview {
	public function review_page(){
		$CI =& get_instance();
		$data = $userInfo = array();
		$CI->load->model('Users');
		$CI->load->model('Reviews');
		$CI->load->model('Tasks');
		$CI->load->model('Freelancers');
		$CI->load->library('Ltask');
		
		
		$user_profile_image = $CI->session->userdata('user_image');
	    if(empty($user_profile_image)) {
	    	$user_profile_image = base_url('assets/img/no-image.png');
	    } else {
	    	$user_profile_image = base_url('uploads/user/profile_image/'.$user_profile_image);	    	
	    }
        $userData = $CI->Users->get_user_profile_info_by_id($CI->session->userdata('user_id'));	
        if($userData['basic_info']->gender == 'M') {
        	$arrGender[] = array('key' => 'M', 'value' => 'Male', 'checked' => 'checked', 'element_id' => 'radio-btn-1', 'icon' => base_url('assets/img/maleIcon.png'));
        	$arrGender[] = array('key' => 'F', 'value' => 'Female', 'checked' => '', 'element_id' => 'radio-btn-2', 'icon' => base_url('assets/img/femaleIcon.png'));
        } else {
        	$arrGender[] = array('key' => 'M', 'value' => 'Male', 'checked' => '', 'element_id' => 'radio-btn-1', 'icon' => base_url('assets/img/maleIcon.png'));
        	$arrGender[] = array('key' => 'F', 'value' => 'Female', 'checked' => 'checked', 'element_id' => 'radio-btn-2', 'icon' => base_url('assets/img/femaleIcon.png')); 
        }

        if(!empty($userData)) {
            $userInfo = array('id' => $userData['basic_info']->user_id, 'name' => $userData['basic_info']->name, 'country' => $userData['basic_info']->country, 'gender' => $arrGender, 'date_of_birth' => $userData['basic_info']->date_of_birth, 'bio' => $userData['basic_info']->bio, 'address' => $userData['basic_info']->address, 'state' => $userData['basic_info']->state, 'city' => $userData['basic_info']->city, 'vat' => $userData['basic_info']->vat, 'user_image' => $user_profile_image);
        }
        $data['user_info'][] = $userInfo;    
		
		$condition=array("review_received"=>$CI->session->userdata('user_id'),"show_review"=>1);
		$reviews_data=$CI->Reviews->get_reviews($condition);
		
		$reviews=array();
		if(count($reviews_data)>0 ){
			
			foreach($reviews_data as $rv){
				$user_profile_image = $rv->profile_image;
				if(empty($user_profile_image)) {
					$user_profile_image = base_url('assets/img/no-image.png');
				}
				else {
					$user_profile_image = base_url('uploads/user/profile_image/'.$user_profile_image);          
				}

				$reviews[]=array(
					
					'user_id'=>$rv->review_received,
					'name'=>$rv->name,
					'review_provided'=>$rv->review_provided,
					'country'=>$rv->country,
					'state'=>$rv->state,
					'city'=>$rv->city,
					'profile_image'=>$user_profile_image,
					'profile_id'=>$rv->profile_id,
					//'total_positive_coins'=>$rv->total_positive_coins,
					//'total_negative_coins'=>$rv->total_negative_coins,
					'coins'=>$rv->coins
					
				
				);
			}
			
			
			
		}
		
	
		$data['reviews']=$reviews;
				
		$AccountForm = $CI->parser->parse('user/reviews',$data,true); 
		return $AccountForm;
		
	}
	
	
	
	public function givereview_page(){
		$CI =& get_instance();
        $CI->load->model('Users');
        $CI->load->model('Hires');
		
        /* $contractInfo = $CI->Hires->get_contract_details_by_id($CI->uri->segment(2));
		
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
				'freelancer_total_positive_coins' => $freelancerInfo['basic_info']['total_positive_coins'],
				'freelancer_total_negative_coins' => $freelancerInfo['basic_info']['total_negative_coins']
			);
			$data['freelancer_details'] = $arrFreelancer;
			
		}else{
			$freelancer_id = 0;
			$data['freelancer_details'] = array();
		} */
		
		$user_info=$CI->Users->get_user_profile_info_by_id($CI->uri->segment(2));
		$user_profile_image = $user_info['basic_info']->profile_image;
			
		if(empty($user_profile_image)) {
			$user_profile_image = base_url('assets/img/no-image.png');
		} else {
			$user_profile_image = base_url('uploads/user/profile_image/'.$user_profile_image);          
		}
			$is_login = 0;
			$arrFreelancer[] = array(
				'freelancer_id' => $user_info['basic_info']->user_id, 
				'freelancer_name' => $user_info['basic_info']->name, 
				'freelancer_country' => $user_info['basic_info']->country, 
				'freelancer_state' => $user_info['basic_info']->state, 
				'freelancer_city' => $user_info['basic_info']->city, 
				'freelancer_address' => $user_info['basic_info']->address, 
				'user_image' => $user_profile_image, 
				'is_online' => (($is_login == '1')?'<div class="round"> </div>':''),
				'freelancer_public_id' => $user_info['basic_info']->profile_id,
				'freelancer_total_positive_coins' => $user_info['basic_info']->total_coins,
				'freelancer_total_negative_coins' => $user_info['basic_info']->total_negative_coins
			);
			
			
			
			$data['freelancer_details'] = $arrFreelancer;
		
		
		
	/* 	echo "<pre/>";
		print_r($arrFreelancer);
		exit; */
		$data['arrFreelancer']=$arrFreelancer;
		$AccountForm = $CI->parser->parse('user/give_review',$data,true);
		return $AccountForm;
	}
	
	
	public function submit_review(){
		$CI =& get_instance();
		$CI->load->model("Reviews");
		$CI->load->model("Notifications");
		$contract_id=$CI->uri->segment(3);
		/*  echo "<pre/>";
		print_r($_REQUEST); */
		$user_id=$CI->session->userdata('user_id');
		$coin=$_REQUEST['coin'];
		
		$query=$CI->db->query("SELECT * FROM task_notification WHERE notification_from='".$user_id."' AND notification_to='".$contract_id."' ORDER by notification_doc DESC LIMIT 0,1");
		
		$result=$query->row();	
		$task_id=$result->task_id;
		$offer_id=0;
		$action_id=20;
		
		$CI->db->select('hired_id');
        $CI->db->from('task_hired');
		$CI->db->where('task_id',$task_id ); 
		$hiredid=$CI->db->get()->row();	
		
		//-------------------PM
		$show_review="";
		$nmessage="";
		$checkreview=$CI->db->query("SELECT * FROM reviews WHERE review_provided_by='".$contract_id."' AND review_received='".$CI->session->userdata('user_id')."' AND taskid='".$task_id."'");
	    if($checkreview->num_rows()>0)
		{
				$show_review=1;
				$r=$checkreview->row();
				$CI->db->query("UPDATE reviews SET show_review=1 WHERE review_provided_by='".$contract_id."' AND review_received='".$CI->session->userdata('user_id')."' AND taskid='".$task_id."'");
				
				$sender=$CI->db->select('name')->from('users')->where('user_id',$contract_id )->get()->row();
				
				/*$rmessage='<strong>'.$sender->name.'</strong> has been completed the task and sent review and  '.$r->coins.' coins given <a href="'.base_url().'reviews">View Reviews</a>';*/

				$rmessage='<strong>'.$sender->name.'</strong> has been completed the task and sent review <a href="'.base_url().'reviews">View Reviews</a>';

				$title="REVIEW";
				$insert = array(
						'task_id' => $task_id,
						'offer_id' => $offer_id,
						'notification_master_id' => $action_id,
						'notification_from' =>$contract_id,
						'notification_to' =>$CI->session->userdata('user_id') ,
						'notification_details' => $title,
						'notification_message' => $rmessage,
						'notification_doc' => date('Y-m-d H:i:s')
					);
					
			   $CI->Notifications->insert_notification('task_notification',$insert);
			   
			   $nmessage='<strong>'.$CI->session->userdata('user_name').'</strong> has been completed the task and sent review.<a href="'.base_url().'reviews">View Reviews</a>';
		}else
		{
			$show_review=0;
			
			$nmessage='<strong>'.$CI->session->userdata('user_name').'</strong> has been completed the task and sent review.<a href="'.base_url().'view-contract/'.base64_encode($hiredid->hired_id).'">View Contract</a>';
		}
			//--------------PM
		$data_review=array(
			'review_provided_by'=>$CI->session->userdata('user_id'),
			'review_received'=>$contract_id,
			'review_provided'=>$CI->input->post('fldContractReview'),
			'review_provided_on'=>date("Y-m-d H:i:s"),
			'show_review'=>$show_review,
			'review_doc'=>date("Y-m-d H:i:s"),
		    'taskid'=>$task_id,
			'coins'=>$coin
		);
		
		$CI->Reviews->insert_review($data_review);
		
		
		//$sql="SELECT * FROM task_notification WHERE notification_from='".$user_id."' AND notification_to='".$contract_id."' ORDER by notification_doc DESC LIMIT 0,1";	
			
		
		$title="REVIEW";
		$insert = array(
					'task_id' => $task_id,
					'offer_id' => $offer_id,
					'notification_master_id' => $action_id,
					'notification_from' =>$CI->session->userdata('user_id'),
					'notification_to' => $contract_id,
					'notification_details' => $title,
					'notification_message' => $nmessage,
					'coins'=>$coin,
					'notification_doc' => date('Y-m-d H:i:s')
				);
				
		$CI->Notifications->insert_notification('task_notification',$insert);
	
		
	/* 	echo "<pre/>";
		
		print_r($data_review);
		
		
		exit; */
		if($coin==0){
			$CI->db->query("UPDATE user_login SET total_coins=total_coins-2,total_negative_coins=total_negative_coins-2 WHERE user_id='".$contract_id."'");
					
		}
				
		if($coin==-1){
			$CI->db->query("UPDATE user_login SET total_coins=total_coins-1,total_negative_coins=total_negative_coins-1 WHERE user_id='".$contract_id."'");
			
		}
				
		//Good work
				
		if($coin==1){
			$CI->db->query("UPDATE user_login SET total_coins=total_coins+1,total_positive_coins=total_positive_coins+1 WHERE user_id='".$contract_id."'");
			
		}
						
		
		if($coin==2){
			$CI->db->query("UPDATE user_login SET total_coins=total_coins+2,total_positive_coins=total_positive_coins+2 WHERE user_id='".$contract_id."'");
			
		}	
	 
		
		$CI->session->set_flashdata('msg', '<div class="alert alert-success text-center">Review has been sent</div>');
		redirect('notification','refresh');
		
	}
	
	
}