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
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Offer Details</a></li>
                <li class="breadcrumb-item active" aria-current="page">Hire Freelancer</li>
              </ol>
            </nav>
            <div class="task_Left_Div task-Full">
              <h3>Deposit Fund1111</h3>
              <br>
              <div class="bluediv">
                <label>Payable Ammount</label>
                <h2>${taskinfo}{task_total_budget}{/taskinfo}</h2>
              </div>
              <h3>Terms</h3>
              <ul class="frmList">
                <li class="row">
                  <div class="col-lg-7 col-md-12 col-xs-12">
                    <label>Card Number</label>
                    <input type="text" class="form-control cardInput" placeholder="Enter Card No">
                  </div>
                  <div class="col-lg-5 col-md-12 col-xs-12"> <img src="img/card-img.jpg" alt="" class="cardImg"> </div>
                </li>
                <li class="row noBorder">
                  <div class="col-lg-4 col-md-12 col-xs-12">
                    <label>Expires on</label>
                    <div class="select-style">
                      <select>
                        <option>MM</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-12 col-xs-12">
                    <div class="select-style styleMargin">
                      <select>
                        <option>YY</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-12 col-xs-12">
                    <label>CVV</label>
                    <div class="input-group amt"> 
                      <input class="form-control" type="text" placeholder="Enter Here">
                    </div>
                  </div>
                </li>
                <li class="noBorder">
                	<ul class="verifiedPaymentList">
                    	<li><label>Powered by</label><img src="img/strip-money-img.png" alt=""></li>
                        <li><img src="img/money-verified-img.png" alt=""></li>
                    </ul>
                </li>
                <li>
                	<div class="yNote">Note: Your fund will be deposit to the escrow</div>
                </li>
              </ul>
            </div>
            <div class="fullDiv_bottom mrgnMinus">
              <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#SentModal">Make Payment</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>