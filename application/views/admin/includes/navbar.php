<?php 
$sql            = "select admin_notification.* from admin_notification where admin_notification.notif = 'FR' AND notify_status='0'";
$query          = $this->db->query($sql);
$notifications  = $query->result();

$clsql            = "select admin_notification.* from admin_notification where admin_notification.notif = 'CL' AND notify_status='0'";
$clquery          = $this->db->query($clsql);
$clnotifications  = $clquery->result();

$nlsql            = "select admin_notification.* from admin_notification where admin_notification.notif = 'NL' AND notify_status='0'";
$nlquery          = $this->db->query($nlsql);
$nlnotifications  = $nlquery->result();
//c_pr($notifications);
/************* Problem Ticket Notification ************/
$ticketquery = "SELECT user_grievance.id,user_grievance.doc,user_grievance.problem_status, users.name
FROM user_grievance
LEFT JOIN users ON user_grievance.user_id = users.user_id
WHERE user_grievance.problem_status='unsolved'";
$ticket   = $this->db->query($ticketquery);
$newtickets  = $ticket->result();
/*************** CLient Add Micro Key ******************/
$clientmikro= "SELECT microkey_client.id,microkey_client.status,microkey_client.created,users.name
FROM microkey_client
LEFT JOIN users ON microkey_client.user_id = users.user_id
WHERE microkey_client.status='1'";
$res= $this->db->query($clientmikro);
$clienttask  = $res->result();
/****************** New Message *****************/
$querymsg= "SELECT user_messages.is_read,user_messages.user_id_from,users.name
FROM user_messages
LEFT JOIN users ON user_messages.user_id_from = users.user_id
WHERE user_messages.status='1' AND user_messages.is_read='N' ORDER BY user_messages.user_id_from DESC";
$resmsg= $this->db->query($querymsg);
$newmessage  = $resmsg->result();
/*************** Freelancer Add Micro Key ******************/
$freelancermikro= "SELECT microkey.id,microkey.status,microkey.created,users.name
FROM microkey
LEFT JOIN users ON microkey.user_id = users.user_id
WHERE microkey.status='1'";
$resfree= $this->db->query($freelancermikro);
$freelancertask  = $resfree->result();
?>
<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="" class="nav-link">Hi! Welcome to Admin Panel</a>
      </li>
    </ul>
	
  <!--<ul class="nav navbar-nav pull-right">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bell" style="font-size:24px" title="Freelancer"></i> <span class="counter"><b><?php echo count($notifications); ?></b></span></a>
            <ul class="dropdown-menu notify-drop">
                <div class="drop-content notification_content">
                    
                </div>
            </ul>
        </li>
      </ul>-->
	  <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Freelancer (<b><?php echo count_inactive_freelance(); ?></b>)</a>
          <ul class="dropdown-menu notify-drop">
            <div class="notify-drop-title">
            	<div class="row">
            		<div class="col-md-6 col-sm-6 col-xs-6">Freelancer Notifications</div>
            		<div class="col-md-6 col-sm-6 col-xs-6 text-right"><a href="" class="rIcon allRead" data-tooltip="tooltip" data-placement="bottom" title="tümü okundu."><i class="fa fa-dot-circle-o"></i></a></div>
            	</div>
            </div>
            <!-- end notify title -->
            <!-- notify content -->
            <div class="drop-content">
				<?php foreach($notifications as $fr_notif){
			$message=$fr_notif->message_content;
			$date_time=$fr_notif->date_time;
			$notify_status=$fr_notif->notify_status;
		?>
				<li <?php // if($notify_status==0){ echo 'class="unread"';} ?>>
					<li>
            		<div class="col-md-3 col-sm-3 col-xs-3"><div class="notify-img"><img src="http://placehold.it/45x45" alt=""></div></div>
            		<div class="col-md-9 col-sm-9 col-xs-9 pd-l0"><?php echo $message; ?><a title="Edit Info" href="<?= base_url().'admin/user/edit/'.base64_encode($fr_notif->user_id_from) ?>"> View Deatils</a> <a href="" class="rIcon"><i class="fa fa-dot-circle-o"></i></a>
            		
            		<hr>
            		<p class="time"><?php echo $date_time; ?></p>
            		</div>
            	</li>
		<?php } ?>
                           
            	
            	
            </div>
            <div class="notify-drop-footer text-center">
            	<a href=""><i class="fa fa-eye"></i> All</a>
            </div>
          </ul>
        </li>
      </ul>
	   <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Client (<b><?php echo count_inactive_client(); ?></b>)</a>
          <ul class="dropdown-menu notify-drop">
            <div class="notify-drop-title">
            	<div class="row">
            		<div class="col-md-6 col-sm-6 col-xs-6">Client Notifications</div>
            		<div class="col-md-6 col-sm-6 col-xs-6 text-right"><a href="" class="rIcon allRead" data-tooltip="tooltip" data-placement="bottom" title="tümü okundu."><i class="fa fa-dot-circle-o"></i></a></div>
            	</div>
            </div>
            <!-- end notify title -->
            <!-- notify content -->
            <div class="drop-content">
		<?php foreach($clnotifications as $cl_notif){
			$message=$cl_notif->message_content;
			$date_time=$cl_notif->date_time;
			$notify_status=$cl_notif->notify_status;
		?>
		<li <?php // if($notify_status==0){ echo 'class="unread"';} ?>>
					<li>
            		<div class="col-md-3 col-sm-3 col-xs-3"><div class="notify-img"><img src="http://placehold.it/45x45" alt=""></div></div>
            		<div class="col-md-9 col-sm-9 col-xs-9 pd-l0"><?php echo $message; ?><a title="Edit Info" href="<?= base_url().'admin/user/edit/'.base64_encode($cl_notif->user_id_from) ?>"> View Details</a> <a href="" class="rIcon"><i class="fa fa-dot-circle-o"></i></a>
            		
            		<hr>
            		<p class="time"><?php echo $date_time; ?></p>
            		</div>
            	</li>
                                 
		<?php } ?>
            </div>
            <div class="notify-drop-footer text-center">
            	<a href=""><i class="fa fa-eye"></i> View Details</a>
            </div>
          </ul>
        </li>
      </ul>
	   <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Room (<b><?php echo count_inactive_room(); ?></b>)</a>
          <ul class="dropdown-menu notify-drop">
            <div class="notify-drop-title">
            	<div class="row">
            		<div class="col-md-6 col-sm-6 col-xs-6">Room Notifications</div>
            		<div class="col-md-6 col-sm-6 col-xs-6 text-right"><a href="" class="rIcon allRead" data-tooltip="tooltip" data-placement="bottom" title="tümü okundu."><i class="fa fa-dot-circle-o"></i></a></div>
            	</div>
            </div>
            <!-- end notify title -->
            <!-- notify content -->
            <div class="drop-content">
            	<?php foreach($nlnotifications as $nl_notif){
			$message=$nl_notif->message_content;
			$date_time=$nl_notif->date_time;
			$notify_status=$nl_notif->notify_status;
			
		?>
		       <li <?php // if($notify_status==0){ echo 'class="unread"';} ?>>
            		<div class="col-md-3 col-sm-3 col-xs-3"><div class="notify-img"><img src="http://placehold.it/45x45" alt=""></div></div>
            		<div class="col-md-9 col-sm-9 col-xs-9 pd-l0"><?php echo $message; ?><a title="Edit Info" href="<?= base_url().'admin/user/edit/'.base64_encode($nl_notif->user_id_from) ?>"> View Details</a> <a href="" class="rIcon"><i class="fa fa-dot-circle-o"></i></a>
            		
            		<hr>
            		<p class="time"><?php echo $date_time; ?></p>
            		</div>
            	</li>

		<?php } ?>
            </div>
            <div class="notify-drop-footer text-center">
            	<a href=""><i class="fa fa-eye"></i> View Details</a>
            </div>
          </ul>
        </li>
      </ul>
	   <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ticket (<b><?php echo count_unsolved_ticket(); ?></b>)</a>
          <ul class="dropdown-menu notify-drop">
            <div class="notify-drop-title">
            	<div class="row">
            		<div class="col-md-6 col-sm-6 col-xs-6">Problem Ticket Generate</div>
            		<div class="col-md-6 col-sm-6 col-xs-6 text-right"><a href="" class="rIcon allRead" data-tooltip="tooltip" data-placement="bottom" title="tümü okundu."><i class="fa fa-dot-circle-o"></i></a></div>
            	</div>
            </div>
            <!-- end notify title -->
            <!-- notify content -->
            <div class="drop-content">
            	<?php foreach($newtickets as $tc_notif){
			$name=$tc_notif->name;
			$id=$tc_notif->id;
			$doc=$tc_notif->doc;
			$status=$tc_notif->problem_status;
			//$date_time=$tc_notif->date_time;
			$notify_status=$tc_notif->notify_status;
		?>
		<li <?php  //if($status=='unsolved'){ echo 'class="unread"';} ?>>
			
			<div class="col-md-3 col-sm-3 col-xs-3"><div class="notify-img"><img src="http://placehold.it/45x45" alt=""></div></div>
            		<div class="col-md-9 col-sm-9 col-xs-9 pd-l0"><?php echo $name; ?></strong> New Ticket Generate <a title="Edit Info" href="<?= base_url().'admin/user/edit/'.base64_encode($nl_notif->user_id_from) ?>"> View Details</a> <a href="" class="rIcon"><i class="fa fa-dot-circle-o"></i></a>
            		
            		<hr>
            		<p class="time"><?php echo $date_time; ?></p>
            		</div>
		</li>
		
		<?php } ?>
            </div>
            <div class="notify-drop-footer text-center">
            	<a href=""><i class="fa fa-eye"></i> View All</a>
            </div>
          </ul>
        </li>
      </ul>
	  <!--================================================================================-->

  </nav>
  <script>
  function updatenotif(user_id){
	  jQuery.ajax({
		 url: '<?php echo site_url('updatenotif'); ?>', 
		 type: 'GET',
		 data: {'user_id':user_id},
		 success: function(data){
			 <?php $ui=base64_encode($row->user_id); ?>
			// alert(data);
			// var encodedString = Base64.encode(user_id);
			 window.location.href = '<?php echo base_url().'admin/user/edit/'.base64_encode(''+ user_id +'') ?>';
			 
		 }
	  });
  }
  </script>
