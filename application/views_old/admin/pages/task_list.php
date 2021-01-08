<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Task List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Task List</li>
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
					  <h3 class="card-title">List of Task</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body"><?php echo $this->session->userdata('msg'); ?>
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
						<tr>
						  <td width="10%">Sl No.</td>
						  <th width="30%">Task Title</th>
						  <th width="30%">Created By</th>
						  <th>Skills</th>
						  <th>Due Date</th>
						  <th width="10%" align="center">Budget</th>
						  <th width="10%">Hired</th>
						</tr>
						</thead>
						<tbody>
						<?php
						
						if(!empty($info)){ $count = 1;
							foreach($info as $row){
							?>
							<tr>
							  <td><?= $count++ ?></td>
							  <td><?= $row->task_name ?></td>
							  <td><?= $row->name ?></td>
							  <td><?= $row->skill ?></td>
							  <td><?= date('d/m/Y',strtotime($row->task_due_date)) ?></td>
							  <td><?= $row->task_total_budget ?></td>
							  <td><?= ($row->task_hired == 1) ? '<i class="fas fa-handshake"></i>' : '' ?></td>
							</tr>
							<?php
							}
						}else{
							?>
							<tr><td colspan="5">No Data Found</td></tr>
							<?php
						}
						?>
						</tbody>
						<tfoot>
						<tr>
						  <td width="10%">Sl No.</td>
						  <th width="30%">Task Title</th>
						  <th width="30%">Created By</th>
						  <th>Skills</th>
						  <th>Due Date</th>
						  <th width="10%" align="center">Budget</th>
						  <th width="10%">Hired</th>
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
  
  