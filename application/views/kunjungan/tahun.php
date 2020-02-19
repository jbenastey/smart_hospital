<div class="card">
	<div class="card-header">
		<h3 class="card-title">Pilih Tahun</h3>
	</div>
	<div class="card-body">
		<?= form_open('kunjungan', array('class' => 'form forms-sample', 'id' => 'formValidation')) ?>
		<div class="form-group">
			<label for="exampleInputEmail1">Tahun</label>
			<select name="tahun" class="form-control" id="exampleInputEmail1">
				<option>2014</option>
				<option>2015</option>
				<option>2016</option>
				<option>2017</option>
				<option>2018</option>
				<option>2019</option>
				<option>2020</option>
				<option>2021</option>
				<option>2022</option>
				<option>2023</option>
			</select>
		</div>
		<button type="submit" class="btn btn-primary" name="lihat">Lihat</button>
		<button type="button" class="btn btn-default" onclick="return window.history.back()">Kembali</button>
		<?= form_close() ?>
	</div>
</div>

