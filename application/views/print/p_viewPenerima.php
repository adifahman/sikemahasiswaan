<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title; ?></title>
    <link rel="shortcut icon" type="ico" href="<?php echo base_url('assets'); ?>/img/favicon.ico">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/plugins/select2/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/dist/css/skins/_all-skins.min.css">
    
    <script src="<?php echo base_url('assets'); ?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
</head>
<body>
<div class="box">
    <form action="<?php echo base_url('admin/penerima/pdf');?>" method="post" target="_blank">
        <div class="box-header with-border">
            <h3 class="box-title">Daftar Mahasiswa Penerima Beasiswa</h3>
            <h3 class="box-title"><?php echo $dataTable[0]->nama_beasiswa.' Periode '.$dataTable[0]->periode; ?></h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <table id="viewTableCheck" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>NPM</th>
                                <th>Nama Mahasiswa</th>
                                <th>Jurusan</th>
                        </thead>
                        <tbody>
                            <?php
                            if (is_array($dataTable) || is_object($dataTable)){
                                foreach ($dataTable as $dt):
                                    switch ($dt->jurusan) {
                                        case "01":
                                            $jur = "Akuntansi S1";
                                            break;
                                        case "02":
                                            $jur = "Manajemen S1";
                                            break;
                                        case "03":
                                            $jur = "Akuntansi D3";
                                            break;
                                        case "04":
                                            $jur = "Manajemen D3";
                                            break;
                                        case "05":
                                            $jur = "Teknik Industri S1";
                                            break;
                                        case "06":
                                            $jur = "Teknik Informatika S1";
                                            break;
                                        case "07":
                                            $jur = "Bahasa Inggris S1";
                                            break;
                                        case "08":
                                            $jur = "Bahasa Jepang D3";
                                            break;
                                        case "09":
                                            $jur = "Desain Grafis D4";
                                            break;
                                        case "10":
                                            $jur = "Komputer Multimedia D3";
                                            break;
                                        case "11":
                                            $jur = "Sistem Informasi S1";
                                            break;
                                    }
                            ?>
                                <tr>
                                    <td><?php echo $dt->npm;?></td>
                                    <td><?php echo $dt->nama; ?> </td>
                                    <td><?php echo $jur; ?> </td>
                                </tr>
                            <?php
                                endforeach;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <script src="<?php echo base_url('assets'); ?>/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="<?php echo base_url('assets'); ?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/plugins/select2/select2.full.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/dist/js/app.min.js"></script>
    <script>
        $(function () {
            $("#viewTable").DataTable({
                "aaSorting": []
            });
            $("#viewTableCheck").DataTable({
                "lengthChange": false,
                "paging": false,
                "bScrollInfinite": true,
                "bScrollCollapse": true,
                "sScrollY": "200px",
                "aaSorting": [],
                "columnDefs": [{
                    "targets": 0,
                    "width": "0px",
                    "orderable": false
                }]
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