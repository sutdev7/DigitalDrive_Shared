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
              <li class="breadcrumb-item active" aria-current="page">Rehire freelancer</li>
            </ol>
          </nav>
          <div class="top-offer">
            <h2> Rehire Freelancer </h2>
            <div class="input-group mb-3">
              <div class="input-group-prepend"> <span class="input-group-text"><img src="<?php echo base_url(); ?>assets/img/search.png" alt="search"> </span> </div>
              <input class="form-control" type="text" id="fldSearchFreelancer" name="fldSearchFreelancer" placeholder="Seacrh.....">
            </div>
            <div class="short-date short-filter"><a href="#TaskFilter" data-toggle="modal" class="Filter-open"><img src="<?php echo base_url(); ?>assets/img/filter-img.png" alt="img"> Filter</a></div>
          </div>
          <span id="searchResult">
          {freelancers}
          <div class="anaaDiv">
            <div class="anaaDiv-top"> <span> <img src="{user_image}" alt="{freelancer_name}" style="width:69px;height:69px;"> </span>
              <div class="round"> </div>
              <div class="caption">
                <h3> {freelancer_name} </h3>
                <p> {freelancer_city}, {freelancer_state}, {freelancer_country} </p>
                <small> + 10 Coins </small>
                <em> - 10 Coins </em> 
                
                <div class="btnDiv2"> 
                  <form name="frmMakeOffer" id="frmMakeOffer_{freelancer_id}" action="" method="post">
                    <input type="hidden" name="chkMakeOfferFreelancer" value="{freelancer_id}" />
                  </form>                  
                  <a href="#" data-formaction="<?php echo base_url(); ?>make-an-offer" data-formid="{freelancer_id}" class="view-btn1 makeoffer"> Make offer </a> 
                  <a href="#" data-formaction="<?php echo base_url(); ?>direct-hire" data-formid="{freelancer_id}" class="view-btn2 directhire"> Rehire </a> </div>
              </div>
              <div class="caption-bottom">
                <div class="borderdiv-part">
                  <button class="accordion"> Contracts </button>
                  <div class="panel">
                    <div class="big-text">
                      {job_list}
                      <div class="big-text-part"> <big> {title} </big> {status} </div>
                      {/job_list}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          {/freelancers}
          <div class="pag">
            {links}
          </div>
          </span>          
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
          <div class="to-close"> <img src="<?php echo base_url(); ?>assets/img/pop-round-img.png" alt="">
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


<a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a> 

<!-- The Modal -->
<div class="modal CmnModal FliterModal" id="TaskFilter">
  <div class="modal-dialog">
    <div class="modal-content"> 
      <!-- Modal Header -->
      <div class="modal-header"> 
        <!--<h2>Budget</h2> -->
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <div class="filterdiv">
          <h3>Filter</h3>
          <div class="row">
            <div class="col-md-4">
              <div class="filterdiv-sec"> <span>
                <label>By Name</label>
                <input class="form-control" type="text" placeholder="By Title">
                </span> </div>
            </div>
            <div class="col-md-4">
              <div class="filterdiv-sec"> <span>
                <label>By Skill</label>
                <input class="form-control" type="text" placeholder="Skill">
                </span> </div>
            </div>
            <div class="col-md-4">
              <div class="filterdiv-sec">
                <div class="radiodiv" style="padding-top:0;"> <span>
                  <label>By Freelancer type</label>
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
                  </span> </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="filterdiv-sec"> <span>
                <label>By Country</label>
                <div class="select-style">
                        <select>
                          <option>Select</option>
                        </select>
                      </div>
                </span> </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer"> <a href="#" class="Terms_Btn" data-dismiss="modal">Show Result</a> <a href="#" class="">Clear All</a> </div>
    </div>
  </div>
</div>


<script>

function init_accordion() {
  var acc = document.getElementsByClassName("accordion");
  var i;

  for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var panel = this.nextElementSibling;
      if (panel.style.maxHeight){
        panel.style.maxHeight = null;
      } else {
        panel.style.maxHeight = panel.scrollHeight + "px";
      } 
    });
  }
}

$(document).ready(function(){
    function searchFreelancer() {
      var freelancer_name = $('#fldSearchFreelancer').val();
      //var freelancer_skill = $('#fldSearchSkill').val();
      //var freelancer_country = $('#fldSearchCountry').val();      

      $.ajax({
        method: "POST",
        url: "<?php echo base_url(); ?>Task/ajax_search_freelancer_for_rehire",
        data: { name: freelancer_name }  //, skill: freelancer_skill, country: freelancer_country
      })
      .done(function( msg ) {
        //alert( "Data Saved: " + msg );
        $('#searchResult').html(msg);
        init_accordion();
        bind_event_handler();         
      });      
    }  

    function bind_event_handler() {
      $('.makeoffer').click(function(event) {
        event.preventDefault();
        var actionUrl = $(this).data('formaction');
        var formId = $(this).data('formid');      

        $('#frmMakeOffer_' + formId).attr('action', actionUrl);
        $('#frmMakeOffer_' + formId).submit();
      });

      $('.directhire').click(function(event) {
        event.preventDefault();
        var actionUrl = $(this).data('formaction');
        var formId = $(this).data('formid');      

        $('#frmMakeOffer_' + formId).attr('action', actionUrl);
        $('#frmMakeOffer_' + formId).submit();      
      });      
    }      

    $('#fldSearchFreelancer').keyup(function() {
      searchFreelancer();      
    }); 

    init_accordion();
    bind_event_handler(); 
});
</script>