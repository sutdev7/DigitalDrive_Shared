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
  <section id="postDiv">
    <div class="container">
      <div class="row">
      {task_info}        
        <div class="col-lg-8">
          <div class="task_Left">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Offer Details</li>
              </ol>
            </nav>
            <div class="task_Left_Div">
              <h2>Posted {task_duration} minutes ago</h2>
              <h3> {task_title} </h3>
              <a href="#" class="EdBtn"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
              <span> 
                {task_requirements}
                <a href="#">{skill_name}</a> 
                {/task_requirements}
              </span>
              <h4>{task_country}, {task_continent}</h4>
              <p> {task_details} </p>
              <div class="task_info"> <span>
                <h5>Budget</h5>
                <em><i class="fa fa-dollar"></i>{task_total_budget}</em> </span> <span>
                <h5>Due Date</h5>
                <em><i class="fa fa-calendar" aria-hidden="true"></i> {task_due_date}</em> </span> <span>
                <h5>Hired</h5>
                <em><i class="fa fa-user" aria-hidden="true"></i> {task_freelancer_hire} Hired</em> </span> </div>
              <h2 class="Atta">Attachment</h2>
              {task_attachments}
                 <a href="<?php echo base_url(); ?>download_file/{file_name}">{file_display_name}</a><br/>
              {/task_attachments}              
            </div>
            <div class="task_Left_Div2">
              <h2 class="Atta"><strong>Terms</strong></h2>
              <div class="Budget_div">
                <h3>${task_total_budget} </h3>
                <span>Budget</span> </div>
              <div class="mileDiv">
                <h3><strong>Milestones</strong></h3>
                <ul>
                  <li> <span class="span_Lft">
                    <h4>Wireframe Design</h4>
                    <em>12 Jan 2019</em> </span> <span class="span_Rgt"> <a href="#">$250.00</a> </span> </li>
                  <li> <span class="span_Lft">
                    <h4>Wireframe Design</h4>
                    <em>12 Jan 2019</em> </span> <span class="span_Rgt"> <a href="#">$250.00</a> </span> </li>
                </ul>
                 </div>
            </div>
            <div class="task_Left_Div2">
              <h5>Message from <span>@{freelancer_name}</span></h5>
              <p>{offer_details} </p>
            </div>
            <div class="task_Left_Div2">
              <h4>Portfolio</h4>
              <ul class="Portfolio_img">
                <li>
                  <div class="Portfolio_box"> <img src="<?php echo base_url(); ?>assets/img/p1.png" alt="">
                    <div class="Por_overlay"> <a href="<?php echo base_url(); ?>assets/img/p1.png" class="venobox" data-gall="gallery-carousel"> <img src="<?php echo base_url(); ?>assets/img/full.png" alt=""></a> <a href="#" class="download"> <img src="<?php echo base_url(); ?>assets/img/down.png" alt=""></a> </div>
                  </div>
                </li>
                <li>
                  <div class="Portfolio_box"> <img src="<?php echo base_url(); ?>assets/img/p2.png" alt="">
                    <div class="Por_overlay"> <a href="<?php echo base_url(); ?>assets/img/p2.png" class="venobox" data-gall="gallery-carousel"> <img src="<?php echo base_url(); ?>assets/img/full.png" alt=""></a> <a href="#" class="download"> <img src="<?php echo base_url(); ?>assets/img/down.png" alt=""></a> </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        
        <div class="col-lg-4">
          <div class="task_Right_Div">
            <h5>From</h5>
            <div class="media"> <a class="pull-left" href="#"> <img class="media-object img-circle " src="{user_image}" style="width:89px;height:88px;"> </a>
              <div class="media-body">
                <h2>{freelancer_name}</h2>
                <p>{freelancer_city}, {freelancer_state}, {freelancer_country}</p>
                <h3>2 Coins</h3>
              </div>
            </div>
            
            <div class="ph-no-vid"> Phone Number Verified </div>
            
            <a href="#" class="eyeBtn2"  data-toggle="modal" data-target="#MessageModal">Accept Offer For Test Task</a> 
            <form name="frmHireFreeLancer" action="<?php echo base_url(); ?>hire-freelancer" method="post">
              <input type="hidden" name="fldTaskID" value="{user_task_id}" />
              <input type="hidden" name="fldOfferID" value="{offer_id}" />
              <input type="hidden" name="fldFreelancerID" value="{freelancer_id}" />
              <button type="submit" name="btnSubmit" class="HireBtn">Hire This Freelancer</a> 
            </form>
          </div>
        </div> 
      {/task_info}        
      </div>
    </div>
  </section>
</main>

<!-- The Modal -->
<div class="modal" id="MessageModal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content"> 
      
      <!-- Modal Header -->
      <div class="modal-header" style="border:none;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body"> <img src="<?php echo base_url(); ?>assets/img/commt.png" alt="">
        <h4>Send Message<br>
          for the freelancer</h4>
        <textarea rows="" cols="" placeholder="Enter your message"></textarea>
      </div>
      
      <!-- Modal footer -->
      <div class="modal-footer"> <a href="#" class="Terms_Btn2" data-dismiss="modal"> Send </a> </div>
    </div>
  </div>
</div>
<a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a> 


<script> 
  $(document).ready(function() { 

  }); 
</script>     