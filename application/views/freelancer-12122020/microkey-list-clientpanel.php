<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$msg = $this->session->flashdata('msg'); 
if(!empty($msg)) {
  ?>
  <section style="padding-top: 10%;">
	<?php echo $msg; ?>
  </section>
  <?php
}
 
$frmValidationMsg = validation_errors(); 
if(!empty($frmValidationMsg)) {
  ?>
  <section style="padding-top: 7%;">
    <?php echo '<div class="alert alert-danger text-center">' . $frmValidationMsg . '</div>'; ?>
  </section>
  <?php
}
 ?>
<!-- modified on 23-10-2020 -->
<section id="postDiv">
	<div class="container">
		<div class="p-3">
		  <h3 class="mt-3 mb-0">Popular Projects<span><a href="#" class="small btn btn-sm btn-primary float-right">Show More</a></span></h3>

			<div class="row">
				{dataArr}
					<div class="col-sm-4">
						<div class="mt-5">
							<div class="card gigs">
								<img class="card-img-top" src="{microkey_image}" style="width:337px;height:150px;">
								<?php //echo '<pre>'; print_r($data); ?>
								<div class="card-body position-relative">
									<!--    <p class="small text-muted m-0 last-login"><span class="float-left"><i class="fa fa-calendar mr-1"></i>2.2.10</span><span class="float-right"><i class="fa fa-clock-o ml-3 mr-1"></i>10.08 P.M</span></p>-->
									<div class="gig-prof">
										<img src="{user_image}" class="user-img" style="width:60px;height:50px;">
	  
										<p class="my-2">{user_name} <span class="d-block small"><i class="fa fa-map-marker"></i> {user_city}, {user_state}, {user_country}</span></p>
										<p class="my-2 small"><span class="text-primary"><b>{user_projects}</b></span> Projects Done</p>
	  
									</div>
									<h5 class="card-title text-center"><a href="microkey-details/{microkey_id}">{microkey_title}</a></h5>
	
								</div>
								<div class="card-footer text-muted d-flex justify-content-between flex-wrap">
									<div>
										<!-- <span class="text-primary"><img src="img/coinn.png" width="18" class="mr-2" />5 ( 20 )</span> -->
										<span class="coin-tag"> {user_coins} Coins</span>
									</div>
									<div class="view-box-two-box-rht" bis_skin_checked="1">
										<a href="<?php echo base_url(); ?>microkey-job-details/{microkey_id}" class="view-btn">Send Proposal</a>
									</div>
									<div class="pull-right" style="margin-top: 6px;">
										<span class="text-primary">$ {microkey_price}</span>
									</div>
									<div class="w-100 border-top mt-3">
										<p class="text-center text-muted small mt-2 mb-0" style="font-size: 12px">{last_login}</p>
									</div>
	
								</div>
							</div>
						</div>
					</div>
				{/dataArr}
		
		
		
			</div>
		</div>
	</div>
</section>