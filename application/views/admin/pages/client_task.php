<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
	
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">microkey client tasks</li>
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
			<div class="col-12">
				<div class="card">
					<div class="card-header">
					  <h3 class="card-title">Client Microkey Tasks</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body"><?php echo $this->session->userdata('msg'); ?>
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
						<tr >
						  <td>Sl No.</td>
						  <th>Title</th>
						  <th>Skills</th>
						  <th>Budget</th>
						  <th>Duration Type</th>
						  <th>Description</th>
						</tr>
						</thead>
						<tbody>
						<?php
						
						if(isset($tasks)){
							foreach($tasks as $row){
							?>
							<tr>
							  <td><?= $count++ ?></td>
							  <td><?= $row->title ?></td>
							  <td><?= $row->skills ?></td>
							  <td><?= $row->budget ?></td>
							  <td><?= $row->duration_type ?></td>
							  <td><?= $row->description ?></td>
							  <td>
								<!--<div class="btn-group">
									<a type="button" class="btn btn-info" title="Edit Info" href="<?= base_url().'admin/user/edit/'.base64_encode($row->user_id) ?>"><i class="fa fa-edit"></i></a>
								</div>
								<div class="btn-group">
									<a type="button" class="btn btn-danger" title="Delete" href="<?= base_url().'admin/user/delete/'.base64_encode($row->user_id) ?>" onClick="return confirm('Do you want to delete ?');"><i class="fa fa-trash"></i></a>
								</div>-->
							  </td>
							</tr>
							<?php
							}
						}else{
							?>
							<tr><td colspan="">No Data Found</td></tr>
							<?php
						}
						
						?>
						
						</tbody>
						<tfoot>
						<tr>
						<td>Sl No.</td>
						  <th>Title</th>
						  <th>Skills</th>
						  <th>Budget</th>
						  <th>Duration Type</th>
						  <th>Description</th>
						</tr>
						</tfoot>
					  </table>
					</div>
					<!-- /.card-body -->
				</div>
          </div>
        </div>
        <div class="row"></div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <script>
  $(function () {
    $("#example1").DataTable();
	$('.toastrDefaultSuccess').click(function() {
      toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
	
	$('.toastrDefaultWarning').click(function() {
      toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
  });
  </script>
  
  