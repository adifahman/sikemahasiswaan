    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Detail Beasiswa
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
                            <h3 class="box-title">Detail Beasiswa</h3>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Pilih Beasiswa</label>
                                        <?php echo form_dropdown('idB', $list, '', 'id="idB" class="form-control select2" style="width: 100%;"'); ?>
                                    </div>
                                  <!-- /.form-group -->
                                </div>
                            <!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div id="result">
                                        <form class="form-horizontal">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <label for="per" class="col-sm-3 control-label">Periode</label>
                                                    <div class="col-sm-3">
                                                        <input class="form-control" id="per" placeholder="Periode" type="text">
                                                    </div>
                                                    <label for="thn" class="col-sm-2 control-label">Tahun</label>
                                                    <div class="col-sm-4">
                                                        <input class="form-control" id="thn" placeholder="Tahun" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="per" class="col-sm-3 control-label">Tgl. Pendaftaran</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control pull-right" id="date">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-offset-2 col-sm-10">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox"> Simpan sebagai draft
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.box-body -->
                                            <div class="box-footer">
                                              <button type="submit" class="btn btn-info pull-right">Sign in</button>
                                            </div>
                                            <!-- /.box-footer -->
                                        </form>
                                    </div>
                                  <!-- /.form-group -->
                                </div>
                            <!-- /.col -->
                            </div>
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

    <script type="text/javascript"> 
        $(document).ready(function(){
            function search(){
                var strcari = $("#idB").val();
                if (strcari != ""){
                    $("#result").html("<i class='fa fa-refresh fa-spin'></i>");
                    $.ajax({
                        type: "GET",
                        url: "cari_npm.php",
                        data:"q="+strcari,
                        success: function(data){
                            $('#result').html(data);
                            var strstat = $("#txtstat").val(); 
                            if(strstat == "Belum mencoblos"){
                                    $(".btn-aktif").show();
                            }else{
                                    $(".btn-aktif").hide();
                            }
                        }
                    });
                } 
            }
            $("#idB").on("change", function(){
                search();
            });
	});
    </script>