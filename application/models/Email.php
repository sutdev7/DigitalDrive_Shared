<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email extends CI_Model {

	public function __construct(){
		parent::__construct();
	}
	
	public function SendingEmail($to,$message,$subject){
		
		$to = $to;
		$subject = $subject;
		$message = $message;

		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		// More headers
		//$headers .= 'From: <webmaster@example.com>' . "\r\n";
		//$headers .= 'Cc: myboss@example.com' . "\r\n";

		mail($to,$subject,$message,$headers);

	}
	
}