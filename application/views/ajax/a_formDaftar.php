<div class="col-xs-12">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Formulir Beasiswa</h3>
        </div>
        <div class="box-body">
            <div class="col-xs-6">
                <div class="form-group">
                    <label class="control-label">NPM</label>
                    <input name="npm" class="form-control" id="npm" autocomplete="off" required value="<?php echo $this->session->userdata('npm'); ?>">
                </div>

                <div class="form-group">
                    <label class="control-label">Nama</label>
                    <input name="nm" class="form-control" id="nm" autocomplete="off" required value="<?php echo $this->session->userdata('name'); ?>">
                </div>

                <div class="form-group">
                    <label class="control-label">Jurusan</label>
                    <select id="jur" name="jur" class="form-control select2" data-placeholder="Jurusan" style="width: 100%;">
                        <option disabled>-- Fakultas Ekonomi --</option>
                        <option value="01">Akuntansi S1</option>
                        <option value="03">Akuntansi D3</option>
                        
                        <option disabled>-- Fakultas Bisnis dan Manajemen --</option>
                        <option value="02">Manajemen S1</option>
                        <option value="04">Manajemen D3</option>
                        
                        <option disabled>-- Fakultas Teknik --</option>
                        <option value="05">Teknik Industri S1</option>
                        <option value="06">Teknik Informatika S1</option>
                        <option value="11">Sistem Informasi S1</option>
                        
                        <option disabled>-- Fakultas Bahasa --</option>
                        <option value="07">Bahasa Inggris S1</option>
                        <option value="08">Bahasa Jepang D3</option>
                        
                        <option disabled>-- Fakultas Desain Komunikasi Visual --</option>
                        <option value="09">Desain Grafis D4</option>
                        <option value="10">Komputer Multimedia D3</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label">IPK</label>
                    <input name="ipk"class="form-control" id="ipk" autocomplete="off" required>
                </div>

                <div class="form-group">
                    <label class="control-label">Alamat</label>
                    <input name="alm" class="form-control" id="alm" autocomplete="off" required>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="form-group">
                    <label class="control-label">Upload Berkas</label>
                    <input type="file" id="uFile" name="uFile">
                    <p class="help-block">Foto, Transkrip nilai, FRS, lainnya di masukan kedalam rar / zip</p>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Submit</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(".select2").select2();
    $('[name="jur"]').val(<?php echo '\''. substr($this->session->userdata('npm'), 0, 2).'\''; ?>).change();
</script>