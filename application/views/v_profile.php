    
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
                        <div class="box-header">
                            <h3 class="box-title">Profil Pemberi Beasiswa</h3>
                        </div>
                        <div class="box-body">
                            <label for="iID"><button type="button" class="btn btn-primary margin" data-toggle="modal" data-target="#insertModal" data-whatever="@mdo" onclick="getID()">Tambah Data</button></label>
                            <a href="<?php echo base_url('admin/profile/pdf');?>" target="_blank">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-download"></i> Generate PDF
                                </button>
                            </a>
                            <table id="viewTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID Profil</th>
                                        <th>Nama Pemberi</th>
                                        <th>Alamat</th>
                                        <th>No. Telp.</th>
                                        <th>Email</th>
                                        <th>Website</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (is_array($dataTable) || is_object($dataTable)){
                                        foreach ($dataTable as $dt):
                                    ?>
                                        <tr>
                                            <td> <?php echo $dt->id_profil;?></td>
                                            <td> <?php echo $dt->nama_pemberi; ?> </td>
                                            <td> <?php echo $dt->alamat; ?> </td>
                                            <td> <?php echo $dt->no_telp; ?> </td>
                                            <td> <?php echo $dt->email; ?> </td>
                                            <td> <?php echo $dt->website; ?> </td>
                                            <td> 
                                                <a class="btn btn-sm btn-primary fa fa-pencil" title="Edit" onclick="edit('<?php echo $dt->id_profil;?>')"> </a>
                                                <a class="btn btn-sm btn-warning fa fa-trash-o" title="Delete" href="<?php echo base_url('admin/profile/delete');?>/<?php echo $dt->id_profil; ?>" onClick="return confirm('Apakah Anda yakin akan menghapus data ini?')"></a>
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

    <div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="insertModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="insertModalLabel">Tambah Data</h4>
                </div>

                <div class="modal-body">
                    <form action="<?php echo base_url('admin/profile/input');?>" method="post">
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">ID Profil</label>
                            <input name="id" class="form-control" id="iID" required readonly>
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Nama Perusahaan</label>
                            <input name="nama" class="form-control" id="recipient-name" required autocomplete="off" autofocus>
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Alamat</label>
                            <input name="alamat" class="form-control" id="recipient-name" required autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="control-label">No. Telp.</label>
                            <input name="telp"class="form-control" id="recipient-name" required autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Email</label>
                            <input name="email" class="form-control" id="recipient-name" required autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Website</label>
                            <input name="website" class="form-control" id="recipient-name" required autocomplete="off">
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

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="editModalLabel">Edit Data</h4>
                </div>

                <div class="modal-body">
                    <form action="<?php echo base_url('admin/profile/update');?>" method="post">                                
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">ID Profil</label>
                            <input name="eID" class="form-control" id="recipient-name" required readonly>
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Nama Perusahaan</label>
                            <input name="eNama" class="form-control" id="recipient-name" required autocomplete="off" autofocus>
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Alamat</label>
                            <input name="eAlamat" class="form-control" id="recipient-name" required autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="control-label">No. Telp.</label>
                            <input name="eTelp"class="form-control" id="recipient-name" required autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Email</label>
                            <input name="eEmail" class="form-control" id="recipient-name" required autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Website</label>
                            <input name="eWebsite" class="form-control" id="recipient-name" required autocomplete="off">
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
                url : "<?php echo site_url('admin/profile/edit')?>/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data){
                    $('[name="eID"]').val(data.id_profil);
                    $('[name="eNama"]').val(data.nama_pemberi);
                    $('[name="eAlamat"]').val(data.alamat);
                    $('[name="eTelp"]').val(data.no_telp);
                    $('[name="eEmail"]').val(data.email);
                    $('[name="eWebsite"]').val(data.website);
                    $('#editModal').modal('show');
                },
                error: function (jqXHR, textStatus, errorThrown){
                    alert('Error get data from ajax');
                }
            });
        }

        function getID(){
            $.ajax({
                url : "<?php echo site_url('admin/profile/getID')?>/",
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