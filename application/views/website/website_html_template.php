<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demoupdates.com/updates/nlaucer/html/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Oct 2019 18:28:53 GMT -->
<head>
  <meta charset="utf-8">
  <title><?php echo (isset($title)) ? $title :"Hire-n-Work" ?></title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Bootstrap CSS File -->
  <link href="<?php  echo base_url('assets/plugin/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="<?php  echo base_url('assets/plugin/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
  <link href="<?php  echo base_url('assets/plugin/animate/animate.min.css'); ?>" rel="stylesheet">
  <link href="<?php  echo base_url('assets/plugin/venobox/venobox.css'); ?>" rel="stylesheet">
  <link href="<?php  echo base_url('assets/plugin/owlcarousel/assets/owl.carousel.min.css'); ?>" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="<?php  echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
  <link href="<?php  echo base_url('assets/css/sb-admin-2.css'); ?>" rel="stylesheet">
  <style>
    #Work span.line1 {
      top: 30%;
      left: 44%;
    } 

    #Work span.line2 {
      top: 64%;
      left: 42%;
    }
	.field-icon{
		float: right;
		margin-right: 23px;
		margin-top: -31px;
		position: relative;
		z-index: 2;
	}
  </style>

  <script src="<?php  echo base_url('assets/plugin/jquery/jquery.min.js'); ?>"></script> 
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
  <script src="<?php  echo base_url('assets/plugin/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script> 
</head>


<?php
$bodyCSS = '';
if($this->uri->segment(1, 0) == 'privacy-policy' || $this->uri->segment(1, 0) == 'terms-and-condition'){
    $bodyCSS = ' style="background:#f6f8fa;"';
}
?>
<body<?= $bodyCSS ?>>
<?php  $this->load->view('website/website_header'); ?>
{content}
<?php  $this->load->view('website/website_footer'); ?>
<a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a> 

<!-- JavaScript Libraries --> 
<script src="<?php  echo base_url('assets/plugin/jquery/jquery-migrate.min.js'); ?>"></script> 
<script src="<?php  echo base_url('assets/plugin/easing/easing.min.js'); ?>"></script> 
<script src="<?php  echo base_url('assets/plugin/superfish/hoverIntent.js'); ?>"></script> 
<script src="<?php  echo base_url('assets/plugin/superfish/superfish.min.js'); ?>"></script> 
<script src="<?php  echo base_url('assets/plugin/wow/wow.min.js'); ?>"></script> 
<script src="<?php  echo base_url('assets/plugin/venobox/venobox.min.js'); ?>"></script> 
<script src="<?php  echo base_url('assets/plugin/owlcarousel/owl.carousel.min.js'); ?>"></script> 
<script src="<?php  echo base_url('assets/js/main.js'); ?>?v=0.0.2"></script>
<!--script only for home page--> 
<!--<script>
jQuery(function($) {
 $(window).scroll(function() {
   if($('header').hasClass('header-scrolled')) {
     $('header .pull-left .scrollto img').attr('src','img/logo.png');
   }else{
     $('header .pull-left .scrollto img').attr('src','img/logo-2.png');
   }
 });
});
</script>--> 
<!--script only for home page-->

</body>

<!-- Mirrored from demoupdates.com/updates/nlaucer/html/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Oct 2019 18:29:41 GMT -->
</html>