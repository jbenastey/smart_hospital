<div class="card">
	<div class="card-header">
		<h3 class="card-title">Edit Data Poliklinik</h3>
	</div>
	<div class="card-body">
		<?= form_open('poli/update/' . $poli['id_poli'], array('class' => 'form forms-sample', 'id' => 'formValidation')) ?>
		<div class="form-group">
			<label for="exampleInputEmail1">Nama Poli</label>
			<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Input Nama"
				   name="nama" required autocomplete="off" value="<?= $poli['nama_poli'] ?>">
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">Keterangan</label>
			<textarea class="form-control" name="keterangan" placeholder="Input Keterangan" required rows="3"
					  autocomplete="off"><?= $poli['keterangan'] ?></textarea>
		</div>
		<button type="submit" class="btn btn-primary" name="update">Update</button>
		<button type="button" class="btn btn-default" onclick="return window.history.back()">Kembali</button>
		<?= form_close() ?>
	</div>
</div>

