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
                      <div class="Imghldr" style="background:url({user_image}) no-repeat center center; background-size:cover;"></div>
                      <img src="<?= base_url().'assets/img/activeIcon.png' ?>" alt=""/></div>
                    <div class="Txthldr">
                      <h2>{name}<span class="text-muted ml-3" style="font-size: 14px">4 +</span></h2>
                      <ul class="CanditateDtls">
                        <li><img src="<?= base_url().'assets/img/round-img1.png' ?>" alt=""/> {address}, {city}, {state}, {country}</li>
<!--                        <li><img src="img/genderIcon.png" alt=""/> Male</li>-->
                      </ul>
                      <span class="plus"> + {total_cash} Coins</span>
                      <span class="plus plus2 pl-3" style="background-image: none !important"> 4 + rating</span>
                      
                      </div>
                    <div class="clearfix"></div>
                    <p>{bio}</p>
                  </li>
                </ul>
              </div>
              <!--<a class="EditButton" data-toggle="" href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a> -->
			</div>
			<div class="pro_info">
			  <h4>Skills</h4>
			  <ul class="AreaOption">
				{user_skills}
				<li><span>Photoshop <a href="#"></a></span></li>
				{/user_skills}
			  </ul>
			  <!--<a class="EditButton" data-toggle="" href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a> -->
			</div>
              <div class="pro_info">
                          <div class="view-box-two p-0">
            <h4>Popular Projects</h4>
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
          </div>
              </div>
            <div class="pro_info">
              <h4>Reviews</h4>
              <div class="RvwWrapper">
                <ul class="RvwLists">
                  <li>
                    <div class="PflImgHldrWrpr">
                      <div class="Imghldr" style="background:url(img/img-profile.jpg) no-repeat center center; background-size:cover;"></div>
                      <img src="img/activeIcon.png" alt=""/></div>
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
                      <div class="Imghldr" style="background:url(img/img-profile.jpg) no-repeat center center; background-size:cover;"></div>
                      <img src="img/activeIcon.png" alt=""/></div>
                    <div class="Txthldr">
                      <h2>Bob Frapples</h2>
                      <h5>Sydney, NSW, Australia</h5>
                      <p>Great freelancer ! always work hard simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                      <span class="plus">+ 2 Coins</span>
                      <span class="plus plus2">- 2 Coins</span>
                      
                       <span class="TimeStamp">2 Days ago</span> </div>
                  </li>
                  
                  <li><a style="color:#1189f9; font-weight:700;" href="#">Show Me More</a></li>
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