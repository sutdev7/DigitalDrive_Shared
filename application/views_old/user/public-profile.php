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
  ?>

  <!--==========================
      ConterDiv Section
    ============================-->
  <section id="profile_section">
    <div class="profile PublicProfile">
      <div class="container">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">My Profile</a></li>
            <li class="breadcrumb-item active" aria-current="page">Public Profile</li>
          </ol>
        </nav>
        <div class="row">
          <div class="col-lg-8">
            <div class="pro_info">
              <div class="CandidatePublicPfl">
                <ul class="RvwLists">
                  <li>
                    <div class="PflImgHldrWrpr">
                      <div class="Imghldr" style="background:url('{user_info}{user_image}{/user_info}') no-repeat center center; background-size:cover;"></div>
                      {user_info} {is_login} {/user_info}</div>
                    <div class="Txthldr">
                      <h2>{user_info}{name}{/user_info}</h2>
                      <ul class="CanditateDtls">
                        <li><img src="<?php  echo base_url('assets/img/round-img1.png'); ?>" alt=""/>{user_info} {address} {/user_info}, {user_info} {city} {/user_info}, {user_info} {state} {/user_info}, {user_info} {country} {/user_info}</li>
                        <li><img src="<?php  echo base_url('assets/img/genderIcon.png'); ?>" alt=""/> {user_info} {gender} {/user_info}</li>
                      </ul>
                      <span class="plus"> {user_info}{total_positive_coins}{/user_info} Coins</span>
                      <span class="plus plus2"> {user_info}{total_negative_coins}{/user_info} Coins</span>
                      
                      </div>
                    <div class="clearfix"></div>
                    <p>{user_info} {bio} {/user_info}</p>
                    <!--<p>It has survived not only five centuries, but also the leap into electronic 
                      typesetting, remaining essentially unchanged. It was popularised in the 1960s 
                      with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including 
                      versions of Lorem Ipsum.</p>-->
                  </li>
                </ul>
              </div>
              <!--<a class="EditButton" data-toggle="modal" href="#EditReview10"><i class="fa fa-pencil" aria-hidden="true"></i></a>--> </div>
            <div class="pro_info">
              <h4>Area</h4>
              {user_info}
              <ul class="AreaOption">
                {user_skills} 
                <li><span>{skill_name} <!-- <a href="#"><img src="<?php  //echo base_url('assets/img/removeIcon.png'); ?>" alt=""/></a> --></span></li>
                {/user_skills} 
              </ul>
              {/user_info}
              <!--<a class="EditButton" data-toggle="modal" href="#EditArea"><i class="fa fa-pencil" aria-hidden="true"></i></a>--> </div>
            <div class="pro_info">
              <h4>Reviews</h4>
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
								    <span class="plus"> <?php echo $rv['total_positive_coins'] ?> Coins</span> <span class="plus plus2"> <?php echo $rv['total_negative_coins'] ?> Coins</span>
									<!--<span class="TimeStamp">2 Days ago</span>	-->					
						</div>

                  </li>

                 		<?php	} ?>
						
					<?php	}?>
					
					<?php if(count($reviews)==0){ ?>
						<li><div class="Txthldr">No Reviews</div></li>
						
						
					<?php } ?> 
 

                </ul>

			  
			  
                <!--<ul class="RvwLists">
                  <li>
                    <div class="PflImgHldrWrpr">
                      <div class="Imghldr" style="background:url(<?php  echo base_url('assets/img/img-profile.jpg'); ?>) no-repeat center center; background-size:cover;"></div>
                      <img src="<?php  echo base_url('assets/img/activeIcon.png'); ?>" alt=""/></div>
                    <div class="Txthldr">
                      <h2>Bob Frapples</h2>
                      <h5>Sydney, NSW, Australia</h5>
                      <p>Great freelancer ! always work hard simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                      <span class="plus">+ 2 Coins</span>
                      <span class="plus plus2"> - 2 Coins</span>
                       <span class="TimeStamp">2 Days ago</span> </div>
                  </li>
                  <li>
                    <div class="PflImgHldrWrpr">
                      <div class="Imghldr" style="background:url(<?php  echo base_url('assets/img/img-profile.jpg'); ?>) no-repeat center center; background-size:cover;"></div>
                      <img src="<?php  echo base_url('assets/img/activeIcon.png'); ?>" alt=""/></div>
                    <div class="Txthldr">
                      <h2>Bob Frapples</h2>
                      <h5>Sydney, NSW, Australia</h5>
                      <p>Great freelancer ! always work hard simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                      <span class="minus">- 2 Coins</span> 
                      <span class="minus minus2">+ 2 Coins</span> 
                      
                      <span class="TimeStamp">2 Days ago</span> </div>
                  </li>
                  <li>
                    <div class="PflImgHldrWrpr">
                      <div class="Imghldr" style="background:url(<?php  echo base_url('assets/img/img-profile.jpg'); ?>) no-repeat center center; background-size:cover;"></div>
                      <img src="<?php  echo base_url('assets/img/activeIcon.png'); ?>" alt=""/></div>
                    <div class="Txthldr">
                      <h2>Bob Frapples</h2>
                      <h5>Sydney, NSW, Australia</h5>
                      <p>Great freelancer ! always work hard simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                      <span class="plus">+ 2 Coins</span>
                      <span class="plus plus2">- 2 Coins</span>
                      
                       <span class="TimeStamp">2 Days ago</span> </div>
                  </li>
                  <li>
                    <div class="PflImgHldrWrpr">
                      <div class="Imghldr" style="background:url(<?php  echo base_url('assets/img/img-profile.jpg'); ?>) no-repeat center center; background-size:cover;"></div>
                      <img src="<?php  echo base_url('assets/img/activeIcon.png'); ?>" alt=""/></div>
                    <div class="Txthldr">
                      <h2>Bob Frapples</h2>
                      <h5>Sydney, NSW, Australia</h5>
                      <p>Great freelancer ! always work hard simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                      <span class="minus"> - 2 Coins</span> 
                      <span class="minus minus2"> + 2 Coins</span> 
                       
                      <span class="TimeStamp">2 Days ago</span> 
                      </div>
                  </li>
                  <li><a style="color:#1189f9; font-weight:700;" href="<?php echo base_url(); ?>reviews">Show Me More</a></li>
                </ul>-->
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="RhtSidePnl">
            
                <div class="address-div">
                    <div class="full">
                      <h3> Address <span> <!-- <a href="#EditArea66" data-toggle="modal"><img src="<?php echo base_url('assets/img/editIcon.png'); ?>" alt="img"> </a> --> </span> </h3>
                        <p> <big> {user_info} {address} {/user_info} </big> </p>
                    </div>
                    <div class="full">
                      <h3> Language <span> <!-- <a href="#EditArea-lan" data-toggle="modal"> <img src="<?php echo base_url('assets/img/editIcon.png'); ?>" alt="img"> </a> --> </span> </h3>
                        <p> <big> {user_info} {user_languages} {/user_info} </big> </p>
                    </div>
                        
