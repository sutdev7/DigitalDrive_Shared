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
    <div class="postLink"> <a href="javascript:void(0);" class="done"><i class="fa fa-check-circle-o"></i> Description</a> <a href="javascript:void(0);" class="act"><i class="fa num">2</i> Location and Date</a> <a href="javascript:void(0);"><i class="fa num">3</i> Budget</a> </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="postDiv_Box">
          <form action="<?php echo base_url().'edit-task-step-3/'.$this->uri->segment(2) ; ?>" name="frmPostTaskSecond" method="post" enctype="multipart/form-data">
            <input type="hidden" name="fldTaskTitle" value="{fldTaskTitle}" />
            <input type="hidden" name="fldTaskKeywords" value="{fldTaskKeywords}" />
            <input type="hidden" name="fldTaskDescription" value="{fldTaskDescription}" />  
            {fldSkillRequired}
            <input type="hidden" name="fldSkillRequired[]" value="{value}" /> 
            {/fldSkillRequired}
            {uploadFiles}
            <input type="hidden" name="uploadFiles[]" value="{fname}" /> 
            {/uploadFiles}                      
            <div class="step_Box step_Box2">
              <h3>Location</h3>
              <ul>
                <li>
                  <label><i class="fa fa-star" style="font-size:7px;color:#f00;" aria-hidden="true"></i> Select Continent</label>
                  <div class="select-style">
                    <select name="fldSelContinent" id="fldSelContinent" required>
                      <option value="">-Select-</option>
                      {continents} <option value="{key}" {currentselection}>{value}</option> {/continents}
                    </select>
                  </div>
                </li>
                <li>
                  <h4>Date</h4>
                  <label><i class="fa fa-star" style="font-size:7px;color:#f00;" aria-hidden="true"></i> Due date : {fldDueDate}</label>
                  <div id="datepicker2" class="input-group date" data-date-format="mm-dd-yyyy">
                    <input class="form-control" id="" type="text" value="{fldDueDate}" name="fldDueDate" required />
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span> </div>
                </li>
                <li>
                  <label><i class="fa fa-star" style="font-size:7px;color:#f00;" aria-hidden="true"></i> Select Country</label>
                  <div class="select-style" id="countrySelectionList">
                    <select name="fldSelCountry" id="fldSelCountry" required>
                      <option value="">Select</option>
					  {countries} <option value="{key}" {currentselection}>{value}</option> {/countries}
                    </select>
                  </div>
                </li>
              </ul>
            </div>
            <div class="fullDiv_bottom">
              <button type="submit" class="btn btn-primary" name="btnSubmit" value="Save and Continue">Save and Continue</button>
            </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</main>


<!-- script for auto complete multiselect --> 
<script src="<?php  echo base_url('assets/js/fastselect.standalone.js'); ?>"></script> 
<script>
  $('.multipleSelect').fastselect();
  //$('#duedate').datepicker();
  //$('#duedate').datepicker('setDate', '<?php echo $fldDueDate; ?>');
  
  
  
  $(function() {
	  
	  
	  var newDate = '<?php echo $fldDueDate; ?>';
    $('#datepicker2').datepicker('setDate', newDate).datepicker('fill')
  });

  $(document).ready(function() { 
    $("#fldSelContinent").change(function() {
      $.ajax({
        method: "POST",
        url: "<?php echo base_url(); ?>Task/getCountryByContinent",
        data: { fldSelContinent: $(this).val() }
      })
      .done(function( response ) {
        $('#countrySelectionList').html(response);
      });
    });
  }); 
</script>     
