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
 // echo "<pre/>";
 // print_r($arrFreelancer);
  
  ?>

  <!--==========================
      ConterDiv Section
    ============================-->
  <form name="frmCloseContract" id="frmCloseContract" action="<?php echo base_url(); ?>review/submit_review/<?php echo $arrFreelancer[0]['freelancer_id']; ?>" method="post">
 <!-- <input type="hidden" name="fldContractID" value="{contract_id}" /> 
  <input type="hidden" name="fldOfferID" value="{offer_id}" />
  <input type="hidden" name="fldTaskID" value="{task_id}" />
  <input type="hidden" name="fldFreelancerID" value="{freelancer_id}" />     -->
  <div class="full" style="background:#f6f8fa; padding:50px 0; width:100%; float:left;">
    <div class="container">
      <div class="total-boddiv">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Close Contract</li>
          </ol>
        </nav>
        <div class="back-white back-white-two">
          <div class="bod-sec">
           <h2> Review </h2>  
            {freelancer_details}
            <div class="img2-ses"> <span> <img class="media-object img-circle" src="{user_image}" alt="{freelancer_name}" style="width: 89px;height: 88px;border-radius: 43px;"> </span>
              <div class="caption">
                <h3> {freelancer_name} </h3>
                <p> {freelancer_city}, {freelancer_state}, {freelancer_country} </p>
                <small> + {freelancer_total_positive_coins} Coins </small>
                <small> {freelancer_total_negative_coins} Coins </small>
              </div>
            </div>
            {/freelancer_details}
          </div>
       <!--    <div class="bod-sec">
            <h2> Contract Title </h2>
            <big> {contract_title} </big> </div> -->
       <!--   <div class="radiodiv">
            <ul>
              <li>
                <label class="containerdiv">Mark as incomplete
                  <input type="radio" checked="checked" name="action" value="incomplete" >
                  <span class="checkmark"></span> </label>
              </li>
              <li>
                <label class="containerdiv">Mark as complete
                  <input type="radio" name="action" value="complete" >
                  <span class="checkmark"></span> </label>
              </li>
			  
            </ul>
			 </div> -->
			 <div class="radiodiv">
			 
			 <span>Coins</span>
			  
			<ul>
			  <li>
                <label class="containerdiv"> <small> -2 Coin </small> Bad Work
                  <input type="radio" checked="checked" name="coin" value="0" >
                  <span class="checkmark"></span> </label>
				  
				   <label class="containerdiv"> <small> -1 Coins </small> Bad Work
                  <input type="radio" checked="checked" name="coin" value="-1" >
                  <span class="checkmark"></span> </label>
              </li>
			  
			    <li>
                <label class="containerdiv"> <small> +1 Coin </small> Good Work
                  <input type="radio" checked="checked" name="coin" value="1" >
                  <span class="checkmark"></span> </label>
				  
				  <label class="containerdiv"> <small> +2 Coins </small> Good Work
                  <input type="radio" checked="checked" name="coin" value="2" >
                  <span class="checkmark"></span> </label>
              </li>
			</ul>
			
			
            <textarea rows="" cols="" name="fldContractReview" placeholder="Leave a review" required></textarea>
            <button type="submit" class="sub_btn">Submit</button> </div>
        </div>
      </div>
    </div>
  </div>
  </form>
</main>

<script>
$(document).ready(function(){
     
});
</script>