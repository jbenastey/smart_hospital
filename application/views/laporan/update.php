<?php
$total = 0;
?>
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Update data Laporan</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <?php echo form_open('laporan/update/'.$laporan['laporan_id']) ?>
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">NISN SISWA</label>
                <input type="number" name="NISN" class="form-control" value="<?php echo $siswa['siswa_nisn'] ?>"
                       id="exampleInputEmail1" placeholder="" readonly="">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Nama</label>
                <input type="text" name="Nama" class="form-control" value="<?php echo $siswa['siswa_nama'] ?>"
                       id="exampleInputPassword1" placeholder="" readonly="">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Alamat</label>
                <input type="text" name="Alamat" class="form-control" value="<?php echo $siswa['siswa_alamat'] ?>"
                       id="exampleInputPassword1" placeholder="" readonly="">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Kelas</label>
                <input type="text" name="Alamat" class="form-control" value="<?php echo $siswa['siswa_kelas'] ?>"
                       id="exampleInputPassword1" placeholder="" readonly="">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Jurusan</label>
                <input type="text" name="Alamat" class="form-control" value="<?php echo $siswa['siswa_jurusan'] ?>"
                       id="exampleInputPassword1" placeholder="" readonly="">
            </div>
            <?php
            $ringan = 0;
            $sedang = 0;
            $berat = 0;
            foreach ($pelanggaran as $key => $value) {
                if ($value['pelanggaran_bentuk'] == 'Ringan') {
                    $ringan = $ringan + (int)$value['pelanggaran_poin'];
                } elseif ($value['pelanggaran_bentuk'] == 'Sedang') {
                    $sedang = $sedang + (int)$value['pelanggaran_poin'];
                } elseif ($value['pelanggaran_bentuk'] == 'Berat') {
                    $berat = $berat + (int)$value['pelanggaran_poin'];
                }
            }
            ?>
        </div>
        <div>
            <h3 style="margin-left: 20px">
                Bentuk Pelanggaran
            </h3>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th style="width: 3%">No</th>
                        <th style="width: 5%">Bentuk Pelanggaran</th>
                        <th style="width: 3%">Poin</th>
                        <th style="width: 40%">Keterangan</th>
                        <th style="width: 5%">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $nomor = 1;
                    foreach ($semuapelanggaran as $key => $value):
                        ?>
                        <tr>
                            <td><?= $nomor ?></td>
                            <td><?= $value['pelanggaran_bentuk'] ?></td>
                            <td><?= $value['pelanggaran_poin'] ?></td>
                            <td><?= $value['pelanggaran_keterangan'] ?></td>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1"
                                           value="<?php echo $value['pelanggaran_id'] ?>" name="id_pelanggaran[]"
                                        <?php
                                        foreach ($pelanggaran as $keys => $item) {
                                            if ($value['pelanggaran_id'] == $item['detail_pelanggaran_id']) echo 'checked disabled';
                                        }
                                        ?>
                                    >
                                </div>
                        </tr>
                        <?php
                        $nomor++;
                    endforeach;

                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary" name="update">Update</button>
        </div>
        <?=form_close()?>
    </div>
    <!-- /.card -->

    <!-- Form Element sizes -->
</div>