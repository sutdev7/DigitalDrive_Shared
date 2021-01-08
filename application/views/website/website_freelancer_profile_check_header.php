<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!--==========================
    Header
  ============================-->
<header id="header" class="innerHr postHr">
  <div class="container">
    <div id="logo" class="pull-left"> <a href="<?php echo base_url(); ?>" class="scrollto"> <img src="<?php  echo base_url('assets/img/logo.png'); ?>" alt=""/> </a> </div>
    <nav id="nav-menu-container">
      <ul class="nav-menu">
      	<li><a href="#" class="disableMenu">Micro Key</a></li>
        <li><a href="#" class="disableMenu">Post Micro Key</a></li>
        <li><a href="#" class="disableMenu">Key List</a></li>
        <li><a href="#" class="disableMenu">My Offers</a></li>
		<li><a href="#" class="disableMenu">My Earnings</a></li>
		<li><a href="#" class="disableMenu">Analytics</a></li>
		
      </ul>
      <ul class="nav-right_Div d-block d-sm-none">
        <li class="dropdown user user-menu"> <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img src="<?php  echo base_url('assets/img/user.png'); ?>" class="img-circle" alt="User Image"> <!--<span >Paul Molive</span>--> </a>
          <ul class="dropdown-menu">
			<li><a href="#" >Dashboard</a></li>
            <li><a href="#" >Public Profile</a></li>
            <li><a href="<?php echo base_url(); ?>user-bio">Freelancer Bio</a></li>
            <li><a href="#" >Settings</a></li>
			<li><a href="#" >Reviews</a></li>
			<li><a href="#" >Problem Ticket</a></li>
            <li><a href="<?php echo base_url(); ?>logout">Logout</a></li>
          </ul>
        </li>
      </ul>
    </nav>
    <ul class="nav-right_Div">
      <li><a href="#" class="disableMenu"> Messages <span class="oferDiv" style="display:none;"></span></a></li>
    <!--  <li class="dropdown"> <a href="#" class="noti dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-bell" aria-hidden="true"></i> <span class="badge2">01</span></a> -->

	   <li id="notify" class="dropdown" onclick="readnotification()"> <a href="#" class="noti dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-bell" aria-hidden="true"></i> <div id="count_notifications"></div>
	   </a>
        <ul  class="dropdown-menu">
           <li id="notifications">
            

          </li>
        </ul>
      </li>
      <li class="dropdown user user-menu d-none d-sm-block"> <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img src="<?php echo $this->session->userdata('user_site_image'); ?>" style="width:40px;height:40px;border-radius: 100%;" class="img-circle" alt="User Image"> <!--<span>Paul Molive</span>--> </a>
        <ul class="dropdown-menu">
			<li><a href="#" class="disableMenu">Dashboard</a></li>
			<li><a href="#" class="disableMenu">Public Profile</a></li>
			<li><a href="<?php echo base_url(); ?>user-bio">Freelancer Bio</a></li>
			<li><a href="#" class="disableMenu">Settings</a></li>
			<li><a href="#" class="disableMenu">Reviews</a></li>
			<li><a href="#" class="disableMenu">Problem Ticket</a></li>
			<li><a href="<?php echo base_url(); ?>logout">Logout</a></li>
        </ul>
      </li>
    </ul>
    
    <!-- #nav-menu-container --> 
  </div>
</header>


  <!--
<header id="header" class="innerHr">
  <div class="container">
    <div id="logo" class="pull-left"> <a href="<?php echo base_url(); ?>" class="scrollto"> <img src="<?php  echo base_url('assets/img/logo.png'); ?>" alt=""> </a> </div>
    <nav id="nav-menu-container">
      <ul class="nav-menu sf-js-enabled sf-arrows" style="touch-action: pan-y;">
        <li><a href="<?= base_url().'key-list' ?>" class = "<?php echo ($this->uri->segment(1) == 'key-list') ? "active" : '' ?> ">Key List</a></li> 
        <li><a href="<?= base_url().'freelancer-dashboard' ?>" class = "<?php echo ($this->uri->segment(1) == 'freelancer-dashboard') ? "active" : '' ?> ">Dashboard</a></li>
        <li><a href="<?= base_url().'my-jobs' ?>" class = "<?php echo ($this->uri->segment(1) == 'my-jobs') ? "active" : '' ?> ">My Jobs</a></li>
        <li><a href="<?= base_url().'earnings' ?>" class = "<?php echo ($this->uri->segment(1) == 'earnings') ? "active" : '' ?> "> My Earnings</a></li> 
        <li><a href="<?= base_url().'analytics' ?>" class = "<?php echo ($this->uri->segment(1) == 'analytics') ? "active" : '' ?> ">Analytics</a></li>
        <li><a href="<?= base_url().'problem-ticket' ?>" class = "<?php echo ($this->uri->segment(1) == 'problem-ticket') ? "active" : '' ?> ">Problem Ticket</a></li>
		<li><a href="<?= base_url().'messages' ?>" class = "<?php echo ($this->uri->segment(1) == 'messages') ? "active" : '' ?> ">Messages</a></li>
		<li><a href="<?= base_url().'notification' ?>" class="#dropdown-toggle"> 
			<i class="fa fa-bell" aria-hidden="true"></i></a>
		</li>
		<li><a href="<?= base_url().'logout' ?>" class = "<?php echo ($this->uri->segment(1) == 'logout') ? "active" : '' ?> ">Logout</a></li>
      </ul>
    </nav>
  </div>
</header> -->
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
		
		
		 var notification_redmarkoff = function() {
		//	 alert();
			$.ajax({
			method: "POST",
			url: "<?php echo base_url(); ?>Notification/notification_check_is_read",
			data: {}
				}).done(function(msg) {
			 //	alert(msg)
					 if(msg=="Y"){
						 $(".badge2").hide();
					 }
			});	
			 
								 
		};
		
		
		
//var x=1;
//var interval = 1000 * 60 * X; // where X is your every X minutes

var intervala=5000 ;

var intervalb=5000 ;
 setInterval(notification_ajax_call, intervala);
 setInterval(notification_read_ajax_call, intervalb);
 //setInterval(notification_redmarkoff, intervalb);
	  setInterval(msg_notification_ajax_call, intervalb);
	  
	  jQuery(document).ready(function() {
       notification_ajax_call;
       notification_read_ajax_call; 
	   msg_notification_ajax_call;
    });

</script>