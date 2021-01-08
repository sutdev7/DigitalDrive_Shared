<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
  .m_design_btn {
    border: 1px solid #1189f9;
    padding: 8px 10px;
    color: #1189f9;
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
  
  <section id="postDiv">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
          <div class="task_Left">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contract Details</li>
              </ol>
            </nav>
            <div class="uiDiv">
              <div style="display: flex; justify-content: space-between;">
                <div>
                  <h2 style="margin-left: 16px;"><a href="<?php  echo base_url(); ?>task-details/{user_task_id}" style="color: #293134;">{task_name}</a></h2>
                </div>
                <div>
                  <a href="<?php  echo base_url(); ?>task-details/{user_task_id}" class="m_design_btn">Task Details</a>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="row">
                <div class="col-div-5">
                  <div class="task_Left_Div green">
                    <label>Total</label>
                    <h4>${contract_total_budget}</h4>
                  </div>
                </div>
                <div class="col-div-5">
                  <div class="task_Left_Div yallow">
                    <label>Spend</label>
                    <h4>${contract_total_budget_spend}</h4>
                  </div>
                </div>
                <div class="col-div-5">
                  <div class="task_Left_Div blue">
                    <label>Remaining</label>
                    <h4>${contract_total_budget_remain}</h4>
                  </div>
                </div>
                <div class="col-div-5">
                  <div class="task_Left_Div pink">
                    <label>In Escrow</label>
                    <h4>$0</h4>
                  </div>
                </div>
                <div class="col-div-5">
                  <div class="task_Left_Div orange">
                    <label>MileStones</label>
                    <h4>{contract_milestone_cnt}</h4>
                  </div>
                </div>
              </div>
              <div class="row">
                {freelancer_details}
                <div class="col-md-5 pflBox2">
                  <div class="pflBox">
                    <div class="media"> <a class="pull-left" href="#"> <img class="media-object img-circle" src="{user_image}" alt="{freelancer_name}" style="width: 89px;height: 88px;border-radius: 43px;"><!--<span class="onlineSpan"></span>--></a>
                      <div class="media-body">
                        <h2>{freelancer_name}</h2>
                        <p>{freelancer_city}, {freelancer_state}, {freelancer_country}</p>
                        <h3> {freelancer_total_positive_coins} Coins</h3>
                        <h3> {freelancer_total_negative_coins} Coins</h3>
                      </div>
                    </div>
                  </div>
                </div>
                {/freelancer_details}
                <div class="col-md-7 pflBox3">
                  <div class="row">
                    <div class="col-md-4"><a href="<?php echo base_url(); ?>messages" class="msgLink">Send Message</a></div>
                    <div class="col-md-4">
                      <!--<form name="frmCloseContract" id="frmCloseContract" action="<?php echo base_url(); ?>close-contract" method="post">
                        <input type="hidden" name="fldContractID" value="{contractID}" /> 
                        <input type="hidden" name="fldOfferID" value="{offerID}" />
                        <input type="hidden" name="fldTaskID" value="{taskID}" />
                        <input type="hidden" name="fldFreelancerID" value="{freelancerID}" />                         
                      </form>-->
                      <a href="<?= base_url().'close-contract/'.$this->uri->segment(2) ?>" class="nLink">Close Contract</a>
                    </div>
                    <div class="col-md-4">
						<!--<a href="#myModal" class="nLink" data-toggle="modal">Raise Problem To Hire-n-Work </a>-->
						<a href="<?= base_url().'problem-ticket' ?>" class="nLink" >Raise Problem</a>
					
					</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="mbl-table-nine">
            <div class="mbldiv-scroll">
              <table class="table">
                <thead>
                  <tr>
                    <th>Project title</th>
                    <th>Due Date</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Payment Status</th>
                  </tr>
                </thead>
                <tbody>
                  {contract_milestone_info}
                  <tr>
                    <td>{task_name}</td>
                    <td><img src="<?php echo base_url(); ?>assets/img/cal-img.png" alt=""> {due_date} <a href="#" data-toggle="modal" data-target="#myModa{milestone_id}"> Change </a> </td>
                    <td>${amount}</td>
                    <td>{status}</td>
                    <td>{payment_status}</td>
                  </tr>
				  
<div class="myModal-newdiv3">
  <div class="modal" id="myModa{milestone_id}">
    <div class="modal-dialog">
      <div class="modal-content"> 
        <form name="frmChangeDate" class="frmChangeDateModal" id="formid{milestone_id}" action="<?php echo base_url(); ?>Hire/ajax_change_milestone_date" method="post">
        <input type="hidden" name="frmChangeDate_milestone_id" id="frmChangeDate_milestone_id" value="{milestone_id}" />

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Change Date</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">            
          <div class="add-mileston">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-xs-12">
                <label>Select Date</label>
                <div id="ChangeDatePicker{milestone_id}" class="input-group date duedatemilestone" data-date-format="dd-mm-yyyy">
                  <input class="form-control" type="text" name="frmChangeDate" id="frmChangeDate" value="">
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span> </div>
              </div>
              <div> </div>
            </div>
          </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btnChangeDate" data-dismiss="modal" id="{milestone_id}"> Save </button>
        </div>
        
        </form>
      </div>
    </div>
  </div>
</div>				  
	 
				  
                  {/contract_milestone_info}
                </tbody>
              </table>
              <div class="bottom-add"> <a href="#" class="add_new_milestone" data-toggle="modal" data-contract="{contract_id}" data-target="#myModal6"> + Add Another </a> </div>
            </div>
            <!--<div class="massage-from-box">
              {freelancer_details}
              
              {/freelancer_details}
            </div>-->
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>
</main>


<div class="myModal-newdiv">
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content"> 
        <form action="<?php echo base_url(); ?>complain" name="frmPostComplain" id="frmPostComplain" method="post" enctype="multipart/form-data">
        <input type="hidden" name="fldContractID" value="{contract_id}" />
        <input type="hidden" name="fldOfferID" value="{offerID}" />
        <input type="hidden" name="fldTaskID" value="{taskID}" />
        <input type="hidden" name="fldFreelancerID" value="{freelancerID}" />                        

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Raise Problem</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <div class="bod-sec">
            <h2> Frelancer </h2>
            {freelancer_details}
            <div class="img2-ses"> <span> <img class="media-object img-circle" src="{user_image}" alt="{freelancer_name}" style="width: 89px;height: 88px;border-radius: 43px;">
              <!--<div class="round"></div>-->
              </span>
              <div class="caption">
                <h3> {freelancer_name} </h3>
                <p> {freelancer_city}, {freelancer_state}, {freelancer_country} </p>
                <small>+ 2 Coins </small> 
                <small>- 2 Coins </small> 
                
                </div>
            </div>
            {/freelancer_details}
            <div class="radiodiv">
              <ul>
                <li>
                  <label class="containerdiv"> I am not happy with the freelancer
                    <input type="radio" checked="checked"  name="cheComplainType" value="unsatisfy">
                    <span class="checkmark"></span> </label>
                </li>
                <li>
                  <label class="containerdiv"> Other reason
                    <input type="radio" name="cheComplainType" value="other">
                    <span class="checkmark"></span> </label>
                </li>
              </ul>
              <textarea rows="" cols="" placeholder="Describe your problem here" name="complain_details" id="complain_details"></textarea>
              <div class="attach">
                <ul id="media-list" class="clearfix">
                  <li class="myupload"> <span><i class="fa fa-plus" aria-hidden="true"></i>
                    <input type="file" name="fldComplainDocuments[]" click-type="type2" id="picupload" class="picupload" multiple />
                    </span> </li>
                </ul>
              </div>
            </div>
            <div class="note"> <span> <img src="<?php echo base_url(); ?>assets/img/img-sec2.png" alt="img"> </span>
              <p> Note: Nlauncer support team will fix the problem through
                call or chat with both buddy with in 4 to 5 days </p>
            </div>
          </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-primary send_complain"> Send it to Hire-n-Work </button>
          <!--  data-dismiss="modal" -->
        </div>

        </form>
      </div>
    </div>
  </div>
</div>


<div class="myModal-newdiv2">
  <div class="modal" id="myModal6">
    <div class="modal-dialog">
      <div class="modal-content"> 
        <form name="frmAddNewMilestone" id="frmAddNewMilestone" action="<?php echo base_url(); ?>Hire/ajax_add_new_milestone" method="post">
        <input type="hidden" name="frmAddNewMilestone_Contract_id" id="frmAddNewMilestone_Contract_id" value="<?= $this->uri->segment(2) ?>" /> 

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add milestone</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <div class="add-mileston">
            <li class="row">
              <div class="col-lg-4 col-md-12 col-xs-12">
                <label>Title</label>
                <input type="text" class="form-control" name="fldMilestoneTitle" id="fldMilestoneTitle" placeholder="Enter title here">
              </div>
              <div class="col-lg-4 col-md-12 col-xs-12">
                <label>Due Date</label>
                <div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy">
                  <input class="form-control" type="text" name="fldMilestoneDueDate" id="fldMilestoneDueDate" value="" readonly="">
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span> </div>
              </div>
              <div class="col-lg-4 col-md-12 col-xs-12">
                <label>Amount</label>
                <div class="input-group amt"> <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                  <input class="form-control" type="text" name="fldMilestoneAmount" id="fldMilestoneAmount" placeholder="" style="border:none; padding-left:0;">
                </div>
              </div>
              <div> </div>
            </li>
            <div class="radiodiv">
              <ul>
                <li>
					<label class="containerdiv"> Deposit the fund Now
						<input type="radio" name="fldMilestoneDepositMode" value="deposit_fund_now" />
						<span class="checkmark"></span>
					</label>
                </li>
                <li>
					<label class="containerdiv"> Deposit the fund later
						<input type="radio" name="fldMilestoneDepositMode" checked value="deposit_fund_later" />
						<span class="checkmark"></span>
					</label>
                </li>
              </ul>
            </div>
          </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnAddMilestone" value="{contract_id}"> Add </button>
        </div>

        </form>
      </div>
    </div>
  </div>
</div>





<!-- The Modal -->
<div class="modal" id="SentModal">
  <div class="modal-dialog">
    <div class="modal-content"> 
      
      <!-- Modal Header -->
      <div class="modal-header"> 
        <!--<h2>Budget</h2> -->
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body"> <img src="<?php echo base_url(); ?>assets/img/deliver-img.png" alt="">
        <h2>Congratulation your <br>
          offer has been sent to the freelancer</h2>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type.</p>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer"> <a href="#" class="Terms_Btn" data-dismiss="modal">Okey </a> </div>
    </div>
  </div>
</div>
<a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a> 

<!-- script for auto complete multiselect --> 
<script src="<?php  echo base_url('assets/js/fastselect.standalone.js'); ?>"></script> 
<script>
  $('.multipleSelect').fastselect();
</script>

<script>
$(document).ready(function(){
  $('.fund_deposite').click(function(event) {
    event.preventDefault();
    alert('No payment gateway selected for making this transaction.');
  });

  $('.change_due_date').click(function(event) {
    event.preventDefault();
    $('#frmChangeDate_Contract_id').val($(this).data("contract"));
    $('#frmChangeDate_milestone_id').val($(this).data("milestone"));    
  });

  $('.add_new_milestone').click(function(event) {
    event.preventDefault();
    $('#frmAddNewMilestone_Contract_id').val($(this).data("contract"));  
  });    

  $('.btnChangeDate').on('click', function (e) { 
    e.preventDefault();
	var rowId = $(this).attr('id');
    $.ajax({
      type: $('#formid'+rowId).attr('method'),
      url: $('#formid'+rowId).attr('action'),
      data: $('#formid'+rowId).serialize()
    }).done(function( msg ) { 
		var msg = JSON.parse(msg);
		if(msg.status === 1){
			alert('Milestone date updated successfully');
        }else {
           alert('Milestone date update unsuccessful');        
        }
        location.reload();              
    });      
  });  

  $('#btnAddMilestone').on('click', function (e) {  
    $.ajax({
      type: $('#frmAddNewMilestone').attr('method'),
      url: $('#frmAddNewMilestone').attr('action'),
      data: $('#frmAddNewMilestone').serialize()
    })
    .done(function( msg ) { 
		var msg = JSON.parse(msg);
		if(msg.status === 1){
          alert('New Milestone added successfully');
        }
        else {
           alert('Milestone addition unsuccessful');        
        }
        location.reload();              
    });      
  });

  $('.send_complain').on('click', function (e) {  
     if($('#complain_details').val() != '') {
      $('#frmPostComplain').submit()
     }else{
      e.preventDefault();
      alert('Please describe your problem for faster resolution of this issue.');
     }
  }); 

  $('.close_contract').on('click', function (e) {  
      e.preventDefault();    
      $('#frmCloseContract').submit()
  });     
});
</script>