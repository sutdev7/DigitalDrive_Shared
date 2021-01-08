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
  
  ($this->session->userdata('user_type') == 3)? $user_type = 'Client' : $user_type = 'Freelancer';
  
  ?>

  <!--==========================
      ConterDiv Section
      ============================-->
      <section id="profile_section">
        <div class="profile_top">
          <div class="container">
            <div class="row">
              <div class="col-lg-3"> </div>
              <div class="col-lg-9">
                <div class="profile_topLink <?php echo  ($this->session->userdata('user_type') == 4) ? 'freelancer' : 'client'; ?>">
                  <ul>
                    <li><a href="<?php echo base_url(); ?>user-bio"><img src="<?php  echo base_url('assets/img/BioIcon-1A.png'); ?>" alt=""><?=$user_type?> Bio</a></li>

                    <?php if($this->session->userdata('user_type') == 4) {?>
                      <li class="active"><a href="<?php echo base_url(); ?>portfolio"><img src="<?php  echo base_url('assets/img/GenderIcon-1A.png'); ?>" alt=""> Portfolio</a></li>
                    <?php } ?>

                    <li ><a href="<?php echo base_url(); ?>gender"><img src="<?php  echo base_url('assets/img/GenderIcon-1A.png'); ?>" alt=""> Gender</a></li>
                    <li><a href="<?php echo base_url(); ?>payment"><img src="<?php  echo base_url('assets/img/PaymentIcon-1A.png'); ?>" alt=""> Payment</a></li>
                    <li><a href="<?php echo base_url(); ?>settings"><img src="<?php  echo base_url('assets/img/SettingIcon-1A.png'); ?>" alt=""> Settings</a></li>
                    <li><a href="<?php echo base_url(); ?>reviews"><img src="<?php  echo base_url('assets/img/ReviewIcon-1A.png'); ?>" alt=""> Reviews</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="profile">
          <div class="container">
            <div class="row">
              <div class="col-lg-3">
                <div class="pro_img"> <span class="pro_imgBox"><img src="{user_info}{user_image}{/user_info}" alt="Profile Image" /> <a href="#" class="uplod"></a> </span>
                  <h2><?php echo $this->session->userdata('user_name'); ?></h2>
                  <p>{user_info} {city} {/user_info}, {user_info} {state} {/user_info}, {user_info} {country} {/user_info}</p>
                  <a href="<?php echo base_url(); ?>public-profile" class="pro_imgBtn">View Public Profile</a> <a href="<?php echo base_url(); ?>logout" class="pro_logout" ><img src="<?php  echo base_url('assets/img/logout.png'); ?>" alt=""></a> </div>
                </div>

                <div class="col-lg-9 portfolioback">
                 <div class="row"> 
                  <div class="col-md-12">
                    <div class="pro_info">
                      <div>
                        <h4 style="float: left;">Portfolio</h4>
                        <a class="addMore" data-toggle="modal" href="#EditArea" style="float: right;">
                          <i class="fa fa-plus" aria-hidden="true"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>


                <div class="row">

                  <?php if(!empty($portfolioData)){
                    foreach($portfolioData as $portfolio){ ?>
                      <div class="col-md-4 pmargintop">
                        <div class="ptotalblock">
                          <?php if($portfolio->portfolio_image == '') {?>
                            <img src="<?php echo base_url(); ?>/uploads/user/portfolio_image/no_image.png" style="width: 100%;height: 220px;">
                          <?php }else{ ?>
                            <img src="<?php echo base_url(); ?>/uploads/user/portfolio_image/<?php echo $portfolio->portfolio_image; ?>" style="width: 100%;height: 220px;"> 
                          <?php } ?>
                        <div class="hblock">
                        <div class="ptitle">
                          <?php echo $portfolio->portfolio_url; ?>
                          <!-- <div  class="pdesc"><?php echo $portfolio->portfolio_desc; ?></div> -->
                        </div>
                        <div class="ptitle2">
                          <?php echo $portfolio->portfolio_desc; ?>
                        </div>
                        
                      </div>
                        <div class="peditlogo" data-id="<?php echo $portfolio->id; ?>"><i class="fa fa-pencil" aria-hidden="true" style="color: white"></i></div>
                        </div>
                      </div>
                    <?php }} ?>



                  </div>


                </div>


              </div>
            </div>
          </div>
        </section>
      </main>

      <!--Edit Area Popup-->
      <div class="modal editingModal" id="EditArea">
        <div class="modal-dialog modal-sm">
          <div class="modal-content"> 
            <form name="frmSaveUserInfo" class="userInfo" method="post" action="<?php echo base_url(); ?>user/savePortfolioData" enctype="multipart/form-data">
              <!-- Modal Header -->
              <div class="modal-header"> Portfolio
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <!-- Modal body -->
              <div class="modal-body">
                <input class="form-control editId" name="editId" type="hidden" value="" />
                <div class="form-group">
                  <input class="form-control fldName" name="fldName" type="text" value="" placeholder="project name" required />
                </div>
                <div class="form-group">
                  <input class="form-control fldUrl" name="fldUrl" type="text" value="" placeholder="project url" required />
                </div>
                <div class="form-group">
                  <textarea class="fldDesc" name="fldDesc" placeholder="project description" required></textarea>
                </div>



                <div class="custom-file">
                  <input class="custom-file-input file-upload" id="customFile" name="projectImage" type="file" accept="image/*">

                  <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
                <span class="imsurl"></span>

              </div>

              <!-- Modal footer -->
              <div class="modal-footer">
                <input name="btnSubmit" type="submit" value="Save">
              </div>
            </form>
          </div>
        </div>
      </div>
      <!--Edit Area Popup--> 

      <script>
// Add the following code if you want the name of the file appear on select
// $(".custom-file-input").on("change", function() {
//   var fileName = $(this).val().split("\\").pop();
//   $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
// });

$(document).ready(function() { 

  $(document).on('click','.peditlogo',function(){

   $("#EditArea").find('form').trigger('reset');

    var pk = $(this).data('id');
    var base_url = window.location.origin+'/hwfinal';

    $.ajax({

        url: "<?= base_url()?>portfolio/getPortfolioList",
        type: "POST",
        data: { pk: pk },
        dataType: 'json',
        success: function (result) {

          $('.editId').val(result.result.id);
          $('.fldName').val(result.result.portfolio_name);
          $('.fldUrl').val(result.result.portfolio_url);
          $('.fldDesc').val(result.result.portfolio_desc);

          $('.imsurl').html('<img id="theImg" src='+base_url+'/uploads/user/portfolio_image/'+result.result.portfolio_image+'>');
          
          $("#EditArea").modal('show');
        //$('#customSwitch'+pk).val(data);
      }


    });



  });

});
</script>