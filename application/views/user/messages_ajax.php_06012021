<?php
if(isset($content['user_info'][0])) {
    foreach ($content['user_info'][0]['msghistory'] as $k => $value) {
        ?>
        <div class="chat-rht-sec <?php echo $value['className']?>" id="res">
            <div class="chat-back-img"> <span style="background:url(<?php echo $value['profileImage']?>) no-repeat center top; background-size:cover;"></span>
                <div class="chat-back-sec">
                    <div class="cap">
                        <p><?php echo $value['message_content']?></p><a href="<?php base_url().'uploads/messages/'.$value['attachement']?>"><?php echo $value['attachFile'] . $value['download']?></a>
                    </div>
                    <div class="cap2"><?php echo $value['date_time'].$value['readicon']?></div>
                </div>
            </div>
        </div>
        <?php
    }
}
?>