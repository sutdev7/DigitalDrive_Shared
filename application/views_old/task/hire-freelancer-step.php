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
  <form name="frmHireFreelancerStep2" id="frmHireFreelancerStep2" action="" method="post">
  <input type="hidden" name="fldTaskID" value="{fldTaskID}" />
  <input type="hidden" name="fldOfferID" value="{fldOfferID}" />
  <input type="hidden" name="fldFreelancerID" value="{fldFreelancerID}" />
  <input type="hidden" name="fldContractTitle" value="{fldContractTitle}" />
  <input type="hidden" name="fldTotalBudget" value="{fldTotalBudget}" />
  <input type="hidden" name="fldPaymentMode" value="{fldPaymentMode}" />
  <input type="hidden" name="fldProjectCompletionDate" value="{fldProjectCompletionDate}" />
  <input type="hidden" name="fldProjectCompletionAmount" value="{fldProjectCompletionAmount}" />
  <input type="hidden" name="fldDepositMode" value="{fldDepositMode}" />
  <input type="hidden" name="fldDepositMode2" value="{fldDepositMode2}" />
  <input type="hidden" name="fldContractMessage" value="{fldContractMessage}" />

  {fldMilestone}
  <input type="hidden" name="fldMilestoneTitle[]" value="{title}" />
  <input type="hidden" name="fldMilestoneDueDate[]" value="{due_date}" />
  <input type="hidden" name="fldMilestoneAmount[]" value="{amount}" />
  {/fldMilestone}

  <section id="postDiv">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
          <div class="task_Left">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>view-offer-details/{offerID}">Offer Details</a></li>
                <li class="breadcrumb-item active" aria-current="page">Hire Freelancer</li>
              </ol>
            </nav>
            <div class="task_Left_Div task-Full">
              <h3>Deposit Fund</h3>
              <br>
              <div class="bluediv">
                <label>Payable Ammount</label>
                <h2>${fldTotalBudget}</h2>
              </div>
              <h3>Terms</h3>
              <ul class="frmList">
                <li class="row">
                  <div class="col-lg-7 col-md-12 col-xs-12">
                    <label>Card Number</label>
                    <input type="text" name="fldPaymentCardDetail" class="form-control cardInput" placeholder="Enter Card No" required>
                  </div>
                  <div class="col-lg-5 col-md-12 col-xs-12"> <img src="<?php echo base_url(); ?>assets/img/card-img.jpg" alt="" class="cardImg"> </div>
                </li>
                <li class="row noBorder">
                  <div class="col-lg-4 col-md-12 col-xs-12">
                    <label>Expires on</label>
                    <div class="select-style">
                      <select name="fldPaymentCardExpiryMonth" required>
                        <option value="">MM</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-12 col-xs-12">
                    <div class="select-style styleMargin">
                      <select name="fldPaymentCardExpiryYear" required>
                        <option>YY</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-12 col-xs-12">
                    <label>CVV</label>
                    <div class="input-group amt"> 
                      <input class="form-control" type="password" name="fldPaymentCardExpiryCVV" placeholder="Enter Here" required>
                    </div>
                  </div>
                </li>
                <li class="noBorder">
                	<ul class="verifiedPaymentList">
                    	<li><label>Powered by</label><img src="<?php echo base_url(); ?>assets/img/strip-money-img.png" alt=""></li>
                        <li><img src="<?php echo base_url(); ?>assets/img/money-verified-img.png" alt=""></li>
                    </ul>
                </li>
                <li>
                	<div class="yNote">Note: Your fund will be deposit to the escrow</div>
                </li>
              </ul>
            </div>
            <div class="fullDiv_bottom mrgnMinus">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#SentModal" id="btnSubmit">Make Payment</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  </form>
</main>

<!-- The Modal -->
<div class="modal" id="SentModal">
  <div class="modal-dialog">
    <div class="modal-content"> 
      
      <!-- Modal Header -->
      <div class="modal-header">
        <!--<h2>Budget</h2> -->
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
        <img src="<?php echo base_url(); ?>assets/img/deliver-img.png" alt="">
        <span id="showConfirmation" style="display:none;">
            <h2>Congratulation your hiring request<br>has been sent to the freelancer.</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type.</p>
        </span>
        <span id="showProgress">
            <h2>We are processing your contract.</h2>
            <p>Please wait while we save your contract.....</p>
        </span>        
      </div>
      <!-- Modal footer -->
      <div class="modal-footer"> <a href="<?php echo base_url(); ?>dashboard" class="Terms_Btn" data-dismiss="" id="showRefreshBtn" style="display:none;">Okey </a> </div>
    </div>
  </div>
</div>
<a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a> 

<script> 
  $(document).ready(function() { 
    $('#btnSubmit').click(
        function(e) {
            var postData = $("#frmHireFreelancerStep2").serialize();
            $.ajax({
                type: "post",
                url: "<?php echo base_url(); ?>Task/ajax_save_freelancer_contract",
                data: postData,
                success: function(responseData, textStatus, jqXHR) {
                    $("#showProgress").hide();
                    $("#showConfirmation").show();
                    $("#showRefreshBtn").show();                                        
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(errorThrown);
                }
            })
        }
    ); 
  }); 
</script>  