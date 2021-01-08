<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Admimodel');
		if(!$this->auth->is_logged()) {
        	$this->session->set_flashdata('msg', '<div class="alert alert-info text-center">You haven\'t login to the portal. Please login to proceed further.</div>');
        	redirect('sign-in', 'refresh');
        }
		 $this->load->library('encryption');
		
	}
	
	public function index(){
	
	}
		
	public function sign_up(){
		if($_SERVER['REQUEST_METHOD'] === 'POST'){
			$this->form_validation->set_rules('username','Username', 'required');
			$this->form_validation->set_rules('userpass','Password', 'required');
			
			$submitData = $this->input->post();        
			
			if($this->form_validation->run() == false){ 
				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Username or Password should not be empty </div>');
				//redirect('job-details/'.$this->input->post('user_task_id'),'refresh'); 
			}else{
				$return = $this->Admimodel->check_login($submitData);
				if($return){
					redirect('admin/dashboard','refresh'); 
				}else{
					redirect('admin/login','refresh'); 
				}
			}
		}
	}
		
	public function dashboard(){
            
                $data['freelancer_count']       = $this->Admimodel->get_user_counts($usertype = 4, true);
                $data['client_count']           = $this->Admimodel->get_user_counts($usertype = 3, true);
                $data['naluacer_count']         = $this->Admimodel->get_user_counts($usertype = 5, true);
                $data['problem_ticket_count']   = $this->Admimodel->get_problem_ticket_count();

		$this->load->view('admin/includes/admin_header_all');
		$this->load->view('admin/includes/navbar');
		$this->load->view('admin/pages/dashboard', $data);
		$this->load->view('admin/includes/admin_footer_all');
	}
	
	public function client_list($status = ""){
		$data['userlist'] = $this->Admimodel->get_user_list($usertype = 3, $status);
		
		$this->load->view('admin/includes/admin_header_all');
		$this->load->view('admin/includes/navbar');
		$this->load->view('admin/pages/user_list',$data);
		$this->load->view('admin/includes/admin_footer_all');
	}
	
	public function user_add(){
		
		$uricheck = base64_decode($this->uri->segment(4));
		
		if(trim($uricheck) == 'c'){
			$user_type = '3'; 
		}else{
			$user_type = '4'; 
		}
		
		
		$data['countrylist'] = $this->Admimodel->get_country_list();
		//echo '<pre>'; print_r($data['country']);die;
		
		$this->load->view('admin/includes/admin_header_all');
		$this->load->view('admin/includes/navbar');
		$this->load->view('admin/pages/add',$data);
		$this->load->view('admin/includes/admin_footer_all');
	}
	
	public function user_edit(){
		
		$uricheck = base64_decode($this->uri->segment(4));
		
		if(trim($uricheck) == 'c'){
			$user_type = '3'; $data['info'] = array();
		}else if(trim($uricheck) == 'f'){
			$user_type = '4'; $data['info'] = array();
		}else{
			$user_type = ''; $user_id = $uricheck;
			// get user info
			$data['info'] = $this->Admimodel->get_user_info($user_id);
		}
		
		$data['countrylist'] = $this->Admimodel->get_country_list();
		//echo '<pre>'; print_r($data['country']);die;
		
		$this->load->view('admin/includes/admin_header_all');
		$this->load->view('admin/includes/navbar');
		$this->load->view('admin/pages/edit',$data);
		$this->load->view('admin/includes/admin_footer_all');
	}
	
	public function user_delete(){
		$user_id = base64_decode($this->uri->segment(4));
		
		$user_info = $this->Admimodel->getDataByCondition($tablename='user_login',$condition='user_id = "'.$user_id.'"',array('user_type','email'),$limit = '0',$orderfield = '',$odertype = '');
		if(!empty($user_info)){
			$user_type = $user_info->user_type;
			$email = ($user_info->email).'_deleted';
			
		}else{
			$user_type = 0;
			$email = '';
		}
				
		$return = $this->Admimodel->update($tableName='user_login',array('email'=> $email, 'status' => 0),$chkfield='user_id',$user_id);
		$return = $this->Admimodel->update($tableName='users',array('status' => 0),$chkfield='user_id',$user_id);
		if($return){
			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> User deleted successfully.
	</div>');
		}else{
			$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Please try again.</div>');
		}
				
		if($user_type == 3){
			redirect('admin/client-list');
		}else if($user_type == 4){
			redirect('admin/freelancer-list');
		}else{
			redirect('admin/dashboard');
		}
				
	}
	
	public function add_user_info(){
		$this->form_validation->set_rules('name','Name', 'required');
		$this->form_validation->set_rules('email','Email', 'required');
		if($this->form_validation->run() == false){ 
			redirect('admin/user/edit/'.base64_encode($this->input->post('user_id')));		
		}else{
			$return = $this->Admimodel->add_data($this->input->post());
			if($this->input->post('user_type') == 3){
				redirect('admin/client-list');
			}else{
				redirect('admin/freelancer-list');
			}	
		}
	}
	
	public function edit_user_info(){
		
		$this->form_validation->set_rules('email','Email', 'required');
		//$this->form_validation->set_rules('password','Password', 'required');
		
		$submitData = $this->input->post();   //echo '<pre>'; print_r($this->input->post()); die;     
		
		if($this->form_validation->run() == false){ 
			redirect('admin/user/edit/'.base64_encode($this->input->post('user_id')));		
		}else{
			$return = $this->Admimodel->modify_data($submitData);

            if(isset($submitData['profile_status'] )){

            	$message = 'Dear User,<br><br> Your profile is activated now. please login and find your job<br><br>Thanks';

		        $this->load->library('email');
		        $this->email->set_newline("\r\n");
		        $this->email->from("admin@hirenwork.com");
		        $this->email->to($submitData['email']);
		        $this->email->subject('Account activated');
		        $this->email->message($message);
		        $this->email->send();

            }else{

            	$message = 'Dear User,<br><br> Your profile is deactivated now. please contact with administrator <br><br>Thanks';

            	$this->load->library('email');
		        $this->email->set_newline("\r\n");
		        $this->email->from("admin@hirenwork.com");
		        $this->email->to($submitData['email']);
		        $this->email->subject('Account deactivate');
		        $this->email->message($message);
		        $this->email->send();


            }
			
			if($return){
				$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> Data update successfully.
	</div>');
			}else{
				$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Please try again.</div>');
			}
			if($this->input->post('user_type') == 3){
				redirect('admin/client-list');
			}else{
				redirect('admin/freelancer-list');
			}
			
		}		
	}
		
	public function freelancer_list($status = ""){
		$data['userlist'] = $this->Admimodel->get_user_list($usertype = 4, $status);
		
		$this->load->view('admin/includes/admin_header_all');
		$this->load->view('admin/includes/navbar');
		$this->load->view('admin/pages/user_list',$data);
		$this->load->view('admin/includes/admin_footer_all');			
	}

	public function naluacer_list(){
			$data['userlist'] = $this->Admimodel->get_user_list($usertype = 5);
			
			$this->load->view('admin/includes/admin_header_all');
			$this->load->view('admin/includes/navbar');
			$this->load->view('admin/pages/user_list',$data);
			$this->load->view('admin/includes/admin_footer_all');			
	}
	
	public function category_list(){
		
		$data['categorylist'] = $this->Admimodel->get_category_list();
		
		$this->load->view('admin/includes/admin_header_all');
		$this->load->view('admin/includes/navbar');
		$this->load->view('admin/pages/category_list',$data);
		$this->load->view('admin/includes/admin_footer_all');
	}
	
	public function change_status(){
		//$changeVal = $_POST['action'];
		//$response=array();
		$row_id = $_POST['pk'];
		$selectedData = $_POST['selectedData']; 
		
		$return = $this->Admimodel->update_ticket_status($row_id,$selectedData);
		
		if($return == 'updated'){
			echo "1";
			
		}else{
			echo "0";
		}
		
		
	}
	
	public function category_add(){
		
		if($_SERVER['REQUEST_METHOD'] === 'POST'){
			$this->form_validation->set_rules('name','Category Name', 'required');
			
			$submitData = array(
				'name' => $this->input->post('name'),
				'detail' => $this->input->post('detail'),
				'status' => $this->input->post('status'),
				'dom' => date('Y-m-d H:i:s'),
				'deleted' => 0
			); ;  
			
			$rowid = $this->input->post('row_id');
			if($this->form_validation->run() == false){ 
				$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> '.validation_errors().'</div>');
				redirect('admin/category-add');
			}else{
				$return = $this->Admimodel->insert('area_of_interest',$submitData); 
				$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> Data update successfully.
	</div>');
				redirect('admin/category-list');
			}
		}
			
		
		$this->load->view('admin/includes/admin_header_all');
		$this->load->view('admin/includes/navbar');
		$this->load->view('admin/pages/category_add');
		$this->load->view('admin/includes/admin_footer_all');
		
	}
	
	public function category_edit(){
		$rowid = ($this->uri->segment(3) !='') ? $this->uri->segment(3) : '';
		$data['info'] = $this->Admimodel->get_category_info($rowid);
		
		if($_SERVER['REQUEST_METHOD'] === 'POST'){
			$this->form_validation->set_rules('name','Category Name', 'required');
			
			$submitData = array(
				'name' => $this->input->post('name'),
				'detail' => $this->input->post('detail'),
				'status' => $this->input->post('status'),
				'dom' => date('Y-m-d H:i:s'),
				'deleted' => $this->input->post('deleted')
			); ;  
			
			$rowid = $this->input->post('row_id');
			if($this->form_validation->run() == false){ 
				$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> '.validation_errors().'</div>');
				redirect('admin/category-edit/'.$rowid);
			}else{
				$return = $this->Admimodel->update('area_of_interest',$submitData,$chkfield='area_of_interest_id',base64_decode($rowid)); 
				$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> Data update successfully.
	</div>');
				redirect('admin/category-list');
			}
		}
			
		
		$this->load->view('admin/includes/admin_header_all');
		$this->load->view('admin/includes/navbar');
		$this->load->view('admin/pages/category_edit',$data);
		$this->load->view('admin/includes/admin_footer_all');
		
	}
	
	public function task_list(){
		
		$data['info'] = $this->Admimodel->get_post_list();
		
		
		$this->load->view('admin/includes/admin_header_all');
		$this->load->view('admin/includes/navbar');
		$this->load->view('admin/pages/task_list',$data);
		$this->load->view('admin/includes/admin_footer_all');
		
	}
	
	public function problem_ticket_list($problem_status = ""){
            $problem_status = trim(strtolower($problem_status));
            if ($problem_status != "" && in_array($problem_status, array("solved", "unsolved"))) {
		$data['info'] = $this->Admimodel->get_problem_ticket_list($problem_status);
                $this->load->view('admin/includes/admin_header_all');
		$this->load->view('admin/includes/navbar');
		$this->load->view('admin/pages/problem_ticket_list',$data);
		$this->load->view('admin/includes/admin_footer_all');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-info text-center">You haven\'t login to the portal. Please login to proceed further.</div>');
        	redirect('dashboard', 'refresh');                
            }
	}
	public function user_messages(){
            $data['user_message'] = $this->Admimodel->get_message_users();
            $this->load->view('admin/includes/admin_header_all');
            $this->load->view('admin/includes/navbar');
            $this->load->view('admin/pages/messages_list',$data);
            $this->load->view('admin/includes/admin_footer_all');
	}
	public function view_messages($user_id = ""){
            if ($user_id != "") {
		$data['messages'] = $this->Admimodel->get_user_messages($user_id);
                $this->load->view('admin/includes/admin_header_all');
		$this->load->view('admin/includes/navbar');
		$this->load->view('admin/pages/messages_view_list',$data);
		$this->load->view('admin/includes/admin_footer_all');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-info text-center">You haven\'t login to the portal. Please login to proceed further.</div>');
        	redirect('dashboard', 'refresh');                
            }
	}

	public function problem_ticket_history(){
		$data['info'] = $this->Admimodel->get_problem_ticket_history();
		
		
		$this->load->view('admin/includes/admin_header_all');
		$this->load->view('admin/includes/navbar');
		$this->load->view('admin/pages/problem_ticket_history',$data);
		$this->load->view('admin/includes/admin_footer_all');
	}



	
	public function faq_list(){
		$data['info'] = array();
		
		
		$this->load->view('admin/includes/admin_header_all');
		$this->load->view('admin/includes/navbar');
		$this->load->view('admin/pages/faq_list',$data);
		$this->load->view('admin/includes/admin_footer_all');
	}
	
	
	public function notification_list(){
		$data['info'] = array();
		
		
		$this->load->view('admin/includes/admin_header_all');
		$this->load->view('admin/includes/navbar');
		$this->load->view('admin/pages/notification_list',$data);
		$this->load->view('admin/includes/admin_footer_all');
	}
	
	public function notification_add(){
		$data['info'] = array();
		
		
		$this->load->view('admin/includes/admin_header_all');
		$this->load->view('admin/includes/navbar');
		$this->load->view('admin/pages/notification_add',$data);
		$this->load->view('admin/includes/admin_footer_all');
	}
	
	public function problem_ticket_answer(){
		$data['info'] = array();
		
		
		$this->load->view('admin/includes/admin_header_all');
		$this->load->view('admin/includes/navbar');
		$this->load->view('admin/pages/problem_ticket_answer',$data);
		$this->load->view('admin/includes/admin_footer_all');
	}
	
	public function faq_add(){
		$data['info'] = array();
		
		
		$this->load->view('admin/includes/admin_header_all');
		$this->load->view('admin/includes/navbar');
		$this->load->view('admin/pages/faq_add',$data);
		$this->load->view('admin/includes/admin_footer_all');
	}
	
	public function site_settings(){
		$data['info'] = array();
		
		
		$this->load->view('admin/includes/admin_header_all');
		$this->load->view('admin/includes/navbar');
		$this->load->view('admin/pages/site_settings',$data);
		$this->load->view('admin/includes/admin_footer_all');
	}
	
	public function user_query(){
		$data['info'] = $this->Admimodel->get_user_query();
		
		$this->load->view('admin/includes/admin_header_all');
		$this->load->view('admin/includes/navbar');
		$this->load->view('admin/pages/user_query',$data);
		$this->load->view('admin/includes/admin_footer_all');
	}
	public function problem_ticket_details($id)
	{
		$data['info'] = $this->Admimodel->problem_ticket_details($id);
		
		$this->load->view('admin/includes/admin_header_all');
		$this->load->view('admin/includes/navbar');
		$this->load->view('admin/pages/problem_ticket_details', $data);
		$this->load->view('admin/includes/admin_footer_all');
	}

	public function history_ticket_details($id)
		{
			$data['info'] = $this->Admimodel->history_ticket_details($id);
			
			$this->load->view('admin/includes/admin_header_all');
			$this->load->view('admin/includes/navbar');
			$this->load->view('admin/pages/history_ticket_details', $data);
			$this->load->view('admin/includes/admin_footer_all');
		}


        public function compose_email($grievance_id) {
            $data['grievance_id'] = $grievance_id;

            $get_email = $this->Admimodel->get_ticket_email($grievance_id);
            $data['send_mail'] = isset($get_email->email) ? $get_email->email : '';
            $data['user_id'] = isset($get_email->user_id) ? $get_email->user_id : '';

            $this->load->view('admin/includes/admin_header_all');
            $this->load->view('admin/includes/navbar');
            $this->load->view('admin/pages/grievance_email', $data);
            $this->load->view('admin/includes/admin_footer_all');
        }

	public function compose_email_history($ticket_id)
	{
		$g_id = $this->Admimodel->get_grievance_id($ticket_id);
		$grievance_id = $g_id->id;
		$data['grievance_id'] = $grievance_id;
		$data['from'] = 'history';

		$get_email = $this->Admimodel->get_ticket_email($grievance_id);
                $data['send_mail'] = isset($get_email->email) ? $get_email->email : '';
 
		$this->load->view('admin/includes/admin_header_all');
		$this->load->view('admin/includes/navbar');
		$this->load->view('admin/pages/grievance_email', $data);
		$this->load->view('admin/includes/admin_footer_all');
	}

	public function send_email() {
            $post_data = $this->input->post();
            $this->load->model('Users');
            $this->load->model('Messages');
            $grievance_id       = $this->input->post('grievance_id');
            $userIdTo       = $this->input->post('user_id');
            $message_data   = array('msg' => $post_data['email_body']);
            $result         = $this->Messages->add_user_message($message_data, $userIdTo);
            $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> Email Send successfully.</div>');
            redirect(base_url() . 'admin/compose_email/' . $grievance_id, 'refresh');
    //        $get_email = $this->Admimodel->store_ticket_history($post_data);
    //        $from = $post_data['from'];
    //        $this->db->insert('grievance_emails', [
    //            'grievance_id' => $post_data['grievance_id'],
    //            //'email_from' => $post_data['email_from'],
    //            'email_to' => $post_data['email_to'],
    //            'email_cc' => $post_data['cc'],
    //            'email_bcc' => $post_data['bcc'],
    //            'email_subject' => $post_data['email_subject'],
    //            'email_body' => $post_data['email_body'],
    //            'doc' => date('Y-m-d h:i:s'),
    //            'dom' => null
    //        ]);


    //        $this->load->library('email');
    //        $this->email->set_newline("\r\n");
    //        $this->email->from("admin@hirenwork.com");
    //        $this->email->to($post_data['email_to']);
    //        if (!empty($post_data['cc']))
    //            $this->email->cc($post_data['cc']);
    //        if (!empty($post_data['bcc']))
    //            $this->email->cc($post_data['bcc']);
    //        $this->email->subject($post_data['email_subject']);
    //        $this->email->message($post_data['email_body']);
    //        if ($this->email->send()) {
    //            $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> Email Send successfully.
    //			</div>');
    //
    //            if ($from == '')
    //                redirect('admin/problem-ticket');
    //            else
    //                redirect('admin/problem_ticket_list');
    //        }
//            show_error($this->email->print_debugger());
            return false;
            
        }
	public function replay_user_message($userIdTo = "") {

            if ($userIdTo != ""){
                if ($this->input->server('REQUEST_METHOD') == 'POST') {                
                    $post_data = $this->input->post();
                    $this->load->model('Users');
                    $this->load->model('Messages');
                    $userIdTo       = $this->input->post('user_id');
                    $message_data   = array('msg' => $post_data['email_body']);
                    $this->Messages->add_user_message($message_data, $userIdTo);
                    $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> Message successfully.</div>');
                    redirect('admin/view-messages/' .$userIdTo );
                }
                $get_user           = $this->Admimodel->get_user_info($userIdTo);
                $data['send_mail']  = isset($get_user->email) ? $get_user->email : '';
                $data['user_id']    = ($userIdTo != "") ? $userIdTo : '';

                $this->load->view('admin/includes/admin_header_all');
                $this->load->view('admin/includes/navbar');
                $this->load->view('admin/pages/replay_user_message', $data);
                $this->load->view('admin/includes/admin_footer_all');
            } else {
                redirect('dashboard', 'refresh');
            }
        }
	public function get_notification() {
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $this->load->model("Admin_notification");
                $sql            = "select admin_notification.* from admin_notification where admin_notification.is_read = 'N' order by id desc";
                $query          = $this->db->query($sql);
                $notifications  = $query->result();
                $data['notifications'] = $notifications;
                $notification_html = $this->load->view('admin/pages/notifications_html', $data, true);
                echo $notification_html;
            }
        }
}