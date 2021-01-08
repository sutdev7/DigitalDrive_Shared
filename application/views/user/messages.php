<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.css"/>

<div class="chatDiv">
  
  <div class="chat-wrap">
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
                  <span class="last-msg">{logout_date}</span>
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
            <div class="ImgHldrWrapper ActivePf{login_session}">
              <!--<div class="caption" style="background:url({user_info} {user_image} {/user_info} ) no-repeat center top; background-size:cover;"></div>-->
              <!--<div class="caption" style="background:url(<?php echo base_url()."uploads/user/profile_image/".$otheruserInfo['basic_info']->profile_image ?> ) no-repeat center top; background-size:cover;"></div>-->
              <div class="caption"><a href="<?php echo base_url() ?>public-profile/<?php echo $otheruserInfo['basic_info']->profile_id ?>">
              <img src="<?php echo base_url()."uploads/user/profile_image/".$otheruserInfo['basic_info']->profile_image ?>" class="profile_image"/></a></div>
              <span class="stat"></span> 
              <input type="hidden" id="current_image" value="{user_info} {user_image} {/user_info}" />
            </div>
            <h3><?php //echo $this->session->userdata('user_name'); ?><?php echo $otheruserInfo['basic_info']->name; ?></h3>
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
            <div class="chatWrapper" id="divscroll"><!-- id="divscroll" -->
                <div id="msgID"><!-- id="msgID" -->
                    <!--chat 1 -->
                    {user_info}  {msghistory}                  
                      <div class="chat-rht-sec {className} chat_message_{id}" id="res" rel="{id}">
                          <div class="chat-back-img"> <!--<span style="background:url({profileImage}) no-repeat center top; background-size:cover;"></span>-->
                          <a href="<?php echo base_url() ?>public-profile/{profile_id}">
                          <img src="{profileImage}" class="profile_image" /></a>

                          <div class="chat-back-sec">
                            <p class="single_name">{name}</p>
                            <span class='single_date' style='display:none'>{date_time}</span>
                            <div class="cap deleted_message{deleted}" rel="message-{id}">
                                  <!--<p class="message_contentv">{message_content}</p><a href="<?= base_url().'uploads/messages/' ?>{attachement}">{attachFile}{download}</a>-->
                            <p class="message_content">{message_content}</p>
                            <a class="attachement-uploded noattach_{code}" href="<?= base_url().'User/download_file/' ?>{code}">{download} 
                              <i class="download fa fa-arrow-down"></i>
                              <i class="show-check downloaded fa fa-check" style="display:none;"></i>
                            </a>
                            </div>
                            <div class="cap2 remove_date{deleted}">{date_time}{readicon}</div>
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
    <div id="attchmentpreview"></div>
      <form class="Wrapper" action="<?= base_url('user/saveMsgData'); ?>" method="post" enctype="multipart/form-data">
        <textarea name="msg2" class="form-control typing_msg" id="msg" placeholder="Type here..." cols="20"></textarea>
        <!--<input type="text" class="form-control typing_msg" name="msg" id="msg" placeholder="Type here...">-->
        <input type="hidden" name="user_to" value="<?= $this->uri->segment(2) ?>">
        <div class="upload-btn-wrappe">
          <input name="uploadFiles[]" multiple="multiple" type="file" id="uploadfile" autocomplete="off" />
          <div class="uploadButton"></div>
        </div>
    <input type="hidden" name="message_id" value="0" />
        <input class="send_msg" name="" type="submit" value="Send">
    <br/>
    <div id="type_message">
      <!--<div class="ticontainer">
        <div class="tiblock">
        <div class="tidot"></div>
        <div class="tidot"></div>
        <div class="tidot"></div>
        </div>
     </div>-->
    </div>  
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

</div>

<ul class="custom-right-menu" data-attr="<?php echo $this->session->userdata('user_id'); ?>">
  <li data-action="edit">Edit</li>
  <li data-action="delete">Delete</li>
  <li data-action="quote">Quote</li>
