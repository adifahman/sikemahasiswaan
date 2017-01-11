<?php if($count != 0): ?>
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs ">
                    <li class=" header"><i class="fa fa-th"></i> Periode Beasiswa</li>

                    <?php for($i = $count; $i > 0; $i--): ?>
                    <li <?php echo ($i == $count ? 'class="active"' : ''); ?> ><a href="" onclick="getFormDetail(<?php echo $i; ?>)" data-toggle="tab"><?php echo $i;?></a></li>
                    <?php endfor; ?>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="p1">
                        <form class="form-horizontal" action="<?php echo base_url('admin/detailbeasiswa/inputPeriod');?>" method="post">
                            <div class="row">
                                <div id="formDet">
                                
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-info pull-right">Tambah Periode</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            $(".select2").select2();
        });

        function getFormDetail(per){
            var idB = $("#idB").val();
            
            $("#formDet").html("<i class='fa fa-refresh fa-spin'></i>");
            $.ajax({
                type: "POST",
                data: {
                    idB: idB,
                    per: per
                },
                url: "<?php echo base_url('admin/detailbeasiswa/form');?>/",
                success: function(data){
                    $('#formDet').html(data);
                }
            });   
        }
        
        getFormDetail(<?php echo $count; ?>);
    </script>
<?php endif; ?>