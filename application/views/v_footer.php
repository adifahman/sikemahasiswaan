    
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 0.2
            </div>
            <strong>Copyright &copy; 2017 A.FM</strong> All rights
            reserved.
        </footer>
        <!-- Add the sidebar's background. This div must be placed
        immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <script src="<?php echo base_url('assets'); ?>/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="<?php echo base_url('assets'); ?>/plugins/select2/select2.full.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/dist/js/app.min.js"></script>
    <script>
        $(function () {
            $("#viewTable").DataTable({
                "aaSorting": []
            });
            $(".select2").select2();
            $('#date').daterangepicker({
                "minDate": new Date(),
                locale: {
                    format: 'DD/MM/YYYY'
                }
            });
        });
    </script>
</body>
</html>