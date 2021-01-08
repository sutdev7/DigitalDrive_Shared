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
.postDiv_Box .step_Box ul li textarea.form-control{height:88px;}
	
.select2 { height: 32px; }
.select2{width: 100% !important;margin-bottom: -90px !important;}
.select2-selection{margin-bottom: 0px !important;border: 1px solid #d3dde6 !important;}
.select2-dropdown--below{margin-top: -109px !important;}
.select2-selection__choice{width: auto !important;border-radius: 20px !important;background-color: #eff2f4 !important;border:0px !important;}
.select2-selection__choice__remove{border:0px !important;}
.select2-selection__choice__remove span{margin-bottom: 0px !important;}
.select2-selection__choice__display{margin-bottom: 0px !important;float: none !important;font-size: 14px;color: #7c8994;}
</style>
<!--==========================
  ConterDiv Section
============================-->
<section id="postDiv">
	
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="postDiv_Box">
            
              <form action="<?php echo base_url(); ?>Freelancer/add_microkey_client_post" name="frmPostTaskFirst" method="post" enctype="multipart/form-data">
                                                          
              <div class="postDiv_BoxFrm">
                <div class="step_Box">
                  <h3 class="p-0">Post Microkey</h3>
                  <ul>
                  <li><span>
                <label><i class="fa fa-star" style="font-size:7px;color:#f00;" aria-hidden="true"></i> Micro key Title</label>
                          <input class="form-control" type="text" name="title" placeholder="Enter Here" required>
             </span>
                   </li>
                   <li>
                      <label><i class="fa fa-star" style="font-size:7px;color:#f00;" aria-hidden="true"></i> Description</label>
                      <textarea class="form-control" rows="4" cols="" name="description"  placeholder="Enter Description" required></textarea>
                    </li>
                    </ul>
                      <ul>
                    <li>
                      <span>
                    <label><i class="fa fa-star" style="font-size:7px;color:#f00;" aria-hidden="true"></i> Skill Required</label> <select class="js-example-tags" multiple="multiple" name="fldSkillRequired[]" required>
                      {skills}
                        <option value="{key}" {currentselection}>{value}</option>
                      {/skills}
                    </select>
                    </span>
                    </li>
                    <li><span>
                <label><i class="fa fa-star" style="font-size:7px;color:#f00;" aria-hidden="true"></i> Budget</label>
                          <input class="form-control" type="text" name="budget" placeholder="Enter Here" required>
             </span>
                   </li>
                   </ul>
                    <ul>
                   <li>
                  <label><i class="fa fa-star" style="font-size:7px;color:#f00;" aria-hidden="true"></i>Select Continent</label>
                  <div class="select-style">
                    <select name="continent" id="fldSelContinent" required>
                      <option value="">Select</option>
                      {continents} <option value="{key}" {currentselection}>{value}</option> {/continents}
                    </select>
                  </div>
                </li>
                <li>
                  <!--<label><i class="fa fa-star" style="font-size:7px;color:#f00;" aria-hidden="true"></i>Duration</label>
                  <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
                    <input class="form-control" type="text" value="" name="fldDueDate" required readonly />
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span> </div>-->
          <div class="selectSize">
            <label><i class="fa fa-star" style="font-size:7px;color:#f00;" aria-hidden="true"></i>Duration</label>
            <input class="" type="number" name="duration"  placeholder="Enter Here" required>
            <select name="duration_type" required>
                <option value="">Select</option>
                <option value="Hourly">Hour</option>
                <option value="Daily">Day</option>
                <option value="Monthly">Month</option>
                <option value="Yearly">Year</option>
            </select>
          </div>
                </li>
                </ul>
                  <ul>
                <li>
                  <label><i class="fa fa-star" style="font-size:7px;color:#f00;" aria-hidden="true"></i>Select Country</label>
                  <div class="select-style" id="countrySelectionList">
                    <select name="fldSelCountry" id="fldSelCountry" required>
                      <option value="">Select</option>
                    </select>
                  </div>
                </li>
                <li>
                      <!--<label><i class="fa fa-star" style="font-size:7px;color:#f00;" aria-hidden="true"></i> Document</label>
                      <input type="file" name="image" data-show-remove="true" data-errors-position="outside"  class="dropify" required  />-->
                      
<label><i class="fa fa-star" style="font-size:7px;color:#f00;" aria-hidden="true"></i> Document <small style="font-size:0.7em;">(xls,doc,docx,pdf,jpg,png) Upto 2MB</small></label>
<input type="file" name="image" data-show-remove="true" data-errors-position="outside"  class="dropify" required data-allowed-file-extensions='["xls","doc","pdf","docx","jpg","png"]'  data-max-file-size="2M"/>

                    </li>

                
<li><span>
<label> Additional File <small style="font-size:0.7em;">(write up your audio or Video File link here if any)</small></label>
<input class="form-control" type="text" name="addon_file_url" placeholder="Enter Here">
</span>
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

<!-- script for auto complete multiselect --> 
<script src="<?php  echo base_url('assets/js/fastselect.standalone.js'); ?>"></script> 
<script>
  $('.multipleSelect').fastselect();
</script> 


 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
 <script src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
 
    <script>
            jQuery(document).ready(function(){
                // Basic
               jQuery('.dropify').dropify({
          messages: {
            'default': 'Drag and drop a file here or click.Hover over on file after upload to remove this file.',
            'replace': 'Drag and drop or click to replace',
            'remove':  'Remove',
            'error':   'Ooops, something wrong happended.'
          }
        });

           
            });
      
      //$("#save_continue_task").click(function(event) {
              /* Act on the event */
            //  $('#post_task_step2_form').submit();
            //});

            $(".js-example-tags").select2({
              tags: true
            });
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
  }); 
</script>  