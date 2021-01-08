<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

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
   .button:hover {
    background-color: #1189f9; /* blue */
    color: white;
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
            
            <div class="task_Left_Div">
				<h3>{task_info}{task_title}{/task_info}</h3>
				<h2>Posted {task_info}{task_doc}{/task_info} <!--;<br> Due Date {task_info}{task_due_date}-->{/task_info}</h2>

				<h4>{task_info}{task_country}{/task_info}, {task_info}{task_continent}{/task_info}</h4>
				<p>{task_info}{task_details}{/task_info}</p>
				<div class="task_info pt-5 border-bottom-0">
					<span>  <h5> Hours to be determined</h5>
                    <em><i class="fa fa-clock-o"></i> {task_info}{task_duration_type}{/task_info}</em></span>
				    <span>  <h5> Project length</h5>
                    <em><i class="fa fa-calendar"></i> {task_info}{tasktime_duration} {/task_info}</em></span>
					<span>
						<h5>Budget</h5>
						<em><i class="fa fa-dollar" aria-hidden="true"></i> {task_info}{task_total_budget}{/task_info}</em> 
					</span>
					<hr>
					<h2 class="Atta mt-0">Project Type </h2>
					<p>{task_info}{task_details}{/task_info}</p>
					<hr>
					<h2 class="Atta mt-0">Skills</h2>
					<div>
						<span class="w-100">{task_info}{task_requirements}<a href="#">{skill_name}</a> {/task_requirements}{/task_info}</span>
					</div>
					<h2 class="Atta mt-5 ">Activity On this Job</h2>
					<ul>
						<li>
							<p class="mb-1">Proposal <b> {proposal_count}</b></p>
							<p class="mb-1">Invites sent <b> {offer_send}</b></p>
						</li>
					</ul>
				</div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="task_Right_Div">
            <div class="offerDiv">
				<h4>About Client : {creator_data}{client_name}  {/creator_data}</h4>
				<ul>
					<li>
						<h3>Member since {creator_data}{since}{/creator_data}</h3>
						<p class="mb-1">Payment Method verified</p>
						<p class="mb-1">{creator_data}{creator_post_count}{/creator_data} Jobs posted</p> 
					</li>
					<?php
					if(base64_decode($notification_row_id)!="0"){ ?>
					<li>
					<!--	<a href="<?= base_url().'freelancer-direct-action' ?>/{task_info}{enc_task_id}{/task_info}/<?= base64_encode('A') ?>" class="view-btn1 accept">Accepted</a>
						<span class="view-btn1 button">Accepted</span>-->
						
						
						<?php if(!empty($hire_id)){ ?>
						
						<a href="<?= base_url().'take-action' ?>/{notification_row_id}/<?php echo base64_encode('17'); ?>" class="view-btn1 accept">Complete</a>
						
						<a href="<?= base_url().'problem-ticket' ?>" class="view-btn2 reject">Cancel</a>
                  		
						
						<?php
						}else{
							
						if(base64_decode($notification_master_id)=="11"){ ?>	
						
						<a href="<?= base_url().'take-action' ?>/{notification_row_id}/<?php echo base64_encode('14'); ?>" class="view-btn1 accept">Accepted </a>
						<a href="<?= base_url().'take-action' ?>/{notification_row_id}/<?php echo base64_encode('15'); ?>" class="view-btn2 reject">Reject</a>
						
						<?php }	else if(base64_decode($notification_master_id)=="9"){
							
						if($offer_accepted=="yes"){?>
						
                        <a href="#" class="view-btn1 accept">Offer Already Accepted</a>	
						
                        <?php }else{ ?>						
						<a href="<?= base_url().'take-action' ?>/{notification_row_id}/<?php echo base64_encode('12'); ?>" class="view-btn1 accept">Accepted </a>
						
						<?php } 
						if($offer_rejected=="yes"){?>
						
						<a href="#" class="view-btn2 reject">Offer Already rejected </a>
						
						<?php }else{ ?>	
						
                        <a href="<?= base_url().'take-action' ?>/{notification_row_id}/<?php echo base64_encode('13'); ?>" class="view-btn2 reject">Reject</a>
						
						<?php }
						
						}
						}?>				
						
					</li>
					<?php } ?>
					<li>
						<h2>Milestone</h2>
						<table class="table table-striped">
							<tr>
								<th>Title</th>
								<th>Budget</th>
								<th>End</th>
								
							</tr>
						{milestoneInfo}
							<tr>
								<td>{milestone_title}</td>
								<td>{milestone_agreed_budget}</td>
								<td>{milestone_end_date}</td>
							</tr>
						{/milestoneInfo}
						</table>
					</li>
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
		$('.saveBtn').on('click',function(){
			$.ajax({
				  type: "POST",
				  url: "<?= base_url().'/save-job' ?>",
				  data: {taskId : '<?= $this->uri->segment(2) ?>' },
				  dataType: "text",
				  success: function(resultData){ 
					  $('.HireBtn').removeClass('saveBtn');
					  $('#txtShow').html('Saved Job').css("color", '#ccc');
					  
				  }
			});
		});
	});
	
	function copyToClipboard(element) {
	  var $temp = $("<input>");
	  $("body").append($temp);
	  $temp.val($(element).attr('href')).select();
	  document.execCommand("copy");
	  alert('Linked Copied');
	  $temp.remove();
	}
	
	
</script>	