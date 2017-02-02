<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="<?php echo base_url('mahasiswa/daftarbeasiswa/input');?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-xs-6">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Beasiswa</h3>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Pilih Beasiswa</label>
                                        <?php echo form_dropdown('idB', $list, '', 'id="idB" class="form-control select2" style="width: 100%;"'); ?>
                                    </div>
                                </div>
                            </div>
                            <div id="detBeasiswa">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div id="viewDesc"></div>
                </div>
            </div>
            <div class="row">
                <div id="formDaftar"></div>
            </div>
        </form>
    </section>
</div>

<script type="text/javascript">
    function descBeasiswa(){
        var idB = $("#idB").val();
        var beasiswa = idB.split(",");
        if (idB != "1"){
            $("#viewDesc").html("<div class='col-md-6'><i class='fa fa-refresh fa-spin'></i></div>");
            $("#formDaftar").html("<div class='col-md-6'><i class='fa fa-refresh fa-spin'></i></div>");

            $.ajax({
                type: "POST",
                data: {
                    idB: beasiswa[0],
                    per: beasiswa[1]
                },
                url: "<?php echo base_url('mahasiswa/daftarbeasiswa/viewDesc');?>/",
                success: function(data){
                    $('#viewDesc').html(data);
                }
            });

            $.ajax({
                url: "<?php echo base_url('mahasiswa/daftarbeasiswa/formDaftar');?>/",
                success: function(data){
                    $('#formDaftar').html(data);
                }
            });
        }else{
            $("#viewDesc").html("");
            $("#formDaftar").html("");
        }
    }
    
    $("#idB").on("change", function(){
        descBeasiswa();
    });
</script>
