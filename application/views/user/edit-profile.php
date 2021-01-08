<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<main id="main">

   <?php 
      ($this->session->userdata('user_type') == 3)? $user_type = 'Client' : $user_type = 'Freelancer';
     //echo "<pre>"; print_r($user_info);die; 
      ?>
   <style>
      .adsbio{
      border-color:red!important;
      }
      .fldNames{
      border-color:red!important;
      }
      .emailfield{
      border-color:red!important;
      }
   </style>
   <!--==========================
      ConterDiv Section
      ============================-->
   <section id="profile_section">
      <div class="profile_top">
         <div class="container">
            <div class="row">
               <?php if($user_info[0]['profile_status'] == 0 ){?>
               <div class="col-lg-12">
                  <div class="col-lg-6" style="float: left;text-align: center;color: red;">
                     <?php $errmsg = $this->session->flashdata('errmsg');if(!empty($errmsg)) {?>
                     <section><?php echo $errmsg; ?></section>
                     <?php } ?>
                     <?php $successmsg = $this->session->flashdata('successmsg');if(!empty($successmsg)) {?>
                     <section style="color: green"><?php echo $successmsg; ?></section>
                     <?php } ?>
                  </div>
               </div>
               <?php } ?>
               <div class="col-lg-3"> </div>
               <div class="col-lg-9">
                  <div class="profile_topLink <?php echo  ($this->session->userdata('user_type') == 4) ? 'freelancer' : 'client'; ?>">
                     <ul>
                      <!--  <li class="active"><a href="<?php echo base_url(); ?>edit-profile"><img src="<?php  echo base_url('assets/img/BioIcon-1A.png'); ?>" alt=""> <?=$user_type?> Update Profile</a></li>-->
                        <li class=""><a href="<?php echo base_url(); ?>user-bio"><img src="<?php  echo base_url('assets/img/BioIcon-1A.png'); ?>" alt=""> <?=$user_type?> Bio</a></li>
                        <?php if($this->session->userdata('user_type') == 4) {?>
                        <li><a href="<?php echo base_url(); ?>portfolio"><img src="<?php  echo base_url('assets/img/GenderIcon-1A.png'); ?>" alt=""> Portfolio</a></li>
                        <?php } ?>
                        <li><a href="<?php echo base_url(); ?>gender"><img src="<?php  echo base_url('assets/img/GenderIcon-1A.png'); ?>" alt=""> Gender</a></li>
                        <li><a href="<?php echo base_url(); ?>payment"><img src="<?php  echo base_url('assets/img/PaymentIcon-1A.png'); ?>" alt=""> Payment</a></li>
                        <li><a href="<?php echo base_url(); ?>settings"><img src="<?php  echo base_url('assets/img/SettingIcon-1A.png'); ?>" alt=""> Settings</a></li>
                        <li><a href="<?php echo base_url(); ?>reviews"><img src="<?php  echo base_url('assets/img/ReviewIcon-1A.png'); ?>" alt=""> Reviews</a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="profile">
      <div class="container">
         <div class="row">
            <!-- left column -->
            <div class="col-lg-3">
               <div class="pro_img">
                  <span class="pro_imgBox">
                     <img class="profile-pic" src="{user_info}{user_image}{/user_info}" alt="Profile Image" /> 
                     <?php if($user_info[0]['profile_status'] == 0 ){?>
                     <div class="uplod">
                        <i class="fa fa-camera upload-button"></i>
                        <form id="frmUploadProfileImg" action="<?php echo base_url(); ?>user/uploadUserProfileImage" method="post">
                           <input class="file-upload" name="userImage" type="file" accept="image/*" style="display: none;" />
                        </form>
                     </div>
                     <?php } ?>
                     <!--<a href="#" class=""></a>--> 
                  </span>
                  <h2><?php echo $this->session->userdata('user_name'); ?></h2>
                  <p>{user_info} {city} {/user_info}, {user_info} {state} {/user_info}, {user_info} {country} {/user_info}</p>
                  <a href="<?php echo base_url(); ?>public-profile" class="pro_imgBtn">View Public Profile</a> <a href="<?php echo base_url(); ?>logout" class="pro_logout" ><img src="<?php  echo base_url('assets/img/logout.png'); ?>" alt=""></a>
               </div>
            </div>
            <!-- edit form column -->
            <div class="col-lg-9 pro_info">
			   <?php 
      $msg = $this->session->flashdata('msg'); 
      if(!empty($msg)) {?>
   <section style="padding-top: 7%;">
      <?php echo $msg; ?>
   </section>
   <?php } ?>
               <!--<div class="alert alert-info alert-dismissable">
                  <a class="panel-close close" data-dismiss="alert">×</a> 
                  <i class="fa fa-coffee"></i>
                  This is an <strong>.alert</strong>. Use this to show important messages to the user.
                  </div>-->
               <h3>Personal info</h3>
               <form name="frmSaveUserInfo" id="frmSaveUserInfo" class="form-horizontal" method="post" action="<?php echo base_url(); ?>user/saveUserProfile" >
			   				  <input id="hiddenInput" type="hidden" name="imageValue" value="<?php echo !empty($user_info[0]['user_image'])? '1' : ''; ?>"  />

                  <div class="form-group">
                     <label class="col-lg-3 control-label">User name <span style="color:red;">*</span></label>
                     <div class="col-lg-8">
                        <input class="form-control" id="fldName" name="fldName" type="text" value="<?php echo $this->session->userdata('user_name'); ?>" placeholder="Enter your name" required="required" />
                     </div>
                  </div>
				  

                  <div class="form-group">
                     <label class="col-lg-3 control-label">Email <span style="color:red;">*</span></label>
                     <div class="col-lg-8">
                        <input class="form-control" id="fldEmail" name="fldEmail" type="email" value="<?php echo $this->session->userdata('user_email'); ?>" placeholder="Enter your email" required="required" />
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-3 control-label">Mobile <span style="color:red;">*</span></label>
                     <div class="col-lg-8">
                        <input class="form-control" name="fldPhone" id="fldPhone" type="number" minlength="10" maxlength="10"  value="{user_info}{phone_no}{/user_info}" placeholder="Enter your Mobile Number" required="required" />
                     </div>
                  </div>
                  <!--<div class="form-group">
                     <label class="col-lg-3 control-label">Time Zone:</label>
                     <div class="col-lg-8">
                        <div class="ui-select">
                           <select id="user_time_zone" class="form-control">
                              <option value="Hawaii">(GMT-10:00) Hawaii</option>
                              <option value="Alaska">(GMT-09:00) Alaska</option>
                              <option value="Pacific Time (US &amp; Canada)">(GMT-08:00) Pacific Time (US &amp; Canada)</option>
                              <option value="Arizona">(GMT-07:00) Arizona</option>
                              <option value="Mountain Time (US &amp; Canada)">(GMT-07:00) Mountain Time (US &amp; Canada)</option>
                              <option value="Central Time (US &amp; Canada)" selected="selected">(GMT-06:00) Central Time (US &amp; Canada)</option>
                              <option value="Eastern Time (US &amp; Canada)">(GMT-05:00) Eastern Time (US &amp; Canada)</option>
                              <option value="Indiana (East)">(GMT-05:00) Indiana (East)</option>
                           </select>
                        </div>
                     </div>
                     </div>-->
                  <div class="form-group">
                     <label class="col-md-3 control-label">Skill <span style="color:red;">*</span></label>
                     <div class="col-md-8">
                        <select class="multipleSelect" multiple name="fldSkills[]" id="skilsarea"  required="required">
                           {skills} 
                           <option value="{key}" {currentselection}>{value}</option>
                           {/skills}
                        </select>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-md-3 control-label">Address  <span style="color:red;">*</span></label>
                     <div class="col-md-8">
                        <textarea id="bioadds" class="form-control"  required="required" rows="" cols="" name="fldAddress"  >{user_info}{address}{/user_info}</textarea>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-md-3 control-label">Bio  <span style="color:red;">*</span></label>
                     <div class="col-md-8">
                        <textarea rows="" cols=""  required="required" class="form-control" name="fldBio" id="fldbio" maxlength="300" autofocus>{user_info}{bio}{/user_info}</textarea>
                        <div id="the-count">
                           <span id="hidcurrent" style="display: none;">{user_info}{bio_count}{/user_info}</span>       
                           <span id="current">{user_info}{bio_count}{/user_info}</span>
                           <span id="maximum">/ 300</span>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-8">
                           <input type="submit" class="btn btn-primary" value="Save Changes">
                           <span></span>
                           <input type="reset" class="btn btn-default" value="Cancel">
                        </div>
                     </div>
               </form>
               </div>
            </div>
         </div>
         <hr>
      </div>
   </section>
