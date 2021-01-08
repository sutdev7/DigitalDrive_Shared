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
  <style>
 
.task_Right_Div .media .pull-left { position:relative; }

.task_Right_Div .media .pull-left span {
    background: 
#ccc;
width: 16px;
height: 16px;
position: absolute;
border-radius: 15px;
left: 66px;
border: 2px solid
    #f6f8fa;
}
.task_Right_Div .media .pull-left span .green{
    background: 
#34c635;
width: 16px;
height: 16px;
position: absolute;
border-radius: 15px;
left: 66px;
border: 2px solid
    #34c635;
}

</style>
  
  <!--==========================
      ConterDiv Section
    ============================-->

  <section id="postDiv">
    <div class="container">
            
      <div class="row">
        <div class="col-lg-8">
          <div class="task_Left">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Microkey Project Details</li>
              </ol>
            </nav>
            <div class="task_Left_Div">
              <h2>Posted <?php echo timeAgo($created);?></h2>
              <h3>{title}</h3>
              <!--<a href="<?= base_url().'edit-microkey-client/'.$this->uri->segment(2) ?>" class="EdBtn"><i class="fa fa-pencil" aria-hidden="true"></i></a>-->
               <span> 
                <?php foreach(array_filter(explode(',',$skills)) as $skillset){ echo '<a href="javascript:void(0);">'.$skillset.'</a>'; }?>
                <!--<a href="#">{skills}</a>-->
                
              </span>
              <h4>{country}, {continent}</h4>
              <p>{description}</p>
              <div class="task_info"> <span>
                <h5>Budget</h5>
                <em><i class="fa fa-dollar"></i>{budget}</em> </span> <span>
                <h5>Duration</h5>
                <em><i class="fa fa-calendar" aria-hidden="true"></i> {duration}</em> </span> <span>
                <!--<h5>Hired</h5>
                <em><i class="fa fa-user" aria-hidden="true"></i> {task_freelancer_hire} Hired</em> </span>-->
                <span>
                	<h5>Proposals</h5>
                	<em><i class="fa fa-book" aria-hidden="true"></i><?= count($task_info[0]['commentArr']) ?></em>
            	</span>				
				</div>
				
				
				
				<!--<iframe src="https://docs.google.com/gview?url={file_name}&embedded=true"
        style="width: 90%; height: 200px">
            <p>Your browser does not support iframes.</p>
        </iframe>-->
              <h2 class="Atta"><strong>Attachments</strong></h2>

                 <a href="{file_name}" target="_blank">
                 	<?php $fileArr = explode(".",$file_name); 
                 		$fileType = $fileArr[count($fileArr)-1];
                 		if($fileType == "docx" || $fileType == "doc"){
                 			echo '<img style="padding: 10px;width: 100px;" src="'.base_url('assets/image/MicrosoftOffice2007.png').'" alt="Download Doc file" >';
                 		}else if($fileType == "pdf"){
                 			echo '<img style="padding: 10px;width: 100px;" src="'.base_url('assets/image/Pdf_File_Type.png').'" alt="Download pdf file" >';
                 		}else if($fileType == "xls" || $fileType == "xlsx"){
                 			//echo"Download xls file";
							echo '<img style="padding: 10px;width: 100px;" src="'.base_url('assets/image/xlss.png').'" alt="Download xls file" >';
                 		}
						else if($fileType == "jpg" || $fileType == "png"){
                 			//echo"Download xls file";
							echo '<img style="padding: 10px;width: 100px;" src="'.base_url('assets/image/File_Image.png').'" alt="Download Image file" >';
                 		}else{
                 			?>
                 			<i class="fa fa-download"></i> Click Here To Download
                 		<?php 
                 		}
                 	?>
                 </a>
                 
           <?php if($addon_file_url !='' || $addon_file_url != Null || $addon_file_url!='0'){ ?>
           <h2 class="Atta"><strong>Additional Files</strong></h2>
           <h2><strong><a href="{addon_file_url}" target="_blank"><i class="fa fa-download"></i> Click Here To Download</a></strong></h2>
		   <?php } ?>
			  
				<div class="CommentsDiv">
					<!--<h5>Comments</h5>-->					
					<!--<div class="media anaaDiv-top"> <a class="pull-left" href="<?= base_url().'public-profile/' ?>{public_id}"> <img class="media-object img-circle" src="{profile_image}" height="40" width="40"></a>
					  <div class="media-body">
                      <?php
                      	if($this->session->userdata('user_type') == 3){
						?>
						<!--<h2>  <input type="checkbox" class="checkbox make_offer" id="{user_id}" data-id="" name="make_offer" title="Make Offer">   </h2> -->
						<!--  <h2><a target="_blank" href="<?= base_url().'public-profile/' ?>{public_id}">{name}</a></h2>
						<?php
						}else{
						?>
						<h2>{name}</h2>
						<?php
						}
					  ?>
					<!--	<p>{remarks}</p> -->
					<!--<p> {city}, {state}, {country} </p> -->
                      <!--<small> + {total_positive_coins} Coins </small>
                      <em> {total_negative_coins} Coins </em> 
					  <p>Skills :</p>
					  
					<p>{user_skills}</p>
					  </div>
					  
					  <a href="#" class="view-btn" data-toggle="modal" data-target="#myModa{user_id}"> View Proposal</a> 
					  
					</div>-->
					<!--<form action="<?php echo base_url().'Task/comment_post' ?>" method="post">
						<input type="hidden" name="taskId" value="{user_task_id}">
						<textarea rows="" cols="" placeholder="Add Comments" name="taskRemark"></textarea>
						<input type="submit" class="btn btn-primary pull-right" value="Submit" />
					</form>-->
				</div>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
        	
          <div class="task_Right_Div">
          	<h5>Hired Freelancer</h5>
          	{freelancer_info}
          	<div class="row"> 
			  <a class="pull-left" href="#"> <img class="media-object img-circle " src="{profile_image}" style="width:100px;height:100px;border-radius: 70px;"> </a>
                
                <div class="media-body">
                   <h2>{name}</h2>
					<p> {city}, {state}</p> 
					<p>Skills : {user_skills}</p>
					  <h3>{total_positive_coins} Coins </h3>
                      <h3 class="minus">{total_negative_coins} Coins</h3>
                </div>
              </div>
              {/freelancer_info}
			  <!--<a href="#" class="eyeBtn" data-toggle="modal" data-target="#myModa{user_id}"> <i class="fa fa-eye" aria-hidden="true"></i> View Proposal</a>-->
          </div>
      </div>
		
		
        <div class="col-lg-4" style="display:none;">
          <div class="task_Right_Div">
            <h5>Hired Freelancer</h5>
			<?php if($task_info[0]["task_freelancer_hire"] >0){
				?>
		    <ul>
            {task_freelancer_hired_details} 
			<li>
            <div class="media"> 
              <a class="pull-left" href="#"><img class="media-object img-circle " src="{user_image}" style="width:100px;height:100px;border-radius: 70px;"> {is_online} </a>
              <div class="media-body">
                <h2>{freelancer_name}</h2>
                <p>{freelancer_city}, {freelancer_state}, {freelancer_country}</p>
                <h3>{total_positive_coins} Coins</h3>
                <h3 class="minus">{total_negative_coins} Coins</h3>
              </div>
            </div>
            <a href="<?php echo base_url(); ?>view-contract/{hired_id}" class="eyeBtn"><i class="fa fa-eye" aria-hidden="true"></i> View Contract</a> 
			</li>
            {/task_freelancer_hired_details}
			</ul>
            <?php 
			}
			else
			{
			?>{commentArr}  
              <div class="row"> 
			  <a class="pull-left" href="#"> <img class="media-object img-circle " src="{profile_image}" style="width:100px;height:100px;border-radius: 70px;"> </a>
                
                <div class="media-body">
                   <h2>{name}</h2>
					<p> {city}, {state}</p> 
					<p>Skills : {user_skills}</p>
					  <h3>{total_positive_coins} Coins </h3>
                      <h3 class="minus">{total_negative_coins} Coins</h3>
                </div>
              </div>
			  <a href="#" class="eyeBtn" data-toggle="modal" data-target="#myModa{user_id}"> <i class="fa fa-eye" aria-hidden="true"></i> View Proposal</a>
			  <div class="clearfix"></div> 
			  
              <!--<form name="frmMakeOffer" id="frmMakeOffer_{freelancer_id}" action="" method="post">
                          <input type="hidden" name="chkMakeOfferFreelancer" value="{freelancer_id}" />
              </form>
		      <ul>
			      <li>  <a href="#" data-formaction="<?php echo base_url(); ?>make-an-offer" data-formid="{freelancer_id}" class="view-btn1 makeoffer" style="line-height: 20px;"> Make offer </a> </li>
                  <li>      <a href="#" data-formaction="<?php echo base_url(); ?>hire-freelancer" data-formid="{freelancer_id}" class="view-btn2 directhire" style="line-height: 20px;"> Hire </a> </li>
				  <li>
				   <a href="#" style="line-height: 20px;"class="view-btn" data-toggle="modal" data-target="#myModa{user_id}"> View Proposal</a> 
				  </li>
			  </ul>-->
			<div class="wish-close">
			  <div class="modal" id="myModa{user_id}">
				<div class="modal-dialog">
				  <div class="modal-content"> 
					
					<!-- Modal Header -->
					<div class="modal-header" style="border:none;">
					  <button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					
					<!-- Modal body -->
					<div class="modal-body">
					  <div class="to-close">
						<h2>Proposal Details</h2>
						<p> <i class="fa fa-dollar"></i>  Bidding Amount : $ {bidamount}</p>
						<p> <i class="fa fa-calendar"></i>  Posting Date : {posting_date}</p>
						 
						<!--<p>{p_attachments}</p> -->
						<form id="frm_attachment" action="<?php echo base_url() ?>download_attachment/{p_attachments}" method="post" style="width:100%;">
					   <p><i class="fa fa-download" id="download_attachment_{p_attachments}" ></i> Download Attachment </p> 
					  </form>
					 
					  <div class="anyClass">{remarks}</div>
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
						
		  {/commentArr}    
            <?php }  ?>
            
			<div class="offerDiv" style="display:none;">
              <h4>Offers <a href="<?php echo base_url(); ?>view-all-offers/{user_task_id}" class="viewBtn">View All</a></h4>
              <ul>
			  
				<?php foreach($hire_list as $hire){ 
				if(empty($hire->user_profile_image)) {
				$user_profile_image = base_url('assets/img/no-image.png');
			    } else {
				$user_profile_image = base_url('uploads/user/profile_image/'.$hire->user_profile_image);          
			    } ?>               
                <li>
                  <h3><span><?php echo $hire->name ?></span> Offered for </h3>
                  <h4><?php echo $hire->task_name?></h4>
                </li>
                <?php } ?>                
              </ul> 
            </div>
          </div>
        </div>
      </div>
             
    </div>
  </section>
</main>
					
					
<script>
				
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
	
	/*
	
	*/
	
	
	
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