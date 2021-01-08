<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<main id="main"> 
<div class="alert-notification">
<?php 
$id=$user_info[0]['id'];
$sql            = "select profile_status from user_login where user_id='$id'";
$query          = $this->db->query($sql);
$notifications  = $query->result();
$stts=$notifications[0]->profile_status;

?>
</div>
  
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
	  
	 <?php //echo "<pre>" ;print_r($user_info);die; 
	 //if(isset($stts) && $stts == 0){ ?>
		       	<?php if(empty($user_info[0]['bio'])){?>
      		<div class="alert alert-danger text-center"> complete the freelancer bio you cant be access any or mikro key list. so you need to complete the  bio first <a href="<?php echo base_url(); ?>edit-profile">Click here</a> </div>

        <?php } ?>
      	<?php if(isset($user_info[0]['profile_status']) && $user_info[0]['profile_status'] == 0){?>

      		<div class="alert alert-danger text-center"> Untill profile active u can't be send any proposal. Please fill up your profile details and wait for admin approval </div>

        <?php } ?>
        <div class="row">
			<div class="col-md-5">
				<div class="molivi-sec-box"> <span> <img src="{user_info}{user_image}{/user_info}" alt="<?php echo $this->session->userdata('user_name'); ?>" style="width:120px;height:120px;"> </span>
				  <h3><?php echo $this->session->userdata('user_name'); ?></h3>
				  <p>  {user_info} {city} {/user_info}, {user_info} {state} {/user_info}, {user_info} {country} {/user_info}  </p>
				</div>
			</div>
			<div class="col-md-7">
				<div class="molivi-sec-box-add">
					<div class="molivi-one">
						<h3 class="freelicon2"> {user_info}${spend_by_user}{/user_info} </h3>
						<p> Earned on Hire-n-Work </p>
					</div>
					<div class="molivi-one">
						<h4> {user_info}{connections}{/user_info} </h4>
						<p>Available Key</p>
					</div>
					<div class="molivi-one"> 
						<small id="positive_coin"> {user_info}{total_positive_coins}{/user_info} Coins </small>
						<small id="negetive_coin"> {user_info}{total_negative_coins}{/user_info} Coins </small>
					</div>
				</div>
			</div>
		  
		  <!--
          <div class="col-md-5">
            <div class="molivi-sec-box-add">
              <div class="molivi-one">
                <h3> {user_info}  $ {spend_by_user} {/user_info} </h3>
                <p> Spend on Hire-n-Work Available Connects : </p>
              </div>
			  
			  <div class="molivi-one"> <small id="positive_coin"> +{user_info}{total_positive_coins}{/user_info} Coins </small> <small id="negetive_coin"> - {user_info}{total_negative_coins}{/user_info} Coins </small> </div>
			  
            </div>
          </div>
		  
		  -->
		  
        </div>
        
       <?php $this->load->view('freelancer/freelancer-molivi-section.php') ?>
      
      </div>
      <div class="ongoing-task">
        <div class="ongoing-task-lft">
            <label>Sort by Status</label>
            <div class="select-style">
              <select>
                <option>All</option>
                <option>Save proposal</option>
                <option>recent Proposal</option>
                <option>Previous Freelancer</option>
                <option>Agency</option>
                <option>Freelancer</option>
              </select>
            </div>
          </div>
        <div class="ongoing-task-rht">
			<form action="<?= base_url().'freelancer-dashboard' ?>" method="POST">
			<div class="input-group-sec mr-0 float-right">
				<div class="input-group">
				  <div class="input-group-btn">
					<button class="btn btn-default" type="submit" name="search"> <img src="<?= base_url().'assets/img/search.png' ?>" alt="img"></button>
				  </div>
				  <input type="text" class="form-control " placeholder="Seacrh by title or any key word" name="search">
				</div>
			</div>
			</form>
        </div>
        <div class="clearfix"></div>
        <div class="tab-content p-0">
			<div class="tab-pane active container p-0" id="new">
				<div class="mbl-table">
				  <table class="table task-list-table">
					<thead>
					  <tr>
						<th>Buyer</th>
						<th>Job</th>
						<th width="15%">Due Date</th>
						<th width="15%">Budget</th>
						<th width="10%">Note</th>
						<th width="10%">Status</th>
					  </tr>
					</thead>
					<tbody>
						{job_array}
						  <tr>
							<td>{name}  <p> {address}, {city}, {state} </p></td>
							<td>{task_name}</td>
							<td>{task_due_date}</td>
							<td>${task_total_budget}</td>
							<td></td>
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