</ul>

<ul class="custom-left-menu" data-attr="<?php echo $this->session->userdata('user_id'); ?>">
  <li data-action="quote">Quote</li>
</ul>
<span id="visibility" rel="0"></span>
<span id="page_load" rel="1"></span>
<span id="currently_typing" rel="0"></span>
<?php
$date = date('d/m/Y H:i A');
$name = $this->session->userdata('user_name');
$profile_url = base_url().'public-profile/'.$this->session->userdata('profile_id');
//$user_msg_html = "<div class='chat-rht-sec chat-rht-other' id='res'><div class='chat-back-img'><span style='background:url({user_info} {user_image} {/user_info} ) no-repeat center top; background-size:cover;'></span><div class='chat-back-sec'><div class='cap deleted_message0' rel='message-0'><p class='message_contentv'>[MESSAGE_CONTENT]</p>[ATTACHMENT]</div><div class='cap2 remove_date0'>$date</div></div></div></div>";
$user_msg_html = "<div class='chat-rht-sec chat-rht-other chat_new' id='res'><div class='chat-back-img'><a href='$profile_url'><img src={user_info} {user_image} {/user_info} class='profile_image'></a><div class='chat-back-sec'><p class='single_name'>$name</p><div class='cap deleted_message0' rel='message-0'><p class='message_contentv'>[MESSAGE_CONTENT]</p>[ATTACHMENT]</div><div class='cap2 remove_date0'>$date</div></div></div></div>";
$user_msg_html2 = "<div class='chat-rht-sec chat-rht-other chat-rht-other-remove chat_new' id='res'><div class='chat-back-img'><a href='$profile_url'><img src={user_info} {user_image} {/user_info} class='profile_image'></a><div class='chat-back-sec'><p class='single_name'>$name</p><div class='cap deleted_message0' rel='message-0'><p class='message_contentv'>[MESSAGE_CONTENT]</p>[ATTACHMENT]</div><div class='cap2 remove_date0'>$date</div></div></div></div>";
?>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.visible.min.js"></script>
<script src="https://cdn.tiny.cloud/1/rzset1ozumcl232vpuh2ctlwzaslo3ys33l3wa4clelmcov5/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.js"></script>
<script>
    (function($){
      
        
         
                
     
        
      
    })(jQuery);
  </script>
<script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
    automatic_uploads: false,
    /**file_picker_types: 'file image media',
    file_picker_callback: function(callback, value, meta) {
    // Provide file and text for the link dialog
    if (meta.filetype == 'file') {
      callback('mypage.html', {text: 'My text'});
    }

    // Provide image and alt text for the image dialog
    if (meta.filetype == 'image') {
      callback('myimage.jpg', {alt: 'My alt text'});
    }

    // Provide alternative source and posted for the media dialog
    if (meta.filetype == 'media') {
      callback('movie.mp4', {source2: 'alt.ogg', poster: 'image.jpg'});
    }
  },**/
    setup: function(ed) 
    { 
    ed.on('keydown', function(e) {if(e.code == 'Enter' || e.code == 'NumpadEnter') {e.preventDefault;$(".send_msg").trigger('click');} }); 
    ed.on('keyup', function(e) { if(e.code != 'Enter' && e.code != 'NumpadEnter') typing_msg() });
    }
   });
  </script>
  
