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
  <section id="signInDiv">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="singUpDiv text-center p-0"> <img src="img/emil.png" alt="">
            <h5>Email Confirmation</h5>
            <p>We emailed a confirmation link to your email address, check your email to finish registration. make sure to check your spam box in case it got filtered</p>
            <a href="javascript:void(0)" uid='{uid}' id="resend_confirm" class="atag">Re-send Confirmation</a>
            <div class="noDiv"> <a href="<?php echo base_url(); ?>">Ok Thanks</a> </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<script> 
  $(document).ready(function() { 
    function resendConfirmation(){
      aId = $(this).attr('uid');
      $.ajax({
        url: "<?php echo base_url(); ?>account/resend_confirmation/" + aId,
        cache: false,
        success: function (data){
          //var obj = jQuery.parseJSON(data);
          alert('Email sent successfully.');
        },
        error: function (xhr, ajaxOptions, thrownError){

        }
      });
      return false;
    } 

    $("#resend_confirm").click(resendConfirmation);
  }); 
</script> 