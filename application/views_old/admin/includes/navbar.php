<?php 
$sql            = "select admin_notification.* from admin_notification where admin_notification.is_read = 'N'";
$query          = $this->db->query($sql);
$notifications  = $query->result();
//c_pr($notifications);
?>

<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="" class="nav-link">Hi! Welcome to Admin Panel</a>
      </li>
    </ul>
    <ul class="nav navbar-nav pull-right">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Notification (<b><?php echo count($notifications); ?></b>)</a>
            <ul class="dropdown-menu notify-drop">
                <div class="drop-content notification_content">
                    
                </div>
            </ul>
        </li>
      </ul>
  </nav>
<!-- /.navbar -->
  
<?php $this->load->view('admin/includes/sidebar') ?>
  
  