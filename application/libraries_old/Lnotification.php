<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lnotification {

	public function notification_page($userInfo = null){
		$CI =& get_instance();
        $CI->load->model("Notifications");
        $CI->load->model("Users");

		$data = $arrNotifications = array();

        $notification = $CI->Notifications->get_all_user_notification($userInfo['user_id']);  
        //print_r($notification);
        foreach($notification as $notification) {
            $userInfo = $CI->Users->get_user_info_by_id($notification->notification_from);
            $userData = $CI->Users->get_user_profile_info_by_id($notification->notification_from);

            $user_profile_image = $userInfo->profile_image;
            if(empty($user_profile_image)) {
                $user_profile_image = base_url('assets/img/no-image.png');
            }
            else {
                $user_profile_image = base_url('uploads/user/profile_image/'.$user_profile_image);          
            }

            if(empty($userInfo->is_login) || $userInfo->is_login === 0) {
                $user_is_login = '<em> </em>';
            }
            else {
                $user_is_login = '<small> </small>';            
            } 

            $datetime1 = strtotime($notification->notification_doc);
            $datetime2 = strtotime(date("Y-m-d H:i:s"));
            $interval  = abs($datetime2 - $datetime1);

            // To get the year divide the resultant date into 
            // total seconds in a year (365*60*60*24) 
            $years = floor($interval / (365*60*60*24)); 

            // To get the month, subtract it with years and 
            // divide the resultant date into 
            // total seconds in a month (30*60*60*24) 
            $months = floor(($interval - $years * 365*60*60*24) / (30*60*60*24));    

            // To get the day, subtract it with years and  
            // months and divide the resultant date into 
            // total seconds in a days (60*60*24) 
            $days = floor(($interval - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

            // To get the hour, subtract it with years,  
            // months & seconds and divide the resultant 
            // date into total seconds in a hours (60*60) 
            $hours = floor(($interval - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60)); 

            // To get the minutes, subtract it with years, 
            // months, seconds and hours and divide the  
            // resultant date into total seconds i.e. 60 
            $minutes = floor(($interval - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60);

            // To get the minutes, subtract it with years, 
            // months, seconds, hours and minutes  
            $seconds = floor(($interval - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minutes*60));     

            // Print the result 
            //printf("%d years, %d months, %d days, %d hours, %d minutes, %d seconds", $years, $months, $days, $hours, $minutes, $seconds);

			// get action types
			
			
			$action_type = $CI->Notifications->get_notification_master_action_data($notification->task_id,$notification->notification_master_id);
		 
			
            $arrNotifications[] = array('task_notification_id' => base64_encode($notification->task_notification_id), 'notification_details' => $notification->notification_details, 'notification_message' => $notification->notification_message, 'hours' => $hours, 'notification_send_by' => $userData['basic_info']->name, 'user_image' => $user_profile_image, 'task_id' => $notification->task_id, 'notification_master_id' =>$notification->notification_master_id, 'action_type' => $action_type );                        
        }
		
		//echo '<pre>'; print_r($arrNotifications); die;
		
					//Read notification 
		$user_id=$CI->session->userdata("user_id");
		$q_notification=$CI->db->query("SELECT * FROM task_notification  WHERE notification_to='".$user_id."'");
		$total_task_notifications=$q_notification->num_rows();
		
		$q=$CI->db->query("SELECT * FROM notification_track  WHERE user_id='".$user_id."'");
		 
		if($q->num_rows() == 1){
			$CI->db->query("UPDATE notification_track SET is_read='Y',total_notifications=$total_task_notifications WHERE user_id='".$user_id."'");
		}else{
			$arr=array(
				'user_id'=>$CI->session->userdata('user_id'),
				'is_read'=>'Y',
				'total_notifications'=>$total_task_notifications
			);
			$CI->db->insert("notification_track",$arr);
		}

		$data['notifications'] = $arrNotifications;	               

		$AccountForm = $CI->parser->parse('notification/show',$data,true);
		return $AccountForm;
	}
	
	
	public function notification_details($userInfo = null){
		$CI =& get_instance();
        $CI->load->model("Notifications");
        $CI->load->model("Users");

		$data = $arrNotifications = array();

        $notification = $CI->Notifications->get_all_user_notification($userInfo);  
        //print_r($notification);
        foreach($notification as $notification) {
            $userInfo = $CI->Users->get_user_info_by_id($notification->notification_from);
            $userData = $CI->Users->get_user_profile_info_by_id($notification->notification_from);

            $user_profile_image = $userInfo->profile_image;
            if(empty($user_profile_image)) {
                $user_profile_image = base_url('assets/img/no-image.png');
            }
            else {
                $user_profile_image = base_url('uploads/user/profile_image/'.$user_profile_image);          
            }

            if(empty($userInfo->is_login) || $userInfo->is_login === 0) {
                $user_is_login = '<em> </em>';
            }
            else {
                $user_is_login = '<small> </small>';            
            } 

            $datetime1 = strtotime($notification->notification_doc);
            $datetime2 = strtotime(date("Y-m-d H:i:s"));
            $interval  = abs($datetime2 - $datetime1);

            // To get the year divide the resultant date into 
            // total seconds in a year (365*60*60*24) 
            $years = floor($interval / (365*60*60*24)); 

            // To get the month, subtract it with years and 
            // divide the resultant date into 
            // total seconds in a month (30*60*60*24) 
            $months = floor(($interval - $years * 365*60*60*24) / (30*60*60*24));    

            // To get the day, subtract it with years and  
            // months and divide the resultant date into 
            // total seconds in a days (60*60*24) 
            $days = floor(($interval - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

            // To get the hour, subtract it with years,  
            // months & seconds and divide the resultant 
            // date into total seconds in a hours (60*60) 
            $hours = floor(($interval - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60)); 

            // To get the minutes, subtract it with years, 
            // months, seconds and hours and divide the  
            // resultant date into total seconds i.e. 60 
            $minutes = floor(($interval - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60);

            // To get the minutes, subtract it with years, 
            // months, seconds, hours and minutes  
            $seconds = floor(($interval - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minutes*60));     

            // Print the result 
            //printf("%d years, %d months, %d days, %d hours, %d minutes, %d seconds", $years, $months, $days, $hours, $minutes, $seconds);

			// get action types
			
			
			$action_type = $CI->Notifications->get_notification_master_action_data(base64_encode($notification->task_notification_id),$notification->notification_master_id);
			
            $arrNotifications[] = array('task_notification_id' => base64_encode($notification->task_notification_id), 'notification_details' => $notification->notification_details, 'notification_message' => $notification->notification_message, 'hours' => $hours, 'notification_send_by' => $userData['basic_info']->name, 'user_image' => $user_profile_image, 'task_id' => $notification->task_id, 'notification_master_id' =>$notification->notification_master_id, 'action_type' => $action_type );                        
        }
		
		//echo '<pre>'; print_r($arrNotifications); die;
		

		//$data['notifications'] = $arrNotifications;	               

		 
		return $arrNotifications;
	}

	
	

	public function take_action_condition($notirow_id = 0, $action_id = 0){
		 
		$CI =& get_instance();
        $CI->load->model("Notifications");
		$CI->load->model("Tasks");
		$CI->load->model("Reviews");
	 
		if($notirow_id != 0){
			// get notification type
			
			$notification_info = $CI->Notifications->get_notification_data($notirow_id);
			
			
		  //	echo '<pre>'; print_r($notification_info); echo $CI->session->userdata('user_id'); echo $notirow_id; echo $action_id;  die;
			if(!empty($notification_info)){
				$noti_type = $notification_info->notification_master_id;
				$task_id = $notification_info->task_id;
				$offer_id = $notification_info->offer_id;
				$notification_from = $notification_info->notification_from;
				$notification_to = $notification_info->notification_to;
				$createrinfo = $CI->Notifications->get_task_info_with_creater($task_id);
				if(!empty($createrinfo)){
					$task_name = $createrinfo->task_name;
					$creater_name = $createrinfo->name;
				}else{
					$task_name = '';
					$creater_name = '';
				}
				
				
			}
			$task_info = $CI->Notifications->get_task_info($task_id);
			$task_details_link = '<a href="'.base_url().'task-details/'.$task_info->user_task_id.'">'.$task_name.'</a>';
			
			$masterInfo = $CI->Notifications->get_notification_master_data($action_id);
			if(!empty($masterInfo)){
				$title = $masterInfo->TITLE;
				$message = $masterInfo->MESSAGE;
			}
			
			if($action_id == 12){
				// Freelancer accepts client's offer
				// master info
				$return = $CI->Tasks->accept_offer($task_id,$CI->session->userdata('user_id'),'A');
				
				if($return){
					$CI->session->set_flashdata('msg', '<div class="alert alert-success text-center">Offer Accepted</div>');
				}else{
					$CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Something Error. Please try again.</div>');					
				}
				$insert = array(
					'task_id' => $task_id,
					'offer_id' => $offer_id,
					'notification_master_id' => $action_id,
					'notification_from' => $notification_to,
					'notification_to' => $notification_from,
					'notification_details' => $title,
					'notification_message' => $message.' <strong>'.$CI->session->userdata('user_name').'</strong> for the project <strong>'.$task_details_link.'</strong>',
					'notification_doc' => date('Y-m-d H:i:s')
				);
			}else if($action_id == 13){
				// Freelancer rejects client's offer
				$return = $CI->Tasks->accept_offer($task_id,$CI->session->userdata('user_id'),'R');
				if($return){
					$CI->session->set_flashdata('msg', '<div class="alert alert-success text-center">Offer Rejected</div>');
				}else{
					$CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Something Error. Please try again.</div>');
				}
					
				$insert = array(
					'task_id' => $task_id,
					'offer_id' => $offer_id,
					'notification_master_id' => $action_id,
					'notification_from' => $notification_to,
					'notification_to' => $notification_from,
					'notification_details' => $title,
					'notification_message' => $message.' <strong>'.$CI->session->userdata('user_name').'</strong> for the project <strong>'.$task_details_link.'</strong>',
					'notification_doc' => date('Y-m-d H:i:s')
				);
				
			}else if($action_id == 14){
				// Freelancer accepts task hire
				$return = $CI->Notifications->hired_action($task_id,'A');
				if($return){
					$CI->session->set_flashdata('msg', '<div class="alert alert-success text-center">Hire Accepted</div>');
				}else{
					$CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Something Error. Please try again or Already hired.</div>');
				}
					
				$insert = array(
					'task_id' => $task_id,
					'offer_id' => $offer_id,
					'notification_master_id' => $action_id,
					'notification_from' => $notification_to,
					'notification_to' => $notification_from,
					'notification_details' => $title,
					'notification_message' => $message.' <strong>'.$CI->session->userdata('user_name').'</strong> '.' for the project <strong>'.$task_details_link.'</strong>',
					'notification_doc' => date('Y-m-d H:i:s')
				);
				
			}else if($action_id == 15){
				// Freelancer cancelled to take that task
				
		  	$return = $CI->Notifications->hired_action($task_id,'R');
			
				$insert = array(
					'task_id' => $task_id,
					'offer_id' => $offer_id,
					'notification_master_id' => $action_id,
					'notification_from' => $notification_to,
					'notification_to' => $notification_from,
					'notification_details' => $title,
					'notification_message' => '<strong>'.$CI->session->userdata('user_name').'</strong> '.$message.' for the project <strong>'.$task_details_link.'</strong>',
					'notification_doc' => date('Y-m-d H:i:s')
				);
				 
			
				$CI->Notifications->insert_notification('task_notification',$insert);
				if($return){
					$CI->session->set_flashdata('msg', '<div class="alert alert-success text-center">Hire Rejected</div>');
				}else{
					$CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Something Error. Please try again.</div>');
				}
				//$msg = $CI->session->flashdata('msg'); 
				
				redirect('notification','refresh');
				exit;
			}else if($action_id == 17){  // task completed approved
				// 
				
				 
				$coin=$notification_info->coins;
				$review=$notification_info->review;
				$notification_to=$notification_info->notification_to; // 
				$notification_from=$notification_info->notification_from; // 
				$m_revew=$notification_info->review;
				$user_id=$CI->session->userdata('user_id');
				
				/*
				//Bad work
				if($coin==0){
					$CI->db->query("UPDATE user_login SET total_coins=total_coins-2 WHERE user_id='".$user_id."'");
					
				}
				
				if($coin==-1){
					$CI->db->query("UPDATE user_login SET total_coins=total_coins-1,total_negative_coins=total_negative_coins-1 WHERE user_id='".$user_id."'");
					
				}
				
				//Good work
				
				if($coin==1){
					$CI->db->query("UPDATE user_login SET total_coins=total_coins+1,total_positive_coins=total_positive_coins+1 WHERE user_id='".$user_id."'");
					
				}
				
				
				
				if($coin==2){
					$CI->db->query("UPDATE user_login SET total_coins=total_coins+2,total_positive_coins=total_positive_coins+2 WHERE user_id='".$user_id."'");
					
				}
				 */
				
				$current_dttm = date('Y-m-d H:i:s');
				$updateData = array(
					'hire_is_completed' => 1,
					'hire_final_status' => 'CC',
					'hire_coin_to_freelancer' => $coin,
					'hired_is_open' => 1,
					'hire_client_review' => $review,
					'hired_dom' => $current_dttm
				);
				
				
			   $return=$CI->db->where('task_id',$task_id)->update('task_hired',$updateData);
				//$return = $CI->Notifications->hired_action($task_id,'C');
				//$this->db->where('task_id',$task_id)->update('task',array('task_is_complete'=>1,'task_completion_date'=>date('Y-m-d H:i:s')));
				$CI->db->where('task_id',$task_id)->update('task',array('task_status'=>'1','task_hired'=>'1','task_is_complete'=>'1','task_completion_date'=>date('Y-m-d H:i:s')));
				if($return){
					$CI->session->set_flashdata('msg', '<div class="alert alert-success text-center">Task Completed</div>');
				}else{
					$CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Something Error. Please try again.</div>');
				}
				$insert = array(
					'task_id' => $task_id,
					'offer_id' => $offer_id,
					'notification_master_id' => $action_id,
					'notification_from' => $notification_to,
					'notification_to' => $notification_from,
					'notification_details' => $title,
					'notification_message' => '<strong>'.$CI->session->userdata('user_name').'</strong> '.$message.' for the project <strong>'.$task_details_link.'</strong>',
					'notification_doc' => date('Y-m-d H:i:s')
				);
				
				 $CI->Notifications->insert_notification('task_notification',$insert);
				 
				/* $data_review=array(
					'review_provided_by'=>$notification_to,
					'review_received'=>$CI->session->userdata('user_id'),
					'review_provided'=>$m_revew,
					'review_provided_on'=>date("Y-m-d H:i:s"),
					'review_doc'=>date("Y-m-d H:i:s")
		
			);
		
			$CI->Reviews->insert_review($data_review);*/
				 
				 
				 // Redirect to Review page
				 redirect('givereview/'.$notification_from,'refresh');
				 exit;
				 
			}else if($action_id==19){
				
				
				$insert = array(
					'task_id' => $task_id,
					'offer_id' => $offer_id,
					'notification_master_id' => $action_id,
					'notification_from' => $notification_to,
					'notification_to' => $notification_from,
					'notification_details' => $title,
					'notification_message' => '<strong>'.$CI->session->userdata('user_name').'</strong> '.$message.' for the project <strong>'.$task_name.'</strong>',
					'notification_doc' => date('Y-m-d H:i:s')
				);
				 
				$CI->session->set_flashdata('msg', '<div class="alert alert-success text-center">Review Rejected</div>');
				$CI->Notifications->insert_notification('task_notification',$insert);
				redirect('notification','refresh');
				exit;
				
			}
			
			$CI->Notifications->insert_notification('task_notification',$insert);
			
			redirect('notification','refresh');
		}else{
			
		}
		
		
	}
}
