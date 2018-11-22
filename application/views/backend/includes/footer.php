            <?php if(empty($hide_footer)){?>
                <footer class="main-footer">
                    <div class="pull-right hidden-xs">
                        <b>Version</b> 2.4.0
                    </div>
                    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
                    reserved.
                </footer>
            <?php } ?>    
        </div>
        <!-- ./wrapper -->

        <!-- jQuery 3 -->
        <script src="<?php echo base_url();?>assets/backend/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="<?php echo base_url();?>assets/backend/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="<?php echo base_url();?>assets/backend/bower_components/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url();?>assets/backend/dist/js/adminlte.min.js"></script>
        <!-- Sparkline -->
        <script src="<?php echo base_url();?>assets/backend/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
        <!-- jvectormap  -->
        <script src="<?php echo base_url();?>assets/backend/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="<?php echo base_url();?>assets/backend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <!-- SlimScroll -->
        <script src="<?php echo base_url();?>assets/backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <!-- ChartJS -->
        <script src="<?php echo base_url();?>assets/backend/bower_components/chart.js/Chart.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--        <script src="<?php echo base_url();?>assets/backend/dist/js/pages/dashboard2.js"></script>-->
        <!-- AdminLTE for demo purposes -->
        
        <script src="<?php echo base_url();?>assets/backend/dist/js/demo.js"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url();?>assets/backend/plugins/iCheck/icheck.min.js"></script>
        
        <script src="<?= base_url() ?>assets/backend/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    
        <script src="<?= base_url() ?>assets/backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        
        <script src="<?= base_url() ?>assets/backend/bower_components/select2/dist/js/select2.full.min.js"></script>
        
        
        <script>
            $(function () {
                $("input").iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' /* optional */
                });
                $(".alert").delay(5000).slideUp(200, function() {
                    $(this).alert('close');
                });
                $('.datatable-list').dataTable({
                    "aaSorting": [[0, "desc"]],
                });
                 $('.select2').select2();
            });
        </script>
    </body>
</html>
