<main id="main"> 

  <!--==========================
      ConterDiv Section
      ============================-->
      <section id="profile_section">
        <div class="profile PublicProfile">
          <div class="container">
<!--
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">My Profile</a></li>
            <li class="breadcrumb-item active" aria-current="page">Public Profile</li>
          </ol>
        </nav>
      -->
      <div class="row">
        <div class="col-lg-8">
          <div class="pro_info">
            <div class="CandidatePublicPfl">
              <ul class="RvwLists">
                <li>
                  <div class="PflImgHldrWrpr">
                    <div class="Imghldr" style="background:url({user_info}{user_image}{/user_info}) no-repeat center center; background-size:cover;"></div>
                  {user_info} {is_login} {/user_info}</div>
                  <div class="Txthldr">
                    <h2>{user_info}{name}{/user_info}<!--<span class="text-muted ml-3" style="font-size: 14px">4 +</span>--></h2>
                    <ul class="CanditateDtls">
                      <li><img src="<?= base_url().'assets/img/round-img1.png' ?>" alt=""/>{user_info}{address}{/user_info}, {user_info}{city}{/user_info}, {user_info}{state}{/user_info},{user_info}{country}{/user_info}</li>
                      <!--                        <li><img src="img/genderIcon.png" alt=""/> Male</li>-->
                    </ul>
                    <span class="plus"> {user_info}{total_positive_coins}{/user_info} Coins</span>
                    <span class="plus plus2"> {user_info}{total_negative_coins}{/user_info} Coins</span>

                      <!--<span class="plus"> + {user_info}{total_positive_coins}{/user_info} Coins</span>
                        <span class="plus plus2 pl-3" style="background-image: none !important"> 4 + rating</span>-->

                      </div>
                      <div class="clearfix"></div>
                      <p>{user_info}{bio}{/user_info}</p>
                    </li>
                  </ul>
                </div>
                <!--<a class="EditButton" data-toggle="" href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a> -->
              </div>

              <div class="pro_info">
               <h4>Skills</h4>
               {user_info}
               <ul class="AreaOption">
                {user_skills} 
                <li><span>{skill_name} <!-- <a href="#"><img src="<?php  //echo base_url('assets/img/removeIcon.png'); ?>" alt=""/></a> --></span></li>
                {/user_skills}
              </ul>
              {/user_info}
              <!--<a class="EditButton" data-toggle="" href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a> -->
            </div>

            <div class="pro_info">
              <div class="view-box-two p-0">
                <h4>Portfolio</h4>
                <div class="col-lg-12 portfolioback">
                <div class="row">

                    <?php
                    if( !empty($portfolio)){
                      foreach($portfolio as $portfolios){?>
                          <div class="col-md-4 pmargintop">
                            <div class="ptotalblock">
                              <?php if($portfolios->portfolio_image == '') {?>
                              <img src="<?php echo base_url(); ?>/uploads/user/portfolio_image/no_image.png" style="width: 100%;height: 220px;">
                              <?php }else{ ?>
                              <img src="<?php echo base_url(); ?>/uploads/user/portfolio_image/<?php echo $portfolios->portfolio_image; ?>" style="width: 100%;height: 220px;"> 
                              <?php } ?>
                              <div class="ptitle"><?php echo  $portfolios->portfolio_url ?>                           
                                <!-- <div class="pdesc"><?php echo  $portfolios->portfolio_desc ?>
                                </div> -->
                              </div>
                            </div>
                          </div> 
                    <?php }} else{

                      echo "No Portfolio Added";
                    }?>
                </div>
                </div>
              </div>
            </div>    




            <div class="pro_info">
              <div class="view-box-two p-0">
                <h4>Popular Projects</h4>
            <!--<div class="view-box-two-box">
              <div class="view-box-two-box-lft mb-3">
                
                <div class="pl-0 caption">
                  <h3> Mobile app development</h3>
                  <p class="text-success"> $ 500 </p> 
                  
                  
                  </div>
              </div>
              <div class="view-box-two-box-rht"> <a href="task-details.html" class="view-btn"> View Details </a> </div>
              <div class="full">
                
                <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
              </div>
            </div>
            <div class="view-box-two-box">
              <div class="view-box-two-box-lft mb-3">
                
                <div class="pl-0 caption">
                  <h3> Mobile app development</h3>
                  <p class="text-success"> $ 500 </p> 
                  
                  
                  </div>
              </div>
              <div class="view-box-two-box-rht"> <a href="task-details.html" class="view-btn"> View Details </a> </div>
              <div class="full">
                
                <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
              </div>
            </div>
            <div class="view-box-two-box">
              <div class="view-box-two-box-lft mb-3">
                
                <div class="pl-0 caption">
                  <h3> Mobile app development</h3>
                  <p class="text-success"> $ 500 </p> 
                  
                  
                  </div>
              </div>
              <div class="view-box-two-box-rht"> <a href="task-details.html" class="view-btn"> View Details </a> </div>
              <div class="full">
                
                <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
              </div>
            </div>-->
          </div>
        </div>
        <div class="pro_info">
          <h4>Reviews</h4>
          <div class="RvwWrapper">
            <ul class="RvwLists">									<?php											if(count($reviews>0)){							foreach($reviews as $rv){						?>
              <li>
                <div class="PflImgHldrWrpr">								<div class="Imghldr" style="background:url(img/img-profile.jpg) no-repeat center center; background-size:cover;"></div>																<a class="pull-left" href="<?php echo base_url().'public-profile/'.$rv['profile_id']; ?>" target="_blank"> <img class="media-object img-circle " src="<?php echo $rv['profile_image']; ?>" style="width:69px;height:69px;"> </a>													</div> 
                <div class="Txthldr">									<h2><?php echo $rv['name']; ?></h2>									<h5><?php echo $rv['country'] ?>, <?php echo $rv['state']; ?>, <?php echo $rv['city']; ?></h5>									<p><?php echo $rv['review_provided']; ?></p>								<span class="plus"><?php echo $rv['total_positive_coins'] ?> Coins</span> <span class="plus plus2"> <?php echo $rv['total_negative_coins'] ?> Coins</span>							<!--<span class="TimeStamp">2 Days ago</span>	-->											</div>
              </li>
            <?php	} ?>											<?php	}?>										<?php if(count($reviews)==0){ ?>						<li><div class="Txthldr">No Reviews</div></li>																	<?php } ?> 
          <!--        <li>
                    <div class="PflImgHldrWrpr">
                      <div class="Imghldr" style="background:url(img/img-profile.jpg) no-repeat center center; background-size:cover;"></div>
                      <img src="img/activeIcon.png" alt=""/></div>
                    <div class="Txthldr">
                      <h2>Bob Frapples</h2>
                      <h5>Sydney, NSW, Australia</h5>
                      <p>Great freelancer ! always work hard simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                      <span class="plus">+ 2 Coins</span>
                      <span class="plus plus2">- 2 Coins</span>
                      
                       <span class="TimeStamp">2 Days ago</span> </div>
                     </li> -->

                     <!-- <li><a style="color:#1189f9; font-weight:700;" href="#">Show Me More</a></li>-->
                   </ul>
                 </div>
               </div>
             </div>
             <div class="col-lg-4">
              <div class="RhtSidePnl">

                <div class="address-div">
