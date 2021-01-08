<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Test extends CI_Controller {

	

	public function index()	{
		 $path= getcwd() ;
		//  $path1=$path."/application/libraries/Template.php";
		  $path2=$path."/application/libraries/Luser.php";
		  $path3=$path."/application/libraries/Ltask.php";
		  $path4=$path."/application/libraries/Lreview.php";
		  $path5=$path."/application/libraries/Lnotification.php";
		  $path6=$path."/application/libraries/Lhome.php";
		  $path7=$path."/application/libraries/Lhire.php";
		  $path8=$path."/application/libraries/Lfreelancer.php";
		 //chown($path, 666);

			/* if (unlink($path1)) {
				echo 'success'.$path1;
			} else {
				echo 'fail';
			} */
			
			echo "<br/>";
			
			if (unlink($path2)) {
				echo 'success'.$path2;
			} else {
				echo 'fail';
			}
			
				echo "<br/>";
		
			
			if (unlink($path3)) {
				echo 'success'.$path3;
			} else {
				echo 'fail';
			}
			
				echo "<br/>";
			if (unlink($path4)) {
				echo 'success'.$path4;
			} else {
				echo 'fail';
			}
			
				echo "<br/>";
			if (unlink($path5)) {
				echo 'success'.$path5;
			} else {
				echo 'fail';
			}
			
				echo "<br/>";
			if (unlink($path6)) {
				echo 'success'.$path6;
			} else {
				echo 'fail';
			}
				echo "<br/>";
			
			if (unlink($path7)) {
				echo 'success'.$path7;
			} else {
				echo 'fail';
			}
				echo "<br/>";
			if (unlink($path8)) {
				echo 'success'.$path8;
			} else {
				echo 'fail';
			}
				 
	}

}

