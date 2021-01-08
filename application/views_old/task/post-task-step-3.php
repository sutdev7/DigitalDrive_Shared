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
  <section id="postDiv">
    <div class="postLink"> <a href="javascript:void(0);" class="done"><i class="fa fa-check-circle-o"></i> Description</a> <a href="javascript:void(0);" class="done"><i class="fa fa-check-circle-o"></i> Location and Date</a> <a href="javascript:void(0);"class="act"><i class="fa fa-check-circle-o"></i> Budget</a> </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="postDiv_Box">
            <form action="<?php echo base_url(); ?>Task/add_new_job_post" method="post">
              <input type="hidden" name="fldTaskTitle" value="{fldTaskTitle}" />
			  <input type="hidden" name="fldTaskKeywords" value="{fldTaskKeywords}" />
              <input type="hidden" name="fldTaskDescription" value="{fldTaskDescription}" />  
              {fldSkillRequired}
              <input type="hidden" name="fldSkillRequired[]" value="{value}" /> 
              {/fldSkillRequired}
              {uploadFiles}
              <input type="hidden" name="uploadFiles[]" value="{fname}" /> 
              {/uploadFiles} 
              <input type="hidden" name="fldSelContinent" value="{fldSelContinent}" />
              <input type="hidden" name="flddurationfield" value="{flddurationfield}" />   
              <input type="hidden" name="flddurationtype" value="{flddurationtype}" />   			  
              <input type="hidden" name="fldSelCountry" value="{fldSelCountry}" />                                            
              <div class="postDiv_BoxFrm">
                <h3 class="p-0">Budget</h3>
                <ul>
                  <li>
                    <label><i class="fa fa-star" style="font-size:7px;color:#f00;" aria-hidden="true"></i>Total Amount</label>
                    <div class="input-group amt"> <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                      <input class="form-control" type="text" name="fldTotalBudget" id="fldTotalBudget" placeholder="Enter Here" required>
                    </div>
                  </li>
                </ul>
                <!--<div class="row">
                  <div class="col-lg-4 col-sm-6 col-12">
                    <div class="planBox">
                      <h3><span id="grossTotalAmount">$0</span></h3>
                      <p>Total Price of project</p>
                      <em>This includes all milestones.</em> </div>
                  </div>
                  <div class="col-lg-4 col-sm-6 col-12">
                    <div class="planBox">
                      <h3><span id="serviceFeeAmount">$0</span></h3>
                      <p>0% Hire-n-Work service fee </p>
                    </div>
                  </div>
                  <div class="col-lg-4 col-sm-6 col-12">
                    <div class="planBox">
                      <h3><span id="netTotalAmount">$0</span></h3>
                      <p>You will pay</p>
                    </div>
                  </div>
                </div>-->
              </div>
              <div class="fullDiv_bottom">
                <button type="submit" name="btnSubmit" value="Post the Task" class="btn btn-primary">Post the Task</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<script> 
  $(document).ready(function() { 
    $('#fldTotalBudget').keyup(function() {
      //alert( "Handler for .keyup() called." );
      var gross_total = $(this).val();
      //var service_fee = (gross_total * 0.15);
	  //var net_total = parseFloat(gross_total) + parseFloat(service_fee);
	  
	  var service_fee = (gross_total);
	  var net_total = (gross_total);
	        
      $('#grossTotalAmount').html('$' + gross_total);
      $('#serviceFeeAmount').html('$' + service_fee);
      $('#netTotalAmount').html('$' + net_total);
    });
  }); 
</script>       