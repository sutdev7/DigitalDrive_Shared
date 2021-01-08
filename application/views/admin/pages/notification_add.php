<!-- Content Wrapper. Contains page content -->
  
  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Notification</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Notification</li>
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
					<div class="card-header">Info</div>
					<div class="card-body">
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-2 col-form-label">TITLE</label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" id="title" placeholder="TITLE" name="TITLE" value="" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-2 col-form-label">CODE</label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" id="code" placeholder="CODE" name="CODE" value="" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-2 col-form-label">VIEW CODE</label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" id="view_code" placeholder="VIEW CODE" name="VIEW CODE" value="" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-2 col-form-label">MESSAGE</label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" id="messege" placeholder="MESSAGE" name="MESSAGE" value="" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-2 col-form-label">ACTION ID</label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" id="action_id" placeholder="ACTION_ID" name="ACTION_ID" value="" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-2 col-form-label">CONSTANT</label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" id="constant" placeholder="CONSTANT" name="CONSTANT" value="" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-2 col-form-label">CREATED BY</label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" id="created_by" placeholder="CREATED BY" name="CREATED BY" value="" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-2 col-form-label">CREATED ON</label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" id="created_on" placeholder="CREATED ON" name="CREATED ON" value="" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-2 col-form-label">MODIFIED BY</label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" id="modified_by" placeholder="MODIFIED_BY" name="MODIFIED_BY" value="" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-2 col-form-label">MODIFIED ON</label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" id="modified_on" placeholder="MODIFIED ON" name="MODIFIED ON" value="" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="is_active" class="col-sm-2 col-form-label">ACTIVE</label>
							<label class="radio-inline">
							  <input type="radio" id="is_active" name="IS_ACTIVE" value="Y" checked> Active
							</label>
							<label class="radio-inline">
							  <input type="radio" id="is_active" name="IS_ACTIVE" value="N"> Inactive
							</label>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<input type="submit" name="submit" value="submit" class="btn btn-success float-right">
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
  
  
  