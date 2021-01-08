<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

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
        <div class="col-lg-8">
          <div class="task_Left">
            <div class="task_Left_Div">
              
              <h3 class="mt-0">{microkey_title} </h3>
				<p class="mb-3">{user_name}</p>
                       <span> <a href="#">{microkey_category}</a> <a href="#">{microkey_subcategory}</a> <a href="#">Dreamweaver</a> <a href="#">Illustrator</a> </span>
				<div class="mb-3">
					<ul class="Portfolio_img">
                <li class="w-100 mb-4">
                  <div class="Portfolio_box w-auto h-100"> 
                    <img src="{microkey_image}" class="w-100 h-100" alt="" style="width:650px;height:284px;">
                    <div class="Por_overlay"> <a href="img/banner.jpg" class="venobox" data-gall="gallery-carousel"> <img src="{microkey_image}" alt=""></a> <a href="#" class="download"> <img src="img/down.png" alt=""style="width:650px;height:284px;"></a> </div>
                  </div>
              <!-- <div style="background: url('img/about-us-big-img1.jpg'); background-size: cover; height: 200px;border: 1px solid #dfdfdf; border-radius: 0.25rem ; margin-bottom: 15px">
                    
                  </div> -->
              
                </li>
                <li>
                  <div class="Portfolio_box"> <img src="{portfolio_img1}" alt="">
                    <div class="Por_overlay"> <a href="img/p1.png" class="venobox" data-gall="gallery-carousel"> <img src="{portfolio_img1}" alt=""></a> <a href="#" class="download"> <img src="{portfolio_img1}" alt=""></a> </div>
                  </div>
                </li>
                <li>
                  <div class="Portfolio_box"> <img src="{portfolio_img2}" alt="">
                    <div class="Por_overlay"> <a href="img/p1.png" class="venobox" data-gall="gallery-carousel"> <img src="{portfolio_img2}" alt=""></a> <a href="#" class="download"> <img src="{portfolio_img2}" alt=""></a> </div>
                  </div>
                </li>
                <li>
                  <div class="Portfolio_box"> <img src="{portfolio_img3}" alt="">
                    <div class="Por_overlay"> <a href="img/p1.png" class="venobox" data-gall="gallery-carousel"> <img src="{portfolio_img3}" alt=""></a> <a href="#" class="download"> <img src="{portfolio_img3}" alt=""></a> </div>
                  </div>
                </li>
                <li>
                  <div class="Portfolio_box"> <img src="{portfolio_img4}" alt="">
                    <div class="Por_overlay"> <a href="img/p1.png" class="venobox" data-gall="gallery-carousel"> <img src="{portfolio_img4}" alt=""></a> <a href="#" class="download"> <img src="{portfolio_img4}" alt=""></a> </div>
                  </div>
                </li>
              </ul>
					<div class="clearfix"></div>
				</div>
              
              <p>{microkey_description}</p>
              <div class="task_info"><h5>Seller Details </h5> 
				  <div class="media"> 
				  <a class="pull-left" href="#"> <img class="media-object img-circle " src="{user_state}"> </a>
              <div class="media-body">
                <h2>{user_name} <span class="float-right w-auto"><a href="#"><i class="fa fa-comment"></i></a></span></h2>
                <p>{user_city}, {user_state}, {user_country}</p><br>
                <p>{user_skills}</p>
                <h3>{user_total_positive_coins}</h3>
				  <h3>- {user_total_negative_coins}</h3>
              </div>
					  
            </div>
			<div class="row">
				<div class="col-sm-4">
					  	<h3 class="mb-1">{user_projects}</h3>
						<p class="small">Completed Projects</p>
					  </div>
				<div class="col-sm-4">
					  	<h3 class="mb-1">$500,00</h3>
						<p class="small">Earn on Projects</p>
					  </div>
				<!--<div class="col-sm-4">
					  	<h3 class="mb-1"><i class="fa fa-heart mr-1 text-danger"></i>130</h3>
						<p class="small">People Liked</p>
					  </div>-->
			</div>
				  
				</div>
              <div class="mt-3">
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
				  </div>
            </div>
            
            
            <div class="task_Left_Div mt-3" style="display:none;">
          <h3 class="mt-0 small">Order Details</h3>
          <h5 class="mb-2 mt-4">I need a UI designer for my Mobile app</h5>
          <small> Posted on 24th January </small>
          <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. <a href="#"> More </a> </p>

          <div class="task_info"> 
			  <div class="row">
			  <span class="col-sm-4"><h5> Hours to be determined</h5>
                <em> Hourly</em></span>
                <span class="col-sm-4">
                <h5>Project length</h5>
                <em>1 month</em> </span> 
			  <span class="col-sm-4">
                <h5>Level</h5>
                <em>Intermediate</em> </span>
			</div>
				</div>
                <button type="submit" class="btn big-btn mt-3 float-right">Confirm this order</button>
              
        </div>
			  <div class="pro_info mt-3">
              <h3 class="small">Reviews</h3>
              <div class="RvwWrapper">
                <ul class="RvwLists">
                  <?php
            
         if(count($reviews>0)){
              foreach($reviews as $rv){
            ?>
                  <li>
               <div class="PflImgHldrWrpr">
                <div class="Imghldr" style="background:url(img/img-profile.jpg) no-repeat center center; background-size:cover;"></div>
                
                <a class="pull-left" href="<?php echo base_url().'public-profile/'.$rv['profile_id']; ?>" target="_blank"> <img class="media-object img-circle " src="<?php echo $rv['profile_image']; ?>" style="width:69px;height:69px;"> </a>                
              </div> 
                
                
                <div class="Txthldr">
                  <h2><?php echo $rv['name']; ?></h2>
                  <h5><?php echo $rv['country'] ?>, <?php echo $rv['state']; ?>, <?php echo $rv['city']; ?></h5>
                  <p><?php echo $rv['review_provided']; ?></p>
                  <?php if ($rv['coins'] < 0){ ?>
                  <span class="plus plus2"><?php echo $rv['coins'] ?> Coins</span>
                  <?php }else{?>
                    <span class="plus">+ <?php echo $rv['coins'] ?> Coins</span>
                  <?php } ?>                  
                  <!--<span class="TimeStamp">2 Days ago</span> -->         
                </div>
              <!--<a class="EditRvw" data-toggle="modal" href="#EditReview"><img src="img/editIcon.png" alt=""/></a>  -->       
            </li>
             <?php } } ?>  
                  
                    
                </ul>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-lg-4">
          <div class="task_Right_Div">
           
           
            <div class="offerDiv">
              <h4>Order Details </h4>
              <ul>
                <li>
                	<h3>I need a UI designer for my Mobile app</h3>
            <p class="mb-1">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        
                </li>
                </ul>
                  
              
            </div>
			   <a href="#" class="eyeBtn">Confirm This Order</a>
          </div>
        </div> 
        
      </div>
    </div>
  </section>
</main>

<script> 
	$(document).ready(function() {
		$('.saveBtn').on('click',function(){
			$.ajax({
				  type: "POST",
				  url: "<?= base_url().'save-job' ?>",
				  data: {taskId : '<?= $this->uri->segment(2) ?>' },
				  dataType: "text",
				  success: function(resultData){ 
					  $('.HireBtn').removeClass('saveBtn');
					  $('#txtShow').html('Job Saved ').css("color", '#ccc');
					  
				  }
			});
		});
		$('.flagBtn').on('click',function(){
			$.ajax({
				  type: "POST",
				  url: "<?= base_url().'save-inappropriate' ?>",
				  data: {taskId : '<?= $this->uri->segment(2) ?>' },
				  dataType: "text",
				  success: function(resultData){ 
					  $('.flb').removeClass('flagBtn');
					  $('#txtflag').html('Already Flaged This Job As an inappropriate').css("color", '#25bef3');
					  
				  }
			});
		});
	});
	
	function copyToClipboard(element) {
	  var $temp = $("<input>");
	  $("body").append($temp);
	  $temp.val($(element).attr('href')).select();
	  document.execCommand("copy");
	  alert('Linked Copied');
	  $temp.remove();
	}
	
	
</script>	