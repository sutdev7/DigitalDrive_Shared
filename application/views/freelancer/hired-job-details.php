<link rel="stylesheet" href="../assets/css/responsive.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
    crossorigin="anonymous" />
<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<main id="main"> 
  <!--==========================
      ConterDiv Section
    ============================-->
  <section class="banner" style="background-image: url('../assets/img/banner-bg.jpg');">
      <div class="container">
        <div class="banner-content">
          <div class="left-col">
            <div class="logo-container">
              <img src="../assets/img/logo.png" class="logo" alt="" />
            </div>
            <div class="banner-text">
              <h2>{task_info}{task_title}{/task_info}</h2>
              <span>
                <p><i class="fas fa-map-marker-alt"></i>
                  {task_info}{task_country}{/task_info}, {task_info}{task_continent}{/task_info}</p>
                <p><i class="fas fa-calendar-alt"></i>
                  Posted {task_info}{task_doc}{/task_info}</p>
              </span>
            </div>
          </div>

          <div class="right-col">
            <div class="salary">
              <h4>Budget</h4>
              <h3>${task_info}{task_total_budget}{/task_info}</h3>
            </div>
          </div>
        </div>
      </div>

    </section>
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
    <section class="job-name">
      <div class="container">
        <div class="job-name-content">

          <h2>{task_info}{task_title}{/task_info}</h2>


          <div class="line-2">
            <span><i class="fas fa-map-marker-alt"></i> {task_info}{task_country}{/task_info}, {task_info}{task_continent}{/task_info}</span>
          </div>

          <div class="line-3">
            <span><i class="fas fa-calendar-alt"></i> Post Date: {task_info}{task_doc}{/task_info}</span>
          </div>


        </div>
      </div>
    </section>

    <section class="outer-wrapper-job">
      <div class="container">
        <div class="row">
          <div class="left-col col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
            <div class="job-detail-content">
              <h3>Job Detail</h3>

              <div class="row">
                <div class="more-detail col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                  <div class="more-detail-content">
                    <div>
                      <img src="../assets/img/money-hand.png" alt="" />
                    </div>
                    <div>
                      <h6>Budget
                      </h6>
                      <h6>${task_info}{task_total_budget}{/task_info}</h6>
                    </div>
                  </div>
                </div>

                <div class="more-detail col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                  <div class="more-detail-content">
                    <div>
                      <img src="../assets/img/folder.png" alt="" />
                    </div>
                    <div>
                      <h6>Project length
                      </h6>
                      <h6>{task_info}{tasktime_duration} {/task_info}</h6>
                    </div>
                  </div>
                </div>

                <div class="more-detail col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                  <div class="more-detail-content">
                    <div>
                      <img src="../assets/img/bag.png" alt="" />
                    </div>
                    <div>
                      <h6>Hours to be determined</h6>
                      <h6>{task_info}{task_duration_type}{/task_info}</h6>
                    </div>
                  </div>
                </div>

                <div class="more-detail col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                  <div class="more-detail-content">
                    <div>
                      <img src="../assets/img/avatar.png" alt="" />
                    </div>
                    <div>
                      <h6>Proposal
                      </h6>
                      <h6>{proposal_count}</h6>
                    </div>
                  </div>
                </div>

              </div>


              <div class="job-description">
                <h3>Job Description</h3>
                <p>{task_info}{task_details}{/task_info}</p>
              </div>

              <!--div class="what-will-do">
                <h3>Keywords</h3>
                <h5><i class="fas fa-long-arrow-alt-right"></i> {task_info}{task_keywords}{/task_info}</h5>
              </div-->

              <div class="required-skills">
                <h3>Skills</h3>

                <span class="w-100">{task_info}{task_requirements}<h5>{skill_name}</h5> {/task_requirements}{/task_info}</span>
              </div>
              <br>
              <div class="what-will-do">
                <h3>Activity On this Job</h3>
                <h5><i class="fas fa-long-arrow-alt-right"></i> Proposal <b>{proposal_count}</b> </h5>                <h5><i class="fas fa-long-arrow-alt-right"></i> Offer Send <b>{offer_send}</b> </h5>
              </div>
            </div>
          </div>

          <div class="right-col col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">

            <div class="apply-job">
              <div class="btn">
              	<!--a href="javascript:void(0);" data-toggle="modal" data-target="#myModal">APPLY FOR THE JOB</a-->
              	<?php if(base64_decode($notification_row_id)!=0){ ?>
	              	<?php if($task_is_completed_by_owner == 1){ ?>
						<a href="Javascript:void(0)">PROJECT IS COMPLETED</a>
					<?php } else if(!empty($hire_id)){ ?>
						<a href="<?= base_url().'take-action' ?>/{notification_row_id}/<?php echo base64_encode('17'); ?>">COMPLETE</a>
						<?php
						}else{
							if(base64_decode($notification_master_id)==11){ ?>	
								<a href="<?= base_url().'take-action' ?>/{notification_row_id}/<?php echo base64_encode('14'); ?>">ACCEPT THE JOB</a>
								<?php }	
								else if(base64_decode($notification_master_id)==9){
									if($offer_accepted=="yes"){?>
					                	<a href="javascript:void(0)">OFFER ALREADY ACCEPTED</a>	
					                <?php }else{ ?>						
										<a href="<?= base_url().'take-action' ?>/{notification_row_id}/<?php echo base64_encode('12'); ?>">Accepted</a>
									<?php } 
									if($offer_rejected=="yes"){?>
										<a href="#" class="view-btn2 reject">OFFER ALREADY REJECTED</a>
									<?php }else{ ?>	
					                	<a href="<?= base_url().'take-action' ?>/{notification_row_id}/<?php echo base64_encode('13'); ?>">REJECT</a>
							<?php }
						}
					}
				} ?>
              </div>
              <!-- <h5>Application end in 4d 5h 3m</h5> -->
              <!--h6>OR APPLY WITH</h6>
              <ul>
	                <li>
	                    <h3><a href="javascript:void(0)" class="{inappropriateclass}" id="txtflag" ><i class="fa fa-flag mr-2"></i>{inappropriatetext}</a></h3>
	                    <p class="mb-1">Required connects to submit this proposal <b>1</b></p>
	                    <p class="mb-1">Available Connects <b>{connection}</b>
	                </li>
	            </ul-->
            </div>

            <div class="btn send-msg-btn">
            	<?php if(base64_decode($notification_row_id)!=0){?>
            		<?php if($task_is_completed_by_owner == 1){ ?>
            			<?php } else if(!empty($hire_id)){ ?>
            				<a href="<?= base_url().'problem-ticket' ?>">Cancel</a>
            			<?php
						}else{
							if(base64_decode($notification_master_id)==11){ ?>	
							<a href="<?= base_url().'take-action' ?>/{notification_row_id}/<?php echo base64_encode('15'); ?>">Reject</a>
						<?php
							}
						}
					}?>
            </div>

            <div class="about-client-box">
              <h3>About the Client - {creator_data}{client_name}  {/creator_data}</h3>
              <span class="line"></span>
              <div class="client-text">
                <!--div class="text-line">
                  <div><i class="fas fa-map-marker-alt"></i>
                  </div>
                  <h4>Australia</h4>
                </div-->

                <div class="text-line">
                  <div><i class="fas fa-tv"></i>
                  </div>
                  <h4>{creator_data}{creator_post_count}{/creator_data} Jobs posted</h4>
                </div>

                <div class="text-line">
                  <div><i class="fas fa-clock"></i>
                  </div>
                  <h4>Member since {creator_data}{since}{/creator_data}</h4>
                </div>
              </div>

              <h3>About the Client</h3>
              <div class="about-client-content">
                <div class="text-line">
                  <div><i class="fas fa-address-card"></i>
                  </div>
                  <h4>Payment method verified</h4>
                </div>

                <div class="text-line">
                  <div><i class="fas fa-credit-card"></i>
                  </div>
                  <h4>Identity verified</h4>
                </div>

                <div class="text-line">
                  <div><i class="fas fa-envelope"></i>
                  </div>
                  <h4>Email address verified</h4>
                </div>

                <div class="text-line">
                  <div><i class="fas fa-user-alt"></i>
                  </div>
                  <h4>Profile completed</h4>
                </div>

                <div class="text-line">
                  <div><i class="fas fa-phone-alt"></i>
                  </div>
                  <h4>Phone number verified</h4>
                </div>

                <div class="text-line">
                  <div><i class="fas fa-address-card"></i>
                  </div>
                  <h4>Identity verified</h4>
                </div>
              </div>
              <br>

              <h3>Milestone</h3>
              <br>
              <div class="">
          			<ul>
          				<li>
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
<script src="../assets/js/main.js"></script>	