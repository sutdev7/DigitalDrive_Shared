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
    <div class="">
      <div class="">
        <div class="col-lg-12">
          <h2> <span> Sign up as </span> </h2>
          <form id="frmSignUpAs" name="frmSignUpAs" action="<?php echo base_url(); ?>sign-up" method="post">
            <div class="signInasDiv">
            <a href="#">
                <input type="radio" id="radio-btn-3" name="fldUserType" value="nlancer">
                <label for="radio-btn-3" class="btn"><img src="<?php echo base_url(); ?>assets/img/as3.png" alt="" style="width: 100px"><br>For Nlancer Room</label>
              </a>

              <a href="#">
                <input type="radio" id="radio-btn-1" name="fldUserType" value="freelancer">
                <label for="radio-btn-1" class="btn"><img src="<?php echo base_url(); ?>assets/img/as1.png" alt=""><br>Freelancer</label>
              </a> 
              <a href="#">
                <input type="radio" id="radio-btn-2" name="fldUserType" value="client" checked>
                <label for="radio-btn-2" class="btn"><img src="<?php echo base_url(); ?>assets/img/as2.png" alt=""><br>Client</label>
              </a> 
            </div>
            <button type="button" id="btnSubmit" class="ProceedBtn">Proceed <i class="fa  fa-long-arrow-right "></i></button>
          </form>
        </div>
      </div>
    </div>
  </section>
</main>


<script> 
  $(document).ready(function() { 
    $("#btnSubmit").click(function() { 
      if ($('input[name=fldUserType]:checked').length > 0) { 
        $('#frmSignUpAs').submit();
      } else { 
        alert("Please select registration type for registering yourself."); 
      } 
    }); 
  }); 
</script> 