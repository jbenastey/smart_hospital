<div class="card">
	<div class="card-header">
		<h3 class="card-title">Data Poliklinik</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<table id="example1" class="table table-bordered table-striped">
			<a href="<?= base_url('poli/create') ?>" class="btn btn-primary btn-sm"
					style="float: right; margin-left: 5px" ><i class="fa fa-plus-circle"></i> Tambah data poliklinik
			</a>
			<thead>
			<tr>
				<th>No</th>
				<th>Nama Poli</th>
				<th>Keterangan</th>
				<th>Status</th>
				<th class="text-center" width="17%"><i class="fa fa-gear"></i></th>
			</tr>
			</thead>
			<tbody>
			<?php
			$nomor = 1;
			foreach ($poli as $key => $value):
				?>
				<tr>
					<td><?= $nomor ?></td>
					<td><?= $value['nama_poli'] ?></td>
					<td><?= $value['keterangan'] ?></td>
					<td><?= $value['status'] ?></td>
					<td>
						<a href="<?= base_url('poli/update/') . $value['id_poli'] ?>"
						   class="btn btn-outline-primary btn-sm"><i class="fa fa-edit"></i> Edit &nbsp;&nbsp;</a>
						<button type="button" value="<?= $value['id_poli'] ?>"
								class="btn btn-outline-danger btn-sm hapus-poli"><i class="fa fa-trash"></i>
							Hapus</button>
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
