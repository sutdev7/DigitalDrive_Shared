<!-- Content Wrapper. Contains page content -->
<?php //echo "<pre>";print_r($user_message); echo "</pre>";die; ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.css"/>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Chart List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Chart List</li>
                    </ol>
            </div>
            <!-- /.col -->
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
   </div>
   <!-- /.content-header -->
   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <!-- Small boxes (Stat box) -->
         <div class="row">
            <div class="col-12">
               <div class="container">
                     <h3 class=" text-center Messaging">Messaging</h3>
                     <div class="messaging" style="display:none;">
                        <div class="inbox_msg">
                           <div class="inbox_people">
                              <div class="headind_srch">
                                 <div class="recent_heading">
                                    <h4>Recent</h4>
                                 </div>
                                 <div class="srch_bar">
                                    <div class="stylish-input-group">
                                       <input type="text" class="search-bar"  placeholder="Search" >
                                       <!--<span class="input-group-addon">
                                       <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                                       </span> -->
                                    </div>
                                 </div>
                              </div>
                              <div class="inbox_chat">
                  <?php if ( isset($user_message) && !empty($user_message)) { 
                      $count = 1;
                    //dd($user_message);die;
                    foreach ($user_message as $key => $row) { 
                    
                    $user_profile_image = $row['profile_image'];
                            if(empty($user_profile_image)) {
                              $user_profile_image = base_url('assets/img/no-image.png');
                            }
                            else {
                              $user_profile_image = base_url($user_profile_image);          
                            } 
                    ?>
                       <div class="chat_list <?php if($row['user_id'] ==  $this->uri->segment('3')) echo 'active_chat' ?>">
                        <div class="chat_people">
                           <div class="chat_img"> 
                                          <a href="<?php echo base_url()."public-profile/".$row['profile_id'] ?>"><img src="<?php echo $user_profile_image; ?>" alt="<?= $row['name'] ?>" title="View profile Details">
										    
                                            <?php if($row['login_session'] == 'l') :?>
												<i class="online"></i>
											<?php else : ?>
												<i class="offline"></i>	
											<?php endif; ?>
                                          </a>
                      <?php if($row['totalmessage'] > 0) : ?>
                                          <span class="msg-count"><?= $row['totalmessage'] ?></span>
                      <?php endif; ?>
                                       </div>
                           <div class="chat_ib">
                            <h5> <a href="<?= base_url() ?>admin/view-messages/<?php echo $row['user_id']; ?>" title="View Messages"><?= $row['name'] ?> <span class="chat_date"> (<?php if ($row['user_type'] == 3) {
                                  echo 'client';
                                } else if ($row['user_type'] == 4) {
                                  echo 'freelancer';
                                }
                              ?>) </a>
                                          </h5>
                           </div>
                        </div>
                       </div>
                    <?php $count++;
                                        } } ?>
               
                   
                              </div>
                           </div>
                           <div class="mesgs" >
                              <div class="msg_history" id="divscroll">
                  <?php if ( isset($messages) && !empty($messages)) { ?>
                    <?php $count = 1;
                                        foreach ($messages as $key => $row) { 
                    //dd( $row->date_time);die;
                    if(!empty($row->attachement)) {
                    if(strstr($row->attachement,".jpg")==".jpg" || strstr($row->attachement,".png")==".png")
                    {
                      $path='<img src="'.base_url().'uploads/messages/'.$row->attachement.'">';
                      $attachement = $path.'';
                    }
                    elseif(strstr($row->attachement,".pdf")==".pdf")
                    {
                      $pdf_path = base_url().'assets/image/Pdf_File_Type.png';
                      $attachement = $row->attachment_original_name." <img src='$pdf_path' alt='' width='50'>";
                    }
                    elseif(strstr($row->attachement,".doc")==".doc" || strstr($row->attachement,".docx")==".docx" || strstr($row->attachement,".rtf")==".rtf")
                    {
                      $doc_path = base_url().'assets/image/MicrosoftOffice2007.png';
                      $attachement = $row->attachment_original_name." <img src='$doc_path' alt='' width='50'>";
                    }
                    elseif(strstr($row->attachement,".xls")==".xls" || strstr($row->attachement,".xlsx")==".xlsx")
                    {
                      $doc_path = base_url().'assets/image/xlss.png';
                      $attachement = $row->attachment_original_name." <img src='$doc_path' alt='' width='50'>";
                    }
                    elseif(strstr($row->attachement,".txt")==".txt")
                    {
                      $doc_path = base_url().'assets/image/notepad-icon.png';
                      $attachement = $row->attachment_original_name." <img src='$doc_path' alt='' width='50'>";
                    }
                    elseif(strstr($row->attachement,".psd")==".psd")
                    {
                      $doc_path = base_url().'assets/image/PSD-icon.png';
                      $attachement = $row->attachment_original_name." <img src='$doc_path' alt='' width='50'>";
                    }
                    elseif(strstr($row->attachement,".zip")==".zip" || strstr($row->attachement,".rar")==".rar")
                    {
                      $doc_path = base_url().'assets/image/ZIP-icon.png';
                      $attachement = $row->attachment_original_name." <img src='$doc_path' alt='' width='50'>";
                    }
                    elseif(strstr($row->attachement,".mp4")==".mp4")
                    {
                      $doc_path = base_url().'assets/image/MV4-icon.png';
                      $attachement = $row->attachment_original_name." <img src='$doc_path' alt='' width='50'>";
                    }
                    elseif(strstr($row->attachement,".ai")==".ai")
                    {
                      $doc_path = base_url().'assets/image/AI-icon.png';
                      $attachement = $row->attachment_original_name." <img src='$doc_path' alt='' width='50'>";
                    }
                    else{
                      $file_path = base_url().'assets/image/File_Image.png';
                      $attachement = $row->attachment_original_name." <img src='$file_path' alt='' width='50'>";
                    }
                    }
                    if($row->is_read == "Y")
                     $readicon = '<i class="fa fa-check"></i>';
                    else
                     $readicon = "";    
                    if($row->user_id_to ==  $this->session->userdata('user_id')){
                           $user_profile_image = $row->profile_image;
                            if(empty($user_profile_image)) {
                              $user_profile_image = base_url('assets/img/no-image.png');
                            }
                            else {
                              $user_profile_image = base_url($user_profile_image);          
                            }  
                    
                                  
          
                    ?>
                                 <div class="chat_msg incoming_msg" rel="<?php echo $row->id; ?>">
                                    <div class="Profile-pic"> 
                                       <a href="<?php echo base_url()."/public-profile/".$row->profile_id ?>"><img src="<?php echo $user_profile_image; ?>" alt="<?= $row->name ?>"></a> 
                                    </div>
                           <p class='single_name'><?= $row->name ?></p>                                    
                                    <div class="message-wrap received_msg deleted_message<?php echo $row->deleted ?>" rel="message-<?php echo $row->id; ?>">
                           <!-- <p class='single_name'><?= $row->name ?></p> -->                           
                                       <div class="received_withd_msg">
                                          <p class="Message-Deleted"><?= trim(($row->deleted == 1) ? "Message Deleted" : $row->message_content); ?>
                                          </p>
                               <?php if(!empty($row->attachement)) : ?>
                               <a class="file-attache" href="<?= base_url().'User/download_file/' ?><?php echo $row->download_code ?>">
                                          <div class="attache-file"><?php echo $attachement ?></div> <div class="Downloaded-action"><i class="fas fa-arrow-down"></i></div></a>
                               <?php endif; ?>
                                       </div>
                                    </div>
                                    <p class='single_date' style="display:none"><?php echo date("F j, Y", strtotime($row->date_time)) ;?></p>
                                    <span class="cap2 time_date"> <?php echo date("h:i a", strtotime($row->date_time)) ;?> |  <?php echo date("F j, Y", strtotime($row->date_time)) ;?> </span>
                                 </div>

                    <?php }else{ $current_user_name = $row->name; ?>

                        <div class="chat_msg outgoing_msg chat_message_<?= $row->id ?>" rel="<?php echo $row->id; ?>">
                                    <div class="Profile-pic"> 
                                       <a href="<?php echo base_url()."/public-profile/".$row->profile_id ?>"><img src="<?php echo $user_profile_image; ?>" alt="<?= $row->name ?>"></a> 
                                    </div>
                                    <p class='single_name'><?= $row->name ?></p>  
                           <div class="message-wrap sent_msg deleted_message<?php echo $row->deleted ?>" rel="message-<?php echo $row->id; ?>">
                                       <p class="Message-Deleted"><?= trim(($row->deleted == 1) ? "Message Deleted" : $row->message_content); ?></p>
                             <?php if(!empty($row->attachement)) : ?>
                             <a class="file-attache" href="<?= base_url().'User/download_file/' ?><?php echo $row->download_code ?>">
                                          <div class="attache-file"><?php echo $attachement ?></div> <div class="Downloaded-action"><i class="<?php echo ($row->attachment_download_status == 1) ? "hide-check" : "show-check" ?> downlaod fas fa-arrow-down"></i> <i class="<?php echo ($row->attachment_download_status == 1) ? "show-check" : "hide-check" ?> downloaded fas fa-check"></i> </div></a>
                             
                             <?php endif; ?>
                                    </div>
                                    <p class='single_date' style="display:none"><?php echo date("F j, Y", strtotime($row->date_time)) ;?></p>
                                    <span class="cap2 time_date"> <?php echo date("h:i a", strtotime($row->date_time)) ;?> |  <?php echo date("F j, Y", strtotime($row->date_time)) ;?> <?php echo $readicon; ?></span> 
                                 </div>
                    <?php }
                $count++;
                                   } } ?>
                        
                              </div>
                              <div class="type_msg">
                                 <div class="input_msg_write">
                         <form class="form-horizontal" action="<?= base_url()?>admin/replay_user_message/<?php echo isset($user_id) ? $user_id : '' ?>" method="POST" id="grievance_email_form">
                            <input type="hidden" name="user_id" id="user_id" value="<?php echo isset($user_id) ? $user_id : '' ?>" />
                            <input type="hidden" name="email_to"   value="<?= isset($send_mail) ? $send_mail : ''  ?>">
                           <input type="hidden" name="message_id" value="0" />
                                             <!--<input type="text" class="write_msg typing_msg" name="email_body" placeholder="Type a message" />-->
                                       <div id="attchmentpreview"></div>
                                      
                           <textarea name="msg2" class="write_msg typing_msg" id="msg" placeholder="Type a message" ></textarea>
                           <input type="hidden" name="user_to" value="<?= $this->uri->segment(3) ?>">
                           <div class="upload-btn-wrappe">
                                <input name="uploadFiles[]" type="file" id="uploadfile" multiple="multiple"/>
                                <div class="uploadButton"></div>
                           </div>
                           <button class="msg_send_btn typing_msg" type="submit"><span>SEND</span> <i class="fab fa-telegram-plane"></i></button>
                          
                        </form>
						<div id="type_message"></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
            </div>
         </div>
         <div class="row"></div>
         <!-- /.row (main row) -->
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<ul class="custom-right-menu" data-attr="<?php echo $this->session->userdata('user_id'); ?>">
  <li data-action="edit">Edit</li>
  <li data-action="delete">Delete</li>
  <li data-action="quote">Quote</li>
