<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Laporan</h3>
        <?php if ($this->session->flashdata('alert') == 'create_laporan'): ?>
            <div class="alert alert-success alert-dismissible" id="feedback">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Data Berhasil disimpan
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
                <a href="<?= base_url('laporan/create') ?>" class="btn btn-primary btn-sm"
                   style="float: right; margin-left: 5px"><i class="fa fa-plus-circle"></i> Tambah data Laporan</a>
            <?php
            endif;
            ?>
            <thead>
            <tr>
                <th >No</th>
                <th >NISN</th>
                <th >Nama</th>
                <th >tanggal</th>
                <th >Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $no = 1;
            foreach ($laporan as $value) {
                if ($this->session->userdata('session_level') == 'Siswa') {
                    if ($value['laporan_nisn'] == $this->session->userdata('session_nip_nisn')) {
                        ?>
                        <tr>
                            <td> <?php echo $no ?></td>
                            <td> <?php echo $value['laporan_nisn'] ?></td>
                            <td> <?php echo $value['siswa_nama'] ?></td>
                            <td> <?php echo $value['laporan_tanggal'] ?></td>
                            <td><a href="<?php echo base_url('laporan/view/' . $value ['laporan_id']) ?>" class="btn btn-outline-primary btn-sm"><i class="fa fa-eye"></i> Lihat</a></td>
                        </tr>
                        <?php
                        $no++;
                    }
                } elseif ($this->session->userdata('session_level') == 'Guru BK') {?>
                <tr>
                    <td> <?php echo $no ?></td>
                    <td> <?php echo $value['laporan_nisn'] ?></td>
                    <td> <?php echo $value['siswa_nama'] ?></td>
                    <td> <?php echo date_indo($value['laporan_tanggal']) ?></td>
                    <td><a href="<?php echo base_url('laporan/view/' . $value ['laporan_id']) ?>" class="btn btn-outline-primary btn-sm"><i class="fa fa-eye"></i> Lihat</a></td>
                </tr>
                <?php
                $no++;
            }
            }
            ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>

<!-- Modal -->

</div>
</div>
</div>