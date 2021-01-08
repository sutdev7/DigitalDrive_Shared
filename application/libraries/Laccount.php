<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Laccount {

	//Account Sign-in Page Load Here
	public function sign_in_page()
	{
		$CI =& get_instance();
		//$CI->load->model('website/Homes');
		//$CI->load->model('web_settings');
		//$CI->load->model('Soft_settings');
		//$CI->load->model('Blocks');
		/*$parent_category_list 	= $CI->Homes->parent_category_list();
		$pro_category_list 		= $CI->Homes->category_list();
		$best_sales 			= $CI->Homes->best_sales();
		$footer_block 			= $CI->Homes->footer_block();
		$slider_list 			= $CI->web_settings->slider_list();
		$block_list 			= $CI->Blocks->block_list(); 
		$currency_details 		= $CI->Soft_settings->retrieve_currency_info();
		$Soft_settings 			= $CI->Soft_settings->retrieve_setting_editdata();
		$languages 				= $CI->Homes->languages();
		$currency_info 			= $CI->Homes->currency_info();
		$selected_currency_info = $CI->Homes->selected_currency_info();
		$select_home_adds 		= $CI->Homes->select_home_adds();*/

		$data = array(
				/*'category_list' => $parent_category_list,
				'pro_category_list' => $pro_category_list,
				'slider_list' 	=> $slider_list,
				'block_list' 	=> $block_list,
				'best_sales' 	=> $best_sales,
				'footer_block' 	=> $footer_block,
				'languages' 	=> $languages,
				'currency_info' => $currency_info,
				'select_home_adds' => $select_home_adds,
				'selected_cur_id' => (($selected_currency_info->currency_id)?$selected_currency_info->currency_id:""),
				'Soft_settings' => $Soft_settings,
				'currency' 		=> $currency_details[0]['currency_icon'],
				'position' 		=> $currency_details[0]['currency_position'],*/
			);
		$AccountForm = $CI->parser->parse('account/sign-in',$data,true);
		return $AccountForm;
	}	

	public function sign_up_as_page($type=2)
	{
		$CI =& get_instance();
		$data = array('type'=>$type);
		$AccountForm = $CI->parser->parse('account/sign-up-as',$data,true);
		return $AccountForm;
	}

	public function sign_up_page()
	{
		$CI =& get_instance();
        $CI->load->model('Skills');
		$arrCountry = array();
		$skills = $CI->Skills->get_all_skill_info();

        $countries = $CI->Countries->get_all_country_info();
        //echo '<pre>';
        //print_r($countries);
        if(!empty($countries)) {
        	foreach($countries as $country) {
        	    $arrCountry[] = array('c_code'=> $country->country_code, 'key' => $country->country_id, 'value' => $country->name);
        	}

        	//echo '<pre>'; print_r($arrCountry); exit();
        }

		$data = array(
			'sign_up_as' => $CI->input->post('fldUserType'),
			'countries' => $arrCountry,
			'skills' => $skills
		);
		$AccountForm = $CI->parser->parse('account/sign-up',$data,true);
		return $AccountForm;
	}	

	public function confirm_sign_up()
	{
		$CI =& get_instance();
        $CI->load->model('Users');

		$data = $CI->input->post();
           // $id_generator     = $this->auth->generator(10);
            if(is_array($_FILES) && !empty($_FILES['userImage']['name'])){
            	if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
                    $path = $_FILES['userImage']['name'];
                    $path_parts = pathinfo($path);
                   // $filename = time() . '_' . $CI->session->userdata('user_id') . '.' . $path_parts['extension'];
                    $filename = time() .  '.' . $path_parts['extension'];
                    //print_r($path_parts);

					$sourcePath = $_FILES['userImage']['tmp_name'];
                    $targetPath = "./uploads/user/profile_image/".$filename;
                    if(move_uploaded_file($sourcePath,$targetPath)) {
                    	$existing_data = $CI->session->userdata('user_image');
                    	if(!empty($existing_data)) {
                    		unlink("./uploads/user/profile_image/".$existing_data);
                    	}

                        $data['user_image'] = $filename;
		    			    		                           
                    } else {
                        $CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Unable to update user profile image.</div>');
                         redirect('sign-up-as', 'refresh');
		            }
                } else {
                    $CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Unable to update user profile image.</div>');
                     redirect('sign-up-as', 'refresh');
		        }                
            } 
			//echo "<pre>";print_r($data);echo "<pre>";print_r($_FILES);die;
		$result = $CI->Users->register_user($data);

		if($result['status']) {
			if(!empty($result['email_flag'])) {
	            if($CI->auth->sendVerificatinEmail( $CI->input->post('fldEmail'), $CI->input->post('fldUserType'))) {
			        $AccountForm = $CI->parser->parse('account/confirm-sign-up',array('uid' => $result['userId']),true);
			        return $AccountForm;
	            }
			} else {
				$AccountForm = $CI->parser->parse('account/confirm-sign-up-room',array('uid' => $result['userId']),true);
			    return $AccountForm;
			}

            $CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Failed!! Please try again.</div>');
			redirect('home', 'refresh');
		}
		else {
			if($result['message'] == 'account_already_exists') {
                $CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">User with email \''.$CI->input->post('fldEmail').'\' already exist. Please try to re-register.</div>');		
			}
			elseif($result['message'] == 'unable_to_add_record_in_db') {
                $CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">User registration failed. Please try to re-register.</div>');		
			}
            redirect('sign-up-as', 'refresh');				
		}
	}	

 	public function confirm_email($hashcode)
	{
		$CI =& get_instance();
        $CI->load->model('Users');
        $data = array();
		$result = $CI->Users->verifyEmail($hashcode);
		
		$email = base64_decode($hashcode);
		
		$user = $CI->Users->get_user_info_by_email($email);
		
        $username = $user->username;
		$data['username'] = $username;
		if($result) {

			$message = 'Dear User,<br><br> Your Account is activated now.<br><br>Thanks';
                $body = $CI->load->view('email/welcome_email_template.php',$data,TRUE);
		        $CI->load->library('email');
		        $CI->email->set_newline("\r\n");
		        $CI->email->from("admin@hirenwork.com");
		        $CI->email->to($email);
		        $CI->email->subject('Account activated');
		        $CI->email->message($body);
		        $CI->email->send(); 

            $CI->session->set_flashdata('msg', '<div class="alert alert-success text-center">Email address is confirmed. Please login to the system</div>');
			
		    redirect('sign-in', 'refresh');	            
		}
		else {
            $CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Email address is not confirmed. Please try to re-register.</div>');	
            redirect('sign-up-as', 'refresh');	            		
		}	
	}  

 	public function resend_verificatin_email($aId)
	{
		$CI =& get_instance();
        $CI->load->model('Users');

        $udata = $CI->Users->get_user_info_by_id($aId);
        if(!empty($udata)) {
            if($CI->auth->sendVerificatinEmail($udata->email)) {
                return json_encode(array('status' => true, 'message' => 'Confirmation link has been resend to your registered email address. Please check your email to finish registration.'));
            }
            else {
                return json_encode(array('status' => false, 'message' => 'Unable to send confirmation link. Please re-register.'));
            }
        }
        else {
            return json_encode(array('status' => false, 'message' => 'Unable to send confirmation link. Please re-register.'));
        }	
	} 

	public function check_user_validty() {
		$CI =& get_instance();

        $udata = $CI->input->post();        		
        if($CI->auth->login($udata['fldEmail'], $udata['fldPassword'])) {
        	$CI->session->set_flashdata('msg', '<div class="alert alert-success text-center">Your login was successful.</div>');
		    redirect('dashboard', 'refresh');        		
        }
        else {
            $CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Your login was unsuccessful. Please retry with valid credential.</div>');	
            redirect('sign-in', 'refresh');        	
        }
	}

	public function forgot_password_page()
	{
		$CI =& get_instance();
		$data = array();
		$AccountForm = $CI->parser->parse('account/forgot_password',$data,true);
		return $AccountForm;
	}

	public function send_new_password()
	{
		$CI =& get_instance();
        $CI->load->model('Users');

		$data = $CI->input->post();
		$result = $CI->Users->get_user_info_by_email($data['fldEmail']);

        if(!empty($result)) {
            $newPassword = $CI->Users->resetPassword($result);
            if(!empty($newPassword)) {
            	if($CI->auth->sendPasswordResetEmail($result->email, $newPassword)) {
                    $CI->session->set_flashdata('msg', '<div class="alert alert-success text-center">New password has been send to your registered email address. Please check your email for the same.</div>');
                }
                else {
                    $CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Unable to send New password. Please retry after sometime.</div>');                	
                }
            }
            else {
                $CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Unable to send New password. Please retry after sometime.</div>');                 
            }            
        }
        else {
            $CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">User with email \''.$data['fldEmail'].'\' doesn\'t exist. Please retry with registered email address.</div>');	
        }

        redirect('sign-in', 'refresh');        
	}	

	public function logout() {
		$CI =& get_instance();	
		
		if($CI->auth->logout()) {
			redirect('sign-in', 'refresh');
		}
		else {
			redirect('dashboard', 'refresh');
		}
	}		
}
