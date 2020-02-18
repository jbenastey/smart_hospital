<div class="card">
	<div class="card-header">
		<h3 class="card-title">Tambah Data Staff</h3>
	</div>
	<div class="card-body">
		<?= form_open('staff/update/'.$staff['id_user'], array('class' => 'form forms-sample', 'id' => 'formValidation')) ?>
		<div class="form-group">
			<label for="exampleInputEmail1">Nama</label>
			<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Input Nama"
				   name="nama" required autocomplete="off" value="<?= $staff['nama'] ?>">
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">Jenis Kelamin</label>
			<select name="jk" class="form-control" id="exampleInputEmail1">
				<option <?php if($staff['jenis_kelamin'] == 'Laki-laki') echo 'selected'?> >Laki-laki</option>
				<option <?php if($staff['jenis_kelamin'] == 'Perempuan') echo 'selected'?> >Perempuan</option>
			</select>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">Agama</label>
			<select name="agama" class="form-control" id="exampleInputEmail1">
				<option <?php if($staff['agama'] == 'Islam') echo 'selected'?> >Islam</option>
				<option <?php if($staff['agama'] == 'Kristen Protestan') echo 'selected'?> >Kristen Protestan</option>
				<option <?php if($staff['agama'] == 'Kristen Katolik') echo 'selected'?> >Kristen Katolik</option>
				<option <?php if($staff['agama'] == 'Hindu') echo 'selected'?> >Hindu</option>
				<option <?php if($staff['agama'] == 'Buddha') echo 'selected'?> >Buddha</option>
			</select>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">Alamat</label>
			<textarea class="form-control" name="alamat" placeholder="Input Alamat" required rows="3"
					  autocomplete="off"><?= $staff['alamat'] ?></textarea>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">Status</label>
			<select name="status" class="form-control" id="exampleInputEmail1">
				<option <?php if($staff['status'] == 'Aktif') echo 'selected'?> >Aktif</option>
				<option <?php if($staff['status'] == 'Tidak Aktif') echo 'selected'?> >Tidak Aktif</option>
			</select>
		</div>
		<button type="submit" class="btn btn-primary" name="update">Update</button>
		<button type="button" class="btn btn-default" onclick="return window.history.back()">Kembali</button>
		<?= form_close() ?>
	</div>
</div>