<script>
  $(document).ready(function() { 
  
    $('body').keydown(function(e){ 
	  if(e.which == '13') {e.preventDefault;$(".send_msg").trigger('click');}
	});
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
   
  /**$("#divscroll").animate({
    scrollTop: $('#divscroll')[0].scrollHeight - $('#divscroll')[0].clientHeight
  }, 0);**/ 
  }); 
  $("#uploadfile").change(function() {
    //var files = $('.upload')[0].files;
    var files = $(this)[0].files;
    console.log(files)
    $("#attchmentpreview").text("");
  
    for (var i = 0; i < files.length; i++) {
      //$(this).parent().parent().prev("#attchmentpreview").append('<ul><li>' + files[i].name + '</li></ul>');
  $("#attchmentpreview").append('<ul><li>' + files[i].name + '</li></ul>');     
  tinymce.get("msg").focus();  
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
          //  alert($(".badge2").text())
      });
  };
  setInterval(last_seen_ajax_call, 1000, '<?php echo $user_id_to;?>');

  var message_ajax_call = function(user_id=0) {
      // alert();
	  var last_message = $('.chat-rht-sec:not(.chat_new):last').attr('rel');
      $.ajax({
          method: "POST",
          url: "<?php echo base_url(); ?>User/get_unloaded_messages/"+user_id,
          data: {last_message:last_message}
      }).done(function(msg) {
 
    //$("#msgID").html(msg);
      // check visibility and scroll to unread message
	  if($("#page_load").attr('rel') == 1)
		  {
			$("#msgID").append(msg);
			$("#page_load").attr('rel',0);
		  }	
      check_messages_visibility(msg);
      
          //$(".badge2").html(msg);res
          //  alert($(".badge2").text())
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
          //  alert($(".badge2").text())
      });
  };
  setInterval(frndlist_ajax_call, 8000, '<?php echo $user_id_to;?>');
  var scroll_messages_call = function(user_id=0) {
	  scroll_messages();
   };
  setInterval(scroll_messages_call, 1000, '<?php echo $user_id_to;?>');
  
  /**function check_messages_visibility(html_msg)
  {
    var user_id = "<?php echo $this->session->userdata('user_id'); ?>";
  var user_to =  $('[name=user_to]').val();  
  $.ajax({
          method: "POST",
          url: "<?php echo base_url(); ?>User/check_messages_visibility/"+user_id + "/" + user_to,
          data: {}
      }).done(function(msg) {
      var t = $("#visibility").attr('rel');
      $("#msgID").html(html_msg);
      if(msg > 0 && t == 1)
      {
      $("#divscroll").animate({
           scrollTop: $('#divscroll')[0].scrollHeight + $('#divscroll')[0].clientHeight
     }, 0);
      }       

      }); 
  }**/
  
  function check_messages_visibility(html_msg)
  {
    var user_id = "<?php echo $this->session->userdata('user_id'); ?>";
	var user_to =  $('[name=user_to]').val();  
	$.ajax({
          method: "POST",
          url: "<?php echo base_url(); ?>User/check_messages_visibility/"+user_id + "/" + user_to,
          data: {}
      }).done(function(msg) {
		  var t = $("#visibility").attr('rel');
		  var k = $('.chat-rht-sec').length;
		  var d = jQuery.parseJSON(msg);
		  //alert(k);alert(d.count);
		  console.log(k + " " + d.count);
		  if(k != d.count)
		  {
			$("#msgID").append(html_msg);
			/**$("#divscroll").animate({
	         scrollTop: $('#divscroll')[0].scrollHeight + $('#divscroll')[0].clientHeight
		 }, 0);**/
		 $(".chatWrapper").mCustomScrollbar({
            theme:"minimal-dark",
        }).mCustomScrollbar("scrollTo","bottom",{scrollInertia:0});
		  }	else {
		    if($('.chat_new').length > 0 || $("#currently_typing").attr('rel') == 2) {
			 $('.chat_new').each(function(){
			   $(this).addClass('xcvxcb');	 
			   $(this).remove();
			 });;
			 $("#msgID").append(html_msg);
			 $("#currently_typing").attr('rel',0);
             $(".chatWrapper").mCustomScrollbar({
            theme:"minimal-dark",
        }).mCustomScrollbar("scrollTo","bottom",{scrollInertia:0}); 
			}
			for(var i=0;i<d.status.length;i++)
			{
			  var cls = d.status[i];
			  $('.'+cls).find('.cap2').html(d.dates[i] + '<i class="fa fa-check"></i>');	
			}
			
			for(var i=0;i<d.downloaded.length;i++)
			{
			  var cls = d.downloaded[i];
			  $('.'+cls).find('.downloaded').removeClass('hide-check').addClass('show-check');
			  $('.'+cls).find('.downlaod').removeClass('show-check').addClass('hide-check');		
			}
			
		  }			  

      }); 
  }
  
  
  
