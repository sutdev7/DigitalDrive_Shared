<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Google API Configuration
| -------------------------------------------------------------------
| 
| To get API details you have to create a Google Project
| at Google API Console (https://console.developers.google.com)
| 
|  client_id         string   Your Google API Client ID.
|  client_secret     string   Your Google API Client secret.
|  redirect_uri      string   URL to redirect back to after login.
|  application_name  string   Your Google application name.
|  api_key           string   Developer key.
|  scopes            string   Specify scopes
*/
$config['google']['client_id']        = '418235702305-giiotbg2q4123c6g3dp9n5fhci92rdg4.apps.googleusercontent.com';
$config['google']['client_secret']    = 'hYY8HkTMvgtplMbjtDgrKRtO';
$config['google']['redirect_uri']     = 'http://www.drivedigitally.com/hirenwork/dashboard';
$config['google']['application_name'] = 'Login with google+';
$config['google']['api_key']          = '';
$config['google']['scopes']           = array();