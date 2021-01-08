<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Messages extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	public function add_user_message($data = array(), $userIdTo = '',$code){
        if(empty($data))
        	return array('status' => FALSE, 'message' => 'invalid_data');
		$attchStr = '';
		if(!empty($data['attachement'])){
			foreach($data['attachement'] as $row){
				$attchStr .= $row['fname'].', ';
			}
		}
		$attchStr = rtrim($attchStr, ', ');
		
		if(!empty($data['original_attachement'])){
			foreach($data['original_attachement'] as $row){
				$attchoStr .= $row['fname'].', ';
			}
		}
		$attchoStr = rtrim($attchoStr, ', ');
        $data1 = array(
		    	'user_id_from' => $this->session->userdata('user_id'),
			    'user_id_to' => $userIdTo,
			    'message_content' => $data['msg2'],
				'attachement' => $attchStr,
				'attachment_original_name' => $attchoStr,
				'download_code' => $code,
				'attachement_content' => NULL,
				'date_time' => date('Y-m-d H:i:s'),
			    'status' =>	1,
			    'deleted' => 0
		    );
		$result = $this->db->insert('user_messages',$data1);
        return array('status' => FALSE, 'message' => 'unable_to_add_record_in_db');
	}

	public function get_message_data_by_id($userIdTo = ''){
		// comment by vb not to update messages till user read
		/**$read_msg = $this->db->where('user_id_to', $this->session->userdata('user_id'))
		->where('user_id_from', $userIdTo)
		->update('user_messages',array('is_read' => 'Y'));**/

		$sql = "select user_messages.*, SUBSTRING(attachement, POSITION('_' IN attachement)+1) as attachFile, users.name, users.user_id,user_login.profile_image,user_login.profile_id, country.name as country,
				case 
				when user_messages.user_id_from = '".$this->session->userdata('user_id')."' AND attachement  <> '' then 'chat-rht-other-remove'
				when user_messages.user_id_from = '".$this->session->userdata('user_id')."' then 'chat-rht-other'
				else '' end as className
				from user_messages
				join users on users.user_id = user_messages.user_id_from
				join user_login on user_login.user_id = user_messages.user_id_from
				left join country on country.country_id = users.country
				where (user_messages.user_id_from = '".$this->session->userdata('user_id')."' and user_messages.user_id_to = '".$userIdTo."') or (user_messages.user_id_from = '".$userIdTo."' and user_messages.user_id_to = '".$this->session->userdata('user_id')."') order by user_messages.id";

		$query = $this->db->query($sql);
		//showQuery();die;
		//echo $this->last->query();
		$result = $query->result();
		//echo "<pre>";print_r($result);die;
		$data = array();
		if(!empty($result)){ $i = 0;
			foreach($result as $single){				
				$data[$i]['id'] = $single->id;
				$data[$i]['user_id_from'] = $single->user_id_from;
				$data[$i]['user_id_to'] = $single->user_id_to;
				if($single->deleted == 1)
				$data[$i]['message_content'] = "Message deleted";
				else
				$data[$i]['message_content'] = $single->message_content;
				if($single->attachement != ''){
					$path="";
					/**if(strstr($single->attachement,".jpg")==".jpg" || strstr($single->attachement,".png")==".png")
				    {
						$path='<img src="'.base_url().'uploads/messages/'.$single->attachement.'">';
						$data[$i]['download'] = $path.'<i class="fa fa-arrow-down"></i>';
					}
                    elseif(strstr($single->attachement,".pdf")==".pdf")
                    {
                        $data[$i]['download'] = '<i class="fa fa-file-pdf-o fa-3x"></i>';
                    }
					else{
						$data[$i]['download'] = '<i class="fa fa-arrow-down"></i>';
					}**/          
					              if(!empty($single->attachement)) {
										if(strstr($single->attachement,".jpg")==".jpg" || strstr($single->attachement,".png")==".png")
										{
											$path='<img src="'.base_url().'uploads/messages/'.$single->attachement.'">';
											$data[$i]['download'] = $path.'<i class="fa fa-arrow-down"></i>';
										}
										elseif(strstr($single->attachement,".pdf")==".pdf")
										{
											$pdf_path = base_url().'assets/image/Pdf_File_Type.png';
											$data[$i]['download'] = $single->attachment_original_name." <img src='$pdf_path' alt='' width='50'>";
										}
										elseif(strstr($single->attachement,".doc")==".doc" || strstr($single->attachement,".docx")==".docx" || strstr($single->attachement,".rtf")==".rtf")
										{
											$doc_path = base_url().'assets/image/MicrosoftOffice2007.png';
											$data[$i]['download'] = $single->attachment_original_name." <img src='$doc_path' alt='' width='50'>";
										}
										elseif(strstr($single->attachement,".xls")==".xls" || strstr($single->attachement,".xlsx")==".xlsx")
										{
											$doc_path = base_url().'assets/image/xlss.png';
											$data[$i]['download'] = $single->attachment_original_name." <img src='$doc_path' alt='' width='50'>";
										}
										elseif(strstr($single->attachement,".txt")==".txt")
										{
											$doc_path = base_url().'assets/image/notepad-icon.png';
											$data[$i]['download'] = $single->attachment_original_name." <img src='$doc_path' alt='' width='50'>";
										}
										elseif(strstr($single->attachement,".psd")==".psd")
										{
											$doc_path = base_url().'assets/image/PSD-icon.png';
											$data[$i]['download'] = $single->attachment_original_name." <img src='$doc_path' alt='' width='50'>";
										}
										elseif(strstr($single->attachement,".zip")==".zip" || strstr($single->attachement,".rar")==".rar")
										{
											$doc_path = base_url().'assets/image/ZIP-icon.png';
											$data[$i]['download'] = $single->attachment_original_name." <img src='$doc_path' alt='' width='50'>";
										}
										elseif(strstr($single->attachement,".mp4")==".mp4")
										{
											$doc_path = base_url().'assets/image/MV4-icon.png';
											$data[$i]['download'] = $single->attachment_original_name." <img src='$doc_path' alt='' width='50'>";
										}
										elseif(strstr($single->attachement,".ai")==".ai")
										{
											$doc_path = base_url().'assets/image/AI-icon.png';
											$data[$i]['download'] = $single->attachment_original_name." <img src='$doc_path' alt='' width='50'>";
										}
										else{
											$file_path = base_url().'assets/image/File_Image.png';
											$data[$i]['download'] = $single->attachment_original_name." <img src='$file_path' alt='' width='50'>";
										}
										}
					$data[$i]['attachement'] = $single->attachement;
					$data[$i]['attachFile'] = $single->attachFile;
					$data[$i]['code'] = $single->download_code;
				}else{
					$data[$i]['attachement'] = '';
                    $data[$i]['attachFile'] = '';
					$data[$i]['download'] = '';
					$data[$i]['code'] = 'hide_attach';
				}
				$data[$i]['attachement_content'] = $single->attachement_content;
				$data[$i]['attachment_original_name'] = $single->attachment_original_name;
				if($single->deleted == 1)
				$data[$i]['date_time'] = "";
			    else
				$data[$i]['date_time'] = date('d/m/Y H:i A',strtotime($single->date_time));
				$data[$i]['status'] = $single->status;
				$data[$i]['deleted'] = $single->deleted;
				$data[$i]['name'] = $single->name;
				$data[$i]['user_id'] = $single->user_id;
				$data[$i]['className'] = $single->className;
                if($single->className == 'chat-rht-other' || $single->className == 'chat-rht-other-remove')
                {
                    if($single->is_read == 'Y')
                    {
                        $data[$i]['readicon'] = '<i class="fa fa-check"></i>';
                    }
                    else
                    {
                        $data[$i]['readicon'] = '';
                    }
                }
                else
                {
                    $data[$i]['readicon'] = '';
                }
                $data[$i]['profile_id'] = $single->profile_id;
				if(empty($single->profile_image)) {
	    	     $data[$i]['profileImage'] = base_url('assets/img/no-image.png');
				} else {
				 $data[$i]['profileImage'] = base_url('uploads/user/profile_image/'.$single->profile_image);	    	
				}

				$i++;
				
			}
		}
		
		if(!empty($data)){
			return $data;
		}else{
			return array();
		}
	}

	

	public function get_friend_list($userIdTo = '') {

            /* $this->db->select('task_interested.*,users.*, country.name as country, task.task_name, CASE WHEN user_login.profile_image is null THEN "assets/img/no-image.png" ELSE CONCAT("uploads/user/profile_image/",user_login.profile_image) END profile_image ', FALSE);

              $this->db->from('task_interested');
              $this->db->join('task','task.task_id = task_interested.task_id');


              if($this->session->userdata('user_type') == 3){ // for client list
              $this->db->join('users','users.user_id = task_interested.interested_user_id');
              $this->db->join('user_login','user_login.user_id = task_interested.interested_user_id');
              $this->db->join('country','country.country_id = users.country', 'left');
              $this->db->where('task_interested.req_send_user_id',$this->session->userdata('user_id'));
              }else if($this->session->userdata('user_type') == 4){ // for freelancer list
              $this->db->join('users','users.user_id = task_interested.req_send_user_id');
              $this->db->join('user_login','user_login.user_id = task_interested.interested_user_id');
              $this->db->join('country','country.country_id = users.country', 'left');
              $this->db->where('task_interested.interested_user_id',$this->session->userdata('user_id'));
              } */

            $this->db->select('users.name,users.user_id,user_login.is_login, CASE WHEN user_login.profile_image is null THEN "assets/img/no-image.png" ELSE CONCAT("uploads/user/profile_image/",user_login.profile_image) END profile_image ', FALSE);
            $this->db->from('user_messages');
            $this->db->join('users', 'users.user_id = user_messages.user_id_from', 'LEFT');
            $this->db->join('user_login', 'user_login.user_id = user_messages.user_id_from', 'LEFT');
            $this->db->join('country', 'country.country_id = users.country', 'LEFT');
            $this->db->where('user_messages.user_id_to', $this->session->userdata('user_id'));
            $this->db->group_start();
            $this->db->or_where('user_login.user_type', 1);
            $this->db->or_where('user_login.user_type', 2);
            $this->db->group_end();
            $this->db->group_by('user_login.user_id');
            $query = $this->db->get();
            //$admin_result = $query->result();
//            dd($admin_result);
            $result         = array();
            if ($this->session->userdata('user_type') == 3) { // for client list
                //$this->db->select('distinct(task_interested.interested_user_id),users.name,users.user_id,user_login.is_login, CASE WHEN user_login.profile_image is null THEN "assets/img/no-image.png" ELSE CONCAT("uploads/user/profile_image/",user_login.profile_image) END profile_image ', FALSE);
 
                /**$this->db->from('task_interested');
                $this->db->join('users', 'users.user_id = task_interested.interested_user_id');
                $this->db->join('user_login', 'user_login.user_id = task_interested.interested_user_id');
                $this->db->where('task_interested.req_send_user_id', $this->session->userdata('user_id'));**/
				$this->db->select('users.name,users.user_id,user_login.is_login, CASE WHEN user_login.profile_image is null THEN "assets/img/no-image.png" ELSE CONCAT("uploads/user/profile_image/",user_login.profile_image) END profile_image ', FALSE);
				$this->db->from('user_messages');
            $this->db->join('users', 'users.user_id = user_messages.user_id_from', 'LEFT');
            $this->db->join('user_login', 'user_login.user_id = user_messages.user_id_from', 'LEFT');
            $this->db->join('country', 'country.country_id = users.country', 'LEFT');
            $this->db->where('user_messages.user_id_to', $this->session->userdata('user_id'));
            } else if ($this->session->userdata('user_type') == 4) { // for freelancer list
                //$this->db->select('distinct(task_interested.req_send_user_id),users.name,users.user_id,user_login.is_login, CASE WHEN user_login.profile_image is null THEN "assets/img/no-image.png" ELSE CONCAT("uploads/user/profile_image/",user_login.profile_image) END profile_image ', FALSE);

                /**$this->db->from('task_interested');
                $this->db->join('users', 'users.user_id = task_interested.req_send_user_id');
                $this->db->join('user_login', 'user_login.user_id = task_interested.interested_user_id');
                $this->db->join('country', 'country.country_id = users.country', 'left');
                $this->db->where('task_interested.interested_user_id', $this->session->userdata('user_id'));**/
				$this->db->select('users.name,users.user_id,user_login.is_login, CASE WHEN user_login.profile_image is null THEN "assets/img/no-image.png" ELSE CONCAT("uploads/user/profile_image/",user_login.profile_image) END profile_image ', FALSE);
				$this->db->from('user_messages');
            $this->db->join('users', 'users.user_id = user_messages.user_id_from', 'LEFT');
            $this->db->join('user_login', 'user_login.user_id = user_messages.user_id_from', 'LEFT');
            $this->db->join('country', 'country.country_id = users.country', 'LEFT');
            $this->db->where('user_messages.user_id_to', $this->session->userdata('user_id'));
            }


            //$this->db->where('task_interested.accept_status','A');		
            //$this->db->order_by('task_interested.id', 'DESC');
			 $this->db->group_by('user_login.user_id');
			$this->db->order_by('user_messages.id', 'DESC');
            $query = $this->db->get(); //echo $this->db->last_query(); echo '<pre>'; print_r($query->result_array()); die;
            if ($query->num_rows() > 0) {
                $result = $query->result();
                if(!empty($admin_result)) {
                    foreach ($admin_result as $nRow) {
                        $nRow->interested_user_id = '';
                    }
                    $admin_result = array_merge($admin_result, $result);
                } else {
                    $admin_result = $result;
                }
//                c_pr($result);

            }
//            dd($admin_result);
            $data = array();
            if (!empty($admin_result)) {
                $i = 0;
                foreach ($admin_result as $single) {
                    $loguser = $this->session->userdata('user_id');
                    $sql = "select * FROM user_messages where user_id_from = '" . $single->user_id . "' and user_id_to = '" . $loguser . "' AND is_read='N'";
					$login_session = $this->Users->get_login_details($single->user_id);	
					
                    $query = $this->db->query($sql);
                    $msg = $query->num_rows();
                    $data[$i]['user_id'] = $single->user_id;
                    $data[$i]['name'] = $single->name;
                    $data[$i]['profile_image'] = $single->profile_image;
                    if ($single->is_login == 1) {
                        $log = "ActivePfl";
                    } else {
                        $log = "";
                    }
                    if ($userIdTo == $single->user_id) {
                        $active = "nav-link active show";
                    } else {
                        $active = "nav-link";
                    }
                    if ($this->session->userdata('user_type') == 4) {

                    }
					if($login_session->status == 1)
					{	
					$data[$i]['logout_date'] = "Online";	
					$data[$i]['login_session'] = "1";
					} else {
					$data[$i]['logout_date'] = date("h:i A",strtotime($login_session->logout_date));
                    $data[$i]['login_session'] = "";	
					}
					$data[$i]['active'] = $active;
                    $data[$i]['is_login'] = $log;
                    $data[$i]['totalmessage'] = $msg;
                    $data[$i]['mclass'] = $msg != 0 ? 'hasNewMessages' : 'hasNoNewMessages';
                    $i++;
                }
            }
            return $data;
        }

        function lastSeen($user_id_to) {
            $user_id_from = $this->session->userdata('user_id');
            $this->db->select('date_time');
            $this->db->from('user_messages');
            $this->db->where('user_id_from', $user_id_from);
            $this->db->where('user_id_to', $user_id_to);
            $this->db->order_by('id', 'DESC');
            $this->db->limit(1);
            $query = $this->db->get();
            //showQuery();die;
            if($query->num_rows() > 0) {
                $row = $query->row_array();
                return date("d/m/Y H:i A",strtotime($row['date_time']));
            } else {
                return "";
            }
        }
		
		
		
		/** get message **/
		public function get_message($user_id,$message_id)
		{
		  $this->db->select('id');
          $this->db->from('user_messages');
          $this->db->where('user_id_from', $user_id);
          $this->db->where('id', $message_id);
          $this->db->limit(1);
          $query = $this->db->get();

          if($query->num_rows() > 0) {
		    return "1"; 
		  } else {
			return "0";   
		  }
		}
		
		/** function to update user message **/
		public function update_user_message($data = array(), $userIdTo = '',$message_id){
        if(empty($data))
        	return array('status' => FALSE, 'message' => 'invalid_data');
		$attchStr = '';
		if(!empty($data['attachement'])){
			foreach($data['attachement'] as $row){
				$attchStr .= $row['fname'].', ';
			}
		}
		$attchStr = rtrim($attchStr, ', ');
        $data1 = array(
		    	'user_id_from' => $this->session->userdata('user_id'),
			    'user_id_to' => $userIdTo,
			    'message_content' => $data['msg2'],
				'attachement' => $attchStr,
				'attachement_content' => NULL,
				'date_time' => date('Y-m-d H:i:s'),
			    'status' =>	1,
			    'deleted' => 0
		    );
		$this->db->where('id', $message_id);
		$this->db->update('user_messages',$data1);
        return array('status' => FALSE, 'message' => 'unable_to_add_record_in_db');
	}
	
	
	/** function to type message **/
	public function type_message($user_from_id,$user_to_id)
	{
	  $data	= array(
		    	'user_id_from' => $user_from_id,
			    'user_id_to' => $user_to_id,
		    );
	  $this->db->insert('user_chat_session',$data);		
	}
	
	
	/** function to get_chat_session_message to show typing **/
	public function get_chat_session_message($user_to_id,$user_from_id)
	{
	      $user_to_id." ".$user_from_id;
		  $this->db->select('id');
          $this->db->from('user_chat_session');
          $this->db->where('user_id_from', $user_to_id);
          $this->db->where('user_id_to', $user_from_id);
          $this->db->limit(1);
          $query = $this->db->get();

          if($query->num_rows() > 0) {
		    return "1"; 
		  } else {
			return "0";   
		  }	
	}
	
	
	/** function to delete chat session **/
	public function delete_chat_session($user_from_id,$user_to_id)
	{
	      $CI = & get_instance();
		  $CI->db->query("delete from user_chat_session WHERE user_id_from='" . $user_from_id . "' and user_id_to='" . $user_to_id . "'");
	}
	
	
	
	/** function to check message visibility **/
	public function check_messages_visibility($user_from_id,$user_to_id)
	{
	  $this->db->select('id,is_read,date_time,user_id_from,attachment_download_status');
      $this->db->from('user_messages');
	  $where = "((user_id_from = '$user_to_id' and user_id_to = '$user_from_id') or (user_id_from = '$user_from_id' and user_id_to = '$user_to_id'))";
      //$this->db->where('user_id_from', $user_to_id);
      //$this->db->where('user_id_to', $user_from_id);
	  $this->db->where($where);
	  //$this->db->where('is_read', 'N');
	  //$this->db->order_by('date_time','asc');
      //$this->db->limit(1);	
	  
	  $query = $this->db->get();
	  $results = $query->result();

	  $downloaded = array();
	  foreach($results as $result)
	  {
		 if($result->is_read == "Y" && $result->user_id_from == $user_from_id) {
		 $messages[] = 'chat_message_'.$result->id;
		 $dates[] = date('d/m/Y H:i A',strtotime($result->date_time));
		 }

		 if($result->attachment_download_status == 1 && $result->user_id_from == $user_from_id) {
		 $downloaded[] = 'chat_message_'.$result->id;
		 }	
	  }
	  $data = json_encode(array('status'=>$messages,'dates'=>$dates,'downloaded'=>$downloaded,'count'=>$query->num_rows()));
      //echo $this->db->last_query();
          return $data;
	}
	
	
	public function update_message_seen_status($user_from_id,$user_to_id,$ids)
	{
      $CI = & get_instance();
	  $CI->db->query("update user_messages set is_read = 'Y' WHERE id IN ($ids)");	
	}
	
	
	/** function to check last seen **/
	public function lastSeen_login($user_id_to) {
            $this->db->select('logout_date');
            $this->db->from('user_login_sessions');
            $this->db->where('user_id', $user_id_to);
            $this->db->limit(1);
            $query = $this->db->get();
            if($query->num_rows() > 0) {
                $row = $query->row_array();
                return date("jS M, Y H:i A",strtotime($row['logout_date']));
            } else {
                return "";
            }
        }
		
		
	/** function to update download status **/
		public function updateDownloadStatus($file,$original_file)
		{
			$user_id_to = $this->session->userdata('user_id');
			$this->db->select('id');
            $this->db->from('user_messages');
            $this->db->where('user_id_to', $user_id_to);
			$this->db->where('attachement', $file);
            $this->db->limit(1);
            $query = $this->db->get();
            if($query->num_rows() > 0) {
                $row = $query->row_array();
                $data['attachment_download_status'] = 1;
				$this->db->where('id',$row['id']);
				$this->db->update('user_messages',$data);
            } 
		}
		
		
		
		public function getFileNames($code)
		{
			$this->db->select('attachement,attachment_original_name');
            $this->db->from('user_messages');
            $this->db->where('download_code', $code);
            $this->db->limit(1);
            $query = $this->db->get();
			$files['file'] = "";
			$files['original'] = "";
			if($query->num_rows() > 0) {
                $row = $query->row_array();
                $files['file'] = $row['attachement'];
				$files['original'] = $row['attachment_original_name'];
            } 
			
			return $files;
			
		}
		
		
		
		public function get_friend_list_admin($userIdTo = '') {
            $this->db->select('users.name,users.user_id,user_login.is_login, user_login.profile_id,user_login.user_type, CASE WHEN user_login.profile_image is null THEN "assets/img/no-image.png" ELSE CONCAT("uploads/user/profile_image/",user_login.profile_image) END profile_image ', FALSE);
            $this->db->from('user_messages');
            $this->db->join('users', 'users.user_id = user_messages.user_id_from', 'LEFT');
            $this->db->join('user_login', 'user_login.user_id = user_messages.user_id_from', 'LEFT');
            $this->db->join('country', 'country.country_id = users.country', 'LEFT');
            $this->db->where('user_messages.user_id_to', $this->session->userdata('user_id'));
            //$this->db->group_start();
            //$this->db->or_where('user_login.user_type', 1);
            //$this->db->or_where('user_login.user_type', 2);
            //$this->db->group_end();
            $this->db->group_by('user_login.user_id');
            $query = $this->db->get();
            $admin_result = $query->result();
            
			
           
            
            $data = array();
            if (!empty($admin_result)) {
                $i = 0;
                foreach ($admin_result as $single) {
                    $loguser = $this->session->userdata('user_id');
                    $sql = "select * FROM user_messages where user_id_from = '" . $single->user_id . "' and user_id_to = '" . $loguser . "' AND is_read='N'";
					$login_session = $this->Users->get_login_status($single->user_id);	
                    $query = $this->db->query($sql);
                    $msg = $query->num_rows();
                    $data[$i]['user_id'] = $single->user_id;
                    $data[$i]['name'] = $single->name;
                    $data[$i]['profile_image'] = $single->profile_image;
					$data[$i]['profile_id'] = $single->profile_id;
					$data[$i]['user_type'] = $single->user_type;
                    if ($single->is_login == 1) {
                        $log = "ActivePfl";
                    } else {
                        $log = "";
                    }
                    if ($userIdTo == $single->user_id) {
                        $active = "nav-link active show";
                    } else {
                        $active = "nav-link";
                    }
                    if ($this->session->userdata('user_type') == 4) {

                    }
					$data[$i]['login_session'] = $login_session;
                    $data[$i]['active'] = $active;
                    $data[$i]['is_login'] = $log;
                    $data[$i]['totalmessage'] = $msg;
                    $data[$i]['mclass'] = $msg != 0 ? 'hasNewMessages' : 'hasNoNewMessages';
                    $i++;
                }
            }
			
			//echo "<pre>";print_r($data);echo "</pre>";
            return $data;
        }
			
	
	
	
	public function get_unloaded_message_data_by_id($userIdTo = '',$message_id){
		$sql = "select user_messages.*, SUBSTRING(attachement, POSITION('_' IN attachement)+1) as attachFile, users.name, users.user_id,user_login.profile_image,user_login.profile_id, country.name as country,
				case 
				when user_messages.user_id_from = '".$this->session->userdata('user_id')."' AND attachement  <> '' then 'chat-rht-other-remove'
				when user_messages.user_id_from = '".$this->session->userdata('user_id')."' then 'chat-rht-other'
				else '' end as className
				from user_messages
				join users on users.user_id = user_messages.user_id_from
				join user_login on user_login.user_id = user_messages.user_id_from
				left join country on country.country_id = users.country
				where ((user_messages.user_id_from = '".$this->session->userdata('user_id')."' and user_messages.user_id_to = '".$userIdTo."') or (user_messages.user_id_from = '".$userIdTo."' and user_messages.user_id_to = '".$this->session->userdata('user_id')."')) and user_messages.id > '$message_id' order by user_messages.id";

		$query = $this->db->query($sql);
		//showQuery();die;
		//echo $this->last->query();
		$result = $query->result();
		//echo "<pre>";print_r($result);die;
		$data = array();
		if(!empty($result)){ $i = 0;
			foreach($result as $single){				
				$data[$i]['id'] = $single->id;
				$data[$i]['user_id_from'] = $single->user_id_from;
				$data[$i]['user_id_to'] = $single->user_id_to;
				if($single->deleted == 1)
				$data[$i]['message_content'] = "Message deleted";
				else
				$data[$i]['message_content'] = $single->message_content;
				if($single->attachement != ''){
					$path="";
					/**if(strstr($single->attachement,".jpg")==".jpg" || strstr($single->attachement,".png")==".png")
				    {
						$path='<img src="'.base_url().'uploads/messages/'.$single->attachement.'">';
						$data[$i]['download'] = $path.'<i class="fa fa-arrow-down"></i>';
					}
                    elseif(strstr($single->attachement,".pdf")==".pdf")
                    {
                        $data[$i]['download'] = '<i class="fa fa-file-pdf-o fa-3x"></i>';
                    }
					else{
						$data[$i]['download'] = '<i class="fa fa-arrow-down"></i>';
					}**/          
					              if(!empty($single->attachement)) {
										if(strstr($single->attachement,".jpg")==".jpg" || strstr($single->attachement,".png")==".png")
										{
											$path='<img src="'.base_url().'uploads/messages/'.$single->attachement.'">';
											$data[$i]['download'] = $path.'<i class="fa fa-arrow-down"></i>';
										}
										elseif(strstr($single->attachement,".pdf")==".pdf")
										{
											$pdf_path = base_url().'assets/image/Pdf_File_Type.png';
											$data[$i]['download'] = $single->attachment_original_name." <img src='$pdf_path' alt='' width='50'>";
										}
										elseif(strstr($single->attachement,".doc")==".doc" || strstr($single->attachement,".docx")==".docx" || strstr($single->attachement,".rtf")==".rtf")
										{
											$doc_path = base_url().'assets/image/MicrosoftOffice2007.png';
											$data[$i]['download'] = $single->attachment_original_name." <img src='$doc_path' alt='' width='50'>";
										}
										elseif(strstr($single->attachement,".xls")==".xls" || strstr($single->attachement,".xlsx")==".xlsx")
										{
											$doc_path = base_url().'assets/image/xlss.png';
											$data[$i]['download'] = $single->attachment_original_name." <img src='$doc_path' alt='' width='50'>";
										}
										elseif(strstr($single->attachement,".txt")==".txt")
										{
											$doc_path = base_url().'assets/image/notepad-icon.png';
											$data[$i]['download'] = $single->attachment_original_name." <img src='$doc_path' alt='' width='50'>";
										}
										elseif(strstr($single->attachement,".psd")==".psd")
										{
											$doc_path = base_url().'assets/image/PSD-icon.png';
											$data[$i]['download'] = $single->attachment_original_name." <img src='$doc_path' alt='' width='50'>";
										}
										elseif(strstr($single->attachement,".zip")==".zip" || strstr($single->attachement,".rar")==".rar")
										{
											$doc_path = base_url().'assets/image/ZIP-icon.png';
											$data[$i]['download'] = $single->attachment_original_name." <img src='$doc_path' alt='' width='50'>";
										}
										elseif(strstr($single->attachement,".mp4")==".mp4")
										{
											$doc_path = base_url().'assets/image/MV4-icon.png';
											$data[$i]['download'] = $single->attachment_original_name." <img src='$doc_path' alt='' width='50'>";
										}
										elseif(strstr($single->attachement,".ai")==".ai")
										{
											$doc_path = base_url().'assets/image/AI-icon.png';
											$data[$i]['download'] = $single->attachment_original_name." <img src='$doc_path' alt='' width='50'>";
										}
										else{
											$file_path = base_url().'assets/image/File_Image.png';
											$data[$i]['download'] = $single->attachment_original_name." <img src='$file_path' alt='' width='50'>";
										}
										}
					$data[$i]['attachement'] = $single->attachement;
					$data[$i]['attachFile'] = $single->attachFile;
					$data[$i]['code'] = $single->download_code;
				}else{
					$data[$i]['attachement'] = '';
                    $data[$i]['attachFile'] = '';
					$data[$i]['download'] = '';
				}
				$data[$i]['attachement_content'] = $single->attachement_content;
				$data[$i]['attachment_original_name'] = $single->attachment_original_name;
				if($single->deleted == 1)
				$data[$i]['date_time'] = "";
			    else
				$data[$i]['date_time'] = date('d/m/Y H:i A',strtotime($single->date_time));
				$data[$i]['status'] = $single->status;
				$data[$i]['deleted'] = $single->deleted;
				$data[$i]['name'] = $single->name;
				$data[$i]['user_id'] = $single->user_id;
				$data[$i]['className'] = $single->className;
                if($single->className == 'chat-rht-other' || $single->className == 'chat-rht-other-remove')
                {
                    if($single->is_read == 'Y')
                    {
                        $data[$i]['readicon'] = '<i class="fa fa-check"></i>';
                    }
                    else
                    {
                        $data[$i]['readicon'] = '';
                    }
                }
                else
                {
                    $data[$i]['readicon'] = '';
                }
                $data[$i]['profile_id'] = $single->profile_id;
				if(empty($single->profile_image)) {
	    	     $data[$i]['profileImage'] = base_url('assets/img/no-image.png');
				} else {
				 $data[$i]['profileImage'] = base_url('uploads/user/profile_image/'.$single->profile_image);	    	
				}

				$i++;
				
			}
		}
		
		if(!empty($data)){
			return $data;
		}else{
			return array();
		}
	}
	
	
	
	

}		