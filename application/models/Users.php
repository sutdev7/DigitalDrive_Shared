<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Model
{
    
    public function __construct()
    {
        parent::__construct();
        $this->tableName  = 'user_login';
        $this->primaryKey = 'user_id';
    }
    
    /*
     * User registration
     */
    public function register_user($user_data = array())
    {
        
        $area_of_interest_id = '';
        
        if (empty($user_data))
            return array(
                'status' => FALSE,
                'message' => 'invalid_data'
            );
        
        $account_exists = $this->db->select('*')->from('user_login')->where('email', $user_data['fldEmail'])->get()->num_rows();
        if ($account_exists > 0) {
            return array(
                'status' => FALSE,
                'message' => 'account_already_exists'
            );
        } else {
            $id_generator     = $this->auth->generator(10);
            $date_of_creation = date("Y-m-d H:i:s");
            
            $data1 = array(
                'user_id' => $id_generator,
                'name' => $user_data['fldName'],
                'country' => $user_data['fldCountry'],
                'status' => 1,
                'doc' => $date_of_creation
            );
            
            $result = $this->db->insert('users', $data1);
            //$insert_id = $this->db->insert_id();
            
            if (isset($user_data['fldSkills']) && !empty($user_data['fldSkills'])) {
                
                foreach ($user_data['fldSkills'] as $value) {
                    $this->db->select('area_of_interest_id');
                    $this->db->from('area_of_interest');
                    $this->db->where('name', $value);
                    $query               = $this->db->get();
                    $data                = $query->row();
                    $area_of_interest_id = isset($data->area_of_interest_id) ? $data->area_of_interest_id : '';
                    if ($area_of_interest_id == '') {
                        
                        $data1 = array(
                            'name' => $value,
                            'detail' => '',
                            'doc' => date("Y-m-d H:i:s"),
                            'dom' => date("Y-m-d H:i:s"),
                            'status' => 1,
                            'deleted' => 0
                        );
                        
                        $result              = $this->db->insert('area_of_interest', $data1);
                        $area_of_interest_id = $this->db->insert_id();
                    }
                    
                    $this->db->insert('user_area_of_interest', array(
                        'user_id' => $id_generator,
                        'area_of_interest_id' => $area_of_interest_id,
                        'doc' => date('Y-m-d h:i:s')
                    ));
                }
            }
            
            if ($result) {
                //Inset user Login table 
                $password         = $user_data['fldPassword'];
                $password         = md5("ctgs" . $password);
                $code             = $this->auth->generateCode(10);
                $user_type        = 2;
                $profile_status   = 1;
                $total_connects   = 10;
                $unique_id        = '';
                $unique_user_key  = '';
                $notification_msg = "";
                if ($user_data['fldUserType'] == 'client') {
                    $user_type    = 3;
                    $query_status = $this->db->query("SELECT unique_id FROM user_login WHERE unique_id LIKE '%CL%' ORDER BY unique_id DESC");
                    $get_result   = $query_status->result();
                    
                    foreach ($get_result as $Fr) {
                        $Fr_unique_id  = $Fr->unique_id;
                        $Fr_uniquefr[] = substr($Fr_unique_id, 2);
                    }
                    
                    $arr     = implode(',', $Fr_uniquefr);
                    $numbers = array(
                        $Fr_uniquefr
                    );
                    
                    
                    
                    $missing = array();
                    for ($i = 1; $i < max($Fr_uniquefr); $i++) {
                        if (!in_array($i, $Fr_uniquefr))
                            $missing[] = $i;
                    }
                    //}
                    
                    if (!empty($missing)) {
                        $last_id= array_values($missing)[0];
                        
                    } else {
                        $last_id = $this->Users->getUserUniqueId($user_type);
                    }
                    
                    //$last_id        = $this->Users->getUserUniqueId($user_type);
                    $profile_status   = 0;
                    $total_connects   = 10;
                    $unique_id        = 'CL' . $last_id;
                    $unique_user_key  = $last_id;
                    $notification_msg = $user_data['username'] . " New Client Register";
                    $notif            = "CL";
                } elseif ($user_data['fldUserType'] == 'freelancer') {
                    $user_type    = 4;
                    $query_status = $this->db->query("SELECT unique_id FROM user_login WHERE unique_id LIKE '%FR%' ORDER BY unique_id DESC");
                    $get_result   = $query_status->result();
                    
                    foreach ($get_result as $Fr) {
                        $Fr_unique_id  = $Fr->unique_id;
                        $Fr_uniquefr[] = substr($Fr_unique_id, 2);
                    }
                    $arr     = implode(',', $Fr_uniquefr);
                    $numbers = array(
                        $Fr_uniquefr
                    );
                    
                    
                    
                    $missing = array();
                    for ($i = 1; $i < max($Fr_uniquefr); $i++) {
                        if (!in_array($i, $Fr_uniquefr))
                            $missing[] = $i;
                    }
                    //}
                    if (!empty($missing)) {
                        $last_id= array_values($missing)[0];
                        
                    } else {
                        $last_id = $this->Users->getUserUniqueId($user_type);
                    }
                    //echo 'mm'.$last_id; die();
                    
                    $profile_status   = 0;
                    $total_connects   = 30;
                    $unique_id        = 'FR' . $last_id;
                    $unique_user_key  = $last_id;
                    $notification_msg = $user_data['username'] . " New Freelancer Register";
                    $notif            = "FR";
                    
                } elseif ($user_data['fldUserType'] == 'nlancer') {
                    $user_type    = 5;
                    //$last_id        = $this->Users->getUserUniqueId($user_type);
                    $query_status = $this->db->query("SELECT unique_id FROM user_login WHERE unique_id LIKE '%NL%' ORDER BY unique_id DESC");
                    $get_result   = $query_status->result();
                    
                    foreach ($get_result as $NL) {
                        $Fr_unique_id  = $NL->unique_id;
                        $Fr_uniquefr[] = substr($Fr_unique_id, 2);
                    }
                    $arr     = implode(',', $Fr_uniquefr);
                    $numbers = array(
                        $Fr_uniquefr
                    );
                    
                    
                    
                    $missing = array();
                    for ($i = 1; $i < max($Fr_uniquefr); $i++) {
                        if (!in_array($i, $Fr_uniquefr))
                            $missing[] = $i;
                    }
                    //}
                    if (!empty($missing)) {
                        $last_id= array_values($missing)[0];
                        
                    } else {
                        $last_id = $this->Users->getUserUniqueId($user_type);
                    }
                    
                    $profile_status   = 0;
                    $total_connects   = 10;
                    $unique_id        = 'NL' . $last_id;
                    $unique_user_key  = $last_id;
                    $notification_msg = $user_data['username'] . " New Nlancer Register";
                    $notif            = "NL";
                }
                //  echo $unique_id; 
                //$string1 = "tarunmodi";
                
                //die();
				
                $data   = array(
                    'user_id' => $id_generator,
                    'profile_id' => $this->auth->generator(20),
                    'unique_id' => $unique_id,
                    'unique_user_key' => $unique_user_key,
                    'username' => $user_data['username'],
                    'email' => $user_data['fldEmail'],
                    'phone_no' => $user_data['phone_no'],
                    'profile_image' => $user_data['user_image'],
                    'password' => $password,
                    'user_type' => $user_type,
                    'status' => 0,
                    'profile_status' => $profile_status,
                    'total_connects' => $total_connects,
                    'doc' => $date_of_creation
                );
                $result = $this->db->insert('user_login', $data);
                $data1  = array(
                    'user_id_from' => $id_generator,
                    'message_content' => $notification_msg,
                    'date_time' => date('Y-m-d H:i:s'),
                    'notif' => $notif,
                    'notify_status' => 0
                );
                $this->db->insert('admin_notification', $data1);
                if ($result) {
                    return array(
                        'status' => TRUE,
                        'message' => 'user_added_successfully',
                        'userId' => $id_generator
                    );
                } else {
                    return array(
                        'status' => FALSE,
                        'message' => 'unable_to_add_record_in_db'
                    );
                }
                
            }
        }
        
        return array(
            'status' => FALSE,
            'message' => 'unable_to_add_record_in_db'
        );
    }
    
    /*
     * User login information By ID
     */
    public function get_user_info_by_id($aId = null)
    {
        if (empty($aId))
            return FALSE;
        
        $this->db->select('users.*,user_login.*, country.name as country');
        $this->db->from('users');
        $this->db->join('user_login', 'user_login.user_id = users.user_id');
        $this->db->join('country', 'country.country_id = users.country', 'left');
        $this->db->where('user_login.user_id', $aId);
        $query = $this->db->get();
        //showQuery();die;
        $data  = $query->row();
        return $data;
    }
    
    public function check_profile_status($user_id = null)
    {
        
        $this->db->select('*');
        $this->db->from('user_login');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        return $query->row();
    }
    
    public function get_freelancer_profile_count()
    {
        $freelancer_count = 0;
        
        $this->db->where('user_login.user_type', 4);
        $this->db->where('user_login.status', 1);
        $this->db->from('user_login');
        $freelancer_count = $this->db->count_all_results();
        //echo $this->db->last_query();
        
        return $freelancer_count;
    }
    
    public function get_freelancers_profile_info($limit = 10, $start = 1)
    {
        $freelancerList = array();
        
        $this->db->select('users.*,user_login.*, country.name as country');
        $this->db->from('users');
        $this->db->join('user_login', 'user_login.user_id = users.user_id');
        $this->db->join('country', 'country.country_id = users.country', 'left');
        $this->db->where('user_login.user_type', 4);
        $this->db->where('user_login.status', 1);
        $this->db->limit($limit, $start);
        $this->db->order_by('users.doc', 'desc');
        $query = $this->db->get();
        //echo $this->db->last_query(); die;
        foreach ($query->result() as $row) {
            $user_languages = $user_skills = array();
            
            // Get user selected languages
            $this->db->select('user_languages.language_id,languages.name');
            $this->db->from('user_languages');
            $this->db->join('languages', 'languages.language_id = user_languages.language_id');
            $this->db->where('user_languages.user_id', $row->user_id);
            $query_lang = $this->db->get();
            foreach ($query_lang->result() as $row_lang) {
                $user_languages[] = $row_lang->name;
            }
            
            // Get user selected skills
            $this->db->select('user_area_of_interest.area_of_interest_id,area_of_interest.name,user_area_of_interest.user_id');
            $this->db->from('user_area_of_interest');
            $this->db->join('area_of_interest', 'area_of_interest.area_of_interest_id = user_area_of_interest.area_of_interest_id');
            $this->db->where('user_area_of_interest.user_id', $row->user_id);
            $query_skill = $this->db->get();
            foreach ($query_skill->result() as $row_skill) {
                $user_skills[] = array(
                    'skill_id' => $row_skill->area_of_interest_id,
                    'skill_name' => $row_skill->name,
                    'user_id' => $row_skill->user_id
                );
            }
            
            $freelancerList[] = array(
                'basic_info' => $row,
                'user_selected_languages' => $user_languages,
                'user_selected_skills' => $user_skills
            );
        }
        
        //echo '<pre>'; print_r($freelancerList); die;
        
        
        return $freelancerList;
    }
    
    public function get_freelancers_profile_info_by_id($Ids = array())
    {
        $freelancerList = array();
        
        if (empty($Ids)) {
            return $freelancerList;
        }
        
        $this->db->select('users.*,user_login.*');
        $this->db->from('users');
        $this->db->join('user_login', 'user_login.user_id = users.user_id');
        $this->db->where('user_login.user_type', 4);
        $this->db->where('user_login.status', 1);
        $this->db->where_in('users.user_id', $Ids);
        $query = $this->db->get();
        //echo $this->db->last_query(); 
        
        //echo '<pre>'; print_r($query->result()); die; 
        
        foreach ($query->result() as $row) {
            $user_languages = $user_skills = array();
            
            // Get user selected languages
            $this->db->select('user_languages.language_id,languages.name');
            $this->db->from('user_languages');
            $this->db->join('languages', 'languages.language_id = user_languages.language_id');
            $this->db->where('user_languages.user_id', $row->user_id);
            $query_lang = $this->db->get();
            foreach ($query_lang->result() as $row_lang) {
                $user_languages[] = $row_lang->name;
            }
            
            // Get user selected skills
            $this->db->select('user_area_of_interest.area_of_interest_id,area_of_interest.name,user_area_of_interest.user_id');
            $this->db->from('user_area_of_interest');
            $this->db->join('area_of_interest', 'area_of_interest.area_of_interest_id = user_area_of_interest.area_of_interest_id');
            $this->db->where('user_area_of_interest.user_id', $row->user_id);
            $query_skill = $this->db->get();
            foreach ($query_skill->result() as $row_skill) {
                $user_skills[] = array(
                    'skill_id' => $row_skill->area_of_interest_id,
                    'skill_name' => $row_skill->name,
                    'user_id' => $row_skill->user_id
                );
            }
            
            // Get user country
            $this->db->select('users.user_id,users.country,country.name');
            $this->db->from('users');
            $this->db->join('country', 'country.country_id = users.country', 'left');
            $this->db->where('users.user_id', $row->user_id);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $result       = $query->row();
                $row->country = $result->name;
            }
            
            
            $freelancerList[] = array(
                'basic_info' => $row,
                'user_selected_languages' => $user_languages,
                'user_selected_skills' => $user_skills
            );
        }
        
        return $freelancerList;
    }
    // modified on 27-10-2020	
	public function get_freelancers_info() {
		$freelancerList = array();
		$sql="SELECT user_login.*,users.name,users.country,country.name AS country ,users.gender,users.date_of_birth,users.bio,users.address,users.state,users.city,users.vat
		FROM user_login
		LEFT JOIN users ON users.user_id=user_login.user_id 
		LEFT JOIN country ON country.country_id=users.country
		WHERE user_login.user_type=4
		ORDER BY user_login.job_complete_count DESC, user_login.total_positive_coins DESC, user_login.total_negative_coins DESC";
		
		$query = $this->db->query($sql);
		foreach ($query->result() as $row){
			$freelancerList[]=$row;
		}
		return $freelancerList;
	}
  //modified on 21-10-2020
	public function get_user_skill_list($userId=null) {
		$skillSet=array();
		if($userId==null)
			return $skillSet;
		// Get user selected skills
            $this->db->select('user_area_of_interest.area_of_interest_id,area_of_interest.name,user_area_of_interest.user_id');
            $this->db->from('user_area_of_interest');
            $this->db->join('area_of_interest', 'area_of_interest.area_of_interest_id = user_area_of_interest.area_of_interest_id');
            $this->db->where('user_area_of_interest.user_id', $userId);
            $query_skill = $this->db->get();
			
            foreach ($query_skill->result() as $row_skill){
                $skillSet[] = array('skill_id' => $row_skill->area_of_interest_id, 'skill_name' => $row_skill->name, 'user_id' => $row_skill->user_id);
            }
			return $skillSet;
	}