</ul>
<ul class="custom-left-menu" data-attr="<?php echo $this->session->userdata('user_id'); ?>">
  <li data-action="quote">Quote</li>
</ul>
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.js"></script>
 <script>
    (function($){
         jQuery("#divscroll").mCustomScrollbar({
            theme:"minimal-dark",
        }).mCustomScrollbar("scrollTo","bottom",{scrollInertia:0});
         
    })(jQuery);

  </script> 
<span id="visibility" rel="0"></span>
<span id="currently_typing" rel="0"></span>
<?php 
$user_msg_html = "<div class='outgoing_msg'><p class='single_name'>".$current_user_name."</p><p class='single_date' style='display:none'>".date("F j, Y")."</p><div class='sent_msg deleted_message0' rel='message-0'><p>[MESSAGE_CONTENT]</p>[ATTACHMENT]<span class='time_date'>".date("h:i a")." | ". date("F j, Y")."</span></div></div>";
?>
<script>
   (function() {
       $(document).ready(function() {
		  $(".messaging").show();
       });
   
   })();
   
   
   $(function () {
       $("#example1").DataTable();
	   $("#divscroll").animate({
	     scrollTop: $('#divscroll')[0].scrollHeight - $('#divscroll')[0].clientHeight
	   }, 0);
	   $('html, body').animate({
        scrollTop: $(".write_msg").offset().top
    }, 1000);
       
   });
