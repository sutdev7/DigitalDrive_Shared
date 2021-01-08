<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<title><?php echo (isset($title)) ? $title :"Hire-n-Work" ?></title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="" name="keywords">
	<meta content="" name="description">

	<!-- Bootstrap CSS File -->
	<link href="<?php  echo base_url('assets/plugin/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
	<!-- Libraries CSS Files -->
	<link href="<?php  echo base_url('assets/plugin/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
	<link href="<?php  echo base_url('assets/plugin/animate/animate.min.css'); ?>" rel="stylesheet">
	<link href="<?php  echo base_url('assets/plugin/venobox/venobox.css'); ?>" rel="stylesheet">
	<link href="<?php  echo base_url('assets/plugin/owlcarousel/assets/owl.carousel.min.css'); ?>" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
	<!--<link href="<?php  echo base_url('assets/css/asRange.css'); ?>" rel="stylesheet" type="text/css" /> -->
	<!-- css for auto complete multiselect -->
	<link rel="stylesheet" href="<?php  echo base_url('assets/css/fastselect.min.css'); ?>">

	<!-- css for auto complete multiselect -->

	<!-- Main Stylesheet File -->
	<link href="<?php  echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
	<script src="<?php  echo base_url('assets/plugin/jquery/jquery.min.js'); ?>"></script> 
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
	<script src="<?php  echo base_url('assets/plugin/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script> 
</head>
<body>

<?php  
	if($this->session->userdata('user_type') == 3){
		$this->load->view('website/website_client_header'); 
	}else{
		$this->load->view('website/website_freelancer_header'); 
	}
?>

{content}

<!-- JavaScript Libraries --> 
<script src="<?php  echo base_url('assets/plugin/jquery/jquery-migrate.min.js'); ?>"></script> 
<script src="<?php  echo base_url('assets/plugin/easing/easing.min.js'); ?>"></script> 
<script src="<?php  echo base_url('assets/plugin/superfish/hoverIntent.js'); ?>"></script> 
<script src="<?php  echo base_url('assets/plugin/superfish/superfish.min.js'); ?>"></script> 
<script src="<?php  echo base_url('assets/plugin/wow/wow.min.js'); ?>"></script> 
<script src="<?php  echo base_url('assets/plugin/venobox/venobox.min.js'); ?>"></script> 
<script src="<?php  echo base_url('assets/plugin/owlcarousel/owl.carousel.min.js'); ?>"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script> 
<script src="<?php  echo base_url('assets/js/main.js'); ?>"></script> 

<!-- script for auto complete multiselect --> 

<script src="js/fastselect.standalone.js"></script> 
<script>
$('.multipleSelect').fastselect();
</script> 

<!-- script for auto complete multiselect -->

</body>
</html>