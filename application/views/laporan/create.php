<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah data Laporan</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <?php echo form_open('laporan/create') ?>
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Siswa</label>
                <select class="form-control js-example-basic-single" name="NISN" id="nama">
                    <?php foreach ($siswa as $key => $value) { ?>
                        <option value="<?php echo $value['siswa_nisn'] ?>"><?php echo $value['siswa_nama']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nisn</label>
                <div id="nisnnya">
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nisn Siswa" name="Nisn"
                           readonly="">
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Kelas</label>
                <div id="kelasnya">
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Kelas" name="Kelas"
                           readonly="">
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Jurusan</label>
                <div id="jurusannya">
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Jurusan"
                           name="Jurusan" readonly="">
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Tanggal</label>
                <input type="date" name="Tanggal" class="form-control" id="exampleInputPassword1"
                       placeholder="Masukkan Tanggal">
            </div>
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
                    foreach ($pelanggaran as $key => $value):
                        ?>
                        <tr>
                            <td><?= $nomor ?></td>
                            <td><?= $value['pelanggaran_bentuk'] ?></td>
                            <td><?= $value['pelanggaran_poin'] ?></td>
                            <td><?= $value['pelanggaran_keterangan'] ?></td>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1"
                                           value="<?php echo $value['pelanggaran_id'] ?>" name="id_pelanggaran[]">
                                </div>
                            </td>

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
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
    </div>
    <!-- /.card -->

    <!-- Form Element sizes -->

</div>