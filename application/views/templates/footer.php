</div>
  <!-- /.content-wrapper -->
  <footer class="main-footer  d-print-none">
    <strong>Copyright &copy; 2014-2018 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.0-alpha
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script type="text/javascript" src="<?php echo base_url() ?>asset/js/jquery3.js"></script>
<script src="<?= base_url() ?>asset/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url() ?>asset/dist/js/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Morris.js charts -->
<script src="<?= base_url() ?>asset/dist/js/raphael-min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url() ?>asset/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?= base_url() ?>asset/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?= base_url() ?>asset/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url() ?>asset/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url() ?>asset/dist/js/moment.min.js"></script>
<script src="<?= base_url() ?>asset/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?= base_url() ?>asset/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?= base_url() ?>asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?= base_url() ?>asset/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url() ?>asset/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>asset/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="--><?//= base_url() ?><!--asset/dist/js/pages/dashboard.js"></script>-->
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>asset/dist/js/demo.js"></script>
<script src="<?= base_url() ?>asset/dist/js/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>asset/js/jquery.doubleScroll.js"></script>

<script src="<?= base_url() ?>asset/js/apps.js"></script>
<!-- 
<script src="<?= base_url() ?>asset/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>asset/plugins/datatables/dataTables.bootstrap4.min.js"></script> -->

<script type="text/javascript" src="<?php echo base_url() ?>asset/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>asset/js/dataTables.bootstrap4.min.js"></script>

<script src="<?=base_url()?>asset/dist/js/sweetalert2.all.js"></script>

<script>
  $(document).ready(function() {
    $('#example1').DataTable();
} );
</script>
<script>
	function logout(){
		Swal.fire({
			title: 'Anda yakin ingin keluar ?',
			type: 'warning',
			confirmButtonText: 'Ok',
			showCancelButton: true
		})
	}
</script>
</body>
</html>
