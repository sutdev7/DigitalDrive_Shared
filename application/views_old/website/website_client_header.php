<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<!--==========================
    Header
  ============================-->
<header id="header" class="innerHr postHr">
  <div class="container">
    <div id="logo" class="pull-left"> <a href="<?php echo base_url(); ?>" class="scrollto"> <img src="<?php  echo base_url('assets/img/logo.png'); ?>" alt=""/> </a> </div>
    <nav id="nav-menu-container">
      <ul class="nav-menu">
        <li><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></li>        
        <li><a href="<?php echo base_url(); ?>micro-freelancer">Micro Freelancer</a></li>
        <li><a href="<?php echo base_url(); ?>search-freelancer">Search Freelancer</a></li>
        <li><a href="<?php echo base_url(); ?>rehire-freelancer">Rehire Freelancer</a></li>
        <li><a href="<?php echo base_url(); ?>sent-offer">Sent Offers</a></li>
		<li><a href="<?php echo base_url(); ?>user-analytics">Analytics</a></li>
      </ul>
      <ul class="nav-right_Div d-block d-sm-none">
        <li class="dropdown user user-menu"> <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img src="<?php  echo base_url('assets/img/user.png'); ?>" class="img-circle" alt="User Image"> <!--<span >Paul Molive</span>--> </a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></li>
			<li><a href="<?php echo base_url(); ?>public-profile">Public Profile</a></li>
            <li><a href="<?php echo base_url(); ?>user-bio">Client Bio</a></li>
            <li><a href="<?php echo base_url(); ?>settings">Settings</a></li>
            <li><a href="<?php echo base_url(); ?>reviews">Reviews</a></li>
			<li><a href="<?php echo base_url(); ?>problem-ticket">Problem Ticket</a></li>
			<li><a href="<?php echo base_url(); ?>problem-ticket-history">Problem History</a></li
            <li><a href="<?php echo base_url(); ?>logout">Logout</a></li>
          </ul>
        </li>
      </ul>
    </nav>
    <ul class="nav-right_Div">
      <li><a href="<?php echo base_url(); ?>messages">Messages<span class="oferDiv" style="display:none;"></span></a></li>
 
	   <li id="notify" class="dropdown" onclick="readnotification()"> 
		   <a href="#" class="noti dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-bell" aria-hidden="true"></i> <div id="count_notifications"></div>
		   </a>
			<ul  class="dropdown-menu">
			   <li id="notifications">
				

			  </li>
			</ul>
		</li>
	  
      <li class="dropdown user user-menu d-none d-sm-block"> <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img src="<?php echo $this->session->userdata('user_site_image'); ?>" style="width:40px;height:40px;border-radius: 100%;" class="img-circle" alt="User Image"> <!--<span>Paul Molive</span>--> </a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></li>
			<li><a href="<?php echo base_url(); ?>public-profile">Public Profile</a></li>
            <li><a href="<?php echo base_url(); ?>user-bio">Client Bio</a></li>
            <li><a href="<?php echo base_url(); ?>settings">Settings</a></li>
            <li><a href="<?php echo base_url(); ?>reviews">Reviews</a></li>
			<li><a href="<?php echo base_url(); ?>problem-ticket">Problem Ticket</a></li>
            <li><a href="<?php echo base_url(); ?>logout">Logout</a></li>
        </ul>
      </li>
    </ul>
    
    <!-- #nav-menu-container --> 
  </div>
</header>
<!-- #header -->

<script>
 function readnotification(){
	 $.ajax({
			method: "POST",
			url: "<?php echo base_url(); ?>Notification/notification_check_read",
			data: {}			
				}).done(function(msg) {
					 // alert(msg)
					 if(msg>0){
						   $(".badge2").hide();
					 }
			});	
 }
	 
	 
		/* $("li > a > span").click(function(){
			 
			 $.ajax({
			method: "POST",
			url: "<?php echo base_url(); ?>Notification/notification_read",
			data: {}
		}).done(function(msg) {
			  alert(msg)
			$("#notifications").html(msg);
		});	
			 
			
		});
		 */
		 
		
			 
		 var notification_ajax_call = function() {
		 	// alert();
			$.ajax({
			method: "POST",
			url: "<?php echo base_url(); ?>Notification/notification_count",
			data: {}
				}).done(function(msg) {
					 // alert(msg)
					 if(msg>0){
						 $("#count_notifications").html('<span class="badge2">'+msg+'</span> ');
					 }else{
						  $(".badge2").hide();
					 }
					//$(".badge2").html(msg);
				 //	alert($(".badge2").text())
			});	
			 
								 
		};
		
			 var msg_notification_ajax_call = function() {
		 	// alert();
			$.ajax({
			method: "POST",
			url: "<?php echo base_url(); ?>Notification/message_notification_count",
			data: {}
				}).done(function(msg) {
					 // alert(msg)
					 if(msg>0){
						  $(".oferDiv").show();
						 $(".oferDiv").html(msg);
					 }else{
						  $(".oferDiv").hide();
					 }
					//$(".badge2").html(msg);
				 //	alert($(".badge2").text())
			});	
			 
								 
		};
		
		
			 var notification_read_ajax_call = function() {
		//	 alert();
			$.ajax({
			method: "POST",
			url: "<?php echo base_url(); ?>Notification/notification_read",
			data: {}
				}).done(function(msg) {
			 //	alert(msg)
					 $("#notifications").html(msg);
			});	
			 
								 
		};
		
//var x=1;
//var interval = 1000 * 60 * X; // where X is your every X minutes

var intervala=5000 ;

var intervalb=5000 ;
setInterval(notification_ajax_call, intervala);
setInterval(notification_read_ajax_call, intervalb);
setInterval(msg_notification_ajax_call, intervalb);

	 jQuery(document).ready(function() {
       notification_ajax_call;
       notification_read_ajax_call; 
	   msg_notification_ajax_call;
    });

</script>