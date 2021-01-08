<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<main id="main"> 
  
<?php 
$msg = $this->session->flashdata('msg'); 
if(!empty($msg)) {
  ?><section style="padding-top: 7%;"><?php echo $msg; ?></section><?php
}
?>

<style>
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
  </style>

  <!--==========================
      ConterDiv Section
    ============================-->
  
  <div class="main-div-sec">
    <div class="container">
      <div class="molivi-sec">
        <div class="row">
			<div class="col-md-5">
			<div class="molivi-sec-box"> <span> <img src="{user_info}{user_image}{/user_info}" alt="<?php echo $this->session->userdata('user_name'); ?>" style="width:120px;height:120px;"> </span>
			  <h3><?php echo $this->session->userdata('user_name'); ?></h3>
			  <p>  {user_info}  {city} ,  {state} ,  {country}  {/user_info}</p>
			</div>
			</div>
			<div class="col-md-7">
				<div class="molivi-sec-box-add">
					<div class="molivi-one">
						<h3> <?php echo $monthly_invatation; ?> </h3>
						<p> Monthly Invitation </p>
					</div>
					<!--
					<div class="molivi-one">
						<h3> {user_info}${spend_by_user}{/user_info} </h3>
						<p> Spend on Hire-n-Work </p>
					</div>
					<div class="molivi-one">
						<h4> {user_info}{connections}{/user_info} </h4>
						<p> Available Connects </p>
					</div>
					<div class="molivi-one"> 
						<small id="positive_coin"> {user_info}{total_positive_coins}{/user_info} Coins </small>
						<small id="negetive_coin"> {user_info}{total_negative_coins}{/user_info} Coins </small>
					</div>
					-->
				</div>
			</div>
        </div>
        
       <?php $this->load->view('freelancer/freelancer-molivi-section.php') ?>
      
      </div>
	  <div class="ongoing-task">
		<div class="browser-taskDiv" style="padding:0px;margin-top:2%">
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
				<?php if($type!='active-invitation'){ ?>
                  <div class="browser-top">
                    <div class="browser-lft">
                      <h2> All Jobs </h2>
                    </div>
                    <div class="browser-rht">
                       <form class="border-readyDiv1" action="<?= base_url().'job-list/'.$type; ?>" method="POST">
                            <div class="row">
                        <div class="col-md-3">
                           <div id="datepicker1" class="input-group date" data-date-format="yyyy-mm-dd">
                                  <input class="form-control" type="text" required value="<?php echo $from_date; ?>" name="from_date" placeholder="From">
                                  <span class="input-group-addon"><i class="fa fa-calendar" style="padding-top:9px; padding-right:5px"></i></span> </div>
                                  
                        </div>
                        <div class="col-md-3">
                          <div id="datepicker2" class="input-group date" data-date-format="yyyy-mm-dd">
                                  <input class="form-control" type="text" value="<?php echo $to_date; ?>" required name="to_date" placeholder="To">
                                  <span class="input-group-addon"><i class="fa fa-calendar" style="padding-top:9px; padding-right:5px"></i></span> </div>
                        </div>
                        <div class="col-md-3">
                         <input class="btn btn-primary font-weight-bold"  style="color:white" type="submit">
                        </div>
                  </div>
                      </form>
                    </div>
                  </div>
				<?php } ?>
              
                <div class="table-box">
                  <div class="table-row table-head">
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
						if(!empty($project_list)){
							?>
							<?php foreach($project_list as $key => $value): ?>
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
  </div>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />

<script>
	$(document).ready(function(){
		  $("#datepicker1").datepicker();
		  $("#datepicker2").datepicker();

	});
</script>
