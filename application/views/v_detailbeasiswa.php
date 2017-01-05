    
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
            function getForm(){
                var idB = $("#idB").val();
                if (idB != "1"){
                    $("#result").html("<i class='fa fa-refresh fa-spin'></i>");
                    $.ajax({
                        type: "GET",
                        url: "<?php echo base_url('admin/detailbeasiswa/formDetBeasiswa');?>/" + idB,
                        success: function(data){
                            $('#result').html(data);
                        }
                    });
                }else{
                    $("#result").html("");
                }
            }
            $("#idB").on("change", function(){
                getForm();
            });
	});
    </script>