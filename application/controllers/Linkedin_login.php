<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Linkedin_login extends CI_Controller
{
    function __construct() {
        parent::__construct();
        
        // Load linkedin config
        $this->load->config('linkedin');
        
        //Load user model
        $this->load->model('Users');
    }
    
    public function linkedinlogin() {
		$userData = array();
        
        //Include the linkedin api php libraries
        include_once APPPATH."libraries/linkedin-oauth-client/http.php";
        include_once APPPATH."libraries/linkedin-oauth-client/oauth_client.php";
        
        
        //Get status and user info from session
        $oauthStatus = $this->session->userdata('oauth_status');
        $sessUserData = $this->session->userdata('userData');
        
        if(isset($oauthStatus) && $oauthStatus == 'verified'){
            //User info from session
            $userData = $sessUserData;
        }elseif((isset($_REQUEST["oauth_init"]) && $_REQUEST["oauth_init"] == 1) || (isset($_REQUEST['oauth_token']) && isset($_REQUEST['oauth_verifier']))){
            $client = new oauth_client_class;
            $client->client_id = $this->config->item('linkedin_api_key');
            $client->client_secret = $this->config->item('linkedin_api_secret');
            $client->redirect_uri = base_url().$this->config->item('linkedin_redirect_url');
            $client->scope = $this->config->item('linkedin_scope');
            $client->debug = false;
            $client->debug_http = true;
            $application_line = __LINE__;
            
            //If authentication returns success
            if($success = $client->Initialize()){
                if(($success = $client->Process())){
                    if(strlen($client->authorization_error)){
                        $client->error = $client->authorization_error;
                        $success = false;
                    }elseif(strlen($client->access_token)){
                        $success = $client->CallAPI('http://api.linkedin.com/v1/people/~:(id,email-address,first-name,last-name,location,picture-url,public-profile-url,formatted-name)', 
                        'GET',
                        array('format'=>'json'),
                        array('FailOnAccessError'=>true), $userInfo);
                    }
                }
                $success = $client->Finalize($success);
            }
            
            if($client->exit) exit;
    
            if($success){
                //Preparing data for database insertion
                $first_name = !empty($userInfo->firstName)?$userInfo->firstName:'';
              //  $last_name = !empty($userInfo->lastName)?$userInfo->lastName:'';
                $userData = array(
                    'oauth_provider'=> 'linkedin',
                    'oauth_uid'     => $userInfo->id,
                    'username'     => $first_name,
                    //'last_name'     => $last_name,
                    'email'         => $userInfo->emailAddress,
                    'locale'         => $userInfo->location->name,
                   // 'profile_url'     => $userInfo->publicProfileUrl,
                   // 'picture_url'     => $userInfo->pictureUrl
                );
                
                //Insert or update user data
                $userID = $this->user->checkUser($userData);
                
                //Store status and user profile info into session
                $this->session->set_userdata('oauth_status','verified');
                $this->session->set_userdata('userData',$userData);
                
                //Redirect the user back to the same page
                redirect('linkedinlogin');

            }else{
                 $data['error_msg'] = 'Some problem occurred, please try again later!';
            }
        }elseif(isset($_REQUEST["oauth_problem"]) && $_REQUEST["oauth_problem"] <> ""){
            $data['error_msg'] = $_GET["oauth_problem"];
        }else{
            $data['oauthURL'] = base_url().$this->config->item('linkedin_redirect_url').'?oauth_init=1';
        }
        
        $data['userData'] = $userData;
        
        // Load login & profile view
       // $this->load->view('account/sign-in',$data);
	
    }

    public function logout() {
        //Unset token and user data from session
        $this->session->unset_userdata('oauth_status');
        $this->session->unset_userdata('userData');
        
        //Destroy entire session
        $this->session->sess_destroy();
        
        // Redirect to login page
        redirect('linkedinlogin');
    }
}