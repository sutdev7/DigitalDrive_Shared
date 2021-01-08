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

  <!-- Bootstrap CSS File -->
  <link href="<?php  echo base_url('assets/plugin/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="<?php  echo base_url('assets/plugin/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
  <link href="<?php  echo base_url('assets/plugin/animate/animate.min.css'); ?>" rel="stylesheet">
  <link href="<?php  echo base_url('assets/plugin/venobox/venobox.css'); ?>" rel="stylesheet">
  <link href="<?php  echo base_url('assets/plugin/owlcarousel/assets/owl.carousel.min.css'); ?>" rel="stylesheet">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
  <link href="<?php  echo base_url('assets/css/asRange.css'); ?>" rel="stylesheet" type="text/css" />

  <!-- css for auto complete multiselect -->
  <link rel="stylesheet" href="<?php  echo base_url('assets/css/fastselect.min.css'); ?>">
  <!-- css for auto complete multiselect -->

  <!-- Main Stylesheet File -->
  <link href="<?php  echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
 <link href="<?php  echo base_url('assets/css/sb-admin-2.css'); ?>" rel="stylesheet">
  <style>
    @media (max-width: 480px) {
      .molivi-sec {
        margin-top: 35px;
      }
      .ongoing-task {
        margin-bottom:10px;
      }
    }

    #Work span.line1 {
      top: 30%;
      left: 44%;
    } 

    #Work span.line2 {
      top: 64%;
      left: 42%;
    }
  </style>

  <script src="<?php  echo base_url('assets/plugin/jquery/jquery.min.js'); ?>"></script> 
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
  <script src="<?php  echo base_url('assets/plugin/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script> 

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
  
</head>


<?php
$bodyCSS = '';
//if($this->uri->segment(1, 0) == 'privacy-policy' || $this->uri->segment(1, 0) == 'terms-and-condition'){
//   $bodyCSS = ' style="background:#f6f8fa;"';
//}
?>
<body<?= $bodyCSS ?>>
<?php 
if($this->session->userdata('user_type') == 3){
	$this->load->view('website/website_client_header');
}else{
	//$this->load->view('website/website_freelancer_header');
  if($profile_status == 0){

    $this->load->view('website/website_freelancer_profile_check_header');

   }else{


     $this->load->view('website/website_freelancer_header');

   }
}	
?>
{content}
<?php  $this->load->view('website/website_footer'); ?>
<div class="modal fade" id="client-website-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="client-website-modal-title"></h5>
		<button type="button" style="outline: none;" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="client-website-modal-body">
      </div>
    </div>
  </div>
</div>	
<a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a> 

<!-- JavaScript Libraries -
<script src="<?php  echo base_url('assets/plugin/jquery/jquery-migrate.min.js'); ?>"></script> -->
<script src="<?php  echo base_url('assets/plugin/easing/easing.min.js'); ?>"></script> 
<script src="<?php  echo base_url('assets/plugin/superfish/hoverIntent.js'); ?>"></script> 
<script src="<?php  echo base_url('assets/plugin/superfish/superfish.min.js'); ?>"></script> 
<script src="<?php  echo base_url('assets/plugin/wow/wow.min.js'); ?>"></script> 
<script src="<?php  echo base_url('assets/plugin/venobox/venobox.min.js'); ?>"></script> 
<script src="<?php  echo base_url('assets/plugin/owlcarousel/owl.carousel.min.js'); ?>"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script> 
<script src="<?php  echo base_url('assets/js/choosen7.js'); ?>"></script> 
<script src="<?php  echo base_url('assets/js/bootstrap-notify.js'); ?>"></script> 

<script src="<?php  echo base_url('assets/js/main.js'); ?>?v=0.0.8"></script> 
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
<script>
var chat_appid = '1333306f4fbd298';
var chat_auth = '4239d3a6d9b4ee1269033a91b8f1e6b9e85a86e8';
</script>
<?php //if($this->session->userdata('id') && $this->session->userdata('id') > 0) { ?>
 <script>
	var chat_id = "1";
	var chat_name = "Jone Wills"; 
	//var chat_link = "<?php echo $this->session->userdata('link'); ?>"; //Similarly populate it from session for user's profile link if exists
	//var chat_avatar = "<?php echo $this->session->userdata('avatar'); ?>"; //Similarly populate it from session for user's avatar src if exists
	//var chat_role = "<?php echo $this->session->userdata('role'); ?>"; //Similarly populate it from session for user's role if exists
	//var chat_friends = '<?php echo $this->session->userdata('friends'); ?>'; //Similarly populate it with user's friends' site user id's eg: 14,16,20,31
	</script>
<?php //} ?>
<script>
(function() {
    var chat_css = document.createElement('link'); chat_css.rel = 'stylesheet'; chat_css.type = 'text/css'; chat_css.href = 'https://fast.cometondemand.net/'+chat_appid+'x_xchat.css';
    document.getElementsByTagName("head")[0].appendChild(chat_css);
    var chat_js = document.createElement('script'); chat_js.type = 'text/javascript'; chat_js.src = 'https://fast.cometondemand.net/'+chat_appid+'x_xchat.js'; var chat_script = document.getElementsByTagName('script')[0]; chat_script.parentNode.insertBefore(chat_js, chat_script);
})();
</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.js-example-basic-multiple').select2();

    $(".js-example-tags").select2({
      tags: true
    });
});
</script>
<script type="text/javascript">
  $(document).ready(function() {
        
        var error_message   = '<?php echo $this->session->flashdata('flash_error_msg'); ?>';
        var success_msg     = '<?php echo $this->session->flashdata('flash_success_msg'); ?>';
        if (error_message != "" ) {
            showMessage("danger", error_message);
        }
        if (success_msg != "" ) {
            showMessage("success", success_msg);
        }
        console.log("here");
		
});
// modified on 27-10-2020
function getTopFreelancers(){
	var settings = {
	  "url": "<?php echo base_url(); ?>User/ajax_search_top_freelancer",
	  "method": "POST",
	  "timeout": 0,
	};

	$.ajax(settings).done(function (response) {
		if(response!=""){
			$('#client-website-modal-title').html("Top Rated Freelancers");
			$('#client-website-modal-body').html(response)
			$("#client-website-modal").modal('show');
		}
	});
}
</script>
</body>

</html>