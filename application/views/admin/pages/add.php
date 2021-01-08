<!-- Content Wrapper. Contains page content -->
  
  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?= (base64_decode($this->uri->segment(4)) == 'c') ? 'Client' : 'Freelancer' ?> Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add User</li>
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
							<label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="gender" class="col-sm-2 col-form-label">Gender</label>
							<label class="radio-inline">
							  <input type="radio" id="gender" name="gender" value="F" checked> Female
							</label>
							<label class="radio-inline">
							  <input type="radio" id="gender" name="gender" value="M"> Male
							</label>
							<label class="radio-inline">
							  <input type="radio" id="gender" name="gender" value="O"> Other
							</label>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-2 col-form-label">Date of Birth</label>
							<div class="col-sm-8">
							  <input type="text" name="dob" id="dob" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask value="">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-2 col-form-label">Bio</label>
							<div class="col-sm-8">
							  <textarea class="form-control" rows="3" placeholder="Enter ..." name="bio"></textarea>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<div class="card card-info card-outline">
					<div class="card-header">Login Credentials</div>
					<div class="card-body">
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
							<div class="col-sm-8">
								<input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email" value="" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
							<div class="col-sm-8">
								<input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputPassword3" class="col-sm-2 col-form-label">Confirm Password</label>
							<div class="col-sm-8">
								<input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="cpassword">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-2 col-form-label">Mobile</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="inputEmail3" placeholder="Mobile" name="mobile" value="">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="card card-info card-outline">
					<div class="card-header">Location</div>
					<div class="card-body">
						<div class="form-group1 row">
							<label for="continent" class="col-sm-2 col-form-label">Country</label>
							<div class="col-sm-8"> 
								<select class="form-control select2" name="country">
									<option value="">-Select-</option>
									<?php
										if(!empty($countrylist)){
											foreach($countrylist as $row){
										?>
										<option value="<?= $row->country_id ?>"><?= $row->name ?></option>
										<?php	
											}
										}
									?>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="state" class="col-sm-2 col-form-label">State</label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" id="state" placeholder="State" name="state" value="">
							</div>
						</div>
						<div class="form-group row">
							<label for="continent" class="col-sm-2 col-form-label">City</label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" id="city" placeholder="City" name="city">
							</div>
						</div>
						<div class="form-group row">
							<label for="address" class="col-sm-2 col-form-label">Address</label>
							<div class="col-sm-8">
								<textarea class="form-control" id="address" rows="3" placeholder="Enter ..." name="address"></textarea>
							</div>
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
  
  
  