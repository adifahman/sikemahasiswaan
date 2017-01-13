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
                                                    <tr>
                                                        <td>Misc</td>
                                                        <td>PSP browser</td>
                                                        <td>PSP</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Other browsers</td>
                                                        <td>All others</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
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
                                                <tr>
                                                    <td>Misc</td>
                                                    <td>PSP browser</td>
                                                    <td>PSP</td>
                                                    <td>PSP</td>
                                                    <td>-</td>
                                                </tr>
                                                <tr>
                                                    <td>Other browsers</td>
                                                    <td>Other browsers</td>
                                                    <td>All others</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                </tr>
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
                                                <tr>
                                                    <td>Misc</td>
                                                    <td>PSP browser</td>
                                                    <td>PSP</td>
                                                    <td>PSP</td>
                                                    <td>-</td>
                                                </tr>
                                                <tr>
                                                    <td>Other browsers</td>
                                                    <td>All others</td>
                                                    <td>All others</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                </tr>
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

