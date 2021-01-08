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

                <li class="active"><a href="<?php echo base_url(); ?>gender"><img src="<?php  echo base_url('assets/img/GenderIcon-1A.png'); ?>" alt=""> Gender</a></li>
                <li><a href="<?php echo base_url(); ?>payment"><img src="<?php  echo base_url('assets/img/PaymentIcon-1A.png'); ?>" alt=""> Payment</a></li>
                <li><a href="<?php echo base_url(); ?>settings"><img src="<?php  echo base_url('assets/img/SettingIcon-1A.png'); ?>" alt=""> Settings</a></li>
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
              <h4>Gender</h4>
              <form id="frmGender" name="frmGender" action="<?php echo base_url(); ?>gender" method="post">
                <div class="GenderPnl">
                  {user_info}
                    {gender}  
                  <a class="SelectGender" href="javascript:void(0);">
                    <input type="radio" id="{element_id}" name="fldUserGender" value="{key}" {checked} />
                    <label for="{element_id}" class="btn"><img src="{icon}" alt=""><br>{value}</label>
                  </a> 
                    {/gender}
                  {/user_info}                 
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<script> 
  $(document).ready(function() { 
    $("input[name=fldUserGender]").click(function() { 
      $('#frmGender').submit();
    }); 
  }); 
</script>