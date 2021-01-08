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

  <?php 
  $frmValidationMsg = validation_errors(); 
  if(!empty($frmValidationMsg)) {
  ?>
  <section style="padding-top: 7%;">
    <?php echo '<div class="alert alert-danger text-center">' . $frmValidationMsg . '</div>'; ?>
  </section>
  <?php
  }
  ?>

  <!--==========================
    ConterDiv Section
  ============================-->
  
  <section id="signInDiv" class="padDiv">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <form action="<?php echo base_url(); ?>forgot-password" name="frmForgotPassword" method="post">
            <div class="signInDiv forgotDiv2">
              <h2> Forgot Password </h2> 
              <div class="form-group">
                <label for="email">Please enter your email address</label>
                <input type="email" class="form-control" id="fldEmail" name="fldEmail" placeholder="Enter Email Address" required>
              </div>
              <button type="submit" class="btn btn-info pull-right">Submit</button>  
            </div>
          </form>
        </div>
      </div>
    </div>
  </section> 
</main>
