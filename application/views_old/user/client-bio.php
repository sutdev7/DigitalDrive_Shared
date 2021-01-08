<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<main id="main"> 
  <?php /*
  $msg = $this->session->flashdata('msg'); 
  if(!empty($msg)) {?>
  <section style="padding-top: 7%;">
    <?php echo $msg; ?>
  </section>
  <?php } */ ?>

  <?php 
  ($this->session->userdata('user_type') == 3)? $user_type = 'Client' : $user_type = 'Freelancer';
  
  ?>

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
                <li class="active"><a href="<?php echo base_url(); ?>user-bio"><img src="<?php  echo base_url('assets/img/BioIcon-1A.png'); ?>" alt=""> <?=$user_type?> Bio</a></li>

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
          <div class="col-lg-9">
            <div class="pro_info">
              <h4><?=$user_type?> Bio</h4>
              <div class="row">
                <div class="col-lg-3">
                  <label>Name</label>
                  <h5><?php echo $this->session->userdata('user_name'); ?>  
                      <?php if($user_info[0]['profile_status'] == 0 ) { ?>
                        <a href="#EditName" data-toggle="modal"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                      <?php } ?>
                  </h5>
                </div>
                <div class="col-lg-5">
                  <label>Email</label>
                  <h5><?php echo $this->session->userdata('user_email'); ?>
                      <?php if($user_info[0]['profile_status'] == 0 ) { ?>
                        <a href="#EditEmail" data-toggle="modal"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                      <?php } ?>
                  </h5>
                </div>
                <div class="col-lg-4">
                  <label>Country</label>
                  <h5>{user_info} {country} {/user_info} <a href="#EditCountry" data-toggle="modal"><i class="fa fa-pencil" aria-hidden="true"></i></a></h5>
                </div>
              </div>
            </div>
            <div class="pro_info">
              <h4>Other Details</h4>
			   <div class="row mb-4">
                <div class="col-lg-12">
				  <h3>Bio <a href="#EditBio" data-toggle="modal"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                  </h3>
				  <p>{user_info} {bio} {/user_info}</p>
				 </div>
				</div>
			  <?php if($this->session->userdata('user_type') == 4){?>
			   <div class="row mb-4">
                 <div class="col-lg-12">
			       <h3>Title <a href="#EditTitle" data-toggle="modal"><i class="fa fa-pencil" aria-hidden="true"></i></a></h3>
                   <p>{user_info}{profiletitleskill} {profiletitle} {/user_info}</p>
				 </div>
				</div>
			  <?php } ?>
            </div>
            <div class="pro_info">
              <h4>Area / Skills</h4>
              {user_info} 
              <ul class="AreaOption">
                {user_skills} 
                <li><span>{skill_name} <a href="#" class="removeUserSkill" data-user="{user_id}" data-skill="{skill_id}"><img src="<?php  echo base_url('assets/img/removeIcon.png'); ?>" alt="Close"/></a></span></li>
                <!--<li><span>Dreamweaver <a href="#"><img src="<?php  echo base_url('assets/img/removeIcon.png'); ?>" alt=""/></a></span></li>
                <li><span>Web Development <a href="#"><img src="<?php  echo base_url('assets/img/removeIcon.png'); ?>" alt=""/></a></span></li>
                <li><span>Wordpress Development <a href="#"><img src="<?php  echo base_url('assets/img/removeIcon.png'); ?>" alt=""/></a></span></li>
                <li><span>Web Development <a href="#"><img src="<?php  echo base_url('assets/img/removeIcon.png'); ?>" alt=""/></a></span></li>-->
                {/user_skills} 
                <li><a class="addMore" data-toggle="modal" href="#EditArea"><i class="fa fa-plus" aria-hidden="true"></i></a></li>                
              </ul>
              {/user_info}
            </div>
            <div class="pro_info">
              <div class="row mb-4">
                <div class="col-lg-4">
                  <label>State</label>
                  <h5>{user_info} {state} {/user_info} <a href="#EditState" data-toggle="modal"><i class="fa fa-pencil" aria-hidden="true"></i></a></h5>
                </div>
                <div class="col-lg-4">
                  <label>Address</label>
                  <h5>{user_info} {address} {/user_info} <a href="#EditAddress" data-toggle="modal"><i class="fa fa-pencil" aria-hidden="true"></i></a></h5>
                </div>
                <div class="col-lg-4">
                  <label>City</label>
                  <h5>{user_info} {city} {/user_info} <a href="#EditCity" data-toggle="modal"><i class="fa fa-pencil" aria-hidden="true"></i></a></h5>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4">
                  <label>VAT</label>
                  <h5>{user_info} {vat} {/user_info} <a href="#EditVAT" data-toggle="modal"><i class="fa fa-pencil" aria-hidden="true"></i></a></h5>
                </div>
                <div class="col-lg-4">
                  <label>Language</label>
                  <h5>{user_info} {user_languages} {/user_info} <a href="#EditLanguage" data-toggle="modal"><i class="fa fa-plus" aria-hidden="true"></i></a></h5>
                </div>
                <div class="col-lg-4"> 
                  <label>Mobile Number</label>
                  <h5>{user_info} {phone_no} {/user_info}
                      <?php if($user_info[0]['profile_status'] == 0 ){?>
                        <a href="#EditPhone" data-toggle="modal"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                      <?php } ?>
                  </h5>

                </div>
              </div>
                <?php if($user_info[0]['profile_status'] == 0 ){ ?>
                    <form name="frmProfileActive" class="userInfos" method="post" action="<?php echo base_url(); ?>user/activeUserProfile" >
                        <div class="row">
                            <div class="col-lg-12" >
                                <div class="col-lg-6" style="float: left;">
                                    <p id="captcha-img"><?php echo $captchaImg; ?></p>
                                    <!-- <p>Can't read the image? click <a href="https://www.drivedigitally.com/hwfinal/user-bio" class="refresh">here</a> to refresh.</p> -->
                                    <input type="text" class="form-control" name="captcha" placeholder="captcha" />
                                </div>
                                <div class="col-lg-6" style="float: right;"> 
                                    <button name="btnSubmit" class="btn btn-success" type="submit">Submit</button> 
                                </div>
                            </div>
                        </div>
                    </form>
                <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php if($user_info[0]['profile_status'] == 0 ){ ?>
<!--Edit Name Popup-->
<div class="modal editingModal" id="EditName">
  <div class="modal-dialog modal-sm">
    <div class="modal-content"> 
      <form name="frmSaveUserInfo" class="userInfo" method="post" action="<?php echo base_url(); ?>user/saveUserData" >
        <!-- Modal Header -->
        <div class="modal-header">Name
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <p>Edit Name</p>
          <input class="form-control" name="fldName" type="text" value="<?php echo $this->session->userdata('user_name'); ?>" placeholder="Enter your name" required />
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <input name="btnSubmit" type="submit" value="Save">
        </div>
      </form>
    </div>
  </div>
</div>
<?php } ?>
<!--Edit Name Popup--> 
<?php if($user_info[0]['profile_status'] == 0 ){ ?>
<!--Edit Email Popup-->
<div class="modal editingModal" id="EditEmail">
  <div class="modal-dialog modal-sm">
    <div class="modal-content"> 
      <form name="frmSaveUserInfo" class="userInfo" method="post" action="<?php echo base_url(); ?>user/saveUserData" >
        <!-- Modal Header -->
        <div class="modal-header">Email
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <p>Edit Email</p>
          <input class="form-control" name="fldEmail" type="email" value="<?php echo $this->session->userdata('user_email'); ?>" placeholder="Enter your email" required />
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <input name="btnSubmit" type="submit" value="Save">
        </div>
      </form>
    </div>
  </div>
</div>
<!--Edit Email Popup--> 
<?php } ?>
<!--Edit Country Popup-->
<div class="modal editingModal" id="EditCountry">
  <div class="modal-dialog modal-sm">
    <div class="modal-content"> 
      <form name="frmSaveUserInfo" class="userInfo" method="post" action="<?php echo base_url(); ?>user/saveUserData" >
        <!-- Modal Header -->
        <div class="modal-header">Country
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <p>Edit Country</p>
          <div class="select-style">
            <select name="fldCountry" required>
              <option value="">Select Country</option>
              {countries} <option value="{key}" {currentselection}>{value}</option> {/countries}
            </select>
          </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <input name="btnSubmit" type="submit" value="Save">
        </div>
      </form>
    </div>
  </div>
</div>
<!--Edit Country Popup--> 

<!--Edit Bio Popup-->
<div class="modal editingModal" id="EditBio">
  <div class="modal-dialog modal-sm">
    <div class="modal-content"> 
      <form name="frmSaveUserInfo" class="userInfo" method="post" action="<?php echo base_url(); ?>user/saveUserData" >
        <!-- Modal Header -->
        <div class="modal-header"> Bio
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <p>Edit Bio</p>
          <textarea rows="" cols=""  name="fldBio" id="fldbio" maxlength="300" autofocus>{user_info}{bio}{/user_info}</textarea>
          <div id="the-count">
    <span id="hidcurrent" style="display: none;">{user_info}{bio_count}{/user_info}</span>        
    <span id="current">{user_info}{bio_count}{/user_info}</span>
    <span id="maximum">/ 300</span>
  </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <input name="btnSubmit" type="submit" value="Save">
        </div>
      </form>
    </div>
  </div>
</div>
<!--Edit Bio Popup--> 

<!--Edit Title Popup-->
<div class="modal editingModal" id="EditTitle">
  <div class="modal-dialog modal-sm">
    <div class="modal-content"> 
      <form name="frmSaveUserInfo" id="frmSaveUserInfo" class="userInfo" method="post" action="<?php echo base_url(); ?>user/saveUserData" >
        <!-- Modal Header -->
        <div class="modal-header"> Title
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <p>Chose Your skill</p>
          <select class="multipleSelect" multiple name="Skillsname[]" id="myskill">
            {user_skills_name} <option value="{value}" {currentselections}>{value}</option> {/user_skills_name}
          </select>

          <p>Edit Title</p>
          <textarea rows="" cols="" name="fldtitle">{user_info}{profiletitle}{/user_info}</textarea>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <input name="btnSubmit" type="submit" value="Save" id="titlesub">
        </div>
      </form>
    </div>
  </div>
</div>
<!--Edit Title Popup--> 

<!--Edit Area Popup-->
<div class="modal editingModal" id="EditArea"> 
  <div class="modal-dialog modal-sm">
    <div class="modal-content"> 
      <form name="frmSaveUserInfo" class="userInfo" method="post" action="<?php echo base_url(); ?>user/saveUserData" >
        <!-- Modal Header -->
        <div class="modal-header"> Area
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <p>Add Area</p>
          <select class="multipleSelect" multiple name="fldSkills[]">
            {skills} <option value="{key}" {currentselection}>{value}</option> {/skills}
          </select>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <input name="btnSubmit" type="submit" value="Save">
        </div>
      </form>
    </div>
  </div>
</div>
<!--Edit Area Popup--> 

<!--Edit State Popup-->
<div class="modal editingModal" id="EditState">
  <div class="modal-dialog modal-sm">
    <div class="modal-content"> 
      <form name="frmSaveUserInfo" class="userInfo" method="post" action="<?php echo base_url(); ?>user/saveUserData" >
        <!-- Modal Header -->
        <div class="modal-header">State
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <p>Edit State</p>
          <!--<div class="select-style">
            <select>
              <option>Select</option>
            </select>
          </div>-->
          <input class="form-control" name="fldState" type="text" value="{user_info} {state} {/user_info}" placeholder="Enter your state" />
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <input name="" type="submit" value="Save">
        </div>
      </form>
    </div>
  </div>
</div>
<!--Edit State Popup--> 

<!--Edit Address Popup-->
<div class="modal editingModal" id="EditAddress">
  <div class="modal-dialog modal-sm">
    <div class="modal-content"> 
      <form name="frmSaveUserInfo" class="userInfo" method="post" action="<?php echo base_url(); ?>user/saveUserData" >
        <!-- Modal Header -->
        <div class="modal-header">Address
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <p>Edit Address</p>
          <textarea rows="" cols="" name="fldAddress">{user_info} {address} {/user_info}</textarea>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <input name="btnSubmit" type="submit" value="Save">
        </div>
      </form>
    </div>
  </div>
</div>
<!--Edit Address Popup-->

<?php if($user_info[0]['profile_status'] == 0 ){ ?>
<!--Edit Phone Popup-->
<div class="modal editingModal" id="EditPhone">
  <div class="modal-dialog modal-sm">
    <div class="modal-content"> 
      <form name="frmSaveUserPhone" id="frmSaveUserPhone" class="userInfo" method="post" action="<?php echo base_url(); ?>user/saveUserData" >
        <!-- Modal Header -->
        <div class="modal-header">Mobile Number
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <p>Edit Mobile Number</p>
           <span id="pherror" style="color: red"></span>
          
          <input class="form-control" name="fldPhone" id="fldPhone" type="text" value="{user_info}{phone_no}{/user_info}" placeholder="Enter your Mobile Number" />
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <input name="btnSubmit" type="submit" value="Save" id="phonesub">
        </div>
      </form>
    </div>
  </div>
</div>
<?php } ?>


<!--Edit State Popup-->
<div class="modal editingModal" id="EditCity">
  <div class="modal-dialog modal-sm">
    <div class="modal-content"> 
      <form name="frmSaveUserInfo" class="userInfo" method="post" action="<?php echo base_url(); ?>user/saveUserData" >
        <!-- Modal Header -->
        <div class="modal-header">City
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <p>Edit City</p>
          <!--<div class="select-style">
            <select>
              <option>Select</option>
            </select>
          </div>-->
          <input class="form-control" name="fldCity" type="text" value="{user_info} {city} {/user_info}" placeholder="Enter your city" />
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <input name="btnSubmit" type="submit" value="Save">
        </div>
      </form>
    </div>
  </div>
</div>
<!--Edit State Popup--> 

<!--Edit VAT Popup-->
<div class="modal editingModal" id="EditVAT">
  <div class="modal-dialog modal-sm">
    <div class="modal-content"> 
      <form name="frmSaveUserInfo" class="userInfo" method="post" action="<?php echo base_url(); ?>user/saveUserData" >
        <!-- Modal Header -->
        <div class="modal-header">VAT
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <p>Edit VAT No.</p>
          <input class="form-control" name="fldVAT" type="text" value="{user_info} {vat} {/user_info}">
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <input name="btnSubmit" type="submit" value="Save">
        </div>
      </form>
    </div>
  </div>
</div>
<!--Edit VAT Popup-->

<!--Edit Language Popup-->
<div class="modal editingModal" id="EditLanguage">
  <div class="modal-dialog modal-sm">
    <div class="modal-content"> 
      <form name="frmSaveUserInfo" class="userInfo" method="post" action="<?php echo base_url(); ?>user/saveUserData" >
        <!-- Modal Header -->
        <div class="modal-header">Language
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <p>Edit Language</p>
          <select class="multipleSelect" multiple name="fldLanguages[]">
            {languages} <option value="{key}" {currentselection}>{value}</option> {/languages}
          </select>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <input name="btnSubmit" type="submit" value="Save">
        </div>
      </form>
    </div>
  </div>
</div>
<!--Edit Language Popup-->


<!-- script for auto complete multiselect --> 
<script src="<?php  echo base_url('assets/js/fastselect.standalone.js'); ?>"></script> 
<script>
  $('.multipleSelect').fastselect();
</script> 

<script> 
  $(document).ready(function() { 

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



    $("#titlesub").click(function () {
            var ddlFruits = $("#myskill");
            if (ddlFruits.val() == "") {
                alert("Please select an option!");
                return false;
            }else{

              $('#frmSaveUserInfo').submit();
            }
            //$('#frmSaveUserInfo').submit();
        });


    $("#phonesub").click(function () {
            var mobNum = $("#fldPhone").val();
            if ($.isNumeric(mobNum)==false) {
                 $("#pherror").html("Phone Number must be integer");
                return false;
            }else if(mobNum.length>10 || mobNum.length<10){
               $("#pherror").html("Phone Number Must be 10 degit");
                return false;

            }else{

              $('#frmSaveUserPhone').submit();
            }
            //$('#frmSaveUserInfo').submit();
        });



    $('.removeUserSkill').click(function(event) {
      event.preventDefault();   
      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>user/removeUserSkillData",
        data: { id : $(this).data("user"), skill_id : $(this).data("skill") }, // serializes the form's elements.
        success: function(data){
          var obj = JSON.parse(data); // show response from the php script.
          location.reload();
        }
      });
    });

    $(".userInfo").submit(function(e) {
      e.preventDefault(); // avoid to execute the actual submit of the form.

      var form = $(this);
      var url = form.attr('action');

      $.ajax({
        type: form.attr('method'),
        url: url,
        data: form.serialize(), // serializes the form's elements.
        success: function(data){
          var obj = JSON.parse(data); // show response from the php script.
          location.reload();
        }
      });
    });

    var readURL = function(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          $('.profile-pic').attr('src', e.target.result);
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
    
    $(".file-upload").on('change', function(){
        readURL(this);
    });
    
    $(".upload-button").on('click', function() {
       $(".file-upload").click();
    });    
  }); 
</script> 