//modified on 21-10-2020
	//modified on 27-10-2020
    public function get_freelancers_profile_info_by_search($searchParam = null) {
        $freelancerList = array();
		
        $sql = "SELECT user_login.*,users.name,users.country,country.name AS country ,users.gender,users.date_of_birth,users.bio,users.address,users.state,users.city,users.vat,IFNULL(no_of_skill_match,0) no_of_skill_match, total_points, job_complete_count
		FROM (SELECT DISTINCT user_area_of_interest.user_id,COUNT(*) no_of_skill_match 
		FROM user_area_of_interest 
		LEFT JOIN user_login ON user_login.user_id=user_area_of_interest.user_id 
		WHERE area_of_interest_id IN (".$searchParam['skill'].") AND user_login.user_type=4
		GROUP BY user_id) uai 
		LEFT JOIN user_login ON user_login.user_id=uai.user_id 
		LEFT JOIN users ON users.user_id=user_login.user_id 
		LEFT JOIN country ON country.country_id=users.country
		WHERE 1=1";
        if(!empty($searchParam) && is_array($searchParam)) {
            if(!empty($searchParam['name'])) {
                $searchParam['name'] = trim($searchParam['name']);
                $sql .= " AND LOWER(users.name) LIKE '%".strtolower($searchParam['name'])."%'";
            }
            if(!empty($searchParam['country'])) {
                $searchParam['country'] = trim($searchParam['country']);
                $sql .= " OR LOWER(country.name) LIKE '%".strtolower($searchParam['country'])."%'";
            }                        
        }
        $sql .= " ORDER BY uai.no_of_skill_match DESC, user_login.job_complete_count DESC, user_login.total_positive_coins DESC, user_login.total_negative_coins DESC";
        $query = $this->db->query($sql);
        //echo $this->db->last_query();
        foreach ($query->result() as $row){
            $user_languages = $user_skills = array();

            // Get user selected languages
            $this->db->select('user_languages.language_id,languages.name');
            $this->db->from('user_languages');
            $this->db->join('languages', 'languages.language_id = user_languages.language_id');
            $this->db->where('user_languages.user_id', $row->user_id);
            $query_lang = $this->db->get();
            foreach ($query_lang->result() as $row_lang){
                $user_languages[] = $row_lang->name;
            } 

            // Get user selected skills
            $this->db->select('user_area_of_interest.area_of_interest_id,area_of_interest.name,user_area_of_interest.user_id');
            $this->db->from('user_area_of_interest');
            $this->db->join('area_of_interest', 'area_of_interest.area_of_interest_id = user_area_of_interest.area_of_interest_id');
            $this->db->where('user_area_of_interest.user_id', $row->user_id);
            $query_skill = $this->db->get();
			if($query_skill->num_rows() > 0){
				foreach ($query_skill->result() as $row_skill){
					$user_skills[] = array('skill_id' => $row_skill->area_of_interest_id, 'skill_name' => $row_skill->name, 'user_id' => $row_skill->user_id);
				}
			}else{
				$user_skills[] = array('skill_id' => '', 'skill_name' => '', 'user_id' => '');
			}
            

            $freelancerList[] = array('basic_info' => $row, 'user_selected_languages' => $user_languages, 'user_selected_skills' => $user_skills);
        }
        
        return $freelancerList;        
    }
    
    /*
     * User login information By Email
     */
    public function get_user_info_by_email($emailId = null)
    {
        
        if (empty($emailId))
            return FALSE;
        
        $this->db->select('*');
        $this->db->from('user_login');
        $this->db->where('email', trim($emailId));
        $query = $this->db->get();
        //echo $this->db->last_query();
        
        return $query->row();
    }
    
    /*
     * User profile details By Profile ID
     */
    public function get_user_info_by_profile_id($pId = null)
    {
        if (empty($pId))
            return FALSE;
        
        $this->db->select('*');
        $this->db->from('user_login');
        $this->db->where('profile_id', $pId);
        $query = $this->db->get();
        return $query->row();
    }
    
    /*
     * User profile details By ID
     */
    public function get_user_profile_info_by_id($aId = null)
    {
        $user_data = $user_languages = $user_skills = array();
        
        if (empty($aId))
            return FALSE;
        
        $this->db->select('users.*,user_login.total_points,user_login.total_positive_coins,user_login.total_negative_coins,user_login.total_coins,user_login.profile_id,user_login.profile_image,user_login.is_login,user_login.profile_title,user_login.profile_title_skill,user_login.profile_status,user_login.phone_no');
        $this->db->from('users');
        $this->db->join('user_login', 'user_login.user_id = users.user_id');
        $this->db->where('users.user_id', $aId);
        $query                   = $this->db->get();
        $user_data['basic_info'] = $query->row();
        
        // Get user selected languages
        $this->db->select('user_languages.language_id,languages.name');
        $this->db->from('user_languages');
        $this->db->join('languages', 'languages.language_id = user_languages.language_id');
        $this->db->where('user_languages.user_id', $aId);
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $user_languages[] = $row->name;
        }
        $user_data['user_selected_languages'] = $user_languages;
        
        // Get user selected skills
        $this->db->select('user_area_of_interest.area_of_interest_id,area_of_interest.name,user_area_of_interest.user_id');
        $this->db->from('user_area_of_interest');
        $this->db->join('area_of_interest', 'area_of_interest.area_of_interest_id = user_area_of_interest.area_of_interest_id');
        $this->db->where('user_area_of_interest.user_id', $aId);
        $query = $this->db->get();
        $skill = array();
        foreach ($query->result() as $row) {
            $user_skills[] = array(
                'skill_id' => $row->area_of_interest_id,
                'skill_name' => $row->name,
                'user_id' => $row->user_id
            );
            array_push($skill, $row->name);
        }
        $user_data['user_selected_skills'] = $user_skills;
        $user_data['user_skills']          = $skill;
        
        // Get user country
        $this->db->select('users.user_id,users.country,country.name');
        $this->db->from('users');
        $this->db->join('country', 'country.country_id = users.country', 'left');
        $this->db->where('users.user_id', $aId);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result                           = $query->row();
            $user_data['basic_info']->country = $result->name;
        }
        
        if (!empty($user_data)) {
            return $user_data;
        } else {
            return array();
        }
    }
    
    /*
     * Get user portfolio list.
     */
    public function get_user_portfolio_by_id($uId = null)
    {
        $user_portfolio = array();
        
        if (empty($uId))
            return FALSE;
        
        $this->db->select('*');
        $this->db->from('user_portfolio_list');
        $this->db->where('user_id', $uId);
        $query  = $this->db->get();
        $result = $query->result();
        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
        
    }
    
    public function getPortfolioById($postData = array())
    {
        $response = array();
        if (isset($postData['pk'])) {
            
            $this->db->select('*');
            $this->db->from('user_portfolio_list');
            $this->db->where('id', $postData['pk']);
            $query    = $this->db->get();
            $result   = $query->row();
            $response = $result;
            
        }
        
        return $response;
    }
    
    public function get_user_portfolio_id($userid = null)
    {
        $response = array();
        if (isset($userid)) {
            
            $this->db->select('*');
            $this->db->from('user_portfolio_list');
            $this->db->where('user_id', $userid);
            $query    = $this->db->get();
            $result   = $query->result();
            $response = $result;
            
        }
        
        return $response;
    }
    
    public function get_portfolio_old_image($editId = null)
    {
        
        if (empty($editId))
            return FALSE;
        
        $this->db->select('portfolio_image');
        $this->db->from('user_portfolio_list');
        $this->db->where('id', $editId);
        $query = $this->db->get();
        return $query->row();
    }
    
    
    /*
     * Get user selected languages.
     */
    public function get_user_selected_languages_by_id($uId = null)
    {
        $user_languages = array();
        
        if (empty($uId))
            return FALSE;
        
        $this->db->select('*');
        $this->db->from('user_languages');
        $this->db->where('user_id', $uId);
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $user_languages[] = $row->language_id;
        }
        
        return $user_languages;
    }
    
    /*
     * Get user selected skills name.
     */
    public function get_user_selected_skillsname_by_id($uId = null)
    {
        $skill_list = array();
        
        if (empty($uId))
            return FALSE;
        
        $this->db->select('user_area_of_interest.*,area_of_interest.name');
        $this->db->from('user_area_of_interest');
        $this->db->join('area_of_interest', 'area_of_interest.area_of_interest_id = user_area_of_interest.area_of_interest_id');
        $this->db->where('user_id', $uId);
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $skill_list[] = $row;
        }
        
        return $skill_list;
    }
    
    
    
    /*
     * Get user selected skills.
     */
    public function get_user_selected_skills_by_id($uId = null)
    {
        $user_skills = array();
        
        if (empty($uId))
            return FALSE;
        
        $this->db->select('*');
        $this->db->from('user_area_of_interest');
        $this->db->where('user_id', $uId);
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $user_skills[] = $row->area_of_interest_id;
        }
        
        return $user_skills;
    }
    
    public function get_user_title_skillsname($uId = null)
    {
        $user_skills_name = array();
        $skill            = array();
        if (empty($uId))
            return FALSE;
        
        $this->db->select('profile_title_skill');
        $this->db->from('user_login');
        $this->db->where('user_id', $uId);
        $query      = $this->db->get();
        $skillnames = $query->row();
        if (isset($skillnames->profile_title_skill))
            $user_skills_name = explode(",", $skillnames->profile_title_skill);
        
        
        
        return $user_skills_name;
    }
    /*
     * Get user selected card.
     */
    public function get_user_credit_card_info($uId = null)
    {
        $userCreditCard = array();
        
        if (empty($uId))
            return FALSE;
        
        $this->db->select('*');
        $this->db->from('user_card_info');
        $this->db->where('user_id', $uId);
        $query = $this->db->get();
        //echo $this->db->last_query();
        
        foreach ($query->result() as $row) {
            $userCreditCard[] = $row;
        }
        
        if (count($userCreditCard) > 0) {
            return $userCreditCard[0];
        }
        
        return $userCreditCard;
    }
    
    /*
     * User verification
     */
    public function check_valid_user($username, $password)
    {
        
        //$password = md5("gef".$password);
        $password = md5("ctgs" . $password);
        
        //$this->db->where(array('email'=>$username,'password'=>$password,'status'=>1));
        $this->db->where("email = '$username' or username = '$username'");
        $this->db->where('password', $password);
        $this->db->where('status', 1);
        
        $query  = $this->db->get('user_login');
        $result = $query->result_array();
        
        if (count($result) == 1) {
            $user_id = $result[0]['user_id'];
            
            $this->db->select('a.user_id,a.username,a.profile_id,a.email,a.mobile,a.is_mobile_verified,a.receive_transactional_notification,a.receive_task_update_notification,a.receive_task_reminder_notification,a.receive_helpful_notification,a.profile_image,a.user_type,a.total_points,b.name,b.country');
            $this->db->from('user_login a');
            $this->db->join('users b', 'b.user_id = a.user_id');
            $this->db->where('a.user_id', $user_id);
            $this->db->where('a.status', 1);
            $query = $this->db->get();
            
            $result = $query->result_array();
            if ($result) {
                $data = array(
                    'is_login' => 1,
                    'last_login' => date('Y-m-d H:i:s')
                );
                
                $this->db->where('user_id', $result[0]['user_id']);
                $this->db->update('user_login', $data);
            }
            
            return $result;
        }
        
        return false;
    }
    
    public function check_gmail_valid_user($email = null)
    {
        
        
        $this->db->where("email = '$email'");
        $this->db->where('status', 1);
        $query = $this->db->get('user_login');
        
        
        //$query = $this->db->get('user_login');
        $result = $query->result_array();
        
        if (count($result) == 1) {
            $user_id = $result[0]['user_id'];
            
            $this->db->select('a.user_id,a.profile_id,a.email,a.mobile,a.is_mobile_verified,a.receive_transactional_notification,a.receive_task_update_notification,a.profile_status,a.receive_task_reminder_notification,a.receive_helpful_notification,a.profile_image,a.user_type,a.total_points,b.name,b.country');
            $this->db->from('user_login a');
            $this->db->join('users b', 'b.user_id = a.user_id');
            $this->db->where('a.user_id', $user_id);
            $this->db->where('a.status', 1);
            $query = $this->db->get();
            
            $result = $query->result_array();
            if ($result) {
                $data = array(
                    'is_login' => 1,
                    'last_login' => date('Y-m-d H:i:s')
                );
                
                $this->db->where('user_id', $result[0]['user_id']);
                $this->db->update('user_login', $data);
            }
            
            return $result;
        }
        
        return false;
    }
    
    public function update_user_login_status($userId = null, $userStatus = 0)
    {
        $result = null;
        
        if (!empty($userId)) {
            $data = array(
                'is_login' => $userStatus
            );
            
            $this->db->where('user_id', $userId);
            $result = $this->db->update('user_login', $data);
        }
        
        return $result;
    }
    
    /*
     * User account activation
     */
    public function verifyEmail($key)
    {
        $email = base64_decode($key);
        
        $data = array(
            'status' => 1,
            'dom' => date("Y-m-d H:i:s")
        );
        $this->db->where('email', $email);
        return $this->db->update('user_login', $data); //update status as 1 to make active user
    }
    
    public function resetPassword($objUser)
    {
        
        date_default_timezone_set('GMT');
        $password = random_string('alnum', 16);
        
        $this->db->where('user_id', $objUser->user_id);
        $result = $this->db->update('user_login', array(
            'password' => md5("ctgs" . $password)
        ));
        if (!empty($result)) {
            return $password;
        } else {
            return FALSE;
        }
    }
    
    public function match_existing_password($comparePassword = null, $userId = null)
    {
        if (empty($comparePassword) || empty($userId))
            return FALSE;
        
        $this->db->select('*');
        $this->db->from('user_login');
        $this->db->where('user_id', $userId);
        $query    = $this->db->get();
        $userData = $query->row();
        
        $password = md5("ctgs" . $comparePassword);
        
        return ($userData->password == $password);
    }
    public function UpdateProfile_title($objUserData = null, $userId = null)
    {
        if (!empty($objUserData) && !empty($userId)) {
            $data = array();
            
            if (!empty($objUserData['fldtitle'])) {
                $title = explode(" ", $objUserData['fldtitle']);
                
                $this->db->select('user_area_of_interest.area_of_interest_id,area_of_interest.name,user_area_of_interest.user_id');
                $this->db->from('user_area_of_interest');
                $this->db->join('area_of_interest', 'area_of_interest.area_of_interest_id = user_area_of_interest.area_of_interest_id');
                $this->db->where('user_area_of_interest.user_id', $aId);
                $query  = $this->db->get();
                $status = array();
                foreach ($query->result() as $row) {
                    if (in_array($row->name, $title)) {
                        array_push($status, 1);
                    }
                }
                
                $data['profile_title'] = $objUserData['fldtitle'];
                $this->db->where('user_id', $userId);
                $this->db->update('user_login', $data);
            }
        } else {
            return 3;
        }
    }
    
    public function insert_portfolio($objUserData = null, $editId = null, $portfolioimage = null, $userId = null)
    {
        if (!empty($objUserData) && !empty($userId)) {
            
            
            //$data['editId'] = $objUserData['editId'];
            $data['user_id']         = $userId;
            $data['portfolio_name']  = $objUserData['fldName'];
            $data['portfolio_url']   = $objUserData['fldUrl'];
            $data['portfolio_desc']  = $objUserData['fldDesc'];
            $data['portfolio_image'] = $portfolioimage;
            
            if ($editId == '') {
                
                $result = $this->db->insert('user_portfolio_list', $data);
            } else {
                
                $this->db->where('id', $editId);
                $result = $this->db->update('user_portfolio_list', $data);
            }
            
            
            
            if (!empty($result)) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }
    public function update_profile($objUserData = null, $userId = null)
    {
        if (!empty($objUserData) && !empty($userId)) {
            $data = array();
            
            if (!empty($objUserData['fldEmail'])) {
                $dataemail['email'] = $objUserData['fldEmail'];
                $this->db->where('user_id', $userId);
                $result = $this->db->update('user_login', $dataemail);
                
            }
            if (!empty($objUserData['mobile'])) {
                $data['mobile'] = $objUserData['mobile'];
            }
            if (!empty($objUserData['fldName'])) {
                $data['name'] = $objUserData['fldName'];
            }
            
            if (!empty($objUserData['fldCountry'])) {
                $data['country'] = $objUserData['fldCountry'];
            }
            
            if (!empty($objUserData['fldBio'])) {
                $data['bio'] = $objUserData['fldBio'];
            }
            
            if (!empty($objUserData['fldtitle'])) {
                $data['profile_title'] = $objUserData['fldtitle'];
            }
            
            if (!empty($objUserData['fldState'])) {
                $data['state'] = $objUserData['fldState'];
            }
            
            if (!empty($objUserData['fldAddress'])) {
                $data['address'] = $objUserData['fldAddress'];
            }
            
            if (!empty($objUserData['fldCity'])) {
                $data['city'] = $objUserData['fldCity'];
            }
            
            
            if (!empty($objUserData['fldUserGender'])) {
                $data['gender'] = $objUserData['fldUserGender'];
            }
            
            
            if (isset($objUserData['fldtitle']) && $objUserData['fldtitle'] = !'') {
                
                $Skillsname                            = implode(",", $objUserData['Skillsname']);
                $dataSkillsname['profile_title_skill'] = $Skillsname;
                
                
                $this->db->where('user_id', $userId);
                $result = $this->db->update('user_login', $dataSkillsname);
                
            }
            if (!empty($objUserData['fldPhone'])) {
                
                $data_phone['phone_no'] = $objUserData['fldPhone'];
                $this->db->where('user_id', $userId);
                $result = $this->db->update('user_login', $data_phone);
            }
            
            
            
            $this->db->where('user_id', $userId);
            $result = $this->db->update('users', $data);
            //echo "<pre>";print_r($this->db->last_query());die;
            
            if (!empty($result)) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
        
    }
    
    public function update_user($objUserData = null, $userId = null)
    {
        
        if (!empty($objUserData) && !empty($userId)) {
            $data = array();
            
            if (!empty($objUserData['fldEmail'])) {
                $data['email'] = $objUserData['fldEmail'];
                
                $this->db->where('user_id', $userId);
                $result = $this->db->update('user_login', $data);
            } elseif (!empty($objUserData['mobile'])) {
                $data['mobile'] = $objUserData['mobile'];
                
                $this->db->where('user_id', $userId);
                $result = $this->db->update('user_login', $data);
            } elseif (isset($objUserData['receive_transactional_notification'])) {
                $data['receive_transactional_notification'] = (int) $objUserData['receive_transactional_notification'];
                
                $this->db->where('user_id', $userId);
                $result = $this->db->update('user_login', $data);
            } elseif (isset($objUserData['receive_task_update_notification'])) {
                $data['receive_task_update_notification'] = (int) $objUserData['receive_task_update_notification'];
                
                $this->db->where('user_id', $userId);
                $result = $this->db->update('user_login', $data);
            } elseif (isset($objUserData['receive_task_reminder_notification'])) {
                $data['receive_task_reminder_notification'] = (int) $objUserData['receive_task_reminder_notification'];
                
                $this->db->where('user_id', $userId);
                $result = $this->db->update('user_login', $data);
            } elseif (isset($objUserData['receive_helpful_notification'])) {
                $data['receive_helpful_notification'] = (int) $objUserData['receive_helpful_notification'];
                
                $this->db->where('user_id', $userId);
                $result = $this->db->update('user_login', $data);
            } elseif (isset($objUserData['fldProfileImage'])) {
                $data['profile_image'] = $objUserData['fldProfileImage'];
                
                $this->db->where('user_id', $userId);
                $result = $this->db->update('user_login', $data);
            } elseif (!empty($objUserData['fldLanguages']) && is_array($objUserData['fldLanguages'])) {
                foreach ($objUserData['fldLanguages'] as $val) {
                    $data[] = array(
                        'user_id' => $userId,
                        'language_id' => $val,
                        'doc' => date('Y-m-d H:i:s')
                    );
                }
                
                $result = $this->db->delete('user_languages', array(
                    'user_id' => $userId
                ));
                if ($result) {
                    $this->db->insert_batch('user_languages', $data);
                }
            } elseif (!empty($objUserData['fldSkills']) && is_array($objUserData['fldSkills'])) {
                foreach ($objUserData['fldSkills'] as $val) {
                    $data[] = array(
                        'user_id' => $userId,
                        'area_of_interest_id' => $val,
                        'doc' => date('Y-m-d H:i:s')
                    );
                }
                
                $result = $this->db->delete('user_area_of_interest', array(
                    'user_id' => $userId
                ));
                if ($result) {
                    $this->db->insert_batch('user_area_of_interest', $data);
                }
            } else {
                if (!empty($objUserData['fldName'])) {
                    $data['name'] = $objUserData['fldName'];
                }
                
                if (!empty($objUserData['fldCountry'])) {
                    $data['country'] = $objUserData['fldCountry'];
                }
                
                if (!empty($objUserData['fldBio'])) {
                    $data['bio'] = $objUserData['fldBio'];
                }
                
                if (!empty($objUserData['fldtitle'])) {
                    $data['profile_title'] = $objUserData['fldtitle'];
                }
                
                if (!empty($objUserData['fldState'])) {
                    $data['state'] = $objUserData['fldState'];
                }
                
                if (!empty($objUserData['fldAddress'])) {
                    $data['address'] = $objUserData['fldAddress'];
                }
                
                if (!empty($objUserData['fldCity'])) {
                    $data['city'] = $objUserData['fldCity'];
                }
                
                if (!empty($objUserData['fldVAT'])) {
                    $data['vat'] = $objUserData['fldVAT'];
                }
                
                if (!empty($objUserData['fldUserGender'])) {
                    $data['gender'] = $objUserData['fldUserGender'];
                }
                
                
                if (isset($objUserData['fldtitle']) && $objUserData['fldtitle'] = !'') {
                    
                    $Skillsname                  = implode(",", $objUserData['Skillsname']);
                    $data['profile_title_skill'] = $Skillsname;
                    
                    
                    $this->db->where('user_id', $userId);
                    $result = $this->db->update('user_login', $data);
                    
                } elseif (!empty($objUserData['fldPhone'])) {
                    
                    $data_phone['phone_no'] = $objUserData['fldPhone'];
                    $this->db->where('user_id', $userId);
                    $result = $this->db->update('user_login', $data_phone);
                }
                
                else {
                    
                    $this->db->where('user_id', $userId);
                    $result = $this->db->update('users', $data);
                    
                }
                
            }
            
            if (!empty($result)) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }
    
    public function update_user_card_data($objUserData = null, $userId = null)
    {
        if (!empty($objUserData) && !empty($userId)) {
            $data = array();
            
            $result = $this->db->delete('user_card_info', array(
                'user_id' => $userId
            ));
            if ($result) {
                $data   = array(
                    'user_id' => $userId,
                    'card_no' => $objUserData['fldCreditCardNo'],
                    'card_expire_month' => $objUserData['fldCardExpiryMonth'],
                    'card_expire_year' => $objUserData['fldCardExpiryYear'],
                    'card_cvv' => $objUserData['fldCreditCardCvv'],
                    'doc' => date("Y-m-d H:i:s")
                );
                $result = $this->db->insert('user_card_info', $data);
            }
            
            if (!empty($result)) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }
    
    public function remove_user_skill_data($userId = null, $skillId = null)
    {
        if (!empty($userId) && !empty($skillId)) {
            $result = $this->db->delete('user_area_of_interest', array(
                'user_id' => $userId,
                'area_of_interest_id' => $skillId
            ));
            if (!empty($result)) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }
    
    public function change_user_password($newPassword = null, $userId = null)
    {
        if (!empty($newPassword) && !empty($userId)) {
            $data = array();
            
            $password         = md5("ctgs" . $newPassword);
            $data['password'] = $password;
            
            $this->db->where('user_id', $userId);
            $result = $this->db->update('user_login', $data);
            if (!empty($result)) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }
    
    public function getDataByCondition($tablename = '', $condition = '', $fieldArr = array(), $limit = '0', $orderfield = '', $odertype = '')
    {
        // $limit variable contain only number of rows you want to get, if 0 then row will return,else return limit result .
        if (!empty($fieldArr)) {
            $this->db->select($fieldArr);
        } else {
            $this->db->select('*');
        }
        
        $this->db->from($tablename);
        $this->db->where($condition);
        if ($odertype != '') {
            $this->db->order_by($orderfield, $odertype);
        }
        
        if ($limit != '0') {
            if (trim($limit) == "all") {
                $data = $this->db->get();
                if ($data->num_rows() > 0) {
                    return $data->result();
                }
            } else {
                $this->db->limit($limit);
                $data = $this->db->get();
                if ($data->num_rows() > 0) {
                    return $data->result();
                }
            }
        } else {
            $data = $this->db->get();
            if ($data->num_rows() > 0) {
                return $data->row();
            }
        }
    }
    
    public function getUserLoginData($searchField = '', $searchVal = '')
    {
        if ($searchField != '') {
            $this->db->select('user_login.*');
            $this->db->from('user_login');
            $this->db->where($searchField, $searchVal);
            $data = $this->db->get();
            if ($data->num_rows() > 0) {
                return $data->row();
            } else {
                return array();
            }
        }
    }
    public function getUserUniqueId($type = '')
    {
        $last_id = "";
        if ($type != '') {
            $sql = "SELECT a AS unique_user_key, b AS next_id, (b - a) -1 AS missing_inbetween FROM ( SELECT a1.unique_user_key AS a , MIN(a2.unique_user_key) AS b FROM user_login AS a1 LEFT JOIN user_login AS a2 ON a2.unique_user_key > a1.unique_user_key WHERE a1.unique_user_key <= 100 and a2.user_type = '" . $type . "' GROUP BY a1.unique_user_key ) AS tab WHERE b > a + 1";
            
            
            $query  = $this->db->query($sql);
            $result = $query->result();
            
            /*$this->db->select('unique_user_key');
            $this->db->from('user_login');
            $this->db->where('user_type',$type);
            $this->db->order_by('unique_user_key','desc'); 
            $data = $this->db->get()->row();*/
            if (!empty($result)) {
                //  $last_id = $data->unique_user_key + 1;
                $last_id = $result[0]->unique_user_key + 1;
            } else {
                $this->db->select('unique_user_key');
                $this->db->from('user_login');
                $this->db->where('user_type', $type);
                $this->db->order_by('unique_user_key', 'desc');
                $data = $this->db->get()->row();
                if (!empty($data)) {
                    $last_id = $data->unique_user_key + 1;
                } else {
                    $last_id = 1;
                }
            }
        }

        return $last_id;
    }
    
    public function get_top_freelancers_profile_info($filter = array())
    {
        $freelancerList = array();
        
        $this->db->select('users.*,user_login.*, country.name as country');
        $this->db->from('users');
        $this->db->join('user_login', 'user_login.user_id = users.user_id');
        $this->db->join('country', 'country.country_id = users.country', 'left');
        $this->db->where('user_login.total_positive_coins >', 0);
        $this->db->where('user_login.user_type', 4);
        $this->db->where('user_login.status', 1);
        if (isset($filter['not_user_id'])) {
            //                $this->db->where('user_id !=', $filter['not_user_id']);
        }
        if (isset($filter['limit']['limit'])) {
            $this->db->limit($filter['limit']['limit'], (isset($filter['limit']['from'])) ? $filter['limit']['from'] : 0);
        }
        $this->db->order_by('user_login.total_positive_coins', 'desc');
        $query          = $this->db->get();
        $freelancerList = $query->result();
        //showQuery();die;
        //echo $this->db->last_query(); die;
        if (!empty($freelancerList)) {
            foreach ($freelancerList as $row) {
                $user_languages     = $user_skills = array();
                $user_profile_image = $row->profile_image;
                if (empty($user_profile_image)) {
                    $user_profile_image = base_url('assets/img/no-image.png');
                } else {
                    $user_profile_image = base_url('uploads/user/profile_image/' . $user_profile_image);
                }
                $row->user_profile_image = $user_profile_image;
                //                // Get user selected languages
                //                $this->db->select('user_languages.language_id,languages.name');
                //                $this->db->from('user_languages');
                //                $this->db->join('languages', 'languages.language_id = user_languages.language_id');
                //                $this->db->where('user_languages.user_id', $row->user_id);
                //                $query_lang = $this->db->get();
                //                foreach ($query_lang->result() as $row_lang) {
                //                    $user_languages[] = $row_lang->name;
                //                }
                //
                //                // Get user selected skills
                //                $this->db->select('user_area_of_interest.area_of_interest_id,area_of_interest.name,user_area_of_interest.user_id');
                //                $this->db->from('user_area_of_interest');
                //                $this->db->join('area_of_interest', 'area_of_interest.area_of_interest_id = user_area_of_interest.area_of_interest_id');
                //                $this->db->where('user_area_of_interest.user_id', $row->user_id);
                //                $query_skill = $this->db->get();
                //                foreach ($query_skill->result() as $row_skill) {
                //                    $user_skills[] = array('skill_id' => $row_skill->area_of_interest_id, 'skill_name' => $row_skill->name, 'user_id' => $row_skill->user_id);
                //                }
                
                //                    $freelancerList[] = $row;
            }
        }
        
        //            echo '<pre>'; print_r($freelancerList); die;
        
        
        return $freelancerList;
    }
    public function checkUser($data = array())
    {
        $this->db->select($this->primaryKey);
        $this->db->from($this->tableName);
        $this->db->where(array(
            'oauth_provider' => $data['oauth_provider'],
            'oauth_uid' => $data['oauth_uid']
        ));
        $prevQuery = $this->db->get();
        $prevCheck = $prevQuery->num_rows();
        
        if ($prevCheck > 0) {
            $prevResult       = $prevQuery->row_array();
            $data['modified'] = date("Y-m-d H:i:s");
            $update           = $this->db->update($this->tableName, $data, array(
                'id' => $prevResult['id']
            ));
            $userID           = $prevResult['id'];
        } else {
            $data['created']  = date("Y-m-d H:i:s");
            $data['modified'] = date("Y-m-d H:i:s");
            $insert           = $this->db->insert($this->tableName, $data);
            $userID           = $this->db->insert_id();
        }
        
        return $userID ? $userID : FALSE;
    }
	
	
	public function set_login_session($user_data)
	{
	  $data['user_id'] = $user_data['user_id'];
	  $data['login_date'] = date("Y-m-d H:i:s");
	  $data['status'] = 1;
	  $r = $this->get_login_session($data['user_id']);
	  if($r == 'l')
	  {
		$this->db->where('user_id',$data['user_id']);
		$this->db->update('user_login_sessions', $data);	    
	  } else {		  
       $this->db->insert('user_login_sessions', $data);	  
	  }
	}
	
	
	public function remove_login_session($user_id)
	{
      $data['user_id'] = $user_id;
	  $data['logout_date'] = date("Y-m-d H:i:s");
	  $data['status'] = 0;
      $this->db->where('user_id',$data['user_id']);
	  $this->db->update('user_login_sessions', $data);	 
	}
	
	public function get_login_session($user_id)
	{
      $this->db->select('*');
	  $this->db->from('user_login_sessions');
	  $this->db->where('user_id',$user_id);
	  $prevQuery = $this->db->get();
      $prevCheck = $prevQuery->num_rows();
	  if($prevCheck > 0)
	   return 'l';
      else
	   return '';		
	}
	
	
	public function get_login_status($user_id)
	{
      $this->db->select('*');
	  $this->db->from('user_login_sessions');
	  $this->db->where('user_id',$user_id);
	  $prevQuery = $this->db->get();
      $prevCheck = $prevQuery->num_rows();
	  $prevResult = $prevQuery->row_object();
	  if($prevCheck > 0 && $prevResult->status == 1)
	   return 'l';
      else
	   return '';		
	}
	
	
	public function get_login_details($user_id)
	{
      $this->db->select('*');
	  $this->db->from('user_login_sessions');
	  $this->db->where('user_id',$user_id);
	  $prevQuery = $this->db->get();
      $prevCheck = $prevQuery->num_rows();
	  $prevResult = $prevQuery->row_object();
	  if($prevCheck > 0)
	   return $prevResult;
      else
	   return '';		
	}
}