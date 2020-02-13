<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Semua Pelanggaran</h3>
        <?php if ($this->session->flashdata('alert') == 'Tambahpelanggaran'): ?>
            <div class="alert alert-success alert-dismissible" id="feedback">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Data Berhasil disimpan
            </div>
        <?php elseif ($this->session->flashdata('alert') == 'update_pelanggaran'): ?>
            <div class="alert alert-success alert-dismissible" id="feedback">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Data Berhasil diupdate
            </div>
        <?php elseif ($this->session->flashdata('alert') == 'delete_pelanggaran'): ?>
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
                        data-target="#myModal"><i class="fa fa-plus-circle"></i> Tambah data pelanggaran
                </button>
            <?php
            endif;
            ?>
            <thead>
            <tr>
                <th style="width: 3%">No</th>
                <th style="width: 5%">Bentuk Pelanggaran</th>
                <th style="width: 3%">Poin</th>
                <th style="width: 40%">Keterangan</th>
                <?php
                if ($this->session->userdata('session_level') == 'Guru BK'):
                    ?>
                    <th style="width: 5%">Aksi</th><?php
                endif;
                ?>
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
                    <?php
                    if ($this->session->userdata('session_level') == 'Guru BK'):
                        ?>
                        <td><a href="<?= base_url('pelanggaran/update/') . $value['pelanggaran_id'] ?>"
                               class="btn btn-outline-primary btn-sm"><i class="fa fa-edit"></i> Edit &nbsp;&nbsp;</a> <a
                                    href="<?= base_url('pelanggaran/hapus/') . $value['pelanggaran_id'] ?>"
                                    class="btn btn-outline-danger btn-sm"
                                    onclick="return confirm('Apakah anda ingin menghapus')"><i class="fa fa-trash"></i>
                                Hapus</a></td>
                    <?php
                    endif;
                    ?>
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
                <?= form_open('pelanggaran/create', array('class' => 'form forms-sample', 'id' => 'formValidation')) ?>
                <div class="form-group">
                    <label for="exampleInputEmail1">Bentuk pelanggaran</label>
                    <select class="form-control" name="bentukpelanggaran">
                        <option>Ringan</option>
                        <option>Sedang</option>
                        <option>Berat</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Poin</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Input poin"
                           name="poin">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Keterangan</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Input keterangan"
                           name="keterangan">
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