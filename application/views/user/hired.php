<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<style>
.ongoing-task .table tbody td:nth-child(1) {
width: 18%;
}
.ongoing-task .table tbody td:nth-child(2) {
width: 40%;
}
</style>
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

  <!--==========================
      ConterDiv Section
    ============================-->
  <div class="main-div-sec">
    <div class="container">
      <?php $this->load->view('user/molivi-section.php') ?>
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
          <div class="input-group-sec">
            <div class="input-group">
              <div class="input-group-btn">
                <button class="btn btn-default" type="submit"> <img src="<?php echo base_url(); ?>assets/img/search.png" alt="img"></button>
              </div>
              <input type="text" class="form-control" placeholder="Seacrh by title, Skill or any key word" name="search">
            </div>
          </div>
          <span> <a href="#TaskFilter" data-toggle="modal" class="Filter-open"> <img src="<?php echo base_url(); ?>assets/img/filter-img.png" alt="img">Filter</a></span> </div>
        <div class="clearfix"></div>
          <h3>Hired</h3>
        <div class="mbl-table">
          <table class="table">
            <thead>
              <tr>
                <th>Freelancer</th>
                <th>Title</th>
                <th>Due Date</th>
                <th>Budget</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              {jobs}              
              <tr>
                <td><div class="annadiv"> <span> <img src="{user_image}" alt="{freelancer_name}" style="width:45px;height:45px;"> </span>
                    {is_online}
                    <div class="caption">
                      <h3> {freelancer_name} </h3>
                      <p>{freelancer_country}</p>
                    </div>
                  </div></td>
                <td>{task_name}</td>
                <td>{task_due_date}</td>
                <td>${task_total_budget}</td>
                <td><a href="<?php echo base_url().'view-contract/' ?>{hired_id}" class="view-btn"> View Contract </a></td>
              </tr>
              {/jobs}
            </tbody>
          </table>
        </div>
        <div class="pag">
          {links}
        </div>
      </div>
    </div>
  </div>
</main>

<!-- The Modal -->
<div class="modal CmnModal FliterModal" id="TaskFilter">
  <div class="modal-dialog">
    <div class="modal-content"> 
      <!-- Modal Header -->
      <div class="modal-header"> 
        <!--<h2>Budget</h2> -->
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <div class="filterdiv">
          <h3>Filter</h3>
          <div class="row">
            <div class="col-md-4">
              <div class="filterdiv-sec"> <span>
                <label>By Title</label>
                <input class="form-control" type="text" placeholder="By Title">
                </span> </div>
            </div>
            <div class="col-md-4">
              <div class="filterdiv-sec"> <span>
                <label>By Skill</label>
                <input class="form-control" type="text" placeholder="Skill">
                </span> </div>
            </div>
            <div class="col-md-4">
              <div class="filterdiv-sec">
                <div class="radiodiv" style="padding-top:0;"> <span>
                  <label> By Freelancer type </label>
                  <ul>
                    <li>
                      <label class="containerdiv">Key
                        <input type="radio" checked="checked" name="radio">
                        <span class="checkmark"></span> </label>
                    </li>
                    <li>
                      <label class="containerdiv">Agency
                        <input type="radio" checked="checked" name="radio">
                        <span class="checkmark"></span> </label>
                    </li>
                  </ul>
                  </span> </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="filterdiv-sec"> <span>
                <label>By Date Created</label>
                <div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy">
                  <input class="form-control" type="text" value="" readonly="">
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span> </div>
                </span> </div>
            </div>
            <div class="col-md-4">
              <div class="filterdiv-sec"> <span>
                <label>By Freelancer Name</label>
                <input class="form-control" type="text" placeholder="Enter Name">
                </span> </div>
            </div>
            <div class="col-md-4">
              <div class="filterdiv-sec"> <span>
                <label>By Budget ($)</label>
                <input class="PriceRange" type="text" min="0" max="100" value="0,50" name="points" step="1" />
                </span> </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer"> <a href="#" class="Terms_Btn" data-dismiss="modal">Show Result</a> <a href="#" class="">Clear All</a> </div>
    </div>
  </div>
</div>

<script src="<?php  echo base_url('assets/js/jquery-asRange.js'); ?>"></script> 
<script>
$(document).ready(function() {
  $(".PriceRange").asRange({
  range: true,
  limit: false
  });
});
</script>
