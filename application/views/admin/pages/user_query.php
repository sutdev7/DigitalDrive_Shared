<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Anonymous User Query</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Anonymous User Query</li>
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
					  <h3 class="card-title">Query List</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body"><?php echo $this->session->userdata('msg'); ?>
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
						<tr>
						  <th width="5%" align="center">Sl No.</td>
						  <th width="25%" align="center">Name</th>
						  <th width="25%" align="center">Email</th>
						  <th width="30%" align="center">Message</th>
						  <th width="10%" align="center">Created On</th>
						  <th width="5%" align="center">Status</th>
						</tr>
						</thead>
						<tbody>
						<?php
						
						if(!empty($info)){ $count = 1;
							foreach($info as $row){
							?>
							<tr>
							  <td><?= $count++ ?></td>
							  <td><?= $row->name ?></td>
							  <td><?= $row->mail_id ?></td>
							  <td><?= $row->message ?></td>
							  <td><?= date('d/m/Y',strtotime($row->doc)) ?></td>
							  <td><?= $row->read_status ?></td>
							</tr>
							<?php
							}
						}else{
							?>
							<tr><td colspan="7">No Data Found</td></tr>
							<?php
						}
						?>
						</tbody>
						<tfoot>
						<tr>
						  <th width="5%" align="center">Sl No.</td>
						  <th width="25%" align="center">Name</th>
						  <th width="25%" align="center">Email</th>
						  <th width="30%" align="center">Message</th>
						  <th width="10%" align="center">Created On</th>
						  <th width="5%" align="center">Status</th>
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
	$('.activebtn').on('click', function(){
		var pk = $(this).data('id');
		var action = $(this).val(); 
		$.ajax({
			url: "<?= base_url()?>admin/change_status",
			type: "POST",
			data: {
				pk: pk,
				action: action,
				_token: '{{csrf_token()}}',
				_method: 'POST'
			},
			beforeSend: function() { $('#wait'+pk).show(); },
			complete: function() { $('#wait'+pk).hide(); },
			success: function (data) {
				$('#customSwitch'+pk).val(data);
			}
		});
	});
  });
  
/*  
$('#example1').DataTable({
	"order": [[0, "asc"]],
	
	"fnDrawCallback": function() {
		$('.catstatus').bootstrapSwitch({
			onText: 'ON',
			offText: 'OFF',
			onColor: 'success',
			offColor: 'danger',
			onSwitchChange: function (event, state) {

				$(this).val(state ? '0' : '1');

				var pk = $(this).data('key');
				
				var action = $(this).val(); alert(action)
				$.ajax({
					url: "<?= base_url()?>admin/change_status",
					type: "POST",
					data: {
						pk: pk,
						action: action,
						_token: '{{csrf_token()}}',
						_method: 'POST'
					},
					beforeSend: function() { $('#wait').show(); },
					complete: function() { $('#wait').hide(); }
					success: function (data) {
						
						toastr.success(data);
					}
				});
			}
		});
	}
});
  
 */ 
  
  
  
  </script>
  
  