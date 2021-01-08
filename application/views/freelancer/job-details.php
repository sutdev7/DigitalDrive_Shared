<link rel="stylesheet" href="../assets/css/responsive.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
    crossorigin="anonymous" />
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<main id="main"> 
    <!--==========================
        ConterDiv Section
      ============================-->
    <section class="banner" style="background-image: url('../assets/img/banner-bg.jpg');">
      <div class="container">
        <div class="banner-content">
          <div class="left-col">
            <div class="banner-text">
              <h2>{task_info}{task_title}{/task_info}</h2>
              <span>
                <p><i class="fas fa-map-marker-alt"></i>
                  {task_info}{task_country}{/task_info}</p>
                <p><i class="fas fa-calendar-alt"></i>
                  Posted {task_info}{task_doc}{/task_info}</p>
              </span>
            </div>
          </div>
            <?php if($is_front == 0){ ?>
            <div class="right-col">
              <div class="salary">
                <h4>Budget</h4>
                <h3>${task_info}{task_total_budget}{/task_info}</h3>
              </div>
            </div>
            <?php } ?>
        </div>
      </div>

    </section>

    <?php
    $msg = $this->session->flashdata('msg');
    if (!empty($msg)) {
        ?>
        <section style="padding-top: 7%;">
            <?php echo $msg; ?>
        </section>
        <?php
    }
    ?>

