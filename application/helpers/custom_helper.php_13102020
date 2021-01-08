<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('dd')){

	function dd($info){
		echo "<pre>"; print_r($info); die();
	}
}

if(!function_exists('format_date')){

	function format_date($date)
	{
		if(empty($date)) return '';
		return date('d/m/Y',strtotime($date));
	}
}

if(!function_exists('encrypt_decrypt_codes')){

	function encrypt_decrypt_codes($method, $key, $phrase){
		if ($method == 'encode')
		    return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $phrase, MCRYPT_MODE_ECB, mcrypt_create_iv(32, MCRYPT_RAND)));
		else if ($method == 'decode')
		    return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, base64_decode($phrase), MCRYPT_MODE_ECB, mcrypt_create_iv(32, MCRYPT_RAND)));
	}
}
if(!function_exists('no_of_projects')){

	function no_of_projects($freelance_id, $user_id){
		$CI =& get_instance();
		$CI->db->join('task_hired', 'task_hired.task_id = task.task_id');
		$CI->db->where('freelancer_id', $freelance_id);
        $CI->db->where('task_created_by', $user_id);
        $CI->db->where('(task.task_is_deleted IS NULL OR task.task_is_deleted=0)');
		return $CI->db->count_all_results('task');
	}
}

if(!function_exists('get_skill_name')){

	function get_skill_name($id){
		$CI =& get_instance();
		$query = $CI->db->select('name')
				->where('area_of_interest_id', $id)
				->get('area_of_interest');
		if($query->num_rows() > 0) return $query->row();
	}
}

if(!function_exists('timeAgo')){
	function timeAgo($time_ago) {
	    $time_ago =  strtotime($time_ago) ? strtotime($time_ago) : $time_ago;
	    $time  = time() - $time_ago;

		switch($time):
		// seconds
		case $time <= 60;
		return 'lessthan a minute ago';
		// minutes
		case $time >= 60 && $time < 3600;
		return (round($time/60) == 1) ? 'a minute' : round($time/60).' minutes ago';
		// hours
		case $time >= 3600 && $time < 86400;
		return (round($time/3600) == 1) ? 'a hour ago' : round($time/3600).' hours ago';
		// days
		case $time >= 86400 && $time < 604800;
		return (round($time/86400) == 1) ? 'a day ago' : round($time/86400).' days ago';
		// weeks
		case $time >= 604800 && $time < 2600640;
		return (round($time/604800) == 1) ? 'a week ago' : round($time/604800).' weeks ago';
		// months
		case $time >= 2600640 && $time < 31207680;
		return (round($time/2600640) == 1) ? 'a month ago' : round($time/2600640).' months ago';
		// years
		case $time >= 31207680;
		return (round($time/31207680) == 1) ? 'a year ago' : round($time/31207680).' years ago' ;

		endswitch;
	}
}

if(!function_exists('get_file_ext')){
    function get_file_ext($file = "") {
        $img    = 'http://cdn1.iconfinder.com/data/icons/CrystalClear/128x128/mimetypes/txt2.png';
        if ($file != "") {
            $pdfImg = 'http://cdn1.iconfinder.com/data/icons/CrystalClear/128x128/mimetypes/pdf.png';
            $docImg = 'http://cdn2.iconfinder.com/data/icons/sleekxp/Microsoft%20Office%202007%20Word.png';
            $pptImg = 'http://cdn2.iconfinder.com/data/icons/sleekxp/Microsoft%20Office%202007%20PowerPoint.png';
            $txtImg = 'http://cdn1.iconfinder.com/data/icons/CrystalClear/128x128/mimetypes/txt2.png';
            $xlsImg = 'http://cdn2.iconfinder.com/data/icons/sleekxp/Microsoft%20Office%202007%20Excel.png';
            $audioImg = 'http://cdn2.iconfinder.com/data/icons/oxygen/128x128/mimetypes/audio-x-pn-realaudio-plugin.png';
            $videoImg = 'http://cdn4.iconfinder.com/data/icons/Pretty_office_icon_part_2/128/video-file.png';
            $htmlImg = 'http://cdn1.iconfinder.com/data/icons/nuove/128x128/mimetypes/html.png';
            $fileImg = 'http://cdn3.iconfinder.com/data/icons/musthave/128/New.png';
            switch (get_file_extension($file)) {
                case 'pdf':
                    $img = $pdfImg;
                    break;
                case 'doc':
                    $img = $docImg;
                    break;
                case 'docx':
                    $img = $docImg;
                    break;
                case 'txt':
                    $img = $txtImg;
                    break;
                case 'xls':
                    $img = $xlsImg;
                    break;
                case 'xlsx':
                    $img = $xlsImg;
                    break;
                case 'xlsm':
                    $img = $xlsImg;
                    break;
                case 'ppt':
                    $img = $pptImg;
                    break;
                case 'pptx':
                    $img = $pptImg;
                    break;
                case 'mp3':
                    $img = $audioImg;
                    break;
                case 'wmv':
                    $img = $videoImg;
                    break;
                case 'mp4':
                    $img = $videoImg;
                    break;
                case 'mpeg':
                    $img = $videoImg;
                    break;
                case 'html':
                    $img = $htmlImg;
                    break;
                default:
                    $img = $fileImg;
                    break;
            } 
        }
        return $img;
    }
}
if(!function_exists('get_file_extension')){
    function get_file_extension($f) {
        $ftype = pathinfo($f);
        return $extension = $ftype['extension'];
    }
}
if(!function_exists('count_inactive_freelance')){
    function count_inactive_freelance() {
		$CI =& get_instance();
		$usertype=4;
		$count = 0;
		$CI->db->join('user_login', 'user_login.user_id = users.user_id');
		$CI->db->where('user_type',$usertype);
		$CI->db->where('users.status',1);
		$CI->db->where('user_login.profile_status',0);
		$count = $CI->db->count_all_results('users');
		return $count;
    }
}
if(!function_exists('count_inactive_client')){
    function count_inactive_client() {
		$count = 0;
		$CI =& get_instance();
		$usertype=3;
		$CI->db->join('user_login', 'user_login.user_id = users.user_id');
		$CI->db->where('user_type',$usertype);
		$CI->db->where('users.status',1);
		$CI->db->where('user_login.admin_read',0);
		$count = $CI->db->count_all_results('users');
		return $count;
    }
}
if(!function_exists('count_unsolved_ticket')){
    function count_unsolved_ticket() {
		$count = 0;
		$CI =& get_instance();
		$problem_status="unsolved";
		$CI->db->join('grievance',  'grievance.fid = user_grievance.grievance_id');
		$CI->db->where('user_grievance.problem_status',$problem_status);
		//$CI->db->where('user_grievance.admin_read',0);
		$count = $CI->db->count_all_results('user_grievance');
		return $count;
    }
}
if(!function_exists('count_inactive_room')){
    function count_inactive_room() {
		$CI =& get_instance();
		$usertype=5;
		$count = 0;
		$CI->db->join('user_login', 'user_login.user_id = users.user_id');
		$CI->db->where('user_type',$usertype);
		$CI->db->where('users.status',1);
		$CI->db->where('user_login.profile_status',0);
		$count = $CI->db->count_all_results('users');
		return $count;
    }
}