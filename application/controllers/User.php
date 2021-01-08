<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {
	function __construct() {
      	parent::__construct();
		header('Cache-Control: no-cache, must-revalidate, max-age=0');
		header('Cache-Control: post-check=0, pre-check=0',false);
		header('Pragma: no-cache');
		$this->load->library('Luser');
		$this->load->helper('captcha');
		$this->load->model('Messages');
		$this->load->model('Users');

        if(!$this->auth->is_logged()) {
        	$this->session->set_flashdata('msg', '<div class="alert alert-info text-center">You haven\'t login to the portal. Please login to proceed further.</div>');
        	redirect('sign-in', 'refresh');
        }	
		
    }
function hashpassword($password) {
        return md5("ctgs".$password);
    }
	public function index(){		
		if($this->session->userdata('user_type') == 1){
			redirect('admin/dashboard','refresh');
		}else if($this->session->userdata('user_type') == 3){
			// $content = $this->luser->dashboard_page();
			// $data = array(
			// 	'content' => $content,
			// 	'title' => display('Dashboard :: Hire-n-Work'),
			// );
			// $this->template->full_customer_html_view($data);	

			redirect('client-dashboard/'.$this->session->userdata('username'),'refresh');

		}elseif($this->session->userdata('user_type') == 4){
			redirect('freelancer-dashboard/'.$this->session->userdata('username'),'refresh');
		}elseif($this->session->userdata('user_type') == 5){
			redirect('nlancer-dashboard/'.$this->session->userdata('username'),'refresh');
		}
	}

	public function upcoming_projects($pageIndex = 0){
		$content = $this->luser->upcoming_projects_page();
		$data = array(
			'content' => $content,
			'title' => display('Upcoming Projects :: Hire-n-Work'),
		);
		$this->template->full_customer_html_view($data);
	}
	public function hired($pageIndex = 0){
		$content = $this->luser->hired();
		$data = array(
			'content' => $content,
			'title' => display('Hired :: Hire-n-Work'),
		);
		$this->template->full_customer_html_view($data);
	}
	public function search_freelancer(){
        $content = $this->luser->search_freelancer_page();
		$data = array(
		    'content' => $content,
		    'title' => display('Search Freelancer :: Hire-n-Work'),
		);
		$this->template->full_customer_html_view($data);
	}		
	public function client_bio(){
		$content = $this->luser->client_bio_page();
		$data = array(
			'content' => $content,
			'title' => display('Client Bio :: Hire-n-Work'),
		);
		$this->template->full_customer_html_view($data);		
	}
	public function editprofile(){
		$content = $this->luser->edit_profile_page();
		$data = array(
			'content' => $content,
			'title' => display('Edit Profile :: Hire-n-Work'),
		);
		$this->template->full_customer_html_view($data);		
	}


	public function portfolio(){
		$content = $this->luser->client_portfolio_page();
		$data = array(
			'content' => $content,
			'title' => display('Portfolio :: Hire-n-Work'),
		);
		$this->template->full_customer_html_view($data);		
	}
	public function gender(){
		
        $this->form_validation->set_rules('fldUserGender','Gender', 'required');
        if($this->form_validation->run() == false){        
		    $content = $this->luser->gender_page();
		    $data = array(
			    'content' => $content,
			    'title' => display('Gender :: Hire-n-Work'),
		    );
		}else{
		    $this->luser->updateUserData($this->session->all_userdata());
		    $content = $this->luser->gender_page();
		    $data = array(
			    'content' => $content,
			    'title' => display('Gender :: Hire-n-Work'),
		    );
	    }
		$this->template->full_customer_html_view($data);
	}
	public function payment_details(){
        $this->form_validation->set_rules('fldCreditCardNo','Card No', 'trim|required|numeric|min_length[13]|max_length[16]');
        $this->form_validation->set_rules('fldCardExpiryMonth','Expiry Month', 'required');
        $this->form_validation->set_rules('fldCardExpiryYear','Expiry Year', 'required');
        $this->form_validation->set_rules('fldCreditCardCvv','CVV No', 'trim|required|numeric|min_length[3]|max_length[4]');                        
        if($this->form_validation->run() == false){        
		    $content = $this->luser->payment_details_page();
		    $data = array(
			    'content' => $content,
			    'title' => display('Payment Details :: Hire-n-Work'),
		    );
		}else{
		    $this->luser->updateUserCardData($this->session->all_userdata());
		    $content = $this->luser->payment_details_page();
		    $data = array(
			    'content' => $content,
			    'title' => display('Payment Details :: Hire-n-Work'),
		    );
	    }
		$this->template->full_customer_html_view($data);
	}
	public function public_profile(){	
        $content = $this->luser->public_profile_page();
		$data = array(
		   'content' => $content,
		    'title' => display('Public Profile :: Hire-n-Work'),
		);	          
		$this->template->full_customer_html_view($data);
	}	
	
	
	public function settings(){
        $this->form_validation->set_rules('fldCurrentPassword','Current Password', 'trim|required');
        $this->form_validation->set_rules('fldNewPassword','New Password', 'trim|required');
        $this->form_validation->set_rules('fldConfirmPassword','Expiry Year', 'trim|required|matches[fldNewPassword]');                       
        if($this->form_validation->run() == false){        
		    $content = $this->luser->settings_page();
		    $data = array(
			    'content' => $content,
			    'title' => display('User Profile Settings :: Hire-n-Work'),
		    );	
		}
		$this->template->full_customer_html_view($data);	    			
	}
    public function change_password() {
		$user_data=$this->session->all_userdata(); 
		$user_id=$user_data['user_id'];
		
		$old_password=$this->input->post('fldCurrentPassword'); 
		$old_pass_id=  $password = md5("ctgs".$old_password);
		
		$new_password=$this->input->post('fldNewPassword');
	   $new_pass_id=$this->hashpassword($new_password);
	   
		$query_get_old_pass = $this->db->query("SELECT password FROM user_login WHERE user_id='$user_id'");
			$result=$query_get_old_pass->result() ;
		  $passwd=$result[0]->password;
			//print_r($result);
		 $array_pass=array(
		'password'=>$new_pass_id
		); 
		//$array_pass_xss = $this->security->xss_clean($array_pass);
		if($passwd!=$old_pass_id){
			echo 'wrong';
			//return false;
		}
		else{
			
			 $this->db->where('user_id', $user_id);

		$this->db->update('user_login', $array_pass); 
		echo 'true';
		//return true;
		}
		
		/*$this->luser->updateUserPassword($this->session->all_userdata());
		$content = $this->luser->settings_page();
		echo '<pre>';
		print_r($content);
		echo '</pre>';
		$data = array(
		    'content' => $content,
		    'title' => display('User Profile Settings :: Hire-n-Work'),
		);	
		$this->template->full_customer_html_view($data);*/			
    }

	public function messages(){
		if($this->uri->segment(2) !=''){
			$user_id_to = $this->uri->segment(2);
		}else{
			$user_id_to = '';
		}
		$content = $this->luser->messages($user_id_to);
		
		$data = array(
			'content' => $content,
			'title' => display('Messages :: Hire-n-Work'),
		);
		$this->template->full_website_message_view($data);
	}

	public function get_messages($user_id_to) {
        $content = $this->luser->get_messages($user_id_to);
        $data = array(
            'content' => $content
        );
        $this->load->view('user/messages_ajax', $data);
    }

    public function get_frndlist($user_id_to) {
        $content = $this->luser->get_messages($user_id_to);
        $data = array(
            'content' => $content
        );
        $this->load->view('user/friendList_ajax', $data);
    }

	public function last_seen($user_id_to) {
        $this->load->model('Messages');
        $this->load->model('Users');
        $otherUserData = $this->Users->get_user_profile_info_by_id($user_id_to);
        $otherUserLogin = $otherUserData['basic_info']->is_login;
        //$lastSeen = $this->Messages->lastSeen($user_id_to);
		$login_status = $this->Users->get_login_status($user_id_to);
		$lastSeen = $this->Messages->lastSeen_login($user_id_to);
        //echo ($otherUserLogin == 1) ? 'Online' : $lastSeen;
		echo ($login_status == 'l') ? 'Online' : $lastSeen;
    }

	public function saveMsgData() {
		$CI =& get_instance();
		$message_id = $CI->input->post('message_id');
		$this->Messages->delete_chat_session($CI->session->userdata('user_id'),$CI->input->post('user_to'));
		if($message_id > 0)
		 return $this->luser->updateMsgUserData($message_id);
        else	
		 return $this->luser->addMsgUserData();
	}

	public function saveUserData() {
		return $this->luser->updateUserData($this->session->all_userdata());
	}	
	public function saveUserProfile() {
		return $this->luser->updateUserProfile($this->session->all_userdata());
	}

	public function activeUserProfile() {
		return $this->luser->activeUserProfile($this->session->all_userdata());
	}

	public function savePortfolioData() {
		return $this->luser->insertPortfolioData($this->session->all_userdata());
	}
	
	public function saveProfile_title() {
		return $this->luser->UpdateProfile_title($this->session->all_userdata());
	}

	public function removeUserSkillData() {
		return $this->luser->removeUserSkillData();
	}

	public function save_validate_mobile_no() {
		echo $this->luser->save_validate_mobile_no($this->session->all_userdata());
	}	

	public function save_transactional_notification() {
		echo $this->luser->save_transactional_notification($this->session->all_userdata());
	}

	public function save_task_update_notification() {
		echo $this->luser->save_task_update_notification($this->session->all_userdata());
	}			

	public function save_task_reminder_notification() {
		echo $this->luser->save_task_reminder_notification($this->session->all_userdata());
	}

	public function save_helpful_notification() {
		echo $this->luser->save_helpful_notification($this->session->all_userdata());
	}

	public function uploadUserProfileImage() {
        echo $this->luser->save_user_profile_image($this->session->all_userdata());
	}

    public function ajax_search_freelancer() {
    	echo $this->luser->ajax_search_freelancer();
    }  
	//modified on 21-10-2020
	public function ajax_search_top_freelancer() {
    	echo $this->luser->ajax_search_top_freelancer();
    } 
	public function addSkill(){

		 $response = "";
		 $data = array(
            'name' => $this->input->post('title'),
			'status'=>1,
			'deleted'=>0,
			'doc'=>date('Y-m-d H:i:s')
         );

        $result = $this->db->insert('area_of_interest',$data);  

        $insert_id = $this->db->insert_id();

		$response = array('lastinsertid'=>$insert_id,'title'=>$this->input->post('title'));	
		echo json_encode($response);
		exit;
		
	}
    public function analytics()
	{
		$content = $this->luser->analytics();
		$data = array(
			'content' => $content,
			'title' => display('Analytics :: Hire-n-Work'),
		);
		$this->template->full_customer_html_view($data);
	}

	public function see_all_projects()
	{
		$content = $this->luser->analytics_all();
		$data = array(
			'content' => $content,
			'title' => display('Analytics :: Hire-n-Work'),
		);
		$this->template->full_customer_html_view($data);
	}
	
	
	/** Function to delete message **/
	public function delete_message($user_id,$message_id)
	{
       $CI =& get_instance();
	   $status = $CI->Messages->get_message($user_id,$message_id);
	   if($status == 1) {
	    $this->luser->delete_message($user_id,$message_id);
	    $msg = array('status'=>1,'message'=>'Message has been deleted');
	   }
       else {
		$this->luser->delete_message($user_id,$message_id);   
		$msg = array('status'=>0,'message'=>'Problem in deleting message');
	   }
	   echo json_encode($msg);die;
	}
	
	
	/** Function to type message **/
	public function type_message($user_from_id,$user_to_id)
	{
       $CI =& get_instance();
	   $status = $CI->Messages->type_message($user_from_id,$user_to_id);
	}
	
	
	
	/** function to type message **/
	public function fetch_chat_session($user_to_id,$user_from_id)
	{
	  $CI =& get_instance();
	  echo $status = $CI->Messages->get_chat_session_message($user_to_id,$user_from_id);die;
	}
	
	
	/** function to remove chat session not working **/
	public function remove_chat_session($user_from_id,$user_to_id)
	{
	  $CI =& get_instance();
	  echo $status = $CI->Messages->delete_chat_session($user_from_id,$user_to_id);die;
	}
	
	/** function to add message by ajax **/
	public function add_ajax_message($user_from_id,$user_to_id,$code) {
		$CI =& get_instance();
		$message_id = $CI->input->post('message_id');
		$this->Messages->delete_chat_session($user_from_id,$user_to_id);
		if($message_id > 0)
		 return $this->luser->updateMsgUserDataAjax($message_id);
        else	
		 return $this->luser->addMsgUserDataAjax($code);
	}
	
	
	/** function to check message visibility **/
	public function check_messages_visibility($user_from_id,$user_to_id)
	{
	  echo $this->Messages->check_messages_visibility($user_from_id,$user_to_id);	
	}
	
	
	/** function to check message visibility **/
	public function update_message_seen_status($user_from_id,$user_to_id)
	{
	  $CI =& get_instance();
	  $ids = $CI->input->post('ids');
	  $this->Messages->update_message_seen_status($user_from_id,$user_to_id,$ids);		
	}	
	
	
	
	public function fetch_login_session($user_to_id)
	{
	  echo $this->Users->get_login_status($user_to_id);	
	}
	
	
	
	public function download_file($code)
	{
		$CI =& get_instance();
		$files = $this->Messages->getFileNames($code);
		$file = $files['file'];
		$remoteURL = base_url()."uploads/messages/".$file;
		$original_file = $files['original'];
		// Force download
		/**header("Content-type: application/pdf"); 
		header("Content-Length: " . filesize($remoteURL));
		header("Content-Disposition: attachment; filename=".basename($original_file));
		ob_end_clean();
		readfile($remoteURL);
		exit;**/
		$this->Messages->updateDownloadStatus($file,$original_file);
		$file = FCPATH."uploads/messages/".$file;
		$len = filesize($file); // Calculate File Size
		ob_clean();
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: public"); 
		header("Content-Description: File Transfer");
		header("Content-Type:application/force-download"); // Send type of file
		$header="Content-Disposition: attachment; filename=$original_file;"; // Send File Name
		header($header );
		header("Content-Transfer-Encoding: binary");
		header("Content-Length: ".$len); // Send File Size
		@readfile($file);
		exit;
	}
	
	
	public function get_unloaded_messages($user_id_to) {
        $CI =& get_instance();
		$message_id = $CI->input->post('last_message');
		$content = $this->luser->get_unloaded_messages($user_id_to,$message_id);
		
        $data = array(
            'content' => $content
        );
        $this->load->view('user/messages_ajax', $data);
    }
	
	
}

