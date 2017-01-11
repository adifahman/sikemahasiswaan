                                        <div class="panel box">
                                            <div class="box-header with-border">
                                                <h4 class="box-title">
                                                    <a data-toggle="collapse" href="#collapse">
                                                        <i class='fa fa-toggle-down'></i> Tambah Periode Beasiswa
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse" class="panel-collapse collapse">
                                                <div class="box-body">
                                                    <form class="form-horizontal" action="<?php echo base_url('admin/detailbeasiswa/inputPeriod');?>" method="post">
                                                        <input type="hidden" name="idB" value="<?php echo $idB; ?>">
                                                        <div class="box-body">
                                                            <div class="form-group">
                                                                <label for="per" class="col-sm-3 control-label">Periode</label>
                                                                <div class="col-sm-3">
                                                                    <input class="form-control" id="per" name="per" placeholder="Periode" type="text" value="<?php echo $periode; ?>" readonly>
                                                                </div>
                                                                <label for="thn" class="col-sm-2 control-label">Tahun</label>
                                                                <div class="col-sm-4">
                                                                    <input class="form-control" id="thn" name="thn" placeholder="Tahun" type="text" value="<?php echo date("Y"); ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="per" class="col-sm-3 control-label">Tgl. Pendaftaran</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="date" class="form-control pull-right" id="date">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="jml" class="col-sm-3 control-label">Jumlah Penerima</label>
                                                                <div class="col-sm-4">
                                                                    <input class="form-control" id="jml" name="jml" placeholder="Jumlah Penerima" type="text" required autocomplete="off" pattern="[0-9]{1,3}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-offset-2 col-sm-10">
                                                                    <div class="checkbox">
                                                                        <label>
                                                                            <input type="checkbox" name="draft" value="1" checked> Simpan sebagai draft
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /.box-body -->
                                                        <div class="box-footer">
                                                            <button type="submit" class="btn btn-info pull-right">Tambah Periode</button>
                                                        </div>
                                                        <!-- /.box-footer -->
                                                    </form>                                                
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            $(function () {
                                                $('#date').daterangepicker({
                                                    "minDate": new Date(),
                                                    locale: {
                                                        format: 'DD/MM/YYYY'
                                                    }
                                                });
                                            });
                                        </script>