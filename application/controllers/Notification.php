<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller {

	function __construct() {
      	parent::__construct();

		header('Cache-Control: no-cache, must-revalidate, max-age=0');
		header('Cache-Control: post-check=0, pre-check=0',false);
		header('Pragma: no-cache');

		$this->load->library('Lnotification');

        if(!$this->auth->is_logged() && $this->uri->segment(1)!='browse-task') {
        	$this->session->set_flashdata('msg', '<div class="alert alert-info text-center">You haven\'t login to the portal. Please login to proceed further.</div>');
        	redirect('sign-in', 'refresh');
        }		
    }

	public function index()
	{
		$content = $this->lnotification->notification_page($this->session->all_userdata());
		$data = array(
			        'content' => $content,
			        'title' => display('Notification :: Hire-n-Work'),
		        );
		$this->template->full_customer_html_view($data);		
	}
	
	public function take_action(){
		$this->load->library('Lnotification');
		$notification_row_id = base64_decode($this->uri->segment(2));
		$action_id = base64_decode($this->uri->segment(3));
	 	
		if($notification_row_id !=''){
			$this->lnotification->take_action_condition($notification_row_id,$action_id);
		}
	}
	
	
	public function send_notification(){
		$task_id=$this->input->post('task_id');
		$offer_id=$this->input->post('offer_id');
		$notification_master_id=$this->input->post('notification_master_id');
		$notification_from=$this->input->post('notification_from');
		$notification_to=$this->input->post('notification_to');
		$title=$this->input->post('title');
		$task_name=$this->input->post('task_name');
		
		$notification_message=$this->input->post('message');
		
		$this->load->model("Notifications");
		
			$insert = array(
					'task_id' => '4',
					'offer_id' => $offer_id,
					'notification_master_id' => $notification_master_id,
					'notification_from' => $notification_from,
					'notification_to' => $notification_to,
					'notification_details' => $title,
					'notification_message' => '<strong>'.$this->session->userdata('user_name').'</strong> '.$notification_message.' for the project <strong>'.$task_name.'</strong>',
					'notification_doc' => date('Y-m-d H:i:s')
				);
			 
			
			$this->Notifications->insert_notification('task_notification',$insert);
			echo "Message sent";
		
	}
	
	public function send_message(){
	
		
		$from=$this->input->post('user_from');
		$to=$this->input->post('user_to');
		$message=$this->input->post('message');
		
		$data1=array(
			'user_id_from'=>$from,
			'user_id_to'=>$to,
			'message_content'=>$message,
			'date_time' => date('Y-m-d H:i:s'),
			'status' =>	1,
			'deleted' => 0
		
		
		
		);
		
		
		$result = $this->db->insert('user_messages',$data1);
		
		
	}
	
	
	
	public function notification_read(){
		$this->load->model("Notifications");
		$user_id=$this->session->userdata("user_id");
		$notifications=$this->lnotification->notification_details($user_id);
		$notifications_micro_projects=$this->lnotification->notification_details_micro_project($user_id);
		$notification_html="";
		$i=1;
		foreach($notifications as $notif){
			
			$notification_html.="<div class='ios-div'><span><img width='50' src=".$notif['user_image'] ." alt='img'> </span><div class='caption'>".$notif['notification_message']."</div><div class='hours'>".$notif['hours']." Hour Ago</div></div>";
			if($i==3){
				break;
			}
			$i++;
		}
		$i=1;
		foreach($notifications_micro_projects as $notif){
			
			$notification_html.="<div class='ios-div'><span><img width='50' src=".$notif['user_image'] ." alt='img'> </span><div class='caption'>".$notif['notification_message']."</div><div class='hours'>".$notif['hours']." Hour Ago</div></div>";
			if($i==3){
				break;
			}
			$i++;
		}
		//$condition=array("notification_to"=>$user_id);
		if($notification_html==""){
			$notification_html='<div class="ios-div">'.'<a href="javascript:void(0);"> No new notification </a> </div>';
			echo $notification_html;
		}else{
			$notification_html.='<div class="ios-div">'.'<a href="'.base_url().'notification"> View all </a> </div>';
			echo $notification_html;
		}
		

	//	$r=$this->Notifications->notification_update($condition);
		//echo $this->db->last_query();
	}
	
	public function notification_count(){
		$this->load->model("Notifications");
		$user_id=$this->session->userdata("user_id");
		//$notification=$this->Notifications->get_all_user_notification($user_id);
		$query=$this->db->query("SELECT * FROM task_notification WHERE notification_to='".$user_id."'");
		$count=$query->num_rows();
		
		 
		
		$query=$this->db->query("SELECT * FROM notification_track WHERE user_id='".$user_id."'");
		$n=$query->num_rows();
		$no_of_read=0;
 		if($n=="1"){
			$row=$query->row();
			$total_notifications=$row->total_notifications;
			$no_of_read=$count-$total_notifications;
		}else{
			 $no_of_read=$count;  // Notification not read.Display number of unread 
		}
		
		echo $no_of_read; 
		
	}
	
	public function message_notification_count(){
		
		$user_id=$this->session->userdata('user_id');
		$query=$this->db->query("SELECT * FROM user_messages WHERE user_id_to='".$user_id."' AND is_read='N'");
		$n=$query->num_rows();
		echo $n;
		
	}
	
	
	public function notification_check_is_read(){
		$this->load->model("Notifications");
		$user_id=$this->session->userdata("user_id");
		$query=$this->db->query("SELECT * FROM notification_track WHERE user_id='".$user_id."' AND is_read='Y' ");
		if($query->num_rows() > 0){
				 $is_read='Y';
		}else{
			$is_read='N';
		}
		echo $is_read;
		
	}
	public function notification_check_read(){
		$this->load->model("Notifications");
		$user_id=$this->session->userdata("user_id");
		$q_notification=$this->db->query("SELECT * FROM task_notification  WHERE notification_to='".$user_id."'");
		$total_task_notifications=$q_notification->num_rows();
		
		$q=$this->db->query("SELECT * FROM notification_track  WHERE user_id='".$user_id."'");
		 
		if($q->num_rows() == 1){
			$this->db->query("UPDATE notification_track SET is_read='Y',total_notifications=$total_task_notifications WHERE user_id='".$user_id."'");
		}else{
			$arr=array(
				'user_id'=>$this->session->userdata('user_id'),
				'is_read'=>'Y',
				'total_notifications'=>$total_task_notifications
			);
			$this->db->insert("notification_track",$arr);
		}
		echo 1;
	}
	
}
