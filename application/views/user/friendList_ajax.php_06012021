<?php
if(isset($content['user_info'][0])) {
    foreach ($content['user_info'][0]['frndlist'] as $k => $value) {
        ?>
        <li class="nav-item">
            <a class="<?php echo $value['active'].$value['mclass']?>" href="<?php echo base_url('messages/'.$value['user_id']); ?>">
                <div class="ImgHldrWrapper <?php echo $value['is_login'];?>">
                    <div class="imghldr" style="background:url(<?php echo base_url().$value['profile_image']?>) no-repeat center top; background-size:cover;">
                    </div>
                    <?php
                    if($value['totalmessage'] > 0) {
                        ?>
                        <span class="stat"><?php echo $value['totalmessage'];?></span>
                        <?php
                    }
                    ?>
                </div>
                <div class="txthldr">
                    <h2><?php echo $value['name'];?></h2> <!--({task_name})
                            <p>{address}, {city}, {state}, {country}</p>-->
                </div>
            </a>
        </li>
        <?php
    }
}
?>