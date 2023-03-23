<!-- jQuery -->
<script src="public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="public/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="public/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="public/dist/js/demo.js"></script>
<script>
$(function () {
    $("#datatable").DataTable({
    "responsive": true,
    "autoWidth": false,
    });
});

function acceptDelete (msg) {
    if (window.confirm(msg)) {
        return true;
    }

    return false;
}
</script>