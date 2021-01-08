<!-- Content Wrapper. Contains page content -->
    
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Category Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url().'admin/dashboard'?>">Home</a></li>
              <li class="breadcrumb-item active">Edit Category</li>
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
		<form action="<?= base_url().'admin/category_add' ?>" method="post">
		<input type="hidden" name="row_id" value="">
		<div class="row">
			<div class="col-lg-12">
				<div class="card card-info card-outline">
					<div class="card-header">Details</div>
					<div class="card-body">
						<div class="form-group row">
							<label for="name" class="col-sm-2 col-form-label">Name</label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="">
							</div>
						</div>
						<div class="form-group row">
							<label for="detail" class="col-sm-2 col-form-label">Detail</label>
							<div class="col-sm-8">
							  <textarea class="form-control" rows="2" placeholder="Enter ..." id="detail" name="detail"></textarea>
							</div>
						</div>
						<div class="form-group row">
							<label for="status" class="col-sm-2 col-form-label">Status</label>
							<div class="col-sm-8">
							  <select class="form-control" name="status" id="status">
								<option value="1">Active</option>
								<option value="0">Deactive</option>
							  </select>
							</div>
						</div>
						<div class="col-md-6 offset-md-2">
							<input type="submit" name="submit" value="submit" class="btn btn-success">
						</div>
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
  
  
  