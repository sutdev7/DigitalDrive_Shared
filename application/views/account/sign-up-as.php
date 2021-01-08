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

              <span class="roomOptions" style="display: none;">

                <a href="#">
                  <input type="radio" id="radio-btn-6" name="fldUserType" value="0">
                  <label for="radio-btn-6" class="btn"><img src="<?php echo base_url(); ?>assets/img/as1.png" alt="" style="width: 100px"><br>Core</label>
                </a>

                <a href="#">
                  <input type="radio" id="radio-btn-4" name="fldUserType" value="nclient">
                  <label for="radio-btn-4" class="btn"><img src="<?php echo base_url(); ?>assets/img/as3.png" alt="" style="width: 100px"><br>Room Client </label>
                </a>

                 <a href="#">
                  <input type="radio" id="radio-btn-3" name="fldUserType" value="nlancer">
                  <label for="radio-btn-3" class="btn"><img src="<?php echo base_url(); ?>assets/img/as4.png" alt="" style="width: 100px"><br>Room Freelancer </label>
                </a>                 
              </span>
            

              <span class="generalOption">

                <a href="#">
                  <input type="radio" id="radio-btn-5" name="fldUserType" value="0">
                  <label for="radio-btn-5" class="btn"><img src="<?php echo base_url(); ?>assets/img/as3.png" alt="" style="width: 100px"><br>Room</label>
                </a>

                <a href="#">
                    <input type="radio" id="radio-btn-1" name="fldUserType" value="freelancer" <?php if($type==1) echo "checked";?>>
                  <label for="radio-btn-1" class="btn"><img src="<?php echo base_url(); ?>assets/img/as1.png" alt=""><br>Freelancer</label>
                </a> 

                <a href="#">
                  <input type="radio" id="radio-btn-2" name="fldUserType" value="client" <?php if($type==2) echo "checked";?>>
                  <label for="radio-btn-2" class="btn"><img src="<?php echo base_url(); ?>assets/img/as2.png" alt=""><br>Client</label>
                </a>                
              </span>
 

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

    $('#radio-btn-5').on('click', function() {
        if($('#radio-btn-5').is(':checked')) { 
           $('.generalOption').hide();
           $('.roomOptions').show();
        }
    });

    $('#radio-btn-6').on('click', function() {
        if($('#radio-btn-6').is(':checked')) { 
           $('.generalOption').show();
           $('.roomOptions').hide();
        }
    });    

    $("#btnSubmit").click(function() { 
      var valueOfCheck = $('input[name=fldUserType]:checked').val();

      if (valueOfCheck != 0) { 
        $('#frmSignUpAs').submit();
      } else { 
        alert("Please select registration type for registering yourself."); 
      } 
    }); 

  }); 
</script> 