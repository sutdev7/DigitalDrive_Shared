<?php defined('BASEPATH') OR exit('No direct script access allowed');?><main id="main"> 
  <?php   $msg = $this->session->flashdata('msg');   if(!empty($msg)) {  ?>  <section style="padding-top: 7%;">    <?php echo $msg; ?>  </section>  <?php  }    ($this->session->userdata('user_type') == 3)? $user_type = 'Client' : $user_type = 'Freelancer';    ?>
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
							<li><a href="<?php echo base_url(); ?>user-bio"><img src="<?php  echo base_url('assets/img/BioIcon-1A.png'); ?>" alt=""> <?=$user_type?> Bio</a></li>  

							<?php if($this->session->userdata('user_type') == 4) {?>
			                      <li class=""><a href="<?php echo base_url(); ?>portfolio"><img src="<?php  echo base_url('assets/img/GenderIcon-1A.png'); ?>" alt=""> Portfolio</a></li>
			                <?php } ?>

							<li><a href="<?php echo base_url(); ?>gender"><img src="<?php  echo base_url('assets/img/GenderIcon-1A.png'); ?>" alt=""> Gender</a></li>                <li><a href="<?php echo base_url(); ?>payment"><img src="<?php  echo base_url('assets/img/PaymentIcon-1A.png'); ?>" alt=""> Payment</a></li>
							<li><a href="<?php echo base_url(); ?>settings"><img src="<?php  echo base_url('assets/img/SettingIcon-1A.png'); ?>" alt=""> Settings</a></li>
							<li class="active"><a href="<?php echo base_url(); ?>reviews"><img src="<?php  echo base_url('assets/img/ReviewIcon-1A.png'); ?>" alt=""> Reviews</a></li>
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

					<div class="pro_img"> 
						<span class="pro_imgBox">
						<img src="{user_info}{user_image}{/user_info}" alt="Profile Image" /> <a href="#" class="uplod"></a> </span>              
						<h2><?php echo $this->session->userdata('user_name'); ?></h2>            
						<p>{user_info} {city} {/user_info}, {user_info} {state} {/user_info}, {user_info} {country} {/user_info}</p>           
						<a href="<?php echo base_url(); ?>public-profile" class="pro_imgBtn">View Public Profile</a> 
						<a href="<?php echo base_url(); ?>logout" class="pro_logout" ><img src="<?php  echo base_url('assets/img/logout.png'); ?>" alt=""></a> 
					
					</div>         

				</div>


				<div class="col-lg-9">            
				<div class="pro_info">             
				<h4>Reviews</h4>            
					<!--<div class="SearchPayHistory RvwSearch">                
					<div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy">               
						<input class="form-control" type="text" value="" placeholder="From">                
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>				
					</div>
					
					<div id="datepickerTo" class="input-group date" data-date-format="dd-mm-yyyy">                  
						<input class="form-control" type="text" value="" placeholder="To">               
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>				
					</div> 
					
					<input class="" type="submit" value="">              
					</div> -->
              <div class="RvwWrapper">
					<ul class="RvwLists">
					<?php
						
					if(count($reviews)>0){
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
									<!--<span class="TimeStamp">2 Days ago</span>	-->					
								</div>
							<!--<a class="EditRvw" data-toggle="modal" href="#EditReview"><img src="img/editIcon.png" alt=""/></a> 	-->				
						</li>
						<?php	} ?>
						
					<?php	}?>
					
					<?php if(count($reviews)==0){ ?>
						<li><div class="Txthldr">No Reviews</div></li>
						
						
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