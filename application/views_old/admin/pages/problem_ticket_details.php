<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Problem Ticket Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url().'admin/dashboard'?>">Home</a></li>
              <li class="breadcrumb-item active">Problem Ticket Details</li>
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
				<div class="card card-info card-outline">
					<div class="card-header"><h3 class="card-title">Details</h3>
					<a href="<?= base_url()?>admin/compose_email/<?= $info->id ?>" title="Compose Email" class="btn btn-info float-right btn-sm">Compose Email     <i class="fa fa-inbox" aria-hidden="true"></i></a></div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label for="name" class="control-label">Name</label>
									<input type="text" class="form-control" id="name" placeholder="Name" name="name" value="<?= $info->name ?>" readonly>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="name" class="control-label">Country</label>
									<input type="text" class="form-control" id="name" placeholder="Name" name="name" value="<?= $info->country_name ?>" readonly>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="name" class="control-label">Gender</label>
									<input type="text" class="form-control" id="name" placeholder="Name" name="name" value="<?= $info->gender ?>" readonly>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="name" class="control-label">DOB</label>
									<input type="text" class="form-control" id="name" placeholder="Name" name="name" value="<?= $info->date_of_birth ?>" readonly>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label for="name" class="control-label">Bio</label>
									<input type="text" class="form-control" id="name" placeholder="Name" name="name" value="<?= $info->bio ?>" readonly>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="name" class="control-label">State</label>
									<input type="text" class="form-control" id="name" placeholder="Name" name="name" value="<?= $info->state ?>" readonly>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="name" class="control-label">City</label>
									<input type="text" class="form-control" id="name" placeholder="Name" name="name" value="<?= $info->city ?>" readonly>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="name" class="control-label">VAT</label>
									<input type="text" class="form-control" id="name" placeholder="Name" name="name" value="<?= $info->vat ?>" readonly>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<label for="name" class="control-label">Email</label>
								<input type="text" name="" class="form-control" value="<?= $info->email ?>" readonly>
							</div>
							<div class="col-md-6">
								<label for="name" class="control-label">Mobile</label>
								<input type="text" name="" class="form-control" value="<?= $info->mobile ?>" readonly>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="name" class="control-label">Address</label>
								<textarea class="form-control" rows="3" readonly="" style="resize: none;"><?= $info->address ?></textarea>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="name" class="control-label">Content</label>
								<textarea class="form-control" rows="10" readonly="" style="resize: none;"><?= $info->grievance_content ?></textarea>
							</div>
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