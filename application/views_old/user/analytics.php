<style>
	.list-group-item {
		border-bottom: none;
	}

	.list-group-item:last-child {
		border-bottom: none
	}

	.list-group-item:hover {
		box-shadow: 0 0 20px 0 rgba(0, 0, 0, .2);
		transform: translateY(-5px);
	}
</style>
<main id="main">
	<div class="main-div-sec">
		<div class="container">

			<!-- Page Heading -->
			<div class="d-sm-flex align-items-center justify-content-between mb-4">
				<h1 class="h3 mb-0 text-gray-800">Analytics</h1>
			</div>

			<!-- Content Row -->
			<div class="row">
				<!-- Earnings (Monthly) Card Example -->
                  <div class="col mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Spent (Monthly)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">${monthly_income}</div>
                          </div>
                          <div class="col-auto">
                            <i class="fa fa-calendar fa-2x text-gray-600"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
      
                  <!-- Earnings (Monthly) Card Example -->
                  <div class="col mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Spent (Annual)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">${yearly_income}</div>
                          </div>
                          <div class="col-auto">
                            <i class="fa fa-dollar fa-2x text-gray-600"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
      
                  <!-- Earnings (Monthly) Card Example -->
                  <div class="col mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks(MONTHLY)</div>
                            <div class="row no-gutters align-items-center">
                              <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{monthly_projects}</div>
                              </div>
                              <div class="col">
                                <div class="progress progress-sm mr-2">
                                  <div class="progress-bar bg-info" role="progressbar" style="width: 60%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-auto">
                            <i class="fa fa-clipboard fa-2x text-gray-600"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks(ANNUAL)</div>
                            <div class="row no-gutters align-items-center">
                              <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{yearly_projects}</div>
                              </div>
                              <div class="col">
                                <div class="progress progress-sm mr-2">
                                  <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-auto">
                            <i class="fa fa-calendar-check-o  fa-2x text-gray-600"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
      
                  <!-- Pending Requests Card Example -->
                  <div class="col mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Projects</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{pending_projects}</div>
                          </div>
                          <div class="col-auto">
                            <i class="fa fa-comment fa-2x text-gray-600"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>                
			</div>
			<div class="row">
				<!-- <div class="col-lg-12 mb-4">
					<div class="card shadow mb-4">
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-primary">Freelancer</h6>
						</div>
						<div class="card-body">
							<?php $old_freelancer_id = []; ?>
							<?php foreach($analytics as $value){ ?>
								<?php if(in_array($value->freelancer_id, $old_freelancer_id)) continue; ?>
								<h4 class="small font-weight-bold"><?= $value->name ?> <span class="float-right"><?= no_of_projects($value->freelancer_id, $value->task_created_by) ?></span></h4>
								<div class="progress mb-4">
									<div class="progress-bar" role="progressbar" style="width: <?= no_of_projects($value->freelancer_id, $value->task_created_by) ?>%" aria-valuenow="<?= no_of_projects($value->freelancer_id, $value->task_created_by) ?>" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<?php $old_freelancer_id[] = $value->freelancer_id; ?>
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="clearfix"></div> -->
				<div class="col-xl-8 col-lg-7">
					<div class="card shadow mb-4">
						<!-- Card Header - Dropdown -->
						<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
							<h6 class="m-0 font-weight-bold text-primary">Spent Overview</h6>
							<div class="dropdown no-arrow">
								<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="fa fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
								</a>                          
							</div>
						</div>
						<!-- Card Body -->
						<div class="card-body">
							<div class="chart-area">
								<canvas id="myAreaChart"></canvas>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-lg-5">
					<div class="card shadow mb-4">
						<!-- Card Header - Dropdown -->
						<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
							<h6 class="m-0 font-weight-bold text-primary">Spent Sources</h6>
							<div class="dropdown no-arrow">
								<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="fa fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
									<div class="dropdown-header">Dropdown Header:</div>
									<a class="dropdown-item" href="#">Action</a>
									<a class="dropdown-item" href="#">Another action</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#">Something else here</a>
								</div>
							</div>
						</div>
						<!-- Card Body -->
						<div class="card-body">
							<div class="chart-pie pt-4 pb-2">
								<canvas id="myPieChart"></canvas>
							</div>
							<div class="mt-4 text-center small">
								<span class="mr-2">
									<i class="fa fa-circle text-primary"></i> Invitation
								</span>                       
								<span class="mr-2">
									<i class="fa fa-circle text-info"></i> Referral
								</span>
								<span class="mr-2">
									<i class="fa fa-circle text-info"></i> Microkey Projects
								</span>
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="col-lg-6 mb-4">
					<div class="card shadow mb-4">
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-primary" style="float: left;">Projects</h6>
							<a href="<?php echo base_url('hired')?>" style="float:right;">View All</a>
						</div>
						<div class="card-body">
							<ul class="list-group list-group-flush text-gray-800">
								<?php foreach($projects as $key => $value){ ?>									
									<li class="list-group-item m_task_name" f-name="<?php echo $value->name?>" a-amount="<?php echo $value->agreed_budget?>" t-work='<?php echo $value->intervals?>' style="cursor: pointer;"><?= $key+1 ?>. <?= $value->task_name ?></li>
								<?php } ?>
							</ul>							
							<?php
							if($has_more_project == true) {
								?>
								<div class="ongoing-task-rht">
									<div class="input-group-sec mr-0 float-right">
										<div class="input-group">
											<div class="input-group-btn">
												<a href="<?= base_url('User/see_all_projects') ?>" class="btn btn-default p-2 text-primary font-weight-bold">See More</a>
											</div>
										</div>
									</div>
								</div>
								<?php
							}
							?>
						</div>
					</div>
				</div>
				<div class="col-lg-6 mb-4">
					<div class="card shadow mb-4">
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
						</div>
						<div class="card-body">
							<div class="row no-gutters align-items-center" id="millustrations_empty" style="display: none;">
								<div class="h5 mb-0  text-gray-800">Please hover on project name.</div>
							</div>
							<div class="row no-gutters align-items-center" id="millustrations" style="display: none">
								<div class="col">
									<div class="text-md font-weight-bold text-primary text-uppercase mb-1">Freelancer Name : <span id="mf_name">-</span></div>
									<div class="h5 mb-0  text-gray-800">
										<span class="h5 font-weight-bold">Budget : $ </span><span id="magree_amount">0</span>
									</div>
									<div class="h5 mb-0 text-gray-800">
										<span class="h5 font-weight-bold">Time of Work : </span><span id="m_year">0</span> years, <span id="m_month">0</span> months, <span id="m_days">0</span> days
									</div>
								</div>
								<div class="col-auto">
									<i class="fa fa-dollar fa-3x text-gray-500"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<script src="<?php echo base_url() ?>assets/js/Chart.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/chart-area-demo.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		console.log("document ready call");
		$(".m_task_name").on('mouseover', function() {			
			var f_name = $(this).attr('f-name');
			var a_amount = $(this).attr('a-amount');
			var m_intervals = JSON.parse($(this).attr('t-work'));
			$("#mf_name").html(f_name);
			$("#magree_amount").html(a_amount);
			$("#m_year").html(m_intervals['y']);
			$("#m_month").html(m_intervals['m']);
			$("#m_days").html(m_intervals['d']);
			$("#millustrations_empty").css('display', 'none');
			$("#millustrations").css('display', 'flex');
		});


// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
	type: 'line',
	data: {
		labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
		datasets: [{
			label: "Earnings",
			lineTension: 0.3,
			backgroundColor: "rgba(0, 137, 132, .2)",
		    borderColor: "rgba(0, 10, 130, .7)",
		    pointRadius: 3,
		    pointBackgroundColor: "rgba(0, 137, 132, .2)",
		    pointBorderColor: "rgba(0, 10, 130, .7)",
		    pointHoverRadius: 3,
		    pointHoverBackgroundColor: "rgba(0, 137, 132, .2)",
		    pointHoverBorderColor: "rgba(0, 10, 130, .7)",
		    pointHitRadius: 10,
		    pointBorderWidth: 2,
			data: [<?php echo $month['January'] ?>, <?php echo $month['February'] ?>, <?php echo $month['March'] ?>, <?php echo $month['April'] ?>, <?php echo $month['May'] ?>, <?php echo $month['June'] ?>, <?php echo $month['July'] ?>, <?php echo $month['August'] ?>, <?php echo $month['September'] ?>, <?php echo $month['October'] ?>, <?php echo $month['November'] ?>, <?php echo $month['December'] ?>],
		}],
	},
	options: {
		maintainAspectRatio: false,
		layout: {
			padding: {
				left: 10,
				right: 25,
				top: 25,
				bottom: 0
			}
		},
		scales: {
			xAxes: [{
				time: {
					unit: 'date'
				},
				gridLines: {
					display: false,
					drawBorder: false
				},
				ticks: {
					maxTicksLimit: 7
				}
			}],
			yAxes: [{
				ticks: {
					maxTicksLimit: 5,
					padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
          	return '$' + number_format(value);
          }
      },
      gridLines: {
      	color: "rgb(234, 236, 244)",
      	zeroLineColor: "rgb(234, 236, 244)",
      	drawBorder: false,
      	borderDash: [2],
      	zeroLineBorderDash: [2]
      }
  }],
},
legend: {
	display: false
},
tooltips: {
	backgroundColor: "rgb(255,255,255)",
	bodyFontColor: "#858796",
	titleMarginBottom: 10,
	titleFontColor: '#6e707e',
	titleFontSize: 14,
	borderColor: '#dddfeb',
	borderWidth: 1,
	xPadding: 15,
	yPadding: 15,
	displayColors: false,
	intersect: false,
	mode: 'index',
	caretPadding: 10,
	callbacks: {
		label: function(tooltipItem, chart) {
			var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
			return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
		}
	}
}
}
});


// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';


// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Direct", "Referral", "Microkey Projects"],
    datasets: [{
      data: [<?php echo $total_offer ?>, <?php echo $total_referral ?>, <?php echo $total_microkey_projects ?>],
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
});
</script>