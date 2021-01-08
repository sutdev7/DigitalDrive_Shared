<main id="main"> 
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

?>

<main id="main"> 
<?php 

  $msg = $this->session->flashdata('msg'); 
  if(!empty($msg)) {
?>
<section style="padding-top: 7%;">
<?php echo $msg; ?>
</section>
<?php
	}
?>
<?php 

	$frmValidationMsg = validation_errors(); 
	if(!empty($frmValidationMsg)) {
?>
	<section style="padding-top: 7%;">
		<?php echo '<div class="alert alert-danger text-center">' . $frmValidationMsg . '</div>'; ?>
	</section>
<?php
  }
?>
  <!--==========================
      ConterDiv Section
    ============================-->
  <section id="postDiv">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="card card-info card-outline">

            <?php if(!empty($grievance)){ ?>
            <div class="card-header">
                          <div class="col-md-4" style="float: left;">
                <h3 class="card-title">Ticket : <?php echo isset($grievance[0]->ticket_no) ? $grievance[0]->ticket_no : '';?></h3>
                          </div>

                          <div class="col-md-4" style="float: left;">
                <h3 class="card-title">Total message :  <?php echo count($grievance);?></h3>
                          </div>

                          <div class="col-md-4" style="float: right;">
                <a href="<?= base_url()?>user-compose-email/<?= isset($grievance[0]->ticket_no) ? $grievance[0]->ticket_no : '' ?>" title="Compose Email"><i class="fa fa-inbox" aria-hidden="true"></i>  Send message</a></h3>
                          </div>

            </div>
            <div class="card-body">
              <div class="col-md-12">

                               <?php if(!empty($grievance)){
                                     foreach($grievance as $information) { ?>

                  <div class="row" style="border-bottom: 1px dotted;">
                    <div class="col-md-3">
                      <?php echo date('d-m-Y', strtotime($information->dom)) ;?>
                      <div style="color: red"><?php echo $information->user_type;?></div>
                    </div>
                    <div class="col-md-9">
                      <?php echo $information->email_body ;?>
                    </div>
                  </div>

                 <?php }} ?>

              </div>
            </div>
             <?php } else{?>

              <div class="" style="text-align: center;padding: 50px;">No message list found</div>

             <?php } ?>   

          </div>
        </div>
      </div>


      
    </div>
  </section>
</main>
