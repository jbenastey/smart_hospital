<div class="card">
	<div class="card-header">
		<h3 class="card-title">Tambah Data Staff</h3>
	</div>
	<div class="card-body">
		<?= form_open('staff/create', array('class' => 'form forms-sample', 'id' => 'formValidation')) ?>
		<div class="form-group">
			<label for="exampleInputEmail1">Nama</label>
			<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Input Nama"
				   name="nama" required autocomplete="off">
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">Username</label>
			<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Input Username"
				   name="username" required autocomplete="off">
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">Jenis Kelamin</label>
			<select name="jk" class="form-control" id="exampleInputEmail1">
				<option>Laki-laki</option>
				<option>Perempuan</option>
			</select>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">Agama</label>
			<select name="agama" class="form-control" id="exampleInputEmail1">
				<option>Islam</option>
				<option>Kristen Protestan</option>
				<option>Kristen Katolik</option>
				<option>Hindu</option>
				<option>Buddha</option>
			</select>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">Alamat</label>
			<textarea class="form-control" name="alamat" placeholder="Input Alamat" required rows="3"
					  autocomplete="off"></textarea>
		</div>
		<button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
		<button type="button" class="btn btn-default" onclick="return window.history.back()">Kembali</button>
		<?= form_close() ?>
	</div>
</div>

