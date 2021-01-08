<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>

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
<style>
  .postDiv_Box .step_Box ul li textarea.form-control{
    height:88px;
  }
</style>
  <!--==========================
      ConterDiv Section
    ============================-->
  <section id="postDiv">
    <div class="postLink"> <a href="javascript:void(0);" class="done"><i class="fa fa-check-circle-o"></i> Overview</a> <a href="javascript:void(0);" class="done"><i class="fa fa-check-circle-o"></i> Pricing</a> <a href="javascript:void(0);"class="act"><i class="fa fa-check-circle-o"></i> Description</a> </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="postDiv_Box">
            
              <form action="<?php echo base_url(); ?>Freelancer/add_new_job_post" name="frmPostTaskFirst" method="post" enctype="multipart/form-data">
              <input type="hidden" name="fldTaskTitle" value="{fldTaskTitle}" />
              <input type="hidden" name="fldSelCat" value="{fldSelCat}" />
              <input type="hidden" name="fldSelCatSub" value="{fldSelCatSub}" />
              {fldSkillRequired}
              <input type="hidden" name="fldSkillRequired[]" value="{value}" /> 
              {/fldSkillRequired}
              
              <input type="hidden" name="fldTotalBudget" value="{fldTotalBudget}" />                                            
              <div class="postDiv_BoxFrm">
                <div class="step_Box">
                  <h3 class="p-0">Portfolio</h3>
                  <ul>
                    <li>
                      <label><i class="fa fa-star" style="font-size:7px;color:#f00;" aria-hidden="true"></i> Link 1</label>
                      <input class="form-control" type="text" name="fldPortflioLink1" id="fldPortflioLink" placeholder="Enter Here"><br>
                    </li>
                    <li>
                      <label><i class="fa fa-star" style="font-size:7px;color:#f00;" aria-hidden="true"></i> Description 1</label>
                      <textarea class="form-control" rows="4" cols="" name="fldPortflioDesc1"  placeholder="Enter Portfolio"></textarea>
                    </li>
                    <li>
                      <label><i class="fa fa-star" style="font-size:7px;color:#f00;" aria-hidden="true"></i> Link 2</label>
                      <input class="form-control" type="text" name="fldPortflioLink2" id="fldPortflioLink" placeholder="Enter Here">
                    </li>
                    <li>
                      <label><i class="fa fa-star" style="font-size:7px;color:#f00;" aria-hidden="true"></i> Description 2</label>
                      <textarea class="form-control" rows="4" cols="" name="fldPortflioDesc2"  placeholder="Enter Portfolio"></textarea>
                    </li>
                    <li>
                      <label><i class="fa fa-star" style="font-size:7px;color:#f00;" aria-hidden="true"></i> Link 3</label>
                      <input class="form-control" type="text" name="fldPortflioLink3" id="fldPortflioLink" placeholder="Enter Here">
                    </li>
                    <li>
                      <label><i class="fa fa-star" style="font-size:7px;color:#f00;" aria-hidden="true"></i> Description 3</label>
                      <textarea class="form-control" rows="4" cols="" name="fldPortflioDesc3"  placeholder="Enter Portfolio"></textarea>
                    </li>
                    <li>
                      <label><i class="fa fa-star" style="font-size:7px;color:#f00;" aria-hidden="true"></i> Link 4</label>
                      <input class="form-control" type="text" name="fldPortflioLink4" id="fldPortflioLink" placeholder="Enter Here">
                    </li>
                    <li>
                      <label><i class="fa fa-star" style="font-size:7px;color:#f00;" aria-hidden="true"></i> Description 4</label>
                      <textarea class="form-control" rows="4" cols="" name="fldPortflioDesc4"  placeholder="Enter Portfolio"></textarea>
                    </li>
                  </ul>
                  <ul>
                    <li>
                      <label><i class="fa fa-star" style="font-size:7px;color:#f00;" aria-hidden="true"></i> Portfolio Image1</label>
                      <input type="file" name="fldPortflioImg1" data-show-remove="true" data-errors-position="outside"  class="dropify" />
                    </li>
                    <li>
                      <label><i class="fa fa-star" style="font-size:7px;color:#f00;" aria-hidden="true"></i> Portfolio Image3</label>
                      <input type="file" name="fldPortflioImg2" data-show-remove="true" data-errors-position="outside"  class="dropify" />
                    </li>
                    <li>
                      <label><i class="fa fa-star" style="font-size:7px;color:#f00;" aria-hidden="true"></i> Portfolio Image3</label>
                      <input type="file" name="fldPortflioImg3" data-show-remove="true" data-errors-position="outside"  class="dropify" />
                    </li>
                    <li>
                      <label><i class="fa fa-star" style="font-size:7px;color:#f00;" aria-hidden="true"></i> Portfolio Image4</label>
                      <input type="file" name="fldPortflioImg4" data-show-remove="true" data-errors-position="outside"  class="dropify" />
                    </li>
                    
                    
                  </ul>
                  <ul>
                    <li>
                      <label><i class="fa fa-star" style="font-size:7px;color:#f00;" aria-hidden="true"></i> Image</label>
                      <input type="file" name="fldMicrokeyDocuments[]" data-show-remove="true" data-errors-position="outside"  class="dropify" />
                    </li>
                    <li>
                      <label><i class="fa fa-star" style="font-size:7px;color:#f00;" aria-hidden="true"></i> Main Description</label>
                      <textarea class="form-control" rows="4" cols="" name="fldMicrokeyDesc"  placeholder="Enter Portfolio"></textarea>
                    </li>
                    
                  </ul>
                </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
 <script src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
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

    jQuery('.dropify').dropify({
          messages: {
            'default': 'Drag and drop a file here or click.Hover over on file after upload to remove this file.',
            'replace': 'Drag and drop or click to replace',
            'remove':  'Remove',
            'error':   'Ooops, something wrong happended.'
          }
        });

  }); 
</script>       