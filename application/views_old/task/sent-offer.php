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
              <li class="breadcrumb-item active" aria-current="page">Sent Offers</li>
            </ol>
          </nav>
          <div class="top-offer">
            <h2> Offers </h2>
            <div class="input-group mb-3">
              <div class="input-group-prepend"> <span class="input-group-text">
                <img src="<?php echo base_url(); ?>assets/img/search.png" alt="search"> 
              </span> </div>
              <input type="text" class="form-control" name="fldSearchCriteria" id="fldSearchCriteria" placeholder="Seacrh..... ">
            </div>
            
            <div class="ongoing-task-lft">
              <label>Sort by Status</label>
              <div class="select-style">
                <select>
                  <option>All</option>
                  <option>Save proposal</option>
                  <option>recent Proposal</option>
                  <option>Previous Freelancer</option>
                  <option>Agency</option>
                  <option>Freelancer</option>
                </select>
              </div>
            </div>
            
            <div class="short-date"> Sort By Date </div>
          </div>
          {jobs}
          <div class="my-mbl-app" id="searchResult">
            <div class="my-mbl-app-lft"> <small> {task_post_duration} minutes ago </small>
              <h2> {task_name} </h2>
              <ul>
                <li style="padding: 6px 12px;"><span style="margin-right: 5px;"><b>{waiting_for_response}</b></span><span> Waiting for freelancer </span></li>
                <li style="background: #e1f7e1 0px 2px;padding: 7px 23px 7px 13px;"><span style="margin-right: 5px;"><b>{responded}</b></span><span>  Accepted  </span></li>
                <li style="background: #fddbe7 0px 2px;padding: 7px 23px 7px 13px;"><span style="margin-right: 5px;"><b>{refused}</b></span><span> Refusal </span></li>
              </ul>
              <div class="freelancerDiv">
                <ul>
                  <li> <span> Freelancer </span> </li>
                  {freelancer_offer}
                  <li> <img src="{user_profile_image}" alt="Freelancer" style="width:65px;height:64px;"> {user_is_login} </li>
                  {/freelancer_offer}
                  <!--<li> <img src="img/box-gray.png" alt="img"> <big> 2 More </big> </li>-->
                </ul>
              </div>
            </div>
            <div class="my-mbl-app-rht"> 
              <a href="<?php echo base_url(); ?>offer-details/{user_task_id}" class="view-btn1"> View Details </a> 
              <a href="#" class="view-btn2" onClick="setUserTaskId('{user_task_id}')" data-toggle="modal" data-target="#myModal7"> Close This Offer </a> 
            </div>
          </div>
          {/jobs}          
        </div>
        <div class="pag" style="margin-bottom:20px;">
          {links}
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
          <form action="" method="get" style="width:100%;">
            <button type="button" id="btnCloseOffer" class="btn btn-primary"> Yes Close It </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script> 
  var userTaskId = null;
  function setUserTaskId(task_id){
    userTaskId = task_id;
  }
  $(document).ready(function() { 
    $( "#fldSearchCriteria" ).keyup(function() {
      $.ajax({
        method: "POST",
        url: "<?php echo base_url(); ?>Task/ajax_sent_offer_page",
        data: { searchCriteria: $(this).val() }
      })
      .done(function( msg ) {
        $("#searchResult").html(msg);
      });
    });

    $( "#btnCloseOffer" ).click(function() {
      $.ajax({
        method: "POST",
        url: "<?php echo base_url(); ?>Task/ajax_close_offer_send_user",
        data: { task_id: userTaskId }
      })
      .done(function( msg ) {
        //alert(msg);
        //alert(userTaskId);
        var myObj = JSON.parse(msg);
        window.location.href = '<?php echo base_url(); ?>dashboard';
      });
    });    
  }); 
</script>     