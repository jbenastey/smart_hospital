<?php
$total = 0;
?>

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Lihat data Laporan</h3>

        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <div class="card-body">
            <?php if ($this->session->flashdata('alert') == 'update_laporan'): ?>
                <div class="alert alert-success alert-dismissible" id="feedback">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Data Berhasil diupdate
                </div>
            <?php
            endif; ?>
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
            <div class="form-group">
                <label for="exampleInputPassword1">Total Poin</label>
                <div class="row">
                    <div class="col-4">
                        <input type="text" name="Alamat" class="form-control" value="ringan:<?php echo $ringan ?>"
                               id="exampleInputPassword1" placeholder="" readonly="">
                    </div>
                    <div class="col-4">
                        <input type="text" name="Alamat" class="form-control" value="sedang:<?php echo $sedang ?>"
                               id="exampleInputPassword1" placeholder="" readonly="">
                    </div>
                    <div class="col-4">
                        <input type="text" name="Alamat" class="form-control" value="Berat:<?php echo $berat ?>"
                               id="exampleInputPassword1" placeholder="" readonly="">
                    </div>
                    <div class="col-4"></div>
                    <div class="col-4"></div>
                    <div class="col-4">
                        <br>
                        <div class="row">
                            <div class="col-6">
                                <?php
                                if ($this->session->userdata('session_level') == 'Guru BK'):
                                ?>
                                <a class="btn btn-success btn-block btn-sm"
                                   href="<?php echo base_url('laporan/update/' . $laporan['laporan_id']) ?>"><i class="fa fa-edit"></i>
                                    Edit</a>
                                <?php
                                endif;
                                ?>
                            </div>
                            <?php
                                if ($berat >= 5 && $berat < 10):
                            ?>
                                    <div class="col-6">
                                        <a class="btn btn-primary btn-block btn-sm"
                                           href="<?php echo base_url('laporan/cetak/' . $laporan['laporan_id'].'/sedang') ?>"><i class="fa fa-print"></i>
                                            Cetak</a>
                                    </div>
                            <?php
                            elseif ($berat >= 10):
                                ?>
                                <div class="col-6">
                                    <a class="btn btn-primary btn-block btn-sm"
                                       href="<?php echo base_url('laporan/cetak/' . $laporan['laporan_id'].'/berat') ?>"><i class="fa fa-print"></i>
                                        Cetak</a>
                                </div>
                            <?php
                                elseif ($sedang >= 12 && $sedang < 24):
                                    ?>
                                    <div class="col-6">
                                        <a class="btn btn-primary btn-block btn-sm"
                                           href="<?php echo base_url('laporan/cetak/' . $laporan['laporan_id'].'/ringan') ?>"><i class="fa fa-print"></i>
                                            Cetak</a>
                                    </div>
                                <?php
                                elseif ($sedang >= 24 && $sedang < 36):
                                    ?>
                                    <div class="col-6">
                                        <a class="btn btn-primary btn-block btn-sm"
                                           href="<?php echo base_url('laporan/cetak/' . $laporan['laporan_id'].'/sedang') ?>"><i class="fa fa-print"></i>
                                            Cetak</a>
                                    </div>
                                <?php
                                elseif ($sedang >= 36):
                                    ?>
                                    <div class="col-6">
                                        <a class="btn btn-primary btn-block btn-sm"
                                           href="<?php echo base_url('laporan/cetak/' . $laporan['laporan_id'].'/berat') ?>"><i class="fa fa-print"></i>
                                            Cetak</a>
                                    </div>
                                <?php
                                elseif ($ringan >= 5 && $ringan < 10):
                                    ?>
                                    <div class="col-6">
                                        <a class="btn btn-primary btn-block btn-sm"
                                           href="<?php echo base_url('laporan/cetak/' . $laporan['laporan_id'].'/ringan') ?>"><i class="fa fa-print"></i>
                                            Cetak</a>
                                    </div>
                                <?php
                                elseif ($ringan >= 10):
                                    ?>
                                    <div class="col-6">
                                        <a class="btn btn-primary btn-block btn-sm"
                                           href="<?php echo base_url('laporan/cetak/' . $laporan['laporan_id'].'/sedang') ?>"><i class="fa fa-print"></i>
                                            Cetak</a>
                                    </div>
                            <?php
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <h3 style="margin-left: 20px">
                Bentuk Pelanggaran
            </h3>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th style="width: 3%">No</th>
                        <th style="width: 5%">Bentuk Pelanggaran</th>
                        <th style="width: 40%">Keterangan</th>
                        <th style="width: 3%">Poin</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $nomor = 1;
                    foreach ($pelanggaran as $key => $value):
                        ?>
                        <tr>
                            <td><?= $nomor ?></td>
                            <td><?= $value['pelanggaran_bentuk'] ?></td>
                            <td><?= $value['pelanggaran_keterangan'] ?></td>
                            <td><?= $value['pelanggaran_poin'] ?></td>

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

    </div>
    <!-- /.card -->

    <!-- Form Element sizes -->

</div>