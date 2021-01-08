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
  
<div class="browser-taskDiv">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="browser-top">
          <div class="browser-lft">
            <h2> All Jobs </h2>
          </div>
          <div class="browser-rht">
            <form class="border-readyDiv1" action="<?= base_url().'see-all-projects' ?>" method="POST">
                  <div class="row">
              <div class="col-md-3">
                 <div id="datepicker1" class="input-group date" data-date-format="yyyy-mm-dd">
                        <input class="form-control" type="text" name="date1" placeholder="From">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span> </div>
              </div>
              <div class="col-md-3">
                <div id="datepicker2" class="input-group date" data-date-format="yyyy-mm-dd">
                        <input class="form-control" type="text" name="date2" placeholder="To">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span> </div>
              </div>
              <div class="col-md-3">
                <input class="btn btn-default" type="submit">
              </div>
        </div>
            </form>
          </div>
        </div>
        <?php //echo '<pre>'; print_r($analytics);die(); ?>
            <table class="table task-list-table">
                                                <thead>
                                                      <tr>
                                                            <th>Task Name</th>
                                                            <th>Client Name</th>
                                                            <th>Budget</th>
                                                            <th>Time of Work</th>
                                                      </tr>
                                                </thead>
                                                <tbody>
                                                      <?php foreach($analytics as $key => $value): ?>
                                                            <tr>
                                                                  <td><?= $value->task_name ?></td>
                                                                  <td><?= $value->name ?></td>
                                                                  <td>$<?= $value->agreed_budget ?></td>
                                                                  <?php
                                                  $hire_date = new DateTime($value->hire_date);
                                                  $hired_end_date = new DateTime($value->hired_end_date);
                                                  $interval = $hire_date->diff($hired_end_date);
                                                ?>
                                                                  <td><?= $interval->y . " years, " . $interval->m." months, ".$interval->d." days " ?></td>
                                                            </tr>
                                                      <?php endforeach ?>
                                                </tbody>
                                          </table>
        
            <div class="pag"></div>
           
            
            
      </div>
    </div>
  </div>
</div>
<script>
$(document).ready(function(){
      $("#datepicker1").datepicker();
      $("#datepicker2").datepicker();

});
</script>