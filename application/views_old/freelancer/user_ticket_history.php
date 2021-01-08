<main id="main"> 
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!-- DataTables -->
  <link rel="stylesheet" href="https://www.drivedigitally.com/hwfinal/assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<main id="main"> 

<?php 

	$frmValidationMsg = validation_errors(); 
	if(!empty($frmValidationMsg)) {
?>
	<section style="padding-top: 7%;">
		<?php echo '<div class="alert alert-danger text-center">' . $frmValidationMsg . '</div>'; ?>
	</section>
<?php
  }
?>
  <!--==========================
      ConterDiv Section
    ============================-->
  <section id="postDiv">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="card-body"><?php echo $this->session->userdata('msg'); ?>
            <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th width="3%" align="center">Sl No.</td>
              <th width="5%" align="center">Ticket No</th>
              <th width="5%" align="center">Subject</th>
              <th width="15%" align="center">content</th>
              <th width="15%" align="center">status</th>
              <th width="2%" align="center">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if(!empty($grievance)){ $count = 1;
              foreach($grievance as $key => $row){

                $sql ="SELECT * FROM user_ticket_history where ticket_no='".$row->problem_ticket_no."' and user_view = 1";
                $query = $this->db->query($sql);
                $countmsg = $query->num_rows();

              ?>
              <tr>
                <td><?= $key + 1 ?>
                  <?= ($countmsg>0) ? '<div class="newmsg">'.$countmsg.' New</div>' : '' ?>
                </td>
                <td><?= $row->problem_ticket_no ?></td>
                <td><?= $row->grievance_subject ?></td>
                <td><?= $row->grievance_content ?></td>
                <td><?= $row->problem_status ?></td>
              
                <td><a href="<?= base_url()?>ticket-history-details/<?= $row->problem_ticket_no ?>" title="View Details" target="_blank"><i class="fa fa-eye"></i></a>
                  <a href="<?= base_url()?>user-compose-email/<?= $row->problem_ticket_no ?>" title="Compose Email"><i class="fa fa-inbox" aria-hidden="true"></i></a>
                  
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
              <th width="5%" align="center">Subject</th>
              <th width="15%" align="center">content</th>
              <th width="15%" align="center">status</th>
              <th width="2%" align="center">Actions</th>
            </tr>
            </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<script src="https://www.drivedigitally.com/hwfinal/assets/admin/plugins/datatables/jquery.dataTables.js"></script>
<script src="https://www.drivedigitally.com/hwfinal/assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script type="text/javascript">
  $(function () {
    $("#example1").DataTable();
  })
</script>