<!-- /.content-wrapper -->
<footer class="main-footer">
    <strong>Developed by <a>Kazu</a>.</strong>
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- moment -->
<!-- <script src="plugins/moment/moment.min.js"></script> -->
<!-- Tempusdominus Bootstrap 4 -->
<!-- <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script> -->
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="plugins/js/adminlte.min.js"></script>
<!-- datatables -->
<script src="plugins/datatables/datatables.min.js"></script>
<!-- croppie -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.js"></script> -->
<!-- Bootstrap Switch -->
<script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script>document.title='<?php echo $title?> | Black & White';</script>
<script src="plugins/js/customdesign.js"></script>
<!-- <script src="plugins/jquery/core.js"></script> -->
<script type="text/javascript">
$(document).ready(function() {
    $('#manga-table').DataTable({
        "language": {
          "emptyTable": "No manga found in the database.",
          "zeroRecords": "No matching manga found in the database."
        }
    });
} );
$(document).ready(function() {
    // $('.select2').select2();
    var select2=$('.select2').select2();
     //select2.data('select2').$selection.css('height', '38px');

});
</script>





