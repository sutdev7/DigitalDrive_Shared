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
          <div class="postDiv_Box">
            <form action="<?= base_url().'freelancer/save_problem_ticket' ?>" method="post">
              <div class="step_Box step_box2">
                <h3>Problem Ticket</h3>
                <ul>
                  <li class="w-100"> 
                    <span>
                        <label>Issue Type</label>
                        <div class="select-style">
                            <select name="problem_id" required>
                            {grievance}
                                <option value="{fid}">{problem_type}</option>
                            {/grievance} 
                            </select>
                        </div>
                    </span> 
                  </li>
                </ul>
                <ul>
                  <li class="w-100">
                    <span>
                        <label>Other Issue Type (optional)</label>
                        <input type="text" name="grievance_subject" class="form-control" />
                    </span>
                  </li>
                </ul>
                <ul>
                  <li class="w-100">
                    <span>
                        <label>Describe your problem</label>
                        <textarea name="grievance_content" class="form-control" rows="7" cols="" placeholder="Enter Description" required></textarea>
                	</span>
                  </li>
                </ul>
              </div>
              <div class="fullDiv_bottom">
                <input type="submit" class="btn btn-primary" value="Raise Ticket" />
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>