<!-- /.navbar -->
  <style>
  
.toper {
    margin: 0px 0px 0px -153px!important;
}
  table.second-table tr td {
    /* float: left; */
    padding-right: 54px;
}
  table.second-table {
    margin-left: 180px;
}
  .unread{
	  background:#e6baba !important;
  }
/*a.fa-bell {
    position: relative;
    font-size: 24px;
    color: #007bff!important;
    cursor: pointer;
}
span.counter {
    position: absolute;
    right: -15px;
    top: -10px;
}
.dropdown-toggle::after{
	display:none;
}*/
ul.timeline.timeline-icons.timeline-sm{
	    overflow: scroll;
    height: 300px;
}
/* -----------------------------------------
   Timeline
----------------------------------------- */
.timeline {
  list-style: none;
  padding-left: 0;
  position: relative;
}
.timeline:after {
  content: "";
  height: auto;
  width: 1px;
  background: #e3e3e3;
  position: absolute;
  top: 5px;
  left: 30px;
  bottom: 25px;
}
.timeline.timeline-sm:after {
  left: 12px;
}
.timeline li {
  position: relative;
  padding-left: 70px;
  margin-bottom: 20px;
}
.timeline li:after {
  content: "";
  width: 12px;
  height: 12px;
  border-radius: 50%;
  background: #e3e3e3;
  position: absolute;
  left: 24px;
  top: 5px;
}
.timeline li .timeline-date {
  display: inline-block;
  width: 100%;
  color: #fff;
  font-style: italic;
  font-size: 13px;
}
.timeline.timeline-icons li {
  padding-top: 7px;
}
.timeline.timeline-icons li:after {
  width: 32px;
  height: 32px;
  background: #fff;
  border: 1px solid #e3e3e3;
  left: 14px;
  top: 0;
  z-index: 11;
}
.timeline.timeline-icons li .timeline-icon {
  position: absolute;
  left: 23.5px;
  top: 7px;
  z-index: 12;
}
.timeline.timeline-icons li .timeline-icon [class*=glyphicon] {
  top: -1px !important;
}
.timeline.timeline-icons.timeline-sm li {
  padding-left: 40px;
  margin-bottom: 10px;
}
.timeline.timeline-icons.timeline-sm li:after {
  left: -5px;
}
.timeline.timeline-icons.timeline-sm li .timeline-icon {
  left: 4.5px;
}
.timeline.timeline-advanced li {
  padding-top: 0;
}
.timeline.timeline-advanced li:after {
  background: #fff;
  border: 1px solid #29b6d8;
}
.timeline.timeline-advanced li:before {
  content: "";
  width: 52px;
  height: 52px;
  border: 10px solid #fff;
  position: absolute;
  left: 4px;
  top: -10px;
  border-radius: 50%;
  z-index: 12;
}
.timeline.timeline-advanced li .timeline-icon {
  color: #29b6d8;
}
.timeline.timeline-advanced li .timeline-date {
  width: 75px;
  position: absolute;
  right: 5px;
  top: 3px;
  text-align: right;
}
.timeline.timeline-advanced li .timeline-title {
  font-size: 17px;
  margin-bottom: 0;
  padding-top: 5px;
  font-weight: bold;
}
.timeline.timeline-advanced li .timeline-subtitle {
  display: inline-block;
  width: 100%;
  color: #a6a6a6;
}
.timeline.timeline-advanced li .timeline-content {
  margin-top: 10px;
  margin-bottom: 10px;
  padding-right: 70px;
}
.timeline.timeline-advanced li .timeline-content p {
  margin-bottom: 3px;
}
.timeline.timeline-advanced li .timeline-content .divider-dashed {
  padding-top: 0px;
  margin-bottom: 7px;
  width: 200px;
}
.timeline.timeline-advanced li .timeline-user {
  display: inline-block;
  width: 100%;
  margin-bottom: 10px;
}
.timeline.timeline-advanced li .timeline-user:before,
.timeline.timeline-advanced li .timeline-user:after {
  content: " ";
  display: table;
}
.timeline.timeline-advanced li .timeline-user:after {
  clear: both;
}
.timeline.timeline-advanced li .timeline-user .timeline-avatar {
  border-radius: 50%;
  width: 32px;
  height: 32px;
  float: left;
  margin-right: 10px;
}
.timeline.timeline-advanced li .timeline-user .timeline-user-name {
  font-weight: bold;
  margin-bottom: 0;
}
.timeline.timeline-advanced li .timeline-user .timeline-user-subtitle {
  color: #a6a6a6;
  margin-top: -4px;
  margin-bottom: 0;
}
.timeline.timeline-advanced li .timeline-link {
  margin-left: 5px;
  display: inline-block;
}
.timeline-load-more-btn {
  margin-left: 70px;
}
.timeline-load-more-btn i {
  margin-right: 5px;
}

