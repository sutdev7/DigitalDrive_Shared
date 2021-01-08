<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
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
<style type="text/css">
	.back_color {
		color: #000 !important;
	}
</style>

  <!--==========================
      ConterDiv Section
    ============================-->
    <form action="<?= base_url().'hire/add_direct_hire_step1' ?>" method="post">
	<input type="hidden" value="{freelancerInfo}{freelancer_id}{/freelancerInfo}" name="freelancer_id">
  <section id="postDiv">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
          <div class="task_Left">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Offer Details</a></li>
                <li class="breadcrumb-item active" aria-current="page">Hire Freelancer</li>
              </ol>
            </nav>
            <div class="row">
              <div class="col-lg-5 col-md-6 col-xs-12">
                <div class="task_Left_Div mrgnBtm">
                  {freelancerInfo}
				  <div class="media"> <a class="pull-left" href="<?= base_url().'public-profile/'?>{freelancer_public_id}" target="_blank"> <img class="media-object img-circle " src="{user_image}" style="width:69px;height:69px;"> </a>
                    <div class="media-body">
                      <h2>{freelancer_name}</h2>
                      <p>{freelancer_address}, {freelancer_city}, {freelancer_state}, {freelancer_country}</p>
                      <h3>{total_positive_coins} Coins</h3>
                      <h3>{total_negative_coins} Coins</h3>
                    </div>
                  </div>
				  {/freelancerInfo} 
                </div>
              </div>
              <div class="col-lg-7 col-md-6 col-xs-12">
                <div class="task_Left_Div mrgnBtm">
                  <div class="mileDiv mileDiv2">
                    <ul>
                     
					  <li class="row">
						<label>Select Task</label>
						<div class="select-style" >
							
							<select name="fldJobTitle" id="fldJobTitle" required>
								<option value="">Select Post</option>
								{jobs}
								<option value="{user_task_id}">{task_name}</option>
								{/jobs}
								<option value="new_post">Add New Post</option>
							</select>
                        </div>  
					  </li>
					  
					   <li class="row">
                        <div class="w-100 mt-3">
                          <label>Contract Title</label>
                          <input type="text" id="contract_title" name="contract_title" class="form-control" placeholder="Contract Title" required>
                        </div>
                      </li>
					  
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="task_Left_Div task-Full">
              <div class="bluediv">
                <h2 id="showBudget">$0</h2>
                <span class="budget">Budget</span> <a href="#ChangeBudget" class="Terms_Btn" data-toggle="modal">Change Budget</a> 
			  </div>
			  <h3>Breakup</h3>
			    <div class="frmList">
					<div class="">
							    <ul>
									<li class="row">
									
									<div class="col-lg-4 col-md-12 col-xs-12">
										<label>Portal Charges(%)</label>
										<div class="input-group amt"> <span class="input-group-addon"><i class="fa fa-percentage"></i></span>
										  <input id="portal_charges_percentage" class="form-control" type="text" name="portal_charges_percentage" readonly placeholder="">
										</div>
									</div>
									
									<div class="col-lg-4 col-md-12 col-xs-12">
										<label>Portal Charges Amount</label>
										<div class="input-group amt"> <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
										  <input id="portal_charges" class="form-control" type="text" name="portal_charges" readonly placeholder="50">
										</div>
									</div>
									
									  
									</li>
									
									<li class="row">
									
									<div class="col-lg-4 col-md-12 col-xs-12">
										<label>3rd Party Charges(%)</label>
										<div class="input-group amt"> <span class="input-group-addon"><i class="fa fa-percentage"></i></span>
										  <input id="3rd_party_percentage" class="form-control" type="text" name="3rd_party_percentage" readonly placeholder="" value="2%" >
										</div>
									</div>
									
									<div class="col-lg-4 col-md-12 col-xs-12">
										<label>3rd Party Charges Amount</label>
										<div class="input-group amt"> <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
										  <input id="3rd_party_charges" class="form-control" type="text" name="3rd_party_charges" readonly placeholder="50">
										</div>
									</div>
									
									  
									</li>
									
									
									<li class="row">
									
										<div class="col-lg-4 col-md-12 col-xs-12">
											<label>Freelancer get</label>
											<div class="input-group amt"> <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
											  <input id="freelancer_amount" class="form-control" type="text" name="freelancer_amount" readonly placeholder="150">
											</div>
										</div>
										
										
									</li>
									 
									
									 
								 
								</ul>
					</div>
				</div>
			  
              <h3>Terms</h3>
              <div class="frmList">
                <div class="radiodiv" style="padding-top:0;">
                  <ul>
                    <li>
                      <label class="containerdiv newopen1">Pay the whole ammount at a time
                        <input type="radio" name="terms" value="pay_whole_amount" checked="checked">
                        <span class="checkmark"></span> </label>
                    </li>
                    <li>
                      <label class="containerdiv newopen2">Pay by Milestone
                        <input type="radio" name="terms" value="pay_by_milestone">
                        <span class="checkmark"></span> </label>
                    </li>
                  </ul>
                </div>
                <div class="opendiv1">
                  <ul>
                    <li class="row">
                      <div class="col-lg-4 col-md-12 col-xs-12">
                        <label>Hire Date</label>
                        <div id="DueDate" class="input-group date" data-date-format="dd-mm-yyyy">
                          <input class="form-control" type="text" name="hire_date" id="hire_date" value="" readonly />
                          <span class="input-group-addon"><i class="fa fa-calendar"></i></span> </div>
                          <input type="hidden" name="task_duration" id="task_duration">
                          <input type="hidden" name="task_duration_type" id="task_duration_type">
                      </div>
                      <div class="col-lg-4 col-md-12 col-xs-12">
                        <label>Hire End Date</label>
                        <div id="FDueDate" class="input-group date" data-date-format="dd-mm-yyyy">
                          <input class="form-control" type="text" name="m_hire_end_date" id="m_hire_end_date" value="" disabled />
                          <span class="input-group-addon"><i class="fa fa-calendar"></i></span> </div>
                      </div>
                      <div class="col-lg-4 col-md-12 col-xs-12">
                        <label>Amount</label>
                        <div class="input-group amt"> <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                          <input class="form-control" type="text" name="amount" placeholder="250">
                        </div>
                      </div>
                    </li>
                  </ul>
                  <h3>Deposit</h3>
                  <div class="radiodiv" style="padding-top:0;">
                    <ul>
                      <li>
                        <label class="containerdiv">Deposit fund now
                          <input type="radio" name="deposit" value="deposit_fund_now" checked>
                          <span class="checkmark"></span> </label>
                      </li>
                      <li>
                        <label class="containerdiv">Deposit later
                          <input type="radio" name="deposit" value="deposit_fund_later">
                          <span class="checkmark"></span> </label>
                      </li>
                    </ul>
                  </div>
                </div>
				
				
                <div class="opendiv2" style="display:none;">
					<ul>
						<li class="row after-add-more">
						<div class="col-lg-4 col-md-12 col-xs-12">
						  <label>Title</label>
						  <input type="text" name="milestone_title[]" class="form-control" placeholder="Title">
						</div>
						<div class="col-lg-4 col-md-12 col-xs-12">
						  <label>Hire Date</label>
						  <div id="datepicker" class="input-group date milestone_end_date" data-date-format="mm-dd-yyyy">
							<input class="form-control" type="text" name="milestone_end_date[]" value="" />
							<span class="input-group-addon"><i class="fa fa-calendar"></i></span> </div>
						</div>
						<div class="col-lg-4 col-md-12 col-xs-12">
						  <label>Amount</label>
						  <div class="input-group amt"> <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
							<input class="form-control milestone_amount" id="" type="text" name="milestone_agreed_budget[]" value="" placeholder="250">
						  </div>
						</div>
						<div> 
							<a href="#" class="cancelBtn"><i class="fa fa-times" aria-hidden="true"></i></a>
						</div>
						</li>
				  
						                 
                  
						<li class="row" style="padding:40px 0; border:none;"> 
							<a href="#" class="plus_btn" id="addMore"><i class="fa fa-plus"></i> Add Another</a> <span class="optionalSpan">( Optional You can do it later )</span> 
						</li>
						
						<li class="row">
						<div class="col-lg-4 col-md-12 col-xs-12 col-lg-Total">
						  <div class="grayBox">
							<label>Total Budget</label>
							<h5 id="showBudget2">$0</h5>
						  </div>
						</div>
						<div class="col-lg-4 col-md-12 col-xs-12 col-lg-Total">
						  <div class="grayBox">
							<label>Remaining</label>
							<h5>0</h5>
						  </div>
						</div>
						<div class="col-lg-4 col-md-12 col-xs-12 col-lg-Total">
						  <div class="grayBox">
							<label>Total Milestone</label>
							<h5 id="noofmilestone">1</h5>
						  </div>
						</div>
						</li>
					</ul>
				  
				  
				  
                  <h3>Deposit</h3>
                  <div class="radiodiv" style="padding-top:0;">
                    <ul>
                      <li>
                        <label class="containerdiv">Deposit for all the milestone
                          <input type="radio" name="deposite_milestone" value="all" checked>
                          <span class="checkmark"></span> </label>
                      </li>
                      <li>
                        <label class="containerdiv">Deposit only for the first milestone
                          <input type="radio" name="deposite_milestone" value="part">
                          <span class="checkmark"></span> </label>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="task_Left_Div task-Full">
              <h3>Message</h3>
              <ul class="frmList">
                <li class="row">
                  <div class="col-lg-12 col-md-12 col-xs-12">
                    <textarea name="hire_details" cols="" rows=""></textarea>
                  </div>
                </li>
              </ul>
              <input type="submit" class="save-and-continue" value="Save and Continue" />
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  </form>
</main>


