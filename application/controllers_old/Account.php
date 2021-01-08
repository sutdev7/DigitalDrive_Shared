<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	function __construct() {
      	parent::__construct();

		header('Cache-Control: no-cache, must-revalidate, max-age=0');
		header('Cache-Control: post-check=0, pre-check=0',false);
		header('Pragma: no-cache');

		$this->load->library('Laccount');
        //$this->load->model('Accounts');		
    }

	public function index()
	{
		if($this->auth->is_logged()) {
			
			if($this->session->userdata('user_type') == 1){
				redirect('admin/dashboard', 'refresh');
			}else{
				redirect('dashboard', 'refresh');
			}
        }
        $this->form_validation->set_rules('fldEmail','Username', 'trim|required');
        $this->form_validation->set_rules('fldPassword','Password', 'required');
        if($this->form_validation->run() == false){
		    $content = $this->laccount->sign_in_page();
		    $data = array(
			            'content' => $content,
			            'title' => display('Sign-in :: Hire-n-Work'),
		            );		
		    $this->template->full_website_html_view($data);
		}
		else{
           $this->laccount->check_user_validty();
	    }		
	}

	public function sign_up_as()
	{
		/*if($this->session->userdata('user_type') == 1){
			redirect('admin/dashboard', 'refresh');
		}else{
			redirect('dashboard', 'refresh');
		}*/
		$content = $this->laccount->sign_up_as_page();
		$data = array(
			        'content' => $content,
			        'title' => display('Sign Up As :: Hire-n-Work'),
		        );
		$this->template->full_website_html_view($data);		
	}	

	public function sign_up()
	{
		/*if($this->session->userdata('user_type') == 1){
			redirect('admin/dashboard', 'refresh');
		}else{
			redirect('dashboard', 'refresh');
		}*/
		$content = $this->laccount->sign_up_page();
		$data = array(
			        'content' => $content,
			        'title' => display('Sign Up :: Hire-n-Work'),
		        );		
		$this->template->full_website_html_view($data);		
	}

	public function confirm_sign_up()
	{
		/*if($this->session->userdata('user_type') == 1){
			redirect('admin/dashboard', 'refresh');
		}else{
			redirect('dashboard', 'refresh');
		}*/
		$this->form_validation->set_rules('fldPassword','Password', 'required|min_length[8]|xss_clean|callback_valid_password');
	    $this->form_validation->set_rules('username','Username', 'required|is_unique[user_login.username]');

		if($this->form_validation->run() == false){		
		    $content = $this->laccount->sign_up_page();
			$data = array(
				        'content' => $content,
				        'title' => display('Sign Up Confirmation :: Hire-n-Work'),
			        );		
			$this->template->full_website_html_view($data);

		}
		else{
            $content = $this->laccount->confirm_sign_up();
			$data = array(
				        'content' => $content,
				        'title' => display('Sign Up Confirmation :: Hire-n-Work'),
			        );		
			$this->template->full_website_html_view($data);	
	    }			
	}

	public function valid_password($password = '')
	{
		$password = trim($password);

		$regex_lowercase = '/[a-z]/';
		$regex_uppercase = '/[A-Z]/';
		$regex_number = '/[0-9]/';
		$regex_special = '/[!@#$%^&*()\-_=+{};:,<.>§~]/';

		if (empty($password))
		{
			$this->form_validation->set_message('valid_password', 'The {field} field is required.');

			return FALSE;
		}

		if (preg_match_all($regex_lowercase, $password) < 1)
		{
			$this->form_validation->set_message('valid_password', 'The {field} field must be at least one lowercase letter.');

			return FALSE;
		}

		if (preg_match_all($regex_uppercase, $password) < 1)
		{
			$this->form_validation->set_message('valid_password', 'The {field} field must be at least one uppercase letter.');

			return FALSE;
		}

		if (preg_match_all($regex_number, $password) < 1)
		{
			$this->form_validation->set_message('valid_password', 'The {field} field must have at least one number.');

			return FALSE;
		}

		if (preg_match_all($regex_special, $password) < 1)
		{
			$this->form_validation->set_message('valid_password', 'The {field} field must have at least one special character');

			return FALSE;
		}

		if (strlen($password) < 8)
		{
			$this->form_validation->set_message('valid_password', 'The {field} field must be at least 8 characters in length.');

			return FALSE;
		}

		if (strlen($password) > 32)
		{
			$this->form_validation->set_message('valid_password', 'The {field} field cannot exceed 32 characters in length.');

			return FALSE;
		}

		return TRUE;
	}

	public function forgot_password()
	{
		/*if($this->session->userdata('user_type') == 1){
			redirect('admin/dashboard', 'refresh');
		}else{
			redirect('dashboard', 'refresh');
		}*/

        $this->form_validation->set_rules('fldEmail','Email', 'trim|required');
        if($this->form_validation->run() == false){		
		    $content = $this->laccount->forgot_password_page();
		    $data = array(
			            'content' => $content,
			            'title' => display('Forgot Password :: Hire-n-Work'),
		            );
		    $this->template->full_website_html_view($data);
		}
		else{
           $this->laccount->send_new_password();
	    }			    		
	}	

	public function logout()
	{
		$content = $this->laccount->logout();	
	}	

	public function verify($hashcode)
	{
		$content = $this->laccount->confirm_email($hashcode);	
	}	

	public function resend_confirmation($aId)
	{
		$content = $this->laccount->resend_verificatin_email($aId);	
	}
			
}