.mikro-freelancer{
	    padding: 2px 41px;
}
/* -----------------------------------------
   Dropdown
----------------------------------------- */
.dropdown-menu{
    padding:0 0 0 0;
}
a.dropdown-menu-header {
    background: #f7f9fe;
    font-weight: bold;
    border-bottom: 1px solid #e3e3e3;
}
.dropdown-menu > li a.freelancer {
        padding: 2px 30px;
}
.dropdown-menu > li a.client {
        padding: 2px 47px;
}
.dropdown-menu > li a.room {
        padding: 2px 47px;
}
.dropdown-menu > li a.ticket {
        padding: 2px 27px;
}
.dropdown-menu > li a.mikro {
        padding: 2px 51px;
}

/* -----------------------------------------
   Badge
----------------------------------------- */

.badge{
    padding: 3px 5px 2px;
    position: absolute;
    top: 8px;
    right: 5px;
    display: inline-block;
    min-width: 10px;
    font-size: 12px;
    font-weight: bold;
    color: #ffffff;
    line-height: 1;
    vertical-align: baseline;
    white-space: nowrap;
    text-align: center;
    border-radius: 10px;
}
.badge-danger {
    background-color: #db5565;
}
  </style>
<?php $this->load->view('admin/includes/sidebar') ?>
  
  