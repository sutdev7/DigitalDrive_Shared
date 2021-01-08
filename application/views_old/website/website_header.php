<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!--==========================
    Header
  ============================-->
<header id="header" class="innerHr">
    <div class="container">
        <div id="logo" class="pull-left"> <a href="<?php echo base_url(); ?>" class="scrollto"> <img src="<?php  echo base_url('assets/img/logo.png'); ?>" alt=""> </a> </div>
        <nav id="nav-menu-container">
            <ul class="nav-menu sf-js-enabled sf-arrows" style="touch-action: pan-y;">
                <li>
                    <div class="form-group has-search"> <span class="fa fa-search form-control-feedback"></span>
                        <input type="text" class="form-control" placeholder="Search For Services">
                    </div>
                </li>
                <li><a href="<?php echo base_url(); ?>how-it-works">How It Works</a></li>
                <li><a href="<?php echo base_url(); ?>browse-task">Browse Task</a></li>
                <li><a href="<?php echo base_url(); ?>browse-freelancer">Browse Freelancer</a></li>
                <li><a href="<?php echo base_url(); ?>sign-in">Sign in</a></li>
                <?php
			if($this->session->userdata('user_type') =='' || !$this->session->userdata('user_type')){
		?>
                <li><a href="<?php echo base_url(); ?>sign-up-as">Sign up</a></li>
                <?php		
			}
		?>
                <li class="contactBtn"><a href="<?php echo base_url(); ?>post-task-step-1">Post a Task</a></li>
                <li class="contactBtn lstb"><a href="<?php echo base_url(); ?>sign-in" data-toggle="tooltip" data-placement="top" title="Get Earn! Create Freelancer Account">Freelancer?</a></li>
                <li class="contactBtn lstb"><a href="<?php echo base_url(); ?>sign-in" data-toggle="tooltip" data-placement="top" title="Outside Of Portal? Don’t Have Account For Quick Earn Get Account For Freelancer For Search Talent For Ur Project Get Client Room Account .">Room?</a></li>
            </ul>
        </nav>
        <!-- #nav-menu-container -->
    </div>
</header>
<!-- #header -->

<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });

</script>
