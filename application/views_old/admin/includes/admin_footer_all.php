	<footer class="main-footer">
		<strong>Copyright &copy; <?= date('Y')?> <a href="#">Hire & Work</a>.</strong>
	</footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url().'assets/admin/' ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url().'assets/admin/' ?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url().'assets/admin/' ?>plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url().'assets/admin/' ?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url().'assets/admin/' ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url().'assets/admin/' ?>plugins/jquery-knob/jquery.knob.min.js"></script>

<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url().'assets/admin/' ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url().'assets/admin/' ?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url().'assets/admin/' ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url().'assets/admin/' ?>dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url().'assets/admin/' ?>dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url().'assets/admin/' ?>dist/js/demo.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        setInterval(function(){
            $.ajax({
                method: "POST",
                url: BASE_URL + "admin/get_notification"
            }).done(function(msg) {
                $(".notification_content").html(msg);
            });
        },5000); 
    });
</script>
</body>
</html>