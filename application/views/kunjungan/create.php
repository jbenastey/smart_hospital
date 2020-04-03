<div class="card">
	<div class="card-header">
		<h3 class="card-title">Tambah Data Kunjungan Tahun <?= $tahun ?></h3>
	</div>
	<div class="card-body">
		<?= form_open('kunjungan/create/'.$poli['id_poli'].'/'.$tahun, array('class' => 'form forms-sample', 'id' => 'formValidation')) ?>
		<div class="form-group">
			<label for="exampleInputEmail1">Bulan</label>
			<select name="bulan" class="form-control" id="exampleInputEmail1">
				<option>Januari</option>
				<option>Februari</option>
				<option>Maret</option>
				<option>April</option>
				<option>Mei</option>
				<option>Juni</option>
				<option>Juli</option>
				<option>Agustus</option>
				<option>September</option>
				<option>Oktober</option>
				<option>November</option>
				<option>Desember</option>
			</select>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">Jumlah Kunjungan</label>
			<input type="number" class="form-control" id="exampleInputEmail1" placeholder="Input Jumlah"
				   name="jumlah" required autocomplete="off">
		</div>
		<button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
		<button type="button" class="btn btn-default" onclick="return window.history.back()">Kembali</button>
		<?= form_close() ?>
	</div>
</div>

