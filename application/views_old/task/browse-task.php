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

    <!--==========================
      ConterDiv Section
    ============================-->
    <div class="browser-taskDiv">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="browser-top">
                        <div class="browser-lft">
                            <h2> All Tasks </h2>
                        </div>
                        <div class="browser-rht">
                            <form class="border-readyDiv">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend"> <span class="input-group-text"> <img src="<?php  echo base_url('assets/img/address.png'); ?>" alt="Anywhere"> &nbsp;&nbsp; Anywhere </span> </div>
                                    <input type="text" class="form-control" id="fldSearchCriteria" name="fldSearchCriteria" placeholder="Seacrh by title, Skill or any key word ">
                                    <div class="input-group-append"> <span class="input-group-text"> <img src="<?php  echo base_url('assets/img/search-gray.png'); ?>" alt="Search"> </span> </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <span id="searchResult">
                        {jobs}
                        <div class="task_Left_Div task_Left_Div-new">
                            <div class="bod-sec">
                                <div class="img2-ses"> <span> <img src="{user_image}" alt="{task_created_by}" style="height:67px;width:69px;"> </span>
                                    <div class="caption">
                                        <h3> {task_created_by}</h3>
                                        <p> {user_city}, {user_state}, {user_country} </p>
                                    </div>
                                </div>
                            </div>
                            <h3><a href="<?php echo base_url(); ?>task-details/{user_task_id}" target="_blank" style="color: #293134;">{task_name}</a> </h3>
                            <small> Posted {task_post_duration} minutes ago </small>
                            <p> {task_details} </p>
                            <h4> Skills Requered </h4>
                            <span>
                                {task_skill_requirements}
                                <a href="#">{name}</a>
                                {/task_skill_requirements}
                            </span>
                            <div class="task_info"> <span>
                                    <h5>Budget</h5>
                                    <em>${task_total_budget}</em>
                                </span> <span>
                                    <h5>Offers</h5>
                                    <em> {task_offers} Offers </em>
                                </span> <span>
                                    <h5>Comment</h5>
                                    <em> 0 Comments </em>
                                </span>
                            </div>
                        </div>
                        {/jobs}
                        <div class="pag">
                            {links}
                        </div>
                    </span>

                </div>

                <div class="col-lg-4">
                    <div class="task-blueDiv" style="padding: 10px;">
                        <div class="row">
                            <div class="col">
                                <img src="<?php  echo base_url('assets/img/user3.png'); ?>" alt="Post a Task">
                            </div>
                            <div class="col">
                                <h2> What to <br>
                                    work as a client? </h2>
                                <a href="<?php echo base_url(); ?>post-task-step-1" class="post-a-task"> Post a Task </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="mt-5">
                                <div class="card gigs-task">
                                    <!-- <img class="card-img-top" src="img/gig.png" /> -->
                                    <div class="card-body position-relative">
                                        <div class="gig-task-prof">
                                            <img src=" http://www.drivedigitally.com/hirenworknew/assets/img/img-profile.jpg" class="user-img">
                                            <p class="my-2 ">Don Bros <span class="d-block small"><i class="fa fa-map-marker"></i> Sydney, NSW, Australia</span>
                                            </p>
                                            <!-- <p class="my-2 small"><span class="text-primary"><b>50</b></span>
                                      Projects
                                      Done</p> -->
                                            <div class="row">
                                                <div class=" col  my-2 small "><span class="text-primary"><b>50</b></span> Projects Done
                                                </div>
                                                <div class=" col my-2 small "><span class="text-primary"><b>15</b></span> Freelancer</div>
                                            </div>
                                        </div>
                                        <h5 class="card-title text-center"><a href="micro-key-details.html">I need a UI designer for my Mobile app</a></h5>
                                        <div>
                                            <div class="micro-key">Micro-task</div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-muted d-flex justify-content-between flex-wrap">
                                        <div>
                                            <span class="coin-tag">5 Coins</span>
                                        </div>
                                        <div class="pull-right" style="margin-top: 6px;">
                                            <span class="text-gray mr-2 font-weight-bold">Spent</span>
                                            <span class="text-primary">$ 430</span>
                                        </div>
                                        <div class="w-100 border-top mt-3">
                                            <p class="text-center text-muted small mt-2 mb-0" style="font-size: 12px">Last Login 9.08.20, 10.30 P.M</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="mt-5">
                                <div class="card gigs-task">
                                    <!-- <img class="card-img-top" src="img/gig.png" /> -->
                                    <div class="card-body position-relative">
                                        <div class="gig-task-prof">
                                            <img src=" http://www.drivedigitally.com/hirenworknew/assets/img/img-profile.jpg" class="user-img">
                                            <p class="my-2 ">Don Bros <span class="d-block small"><i class="fa fa-map-marker"></i> Sydney, NSW, Australia</span>
                                            </p>
                                            <!-- <p class="my-2 small"><span class="text-primary"><b>50</b></span>
                                      Projects
                                      Done</p> -->
                                            <div class="row">
                                                <div class=" col  my-2 small "><span class="text-primary"><b>50</b></span> Projects Done
                                                </div>
                                                <div class=" col my-2 small "><span class="text-primary"><b>15</b></span> Freelancer</div>
                                            </div>
                                        </div>
                                        <h5 class="card-title text-center"><a href="micro-key-details.html">I need a UI designer for my Mobile app</a></h5>
                                        <div>
                                            <div class="micro-key">Micro-task</div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-muted d-flex justify-content-between flex-wrap">
                                        <div>
                                            <span class="coin-tag">5 Coins</span>
                                        </div>
                                        <div class="pull-right" style="margin-top: 6px;">
                                            <span class="text-gray mr-2 font-weight-bold">Spent</span>
                                            <span class="text-primary">$ 430</span>
                                        </div>
                                        <div class="w-100 border-top mt-3">
                                            <p class="text-center text-muted small mt-2 mb-0" style="font-size: 12px">Last Login 9.08.20, 10.30 P.M</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="mt-5">
                                <div class="card gigs-task">
                                    <!-- <img class="card-img-top" src="img/gig.png" /> -->
                                    <div class="card-body position-relative">
                                        <div class="gig-task-prof">
                                            <img src=" http://www.drivedigitally.com/hirenworknew/assets/img/img-profile.jpg" class="user-img">
                                            <p class="my-2 ">Don Bros <span class="d-block small"><i class="fa fa-map-marker"></i> Sydney, NSW, Australia</span>
                                            </p>
                                            <!-- <p class="my-2 small"><span class="text-primary"><b>50</b></span>
                                      Projects
                                      Done</p> -->
                                            <div class="row">
                                                <div class=" col  my-2 small "><span class="text-primary"><b>50</b></span> Projects Done
                                                </div>
                                                <div class=" col my-2 small "><span class="text-primary"><b>15</b></span> Freelancer</div>
                                            </div>
                                        </div>
                                        <h5 class="card-title text-center"><a href="micro-key-details.html">I need a UI designer for my Mobile app</a></h5>
                                        <div>
                                            <div class="micro-key">Micro-task</div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-muted d-flex justify-content-between flex-wrap">
                                        <div>
                                            <span class="coin-tag">5 Coins</span>
                                        </div>
                                        <div class="pull-right" style="margin-top: 6px;">
                                            <span class="text-gray mr-2 font-weight-bold">Spent</span>
                                            <span class="text-primary">$ 430</span>
                                        </div>
                                        <div class="w-100 border-top mt-3">
                                            <p class="text-center text-muted small mt-2 mb-0" style="font-size: 12px">Last Login 9.08.20, 10.30 P.M</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="mt-5">
                                <div class="card gigs-task">
                                    <!-- <img class="card-img-top" src="img/gig.png" /> -->
                                    <div class="card-body position-relative">
                                        <div class="gig-task-prof">
                                            <img src=" http://www.drivedigitally.com/hirenworknew/assets/img/img-profile.jpg" class="user-img">
                                            <p class="my-2 ">Don Bros <span class="d-block small"><i class="fa fa-map-marker"></i> Sydney, NSW, Australia</span>
                                            </p>
                                            <!-- <p class="my-2 small"><span class="text-primary"><b>50</b></span>
                                      Projects
                                      Done</p> -->
                                            <div class="row">
                                                <div class=" col  my-2 small "><span class="text-primary"><b>50</b></span> Projects Done
                                                </div>
                                                <div class=" col my-2 small "><span class="text-primary"><b>15</b></span> Freelancer</div>
                                            </div>
                                        </div>
                                        <h5 class="card-title text-center"><a href="micro-key-details.html">I need a UI designer for my Mobile app</a></h5>
                                        <div>
                                            <div class="micro-key">Micro-task</div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-muted d-flex justify-content-between flex-wrap">
                                        <div>
                                            <span class="coin-tag">5 Coins</span>
                                        </div>
                                        <div class="pull-right" style="margin-top: 6px;">
                                            <span class="text-gray mr-2 font-weight-bold">Spent</span>
                                            <span class="text-primary">$ 430</span>
                                        </div>
                                        <div class="w-100 border-top mt-3">
                                            <p class="text-center text-muted small mt-2 mb-0" style="font-size: 12px">Last Login 9.08.20, 10.30 P.M</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="mt-5">
                                <div class="card gigs-task">
                                    <!-- <img class="card-img-top" src="img/gig.png" /> -->
                                    <div class="card-body position-relative">
                                        <div class="gig-task-prof">
                                            <img src=" http://www.drivedigitally.com/hirenworknew/assets/img/img-profile.jpg" class="user-img">
                                            <p class="my-2 ">Don Bros <span class="d-block small"><i class="fa fa-map-marker"></i> Sydney, NSW, Australia</span>
                                            </p>
                                            <!-- <p class="my-2 small"><span class="text-primary"><b>50</b></span>
                                      Projects
                                      Done</p> -->
                                            <div class="row">
                                                <div class=" col  my-2 small "><span class="text-primary"><b>50</b></span> Projects Done
                                                </div>
                                                <div class=" col my-2 small "><span class="text-primary"><b>15</b></span> Freelancer</div>
                                            </div>
                                        </div>
                                        <h5 class="card-title text-center"><a href="micro-key-details.html">I need a UI designer for my Mobile app</a></h5>
                                        <div>
                                            <div class="micro-key">Micro-task</div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-muted d-flex justify-content-between flex-wrap">
                                        <div>
                                            <span class="coin-tag">5 Coins</span>
                                        </div>
                                        <div class="pull-right" style="margin-top: 6px;">
                                            <span class="text-gray mr-2 font-weight-bold">Spent</span>
                                            <span class="text-primary">$ 430</span>
                                        </div>
                                        <div class="w-100 border-top mt-3">
                                            <p class="text-center text-muted small mt-2 mb-0" style="font-size: 12px">Last Login 9.08.20, 10.30 P.M</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="mt-5">
                                <div class="card gigs-task">
                                    <!-- <img class="card-img-top" src="img/gig.png" /> -->
                                    <div class="card-body position-relative">
                                        <div class="gig-task-prof">
                                            <img src=" http://www.drivedigitally.com/hirenworknew/assets/img/img-profile.jpg" class="user-img">
                                            <p class="my-2 ">Don Bros <span class="d-block small"><i class="fa fa-map-marker"></i> Sydney, NSW, Australia</span>
                                            </p>
                                            <!-- <p class="my-2 small"><span class="text-primary"><b>50</b></span>
                                      Projects
                                      Done</p> -->
                                            <div class="row">
                                                <div class=" col  my-2 small "><span class="text-primary"><b>50</b></span> Projects Done
                                                </div>
                                                <div class=" col my-2 small "><span class="text-primary"><b>15</b></span> Freelancer</div>
                                            </div>
                                        </div>
                                        <h5 class="card-title text-center"><a href="micro-key-details.html">I need a UI designer for my Mobile app</a></h5>
                                        <div>
                                            <div class="micro-key">Micro-task</div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-muted d-flex justify-content-between flex-wrap">
                                        <div>
                                            <span class="coin-tag">5 Coins</span>
                                        </div>
                                        <div class="pull-right" style="margin-top: 6px;">
                                            <span class="text-gray mr-2 font-weight-bold">Spent</span>
                                            <span class="text-primary">$ 430</span>
                                        </div>
                                        <div class="w-100 border-top mt-3">
                                            <p class="text-center text-muted small mt-2 mb-0" style="font-size: 12px">Last Login 9.08.20, 10.30 P.M</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pag">
                            <ul class="pagination" style="margin-top:20px;">
                                <li class="previous"><a href="#">Previous</a></li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">6</a></li>
                                <li class="next"><a href="#">Next</a></li>
                            </ul>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</main>


<!-- script for auto complete multiselect -->
<script src="<?php  echo base_url('assets/js/fastselect.standalone.js'); ?>"></script>
<script>
    $('.multipleSelect').fastselect();

</script>

<script>
    $(document).ready(function() {
        $("#fldSearchCriteria").keyup(function() {
            $.ajax({
                    method: "POST",
                    url: "<?php echo base_url(); ?>Task/ajax_list_tasks",
                    data: {
                        searchCriteria: $(this).val()
                    }
                })
                .done(function(msg) {
                    $("#searchResult").html(msg);
                });
        });
    });

</script>
