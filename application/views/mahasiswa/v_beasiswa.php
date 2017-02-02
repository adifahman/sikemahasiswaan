<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Beasiswa
            <small>Daftar Beasiswa</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-xs-12">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Collapsible Accordion</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="box-group" id="accordion">
                        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                            <div class="panel box box-primary">
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                            Beasiswa yang tersedia
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="box-body">
                                        <table id="tableAvailable" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Pemberi Beasiswa</th>
                                                    <th>Nama Beasiswa</th>
                                                    <th>Periode</th>
                                                    <th>Jenis Beasiswa</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (is_array($dataAvailable) || is_object($dataAvailable)){
                                                    foreach ($dataAvailable as $dtAvailable):
                                                ?>
                                                    <tr>
                                                        <td> <?php echo $dtAvailable->nama_pemberi;?></td>
                                                        <td> <?php echo $dtAvailable->nama_beasiswa; ?> </td>
                                                        <td> <?php echo $dtAvailable->periode; ?> </td>
                                                        <td> <?php echo $dtAvailable->jenis_beasiswa; ?> </td>
                                                        <td>
                                                            <button type="button" class="btn btn-small btn-default" title="Detail Beasiswa" onclick="detailB(<?php echo '\''.$dtAvailable->id_beasiswa.'\',\''.$dtAvailable->periode.'\'';?>)">Detail Beasiswa</button>
                                                            <button type="button" class="btn btn-small btn-primary" title="Daftar Beasiswa" onclick="detailB(<?php echo '\''.$dtAvailable->id_beasiswa.'\',\''.$dtAvailable->periode.'\'';?>)" <?php echo ($dtAvailable->npm != NULL ? 'disabled title="Anda telah mendaftar beasiswa ini."' : ''); ?>>Daftar Beasiswa</button>
                                                        </td>
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
                            <div class="panel box box-danger">
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                            Beasiswa yang sedang berjalan
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse">
                                    <div class="box-body">
                                        <table id="tableAll" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Pemberi Beasiswa</th>
                                                    <th>Nama Beasiswa</th>
                                                    <th>Periode</th>
                                                    <th>Jenis Beasiswa</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (is_array($dataAll) || is_object($dataAll)){
                                                    foreach ($dataAll as $dtAll):
                                                ?>
                                                    <tr>
                                                        <td> <?php echo $dtAll->nama_pemberi;?></td>
                                                        <td> <?php echo $dtAll->nama_beasiswa; ?> </td>
                                                        <td> <?php echo $dtAll->periode; ?> </td>
                                                        <td> <?php echo $dtAll->jenis_beasiswa; ?> </td>
                                                        <td> 
                                                            <button type="button" class="btn btn-small btn-default" title="Detail Beasiswa" onclick="detailB(<?php echo '\''.$dtAll->id_beasiswa.'\',\''.$dtAll->periode.'\'';?>)">Detail Beasiswa</button>
                                                        </td>
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
                            <div class="panel box box-success">
                                <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                        Beasiswa yang telah berakhir
                                    </a>
                                </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse">
                                    <div class="box-body">
                                        <table id="tableFinished" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Pemberi Beasiswa</th>
                                                    <th>Nama Beasiswa</th>
                                                    <th>Periode</th>
                                                    <th>Jenis Beasiswa</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (is_array($dataFinished) || is_object($dataFinished)){
                                                    foreach ($dataFinished as $dtFinished):
                                                ?>
                                                    <tr>
                                                        <td> <?php echo $dtFinished->nama_pemberi;?></td>
                                                        <td> <?php echo $dtFinished->nama_beasiswa; ?> </td>
                                                        <td> <?php echo $dtFinished->periode; ?> </td>
                                                        <td> <?php echo $dtFinished->jenis_beasiswa; ?> </td>
                                                        <td> 
                                                            <button type="button" class="btn btn-small btn-default" title="Detail Beasiswa" onclick="detailB(<?php echo '\''.$dtFinished->id_beasiswa.'\',\''.$dtFinished->periode.'\'';?>)">Detail Beasiswa</button>
                                                            <button type="button" class="btn btn-small btn-default" title="Penerima Beasiswa" onclick="detailB(<?php echo '\''.$dtFinished->id_beasiswa.'\',\''.$dtFinished->periode.'\'';?>)">Penerima Beasiswa</button>
                                                        </td>
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
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </section>
            <!-- right col -->
        </div>
        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="viewModal" role="dialog" aria-labelledby="insertModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div id="modalData"></div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function detailB(idB,per){
        $("#formDet").html("<div class='col-md-6'><i class='fa fa-refresh fa-spin'></i></div>");
        $.ajax({
            type: "POST",
            data: {
                idB: idB,
                per: per
            },
            url: "<?php echo base_url('mahasiswa/beasiswa/view');?>/",
            success: function(data){
                $('#modalData').html(data);
                $('#viewModal').modal('show');
            }
        });   
    }
</script>