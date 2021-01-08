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
            <h5>Room Registration Confirmation</h5>
            <p>Thank you very much for using our room registration.</p>
            <div class="noDiv"> <a href="<?php echo base_url(); ?>">Ok Thanks</a> </div>
            <input type="hidden" value="{uid}" id="uid">
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<script> 
  $(document).ready(function() {
    (function(){
      aId = $('#uid').val();
      console.log("In thanks");
      $.ajax({
        url: "<?php echo base_url(); ?>account/thank_you_mail/" + aId,
        cache: false,
        success: function (data){
          console.log('Thank you email sent successfully.');
        },
        error: function (xhr, ajaxOptions, thrownError){

        }
      });
      return false;
    })();
  }); 
</script> 