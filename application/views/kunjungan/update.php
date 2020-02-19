<div class="card">
	<div class="card-header">
		<h3 class="card-title">Edit Data Kunjungan</h3>
	</div>
	<div class="card-body">
		<?= form_open('kunjungan/update/'.$kunjungan['id_kunjungan'], array('class' => 'form forms-sample', 'id' => 'formValidation')) ?>
		<div class="form-group">
			<label for="exampleInputEmail1">Bulan</label>
			<select name="bulan" class="form-control" id="exampleInputEmail1" disabled>
				<option <?php if($kunjungan['bulan'] == 'Januari') echo 'selected'?>>Januari</option>
				<option <?php if($kunjungan['bulan'] == 'Februari') echo 'selected'?>>Februari</option>
				<option <?php if($kunjungan['bulan'] == 'Maret') echo 'selected'?>>Maret</option>
				<option <?php if($kunjungan['bulan'] == 'April') echo 'selected'?>>April</option>
				<option <?php if($kunjungan['bulan'] == 'Mei') echo 'selected'?>>Mei</option>
				<option <?php if($kunjungan['bulan'] == 'Juni') echo 'selected'?>>Juni</option>
				<option <?php if($kunjungan['bulan'] == 'Juli') echo 'selected'?>>Juli</option>
				<option <?php if($kunjungan['bulan'] == 'Agustus') echo 'selected'?>>Agustus</option>
				<option <?php if($kunjungan['bulan'] == 'September') echo 'selected'?>>September</option>
				<option <?php if($kunjungan['bulan'] == 'Oktober') echo 'selected'?>>Oktober</option>
				<option <?php if($kunjungan['bulan'] == 'November') echo 'selected'?>>November</option>
				<option <?php if($kunjungan['bulan'] == 'Desember') echo 'selected'?>>Desember</option>
			</select>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">Poliklinik</label>
			<select name="poli" class="form-control" id="exampleInputEmail1" disabled>
				<?php
				foreach($poli as $key=>$value):
					?>
					<option value="<?= $value['id_poli'] ?>" <?php if($kunjungan['id_poli'] == $value['id_poli']) echo 'selected'?>><?= $value['nama_poli'] ?></option>
				<?php
				endforeach;
				?>
			</select>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">Jumlah Kunjungan</label>
			<input type="number" class="form-control" id="exampleInputEmail1" placeholder="Input Jumlah"
				   name="jumlah" required autocomplete="off" value="<?= $kunjungan['jumlah_kunjungan'] ?>">
		</div>
		<button type="submit" class="btn btn-primary" name="update">Simpan</button>
		<button type="button" class="btn btn-default" onclick="return window.history.back()">Kembali</button>
		<?= form_close() ?>
	</div>
</div>

