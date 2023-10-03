    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">

        <strong>Copyright &copy;2023-2024 <a href="">RS KOTA BANJAR</a>.</strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url('assets/templates') ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/templates') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="<?= base_url('assets/templates') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/templates') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets/templates') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url('assets/templates') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/templates') ?>/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url('assets/templates') ?>/dist/js/demo.js"></script>
    <!-- datepicler] -->
    <script src="<?= base_url('assets') ?>/js/datepicker/js/bootstrap-datepicker.min.js"></script>
    <!--  -->
    <!-- <script src="<?= base_url('assets') ?>/DataTables/jquery-3.7.0.js"></script> -->
    <script src="<?= base_url('assets') ?>/DataTables/DataTables-1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets') ?>/DataTables/Buttons-2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url('assets') ?>/templates/plugins/jszip/jszip.min.js"></script>
    <script src="<?= base_url('assets') ?>/DataTables/pdfmake-0.2.7/pdfmake.min.js"></script>
    <script src="<?= base_url('assets') ?>/DataTables/pdfmake-0.2.7/vfs_fonts.js"></script>
    <script src="<?= base_url('assets') ?>/DataTables/Buttons-2.4.2/js/buttons.html5.min.js"></script>
    <script src="<?= base_url('assets') ?>/DataTables/Buttons-2.4.2/js/buttons.print.min.js"></script>
    <!-- page script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
                "paging": true,
                "searching": true,
                dom: 'Bfrtip',
                lengthMenu: [
                    [10, 25, 50, -1],
                    ['10 rows', '25 rows', '50 rows', 'Show all']
                ],
                buttons: [
                    'pageLength', 'excel', 'pdf', 'print' //'csv','copy',
                ]
                
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
            });
            $("#example").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('.datepicker').datepicker({
                format: 'dd-mm-yyyy',
                autoclose: true,
                todayHighlight: true,
                //  startDate: '-3d',
            });
            // $('#formparameter').on("submit", function(event) {
                // alert("Handler for `submit` called.");
                // $('#loading').delay('200').fadeOut();
                // $('.spinner-border').hide();
                // event.preventDefault();
                // });
            });
            var btnLoading = document.getElementById('loading');
            btnLoading.style.display= "none";
            function startProses(){
                btnLoading.style.display = 'block';
            }
            function endProses(){
                btnLoading.style.display = 'none';
            }

            function Loading(){
                startProses();
                setTimeout(endProses,3000);
                // btnLoading.style.display= "none";
              }
            </script>
    </body>