<!-- The Modal -->
<div class="modal" id="ChangeBudget">
  <div class="modal-dialog">
    <div class="modal-content"> 
    <form action="<?php echo base_url(); ?>Task/ajax_update_budget" method="post" id="taskBudget">  
      <!-- Modal Header -->
      <div class="modal-header">
        <h2>Budget</h2>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <input type="hidden" value="{freelancerInfo}{freelancer_id}{/freelancerInfo}" name="freelancer_id">
	  <!-- Modal body -->
      <div class="modal-body">
        <ul class="frmList">
          <li>
            <label>Estimated Budget</label>for the task <span id="task_name_span"></span>
			<input type="hidden" name="task_id" value="" id="task_name_id">
            <input type="text" name="estimated_budget" class="form-control" placeholder="Enter Here">
          </li>
        </ul>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer"> <input type="submit" class="Terms_Btn" id="savebtn" value="Save"></div>
    </form>
	</div>
  
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js" integrity="sha512-rmZcZsyhe0/MAjquhTgiUcb4d9knaFc7b5xAfju483gbEXTkeJRUMIPk6s3ySZMYUHEcjKbjLjyddGWMrNEvZg==" crossorigin="anonymous"></script>
<script>
function countEndDate() {
	setTimeout(function() {
		var hire_date = $("#hire_date").val();
		var task_duration = $("#task_duration").val();
		var task_duration_type = $("#task_duration_type").val();
		var madu = "";
		if(task_duration_type == "Hourly") {
			madu = "hours";
		} else if(task_duration_type == "Daily") {
			madu = "days";
		} else if(task_duration_type == "Monthly"){
			madu = "months";
		} else {
			madu = "years";
		}
		var hire_end_date = moment(hire_date, "DD-MM-YYYY").add(task_duration, madu).format('DD-MM-YYYY');		
		$("#m_hire_end_date").val(hire_end_date);
	}, 500);	
}
$(document).ready(function(){
	$(".milestone_end_date").datepicker();
	$(".opendiv1").show();
	$(".newopen1").click(function(){
		$(".opendiv1").show();
		$(".opendiv2").hide();
	});
	
	$(".newopen2").click(function(){
		$(".opendiv2").show();
		$(".opendiv1").hide();
	});

	$("#DueDate").on('change', function() {
		countEndDate();
	});
	
	$('#fldJobTitle').change(function() {      
      var postId = $(this).val();
     
      if(postId == '') {
        alert('Please select a job post for sending offer to freelancer.')
      }else {
       //alert('Call ajax.'); alert(postId);
        $.ajax({
          method: "POST",
          url: "<?php echo base_url(); ?>Task/ajax_get_task_details",
          data: { task_id: postId }
        })
        .done(function( msg ) {
          var obj = jQuery.parseJSON(msg);
          //alert(obj.task_details[0].basic_info.task_due_date);
          if(obj.status == 1) {
            var gross_total = obj.task_details[0].basic_info.task_total_budget;
            var task_details = obj.task_details[0].basic_info.task_details;
			var commision=0;
			var percentage=0;
			if(gross_total<100){
				commision=(gross_total*3)/100;
				percentage="3%";
			} 
			if(gross_total>=100 && gross_total<=500){
				commision=(gross_total*5)/100;
				percentage="5%";
			}
			
			if(gross_total>500 && gross_total<=1000){
				commision=(gross_total*10)/100;
				percentage="10%";
			}
			
			if(gross_total>1000 && gross_total<=3000){
				commision=(gross_total*15)/100;
				percentage="15%";
			}
			
			if(gross_total>3000){
				commision=(gross_total*20)/100;
				percentage="20%";
			}
			
			var freelancer_amount=gross_total-commision;
			var thired_party_commision=(gross_total*2)/100;
			freelancer_amount=freelancer_amount-thired_party_commision;
			
			 
			$("#portal_charges_percentage").val(percentage);
			$("#portal_charges").val(commision);
			$("#3rd_party_charges").val(thired_party_commision.toFixed(2));
			$("#3rd_party_percentage").val('2%');
			$("#freelancer_amount").val(freelancer_amount.toFixed(2));
						
			$("#total_budget").val(gross_total);
			
            $("#showBudget").html('$' + gross_total);
            $("#contract_title").val(task_details);
			$("#showBudget2").html('$' + gross_total);
			$("#task_name_span").html('<b>' + obj.task_details[0].basic_info.task_name + '</b>');
			$("#task_name_id").val(obj.task_details[0].basic_info.task_id);
			$("#task_duration").val(obj.task_details[0].basic_info.task_duration);
			$("#task_duration_type").val(obj.task_details[0].basic_info.task_duration_type);
			countEndDate();
          }
          else{
            alert('Unable to fetch post data. Please try after sometime.');
          }
        });        
      }
    });
	
	$("#taskBudget").submit(function(e) {

		e.preventDefault(); // avoid to execute the actual submit of the form.

		var form = $(this);
		var url = form.attr('action');

		$.ajax({
			   type: "POST",
			   url: url,
			   data: form.serialize(), 
			   success: function(response){ 
					var returnedData = JSON.parse(response);
					if(returnedData.status === 1){
					   $("#showBudget").html('$'+returnedData.amount);
					   $("#showBudget2").html('$'+returnedData.amount);
					   
					} 
			   }
		});
	});
		
	$("body").on("click","#addMore",function(e){ 
		e.preventDefault();
        var html = $(".after-add-more").first().clone();
		var total_element = $(".after-add-more").length;
		var total_element = total_element +1;
        $(".after-add-more").last().after(html);
		$("#noofmilestone").html(total_element);
    });

    $("body").on("click",".cancelBtn",function(e){ 
		e.preventDefault();
		var total_element = $(".after-add-more").length;
		if(total_element >= 2){
			$(this).parents(".after-add-more").remove();
		}
        
    });
	
	/*$('.milestone_amount').on('keyup', function(e){
		var amount = $(this).val();
		alert(amount);
	});*/
});

$(function (){
	$('body').on('focus',".milestone_end_date", function(){
		$(this).datepicker();
	});
});
$('#fldJobTitle').change(function () {
     var optionSelected = $(this).find("option:selected");
     //var valueSelected  = optionSelected.val();
     var textSelected   = optionSelected.text();
	 if(textSelected=="Add New Post")
	 {
		 window.location.href = "<?php echo base_url(); ?>post-task-step-1";
	 }
 });

</script>



