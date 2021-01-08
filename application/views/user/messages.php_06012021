<style type="text/css">
.chatDiv .searchDiv ul li a.nav-link.hasNewMessages{
  background: #46b4e73b;
}
.hasNoNewMessages .stat {
  display: none !important;
}
.hasNewMessages .txthldr h2{
  font-weight: bold;
  color: #000 !important;
}
div#attchmentpreview {
    display: inline-block;
    padding: 10px;
    /*background: #ebeff2;*/
    width: 25%;
    margin-right: 20px;
}
div#attchmentpreview ul {
    margin: 0;
    padding: 0;
}
div#attchmentpreview ul li {
    line-height: 40px;
    padding: 0 15px;
    width: 100%;
}
.upload-btn-wrappe {
    width: 60px;
    height: 60px;
    border: none;
    margin: 0 20px 0 0;
    position: relative;
    cursor: pointer;
}
.ChatBtnDiv input[type="file"] {
    cursor: pointer;
    position: absolute;
    left: 0;
    top: 0;
    opacity: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
}
.uploadButton {
    background: url(https://www.drivedigitally.com/hirenworknew/assets/img/icon-img4.png) no-repeat center center;
    outline: none;
    width: 60px;
    height: 100%;
    cursor: pointer;
}
</style>
<div class="chatDiv">
  <div class="searchDiv">
    <div class="inputGroup">
      <div class="input-group"> <span class="input-group-addon"> <img src="<?php  echo base_url('assets/img/search-icon.png'); ?>" alt="img"> </span>
        <input id="msg" type="text" class="form-control" name="msg" placeholder="Search...">
      </div>
    </div>
    <div class="ChatListPanel">
      <ul class="nav nav-tabs">
          <div id="frndlistID" style="width: 100%">
            {user_info} {frndlist}

            <li class="nav-item">
              <a class="{active} {mclass}" href="<?php echo base_url('messages/{user_id}'); ?>">
                <div class="ImgHldrWrapper {is_login}">
                  <div class="imghldr" style="background:url(<?= base_url()?>{profile_image}) no-repeat center top; background-size:cover;">
                  </div>
                  <span class="stat">{totalmessage}</span>
                </div>
                <div class="txthldr">
                    <h2>{name}</h2> <!--({task_name})
                    <p>{address}, {city}, {state}, {country}</p>-->
                </div>
              </a>
            </li>
            {/frndlist} {/user_info}
          </div>
      </ul>
    </div>
  </div>
  <div class="right-chatDiv">
<?php 
  /*$msg = $this->session->flashdata('msg'); 
  if(!empty($msg)) {
?>
<section style="padding-top: 7%;">
<?php echo $msg; ?>
</section>
<?php
	}*/
?>
<?php 

	/*$frmValidationMsg = validation_errors(); 
	if(!empty($frmValidationMsg)) {
?>
	<section style="padding-top: 7%;">
		<?php echo '<div class="alert alert-danger text-center">' . $frmValidationMsg . '</div>'; ?>
	</section>
<?php
  }*/
?>
    <div class="tab-content">
      <div id="msg1" class="container tab-pane active">
        <div class="rht-chat">
          <div class="rht-chat-1">
            <div class="ImgHldrWrapper ActivePfl">
              <div class="caption" style="background:url({user_info} {user_image} {/user_info} ) no-repeat center top; background-size:cover;"></div>
              <span class="stat"></span> 
			</div>
            <h3><?php echo $this->session->userdata('user_name'); ?></h3>
            <h6 id="lastSeenId">{lastSeen}<!--{user_info} {address} {/user_info}, {user_info} {city} {/user_info}, {user_info} {state} {/user_info}, {user_info} {country} {/user_info}--></h6>
			<?php if($this->uri->segment(2) != '' && $this->session->userdata('user_type') == 3){?>
			<div class="btnDiv2">
			 <form name="frmMakeOffer" id="frmMakeOffer_<?php echo $this->uri->segment(2);?>" action="" method="post">
                          <input type="hidden" name="chkMakeOfferFreelancer" value="<?php echo $this->uri->segment(2);?>" />
                        </form>
			  <a href="#" data-formaction="<?php echo base_url(); ?>make-an-offer" data-formid="<?php echo $this->uri->segment(2);?>" class="view-btn1 makeoffer"> Make offer </a> 
              <a href="#" data-formaction="<?php echo base_url(); ?>hire-freelancer" data-formid="<?php echo $this->uri->segment(2);?>" class="view-btn2 directhire"> Hire </a> 
			</div>
			<?php } ?>
          </div>
          <!--<div class="rht-chat-2"> <span class="time"> 09-03 <em> </em> 10:26 AM </span> </div>--> 
        </div>
        <div class="main-chatdiv">
          <div class="ChatPanel">
            <div class="chatWrapper" id="divscroll">
                <div id="msgID">
                    <!--chat 1 -->
                    {user_info}  {msghistory}
                    <div class="chat-rht-sec {className}" id="res">
                        <div class="chat-back-img"> <span style="background:url({profileImage}) no-repeat center top; background-size:cover;"></span>
                            <div class="chat-back-sec">
                                <div class="cap">
                                    <p>{message_content}</p><a href="<?= base_url().'uploads/messages/' ?>{attachement}">{attachFile}{download}</a>
                                </div>
                                <div class="cap2">{date_time}{readicon}</div>
                            </div>
                        </div>
                    </div>
                    <!--chat 1 -->
                    {/msghistory} {/user_info}
                </div>
            </div>

          </div>
        </div>
      </div>	  
    </div>
	
	<?php
	if($this->uri->segment(2) != ''){
		?>

	<div class="ChatBtnDiv">
      <form class="Wrapper" action="<?= base_url('user/saveMsgData'); ?>" method="post" enctype="multipart/form-data">
        <input type="text" class="form-control" name="msg" id="msg" placeholder="Type here...">
		    <div id="attchmentpreview">
          
        </div>
        <input type="hidden" name="user_to" value="<?= $this->uri->segment(2) ?>">
        <div class="upload-btn-wrappe">
          <input name="uploadFiles[]" type="file" id="uploadfile"/>
          <div class="uploadButton"></div>
        </div>
        <input class="" name="" type="submit" value="Send">
        
      </form>
    </div>	
		
		<?php
	}else{
		?>
	<div class="ChatBtnDiv">Click on Name to chat with</div>	
		<?php
	}
	
	?>
    	
  </div>
</div>
<script>
  $(document).ready(function() { 
    //$(".chat-rht-sec").scrollTop($(".cap").height());
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
   
	$("#divscroll").animate({
	  scrollTop: $('#divscroll')[0].scrollHeight - $('#divscroll')[0].clientHeight
	}, 0);
  }); 
  $("#uploadfile").change(function() {
    //var files = $('.upload')[0].files;
    var files = $(this)[0].files;
    console.log(files)
    $("#attchmentpreview").text("");
    for (var i = 0; i < files.length; i++) {
      //$(this).parent().parent().prev("#attchmentpreview").append('<ul><li>' + files[i].name + '</li></ul>');
  $("#attchmentpreview").append('<ul><li>' + files[i].name + '</li></ul>');      
      //$(".upload_prev").append('<ul><li>' + files[i].name + '</li></ul>');
    }
  });

  var last_seen_ajax_call = function(user_id=0) {
      // alert();
      $.ajax({
          method: "POST",
          url: "<?php echo base_url(); ?>User/last_seen/"+user_id,
          data: {}
      }).done(function(msg) {
          $("#lastSeenId").html(msg);
          //$(".badge2").html(msg);res
          //	alert($(".badge2").text())
      });
  };
  setInterval(last_seen_ajax_call, 5000, '<?php echo $user_id_to;?>');

  var message_ajax_call = function(user_id=0) {
      // alert();
      $.ajax({
          method: "POST",
          url: "<?php echo base_url(); ?>User/get_messages/"+user_id,
          data: {}
      }).done(function(msg) {
          $("#msgID").html(msg);
          //$(".badge2").html(msg);res
          //	alert($(".badge2").text())
      });
  };
  setInterval(message_ajax_call, 5000, '<?php echo $user_id_to;?>');

  var frndlist_ajax_call = function(user_id=0) {
      // alert();
      $.ajax({
          method: "POST",
          url: "<?php echo base_url(); ?>User/get_frndlist/"+user_id,
          data: {}
      }).done(function(msg) {
          $("#frndlistID").html(msg);
          //$(".badge2").html(msg);res
          //	alert($(".badge2").text())
      });
  };
  //setInterval(frndlist_ajax_call, 4000, '<?php echo $user_id_to;?>');
</script>



