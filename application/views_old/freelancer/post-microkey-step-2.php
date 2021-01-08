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
    <div class="postLink"> <a href="javascript:void(0);" class="done"><i class="fa fa-check-circle-o"></i> Overview</a> <a href="javascript:void(0);" class="act"><i class="fa num">2</i> Pricing</a> <a href="javascript:void(0);"><i class="fa num">3</i> Description</a> </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="postDiv_Box">
          <form action="<?php echo base_url(); ?>post-microkey-Step-3" name="frmPostTaskSecond" method="post">
            <input type="hidden" name="fldTaskTitle" value="{fldTaskTitle}" />
			      <input type="hidden" name="fldSelCat" value="{fldSelCat}" />
            <input type="hidden" name="fldSelCatSub" value="{fldSelCatSub}" />
            {fldSkillRequired}
            <input type="hidden" name="fldSkillRequired[]" value="{value}" /> 
            {/fldSkillRequired}                      
            <div class="step_Box step_Box2">
              <h3 class="p-0">Price</h3>
                <ul>
                  <li>
                    <label><i class="fa fa-star" style="font-size:7px;color:#f00;" aria-hidden="true"></i>Total Amount</label>
                    <div class="input-group amt"> <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                      <input class="form-control" type="text" name="fldTotalBudget" id="fldTotalBudget" placeholder="Enter Here" required>
                    </div>
                  </li>                  
                </ul>
                <ul>
                  <li style="width:100% !important;">
                    <h3>Breakup</h3>
          <div class="frmList">
          <div class="">
                  <ul>
                  <li class="row">
                  
                  <div class="col-lg-4 col-md-12 col-xs-12">
                    <label>Portal Charges(%)</label>
                    <div class="input-group amt"> <span class="input-group-addon"><i class="fa fa-percentage"></i></span>
                      <input id="portal_charges_percentage" class="form-control" type="text" name="portal_charges_percentage" readonly placeholder="">
                    </div>
                  </div>
                  
                  <div class="col-lg-4 col-md-12 col-xs-12">
                    <label>Portal Charges Amount</label>
                    <div class="input-group amt"> <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                      <input id="portal_charges" class="form-control" type="text" name="portal_charges" readonly placeholder="50">
                    </div>
                  </div>
                  
                    
                  </li>
                  
                  <li class="row">
                  
                  <div class="col-lg-4 col-md-12 col-xs-12">
                    <label>3rd Party Charges(%)</label>
                    <div class="input-group amt"> <span class="input-group-addon"><i class="fa fa-percentage"></i></span>
                      <input id="3rd_party_percentage" class="form-control" type="text" name="3rd_party_percentage" readonly placeholder="" value="2%" >
                    </div>
                  </div>
                  
                  <div class="col-lg-4 col-md-12 col-xs-12">
                    <label>3rd Party Charges Amount</label>
                    <div class="input-group amt"> <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                      <input id="3rd_party_charges" class="form-control" type="text" name="3rd_party_charges" readonly placeholder="50">
                    </div>
                  </div>
                  
                    
                  </li>
                  
                  
                  <li class="row">
                  
                    <div class="col-lg-4 col-md-12 col-xs-12">
                      <label>Freelancer get</label>
                      <div class="input-group amt"> <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                        <input id="freelancer_amount" class="form-control" type="text" name="freelancer_amount" readonly placeholder="150">   
                      </div>
                    </div>
                    
                    
                  </li>
                   
                  
                   
                 
                </ul>
          </div>
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
</script> 

<script> 
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

    $("#fldTotalBudget").bind('keyup mouseup', function () {
        var gross_total = $(this).val();
            //var task_details = obj.task_details[0].basic_info.task_details;
      var commision=0;
      var percentage=0;
      if(gross_total<100){
        commision=(gross_total*3)/100;
        percentage="3%";
      } 
      if(gross_total>=100 && gross_total<=500){
        commision=(gross_total*5)/100;
        percentage="5%";
      }
      
      if(gross_total>500 && gross_total<=1000){
        commision=(gross_total*10)/100;
        percentage="10%";
      }
      
      if(gross_total>1000 && gross_total<=3000){
        commision=(gross_total*15)/100;
        percentage="15%";
      }
      
      if(gross_total>3000){
        commision=(gross_total*20)/100;
        percentage="20%";
      }
      
      var freelancer_amount=gross_total-commision;
      var thired_party_commision=(gross_total*2)/100;
      freelancer_amount=freelancer_amount-thired_party_commision;
      
       
      $("#portal_charges_percentage").val(percentage);
      $("#portal_charges").val(commision);
      $("#3rd_party_charges").val(thired_party_commision.toFixed(2));
      $("#3rd_party_percentage").val('2%');
      $("#freelancer_amount").val(freelancer_amount.toFixed(2));           
    });

    

  }); 
</script>     