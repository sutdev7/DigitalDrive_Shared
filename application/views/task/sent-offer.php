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
		.select2{
			width:100% !important;
		}
		
		.ongoing-task .table tbody td:nth-child(2) {
			  width: 29%;
			  font-size: 18px;
			  line-height: normal;
			}

		*{
			margin: 0;
			padding: 0;
		}

		.table-box
		{
			margin: 50px auto;
		}

		.table-row{
			display: table;
			width: 100%;
			margin: 10px auto;
			font-family: sans-serif;
			background: transparent;
			padding: 12px 0;
			color: #555;
			font-size: 13px;
			box-shadow: 0 1px 4px 0px rgba(0,0,50,0.3);
		}
		.table-head{
			background:#4e73df;
			box-shadow: none;
			color: #fff;
			font-weight: 600;
		}
		.table-head .table-cell{
			border-right: none;
		}
		.table-cell{
			display: table-cell;
			width: 20%;
			text-align: center;
			padding: 4px 0;
			border-right: 1px solid #d6d4d4;
			vertical-align: middle;
		}
		.first-cell{
			text-align: left;
			padding-left: 10px;
		}
		.last-cell{
			border-right: none;
		}
		a{
			text-decoration: none;
			color: #555;
		}

		.table-row:hover{
		  transform: translateY(-5px);
		}

		.table-row:hover:first-child{
		  transform: translateY(0);
		}

		.browser-top .form-control {
		   border-left: none;
		}
		.input-group.date{
		  border: 1px solid #c2c2c2;
		  border-radius: .3rem;
		  padding: 2px;

		}


		.datepicker.dropdown-menu{
		  top: 221.5156px;
		  }
			.datepicker.dropdown-menu{
			  top: 221.5156px;
			}
			
		p{
			color:black !important;
		}
	</style>
  <!--==========================
      ConterDiv Section
    ============================-->
	
	
  <div class="main-div-sec">
    <div class="full" style="background:#f6f8fa; padding: 30px 0 60px 0; width:100%; float:left;">
      <div class="container">
        <div class="view-box"> 
			<div class="molivi-bottom">
				<ul>
					<a href="<?php echo base_url(); ?>sent-offer/active-invitation">
						<button class="btn btn-primary">Active Invitation</button>
					</a>
					<a href="<?php echo base_url(); ?>sent-offer/previous-invitation">
						<button class="btn btn-danger">Previous Invitation</button> 
					</a>
				</ul>
			</div>

	<div class="ongoing-task">
		<div class="browser-taskDiv" style="padding:0px;margin-top:2%">
            <div class="container">
              <div class="row">
                <div class="col-lg-12"> 
                  <div class="browser-top">
                    <div class="browser-lft">
                      <h2> All Jobs </h2>
                    </div>
                    <div class="browser-rht" style="width:100%;margin-top:10px">
                       <form class="border-readyDiv1" action="<?= base_url().'sent-offer/'.$type; ?>" method="POST">
                            <div class="row">
								<div class="col-md-3"> 
									<h5>Search Category</h5>   
									<select class="js-example-tags" multiple="multiple" name="fldSkillRequired[]" placeholder="Search Catgory"> 
										<?php 
											if(!empty($skills)){
												foreach($skills as $skill){ 
													?>
													<option <?php if(in_array($skill['value'],$search_skill)){ echo 'selected'; } ?>  value="<?php echo $skill['value']; ?>"><?php echo ucfirst($skill['value']); ?></option>
													<?php
												}
											}
										?> 
									</select>
								</div> 
								<div class="col-md-3"> 
									<h5>Top Freelancer</h5>
									<select class="form-control" name="freelancer_id" style="border:1px solid black"> 
										<option value="">--Select Freelancer--</option>
										<?php 
											if(!empty($freelances)){
												foreach($freelances as $freelancer){
													?>
													<option <?php if($selectfreeid==$freelancer['user_id']){ echo 'selected'; } ?> value="<?php echo $freelancer['user_id']; ?>"><?php echo $freelancer['email']; ?></option>
													<?php
												}
											}
										?> 
									</select>
								</div> 
                        <div class="col-md-3">
                         <input class="btn btn-primary font-weight-bold"  style="color:white;margin-top:13%" type="submit">
                        </div>
                  </div>
                      </form>
                    </div>
                  </div>  
              
                <div class="table-box">
					<div class="table-row table-head" style="color:white">
                        <div class="table-cell first-cell">
                            <p>Task Name</p>
                        </div>
                        <div class="table-cell">
                            <p>Client Name</p>
                        </div>
                        <div class="table-cell">
                            <p>Budget</p>
                        </div>
                        <div class="table-cell last-cell">
                            <p>Time of Work</p>
                        </div> 
                    </div>
					<?php   
						if(!empty($analytics)){
							?>
							<?php foreach($analytics as $key => $value): ?>
								<div class="table-row">
									<div class="table-cell first-cell">
										<p><?= $value->task_name ?></p>
									</div>
									<div class="table-cell">
										<p><?= $value->name ?></p>
									</div>
									<div class="table-cell">
										<p>$<?= $value->agreed_budget ?></p>
									</div>
									<div class="table-cell last-cell">
									  <?php
										$hire_date = new DateTime($value->hire_date);
										$hired_end_date = new DateTime($value->hired_end_date);
										$interval = $hire_date->diff($hired_end_date);
									  ?>
										<p><?= $interval->y . " years, " . $interval->m." months, ".$interval->d." days " ?></p>
									</div> 
								</div>
								 <?php endforeach ?>
							<?php
						}else{
							?>
							<p style="text-align:center">Record not found.</p>
							<?php
						}
					?>
                  
            
            
                    
            
            </div> 
                      <div class="pag"></div>
                     
                      
                      
                </div>
              </div>
            </div>
          </div>
    </div>
		
		
		
		
		<!--
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Sent Offers</li>
            </ol>
          </nav>
          <div class="top-offer"> 
			<div class="col-md-3" style="width:41%">
				<h2> Select Category</label>
				<select class="js-example-tags" multiple="multiple" name="fldSkillRequired[]"> 
					<option value="hitesh">Hitesh</option>
					<option value="hitesh1">Hitesh1</option>
					<option value="hitesh2">Hitesh2</option>
					<option value="hitesh3">Hitesh3</option>
					<option value="hitesh4">Hitesh4</option>
				</select>
            </div> 
			-->
			<!--
            <h2> Offers </h2>
            <div class="input-group mb-3">
              <div class="input-group-prepend"> <span class="input-group-text">
                <img src="<?php echo base_url(); ?>assets/img/search.png" alt="search"> 
              </span> </div>
              <input type="text" class="form-control" name="fldSearchCriteria" id="fldSearchCriteria" placeholder="Seacrh..... ">
            </div>
           
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
             -->
			 <!--
            <div class="short-date"> Sort By Date </div>
          </div>
          {jobs}
          <div class="my-mbl-app" id="searchResult">
            <div class="my-mbl-app-lft"> <small> {task_post_duration} minutes ago </small>
              <h2> {task_name} </h2>
              <ul>
                <li style="padding: 6px 12px;"><span style="margin-right: 5px;"><b>{waiting_for_response}</b></span><span> Waiting for freelancer </span></li>
                <li style="background: #e1f7e1 0px 2px;padding: 7px 23px 7px 13px;"><span style="margin-right: 5px;"><b>{responded}</b></span><span>  Accepted  </span></li>
                <li style="background: #fddbe7 0px 2px;padding: 7px 23px 7px 13px;"><span style="margin-right: 5px;"><b>{refused}</b></span><span> Refusal </span></li>
              </ul>
              <div class="freelancerDiv">
                <ul>
                  <li> <span> Freelancer </span> </li>
                  {freelancer_offer}
                  <li> <img src="{user_profile_image}" alt="Freelancer" style="width:65px;height:64px;"> {user_is_login} </li>
                  {/freelancer_offer} 
                </ul>
              </div>
            </div>
            <div class="my-mbl-app-rht"> 
              <a href="<?php echo base_url(); ?>offer-details/{user_task_id}" class="view-btn1"> View Details </a> 
              <a href="#" class="view-btn2" onClick="setUserTaskId('{user_task_id}')" data-toggle="modal" data-target="#myModal7"> Close This Offer </a> 
            </div>
          </div>
          {/jobs}          
        </div>
        <div class="pag" style="margin-bottom:20px;">
          {links}
        </div>
		-->
      </div>
    </div>
  </div>
