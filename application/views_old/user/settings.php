<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


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
  
  ($this->session->userdata('user_type') == 3)? $user_type = 'Client' : $user_type = 'Freelancer';
  
  ?>

  <?php 
  $frmValidationMsg = validation_errors(); 
  if(!empty($frmValidationMsg)) {
  ?>
  <section style="padding-top: 7%;">
    <?php echo '<div class="alert alert-danger text-center">' . $frmValidationMsg . '</div>'; ?>
  </section>
  <?php
  }
  ?>

  <!--==========================
      ConterDiv Section
    ============================-->
  <section id="profile_section">
    <div class="profile_top">
      <div class="container">
        <div class="row">
          <div class="col-lg-3"> </div>
          <div class="col-lg-9">
            <div class="profile_topLink <?php echo  ($this->session->userdata('user_type') == 4) ? 'freelancer' : 'client'; ?>">
              <ul>
                <li><a href="<?php echo base_url(); ?>user-bio"><img src="<?php  echo base_url('assets/img/BioIcon-1A.png'); ?>" alt=""><?=$user_type?> Bio</a></li>

                <?php if($this->session->userdata('user_type') == 4) {?>
                      <li class=""><a href="<?php echo base_url(); ?>portfolio"><img src="<?php  echo base_url('assets/img/GenderIcon-1A.png'); ?>" alt=""> Portfolio</a></li>
                <?php } ?>

                <li><a href="<?php echo base_url(); ?>gender"><img src="<?php  echo base_url('assets/img/GenderIcon-1A.png'); ?>" alt=""> Gender</a></li>
                <li><a href="<?php echo base_url(); ?>payment"><img src="<?php  echo base_url('assets/img/PaymentIcon-1A.png'); ?>" alt=""> Payment</a></li>
                <li class="active"><a href="<?php echo base_url(); ?>settings"><img src="<?php  echo base_url('assets/img/SettingIcon-1A.png'); ?>" alt=""> Settings</a></li>
                <li><a href="<?php echo base_url(); ?>reviews"><img src="<?php  echo base_url('assets/img/ReviewIcon-1A.png'); ?>" alt=""> Reviews</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="profile">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <div class="pro_img"> <span class="pro_imgBox"><img src="{user_info}{user_image}{/user_info}" alt="Profile Image" /> <a href="#" class="uplod"></a> </span>
              <h2><?php echo $this->session->userdata('user_name'); ?></h2>
              <p>{user_info} {city} {/user_info}, {user_info} {state} {/user_info}, {user_info} {country} {/user_info}</p>
              <a href="<?php echo base_url(); ?>public-profile" class="pro_imgBtn">View Public Profile</a> <a href="<?php echo base_url(); ?>logout" class="pro_logout" ><img src="<?php  echo base_url('assets/img/logout.png'); ?>" alt=""></a> </div>
          </div>
          <div class="col-lg-9">
            <div class="pro_info">
              <h4>Change Password</h4>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
              <div class="row">
                <form id="frmChangePassword" name="frmChangePassword" action="<?php echo base_url(); ?>user/change_password" method="post">
                  <ul class="ChangePswd">
                    <li>
                      <label>Current Password</label>
                      <input class="form-control" name="fldCurrentPassword" type="password" placeholder="Enter Current Password" required />
                    </li>
                    <li>
                      <label>New Password</label>
                      <input class="form-control" name="fldNewPassword" type="password" placeholder="Enter New Password" minlength="6" required />
                    </li>
                    <li>
                      <label>Confirm New Password</label>
                      <input class="form-control" name="fldConfirmPassword" type="password" placeholder="Confirm New Password" minlength="6" required />
                    </li>
                    <li class="fullWidth">
                      <button type="submit" name="btnSubmit" class="btn btn-primary">Save</button>
                    </li>
                  </ul>
                </form>
              </div>
            </div>
            <div class="pro_info">
              <h4>Mobile Verification</h4>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
              <form action="#">
                <ul class="ChangePswd MobVerify">
                  <li>
                    <label>Enter Ph No.</label>
                    <div class="InputWrapper">
                      <div class="TblCell">
                        <input type="text" name="fldMobile" id="fldMobile" placeholder="Enter your phone number" value="<?php echo $this->session->userdata('user_mobile', ''); ?>">
                      </div>
                      <div class="TblCell Rht">
                        <button type="button" id="btnSendOTP" name="btnSendOTP">Send Another</button>
                      </div>
                    </div>
                  </li>
                  <li>
                    <label>Enter OTP</label>
                    <div class="InputWrapper">
                      <div class="TblCell">
                        <input type="text" name="fldMobileValidation" placeholder="Enter your phone number">
                      </div>
                      <div class="TblCell Rht">
                        <button class="verifyOTP" type="button" name="btnVerifyOTP">Verify My Number</button>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="yNote">Note: Enter the code which you have received by sms</div>
                  </li>
                </ul>
              </form>
            </div>
            <div class="pro_info">
              <h4>Notification Settings</h4>
              <ul class="NotifyLists">
                <li>
                  <h3>Transactional</h3>
                  <p>You will always receive important notifications in your email account.</p>
                  <label class="switch">
                    <input type="checkbox" name="receive_transactional_notification" id="receive_transactional_notification" value="1" <?php echo (($this->session->userdata('receive_transactional_notification', '1') == '1')?'checked':''); ?>>
                    <span class="slider round"></span> </label>
                </li>
                <li>
                  <h3>Task Updates</h3>
                  <p>Receive updates on any new comments, private messages, offers and reviews.</p>
                  <label class="switch">
                    <input type="checkbox" name="receive_task_update_notification" id="receive_task_update_notification" value="1" <?php echo (($this->session->userdata('receive_task_update_notification', '1') == '1')?'checked':''); ?>>
                    <span class="slider round"></span> </label>
                </li>
                <li>
                  <h3>Task Reminder</h3>
                  <p>Friendly reminders if you've forgotten to accept an offer, release a payment or leave a review.</p>
                  <label class="switch">
                    <input type="checkbox" name="receive_task_reminder_notification" id="receive_task_reminder_notification" value="1" <?php echo (($this->session->userdata('receive_task_reminder_notification', '1') == '1')?'checked':''); ?>>
                    <span class="slider round"></span> </label>
                </li>
                <li>
                  <h3>Helpful Information</h3>
                  <p>Learn about how to earn more and find the right people for your tasks with helpful tips and advice.</p>
                  <label class="switch">
                    <input type="checkbox" name="receive_helpful_notification" id="receive_helpful_notification" value="1" <?php echo (($this->session->userdata('receive_helpful_notification', '1') == '1')?'checked':''); ?>>
                    <span class="slider round"></span> </label>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<!-- script for auto complete multiselect --> 
