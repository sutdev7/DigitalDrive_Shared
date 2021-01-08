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
  <div class="main-div-sec">
    <div class="full" style="background:#f6f8fa; padding: 30px 0 60px 0; width:100%; float:left;">
      <div class="container">
        <div class="view-box">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">All offers</li>
            </ol>
          </nav>
          {task_info}
          <div class="view-box-one">
            <p><span> Posted {task_duration} minutes ago </span> <span style="float:right;"><a href="<?= base_url().'edit-task-step-1/'.$this->uri->segment(2) ?>"><img src="<?php echo base_url(); ?>assets/img/rht-img.png" alt="img"></a> </span></p>
            <h2> {task_title} </h2>
            <p> <img src="<?php echo base_url(); ?>assets/img/point.png" alt="address"> {task_country}, {task_continent} </p>
          </div>
          <div class="view-box-two">
            <h2>offers</h2>
            {offer_send} 
            <div class="view-box-two-box{is_online}">
              <div class="view-box-two-box-lft">
                <div class="rel-omly-div"> <span><img src="{user_image}" style="width:71px;height:72px;">
                  <div class="round"></div>
                  </span> </div>
					<div class="caption">
					<h3> {freelancer_name} </h3>
					<p> {freelancer_city}, {freelancer_state}, {freelancer_country} </p>
					<small> + 2 Coins </small> 
					<small> - 2 Coins </small> 
					</div>
              </div>
              <div class="view-box-two-box-rht"> <!-- <a href="<?php echo base_url(); ?>view-offer-details/{offer_id}" class="view-btn"> View Details </a> --> </div>
              <div class="full">
                <h4> <img src="<?php echo base_url(); ?>assets/img/com.png" alt="img"> Message from <em> @{freelancer_name} </em> </h4>
                <p>{offer_details}</p>
              </div>
            </div>
            {/offer_send}
            <br/>
          </div>
          {/task_info}
        </div>
      </div>
    </div>
  </div>
</main>


<script> 
  $(document).ready(function() { 

  }); 
</script>     