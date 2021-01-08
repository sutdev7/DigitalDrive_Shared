<style type="text/css">
  mce-panel{ 
    padding: 1px;
  }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Problem Ticket Email</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url().'admin/dashboard'?>">Home</a></li>
            <li class="breadcrumb-item active">Problem Ticket Email</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
	  <div class="col-lg-12">
	  <?php if($this->session->flashdata('msg')){
		  echo $this->session->flashdata('msg');
	  } ?>
	  
	  </div>
        <div class="col-lg-12">
          <div class="card card-info card-outline">
            <div class="card-header">Compose Email</div>
            <div class="card-body">
              <div class="container-fluid">
                <div class="middle overViewPage">
                  <div class="container-fluid">
                      <!-- <h2 class="pageTitle"><strong>Compose</strong></h2> -->
                      <div class="row">
                        <div class="col-md-12">
                          <!-- <h4>Compose</h4> -->
                          <form class="form-horizontal" action="<?= base_url()?>admin/send_email" method="POST" id="grievance_email_form">
                            <input type="hidden" name="grievance_id" id="grievance_id" value="<?= isset($grievance_id) ? $grievance_id : '' ?>" />
                            <input type="hidden" name="from" id="from" value="<?= isset($from) ? $from : '' ?>" />
                            <input type="hidden" name="user_id" id="user_id" value="<?= isset($user_id) ? $user_id : '' ?>" />
                            <div class="form-group">
                              <label for="email" class="col-sm-2 control-label">To:</label>
                              <div class="col-sm-10">
                                <input type="email" name="email_to" required="" class="form-control" id="email" placeholder="Email" value="<?= isset($send_mail) ? $send_mail : ''  ?>">
                              </div>
                            </div>
<!--                            <div class="form-group">
                              <label for="carbonCopy" class="col-sm-2 control-label">CC:</label>
                              <div class="col-sm-10">
                                <input type="email" class="form-control" id="carbonCopy" placeholder="Carbon copy addresses..." name="cc">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="blindCarbonCopy" class="col-sm-2 control-label">BCC:</label>
                              <div class="col-sm-10">
                                <input type="email" class="form-control" id="blindCarbonCopy" placeholder="Blind carbon copy addresses..." name="bcc">
                              </div>
                            </div>-->
                            <!--<div class="form-group">
                              <label for="sentFrom" class="col-sm-2 control-label">Send from:</label>
                              <div class="col-sm-10">
                                <input type="email" class="form-control" name="email_from" id="sentFrom" placeholder="Send from addresses..." required="">
                              </div>
                            </div>-->
                            <div class="form-group">
                              <label for="emailSubject" class="col-sm-2 control-label">Subject:</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="emailSubject" placeholder="Subject of email..." name="email_subject" required="">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="emailBody" class="col-sm-2 control-label">Email body:</label>
                              <div class="col-sm-10">
                                <textarea id="emailBody" name="email_body" class="form-control" rows="20" placeholder="Message..."></textarea>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" id="grievance_email_submit" class="btn btn-default">Send</button>
                              </div>
                            </div>
                          </form>
                        </div>

                      </div> <!--end .row -->

                    </div><!--end .container-fluid-->
                  </div><!--end .overViewPage-->
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script type="text/javascript" language="" src="https://tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script type="text/javascript" language="javascript">
  tinymce.init({
  selector: "textarea",
  plugins: [
    "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
    "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern"
  ],
  toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
  toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | insertdatetime preview | forecolor backcolor",
  toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",
  menubar: false,
  style_formats: [
    {title: 'Bold text', inline: 'b'},
    {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
    {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
    {title: 'Example 1', inline: 'span', classes: 'example1'},
    {title: 'Example 2', inline: 'span', classes: 'example2'},
    {title: 'Table styles'},
    {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
  ],
  templates: [
    {title: 'Test template 1', content: 'Test 1'},
    {title: 'Test template 2', content: 'Test 2'}
  ]
});
</script>