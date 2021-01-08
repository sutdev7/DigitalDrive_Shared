<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


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
  
  ($this->session->userdata('user_type') == 3)? $user_type = 'Client' : $user_type = 'Freelancer';
  
  ?>

  <?php 
  $frmValidationMsg = validation_errors(); 
  if(!empty($frmValidationMsg)) {
  ?>
  <section style="padding-top: 7%;">
    <?php echo '<div class="alert alert-danger text-center">' . $frmValidationMsg . '</div>'; ?>
  </section>
  <?php
  }
  ?>

  <!--==========================
      ConterDiv Section
    ============================-->
  <section id="profile_section">
    <div class="profile_top">
      <div class="container">
        <div class="row">
          <div class="col-lg-3"> </div>
          <div class="col-lg-9">
            <div class="profile_topLink <?php echo  ($this->session->userdata('user_type') == 4) ? 'freelancer' : 'client'; ?>">
              <ul>
                <li><a href="<?php echo base_url(); ?>user-bio"><img src="<?php  echo base_url('assets/img/BioIcon-1A.png'); ?>" alt=""><?=$user_type?> Bio</a></li>

                <?php if($this->session->userdata('user_type') == 4) {?>
                      <li class=""><a href="<?php echo base_url(); ?>portfolio"><img src="<?php  echo base_url('assets/img/GenderIcon-1A.png'); ?>" alt=""> Portfolio</a></li>
                <?php } ?>

                <li><a href="<?php echo base_url(); ?>gender"><img src="<?php  echo base_url('assets/img/GenderIcon-1A.png'); ?>" alt=""> Gender</a></li>
                <li class="active"><a href="<?php echo base_url(); ?>payment"><img src="<?php  echo base_url('assets/img/PaymentIcon-1A.png'); ?>" alt=""> Payment</a></li>
                <li><a href="<?php echo base_url(); ?>settings"><img src="<?php  echo base_url('assets/img/SettingIcon-1A.png'); ?>" alt=""> Settings</a></li>
                <li><a href="<?php echo base_url(); ?>reviews"><img src="<?php  echo base_url('assets/img/ReviewIcon-1A.png'); ?>" alt=""> Reviews</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="profile">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <div class="pro_img"> <span class="pro_imgBox"><img src="{user_info}{user_image}{/user_info}" alt="Profile Image" /> <a href="#" class="uplod"></a> </span>
              <h2><?php echo $this->session->userdata('user_name'); ?></h2>
              <p>{user_info} {city} {/user_info}, {user_info} {state} {/user_info}, {user_info} {country} {/user_info}</p>
              <a href="<?php echo base_url(); ?>public-profile" class="pro_imgBtn">View Public Profile</a> <a href="<?php echo base_url(); ?>logout" class="pro_logout" ><img src="<?php  echo base_url('assets/img/logout.png'); ?>" alt=""></a> </div>
          </div>
          <div class="col-lg-9">
            <div class="pro_info">
              <div class="payment_method">
                <ul class="nav nav-tabs">
                  <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#PaymentMethod">Payment Method</a></li>
                  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#PaymentHistory">Payment History</a></li>
                </ul>
                <div class="tab-content">
                  <div id="PaymentMethod" class="container tab-pane active">
                    <h4>Payment Method</h4>
                    <p>When you are ready to hire, you will be required to add the funds required for the task to Hire-n-Work. The funds will be held securely until the task is completed and the task Poster releases the funds to the Hire-n-Work freelancer.</p>
                    <form id="frmPayment" name="frmPayment" action="<?php echo base_url(); ?>payment" method="post">
                      <ul class="frmList">
                        <li class="row">
                          <div class="col-lg-7 col-md-12 col-xs-12">
                            <label>Card Number</label>
                            <input type="text" class="form-control cardInput" name="fldCreditCardNo" value="{user_cc_info}{card_no}{/user_cc_info}" placeholder="Enter Card No" maxlength="16" required />
                          </div>
                          <div class="col-lg-5 col-md-12 col-xs-12"> 
                            <img src="<?php  echo base_url('assets/img/card-img.jpg'); ?>" alt="" class="cardImg"> 
                          </div>
                        </li>
                        <li class="row noBorder">
                          <div class="col-lg-4 col-md-12 col-xs-12">
                            <label>Expires on</label>
                            <div class="select-style">
                              <select name="fldCardExpiryMonth" required>
                                <option value="">MM</option>
                                {user_cc_info}
                                  {card_expire_month} 
                                <option value="{key}" {selected}>{val}</option>
                                  {/card_expire_month}
                                {/user_cc_info}                                                              
                              </select>
                            </div>
                          </div>
                          <div class="col-lg-4 col-md-12 col-xs-12">
                            <div class="select-style styleMargin">
                              <select name="fldCardExpiryYear" required>
                                <option value="">YYYY</option>
                                {user_cc_info}
                                  {card_expire_year} 
                                <option value="{key}" {selected}>{val}</option>
                                  {/card_expire_year}
                                {/user_cc_info}
                              </select>
                            </div>
                          </div>
                          <div class="col-lg-4 col-md-12 col-xs-12">
                            <label>CVV</label>
                            <div class="input-group amt">
                              <input class="form-control" type="password" name="fldCreditCardCvv" placeholder="Enter CVV No Here" value="{user_cc_info} {card_cvv} {/user_cc_info}" maxlength="4" required />
                            </div>
                          </div>
                        </li>
                        <li class="row">
                          <button type="submit" name="btnSubmit" class="saveCard btn btn-primary">Save My Card</button>
                        </li>
                      </ul>
                    </form>
                  </div>
                  <div id="PaymentHistory" class="container tab-pane fade">
                    <div class="bluediv">
                      <label>Net Outgoing</label>
                      <h2>$500.00</h2>
                    </div>
                    <div class="SearchPayHistory">
                      <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
                        <input class="form-control" type="text" value="" placeholder="From">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span> </div>
                      <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
                        <input class="form-control" type="text" value="" placeholder="To">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span> </div>
                      <input class="" type="submit" value="">
                      <a class="ActionBtn" href="#">Export</a> <a class="ActionBtn" href="#">Reset</a> </div>
                    <div class="mbl-table">
                      <table class="table HistoryTbl">
                        <thead>
                          <tr>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Ammount</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>I need a UI designer for my Mobile app</td>
                            <td>12/9/2019</td>
                            <td>$500.00</td>
                          </tr>
                          <tr>
                            <td>I need a UI designer for my Mobile app</td>
                            <td>12/9/2019</td>
                            <td>$500.00</td>
                          </tr>
                          <tr>
                            <td>I need a UI designer for my Mobile app</td>
                            <td>12/9/2019</td>
                            <td>$500.00</td>
                          </tr>
                          <tr>
                            <td>I need a UI designer for my Mobile app</td>
                            <td>12/9/2019</td>
                            <td>$500.00</td>
                          </tr>
                          <tr>
                            <td>I need a UI designer for my Mobile app</td>
                            <td>12/9/2019</td>
                            <td>$500.00</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<!-- script for auto complete multiselect --> 
<script src="<?php  echo base_url('assets/js/fastselect.standalone.js'); ?>"></script> 
<script> 
  $(document).ready(function() { 
    $('.multipleSelect').fastselect();

  }); 
</script>