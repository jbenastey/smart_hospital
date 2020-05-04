<div class="card">
	<div class="card-header">
		<h3 class="card-title float-left">Hasil Prediksi Jumlah Kunjungan Pasien Rawat Jalan</h3>
		<form action="<?= base_url('prediksi/cetak') ?>" method="post" target="_blank">
			<input type="hidden" id="nama" name="nama">
			<input type="hidden" id="hasil" name="hasil">
			<input type="hidden" id="ket" name="ket">
			<input type="hidden" id="saran" name="saran">
			<button type="submit" name="cetak" class="btn btn-sm btn-danger float-right"><i class="fa fa-print"></i></button>
		</form>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<table id="hasil-table" class="table table-bordered table-striped">
			<thead>
			<tr>
				<th>No</th>
				<th>Nama Poli</th>
				<th>Hasil Prediksi</th>
				<th>Keterangan</th>
				<th>Saran</th>
			</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
	<!-- /.card-body -->
</div>

