<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth {
	//Login....
	public function login($username,$password)
	{
		$CI =& get_instance();
		$CI->load->model('Users'); 
		$CI->load->model('Notifications'); 
		$result = $CI->Users->check_valid_user($username,$password);
	
        if ($result){
			$key = md5(time());
			$key = str_replace("1", "z", $key);
			$key = str_replace("2", "J", $key);
			$key = str_replace("3", "y", $key);
			$key = str_replace("4", "R", $key);
			$key = str_replace("5", "Kd", $key);
			$key = str_replace("6", "jX", $key);
			$key = str_replace("7", "dH", $key);
			$key = str_replace("8", "p", $key);
			$key = str_replace("9", "Uf", $key);
			$key = str_replace("0", "eXnyiKFj", $key);
			$sid_web = substr($key, rand(0, 3), rand(28, 32));


	        $user_profile_image = $result[0]['profile_image'];
	        if(empty($user_profile_image)) {
	    	    $user_profile_image = base_url('assets/img/no-image.png');
	        }
	        else {
	    	    $user_profile_image = base_url('uploads/user/profile_image/'.$user_profile_image);	    	
	        }			
			
			$notifications=$CI->Notifications->get_all_user_notification($result[0]['user_id']);
			$count_notification=count($notifications);
			
			// codeigniter session stored data			
			$user_data = array(
				'sid_web' 		=> $sid_web,
				'user_id' 		=> $result[0]['user_id'],
				'username' 		=> $result[0]['username'],
				'profile_id' 	=> $result[0]['profile_id'],
				'user_type' 	=> $result[0]['user_type'],
				'user_name' 	=> $result[0]['name'],
				'user_email' 	=> $result[0]['email'],
				'user_mobile' 	=> $result[0]['mobile'],
				'user_image' 	=> $result[0]['profile_image'],
				'user_site_image' 	=> $user_profile_image,
				'is_mobile_verified' => $result[0]['is_mobile_verified'],
				'receive_transactional_notification' 	=> $result[0]['receive_transactional_notification'],
				'receive_task_update_notification' 	=> $result[0]['receive_task_update_notification'],
				'receive_task_reminder_notification' 	=> $result[0]['receive_task_reminder_notification'],
				'receive_helpful_notification' 	=> $result[0]['receive_helpful_notification'],
				'total_points' => $result[0]['total_points'],
				'count_notification'=>$count_notification
			);

          	$CI->session->set_userdata($user_data);
			$CI->Users->set_login_session($user_data);
           	return TRUE;
		}else{
			return FALSE;
        }
	}

	//Check if is logged....
	public function is_logged()
	{
		$CI =& get_instance();
        if($CI->session->userdata('sid_web'))
		{
			return true;
		}
		return false;
	}

	//Logout....
	public function logout()
	{
		$CI =& get_instance();
		$CI->load->model('Users');

		$user_data = array(
				'sid_web','user_id','profile_id','user_type','user_name','user_email','user_mobile','is_mobile_verified','receive_transactional_notification','receive_task_update_notification','receive_task_reminder_notification','receive_helpful_notification','user_image','user_site_image'
			);

        $CI->Users->remove_login_session($CI->session->userdata('user_id'));
		$CI->Users->update_user_login_status($CI->session->userdata('user_id'));
        $CI->session->unset_userdata($user_data);
		return true;
	}

	public function update_user_session_data($uID = null)
	{
		$CI =& get_instance();
		$CI->load->model('Users');
       
        $result = $CI->Users->get_user_info_by_id($uID);
        $profile = $CI->Users->get_user_profile_info_by_id($uID);
        if(!empty($result) && !empty($profile)) {
            $CI->session->set_userdata('user_name', $profile['basic_info']->name);
            $CI->session->set_userdata('user_email', $result->email);
            $CI->session->set_userdata('user_mobile', $result->mobile);
            $CI->session->set_userdata('is_mobile_verified', $result->is_mobile_verified);
            $CI->session->set_userdata('receive_transactional_notification', $result->receive_transactional_notification);
            $CI->session->set_userdata('receive_task_update_notification', $result->receive_task_update_notification);
            $CI->session->set_userdata('receive_task_reminder_notification', $result->receive_task_reminder_notification);
            $CI->session->set_userdata('receive_helpful_notification', $result->receive_helpful_notification);
            $CI->session->set_userdata('user_image', $result->profile_image); 
						
	        $user_profile_image = $result->profile_image;
	        if(empty($user_profile_image)) {
	    	    $user_profile_image = base_url('assets/img/no-image.png');
	        }
	        else {
	    	    $user_profile_image = base_url('uploads/user/profile_image/'.$user_profile_image);	    	
	        }
	        $CI->session->set_userdata('user_site_image', $user_profile_image);                    


            return TRUE;
        }
        else
        	return FALSE;
	}	

	//Check for logged in user is Admin or not.
	/*public function is_admin()
	{
		$CI =& get_instance();
        if ($CI->session->userdata('user_type')==1 || $CI->session->userdata('user_type')==2)
		{
			return true;
		}
		return false;
	}	

	//Check for logged in user is Admin or not.
	public function is_store()
	{
		$CI =& get_instance();
        if ($CI->session->userdata('user_type') == 4)
		{
			return true;
		}
		return false;
	}
	function check_admin_str_auth($url='') {
	   if($url==''){$url = base_url().'admin';}
		$CI =& get_instance();
        if ((!$this->is_logged()) || (!$this->is_admin()) || (!$this->is_store()))
		{ 
			$this->logout();
			$error = display('you_are_not_authorised');
			$CI->session->set_userdata(array('error_message'=>$error));
            redirect($url,'refresh'); exit;
        }
	}
	//Check admin auth
	function check_admin_auth($url='')
	{   
        if($url==''){$url = base_url().'admin';}
		$CI =& get_instance();
        if ((!$this->is_logged()) || (!$this->is_admin()))
		{ 
			$this->logout();
			$error = display('you_are_not_authorised');
			$CI->session->set_userdata(array('error_message'=>$error));
            redirect($url,'refresh'); exit;
        }
	}	

	//Check store auth
	function check_store_auth($url='')
	{   
        if($url==''){$url = base_url().'admin';}
		$CI =& get_instance();
        if ((!$this->is_logged()) || (!$this->is_store()))
		{ 
			$this->logout();
			$error = display('you_are_not_authorised');
			$CI->session->set_userdata(array('error_message'=>$error));
            redirect($url,'refresh'); exit;
        }
	}

	//Check admin and store auth
	function check_admin_store_auth($url='')
	{   
        if($url==''){$url = base_url().'admin';}
		$CI =& get_instance();
        if ((!$this->is_logged()) && (!$this->is_admin()) && (!$this->is_store()))
		{ 
			$this->logout();
			$error = display('you_are_not_authorised');
			$CI->session->set_userdata(array('error_message'=>$error));
            redirect($url,'refresh'); exit;
        }
	}	*/
	
	//This function is used to Generate Key
	public function generator($lenth){

		$number=array("A","B","C","D","E","F","G","H","I","J","K","L","N","M","O","P","Q","R","S","U","V","T","W","X","Y","Z","1","2","3","4","5","6","7","8","9","0");
	
		for($i=0; $i<$lenth; $i++){
			$rand_value=rand(0,34);
			$rand_number=$number["$rand_value"];
		
			if(empty($con)){ 
			    $con=$rand_number;
			}
			else{
			    $con="$con"."$rand_number";
			}
		}
		return $con;
	}

	function generateCode($limit){
		$code = '';
		for($i = 0; $i < $limit; $i++) { $code .= mt_rand(0, 9); }
		return $code;
	}

    //send confirm mail
    public function sendVerificatinEmail($receiver , $type=null){
		$CI =& get_instance();

        $from = $CI->config->item('smtp_user');    //senders email address
        $subject = 'Verify email address';  //email subject
        
        //sending confirmEmail($receiver) function calling link to the user, inside message body
        $message = 'Dear User,<br><br> Please click on the below activation link to verify your email address<br><br>
        <a href=\'' . base_url().'account/verify/'.base64_encode($receiver).'\'>' . base_url().'account/verify/'. base64_encode($receiver) .'</a><br><br>Thanks';
        
        $data['receiver']= $receiver;
        $body = $CI->load->view('email/emailverify_email_template.php',$data,TRUE);
        $CI->load->library('email');
        //send email
        $CI->email->set_newline("\r\n");
		$CI->email->from('info@hirenwork.com');
        $CI->email->to($receiver);
        $CI->email->subject($subject);
        $CI->email->message($body);
        
        if($CI->email->send()){

        	$from = $CI->config->item('smtp_user');    //senders email address
            $subject = 'New ' . $type .' account created';  //email subject
            $message = 'Dear Admin,<br><br> A new '.$type.' account created successfully <br><br>
                       Thanks';
            $CI->load->library('email');
	        //send email
	        $CI->email->set_newline("\r\n");
	        //$CI->email->from($config['smtp_user']);
			$CI->email->from('info@hirenwork.com');
	        $CI->email->to($CI->config->item('admin_email'));
	        $CI->email->subject($subject);
	        $CI->email->message($message); 
	        $CI->email->send();          

			
            return true;
        }else{
        	show_error($CI->email->print_debugger());
            //echo "email send failed";
            return false;
        }
    } 	

    //send confirm mail
    public function sendPasswordResetEmail($receiver, $newPassword){
		$CI =& get_instance();

        $from = "dev.test.debashish@gmail.com";    //senders email address
        $subject = 'Password reset';  //email subject
        
        //sending confirmEmail($receiver) function calling link to the user, inside message body
        $message = 'Dear User,<br><br> You have requested the new password, Here is you new password: ' . $newPassword . '<br><br>Thanks';
        
        //config email settings
        /*$config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.gmail.com';
        $config['smtp_port'] = '465';
        $config['smtp_user'] = $from;
        $config['smtp_pass'] = 'rosebird';  //sender's password
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = 'TRUE';
        $config['newline'] = "\r\n"; 
        
        $CI->load->library('email', $config);
		$CI->email->initialize($config);*/

        //send email
        $CI->email->from($from);
        $CI->email->to($receiver);
        $CI->email->subject($subject);
        $CI->email->message($message);
        
        if($CI->email->send()){
			//for testing
            //echo "sent to: ".$receiver."<br>";
			//echo "from: ".$from. "<br>";
			//echo "protocol: ". $config['protocol']."<br>";
			//echo "message: ".$message;
            return true;
        }else{
            //echo "email send failed";
            return false;
        }
    }     

}
?>