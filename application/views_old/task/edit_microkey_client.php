<?php

defined('BASEPATH') OR exit('No direct script access allowed');

?>
<link rel="stylesheet" href="http://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
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
    
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="postDiv_Box">
            <form action="<?php echo base_url(); ?>Task/update_microkey/<?php echo $this->uri->segment(2); ?>" name="frmPostTaskFirst" method="post" enctype="multipart/form-data">                                                          
              <div class="postDiv_BoxFrm">
                <div class="step_Box">
                  <h3 class="p-0">Edit Microkey</h3>
                  <ul>
                  <li><span>
                <label><i class="fa fa-star" style="font-size:7px;color:#f00;" aria-hidden="true"></i> Micro key Title</label>
                          <input class="form-control" type="text" name="title" value="{title}" placeholder="Enter Here">
                  </span>
                   </li>
                   <li>
                      <label><i class="fa fa-star" style="font-size:7px;color:#f00;" aria-hidden="true"></i> Description</label>
                      <textarea class="form-control" rows="4" cols="" name="description" value="description"  placeholder="Enter Description" style="height:47px;"></textarea>
                    </li>
                    </ul>
                      <ul>
                    <li>
                      <span>
                    <label><i class="fa fa-star" style="font-size:7px;color:#f00;" aria-hidden="true"></i> Skill Required</label>
                    <select class="multipleSelect" multiple name="fldSkillRequired[]">
                      {skills} <option value="{key}" {currentselection}>{value}</option> {/skills}
                    </select>
                    </span>
                    </li>
                    <li><span>
                <label><i class="fa fa-star" style="font-size:7px;color:#f00;" aria-hidden="true"></i> Budget</label>
                          <input class="form-control" type="text" name="budget" value="{budget}" placeholder="Enter Here">
                  </span>
                   </li>
                   </ul>
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
                  <!--<label><i class="fa fa-star" style="font-size:7px;color:#f00;" aria-hidden="true"></i>Duration</label>
                  <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
                    <input class="form-control" type="text" value="" name="fldDueDate" required readonly />
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span> </div>-->

          <div class="selectSize">
            <label><i class="fa fa-star" style="font-size:7px;color:#f00;" aria-hidden="true"></i>Duration</label>
            <input class="" type="number" name="duration" value="{duration}"  placeholder="Enter Here">
            <select name="duration_type" required>
                <option value="">Select</option>
                <option value="Hourly" <?php if($duration_type == 'Hourly'){ echo 'selected'; } ?>>Hour</option>
                <option value="Daily" <?php if($duration_type == 'Daily'){ echo 'selected'; } ?>>Day</option>
                <option value="Monthly" <?php if($duration_type == 'Monthly'){ echo 'selected'; } ?>>Month</option>
                <option value="Yearly" <?php if($duration_type == 'Yearly'){ echo 'selected'; } ?>>Year</option>
            </select>
          </div>
                </li>
                </ul>
                  <ul>
                <li>
                  <label><i class="fa fa-star" style="font-size:7px;color:#f00;" aria-hidden="true"></i> Select Country</label>
                  <div class="select-style" id="countrySelectionList">
                    <select name="fldSelCountry" id="fldSelCountry" required>
                      <option value="">Select</option>
            {countries} <option value="{key}" {currentselection}>{value}</option> {/countries}
                    </select>
                  </div>
                </li>
                <li>
                      <label><i class="fa fa-star" style="font-size:7px;color:#f00;" aria-hidden="true"></i> File</label>
                      <a href="{image}">Download Document</a>
                      <input type="file" name="image" data-show-remove="true" data-errors-position="outside"  class="dropify" />
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

<script> 
  $(document).ready(function(){ 
    $('.remv').click(function(){
    var rowId = $(this).data('id');
    //alert(rowId);
    if(confirm("Are you sure you want to delete this?")){  
      $.ajax({  
         url:"<?php echo base_url(); ?>delete-attachment",  
         method:"POST",  
         data:{rowId:rowId, taskId: '<?= $this->uri->segment(2)?>'},  
         success:function(data)  
         {  
            $('#editAttch').html(data);  
            location.reload(); 
         }  
      });  
     }else{  
      return false;       
     }
    
  });
  }); 
</script>    



 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
 <script src="http://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
 
    <script>
            jQuery(document).ready(function(){
                // Basic
                jQuery('.dropify').dropify();

           
            });
        </script>   