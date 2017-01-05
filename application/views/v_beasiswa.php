    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Profil Perusahaan
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i> Dashboard</a></li>
                <li class="active">Profil</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-xs-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Profil Pemberi Beasiswa</h3>
                        </div>
                        <div class="box-body">
                            <label for="iID"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insertModal" data-whatever="@mdo" onclick="getID()">Tambah Data</button></label>
                            <br>
                            <table id="viewTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID Beasiswa</th>
                                        <th>Nama Pemberi</th>
                                        <th>Nama Beasiswa</th>
                                        <th>Jenis Beasiswa</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (is_array($dataTable) || is_object($dataTable)){
                                        foreach ($dataTable as $dt):
                                    ?>
                                        <tr>
                                            <td> <?php echo $dt->id_beasiswa;?></td>
                                            <td> <?php echo $dt->nama_pemberi; ?> </td>
                                            <td> <?php echo $dt->nama_beasiswa; ?> </td>
                                            <td> <?php echo $dt->jenis_beasiswa; ?> </td>
                                            <td> 
                                                <a class="btn btn-sm btn-primary fa fa-pencil" title="Edit" onclick="edit('<?php echo $dt->id_beasiswa;?>')"> </a>
                                                <a class="btn btn-sm btn-warning fa fa-trash-o" title="Delete" href="<?php echo base_url('admin/beasiswa/delete');?>/<?php echo $dt->id_beasiswa; ?>" onClick="return confirm('Apakah Anda yakin akan menghapus data ini?')"></a>
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
                </section>
                <!-- right col -->
            </div>
            <!-- /.row (main row) -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <div class="modal fade" id="insertModal" role="dialog" aria-labelledby="insertModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="insertModalLabel">Tambah Data</h4>
                </div>

                <div class="modal-body">
                    <form action="<?php echo base_url('admin/beasiswa/input');?>" method="post">                                
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">ID Beasiswa</label>
                            <input name="id" class="form-control" id="iID" required readonly>
                        </div>
                        
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Pemberi Beasiswa</label>
                            <?php echo form_dropdown('idP', $list, '', 'class="form-control select2" style="width: 100%;"'); ?>
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Nama Beasiswa</label>
                            <input name="nama" class="form-control" id="recipient-name" required autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Jenis Beasiswa</label>
                            <input name="jenis"class="form-control" id="recipient-name" required autocomplete="off">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <input type="submit" class="btn btn-primary" value="Save Data">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" role="dialog" aria-labelledby="editModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="editModalLabel">Edit Data</h4>
                </div>

                <div class="modal-body">
                    <form action="<?php echo base_url('admin/beasiswa/update');?>" method="post">                                
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">ID Beasiswa</label>
                            <input name="eID" class="form-control" id="recipient-name" required readonly>
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="control-label">ID Pemberi</label>
                            <?php echo form_dropdown('eIDP', $list, '', 'class="form-control select2" style="width: 100%;"'); ?>
                            <!--<input name="eIDP" class="form-control" id="recipient-name" required autocomplete="off" autofocus>-->
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Nama Beasiswa</label>
                            <input name="eNama" class="form-control" id="recipient-name" required autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Jenis Beasiswa</label>
                            <input name="eJenis"class="form-control" id="recipient-name" required autocomplete="off">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <input type="submit" class="btn btn-primary" value="Update Data">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script> 
        function edit(id){
            $.ajax({
                url : "<?php echo site_url('admin/beasiswa/edit')?>/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data){
                    $('[name="eID"]').val(data.id_beasiswa);
                    $('[name="eIDP"]').val(data.id_profil).change();
                    $('[name="eNama"]').val(data.nama_beasiswa);
                    $('[name="eJenis"]').val(data.jenis_beasiswa);
                    $('#editModal').modal('show');
                },
                error: function (jqXHR, textStatus, errorThrown){
                    alert('Error get data from ajax');
                }
            });
        }

        function getID(){
            $.ajax({
                url : "<?php echo site_url('admin/beasiswa/getID')?>/",
                type: "GET",
                dataType: "JSON",
                success: function(data){
                    $('[name="id"]').val(data.uid);
                    $('#insertModal').modal('show');
                },
                error: function (jqXHR, textStatus, errorThrown){
                    alert('Error get data from ajax');
                }
            });
        }
    </script>