<!--
                    <div class="full">
                      <h3> Address <span> <a href="#EditArea66" data-toggle="modal"><img src="img/editIcon.png" alt="img"> </a> </span> </h3>
                      <p> <big> 2095 Youngstown <br>
                        Kingsville Rd, Vienna, <br>
                        OH, 44410 </big> </p>
                    </div>
                  -->
<!--
                    <div class="full">
                      <h3> Language <span> <a href="#EditArea-lan" data-toggle="modal"> <img src="img/editIcon.png" alt="img"> </a> </span> </h3>
                      <p> <big> English, Spanish </big> </p>
                    </div>
                  -->

                  <div class="opening-task">
                    <div class="spansec"> <img src="<?= base_url().'assets/img/round-icon1.png' ?>" alt="img"> </div>
                    <div class="caption"> <big> 250+ </big> <em> Completed Tasks</em> </div>
                  </div>
                  <div class="opening-task">
                    <div class="spansec"> <img src="<?= base_url().'assets/img/round-icon2.png' ?>" alt="img"> </div>
                    <div class="caption"> <big> $500,00 </big> <em> Spent on Hire-n-Work </em> </div>
                  </div>


                </div>


                <div class="RvwWrapper">
                  <h3>Past Projects Ratings</h3>
                  <ul class="RvwLists">
                    <li>
                      <div class="PflImgHldrWrpr">
                        <div class="Imghldr" style="background:url(img/img-profile.jpg) no-repeat center center; background-size:cover;"></div>
                        <img src="img/activeIcon.png" alt=""></div>
                        <div class="Txthldr">
                          <h2>Bob Frapples</h2>
                          <h5>Sydney, NSW, Australia</h5>

                          <span class="plus">+ 2 Coins</span>
                          <span class="plus pl-2" style="background-image: none !important">3 rating</span>

                        </div>
                      </li>
                      <li>
                        <div class="PflImgHldrWrpr">
                          <div class="Imghldr" style="background:url(img/img-profile.jpg) no-repeat center center; background-size:cover;"></div>
                          <img src="img/activeIcon.png" alt=""></div>
                          <div class="Txthldr">
                            <h2>Bob Frapples</h2>
                            <h5>Sydney, NSW, Australia</h5>
                            <span class="plus">+ 2 Coins</span>
                            <span class="plus pl-2" style="background-image: none !important">4 rating</span>

                          </div>
                        </li>
                        <li>
                          <div class="PflImgHldrWrpr">
                            <div class="Imghldr" style="background:url(img/img-profile.jpg) no-repeat center center; background-size:cover;"></div>
                            <img src="img/activeIcon.png" alt=""></div>
                            <div class="Txthldr">
                              <h2>Bob Frapples</h2>
                              <h5>Sydney, NSW, Australia</h5>
                              <span class="plus">+ 2 Coins</span>
                              <span class="plus pl-2" style="background-image: none !important">4.5 rating</span>
                            </div>
                          </li>
                        </ul>
                      </div>


                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </main>