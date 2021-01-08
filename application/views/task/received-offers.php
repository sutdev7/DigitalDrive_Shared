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
              <li class="breadcrumb-item active" aria-current="page">Received Offers</li>
            </ol>
          </nav>
          <div class="top-offer">
            <h2> Received Offers </h2>
            <!--<div class="input-group mb-3">
              <div class="input-group-prepend"> <span class="input-group-text">
                <img src="<?php /*echo base_url(); */?>assets/img/search.png" alt="search">
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
            
            <div class="short-date"> Sort By Date </div>-->
          </div>
          {jobs}
          <div class="my-mbl-app" id="searchResult">
            <div class="my-mbl-app-lft"> <small> {task_post_duration} minutes ago </small>
              <div class="freelancerDiv">
                <ul class="RvwLists">
                  <li>
                      <div class="PflImgHldrWrpr">
                          <div class="Imghldr" style="background:url({user_profile_image}) no-repeat center center; background-size:cover;"></div>
                          {user_is_login}
                      </div>
                      <div class="Txthldr">
                          <h2>{name}</h2>
                          <h6>{profile_title_skill}</h6>
                          <h6>{country}</h6>
                          <!--<h6>{profile_title}</h6>-->
                          <span class="plus">+ {total_positive_coins} Coins</span>
                          <span class="minus"> {total_negative_coins} Coins</span>
                      </div>
                  </li>
                  <!--<li> <img src="img/box-gray.png" alt="img"> <big> 2 More </big> </li>-->
                </ul>
              </div>
            </div>
            <div class="my-mbl-app-rht">
              <a href="javascript:void(0)" class="view-btn1"> Offer Price: {terms_amount_max} </a>
              <a href="#" class="eyeBtn" data-toggle="modal" data-target="#myModa{user_id}"> <i class="fa fa-eye" aria-hidden="true"></i> View Proposal</a>
            </div>

              <div class="wish-close">
                  <div class="modal" id="myModa{user_id}">
                      <div class="modal-dialog">
                          <div class="modal-content">

                              <!-- Modal Header -->
                              <div class="modal-header" style="border:none;">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>

                              <!-- Modal body -->
                              <div class="modal-body" id="mproposal_details_modal">
                                  <div class="to-close">
                                      <h2>Proposal Details</h2>
                                      <p> <i class="fa fa-dollar"></i>  Bidding Amount : $ {terms_amount_max}</p>
                                      <p> <i class="fa fa-calendar"></i>  Posting Date : {posting_date}</p>
                                      <h2 class="Atta">Download Attachment</h2>
                                      {attachments}
                                      <a href="<?php echo base_url(); ?>download_attachment_proposal/{file_name}"><img style="padding: 10px; width: 84px; height: 84px;" src="{file_ext_type}" alt=""></a>
                                      {/attachments}
                                      <!--<p>{p_attachments}</p> -->
                                     <!-- <form id="frm_attachment" action="<?php /*echo base_url() */?>download_attachment/{p_attachments}" method="post" style="width:100%;">
                                          <p id="download_attachment_{p_attachments}" style="cursor: pointer;"><i class="fa fa-download"></i> Download Attachment </p>
                                      </form>-->

                                      <div class="anyClass black_color">{remarks}</div>
                                      <h2>Message</h2>
                                  </div>
                                  <!-- <textarea id="message_{p_attachments}" class="form-controll"></textarea>-->
                                  <textarea id="message_{p_attachments}" class="form-control"/></textarea>


                                  <div class="caption">
                                      <div class="btnDiv2">
                                          <form name="frmMakeOffer" id="frmMakeOffer_{user_id}" action="" method="post">
                                              <input type="hidden" name="chkMakeOfferFreelancer" value="{user_id}" />
                                          </form>


                                      </div>

                                  </div>
                                  <br/>
                                  <div class="row">
                                      <div class="col-sm-4">
                                          <a href="#"  id="btnCloseOffer_{p_attachments}" class="view-btn1 makeoffer"> SEND   </a>
                                      </div>
                                      <div class="col-sm-4">
                                          <a href="#" data-formaction="<?php echo base_url(); ?>hire-freelancer" data-formid="{user_id}" class="view-btn2 directhire"> Hire </a>
                                      </div>
                                      <div class="col-sm-4">
                                          <a href="#" data-formaction="<?php echo base_url(); ?>make-an-offer" data-formid="{user_id}" class="view-btn1 makeoffer"> Make offer </a>
                                      </div>

                                  </div>
                              </div>

                              <!-- Modal footer -->
                              <div class="modal-footer">
                                  <!--   <form action="" method="get" style="width:100%;">
                                                <button type="button" id="btnCloseOffer" class="btn btn-primary"> Yes Close It </button>
                                         </form> -->
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <script>
                  $('#download_attachment_'+{p_attachments}).click(function(){
                      $("#frm_attachment").submit();
                      return false;
                  });

                  var input = document.getElementById('message_{p_attachments}');
                  input.addEventListener("keydown", function (e) {
                      if (e.keyCode === 13) {  //checks whether the pressed key is "Enter"
                          $('#btnCloseOffer_'+{p_attachments}).trigger( "click" );
                      }
                  });

                  $('#btnCloseOffer_'+{p_attachments}).click(function(){


                      //	var task_id="<?php echo $this->uri->segment(2) ?>";
                      //	var offer_id='0';
                      //	var notification_master_id='11';
                      var user_from="<?php echo $this->session->userdata('user_id'); ?>";
                      var user_to="{user_id}";
                      //	var title= "SEND HIRED";
                      var message= $("#message_"+{p_attachments}).val() ;
                      //	var task_name="{task_name}";

                      //	alert(" "+task_id+" "+offer_id+" "+notification_master_id+" "+notification_from+" "+notification_to+" "+title+" "+" "+message);
                      alert("Message sent");
                      $.ajax({
                          method: "POST",
                          url: "<?php echo base_url(); ?>Notification/send_message",
                          /*data: { task_id: task_id, offer_id: offer_id, notification_master_id:notification_master_id, notification_from:notification_from, notification_to:notification_to,title:title,message:message , task_name:task_name   }*/
                          data: {user_from:user_from, user_to:user_to,message:message}
                      }).done(function(msg) {
                          $("#message_"+{p_attachments}).val('');
                          //var obj = JSON.parse(msg);
                          //alert(obj.message);
                          //	alert(msg);
                      });
                  });
              </script>


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


    $(document).ready(function() {
    /* 	$('.make_offer').click(function(){
            var userId = $(this).attr('id');
            $.ajax({
                    method: "POST",
                    url: "<?php echo base_url(); ?>Task/send_offer",
                    data: { userId: userId, taskUserId: '<?php echo $this->uri->segment(2) ?>' }
            }).done(function(msg) {
                    var obj = JSON.parse(msg);
                    alert(ob.message);
            });
    }); */

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
});
</script>