<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Luser {
	public function dashboard_page(){
		
		$CI =& get_instance();
		$data = $userInfo = array();
		$CI->load->model('Users');
		$CI->load->model('Tasks');
		$CI->load->model('Freelancers');
		$CI->load->library('Ltask');		

		if($CI->session->userdata('user_type') == 3){
			// client dashboard
			$user_ongoing_jobs = $CI->ltask->get_user_ongoing_task($CI->session->all_userdata());   // client end
		 
			$page_name = 'user/dashboard'; 
            
		}
        
		$userData = $CI->Users->get_user_profile_info_by_id($CI->session->userdata('user_id'));
		$user_profile_image = $CI->session->userdata('user_image');
		
		if(empty($user_profile_image)) {
			$user_profile_image = base_url('assets/img/no-image.png');
		}else{
			$user_profile_image = base_url('uploads/user/profile_image/'.$user_profile_image);	    	
		}
	     $positivecoin=0;			
         if($userData['basic_info']->total_coins>=0){ $positivecoin='+ '.$userData['basic_info']->total_coins ;}else{ $positivecoin=$userData['basic_info']->total_coins ;}
		if(!empty($userData)) {
			$spend_by_user = $CI->Tasks->get_user_total_spend($userData['basic_info']->user_id);
			$userInfo = array('id' => $userData['basic_info']->user_id, 'name' => $userData['basic_info']->name, 'country' => $userData['basic_info']->country, 'gender' => $userData['basic_info']->gender, 'date_of_birth' => $userData['basic_info']->date_of_birth, 'bio' => $userData['basic_info']->bio, 'address' => $userData['basic_info']->address, 'state' => $userData['basic_info']->state, 'city' => $userData['basic_info']->city, 'vat' => $userData['basic_info']->vat, 'user_languages' => implode(', ', $userData['user_selected_languages']), 'user_skills' => $userData['user_selected_skills'], 'user_image' => $user_profile_image, 'spend_by_user' => $spend_by_user, 'total_positive_coins' => $positivecoin, 'total_negative_coins' => $userData['basic_info']->total_negative_coins);

		}
		$data['user_info'][] = $userInfo;

		$data = array_merge($data, $user_ongoing_jobs); 
		//redirect('user/dashboard/'.$CI->session->userdata('username'),'refresh');
		$AccountForm = $CI->parser->parse($page_name,$data,true); 
		return $AccountForm;

	}

	public function search_freelancer_page($pageIndex = null){

		$CI =& get_instance();
		$data = $freelancerInfo = $arrCountry =  $arrSkills =  array();
		$CI->load->model('Users');
        $CI->load->model('Tasks');
        $CI->load->library("pagination");

        $config = $data = $arrJobs = array();
        $config["base_url"] = base_url() . "search-freelancer";
        $config["total_rows"] = $CI->Users->get_freelancer_profile_count();
        $config["per_page"] = PER_PAGE;
        $config["uri_segment"] = 2;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="previous">';
        $config['first_tag_close'] = '</li>';  
        $config['last_link'] = 'Last';
        $config['first_tag_open'] = '<li class="next">';
        $config['first_tag_close'] = '</li>'; 
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li class="next">';
        $config['next_tag_close'] = '</li>';  
        $config['prev_link'] = 'Previous';
        $config['prev_tag_open'] = '<li class="previous">';
        $config['prev_tag_close'] = '</li>'; 
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>'; 
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';                                       

        $CI->pagination->initialize($config);
        $page = ($CI->uri->segment(2)) ? $CI->uri->segment(2) : 0;        
        $userData = $CI->Users->get_freelancers_profile_info($config["per_page"], $page);
        /*  echo '<pre>';	print_r($userData); die;
exit; */
        if(!empty($userData) && is_array($userData)) {
            foreach($userData as $key => $row) {
                $job_completion_count = $CI->Tasks->count_task_completed_by_user($row['basic_info']->user_id);
                $total_earning = (int)$CI->Tasks->user_total_earning($row['basic_info']->user_id);                

                $user_status = $CI->Users->get_user_info_by_id($row['basic_info']->user_id);
	            $user_profile_image = $user_status->profile_image;
	            if(empty($user_profile_image)) {
	    	        $user_profile_image = base_url('assets/img/no-image.png');
	            } else {
	    	        $user_profile_image = base_url('uploads/user/profile_image/'.$user_profile_image);	    	
	            }

                $is_login = $user_status->is_login;           
                $positivecoin=0;			
                if($row['basic_info']->total_coins>=0){ $positivecoin='+ '.$row['basic_info']->total_coins; }else{ $positivecoin=$row['basic_info']->total_coins;}
                $freelancerInfo[] = array('id' => $row['basic_info']->user_id, 'name' => $row['basic_info']->name, 'country' => $row['basic_info']->country, 'gender' => $row['basic_info']->gender, 'date_of_birth' => $row['basic_info']->date_of_birth, 'bio' => $row['basic_info']->bio, 'address' => $row['basic_info']->address, 'state' => $row['basic_info']->state, 'city' => $row['basic_info']->city, 'vat' => $row['basic_info']->vat, 'user_languages' => implode(', ', $row['user_selected_languages']), 'user_skills' => $row['user_selected_skills'], 'user_image' => $user_profile_image, 'is_online' => (($is_login == '1')?'<div class="round_online"> </div>':'<div class="round"> </div>'), 'task_completed' => $job_completion_count, 'total_earning' => $total_earning, 'public_id' => $row['basic_info']->profile_id, 'total_positive_coins' => $positivecoin, 'total_negative_coins' => $row['basic_info']->total_negative_coins);

            }
        }

        $countries = $CI->Countries->get_all_country_info();
        if(!empty($countries)) {
        	foreach($countries as $country) {
        	    $arrCountry[] = array('key' => $country->country_id, 'value' => $country->name, 'currentselection' => '');
        	}
        }

        $skills = $CI->Skills->get_all_skill_info();
        $user_sel_skills = $CI->Users->get_user_selected_skills_by_id($CI->session->userdata('user_id'));
        if(!empty($skills)) {
        	foreach($skills as $skill) {
        	    $arrSkills[] = array('key' => $skill->area_of_interest_id, 'value' => $skill->name, 'currentselection' => '');
        	}
        }        

        $data["links"] = $CI->pagination->create_links();	
		$data['countries'] = $arrCountry;
		$data['skills'] = $arrSkills;				
		$data['freelancerInfo'] = $freelancerInfo;
		
		
		 //echo '<pre>'; print_r($data); exit;
		
		$AccountForm = $CI->parser->parse('user/search-freelancer',$data,true);
		return $AccountForm;
	}	

	public function ajax_search_freelancer() {
		$CI =& get_instance();
        $CI->load->model('Tasks');
        $CI->load->model("Users");

        $output = '';

        $data = $CI->input->post();  
        $freelancer_name = (!empty($data['name']))?$data['name']:''; 
        $freelancer_skill = (!empty($data['skill']))?$data['skill']:''; 
        $freelancer_country = (!empty($data['country']))?$data['country']:'';  
       
        $arrSearchCriteria = array('name' => $freelancer_name, 'skill' => $freelancer_skill, 'country' => $freelancer_country);
        $userData = $CI->Users->get_freelancers_profile_info_by_search($arrSearchCriteria);
        //print_r($userData);

        if(!empty($userData) && is_array($userData)) {
            foreach($userData as $key => $row) {
                $job_completion_count = $CI->Tasks->count_task_completed_by_user($row['basic_info']->user_id);
                $total_earning = (int)$CI->Tasks->user_total_earning($row['basic_info']->user_id); 
				$user_skills = $CI->Users->get_user_selected_skills_by_id($row['basic_info']->user_id);

                $user_status = $CI->Users->get_user_info_by_id($row['basic_info']->user_id);
	            $user_profile_image = $user_status->profile_image;
	            if(empty($user_profile_image)) {
	    	        $user_profile_image = base_url('assets/img/no-image.png');
	            } else {
	    	        $user_profile_image = base_url('uploads/user/profile_image/'.$user_profile_image);	    	
	            }

	            $is_login = $user_status->is_login;   	            

                $output .= '<div class="anaaDiv">
                                <div  class="chackDiv">
                                    <label class="containerDiv">
                                        <input type="checkbox" name="chkSelectFreelancer[]" id="chkSelectFreelancer_'.$row['basic_info']->user_id.'" class="chkSelectFreelancer" value="'.$row['basic_info']->user_id.'" />
                                        <span class="checkmark"></span> 
                                    </label>
                                </div>
                                <div class="anaaDiv-top"> <span> <img src="'.$user_profile_image.'" alt="'.$row['basic_info']->user_id.'" style="width:64px; height:64px;"> </span>
                                '.(($is_login == '1')?'<div class="round_online"> </div>':'<div class="round"> </div>').'
                                <div class="caption">
                                    <h3><a href="#">'.$row['basic_info']->name.'</a></h3>
                                    <p> '.$row['basic_info']->city.', '.$row['basic_info']->state.', '.$row['basic_info']->country.' </p>
                                    <small> + '.$row['basic_info']->total_positive_coins.' Coins </small>
                                    <em> '.$row['basic_info']->total_negative_coins.' Coins </em> 
                                    <div class="btnDiv2"> 
								<form name="frmMakeOffer" id="frmMakeOffer_'.$row['basic_info']->user_id.'" action="" method="post"><input type="hidden" name="chkMakeOfferFreelancer" value="'.$row['basic_info']->user_id.'" />
								</form>
								
								<a href="#" data-formaction="'.base_url().'make-an-offer" data-formid="'.$row['basic_info']->user_id.'" class="view-btn1 makeoffer"> Make offer </a> <a href="#" data-formaction="'.base_url().'hire-freelancer" data-formid="'.$row['basic_info']->user_id.'" class="view-btn2 directhire"> Hire </a> </div>

                                </div>
                            </div>';
			/*if(!empty($user_skills)){
				foreach($user_skills as $skrow){
					$output .='<li>'.$skrow->name.'</li>';	
				}
			}*/
							
           $output .= '    <div class="rated">
                            <ul>
                                <li> $'.$total_earning.'k <small> Earned </small> </li>
                                <li> '.$job_completion_count.' <small> Job Completed </small> </li>
                                <li> A+ <small> Top Rated </small> </li>
                            </ul>
                            <p>'.$row['basic_info']->bio.'</p>
                        </div>
                    </div>'; 
            }
        }  

        return $output;                                                     		
	}

	public function upcoming_projects_page($pageIndex = 0){

		$CI =& get_instance();
		$data = $userInfo = $userData = array();
		$CI->load->model('Users');
		$CI->load->library('Ltask');		

        $user_upcoming_jobs = $CI->ltask->get_user_upcoming_task($CI->session->all_userdata());
        $userData = $CI->Users->get_user_profile_info_by_id($CI->session->userdata('user_id'));
	    $user_profile_image = $CI->session->userdata('user_image');
	    if(empty($user_profile_image)) {
	    	$user_profile_image = base_url('assets/img/no-image.png');
	    } else {
	    	$user_profile_image = base_url('uploads/user/profile_image/'.$user_profile_image);	    	
	    }
        $positivecoin=0;			
        if($userData['basic_info']->total_coins>=0){ $positivecoin='+ '.$userData['basic_info']->total_coins;}else{ $positivecoin=$userData['basic_info']->total_coins;}
        if(!empty($userData)) {
        	$spend_by_user = $CI->Tasks->get_user_total_spend($CI->session->userdata('user_id'));
            $userInfo = array('id' => $userData['basic_info']->user_id, 'name' => $userData['basic_info']->name, 'country' => $userData['basic_info']->country, 'gender' => $userData['basic_info']->gender, 'date_of_birth' => $userData['basic_info']->date_of_birth, 'bio' => $userData['basic_info']->bio, 'address' => $userData['basic_info']->address, 'state' => $userData['basic_info']->state, 'city' => $userData['basic_info']->city, 'vat' => $userData['basic_info']->vat, 'user_languages' => implode(', ', $userData['user_selected_languages']), 'user_skills' => $userData['user_selected_skills'], 'user_image' => $user_profile_image, 'spend_by_user' => $spend_by_user, 'total_positive_coins' => $positivecoin, 'total_negative_coins'=> $userData['basic_info']->total_negative_coins);

        }

		$data['user_info'][] = $userInfo;        
        $data = array_merge($data, $user_upcoming_jobs);
		$AccountForm = $CI->parser->parse('user/upcoming-projects',$data,true);
		return $AccountForm;
	}	

	public function hired($pageIndex = 0){
		$CI =& get_instance();
		$data = $userInfo = array();
		$CI->load->model('Users');
		$CI->load->library('Ltask');		

        $user_hired_jobs = $CI->ltask->get_user_hired_job_list($CI->session->all_userdata());
        
		//echo '<pre>'; print_r($user_hired_jobs); die;
		
		$userData = $CI->Users->get_user_profile_info_by_id($CI->session->userdata('user_id'));
	    $user_profile_image = $CI->session->userdata('user_image');
	    if(empty($user_profile_image)) {
	    	$user_profile_image = base_url('assets/img/no-image.png');
	    } else {
	    	$user_profile_image = base_url('uploads/user/profile_image/'.$user_profile_image);	    	
	    }
        
        if(!empty($userData)) {
        	$spend_by_user = $CI->Tasks->get_user_total_spend($CI->session->userdata('user_id'));
            $positivecoin=0;			
            if($userData['basic_info']->total_coins>=0){ $positivecoin='+ '.$userData['basic_info']->total_coins;}else{ $positivecoin=$userData['basic_info']->total_coins;}
            $userInfo = array('id' => $userData['basic_info']->user_id, 'name' => $userData['basic_info']->name, 'country' => $userData['basic_info']->country, 'gender' => $userData['basic_info']->gender, 'date_of_birth' => $userData['basic_info']->date_of_birth, 'bio' => $userData['basic_info']->bio, 'address' => $userData['basic_info']->address, 'state' => $userData['basic_info']->state, 'city' => $userData['basic_info']->city, 'vat' => $userData['basic_info']->vat, 'user_languages' => implode(', ', $userData['user_selected_languages']), 'user_skills' => $userData['user_selected_skills'], 'user_image' => $user_profile_image, 'spend_by_user' => $spend_by_user,'total_positive_coins' => $positivecoin, 'total_negative_coins'=> $userData['basic_info']->total_negative_coins);

        }

		$data['user_info'][] = $userInfo;        
        $data = array_merge($data, $user_hired_jobs);
		$AccountForm = $CI->parser->parse('user/hired',$data,true);
		return $AccountForm;
	}

    public function client_portfolio_page(){
        $CI =& get_instance();
        $data = $arrCountry = $arrLanguage = $arrSkills = $userInfo = array();
        $CI->load->model('Users');

        $userData = $CI->Users->get_user_profile_info_by_id($CI->session->userdata('user_id'));
        $portfolioData = $CI->Users->get_user_portfolio_id($CI->session->userdata('user_id'));
        $user_profile_image = $CI->session->userdata('user_image');
        if(empty($user_profile_image)) {
            $user_profile_image = base_url('assets/img/no-image.png');
        } else {
            $user_profile_image = base_url('uploads/user/profile_image/'.$user_profile_image);          
        }         

        if(!empty($userData)) {
            $userInfo = array('id' => $userData['basic_info']->user_id, 'name' => $userData['basic_info']->name, 'country' => $userData['basic_info']->country, 'gender' => $userData['basic_info']->gender, 'date_of_birth' => $userData['basic_info']->date_of_birth, 'bio' => $userData['basic_info']->bio, 'profiletitle' => $userData['basic_info']->profile_title, 'address' => $userData['basic_info']->address, 'state' => $userData['basic_info']->state, 'city' => $userData['basic_info']->city, 'vat' => $userData['basic_info']->vat, 'user_languages' => implode(', ', $userData['user_selected_languages']), 'user_skills' => $userData['user_selected_skills'],'usersk' => $userData['user_skills'], 'user_image' => $user_profile_image);

        }

                   
        $data['user_info'][] = $userInfo;
        $data['portfolioData']= $portfolioData;
        $AccountForm = $CI->parser->parse('user/freelancer-portfolio.php',$data,true);
        return $AccountForm;
    }	

    public function client_bio_page() {
        $CI = & get_instance();
        $data = $arrCountry = $arrLanguage = $arrSkills = $arrSkillsName = $userInfo = array();
        $CI->load->model('Users');
        $CI->load->helper('captcha');

        $userData = $CI->Users->get_user_profile_info_by_id($CI->session->userdata('user_id'));
        $user_profile_image = $CI->session->userdata('user_image');
        if (empty($user_profile_image)) {
            $user_profile_image = base_url('assets/img/no-image.png');
        } else {
            $user_profile_image = base_url('uploads/user/profile_image/' . $user_profile_image);
        }

        if (!empty($userData)) {
            $userInfo = array('id' => $userData['basic_info']->user_id, 'name' => $userData['basic_info']->name, 'profile_status' => $userData['basic_info']->profile_status, 'phone_no' => $userData['basic_info']->phone_no, 'country' => $userData['basic_info']->country, 'gender' => $userData['basic_info']->gender, 'date_of_birth' => $userData['basic_info']->date_of_birth, 'bio' => trim($userData['basic_info']->bio), 'bio_count' => strlen(trim($userData['basic_info']->bio)), 'profiletitle' => $userData['basic_info']->profile_title, 'profiletitleskill' => $userData['basic_info']->profile_title_skill, 'address' => $userData['basic_info']->address, 'state' => $userData['basic_info']->state, 'city' => $userData['basic_info']->city, 'vat' => $userData['basic_info']->vat, 'user_languages' => implode(', ', $userData['user_selected_languages']), 'user_skills' => $userData['user_selected_skills'], 'usersk' => $userData['user_skills'], 'user_image' => $user_profile_image);
        }

        $countries = $CI->Countries->get_all_country_info();
        if (!empty($countries)) {
            foreach ($countries as $country) {
                $arrCountry[] = array('key' => $country->country_id, 'value' => $country->name, 'currentselection' => ((!empty($userInfo['country']) && $userInfo['country'] == $country->name) ? 'selected' : ''));
            }
        }

        $languages = $CI->Languages->get_all_language_info();
        $user_sel_lang = $CI->Users->get_user_selected_languages_by_id($CI->session->userdata('user_id'));
        if (!empty($languages)) {
            foreach ($languages as $language) {
                $arrLanguage[] = array('key' => $language->language_id, 'value' => $language->name, 'currentselection' => ((!empty($user_sel_lang) && in_array($language->language_id, $user_sel_lang)) ? 'selected' : ''));
            }
        }

        $skills = $CI->Skills->get_all_skill_info();
        $user_sel_skills = $CI->Users->get_user_selected_skills_by_id($CI->session->userdata('user_id'));

        $user_skills_name = $CI->Users->get_user_selected_skillsname_by_id($CI->session->userdata('user_id'));
        $user_active_skills = $CI->Users->get_user_title_skillsname($CI->session->userdata('user_id'));


        if (!empty($skills)) {
            foreach ($skills as $skill) {
                $arrSkills[] = array('key' => $skill->area_of_interest_id, 'value' => $skill->name, 'currentselection' => ((!empty($user_sel_skills) && in_array($skill->area_of_interest_id, $user_sel_skills)) ? 'selected' : ''));
            }
        }


        if (!empty($user_skills_name)) {
            foreach ($user_skills_name as $userskill) {
                $arrSkillsName[] = array('key' => $userskill->area_of_interest_id, 'value' => $userskill->name, 'currentselections' => ((!empty($user_active_skills) && in_array($userskill->name, $user_active_skills)) ? 'selected' : ''));
            }
        }

        // Captcha configuration
        $config = array(
            'img_path' => $_SERVER['DOCUMENT_ROOT'] . '/hirenwork/assets/captcha_images/',
            'img_url' => base_url() . 'assets/captcha_images/',
            'font_path' => $_SERVER['DOCUMENT_ROOT'] . '/hirenwork/assets/fonts/texb.ttf',
            'ImageWidth' => 250,
            'ImageHeight' => 30,
        );
//        $config = array(
//            'img_path'      => 'captcha_images/',
//            'img_url'       => base_url().'assets/captcha_images/',
//            'font_path'     => 'system/fonts/texb.ttf',
//            'img_width'     => '160',
//            'img_height'    => 50,
//            'word_length'   => 8,
//            'font_size'     => 18
//        );

        $captcha = create_captcha($config);
        $CI->session->unset_userdata('captchaCode');
        $CI->session->set_userdata('captchaCode', $captcha['word']);
        $data['captchaImg'] = $captcha['image'];

        $data['countries'] = $arrCountry;
        $data['languages'] = $arrLanguage;
        $data['skills'] = $arrSkills;
        $data['user_skills_name'] = $arrSkillsName;
        $data['user_info'][] = $userInfo;
//        c_pr($userInfo);
        $AccountForm = $CI->parser->parse('user/client-bio', $data, true);
        return $AccountForm;
    }

	public function gender_page(){
		$CI =& get_instance();
		$data = $arrGender = $userInfo = array();
		$CI->load->model('Users');

	    $user_profile_image = $CI->session->userdata('user_image');
	    if(empty($user_profile_image)) {
	    	$user_profile_image = base_url('assets/img/no-image.png');
	    } else {
	    	$user_profile_image = base_url('uploads/user/profile_image/'.$user_profile_image);	    	
	    }
        $userData       = $CI->Users->get_user_profile_info_by_id($CI->session->userdata('user_id'));
        $maleChecked    = "";
        $femaleChecked  = "";
        if($userData['basic_info']->gender == 'M') {
            $maleChecked    = "checked";
            $femaleChecked  = "";
        } else if ($userData['basic_info']->gender == 'F'){
            $maleChecked    = "";
            $femaleChecked  = "checked";
        }
        $arrGender[] = array('key' => 'M', 'value' => 'Male', 'checked' => $maleChecked, 'element_id' => 'radio-btn-1', 'icon' => base_url('assets/img/maleIcon.png'));
        $arrGender[] = array('key' => 'F', 'value' => 'Female', 'checked' => $femaleChecked, 'element_id' => 'radio-btn-2', 'icon' => base_url('assets/img/femaleIcon.png'));
//        if($userData['basic_info']->gender == 'M') {
//            $arrGender[] = array('key' => 'M', 'value' => 'Male', 'checked' => 'checked', 'element_id' => 'radio-btn-1', 'icon' => base_url('assets/img/maleIcon.png'));
//            $arrGender[] = array('key' => 'F', 'value' => 'Female', 'checked' => '', 'element_id' => 'radio-btn-2', 'icon' => base_url('assets/img/femaleIcon.png'));
//        } else {
//            $arrGender[] = array('key' => 'M', 'value' => 'Male', 'checked' => '', 'element_id' => 'radio-btn-1', 'icon' => base_url('assets/img/maleIcon.png'));
//            $arrGender[] = array('key' => 'F', 'value' => 'Female', 'checked' => 'checked', 'element_id' => 'radio-btn-2', 'icon' => base_url('assets/img/femaleIcon.png')); 
//        }

        if(!empty($userData)) {
            $userInfo = array('id' => $userData['basic_info']->user_id, 'name' => $userData['basic_info']->name, 'country' => $userData['basic_info']->country, 'gender' => $arrGender, 'date_of_birth' => $userData['basic_info']->date_of_birth, 'bio' => $userData['basic_info']->bio, 'address' => $userData['basic_info']->address, 'state' => $userData['basic_info']->state, 'city' => $userData['basic_info']->city, 'vat' => $userData['basic_info']->vat, 'user_image' => $user_profile_image);
        }
        $data['user_info'][] = $userInfo;       			
		$AccountForm = $CI->parser->parse('user/gender',$data,true);
		return $AccountForm;
	}	

	public function payment_details_page(){

		$CI =& get_instance();
        $CI->load->model('Users');

		$data = $userInfo = $user_cc_info = $card_expire_month = $card_expire_year = array();
		$arrMonth = array(1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April', 5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August', 9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December');

	    $user_profile_image = $CI->session->userdata('user_image');
	    if(empty($user_profile_image)) {
	    	$user_profile_image = base_url('assets/img/no-image.png');
	    } else {
	    	$user_profile_image = base_url('uploads/user/profile_image/'.$user_profile_image);	    	
	    }

        $userData = $CI->Users->get_user_profile_info_by_id($CI->session->userdata('user_id'));	
        if(!empty($userData)) {
            $userInfo = array('id' => $userData['basic_info']->user_id, 'name' => $userData['basic_info']->name, 'country' => $userData['basic_info']->country, 'gender' => $userData['basic_info']->gender, 'date_of_birth' => $userData['basic_info']->date_of_birth, 'bio' => $userData['basic_info']->bio, 'address' => $userData['basic_info']->address, 'state' => $userData['basic_info']->state, 'city' => $userData['basic_info']->city, 'vat' => $userData['basic_info']->vat, 'user_image' => $user_profile_image);
        }
        $data['user_info'][] = $userInfo;
        $userCardData = $CI->Users->get_user_credit_card_info($CI->session->userdata('user_id'));
        if(!empty($userCardData)) {
            for($i = 1; $i <= 12; $i++) {
            	$card_expire_month[] = array('key' =>  str_pad($i, 2, "0", STR_PAD_LEFT), 'val' => $arrMonth[$i], 'selected' => (($i == (int)$userCardData->card_expire_month)?'selected':''));
            }

            $currentYear = (int)date("Y");
            for($i = 1; $i <= 12; $i++) {
            	$card_expire_year[] = array('key' =>  ($currentYear + $i), 'val' => ($currentYear + $i), 'selected' => ((($currentYear + $i) == (int)$userCardData->card_expire_year)?'selected':''));
            }

            $user_cc_info = array('card_no' => trim($userCardData->card_no), 'card_expire_month' => $card_expire_month, 'card_expire_year' => $card_expire_year, 'card_cvv' => $userCardData->card_cvv);
        } else {
            for($i = 1; $i <= 12; $i++) {
            	$card_expire_month[] = array('key' =>  str_pad($i, 2, "0", STR_PAD_LEFT), 'val' => $arrMonth[$i], 'selected' => '');
            }

            $currentYear = (int)date("Y");
            for($i = -1; $i <= 12; $i++) {
            	$card_expire_year[] = array('key' =>  ($currentYear + $i), 'val' => ($currentYear + $i), 'selected' => '');
            }
            $user_cc_info = array('card_no' => '', 'card_expire_month' => $card_expire_month, 'card_expire_year' => $card_expire_year, 'card_cvv' => '');        	
        }       

        $data['user_cc_info'][] = $user_cc_info;
		$AccountForm = $CI->parser->parse('user/payment',$data,true);
		return $AccountForm;
	}

	public function public_profile_page() {

            $CI = & get_instance();
            $data = $userInfo = array();
            $CI->load->model('Users');
            $CI->load->model('Reviews');

            if ($CI->uri->segment(2) != '') {
                $user_public_id = $CI->uri->segment(2);
                $user_basic_info = $CI->Users->get_user_info_by_profile_id($user_public_id);
                $user_id = $user_basic_info->user_id;
            } else {
                $user_id = $CI->session->userdata('user_id');
            }

            $userLoginData = $CI->Users->get_user_info_by_id($user_id);
            $userData = $CI->Users->get_user_profile_info_by_id($user_id);
            $portfolio = $CI->Users->get_user_portfolio_id($user_id);

            $tFilter['not_user_id'] = $user_id;
            $tFilter['limit']       = array('limit' => 5);
            $top_freelancers        = $CI->Users->get_top_freelancers_profile_info($tFilter);


            //echo '<pre>'; print_r($userLoginData); print_r($userData); die;

            if (!empty($userLoginData)) {

                if ($userLoginData->user_type == 3) {
                    // client part
                    $view_page = 'user/public-profile';
                } else if ($userLoginData->user_type == 4) {
                    // freelancer part
                    $view_page = 'user/public_profile_freelancer';
                }

                $user_profile_image = $userLoginData->profile_image;

                if (empty($user_profile_image)) {
                    $user_profile_image = base_url('assets/img/no-image.png');
                } else {
                    $user_profile_image = base_url('uploads/user/profile_image/' . $user_profile_image);
                }
            }

            if (!empty($userData)) {
                $positivecoin = 0;
                if ($userLoginData->total_coins >= 0) {
                    $positivecoin = '+ ' . $userLoginData->total_coins;
                } else {
                    $positivecoin = $userLoginData->total_coins;
                }
                $userInfo = array(
                    'id' => $userData['basic_info']->user_id,
                    'name' => $userData['basic_info']->name,
                    'country' => $userData['basic_info']->country,
                    'gender' => (($userData['basic_info']->gender == 'M') ? 'Male' : 'Female'),
                    'date_of_birth' => $userData['basic_info']->date_of_birth,
                    'bio' => $userData['basic_info']->bio,
                    'address' => $userData['basic_info']->address,
                    'state' => $userData['basic_info']->state,
                    'city' => $userData['basic_info']->city,
                    'vat' => $userData['basic_info']->vat,
                    'is_login' => (($userLoginData->is_login == '1') ? '<img src="' . base_url('assets/img/activeIcon.png') . '" alt="Online"/>' : ''),
                    'user_languages' => implode(', ', $userData['user_selected_languages']),
                    'user_skills' => $userData['user_selected_skills'],
                    'user_image' => $user_profile_image,
                    'total_positive_coins' => $positivecoin,
                    'total_negative_coins' => $userLoginData->total_negative_coins,
                    'total_points' => $userLoginData->total_points
                );
            }

            $data['user_info'][] = $userInfo;


            $condition = array("review_received" => $CI->session->userdata('user_id'));
            $reviews_data = $CI->Reviews->get_reviews($condition);

            $reviews = array();
            if (count($reviews_data) > 0) {

                foreach ($reviews_data as $rv) {
                    $user_profile_image = $rv->profile_image;
                    if (empty($user_profile_image)) {
                        $user_profile_image = base_url('assets/img/no-image.png');
                    } else {
                        $user_profile_image = base_url('uploads/user/profile_image/' . $user_profile_image);
                    }
                    $rpositivecoin = 0;
                    if ($rv->total_coins >= 0) {
                        $rpositivecoin = '+ ' . $rv->total_coins;
                    } else {
                        $rpositivecoin = $rv->total_coins;
                    }
                    $reviews[] = array(
                        'user_id' => $rv->review_received,
                        'name' => $rv->name,
                        'review_provided' => $rv->review_provided,
                        'country' => $rv->country,
                        'state' => $rv->state,
                        'city' => $rv->city,
                        'profile_image' => $user_profile_image,
                        'profile_id' => $rv->profile_id,
                        'total_positive_coins' => $rpositivecoin,
                        'total_negative_coins' => $rv->total_negative_coins,
                    );
                }
            }

            $data['reviews']            = $reviews;
            $data['portfolio']          = $portfolio;
            $data['top_freelancers']    = $top_freelancers;

            if ($CI->session->userdata('user_type') == 3) {
                $AccountForm = $CI->parser->parse($view_page, $data, true);
            } else {
                $AccountForm = $CI->parser->parse($view_page, $data, true);
            }

            return $AccountForm;
        }


	public function settings_page(){

		$CI =& get_instance();
        $CI->load->model('Users');

		$data = $userInfo = $user_cc_info = $card_expire_month = $card_expire_year = array();
	    $user_profile_image = $CI->session->userdata('user_image');
	    if(empty($user_profile_image)) {
	    	$user_profile_image = base_url('assets/img/no-image.png');
	    } else {
	    	$user_profile_image = base_url('uploads/user/profile_image/'.$user_profile_image);	    	
	    }

        $userData = $CI->Users->get_user_profile_info_by_id($CI->session->userdata('user_id'));	
        if(!empty($userData)) {
            $userInfo = array('id' => $userData['basic_info']->user_id, 'name' => $userData['basic_info']->name, 'country' => $userData['basic_info']->country, 'gender' => $userData['basic_info']->gender, 'date_of_birth' => $userData['basic_info']->date_of_birth, 'bio' => $userData['basic_info']->bio, 'address' => $userData['basic_info']->address, 'state' => $userData['basic_info']->state, 'city' => $userData['basic_info']->city, 'vat' => $userData['basic_info']->vat, 'user_image' => $user_profile_image);
        }

        $data['user_info'][] = $userInfo;
		$AccountForm = $CI->parser->parse('user/settings',$data,true);

		return $AccountForm;
	}

        public function activeUserProfile($userInfo = null) {
        $CI = & get_instance();

        if (!empty($userInfo)) {


            $inputCaptcha = $CI->input->post('captcha');
            $sessCaptcha = $CI->session->userdata('captchaCode');
            if ($inputCaptcha === $sessCaptcha) {
//            if (true) {
                $CI = & get_instance();
                $msg = '';
                $CI->load->model('Users');
                $userData = $CI->Users->get_user_profile_info_by_id($CI->session->userdata('user_id'));
                $profile_image = trim($userData['basic_info']->profile_image);
                $bio = trim($userData['basic_info']->bio);
                $profile_title = trim($userData['basic_info']->profile_title);
                $state = trim($userData['basic_info']->state);
                $address = trim($userData['basic_info']->address);
                $city = trim($userData['basic_info']->city);
                $vat = trim($userData['basic_info']->vat);
                $user_languages = count($userData['user_selected_languages']);
                $skill = count($userData['user_selected_skills']);
                $name = $userData['basic_info']->name;
                $phone_no = $userData['basic_info']->phone_no;

                if ($profile_image == '' || $bio == '' || $address == '' || $skill = 0 || $phone_no == '') {

                    if ($profile_image == '') {
                        $msg .= ' Photo ,';
                    }

                    if ($phone_no == 0) {
                        $msg .= ' Phone No,';
                    }

                    if ($skill == 0) {
                        $msg .= ' Skill ,';
                    }

                    if ($address == '') {
                        $msg .= ' Address ,';
                    }

                    if ($bio == '') {
                        $msg .= ' Bio.';
                    }

//                    if ($profile_title == '') {
//                        $msg .= ' Profile title ,';
//                    }
                    
                    $CI->session->set_flashdata('flash_error_msg', 'Before send request please fill up ' . $msg);
                    redirect('/user-bio');
                } else {
                    $CI->load->model('Admin_notification');
                    $user_name = (isset($userData['basic_info']->name)) ? $userData['basic_info']->name : '';
                    $notification_data['msg'] = " Frelancer ". $user_name . " complete Bio section";
                    $CI->Admin_notification->add_notification($notification_data);
                    $from = $CI->config->item('smtp_user');
                    $subject = 'New Account Approve Request';
                    $message = 'Dear Admin,<br><br> ' . $name . '( ' . ($CI->session->userdata('user_id')) . ' )' . ' Send a  account approve request. <br><br>
                               Thanks';
                    $CI->load->library('email');
                    //send email
                    $CI->email->set_newline("\r\n");
                    //$CI->email->from($config['smtp_user']);
                    $CI->email->from('info@hirenwork.com');
                    $CI->email->to($CI->config->item('admin_email'));
                    //$CI->email->to('debashis.midya87@gmail.com');
                    $CI->email->subject($subject);
                    $CI->email->message($message);
                    $CI->email->send();
                    $CI->session->set_flashdata('flash_success_msg', 'Profile is under review after 3 to 4 days if all the data correct then this will active.');
                    redirect('/user-bio');
                }
            } else {

                $CI->session->set_flashdata('errmsg', '<strong>Failed!</strong> Captcha does not match, please try again.');
                redirect('/user-bio');
            }
        } else {
            $CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Unable to Send request.</div>');
            echo json_encode(array('status' => FALSE, 'message' => 'Unable to save user data.'));
        }
    }	

	public function updateUserData($userInfo = null){
		if(!empty($userInfo)) {
		    $CI =& get_instance();
            $CI->load->model('Users');

		    $data = $CI->input->post();


		    $result = $CI->Users->update_user($data, $userInfo['user_id']);
		    if($result) {
		    	if($userInfo['user_id'] == $CI->session->userdata('user_id')) {
		    		$CI->auth->update_user_session_data($userInfo['user_id']);
		    	}

                $CI->session->set_flashdata('msg', '<div class="alert alert-success text-center">User data updated successfully.</div>');
                echo json_encode(array('status' =>  TRUE, 'message' => 'User data save successfully.'));
		    } else {
                $CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Unable to update user data.</div>');
                echo json_encode(array('status' =>  FALSE, 'message' => 'Unable to save user data.'));
		    }
		} else {
            $CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Unable to update user data.</div>');
            echo json_encode(array('status' =>  FALSE, 'message' => 'Unable to save user data.'));
		}
	}

    public function insertPortfolioData($userInfo = null){
        if(!empty($userInfo)) {
            $CI =& get_instance();
            $CI->load->model('Users');
            $data = $CI->input->post();
            $imagename='';
            $editId = $data['editId'];


            if($editId !='' && empty($_FILES['projectImage']['name'])){
               $oldimage = $CI->Users->get_portfolio_old_image($editId);
               $old = $oldimage->portfolio_image;
               $imagename = $old;
            }
            
            if(is_array($_FILES) && !empty($_FILES['projectImage']['name'])){
                if(is_uploaded_file($_FILES['projectImage']['tmp_name'])) {
                    $path = $_FILES['projectImage']['name'];
                    $path_parts = pathinfo($path);
                    $filename = time() . '_' . $CI->session->userdata('user_id') . '.' . $path_parts['extension'];
                    //print_r($path_parts);

                    $sourcePath = $_FILES['projectImage']['tmp_name'];
                    $targetPath = "./uploads/user/portfolio_image/".$filename;
                    if(move_uploaded_file($sourcePath,$targetPath)) {

                        if($editId!=''){
                          $oldimage = $CI->Users->get_portfolio_old_image($editId);
                          $old = $oldimage->portfolio_image;
                          unlink("./uploads/user/portfolio_image/".$old);
                        }

                        $imagename = $filename;
                    }
                }
            }
            $result = $CI->Users->insert_portfolio($data,$editId,$imagename, $userInfo['user_id']);

            if($result) {
                if($userInfo['user_id'] == $CI->session->userdata('user_id')) {
                    $CI->auth->update_user_session_data($userInfo['user_id']);
                }

                $CI->session->set_flashdata('msg', '<div class="alert alert-success text-center">User data updated successfully.</div>');
                //echo json_encode(array('status' =>  TRUE, 'message' => 'User data save successfully.'));
                redirect ('/portfolio');
            } else {
                $CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Unable to update user data.</div>');
                echo json_encode(array('status' =>  FALSE, 'message' => 'Unable to save user data.'));
            }
        } else {
            $CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Unable to update user data.</div>');
            echo json_encode(array('status' =>  FALSE, 'message' => 'Unable to save user data.'));
        }
    }

	
	public function UpdateProfile_title($userInfo = null)
	{
		if(!empty($userInfo)) {
		    $CI =& get_instance();
            $CI->load->model('Users');

		    $data = $CI->input->post();
		    $result = $CI->Users->UpdateProfile_title($data, $userInfo['user_id']);
		    if($result==1) {
		    	if($userInfo['user_id'] == $CI->session->userdata('user_id')) {
		    		$CI->auth->update_user_session_data($userInfo['user_id']);
		    	}

                $CI->session->set_flashdata('msg', '<div class="alert alert-success text-center">User data updated successfully.</div>');
                echo json_encode(array('status' =>  TRUE, 'message' => 'User data save successfully.'));
		    } else if($result==2){
				$CI->session->set_flashdata('msg', '<div class="alert alert-success text-center">Please mention your skills in your profile title.</div>');
                echo json_encode(array('status' =>  TRUE, 'message' => 'Please mention your skills in your profile title.'));
			}else{
                $CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Unable to update user data.</div>');
                echo json_encode(array('status' =>  FALSE, 'message' => 'Unable to save user data.'));
		    }
		} else {
            $CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Unable to update user data.</div>');
            echo json_encode(array('status' =>  FALSE, 'message' => 'Unable to save user data.'));
		}
	}

	public function updateUserPassword($userInfo = null){
		$CI =& get_instance();
        $CI->load->model('Users');
			
		$CI->form_validation->set_rules('fldCurrentPassword','Current Password', 'trim|required');
		$CI->form_validation->set_rules('fldNewPassword','New Password', 'trim|required');
		$CI->form_validation->set_rules('fldConfirmPassword', 'Confirm Password', 'required|matches[fldNewPassword]');
		if($CI->form_validation->run() == false){
			$CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">'.validation_errors().'</div>');
			redirect('settings');
		}else{
			if(!empty($userInfo)) {
				$data = $CI->input->post(); //echo '<pre>'; print_r($data); print_r($userInfo); die;
				if($CI->Users->match_existing_password($data['fldCurrentPassword'], $userInfo['user_id'])) {
					$result = $CI->Users->change_user_password($data['fldNewPassword'], $userInfo['user_id']);
					if($result) {
						$CI->session->set_flashdata('msg', '<div class="alert alert-success text-center">User data updated successfully.</div>');
						//return TRUE;
						
						$CI->session->userdata = array();
						$CI->session->sess_destroy();
						redirect(base_url().'sign-in', 'refresh');
						
					}else{
						$CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Unable to update user password.</div>');
						//return FALSE;
						redirect('settings');
					}                
				}else {
					$CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Your existing password doesn\'t match with entered password.</div>');
					//return FALSE;
					redirect('settings');
				}
			}else{
				$CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Unable to update user data.</div>');
				//return FALSE;
				redirect('settings');
			}
		}
	}		

	public function updateUserCardData($userInfo = null){

		if(!empty($userInfo)) {
		    $CI =& get_instance();
		    $CI->load->model('Users');
		    $CI->load->library('cc_validation');

		    $data = $CI->input->post();
            $cardIsValid = $CI->cc_validation->validateCreditcard_number($data['fldCreditCardNo']);
            $cardExpiryIsValid = $CI->cc_validation->validateCreditCardExpirationDate($data['fldCardExpiryMonth'], $data['fldCardExpiryYear']);
            $cardCVVIsValid = $CI->cc_validation->validateCVV($data['fldCreditCardNo'], $data['fldCreditCardCvv']);
			
			if($cardIsValid['status'] == 'false'){
				$CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Card Number is Invalid! Unable to update card data.</div>');
                return FALSE;
			}elseif($cardExpiryIsValid == 'false'){
				$CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Card Already Expired! Unable to update card data.</div>');
                return FALSE;
			}elseif($cardCVVIsValid == 'false'){
				$CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid CVV Number! Unable to update card data.</div>');
                return FALSE;
			}else{
				$result = $CI->Users->update_user_card_data($data, $userInfo['user_id']);
		        if($result) {
		    	    if($userInfo['user_id'] == $CI->session->userdata('user_id')) {
		    		    $CI->auth->update_user_session_data($userInfo['user_id']);
		    	    }
                    $CI->session->set_flashdata('msg', '<div class="alert alert-success text-center">User card data updated successfully.</div>');
                    return TRUE;
		        }
			}
		}else{
            $CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Unable to update card data.</div>');
            return FALSE;
		}
	}

	public function removeUserSkillData(){

		$CI =& get_instance();
        $CI->load->model('Users');	

		$user_id = $CI->input->post('id');
		$skill_id = $CI->input->post('skill_id');

		if(!empty($user_id) && !empty($skill_id)) {
		    $result = $CI->Users->remove_user_skill_data($user_id, $skill_id);
		    if($result) {
                $CI->session->set_flashdata('msg', '<div class="alert alert-success text-center">User data updated successfully.</div>');
                echo json_encode(array('status' =>  TRUE, 'message' => 'User data save successfully.'));
		    } else {
                $CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Unable to update user data.</div>');
                echo json_encode(array('status' =>  FALSE, 'message' => 'Unable to save user data.'));
		    }
		} else {
            $CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Unable to update user data.</div>');
            echo json_encode(array('status' =>  FALSE, 'message' => 'Unable to save user data.'));
		}
	}

	public function save_validate_mobile_no($userInfo = null) {
		if(!empty($userInfo)) {	
		    $CI =& get_instance();
            $CI->load->model('Users');

		    $data = $CI->input->post();		
		    $result = $CI->Users->update_user($data, $userInfo['user_id']);

		    if($result) {
		    	if($userInfo['user_id'] == $CI->session->userdata('user_id')) {
		    		$CI->auth->update_user_session_data($userInfo['user_id']);
		    	}		    	
                $CI->session->set_flashdata('msg', '<div class="alert alert-success text-center">User data updated successfully.</div>');
                return json_encode(array('status' =>  TRUE, 'message' => 'User data save successfully.'));
		    } else {
                $CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Unable to update user data.</div>');
                return json_encode(array('status' =>  FALSE, 'message' => 'Unable to save user data.'));
		    }		    
		} else {
            $CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Unable to update user data.</div>');
            return json_encode(array('status' =>  FALSE, 'message' => 'Unable to save user data.'));
		}
	}	

	public function save_transactional_notification($userInfo = null) {
		if(!empty($userInfo)) {	
		    $CI =& get_instance();
            $CI->load->model('Users');
		    $data = $CI->input->post();		
		    $result = $CI->Users->update_user($data, $userInfo['user_id']);
		    if($result) {
		    	if($userInfo['user_id'] == $CI->session->userdata('user_id')) {
		    		$CI->auth->update_user_session_data($userInfo['user_id']);
		    	}		    	
                $CI->session->set_flashdata('msg', '<div class="alert alert-success text-center">User data updated successfully.</div>');
                return json_encode(array('status' =>  TRUE, 'message' => 'User data save successfully.'));
		    } else {
                $CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Unable to update user data.</div>');
                return json_encode(array('status' =>  FALSE, 'message' => 'Unable to save user data.'));
		    }		    
		} else {
            $CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Unable to update user data.</div>');
            return json_encode(array('status' =>  FALSE, 'message' => 'Unable to save user data.'));
		}
	}	

	public function save_task_update_notification($userInfo = null) {
		if(!empty($userInfo)) {	
		    $CI =& get_instance();
            $CI->load->model('Users');

		    $data = $CI->input->post();	
		    $result = $CI->Users->update_user($data, $userInfo['user_id']);

		    if($result) {
		    	if($userInfo['user_id'] == $CI->session->userdata('user_id')) {
		    		$CI->auth->update_user_session_data($userInfo['user_id']);
		    	}		    	
                $CI->session->set_flashdata('msg', '<div class="alert alert-success text-center">User data updated successfully.</div>');
                return json_encode(array('status' =>  TRUE, 'message' => 'User data save successfully.'));
		    } else {
                $CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Unable to update user data.</div>');
                return json_encode(array('status' =>  FALSE, 'message' => 'Unable to save user data.'));
		    }		    
		} else {
            $CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Unable to update user data.</div>');
            return json_encode(array('status' =>  FALSE, 'message' => 'Unable to save user data.'));
		}			
	}

	public function save_task_reminder_notification($userInfo = null) {
		if(!empty($userInfo)) {	
		    $CI =& get_instance();
            $CI->load->model('Users');
		    $data = $CI->input->post();		
		    $result = $CI->Users->update_user($data, $userInfo['user_id']);
		    if($result) {
		    	if($userInfo['user_id'] == $CI->session->userdata('user_id')) {
		    		$CI->auth->update_user_session_data($userInfo['user_id']);
		    	}		    	
                $CI->session->set_flashdata('msg', '<div class="alert alert-success text-center">User data updated successfully.</div>');
                return json_encode(array('status' =>  TRUE, 'message' => 'User data save successfully.'));
		    } else {
                $CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Unable to update user data.</div>');
                return json_encode(array('status' =>  FALSE, 'message' => 'Unable to save user data.'));
		    }
		} else {
            $CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Unable to update user data.</div>');
            return json_encode(array('status' =>  FALSE, 'message' => 'Unable to save user data.'));
		}			
	}			

	public function save_helpful_notification($userInfo = null) {
		if(!empty($userInfo)) {	
		    $CI =& get_instance();
            $CI->load->model('Users');
		    $data = $CI->input->post();		
		    $result = $CI->Users->update_user($data, $userInfo['user_id']);
		    if($result) {
		    	if($userInfo['user_id'] == $CI->session->userdata('user_id')) {
		    		$CI->auth->update_user_session_data($userInfo['user_id']);
		    	}		    	
                $CI->session->set_flashdata('msg', '<div class="alert alert-success text-center">User data updated successfully.</div>');
                return json_encode(array('status' =>  TRUE, 'message' => 'User data save successfully.'));
		    } else {
                $CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Unable to update user data.</div>');
                return json_encode(array('status' =>  FALSE, 'message' => 'Unable to save user data.'));
		    }		    
		} else {
            $CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Unable to update user data.</div>');
            return json_encode(array('status' =>  FALSE, 'message' => 'Unable to save user data.'));
		}			
	}

	public function save_user_profile_image($userInfo = null) {
		if(!empty($userInfo)) {	
		    $CI =& get_instance();
            $CI->load->model('Users');

            if(is_array($_FILES) && !empty($_FILES['userImage']['name'])){
            	if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
                    $path = $_FILES['userImage']['name'];
                    $path_parts = pathinfo($path);
                    $filename = time() . '_' . $CI->session->userdata('user_id') . '.' . $path_parts['extension'];
                    //print_r($path_parts);

					$sourcePath = $_FILES['userImage']['tmp_name'];
                    $targetPath = "./uploads/user/profile_image/".$filename;
                    if(move_uploaded_file($sourcePath,$targetPath)) {
                    	$existing_data = $CI->session->userdata('user_image');
                    	if(!empty($existing_data)) {
                    		unlink("./uploads/user/profile_image/".$existing_data);
                    	}

                        $data = array('fldProfileImage' => $filename);
		    		    $result = $CI->Users->update_user($data, $userInfo['user_id']);
		    		    if($result) {
		    		    	$CI->auth->update_user_session_data($userInfo['user_id']);
                            $CI->session->set_flashdata('msg', '<div class="alert alert-success text-center">Profile image updated successfully.</div>');
                            return json_encode(array('status' =>  TRUE, 'message' => 'User data save successfully.'));
		    		    } else {
                            unlink($targetPath);
                            $CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Unable to update user profile image.</div>');
                            return json_encode(array('status' =>  FALSE, 'message' => 'Unable to save user data.'));                            
		    		    }		    		                           
                    } else {
                        $CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Unable to update user profile image.</div>');
                        return json_encode(array('status' =>  FALSE, 'message' => 'Unable to save user data.'));
		            }
                } else {
                    $CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Unable to update user profile image.</div>');
                    return json_encode(array('status' =>  FALSE, 'message' => 'Unable to save user data.'));
		        }                
            } else {
                $CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Unable to update user profile image.</div>');
                return json_encode(array('status' =>  FALSE, 'message' => 'Unable to save user data.'));
		    }            
        } else {
            $CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Unable to update user profile image.</div>');
            return json_encode(array('status' =>  FALSE, 'message' => 'Unable to save user data.'));
		}         	
	}

	public function messages($user_id_to = '') {
            $CI = & get_instance();
            $data = $userInfo = array();
            $CI->load->model('Users');
            $CI->load->model('Messages');

            $userData = $CI->Users->get_user_profile_info_by_id($CI->session->userdata('user_id'));
            $user_profile_image = $CI->session->userdata('user_image');

            if (empty($user_profile_image)) {
                $user_profile_image = base_url('assets/img/no-image.png');
            } else {
                $user_profile_image = base_url('uploads/user/profile_image/' . $user_profile_image);
            }

            if ($user_id_to != '') {
                // message history
                $msghistory = $CI->Messages->get_message_data_by_id($user_id_to);
                $user_id = $CI->session->userdata('user_id');
                $q = $CI->db->query("UPDATE user_messages SET is_read='Y' WHERE user_id_to='" . $user_id . "' and user_id_from='" . $user_id_to . "'");
            } else {
                $msghistory = array();
            }


            // list of interested freelancer and client 
            $frndlist = $CI->Messages->get_friend_list($user_id_to);
//            echo '<pre>';  print_r($frndlist);echo '</pre>';die;   

            if (!empty($userData)) {

                $userInfo = array('id' => $userData['basic_info']->user_id, 'name' => $userData['basic_info']->name, 'country' => $userData['basic_info']->country, 'gender' => $userData['basic_info']->gender, 'date_of_birth' => $userData['basic_info']->date_of_birth, 'bio' => $userData['basic_info']->bio, 'address' => $userData['basic_info']->address, 'state' => $userData['basic_info']->state, 'city' => $userData['basic_info']->city, 'vat' => $userData['basic_info']->vat, 'user_image' => $user_profile_image, 'msghistory' => $msghistory, 'frndlist' => $frndlist);
            }

            $data['user_info'][] = $userInfo;
            $AccountForm = $CI->parser->parse('user/messages', $data, true);
            //echo '<pre>'; print_r($userInfo); echo '</pre>';exit;

            return $AccountForm;
        }

	public function addMsgUserData(){
		$CI =& get_instance();
		$CI->load->model('Users');
		$CI->load->model('Messages');
				
		$data = $CI->input->post();
		if(!empty($data)) {
			if(!empty($_FILES) && is_array($_FILES)){  

				$data['attachement'] = array();
	
				for($i = 0; $i<count($_FILES['uploadFiles']['name']); $i++) {
					$path = $_FILES['uploadFiles']['name'][$i];
					$path_parts = pathinfo($path);
					$filename = time() . $CI->session->userdata('user_id') . '_' . $path;	
					$sourcePath = $_FILES['uploadFiles']['tmp_name'][$i];
					$targetPath = "./uploads/messages/".$filename;
					if(move_uploaded_file($sourcePath,$targetPath)) {
						 $data['attachement'][] = array('fname' => $filename);
					}
				}
			}

			$userIdTo = $CI->input->post('user_to'); 
		    $result = $CI->Messages->add_user_message($data, $userIdTo);
			if($result) {
                $CI->session->set_flashdata('msg', '<div class="alert alert-success text-center">User data updated successfully.</div>');
                echo json_encode(array('status' =>  TRUE, 'message' => 'User data save successfully.'));
				redirect('messages/'.$userIdTo);
		    } else {
                $CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Unable to update user data.</div>');
                echo json_encode(array('status' =>  FALSE, 'message' => 'Unable to save user data.'));
		    }
		}else {
            $CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Unable to update user data.</div>');
            echo json_encode(array('status' =>  FALSE, 'message' => 'Unable to save user data.'));
		}	
	}
    
    public function analytics(){
        $CI =& get_instance();
        $CI->load->model('Tasks');
        $data = array();
        $allanalytics = $CI->Tasks->client_analytics($CI->session->userdata('user_id'));        
        $analytics = $allanalytics['analytics'];
        $month = $allanalytics['month'];        
        $total_spend = 0;
        foreach ($analytics as $key => $value) {
            $hire_date = new DateTime($value->hire_date);
            $hired_end_date = new DateTime($value->hired_end_date);
            $interval = $hire_date->diff($hired_end_date);
            $m = array();
            $m['y'] = $interval->y;
            $m['m'] = $interval->m;
            $m['d'] = $interval->d;
            $analytics[$key]->intervals = json_encode($m);
            $total_spend += $value->agreed_budget;
        }        
        $data['total_spend'] = $total_spend;
        $data['analytics'] = $analytics;
        $data['projects'] = array_slice($analytics, 0, 5);
        $data['has_more_project'] = count($analytics) > 5;
        $data['month'] = $month;
        $data['monthly_projects'] = $allanalytics['monthly_projects'];
        $data['yearly_projects'] = $allanalytics['yearly_projects'];
        $data['monthly_income'] = $allanalytics['monthly_income'];
        $data['yearly_income'] = $allanalytics['yearly_income'];
        $data['pending_projects'] = $allanalytics['pending_projects'];
        $data['total_offer'] = $allanalytics['total_offer'];
        $data['total_referral'] = $allanalytics['total_referral'];
        $data['total_microkey_projects'] = $allanalytics['total_microkey_projects'];        
        $AccountForm = $CI->parser->parse('user/analytics', $data, true);
        return $AccountForm;
    }

    public function analytics_all(){
        /*$CI =& get_instance();
        $CI->load->model('Tasks');
        $data = array();
        $analytics = $CI->Tasks->client_analytics($CI->session->userdata('user_id'));
        $data['analytics'] = $analytics['analytics'];
        $AccountForm = $CI->parser->parse('user/analytics_details', $data, true);
        return $AccountForm;*/
        $CI =& get_instance();
        $CI->load->model('Tasks');
        $data = array();
        $data['analytics'] = $CI->Tasks->project_details_client($CI->session->userdata('user_id'), 100);
        $AccountForm = $CI->parser->parse('user/analytics_details', $data, true);
        return $AccountForm;
    }   
}