</script>

<script type="text/javascript">
 $(function(){ 
   $(".chatWrapper").mCustomScrollbar({
            theme:"minimal-dark",
        }).mCustomScrollbar("scrollTo","bottom",{scrollInertia:0});
		
   $('.ChatPanel').on("contextmenu", '.chat-rht-other .cap,.chat-rht-other-remove .cap',function (event) {
    
    // Avoid the real one
    if(!$(this).hasClass('deleted_message1'))
  { 
  event.preventDefault();
  $('.custom-right-menu').attr('rel',$(this).attr('rel'));
  //alert($(".custom-right-menu").attr('data-attr'));
    // Show contextmenu
    $(".custom-right-menu").finish().toggle(100).
    
    // In the right position (the mouse)
    css({
        top: event.pageY + "px",
        left: event.pageX + "px"
    });
  }
});


$('.ChatPanel').on("contextmenu", '.chat-rht-sec:not(.chat-rht-other) .cap',function (event) {
  // Avoid the real one
   
    if(!$(this).hasClass('deleted_message1') && !$(this).closest('.chat-rht-sec').hasClass('chat-rht-other-remove'))
  {  
  event.preventDefault();
  $('.custom-left-menu').attr('rel',$(this).attr('rel'));
  //alert($(".custom-right-menu").attr('data-attr'));
    // Show contextmenu
    $(".custom-left-menu").finish().toggle(100).
    
    // In the right position (the mouse)
    css({
        top: event.pageY + "px",
        left: event.pageX + "px"
    });
  }
});

// If the document is clicked somewhere
$(document).bind("mousedown", function (e) {
    
    // If the clicked element is not the menu
    if (!$(e.target).parents(".custom-right-menu").length > 0) {
        
        // Hide it
        $(".custom-right-menu").hide(100);
    $('.custom-right-menu').removeAttr('rel');
    }
});

// If the document is clicked somewhere
$(document).bind("mousedown", function (e) {
    
    // If the clicked element is not the menu
    if (!$(e.target).parents(".custom-left-menu").length > 0) {
        
        // Hide it
        $(".custom-left-menu").hide(100);
    $('.custom-left-menu').removeAttr('rel');
    }
});


// If the menu element is clicked
$(".custom-right-menu li").click(function(){
    
    // This is the triggered action name
  var user_id = $(".custom-right-menu").attr('data-attr');
  var message = $(".custom-right-menu").attr('rel').split('-');
  var message_id = message[1];
    switch($(this).attr("data-action")) {
        // A case for each action. Your actions here
        case "edit": 
     var msg = $("[rel=message-"+ message_id + "]").find('.submit_wrap').html();
     msg = msg.replace('Edit','');
     msg = msg.replace('Delete','');
     msg = msg.replace('Quote','');
     msg = msg.replace("''","");
     msg = msg.trim();
     //tinymce.get("msg").setContent(msg);
	 tinyMCE.execCommand('mceInsertContent',false, msg);
     $('[name=message_id]').val(message_id);
    break;
        case "delete": 
		typing_msg2();
     $.ajax({
          method: "POST",
          url: "<?php echo base_url(); ?>User/delete_message/" + user_id + "/" + message_id,
          data: {}
         }).done(function(data) {
           var d = jQuery.parseJSON(data); 
       if(d.status == '1') {
       $(".custom-right-menu").removeAttr('rel');
       $("[rel=message-"+ message_id + "]").html('<p>Message deleted</p>');
       $("[rel=message-"+ message_id + "]").addClass('deleted_message1');
       
       $("[rel=message-"+ message_id + "]").closest('.chat-back-sec').find('.cap2').remove();
	   setTimeout(function(){ remove_chat_seesion(); }, 1000);
       }
           else
       alert('Problem in deleting message');  
        }); 
    break;
        case "quote":  
     var n = $("[rel=message-"+ message_id + "]").closest('.chat-back-sec').find('.single_name').text();
     var msg = "<div class='Edit Delete Quote' style='opacity:0.5;background:none' contenteditable='false'>''" + $("[rel=message-"+ message_id + "]").find('.submit_wrap').text();
     msg = msg.replace('Edit','');
     msg = msg.replace('Delete','');
     msg = msg.replace('Quote','');
     var d = $("[rel=message-"+ message_id + "]").closest('.chat-back-sec').find('.single_date').text();
     //$('.typing_msg').val(msg);
     msg += "<br/><br/>" + n + " " + d;
     msg += "<hr/></div><br/>";
     //tinymce.get("msg").setContent(msg);
	 //tinymce.get("msg").focus();
	 //tinymce.activeEditor.focus();
	 tinyMCE.execCommand('mceInsertContent',false, msg);
     $('[name=message_id]').val(0);
     $(".custom-right-menu").hide(100);
     break;
    }
  
    // Hide it AFTER the action was triggered
    $(".custom-right-menu").hide(100);
  });
  
  
  // If the menu element is clicked
$(".custom-left-menu li").click(function(){
    
    // This is the triggered action name
  var user_id = $(".custom-left-menu").attr('data-attr');
  var message = $(".custom-left-menu").attr('rel').split('-');
  var message_id = message[1];
    switch($(this).attr("data-action")) {
        case "quote":  
     var n = $("[rel=message-"+ message_id + "]").closest('.chat-back-sec').find('.single_name').text();
     var msg = "<div style='opacity:0.5;background:none' contenteditable='false'>''" + $("[rel=message-"+ message_id + "]").find('.submit_wrap').text();
     msg = msg.replace('Quote','');
     var d = $("[rel=message-"+ message_id + "]").closest('.chat-back-sec').find('.single_date').text();
     //$('.typing_msg').val(msg);
     msg += "<br/><br/>" + n + " " + d;
     msg += "<hr/></div><br/>";
     //tinymce.get("msg").setContent(msg);
	 tinyMCE.execCommand('mceInsertContent',false, msg);
     $('[name=message_id]').val(0);
     break;
    }
  
    // Hide it AFTER the action was triggered
    $(".custom-left-menu").hide(100);
  })

   /**$('.typing_msg').keyup(function(){
    var user_id = "<?php echo $this->session->userdata('user_id'); ?>";
    var user_to =  $('[name=user_to]').val();
    if($(this).val() != "")
    var url = "<?php echo base_url(); ?>User/type_message/" + user_id + "/" + user_to;
      else
    var url = "<?php echo base_url(); ?>User/remove_chat_session/" + user_id + "/" + user_to;  
      $.ajax({
          method: "POST",
          url: url,
          data: {}
         }).done(function(data) {

        });
   });
   **/
   
   
   
   
   
   
   
   var chat_session_call = function(user_id=0) {
      // alert();
    var user_id = "<?php echo $this->session->userdata('user_id'); ?>";
    var user_to =  $('[name=user_to]').val();
      $.ajax({
          method: "POST",
          url: "<?php echo base_url(); ?>User/fetch_chat_session/" + user_to + "/" + user_id,
          data: {}
      }).done(function(msg) {
        if(msg == "1") {
          $("#type_message").html("<?php echo $otheruserInfo['basic_info']->name ?> is typing..");
          $("#currently_typing").attr('rel',1);
		}
      if(msg == "0") {
          $("#type_message").html("");
		  if($("#currently_typing").attr('rel') == 1)
			$("#currently_typing").attr('rel',2);  
	  }
      });
  };
  setInterval(chat_session_call, 1000, '<?php echo $user_id_to;?>');
  
  
  var login_session_call = function(user_id=0) {
    var user_to =  $('[name=user_to]').val();
      $.ajax({
          method: "POST",
          url: "<?php echo base_url(); ?>User/fetch_login_session/" + user_to,
          data: {}
      }).done(function(msg) {
        if(msg == "l")
          $(".ImgHldrWrapper").addClass('ActivePfl');
      else
          $(".ImgHldrWrapper").removeClass('ActivePfl');
      });
  };
  setInterval(login_session_call, 1000, '<?php echo $user_id_to;?>');
  
  
  /**$(".send_msg").click(function(){
  var user_id = "<?php echo $this->session->userdata('user_id'); ?>";
  var user_to =  $('[name=user_to]').val();  
  //var msg = $('.typing_msg').val();
  var msg = tinymce.get("msg").getContent();
  var img = $("#current_image").val();
  var msg_id = $('[name=message_id]').val();
    //$('.typing_msg').val(''); 
  tinymce.get("msg").setContent('');
  var h = "<?php echo $user_msg_html ?>";
  h = h.replace("[MESSAGE_CONTENT]", msg);
  $("#msgID").append(h);
  $("#divscroll").animate({
        scrollTop: $('#divscroll')[0].scrollHeight - $('#divscroll')[0].clientHeight
     }, 0);
     
  $.ajax({
          method: "POST",
          url: "<?php echo base_url(); ?>User/add_ajax_message/" + user_id + "/" + user_to,
          data: {message_id:msg_id,msg:msg,user_to:user_to}
      }).done(function(msg) {
          $('[name=message_id]').val(0);
      });  
    return false;
  });**/
  
  
  $(".send_msg").click(function(e){
  $('.Wrapper').submit();
  return false;
  });
  
  
  $(".ChatBtnDiv").on("submit",".Wrapper",function(e){  
    e.preventDefault();
  var user_id = "<?php echo $this->session->userdata('user_id'); ?>";
  var user_to =  $('[name=user_to]').val(); 
  var msg = tinymce.get("msg").getContent();
  msg = msg.trim();
  if(msg == "" && ($("#attchmentpreview").find('li').html() == "" || $("#attchmentpreview").find('li').html() == undefined)) {
     tinymce.get("msg").setContent("");
	 return false;
  }	 
  var img = $("#current_image").val();
  var msg_id = $('[name=message_id]').val();
  tinymce.get("msg").setContent('');
  var h = "<?php echo $user_msg_html ?>";
  h = h.replace("[MESSAGE_CONTENT]", msg);

  if($("#attchmentpreview").find('li').html() != "" && $("#attchmentpreview").find('li').html() != undefined)
  {
  //var h1 = "<a href=\"javascript:void(0)\" class='download_file' rel='" + $('#attchmentpreview').find('li').html()+ "'>" + "Download" + "</a>";
  var h = "<?php echo $user_msg_html2 ?>";
  h = h.replace("[MESSAGE_CONTENT]", msg);
  switch($('#attchmentpreview').find('li').text().split('.').pop().toLowerCase())
  {
	  case "pdf":
	   var u = '<?php echo base_url() ?>' + '/assets/image/Pdf_File_Type.png';
	   var img = "<img src='" + u + "' alt='' class='mCS_img_loaded' width='50'>";
	  break;
	  
	  case "doc":
	  case "docx":
	  case "rtf":
	   var u = '<?php echo base_url() ?>' + '/assets/image/MicrosoftOffice2007.png';
	   var img = "<img src='" + u + "' alt='' class='mCS_img_loaded' width='50'>";
	  break;
	  
	  case "xls":
	  case "xlsx":
	   var u = '<?php echo base_url() ?>' + '/assets/image/xlss.png';
	   var img = "<img src='" + u + "' alt='' class='mCS_img_loaded' width='50'>";
	  break;
	  
	  case "txt":
	   var u = '<?php echo base_url() ?>' + '/assets/image/notepad-icon.png';
	   var img = "<img src='" + u + "' alt='' class='mCS_img_loaded' width='50'>";
	  break;
	  
	  case "psd":
	   var u = '<?php echo base_url() ?>' + '/assets/image/PSD-icon.png';
	   var img = "<img src='" + u + "' alt='' class='mCS_img_loaded' width='50'>";
	  break;
	  
	  case "zip":
	   var u = '<?php echo base_url() ?>' + '/assets/image/ZIP-icon.png';
	   var img = "<img src='" + u + "' alt='' class='mCS_img_loaded' width='50'>";
	  break;
	  
	  
	  case "mp4":
	   var u = '<?php echo base_url() ?>' + '/assets/image/MV4-icon.png';
	   var img = "<img src='" + u + "' alt='' class='mCS_img_loaded' width='50'>";
	  break;
	  
	  case "ai":
	   var u = '<?php echo base_url() ?>' + '/assets/image/AI-icon.png';
	   var img = "<img src='" + u + "' alt='' class='mCS_img_loaded' width='50'>";
	  break;
	  
	  default:
	   var u = '<?php echo base_url() ?>' + '/assets/image/File_Image.png';
	   var img = "<img src='" + u + "' alt='' class='mCS_img_loaded' width='50'>";
	  break;
	  

  }
  var random = Math.floor(Math.random() * (10000 - 1) + 1);
  var time = $.now();
  var code = user_id + user_to + random + time;
  var b = '<?php echo base_url() ?>' + 'User/download_file/' + code;
  var h1 = "<a class='attachement-uploded' href='" + b + "'>" +$('#attchmentpreview').find('li').text() + img + " <i class=\"show-check downlaod fa fa-arrow-down\"></i></a>";
  h = h.replace("[ATTACHMENT]",h1);
  }
  h = h.replace("[ATTACHMENT]","");
  var msg2 = msg;
  msg = "<div class='submit_wrap'>" + msg + "</div>";
  if(msg_id == 0)
  $("#msgID").append(h);
  else
	{
	  var r = "message-" + msg_id;	
	  $("[rel='"+r+"']").find('.submit_wrap').html(msg2);
	}	
  $('[name=msg2]').val(msg);
  $("#attchmentpreview").text("");
  tinymce.get("msg").setContent("");
  /**$("#divscroll").animate({
        scrollTop: $('#divscroll')[0].scrollHeight - $('#divscroll')[0].clientHeight
     }, 0);**/
	$(".chatWrapper").mCustomScrollbar({
            theme:"minimal-dark",
        }).mCustomScrollbar("scrollTo","bottom",{scrollInertia:1});
  $.ajax({
    url: "<?php echo base_url(); ?>User/add_ajax_message/" + user_id + "/" + user_to + "/" + code,
    type: "POST",
    data:  new FormData(this),
    contentType: false,
    cache: false,
    processData:false,
    success: function(data){
      $('[name=message_id]').val(0);
      var $el = $('#uploadfile');
      $el.wrap('<form>').closest('form').get(0).reset();
      $el.unwrap();
	  tinymce.get("msg").setContent("");
     },
    error: function(){}           
    });
  });
   
 });
