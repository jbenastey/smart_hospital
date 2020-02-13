<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Siswa Bimbingan konseling</h3>
        <?php if ($this->session->flashdata('alert') == 'create_siswa'): ?>
            <div class="alert alert-success alert-dismissible" id="feedback">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Data Berhasil disimpan
            </div>
        <?php elseif ($this->session->flashdata('alert') == 'update_siswa'): ?>
            <div class="alert alert-success alert-dismissible" id="feedback">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Data Berhasil diupdate
            </div>
        <?php elseif ($this->session->flashdata('alert') == 'hapus_siswa'): ?>
            <div class="alert alert-danger alert-dismissible" id="feedback">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Data Berhasil dihapus
            </div>
        <?php
        endif; ?>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <?php
            if ($this->session->userdata('session_level') == 'Guru BK'):
            ?>
            <button class="btn btn-primary btn-sm"
                    style="float: right; margin-left: 5px" data-toggle="modal"
                    data-target="#myModal"><i class="fa fa-plus-circle"></i> Tambah data siswa</button>
            <?php
            endif;
            ?>
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nisn</th>
                    <th>Nama</th>
                    <th>Alamat(s)</th>
                    <th>Jurusan</th>
                    <th>Kelas</th>
                    <th>Agama</th>
                    <th>Jenis Kelamin</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $nomor = 1;
                foreach ($siswa as $key => $value):
                    ?>
                    <tr>
                        <td><?= $nomor ?></td>
                        <td><?= $value['siswa_nisn'] ?></td>
                        <td><?= $value['siswa_nama'] ?></td>
                        <td><?= $value['siswa_alamat'] ?></td>
                        <td><?= $value['siswa_jurusan'] ?></td>
                        <td><?= $value['siswa_kelas'] ?></td>
                        <td><?= $value['siswa_agama'] ?></td>
                        <td><?= $value['siswa_jenis_kelamin'] ?></td>
                        <td><a href="<?= base_url('siswa/lihat/') . $value['siswa_nisn'] ?>"
                               class="btn btn-outline-success btn-sm"><i class="fa fa-eye"></i> Lihat&nbsp;</a>
                            <a href="<?= base_url('siswa/update/') . $value['siswa_nisn'] ?>"
                               class="btn btn-outline-primary btn-sm"><i class="fa fa-edit"></i> Edit &nbsp;&nbsp;</a>
                            <a href="<?= base_url('siswa/hapus/') . $value['siswa_nisn'] ?>"
                               class="btn btn-outline-danger btn-sm"
                               onclick="return confirm('Apakah anda ingin menghapus')"><i class="fa fa-trash"></i> Hapus</a></td>

                    </tr>
                    <?php
                    $nomor++;
                endforeach;
                ?>
                </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- body modal -->
            <div class="modal-body">
                <?= form_open('siswa/create', array('class' => 'form forms-sample', 'id' => 'formValidation')) ?>
                <div class="form-group">
                    <label for="exampleInputEmail1">NISN</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Input NISN"
                           name="nisn">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Input Nama"
                           name="nama">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Alamat</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Input Alamat"
                           name="alamat">
                </div>
                <div class="form-group">
                    <label>Jurusan</label>
                    <select class="form-control" name="Jurusan">
                        <option>Teknik Elektronika</option>
                        <option>Teknik Geomatika</option>
                        <option>Teknik Informatika</option>
                        <option>Teknik Kendaraan ringan</option>
                        <option>Teknik dan bisnis sepeda motor</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Kelas</label>
                    <select class="form-control" name="Kelas">
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Agama</label>
                    <select class="form-control" name="Agama">
                        <option>Islam</option>
                        <option>Kristen</option>
                        <option>Hindu</option>
                        <option>Budha</option>
                        <option>Katholik</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Jenis kelamin</label>
                    <select class="form-control" name="jeniskelamin">
                        <option>Laki-Laki</option>
                        <option>Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Orang Tua</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Input Nama orang tua"
                           name="namaorangtua">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Alamat orang tua</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Input Alamat orang tua"
                           name="alamatortu">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">No Hp</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Input No hp orang tua"
                           name="hportu">
                </div>
            </div>
            <!-- footer modal -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>