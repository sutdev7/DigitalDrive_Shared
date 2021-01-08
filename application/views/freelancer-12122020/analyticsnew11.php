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

        <!--==========================
      ConterDiv Section
    ============================-->

        <div class="main-div-sec">
            <div class="container">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                  <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                  <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                </div>
      
                <!-- Content Row -->
               <div class="row">

          <!-- Earnings (Monthly) Card Example -->
          <div class="col mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Monthly)</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-600"></i>
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
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (Annual)</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-600"></i>
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
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks(Monthly)</div>
                    <div class="row no-gutters align-items-center">
                      <div class="col-auto">
                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"> 70%</div>
                      </div>
                     
                      <div class="col">
                                <div class="progress progress-sm mr-2">
                                  <div class="progress-bar bg-info" role="progressbar" style="width: 70%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                              </div>
                    </div>
                  </div>
                
                  <div class="col-auto">
                    <i class="fas fa-clipboard-list fa-2x text-gray-600"></i>
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
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks(Annual)</div>
                    <div class="row no-gutters align-items-center">
                      <div class="col-auto">
                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"> 50%</div>
                      </div>
                     
                      <div class="col">
                                <div class="progress progress-sm mr-2">
                                  <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                              </div>
                    </div>
                  </div>
                
                  <div class="col-auto">
                    <i class="fas fa-calculator fa-2x text-gray-600"></i>
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
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-comments fa-2x text-gray-600"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      
                <!-- Content Row -->
      
                <div class="row">
      
                  <!-- Area Chart -->
                  <div class="col-xl-8 col-lg-7">
                    <div class="card shadow mb-4">
                      <!-- Card Header - Dropdown -->
                      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                        <div class="dropdown no-arrow">
                          <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
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
                        <div class="chart-area">
                          <canvas id="myAreaChart"></canvas>
                        </div>
                      </div>
                    </div>
                  </div>
      
                  <!-- Pie Chart -->
                  <div class="col-xl-4 col-lg-5">
                    <div class="card shadow mb-4">
                      <!-- Card Header - Dropdown -->
                      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                        <div class="dropdown no-arrow">
                          <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
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
                            <i class="fas fa-circle text-primary"></i> Offer
                          </span>
                          <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Key
                          </span>
                          <span class="mr-2">
                            <i class="fas fa-circle text-info"></i> Micro Key
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
      
                <!-- Content Row -->
                <div class="row">
      
                  <!-- Content Column -->
                  <div class="col-lg-6 mb-4">
                  <?php //echo '<pre>'; print_r($analytics); ?>
                    <!-- Project Card Example -->
                    <div class="card shadow mb-4">
                      <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary" style="float:left;">Projects</h6>
                        <a href="http://www.drivedigitally.com/hirenworknew/job-list/completed" style="float:right;">View All</a>
                      </div>

                      <div class="card-body">

                <div class="projects" data-task_id>
                  <ul class="list-group list-group-flush text-gray-800">
                    <li class="list-group-item">Developer need for wp project</li>
                    <li class="list-group-item"> ci developer need</li>
                    <li class="list-group-item">ci develper 20th Aug</li>
                    <li class="list-group-item"> ci developer need</li>
                    <li class="list-group-item ">ui developer</li>
                  </ul>



                  <div class="ongoing-task-rht">
                    <div class="input-group-sec mr-0 float-right">
                      <div class="input-group">
                        <div class="input-group-btn">
                          <a href='Freelancer/see_all_projects' class="btn btn-default p-2 text-primary font-weight-bold">See More</a>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
                  
                      </div>
                        
                    </div>
      
                    <!-- Color System -->
               <!--     <div class="row">
                      <div class="col-lg-6 mb-4">
                        <div class="card bg-primary text-white shadow">
                          <div class="card-body">
                            Primary
                            <div class="text-white-50 small">#4e73df</div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6 mb-4">
                        <div class="card bg-success text-white shadow">
                          <div class="card-body">
                            Success
                            <div class="text-white-50 small">#1cc88a</div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6 mb-4">
                        <div class="card bg-info text-white shadow">
                          <div class="card-body">
                            Info
                            <div class="text-white-50 small">#36b9cc</div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6 mb-4">
                        <div class="card bg-warning text-white shadow">
                          <div class="card-body">
                            Warning
                            <div class="text-white-50 small">#f6c23e</div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6 mb-4">
                        <div class="card bg-danger text-white shadow">
                          <div class="card-body">
                            Danger
                            <div class="text-white-50 small">#e74a3b</div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6 mb-4">
                        <div class="card bg-secondary text-white shadow">
                          <div class="card-body">
                            Secondary
                            <div class="text-white-50 small">#858796</div>
                          </div>
                        </div>
                      </div>
                    </div> -->
      
                  <!-- </div> -->
      
                  <div class="col-lg-6 mb-4">
      
                    <!-- Illustrations -->
                    <div class="card shadow mb-4">
                      <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                      </div>
                        <div class="text-center">
                            <script type="text/javascript" language="javascript">
                              var task_ids = new Array();
                            </script>
                            <?php foreach($analytics as $key => $value): ?>
                            <script type="text/javascript" language="javascript">
                              task_ids.push(<?= $value->task_id ?>);
                            </script>
                            <div class="box-wrap-illuster">
                            <div class="illustrations<?= $value->task_id ?>" style="display: none">
                            	
                            	<div class="col-xl-12 col-md-12 mb-12">
													  <div class="card-body">
														<div class="row no-gutters align-items-center">
														  <div class="col mr-2">
															<div class="text-md font-weight-bold text-primary text-uppercase mb-1">Client Name :<?= $value->name ?></div>
															<div class="h5 mb-0  text-gray-800"><span class="h5 font-weight-bold">Budget : $ </span><?= $value->agreed_budget ?></div>
															<div class="h5 mb-0 text-gray-800"><span class="h5 font-weight-bold">Time of Work :</span><?php
																	  $hire_date = new DateTime($value->hire_date);
																	  $hired_end_date = new DateTime($value->hired_end_date);
																	  $interval = $hire_date->diff($hired_end_date);
																	?>
																	<?= $interval->y . " years, " . $interval->m." months, ".$interval->d." days " ?></div>
														  </div>
														  <div class="col-auto">
														   <i class="fa fa-dollar fa-3x text-gray-500"></i>
														  </div>
														</div>
													  </div>
												
                                <!--<div class="col-md-4">
                                  <div class="form-group">
                                    <label class="control-label"><strong>Client Name</strong></label>
                                    <p><?= $value->name ?></p>
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="form-group">
                                    <label class="control-label"><strong>Budget</strong></label>
                                    <p>$<?= $value->agreed_budget ?></p>
                                  </div>
                                </div>
                                <div class="col-md-5">
                                  <div class="form-group">
                                    <label class="control-label"><strong>Time of Work</strong></label>
                                    <?php
                                      $hire_date = new DateTime($value->hire_date);
                                      $hired_end_date = new DateTime($value->hired_end_date);
                                      $interval = $hire_date->diff($hired_end_date);
                                    ?>
                                    <p><?= $interval->y . " years, " . $interval->m." months, ".$interval->d." days " ?></p>
                                  </div>
                              </div>-->
                                </div>
                            </div>
                              </div>
                            <?php endforeach ?>
                        </div>
                    
                    </div>
      
                    <!-- Approach -->
                    <!-- <div class="card shadow mb-4">
                      <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                      </div>
                      <div class="card-body">
                        <p>Hire N Work makes extensive use of Bootstrap 4 utility classes in order to reduce CSS bloat and poor page performance. Custom CSS classes are used to create custom components and custom utility classes.</p>
                        <p class="mb-0">Before working with this theme, you should become familiar with the Bootstrap framework, especially the utility classes.</p>
                      </div>
                    </div> -->
      
                  </div>
                </div>
                </div>
      
              </div>
        </div>
    </main>
	
    <script type="text/javascript" language="javascript">
      console.log(task_ids);

  $(".projects").mouseover(function(){
    for (var i = 0; i < task_ids.length; i++) {
      $('.illustrations'+task_ids[i]+'').attr('style', 'display: none;');
    }
    var task_id = $(this).data('task_id');
    $('.illustrations'+task_id+'').attr('style', 'display: block;');
  });
    </script>
	   <script src="<?php echo base_url() ?>assets/js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
         <script src="<?php echo base_url() ?>assets/js/chart-area-demo.js"></script>  
     <!--   <script src="<?php echo base_url() ?>assets/js/chart-pie-demo.js"></script> -->
		
		<script>
		
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
          data: [1, 0, 14, 0, 7, 5, 8, 0, 9, 10, 21, 12],
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
              callback: function (value, index, values) {
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
            label: function (tooltipItem, chart) {
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

		
		
		</script>
		
		
		<script type='text/javascript'>
$(document).ready(function(){
    $('.web').mouseover(function() {
	 
    $('.illusimg').attr ("src", 'https://img-a.udemycdn.com/course/750x422/576054_7e88_6.jpg');

	});
	
	$('.cms').mouseover(function() {
	 
    $('.illusimg').attr ("src", 'https://www.secret-source.eu/wp-content/uploads/2017/08/best-content-management-systems-business.png');

	});
	
	
	$('.php').mouseover(function() {
	 
    $('.illusimg').attr ("src", 'https://miro.medium.com/max/900/1*j2GtIrbQBiYiAwBGXuBCVw.png');

	});
	
	
	$('.graphics').mouseover(function() {
	 
    $('.illusimg').attr ("src", 'https://www.iquorsolutions.com/images/services/graphic/graphic-banner.jpg');

	});
});

</script>
