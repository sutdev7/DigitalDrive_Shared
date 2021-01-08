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
  <div class="full" style="background:#f6f8fa; padding:50px 0; width:100%; float:left;">
    <div class="container">
      <div class="total-boddiv">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Contract Details</a></li>
            <li class="breadcrumb-item active" aria-current="page">Release Approve</li>
          </ol>
        </nav>
        <div class="back-white">
          <div class="bod-sec">
            <h2> Frelancer </h2>
            {freelancer_details}
			<div class="img2-ses"> <span> <img src="{user_image}" alt="img" style="width:69px;height:69px;"> </span>
              <div class="caption">
                <h3> {freelancer_name} </h3>
                <p>{freelancer_address}, {freelancer_city}, {freelancer_state}, {freelancer_country}</p>
                <small> + 2 Coins </small> 
                <small> - 2 Coins </small> 
                </div>
            </div>
			{/freelancer_details}
			
			
			
            <div class="mili-ston">
              <div class="mili-ston-box">
                <h3> MileStone </h3>
                <big> {milestone_title} </big> </div>
              <div class="mili-ston-box">
                <h3> Due Date </h3>
                <big> {milestone_end_date} </big> </div>
              <div class="mili-ston-box">
                <h3> Ammount </h3>
                <big> ${milestone_agreed_budget} </big> </div>
            </div>
          </div>
          <div class="message-sec">
            <!--<h3> <img src="img/com.png" alt="img"> Message from <span>@Bob Frapples</span> </h3>
            <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>-->
            <ul class="Portfolio_img">
              <li>
                <div class="Portfolio_box"> <img src="img/p1.png" alt="">
                  <div class="Por_overlay"> <a href="img/p1.png" class="venobox vbox-item" data-gall="gallery-carousel"> <img src="img/full.png" alt=""></a> <a href="#" class="download"> <img src="img/down.png" alt=""></a> </div>
                </div>
              </li>
              <li>
                <div class="Portfolio_box"> <img src="img/p2.png" alt="">
                  <div class="Por_overlay"> <a href="img/p2.png" class="venobox vbox-item" data-gall="gallery-carousel"> <img src="img/full.png" alt=""></a> <a href="#" class="download"> <img src="img/down.png" alt=""></a> </div>
                </div>
              </li>
            </ul>
			<form action="<?= base_url().'Hire/submit_release_approve' ?>" method="post">
				<input type="hidden" name="milestone_id" value="<?=$this->uri->segment(2)?>">
				<div class="radiodiv">
				  <ul>
					<li>
					  <label class="containerdiv newopen1">Approve
						<input type="radio" checked="checked" name="radio" value="AR" />
						<span class="checkmark"></span> </label>
					</li>
					<li>
					  <label class="containerdiv newopen2">Request Changes
						<input type="radio" name="radio" value="RC" />
						<span class="checkmark"></span> </label>
					</li>
				  </ul>
					<div class="opendiv1">
						<div class="Budget_div">
						  <h3>${milestone_agreed_budget} </h3>
						  <span>Amount</span>
						</div>
						<input type="submit" value="Release" name="submit" class="sub_btn">
					</div>
					<div class="opendiv2">
						<div class="radiodiv">
						  <textarea  name="change_request_msg" rows="" cols="" placeholder="Add Comments" style="margin-top:0;"></textarea>
						  <input type="submit" value="Submit" name="submit" class="sub_btn">
						</div>
					</div>
				</div>
			</form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<script>
$(document).ready(function(){
  $(".newopen1").click(function(){
    $(".opendiv1").show();
	$(".opendiv2").hide();
  });
  
  $(".newopen2").click(function(){
    $(".opendiv2").show();
	$(".opendiv1").hide();
	
  });
});
</script>


