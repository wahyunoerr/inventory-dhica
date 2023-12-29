 <!-- jQuery -->
 <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
 <!-- jQuery UI 1.11.4 -->
 <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
 <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
 <script>
     $.widget.bridge('uibutton', $.ui.button)
 </script>
 <!-- Bootstrap 4 -->
 <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
 <!-- ChartJS -->
 <script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script>
 <!-- uPlot -->
 <script src="{{ asset('assets/plugins/uplot/uPlot.iife.min.js') }}"></script>
 <!-- daterangepicker -->
 <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
 <script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
 <!-- AdminLTE App -->
 <script src="{{ asset('assets/dist/js/adminlte.js') }}"></script>

 <!-- DataTables  & Plugins -->
 <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
 <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
 <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
 <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
 <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
 <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
 <script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
 <script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
 <script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
 <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
 <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
 <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
 <script src="{{ asset('realrashid/sweet-alert/resources/js/sweetalert.all.js') }}"></script>
 @stack('js-internal')
 <script>
     $(function() {
         $("#example1").DataTable({
             "responsive": true,
             "lengthChange": false,
             "autoWidth": false,
             "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
         }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
     });
 </script>