</script>
<style>
  .messaging .inbox_msg .mesgs .msg_history #mCSB_1_container {
    padding-bottom: 40px;
}
   .container{max-width:1170px; margin:auto;}
   img{ max-width:100%;}
   .inbox_people {
   background: #f8f8f8 none repeat scroll 0 0;
   float: left;
   overflow: hidden;
   width: 40%; border-right:1px solid #c4c4c4;
   }
   .inbox_msg {
   border: 1px solid #c4c4c4;
   clear: both;
   overflow: hidden;
   }
   .top_spac{ margin: 20px 0 0;}
   .recent_heading {float: left; width:40%;}
   .srch_bar {
   display: inline-block;
   text-align: right;
   width: 60%; padding:
   }
   .headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}
   .recent_heading h4 {
   color: #05728f;
   font-size: 21px;
   margin: auto;
   }
   .srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
   .srch_bar .input-group-addon button {
   background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
   border: medium none;
   padding: 0;
   color: #707070;
   font-size: 18px;
   }
   .srch_bar .input-group-addon { margin: 0 0 0 -27px;}
   .chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0; position: relative;}
   .chat_ib h5 span{ font-size:13px; float:right;}
   .chat_ib p{ font-size:14px; color:#989898; margin:auto}
   .chat_img {
		float: left;
		width: 11%;
		border-radius: 50%;
		top: 0;
		left: 0;
		display: block;
        overflow: hidden;

   }
   .chat_ib {
   float: left;
   padding: 0 0 0 15px;
   width: 88%;
   }
   .chat_people{ overflow:hidden; clear:both;}
   .chat_list {
   border-bottom: 1px solid #c4c4c4;
   margin: 0;
   padding: 18px 16px 10px;
   }
   .inbox_chat { height: 550px; overflow-y: scroll;}
   .active_chat{ background:#ebebeb;}
   .incoming_msg_img {
   display: inline-block;
   width: 6%;
   top: 0;
   left: 0;
   border-radius: 50%;
   overflow: hidden;
   }
   .received_msg {
   display: inline-block;
   padding: 0 0 0 10px;
   vertical-align: top;
   width: 92%;
   }
   .received_withd_msg p {
   background: #ebebeb none repeat scroll 0 0;
   border-radius: 3px;
   color: #646464;
   font-size: 14px;
   margin: 0;
   padding: 5px 10px 5px 12px;
   width: 100%;
   }
   .time_date {
   color: #747474;
   display: block;
   font-size: 12px;
   margin: 8px 0 0;
   }
   .received_withd_msg { width: 57%;}
   .mesgs {
   float: left;
   padding: 30px 15px 0 25px;
   width: 60%;
   }
   .sent_msg p {
   background: #05728f none repeat scroll 0 0;
   border-radius: 3px;
   font-size: 14px;
   margin: 0; color:#fff;
   padding: 5px 10px 5px 12px;
   width:100%;
   }
   .outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
   .sent_msg {
   float: right;
   width: 46%;
   }
   .input_msg_write input {
   background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
   border: medium none;
   color: #4c4c4c;
   font-size: 15px;
   min-height: 48px;
   width: 100%;
   }
   .type_msg {border-top: 1px solid #c4c4c4;position: relative;}
   .msg_send_btn {
   background: #05728f none repeat scroll 0 0;
   border: medium none;
   border-radius: 50%;
   color: #fff;
   cursor: pointer;
   font-size: 17px;
   height: 33px;
   position: absolute;
   right: 0;
   top: 11px;
   width: 33px;
   }
   .messaging { padding: 0 0 50px 0;}
   .msg_history {
   height: 516px;
   overflow-y: auto;
   }
</style>

<style type="text/css">
 /* The whole thing */
.custom-right-menu,.custom-left-menu {
    display: none;
    z-index: 1000;
    position: absolute;
    overflow: hidden;
    border: 1px solid #CCC;
    white-space: nowrap;
    font-family: sans-serif;
    background: #FFF;
    color: #333;
    border-radius: 5px;
    padding: 0;
}

/* Each of the items in the list */
.custom-right-menu li,.custom-left-menu li {
    padding: 8px 12px;
    cursor: pointer;
    list-style-type: none;
    transition: all .3s ease;
    user-select: none;
}

.custom-right-menu li:hover,.custom-left-menu li:hover {
    background-color: #DEF;
}

.deleted_message1 p{color:#bbb}

.tox-editor-header{display:none;}
.tox-tinymce{width:500px;height:100px !important;}

.input_msg_write input[type="file"] { width:45px; height:60px; border:none; margin:0 20px 0 0; background:url(../../assets/img/icon-img4.png) no-repeat center center; text-indent:-999px; outline:none; cursor:pointer;}
.tox-statusbar{display:none !important;}


/*** 29 dec ***/
.messaging .inbox_msg {
    border: solid 1px #e0e0e0;
    display: flex;
    background: #fff;
}

/** left People list **/
.messaging .inbox_msg .inbox_people {
    width: 100%;
    border: none;
    max-width: 400px;
    position: relative;
    padding-top: 52px;
    background: #fff;
    border-right: solid 1px #e0e0e0;
}
.messaging .inbox_msg .inbox_people .headind_srch .recent_heading {
    display: none;
}
.messaging .inbox_msg .inbox_people .headind_srch {
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    background: #fff;
    padding: 9px 11px;
    border: none;
    border-bottom: solid 1px #ccc;
}
.messaging .inbox_msg .inbox_people .headind_srch .srch_bar {
    width: 100%;
}
.messaging .inbox_msg .inbox_people .headind_srch .srch_bar input.search-bar {
    width: 100%;
    border: none;
    padding: 7px 15px;
    outline: none;
    background: #fff;
    border-radius: 5px;
    font-size: 14px;
}
.messaging .inbox_msg .inbox_people .inbox_chat {
    height: 100%;
    overflow: auto;
    max-height: 630px;
}
.messaging .inbox_msg .inbox_people .inbox_chat .chat_list .chat_img+a {
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
}
.messaging .inbox_msg .inbox_people .inbox_chat .chat_list {
    border: none;
    padding: 17px 20px;
    position: relative;
    transition: all .3s;
    border-bottom: solid 1px #f0f1f6;
}
.messaging .inbox_msg .inbox_people .inbox_chat .chat_list:hover, .messaging .inbox_msg .inbox_people .inbox_chat .chat_list.active_chat {
    background: #f2f2f2;
}
.messaging .inbox_msg .inbox_people .inbox_chat .chat_list .chat_people {
    display: flex;
    justify-content: space-between;
    align-items: center;
    overflow: visible;
}
.messaging .inbox_msg .inbox_people .inbox_chat .chat_list .chat_img {
    width: 40px;
    height: 40px;
    float: none;
    overflow: visible;
}
.messaging .inbox_msg .inbox_people .inbox_chat .chat_list .chat_img a img {
    position: absolute;
    left: 0;
    top: 0;
    border-radius: 50px;
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.messaging .inbox_msg .inbox_people .inbox_chat .chat_list .chat_img a i.online {
    width: 10px;
    height: 10px;
    position: absolute;
    top: 0;
    right: 0;
    background: #34c635;
    border-radius: 20px;
    border: solid 1px #fff;
}
.messaging .inbox_msg .inbox_people .inbox_chat .chat_list .chat_img a i.offline {
    width: 10px;
    height: 10px;
    position: absolute;
    top: 0;
    right: 0;
    background: #aaa;
    border-radius: 20px;
    border: solid 1px #fff;
}
.messaging .inbox_msg .inbox_people .inbox_chat .chat_list .chat_people .chat_ib {
    width: calc(100% - 40px);
    float: none;
}
.messaging .inbox_msg .inbox_people .inbox_chat .chat_list .chat_people .chat_ib h5 a {
    font-size: 16px;
    font-weight: 400;
    color: #313131;
    text-transform: capitalize;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.messaging .inbox_msg .inbox_people .inbox_chat .chat_list.active_chat .chat_people .chat_ib h5 a {
    font-weight: 600;
}


/** right chetroom **/
.messaging .inbox_msg .mesgs {
    width: 100%;
    padding: 0;
    background: #fff;
}
.messaging .inbox_msg .mesgs {
    width: 100%;
    padding: 0;
    background: #f9fafc;
    display: flex;
    flex-wrap: wrap;
    align-content: space-between;
}
.messaging .inbox_msg .mesgs .msg_history {
    height: 100%;
    max-height: 550px;
    overflow: auto;
    padding-right: 25px;
    width: 100%;
    padding-left: 25px;
}
.messaging .inbox_msg .mesgs .type_msg {
    width: 100%;
    padding: 20px;
    border-top: 1px solid #e0e0e0;
    background: #f3f5f7;
}
.messaging .inbox_msg .mesgs .type_msg #grievance_email_form {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: flex-end;
}
.messaging .inbox_msg .mesgs .type_msg #grievance_email_form .tox.tox-tinymce {
    height: 70px !important;
    border: none;
    width: calc(100% - 100px);
}
.messaging .inbox_msg .mesgs .type_msg #grievance_email_form .upload-btn-wrappe input#uploadfile {
    width: 30px;
    height: 30px;
    min-height: auto;
    background-size: 24px;
    overflow: hidden;
}
.messaging .inbox_msg .mesgs .type_msg #grievance_email_form .tox.tox-tinymce iframe#msg_ifr {
    background: #fff;
    border-radius: 5px;
}
.messaging .inbox_msg .mesgs .type_msg #grievance_email_form .upload-btn-wrappe {
    margin: 0 0 0 20px;
}
.messaging .inbox_msg .mesgs .type_msg #grievance_email_form button.msg_send_btn {
    width: 90px;
    border-radius: 4px;
    height: 40px;
    top: calc(50% - 10px);
    background: #429cc6;
    box-shadow: 0px 10px 10px rgb(66 156 198 / 17%);
    outline: none;
    font-size: 14px;
    transition: all .3s;
    position: static;
}
.messaging .inbox_msg .mesgs .type_msg #grievance_email_form button.msg_send_btn:hover {
    background: #318ab3;
}
.messaging .inbox_msg .mesgs .type_msg #grievance_email_form button.msg_send_btn span {
    margin: 0 4px;
}
.messaging .inbox_msg .mesgs .type_msg #grievance_email_form #attchmentpreview {
   position: absolute;
    top: -23px;
    left: 0px;
    z-index: 99;
}
.messaging .inbox_msg .mesgs .msg_history .chat_msg {
    width: 100%;
    float: left;
    position: relative;
    overflow: visible;
    margin: 30px 0 0px;
}
.messaging .inbox_msg .mesgs .msg_history .chat_msg .message-wrap {
    background: #46b4e7;
    padding: 15px;
    text-align: left;
    border-radius: 20px 20px 0px 20px;
    max-width: 400px;
    width: auto;
}
.messaging .inbox_msg .mesgs .msg_history .chat_msg .message-wrap p {
    padding: 0;
    background: none;
    color: #f9fafc;
}
.messaging .inbox_msg .mesgs .msg_history .chat_msg.outgoing_msg {
    padding-right: 55px;
}
.messaging .inbox_msg .mesgs .msg_history .chat_msg.outgoing_msg .Profile-pic {
    position: absolute;
    right: 0;
    bottom: 0;
    width: 42px;
    height: 42px;
    overflow: hidden;
    border-radius: 100px;
}
.messaging .inbox_msg .mesgs .msg_history .chat_msg.outgoing_msg .Profile-pic img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.messaging .inbox_msg .mesgs .msg_history .chat_msg .message-wrap .received_withd_msg {
    width: 100%;
}
.messaging .inbox_msg .mesgs .msg_history .chat_msg .message-wrap a.file-attache {
    color: #fff;
    display: flex;
    align-items: center;
}
.messaging .inbox_msg .mesgs .msg_history .chat_msg .message-wrap a.file-attache img {
    border-radius: 10px;
    max-width: 100px;
}
.messaging .inbox_msg .mesgs .msg_history .chat_msg .message-wrap a.file-attache i.fas {
    border: solid 1px #fff;
    width: 30px;
    display: flex;
    height: 30px;
    justify-content: center;
    align-items: center;
    border-radius: 50px;
    margin: 0 2px;
}
.messaging .inbox_msg .mesgs .msg_history .chat_msg .message-wrap a.file-attache i.fas.fa-check {
    color: #52d600;
    border-color: #52d600;
}
.messaging .inbox_msg .mesgs .msg_history .chat_msg.outgoing_msg p.single_name {
    text-align: right;
    margin: 0;
    color: #999;
}
.messaging .inbox_msg .mesgs .msg_history .chat_msg.outgoing_msg p.single_date, 
.messaging .inbox_msg .mesgs .msg_history .chat_msg.outgoing_msg .time_date {
    position: absolute;
    bottom: -20px;
    right: 55px;
    color: #cccccc;
    display: block;
    font-size: 12px;
    margin: 8px 0 0;
}
.messaging .inbox_msg .mesgs .msg_history .chat_msg.incoming_msg .message-wrap.received_msg {
    background: #f0f1f6;
    border-radius: 20px 20px 20px 0px;
}
.messaging .inbox_msg .mesgs .msg_history .chat_msg.incoming_msg {
    padding-left: 55px;
}
.messaging .inbox_msg .mesgs .msg_history .chat_msg.incoming_msg .Profile-pic {
    position: absolute;
    left: 0;
    bottom: 0;
    width: 42px;
    height: 42px;
    overflow: hidden;
    border-radius: 100px;
}
.messaging .inbox_msg .mesgs .msg_history .chat_msg.incoming_msg .Profile-pic img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.messaging .inbox_msg .mesgs .msg_history .chat_msg.incoming_msg .message-wrap.received_msg .submit_wrap p,
.messaging .inbox_msg .mesgs .msg_history .chat_msg .message-wrap .received_withd_msg p,
.messaging .inbox_msg .mesgs .msg_history .chat_msg.incoming_msg .message-wrap.received_msg a.file-attache  {
    color: #646464;
}
.messaging .inbox_msg .mesgs .msg_history .chat_msg.incoming_msg .message-wrap.received_msg a.file-attache i.fas {
    border-color: #646464;
}
.messaging .inbox_msg .mesgs .msg_history .chat_msg.incoming_msg p.single_name {
    text-align: left;
    margin: 0;
    color: #999;
    text-transform: capitalize;
}
.messaging .inbox_msg .mesgs .msg_history .chat_msg.incoming_msg p.single_date, 
.messaging .inbox_msg .mesgs .msg_history .chat_msg.incoming_msg .time_date {
    position: absolute;
    bottom: -20px;
    left: 55px;
    color: #cccccc;
    display: block;
    font-size: 12px;
    margin: 8px 0 0;
}
.messaging .inbox_msg .mesgs .msg_history .chat_msg.outgoing_msg p.single_date i.fa.fa-check, .messaging .inbox_msg .mesgs .msg_history .chat_msg.outgoing_msg .time_date i.fa.fa-check {
    color: #04ce04;
    margin: 0 0 0 3px;
    font-size: 11px;
}
.messaging .inbox_msg .inbox_people .inbox_chat .chat_list .chat_people .chat_ib h5 a span.chat_date {
    position: relative;
}
.messaging .inbox_msg .inbox_people .inbox_chat .chat_list .chat_img span.msg-count {
    position: absolute;
    right: 30px;
    top: 8px;
    background: #34c635;
    width: 18px;
    height: 18px;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #fff;
    border-radius: 30px;
    font-size: 12px;
}
.messaging .inbox_msg .inbox_people .inbox_chat .chat_list .chat_img a {
    display: block;
    width: 100%;
    height: 100%;
    position: relative;
}
.Downloaded-action {
    margin-left: 5px;
}
h3.text-center.Messaging {
    margin: 0 0 20px 0;
}

