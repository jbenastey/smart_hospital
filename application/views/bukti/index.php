<div class="card">
	<div class="card-header">
		<h3>Bukti Pelanggaran</h3>
	</div>
	<div class="card-body">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
			<tr>
				<th style="width: 5%;">No</th>
				<th>Foto</th>
			</tr>
			</thead>
			<tbody>
			<?php
			$no = 1;
			foreach ($bukti as $value):
			?>
			<tr>
				<td><?=$no?></td>
				<td><img src="<?=base_url('asset/image/upload/').$value['bukti_gambar']?>" alt="foto bukti" style="width: 100%"> </td>
			</tr>
			<?php
			$no++;
			endforeach;
			?>
			</tbody>
		</table>
	</div>
</div>
