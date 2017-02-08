<div class="box">
    <form action="<?php echo base_url('admin/pendaftar/input');?>" method="post">
        <div class="box-header with-border">
            <h3 class="box-title">Daftar Mahasiswa Penerima Beasiswa</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <table id="viewTableCheck" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>NPM</th>
                                <th>Nama Mahasiswa</th>
                                <th>Jurusan</th>
                        </thead>
                        <tbody>
                            <?php
                            if (is_array($dataTable) || is_object($dataTable)){
                                foreach ($dataTable as $dt):
                                    switch ($dt->jurusan) {
                                        case "01":
                                            $jur = "Akuntansi S1";
                                            break;
                                        case "02":
                                            $jur = "Manajemen S1";
                                            break;
                                        case "03":
                                            $jur = "Akuntansi D3";
                                            break;
                                        case "04":
                                            $jur = "Manajemen D3";
                                            break;
                                        case "05":
                                            $jur = "Teknik Industri S1";
                                            break;
                                        case "06":
                                            $jur = "Teknik Informatika S1";
                                            break;
                                        case "07":
                                            $jur = "Bahasa Inggris S1";
                                            break;
                                        case "08":
                                            $jur = "Bahasa Jepang D3";
                                            break;
                                        case "09":
                                            $jur = "Desain Grafis D4";
                                            break;
                                        case "10":
                                            $jur = "Komputer Multimedia D3";
                                            break;
                                        case "11":
                                            $jur = "Sistem Informasi S1";
                                            break;
                                    }
                            ?>
                                <tr>
                                    <td><?php echo $dt->npm;?></td>
                                    <td><?php echo $dt->nama; ?> </td>
                                    <td><?php echo $jur; ?> </td>
                                </tr>
                            <?php
                                endforeach;
                                echo '<input name="idB" type="hidden" value="'.$dt->id_beasiswa.'"><input name="per" type="hidden" value="'.$dt->periode.'">';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>
</div>