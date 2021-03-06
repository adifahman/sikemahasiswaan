<div class="content-wrapper">
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

    <section class="content">
        <div class="row">
            <div class="col-xs-2"></div>
            <div class="col-xs-8">
                <div class="box">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Pilih Beasiswa</label>
                                    <?php echo form_dropdown('idB', $list, '', 'id="idB" class="form-control select2" style="width: 100%;"'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="viewPendaftar">
                    
                </div>
            </div>
            <div class="col-xs-2"></div>
        </div>
    </section>
</div>
<script type="text/javascript">
    function viewPendaftar(idB,per){
        var idB = $("#idB").val();
        var beasiswa = idB.split(",");
        $("#viewPendaftar").html("<div class='col-md-6'><i class='fa fa-refresh fa-spin'></i></div>");
        $.ajax({
            type: "POST",
            data: {
                idB: beasiswa[0],
                per: beasiswa[1]
            },
            url: "<?php echo base_url('admin/pendaftar/viewPendaftar');?>/",
            success: function(data){
                $('#viewPendaftar').html(data);
            }
        });   
    }
    
    $("#idB").on("change", function(){
        viewPendaftar();
    });
</script>