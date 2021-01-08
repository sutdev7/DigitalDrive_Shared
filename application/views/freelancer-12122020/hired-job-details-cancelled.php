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
				<h2>Posted on {task_info}{task_doc}{/task_info} ;<br> Due Date {task_info}{task_due_date}{/task_info}</h2>

				<h4>{task_info}{task_country}{/task_info}, {task_info}{task_continent}{/task_info}</h4>
				<p>{task_info}{task_details}{/task_info}</p>

				<div class="task_info pt-5 border-bottom-0">
					<span>
						<h5>Level</h5>
						<em><i class="fa fa-dollar" aria-hidden="true"></i> Intermediate</em> 
					</span>
					<hr>
					<h2 class="Atta mt-0">Project Type </h2>
					<p>{task_info}{task_details}{/task_info}</p>
					<hr>
					<h2 class="Atta mt-0">Budget </h2>
					<p>{task_info}{task_total_budget}{/task_info}</p>
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
				<h4>About Client : {creator_data}{client_name}{/creator_data}</h4>
				<ul>
					<li>
						<h3>Member since {creator_data}{since}{/creator_data}</h3>
						<p class="mb-1">Payment Method verified</p>
						<p class="mb-1">{creator_data}{creator_post_count}{/creator_data} Jobs posted</p> 
					</li>
					<li>
					<!--	<a href="<?= base_url().'freelancer-direct-action' ?>/{task_info}{enc_task_id}{/task_info}/<?= base64_encode('A') ?>" class="view-btn1 accept">Accepted</a>-->
						<span class="view-btn1 button">Cancelled</span>
						
					</li>
					<li>
						<h4>Milestone</h4>
						<table>
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