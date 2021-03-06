<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="viewModalLabel">Beasiswa</h4>
</div>

<div class="box-body">
    <?php foreach ($modal as $dm): ?>
        <dl class="dl-horizontal">
            <dt>Pemberi Beasiswa</dt>
            <dd><?php echo $dm->nama_pemberi; ?></dd>
            <dt>Nama Beasiswa</dt>
            <dd><?php echo $dm->nama_beasiswa; ?></dd>
            <dt>Periode Beasiswa</dt>
            <dd><?php echo $dm->periode_bsw; ?></dd>
            <dt>Tahun</dt>
            <dd><?php echo $dm->tahun; ?></dd>
            <dt>Tanggal Mulai</dt>
            <dd><?php echo date("d F Y", strtotime($dm->tgl_mulai)); ?></dd>
            <dt>Tanggal Berakhir</dt>
            <dd><?php echo date("d F Y", strtotime($dm->tgl_akhir)); ?></dd>
        </dl>
        <dl class="dl-horizontal">
            <dt>Periode Pemberian</dt>
            <dd>
                <?php 
                    $periode = $dm->periode; 
                    switch ($periode) {
                        case "sekali":
                            echo "1 kali";
                            break;
                        case "bulan":
                            echo "Bulanan";
                            break;
                        case "semester":
                            echo "Semester";
                            break;
                        case "tahun":
                            echo "Tahunan";
                            break;
                        case "lainnya":
                            echo "Lainnya";
                            break;
                    }
                ?>
            </dd>
            <dt>Besaran Pemberian</dt>
            <dd><?php echo 'Rp. '.$dm->besaran.' x '.$dm->banyaknya.' = Rp. '.($dm->besaran*$dm->banyaknya); ?></dd>
        </dl>
        <dl class="dl-horizontal">
            <dt>Jurusan</dt>
            <dd>
                <ul class="list-unstyled">
                    <?php 
                        $jurusan = explode(',', $dm->jurusan); sort($jurusan);
                        foreach ($jurusan as $item) {
                            echo '<li>';
                            switch ($item) {
                                case "01":
                                    echo "Akuntansi S1";
                                    break;
                                case "02":
                                    echo "Manajemen S1";
                                    break;
                                case "03":
                                    echo "Akuntansi D3";
                                    break;
                                case "04":
                                    echo "Manajemen D3";
                                    break;
                                case "05":
                                    echo "Teknik Industri S1";
                                    break;
                                case "06":
                                    echo "Teknik Informatika S1";
                                    break;
                                case "07":
                                    echo "Bahasa Inggris S1";
                                    break;
                                case "08":
                                    echo "Bahasa Jepang D3";
                                    break;
                                case "09":
                                    echo "Desain Grafis D4";
                                    break;
                                case "10":
                                    echo "Komputer Multimedia D3";
                                    break;
                                case "11":
                                    echo "Sistem Informasi S1";
                                    break;
                            }
                            echo '</li>';
                        }
                    ?>
                </ul>
            </dd>
            <dt>IPK Minimal</dt>
            <dd><?php echo $dm->ipk; ?></dd>
            <dt>Angkatan</dt>
            <dd><?php echo $dm->angkatan_min.' - '.$dm->angkatan_max; ?></dd>
            <dt>Aturan / Keterangan</dt>
            <dd><?php echo $dm->lainnya; ?></dd>
        </dl>
    <?php endforeach; ?>
</div>