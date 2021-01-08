<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notifications extends CI_Model {

	public function __construct(){
		parent::__construct();
        $this->load->model('Users');
	}

    public function get_all_user_notification($userID = null) 
	{
        $notifications = array(); 
        if(empty($userID))
            return $notifications; 		
		$this->db->select('task_notification.*');
		$this->db->from('task_notification');
		$this->db->where('task_notification.notification_to', $userID);
		$this->db->where('task_notification.is_notification_unread',1);		
		$this->db->order_by('task_notification.notification_doc','desc');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			foreach ($query->result() as $row){
				$notifications[] = $row;
			}
		}	
        return $notifications;          
    }
	
	public function get_notification_data($rowId = 0){
		
		if($rowId != 0){
			// seen unseen update
			//$this->db->where('task_notification_id',$rowId)->update('task_notification',array('is_notification_unread' => 0, 'notification_read_date' => date('Y-m-d H:i:s')));
			
			$query = $this->db->select('*')->from('task_notification')->where('task_notification_id',$rowId)->get();
			if($query->num_rows() > 0){
				$result = $query->row();
			}
		}else{
			$result = array();
		}
		return $result;
	}
	
	public function insert_notification($tableName = '',$insert = array()){
		if ($this->db->insert($tableName, $insert)) { 
			return TRUE; 
		}else{
			return FALSE;
		}
	}
	
	public function notification_update($condition){
		$this->db->where($condition)->update('task_notification',array('is_notification_unread' => 0, 'notification_read_date' => date('Y-m-d H:i:s')));
		return TRUE;
	}
	
	
	public function get_notification_master_action_data($task_id='',$notimaster_id = 0){
		$result="";
		$userid=$this->session->userdata('user_id');
		//if($this->session->userdata('user_type')==3)
		//{}
	    if($this->session->userdata('user_type')==4)
		{
			if($notimaster_id==11)
			{
			   $accept = $this->db->where('notification_type_id',14)->where('task_id',$task_id)->where('accept_status','Y')->where('interested_user_id',$userid)->select('id')->from('task_interested')->get();
			   if($accept->num_rows() > 0)
			   {						
			      $result='<a href="#" data-toggle="tooltip" data-placement="top" title="Hire Accepted"><img src="'. base_url().'assets/img/green-arrow.png" width="40px" alt="icon"></a>';
			   }
			   $reject =$this->db->where('task_id',$task_id)->where('freelancer_id',$userid)->where('hired_is_open',0)->where('hired_status',2)->select('*')->from('task_hired')->get();
			   if($reject->num_rows() > 0)
			   {						
			      $result='<a href="#" data-toggle="tooltip" data-placement="top" title="Hire Rejected"><img src="'.base_url().'assets/img/cross-icon.png" width="40px" alt="icon"></a>';
			   }
			}
			else if($notimaster_id==9)
			{
			   $accept = $this->db->where('task_id',$task_id)->where('is_responded',1)->where('receiver_id',$userid)->select('offer_id')->from('offer_task')->get();
			   if($accept->num_rows() > 0)
			   {						
			      $result='<a href="#" data-toggle="tooltip" data-placement="top" title="Offer Accepted"><img src="'. base_url() .'assets/img/green-arrow.png" width="40px" alt="icon"></a>';
			   }
			   $reject = $this->db->where('task_id',$task_id)->where('receiver_id',$userid)->where('is_refused', 1)->select('offer_id')->from('offer_task')->get();
			   if($reject->num_rows() > 0)
			   {						 
			      $result='<a href="#" data-toggle="tooltip" data-placement="top" title="Offer Rejected"><img src="'. base_url() .'assets/img/cross-icon.png" width="40px" alt="icon"></a>';
			   }
			}
				
		}
		 
		/*if($notimaster_id != 0){
			$query = $this->db->select('ACTION_IDS')->from('notification_type')->where('NOTIFICATION_TYPE_ID',$notimaster_id)->get();
			if($query->num_rows() > 0){
				$action_ids = $query->row()->ACTION_IDS;
				if($action_ids != NULL){
					foreach(explode(',',$action_ids) as $ids){
						// get icon
						$iconinfo = $this->db->select('NOTIFICATION_TYPE_ID,VIEW_CODE')->from('notification_type')->where('NOTIFICATION_TYPE_ID',$ids)->get()->row();
						
						$result[] = array('links' => base_url().'take-action/'.$notification_row_id.'/'.base64_encode($iconinfo->NOTIFICATION_TYPE_ID), 'img' =>$iconinfo->VIEW_CODE   );
						
					}
					return $result;
				}else{
					return array();
				}
			}
		}else{
			$result = array(); return $result;
		}*/
		return $result;	
	}
	
	public function get_notification_master_data($row_id = 0){
		$query = $this->db->select('*')->from('notification_type')->where('NOTIFICATION_TYPE_ID',$row_id)->get();
		if($query->num_rows() > 0){
			return $action_ids = $query->row();
		}else{
			return array();
		}
		
	}
	
	public function get_task_info_with_creater($task_id = 0){
		if($task_id != 0){
			$this->db->select('task.task_name,task.task_created_by,users.name');
			$this->db->from('task');
			$this->db->join('users','users.user_id = task.task_created_by');
			$this->db->where('task.task_id',$task_id);
			$query = $this->db->get();
			if($query->num_rows() > 0){
				return $query->row();
			}else{
				return array();
			}
		}
	}
	
	public function hired_action($task_id = 0, $action = ''){
		 
		$date_of_creation = date('Y-m-d H:i:s');
		// get task info
		$this->db->select('*');
		$this->db->from('task');
		$this->db->where('task.task_id',$task_id);
		$task_info = $this->db->get();
		//$task_info = $this->db->where('task.task_id',$task_id)->select('task.*')->from('task')->get();
		 
		if($task_info->num_rows() > 0){
		 
			$info = $task_info->row();
			$task_name = $info->task_name;
			$client_id = $info->task_created_by;
			$task_hired = $info->task_hired;
			 
			//if($task_hired == 1){  // changed on 20th may 2020 a hired task can be reject or cancelled 
			//	return false;
			//}else{
				if($action =='A'){
					$insert = array(
						'req_send_user_id' => $client_id,
						'req_date_time' => $date_of_creation,
						'interested_user_id' => $this->session->userdata('user_id'),
						'request_send' => 'Y',
						'task_id' => $task_id,
						'notification_type_id' => 14,
						'accept_status' => 'Y',
						'delete_status' => 0
					);
					// check already exist or notification_doc
					$check = $this->db->where('notification_type_id',14)->where('task_id',$task_id)->where('interested_user_id',$this->session->userdata('user_id'))->select('id')->from('task_interested')->get();
					
					if($check->num_rows() > 0){
						$this->db->where('notification_type_id',14)->where('task_id',$task_id)->where('interested_user_id',$this->session->userdata('user_id'))->update('task_interested', $insert);
					}else{
						$this->db->insert('task_interested',$insert);
					}
					
					
					// update task table
					$this->db->where('task_id',$task_id)->update('task',array('task_is_ongoing'=> 1 ,'task_hired' => 1));
					$this->db->where('task_id',$task_id)->update('offer_task',array('is_hired'=> 1));
					
					// $this->db->where('task_id',$task_id)->where('freelancer_id',$this->session->userdata('user_id'))->update('task_hired',array('hired_is_open'=> 1, 'hired_status' => 1, 'hire_date'=> $date_of_creation));
					$this->db->where('task_id',$task_id)->where('freelancer_id',$this->session->userdata('user_id'))->update('task_hired',array('hired_is_open'=> 1, 'hired_status' => 1));
					
					
				}else  if($action =='R'){
					// update task table
					
					 $user_id=$this->session->userdata('user_id');
					$this->db->where('task_id',$task_id)->update('task',array('task_is_ongoing'=> 0 ,'task_hired' => 0,'task_is_cancelled'=>1));
				//	$this->db->where('task_id',$task_id)->update('offer_task',array('is_hired'=> 0));
					$this->db->where('task_id',$task_id)->where('freelancer_id',$this->session->userdata('user_id'))->update('task_hired',array('hired_is_open'=> 0, 'hired_status' => 2));
					$this->db->where('task_id',$task_id)->where('receiver_id',$user_id)->update('offer_task',array('is_refused' => 1,'refused_date' => date('Y-m-d H:i:s')));
					
					 
				}else  if($action =='C'){
					// update task table
					
					 
					$this->db->where('task_id',$task_id)->update('task',array('task_is_complete'=>1,'task_completion_date'=>date('Y-m-d H:i:s')));
				//	$this->db->where('task_id',$task_id)->update('offer_task',array('is_hired'=> 0));
				//	$this->db->where('task_id',$task_id)->where('freelancer_id',$this->session->userdata('user_id'))->update('task_hired',array('hired_is_open'=> 0, 'hired_status' => 2));
			//		$this->db->where('task_id',$task_id)->where('receiver_id',$user_id)->update('offer_task',array('is_refused' => 1,'refused_date' => date('Y-m-d H:i:s')));
				}
					return true;
		 //	}
		}else{
			return false;
		}
	}
	
	
	
	public function freelancer_take_action($task_id = 0, $action = ''){
		
		$date_of_creation = date('Y-m-d H:i:s');
		// get task info
		$this->db->select('*');
		$this->db->from('task');
		$this->db->where('task.task_id',$task_id);
		$task_info = $this->db->get();
		//$task_info = $this->db->where('task.task_id',$task_id)->select('task.*')->from('task')->get();

		 
		
		if($task_info->num_rows() > 0){
		 
			$info = $task_info->row();
			$task_name = $info->task_name;
			$client_id = $info->task_created_by;
			$task_hired = $info->task_hired;
			 
			 
				   if($action =='R'){
					// update task table
					
					 
					$this->db->where('task_id',$task_id)->update('task',array('task_is_ongoing'=> 0 ,'task_hired' => 0));
					$this->db->where('task_id',$task_id)->update('offer_task',array('is_hired'=> 0,'offer_is_deleted'=>0));
					$this->db->where('task_id',$task_id)->where('freelancer_id',$this->session->userdata('user_id'))->update('task_hired',array('hired_is_open'=> 0, 'hired_status' => 2));
				}
					return true;
			 
		}else{
			return false;
		}
	}
	
	public function get_task_notification($condition){
		
		$task_notifications = array();   
		$this->db->select('*');
		$this->db->from('task_notification');
		$this->db->where($condition);
		$query=$this->db->get();
		
		 
		if($query->num_rows() > 0){
			foreach ($query->result() as $row){
				$task_notifications[] = $row;
			}
		}
	
        return $task_notifications;   
		
		
	}
	public function get_task_info($taskid)
	{
		$this->db->select('*');

        $this->db->from('task');

        $this->db->where('task_id', $taskid);

        $query = $this->db->get();
		return $query->row();
	}
	

}		