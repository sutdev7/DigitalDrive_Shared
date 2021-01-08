<?php if (!empty($notifications)) { ?>
    <?php foreach ($notifications as $row) { ?>
        <li>
            <div class="col-sm-12 pd-l0">
                <a href="javascript:void(0);" class="read_notification_cls" data-message_id="<?php echo $row->id; ?>"> <?php echo $row->message_content; ?></a>
                <p class="time"><?php echo $row->date_time; ?></p>
            </div>
        </li>
    <?php } ?>
<?php } else { ?>
    <li>
        <div class="col-sm-12 pd-l0">
            No Notifications
        </div>
    </li>
<?php } ?>