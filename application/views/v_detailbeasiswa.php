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
            <div class="row">
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
                                </div>
                                <div class="col-md-6">
                                    <div id="addPeriod">
                                        
                                    </div>
                                </div>
                            </div>
                            <div id="detBeasiswa">
                                
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </section>
    </div>
    
    <script type="text/javascript"> 
        $(document).ready(function(){
            function getForm(){
                var idB = $("#idB").val();
                if (idB != "1"){
                    $("#result").html("<i class='fa fa-refresh fa-spin'></i>");
                    $.ajax({
                        type: "GET",
                        url: "<?php echo base_url('admin/detailbeasiswa/formAddPeriod');?>/" + idB,
                        success: function(data){
                            $('#addPeriod').html(data);
                        }
                    });
                    $.ajax({
                        type: "GET",
                        url: "<?php echo base_url('admin/detailbeasiswa/formDetBeasiswa');?>/" + idB,
                        success: function(data){
                            $('#detBeasiswa').html(data);
                        }
                    });
                }else{
                    $("#addPeriod").html("");
                    $("#detBeasiswa").html("");
                }
            }
            
            $("#idB").on("change", function(){
                getForm();
            });
            
	});
    </script>