<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Google_login extends CI_Controller {

   public function __construct()
{
    parent::__construct();
    require_once APPPATH.'third_party/src/Google_Client.php';
    require_once APPPATH.'third_party/src/contrib/Google_Oauth2Service.php';
    $this->load->helper('cookie');
    $this->load->model('Users'); 
    $this->load->model('Notifications'); 
    $this->load->library('Laccount');
    $this->load->helper('security');
    $this->load->library('session');
}
    
    public function index()
    {
        $this->load->view('google_login');
    }
    
    public function login()
    {
       
        $clientId = '891247501424-j59fct38lumru590tme2m0j6qd6bq9am.apps.googleusercontent.com'; //Google client ID
        $clientSecret = 'yLPGINnqoRmLuY7sIn2D_wj9'; //Google client secret
        $redirectURL = 'http://www.drivedigitally.com/hwfinal/google_login/login';
        
        //https://curl.haxx.se/docs/caextract.html

        //Call Google API
        $gClient = new Google_Client();
        $gClient->setApplicationName('Login');
        $gClient->setClientId($clientId);
        $gClient->setClientSecret($clientSecret);
        $gClient->setRedirectUri($redirectURL);
        $google_oauthV2 = new Google_Oauth2Service($gClient);

        // print_r($google_oauthV2->userinfo->get());
	         // print_r($_GET);
	         // die('11');
	        
        if(isset($_GET['code']))
        {
            $gClient->authenticate($_GET['code']);
            $_SESSION['token'] = $gClient->getAccessToken();
            header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
        }

        if (isset($_SESSION['token'])) 
        {
            $gClient->setAccessToken($_SESSION['token']);
        }
        
        if ($gClient->getAccessToken()) {
            $userProfile = $google_oauthV2->userinfo->get();

           
            $utype = $this->session->userdata('type');
            $email = $userProfile['email'];
            $name = $userProfile['email'];
            $result = $this->Users->check_gmail_valid_user($email);

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
            
            $notifications=$this->Notifications->get_all_user_notification($result[0]['user_id']);
            $count_notification=count($notifications);
            
            // codeigniter session stored data          
            $user_data = array(
                'sid_web'       => $sid_web,
                'user_id'       => $result[0]['user_id'],
                'profile_id'    => $result[0]['profile_id'],
                'user_type'     => $result[0]['user_type'],
                'user_name'     => $result[0]['name'],
                'user_email'    => $result[0]['email'],
                'user_mobile'   => $result[0]['mobile'],
                'user_image'    => $result[0]['profile_image'],
                'user_site_image'   => $user_profile_image,
                'is_mobile_verified' => $result[0]['is_mobile_verified'],
                'receive_transactional_notification'    => $result[0]['receive_transactional_notification'],
                'receive_task_update_notification'  => $result[0]['receive_task_update_notification'],
                'receive_task_reminder_notification'    => $result[0]['receive_task_reminder_notification'],
                'receive_helpful_notification'  => $result[0]['receive_helpful_notification'],
                'total_points' => $result[0]['total_points'],
                'profile_status'=> $result[0]['profile_status'],
                'count_notification'=>$count_notification
            );

            $this->session->set_userdata($user_data);
            redirect('dashboard', 'refresh');
            }else{

            $this->session->set_flashdata('errmsg', $email. ' this email not in our database, try with another');    
            $content = $this->laccount->sign_in_page();
            $data = array(
                        'content' => $content,
                        'title' => display('Sign-in :: Hire-n-Work'),
                    );      
            $this->template->full_website_html_view($data);
            }

        } 
        else 
        {
            $url = $gClient->createAuthUrl();
            header("Location: $url");
            exit;
        }
    }   
}

?>