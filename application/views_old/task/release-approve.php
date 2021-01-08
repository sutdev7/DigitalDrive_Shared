<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
.opendiv1 {
  display:block;
}
.opendiv2 {
  display:none;
}
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
  <div class="full" style="background:#f6f8fa; padding:50px 0; width:100%; float:left;">
    <div class="container">
      <div class="total-boddiv">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>hired">Contract Details</a></li>
            <li class="breadcrumb-item active" aria-current="page">Release Approve</li>
          </ol>
        </nav>
        <div class="back-white">
          <div class="bod-sec">
            <h2> Frelancer </h2>
            {freelancer_details}
            <div class="img2-ses"> <span> <img class="media-object img-circle" src="{user_image}" alt="{freelancer_name}" style="width: 89px;height: 88px;border-radius: 43px;"> </span>
              <div class="caption">
                <h3> {freelancer_name} </h3>
                <p> {freelancer_city}, {freelancer_state}, {freelancer_country} </p>
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
                <big> {milestone_due_date} </big> </div>
              <div class="mili-ston-box">
                <h3> Ammount </h3>
                <big> ${milestone_budget} </big> </div>
            </div>
          </div>
          <div class="message-sec">
            {freelancer_details}            
            <h3> <img src="<?php echo base_url(); ?>assets/img/com.png" alt="img"> Message from <span>@{freelancer_name}</span> </h3>
            <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
            {/freelancer_details}
            <!--<ul class="Portfolio_img">
              <li>
                <div class="Portfolio_box"> <img src="<?php echo base_url(); ?>assets/img/p1.png" alt="">
                  <div class="Por_overlay"> <a href="<?php echo base_url(); ?>assets/img/p1.png" class="venobox vbox-item" data-gall="gallery-carousel"> <img src="<?php echo base_url(); ?>assets/img/full.png" alt=""></a> <a href="#" class="download"> <img src="<?php echo base_url(); ?>assets/img/down.png" alt=""></a> </div>
                </div>
              </li>
              <li>
                <div class="Portfolio_box"> <img src="<?php echo base_url(); ?>assets/img/p2.png" alt="">
                  <div class="Por_overlay"> <a href="<?php echo base_url(); ?>assets/img/p2.png" class="venobox vbox-item" data-gall="gallery-carousel"> <img src="<?php echo base_url(); ?>assets/img/full.png" alt=""></a> <a href="#" class="download"> <img src="<?php echo base_url(); ?>assets/img/down.png" alt=""></a> </div>
                </div>
              </li>
            </ul>-->
            <form name="frmReviewApprove" id="frmReviewApprove" action="<?php echo base_url(); ?>Task/update_milestone_status" method="post">
            <input type="hidden" name="fldContractID" value="{contract_id}" />
            <input type="hidden" name="fldContractMilestoneID" value="{milestone_id}" />          
            <div class="radiodiv">
              <ul>
                <li>
                  <label class="containerdiv newopen1">Approve
                    <input type="radio" checked="checked" name="btnContractApproval" value="approve">
                    <span class="checkmark"></span> </label>
                </li>
                <li>
                  <label class="containerdiv newopen2">Request Changes
                    <input type="radio" name="btnContractApproval" value="request_change" />
                    <span class="checkmark"></span> </label>
                </li>
              </ul>
              <div class="opendiv1">
                <div class="Budget_div">
                  <h3>${milestone_budget} </h3>
                  <span>Ammount</span> 
                </div>
                <a href="#" class="sub_btn approve">Release</a> 
              </div>
              <div class="opendiv2">
                <div class="radiodiv">
                  <textarea rows="" cols=""  placeholder="Add Comments" name="fldComments" style="margin-top:0;"></textarea>
                  <a href="#" class="sub_btn change_request">Submit</a> 
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
$(document).ready(function(){
  $(".opendiv1").show();
  $(".opendiv2").hide();

  $(".newopen1").click(function(){
    $(".opendiv1").show();
    $(".opendiv2").hide();
  });
  
  $(".newopen2").click(function(){
    $(".opendiv2").show();
    $(".opendiv1").hide();
  });

  $('.approve').click(function(event) {
    event.preventDefault();
    $('#frmReviewApprove').submit();
  }); 

  $('.change_request').click(function(event) {
    event.preventDefault();
    $('#frmReviewApprove').submit(); 
  });     
});
</script>