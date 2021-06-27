<footer class="main-footer text-center">
    <strong>Copyright &copy; Prestasi Mahasiswa <?= date('Y'); ?></a>.</strong>
    <div class="float-right d-none d-sm-inline-block">
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/'); ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Switch -->
<script src="<?= base_url('assets/'); ?>plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Bootstrap4 Duallistbox -->
<script src="<?= base_url('assets/') ?>plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url('assets/'); ?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url('assets/'); ?>plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url('assets/'); ?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url('assets/'); ?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url('assets/'); ?>plugins/moment/moment.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('assets/'); ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url('assets/'); ?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('assets/'); ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/'); ?>dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url('assets/'); ?>dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/'); ?>dist/js/demo.js"></script>
<!-- SweetAlert -->
<script src="<?= base_url('assets/'); ?>plugins/sweetalert2/sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/sweetalert2/myscript.js"></script>
<!-- PDF Make -->
<script src="<?= base_url('assets/'); ?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/pdfmake/vfs_fonts.js"></script>
<!-- Hightchart -->
<script src="<?= base_url('assets/'); ?>pages/charts/highcharts/highcharts.js"></script>
<script src="<?= base_url('assets/'); ?>pages/charts/highcharts/jquery.highchartTable-min.js"></script>
<!-- bootstrap color picker -->
<script src="<?= base_url('assets/'); ?>plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>

<!-- javascript -->
<script>
    $(document).ready(function() {
        $('table.highchart').highchartTable();
    });
</script>
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

    $('.form-check-input').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
            url: "<?= base_url('admin/changeaccess'); ?>",
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = "<?= base_url('admin/roleAccess/'); ?>" + roleId;
            }
        });
    });

    function previewFile() {
        const presma = document.querySelector('#presma');
        const presmaLabel = document.querySelector('.custom-file-label');
        const filePreview = document.querySelector('.file-preview');

        presmaLabel.textContent = presma.files[0].name;

        const filepresma = new FileReader();
        filepresma.readAsDataURL(presma.files[0]);

        filepresma.onload = function(e) {
            $('.label-filePdf').removeAttr('hidden');
            $('.file-preview').removeAttr('hidden');
            filePreview.src = e.target.result;
        }
    }
</script>
</body>

</html>