<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admimodel extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
	
	public function insert_data($tableName,$data) { 
		if ($this->db->insert($tableName, $data)) {
			$query = $this->db->query('SELECT LAST_INSERT_ID()');
			$row = $query->row_array();
			$LastIdInserted = $row['LAST_INSERT_ID()'];
			return $LastIdInserted; 
		}else{
			return 0;
		} 
	} 
	
	public function update($tableName='',$data=array(),$chkfield='',$rowId='') {
		$this->db->where($chkfield, $rowId); 
		$return	= $this->db->update($tableName, $data); 
		if ($return) { 
			return true; 
		}else{
			return false;
		} 
	} 
	public function getDataByCondition($tablename='',$condition='',$fieldArr = array(),$limit = '0',$orderfield = '',$odertype = ''){
		// $limit variable contain only number of rows you want to get, if 0 then row will return,else return limit result .
		if(!empty($fieldArr)){
			$this->db->select($fieldArr);
		}else{
			$this->db->select('*');
		}
		
		$this->db->from($tablename);
		$this->db->where($condition);
		if($odertype !=''){
			$this->db->order_by($orderfield,$odertype);
		}
		
		if($limit != '0'){
			if(trim($limit) == "all"){
				$data	= $this->db->get();
				if($data->num_rows() > 0){
					return $data->result();
				}
			}else{
				$this->db->limit($limit);
				$data	= $this->db->get();
				if($data->num_rows() > 0){
					return $data->result();
				}
			}
		}else{
			$data	= $this->db->get();
			if($data->num_rows() > 0){
				return $data->row();
			}
		}
	}
	
	public function getJoinDataByCondition($tablename=array(),$jointype=array(),$joincondition=array(),$condition='',$fieldArr=array(),$limit=0,$oderby='',$searchField='',$searchValue='',$searchFieldArr=array(),$searchValueArr=array()){
		$this->db->select($tablename[0].'_alias.'.$fieldArr[0]);
		$this->db->from($tablename[0].' as '.$tablename[0].'_alias');
		for($i=1;$i<=sizeof($jointype);$i++){
			$this->db->select($tablename[$i].'_alias.'.$fieldArr[$i]);
			$this->db->join($tablename[$i].' as '.$tablename[$i].'_alias',$joincondition[$i-1],$jointype[$i-1]);
		}
		
		for($j=0;$j<sizeof($searchFieldArr);$j++){
			$this->db->like($searchFieldArr[$j],$searchValueArr[$j],'after');
		}
				
		$this->db->where($condition);
		if($limit!=''){
			if($limit!="all"){
				$this->db->limit($limit);
			}
			if($oderby!=''){
				$this->db->order_by($oderby);
			}
			$data	= $this->db->get();
			if($data->num_rows() > 0){ //print_r($this->db->get());die('jjjj');
				return $data->result();
			}
		}else if($limit==0){
			if($oderby!=''){
				$this->db->order_by($oderby);
			}
			$data	= $this->db->get();
			if($data->num_rows() > 0){
				return $data->row();
			}
		}
	}
	
	public function get_user_list($usertype = 0, $status = ""){
		
		$this->db->select('users.*,user_login.*,user_login.status as active_status,country.name as country_name');
		$this->db->from('users');
		$this->db->join('user_login', 'user_login.user_id = users.user_id');
		$this->db->join('country', 'country.country_id = users.country','left');
		if($usertype != 0){
			$this->db->where('user_type',$usertype);
		}
		if($status != ""){
                    if ($status == "active") {
                        $this->db->where('user_login.profile_status',1);
                    } else if ($status == "inactive") {
                        $this->db->where('user_login.profile_status',0);
                    }
		}
                $this->db->where('users.status',1);
		$this->db->order_by('users.doc','desc');
		$result = $this->db->get();
		if($result->num_rows() > 0){
			return $result->result();
		}else{
			return array();
		}
	}
	
	public function get_category_list(){
		$this->db->select('area_of_interest.*');
		$this->db->from('area_of_interest');
		$this->db->where('deleted',NULL);
		$this->db->or_where('deleted',0);
		$this->db->order_by('area_of_interest.name','asc');
		$result = $this->db->get();
		if($result->num_rows() > 0){
			return $result->result();
		}else{
			return array();
		}
	}
	
	public function get_category_info($rowid = ''){
		$this->db->select('area_of_interest.*');
		$this->db->from('area_of_interest');
		$this->db->where('area_of_interest_id',base64_decode($rowid));
		$result = $this->db->get(); 
		if($result->num_rows() > 0){
			return $result->row();
		}else{
			return array();
		}
	}
		
	public function get_user_info($user_id = ''){
		$this->db->select('users.*,user_login.*,user_login.status as active_status,user_card_info.*');
		$this->db->from('users');
		$this->db->join('user_login', 'user_login.user_id = users.user_id');
		$this->db->join('user_card_info', 'user_card_info.user_id = users.user_id','left');
		$this->db->where('users.user_id',$user_id);
		$this->db->where('users.status',1);
		$result = $this->db->get(); 
		if($result->num_rows() > 0){
			return $result->row();
		}else{
			return array();
		}
	}
	public function get_grievance_id($ticket_id = ''){

		$this->db->select('id');
		$this->db->from('user_grievance');
		$this->db->where('problem_ticket_no',$ticket_id);
		$result = $this->db->get(); 
		if($result->num_rows() > 0){
			return $result->row();
		}else{
			return array();
		}

	}


	public function get_ticket_email($grievance_id = ''){

		$this->db->select('user_login.email, user_login.user_id');
		$this->db->from('user_login');
		$this->db->join('user_grievance', 'user_login.user_id = user_grievance.user_id');
		$this->db->where('user_grievance.id',$grievance_id);
		$result = $this->db->get(); 

		if($result->num_rows() > 0){
			return $result->row();
		}else{
			return array();
		}

	}
	public function store_ticket_history($post_data = array()){

		$grievance_id = $post_data['grievance_id'];
		$email_to = $post_data['email_to'];
		$email_body = strip_tags($post_data['email_body']);

		$this->db->select('user_grievance.*, grievance.problem_type, grievance.problem_type_other');
		$this->db->from('user_grievance');
		$this->db->join('grievance', 'grievance.fid = user_grievance.grievance_id');
		$this->db->where('user_grievance.id',$grievance_id);
		$result = $this->db->get();
        $data =  $result->row();

		$problem_ticket_no = $data->problem_ticket_no;
	    $problem_type = $data->problem_type;
	    $date_of_creation = date("Y-m-d H:i:s");

	    $inserdata=array(
		    	'ticket_no' => $problem_ticket_no,
			    'user_email' => $email_to,
			    'email_body'=> $email_body,
				'grievance_type' => $problem_type,
				'admin_type' => 'outbox',
				'user_type' => 'inbox',
			    'dom' => $date_of_creation,
			    'admin_view'=> 0,
			    'user_view'=>1
		);

		$result = $this->db->insert('user_ticket_history',$inserdata);
		return true;
	}
	
	public function get_country_list(){
		$this->db->select('country.*');
		$this->db->from('country');
		$this->db->where('status',1);
		$this->db->where('deleted',NULL);
		$result = $this->db->get();
		if($result->num_rows() > 0){ 
			return $result->result();
		}else{
			return array();
		}
	}
	
	public function add_data($submitdata = array()){
		
		$account_exists = $this->db->select('*')->from('user_login')->where('email',$submitdata['email'])->get()->num_rows();
        if ($account_exists > 0) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Email already exist.</div>');
            return;
        }else{
            $id_generator = $this->auth->generator(10);
            $date_of_creation = date("Y-m-d H:i:s");

	    	$data1=array(
		    	'user_id' => $id_generator,
			    'name' => $submitdata['name'],
				'gender' => $submitdata['gender'],
				'date_of_birth' => $submitdata['dob'],
				'bio' => $submitdata['bio'],
				'address' => $submitdata['address'],
			    'country' => $submitdata['country'],
				'state' => $submitdata['state'],
				'city' => $submitdata['city'],
			    'status' =>	1,
			    'doc' => $date_of_creation
		    );

		    $result = $this->db->insert('users',$data1);
            //$insert_id = $this->db->insert_id();

            if($result) {
		        //Inset user Login table 
		        $password = $submitdata['password'];
		        $password = md5("ctgs".$password);
                $this->load->model('Users');
                $user_type = 2;
                $unique_id = "";
                $unique_user_key ='';
                if (base64_decode($submitdata['user_type']) == 'c') {
                    $user_type = 3;
                    $last_id        = $this->Users->getUserUniqueId($user_type);
                    $unique_id      = 'CL' . $last_id;
                    $unique_user_key= $last_id;
                } elseif (base64_decode($submitdata['user_type']) == 'f') {
                    $user_type = 4;
                    $last_id        = $this->Users->getUserUniqueId($user_type);
                    $unique_id      = 'FR' . $last_id;
                    $unique_user_key= $last_id;
                }

                $data = array(
                    'user_id' => $id_generator,
                    'profile_id' => $this->auth->generator(20),
                    'email' => $submitdata['email'],
                    'password' => $password,
                    'unique_id' => $unique_id,
                    'unique_user_key' => $unique_user_key,
                    'user_type' => $user_type,
                    'status' => 1,
                    'doc' => $date_of_creation
                );
		        $result = $this->db->insert('user_login',$data);
				
				
				$this->db->trans_complete();
				if($this->db->trans_status() === FALSE){
					return false;
				}else{
					if($this->db->affected_rows() > 0){
						$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> User added.</div>');
						return;
					}else{
						$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Something went wrong.</div>');
						return;
					}
				}
            }
        }
	}
	
	public function modify_data($submitdata = array()){
		//echo '<pre>'; print_r($this->input->post()); die;     
		
		$dom = date('Y-m-d H:i:s');
		
		$userdata = array(
			'name' => $submitdata['name'],
			'gender' => $submitdata['gender'],
			'date_of_birth' => $submitdata['dob'],
			'bio' => $submitdata['bio'],
			'country' => $submitdata['country'],
			'state' => $submitdata['state'],
			'address' => $submitdata['address'],	
			'dom' => $dom
		);
		
		$return1 = $this->db->where('user_id',base64_decode($submitdata['user_id']))->update('users',$userdata);
		
		$userlogindata = array(
			'email' => $submitdata['email'],
			'mobile' => $submitdata['mobile'],
			'is_an_agency' => '',
			'job_complete_count' => 0,
			'job_incomplete_count' => 0,
			'total_points' => 0,
			'total_coins' => 0,
			'dom' => $dom,
			'status' => $submitdata['status'],
			'profile_status' => isset($submitdata['profile_status']) ? $submitdata['profile_status'] : 0,
		);
		
		if($submitdata['password'] != '' || $submitdata['password'] != NULL){
			$userlogindata['password'] = md5("ctgs".$submitdata['password']);
		}
		
		$return2 = $this->db->where('user_id',base64_decode($submitdata['user_id']))->update('user_login',$userlogindata);
		
		//echo base64_decode($submitdata['user_id']); die;
		
		$this->db->trans_complete();
		if($this->db->trans_status() === FALSE){
			return false;
		}else{
			if($this->db->affected_rows() > 0){
				return true;
			}else{
				return false;
			}
		}
	}

	function update_ticket_status($row_id,$selectedData){
		
		$this->db->set('problem_status', $selectedData);
		$this->db->where('id', $row_id);
		$this->db->update('user_grievance');
		if($this->db->affected_rows() > 0){
			return 'updated';
		}else{
			return 'Error';
		}
	}
	
	
	function update_status($row_id,$changeVal){
		$this->db->where('area_of_interest_id',$row_id)->update('area_of_interest',array('dom'=> date('Y-m-d H:i:s'),'status'=>$changeVal));
		$this->db->trans_complete();
		if($this->db->trans_status() === FALSE){
			return false;
		}else{
			if($this->db->affected_rows() > 0){
				return 'Updated';
			}else{
				return 'Error';
			}
		}
	}
	
	function get_post_list(){
		$sql = "select task.*, GROUP_CONCAT(aofi.name SEPARATOR ', ') as skill, task.task_doc, u.name 
				from `task`as task, `task_requirements` as req , `area_of_interest` as aofi, `users` as u
				where task.task_id = req.task_id and aofi.area_of_interest_id = req.area_of_interest_id and task.task_created_by=u.user_id
				group by req.task_id order by task.task_doc desc";

		
		$result = $this->db->query($sql);
		if($result->num_rows() > 0){
			return $result->result();
		}else{
			return array();
		}
	}
	
	
	
	public function get_user_query(){
		$this->db->select('anonymous_user_query.*');
		$this->db->from('anonymous_user_query');
		$result = $this->db->get();
		if($result->num_rows() > 0){ 
			return $result->result();
		}else{
			return array();
		}
	}
	public function get_problem_ticket_list($problem_status = "")
	{
		$this->db->select('user_grievance.*, grievance.problem_type, grievance.problem_type_other, users.name');
		$this->db->from('user_grievance');
		$this->db->join('grievance', 'grievance.fid = user_grievance.grievance_id');
		$this->db->join('users', 'users.user_id = user_grievance.user_id');
		$this->db->order_by('id', 'desc');
                if ($problem_status != "") {
                    $this->db->where('user_grievance.problem_status', $problem_status);
                }
		$result = $this->db->get();
		if($result->num_rows() > 0){ 
			return $result->result();
		}else{
			return array();
		}
	}

	public function get_problem_ticket_history()
	{
		$this->db->select('ticket_no,grievance_type');
		$this->db->from('user_ticket_history');
		$this->db->order_by('ticket_no', 'desc');
		$this->db->distinct('ticket_no');
		$result = $this->db->get();

		if($result->num_rows() > 0){ 
			return $result->result();
		}else{
			return array();
		}
	}
	
	
	public function problem_ticket_details($id)
	{
		$this->db->select('user_grievance.*, country.name as country_name, users.*, user_login.email, user_login.mobile');
		$this->db->join('users', 'users.user_id = user_grievance.user_id');
		$this->db->join('country', 'country.country_id = users.country');
		$this->db->join('user_login', 'user_login.user_id = users.user_id');
		$this->db->where('user_grievance.id', $id);
		$result = $this->db->get('user_grievance');
		if($result->num_rows() > 0){ 
			return $result->row();
		}else{
			return array();
		}
	}
	
	
	public function history_ticket_details($id)
	{
		$data['admin_view']= 0;
		$this->db->where('ticket_no', $id); 
		$return	= $this->db->update('user_ticket_history', $data);

		$this->db->select('*');
		$this->db->from('user_ticket_history');	
		$this->db->where('ticket_no', $id);
		$this->db->order_by('id', 'desc');
		$result = $this->db->get();

		if($result->num_rows() > 0){ 
			return $result->result();
		}else{
			return array();
		}
	}

    public function get_user_counts($usertype = 0, $count = false) {

        $this->db->select('users.*,user_login.*,user_login.status as active_status,country.name as country_name');
        $this->db->from('users');
        $this->db->join('user_login', 'user_login.user_id = users.user_id');
        $this->db->join('country', 'country.country_id = users.country', 'left');
        if ($usertype != 0) {
            $this->db->where('user_type', $usertype);
        }
        $this->db->where('users.status', 1);
        $this->db->order_by('users.doc', 'desc');
        $result = $this->db->get();
        if ($count) {
            return $result->num_rows();
        } else if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return array();
        }
    }

    public function get_problem_ticket_count() {
        $this->db->select('user_grievance.*, grievance.problem_type, grievance.problem_type_other, users.name');
        $this->db->from('user_grievance');
        $this->db->join('grievance', 'grievance.fid = user_grievance.grievance_id');
        $this->db->join('users', 'users.user_id = user_grievance.user_id');
        $this->db->order_by('id', 'desc');

        $result = $this->db->get();
        return $result->num_rows();
    }
    public function get_message_users() {
        $this->db->select('users.name,users.user_id, user_login.email, user_login.user_type , user_login.is_login, CASE WHEN user_login.profile_image is null THEN "assets/img/no-image.png" ELSE CONCAT("uploads/user/profile_image/",user_login.profile_image) END profile_image ', FALSE);
        $this->db->from('user_messages');
        $this->db->join('users', 'users.user_id = user_messages.user_id_from', 'LEFT');
        $this->db->join('user_login', 'user_login.user_id = user_messages.user_id_from', 'LEFT');
        $this->db->join('country', 'country.country_id = users.country', 'LEFT');
        $this->db->where('user_messages.user_id_to', $this->session->userdata('user_id'));
        $this->db->group_start();
        $this->db->or_where('user_login.user_type', 3);
        $this->db->or_where('user_login.user_type', 4);
        $this->db->or_where('user_login.user_type', 5);
        $this->db->group_end();
        $this->db->group_by('user_login.user_id');
        $query = $this->db->get();
        $result = $query->result();
        return $result;

    }
    public function get_user_messages($user_id = "") {
        $result = array();
        if ($user_id != "") {
            $this->db->select('user_messages.*,users.name,users.user_id, user_login.email, user_login.user_type , user_login.is_login, CASE WHEN user_login.profile_image is null THEN "assets/img/no-image.png" ELSE CONCAT("uploads/user/profile_image/",user_login.profile_image) END profile_image ', FALSE);
            $this->db->from('user_messages');
            $this->db->join('users', 'users.user_id = user_messages.user_id_from', 'LEFT');
            $this->db->join('user_login', 'user_login.user_id = user_messages.user_id_from', 'LEFT');
            $this->db->join('country', 'country.country_id = users.country', 'LEFT');
            $this->db->where('user_messages.user_id_from', $user_id);
            $this->db->where('user_messages.user_id_to', $this->session->userdata('user_id'));
            $this->db->group_start();
            $this->db->or_where('user_login.user_type', 3);
            $this->db->or_where('user_login.user_type', 4);
            $this->db->or_where('user_login.user_type', 5);
            $this->db->group_end();
            $this->db->group_by('user_messages.id');
            $query = $this->db->get();
            $result = $query->result();
        }
        return $result;

    }
}