<div class="card">
	<div class="card-header">
		<h3 class="card-title">Ganti Password</h3>
		<?php if ($this->session->flashdata('alert') == 'update'): ?>
			<div class="alert alert-success alert-dismissible" id="feedback">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				Password berhasil diubah
			</div>
		<?php elseif ($this->session->flashdata('alert') == 'konfirmasi'): ?>
			<div class="alert alert-warning alert-dismissible" id="feedback">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				Konfirmasi Password salah
			</div>
		<?php
		endif; ?>
	</div>
	<div class="card-body">
		<?= form_open('ganti-password', array('class' => 'form forms-sample', 'id' => 'formValidation')) ?>
		<div class="form-group">
			<label for="exampleInputEmail1">Password Baru</label>
			<input type="password" class="form-control" id="exampleInputEmail1" placeholder="Input Password"
				   name="password" required autocomplete="off">
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">Konfirmasi Password </label>
			<input type="password" class="form-control" id="exampleInputEmail1" placeholder="Input Password"
				   name="konfrmPassword" required autocomplete="off">
		</div>
		<button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
		<button type="button" class="btn btn-default" onclick="return window.history.back()">Kembali</button>
		<?= form_close() ?>
	</div>
</div>

