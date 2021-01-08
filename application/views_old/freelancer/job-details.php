<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>
    .black_color {
        color: #000 !important;
    }
</style>
<main id="main"> 
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
    <!--==========================
        ConterDiv Section
      ============================-->
    <section id="postDiv">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="task_Left">

                        <div class="task_Left_Div">
                            <h3>{task_info}{task_title}{/task_info}</h3>
                            <h2 class="black_color">Posted {task_info}{task_doc}{/task_info} <!--;<br> Due Date {task_info}{task_due_date}-->{/task_info}</h2>

                            <h4 class="black_color">{task_info}{task_country}{/task_info}, {task_info}{task_continent}{/task_info}</h4>
                            <p>{task_info}{task_details}{/task_info}</p>

                            <div class="task_info pt-5 border-bottom-0">
                                <span>  <h5> Hours to be determined</h5>
                                    <em><i class="fa fa-clock-o"></i> {task_info}{task_duration_type}{/task_info}</em></span>
                                <span>  <h5> Project length</h5>
                                    <em><i class="fa fa-calendar"></i> {task_info}{tasktime_duration} {/task_info}</em></span>
                                <span>
                                    <h5>Budget</h5>
                                    <em><i class="fa fa-dollar" aria-hidden="true"></i> {task_info}{task_total_budget}{/task_info}</em> 
                                </span>
                                <span>
                                    <h5>Proposal</h5>
                                    <em>{proposal_count}</em> 
                                </span>
                                <hr>
<!--                                <h2 class="Atta mt-0">Project Type </h2>
                                <p>{task_info}{task_details}{/task_info}</p>
                                <hr>-->
                                <h2 class="Atta mt-0">Keywords</h2>
                                <div>
                                    <span class="w-100">{task_info}{task_keywords}{/task_info}</span>
                                </div>
                                <!--<h2 class="Atta mt-0">Budget </h2>
                                <p>{task_info}{task_total_budget}{/task_info}</p>
                                <hr>
                                <h2 class="Atta mt-0">Milestone </h2>
                                <p>{task_info}{task_total_budget}{/task_info}</p>
                                <hr>-->
                                <h2 class="Atta mt-0">Skills</h2>
                                <div>
                                    <span class="w-100">{task_info}{task_requirements}<a href="#">{skill_name}</a> {/task_requirements}{/task_info}</span>
                                </div>
                                <h2 class="Atta mt-5 ">Activity On this Job</h2>
                                <ul>
                                    <li>
<!--                                        <p class="mb-1">Proposal <b> {proposal_count}</b></p>
                                        <p class="mb-1">Invites sent <b> {offer_send}</b></p>-->
                                        <p class="mb-1">Hired <b> {task_info}{task_freelancer_hire}{/task_info}</b></p>
                                        <p class="mb-1">Message <b> {offer_send}</b></p>
                                        <p class="mb-1">Offer Send <b> {offer_send}</b></p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="task_Right_Div">
                        <?php
                        if ($hire_me == true) {
                            ?>
                            <a href="<?= base_url() . 'take-action' ?>/{mnotification_row_id}/<?php echo base64_encode('17'); ?>" class="view-btn1 accept" style="margin-top: 38px;">Complete</a>

                            <a href="<?= base_url() . 'problem-ticket' ?>" class="view-btn2 reject">Cancel</a>
                            <?php
                        } else {
                            ?>
                            <form action="<?= base_url() . 'proposal' ?>" method="post">
                                <input type="hidden" value="{task_info}{user_task_id}{/task_info}" name="user_task_id">
                                <input type="hidden" value="{task_info}{task_id}{/task_info}" name="task_id">
                                <input type="submit" value="Submit Proposal" class="eyeBtn">
                                <a href="#" class="{savetextclass}" id="txtShow" >{savetext}</a>
                            </form>
                            <?php
                        }
                        ?>
                        <div class="offerDiv">
                            <ul>
                                <li>
                                    <h3><a href="#" class="{inappropriateclass}" id="txtflag" ><i class="fa fa-flag mr-2"></i>{inappropriatetext}</a></h3>
                                    <p class="mb-1">Required connects to submit this proposal <b>1</b></p>
                                    <p class="mb-1">Available Connects <b>{connection}</b>
                                </li>
                            </ul>
                            <!--<ul>
                                                    <li>
                                                            <h3>Member since 2016</h3>
                                                            <p class="mb-1">Payment Method verified</p>
                                                            <p class="mb-1">6 Jobs posted</p> 
                                                    </li>
                            </ul>-->
                            <h4>About Client : {creator_data}{client_name}{/creator_data}</h4>
                            <ul>
                                <li>
                                    <h3>Member since {creator_data}{since}{/creator_data}</h3>
                                    <p class="mb-1">Payment Method verified</p>
                                    <p class="mb-1">{creator_data}{creator_post_count}{/creator_data} Jobs posted</p> 
                                </li>
                            </ul>
                            <h4>Job Link</h4>
                            <ul>
                                <li>
                                    <h3><a href="<?= base_url() . 'job-details/' . $this->uri->segment(2) ?>" id="copylink">http://jobLink</a></h3>
                                    <p class="mb-1" onclick="copyToClipboard('#copylink')">Copy Link</p> 
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script> 
    $(document).ready(function() {
        $('.saveBtn').on('click',function(){
            $.ajax({
                type: "POST",
                url: "<?= base_url() . 'save-job' ?>",
                data: {taskId : '<?= $this->uri->segment(2) ?>' },
                dataType: "text",
                success: function(resultData){ 
                    $('.HireBtn').removeClass('saveBtn');
                    $('#txtShow').html('Job Saved ').css("color", '#ccc');
					  
                }
            });
        });
        $('.flagBtn').on('click',function(){
            $.ajax({
                type: "POST",
                url: "<?= base_url() . 'save-inappropriate' ?>",
                data: {taskId : '<?= $this->uri->segment(2) ?>' },
                dataType: "text",
                success: function(resultData){ 
                    $('.flb').removeClass('flagBtn');
                    $('#txtflag').html('Already Flaged This Job As an inappropriate').css("color", '#25bef3');
					  
                }
            });
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