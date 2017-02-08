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

    <section class="content">
        <?php if($chPass == 1){ ?>
            <div class='alert alert-warning alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                Anda masih menggunakan password default <button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#chModal" data-whatever="@mdo" title="Ubah Password">Ganti Password</button>
            </div>
        <?php } ?>
        <div class="row">
            <div class="col-xs-6">
                <?php
                    if (is_array($dataAll) || is_object($dataAll)){
                        foreach ($dataAll as $dtAll):
                ?>
                    <div class="box box-success box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title"><b><?php echo $dtAll->nama_beasiswa.' - Periode '.$dtAll->periode; ?></b></h3>
                        </div>
                        <div class="box-body">
                            <p><b><?php echo $dtAll->nama_pemberi; ?></b></p>
                            <p><b><?php echo $dtAll->nama_beasiswa.' - Periode '.$dtAll->periode; ?></b></p>
                            <p><b><?php echo 'Tahun '.$dtAll->tahun; ?></b></p>
                        </div>
                        <div class="box-footer">
                            <p><b><?php echo 'Periode Pendaftaran : '.$dtAll->tgl_mulai.' s.d. '.$dtAll->tgl_akhir; ?></b></p>
                            <p><b>Status Pendaftaran : <font class="text-green">Dibuka</font></b></p>
                        </div>
                    </div>
                <?php
                        endforeach;
                    }
                ?>                
            </div>
            
            <div class="col-xs-6">
                <?php
                    if (is_array($dataFinished) || is_object($dataFinished)){
                        foreach ($dataFinished as $dtFinished):
                ?>
                    <div class="box box-success box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title"><b><?php echo $dtFinished->nama_beasiswa.' - Periode '.$dtFinished->periode; ?></b></h3>
                        </div>
                        <div class="box-body">
                            <p><b><?php echo $dtFinished->nama_pemberi; ?></b></p>
                            <p><b><?php echo $dtFinished->nama_beasiswa.' - Periode '.$dtFinished->periode; ?></b></p>
                            <p><b><?php echo 'Tahun '.$dtFinished->tahun; ?></b></p>
                        </div>
                        <div class="box-footer">
                            <p><b><?php echo 'Periode Pendaftaran : '.$dtFinished->tgl_mulai.' s.d. '.$dtFinished->tgl_akhir; ?></b></p>
                            <p><b>Status Pendaftaran : <font class="text-red">Ditutup</font></b></p>
                        </div>
                    </div>
                <?php
                        endforeach;
                    }
                ?>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="chModal" tabindex="-1" role="dialog" aria-labelledby="chModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="chModalLabel">Ganti Password</h4>
            </div>

            <div class="modal-body">
                <div class='alert alert-warning alert-dismissible'>
                    Anda masih menggunakan password default. Segera ganti password anda !
                </div>
                <form action="<?php echo base_url('mahasiswa/update');?>" method="post">
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Password</label>
                        <input class="form-control" id="password" name="password" type="password" placeholder="Password" required>
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Konfirmasi Password</label>
                        <input class="form-control" id="password_two" name="password_two" type="password" placeholder="Verify Password" oninput="check(this)" required>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <input type="submit" class="btn btn-primary" value="Ganti Password">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script language='javascript' type='text/javascript'>
    function check(input) {
        if (input.value != document.getElementById('password').value) {
            input.setCustomValidity('Password harus sama.');
        } else {
            // input is valid -- reset the error message
            input.setCustomValidity('');
        }
    }
</script>