</main>

<div class="wish-close">
  <div class="modal" id="myModal7">
    <div class="modal-dialog">
      <div class="modal-content"> 
        
        <!-- Modal Header -->
        <div class="modal-header" style="border:none;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <div class="to-close"> <img src="<?php echo base_url(); ?>assets/img/pop-round-img.png" alt="">
            <h2> Do you wish to close? </h2>
            <p> Your offer will no longer be availabe for those who didn't <br>
              acceted your offer yet. </p>
          </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <form action="" method="get" style="width:100%;">
            <button type="button" id="btnCloseOffer" class="btn btn-primary"> Yes Close It </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script> 
  var userTaskId = null;
  function setUserTaskId(task_id){
    userTaskId = task_id;
  }
  $(document).ready(function() { 
    $( "#fldSearchCriteria" ).keyup(function() {
      $.ajax({
        method: "POST",
        url: "<?php echo base_url(); ?>Task/ajax_sent_offer_page",
        data: { searchCriteria: $(this).val() }
      })
      .done(function( msg ) {
        $("#searchResult").html(msg);
      });
    });

    $( "#btnCloseOffer" ).click(function() {
      $.ajax({
        method: "POST",
        url: "<?php echo base_url(); ?>Task/ajax_close_offer_send_user",
        data: { task_id: userTaskId }
      })
      .done(function( msg ) {
        //alert(msg);
        //alert(userTaskId);
        var myObj = JSON.parse(msg);
        window.location.href = '<?php echo base_url(); ?>dashboard';
      });
    });    
  }); 
</script>     