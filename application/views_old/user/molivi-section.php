<div class="molivi-sec">
	<div class="row">
	  <div class="col-md-5">
		<div class="molivi-sec-box"> <span> <img src="{user_info}{user_image}{/user_info}" style="width:117px;height:117px;" alt="<?php echo $this->session->userdata('user_name'); ?>"> </span>
		  <h3><?php echo $this->session->userdata('user_name'); ?></h3>
		  <p> {user_info} {city}, {state}, {country} {/user_info} </p>
		</div>
	  </div>
	  <div class="col-md-5">
		<div class="molivi-sec-box-add">
		  <div class="molivi-one">
			<h3> {user_info}  ${spend_by_user} {/user_info} </h3>
			<p> Spend on Hire-n-Work </p>
		  </div>
		  <div class="molivi-one"> <small id="positive_coin"> {user_info}{total_positive_coins}{/user_info} Coins </small> <small id="negetive_coin"> {user_info}{total_negative_coins}{/user_info} Coins </small> </div>
		</div>
	  </div>
	  <div class="col-md-2">
		<div class="molivi-sec-box-add"> <a href="<?php echo base_url(); ?>post-task-step-1" class="btn btn-primary"> Post a New Task </a> </div><br>
		<div class="molivi-sec-box-add"> <a href="<?php echo base_url(); ?>post-microkey-client" class="btn btn-primary"> Post a Microkey </a> </div>
	  </div>
	</div>
	<div class="molivi-bottom">
	  <ul>
		<li <?php if($this->uri->segment(1) == 'dashboard'){ echo 'class="active"';} ?> > <a href="<?php echo base_url(); ?>dashboard"> Ongoing Task </a> </li>
		<li <?php if($this->uri->segment(1) == 'upcoming-projects'){ echo 'class="active"';} ?>> <a href="<?php echo base_url(); ?>upcoming-projects"> Upcoming Projects </a> </li>
		<li <?php if($this->uri->segment(1) == 'microkey-list-client'){ echo 'class="active"';} ?>> <a href="<?php echo base_url(); ?>microkey-list-client"> Microkey Projects </a> </li>
		<li <?php if($this->uri->segment(1) == 'hired'){ echo 'class="active"';} ?>> <a href="<?php echo base_url(); ?>hired"> Hired </a> </li>
	  </ul>
	</div>
</div>