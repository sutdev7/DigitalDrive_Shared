<!-- Content Wrapper. Contains page content -->
  
  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Site Settings</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Site Settings</li>
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
		<form action="<?= base_url().'admin/add_user_info' ?>" method="post">
		<input type="hidden" name="user_type" value="<?=$this->uri->segment(4)?>">
        <div class="row">
			<div class="col-lg-12">
				<div class="card card-info card-outline">
					<div class="card-header">Basic Info</div>
					<div class="card-body">
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-2 col-form-label">LOGO</label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" id="logo" placeholder="LOGO" name="logo" value="" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-2 col-form-label">INVOICE LOGO</label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" id="invoice_logo" placeholder="INVOICE LOGO" name="invoice_logo" value="" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-2 col-form-label">FAVICON</label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" id="favicon" placeholder="FAVICON" name="favicon" value="" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-2 col-form-label">FOOTER TEXT</label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" id="footer_text" placeholder="FOOTER TEXT" name="footer_text" value="" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-2 col-form-label">COPYRIGHT TEXT</label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" id="copyright_text" placeholder="COPYRIGHT TEXT" name="copyright_text" value="" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-2 col-form-label">LANGUAGE</label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" id="language" placeholder="LANGUAGE" name="language" value="" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-2 col-form-label">SERVICE FEE</label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" id="service_fee" placeholder="SERVICE FEE" name="service_fee" value="" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-2 col-form-label">DEFAULT CURRENCY</label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" id="default_currency" placeholder="DEFAULT CURRENCY" name="default_currency" value="" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-2 col-form-label">SITE GOOGLE API KEY</label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" id="site_google_api_key" placeholder="SITE GOOGLE API KEY" name="site_google_api_key" value="" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-2 col-form-label">SITE FACEBOOK API KEY</label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" id="site_facebook_api_key" placeholder="SITE FACEBOOK API KEY" name="site_facebook_api_key" value="" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-2 col-form-label">SITE YOUTUBE ADV EMBEDDED</label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" id="site_youtube_adv_embedded" placeholder="SITE YOUTUBE ADV EMBEDDED" name="site_youtube_adv_embedded" value="" required>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<input type="submit" name="submit" value="submit" class="btn btn-success float-right">
					</div>
				</div>
			</div>
		</div>
		</form>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<script>
  $(function () {
    //$('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });
	$('#dob').datepicker();
	
    $("#example1").DataTable();
	//Initialize Select2 Elements
    $('.select2').select2();

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });
	
	$('.toastrDefaultSuccess').click(function() {
      toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
	
	$('.toastrDefaultWarning').click(function() {
      toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
	
  })
</script> 
  
  
  