<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
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
<style type="text/css">
  .postDiv_Box .step_Box ul li textarea.form-control{
    height:88px;
  }
  .select2{
    width: 100% !important;
  }
  .select2-selection{
    margin-bottom: 0px !important;
    border: 1px solid #d3dde6 !important;
  }
  .select2-dropdown--below{
    margin-top: -109px !important;
  }
  .select2-selection__choice{
    width: auto !important;
    border-radius: 20px !important;
    background-color: #eff2f4 !important;
    border:0px !important;
  }
  .select2-selection__choice__remove{
    border:0px !important;
  }
  .select2-selection__choice__remove span{
   margin-bottom: 0px !important;
  }
  .select2-selection__choice__display
  {
    margin-bottom: 0px !important;
    float: none !important;
    font-size: 14px;
    color: #7c8994;
  }
  .postDiv_Box .step_Box ul li span{
      float: inherit;
      margin-bottom: 0px;
  }
  .select2-offscreen[required],
    .select2-offscreen[required]:focus {
        width: auto !important;
        height: auto !important;
    }
    .form-control.select2-hidden-accessible {
        top: 435px;
        left:250px;
    }
  .select2-search__field {height: 34px;}
</style>
  <!--==========================
      ConterDiv Section
    ============================-->
  <section id="postDiv">
    
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="postDiv_Box">
            
              <form action="<?php echo base_url(); ?>Freelancer/add_microkey_client_post" name="frmPostTaskFirst" id="frmPostTaskFirst" method="post" enctype="multipart/form-data">
                                                          
              <div class="postDiv_BoxFrm">
                <div class="step_Box">
                  <h3 class="p-0">Create Project</h3>
                  <ul>
                  <li><span>
                          <label class="asterisk">Title</label>
                          <input class="form-control" type="text" name="title" placeholder="Enter Here" required>
             </span>
                   </li>
                   <li>
                      <label class="asterisk">Description</label>
                      <textarea class="form-control" rows="4" cols="" name="description"  placeholder="Enter Description" required></textarea>
                    </li>
                    </ul>
                      <ul>
                    <li>
                      <span>
                    <label class="asterisk">Skill Required</label> <select class="js-example-tags form-control" multiple="multiple" name="fldSkillRequired[]" required>
                      {skills}
                        <option value="{key}" {currentselection}>{value}</option>
                      {/skills}
                    </select>
                    </span>
                    </li>
                    <li><span>
                <label class="asterisk">Budget</label>
                          <input class="form-control" type="text" name="budget" placeholder="Enter Here" required>
             </span>
                   </li>
                   </ul>
                    <ul>
                   <li>
                  <label class="asterisk">Select Continent</label>
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
                    <div class="row">
                        <div class="col-lg-8">
                            <label class="asterisk">Duration</label>
                            <input class="form-control" style="width: 100%;" type="number" min="0" name="duration"  placeholder="Enter Here" required>
                        </div>
                        <div class="col-lg-4 select-style" style="height: 47px;margin-top: 28px;">
                            <select name="duration_type" style="width: 118%;margin-left: -13px;" required>
                                <option  value="">Select</option>
                                      <option  value="Hourly">Hour</option>
                                      <option  value="Daily">Day</option>
                                      <option  value="Monthly">Month</option>
                                      <option  value="Yearly">Year</option>
                            </select>
                        </div>
                    </div>
                </li>
                </ul>
                  <ul>
                <li>
                  <label class="asterisk">Select Country</label>
                  <div class="select-style" id="countrySelectionList">
                    <select name="fldSelCountry" id="fldSelCountry" required>
                      <option value="">Select</option>
                    </select>
                  </div>
                </li>
                <li>
                      <label>Document</label>
                      <input type="file" name="image" data-show-remove="true" data-errors-position="outside"  class="dropify" />
                    </li>
                </ul>
                  
                </div>
              </div>
              <div class="fullDiv_bottom">
                <button type="submit" name="btnSubmit" value="Post the Task" class="btn btn-primary">Post the Task</button>
                <a href="<?php echo base_url();?>client-dashboard"><button type="button" name="btnCancel" value="Cancel" class="btn btn-cancel">X</button></a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<script src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
<script>
    jQuery(document).ready(function(){
        jQuery('.dropify').dropify({
            messages: {
              'default': 'Drag and drop a file here or click.Hover over on file after upload to remove this file.',
              'replace': 'Drag and drop or click to replace',
              'remove':  'Remove',
              'error':   'Ooops, something wrong happended.'
            }
        });
        $(".js-example-tags").select2({
            tags: true
          });
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
//        $("#frmPostTaskFirst").validate({
//            errorPlacement: function (error, element) {
//                if(element.hasClass('select2') && element.next('.select2-container').length) {
//                    alert("hi");
//                        error.insertAfter(element.next('.select2-container'));
//                } else if (element.parent('.input-group').length) {
//                    error.insertAfter(element.parent());
//                }
//                else if (element.prop('type') === 'radio' && element.parent('.radio-inline').length) {
//                    error.insertAfter(element.parent().parent());
//                }
//                else if (element.prop('type') === 'checkbox' || element.prop('type') === 'radio') {
//                    error.appendTo(element.parent().parent());
//                }
//                else {
//                    error.insertAfter(element);
//                }
//            }
//        });
    }); 
</script>  