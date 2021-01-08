<style>


.switch {
	position: relative;
	display: block;
	vertical-align: top;
	width: 100px;
	height: 30px;
	padding: 3px;
	margin: 0 10px 10px 0;
	background: linear-gradient(to bottom, #eeeeee, #FFFFFF 25px);
	background-image: -webkit-linear-gradient(top, #eeeeee, #FFFFFF 25px);
	border-radius: 18px;
	box-shadow: inset 0 -1px white, inset 0 1px 1px rgba(0, 0, 0, 0.05);
	cursor: pointer;
}
.switch-input {
	position: absolute;
	top: 0;
	left: 0;
	opacity: 0;
}
.switch-label {
	position: relative;
	display: block;
	height: inherit;
	font-size: 10px;
	text-transform: uppercase;
	background: #eceeef;
	border-radius: inherit;
	box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.12), inset 0 0 2px rgba(0, 0, 0, 0.15);
}
.switch-label:before, .switch-label:after {
	position: absolute;
	top: 50%;
	margin-top: -.5em;
	line-height: 1;
	-webkit-transition: inherit;
	-moz-transition: inherit;
	-o-transition: inherit;
	transition: inherit;
}
.switch-label:before {
	content: attr(data-off);
	right: 11px;
	color: #aaaaaa;
	text-shadow: 0 1px rgba(255, 255, 255, 0.5);
}
.switch-label:after {
	content: attr(data-on);
	left: 11px;
	color: #FFFFFF;
	text-shadow: 0 1px rgba(0, 0, 0, 0.2);
	opacity: 0;
}
.switch-input:checked ~ .switch-label {
	background: #6dc183;
	box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.15), inset 0 0 3px rgba(0, 0, 0, 0.2);
}
.switch-input:checked ~ .switch-label:before {
	opacity: 0;
}
.switch-input:checked ~ .switch-label:after {
	opacity: 1;
}
.switch-handle {
	position: absolute;
	top: 4px;
	left: 4px;
	width: 28px;
	height: 28px;
	background: linear-gradient(to bottom, #FFFFFF 40%, #f0f0f0);
	background-image: -webkit-linear-gradient(top, #FFFFFF 40%, #f0f0f0);
	border-radius: 100%;
	box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);
}
.switch-handle:before {
	content: "";
	position: absolute;
	top: 50%;
	left: 50%;
	margin: -6px 0 0 -6px;
	width: 12px;
	height: 12px;
	background: linear-gradient(to bottom, #eeeeee, #FFFFFF);
	background-image: -webkit-linear-gradient(top, #eeeeee, #FFFFFF);
	border-radius: 6px;
	box-shadow: inset 0 1px rgba(0, 0, 0, 0.02);
}
.switch-input:checked ~ .switch-handle {
	left: 74px;
	box-shadow: -1px 1px 5px rgba(0, 0, 0, 0.2);
}
 
/* Transition
========================== */
.switch-label, .switch-handle {
	transition: All 0.3s ease;
	-webkit-transition: All 0.3s ease;
	-moz-transition: All 0.3s ease;
	-o-transition: All 0.3s ease;
}


</style>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Problem Ticket History</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Problem Ticket</li>
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
					  <h3 class="card-title">List of Problem</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body"><?php echo $this->session->userdata('msg'); ?>
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
						<tr>
						  <th width="3%" align="center">Sl No.</td>
						  <th width="5%" align="center">Ticket No</th>
						  <th width="15%" align="center">Grievance Type</th>
						  <th width="2%" align="center">Actions</th>
						</tr>
						</thead>
						<tbody>
						<?php
						if(!empty($info)){ $count = 1;
							foreach($info as $key => $row){
							?>
							<tr>
							  <td><?= $key + 1 ?></td>
							  <td><?= $row->ticket_no ?></td>
							  <td><?= $row->grievance_type ?></td>
							
							  <td><a href="<?= base_url()?>admin/history_ticket_details/<?= $row->ticket_no ?>" title="View Details" target="_blank"><i class="fa fa-eye"></i></a>
							  	<a href="<?= base_url()?>admin/compose_email_history/<?= $row->ticket_no ?>" title="Compose Email"><i class="fa fa-inbox" aria-hidden="true"></i></a>
							  	
							  </td>
							</tr>
							<?php
							}
						}else{
							?>
							<tr><td colspan="8">No Data Found</td></tr>
							<?php
						}
						?>
						</tbody>
						<tfoot>
						<tr>
						 <th width="3%" align="center">Sl No.</td>
						  <th width="5%" align="center">Ticket No</th>
						  <th width="15%" align="center">Grievance Type</th>
						  <th width="2%" align="center">Actions</th>
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
  
  (function() {
  $(document).ready(function() {
    $('.switch-input').on('change', function() {
	   	
      var isChecked = $(this).is(':checked');
      var selectedData;
      var $switchLabel = $('.switch-label');
      console.log('isChecked: ' + isChecked); 
      var pk = $(this).next('.switch-label').attr('data-id');

      if(isChecked) {
        selectedData = $switchLabel.attr('data-on');
      } else {
        selectedData = $switchLabel.attr('data-off');
      }
      
      $.ajax({
			url: "<?= base_url()?>admin/change_status",
			type: "POST",
			dataType : "json",
			data: {
				pk: pk,
				//action: action,
				selectedData : selectedData,
				_token: '{{csrf_token()}}',
				_method: 'POST'
			},
			beforeSend: function() { $('#wait'+pk).show(); },
			complete: function() { $('#wait'+pk).hide(); },
			success: function (data) {
				if(data == 1)
				$('.statusmsg').html('<div class="alert alert-success alert-dismissible"> Problem status update successfully.</div>');
			}
		});
    });  
  });

})();

  	
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
  
  