<main id="main">

	<!--==========================
      ConterDiv Section
    ============================-->

	<div class="main-div-sec">
		<div class="container">

			<!-- Page Heading -->
			<div class="d-sm-flex align-items-center justify-content-between mb-4">
				<h1 class="h3 mb-0 text-gray-800">Analytics</h1>
			</div>

			<!-- Content Row -->
			<div class="row">
			
			<!-- Earnings (Monthly) Card Example -->
                  <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Spent by Client</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">${total_spend}</div>
                          </div>
                          <div class="col-auto">
                            <i class="fa fa-dollar fa-2x text-gray-300"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
		   <!-- </div>
			<div class="row">-->
				  <div class="col-lg-9 mb-4">
      
                    <!-- Project Card Example -->
                    <div class="card shadow mb-4">
                      <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
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
				 <!-- <div class="col-xl-8 col-lg-7">
									<div class="ongoing-task list-task-ongoing">
                    <?php $old_freelancer_id = []; ?>
									<?php foreach($analytics as $value){ ?>
                    <?php if(in_array($value->freelancer_id, $old_freelancer_id)) continue; ?>
										<div class="list-anay">
									<div class="row">
										<div class="col-md-6">

											<div class="form-group">
												<label class="control-label"><strong>Freelancer Name</strong></label>
												<p><?= $value->name ?></p>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label"><strong>No of Projects</strong></label>
												<p><?= no_of_projects($value->freelancer_id, $value->task_created_by) ?></p>
											</div>
										</div>
									</div>
								</div>
                <?php $old_freelancer_id[] = $value->freelancer_id; ?>
									<?php } ?>
								</div>
							</div>-->
				</div>

				<!--<div class="col-lg-12 mb-4">

					<!-- Illustrations -->
					
						<!-- <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                      </div> -->
						<!--<div class="spent-analtics">
							<div class="row">
								<div class="col-md-6">
									<div class="ongoing-task">
									<div class="illustrations">
										<div class="form-group">
											<label class="control-label"><strong>Total Spent by Client</strong></label>
											<p>${total_spend}</p>
										</div>
									</div>
									</div>
								</div>
								
							</div>
						</div>
					</div>-->
				</div>
			</div>
		</div>
</main>
