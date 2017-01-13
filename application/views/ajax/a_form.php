<div class="col-md-6">
    <input class="form-control" id="iIDbsw" name="iIDbsw" type="hidden">
    <input class="form-control" id="iPb" name="iPb" type="hidden">
    <input class="form-control" id="iIDB" name="iIDB" type="hidden" value="<?php echo(isset($data->id_besaran)) ? $data->id_besaran : ''; ?>">
    <input class="form-control" id="iIDA" name="iIDA" type="hidden" value="<?php echo(isset($data->id_aturan)) ? $data->id_aturan : ''; ?>">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Besaran Beasiswa</h3>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label for="per" class="col-sm-3 control-label">Periode Pemberian</label>
                <div class="col-sm-6">
                    <select name="iPer" class="form-control select2" style="width: 100%;">
                        <option disabled selected value="">-- Pilih --</option>
                        <option value="sekali">1 kali</option>
                        <option value="bulan">Bulanan</option>
                        <option value="semester">Semester</option>
                        <option value="tahun">Tahunan</option>
                        <option value="lainnya">Lainnya</option>
                    </select>
                    <!--<input class="form-control" id="per" name="per" placeholder="Periode" type="text" value="" readonly>-->
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Besaran Pemberian</label>
                <div class="col-sm-9">
                <div class="input-group">
                    <input type="text" id="bes" name="iBes" data-in="" class="form-control" placeholder="Banyakny uang (Rupiah)" value="<?php echo(isset($data->besaran)) ? $data->besaran : ''; ?>" autocomplete="off" required>
                    <span class="input-group-addon" style="border-left:0px; border-right:0px;"><i class="fa fa-times"></i></span>
                    <input type="text" id="bny" name="iBny" data-in="" class="form-control" placeholder="Dibayar berapa kali?" value="<?php echo(isset($data->banyaknya)) ? $data->banyaknya : ''; ?>" autocomplete="off" required>
                </div>
                </div>
            </div>
            <div class="form-group">
                <label for="per" class="col-sm-3 control-label">Total Besaran</label>
                <div class="col-sm-6">
                    <input class="form-control" id="total" placeholder="Total" type="text" value="" readonly>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Peraturan Beasiswa</h3>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label for="per" class="col-sm-3 control-label">Jurusan</label>
                <div class="col-sm-9">
                    <select id="iJur" name="iJur[]" class="form-control select2" multiple="multiple" data-placeholder="Jurusan" style="width: 100%;">
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
                    <?php 
                        //echo(isset($data->jurusan)) ? $data->jurusan : '';
                        if(isset($data->jurusan)){
                            $jurusan = explode(',', $data->jurusan);
                            $jurusan = '"' . join('", "', $jurusan) . '"';
                        }else{
                            $jurusan = '';
                        }
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="per" class="col-sm-3 control-label"></label>
                <div class="col-sm-9">
                    <input type="checkbox" id="ckSemua">
                    Semua Jurusan
                </div>
            </div>
            <div class="form-group">
                <label for="per" class="col-sm-3 control-label">IPK Minimal</label>
                <div class="col-sm-3">
                    <input class="form-control" id="iIPK" name="iIPK" placeholder="IPK" type="text" value="<?php echo(isset($data->ipk)) ? $data->ipk : ''; ?>" pattern="[0-4]+.[0-9]{2}" title="0.00 - 4.00" autocomplete="off" required>
                </div>
            </div>
            <div class="form-group">
                <label for="per" class="col-sm-3 control-label">Tahun Angkatan</label>
                <div class="col-sm-4">
                    <input class="form-control" id="iMin" name="iMin" placeholder="Min" type="text" value="<?php echo(isset($data->angkatan_min)) ? $data->angkatan_min : ''; ?>" autocomplete="off" required>
                </div>
                <div class="col-sm-4">
                    <input class="form-control" id="iMax" name="iMax" placeholder="Maks" type="text" value="<?php echo(isset($data->angkatan_max)) ? $data->angkatan_max : ''; ?>" autocomplete="off" required>
                </div>
            </div>
            <div class="form-group">
                <label for="per" class="col-sm-3 control-label">Aturan Tambahan / Keterangan Lainnya</label>
                <div class="col-sm-9">
                    <textarea class="form-control" id="iAdd" name="iAdd" rows="3" placeholder="Aturan Tambahan / Keterangan Lainnya"><?php echo(isset($data->lainnya)) ? $data->lainnya : ''; ?></textarea>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var x = document.getElementById("bes");
    var y = document.getElementById("bny");
    var d = document.getElementById("total");

    var xstored = x.getAttribute("data-in");
    var ystored = y.getAttribute("data-in");

    setInterval(function(){
        if( x == document.activeElement ){
            var temp = x.value;
            if( xstored != temp ){
                xstored = temp;
                x.setAttribute("data-in",temp);
                calculate();
            }
        }
        if( y == document.activeElement ){
            var temp = y.value;
            if( ystored != temp ){
                ystored = temp;
                y.setAttribute("data-in",temp);
                calculate();
            }
        }
    },50);

    function toRp(angka){
        var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
        var rev2    = '';
        for(var i = 0; i < rev.length; i++){
            rev2  += rev[i];
            if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
                rev2 += '.';
            }
        }
        return 'Rp. ' + rev2.split('').reverse().join('');
    }

    function calculate(){
        var temp = x.value * y.value;
        d.value = toRp(temp);
    }
    
    $("#ckSemua").click(function(){
        if($("#ckSemua").is(':checked') ){
            $("#iJur > option").not(':disabled').prop("selected","selected");
            $("#iJur").trigger("change");
        }else{
            $("#iJur > option").removeAttr("selected");
             $("#iJur").trigger("change");
         }
    });

    x.onblur = calculate;
    calculate();
    $(".select2").select2();
    $('[name="iPer"]').val("<?php echo(isset($data->periode)) ? $data->periode : ''; ?>").change();
    $('[name="iJur[]"]').val(<?php echo '['.$jurusan.']'; ?>).change();
</script>