<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">

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
    <div class="postLink"> <a href="javascript:void(0);" class="act"><i class="fa num">1</i> Description</a> <a href="javascript:void(0);"><i class="fa num">2</i> Location and Date</a> <a href="javascript:void(0);"><i class="fa num">3</i> Budget</a> </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="postDiv_Box">
            <form action="<?php echo base_url(); ?>post-task-Step-2" name="frmPostTaskFirst" method="post" enctype="multipart/form-data">
              <div class="step_Box">
                <h3>Description</h3>
                <ul>
                  <li>
					<label><i class="fa fa-star" style="font-size:7px;color:#f00;" aria-hidden="true"></i> Title</label>
                    <input class="form-control" type="text" name="fldTaskTitle" value="{fldTaskTitle}" placeholder="Enter Here" required>
					
					<span>
                    <label><i class="fa fa-star" style="font-size:7px;color:#f00;" aria-hidden="true"></i> Skill Required</label>
                    <select class="multipleSelect" multiple name="fldSkillRequired[]" required >
                      {skills} <option value="{key}" {currentselection}>{value}</option> {/skills}
                    </select>
                    </span> </li>
                  <li>
                    <label><i class="fa fa-star" style="font-size:7px;color:#f00;" aria-hidden="true"></i> Description</label>
                    <textarea class="form-control" rows="7" cols="" name="fldTaskDescription"  placeholder="Enter Description" required>{fldTaskDescription}</textarea>
                  </li>
                </ul>
			     
				<div class="form-group">
                <!--user post text -wrap end-->
				
				
				
				<div  class="row">
						<div class="col-sm-3">
						<input type="file" name="fldTaskDocuments[]" data-show-remove="true" data-errors-position="outside"  class="dropify" multiple />
						</div>
						<div class="col-sm-3">
						  <input type="file" name="fldTaskDocuments[]" data-show-remove="true" data-errors-position="outside"  class="dropify" multiple />
						</div>
						  <div class="col-sm-3">
						<input type="file" name="fldTaskDocuments[]" data-show-remove="true" data-errors-position="outside"  class="dropify" multiple />
						</div>
						<div class="col-sm-3">
						  <input type="file" name="fldTaskDocuments[]" data-show-remove="true" data-errors-position="outside"  class="dropify" multiple />
						</div>
				</div>
                  	
                <ul id="media-list" class="clearfix">
				
                 <!-- <li class="myupload"> <span><i class="fa fa-plus" aria-hidden="true"></i>
                    <input type="file" name="fldTaskDocuments[]" click-type="type2" id="picupload" class="picupload" multiple />
                    </span> </li> -->
									
                </ul>
				</div>
				
              </div>
              <div class="fullDiv_bottom">
                <button type="submit" name="btnSubmit" class="btn btn-primary" value="Save and Continue">Save and Continue</button>
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
        </script>   