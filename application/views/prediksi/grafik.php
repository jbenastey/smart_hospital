<div class="card">
	<div class="card-header">
		<h3 class="card-title float-left">Grafik Hasil Prediksi Jumlah Kunjungan Pasien Rawat Jalan
			Bulan <?= bulan(date('m')) ?>  <?= date('Y') ?>  </h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="form-group">
			<label for="exampleInputEmail1">Pilih Poli</label>
			<select name="bulan" class="form-control poli" id="exampleInputEmail1">
				<option selected disabled>- Pilih Poli -</option>
				<?php
				$n = 0;
				foreach ($poli as $key => $value):
					if ($value['status'] == 'Aktif'):
						?>
						<option value="<?= $value['id_poli'].'-'.$n ?>"><?= $value['nama_poli'] ?></option>
					<?php
					$n++;
					endif;
				endforeach;
				?>
			</select>
		</div>
	</div>
	<div id="chartnya">

	</div>
</div>
<!-- /.card-body -->
</div>