</script>

<script type='text/javascript'>
 
 var count = 0;
 var screenInterval;
 // Active
 window.addEventListener('focus', startTimer);

 // Inactive
 window.addEventListener('blur', stopTimer);
 
 function timerHandler() {
  //count++;
  //document.getElementById("seconds").innerHTML = count;
 }

 // Start timer
 function startTimer() {
  console.log('focus');
  //screenInterval = window.setInterval(timerHandler, 1000);
  $('#visibility').attr('rel',1);
  //scroll_messages();
 }

 // Stop timer
 function stopTimer() {
  //window.clearInterval(screenInterval);
  $('#visibility').attr('rel',0);
  //remove_chat_seesion();
 }
</script>


<script type='text/javascript'>
var vis = (function(){
    var stateKey, eventKey, keys = {
        hidden: "visibilitychange",
        webkitHidden: "webkitvisibilitychange",
        mozHidden: "mozvisibilitychange",
        msHidden: "msvisibilitychange"
    };
    for (stateKey in keys) {
        if (stateKey in document) {
            eventKey = keys[stateKey];
            break;
        }
    }
    return function(c) {
        if (c) document.addEventListener(eventKey, c);
        return !document[stateKey];
    }
})();


vis(function(){
  if(vis()) {
  $('#visibility').attr('rel',1);
  scroll_messages();
  }
  else {
  $('#visibility').attr('rel',0);  
    //remove_chat_seesion();
  }
});
</script>


