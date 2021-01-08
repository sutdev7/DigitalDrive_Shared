<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Messages extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	public function add_user_message($data = array(), $userIdTo = ''){
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
			    'message_content' => $data['msg'],
				'attachement' => $attchStr,
				'attachement_content' => NULL,
				'date_time' => date('Y-m-d H:i:s'),
			    'status' =>	1,
			    'deleted' => 0
		    );
		$result = $this->db->insert('user_messages',$data1);
        return array('status' => FALSE, 'message' => 'unable_to_add_record_in_db');
	}

	public function get_message_data_by_id($userIdTo = ''){
		$read_msg = $this->db->where('user_id_to', $this->session->userdata('user_id'))
		->where('user_id_from', $userIdTo)
		->update('user_messages',array('is_read' => 'Y'));

		$sql = "select user_messages.*, SUBSTRING(attachement, POSITION('_' IN attachement)+1) as attachFile, users.name, users.user_id,user_login.profile_image, country.name as country,
				case 
				when user_messages.user_id_from = '".$this->session->userdata('user_id')."' AND attachement  <> '' then 'chat-rht-other-remove'
				when user_messages.user_id_from = '".$this->session->userdata('user_id')."' then 'chat-rht-other'
				else '' end as className
				from user_messages
				join users on users.user_id = user_messages.user_id_to
				join user_login on user_login.user_id = user_messages.user_id_from
				left join country on country.country_id = users.country
				where (user_messages.user_id_from = '".$this->session->userdata('user_id')."' and user_messages.user_id_to = '".$userIdTo."') or (user_messages.user_id_from = '".$userIdTo."' and user_messages.user_id_to = '".$this->session->userdata('user_id')."')";

		$query = $this->db->query($sql);
		//showQuery();die;
		$result = $query->result();
		
		$data = array();
		if(!empty($result)){ $i = 0;
			foreach($result as $single){				
				$data[$i]['id'] = $single->id;
				$data[$i]['user_id_from'] = $single->user_id_from;
				$data[$i]['user_id_to'] = $single->user_id_to;
				$data[$i]['message_content'] = $single->message_content;
				if($single->attachement != ''){
					$path="";
					if(strstr($single->attachement,".jpg")==".jpg" || strstr($single->attachement,".png")==".png")
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
					}
					$data[$i]['attachement'] = $single->attachement;
					$data[$i]['attachFile'] = $single->attachFile;
				}else{
					$data[$i]['attachement'] = '';
                    $data[$i]['attachFile'] = '';
					$data[$i]['download'] = '';
				}
				$data[$i]['attachement_content'] = $single->attachement_content;
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
            $admin_result = $query->result();
//            dd($admin_result);
            $result         = array();
            if ($this->session->userdata('user_type') == 3) { // for client list
                $this->db->select('distinct(task_interested.interested_user_id),users.name,users.user_id,user_login.is_login, CASE WHEN user_login.profile_image is null THEN "assets/img/no-image.png" ELSE CONCAT("uploads/user/profile_image/",user_login.profile_image) END profile_image ', FALSE);

                $this->db->from('task_interested');
                $this->db->join('users', 'users.user_id = task_interested.interested_user_id');
                $this->db->join('user_login', 'user_login.user_id = task_interested.interested_user_id');
                $this->db->where('task_interested.req_send_user_id', $this->session->userdata('user_id'));
            } else if ($this->session->userdata('user_type') == 4) { // for freelancer list
                $this->db->select('distinct(task_interested.req_send_user_id),users.name,users.user_id,user_login.is_login, CASE WHEN user_login.profile_image is null THEN "assets/img/no-image.png" ELSE CONCAT("uploads/user/profile_image/",user_login.profile_image) END profile_image ', FALSE);

                $this->db->from('task_interested');
                $this->db->join('users', 'users.user_id = task_interested.req_send_user_id');
                $this->db->join('user_login', 'user_login.user_id = task_interested.interested_user_id');
                $this->db->join('country', 'country.country_id = users.country', 'left');
                $this->db->where('task_interested.interested_user_id', $this->session->userdata('user_id'));
            }


            //$this->db->where('task_interested.accept_status','A');		
            $this->db->order_by('task_interested.id', 'DESC');
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

}		