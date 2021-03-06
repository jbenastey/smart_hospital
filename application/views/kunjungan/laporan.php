<div class="card">
	<div class="card-header">
		<h3 class="card-title">Data Kunjungan <?= $tahun ?></h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div id="double-scroll">
			<table class="table table-bordered table-striped  text-center">
				<thead class="text-center">
				<tr>
					<th rowspan="2" width="2%">No</th>
					<th rowspan="2">Bulan</th>
					<th colspan="<?= count($poli) ?>">Poliklinik</th>
					<th rowspan="2">Jumlah</th>
				</tr>
				<tr>
					<?php
					$jumlahPoli = array();
					foreach ($poli as $key => $value):
						$jumlahPoli += array(
							$value['nama_poli'] => 0
						)
						?>
						<th><?= $value['nama_poli'] ?></th>
					<?php
					endforeach;
					?>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td>1</td>
					<td>Januari</td>
					<?php
					$jumlah = 0;
					$jumlahKunjungan = 0;
					foreach ($poli as $key => $value):
						?>
						<td><?= $bulan['jan'][$value['nama_poli']] ?></td>
						<?php
						$jumlah += $bulan['jan'][$value['nama_poli']];
						$jumlahPoli[$value['nama_poli']] += $bulan['jan'][$value['nama_poli']];
					endforeach;
					$jumlahKunjungan += $jumlah;
					?>
					<td><?= $jumlah ?></td>
				</tr>
				<tr>
					<td>2</td>
					<td>Februari</td>
					<?php
					$jumlah = 0;
					foreach ($poli as $key => $value):
						?>
						<td><?= $bulan['feb'][$value['nama_poli']] ?></td>
						<?php
						$jumlah += $bulan['feb'][$value['nama_poli']];
						$jumlahPoli[$value['nama_poli']] += $bulan['feb'][$value['nama_poli']];
					endforeach;
					$jumlahKunjungan += $jumlah;
					?>
					<td><?= $jumlah ?></td>
				</tr>
				<tr>
					<td>3</td>
					<td>Maret</td>
					<?php
					$jumlah = 0;
					foreach ($poli as $key => $value):
						?>
						<td><?= $bulan['mar'][$value['nama_poli']] ?></td>
						<?php
						$jumlah += $bulan['mar'][$value['nama_poli']];
						$jumlahPoli[$value['nama_poli']] += $bulan['mar'][$value['nama_poli']];
					endforeach;
					$jumlahKunjungan += $jumlah;
					?>
					<td><?= $jumlah ?></td>
				</tr>
				<tr>
					<td>4</td>
					<td>April</td>
					<?php
					$jumlah = 0;
					foreach ($poli as $key => $value):
						?>
						<td><?= $bulan['apr'][$value['nama_poli']] ?></td>
						<?php
						$jumlah += $bulan['apr'][$value['nama_poli']];
						$jumlahPoli[$value['nama_poli']] += $bulan['apr'][$value['nama_poli']];
					endforeach;
					$jumlahKunjungan += $jumlah;
					?>
					<td><?= $jumlah ?></td>
				</tr>
				<tr>
					<td>5</td>
					<td>Mei</td>
					<?php
					$jumlah = 0;
					foreach ($poli as $key => $value):
						?>
						<td><?= $bulan['mei'][$value['nama_poli']] ?></td>
						<?php
						$jumlah += $bulan['mei'][$value['nama_poli']];
						$jumlahPoli[$value['nama_poli']] += $bulan['mei'][$value['nama_poli']];
					endforeach;
					$jumlahKunjungan += $jumlah;
					?>
					<td><?= $jumlah ?></td>
				</tr>
				<tr>
					<td>6</td>
					<td>Juni</td>
					<?php
					$jumlah = 0;
					foreach ($poli as $key => $value):
						?>
						<td><?= $bulan['jun'][$value['nama_poli']] ?></td>
						<?php
						$jumlah += $bulan['jun'][$value['nama_poli']];
						$jumlahPoli[$value['nama_poli']] += $bulan['jun'][$value['nama_poli']];
					endforeach;
					$jumlahKunjungan += $jumlah;
					?>
					<td><?= $jumlah ?></td>
				</tr>
				<tr>
					<td>7</td>
					<td>Juli</td>
					<?php
					$jumlah = 0;
					foreach ($poli as $key => $value):
						?>
						<td><?= $bulan['jul'][$value['nama_poli']] ?></td>
						<?php
						$jumlah += $bulan['jul'][$value['nama_poli']];
						$jumlahPoli[$value['nama_poli']] += $bulan['jul'][$value['nama_poli']];
					endforeach;
					$jumlahKunjungan += $jumlah;
					?>
					<td><?= $jumlah ?></td>
				</tr>
				<tr>
					<td>8</td>
					<td>Agustus</td>
					<?php
					$jumlah = 0;
					foreach ($poli as $key => $value):
						?>
						<td><?= $bulan['ags'][$value['nama_poli']] ?></td>
						<?php
						$jumlah += $bulan['ags'][$value['nama_poli']];
						$jumlahPoli[$value['nama_poli']] += $bulan['ags'][$value['nama_poli']];
					endforeach;
					$jumlahKunjungan += $jumlah;
					?>
					<td><?= $jumlah ?></td>
				</tr>
				<tr>
					<td>9</td>
					<td>September</td>
					<?php
					$jumlah = 0;
					foreach ($poli as $key => $value):
						?>
						<td><?= $bulan['sep'][$value['nama_poli']] ?></td>
						<?php
						$jumlah += $bulan['sep'][$value['nama_poli']];
						$jumlahPoli[$value['nama_poli']] += $bulan['sep'][$value['nama_poli']];
					endforeach;
					$jumlahKunjungan += $jumlah;
					?>
					<td><?= $jumlah ?></td>
				</tr>
				<tr>
					<td>10</td>
					<td>Oktober</td>
					<?php
					$jumlah = 0;
					foreach ($poli as $key => $value):
						?>
						<td><?= $bulan['okt'][$value['nama_poli']] ?></td>
						<?php
						$jumlah += $bulan['okt'][$value['nama_poli']];
						$jumlahPoli[$value['nama_poli']] += $bulan['okt'][$value['nama_poli']];
					endforeach;
					$jumlahKunjungan += $jumlah;
					?>
					<td><?= $jumlah ?></td>
				</tr>
				<tr>
					<td>11</td>
					<td>November</td>
					<?php
					$jumlah = 0;
					foreach ($poli as $key => $value):
						?>
						<td><?= $bulan['nov'][$value['nama_poli']] ?></td>
						<?php
						$jumlah += $bulan['nov'][$value['nama_poli']];
						$jumlahPoli[$value['nama_poli']] += $bulan['nov'][$value['nama_poli']];
					endforeach;
					$jumlahKunjungan += $jumlah;
					?>
					<td><?= $jumlah ?></td>
				</tr>
				<tr>
					<td>12</td>
					<td>Desember</td>
					<?php
					$jumlah = 0;
					foreach ($poli as $key => $value):
						?>
						<td><?= $bulan['des'][$value['nama_poli']] ?></td>
						<?php
						$jumlah += $bulan['des'][$value['nama_poli']];
						$jumlahPoli[$value['nama_poli']] += $bulan['des'][$value['nama_poli']];
					endforeach;
					$jumlahKunjungan += $jumlah;
					?>
					<td><?= $jumlah ?></td>
				</tr>
				</tbody>
				<tfoot>
				<tr class="text-center">
					<th colspan="2">Total</th>
					<?php
					foreach ($poli as $key => $value):
						?>
						<th><?= $jumlahPoli[$value['nama_poli']] ?></th>
					<?php
					endforeach;
					$jumlahKunjungan += $jumlah;
					?>
					<th><?= $jumlahKunjungan ?></th>
				</tr>
				</tfoot>
			</table>
		</div>
	</div>
	<!-- /.card-body -->
</div>