<script src="<?php  echo base_url('assets/js/fastselect.standalone.js'); ?>"></script> 
<script> 
  $(document).ready(function() { 
    $('.multipleSelect').fastselect();

    $("#btnSendOTP").on("click", function(){
      var mobNum = $("#fldMobile").val();
      var filter = /^\d*(?:\.\d{1,2})?$/;

      if (filter.test(mobNum)) {
        if(mobNum.length==10){
          $.ajax({
            method: "POST",
            url: "<?php echo base_url(); ?>user/save_validate_mobile_no",
            data: { mobile: mobNum }
          })
          .done(function( msg ) {
            //alert( "Data Saved: " + msg );
            location.reload();
          });
        } else {
          alert('Please put 10  digit mobile number');
          return false;
        }
      }
      else {
        alert('Not a valid number');
        return false;
      }
    });

    $('#receive_transactional_notification').on('click',function() {
      //var checked = $(this).is(':checked');
      if ($(this).is(":checked")) {
        var notification_status = 1;
      } else {
        var notification_status = 0;
      }

      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>user/save_transactional_notification",
        data: {receive_transactional_notification: notification_status},
        success: function(data) {
          location.reload();
        },
        error: function() {
          //alert('it broke');
        },
        complete: function() {
          //alert('it completed');
        }
      });
    });

    $('#receive_task_update_notification').on('click',function() {
      //var checked = $(this).is(':checked');
      if ($(this).is(":checked")) {
        var notification_status = 1;
      } else {
        var notification_status = 0;
      }

      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>user/save_task_update_notification",
        data: {receive_task_update_notification: notification_status},
        success: function(data) {
          location.reload();
        },
        error: function() {
          //alert('it broke');
        },
        complete: function() {
          //alert('it completed');
        }
      });
    });

    $('#receive_task_reminder_notification').on('click',function() {
      //var checked = $(this).is(':checked');
      if ($(this).is(":checked")) {
        var notification_status = 1;
      } else {
        var notification_status = 0;
      }

      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>user/save_task_reminder_notification",
        data: {receive_task_reminder_notification: notification_status},
        success: function(data) {
          location.reload();
        },
        error: function() {
          //alert('it broke');
        },
        complete: function() {
          //alert('it completed');
        }
      });
    });

    $('#receive_helpful_notification').on('click',function() {
      //var checked = $(this).is(':checked');
      if ($(this).is(":checked")) {
        var notification_status = 1;
      } else {
        var notification_status = 0;
      }

      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>user/save_helpful_notification",
        data: {receive_helpful_notification: notification_status},
        success: function(data) {
          location.reload();
        },
        error: function() {
          //alert('it broke');
        },
        complete: function() {
          //alert('it completed');
        }
      });
    });    

  }); 
</script>