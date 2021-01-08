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

  <!--==========================
      ConterDiv Section
    ============================-->
  
  <div class="main-div-sec">
    <div class="full" style="background:#f6f8fa; padding: 30px 0 60px 0; width:100%; float:left;">
      <div class="container">
        <div class="view-box">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Search freelancer</li>
            </ol>
          </nav>
          <div class="row">
            <div class="col-lg-4">
              <div class="search-settingsDiv">
                <h2> Search Settings </h2>
                <div class="search-settingsDiv-sec">
                   <!--<div class="caption-bottom">
                    <div class="borderdiv-part">
                      <button class="accordion"> Name </button>
                      <div class="panel" style="">
                        <div class="big-text">
                          <div class="input-group amt">
                            <input class="form-control" type="text" id="fldSearchFreelancer" name="fldSearchFreelancer" placeholder="Search by name">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                 <div class="caption-bottom">
                    <div class="borderdiv-part">
                      <button class="accordion"> Freelancer Type </button>
                      <div class="panel" style="">
                        <div class="big-text">
                          <div class="radiodiv">
                            <ul>
                              <li>
                                <label class="containerdiv">Key
                                  <input type="radio" checked="checked" name="radio">
                                  <span class="checkmark"></span> </label>
                              </li>
                              <li>
                                <label class="containerdiv">Agency
                                  <input type="radio" checked="checked" name="radio">
                                  <span class="checkmark"></span> </label>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>-->
                  <div class="caption-bottom">
                    <div class="borderdiv-part">
                      <button class="accordion"> Skill </button>
                      <div class="panel" style="">
                        <div class="big-text">
                          <div class="select-style">
                            <select id="fldSearchSkill" name="fldSearchSkill">
                              <option value="">Select Skill</option>
                              {skills}
                              <option value="{key}">{value}</option>
                              {/skills}
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                   <!--<div class="caption-bottom">
                    <div class="borderdiv-part">
                      <button class="accordion"> Country </button>
                      <div class="panel" style="">
                        <div class="big-text">
                        	<div class="select-style">
                            <select id="fldSearchCountry" name="fldSearchCountry">
                              <option value="">Select Country</option>
                              {countries}
                              <option value="{key}">{value}</option>
                              {/countries}
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>-->
                </div>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="make-offerDiv">
                <form name="frmSelectedFreelancer" id="frmSelectedFreelancer" action="<?php echo base_url(); ?>make-an-offer" method="post">
                  <div class="make-offerDiv-lft" id="selectedFreelancer"> 
                  </div>
                </form>
                <div class="make-offerDiv-rht"> <a href="#" id="linkMakeOffer" class="make-of"> Make offer </a> </div>
              </div>
              <div class="search-settingsDiv" id="searchResult">
                <h2><small> Result </small> </h2>
                {freelancerInfo}
                <div class="anaaDiv">
                  <div  class="chackDiv">
                    <label class="containerDiv">
                      <input type="checkbox" name="chkSelectFreelancer[]" id="chkSelectFreelancer_{id}" class="chkSelectFreelancer" value="{id}" />
                      <span class="checkmark"></span> </label>
                  </div>
                  <div class="anaaDiv-top"> <span> <img src="{user_image}" alt="{name}" id="userImage_{id}" style="width:64px; height:64px;"> </span>
                    <!--<div class="round"> </div>-->
                    {is_online}
                    <div class="caption">
                      <h3><a href="<?= base_url().'public-profile/' ?>{public_id}">{name}</a></h3>
                      <p> {city}, {state}, {country} </p>
                      <small>{total_positive_coins} Coins </small>
                      <em> {total_negative_coins} Coins </em> 
                      <div class="btnDiv2"> 
                        <form name="frmMakeOffer" id="frmMakeOffer_{id}" action="" method="post">
                          <input type="hidden" name="chkMakeOfferFreelancer" value="{id}" />
                        </form>
                        <a href="#" data-formaction="<?php echo base_url(); ?>make-an-offer" data-formid="{id}" class="view-btn1 makeoffer"> Make offer </a> 
                        <a href="#" data-formaction="<?php echo base_url(); ?>hire-freelancer" data-formid="{id}" class="view-btn2 directhire"> Hire </a> 
                       </div>
                    </div>
                  </div>
				  <div class="rated">
				  Skills :
				  <ul>
					{user_skills}
						<li style="font-size:12px;">{skill_name}</li>
					{/user_skills}
				 </ul>
				  </div>
                  <div class="rated">
                    <ul>
                      <li> ${total_earning}k <small> Earned </small> </li>
                      <li> {task_completed} <small> Job Completed </small> </li>
                      <li> A+ <small> Top Rated </small> </li>
                    </ul>
					<p>{bio}</p>
                  </div>
                </div>
                {/freelancerInfo}
                <div class="pag">
                  {links}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<div class="wish-close">
  <div class="modal" id="myModal7">
    <div class="modal-dialog">
      <div class="modal-content"> 
        
        <!-- Modal Header -->
        <div class="modal-header" style="border:none;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <div class="to-close"> <img src="<?php  echo base_url(); ?>assets/img/pop-round-img.png" alt="">
            <h2> Do you wish to close? </h2>
            <p> Your offer will no longer be availabe for those who didn't <br>
              acceted your offer yet. </p>
          </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-primary"> Yes Close It </button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- script for auto complete multiselect --> 
