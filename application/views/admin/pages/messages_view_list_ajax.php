							  <?php if ( isset($messages) && !empty($messages)) { ?>
							      <?php $count = 1;
                                        foreach ($messages as $key => $row) { 
										//dd( $row->date_time);die;
										$attachement = "";
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
	                                    	<a href="<?php echo base_url()."/public-profile/".$row->profile_id ?>"><img src="<?php echo $user_profile_image; ?>" alt="<?= $row->name ?>"> </a>
	                                    </div>
										<p class='single_name'><?= $row->name ?></p>
	                                    <div class="message-wrap received_msg deleted_message<?php echo $row->deleted ?>" rel="message-<?php echo $row->id; ?>">
	                                       <div class="received_withd_msg">
	                                          <p class="Message-Deleted"><?= trim(($row->deleted == 1) ? "Message Deleted" : $row->message_content); ?>
	                                          </p>
											  <?php if(!empty($row->attachement)) : ?>
											  <a class="file-attache" href="<?= base_url().'User/download_file/' ?><?php echo $row->download_code ?>"><div class="attache-file"><?php echo $attachement ?></div><div class="Downloaded-action"><i class="fas fa-arrow-down"></i> <?php /**if($row->attachment_download_status == 1) : ?>
										     <i class="fas fa-check"></i>
										   <?php endif; **/?></div></a>
											  <?php endif; ?>
	                                          <p class='single_date' style="display:none"><?php echo date("F j, Y", strtotime($row->date_time)) ;?></p>
	                                          <span class="time_date"> <?php echo date("h:i a", strtotime($row->date_time)) ;?> |  <?php echo date("F j, Y", strtotime($row->date_time)) ;?> </span>
	                                       </div>
	                                    </div>
	                                    <p class='single_date' style="display:none"><?php echo date("F j, Y", strtotime($row->date_time)) ;?></p>
	                                    <span class="time_date"> <?php echo date("h:i a", strtotime($row->date_time)) ;?> |  <?php echo date("F j, Y", strtotime($row->date_time)) ;?> </span>
	                                 </div>

									<?php }else{ ?>

									<div class="chat_msg outgoing_msg chat_message_<?= $row->id ?>" rel="<?= $row->id ?>">
										<div class="Profile-pic">
	                                    	<a href="<?php echo base_url()."/public-profile/".$row->profile_id ?>"><img src="<?php echo $user_profile_image; ?>" alt="<?= $row->name ?>"> </a>
	                                    </div>
	                                    <p class='single_name'><?= $row->name ?></p>
										<div class="message-wrap sent_msg deleted_message<?php echo $row->deleted ?>" rel="message-<?php echo $row->id; ?>">
	                                       <p class="Message-Deleted"><?= trim(($row->deleted == 1) ? "Message Deleted" : $row->message_content); ?>
	                                       </p>
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
                        
                              