<!--    <section class="job-name">
      <div class="container">
        <div class="job-name-content">

          <h2>{task_info}{task_title}{/task_info}</h2>


          <div class="line-2">
            <span><i class="fas fa-map-marker-alt"></i> {task_info}{task_country}{/task_info}, {task_info}{task_continent}{/task_info}</span>
          </div>

          <div class="line-3">
            <span><i class="fas fa-calendar-alt"></i> Post Date: {task_info}{task_doc}{/task_info}</span>
          </div>


        </div>
      </div>
    </section>-->

    <section class="outer-wrapper-job padDiv">
      <div class="container">
        <div class="row">
          <div class="left-col col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
            <div class="job-detail-content">
              <h3>Job Detail</h3>

              <div class="row">
                <div class="more-detail col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                  <div class="more-detail-content">
                    <div>
                      <img src="../assets/img/money-hand.png" alt="" />
                    </div>
                    <div>
                      <h6>Budget
                      </h6>
                      <h6>${task_info}{task_total_budget}{/task_info}</h6>
                    </div>
                  </div>
                </div>

                <div class="more-detail col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                  <div class="more-detail-content">
                    <div>
                      <img src="../assets/img/folder.png" alt="" />
                    </div>
                    <div>
                      <h6>Project length
                      </h6>
                      <h6>{task_info}{tasktime_duration} {/task_info}</h6>
                    </div>
                  </div>
                </div>

                <div class="more-detail col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                  <div class="more-detail-content">
                    <div>
                      <img src="../assets/img/bag.png" alt="" />
                    </div>
                    <div>
                      <h6>Hours to be determined</h6>
                      <h6>{task_info}{task_duration_type}{/task_info}</h6>
                    </div>
                  </div>
                </div>

                <div class="more-detail col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                  <div class="more-detail-content">
                    <div>
                      <img src="../assets/img/avatar.png" alt="" />
                    </div>
                    <div>
                      <h6>Proposal
                      </h6>
                      <h6>{proposal_count}</h6>
                    </div>
                  </div>
                </div>

              </div>


              <div class="job-description">
                <h3>Job Description</h3>
                <p>{task_info}{task_details}{/task_info}</p>
              </div>

              <div class="what-will-do">
                <h3>Keywords</h3>
                <h5><i class="fas fa-long-arrow-alt-right"></i> {task_info}{task_keywords}{/task_info}</h5>
              </div>

              <div class="required-skills">
                <h3>Skills</h3>

                <span class="w-100">{task_info}{task_requirements}<h5>{skill_name}</h5> {/task_requirements}{/task_info}</span>
              </div>
              <br>
              <div class="what-will-do">
                <h3>Activity on this Job</h3>
                <h5><i class="fas fa-long-arrow-alt-right"></i> Proposal <b>{proposal_count}</b> </h5>
                <h5><i class="fas fa-long-arrow-alt-right"></i> Hired <b>{task_info}{task_freelancer_hire}{/task_info}</b> </h5>
                <h5><i class="fas fa-long-arrow-alt-right"></i> Offer Send <b>{offer_send}</b> </h5>
              </div>
            </div>
          </div>

          <div class="right-col col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">

            <div class="apply-job">
              <div class="btn">
                <?php
                    if ($hire_me == true) {
                        ?>
                        <a href="<?= base_url() . 'take-action' ?>/{mnotification_row_id}/<?php echo base64_encode('17'); ?>">Complete</a>
                        <?php
                    } else {
                        ?>
                        <!--form action="<?= base_url() . 'proposal' ?>" method="post">
                            <input type="hidden" value="{task_info}{user_task_id}{/task_info}" name="user_task_id">
                            <input type="hidden" value="{task_info}{task_id}{/task_info}" name="task_id">
                            <input type="submit" value="Submit Proposal" class="eyeBtn">
                        </form-->
                        <?php if($is_front == 0){ ?>
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#myModal">SUBMIT PROPOSAL</a>
                        <?php } else { ?>
                            <a href="<?php echo base_url(); ?>sign-up-as/1">SUBMIT PROPOSAL</a>
                        <?php
                        }
                    }
                ?>
                <!--a href="javascript:void(0);" data-toggle="modal" data-target="#myModal">APPLY FOR THE JOB</a-->
              </div>
              <!-- <h5>Application end in 4d 5h 3m</h5> -->
              <h6>OR APPLY WITH</h6>
              <ul>
                    <li>
                        <h3><a href="javascript:void(0)" class="{inappropriateclass}" id="txtflag" ><i class="fa fa-flag mr-2"></i>{inappropriatetext}</a></h3>
                        <p class="mb-1">Required connects to submit this proposal <b>1</b></p>
                        <p class="mb-1">Available Connects <b>{connection}</b>
                    </li>
                </ul>
            </div>

            <div class="btn send-msg-btn">
                <?php
                    if ($hire_me == true) {
                        ?>
                        <a href="<?= base_url() . 'problem-ticket' ?>">CANCEL</a>
                        <?php
                    } else {?>
                        <?php if($is_front == 0){ ?>
                            <a href="javascript:void(0)" id="txtShow" >{savetext}</a>
                        <?php } else { ?>
                            <a href="<?php echo base_url(); ?>sign-up-as/1">{savetext}</a>
                        <?php
                        }
                     }?>
            </div>

            <div class="about-client-box">
              <h3>About the Client</h3>
              <span class="line"></span>
              <div class="client-text">
                <!--div class="text-line">
                  <div><i class="fas fa-map-marker-alt"></i>
                  </div>
                  <h4>Australia</h4>
                </div-->

                <div class="text-line">
                  <div><i class="fas fa-tv"></i>
                  </div>
                  <h4>{creator_data}{creator_post_count}{/creator_data} Jobs posted</h4>
                </div>

                <div class="text-line">
                  <div><i class="fas fa-clock"></i>
                  </div>
                  <h4>Member since {creator_data}{since}{/creator_data}</h4>
                </div>
              </div>

              <h3>About the Client</h3>
              <div class="about-client-content">
                <div class="text-line">
                  <div><i class="fas fa-address-card"></i>
                  </div>
                  <h4>Payment method verified</h4>
                </div>

                <div class="text-line">
                  <div><i class="fas fa-credit-card"></i>
                  </div>
                  <h4>Identity verified</h4>
                </div>

                <div class="text-line">
                  <div><i class="fas fa-envelope"></i>
                  </div>
                  <h4>Email address verified</h4>
                </div>

                <div class="text-line">
                  <div><i class="fas fa-user-alt"></i>
                  </div>
                  <h4>Profile completed</h4>
                </div>

                <div class="text-line">
                  <div><i class="fas fa-phone-alt"></i>
                  </div>
                  <h4>Phone number verified</h4>
                </div>

                <div class="text-line">
                  <div><i class="fas fa-address-card"></i>
                  </div>
                  <h4>Identity verified</h4>
                </div>
              </div>
              <br>

              <h3>Job Link</h3>

              <div class="about-client-content">
                <div class="text-line">
                  
                  <h4><a href="<?= base_url() . 'job-details/' . $this->uri->segment(2) ?>">http://jobLink</a></h4>
                </div>

                <div class="text-line">
                  <h4 onclick="copyToClipboard('#copylink')">Copy link</h4>
                </div>

              </div>


            </div>

          </div>
        </div>
      </div>
    </section>
</main>

