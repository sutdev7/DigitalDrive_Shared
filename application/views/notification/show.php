<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<style>
  .eyeBtn2 { background: #1189f9; }
  .ph-no-vid { font-size:16px; color:#34c635; display:inline-block; margin-top:20px; } 
</style>

<main id="main"> 
  
  <?php 
  $msg = $this->session->flashdata('msg'); 
  if(!empty($msg)) {
  ?>
  <section style="padding-top: 7%;">
    <?php echo $msg; ?>
  </section>
  <?php
  }
  ?>

  <!--==========================
      ConterDiv Section
    ============================-->
  <div class="main-div-sec">
    <div class="full" style="background:#f6f8fa; padding: 30px 0 60px 0; width:100%; float:left;">
      <div class="container">
        <div class="view-box">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Notification</li>
            </ol>
          </nav>
          <div class="notificationDiv">
            <ul>
			{micro_notifications}
              <li>
                <div class="notificationDiv-lft"> <span> <img src="{user_image}" alt="{notification_send_by}" style="width:53px;height:52px;"> </span>{notification_message} </div>
                <div class="notificationDiv-rht"> {hours} Hour Ago 
                <!--<a href="<?= base_url('take-action/') ?>{task_notification_id}"><img src="<?php echo base_url(); ?>assets/img/accept_icon.png" width="40px" alt="icon"> </a> 
                
                <a href="<?= base_url('take-action/') ?>{task_notification_id}"> <img src="<?php echo base_url(); ?>assets/img/reject_icon.png" width="40px" alt="icon"> </a> -->
				</div>
				
              </li>
              {/micro_notifications}
              {notifications}
              <li>
                <div class="notificationDiv-lft"> <span> <img src="{user_image}" alt="{notification_send_by}" style="width:53px;height:52px;"> </span>{notification_message} </div>
                <div class="notificationDiv-rht"> {hours} Hour Ago 
                <!--<a href="<?= base_url('take-action/') ?>{task_notification_id}"><img src="<?php echo base_url(); ?>assets/img/accept_icon.png" width="40px" alt="icon"> </a> 
                
                <a href="<?= base_url('take-action/') ?>{task_notification_id}"> <img src="<?php echo base_url(); ?>assets/img/reject_icon.png" width="40px" alt="icon"> </a> -->
				
				{action_type}
				
				</div>
				
              </li>
              {/notifications}
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<script> 
  $(document).ready(function() { 
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
  }); 
</script>     