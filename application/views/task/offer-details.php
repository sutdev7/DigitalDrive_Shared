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
  ?>

  <!--==========================
      ConterDiv Section
    ============================-->
  <section id="postDiv">
    <div class="container">
      {task_info}      
      <div class="row">
        <div class="col-lg-8">
          <div class="task_Left">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Offer Details</li>
              </ol>
            </nav>
            <div class="task_Left_Div">
              <h2>Posted {task_duration} minutes ago <a href="#" class="EdBtn2"> Close this offer </a></h2>
              <h3>{task_title}</h3>
              <span> 
                {task_requirements}
                <a href="#">{skill_name}</a>
                {/task_requirements}
              </span>
              <h4>{task_country}, {task_continent}</h4>
              <p>{task_details}</p>
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
				
				<!--
				<div class="CommentsDiv">
				<h5>Comments</h5>
					<div class="media"> <a class="pull-left" href="#"> <img class="media-object img-circle" src="<?php echo base_url(); ?>assets/img/user2.png"> </a>
					  <div class="media-body">
						<h2>Bob Frapples</h2>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
					  </div>
					</div>
					<textarea rows="" cols="" placeholder="Add Comments"></textarea>
				<a href="#" class="sub_btn">Submit</a>
				</div>
				-->
								
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="task_Right_Div">
            <h5>Hired Freelancer</h5>
            {task_freelancer_hired_details}            
            <div class="media"> 
              <a class="pull-left" href="#"><img class="media-object img-circle " src="{user_image}" style="width:88px;height:89px;"> {is_online} </a>
              <div class="media-body">
                <h2>{freelancer_name}</h2>
                <p>{freelancer_city}, {freelancer_state}, {freelancer_country}</p>
                <h3> +{total_positive_coins} Coins</h3>
                <h3 class="minus">{total_negative_coins} Coins</h3>
              </div>
            </div>
            <a href="<?php echo base_url(); ?>view-contract" class="eyeBtn"><i class="fa fa-eye" aria-hidden="true"></i> View Contract</a>            
            {/task_freelancer_hired_details}            
            <div class="turnerDiv">
              <h3> Freelancer </h3>
            </div>            
            {offer_send}                 
            <div class="turnerDiv">
              <div class="media"> <a class="pull-left" href="#"> <img class="media-object img-circle " src="{user_image}" style="width:71px;height:72px;"> </a>
                {is_online}
                <div class="media-body">
                  <h2>{freelancer_name}</h2>
                  <p>{freelancer_city}, {freelancer_state}, {freelancer_country}</p>
                  <h3> + {total_positive_coins} Coins</h3>
                  <h3> {total_negative_coins} Coins</h3>
                </div>
              </div>
              {response_action_buttons}
            </div>
            {/offer_send}                 
          </div>
        </div>
      </div>
      {/task_info}       
    </div>
  </section>
</main>


<script> 
  $(document).ready(function() { 

  }); 
</script>     