<!--                    <div class="opening-task">
                        <div class="spansec"> <img src="<?php echo base_url('assets/img/round-icon1.png'); ?>" alt="img"> </div>
                        <div class="caption"> <big> 250+ </big> <em> Opening Tasks</em> </div>
                    </div>
                    <div class="opening-task">
                        <div class="spansec"> <img src="<?php echo base_url('assets/img/round-icon2.png'); ?>" alt="img"> </div>
                        <div class="caption"> <big> $500,00 </big> <em> Spent on Hire-n-Work </em> </div>
                    </div>-->
                        
                        
                </div>
            
            
                <div class="RvwWrapper">
                    <h3>Top Freelancer</h3>
                    <ul class="RvwLists">
                        <?php if (isset($top_freelancers) && !empty($top_freelancers)) { ?>
                            <?php foreach ($top_freelancers as $fRow) { ?>
                                <li>
                                    <div class="PflImgHldrWrpr">
                                        <div class="Imghldr" style="background:url(<?php echo $fRow->user_profile_image; ?>) no-repeat center center; background-size:cover;"></div>
                                        <?php if ($fRow->is_login) { ?>
                                            <img src="<?php echo base_url('assets/img/activeIcon.png'); ?>" alt=""></div>
                                        <?php } ?>
                                    <div class="Txthldr">
                                        <h2><?php echo $fRow->name; ?></h2>
                                        <h5><?php echo $fRow->city . ', ' . $fRow->state . ', '. $fRow->country; ?></h5>
                                        <span class="plus">+ <?php echo $fRow->total_positive_coins; ?> Coins</span>
                                        <span class="plus"> <?php echo $fRow->total_negative_coins; ?> Coins</span>
                                    </div>
                                </li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
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