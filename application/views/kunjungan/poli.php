<div class="card">
	<div class="card-header">
		<h3 class="card-title">Lihat Data Kunjungan</h3>
	</div>
	<div class="card-body">
		<?= form_open('data-kunjungan', array('class' => 'form forms-sample', 'id' => 'formValidation')) ?>

		<div class="form-group">
			<label for="exampleInputEmail1">Poli</label>
			<select name="poli" class="form-control" id="exampleInputEmail1">
				<?php
				foreach($poli as $key=>$value):
				?>
					<option value="<?= $value['id_poli'] ?>"><?= $value['nama_poli'] ?></option>
				<?php
				endforeach;
				?>
			</select>
		</div>

		<div class="form-group">
			<label for="exampleInputEmail1">Tahun</label>
			<select name="tahun" class="form-control" id="exampleInputEmail1">
				<option <?php if($tahun == 2014) echo 'selected'?>>2014</option>
				<option <?php if($tahun == 2015) echo 'selected'?>>2015</option>
				<option <?php if($tahun == 2016) echo 'selected'?>>2016</option>
				<option <?php if($tahun == 2017) echo 'selected'?>>2017</option>
				<option <?php if($tahun == 2018) echo 'selected'?>>2018</option>
				<option <?php if($tahun == 2019) echo 'selected'?>>2019</option>
				<option <?php if($tahun == 2020) echo 'selected'?>>2020</option>
				<option <?php if($tahun == 2021) echo 'selected'?>>2021</option>
				<option <?php if($tahun == 2022) echo 'selected'?>>2022</option>
				<option <?php if($tahun == 2023) echo 'selected'?>>2023</option>
			</select>
		</div>

		<div>
			<button type="submit" class="btn btn-primary btn-block" name="lihat">Lihat</button>
		</div>
	</div>
	<?= form_close() ?>
</div>
