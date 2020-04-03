<div class="card">
	<div class="card-header">
		<h3 class="card-title">Data Kunjungan Poliklinik <?= $poli['nama_poli'] ?> Tahun <?= $tahun ?> </h3>
		<?php if ($this->session->flashdata('alert') == 'insert'): ?>
			<div class="alert alert-success alert-dismissible" id="feedback">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				Data Berhasil disimpan
			</div>
		<?php elseif ($this->session->flashdata('alert') == 'month exist'): ?>
			<div class="alert alert-warning alert-dismissible" id="feedback">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				Bulan Sudah Ada
			</div>
		<?php elseif ($this->session->flashdata('alert') == 'delete'): ?>
			<div class="alert alert-danger alert-dismissible" id="feedback">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				Data Berhasil dihapus
			</div>
		<?php elseif ($this->session->flashdata('alert') == 'update'): ?>
			<div class="alert alert-success alert-dismissible" id="feedback">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				Data Berhasil diubah
			</div>
		<?php
		endif; ?>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<table id="example1" class="table table-bordered table-striped">
			<?php
			if($this->session->userdata('session_level') == 'Staff RM'):
			?>
				<a href="<?= base_url('kunjungan/create/'.$poli['id_poli'].'/'.$tahun) ?>" class="btn btn-primary btn-sm"
				   style="float: right; margin-left: 5px" ><i class="fa fa-plus-circle"></i> Tambah data kunjungan
				</a>
			<?php
			endif
			?>
			<thead>
			<tr>
				<th>No</th>
				<th>Bulan</th>
				<th>Jumlah</th>
				<th class="text-center" width="17%"><i class="fa fa-gear"></i></th>
			</tr>
			</thead>
			<tbody>
			<?php
			$nomor = 1;
			foreach($kunjungan as $key=>$value):
			?>
			<tr>
				<td><?= $nomor ?></td>
				<td><?= $value['bulan'] ?></td>
				<td><?= $value['jumlah_kunjungan'] ?></td>
				<td>
					<a href="<?= base_url('kunjungan/update/') . $value['id_kunjungan'] ?>"
					   class="btn btn-outline-primary btn-sm"><i class="fa fa-edit"></i> Edit &nbsp;&nbsp;</a>
					<a
						href="<?= base_url('kunjungan/hapus/') . $value['id_kunjungan'] ?>"
						class="btn btn-outline-danger btn-sm"
						onclick="return confirm('Apakah anda ingin menghapus')"><i class="fa fa-trash"></i>
						Hapus</a>
				</td>
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
				<?= form_open('poli/create', array('class' => 'form forms-sample', 'id' => 'formValidation')) ?>
				<div class="form-group">
					<label for="exampleInputEmail1">Nama Poli</label>
					<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Input Nama"
						   name="nama" required autocomplete="off">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Keterangan</label>
					<textarea class="form-control" name="keterangan" placeholder="Input Keterangan" required rows="3"
							  autocomplete="off"></textarea>
				</div>
			</div>
			<!-- footer modal -->
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>
