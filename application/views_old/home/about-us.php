<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!--banner-->
<div class="how-it-work-banner about-us-banner">
  <div class="container">
    <h2> About Us </h2>
  </div>
</div>
<!--banner-->

<section id="ConterDiv" style="width:100%; float:left;">
  <div class="container">
    <div class="row clearfix">
      <div class="col-lg-4 col-sm-4 col-md-4">
        <div class="conter"> <img src="<?php echo base_url(); ?>assets/img/icon1.png" alt="">
          <h2>751,831</h2>
          <p>Members Worldwide</p>
        </div>
      </div>
      <div class="col-lg-4 col-sm-4 col-md-4" >
        <div class="conter"> <img src="<?php echo base_url(); ?>assets/img/icon2.png" alt="">
          <h2>1,000,000</h2>
          <p>Jobs Completed</p>
        </div>
      </div>
      <div class="col-lg-4 col-sm-4 col-md-4">
        <div class="conter"> <img src="<?php echo base_url(); ?>assets/img/icon3.png" alt="">
          <h2>$250,000,000</h2>
          <p>Earned by freelancers</p>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="our-story">
  <div class="container">
    <div class="our-story-box">
      <h3> Our Story </h3>
      <h4> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, Lorem Ipsum is simply dummy text of the printing and typesetting industry. </h4>
      <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
    </div>
  </div>
</div>
<div class="our-team our-team-progress">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="progress-sec-lft">
          <h2> enhance you business <br>
            performance with <br>
            our expertise. <br>
            our skills </h2>
        </div>
      </div>
      <div class="col-md-6">
        <div class="progress-sec">
          <div class="progDiv-part">
            <h5>Software Development</h5>
            <div class="progress">
              <div class="progress-bar bg-warning w-97" style="width:100%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">100%</div>
            </div>
          </div>
          <div class="progDiv-part">
            <h5>Digital Marketing</h5>
            <div class="progress">
              <div class="progress-bar bg-warning" style="width:95%" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100">95%</div>
            </div>
          </div>
          <div class="progDiv-part">
            <h5>Web Design</h5>
            <div class="progress">
              <div class="progress-bar bg-warning w-99" style="width:99%" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">99%</div>
            </div>
          </div>
          <div class="progDiv-part">
            <h5>Photography</h5>
            <div class="progress">
              <div class="progress-bar bg-warning" style="width:98%" role="progressbar" aria-valuenow="52" aria-valuemin="0" aria-valuemax="100">98%</div>
            </div>
          </div>
          <div class="progDiv-part">
            <h5>Accounting</h5>
            <div class="progress">
              <div class="progress-bar bg-warning" style="width:95%" role="progressbar" aria-valuenow="52" aria-valuemin="0" aria-valuemax="100">95%</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="about-icon">
  <div class="container">
    <ul>
      <li> <img src="<?php echo base_url(); ?>assets/img/about-icon1.png" alt="icon"> </li>
      <li> <img src="<?php echo base_url(); ?>assets/img/about-icon2.png" alt="icon"> </li>
      <li> <img src="<?php echo base_url(); ?>assets/img/about-icon3.png" alt="icon"> </li>
      <li> <img src="<?php echo base_url(); ?>assets/img/about-icon4.png" alt="icon"> </li>
      <li> <img src="<?php echo base_url(); ?>assets/img/about-icon5.png" alt="icon"> </li>
    </ul>
  </div>
</div>
<div class="queryDiv">
  <div class="container">
    <div class="queryDiv-lft"><img src="<?php echo base_url(); ?>assets/img/about-us-big-img1.jpg" alt="img"></div>
    <div class="queryDiv-rht">
      <h2> Have Query? </h2>
      <form id="myForm" action="<?= base_url().'home/add_user_query' ?>" method="post">
        <ul>
          <li>
            <label>Name</label>
            <input name="name" type="text" placeholder="Enter Your Name">
          </li>
          <li>
            <label>Email</label>
            <input name="email" type="text" placeholder="Your Email">
          </li>
          <li class="full">
            <label>Message</label>
            <textarea name="message" cols="" rows="" placeholder="Type Here"></textarea>
          </li>
        </ul>
        <button type="button" id="myButton" style="border:none;background:none;position:relative;float:right;"><img src="<?php echo base_url(); ?>assets/img/About-us-submit.png" alt="img"> </button>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
       $("#myButton").click(function() {
           $("#myForm").submit();
       });
    });
</script>


