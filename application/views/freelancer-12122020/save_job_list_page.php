<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<main id="main"> 
  
<?php 
$msg = $this->session->flashdata('msg'); 
if(!empty($msg)) {
  ?><section style="padding-top: 7%;"><?php echo $msg; ?></section><?php
}
?>

  <!--==========================
      ConterDiv Section
    ============================-->
  <div class="main-div-sec">
    <div class="container">
		<div class="molivi-sec">
        
        <div class="row">
          <div class="col-md-5">
            <div class="molivi-sec-box"> <span> <img src="{user_info}{user_image}{/user_info}" alt="<?php echo $this->session->userdata('user_name'); ?>" style="width:45px;height:45px;"> </span>
              <h3><?php echo $this->session->userdata('user_name'); ?></h3>
              <p>  {user_info}  {city} ,  {state} ,  {country}  {/user_info}  </p>
            </div>
          </div>
          <div class="col-md-5">
            <div class="molivi-sec-box-add">
              <div class="molivi-one">
                <h3> {user_info}  $ {spend_by_user} {/user_info} </h3>
                <p> Spend on Hire-n-Work </p>
              </div>
            </div>
          </div>
        </div>
        
       <?php $this->load->view('freelancer/freelancer-molivi-section.php') ?>
      
      </div>
      <div class="ongoing-task">
        <div class="clearfix"></div>
        <div class="tab-content p-0">
			<div class="tab-pane active container p-0" id="new">
				<div class="mbl-table">
				  <table class="table task-list-table">
					<thead>
					  <tr>
						<th>Job</th>
						<th width="15%">Due Date</th>
						<th width="15%">Budget</th>
						<th width="10%">Status</th>
					  </tr>
					</thead>
					<tbody>
					{job_array}
					  <tr>
						<td>{task_name}</td>
						<td>{task_due_date}</td>
						<td>$ {task_total_budget}</td>
						<td><a href="<?= base_url().'job-details/' ?>{user_task_id}">Details</a></td>
					  </tr>
					 {/job_array}              
					</tbody>
				  </table>
				</div>
				<div class="pag">{links}</div> 
			</div>
		</div>
      </div>
    </div>
  </div>
</main>
