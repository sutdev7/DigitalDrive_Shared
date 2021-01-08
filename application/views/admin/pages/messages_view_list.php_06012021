<!-- Content Wrapper. Contains page content -->
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
               <div class="card">
                  <div class="card-header">
                     <h3 class="card-title">List of Charts</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="container">
                     <h3 class=" text-center">Messaging</h3>
                     <div class="messaging">
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
									  
									  $user_profile_image = $row->profile_image;
														if(empty($user_profile_image)) {
															$user_profile_image = base_url('assets/img/no-image.png');
														}
														else {
															$user_profile_image = base_url($user_profile_image);          
														} 
									  ?>
											 <div class="chat_list <?php if($row->user_id ==  $this->uri->segment('3')) echo 'active_chat' ?>">
												<div class="chat_people">
												   <div class="chat_img"> <img src="<?php echo $user_profile_image; ?>" alt="<?= $row->name ?>"> </div>
												   <div class="chat_ib">
													  <h5> <a href="<?= base_url() ?>admin/view-messages/<?php echo $row->user_id; ?>" title="View Details"><?= $row->name ?> <span class="chat_date"> (<?php if ($row->user_type == 3) {
																	echo 'client';
																} else if ($row->user_type == 4) {
																	echo 'freelancer';
																}
															?>)</span></a></h5>
													 <p>
													  </p> 
												   </div>
												</div>
											 </div>
										<?php $count++;
                                        } } ?>
               
                   
                              </div>
                           </div>
                           <div class="mesgs">
                              <div class="msg_history">
							  <?php if ( isset($messages) && !empty($messages)) { ?>
							      <?php $count = 1;
                                        foreach ($messages as $key => $row) { 
										//dd( $row->date_time);die;
										if($row->user_id_to ==  $this->session->userdata('user_id')){
											     $user_profile_image = $row->profile_image;
														if(empty($user_profile_image)) {
															$user_profile_image = base_url('assets/img/no-image.png');
														}
														else {
															$user_profile_image = base_url($user_profile_image);          
														}           
				  
										?>
                                 <div class="incoming_msg">
                                    <div class="incoming_msg_img"> <img src="<?php echo $user_profile_image; ?>" alt="<?= $row->name ?>"> </div>
                                    <div class="received_msg">
                                       <div class="received_withd_msg">
                                          <p><?= trim($row->message_content); ?>
                                          </p>
                                          <span class="time_date"> <?php echo date("h:i a", strtotime($row->date_time)) ;?> |  <?php echo date("F j, Y", strtotime($row->date_time)) ;?></span>
                                       </div>
                                    </div>
                                 </div>
										<?php }else{ ?>
											  <div class="outgoing_msg">
                                    <div class="sent_msg">
                                       <p><?= trim($row->message_content); ?>
                                       </p>
                                       <span class="time_date"> <?php echo date("h:i a", strtotime($row->date_time)) ;?> |  <?php echo date("F j, Y", strtotime($row->date_time)) ;?></span> 
                                    </div>
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

                                    <input type="text" class="write_msg" name="email_body" placeholder="Type a message" />
                                    <button class="msg_send_btn" type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
									 </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /.card-body -->
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
<script>
   (function() {
       $(document).ready(function() {
           
       });
   
   })();
   
   
   $(function () {
       $("#example1").DataTable();
       
   });
</script>
<style>
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
   .chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
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