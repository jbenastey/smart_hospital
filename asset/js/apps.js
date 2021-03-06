$(document).ready(function () {
	$('.js-example-basic-single').select2();

	var local = window.location.origin + '/smart_hospital/';

	$('#double-scroll').doubleScroll();

	$('.logout').click(function () {
		Swal.fire({
			title: 'Anda yakin ingin keluar ?',
			type: 'warning',
			confirmButtonText: 'Ok',
			showCancelButton: true,
		}).then((result) => {
			if (result.value) {
				window.location.href =  window.location.origin +'/smart_hospital/logout'
			} else if(result.dismiss === Swal.DismissReason.cancel) {
				swal("Dibatalkan", "Tidak jadi logout", "error");
			}
		})
	})

	$('.hapus-staff').click(function () {
		var id = $(this).val();
		Swal.fire({
			title: 'Hapus Data ?',
			type: 'warning',
			confirmButtonText: 'Ok',
			showCancelButton: true,
		}).then((result) => {
			if (result.value) {
				window.location.href = window.location.origin +'/smart_hospital/staff/hapus/'+id
			} else if(result.dismiss === Swal.DismissReason.cancel) {
				swal("Dibatalkan", "Tidak jadi dihapus", "error");
			}
		})
	})

	$('.hapus-poli').click(function () {
		var id = $(this).val();
		Swal.fire({
			title: 'Hapus Data ?',
			type: 'warning',
			confirmButtonText: 'Ok',
			showCancelButton: true,
		}).then((result) => {
			if (result.value) {
				window.location.href = window.location.origin +'/smart_hospital/poli/hapus/'+id
			} else if(result.dismiss === Swal.DismissReason.cancel) {
				swal("Dibatalkan", "Tidak jadi dihapus", "error");
			}
		})
	})

	$('.hapus-kunjungan').click(function () {
		var id = $(this).val();
		Swal.fire({
			title: 'Hapus Data ?',
			type: 'warning',
			confirmButtonText: 'Ok',
			showCancelButton: true,
		}).then((result) => {
			if (result.value) {
				window.location.href = window.location.origin +'/smart_hospital/kunjungan/hapus/'+id
			} else if(result.dismiss === Swal.DismissReason.cancel) {
				swal("Dibatalkan", "Tidak jadi dihapus", "error");
			}
		})
	})

	var hasil = [];

	$.ajax({
		url: local + 'prediksi/praproses',
		type: 'GET',
		async: true,
		cache: false,
		dataType: 'json',
		success: function (response) {
			var nama = [];
			var Ex = [];
			var Ey = [];
			var Exy = [];
			var Ex2 = [];
			var Ey2 = [];
			var n = [];
			var b = [];
			var a = [];
			var Y = [];
			var ket = [];
			var sar = [];
			for (var i = 0; i < response.length; i++) {
				nama.push(response[i].nama_poli);
				Ex.push(0);
				Ey.push(0);
				Exy.push(0);
				Ex2.push(0);
				Ey2.push(0);
				n.push(0);
				for (var j = 0; j < response[i].praproses.length; j++) {
					var x = j + 1;
					var y = parseInt(response[i].praproses[j]);
					var xy = x * y;
					var x2 = x * x;
					var y2 = y * y;

					Ex[i] += x;
					Ey[i] += y;
					Exy[i] += xy;
					Ex2[i] += x2;
					Ey2[i] += y2;
					n[i] = x;
				}
				b.push(cariB(Ex[i], Ey[i], Exy[i], Ex2[i], Ey2[i], n[i]));
				a.push(cariA(Ex[i], Ey[i], b[i], n[i]));
				Y.push(cariY(a[i], b[i], (n[i] + 1)));
				ket.push(keterangan(y, Y[i]));
				sar.push(saran(Y[i]));
				hasil.push(cekMinus(Math.round(Y[i])));

				$('#hasil-table > tbody:last-child').append(
					'<tr>' +
					'<td>' + (i + 1) + '</td>' +
					'<td>' + response[i].nama_poli + '</td>' +
					'<td>' + cekMinus(Math.round(Y[i])) + '</td>' +
					'<td>' + keterangan(y, Y[i]) + '</td>' +
					'<td>' + saran(Y[i]) + '</td>' +
					'</tr>'
				);
			}
			$('#nama').val(JSON.stringify(nama));
			$('#hasil').val(JSON.stringify(Y));
			$('#ket').val(JSON.stringify(ket));
			$('#saran').val(JSON.stringify(sar));
		}
	})

	'use strict';

	var root = window.location.origin + '/smart_hospital/';

	var ticksStyle = {
		fontColor: '#495057',
		fontStyle: 'bold'
	};

	var mode = 'index';
	var intersect = true;


	$('.poli').change(function () {
		$('#chartnya').html(
			'<div class="chart">' +
			'<canvas id="chart-hospital" width="1000" height="380"></canvas>' +
			'</div>'
		);
		var idnya = $(this).val();
		var id = idnya.split('-');
		$.ajax({
			url: root + 'data-grafik/'+id[0],
			type: 'GET',
			async: true,
			cache: false,
			dataType: 'json',
			success: function (response) {
				var label = response.label;
				var jumlah = response.jumlah;
				label.push('Hasil Prediksi');
				jumlah.push(hasil[id[1]]);

				var $chart = $('#chart-hospital');
				var salesChart = new Chart($chart, {
					type: 'line',
					data: {
						labels: label,
						datasets: [
							{
								label: 'Jumlah',
								backgroundColor: 'rgba(0,123,255,0.49)',
								borderColor: '#007bff',
								data: jumlah
							},
						]
					},
					options: {
						maintainAspectRatio: false,
						tooltips: {
							mode: mode,
							intersect: intersect
						},
						hover: {
							mode: mode,
							intersect: intersect
						},
						legend: {
							display: true,
							position: 'bottom',
						},
						scales: {
							yAxes:[{
								ticks: {
									beginAtZero : true
								}
							}]
						},
						title: {
							display: false,
							text: 'Jumlah'
						},
					}
				});
			},
			error: function (response) {
				console.log(response)
			}
		})
	})

});

function cariB(Ex, Ey, Exy, Ex2, Ey2, n) {
	var hasil = ((n * Exy) - (Ex * Ey)) / ((n * Ex2) - (Ex * Ex));
	return hasil;
}

function cariA(Ex, Ey, b, n) {
	var hasil = (Ey - (b * Ex)) / n;
	return hasil
}

function cariY(a, b, n) {
	var hasil = a + (b * n);
	return hasil
}

function saran(y) {
	var hasil = '';
	if (y <= 20) {
		hasil = '<b>Tutup</b>';
	} else if (y > 20 && y <= 700) {
		hasil = '<b>Buka</b><br><i>Stabil</i>';
	} else {
		hasil = '<b>Buka</b><br>' +
			'<i>Jumlah Dokter: 5</i><br>' +
			'<i>Jumlah Kertas Pendaftaran: 5</i><br>' +
			'<i>Jumlah Resepsionis: 8</i>'
			;
	}
	return hasil;
}

function keterangan(y, Y) {
	var hasil = '';
	if (y < Y) {
		hasil = 'Meningkat';
	} else if (y > Y) {
		hasil = 'Menurun'
	} else {
		hasil = 'Stabil'
	}
	return hasil;
}

function cekMinus(Y) {
	var hasil = 0;
	if (Y < 0) {
		hasil = 0;
	} else {
		hasil = Y;
	}
	return hasil;
}

