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

						<?php if(!empty($info)){ ?>
						<div class="card-header">
	                        <div class="col-md-4" style="float: left;">
								<h3 class="card-title">Ticket : <?php echo isset($info[0]->ticket_no) ? $info[0]->ticket_no : '';?></h3>
	                        </div>

	                        <div class="col-md-4" style="float: left;">
								<h3 class="card-title">Total message :  <?php echo count($info);?></h3>
	                        </div>

	                        <div class="col-md-4" style="float: right;">
								<a href="<?= base_url()?>admin/compose_email_history/<?= isset($info[0]->ticket_no) ? $info[0]->ticket_no : '' ?>" title="Compose Email"><i class="fa fa-inbox" aria-hidden="true"></i>  Send message</a></h3>
	                        </div>

						</div>
						<div class="card-body">
							<div class="col-md-12">

                               <?php if(!empty($info)){
                               	     foreach($info as $information) {	?>

									<div class="row" style="border-bottom: 1px dotted;">
										<div class="col-md-3">
											<?php echo date('d-m-Y', strtotime($information->dom)) ;?>
											<div style="color: red"><?php echo $information->admin_type;?></div>
										</div>
										<div class="col-md-9">
											<?php echo $information->email_body ;?>
										</div>
									</div>

							   <?php }} ?>

							</div>
						</div>
						 <?php } else{?>

						 	<div class="" style="text-align: center;padding: 50px;">No message list found</div>

						 <?php } ?> 	

					</div>
				</div>
			</div>
			<!-- /.row (main row) -->
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
  <!-- /.content-wrapper -->