<script type="text/javascript">
  $( "#divscroll" ).scroll(function() {
   scroll_messages();   
   
});



function scroll_messages()
{
  var user_id = "<?php echo $this->session->userdata('user_id'); ?>";
  var user_to =  $('[name=user_to]').val();  
  var ids = [];
   var count = -1;
   $(".chat-rht-sec:not(.chat-rht-other)").each(function(i){
   //if($(this).visible() && !$(this).hasClass('chat-rht-other-remove') && $('#visibility').attr('rel') == 1)
   if(!$(this).hasClass('chat-rht-other-remove') && $('#visibility').attr('rel') == 1)	   
   {
	 count++;
     ids[count] = $(this).attr('rel');     
   }     
   });
   
   
   
   if(ids.length > 0)
   {    
   var u = ids.join(','); 
   $.ajax({
          method: "POST",
          url: "<?php echo base_url(); ?>User/update_message_seen_status/" + user_id + "/" + user_to,
          data: {ids:u}
      }).done(function(msg) {
        
   });
   }  
}


function remove_chat_seesion()
{
  var user_id = "<?php echo $this->session->userdata('user_id'); ?>";
  var user_to =  $('[name=user_to]').val();  
  var url = "<?php echo base_url(); ?>User/remove_chat_session/" + user_id + "/" + user_to;  
      $.ajax({
          method: "POST",
          url: url,
          data: {}
         }).done(function(data) {

        });
}


 function typing_msg() { 
  var user_id = "<?php echo $this->session->userdata('user_id'); ?>";
    var user_to =  $('[name=user_to]').val();
    var v = tinymce.get("msg").getContent();
    if(v != "")
    var url = "<?php echo base_url(); ?>User/type_message/" + user_id + "/" + user_to;
      else
    var url = "<?php echo base_url(); ?>User/remove_chat_session/" + user_id + "/" + user_to;  
      $.ajax({
          method: "POST",
          url: url,
          data: {}
         }).done(function(data) {

        });   
   
   }
   
   function typing_msg2() { 
	var user_id = "<?php echo $this->session->userdata('user_id'); ?>";
	  var user_to =  $('[name=user_to]').val();
		var url = "<?php echo base_url(); ?>User/type_message/" + user_id + "/" + user_to;
      $.ajax({
          method: "POST",
          url: url,
          data: {}
         }).done(function(data) {

        });   
   
   }
   
   $(window).on("blur focus", function(e) {
    var prevType = $(this).data("prevType");

    if (prevType != e.type) {   //  reduce double fire issues
        switch (e.type) {
            case "blur":
			    //document.title = "asfsd";
				$('#visibility').attr('rel',0);
                break;
            case "focus":
			//document.title = "try";
                $('#visibility').attr('rel',1);
                break;
        }
    }

    $(this).data("prevType", e.type);
});

$(window).mouseenter(function(){
  $('#visibility').attr('rel',1);
});	

$(window).mouseleave(function(){
  $('#visibility').attr('rel',0);
});	
   
  /**$('#msgID').on('click','.download_file',function(){
     var t = $(this).attr('rel');
   var url = "<?php echo base_url(); ?>User/download_file/";
   $.ajax({
          method: "POST",
          url: url,
          data: {file:t}
         }).done(function(data) {

        });
  });**/
</script>