<!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <form action="<?= base_url().'freelancer/submit_proposal' ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="task_id" value="<?= $task_id ?>">
            <input type="hidden" name="user_task_id" value="<?= $user_task_id ?>">
            <div class="modal-content">
                <div class="header">
                    <h2>Apply a Job</h2>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="body">
                    <div class="row cover">
                        <div class="col-md-8 col-lg-8 col-xl-8">
                            <div class="cover-letter">
                                <h4>Cover letter</h4>
                                <div id="the-count">
                                    <span id="current">0</span>
                                    <span id="maximum">/ 700</span>
                                </div>
                            </div>
                            <textarea name="cover_letter" id="the-textarea" required maxlength="700" placeholder="Type here" autofocus></textarea>
                        </div>

                        <div class="proposal text-center col-md-4 col-lg-4 col-xl-4">
                            <p>Required Key to submit this proposal 1</p>
                            <h4>Available Key {connection}</h4>
                        </div>
                    </div>

                    <div class="row charges">
                        <div class="drop-files col-md-5 col-lg-5 col-xl-5">

                            <div class="file-upload">
                                <div class="image-upload-wrap">
                                    <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" name="fldTaskDocuments[]" required/>
                                    <div class="drag-text">
                                        <img src="../assets/img/modal-upload.jpg" alt="" />
                                    </div>
                                </div>
                                <div class="file-upload-content">
                                    <img class="file-upload-image" src="#" alt="your image" />
                                    <div class="image-title-wrap">
                                        <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bidding-amt col-md-4 col-lg-4 col-xl-4">
                            <div class="portal-text">
                                <h5>Bidding Amount</h5>
                                <input type="text" name="terms_amount_max" placeholder="$ 0" id="terms_amount_max" required>
                                <span>Amount / hr</span>
                            </div>
                            <div class="portal-text">
                                <h5>Portal Charges</h5>
                                <input type="text" placeholder="$ 0" disabled="" id="portal_charges" name="portal_charges">
                            </div>
                        </div>

                        <div class="portal-charges col-md-3 col-lg-3 col-xl-3">
                            <div class="portal-text">
                                <h5>3rd Party Charges</h5>
                                <input type="text" placeholder="$ 0" disabled="" name="3rd_party_charges" id="3rd_party_charges">
                            </div>
                            <div class="portal-text">
                                <h5>Earn Amount</h5>
                                <input type="text" placeholder="$ 0" name="earn_amount" disabled="" id="earn_amount">
                            </div>

                        </div>
                    </div>
                </div>

                <div class="line">

                </div>

                <footer class="footer">
                    <div class="cta">
                        <button class="btn submit" type="submit">Submit</button>
                        <button class="btn cancel" data-dismiss="modal">Cancel</button>
                    </div>
                </footer>
            </div>
        </form>
            <!-- <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div> -->
        </div>

    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
 <script src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
<script> 
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();

        $("#terms_amount_max").on('input', function(e) {
            console.log("In");
          var gross_total = $(this).val();
          if(isNaN(gross_total) || gross_total < 0) {
            $("#portal_charges").val(0);
            $("#3rd_party_charges").val(0);                    
            $("#earn_amount").val(0);
            return false;
          }
          var commision=0;
          var percentage=0;
          if(gross_total<100){
            commision=(gross_total*3)/100;
            percentage="3%";
          } 
          if(gross_total>=100 && gross_total<=500){
            commision=(gross_total*5)/100;
            percentage="5%";
          }

          if(gross_total>500 && gross_total<=1000){
            commision=(gross_total*10)/100;
            percentage="10%";
          }

          if(gross_total>1000 && gross_total<=3000){
            commision=(gross_total*15)/100;
            percentage="15%";
          }

          if(gross_total>3000){
            commision=(gross_total*20)/100;
            percentage="20%";
          }
          console.log(percentage);

          var freelancer_amount = gross_total - commision;
          var thired_party_commision = (gross_total*2)/100;
          freelancer_amount = freelancer_amount - thired_party_commision;
          $("#portal_charges_percentage").val(percentage);
          $("#portal_charges").val(commision);
          $("#3rd_party_charges").val(thired_party_commision);
          $("#3rd_party_percentage").val('2%');
          $("#earn_amount").val(freelancer_amount);
        });
    });
	
    function copyToClipboard(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).attr('href')).select();
        document.execCommand("copy");
        alert('Linked Copied');
        $temp.remove();
    }
	
	
</script>	
<script src="../assets/js/job_page.js"></script>