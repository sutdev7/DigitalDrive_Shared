<?php //echo "<pre>";print_r($content);echo "</pre>";die;

if(!empty($content)) {
    foreach ($content as $k => $row) {  if($row['user_type'] != 1) {  ?>
        <div class="chat_list <?php if($row['user_id'] ==  $this->uri->segment('3')) echo 'active_chat' ?>">			
		 <div class="chat_people">	
		  <div class="chat_img"> 
		   <a href="<?php echo base_url()."public-profile/".$row['profile_id'] ?>"><img src="<?php echo base_url().$row['profile_image']; ?>" alt="<?= $row['name'] ?>" width="46" title="View profile Details">
		    <?php if($row['login_session'] == 'l') : ?>
			<i class="online"></i>
			<?php else : ?>
			<i class="offline"></i>
			<?php endif; ?>
			
		   </a>
			<?php if($row['totalmessage'] > 0) : ?>
                  <span class="msg-count"><?= $row['totalmessage'] ?></span>
			<?php endif; ?>
			
		   </div>												   
		    <div class="chat_ib">
			 <h5> <a href="<?= base_url() ?>admin/view-messages/<?php echo $row['user_id']; ?>" title="View Messages">
			 <?= $row['name'] ?> <span class="chat_date"> (<?php if ($row['user_type'] == 3) {																	echo 'client';																} else if ($row['user_type'] == 4) {																	echo 'freelancer';																}															?>)</span></a></h5>		
			 </div>												
			 </div>											 
			 </div>
<?php    } } } ?>