<div class="col-md-6">
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
                <label for="per" class="col-sm-3 control-label">Besaran Pemberian</label>
                <div class="col-sm-9">
                <div class="input-group">
                    <input type="text" id="bes" data-in="" class="form-control" placeholder="Banyakny uang (Rupiah)" value="<?php echo(isset($data->besaran)) ? $data->besaran : ''; ?>">
                    <span class="input-group-addon" style="border-left:0px; border-right:0px;"><i class="fa fa-times"></i></span>
                    <input type="text" id="bny" data-in="" class="form-control" placeholder="Dibayar berapa kali?" value="<?php echo(isset($data->banyaknya)) ? $data->banyaknya : ''; ?>">
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
                    <input class="form-control" id="" name="" placeholder="Jurusan" type="text" value="<?php echo(isset($data->jurusan)) ? $data->jurusan : ''; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="per" class="col-sm-3 control-label">IPK Minimal</label>
                <div class="col-sm-3">
                    <input class="form-control" id="" name="" placeholder="IPK" type="text" value="<?php echo(isset($data->ipk)) ? $data->ipk : ''; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="per" class="col-sm-3 control-label">Tahun Angkatan</label>
                <div class="col-sm-4">
                    <input class="form-control" id="" name="" placeholder="Min" type="text" value="<?php echo(isset($data->angkatan_min)) ? $data->angkatan_min : ''; ?>">
                </div>
                <div class="col-sm-4">
                    <input class="form-control" id="" name="" placeholder="Maks" type="text" value="<?php echo(isset($data->angkatan_max)) ? $data->angkatan_max : ''; ?>" >
                </div>
            </div>
            <div class="form-group">
                <label for="per" class="col-sm-3 control-label">Aturan Tambahan / Keterangan Lainnya</label>
                <div class="col-sm-9">
                    <textarea class="form-control" rows="3" placeholder="Aturan Tambahan / Keterangan Lainnya"><?php echo(isset($data->lainnya)) ? $data->lainnya : ''; ?></textarea>
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

    x.onblur = calculate;
    calculate();
    $('[name="iPer"]').val("<?php echo(isset($data->periode)) ? $data->periode : ''; ?>").change();
</script>