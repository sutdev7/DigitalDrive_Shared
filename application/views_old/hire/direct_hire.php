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
  <section id="postDiv" class="directDiv">
  <form action="<?= base_url().'hire/add_direct_hire_step1' ?>" method="post">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
          <div class="task_Left">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Direct Hire</li>
              </ol>
            </nav>
            <div class="row">
              <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="task_Left_Div mrgnBtm"> <span> Freelancer </span>
                  <div class="media"> 
                  	<a class="pull-left" href="#"> <img class="media-object img-circle " src="{freelancerInfo}{user_image}{/freelancerInfo}"> </a>
                    <div class="media-body">
                      <h2>{freelancerInfo}{freelancer_name}{/freelancerInfo}</h2>
                      <p>{freelancerInfo}{freelancer_city}{/freelancerInfo}, {freelancerInfo}{freelancer_state}{/freelancerInfo}, {freelancerInfo}{freelancer_country}{/freelancerInfo}</p>
                      <h3> + 2 Coins</h3>
                      <h3> - 2 Coins</h3>
                      
                    </div>
                  </div>
                  <div class="media">
                    <div class="med-from">
                      <label> Contract Title </label>
                      <input type="text" name="contract_title" class="form-control" placeholder="Enter Here">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="task_Left_Div task-Full">
              <h3> Budget </h3>
              <div class="med-from">
                <label> Estimated Budget </label>
                <input type="text" name="estimated_budget" class="form-control" placeholder="Enter Here">
              </div>
              <h3>Terms</h3>
              <div class="frmList">
                <div class="radiodiv" style="padding-top:0;">
                  <ul>
                    <li>
                      <label class="containerdiv newopen1">Pay the whole ammount at a time
                        <input type="radio" name="payment_process" checked="checked">
                        <span class="checkmark"></span> </label>
                    </li>
                    <li>
                      <label class="containerdiv newopen2">Pay by Milestone
                        <input type="radio" name="payment_process" >
                        <span class="checkmark"></span> </label>
                    </li>
                  </ul>
                </div>
                <div class="opendiv1">
                  <ul>
                    <li class="row">
                      <div class="col-lg-4 col-md-12 col-xs-12">
                        <label>Due Date</label>
                        <div id="DueDate" class="input-group date" data-date-format="dd-mm-yyyy">
                          <input class="form-control" type="text" name="due_date" value="" />
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
                          <input type="radio" name="deposit">
                          <span class="checkmark"></span> </label>
                      </li>
                      <li>
                        <label class="containerdiv">Deposit later
                          <input type="radio" name="deposit">
                          <span class="checkmark"></span> </label>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="opendiv2" style="display:none;">
                  <ul>
                    <li class="row">
                      <div class="col-lg-4 col-md-12 col-xs-12">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Wire Frame Design">
                      </div>
                      <div class="col-lg-4 col-md-12 col-xs-12">
                        <label>Due Date</label>
                        <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
                          <input class="form-control" type="text" value="" />
                          <span class="input-group-addon"><i class="fa fa-calendar"></i></span> </div>
                      </div>
                      <div class="col-lg-4 col-md-12 col-xs-12">
                        <label>Amount</label>
                        <div class="input-group amt"> <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                          <input class="form-control" type="text" placeholder="250">
                        </div>
                      </div>
                      <div> <a href="#" class="cancelBtn"><i class="fa fa-times" aria-hidden="true"></i></a> <a href="#" class="correctBtn"><i class="fa fa-check" aria-hidden="true"></i></a> </div>
                    </li>
                    <li class="row">
                      <div class="col-lg-4 col-md-12 col-xs-12">
                        <label>Title</label>
                        <h5>UI Delivery</h5>
                      </div>
                      <div class="col-lg-4 col-md-12 col-xs-12">
                        <label>Due Date</label>
                        <h5><i class="fa fa-calendar"></i> 23/1/2020</h5>
                      </div>
                      <div class="col-lg-4 col-md-12 col-xs-12">
                        <label>Amount</label>
                        <h5>$500.00</h5>
                      </div>
                      <div> <a href="#" class="cancelBtn nrgmnBtn"><i class="fa fa-times" aria-hidden="true"></i></a> <a href="#" class="editBtn nrgmnBtn"><i class="fa fa-pencil" aria-hidden="true"></i></a> </div>
                    </li>
                    <li class="row" style="padding:40px 0; border:none;"> <a href="#" class="plus_btn"><i class="fa fa-plus"></i> Add Another</a> <span class="optionalSpan">( Optinal You can do it later )</span> </li>
                    <li class="row">
                      <div class="col-lg-4 col-md-12 col-xs-12 col-lg-Total">
                        <div class="grayBox">
                          <label>Total Budget</label>
                          <h5>$500.00</h5>
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
                          <h5>2</h5>
                        </div>
                      </div>
                    </li>
                  </ul>
                  <h3>Deposit</h3>
                  <div class="radiodiv" style="padding-top:0;">
                    <ul>
                      <li>
                        <label class="containerdiv">Deposit for all the milestone
                          <input type="radio" name="radio2">
                          <span class="checkmark"></span> </label>
                      </li>
                      <li>
                        <label class="containerdiv">Deposit only for the first milestone
                          <input type="radio" name="radio2">
                          <span class="checkmark"></span> </label>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="postDiv_Box postDiv_Box2">
              <form action="#">
                <div class="step_Box">
                  <h3>Other Details</h3>
                    <ul>
                        <li>
                            <span>
                                <label>Title</label>
                                <input class="form-control" name="othet_title" type="text" placeholder="Enter Here">
                            </span>
                        	<span>
                                <label>Skill Required</label>
                                <div class="fstElement fstMultipleMode fstNoneSelected"> 
                                    <select class="multipleSelect" multiple="" name="Specialities">
                                        <option value="">-Select-</option>
                                        {skills}
                                        <option value="{key}" {currentselection} >{value}</option>
                                        {/skills}
                                    </select>
                                </div>
                            </span>
                        </li>
                        <li>
                            <label>Description</label>
                            <textarea class="form-control" rows="7" cols="" placeholder="Enter Description"></textarea>
                        </li>
                    </ul>
                  
                  <!--user post text -wrap end-->
                  <ul id="media-list" class="clearfix">
                    <label> Attachment </label>
                   <!-- <li> <img src="img/a2.png" alt="img"> <em> <img src="img/Direct-hire-close.png" alt="close"> </em></li> -->
                    <li class="myupload"> <span><i class="fa fa-plus" aria-hidden="true"></i>
                      <input type="file" name="attachement" click-type="type2" id="picupload" class="picupload" multiple="">
                      </span> </li>
                  </ul>
                </div>
              <div class="locationDiv">
                <h3> Location </h3>
                <div class="locationDiv">
                  <div class="locationDiv-sec">
                    <label>Select Continent</label>
                    <div class="select-style">
                    <select name="fldSelContinent" id="fldSelContinent" required>
                      <option value="">Select</option>
                      {continents} <option value="{key}" {currentselection}>{value}</option> {/continents}
                    </select>
                    </div>
                  </div>
                  <div class="locationDiv-sec">
                    <label>Select Country</label>
                    <div class="select-style" id="countrySelectionList">
                    <select name="fldSelCountry" id="fldSelCountry" required>
                      <option value="">Select</option>
                    </select>
                    </div>
                  </div>
                </div>
                <div class="fullDiv_bottom">
                  <button type="submit" class="btn btn-primary"> Submit </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
  </section>
</main>

<!-- script for auto complete multiselect --> 
<script src="<?= base_url().'assets/js/fastselect.standalone.js' ?>" type="text/javascript"></script> 
<script type="text/javascript">
	$('.multipleSelect').fastselect();
	$(document).ready(function() { 
		$("#fldSelContinent").change(function() {
		  $.ajax({
			method: "POST",
			url: "<?php echo base_url(); ?>Task/getCountryByContinent",
			data: { fldSelContinent: $(this).val() }
		  })
		  .done(function( response ) {
			$('#countrySelectionList').html(response);
		  });
		});
		
		$(".opendiv1").show();
		$(".newopen1").click(function(){
			$(".opendiv1").show();
			$(".opendiv2").hide();
		});
		
		$(".newopen2").click(function(){
			$(".opendiv2").show();
			$(".opendiv1").hide();
		});
	 }); 
</script> 