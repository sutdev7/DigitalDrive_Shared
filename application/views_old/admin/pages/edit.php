<!-- Content Wrapper. Contains page content -->
  
  <?php
	$name = $gender = $dob = $bio = $email = $mobile = $continent = $country = $state = $address = $user_type = $card_no = $exp_m = $exp_y = '';
	
	if(!empty($info)){ //echo '<pre>'; print_r($info); die; 
		$name = $info->name;
		$gender = $info->gender;
		$dob = $info->date_of_birth;
		$bio = $info->bio;
		$email = $info->email;
		$mobile = $info->mobile;
		//$continent = $info->continent;
		$country = $info->country;
		$state = $info->state;
		$address = $info->address;
		$user_type = $info->user_type;
		$status = $info->active_status;
		$profile_status = $info->profile_status;
		
		$card_no = isset($info->card_no) ? $info->card_no : '';		
		$exp_m = isset($info->card_expire_month) ? $info->card_expire_month : '';
		$exp_y = isset($info->card_expire_year) ? $info->card_expire_year : '';
		
	}
  ?>
  
  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">User Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url().'admin/dashboard'?>">Home</a></li>
			  <li class="breadcrumb-item active">Edit User</li>
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
		<form action="<?= base_url().'admin/edit_user_info' ?>" method="post">
		<input type="hidden" name="user_id" value="<?=$this->uri->segment(4)?>">
		<input type="hidden" name="user_type" value="<?=$user_type?>">
        <div class="row">
			<div class="col-lg-6">
				<div class="card card-info card-outline">
					<div class="card-header">Basic Info</div>
					<div class="card-body">
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="<?=$name?>">
							</div>
						</div>
						<div class="form-group row">
							<label for="gender" class="col-sm-2 col-form-label">Gender</label>
							<label class="radio-inline">
							  <input type="radio" id="gender" name="gender" value="F" <?= (trim($gender) == 'F') ? 'checked' : '' ?> > Female
							</label>
							<label class="radio-inline">
							  <input type="radio" id="gender" name="gender" value="M" <?= (trim($gender) == 'M') ? 'checked' : '' ?> > Male
							</label>
							<label class="radio-inline">
							  <input type="radio" id="gender" name="gender" value="O" <?= (trim($gender) == 'O') ? 'checked' : '' ?>> Other
							</label>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-2 col-form-label">Date of Birth</label>
							<div class="col-sm-8">
							  <input type="text" name="dob" id="dob" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask value="<?=$dob?>">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-2 col-form-label">Bio</label>
							<div class="col-sm-8">
							  <textarea class="form-control" rows="2" placeholder="Enter ..." name="bio"><?=$bio?></textarea>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-lg-6">
				<div class="card card-info card-outline">
					<div class="card-header">Location</div>
					<div class="card-body">
						<!--<div class="form-group row">
							<label for="continent" class="col-sm-2 col-form-label">Continent</label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" id="continent" placeholder="Continent" name="continent">
							</div>
						</div>-->
						<div class="form-group1 row">
							<label for="country_id" class="col-sm-2 col-form-label">Country</label>
							<div class="col-sm-8"> 
								<select class="form-control select2" id="country_id" name="country">
									<option value="">-Select-</option>
									<?php
										if(!empty($countrylist)){
											foreach($countrylist as $row){
										?>
										<option value="<?= $row->country_id ?>" <?= ($country == $row->country_id ) ? 'selected' : '' ?> ><?= $row->name ?></option>
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
							  <input type="text" class="form-control" id="state" placeholder="State" name="state" value="<?= $state ?>">
							</div>
						</div>
						<div class="form-group row">
							<label for="address" class="col-sm-2 col-form-label">Address</label>
							<div class="col-sm-8">
								<textarea class="form-control" id="address" rows="3" placeholder="Enter ..." name="address"><?= $address ?></textarea>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			
			
			<!--<div class="col-lg-6">
				<div class="card card-info card-outline">
					<div class="card-header">Profile Pic</div>
					<div class="card-body">
						<div class="form-group row">
							<label for="exampleInputFile">Image</label>
							<input type="file" id="exampleInputFile">
							<p class="help-block">Only .png,.jpeg,.jpg file allows</p>
						</div>
					</div>
				</div>
			</div>-->
		</div>
		<div class="row">
			<div class="col-lg-6">
				<div class="card card-info card-outline">
					<div class="card-header">Login Credentials</div>
					<div class="card-body">
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
							<div class="col-sm-10">
								<input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email" value="<?=$email?>" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="inputPassword3" class="col-sm-4 col-form-label">Password</label>
							<div class="col-sm-8">
								<input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputPassword3" class="col-sm-4 col-form-label">Confirm Password</label>
							<div class="col-sm-8">
								<input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="cpassword">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-2 col-form-label">Mobile</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="inputEmail3" placeholder="Mobile" name="mobile" value="<?=$mobile?>">
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-lg-6">
				<div class="card card-info card-outline">
					<div class="card-header">Payment Info</div>
					<div class="card-body">
						<div class="form-group row">
							<label for="card_no_id" class="col-sm-3 col-form-label">Card Number</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="card_no_id" placeholder="Card Number" name="card_no" value="<?=$card_no?>">
							</div>
						</div>
						<div class="form-group row">
							<label for="exp_id" class="col-sm-4 col-form-label">Expire Month/Year</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="exp_id" placeholder="" name="exp" value="<?=$exp_m?>">
							</div>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="exp_id" placeholder="" name="exp" value="<?=$exp_y?>">
							</div>
						</div>
						<div class="form-group row">
							<label for="card_name_id" class="col-sm-3 col-form-label">Cardholder Name</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="card_name_id" placeholder="" name="card_name" value="">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-12">
				<div class="card card-info card-outline">
					<div class="card-footer">
						<div class="icheck-success d-inline" style="margin-right: 132px;">
							<input type="checkbox" id="checkboxSuccess1" name="status" <?= ($status==1) ? 'checked' : '' ?> value="1">
							<label for="checkboxSuccess1">Click to actived user</label>
						</div>

						<?php if($user_type == 4){?>
							<div class="icheck-success d-inline">
								<input type="checkbox" id="checkboxSuccess2" name="profile_status" <?= ($profile_status==1) ? 'checked' : '' ?> value="1">
								<label for="checkboxSuccess2">Click to profile actived user</label>
							</div>
                        <?php } ?>


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
  
  
  