<!--<script src="<?php  echo base_url('assets/js/fastselect.standalone.js'); ?>"></script>--> 
<script>
  //$('.multipleSelect').fastselect();
</script> 

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "%";
    } 
  });
}
</script>

<script> 
  function removeSelection(eID) {
    //alert( "Handler for .click() called. " + eID);
    var selectionID = 'userPImage_' + eID;
    var checkboxID = 'chkSelectFreelancer_' + eID;

    $("#"+checkboxID).prop("checked", false);
    $("#" + selectionID).remove();       
  } 

  $(document).ready(function() {
    function searchFreelancer() {
      var freelancer_name = $('#fldSearchFreelancer').val();
      var freelancer_skill = $('#fldSearchSkill').val();
      var freelancer_country = $('#fldSearchCountry').val();      

      $.ajax({
        method: "POST",
        url: "<?php echo base_url(); ?>User/ajax_search_freelancer",
        data: { name: freelancer_name, skill: freelancer_skill, country: freelancer_country }
      })
      .done(function( msg ) {
        //alert( "Data Saved: " + msg );
        $('#searchResult').html(msg);
      });      
    }  

    $('#fldSearchFreelancer').keyup(function() {
      //alert( "Handler for .keyup() called." );
      searchFreelancer();
    });

    $('#fldSearchSkill').change(function() {
      //alert( "Handler for .change() called." );
      searchFreelancer();      
    }); 

    $('#fldSearchCountry').change(function() {
      //alert( "Handler for .change() called." );
      searchFreelancer();      
    });      

    $('.chkSelectFreelancer').click(function() {
      //alert( "Handler for .click() called." );
      var imageID = 'userImage_' + $(this).val();

      if($(this).prop("checked") == true){
        //alert("Checkbox is checked.");
        $('#selectedFreelancer').append('<span id="userPImage_' + $(this).val() + '"><img src="' + $('#'+imageID).attr('src') + '" alt="Selected" style="width:49px; height:48px;"><em><a href="#" onClick="removeSelection(\'' + $(this).val() + '\')"><img src="<?= base_url('assets/img/close-round.png') ?>" alt="Remove"></a></em><input type="hidden" name="fldSelectedFreelancer[]" value="' + $(this).val() + '" /></span>');        
      }else{
        //alert("Checkbox is unchecked.");
        $("#userPImage_" + $(this).val()).remove();
      }       
    }); 

    $('#linkMakeOffer').click(function(event) {
      event.preventDefault();
      var atLeastOneIsChecked = $('input[name="chkSelectFreelancer[]"]:checked').length;

      if(atLeastOneIsChecked > 0) {
          //alert('Freelancer selected for sending this offer.');
          $('#frmSelectedFreelancer').submit();
      }else{
          alert('No Freelancer has been selected for sending this offer.');
      }
    });  

    $('.makeoffer').click(function(event) {
      event.preventDefault();
      var actionUrl = $(this).data('formaction');
      var formId = $(this).data('formid');      

      //alert(actionUrl);
      //alert(formId);
      $('#frmMakeOffer_' + formId).attr('action', actionUrl);
      $('#frmMakeOffer_' + formId).submit();
    });

    $('.directhire').click(function(event) {
      event.preventDefault();
      var actionUrl = $(this).data('formaction');
      var formId = $(this).data('formid');      

      //alert(actionUrl);
      //alert(formId);
      $('#frmMakeOffer_' + formId).attr('action', actionUrl);
      $('#frmMakeOffer_' + formId).submit();      
    });             
  }); 
</script>   