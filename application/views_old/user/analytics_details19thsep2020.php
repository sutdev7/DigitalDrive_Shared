<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<main id="main">
<!--==========================
ConterDiv Section
============================-->
<div class="">
      <div class="browser-taskDiv">
            <div class="container">
                  <div class="row">
                        <div class="col-lg-12">
                              <div class="browser-top">
                                    <div class="browser-lft">
                                          <h2> All Projects </h2>
                                    </div>
                                    <div class="browser-rht">
                                          <form class="border-readyDiv1" action="<?php echo base_url('User/see_all_projects')?>" method="POST">
                                                <div class="row">
                                                      <div class="col-md-3">
                                                            <div id="datepicker1" class="input-group date" data-date-format="yyyy-mm-dd">
                                                                  <input class="form-control" type="text" name="from_date" placeholder="From">
                                                                  <span class="input-group-addon"><i class="fa fa-calendar" style="padding-top:9px; padding-right:5px"></i></span> </div>

                                                            </div>
                                                            <div class="col-md-3">
                                                                  <div id="datepicker2" class="input-group date" data-date-format="yyyy-mm-dd">
                                                                        <input class="form-control" type="text" name="to_date" placeholder="To">
                                                                        <span class="input-group-addon"><i class="fa fa-calendar" style="padding-top:9px; padding-right:5px"></i></span> 
                                                                  </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                  <input class="btn btn-default text-primary font-weight-bold" type="submit">
                                                            </div>
                                                      </div>
                                                </form>
                                          </div>
                                    </div>


                                    <div class="table-box">
                                          <div class="table-row table-head">
                                                <div class="table-cell first-cell">
                                                      <p>Task Name</p>
                                                </div>
                                                <div class="table-cell">
                                                      <p>Freelancer Name</p>
                                                </div>
                                                <div class="table-cell">
                                                      <p>Budget</p>
                                                </div>
                                                <div class="table-cell last-cell">
                                                      <p>Time of Work</p>
                                                </div> 
                                          </div>                                          
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
                                                      <?php
                                                      $hire_date = new DateTime($value->hire_date);
                                                      $hired_end_date = new DateTime($value->hired_end_date);
                                                      $interval = $hire_date->diff($hired_end_date);
                                                      ?>
                                                      <div class="table-cell last-cell">
                                                            <p><?= $interval->y . " years, " . $interval->m." months, ".$interval->d." days " ?></p>
                                                      </div>
                                                </div>
                                          <?php endforeach ?>
                                    </div> 
                                    <div class="pag"></div>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</main>
<script type="text/javascript">
      $(document).ready(function(){
            $("#datepicker1").datepicker({orientation: ' top'});
            $("#datepicker2").datepicker({orientation: 'top'});
      });
</script>