.messaging .inbox_msg .mesgs .msg_history .chat_msg .message-wrap a.file-attache i.fas.hide-check{display:none}


</style>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.visible.min.js"></script>
<script src="https://cdn.tiny.cloud/1/rzset1ozumcl232vpuh2ctlwzaslo3ys33l3wa4clelmcov5/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
	  setup: function(ed) 
	  { 
	  ed.on('keydown', function(e) { if(e.code == 'Enter') {e.preventDefault;$(".msg_send_btn").trigger('click');} }); 
	  ed.on('keyup', function(e) { if(e.code != 'Enter') typing_msg() }); 
	  }
	  
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
  //document.title = "Admin| Hire & Work";
  //$('#visibility').attr('rel',1);
  scroll_messages();
 }

 // Stop timer
 function stopTimer() {
  //window.clearInterval(screenInterval);
  //document.title = "Admin| Hire & Work";
  //$('#visibility').attr('rel',0);
  //remove_chat_seesion();
 }
</script>
<script type="text/javascript">
 $(function(){
	$('body').keydown(function(e){ 
	  if(e.which == '13') {e.preventDefault;$(".msg_send_btn").trigger('click');}
	}); 
  /**$("#divscroll").animate({
	      scrollTop: $('#divscroll')[0].scrollHeight - $('#divscroll')[0].clientHeight
		 }, 0);	**/
$(".msg_history").mCustomScrollbar({
            theme:"minimal-dark",
        }).mCustomScrollbar("scrollTo","bottom",{scrollInertia:1});		 
  	 
  $('.msg_history').on("contextmenu", '.outgoing_msg .sent_msg',function (event) {
    
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

 $('.msg_history').on("contextmenu", '.incoming_msg .received_msg',function (event) {
    // Avoid the real one
    if(!$(this).hasClass('deleted_message1'))
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
		 //var msg = $("[rel=message-"+ message_id + "]").find('p').text().trim();
		 var msg = $("[rel=message-"+ message_id + "]").find('.submit_wrap').html();
		 msg = msg.replace('Edit','');
		 msg = msg.replace('Delete','');
		 msg = msg.replace('Quote','');
		 msg = msg.replace("''","");
		 //tinymce.get("msg").setContent(msg);
		 tinyMCE.execCommand('mceInsertContent',false, msg);
         //$('.typing_msg').val(msg);
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
		var n = $("[rel=message-"+ message_id + "]").closest('.outgoing_msg').find('.single_name').text();
		 var msg = "<div style='opacity:0.5;background:none' contenteditable='false'>''" + $("[rel=message-"+ message_id + "]").find('.submit_wrap').text();
		 msg = msg.replace('Edit','');
		 msg = msg.replace('Delete','');
		 msg = msg.replace('Quote','');
		 var d = $("[rel=message-"+ message_id + "]").closest('.outgoing_msg').find('.single_date').text();
		 //$('.typing_msg').val(msg);
		 msg += "<br/><br/>" + n + " " + d;
		 msg += "<hr/></div><br/>";
		 //tinymce.get("msg").setContent(msg);
		 tinyMCE.execCommand('mceInsertContent',false, msg);
		 $('[name=message_id]').val(0);
		 $(".custom-right-menu").hide(100);
		 break;
    }
  
    // Hide it AFTER the action was triggered
    $(".custom-right-menu").hide(100);
  });
  
  
  $(".custom-left-menu li").click(function(){
    
    // This is the triggered action name
	var user_id = $(".custom-left-menu").attr('data-attr');
	var message = $(".custom-left-menu").attr('rel').split('-');
	var message_id = message[1];
    switch($(this).attr("data-action")) {
        case "quote":  
		 var n = $("[rel=message-"+ message_id + "]").closest('.incoming_msg').find('.single_name').text();
		 var msg = "<div style='opacity:0.5;background:none' contenteditable='false'>''" + $("[rel=message-"+ message_id + "]").find('.submit_wrap').text();
		 msg = msg.replace('Quote','');
		 var d = $("[rel=message-"+ message_id + "]").closest('.incoming_msg').find('.single_date').text();
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
   });**/
   
  
   
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
  
  
  $(".msg_send_btn").click(function(){
	 $('.form-horizontal').submit();
	return false; 
  });
  
  $(".input_msg_write").on("submit",".form-horizontal",function(e){ 
	e.preventDefault();  
	var user_id = "<?php echo $this->session->userdata('user_id'); ?>";
	var user_to =  $('[name=user_to]').val();  
	//var msg = $('.typing_msg').val();
	var msg = tinymce.get("msg").getContent();
	msg = msg.trim();
	var img = $("#current_image").val();
	var msg_id = $('[name=message_id]').val();
    //$('.typing_msg').val('');	
	tinymce.get("msg").setContent('');
	var h = "<?php echo $user_msg_html ?>";
	h = h.replace("[MESSAGE_CONTENT]", msg);
	if($("#attchmentpreview").text() != "" && $("#attchmentpreview").text() != undefined)
	{
    switch($('#attchmentpreview').text().split('.').pop().toLowerCase())
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
  var h1 = "<a class='attachement-uploded' href='" + b + "'>" +$('#attchmentpreview').text() + img + "</a>";
	h = h.replace("[ATTACHMENT]",h1);
	}
	h = h.replace("[ATTACHMENT]","");
	var msg2 = msg;
	msg = "<div class='submit_wrap'>" + msg + "</div>";
	if(msg_id == 0)
	$(".msg_history").append(h);
    else
	{
	  var r = "message-" + msg_id;	
	  $("[rel='"+r+"']").find('.submit_wrap').html(msg2);
	}
	$('[name=msg2]').val(msg);
	$("#attchmentpreview").text("");
	
	$("#divscroll").animate({
	      scrollTop: $('#divscroll')[0].scrollHeight - $('#divscroll')[0].clientHeight
		 }, 0);
		 
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
    return false;
  });
  
  
  	$("#uploadfile").change(function() {
    var files = $(this)[0].files;
    console.log(files)
    $("#attchmentpreview").text("");
	
    for (var i = 0; i < files.length; i++) {
    $("#attchmentpreview").append(files[i].name);      
    }
	tinymce.get("msg").focus();  
  });  
  
  
  var message_ajax_call = function(user_id=0) {
      var user_id = "<?php echo $this->session->userdata('user_id'); ?>";
	  var user_to =  $('[name=user_to]').val();  
      $.ajax({
          method: "POST",
          url: "<?php echo base_url(); ?>admin/view-messages-ajax/"+user_to,
          data: {}
      }).done(function(msg) {
	   //$(".msg_history").html(msg);
	   /**$("#divscroll").animate({
	      scrollTop: $('#divscroll')[0].scrollHeight - $('#divscroll')[0].clientHeight
		 }, 0);**/
		check_messages_visibility(msg); 
      });
  };
  
  setInterval(message_ajax_call, 1000, '<?php echo $user_id_to;?>');
  
  
  var frndlist_ajax_call = function() {
      var user_to =  $('[name=user_to]').val();  
      $.ajax({
          method: "POST",
          url: "<?php echo base_url(); ?>admin/get_frndlist/"+user_to,
          data: {}
      }).done(function(msg) {
          $(".inbox_chat").html(msg);
      });
  };
  setInterval(frndlist_ajax_call, 2000, '<?php echo $user_id_to;?>');
  
    var scroll_messages_call = function(user_id=0) {
	  scroll_messages();
   };
  setInterval(scroll_messages_call, 1000, '<?php echo $user_id_to;?>');
  
   
 });
 
 function check_messages_visibility(html_msg)
  {
    var user_id = "<?php echo $this->session->userdata('user_id'); ?>";
	var user_to =  $('[name=user_to]').val();  
	$.ajax({
          method: "POST",
          url: "<?php echo base_url(); ?>User/check_messages_visibility/"+user_id + "/" + user_to,
          data: {}
      }).done(function(msg) {
		  //var t = $("#visibility").attr('rel');
		  var k = $('.chat_msg').length;
		  var d = jQuery.parseJSON(msg);
		  //alert(k);alert(d.count);
		  if(k != d.count)
		  {
			$("#mCSB_1_container").html(html_msg);
			/**$("#divscroll").animate({
	         scrollTop: $('#divscroll')[0].scrollHeight + $('#divscroll')[0].clientHeight
		 }, 0);**/
		 $(".msg_history").mCustomScrollbar({
            theme:"minimal-dark",
        }).mCustomScrollbar("scrollTo","bottom",{scrollInertia:1});
		 
		  }	else {
			 if($('.chat_new').length > 0 || $("#currently_typing").attr('rel') == 2) {
			 $("#mCSB_1_container").html(html_msg);  
			  $("#currently_typing").attr('rel',0);
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
   
   
   $( "#divscroll" ).scroll(function() {
    scroll_messages(); 	
   });
   
   /**$(".chatWrapper").mCustomScrollbar({
       callbacks:{
    whileScrolling:function(){
      scroll_messages();
    }
}     
        });**/
		
$(window).on("blur focus", function(e) {
    var prevType = $(this).data("prevType");

    if (prevType != e.type) {   //  reduce double fire issues
        switch (e.type) {
            case "blur":
			    //document.title = "asfsdg";
                $('#visibility').attr('rel',0);
                break;
            case "focus":
			//document.title = "utyu";
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
   
  function scroll_messages()
{
  
  var user_id = "<?php echo $this->session->userdata('user_id'); ?>";
  var user_to =  $('[name=user_to]').val();  
  var ids = [];
   var count = -1;
   $(".incoming_msg").each(function(i){
     //if($(this).visible() && $('#visibility').attr('rel') == 1)
	if($('#visibility').attr('rel') == 1)	 
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
</script>