</main>
<style>
   .pro_info p {
   margin: 0 27px 7px 17px!important;
   }
   @import url("https://fonts.googleapis.com/css?family=Open+Sans");




form .error {
  color: #ff0000;
}
</style>
<!-- script for auto complete multiselect --> 
<script src="<?php  echo base_url('assets/js/fastselect.standalone.js'); ?>"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

<script>
  $('.multipleSelect').fastselect();
      var readURL = function(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
			//alert(e.target.result);
          $('.profile-pic').attr('src', e.target.result);
          $('#hiddenInput').attr('value', '1');
		  
        }
    
        reader.readAsDataURL(input.files[0]);
        $("#frmUploadProfileImg").submit();
      }
    }

    $("#frmUploadProfileImg").on('submit',(function(e){
      e.preventDefault();
      $.ajax({
        url: $(this).attr('action'),
        type: "POST",
        data:  new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success: function(data){
          $("#targetLayer").html(data);
        },
        error: function(){}           
      });
    }));    
    $(document).ready(function() { 
    $(".file-upload").on('change', function(){
        readURL(this);
    });
    
    $(".upload-button").on('click', function() {
       $(".file-upload").click();
    }); 
    $('#fldbio').keyup(function() {

      var cur = $('#hidcurrent').html();

      var characterCount = $(this).val().length,
      current = $('#current'),
      maximum = $('#maximum'),
      theCount = $('#the-count');
     //var characterCount = parseInt(cur) + parseInt(characterCounts);
     current.html(characterCount);
 
  
  /*This isn't entirely necessary, just playin around*/
  if (characterCount < 70) {
    current.css('color', '#666');
  }
  if (characterCount > 70 && characterCount < 90) {
    current.css('color', '#6d5555');
  }
  if (characterCount > 90 && characterCount < 100) {
    current.css('color', '#793535');
  }
  if (characterCount > 100 && characterCount < 120) {
    current.css('color', '#841c1c');
  }
  if (characterCount > 150 && characterCount < 139) {
    current.css('color', '#8f0001');
  }
  
  if (characterCount >= 190) {
    maximum.css('color', '#8f0001');
    current.css('color', '#8f0001');
    theCount.css('font-weight','bold');
  } else {
    maximum.css('color','#666');
    theCount.css('font-weight','normal');
  }
 }); 
      
});
// Wait for the DOM to be ready
$(document).ready(function() {   // Initialize form validation on the registration form.
  $("form[name='frmSaveUserInfo']").validate({
	   rules: {
            fldPhone: {
               required:true,
				minlength:10,
			  maxlength:10,
			  number: true
            }
        },
    rules: {
        imageValue: {
            required:true
        }
    },
	ignore: "not:hidden",
	messages:{
         fldPhone:"Please specify a valid phone number"
      },
	messages:{
         imageValue:"Please Upload Profile Picture"
      },
	highlight: function(element) {
        $(element).closest('.form-group').find(".form-control:first").addClass('is-invalid');
    },
    unhighlight: function(element) {
        $(element).closest('.form-group').find(".form-control:first").removeClass('is-invalid');
        $(element).closest('.form-group').find(".form-control:first").addClass('is-valid');

    },
    errorElement: 'span',
    errorClass: 'invalid-feedback',
    errorPlacement: function(error, element) {
        if(element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        } else {
            error.insertAfter(element);
        }
    },
  submitHandler: function(form) {
   // form.submit();
	    // e.preventDefault(); // avoid to execute the actual submit of the form.
  //$("#frmSaveUserInfo").load("submit", function (e){ // Trigger Submit When Validation Done
        var form = $(form).attr('action');

                $.ajax({
                    url: url,
                    type: $(form).attr('method'),
                     data: new FormData($(form)),
                    success: function (data) {
						alert('test');
                        var obj = JSON.parse(data); // show response from the php script.
						//location.reload();

                    }
            });
       // });
	           return false;

      
  }
 });
 });

</script> 
